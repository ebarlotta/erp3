<?php

namespace Database\Seeders;

use App\Models\Modulo;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ModSeederNewUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public string $user_id;
    public int $empresa_id;

    public function run()
    {
        // Relaciona al usuario con los módulos de la empresa de Prueba
        $array = [
            'compras',
            'ventas',
            'actores',
            'clientes',
            'proveedores',
            'productos',
            'cuentas',
            'areas',
            'elementos',
            'imprentapedidos',
            'imprentaenvios',
            'imprentaadmin'
        ];

        // $user = User::find($this->user_id);

        foreach($array as $m) {
            // $user->givePermissionTo($m.'.Agregar'); // Agrega en model_has_permissions
            // $user->givePermissionTo($m.'.Modificar'); // Agrega en model_has_permissions
            // $user->givePermissionTo($m.'.Eliminar'); // Agrega en model_has_permissions
            // $user->givePermissionTo($m.'.Ver'); // Agrega en model_has_permissions
            $modulo = strtolower($m.'%');

            // $modulo = strtolower('compras.%');

            $adicionales = Permission::whereRaw("name LIKE ?", [$modulo])->get();
            foreach ($adicionales as $adic) {
                DB::table('model_has_permissions')->insert([
                    'permission_id' => $adic->id,
                    'model_type' => 'App\Models\User',
                    'model_id' => $this->user_id
                ]);
                DB::table('role_has_permissions')->insert([
                    'permission_id' => $adic->id,
                    'role_id' => 2
                ]);
            }
        }

        // DB::table('areas')->insert(['name'=>'Administración','empresa_id'=>2,'habilitada'=>1]);
        // DB::table('areas')->insert(['name'=>'Médica','empresa_id'=>2,'habilitada'=>1]);
        // DB::table('areas')->insert(['name'=>'Social','empresa_id'=>2,'habilitada'=>1]);
        // DB::table('areas')->insert(['name'=>'Historia De Vida','empresa_id'=>2,'habilitada'=>1]);
        // DB::table('areas')->insert(['name'=>'Pagos','empresa_id'=>2,'habilitada'=>1]);
        // DB::table('areas')->insert(['name'=>'Nutricional','empresa_id'=>2,'habilitada'=>1]);

    }
}


