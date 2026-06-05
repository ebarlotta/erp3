<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Models\EmpresaUsuario;
use Database\Seeders\ModSeederNewUser;
use Illuminate\Support\Facades\DB;
use Database\Seeders\PermissionsSeeder as PermissionsSeeder;
use App\Models\Roles;
;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        if(Roles::all()->count() == 0) {
             $a = new PermissionsSeeder();
             $a->AsignarRolesAlaEmpresa(1);   // Empresa de Administración
        }
    

        //Relaciona el usuario creado con la empresa ERP
        EmpresaUsuario::create(['empresa_id' => 2,'user_id' => $user->id,'rol_id' => 2]);
        //Relaciona el usuario creado con la empresa Imprenta
        EmpresaUsuario::create(['empresa_id' => 3,'user_id' => $user->id,'rol_id' => 2]);
        //Relaciona el usuario creado con la empresa de Gastronómica
        EmpresaUsuario::create(['empresa_id' => 4,'user_id' => $user->id,'rol_id' => 2]);
        //Relaciona el usuario creado con la empresa Inmobiliaria
        EmpresaUsuario::create(['empresa_id' => 5,'user_id' => $user->id,'rol_id' => 2]);

        $uu = new ModSeederNewUser();
        $uu->user_id = $user->id;
        $uu->run();
        // $this->call(ModSeederNewUser::class);
        //Relaciona al usuario creado con los módulos de la empresa de prueba

        DB::table('modulo_usuarios')->insert(['modulo_id' => '9', 'user_id' => $uu->user_id,'modificado_user_id'=>$uu->user_id]);
        DB::table('modulo_usuarios')->insert(['modulo_id' => '10', 'user_id' => $uu->user_id,'modificado_user_id'=>$uu->user_id]);
        DB::table('modulo_usuarios')->insert(['modulo_id' => '11', 'user_id' => $uu->user_id,'modificado_user_id'=>$uu->user_id]);
        DB::table('modulo_usuarios')->insert(['modulo_id' => '17', 'user_id' => $uu->user_id,'modificado_user_id'=>$uu->user_id]);
        DB::table('modulo_usuarios')->insert(['modulo_id' => '23', 'user_id' => $uu->user_id,'modificado_user_id'=>$uu->user_id]);
        DB::table('modulo_usuarios')->insert(['modulo_id' => '24', 'user_id' => $uu->user_id,'modificado_user_id'=>$uu->user_id]);
        DB::table('modulo_usuarios')->insert(['modulo_id' => '26', 'user_id' => $uu->user_id,'modificado_user_id'=>$uu->user_id]);
        DB::table('modulo_usuarios')->insert(['modulo_id' => '27', 'user_id' => $uu->user_id,'modificado_user_id'=>$uu->user_id]);
        DB::table('modulo_usuarios')->insert(['modulo_id' => '28', 'user_id' => $uu->user_id,'modificado_user_id'=>$uu->user_id]);

        // Imprenta
        // ========
        DB::table('modulo_usuarios')->insert(['modulo_id' => '51', 'user_id' => $uu->user_id,'modificado_user_id'=>$uu->user_id]);
        DB::table('modulo_usuarios')->insert(['modulo_id' => '52', 'user_id' => $uu->user_id,'modificado_user_id'=>$uu->user_id]);
        // DB::table('modulo_usuarios')->insert(['modulo_id' => '53', 'user_id' => $uu->user_id,'modificado_user_id'=>$uu->user_id]);

        return $user;
        // return User::create([
        //     'name' => $input['name'],
        //     'email' => $input['email'],
        //     'password' => Hash::make($input['password']),
        // ]);
        $user->assignRole('usuario'); // Asignar rol por defecto
        // $user->assignRole('user'); // Asignar rol por defecto

    }
}
