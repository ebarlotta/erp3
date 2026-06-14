<?php

namespace App\Http\Livewire\EmpresaGestion;

use App\Models\Empresa;
use Database\Seeders\erp\CuentaSeeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
class EmpresaGestion extends Component {

    use WithFileUploads;
    use WithPagination;

    public $empresas;
    public $isModalOpen;
    public $seleccionado;
    public $empresa;
    public $empresa_id, $name, $direccion, $cuit, $ib, $imagen, $establecimiento, $telefono, $actividad, $actividad1, $menu, $email, $habilitada=true, $nombretitular, $dnititular;

    public function render() {
        $guardName = 'web' . session('empresa_id'); $permisoExiste = Permission::where('name', 'empresagestion.Ver')->where('guard_name', $guardName)->exists();
        if (auth()->check() && $permisoExiste && auth()->user()->hasPermissionTo('empresagestion.Ver', $guardName)) {
            if(session('empresa_id')) {
               $this->empresas=Empresa::all();
                return view('livewire.empresa-gestion.empresa-gestion',['datos'=> Empresa::orderby('name')->paginate(7),])->extends('layouts.adminlte');
            } else { return view('livewire.seleccionarempresa')->extends('layouts.adminlte'); }
        } else {
            return view('SinPermiso')->extends('layouts.adminlte');
        }
    }

