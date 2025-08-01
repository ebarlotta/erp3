<?php

namespace App\Http\Livewire\EmpresaModulos;

use App\Models\Empresa;
use App\Models\Modulo;
use App\Models\EmpresaModulo;
use App\Models\EmpresaUsuario;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class EmpresaModulosComponent extends Component {
    
    use WithPagination;
    public $modulosdelaemp, $modulosdelaempresa, $modulosNOempresa, $empresas, $empresaseleccionada, $seleccionado = 1, $name, $isModalOpen = false, $modulosnuevos;

    public function render() {
        if(auth()->user()->hasPermissionTo('empresamodulos.Ver')) {
            if(session('empresa_id')) {
                $userid=auth()->user()->id;
                $this->empresas= EmpresaUsuario::where('user_id',$userid)
                    ->join('empresas','empresas.id','=','empresa_usuarios.empresa_id')
                    ->get();
                return view('livewire.empresa-modulos.empresa-modulos-component',['datos'=>EmpresaUsuario::where('user_id',$userid)->join('empresas','empresas.id','=','empresa_usuarios.empresa_id')->paginate(5)])->extends('layouts.adminlte')
                ->section('content');
            } else { return view('livewire.seleccionarempresa')->extends('layouts.adminlte'); }
        } else {
            return view('SinPermiso')->extends('layouts.adminlte');
        }

    }
    public function mostrarmodal() { $this->isModalOpen = true; }
    public function openModalPopover() { $this->isModalOpen = true; }
    public function closeModalPopover() { $this->isModalOpen = false; }

    public function CargarModulos($id) {
        $this->empresaseleccionada = Empresa::find($id);
        $this->seleccionado = $id;
        
        // $this->modulosdelaempresa = DB::table('modulos')->distinct()
        //     ->join('empresa_modulos', 'modulos.id', '=', 'empresa_modulos.modulo_id')
        //     ->join('empresas',  'empresas.id', '=', 'empresa_modulos.empresa_id',)
        //     ->where('empresas.id', $this->empresaseleccionada->id)
        //     ->select('modulos.*', 'empresas.name as empresa')
        //     ->orderby('name')
        //     ->get();

        // $this->modulosdelaempresa = EmpresaModulo::select('modulos.namea','modulos.pagina','modulos.leyenda','modulos.imagen', 'empresa_modulos.modulo_id','empresa_modulos.empresa_id')
        // ->join('empresas','empresas.id','=','empresa_modulos.empresa_id')
        // ->join('modulos','modulos.id','=','empresa_modulos.modulo_id','right')
        // ->where('empresa_modulos.empresa_id','=',$this->empresaseleccionada->id)
        // ->orderby('modulos.name')
        // ->get();


        $result = Empresa::select([
            'empresas.id as empresa_id',
            'empresas.name as empresa_nombre',
            'modulos.id as modulo_id',
            'modulos.name as name',
            'modulos.imagen as imagen',
            DB::raw("CASE WHEN empresa_modulos.empresa_id IS NOT NULL THEN 'SUSCRITO' ELSE 'NO SUSCRITO' END as estado_suscripcion")
        ])
        ->where('empresas.id', $this->empresaseleccionada->id)
        ->crossJoin('modulos')
        ->leftJoin('empresa_modulos', function($join) {
            $join->on('empresas.id', '=', 'empresa_modulos.empresa_id')
                 ->on('modulos.id', '=', 'empresa_modulos.modulo_id');
        })
        ->orderBy('empresas.name')
        ->orderBy('modulos.name')
        ->get();


        // dd($result);

        // $this->modulosdelaempresa = Modulo::select('modulos.namea','modulos.pagina','modulos.leyenda','modulos.imagen', 'empresa_modulos.modulo_id','empresa_modulos.empresa_id')
        // ->join('empresa_modulos','modulos.id','=','empresa_modulos.modulo_id','left')
        // ->where('empresa_modulos.empresa_id','=',$this->empresaseleccionada->id)
        // ->orderby('modulos.name')
        // ->get();
        
        // ->join('empresas','empresas.id','=','empresa_modulos.empresa_id')
        // dd($this->modulosdelaempresa);
        // var_dump($this->modulosdelaempresa);

        $this->modulosdelaempresa=json_decode($result, true);
        // $this->modulosdelaempresa=json_decode($this->modulosdelaempresa, true);
            // dd($this->modulosdelaempresa);
        // $this->modulosNOempresa = Modulo::all();

        // $this->modulosnuevos = DB::select("SELECT * FROM `modulos` left join empresa_modulos on modulos.id = empresa_modulos.modulo_id and empresa_modulos.empresa_id = " . $this->empresaseleccionada->id.' ORDER by name ASC'); 
    }

    public function EliminarModulo($modulo_id) {
        $a = EmpresaModulo::where('empresa_id', "=", $this->empresaseleccionada->id)->where('modulo_id', "=", $modulo_id)->delete();
        // dd($this->empresaseleccionada->id);
        $this->closeModalPopover();
        $this->CargarModulos($this->empresaseleccionada->id);
        return view('livewire.empresa-modulos.empresa-modulos-component');
    }

    public function AgregarModulo($modulo_name) {
        // $a = Modulo::where('name',$modulo_name)->get();
        $relacion = new EmpresaModulo;
        $relacion->empresa_id = $this->empresaseleccionada->id;
        $relacion->modulo_id = $modulo_name;
        // $relacion->modulo_id = $a[0]->id;
        $relacion->save();
        $this->closeModalPopover();
        $this->CargarModulos($this->empresaseleccionada->id);
        return view('livewire.empresa-modulos.empresa-modulos-component');
    }
}
