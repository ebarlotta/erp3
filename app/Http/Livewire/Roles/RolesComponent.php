<?php

namespace App\Http\Livewire\Roles;

use App\Models\EmpresaUsuario;
use App\Models\Modulo;
use App\Models\Roles;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
class RolesComponent extends Component {
    public $name, $roles, $rol_id, $permisos, $permisoshabilitados, $permisosNoActivadoshabilitados, $modulo_name, $modulos, $modulo_seleccionado;
    public $buscar;
    public $moduloshabilitados;
    public $nameRol;

    // FALTA AGREGAR ROLES Y PERMISOS POR EMPRESA, NO A NIVEL GENERAL, SINO PARTICULAR Enzo

    public function render() {
        $guardName = 'web' . session('empresa_id'); $permisoExiste = Permission::where('name', 'roles.Ver')->where('guard_name', $guardName)->exists();
        if(auth()->check() && $permisoExiste && auth()->user()->hasPermissionTo('roles.Ver', $guardName)) {
        // if(auth()->check() && auth()->user()->hasPermissionTo('roles.Ver','web1')) {
            if(session('empresa_id')) {
                $this->modulos = Modulo::orderby('name')->get(); ///all();
                $this->Filtrar();
                $this->name = "Administrador";

                // $a = new PermissionsSeeder();
                // $a->AsignarRolesAlaEmpresa(2);

                return view('livewire.roles.roles-component')->extends('layouts.adminlte');
            } else { 
                return view('livewire.seleccionarempresa')->extends('layouts.adminlte'); 
            }
        } else {
            return view('SinPermiso')->extends('layouts.adminlte');
        }
    }

    public function Filtrar() {
        if ($this->buscar) {
            $this->roles = Roles::where('name', 'LIKE', "%" . $this->buscar . "%")
                ->where('empresa_id', '=', session('empresa_id'))
                ->where('guard_name', '=', 'web'.session('empresa_id'))
                ->get();
        } else {
            $this->roles = Roles::orderBy('name','ASC')
            ->where('empresa_id', '=', session('empresa_id'))
            ->where('guard_name', '=', 'web'.session('empresa_id'))
            ->get();
        }
    }

    public function showNew() { $this->reset('name'); }

    public function showEdit($id)
    {
        $roles = Roles::find($id);
        $this->nameRol = $roles->name;
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
        Roles::updateOrCreate(['id' => $this->rol_id], [
            'name' => $this->name,
            'guard_name' => 'web'.session('empresa_id'),
        ]);

        $this->rol_id = null;
        session()->flash('mensaje', 'Se guardó el rol.');
    }

    // public function setname($name) { $this->name = $name; dd($this->name); }

    public function SeleccionarModulo($id, $nombreModulo) {
        unset($this->permisos);
        unset($this->permisoshabilitados);
        if($id == 0) { 
            $this->modulo_seleccionado = null; 
        } else {
            $this->modulo_seleccionado = $id;
            $this->modulo_name = $nombreModulo;

            $sql = "SELECT * FROM permissions where name like '%" . $nombreModulo . "%'";
            unset($this->permisos);

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
                WHERE rhp.role_id = '.$this->rol_id .' 
                AND p.guard_name = "web'. session("empresa_id") . '"
                AND p.name like "%'.$nombreModulo.'%"';
            $this->permisoshabilitados = db::select($sql);

            // Busca todos los permisos NO HABILITADOS del módulo seleccionado
            $sql = 'SELECT SUBSTRING_INDEX(p.name, ".", 1) as modulo, p.name, p.id as permission_id, role_id, guard_name
                FROM permissions p
                LEFT JOIN role_has_permissions rhp ON rhp.permission_id = p.id 
                AND rhp.role_id = '.$this->rol_id .'
                WHERE rhp.permission_id IS NULL 
                AND p.guard_name = "web'. session("empresa_id") . '"
                AND p.name like "%'.$nombreModulo.'%"';
                $permisosNoActivadoshabilitados = db::select($sql);
            $this->permisosNoActivadoshabilitados = db::select($sql);
        }
    }

    public function AgregarPermiso($permision_id) {
        $usuarios = EmpresaUsuario::where('rol_id','=', $this->rol_id)->get();  //Busca los usuarios que tienen el mismo rol elegido
        if(!count($usuarios)) { session()->flash('mensajeFaltaRol', 'Asegurese de relacionar el usuario con la empresa en Empresa y Usuarios.'); }
        $permiso_a_agregar = Permission::where('id',$permision_id)->get('name'); // Busca los datos del permiso a agregar
        foreach($usuarios as $usuario) {    // Itera los usuarios
            $user = User::find($usuario->user_id);   // Busca a cada usuario y
            $aux = 'SELECT * FROM model_has_permissions WHERE permission_id='. $permision_id .' and model_id='.$usuario->user_id;
            $bux = db::select($aux); //IMPACTA EN LOS TAGAS QUE APARECEN EN PANTALLA
            if(count($bux)) {
                session()->flash('mensajePermisoRepetido', 'El permiso que intenta agregar ya se encontraba dado de alta.');
            } else {
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
        }

        //Recarga la información
        $this->SeleccionarModulo($this->modulo_seleccionado,$this->modulo_name);
    }

    public function EliminarPermiso($permision_id, $role_id) {
        $usuarios = EmpresaUsuario::where('rol_id', $this->rol_id)->get();  //Busca los usuarios que tienen el mismo rol elegido
        $permiso_a_eliminar = Permission::where('id',$permision_id)->get('name'); // Busca los datos del permiso a eliminar
        foreach($usuarios as $usuario) {    // Itera los usuarios
            $user = User::find($usuario->user_id);   // Busca a cada usuario y
            // $b = $user->revokePermissionTo($permiso_a_eliminar[0]->name);  // Asigna el permiso en la tabla model_has_permissions IMPACTA EN EL MENU IZQUIERDO
            $a = 'DELETE FROM model_has_permissions WHERE permission_id = '. $permision_id .' and model_type=\'App\Models\Role\' and model_id = '. $role_id;
            db::select($a);

            $a = 'DELETE FROM role_has_permissions WHERE permission_id = '. $permision_id .' and role_id = '. $role_id;
            db::select($a); //IMPACTA EN LOS TAGAS QUE APARECEN EN PANTALLA
        }
        //Recarga la información
        $this->SeleccionarModulo($this->modulo_seleccionado,$this->modulo_name);
    }
}
