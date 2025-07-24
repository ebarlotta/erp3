<?php

namespace Database\Seeders;

use App\Models\Modulo;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class ModSeederNewUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public string $user_id;

    public function run()
    {
        // Relaciona al usuario con los módulos de la empresa de Prueba
        $array = ['compras','ventas'];
        foreach($array as $m) {
            $modulo = strtolower($m.'%');
            // $modulo = strtolower('compras.%');
            $adicionales = Permission::whereRaw("name LIKE ?", [$modulo])->get();
            foreach ($adicionales as $adic) {
                DB::table('model_has_permissions')->insert([
                    'permission_id' => $adic->id,
                    'model_type' => 'App\Models\User',
                    'model_id' => Auth::id()
                ]);
            }
        }
    }
}


