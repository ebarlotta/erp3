<?php

namespace App\Http\Livewire\ModuloUsuarios;

use App\Models\Modulo;
use App\Models\User;
use App\Models\ModuloUsuario;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

use Spatie\Permission\Models\Permission;

// Dispatch::all() => Returns a Collection
// Dispatch::all()->where() => Returns a Collection
// Dispatch::where() => Returns a Query
// Dispatch::where()->get() => Returns a Collection
// Dispatch::where()->get()->where() => Returns a Collection
// You can only invoke "paginate" on a Query, not on a Collection.

class ModuloUsuariosComponent extends Component
{
    use WithPagination;

    public $name;
    public $isModalOpen = false;
    public $usuariosglobales;
    public $usuariosdelmodulo;
    public $usuariosNOmodulo;
    public $modulos;
    public $moduloseleccionado;
    public $seleccionado=1;
    public $search;

    protected $datos;

    public function render() {
        if(auth()->check() && auth()->user()->hasPermissionTo('modulousuarios.Ver','web'.session('empresa_id'))) {
            if(session('empresa_id')) {
                $this->usuariosglobales= User::all();
                //$modulos = Modulo::get()->sortBy('id')->paginate(4);
                //$this->modulos = Modulo::all();
                //$datos = Modulo::paginate(10);
                $this->datos = Modulo::orderby('name')
                    ->where('name', 'like', '%'.$this->search.'%')
                    ->paginate(8);
                return view('livewire.modulo-usuarios.modulo-usuarios-component',['datos'=> $this->datos])->extends('layouts.adminlte')
                ->section('content');
            } else { return view('livewire.seleccionarempresa')->extends('layouts.adminlte'); }
        } else {
            return view('SinPermiso')->extends('layouts.adminlte');
        }
    }

       public function Filtrar() {
        $this->datos = Modulo::orderby('name')
        ->where('name', 'like', '%'.$this->search.'%')
        ->orderby('name')
        ->paginate(8);
    }

    public function mostrarmodal()
    {
        $this->isModalOpen = true;
    }
    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    public function CargarUsuarios($id)
    {
        $this->moduloseleccionado = Modulo::find($id);
        $this->seleccionado=$id;
        $this->usuariosdelmodulo = DB::table('users')->distinct()
            ->join('modulo_usuarios', 'users.id', '=', 'modulo_usuarios.user_id')
            ->join('modulos',  'modulos.id', '=', 'modulo_usuarios.modulo_id',)
            ->where('modulos.id', $this->moduloseleccionado->id)
            ->select('users.*', 'modulos.name as modulo')
            ->orderby('users.name')
            ->get();

            //$this->usuariosdelaemp = $this->usuariosdelmodulo;
        $array = json_decode($this->usuariosdelmodulo, true);
        //dd($array);
        $this->usuariosdelmodulo=$array;
        $this->usuariosNOmodulo=User::all();
        // $this->usuariosNOmodulo = DB::table('users')->distinct()
        //     ->join('modulo_usuarios', 'users.id', '=', 'modulo_usuarios.user_id')
        //     ->join('modulos',  'modulos.id', '=', 'modulo_usuarios.modulo_id',)
        //     ->where('modulos.id', '<>',$this->moduloseleccionado->id)
        //     ->where('modulos.name','=',$this->moduloseleccionado->name)
        //     ->select('users.*','modulos.name as modulo')
        //     ->orderby('users.name')
        //     ->get();
    }

    public function AgregarUsuario($user_id)
    {
        if(isset($this->moduloseleccionado->id) && isset( $user_id) && isset(Auth()->user()->id)) {
            ModuloUsuario::create([
                'modulo_id' => $this->moduloseleccionado->id,
                'user_id' => $user_id,
                'modificado_user_id'=>Auth()->user()->id]
            );

            // $modulo = "'" . strtolower($this->moduloseleccionado->pagina.'.%') . "'";
            $modulo = strtolower($this->moduloseleccionado->pagina.'.%');

            $adicionales = Permission::whereRaw("name LIKE ?", [$modulo])->get();
            // $adicionales = Permission::where('name', 'LIKE', $modulo)->get();
            // dd($adicionales);
            foreach ($adicionales as $adic) {
                // Verificar si ya existe el registro
                $existe = DB::table('model_has_permissions')
                    ->where('permission_id', $adic->id)
                    ->where('model_type', 'App\Models\User')
                    ->where('model_id', Auth::id())
                    ->exists();

                if ($existe) {
                    // Mostrar error
                    session()->flash('error', 'El permiso ya está asignado a este usuario');
                    return back();
                } else {
                    // Insertar el registro
                    DB::table('model_has_permissions')->insert([
                        'permission_id' => $adic->id,
                        'model_type' => 'App\Models\User',
                        'model_id' => Auth::id()
                    ]);
                    session()->flash('success', 'Permiso asignado correctamente');
                }
            }
        } else { session()->flash('message', 'Se ha producido un error, revise los datos y vuelva a intentarlo'); }

        $this->closeModalPopover();
        // $this->usuarios = User::all();
        $this->CargarUsuarios($this->moduloseleccionado->id);
        return view('livewire.modulo-usuarios.modulo-usuarios-component');
    }

    public function EliminarUsuario($user_id)
    {
        $a = ModuloUsuario::where('modulo_id', "=", $this->moduloseleccionado->id)
            ->where('user_id', "=", $user_id)->delete();
        $this->closeModalPopover();
        // $this->usuarios = User::all();
        $this->CargarUsuarios($this->moduloseleccionado->id);
        return view('livewire.modulo-usuarios.modulo-usuarios-component');
    }

}