    public function mostrarmodal()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }
    public function CargarDatosEmpresa($id) {
        $empresa = Empresa::find($id);
        $this->name = $empresa->name;
        $this->direccion = $empresa->direccion;
        $this->cuit = $empresa->cuit;
        $this->ib = $empresa->ib;
        $this->imagen = $empresa->imagen;
        $this->establecimiento = $empresa->establecimiento;
        $this->telefono = $empresa->telefono;
        $this->actividad = $empresa->actividad;
        $this->actividad1 = $empresa->actividad1;
        $this->menu = $empresa->menu;
        $this->email = $empresa->email;

        $this->habilitada = $empresa->habilitada ? true : false;
        $this->nombretitular = $empresa->nombretitular;
        $this->dnititular = $empresa->dnititular;
        $this->empresa_id = $id;

        $this->mostrarmodal();
    }

    public function CrearEmpresa() {
        $this->name = "";
        $this->direccion = "";
        $this->cuit = "";
        $this->ib = "";
        $this->imagen = "";
        $this->establecimiento = "";
        $this->telefono = "";
        $this->actividad = "";
        $this->actividad1 = "";
        $this->menu = "";
        $this->email = "";
        $this->habilitada = "";
        $this->nombretitular = "";
        $this->dnititular = "";
        $this->empresa_id = null;

        $this->mostrarmodal();
    }

    public function store() {
        $this->validate([
            'name' => 'required',
            'direccion' => 'required',
            'cuit' => 'required',
            'ib' => 'required',
            // 'imagen' => 'required',
            'establecimiento' => 'required|integer',
            'telefono' => 'required',
            'actividad' => 'required',
            'actividad1' => 'required',
            'menu' => 'required',
            'email' => 'required',
            'habilitada' => 'required',
            'nombretitular' => 'required',
            'dnititular' => 'required',
        ]);

        $existe=false;  //Consulta si existe la empresa
        $existe = Empresa::find($this->empresa_id);

        $nombreCompleto = basename($this->imagen) . time().'.jpg';

        $this->empresa_id = Empresa::updateOrCreate(['id' => $this->empresa_id],[
            'name' => $this->name,
            'direccion' => $this->direccion,
            'cuit' => $this->cuit,
            'establecimiento' => $this->establecimiento,
            'ib' => $this->ib,
            // 'image' => $this->imagen,
            // 'imagen' => $this->imagen->storeAs('storageimages',$nombreCompleto),
            // 'imagen' => $this->imagen->storeAs('images2',$nombreCompleto),
            'telefono' => $this->telefono,
            'actividad' => $this->actividad,
            'actividad1' => $this->actividad1,
            'menu' => $this->menu,
            'email' => $this->email,
            'habilitada' => $this->habilitada,
            'nombretitular' => $this->nombretitular,
            'dnititular' => $this->dnititular,
        ]);
        //dd($this->imagen);

        if (!$existe) {     //Si no existe la empresa, inicializa los módulos básicos correspondientes
            // DB::table('empresa_modulos')->insert(['modulo_id' => '2','empresa_id' => $this->empresa_id->id,]);
            // DB::table('empresa_modulos')->insert(['modulo_id' => '3','empresa_id' => $this->empresa_id->id,]);
            // DB::table('empresa_modulos')->insert(['modulo_id' => '4','empresa_id' => $this->empresa_id->id,]);
            // DB::table('empresa_modulos')->insert(['modulo_id' => '5','empresa_id' => $this->empresa_id->id,]);
            // DB::table('empresa_modulos')->insert(['modulo_id' => '6','empresa_id' => $this->empresa_id->id,]);
            // DB::table('empresa_modulos')->insert(['modulo_id' => '8','empresa_id' => $this->empresa_id->id,]);
            // DB::table('empresa_modulos')->insert(['modulo_id' => '9','empresa_id' => $this->empresa_id->id,]);
            // DB::table('empresa_modulos')->insert(['modulo_id' => '11','empresa_id' => $this->empresa_id->id,]);

            // Módulos de prueba para la empresa de ERP
            DB::table('empresa_modulos')->insert(['modulo_id' => '8','empresa_id' => $this->empresa_id->id,]);
            DB::table('empresa_modulos')->insert(['modulo_id' => '9','empresa_id' => $this->empresa_id->id,]);
            DB::table('empresa_modulos')->insert(['modulo_id' => '10','empresa_id' => $this->empresa_id->id,]);
            DB::table('empresa_modulos')->insert(['modulo_id' => '11','empresa_id' => $this->empresa_id->id,]);
            DB::table('empresa_modulos')->insert(['modulo_id' => '17','empresa_id' => $this->empresa_id->id,]);
            DB::table('empresa_modulos')->insert(['modulo_id' => '18','empresa_id' => $this->empresa_id->id,]);
            DB::table('empresa_modulos')->insert(['modulo_id' => '19','empresa_id' => $this->empresa_id->id,]);
            DB::table('empresa_modulos')->insert(['modulo_id' => '23','empresa_id' => $this->empresa_id->id,]);
            DB::table('empresa_modulos')->insert(['modulo_id' => '24','empresa_id' => $this->empresa_id->id,]);
            DB::table('empresa_modulos')->insert(['modulo_id' => '25','empresa_id' => $this->empresa_id->id,]);
            DB::table('empresa_modulos')->insert(['modulo_id' => '27','empresa_id' => $this->empresa_id->id,]);
            DB::table('empresa_modulos')->insert(['modulo_id' => '28','empresa_id' => $this->empresa_id->id,]);
            DB::table('empresa_modulos')->insert(['modulo_id' => '29','empresa_id' => $this->empresa_id->id,]);
            DB::table('empresa_modulos')->insert(['modulo_id' => '31','empresa_id' => $this->empresa_id->id,]);
            DB::table('empresa_modulos')->insert(['modulo_id' => '32','empresa_id' => $this->empresa_id->id,]);
            DB::table('empresa_modulos')->insert(['modulo_id' => '33','empresa_id' => $this->empresa_id->id,]);
            DB::table('empresa_modulos')->insert(['modulo_id' => '35','empresa_id' => $this->empresa_id->id,]);
            DB::table('empresa_modulos')->insert(['modulo_id' => '36','empresa_id' => $this->empresa_id->id,]);
            DB::table('empresa_modulos')->insert(['modulo_id' => '38','empresa_id' => $this->empresa_id->id,]);

            $modulos = array ( 'Dashboard', 'Administracion', 'areas', 'Categorias', 'Cuentas', 'Elementos', 'Estados', 'Listas', 'Proveedores', 'Unidades', 'Producto', 'Clientes', 'Productos', 'categoriaproducto', 'categoriaprofesional', 'Compras', 'Empleados', 'Haberes', 'Ventas', 'compras-mini', 'ventasimple', 'ventasmostrador', 'Cart', 'Informes', 'Payments', 'Tags', 'producto/tag','producto/create','producto','productoscarts','productobajas');
            $i = $this->empresa_id->id;

            foreach($modulos as $modulo) {
                DB::table('permissions')->insertOrIgnore(['name'=>strtolower($modulo) . '.Agregar','guard_name' => 'web'.$i]);
                DB::table('permissions')->insertOrIgnore(['name'=>strtolower($modulo) . '.Eliminar','guard_name' => 'web'.$i]);
                DB::table('permissions')->insertOrIgnore(['name'=>strtolower($modulo) . '.Modificar','guard_name' => 'web'.$i]);
                DB::table('permissions')->insertOrIgnore(['name'=>strtolower($modulo) . '.Ver','guard_name' => 'web'.$i]);

                // Agregar los permisos para el menú de la izquierda
                DB::table('permissions')->insertOrIgnore(['name'=>strtolower($modulo) . '.Ver','guard_name' => 'web']);
            }

            DB::table('clientes')->insert(['name' => "CONSUMIDOR_FINAL",'cuil'=>"20-000000".$this->empresa_id->id."-0",'direccion'=>'-','email'=>'empresa'.$this->empresa_id->id.'@barber.com','telefono'=>'0','empresa_id' => $this->empresa_id->id,]);  // Inserta al CONSUMIDOR FINAL como cliente

            $cuenta = new CuentaSeeder();  // Crea una instancia del seeder
            $cuenta->empresa_id = $this->empresa_id->id;  // Asigna el ID de la empresa al seeder
            $cuenta->runForEmpresa();  // Llama al método para insertar las cuentas básicas para la empresa

            // DB::table('role_has_permissions')->insert(['permission_id' => 5, 'role_id'=> 1,]);
            // DB::table('role_has_permissions')->insert(['permission_id' => 6, 'role_id'=> 1,]);
            // DB::table('role_has_permissions')->insert(['permission_id' => 7, 'role_id'=> 1,]);
            // DB::table('role_has_permissions')->insert(['permission_id' => 8, 'role_id'=> 1,]);
            // DB::table('role_has_permissions')->insert(['permission_id' => 9, 'role_id'=> 1,]);
            // DB::table('role_has_permissions')->insert(['permission_id' => 10, 'role_id'=> 1,]);
            // DB::table('role_has_permissions')->insert(['permission_id' => 11, 'role_id'=> 1,]);
            // DB::table('role_has_permissions')->insert(['permission_id' => 12, 'role_id'=> 1,]);
            // DB::table('role_has_permissions')->insert(['permission_id' => 13, 'role_id'=> 1,]);
            // DB::table('role_has_permissions')->insert(['permission_id' => 14, 'role_id'=> 1,]);
            // DB::table('role_has_permissions')->insert(['permission_id' => 15, 'role_id'=> 1,]);
            // DB::table('role_has_permissions')->insert(['permission_id' => 16, 'role_id'=> 1,]);
            // DB::table('role_has_permissions')->insert(['permission_id' => 17, 'role_id'=> 1,]);
            // DB::table('role_has_permissions')->insert(['permission_id' => 18, 'role_id'=> 1,]);
            // DB::table('role_has_permissions')->insert(['permission_id' => 19, 'role_id'=> 1,]);
            // DB::table('role_has_permissions')->insert(['permission_id' => 20, 'role_id'=> 1,]);
            // DB::table('role_has_permissions')->insert(['permission_id' => 21, 'role_id'=> 1,]);
            // DB::table('role_has_permissions')->insert(['permission_id' => 22, 'role_id'=> 1,]);
            // DB::table('role_has_permissions')->insert(['permission_id' => 23, 'role_id'=> 1,]);
            // DB::table('role_has_permissions')->insert(['permission_id' => 24, 'role_id'=> 1,]);
            // DB::table('role_has_permissions')->insert(['permission_id' => 29, 'role_id'=> 1,]);
            // DB::table('role_has_permissions')->insert(['permission_id' => 30, 'role_id'=> 1,]);
            // DB::table('role_has_permissions')->insert(['permission_id' => 31, 'role_id'=> 1,]);
            // DB::table('role_has_permissions')->insert(['permission_id' => 32, 'role_id'=> 1,]);
            // DB::table('role_has_permissions')->insert(['permission_id' => 33, 'role_id'=> 1,]);
            // DB::table('role_has_permissions')->insert(['permission_id' => 34, 'role_id'=> 1,]);
            // DB::table('role_has_permissions')->insert(['permission_id' => 35, 'role_id'=> 1,]);
            // DB::table('role_has_permissions')->insert(['permission_id' => 36, 'role_id'=> 1,]);
            // DB::table('role_has_permissions')->insert(['permission_id' => 41, 'role_id'=> 1,]);
            // DB::table('role_has_permissions')->insert(['permission_id' => 42, 'role_id'=> 1,]);
            // DB::table('role_has_permissions')->insert(['permission_id' => 43, 'role_id'=> 1,]);
            // DB::table('role_has_permissions')->insert(['permission_id' => 44, 'role_id'=> 1,]);

            DB::table('roles')->insert(['name' => 'Administrador','guard_name' => 'web'.$this->empresa_id->id, 'empresa_id' => $this->empresa_id->id,]);
            DB::table('roles')->insert(['name' => 'Usuario','guard_name' => 'web'.$this->empresa_id->id, 'empresa_id' => $this->empresa_id->id,]);
            DB::table('roles')->insert(['name' => 'Free','guard_name' => 'web'.$this->empresa_id->id, 'empresa_id' => $this->empresa_id->id,]);


        }

        //Agrega las unidades de medida a la empresa generada
        // $seeder = new UnidadSeeder();
        // $seeder->empresaId = $this->empresa_id; // le pasas el parámetro
        // $seeder->run();

        $this->closeModalPopover();
    }
}
