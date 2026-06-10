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

        // Permisos de Módulos administrativos Generales
        // acá van todos los sistemas o subsistemas para que puedan ser visibles en el menú de cada empresa, pero no necesariamente con permisos para verlos o modificarlos
        DB::table('permissions')->insert(['name'=>strtolower('Administracion') . '.Ver','guard_name' => 'web']);
        DB::table('permissions')->insert(['name'=>strtolower('ERP') . '.Ver','guard_name' => 'web']);
        DB::table('permissions')->insert(['name'=>strtolower('Geri') . '.Ver','guard_name' => 'web']);
        DB::table('permissions')->insert(['name'=>strtolower('Imprenta') . '.Ver','guard_name' => 'web']);
        DB::table('permissions')->insert(['name'=>strtolower('Localizacion') . '.Ver','guard_name' => 'web']);
        DB::table('permissions')->insert(['name'=>strtolower('Carrito') . '.Ver','guard_name' => 'web']);
        DB::table('permissions')->insert(['name'=>strtolower('Generales') . '.Ver','guard_name' => 'web']);


        $i = 1; // Empresa Administrativa
        $modulos = Modulo::whereIn('name', [ 'Dashboard', 'Administracion', 'Estados Civiles', 'TiposDeDocumentos', 'Localizacion', 'Tablas', 'Escolaridades', 'tablas-edit', 'tablasver'
        ])->get();

        foreach($modulos as $modulo) {
            DB::table('permissions')->insert(['name'=>strtolower($modulo->pagina) . '.Agregar','guard_name' => 'web'.$i]);
            DB::table('permissions')->insert(['name'=>strtolower($modulo->pagina) . '.Eliminar','guard_name' => 'web'.$i]);
            DB::table('permissions')->insert(['name'=>strtolower($modulo->pagina) . '.Modificar','guard_name' => 'web'.$i]);
            DB::table('permissions')->insert(['name'=>strtolower($modulo->pagina) . '.Ver','guard_name' => 'web'.$i]);

            // Agregar los permisos para el menú de la izquierda
            DB::table('permissions')->insertOrIgnore(['name'=>strtolower($modulo->pagina) . '.Ver','guard_name' => 'web']);
        }

        $i = 2; // ERP
        $modulos = Modulo::whereIn('name', [ 'Dashboard', 'Administracion', 'areas', 'Categorias', 'Cuentas', 'Elementos', 'Estados', 'Listas', 'Proveedores', 'Unidades', 'Producto', 'Clientes', 'Productos', 'Categoria de Productos', 'Categoria Profesional', 'Compras', 'Compra Simple', 'Empleados', 'Haberes', 'Ventas', 'Venta Simple', 'Ventas Mostrador', 'Cart', 'Informes', 'Payments', 'Tags',
        ])->get();

        foreach($modulos as $modulo) {
            DB::table('permissions')->insert(['name'=>strtolower($modulo->pagina) . '.Agregar','guard_name' => 'web'.$i]);
            DB::table('permissions')->insert(['name'=>strtolower($modulo->pagina) . '.Eliminar','guard_name' => 'web'.$i]);
            DB::table('permissions')->insert(['name'=>strtolower($modulo->pagina) . '.Modificar','guard_name' => 'web'.$i]);
            DB::table('permissions')->insert(['name'=>strtolower($modulo->pagina) . '.Ver','guard_name' => 'web'.$i]);

            // Agregar los permisos para el menú de la izquierda
            DB::table('permissions')->insertOrIgnore(['name'=>strtolower($modulo->pagina) . '.Ver','guard_name' => 'web']);
        }


        $i = 3; // Imprenta
        $modulos = Modulo::whereIn( 'name', [ 'Dashboard','areas','Categorias','Cuentas','Elementos','Estados','Listas','Proveedores','Unidades','Producto','Clientes','Productos','Administracion','Enviar','Pedidos',
        ])->get();

        foreach($modulos as $modulo) {
            DB::table('permissions')->insert(['name'=>strtolower($modulo->pagina) . '.Agregar','guard_name' => 'web'.$i]);
            DB::table('permissions')->insert(['name'=>strtolower($modulo->pagina) . '.Eliminar','guard_name' => 'web'.$i]);
            DB::table('permissions')->insert(['name'=>strtolower($modulo->pagina) . '.Modificar','guard_name' => 'web'.$i]);
            DB::table('permissions')->insert(['name'=>strtolower($modulo->pagina) . '.Ver','guard_name' => 'web'.$i]);

            // Agregar los permisos para el menú de la izquierda
            DB::table('permissions')->insertOrIgnore(['name'=>strtolower($modulo->pagina) . '.Ver','guard_name' => 'web']);
        }


        $i = 4; // Gastronomica
        $modulos = Modulo::whereIn( 'name', [ 'Dashboard', 'Administracion', 'areas', 'Categorias', 'Cuentas', 'Elementos', 'Estados', 'Listas', 'Proveedores', 'Unidades', 'Producto', 'Clientes', 'Productos', 'menu',
        ])->get();

        foreach($modulos as $modulo) {
            DB::table('permissions')->insert(['name'=>strtolower($modulo->pagina) . '.Agregar','guard_name' => 'web'.$i]);
            DB::table('permissions')->insert(['name'=>strtolower($modulo->pagina) . '.Eliminar','guard_name' => 'web'.$i]);
            DB::table('permissions')->insert(['name'=>strtolower($modulo->pagina) . '.Modificar','guard_name' => 'web'.$i]);
            DB::table('permissions')->insert(['name'=>strtolower($modulo->pagina) . '.Ver','guard_name' => 'web'.$i]);

            // Agregar los permisos para el menú de la izquierda
            DB::table('permissions')->insertOrIgnore(['name'=>strtolower($modulo->pagina) . '.Ver','guard_name' => 'web']);
        }


        $i = 5; // Inmobiliaria
        $modulos = Modulo::whereIn( 'name', [ 'Dashboard', 'Administracion', 'areas', 'Categorias', 'Cuentas', 'Elementos', 'Estados', 'Listas', 'Proveedores', 'Unidades', 'Producto', 'Clientes', 'Productos', 'Configuraciones', 'Tasaciones', 'Coeficientes', 'Alta Propiedades', 'Archivos', 'Listado Propiedades', 'Tipos Inmuebles', 'Zonas', 'Bienes', 'Garantes', 'Propietarios', 'Contratos', 'Ajustes',
        ])->get();

        foreach($modulos as $modulo) {
            DB::table('permissions')->insert(['name'=>strtolower($modulo->pagina) . '.Agregar','guard_name' => 'web'.$i]);
            DB::table('permissions')->insert(['name'=>strtolower($modulo->pagina) . '.Eliminar','guard_name' => 'web'.$i]);
            DB::table('permissions')->insert(['name'=>strtolower($modulo->pagina) . '.Modificar','guard_name' => 'web'.$i]);
            DB::table('permissions')->insert(['name'=>strtolower($modulo->pagina) . '.Ver','guard_name' => 'web'.$i]);

            // Agregar los permisos para el menú de la izquierda
            DB::table('permissions')->insertOrIgnore(['name'=>strtolower($modulo->pagina) . '.Ver','guard_name' => 'web']);
        }




        // // Permisos de Módulos administrativos específicos de cada empresa
        // $modulos=Modulo::all();

        // $modulos = array(  'GestionModulo', 'Disenar', 'CompraSimple', 'Informe', 'Persona', 'Carts');

        // for($i=1;$i<=5;$i++) {
        //     foreach($modulos as $modulo) {
        //         DB::table('permissions')->insert(['name'=>strtolower($modulo->pagina) . '.Agregar','guard_name' => 'web'.$i]);
        //         DB::table('permissions')->insert(['name'=>strtolower($modulo->pagina) . '.Eliminar','guard_name' => 'web'.$i]);
        //         DB::table('permissions')->insert(['name'=>strtolower($modulo->pagina) . '.Modificar','guard_name' => 'web'.$i]);
        //         DB::table('permissions')->insert(['name'=>strtolower($modulo->pagina) . '.Ver','guard_name' => 'web'.$i]);

        //         // Agregar los permisos para el menú de la izquierda
        //         DB::table('permissions')->insertOrIgnore(['name'=>strtolower($modulo->pagina) . '.Ver','guard_name' => 'web']);
        //     }
        // }
        // $modulos = array(  'GestionModulo', 'Disenar', 'CompraSimple', 'Informe', 'Persona', 'Carts');

        // // // $modulos = array(  'Carts','Persona','Informe','Diseñar','EmpresaUsuarios', 'PersonActivo', 'ModuloUsuarios', 'Modulo', 'Roles', 'Localidades', 'Nacionalidad', 'Elementos', 'Tablas', 'Categoriaprofesional', 'Beneficios', 'EstadosCiviles', 'TiposDePersonas', 'TiposDeDocumentos', 'PersonActivo', 'Escolaridades', 'Medicamentos');

        // // Permisos de Módulos administrativos ADICIONALES de cada empresa
        // foreach($modulos as $modulo) {
        //     DB::table('permissions')->insert(['name'=>strtolower($modulo) . '.Agregar','guard_name' => 'web'.$i]);
        //     DB::table('permissions')->insert(['name'=>strtolower($modulo) . '.Eliminar','guard_name' => 'web'.$i]);
        //     DB::table('permissions')->insert(['name'=>strtolower($modulo) . '.Modificar','guard_name' => 'web'.$i]);
        //     DB::table('permissions')->insert(['name'=>strtolower($modulo) . '.Ver','guard_name' => 'web'.$i]);

        //     // Agregar los permisos para el menú de la izquierda
        //     DB::table('permissions')->insertOrIgnore(['name'=>strtolower($modulo) . '.Ver','guard_name' => 'web']);
        // }


        // // // // DB::table('permissions')->insert(['name'=>strtolower('Informe') . '.Ver','guard_name' => 'web']);


    }
}
