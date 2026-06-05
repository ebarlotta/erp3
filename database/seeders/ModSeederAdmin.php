<?php

namespace Database\Seeders;

use App\Models\Modulo;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\EmpresaUsuario;

class ModSeederAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert(['name' => 'SuperAdministrador','guard_name' => 'web1', 'empresa_id' => 1]);  // Solo a la empresa administradora

        $a = new PermissionsSeeder();
        $a->AsignarRolesAlaEmpresa(1);   // Empresa de Administración

        //Asigna al Usuario Administrador todos los permisos
        $permisos = Permission::where('guard_name','=','web1')->get();
        $role = Role::find(1); // Rol Administrador

        if ($role) {
            foreach($permisos as $permiso) {
                DB::table('role_has_permissions')->insert(['permission_id' => $permiso->id, 'role_id' =>  $role->id]);
            }
            // $role->syncPermissions($permisos,'web1');
            echo "Permisos sincronizados correctamente";
        ////} else {
////            echo "Error: No se encontró el rol con ID 1";
////            // Crear el rol si no existe
////            $role = Role::create(['name' => 'Administrador', 'guard_name' => 'web']);
////            // $role = Role::create(['name' => '1-Administrador', 'guard_name' => 'web']);
////            $role->syncPermissions($permisos);
       }


//         // Relaciona la empresa Administración con el usuario Administrador
            DB::table('empresa_usuarios')->insert(['empresa_id'=>1,'user_id'=>1,'rol_id'=>1]);


