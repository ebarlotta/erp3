<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('ivas')->truncate();
        // Permisos adicionales para los módulos de Compras y Ventas
        DB::table('permissions')->insert(['name'=>'VentasAgregarProductos.Ver','guard_name'=>'web']);
        DB::table('permissions')->insert(['name'=>'VentasAgregarProductos.Agregar','guard_name'=>'web']);

        DB::table('permissions')->insert(['name'=>'VentasGenerarFactura.Ver','guard_name'=>'web']);
        DB::table('permissions')->insert(['name'=>'VentasGenerarFactura.Agregar','guard_name'=>'web']);

        DB::table('permissions')->insert(['name'=>'ComprasAgregarProductos.Ver','guard_name'=>'web']);
        DB::table('permissions')->insert(['name'=>'ComprasAgregarProductos.Agregar','guard_name'=>'web']);

    }

    public function AsignarRolesAlaEmpresa($empresa_id) {
        DB::table('roles')->insert(['name' => $empresa_id . '-Administrador','guard_name' => 'web', 'empresa_id' => $empresa_id]);     // id=2
        DB::table('roles')->insert(['name' => $empresa_id . '-Gestor','guard_name' => 'web', 'empresa_id' => $empresa_id]);            // id=3
        DB::table('roles')->insert(['name' => $empresa_id . '-Usuario','guard_name' => 'web', 'empresa_id' => $empresa_id]);           // id=4
        DB::table('roles')->insert(['name' => $empresa_id . '-Free','guard_name' => 'web', 'empresa_id' => $empresa_id]);              // id=5
    }

}
