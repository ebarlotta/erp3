<?php

namespace App\Http\Livewire\Reparaya;

use Livewire\Component;
use App\Models\Reparaya\Reparadores;
use App\Models\Reparaya\Solicitud;
use App\Models\Reparaya\PresupuestoItem;
use App\Models\Reparaya\Presupuesto;
class ReparayaReparadorComponent extends Component
{

    public $solicitudes;
    public $solicitud_id;
    public $mostrarDetalle=false, $mostrarNuevoItem=false, $PreguntarCambiarEstado=false;
    public $items;
    public $presu_solicitud_id;
    public $concepto, $monto, $montototal;
    public $presupuesto;
    public $estado_presupuesto;
    public $modificable;
    

    
    public function dashboard()
    {
        $reparador = auth()->user()->reparador;
        $datos     = $reparador->datosDashboard();

        return view('reparador-dashboard', compact('reparador', 'datos'));
    }

    public function panel()
    {
        $reparador   = auth()->user()->reparador;
        $solicitudes = $reparador->solicitudesDisponibles()->get();

        return view('reparador-panel', compact('reparador', 'solicitudes'));
    }

    public function perfil(Reparador $reparador)
    {
        $reparador->load(['especialidades', 'resenas' => fn ($q) => $q->latest()->limit(3)]);

        return view('reparador-perfil', compact('reparador'));
    }


    public function render()
    {
        $reparador = Reparadores::where('id',5)->get();
        $this->solicitudes = Solicitud::where('estado','<>','finalizada')
            ->where('estado','<>','cancelada')
            ->orderByDesc('created_at')
            ->get();
        
        return view('livewire.reparaya.reparaya-reparador-component')->extends('layouts.reparaya');
    }

    public function crearPresupuesto() {
        $a = Presupuesto::where('id', $this->solicitud_id)
        ->where('reparador_id',5)
        ->get();
        
        if(count($a) == 0) {
            $a = Presupuesto::create([
                'solicitud_id' => $this->solicitud_id, 
                // 'reparador_id'=>auth()->user()->id,
                'reparador_id'=>5,
                'moneda_id'=>1,
                'monto'=>0,
                'plazo_dias'=>1,
                'estado'=>'creado'
            ]);
            $this->presu_solicitud_id = $a->id;
        } else {
            session()->flash('message', 'Ya existe un presupuesto creado para esta solicitud.');
        }
    }

    public function cargaritems($solicitud_id) {
        $this->mostrarDetalle = true ;
        $this->solicitud_id = $solicitud_id;
        $this->ActualizarItems();
        if($this->items->count() > 0) {   
            $this->presu_solicitud_id = $solicitud_id;
        }
        $this->estado_presupuesto = $this->getEstado();
        $this->modificable = $this->getModificable();
    }

    public function getModificable() {
        switch ($this->getEstado()) {
            case 'creado': return true;
            case 'enviado': return false;
            case 'rechazado': return false;
            case 'aceptado': return false;
            case 'vencido': return false;
        }
    }
    public function getEstado() {
        $this->presupuesto = Presupuesto::where('solicitud_id',$this->solicitud_id)
        ->where('reparador_id',5)
        ->get();
        return $this->presupuesto[0]['estado'];
    }

    public function edit($id) {
        $this->mostrarNuevoItem = true;
        if($id) {
            $item = PresupuestoItem::find($id);
            $this->concepto = $item->concepto;
            $this->monto = $item->monto;
        } else {    
            $this->concepto = '';
            $this->monto = '';
        }
    }
    public function delete($id) {
        if($this->getModificable()) {
            $item = PresupuestoItem::find($id);
            $item->delete();
            $this->ActualizarItems();
            $this->mostrarNuevoItem = false ;
        } else {    
            session()->flash('messageerror', 'El presupuesto no se puede modificar.');
        }
    }

    public function save() {
        if($this->getModificable()) {
            $this->mostrarNuevoItem = false ;
            $item = PresupuestoItem::create(['presupuesto_id'=>$this->solicitud_id, 'concepto'=>$this->concepto, 'monto'=>$this->monto]);
            $this->ActualizarItems();
        } else {    
            session()->flash('messageerror', 'El presupuesto no se puede modificar.');
        }
    }

    public function ActualizarItems() {
        $this->items = PresupuestoItem::where('presupuesto_id' , $this->solicitud_id)->get();
        $this->montototal = number_format($this->items->sum('monto'),2,'.','');
    }

    public function CambiarEstado($NuevoEstado) {
        if($this->getModificable()) {
            Presupuesto::where('solicitud_id',$this->solicitud_id)
                ->where('reparador_id',5)
                ->update([
                    'estado' => $NuevoEstado,
                ]);
                session()->flash('message', 'Estado Actualizado.');
                $this->PreguntarCambiarEstado = false ;
        } else {    
            session()->flash('messageerror', 'El prosupuesto no se puede modificar.');
        }

    }

    public function preguntar_cambiar_estado() {
        $this->PreguntarCambiarEstado = true ;
    }
}
