<?php

namespace App\Http\Livewire\Modulo;

use App\Models\EmpresaModulo;
use App\Models\Modulo;
use App\Models\EmpresaUsuario;
use App\Models\Roles;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use App\Models\erp\Comprobante as Compra;
use App\Models\erp\Venta as Venta;
use Illuminate\Support\Facades\DB;

class ModuloComponent extends Component
{
    public $empresa_id;
    public $modulos;
    public $porc;

    // Propiedades públicas = accesibles en la vista
    public $compras = [];
    public $ventas = [];
    public $compras_areas = [];
    public $compras_cuentas = [];

    public function render()
    {
        if(session('empresa_id')) {
            // dd(session('empresa_id'));
            $empresa_modulos = EmpresaModulo::where('empresa_id',session('empresa_id'))
            ->join('modulo_usuarios','modulo_usuarios.modulo_id','empresa_modulos.modulo_id')
            ->where('modulo_usuarios.user_id','=',Auth()->user()->id)
            ->get('empresa_modulos.modulo_id');

            // dd($empresa_modulos);

            if(count($empresa_modulos)) {
                // dd(count($empresa_modulos));
                $rol = new Roles;
                $rol->Permisos();

                // a ----> b    a * b
                // c ----> d    -----
                //                c
                if(count($empresa_modulos)>5) {
                    $this->porc = 1 * 10 / count($empresa_modulos);   // Se utiliza la variable porc para calcular el tamaño de cada uno de los íconos
                    if($this->porc<2) $this->porc = 0.85;
                } else { $this->porc = 1; }

                $this->modulos=Modulo::find($empresa_modulos);
                // dd($this->modulos);

                $this->compras_areas = $this->obtenerDatosGrafico2('comprobantes', 'NetoComp',12,'area_id');
                $this->compras_cuentas = $this->obtenerDatosGrafico2('comprobantes', 'NetoComp',12,'cuenta_id');

                $this->compras = $this->obtenerDatosGrafico('comprobantes', 'NetoComp',12);
                $this->ventas = $this->obtenerDatosGrafico('ventas', 'NetoComp');

                return view('livewire.modulo.modulo-component')->extends('layouts.adminlte')->section('content');
                // return view('livewire.modulo.modulo-component',$this->modulos)->extends('layouts.adminlte')->section('content');
            } else { return view('livewire.solicitarhabilitarmodulo')->extends('layouts.adminlte'); }
        } else {
            // dd(Auth::user()->id);
            return view('livewire.llevaralogin')->extends('layouts.adminlte');

            $empresas= EmpresaUsuario::where('user_id',$userid)->get();
            $empresa_modulos = EmpresaModulo::where('empresa_id',session('empresa_id'))->get('modulo_id');

            return view('livewire.empresa.empresa-component')->extends('layouts.adminlte');
        }
    }

    private function obtenerDatosGrafico2(string $tabla, string $campoMonto, int $meses = 6, string $areacuenta): array
    {
        $datos = DB::table($tabla)
            ->selectRaw($areacuenta . ', DATE_FORMAT(fecha, "%Y-%m") as periodo, SUM(' . $campoMonto . ') as total')
            ->whereBetween('fecha', [
                now()->subMonths($meses)->startOfMonth(),
                now()->endOfMonth()
            ])
            ->groupBy($areacuenta)
            ->groupBy('periodo')
            ->orderBy('periodo')
            ->get();

        return [
            'labels' => $datos->map(fn($r) => $this->formatearMes($r->periodo))->toArray(),
            'data' => $datos->map(fn($r) => round(floatval($r->total), 2))->toArray(),
        ];
    }

    private function obtenerDatosGrafico(string $tabla, string $campoMonto, int $meses = 6): array
    {
        $datos = DB::table($tabla)
            ->selectRaw('DATE_FORMAT(fecha, "%Y-%m") as periodo, SUM(' . $campoMonto . ') as total')
            ->whereBetween('fecha', [
                now()->subMonths($meses)->startOfMonth(),
                now()->endOfMonth()
            ])
            ->groupBy('periodo')
            ->orderBy('periodo')
            ->get();

        return [
            'labels' => $datos->map(fn($r) => $this->formatearMes($r->periodo))->toArray(),
            'data' => $datos->map(fn($r) => round(floatval($r->total), 2))->toArray(),
        ];
    }

    private function formatearMes(string $periodo): string
    {
        $meses = [
            '01' => 'Ene', '02' => 'Feb', '03' => 'Mar', '04' => 'Abr',
            '05' => 'May', '06' => 'Jun', '07' => 'Jul', '08' => 'Ago',
            '09' => 'Sep', '10' => 'Oct', '11' => 'Nov', '12' => 'Dic'
        ];
        [$anio, $mes] = explode('-', $periodo);
        return $meses[$mes] . ' ' . $anio;
    }

    public function LlevarALogin() {
        return redirect('login');
    }

    public function EnrutarModulo($NombreModulo) {
        session(['moduloactivo' => $NombreModulo]);
        return redirect(strtolower($NombreModulo));
    }
}

// INSERT INTO `empresa_usuarios` (`id`, `empresa_id`, `user_id`, `created_at`, `updated_at`) VALUES
// (4,  4, 11, 2,'2022-07-27 07:36:07', '2022-07-27 07:36:07'),
// (5,  1, 11, 2,'2022-07-27 07:36:07', '2022-07-27 07:36:07'),
// (7,  1, 11, 2, '2022-07-27 07:36:07', '2022-07-27 07:36:07'),
// (9,  4, 11, 2,'2022-07-27 07:36:07', '2022-07-27 07:36:07'),
// (10, 1, 11, 2, '2022-07-27 07:36:07', '2022-07-27 07:36:07'),
// (11, 1, 11, 2, NULL, NULL),
// (12, 1, 11, 2, '2023-02-03 17:39:29', '2023-02-03 17:39:29'),
// (15, 2, 11, 2, '2023-02-21 06:30:35', '2023-02-21 06:30:35'),
// (20, 4, 11, 2, '2024-05-05 05:50:46', '2024-05-05 05:50:46'),
// (21, 5, 11, 2,'2024-05-05 05:50:57', '2024-05-05 05:50:57'),
// (22, 5, 11, 2, '2024-05-05 05:51:08', '2024-05-05 05:51:08'),
// (23, 6, 11, 2,'2024-05-05 05:51:20', '2024-05-05 05:51:20'),
// (24, 6, 11, 2, '2024-05-05 05:51:29', '2024-05-05 05:51:29');
