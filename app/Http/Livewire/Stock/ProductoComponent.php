<?php

namespace App\Http\Livewire\Stock;

use App\Models\Elementos\Elemento;
use App\Models\Elementos\ElementoProducto;
use App\Models\StockReceta;
use App\Models\Unidad;
use App\Models\Proveedor;
use App\Models\Estado;
use App\Models\EmpresaUsuario;
use App\Models\Categorias;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ProductoComponent extends Component
{
    use WithPagination, WithFileUploads;

    public $isModalOpen = false;
    public $empresa_id;

    // Filtros
    public $search = '';

    // Propiedades de la tabla Elementos
    public $producto_id; // Guarda el ID de elemento_productos
    public $elemento_id; // Guarda el ID de elementos (para edición)
    public $name, $precio_compra = 0, $stock_minimo = 0, $vencimiento, $categoria_id, $unidad_id;
    public $descuento = 0;
    public $descuento_especial = 0;
    public $calificacion = 0;
    public $imagen;

    // Recetas
    public $isRecetaModalOpen = false;
    public $receta_producto_id, $receta_producto_nombre;
    public $nueva_materia_id, $nueva_cantidad;
    public $receta_actual = []; // Para listar los ingredientes actuales

    // Propiedades de la tabla ElementoProductos
    public $descripcion, $barra, $qr, $precio_venta = 0, $proveedor_id, $estado_id, $lote, $ruta;

    public function render()
    {
        $guardName = 'web' . session('empresa_id');
        $permisoExiste = Permission::where('name', 'productos.Ver')->where('guard_name', $guardName)->exists();

        if (auth()->check() && $permisoExiste && EmpresaUsuario::PermisoHabilitado('productos.Ver', $guardName)) {
            if (session('empresa_id')) {
                $this->empresa_id = session('empresa_id');

                $productos = ElementoProducto::select('elemento_productos.*')
                    ->join('elementos', 'elementos.id', '=', 'elemento_productos.elemento_id')
                    ->where('elementos.empresa_id', $this->empresa_id)
                    ->where(function($q) {
                        $q->where('elementos.name', 'like', '%' . $this->search . '%')
                          ->orWhere('elemento_productos.descripcion', 'like', '%' . $this->search . '%')
                          ->orWhere('elemento_productos.barra', 'like', '%' . $this->search . '%');
                    })
                    ->with(['elemento.categoria', 'elemento.unidad', 'proveedor', 'estado'])
                    ->orderByDesc('elemento_productos.id')
                    ->paginate(10);

                // Listas para los selects
                $categorias = Categorias::where('empresa_id', $this->empresa_id)->where('activo',1)->orderBy('nombrecategoria')->get();
                $unidades = Unidad::where('empresa_id', $this->empresa_id)->orderBy('name')->get();
                $proveedores = Proveedor::where('empresa_id', $this->empresa_id)->orderBy('name')->get();
                $estados = Estado::where('empresa_id', $this->empresa_id)->orderBy('name')->get(); // Asumo que Estados es global

                return view('livewire.stock.producto-component', [
                    'productos' => $productos,
                    'categorias' => $categorias,
                    'unidades' => $unidades,
                    'proveedores' => $proveedores,
                    'estados' => $estados,
                ])->extends('layouts.adminlte');
            } else {
                return view('livewire.seleccionarempresa')->extends('layouts.adminlte');
            }
        } else {
            return view('SinPermiso')->extends('layouts.adminlte');
        }
    }

    public function Filtrar() { $this->resetPage(); }

    public function create()
    {
        $this->resetForm();
        $this->isModalOpen = true;
    }

    private function resetForm()
    {
        $this->producto_id = '';
        $this->elemento_id = '';
        $this->name = '';
        $this->precio_compra = 0;
        $this->stock_minimo = 0;
        $this->vencimiento = '';
        $this->categoria_id = '';
        $this->unidad_id = '';
        
        $this->descripcion = '';
        $this->barra = '';
        $this->qr = '';
        $this->precio_venta = 0;
        $this->proveedor_id = '';
        $this->estado_id = '';
        $this->lote = '';
        $this->descuento = 0;
        $this->descuento_especial = 0;
        $this->calificacion = 0;
        $this->imagen = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'unidad_id' => 'required|exists:unidads,id',
            'descripcion' => 'required|string|max:255',
            'barra' => 'nullable|string|max:255',
            'precio_venta' => 'required|numeric|min:0',
            'proveedor_id' => 'required|exists:proveedors,id',
            'estado_id' => 'required|exists:estados,id',
            'descuento' => 'nullable|numeric|min:0',
            'descuento_especial' => 'nullable|numeric|min:0',
            'calificacion' => 'nullable|numeric|min:0|max:5',
            'imagen' => 'nullable|image|max:2048', // Máximo 2MB
        ]);

        DB::beginTransaction();
        try {

            $rutaImagen = $this->ruta ?? ''; // Si estamos editando, conservamos la anterior
            if ($this->imagen) {
                // Si hay una imagen nueva, guardamos en storage/app/public/productos
                $rutaImagen = $this->imagen->store('productos', 'public');
            }

            // 1. Guardar en la tabla 'elementos'
            $elemento = Elemento::updateOrCreate(['id' => $this->elemento_id], [
                'name' => $this->name,
                'precio_compra' => $this->precio_compra ?? 0,
                'stock_minimo' => $this->stock_minimo ?? 0,
                'vencimiento' => $this->vencimiento ?: now()->addYears(5), // Requerido en tu tabla original
                'categoria_id' => $this->categoria_id,
                'unidad_id' => $this->unidad_id,
                'ruta' => '', // Si no usás imágenes por ahora
                'empresa_id' => session('empresa_id'),
            ]);

            // 2. Guardar en la tabla 'elemento_productos'
            ElementoProducto::updateOrCreate(['id' => $this->producto_id], [
                'elemento_id' => $elemento->id,
                'descripcion' => $this->descripcion,
                'barra' => $this->barra ?? Str::random(10),
                'qr' => $this->qr ?? Str::random(10),
                'descuento' => $this->descuento ?? 0,
                'calificacion' => $this->calificacion ?? 0,
                'descuento_especial' => $this->descuento_especial ?? 0,
                'precio_venta' => $this->precio_venta,
                'lote' => $this->lote,
                'ruta' => $rutaImagen, // <-- Guardamos la ruta de la imagen
                'proveedor_id' => $this->proveedor_id,
                'estado_id' => $this->estado_id,
            ]);

            DB::commit();
            session()->flash('message', $this->producto_id ? 'Producto actualizado correctamente.' : 'Producto creado correctamente.');
            $this->isModalOpen = false;
            $this->resetForm();

        } catch (\Exception $e) {
            DB::rollBack();
            $this->addError('general', 'Error al guardar: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $producto = ElementoProducto::with('elemento')->findOrFail($id);
        
        $this->producto_id = $id;
        $this->elemento_id = $producto->elemento_id;
        
        // Datos del elemento
        $this->name = $producto->elemento->name;
        $this->precio_compra = $producto->elemento->precio_compra;
        $this->stock_minimo = $producto->elemento->stock_minimo;
        $this->vencimiento = $producto->elemento->vencimiento ? $producto->elemento->vencimiento->format('Y-m-d') : '';
        $this->categoria_id = $producto->elemento->categoria_id;
        $this->unidad_id = $producto->elemento->unidad_id;

        // Datos del producto
        $this->descripcion = $producto->descripcion;
        $this->barra = $producto->barra;
        $this->qr = $producto->qr;
        $this->precio_venta = $producto->precio_venta;
        $this->proveedor_id = $producto->proveedor_id;
        $this->estado_id = $producto->estado_id;
        $this->lote = $producto->lote;
        $this->descuento = $producto->descuento;
        $this->calificacion = $producto->calificacion;
        $this->descuento_especial = $producto->descuento_especial;
        $this->ruta = $producto->ruta; // Guardamos la ruta actual para no perderla

        $this->isModalOpen = true;
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $producto = ElementoProducto::findOrFail($id);
            $elemento_id = $producto->elemento_id;
            
            // Borramos el producto
            $producto->delete();
            
            // Borramos el elemento base
            Elemento::find($elemento_id)->delete();

            DB::commit();
            session()->flash('message', 'Producto eliminado correctamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('message', 'No se puede eliminar el producto porque tiene movimientos de stock asociados.');
        }
    }


    public function gestionarReceta($id)
    {
        $producto = ElementoProducto::findOrFail($id);
        $this->receta_producto_id = $id;
        $this->receta_producto_nombre = $producto->descripcion;
        
        $this->cargarReceta();
        
        $this->nueva_materia_id = '';
        $this->nueva_cantidad = '';
        $this->isRecetaModalOpen = true;
    }

    public function cargarReceta()
    {
        $this->receta_actual = StockReceta::where('producto_terminado_id', $this->receta_producto_id)
            ->with('materiaPrima')
            ->get();
    }

    public function agregarIngrediente()
    {
        $this->validate([
            'nueva_materia_id' => 'required|exists:elemento_productos,id',
            'nueva_cantidad' => 'required|numeric|min:0.01',
        ]);

        if ($this->nueva_materia_id == $this->receta_producto_id) {
            $this->addError('nueva_materia_id', 'Un producto no puede ser ingrediente de sí mismo.');
            return;
        }

        StockReceta::updateOrCreate(
            [
                'producto_terminado_id' => $this->receta_producto_id,
                'materia_prima_id' => $this->nueva_materia_id
            ],
            [
                'cantidad' => $this->nueva_cantidad
            ]
        );

        $this->nueva_materia_id = '';
        $this->nueva_cantidad = '';
        $this->cargarReceta();
        session()->flash('message_receta', 'Ingrediente agregado/actualizado.');
    }

    public function eliminarIngrediente($id)
    {
        StockReceta::findOrFail($id)->delete();
        $this->cargarReceta();
        session()->flash('message_receta', 'Ingrediente eliminado.');
    }

    public function closeRecetaModal()
    {
        $this->isRecetaModalOpen = false;
        $this->reset(['receta_producto_id', 'receta_producto_nombre', 'nueva_materia_id', 'nueva_cantidad', 'receta_actual']);
    }
}