<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Gate;

use App\Models\EmpresaUsuario;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;




class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void {
        // Busca todos los permisos de la empresa y los define en el Gate para que puedan ser utilizados en la aplicación
    $permisos = DB::table('permissions')->where('guard_name', 'web' . session('empresa_id'))->get();

    // Itera sobre cada permiso y define una función de Gate para verificar si el usuario autenticado tiene ese permiso
    foreach ($permisos as $permiso) {
        Gate::define($permiso->name, function ($user) use ($permiso) {
        $guardName = 'web' . session('empresa_id');
        return (count(DB::table('permissions')->where('name', $permiso->name)->where('guard_name', $guardName)->get('id')) > 0); });
    }
        // dd('aca es en jetstream');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);
    }

    /**
     * Configure the permissions that are available within the application.
     */
    protected function configurePermissions(): void
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
