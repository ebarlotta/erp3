<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistroTipotramiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('registro_tipotramites')->insert(['nombretramite'=>'INFORME ESTADO DE DOMINIO','descripciontramite'=>'Informe de Estado de dominio','modulo'=>'informes',]);
        DB::table('registro_tipotramites')->insert(['nombretramite'=>'INFORME HISTORICO DE TITULARIDAD Y DE ESTADO DE DOMINIO','descripciontramite'=>'Informe histórico ','modulo'=>'informes',]);
        
        DB::table('registro_tipotramites')->insert(['nombretramite'=>'ACTUALIZACION DE CARROCERIA','descripciontramite'=>'Para actualizar el tipo de automotor cuando el mismo sea verificado con un tipo de carrozado distinto al registrado (consignado en el Título del Automotor y Cédula de Identificación)','modulo'=>'tramites',]);
        DB::table('registro_tipotramites')->insert(['nombretramite'=>'ALTA DE CARROCERIA','descripciontramite'=>'El alta de carrocería se otorga cuando a un automotor carece de carrocería y se le incorpora una en forma permanente','modulo'=>'tramites',]);
        DB::table('registro_tipotramites')->insert(['nombretramite'=>'ACTUALIZACION DE CARROCERIA','descripciontramite'=>'Para actualizar el tipo de automotor cuando el mismo sea verificado con un tipo de carrozado distinto al registrado (consignado en el Título del Automotor y Cédula de Identificación)','modulo'=>'tramites',]);
        DB::table('registro_tipotramites')->insert(['nombretramite'=>'ALTA DE MOTOR USADO, ARMADO FUERA DE FABRICA, GARANTIA DE FABRICACION','descripciontramite'=>'Trámite para incorporar el motor de los dominios inscriptos','modulo'=>'tramites',]);
        DB::table('registro_tipotramites')->insert(['nombretramite'=>'ALTA DE NUEVO MOTOR IMPORTADO','descripciontramite'=>'Trámite para retirar o incorporar el motor de los dominios inscriptos','modulo'=>'tramites',]);

    }
}
