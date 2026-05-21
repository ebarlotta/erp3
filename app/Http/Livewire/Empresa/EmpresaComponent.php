<?php

namespace App\Http\Livewire\Empresa;
// namespace App\Http\Livewire\Empresa;

use App\Models\Empresa;
use App\Models\EmpresaUsuario;
use App\Models\EmpresaModulo;
use App\Models\Modulo;

use App\Charts\Graficos;
use App\Charts\Graficos\Chart;
use Livewire\Component;
use ArielMejiaDev\LarapexCharts\LarapexChart;


class EmpresaComponent extends Component
{
    public $empresas;
    public $empresa_id;

    public $compras, $ventas;

       public function render()
    {
        if(isset(auth()->user()->id)) {
            $userid=auth()->user()->id;
            //$empresas_usuario = EmpresaUsuario::where('user_id',$userid)->get('id');
            //$this->empresas=Empresa::find($empresas_usuario);
            //$this->empresas=EmpresaUsuario::where('user_id',$userid)->get('id');
            $empresas_usuario = EmpresaUsuario::where('user_id',$userid)->get();
            foreach($empresas_usuario as $empresa) {
                $this->empresas[] = Empresa::find($empresa->empresa_id);
            }
            return view('livewire.empresa.empresa-component')->extends('layouts.adminlte');
        }
        else {
            return view('livewire.llevaralogin')->extends('layouts.adminlte');
        }
    }

    public function LlevarALogin() {
        // dd('entro);');
        return redirect('login');
    }

    public function cargamodulos($id) {
        // Establece el id de la empresaa modo global
        session(['empresa_id' => $id]);
        //sleep(2);
        $this->empresa_id=$id;

        $a = Empresa::find($id);
        session(['nombre_empresa' => $a->name]);
        session(['url_logo_empresa' => $a->imagen]);
        session(['cuit' => $a->cuit]);

        return redirect('modulos');
    }

    public function configurarempresa($id) {
        $this->empresa_id=$id;
        return redirect('empresausuarios');
    }

     public function notFound()
    {
        // Opcional: Log del error
        \Log::warning('Página no encontrada');

        return response()->view('errors.404', [
            // 'requestedUrl' => $request->fullUrl(),
            'currentUrl' => url()->current(),
        ], 404);
    }


}
