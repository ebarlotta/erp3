<?php

namespace App\Http\Livewire\Expendio;

use App\Models\Consumido;
use App\Models\Geri\Actores\ActorAgente;
use App\Models\Geri\MenuPlan;
use App\Models\Geri\Menuingrediente;
use App\Models\Elementos\Elemento;
use Livewire\Component;
use DateTime;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use App\Models\EmpresaUsuario;

class ExpendioComponent extends Component {
    public $fecha, $confirmacion, $servicioacerrar;
    public $agregar, $servicioaagregar, $agregarActores, $agregarMenu, $actor_id_agregar, $menu_id_agregar, $cantidad_agregar, $menuextra;
    public $registros_desayuno, $registros_almuerzo, $registros_merienda, $registros_cena;
    public $cerradoDesayuno=false, $cerradoAlmuerzo=false, $cerradoMerienda=false, $cerradoCena=false, $regs, $diaDelCiclo, $otro;
    public $labels, $data, $colors;
    public $Resumen;

    public function render() {
        $this->agregarActores = ActorAgente::join('actors','actor_agentes.actor_id','=','actors.id')
        ->where('empresa_id','=',session('empresa_id'))
        ->where('activo','=',1)
        ->get();
        $this->agregarMenu = MenuPlan::select('menus.id', 'menus.nombremenu', 'menu_id', 'menus.menuactivo', 'plan_alimentarios.nombre')
        ->join('menus', 'menu_plans.menu_id', '=', 'menus.id')
        ->join('plan_alimentarios', 'menu_plans.plan_id', '=', 'plan_alimentarios.id')
        ->where('plan_alimentarios.empresa_id', session('empresa_id'))
        ->where('menu_plans.activo', 1)
        ->distinct('menus.nombremenu')
        ->get();

        $this->GenerarVistaResumenes();
        $this->CalcularGraficos();

        $guardName = 'web' . session('empresa_id'); $permisoExiste = Permission::where('name', 'expendio.Ver')->where('guard_name', $guardName)->exists();
        if (auth()->check() && $permisoExiste && EmpresaUsuario::PermisoHabilitado('expendio.Ver', $guardName)) {
            // if(session('empresa_id')) {
                $this->CargarMenues();
                return view('livewire.expendio.expendio-component')->extends('layouts.adminlte');
            } else { return view('livewire.seleccionarempresa')->extends('layouts.adminlte'); }
    }

    //SELECT * FROM `consumidos` inner join menus on menus.id = consumidos.menu_id INNER join menuingredientes on menuingredientes.menu_id = menus.id INNER join elementos on elementos.id = menuingredientes.elemento_id WHERE consumidos.cerrado=1 and consumidos.empresa_id=1;
    // SELECT *, sum(menuingredientes.cantidad*elementos.precio_compra) as Costo FROM `consumidos` inner join menus on menus.id = consumidos.menu_id INNER join menuingredientes on menuingredientes.menu_id = menus.id INNER join elementos on elementos.id = menuingredientes.elemento_id WHERE consumidos.cerrado=1 and consumidos.empresa_id=1 GROUP by menus.nombremenu;
    //SELECT consumidos.fecha, menus.nombremenu, sum(menuingredientes.cantidad*elementos.precio_compra) as Costo FROM `consumidos` inner join menus on menus.id = consumidos.menu_id INNER join menuingredientes on menuingredientes.menu_id = menus.id INNER join elementos on elementos.id = menuingredientes.elemento_id WHERE consumidos.cerrado=1 and consumidos.empresa_id=1 GROUP by menus.nombremenu;

