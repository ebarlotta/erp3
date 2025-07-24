<?php

namespace Database\Seeders;

use App\Models\Modulo;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class ModSeederAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Relaciona la empresa Administración con el usuario Administrador
        DB::table('empresa_usuarios')->insert(['empresa_id'=>1,'user_id'=>1,'rol_id'=>1]);


        // Relaciona a la empresa Administración con todos los módulos administrativos
        // DB::table('modulo_usuarios')->insert(['modulo_id'=>1,'user_id'=>1,'modificado_user_id'=>1]);
        DB::table('modulo_usuarios')->insert(['modulo_id'=>2,'user_id'=>1,'modificado_user_id'=>1]);
        DB::table('modulo_usuarios')->insert(['modulo_id'=>3,'user_id'=>1,'modificado_user_id'=>1]);
        DB::table('modulo_usuarios')->insert(['modulo_id'=>4,'user_id'=>1,'modificado_user_id'=>1]);
        DB::table('modulo_usuarios')->insert(['modulo_id'=>5,'user_id'=>1,'modificado_user_id'=>1]);
        DB::table('modulo_usuarios')->insert(['modulo_id'=>6,'user_id'=>1,'modificado_user_id'=>1]);
        DB::table('modulo_usuarios')->insert(['modulo_id'=>7,'user_id'=>1,'modificado_user_id'=>1]);

        for($i=1;$i<=24;$i++) {
            DB::table('model_has_permissions')->insert(['permission_id'=>$i,'model_type'=>'App\Models\User','model_id'=>1]);
        }
    }
}
