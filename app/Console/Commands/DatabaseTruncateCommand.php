<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseTruncateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'app:database-truncate-command';
    protected $signature = 'db:truncate';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description =  'Vacía todas las tablas de la base de datos respetando las claves foráneas';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // 1. Desactivamos temporalmente la revisión de claves foráneas.
        //    Esto evita errores al vaciar tablas que están relacionadas entre sí [citation:1][citation:10].
        Schema::disableForeignKeyConstraints();

        // 2. Obtenemos el nombre de la base de datos activa.
        $databaseName = DB::getDatabaseName();

        // 3. Consultamos todas las tablas de nuestra base de datos actual.
        $tables = DB::select("SELECT * FROM information_schema.tables WHERE table_schema = ?", [$databaseName]);

        // 4. Recorremos cada tabla y la vaciamos.
        foreach ($tables as $table) {
            $tableName = $table->TABLE_NAME;

            // Es buena idea evitar vaciar la tabla de migraciones por si acaso.
            if ($tableName === 'migrations') {
                continue;
            }

            // El comando TRUNCATE es ultrarrápido y reinicia los IDs automáticos.
            DB::table($tableName)->truncate();
            $this->info("Tabla '{$tableName}' vaciada con éxito.");
        }

        // 5. ¡Muy importante! Volvemos a activar la revisión de claves foráneas.
        Schema::enableForeignKeyConstraints();

        $this->info('¡Todas las tablas se vaciaron correctamente!');
    }
}