    public function GenerarVistaResumenes() {

        $this->Resumen['costomenues1'] = DB::select("SELECT
            menus.nombremenu,
            SUM(menu_plans.cantidad / menus.ppersonas * menuingredientes.cantidad * precio_compra) AS costomenu,
            SUM(menu_plans.cantidad * menuingredientes.cantidad * precio_compra) AS costototal,
            SUM(menus.tiempopreparacion * menu_plans.cantidad) AS tiempototal
            FROM actors
            LEFT JOIN plan_alimentario_actors ON plan_alimentario_actors.actor_id = actors.id
            LEFT JOIN menu_plans ON plan_alimentario_actors.id = menu_plans.plan_id
            LEFT JOIN menus ON menu_plans.menu_id = menus.id
            INNER JOIN menuingredientes ON menus.id = menuingredientes.menu_id
            INNER JOIN elementos ON elementos.id = menuingredientes.elemento_id
            INNER JOIN unidads ON unidads.id = elementos.unidad_id
            WHERE actors.empresa_id = 1
            GROUP BY menus.nombremenu
            ORDER BY menus.nombremenu;");

        $this->Resumen['costomenues'] = DB::select("SELECT menus.nombremenu, elementos.name, unidads.name as unidad,
            sum(menu_plans.cantidad / menus.ppersonas * menuingredientes.cantidad * precio_compra) as costomenu,
            SUM(menu_plans.cantidad * menuingredientes.cantidad * precio_compra) AS costototal,
            sum(menus.tiempopreparacion * menu_plans.cantidad) as tiempototal,
            sum(menu_plans.cantidad * menuingredientes.cantidad) as cantidadelementos
            FROM actors
            left join plan_alimentario_actors on plan_alimentario_actors.actor_id = actors.id
            left join menu_plans on plan_alimentario_actors.id = menu_plans.plan_id
            left join menus on menu_plans.menu_id = menus.id
            inner join menuingredientes on menus.id = menuingredientes.menu_id
            inner join elementos on elementos.id = menuingredientes.elemento_id
            inner join unidads on unidads.id = elementos.unidad_id
            WHERE actors.empresa_id = 1
            GROUP by menus.nombremenu, elementos.name, unidads.name
            ORDER BY menus.nombremenu;");

        $this->Resumen['costoingredientes'] = DB::select("SELECT elementos.name, unidads.name as unidad,
            sum(menu_plans.cantidad / menus.ppersonas * menuingredientes.cantidad * precio_compra) as costototal,
            sum(menus.tiempopreparacion * menu_plans.cantidad) as tiempototal,
            sum(menu_plans.cantidad * menuingredientes.cantidad) as cantidadelementos
            FROM actors
            left join plan_alimentario_actors on plan_alimentario_actors.actor_id = actors.id
            left join menu_plans on plan_alimentario_actors.id = menu_plans.plan_id
            left join menus on menu_plans.menu_id = menus.id
            inner join menuingredientes on menus.id = menuingredientes.menu_id
            inner join elementos on elementos.id = menuingredientes.elemento_id
            inner join unidads on unidads.id = elementos.unidad_id
            WHERE actors.empresa_id = 1
            GROUP by elementos.name, unidads.name
            ORDER BY elementos.name;");

/* SELECT plan_alimentario_actors.plan_id, menus.id as menuid, nombremenu, menu_plans.cantidad as cantidadmenues, tiempopreparacion, elementos.name, menuingredientes.elemento_id, menuingredientes.cantidad, elementos.existencia, elementos.precio_compra, elementos.stock_minimo, (menu_plans.cantidad*menuingredientes.cantidad*precio_compra) as costototal
	 FROM actors
     left join plan_alimentario_actors on plan_alimentario_actors.actor_id = actors.id
     left join menu_plans on plan_alimentario_actors.id = menu_plans.plan_id
     left join menus on menu_plans.menu_id = menus.id
     inner join menuingredientes on menus.id = menuingredientes.menu_id
     inner join elementos on elementos.id = menuingredientes.elemento_id
     WHERE actors.empresa_id = 1;
     */

        // $this->Resumen['tiempoutilizado'] = DB::select("SELECT menus.nombremenu, sum(menus.tiempopreparacion * menu_plans.cantidad) as tiempototal FROM actors left join plan_alimentario_actors on plan_alimentario_actors.actor_id = actors.id left join menu_plans on plan_alimentario_actors.id = menu_plans.plan_id left join menus on menu_plans.menu_id = menus.id inner join menuingredientes on menus.id = menuingredientes.menu_id inner join elementos on elementos.id = menuingredientes.elemento_id WHERE actors.empresa_id = 1 GROUP by menus.nombremenu;");

        // $this->Resumen['elementosnecesarios'] =DB::select("SELECT elementos.name, sum(menu_plans.cantidad*menuingredientes.cantidad) as cantidadelementos FROM actors left join plan_alimentario_actors on plan_alimentario_actors.actor_id = actors.id left join menu_plans on plan_alimentario_actors.id = menu_plans.plan_id left join menus on menu_plans.menu_id = menus.id inner join menuingredientes on menus.id = menuingredientes.menu_id inner join elementos on elementos.id = menuingredientes.elemento_id WHERE actors.empresa_id = 1 GROUP by elementos.name;");

    }

    public function CalcularGraficos() {

        $chartData = [
            'labels' => [],
            'data' => [],
            'colors' => []
        ];

        $result = DB::select("
            SELECT
                menus.nombremenu,
                SUM(menuingredientes.cantidad * elementos.precio_compra) as costo
            FROM consumidos
            INNER JOIN menus ON menus.id = consumidos.menu_id
            INNER JOIN menuingredientes ON menuingredientes.menu_id = menus.id
            INNER JOIN elementos ON elementos.id = menuingredientes.elemento_id
            WHERE consumidos.cerrado = 1
            AND consumidos.empresa_id = 1
            GROUP BY menus.nombremenu
            ORDER BY costo DESC
        ");

        foreach ($result as $row) {
            $chartData['labels'][] = $row->nombremenu;
            $chartData['data'][] = (float) $row->costo;
            $chartData['colors'][] = $this->generateColor(); // Método para colores
        }

        $this->labels['DespachosMenuales'] = $chartData['labels'];
        $this->data['DespachosMenuales'] = $chartData['data'];
        $this->colors = $chartData['colors'];

        $result = DB::select("
            SELECT
                menus.nombremenu,
                SUM(
                    CASE WHEN consumidos.cerrado = 1
                        THEN (menuingredientes.cantidad * elementos.precio_compra)
                        ELSE 0 END
                ) AS costo_cerrados,
                SUM(
                    CASE WHEN consumidos.cerrado = 0
                        THEN (menuingredientes.cantidad * elementos.precio_compra)
                        ELSE 0 END
                ) AS costo_abiertos
            FROM consumidos
            INNER JOIN menus ON menus.id = consumidos.menu_id
            INNER JOIN menuingredientes ON menuingredientes.menu_id = menus.id
            INNER JOIN elementos ON elementos.id = menuingredientes.elemento_id
            WHERE consumidos.empresa_id = 1
            GROUP BY menus.nombremenu
            ORDER BY costo_cerrados DESC
        ");

        // dd($result);
        $chartData = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Cerrados',
                    'data' => [],
                    'backgroundColor' => [],
                ],
                [
                    'label' => 'Abiertos',
                    'data' => [],
                    'backgroundColor' => [],
                ]
            ]
        ];

        foreach ($result as $row) {
            $chartData['labels'][] = $row->nombremenu;

            $chartData['datasets'][0]['label'] = 'Cerrados';
            $chartData['datasets'][0]['data'][] = (float) $row->costo_cerrados;
            $chartData['datasets'][0]['backgroundColor'][] = $this->generateColor();

            $chartData['datasets'][1]['label'] = 'Abiertos';
            $chartData['datasets'][1]['data'][] = (float) $row->costo_abiertos;
            $chartData['datasets'][1]['backgroundColor'][] = $this->generateColor();
        }

        $this->labels['ComparativaDespachos'] = $chartData['labels'];
        // $this->data['ComparativaDespachos'] = [$chartData['datasets'][0]['data'],$chartData['datasets'][1]['data']];
        // $this->data['ComparativaDespachos']['data'][0] = $chartData['datasets'][0]['data'];
        $this->data['ComparativaDespachos'][1] = $chartData['datasets'][1]['data'];

        $this->data['ComparativaDespachos'][0] = $chartData['datasets'][0]['data'];
}

    private function generateColor() {
        $colors = [
            'rgba(255, 99, 132, 0.8)',
            'rgba(54, 162, 235, 0.8)',
            'rgba(255, 206, 86, 0.8)',
            'rgba(75, 192, 192, 0.8)',
            'rgba(153, 102, 255, 0.8)',
            'rgba(255, 159, 64, 0.8)',
            'rgba(199, 199, 199, 0.8)',
            'rgba(83, 102, 255, 0.8)',
            'rgba(40, 159, 64, 0.8)',
            'rgba(210, 99, 132, 0.8)'
        ];
        return $colors[array_rand($colors)];
    }

    // public $chartData = [
    //     'labels' => ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
    //     'data' => [12, 19, 3, 5, 2, 3]
    // ];

    // public function updateChart()
    // {
    //     // Ejemplo de actualización de datos
    //     $this->chartData['data'] = [
    //         rand(1, 20),
    //         rand(1, 20),
    //         rand(1, 20),
    //         rand(1, 20),
    //         rand(1, 20),
    //         rand(1, 20)
    //     ];
    // }

    public function AgregarMenu() {
        $a = Consumido::firstOrCreate([
                'fecha' => $this->fecha,
                'actor_id'=> $this->actor_id_agregar,
                'menu_id'=> $this->menu_id_agregar,
                'cantidad'=> $this->cantidad_agregar,
                'momento_del_dia_id'=> $this->servicioaagregar,
                'dia_de_la_semana'=> $this->diaDelCiclo,
                'empresa_id'=> session('empresa_id'),]
            );
        $this->agregar = false;
    }

    public function CargarMenues() {
        if(is_null($this->fecha)) $this->fecha = date('Y-m-d');
        $fechaInicio = new DateTime('2025-01-01');
        $fechaHoy = new DateTime($this->fecha);
        $diferencia = $fechaInicio->diff($fechaHoy);
        $diasTranscurridos = $diferencia->days;
        // $diaDelCiclo = ($diasTranscurridos % 14) + 1;   // Se modificó para probar con periodos de 7 días en lugar de 14
        $this->diaDelCiclo = ($diasTranscurridos % 7) + 1;

        $this->Cargar_Registros(1); // Desayuno
        $this->Cargar_Registros(2); // Almuerzo
        $this->Cargar_Registros(3); // Merienda
        $this->Cargar_Registros(4); // Cena
    }

    public function Cargar_Registros($momento) {

        $estado = Consumido::where('fecha','=',$this->fecha)->where('cerrado','=',1)->where('momento_del_dia_id','=',$momento)->get();

            $this->sincronizarConsumos($momento);

            $registros = $this->TraerListadoDeMenuesAConsumir($momento);

            switch ($momento) {
                case 1: $this->registros_desayuno = $registros; $this->cerradoDesayuno = count($estado) ? 'Cerrado' : 'Abierto'; break;
                case 2: $this->registros_almuerzo = $registros; $this->cerradoAlmuerzo = count($estado) ? 'Cerrado' : 'Abierto'; break;
                case 3: $this->registros_merienda = $registros; $this->cerradoMerienda = count($estado) ? 'Cerrado' : 'Abierto'; break;
                case 4: $this->registros_cena = $registros; $this->cerradoCena = count($estado) ? 'Cerrado' : 'Abierto'; break;
            }

    }

    public function TraerListadoDeMenuesAConsumir($momento) {
        $registros = DB::table('plan_alimentario_actors')
            ->join('actors', 'plan_alimentario_actors.actor_id', '=', 'actors.id')
            ->join('plan_alimentarios', 'plan_alimentarios.id', '=', 'plan_alimentario_actors.plan_id')
            ->join('menu_plans', 'menu_plans.plan_id', '=', 'plan_alimentarios.id')
            ->join('menus', 'menus.id', '=', 'menu_plans.menu_id')
            ->join('momentos_del_dias', 'momentos_del_dias.id', '=', 'menu_plans.momento_dia_id')
            ->selectRaw('
                actors.id as actor_id,
                plan_alimentarios.id as plan_id,
                menus.id as menu_id,
                actors.nombre as nombreactor,
                plan_alimentarios.nombre as nombreplan,
                menus.nombremenu,
                momentos_del_dias.descripcion,
                menu_plans.dia,
                menu_plans.cantidad,
                IF(actors.id > 0, true, false) as presente
            ')
            ->where('menu_plans.momento_dia_id', '=', $momento) // parámetro de momento del día: 1:Desayuno, 2:Almuerzo, 3:Merienda, 4:Cena
            ->where('menu_plans.dia', '=', $this->diaDelCiclo)
            ->groupBy(
                'actors.id',
                'plan_alimentarios.id',
                'menus.id',
                'actors.nombre',
                'plan_alimentarios.nombre',
                'menus.nombremenu',
                'momentos_del_dias.descripcion',
                'menu_plans.dia',
                'menu_plans.cantidad'
            )
            ->orderBy('menu_plans.momento_dia_id')
            ->orderBy('nombreactor')
            ->get()
            ->map(function ($item, $index) {
                $itemArray = (array) $item;
                $itemArray['indice'] = $index;
                $itemArray['presente'] = (int) $item->presente; // asegurarse que sea int, no bool

                return $itemArray;
            })
            ->toArray();

            // 1. Obtener los IDs de los menús ya asignados en el recordset actual
            $menuIdsAsignados = DB::table('plan_alimentario_actors')
            ->join('menu_plans', 'menu_plans.plan_id', '=', 'plan_alimentario_actors.plan_id')
            ->where('menu_plans.momento_dia_id', $momento)
            ->where('menu_plans.dia', $this->diaDelCiclo)
            ->pluck('menu_plans.menu_id')
            ->unique()
            ->toArray();

            // 2. Consulta para obtener los menús NO asignados pero que cumplen con el día y momento

            $menusNoAsignados = Consumido::select('consumidos.*','menus.nombremenu','actors.nombre as nombreactor','momentos_del_dias.descripcion','consumido as presente')
            ->join('actors','consumidos.actor_id','=','actors.id')
            ->join('menus','consumidos.menu_id','=','menus.id')
            ->join('momentos_del_dias','consumidos.momento_del_dia_id','=','momentos_del_dias.id')
            ->where('fecha','=',$this->fecha)
            ->where('momento_del_dia_id','=',$momento)
            ->where('dia_de_la_semana','=',$this->diaDelCiclo)
            ->where('consumidos.empresa_id','=',session('empresa_id'))
            ->whereNotIn('menu_id', $menuIdsAsignados)
            ->get();
            // dd($menusNoAsignados);
            $this->menuextra[$momento] = $menusNoAsignados;

        return $registros;
    }

    public function sincronizarConsumos($momento) {
        // En este procedimiento se crea un nuevo registro en la tabla de consumos si es que no se ha entrado nunca ese día

        //Busca los regstros según la planificación del Plan Alimentario
        $registros = $this->TraerListadoDeMenuesAConsumir($momento);

        // dd($this->menuextra);
        // $registrosMenosUno = array_slice($registros, 0, -1); // Excluye el último elemento
        // Itera, si es nuevo lo agrega
        foreach($registros as $reg) {
            Consumido::firstOrCreate([
                'fecha' => $this->fecha,
                'actor_id'=> $reg['actor_id'],
                'menu_id'=> $reg['menu_id'],
                'cantidad'=> $reg['cantidad'],
                'momento_del_dia_id'=> $momento,
                'dia_de_la_semana'=> $this->diaDelCiclo,
                'empresa_id'=> session('empresa_id'),]
            );
        }
    }

    public function CambiarCondicionMenu($datos) {
        $valores = explode('-', $datos);
        $momento = $valores[0]; // Momento del día
        $registro = (int) $valores[1]; // índice del array
        $actor_id = (int) $valores[2]; // id del actor
        $menu_id = (int) $valores[3]; // id del menu
        $dia_semana = (int) $this->diaDelCiclo; // id del día del ciclo

        $a = Consumido::where('fecha',$this->fecha)
        ->where('actor_id',$actor_id)
        ->where('menu_id',$menu_id)
        ->where('momento_del_dia_id',$momento)
        ->where('dia_de_la_semana',$dia_semana)
        ->where('empresa_id',session('empresa_id'))
        ->get(['id','consumido']);


        if(!empty($a)) $b = Consumido::where('id',$a[0]['id'])->update(['consumido' => !$a[0]['consumido']]);
    }

    public function PreguntarSiCerrar($servicio) {
        $this->confirmacion = true;
        $this->servicioacerrar = $servicio;
    }

    public function PreguntarSiAgregar($servicio) {
        $this->agregar = true;
        $this->cantidad_agregar = 1;
        $this->servicioaagregar = $servicio;
    }

    public function CambiarEstado($momento) {
        $a = Consumido::where('fecha','=',$this->fecha)
        ->where('momento_del_dia_id','=',$momento)
        ->where('empresa_id','=', session('empresa_id'))
        ->where('consumido','=', 0)
        ->get();

        foreach($a as $menu) {
            $this->DisminuirStock($menu->menu_id, $menu->cantidad);
        }

        //Termina cerrando los menúes
        $a = Consumido::where('fecha','=',$this->fecha)
        ->where('momento_del_dia_id','=',$momento)
        ->where('empresa_id','=', session('empresa_id'))
        ->where('consumido','=', 0)
        ->update(['cerrado'=>1]);

        $this->confirmacion = false;

    }

    public function DisminuirStock($id, $cantidad_menues) {
        // Busca los ingredientes del menu a descontar elementos
        $a=Menuingrediente::where('menu_id','=',$id)->get();

        // Por cada ingrediente...
        foreach($a as $ingredientes) {
            // Busca el ingrediente para saber el stock actual del mismo
            $elemento = Elemento::where('id','=',$ingredientes->elemento_id)->get();

            $stock_actual = $elemento[0]->existencia;

            // Del elemento encontrado descuenta la cantidad utilizada por la cantidad de menúes consumidos
            $elemento = Elemento::where('id','=',$ingredientes->elemento_id)
            ->update(['existencia'=>$stock_actual - ($ingredientes->cantidad * $cantidad_menues)]);
        }

    }
}
