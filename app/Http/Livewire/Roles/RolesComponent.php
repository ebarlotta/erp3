<?php

namespace App\Http\Livewire\Roles;

use App\Models\EmpresaUsuario;
use App\Models\Modulo;
use App\Models\Roles;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
// use Illuminate\Foundation\Auth\User;

use Database\Seeders\PermissionsSeeder;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Commands\CreatePermission;

// use Spatie\Permission\Traits\HasRoles;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class RolesComponent extends Component
{
    public $name, $roles, $rol_id, $permisos, $permisoshabilitados, $permisosNoActivadoshabilitados, $modulo_name, $modulos, $modulo_seleccionado;
    public $buscar;
    public $moduloshabilitados;

    // use HasRoles;

    // protected $guard_name = 'web';

    // FALTA AGREGAR ROLES Y PERMISOS POR EMPRESA, NO A NIVEL GENERAL, SINO PARTICULAR Enzo

    public function render() {
        if(auth()->check() && auth()->user()->hasPermissionTo('roles.Ver')) {
            if(session('empresa_id')) {
                $this->modulos = Modulo::orderby('name')->get(); ///all();
                $this->Filtrar();
                $this->name = "Administrador";

                // $a = new PermissionsSeeder();
                // $a->AsignarRolesAlaEmpresa(2);

                return view('livewire.roles.roles-component')->extends('layouts.adminlte');

                } else { return view('livewire.seleccionarempresa')->extends('layouts.adminlte'); }
            } else {
                return view('SinPermiso')->extends('layouts.adminlte');
            }



                // $user = User::find(Auth::user()->id);   // Asigna el rol al usuario
                // $user->syncRoles(['Administrador']);

                // // // dd($this->name);

                // $permissions = Permission::all();
                // $user = User::find(1);
                // $user->syncPermissions($permissions);  // Borra todos los permisos del Rol

                // dd($user);
                // $permission = Permission::findByName('agregar');
                // $role->givePermissionTo($permission);

                // $role->givePermissionTo(['guard_name'=>'web','name'=>'agregar']);


                //$user->syncPermissions();  // Borra todos los permisos del Rol
                //$user->givePermissionTo('agregar');


                // dd($user->getPermissionsViaRoles());
                // $role = Role::findByName($this->name);
                // // dd($permission);
                // $permission->assignRole($role);

                // dd($role->getPermissionsViaRoles('Usuario'));

                // $a= $role->getAllPermissions();
                // $role->syncPermissions($a);
                // // $a = User::getAllPermissions();
                // dd($role);
                // dd($role->permissions);

                // $user->hasRole('Usuario');

                // $user = User::getRole('Administrador');
                // $user = Role::syncRole('Administrador');
                // $user = Role::all(); // Trae todos los roles
                // // $user = User::getRole('Administrador');
                // $user = User::doesntHave('roles')->get();

                // $user = User::role('Administrador')->get();
                // $user = User::getRole;
                // $roles = Auth::user()->getRoleNames();
                // $permissions = $user->permissions;
                // dd($role->hasPermissionTo('areas.Agregar'));
    }

    public function Filtrar() {
        if ($this->buscar) {
            $this->roles = Roles::where('name', 'LIKE', "%" . $this->buscar . "%")
                ->where('empresa_id', '=', session('empresa_id'))
                ->get();
        } else {
            $this->roles = Roles::orderBy('name','ASC')
            ->where('empresa_id', '=', session('empresa_id'))
            ->get();
            // dd(session('empresa_id'));
        }
    }

    public function showNew() { $this->reset('name'); }

    public function showEdit($id)
    {
        $roles = Roles::find($id);
        $this->name = $roles->name;
        $this->rol_id = $id; //Establece el rol
        $this->SeleccionarModulo(1, 'Areas');
    }

    public function showDelete($id)
    {
        $roles = Roles::find($id);
        $this->name = $roles->name;
        $this->rol_id = $id;
    }

    public function destroy($id)
    {
        Roles::destroy($this->rol_id);
        $this->reset('name');
        session()->flash('mensaje', 'Se eliminó el rol.');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|unique:roles|max:255',
        ]);
        // dd($this->name);
        Roles::updateOrCreate(['id' => $this->rol_id], [
            'name' => $this->name,
            'guard_name' => 'web',
        ]);

        $this->rol_id = null;
        session()->flash('mensaje', 'Se guardó el rol.');
    }

    // public function setname($name) { $this->name = $name; dd($this->name); }

    public function SeleccionarModulo($id, $nombreModulo) {
        // dd($nombreModulo);
        unset($this->permisos);
        unset($this->permisoshabilitados);
        if($id == 0) { $this->modulo_seleccionado = null; }
        else {
            $this->modulo_seleccionado = $id;
            $this->modulo_name = $nombreModulo;

            // $sql = "Select * from permissions where name like '%".$this->modulo_name."%'";

            $sql = "SELECT * FROM permissions where name like '%" . $nombreModulo . "%'";
            // $sql = "SELECT * FROM (Select * from permissions left join role_has_permissions on permissions.id = role_has_permissions.permission_id and role_id<>".$this->rol_id . ") as a where a.role_id is not null and name like '%" . $nombreModulo . "%'";
            // $sql = "SELECT * from (Select * from permissions left join role_has_permissions on permissions.id = role_has_permissions.permission_id where role_id=".$this->rol_id.") as a WHERE a.permission_id is null;";
            // $sql="SELECT * FROM permissions
            // WHERE NOT EXISTS (
            //     SELECT * FROM permissions WHERE name LIKE '%".$this->modulo_name."%')";
            // dd($sql);

            unset($this->permisos);
            // $this->permisos = db::select($sql);
            // // dd($this->permisos);
            // $sql = 'SELECT * FROM role_has_permissions join permissions WHERE role_has_permissions.permission_id = permissions.id and role_has_permissions.role_id='.$this->rol_id." and name like '%". $nombreModulo."%'";
            // // dd($sql);
            // $this->permisoshabilitados = db::select($sql);

        //    $sql = 'SELECT permissions.*, SUBSTRING_INDEX(permissions.name, ".", 1) as grupo
        //     FROM role_has_permissions
        //     JOIN permissions ON role_has_permissions.permission_id = permissions.id
        //     WHERE role_has_permissions.role_id = ' . $this->rol_id . '
        //     AND permissions.name LIKE "%' . $nombreModulo . '%"
        //     GROUP BY grupo, permissions.name';
        // $sql = 'SELECT DISTINCT
        //     SUBSTRING_INDEX(p.name, ".", 1) as modulo, m.id, m.name as name, m.pagina, role_id, p.id as permission_id 
        //     FROM role_has_permissions rhp
        //     INNER JOIN permissions p ON rhp.permission_id = p.id
        //     INNER JOIN modulos m ON m.pagina = SUBSTRING_INDEX(p.name, ".", 1)
        //     WHERE rhp.role_id = 1
        //     GROUP BY modulo         
        //     ORDER BY modulo';

        // Busca los módulos habilitados para el rol elegido
        $sql = 'SELECT DISTINCT
            SUBSTRING_INDEX(p.name, ".", 1) as modulo, m.id, m.pagina, m.name as name, role_id
            FROM permissions p
            INNER JOIN role_has_permissions rhp ON rhp.permission_id = p.id
            inner join modulos m on m.pagina = SUBSTRING_INDEX(p.name, ".", 1)
            WHERE rhp.role_id = '.$this->rol_id;
        $this->moduloshabilitados = db::select($sql);

        // Busca todos los permisos del módulo seleccionado y cuáles de ellos están habilitados para el rol elegido
        $sql = 'SELECT SUBSTRING_INDEX(p.name, ".", 1) as modulo, p.name, p.id as permission_id, role_id
            FROM permissions p
            LEFT JOIN role_has_permissions rhp ON rhp.permission_id = p.id
            WHERE rhp.role_id = '.$this->rol_id .' and p.name like "%'.$nombreModulo.'%"';
        $this->permisoshabilitados = db::select($sql);

        // Busca todos los permisos NO HABILITADOS del módulo seleccionado
        $sql = 'SELECT SUBSTRING_INDEX(p.name, ".", 1) as modulo, p.name, p.id as permission_id, role_id
            FROM permissions p
            LEFT JOIN role_has_permissions rhp ON rhp.permission_id = p.id AND rhp.role_id = '.$this->rol_id .'
            WHERE rhp.permission_id IS NULL AND p.name like "%'.$nombreModulo.'%"';
            $permisosNoActivadoshabilitados = db::select($sql);
        $this->permisosNoActivadoshabilitados = db::select($sql);

        }
    }

    public function AgregarPermiso($permision_id) {
        $usuarios = EmpresaUsuario::where('rol_id', $this->rol_id)->get();  //Busca los usuarios que tienen el mismo rol elegido
        if(!count($usuarios)) { session()->flash('mensajeFaltaRol', 'Asegurese de relacionar el usuario con la empresa en EmpresaUsuarios.'); }
        $permiso_a_agregar = Permission::where('id',$permision_id)->get('name'); // Busca los datos del permiso a agregar
        foreach($usuarios as $usuario) {    // Itera los usuarios
            $user = User::find($usuario->user_id);   // Busca a cada usuario y
            $aux = 'SELECT * FROM model_has_permissions WHERE permission_id='. $permision_id .' and model_id='.$usuario->user_id;
            // dd($user);
            $bux = db::select($aux); //IMPACTA EN LOS TAGAS QUE APARECEN EN PANTALLA
            if(count($bux)) {
                session()->flash('mensajePermisoRepetido', 'El permiso que intenta agregar ya se encontraba dado de alta.');
            } else {
                // $aux = 'INSERT INTO model_has_permissions (permission_id, model_type, model_id) VALUES (' . $permision_id . ', \'App\Models\User\',' . $usuario->user_id . ')';
                // $bux = db::select($aux);

                //Permission::create(['guard_name' => 'web', 'name' => $permiso_a_agregar[0]->name]);
                // dd($permision_id.'-'.$permiso_a_agregar[0]);

                $b = $user->givePermissionTo($permiso_a_agregar[0]->name);  // Asigna el permiso en la tabla model_has_permissions IMPACTA EN EL MENU IZQUIERDO
            }
            $aux = 'SELECT * FROM role_has_permissions WHERE permission_id='. $permision_id .' and role_id='.$this->rol_id;
            $bux = db::select($aux); //IMPACTA EN LOS TAGAS QUE APARECEN EN PANTALLA
            if(count($bux)) {
                session()->flash('mensajePermisoRepetido', 'El permiso que intenta agregar ya se encontraba dado de alta.');
            } else {
                $aux = 'INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('.$permision_id.', '.$this->rol_id . ')';
                $bux = db::select($aux);
            }
            // $role = Role::findByName($this->name);
            // $permission = \Spatie\Permission\Models\Permission::findByName($permiso_a_agregar[0]->name, 'web');
            // $permission->assignRole($role->name); // Asegúrate de que coincidan con el mismo guard
        }

        // $role = Role::findByName($this->name);
        // $role->givePermissionTo('areas.ver');
        // $role = Role::findByName($this->name);
        // $permissions = Permission::all(); // trae una lista de todos los permisos
        // $permission = Permission::findById($idPermiso);
        // $user->syncPermissions($permission);  // Agrega sólo el permiso elegido
        // $user->syncPermissions($permissions);  // Borra todos los permisos del Rol

        //Recarga la información
        $this->SeleccionarModulo($this->modulo_seleccionado,$this->modulo_name);
    }

    public function EliminarPermiso($permision_id, $role_id) {
        $usuarios = EmpresaUsuario::where('rol_id', $this->rol_id)->get();  //Busca los usuarios que tienen el mismo rol elegido
        $permiso_a_eliminar = Permission::where('id',$permision_id)->get('name'); // Busca los datos del permiso a eliminar
        foreach($usuarios as $usuario) {    // Itera los usuarios
            $user = User::find($usuario->user_id);   // Busca a cada usuario y
            // dd($permision_id);
            $b = $user->revokePermissionTo($permiso_a_eliminar[0]->name);  // Asigna el permiso en la tabla model_has_permissions IMPACTA EN EL MENU IZQUIERDO

            $a = 'DELETE FROM role_has_permissions WHERE permission_id = '. $permision_id .' and role_id = '. $role_id;
            db::select($a); //IMPACTA EN LOS TAGAS QUE APARECEN EN PANTALLA
        }

        //Recarga la información
        $this->SeleccionarModulo($this->modulo_seleccionado,$this->modulo_name);
    }
}
