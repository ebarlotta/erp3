<?php

namespace App\Http\Livewire\EmpresaUsuarios;

use App\Models\EmpresaUsuario;
use App\Models\Empresa;
use App\Models\Roles;
use Spatie\Permission\Models\Role;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Livewire\WithPagination;
use App\Models\User as Usuarios;
use Spatie\Permission\PermissionRegistrar;

class EmpresaUsuariosComponent extends Component
{
    public $isModalOpen = false, $isModalRoles=false;

    public $name;

    public $usuariosglobales;
    public $usuariosdelaempresa;
    public $usuariosdelaemp;
    public $usuariosNOempresa;
    public $empresas;
    public $empresaseleccionada;
    public $seleccionado=1;
    public $user_id;
    public $roles;
    public $usuarioSeleccionado, $id_rolActual;
    public $id_NuevoRol;
    public $rol_nuevo_usuario=null;


    use WithPagination;

    public function render()
    {
                // DB::table('empresas')->insert(['name' => 'Empresa de Pruebas','direccion' => 'Dirección','cuit' => '20123456789','ib' => '012345678','imagen' => 'BarBer.png','establecimiento' => '0','telefono' => '12345678','actividad' => 'Desarrollo','actividad1' => 'Software','email' => '','habilitada' => true,'nombretitular' => 'Juan de los Palotes','dnititular' => '1234',]);

        if(auth()->user()->hasPermissionTo('empresausuarios.Ver','web'.session('empresa_id'))) {
            if(session('empresa_id')) {
                $this->usuariosglobales= User::all();
                $this->empresas = Empresa::all()->sortBy('id');
                return view('livewire.empresa-usuarios.empresa-usuarios-component',['datos'=>Empresa::OrderBy('id')->paginate(5),])->extends('layouts.adminlte');
            } else { return view('livewire.seleccionarempresa')->extends('layouts.adminlte'); }
        } else {
            return view('SinPermiso')->extends('layouts.adminlte');
        }
    }

