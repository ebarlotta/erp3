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

        DB::table('roles')->insert(['name' => 'SuperAdministrador','guard_name' => 1, 'empresa_id' => 1]);  // Solo a la empresa administradora

        $this->AsignarRolesAlaEmpresa(1);   // Empresa de Administración

    }

    public function AsignarRolesAlaEmpresa($empresa_id) {
        DB::table('roles')->insert(['name' => 'Administrador','guard_name' => $empresa_id, 'empresa_id' => $empresa_id]);
        DB::table('roles')->insert(['name' => 'Gestor','guard_name' => $empresa_id, 'empresa_id' => $empresa_id]);
        DB::table('roles')->insert(['name' => 'Usuario','guard_name' => $empresa_id, 'empresa_id' => $empresa_id]);
        DB::table('roles')->insert(['name' => 'Free','guard_name' => $empresa_id, 'empresa_id' => $empresa_id]);
    }

}
