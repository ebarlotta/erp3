<?php

namespace App\View\Components\Registro;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
// use Livewire\Component;


class CalendarioComponent extends Component
{
    public $mes;
    public $anio;
    public $diaSeleccionado;
    public $diasCalendario = [];

    protected $listeners = ['diaSeleccionado' => 'seleccionarDia'];

    // public function mount($mes = null, $anio = null)
    // {
    //     $this->mes = $mes ?? date('n');
    //     dd($this->mes);
    //     $this->anio = $anio ?? date('Y');
    //     $this->generarCalendario();
    // }

    public function generarCalendario()
    {
        $this->diasCalendario = [];
        
        // Primer día del mes
        $primerDia = strtotime("{$this->anio}-{$this->mes}-01");
        $diaSemanaPrimerDia = date('N', $primerDia); // 1 (lunes) a 7 (domingo)
        
        // Días en el mes
        $totalDias = date('t', $primerDia);
        
        // Días del mes anterior para completar la primera semana
        $diasMesAnterior = $diaSemanaPrimerDia - 1;
        if ($diasMesAnterior > 0) {
            $ultimoDiaMesAnterior = date('t', strtotime("last day of previous month", $primerDia));
            for ($i = $diasMesAnterior; $i > 0; $i--) {
                $this->diasCalendario[] = [
                    'numero' => $ultimoDiaMesAnterior - $i + 1,
                    'esMesActual' => false,
                    'esHoy' => false
                ];
            }
        }
        
        // Días del mes actual
        $hoy = date('j');
        $mesHoy = date('n');
        $anioHoy = date('Y');
        
        for ($dia = 1; $dia <= $totalDias; $dia++) {
            $this->diasCalendario[] = [
                'numero' => $dia,
                'esMesActual' => true,
                'esHoy' => ($dia == $hoy && $this->mes == $mesHoy && $this->anio == $anioHoy)
            ];
        }
        
        // Días del próximo mes para completar la última semana
        $totalCeldas = 42; // 6 semanas × 7 días
        $diasRestantes = $totalCeldas - count($this->diasCalendario);
        
        for ($dia = 1; $dia <= $diasRestantes; $dia++) {
            $this->diasCalendario[] = [
                'numero' => $dia,
                'esMesActual' => false,
                'esHoy' => false
            ];
        }
    }

    // public function seleccionarDia($dia)
    // {
    //     $this->diaSeleccionado = $dia;
    // }

    // public function cambiarMes($incremento)
    // {
    //     $nuevaFecha = strtotime("{$this->anio}-{$this->mes}-01 + {$incremento} months");
    //     $this->mes = date('n', $nuevaFecha);
    //     $this->anio = date('Y', $nuevaFecha);
    //     $this->generarCalendario();
    //     $this->diaSeleccionado = null;
    // }

    public function render()
    {
        $nombresMeses = [
            1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
            5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
            9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
        ];

        $this->mes = $mes ?? date('n');
        // dd($this->mes);
        $this->anio = $anio ?? date('Y');
        $this->generarCalendario();

        // return view('components.registro.calendario-component');
        return view('components.registro.calendario-component', [
            'nombreMes' => $nombresMeses[$this->mes]
        ]);
    }
}