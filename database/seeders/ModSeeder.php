<?php

namespace Database\Seeders;

use App\Models\Modulo;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Spatie\Permission\Models\Role;

class ModSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modulos=Modulo::all();
        $a=[];
        foreach($modulos as $modulo) {
            DB::table('permissions')->insert(['name'=>strtolower($modulo->pagina) . '.Agregar','guard_name' => 'web']);
            DB::table('permissions')->insert(['name'=>strtolower($modulo->pagina) . '.Eliminar','guard_name' => 'web']);
            DB::table('permissions')->insert(['name'=>strtolower($modulo->pagina) . '.Modificar','guard_name' => 'web']);
            DB::table('permissions')->insert(['name'=>strtolower($modulo->pagina) . '.Ver','guard_name' => 'web']);
        }
        $modulos = array(  'GestionModulo', 'Disenar', 'CompraSimple', 'Informe', 'Persona', 'Carts');

        // // $modulos = array(  'Carts','Persona','Informe','Diseñar','EmpresaUsuarios', 'PersonActivo', 'ModuloUsuarios', 'Modulo', 'Roles', 'Localidades', 'Nacionalidad', 'Elementos', 'Tablas', 'Categoriaprofesional', 'Beneficios', 'EstadosCiviles', 'TiposDePersonas', 'TiposDeDocumentos', 'PersonActivo', 'Escolaridades', 'Medicamentos');

        foreach($modulos as $modulo) {
            DB::table('permissions')->insert(['name'=>strtolower($modulo) . '.Agregar','guard_name' => 'web']);
            DB::table('permissions')->insert(['name'=>strtolower($modulo) . '.Eliminar','guard_name' => 'web']);
            DB::table('permissions')->insert(['name'=>strtolower($modulo) . '.Modificar','guard_name' => 'web']);
            DB::table('permissions')->insert(['name'=>strtolower($modulo) . '.Ver','guard_name' => 'web']);
        }

        // acá van todos los sistemas o subsistemas para que puedan ser visibles
        DB::table('permissions')->insert(['name'=>strtolower('Administracion') . '.Ver','guard_name' => 'web']);
        DB::table('permissions')->insert(['name'=>strtolower('ERP') . '.Ver','guard_name' => 'web']);
        DB::table('permissions')->insert(['name'=>strtolower('Geri') . '.Ver','guard_name' => 'web']);
        DB::table('permissions')->insert(['name'=>strtolower('Imprenta') . '.Ver','guard_name' => 'web']);
        DB::table('permissions')->insert(['name'=>strtolower('Localizacion') . '.Ver','guard_name' => 'web']);
        DB::table('permissions')->insert(['name'=>strtolower('Generales') . '.Ver','guard_name' => 'web']);
        DB::table('permissions')->insert(['name'=>strtolower('Carrito') . '.Ver','guard_name' => 'web']);
        // // // DB::table('permissions')->insert(['name'=>strtolower('Informe') . '.Ver','guard_name' => 'web']);


    }
}
