<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistroReguisitosTipotramiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('registro_reguisitos_tipotramites')->insert(['descripcionrequisitotipotramite'=>'Presentar Verificacion fisica del vehiculo','tipotramite_id'=>1,'precio'=>100,'cantidad'=>1]);
        DB::table('registro_reguisitos_tipotramites')->insert(['descripcionrequisitotipotramite'=>'Solicitud tipo "TP" -solo para Mandatarios -','tipotramite_id'=>1,'precio'=>100,'cantidad'=>1]);

        DB::table('registro_reguisitos_tipotramites')->insert(['descripcionrequisitotipotramite'=>'Lo solicita el titular, (en caso de condómino, todos los condóminos) el adquirente o sus representantes legales o apoderados','tipotramite_id'=>2,'precio'=>200,'cantidad'=>1]);
        DB::table('registro_reguisitos_tipotramites')->insert(['descripcionrequisitotipotramite'=>'Solicitud tipo "TP" -solo para Mandatarios -','tipotramite_id'=>2,'precio'=>200,'cantidad'=>1]);
        DB::table('registro_reguisitos_tipotramites')->insert(['descripcionrequisitotipotramite'=>'Verificación Física (FOR.12) y una fotografía del automotor con la carrocería incorporada, visada por la autoridad que realice la verificación física.','tipotramite_id'=>2,'precio'=>200,'cantidad'=>1]);
        DB::table('registro_reguisitos_tipotramites')->insert(['descripcionrequisitotipotramite'=>'Título del Automotor','tipotramite_id'=>2,'precio'=>200,'cantidad'=>1]);
        DB::table('registro_reguisitos_tipotramites')->insert(['descripcionrequisitotipotramite'=>'Cédula de Identificación','tipotramite_id'=>2,'precio'=>200,'cantidad'=>1]);
        DB::table('registro_reguisitos_tipotramites')->insert(['descripcionrequisitotipotramite'=>'La documentación que expida la fábrica terminal de carrocería inscripta en la Dirección Nacional','tipotramite_id'=>2,'precio'=>200,'cantidad'=>1]);
        DB::table('registro_reguisitos_tipotramites')->insert(['descripcionrequisitotipotramite'=>'Cuando la carrocería a dar de alta no proviniere de una fábrica terminal de carrocería inscripta en la Dirección Nacional le pedimos validar requisitos en el Digesto de Normas Registrales expuesta en nuestra página principal','tipotramite_id'=>2,'precio'=>200,'cantidad'=>1]);

        DB::table('registro_reguisitos_tipotramites')->insert(['descripcionrequisitotipotramite'=>'Lo solicita el titular, condómino, el adquirente o sus representantes legales o apoderados.','tipotramite_id'=>3,'precio'=>300,'cantidad'=>1]);
        DB::table('registro_reguisitos_tipotramites')->insert(['descripcionrequisitotipotramite'=>'Solicitud Tipo 12 con la verificación efectuada','tipotramite_id'=>3,'precio'=>300,'cantidad'=>1]);
        DB::table('registro_reguisitos_tipotramites')->insert(['descripcionrequisitotipotramite'=>'Documentación de origen del motor que se incorpora.','tipotramite_id'=>3,'precio'=>300,'cantidad'=>1]);
        DB::table('registro_reguisitos_tipotramites')->insert(['descripcionrequisitotipotramite'=>'Título del automotor o CAT (Constancia de asignación de titulo), cédulas expedidas o sus respectivas denuncias de extravío. En caso de existir prenda deberá presentar la notificación al acreedor prendario.','tipotramite_id'=>3,'precio'=>300,'cantidad'=>1]);

        DB::table('registro_reguisitos_tipotramites')->insert(['descripcionrequisitotipotramite'=>'Lo solicita el titular, condómino, el adquirente o sus representantes legales o apoderados.','tipotramite_id'=>4,'precio'=>400,'cantidad'=>1]);
        DB::table('registro_reguisitos_tipotramites')->insert(['descripcionrequisitotipotramite'=>'Solicitud Tipo 12 con la verificación efectuada','tipotramite_id'=>4,'precio'=>400,'cantidad'=>1]);
        DB::table('registro_reguisitos_tipotramites')->insert(['descripcionrequisitotipotramite'=>'Documentación de origen del motor que se incorpora.','tipotramite_id'=>4,'precio'=>400,'cantidad'=>1]);
        DB::table('registro_reguisitos_tipotramites')->insert(['descripcionrequisitotipotramite'=>'Título del automotor o CAT (Constancia de asignación de titulo), cédulas expedidas o sus respectivas denuncias de extravío. En caso de existir prenda deberá presentar la notificación al acreedor prendario.','tipotramite_id'=>4,'precio'=>400,'cantidad'=>1]);
        DB::table('registro_reguisitos_tipotramites')->insert(['descripcionrequisitotipotramite'=>'Triplicado de la solicitud Tipo 04 de baja del dominio anterior. En caso de ser un motor armado con diversas piezas, presentar las facturas de las partes escenciales del motor.','tipotramite_id'=>4,'precio'=>400,'cantidad'=>1]);

        DB::table('registro_reguisitos_tipotramites')->insert(['descripcionrequisitotipotramite'=>'Lo solicita el titular, condómino, el adquirente o sus representantes legales o apoderados.','tipotramite_id'=>5,'precio'=>500,'cantidad'=>1]);
        DB::table('registro_reguisitos_tipotramites')->insert(['descripcionrequisitotipotramite'=>'Solicitud Tipo 12 con la verificación efectuada','tipotramite_id'=>5,'precio'=>500,'cantidad'=>1]);
        DB::table('registro_reguisitos_tipotramites')->insert(['descripcionrequisitotipotramite'=>'Documentación de origen del motor que se incorpora.','tipotramite_id'=>5,'precio'=>500,'cantidad'=>1]);
        DB::table('registro_reguisitos_tipotramites')->insert(['descripcionrequisitotipotramite'=>'Título del automotor o CAT (Constancia de asignación de titulo), cédulas expedidas o sus respectivas denuncias de extravío. En caso de existir prenda deberá presentar la notificación al acreedor prendario.','tipotramite_id'=>5,'precio'=>500,'cantidad'=>1]);
        DB::table('registro_reguisitos_tipotramites')->insert(['descripcionrequisitotipotramite'=>'Certificado de Importacion','tipotramite_id'=>5,'precio'=>500,'cantidad'=>1]);

    }
}