    public function mostrarmodal()
    {
        $this->isModalOpen = true;
        $this->roles = Roles::where('empresa_id', $this->empresaseleccionada->id)->get();
    }
    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }
    public function OpenModalRoles() {
        $this->isModalRoles = true;
    }

    public function CerrarModalRoles() {
        $this->isModalRoles = false;
    }

    public function CargarUsuarios($id)
    {
        $this->empresaseleccionada = Empresa::find($id);
        $this->seleccionado=$id;
        // $this->usuariosdelaempresa = DB::table('users')->distinct()
        //     ->join('empresa_usuarios', 'users.id', '=', 'empresa_usuarios.user_id')
        //     ->join('empresas',  'empresas.id', '=', 'empresa_usuarios.empresa_id',)
        //     ->where('empresas.id', $this->empresaseleccionada->id)
        //     ->select('users.*', 'empresas.name as empresa')
        //     ->get();

        $this->usuariosdelaempresa = DB::table('users')->distinct()
            ->join('empresa_usuarios', 'users.id', '=', 'empresa_usuarios.user_id')
            ->join('empresas',  'empresas.id', '=', 'empresa_usuarios.empresa_id')
            ->join('roles','roles.id','=','empresa_usuarios.rol_id')
            ->where('empresas.id', $this->empresaseleccionada->id)
            ->select('users.*', 'empresa_usuarios.*', 'roles.name as rol_name', 'empresas.name as empresa')
            ->get();

            $this->usuariosdelaemp = $this->usuariosdelaempresa;
            // dd($this->usuariosdelaemp);
        $array = json_decode($this->usuariosdelaempresa, true);
        $this->usuariosdelaempresa=$array;
        $this->usuariosNOempresa=User::all();
    }

    public function AgregarUsuario($user_id)
    {
        dd($user_id);
        if(is_null($this->rol_nuevo_usuario)) {
            session()->flash('messageerrormodal', 'Debe seleccionar un rol');
        } else {
            EmpresaUsuario::create(['empresa_id' => $this->empresaseleccionada->id, 'user_id' => $user_id,'rol_id'=>$this->rol_nuevo_usuario]);
            $this->closeModalPopover();
            // $this->usuarios = User::all();
            $this->CargarUsuarios($this->empresaseleccionada->id);
            return view('livewire.empresa-usuarios.empresa-usuarios-component');

        }
    }

    public function EliminarUsuario($user_id)
    {
        // dd('entro');
        $a = EmpresaUsuario::where('empresa_id', "=", $this->empresaseleccionada->id)
            ->where('user_id', "=", $user_id)->delete();
        $this->closeModalPopover();
        // $this->usuarios = User::all();
        $this->CargarUsuarios($this->empresaseleccionada->id);
        return view('livewire.empresa-usuarios.empresa-usuarios-component');
    }

    public function CambiarRol($id) {
        $this->OpenModalRoles();
        $this->user_id = $id;
        $this->usuarioSeleccionado = EmpresaUsuario::where('empresa_id', "=", $this->empresaseleccionada->id)
        ->join('users','users.id','=','empresa_usuarios.user_id')
        ->where('user_id', "=", $id)->get();

        $this->id_rolActual = $this->usuarioSeleccionado[0]['rol_id'];
        $this->roles = Roles::where('empresa_id', $this->empresaseleccionada->id)->get();
    }

    public function CapturarIdUsuario($id) {
        $this->user_id = $id;
    }

    public function ActualizarRol() {
        $this->validate([
            'id_NuevoRol' => 'required|integer|min:1',
        ]);

        $user = Usuarios::find($this->usuarioSeleccionado[0]->id);      // Es el usuario de la lista de ususarios de la base de datos, no sólo el de la empresa. Por eso hay que buscarlo en la tabla users
        $nuevo_rol = Role::find($this->id_NuevoRol);                    // Es el rol que se le asignará al usuario en la empresa seleccionada. Ej. Administrador de esta empresa, no en general
        $guardName = 'web'.$this->empresaseleccionada->id;              // Es el guard name que se utiliza para diferenciar los roles y permisos de cada empresa. Ej. web1, web2, web3, etc.
        
        $rol_Existe = Role::where('id', $this->id_NuevoRol)           // Revisa si el rol que se le quiere asignar al usuario existe en la empresa seleccionada. Si no existe, no se le puede asignar.
            ->where('guard_name', $guardName)
            ->where('empresa_id', $this->empresaseleccionada->id)
            ->exists();
        
        if (!$rol_Existe) {                                                                                         
           session()->flash('messageerror', 'El Rol seleccionado no existe en la empresa que está gestionando');   
           return;                                                                                                 
        } 
       
       // 1. Obtener los permisos del nuevo rol ANTES de borrar nada                                               
       $permisosDelRol = DB::table('role_has_permissions' )                                                        
           ->where('role_id', $nuevo_rol->id)                                                                      
           ->pluck('permission_id');                                                                               
                                                                                                                   
       // Iniciar transacción para consistencia de datos                                                           
       DB::beginTransaction();                                                                                     
                                                                                                                   
        try {                                                                                                       
            // 2. Actualizar el rol en empresa_usuarios                                                             
            EmpresaUsuario::updateOrCreate(                                                                         
                [                                                                                                   
                    'user_id'    => $this->usuarioSeleccionado[0]->id,                                              
                    'empresa_id' => $this->empresaseleccionada->id                                                  
                ],                                                                                                  
                [                                                                                                   
                    'rol_id' => (int) $this->id_NuevoRol                                                            
                ]                                                                                                   
            );                                                                                                      
                                                                                                                    
            // 3. Limpiar permisos anteriores del usuario                                                           
            DB::table('model_has_permissions')                                                                     
                ->where('model_id', $user->id)                                                                      
                ->where('model_type', 'App\Models\User')                                                            
                ->delete();                                                                                         
                                                                                                                    
            // 4. Limpiar roles anteriores del usuario                                                              
            DB::table('model_has_roles')                                                                            
                ->where('model_id', $user->id)                                                                      
                ->where('model_type', 'App\Models\User')                                                            
                ->delete();                                                                                         
                                                                                                                    
            // 5. Asignar los nuevos permisos al usuario                                                            
            foreach ($permisosDelRol as $permisoId) {                                                               
                DB::table('model_has_permissions')->insert([                                                       
                    'permission_id' => $permisoId,                                                                  
                    'model_type'    => 'App\Models\User',                                                           
                    'model_id'      => $user->id,                                                                   
                ]);                                                                                                 
            }                                                                                                       
                                                                                                                    
            // 6. Asignar el nuevo rol al usuario                                                                   
            DB::table('model_has_roles')->insert([                                                                 
                'role_id'    => $nuevo_rol->id,                                                                     
                'model_type' => 'App\Models\User',                                                                  
                'model_id'   => $user->id,                                                                          
            ]);                                                                                                     
                                                                                                                    
            DB::commit();                                                                                           
                                                                                                                    
            session()->flash('message', 'Rol y permisos actualizados correctamente');                               
            $this->CerrarModalRoles();                                                                              
            $this->CargarUsuarios($this->empresaseleccionada->id);                                                 
                                                                                                                    
        } catch (\Exception $e) {                                                                                   
            DB::rollBack();                                                                                         
            session()->flash('messageerror', 'Error al actualizar: ' . $e->getMessage());                           
        }

        $this->CerrarModalRoles();
        $this->CargarUsuarios($this->empresaseleccionada->id);

    }
}
