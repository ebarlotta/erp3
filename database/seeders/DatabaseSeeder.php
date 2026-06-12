<?php

namespace Database\Seeders;

use App\Models\Elementos\Elemento;

use App\Models\User;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

use Database\Seeders\geri\MotivosEgresosSeeder;
use Database\Seeders\geri\GradoDependenciaSeeder;
use Database\Seeders\geri\CamasSeeder;
use Database\Seeders\geri\PeriodoSeeder;
use Database\Seeders\geri\EscalaSeeder;

use Database\Seeders\erp\AreaSeeder;
use Database\Seeders\erp\CuentaSeeder;

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


        //ELIMINAR TODOS LOS DATOS DE LAS TABLAS ANTES DE EJECUTAR LOS SEEDERS PARA EVITAR DUPLICADOS
        // php artisan db:truncate


        $this->call(IvaSeeder::class);
        $this->call(CondicionivaSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(SexoSeeder::class);

        DB::table('empresas')->insert(['name' => 'Administración','direccion' => 'Dirección','cuit' => '20123456789','ib' => '012345678','imagen' => 'storageimages/BarBer.png','establecimiento' => '0','telefono' => '+5492634635287','actividad' => 'Desarrollo','actividad1' => 'Software','menu' => '2','email'=>'enzobarlotta@gmail.com','habilitada'=>true,'nombretitular'=>'Enzo','dnititular'=>'1234',]);

        DB::table('empresas')->insert(['name' => 'Empresa ERP SA','direccion' => 'Dirección','cuit' => '20123456789','ib' => '012345678','imagen' => 'storageimages/BarBer.png','establecimiento' => '0','telefono' => '+5492634635287','actividad' => 'Desarrollo','actividad1' => 'Software','menu' => '2','email'=>'prueba@gmail.com','habilitada'=>true,'nombretitular'=>'Enzo','dnititular'=>'1234',]);
        DB::table('empresas')->insert(['name' => 'Empresa Imprenta SA','direccion' => 'Dirección','cuit' => '20123456789','ib' => '012345678','imagen' => 'storageimages/BarBer.png','establecimiento' => '0','telefono' => '+5492634635287','actividad' => 'Desarrollo','actividad1' => 'Software','menu' => '2','email'=>'prueba@gmail.com','habilitada'=>true,'nombretitular'=>'Enzo','dnititular'=>'1234',]);
        DB::table('empresas')->insert(['name' => 'Empresa Gastronómica','direccion' => 'Dirección','cuit' => '20123456789','ib' => '012345678','imagen' => 'storageimages/BarBer.png','establecimiento' => '0','telefono' => '+5492634635287','actividad' => 'Desarrollo','actividad1' => 'Software','menu' => '2','email'=>'prueba@gmail.com','habilitada'=>true,'nombretitular'=>'Enzo','dnititular'=>'1234',]);
        DB::table('empresas')->insert(['name' => 'Empresa Inmobiliaria','direccion' => 'Dirección','cuit' => '20123456789','ib' => '012345678','imagen' => 'storageimages/BarBer.png','establecimiento' => '0','telefono' => '+5492634635287','actividad' => 'Desarrollo','actividad1' => 'Software','menu' => '2','email'=>'prueba@gmail.com','habilitada'=>true,'nombretitular'=>'Enzo','dnititular'=>'1234',]);


        // Agrega vehículos a todas las empresas porque lo va a utilizar como Elemento
        $unidad = new UnidadSeeder();
        $categoria = new CategoriaSeeder();
        $elemento = new Elemento();


        for($i=1;$i<=5;$i++) {
            //Agrega todas las unidades a una empresa
            $unidad->empresa_id = $i; $unidad_id = $unidad->run();

            //Agrega la categoría Vehículo a la tabla de categorias sólo de una empresa
            $categoria->name = "Vehículo"; $categoria->empresa_id = $i; $categoria_id = $categoria->run();

            // Agrega el elemento Vehiculo en la tabla de Elementos de la empresa
            Elemento::firstOrCreate(['name'=> 'Vehículo', 'existencia'=>0, 'precio_compra'=>0, 'stock_minimo'=>0, 'vencimiento'=> now(), 'categoria_id' => $categoria_id, 'unidad_id' => $unidad_id, 'ruta' =>'', 'empresa_id' => $i]);
        }

        // DB::table('roles')->insert(['name' => 'Administrador','guard_name' => 'web',]);
        // DB::table('roles')->insert(['name' => 'Usuario','guard_name' => 'web',]);
        // DB::table('roles')->insert(['name' => 'Free','guard_name' => 'web',]);

        $this->call(ModuloSeeder::class);

        $this->call(EmpresaModuloSeeder::class);

        $this->call(EscolaridadesSeeder::class);

        $this->call(TipoDePersonaSeeder::class);

        $this->call(EstadosCivilesSeeder::class);

        $this->call(TiposDocumentosSeeder::class);

        $this->call(BeneficiosSeeder::class);

        $this->call(PersonActivoSeeder::class);

        $this->call(NacionalidadSeeder::class);

        $this->call(ProvinciasSeeder::class);

        $this->call(LocalidadesSeeder::class);

        $this->call(GradoDependenciaSeeder::class);

        $this->call(MotivosEgresosSeeder::class);

        $this->call(CamasSeeder::class);    // Sólo para la empresa 1

        $this->call(PeriodoSeeder::class);

        $this->call(EscalaSeeder::class); // Sólo para la empresa 1

        $this->call(AreaSeeder::class);
        $this->call(CuentaSeeder::class);

        $this->call(ModSeeder::class);

        $this->call(MomentosDelDiaSeeder::class);
        $this->call(DiasDeLaSemanaSeeder::class);

        $this->call(ImprentaSistemaimpresionSeeder::class);
        $this->call(ImprentaPapelSeeder::class);
        $this->call(ImprentaLadoSeeder::class);
        $this->call(ImprentaEstadosSeeder::class);
        $this->call(ImprentaTipodocumentoSeeder::class);


        $this->call(RegistroTipotramiteSeeder::class);
        $this->call(RegistroReguisitosTipotramiteSeeder::class);

        $this->call(PrimerUsuarioSeeder::class);

        $this->call(ModSeederAdmin::class);
    }
}
