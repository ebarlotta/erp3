<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(IvaSeeder::class);
        $this->call(CondicionivaSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(SexoSeeder::class);

        DB::table('empresas')->insert(['name' => 'Administración','direccion' => 'Dirección','cuit' => '20123456789','ib' => '012345678','imagen' => 'storageimages/BarBer.png','establecimiento' => '0','telefono' => '+5492634635287','actividad' => 'Desarrollo','actividad1' => 'Software','menu' => '2','email'=>'enzobarlotta@gmail.com','habilitada'=>true,'nombretitular'=>'Enzo','dnititular'=>'1234',]);

        DB::table('empresas')->insert(['name' => 'Empresa de Prueba SA','direccion' => 'Dirección','cuit' => '20123456789','ib' => '012345678','imagen' => 'storageimages/BarBer.png','establecimiento' => '0','telefono' => '+5492634635287','actividad' => 'Desarrollo','actividad1' => 'Software','menu' => '2','email'=>'prueba@gmail.com','habilitada'=>true,'nombretitular'=>'Enzo','dnititular'=>'1234',]);

        DB::table('roles')->insert(['name' => 'Administrador','guard_name' => 'web',]);
        DB::table('roles')->insert(['name' => 'Usuario','guard_name' => 'web',]);
        DB::table('roles')->insert(['name' => 'Free','guard_name' => 'web',]);

        $this->call(ModuloSeeder::class);
        $this->call(EmpresaModuloSeeder::class);

        $this->call(EscolaridadesSeeder::class);

        // $this->call(TipoDePersonaSeeder::class);
        DB::table('tipo_de_personas')->insert(['tipodepersona'=>'Agente',]);
        DB::table('tipo_de_personas')->insert(['tipodepersona'=>'Referente',]);
        DB::table('tipo_de_personas')->insert(['tipodepersona'=>'Personal',]);
        DB::table('tipo_de_personas')->insert(['tipodepersona'=>'Proveedor',]);
        DB::table('tipo_de_personas')->insert(['tipodepersona'=>'Cliente',]);
        DB::table('tipo_de_personas')->insert(['tipodepersona'=>'Vendedor',]);
        DB::table('tipo_de_personas')->insert(['tipodepersona'=>'Empresa',]);
        // $this->call(EstadosCivilesSeeder::class);
        DB::table('estados_civiles')->insert(['estadocivil'=>'Casado/a',]);
        DB::table('estados_civiles')->insert(['estadocivil'=>'Viudo/a',]);
        DB::table('estados_civiles')->insert(['estadocivil'=>'Separado/a',]);
        // $this->call(TiposDocumentosSeeder::class);
        DB::table('tipos_documentos')->insert(['tipodocumento'=>'DNI',]);
        DB::table('tipos_documentos')->insert(['tipodocumento'=>'LC',]);
        // $this->call(BeneficiosSeeder::class);
        DB::table('beneficios')->insert(['descripcionbeneficio'=>'PARTICULAR',]);
        DB::table('beneficios')->insert(['descripcionbeneficio'=>'PAMI',]);
        // $this->call(PersonActivoSeeder::class);
        DB::table('person_activos')->insert(['estado'=>'Alta',]);
        DB::table('person_activos')->insert(['estado'=>'Baja',]);
        DB::table('person_activos')->insert(['estado'=>'En proceso de Baja',]);
        // $this->call(NacionalidadSeeder::class);
        DB::table('nacionalidads')->insert(['nacionalidad_descripcion'=>'Argentina',]);
        DB::table('nacionalidads')->insert(['nacionalidad_descripcion'=>'Española',]);
        DB::table('nacionalidads')->insert(['nacionalidad_descripcion'=>'Italiana',]);
        DB::table('nacionalidads')->insert(['nacionalidad_descripcion'=>'Otra',]);
        // $this->call(ProvinciasSeeder::class);
        DB::table('provincias')->insert(['provincia_descripcion'=>'Mendoza','nacionalidads_id'=>1]);
        DB::table('provincias')->insert(['provincia_descripcion'=>'San Juan','nacionalidads_id'=>1]);
        DB::table('provincias')->insert(['provincia_descripcion'=>'San Luis','nacionalidads_id'=>1]);
        // $this->call(LocalidadesSeeder::class);
        DB::table('localidades')->insert(['localidad_descripcion'=>'Ciudad','localidad_cp'=>5500,'provincia_id'=>1]);
        DB::table('localidades')->insert(['localidad_descripcion'=>'San Martín','localidad_cp'=>5570,'provincia_id'=>1]);
        DB::table('localidades')->insert(['localidad_descripcion'=>'Palmira','localidad_cp'=>5570,'provincia_id'=>1]);
        DB::table('localidades')->insert(['localidad_descripcion'=>'Rivadavia','localidad_cp'=>5570,'provincia_id'=>1]);
        DB::table('localidades')->insert(['localidad_descripcion'=>'Junín','localidad_cp'=>5570,'provincia_id'=>1]);
        // $this->call(GradoDependenciaSeeder::class);
        DB::table('grado_dependencias')->insert(['gradodependenciaDescripcion'=>'Autoválido']);
        DB::table('grado_dependencias')->insert(['gradodependenciaDescripcion'=>'Severa']);
        // $this->call(MotivosEgresosSeeder::class);
        DB::table('motivos_egresos')->insert(['motivoegresoDescripcion'=>'Fallecimiento']);
        DB::table('motivos_egresos')->insert(['motivoegresoDescripcion'=>'Traslado a Domicilio']);
        DB::table('motivos_egresos')->insert(['motivoegresoDescripcion'=>'Traslado a II Nivel']);
        // $this->call(CamasSeeder::class);
        DB::table('camas')->insert(['NroHabitacion'=>0,'NroCama'=>0,'EstadoCama'=>0,'SexoCama'=>0,'empresa_id'=>1]);
        DB::table('camas')->insert(['NroHabitacion'=>1,'NroCama'=>1,'EstadoCama'=>1,'SexoCama'=>1,'empresa_id'=>1]);
        DB::table('camas')->insert(['NroHabitacion'=>1,'NroCama'=>2,'EstadoCama'=>1,'SexoCama'=>0,'empresa_id'=>1]);
        DB::table('camas')->insert(['NroHabitacion'=>1,'NroCama'=>3,'EstadoCama'=>0,'SexoCama'=>1,'empresa_id'=>1]);
        DB::table('camas')->insert(['NroHabitacion'=>2,'NroCama'=>4,'EstadoCama'=>0,'SexoCama'=>0,'empresa_id'=>1]);
        // $this->call(PeriodoSeeder::class);
        DB::table('periodos')->insert(['nombreperiodo'=>'Mensual']);
        DB::table('periodos')->insert(['nombreperiodo'=>'Bimestral']);
        DB::table('periodos')->insert(['nombreperiodo'=>'Trimestral']);
        DB::table('periodos')->insert(['nombreperiodo'=>'Cuatrimestral']);
        DB::table('periodos')->insert(['nombreperiodo'=>'Semestral']);
        DB::table('periodos')->insert(['nombreperiodo'=>'Anual']);
        // $this->call(EscalaSeeder::class);
        DB::table('escalas')->insert(['nombreescala'=>'Lógica','tipodatos'=>'numerico','minimo'=>0,'maximo'=>1,'empresa_id'=>1]);
        DB::table('escalas')->insert(['nombreescala'=>'Numérica','tipodatos'=>'numerico','minimo'=>0,'maximo'=>1,'empresa_id'=>1]);
        DB::table('escalas')->insert(['nombreescala'=>'Porcentaje','tipodatos'=>'numerico','minimo'=>0,'maximo'=>100,'empresa_id'=>1]);
        // $this->call(SexoSeeder::class);
        // DB::table('sexos')->insert(['nombresexo'=>'Masculino',]);
        // DB::table('sexos')->insert(['nombresexo'=>'Femenino',]);
        // DB::table('sexos')->insert(['nombresexo'=>'Prefiero no decirlo',]);

        // $this->call(AreasSeeder::class);
        DB::table('areas')->insert(['name'=>'Administración','empresa_id'=>1,'habilitada'=>1]);
        DB::table('areas')->insert(['name'=>'Médica','empresa_id'=>1,'habilitada'=>1]);
        DB::table('areas')->insert(['name'=>'Social','empresa_id'=>1,'habilitada'=>1]);
        DB::table('areas')->insert(['name'=>'Historia De Vida','empresa_id'=>1,'habilitada'=>1]);
        DB::table('areas')->insert(['name'=>'Pagos','empresa_id'=>1,'habilitada'=>1]);
        DB::table('areas')->insert(['name'=>'Nutricional','empresa_id'=>1,'habilitada'=>1]);

        $this->call(ModSeeder::class);

        $this->call(MomentosDelDiaSeeder::class);
        $this->call(DiasDeLaSemanaSeeder::class);
    }
}
