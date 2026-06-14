<?php

namespace Database\Seeders\erp;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CuentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $empresa_id=null;

    public function run() {
        // if (!$this->empresa_id) { $this->empresa_id = 1; } // Valor predeterminado si no se ha especificado }
        // else { $this->runForEmpresa($this->empresa_id); }  
    }

    public function runForEmpresa($empresa_id)
    {
        DB::table('cuentas')->insert(['name'=>'Efectivo','empresa_id'=>$empresa_id]);
        DB::table('cuentas')->insert(['name'=>'Electricidad','empresa_id'=>$empresa_id]);
        DB::table('cuentas')->insert(['name'=>'Agua','empresa_id'=>$empresa_id]);
        DB::table('cuentas')->insert(['name'=>'Servicio','empresa_id'=>$empresa_id]);
        DB::table('cuentas')->insert(['name'=>'Educación','empresa_id'=>$empresa_id]);
    }
}
