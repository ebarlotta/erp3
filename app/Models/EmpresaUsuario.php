<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Guard;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Gate;


class EmpresaUsuario extends Model
{
    use HasFactory;

    protected $fillable=[
        'empresa_id',
        'user_id',
        'rol_id',
    ];
    //Relacion uno a muchos inversa

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function usuario(){
        return $this->belongsTo(User::class);
    }

    public static function PermisoHabilitado($PermissionName, $GuardName = null) {
        $GuardName ??= Guard::getDefaultName(static::class);

        // $guardName = 'web' . session('empresa_id');
        $permisoExiste = DB::table('permissions')->where('name', $PermissionName)->where('guard_name', $GuardName)->first();

        $a = DB::table('model_has_permissions')
            ->where('permission_id', $permisoExiste->id)
            ->where('model_type', 'App\Models\User')
            ->where('model_id', auth()->user()->id)
            ->get();

        $usuario = EmpresaUsuario::where('user_id', auth()->user()->id)
            ->where('empresa_id', session('empresa_id'))
            ->first();

        $b = DB::table('role_has_permissions')
            ->where('permission_id', $permisoExiste->id)
            ->where('role_id', $usuario->rol_id)
            ->get();
        if($a->count() > 0 || $b->count() > 0) {
            return true;
        } else {
            return false;
        }
    }

}