//         // Relaciona a la empresa Administración con todos los módulos administrativos
            DB::table('modulo_usuarios')->insert(['modulo_id'=>1,'user_id'=>1,'modificado_user_id'=>1]);
            DB::table('modulo_usuarios')->insert(['modulo_id'=>2,'user_id'=>1,'modificado_user_id'=>1]);
            DB::table('modulo_usuarios')->insert(['modulo_id'=>3,'user_id'=>1,'modificado_user_id'=>1]);
            DB::table('modulo_usuarios')->insert(['modulo_id'=>4,'user_id'=>1,'modificado_user_id'=>1]);
            DB::table('modulo_usuarios')->insert(['modulo_id'=>5,'user_id'=>1,'modificado_user_id'=>1]);
            DB::table('modulo_usuarios')->insert(['modulo_id'=>6,'user_id'=>1,'modificado_user_id'=>1]);
            DB::table('modulo_usuarios')->insert(['modulo_id'=>7,'user_id'=>1,'modificado_user_id'=>1]);

        for($i=1;$i<=34;$i++) {
            DB::table('model_has_permissions')->insert(['permission_id'=>$i,'model_type'=>'App\Models\User','model_id'=>1]);
        }
        //  DB::table('roles')->insert(['name' => 'SuperAdministrador','guard_name' => 1, 'empresa_id' => 1]);  // Solo a la empresa administradora
        // $this->AsignarRolesAlaEmpresa(1);   // Empresa de Administración

        $user = User::find(1);   // Busca al usuario Administrador y le asigna el rol de SuperAdministrador
        // $user->assignRole('SuperAdministrador'); // Agrega en model_has_roles
        EmpresaUsuario::create(['empresa_id' => 2,'user_id' => $user->id,'rol_id' => 1]);
        //Relaciona el usuario creado con la empresa Imprenta
        EmpresaUsuario::create(['empresa_id' => 3,'user_id' => $user->id,'rol_id' => 1]);
        //Relaciona el usuario creado con la empresa de Gastronómica
        EmpresaUsuario::create(['empresa_id' => 4,'user_id' => $user->id,'rol_id' => 1]);
        //Relaciona el usuario creado con la empresa Inmobiliaria
        EmpresaUsuario::create(['empresa_id' => 5,'user_id' => $user->id,'rol_id' => 1]);

        DB::table('roles')->insert(['name'=>'Administrador', 'guard_name' => 'web2', 'empresa_id'=>2]);
        DB::table('roles')->insert(['name'=>'Gestor', 'guard_name' => 'web2', 'empresa_id'=>2]);
        DB::table('roles')->insert(['name'=>'Usuario', 'guard_name' => 'web2', 'empresa_id'=>2]);
        DB::table('roles')->insert(['name'=>'Free', 'guard_name' => 'web2', 'empresa_id'=>2]);

        DB::table('roles')->insert(['name'=>'Administrador', 'guard_name' => 'web3', 'empresa_id'=>3]);
        DB::table('roles')->insert(['name'=>'Gestor', 'guard_name' => 'web3', 'empresa_id'=>3]);
        DB::table('roles')->insert(['name'=>'Usuario', 'guard_name' => 'web3', 'empresa_id'=>3]);
        DB::table('roles')->insert(['name'=>'Free', 'guard_name' => 'web3', 'empresa_id'=>3]);

        DB::table('roles')->insert(['name'=>'Administrador', 'guard_name' => 'web4', 'empresa_id'=>4]);
        DB::table('roles')->insert(['name'=>'Gestor', 'guard_name' => 'web4', 'empresa_id'=>4]);
        DB::table('roles')->insert(['name'=>'Usuario', 'guard_name' => 'web4', 'empresa_id'=>4]);
        DB::table('roles')->insert(['name'=>'Free', 'guard_name' => 'web4', 'empresa_id'=>4]);

        DB::table('roles')->insert(['name'=>'Administrador', 'guard_name' => 'web5', 'empresa_id'=>5]);
        DB::table('roles')->insert(['name'=>'Gestor', 'guard_name' => 'web5', 'empresa_id'=>5]);
        DB::table('roles')->insert(['name'=>'Usuario', 'guard_name' => 'web5', 'empresa_id'=>5]);
        DB::table('roles')->insert(['name'=>'Free', 'guard_name' => 'web5', 'empresa_id'=>5]);


        /*DB::table('roles')->insert(['name'=>'2-Administrador', 'guard_name' => 'web', 'empresa_id'=>2]);
        DB::table('roles')->insert(['name'=>'2-Gestor', 'guard_name' => 'web', 'empresa_id'=>2]);
        DB::table('roles')->insert(['name'=>'2-Usuario', 'guard_name' => 'web', 'empresa_id'=>2]);
        DB::table('roles')->insert(['name'=>'2-Free', 'guard_name' => 'web', 'empresa_id'=>2]);

        DB::table('roles')->insert(['name'=>'3-Administrador', 'guard_name' => 'web', 'empresa_id'=>3]);
        DB::table('roles')->insert(['name'=>'3-Gestor', 'guard_name' => 'web', 'empresa_id'=>3]);
        DB::table('roles')->insert(['name'=>'3-Usuario', 'guard_name' => 'web', 'empresa_id'=>3]);
        DB::table('roles')->insert(['name'=>'3-Free', 'guard_name' => 'web', 'empresa_id'=>3]);

        DB::table('roles')->insert(['name'=>'4-Administrador', 'guard_name' => 'web', 'empresa_id'=>4]);
        DB::table('roles')->insert(['name'=>'4-Gestor', 'guard_name' => 'web', 'empresa_id'=>4]);
        DB::table('roles')->insert(['name'=>'4-Usuario', 'guard_name' => 'web', 'empresa_id'=>4]);
        DB::table('roles')->insert(['name'=>'4-Free', 'guard_name' => 'web', 'empresa_id'=>4]);

        DB::table('roles')->insert(['name'=>'5-Administrador', 'guard_name' => 'web', 'empresa_id'=>5]);
        DB::table('roles')->insert(['name'=>'5-Gestor', 'guard_name' => 'web', 'empresa_id'=>5]);
        DB::table('roles')->insert(['name'=>'5-Usuario', 'guard_name' => 'web', 'empresa_id'=>5]);
        DB::table('roles')->insert(['name'=>'5-Free', 'guard_name' => 'web', 'empresa_id'=>5]);
        */

        // $uu = new ModSeederNewUser();
        // $uu->user_id = $user->id;
        // $uu->run();

        // Le asigna al usuario Administrador todos los permisos de la empresa Administración
        $user = User::find(1);   // Busca a cada usuario y
        foreach($permisos as $permiso) {
            // $user->givePermissionTo($permiso->name); // Agrega en model_has_permissions
            // $aux = 'INSERT INTO role_has_permissions (permission_id, role_id) VALUES ('.$permiso->id.', 1)';  // Agrega en role_has_permissions
            $aux = 'INSERT INTO model_has_permissions (permission_id, model_id, model_type) VALUES ('.$permiso->id.', 1, "App\Models\User")';  // Agrega en model_has_permissions
            db::select($aux);  // Agrega en model_has_permissions
        }

    }
}
