<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ImprimirPDF;
use App\Http\Controllers\ImprimirPDFInformes;

use Livewire\Livewire;

//use App\Http\Livewire\Categoria\CategoriaProductoComponent;
use App\Http\Livewire\EmpresaGestion\EmpresaGestion;
use App\Http\Livewire\EmpresaModulos\EmpresaModulosComponent;
use App\Http\Livewire\EmpresaUsuarios\EmpresaUsuariosComponent;
use App\Http\Livewire\ModuloUsuarios\ModuloUsuariosComponent;
use App\Http\Livewire\Modulo\ModuloComponent;
use App\Http\Livewire\GestionModulos\GestionModuloComponent;
use App\Http\Livewire\Empresa\EmpresaComponent;
use App\Http\Livewire\Roles\RolesComponent;

use App\Http\Livewire\Area\AreaComponent;
use App\Http\Livewire\Categorias\CategoriasComponent;
use App\Http\Livewire\Cuenta\CuentaComponent;
use App\Http\Livewire\Elementos\ElementosComponent;
use App\Http\Livewire\Estado\EstadoComponent;
use App\Http\Livewire\Estadosciviles\EstadosCivilesComponent;
use App\Http\Livewire\Proveedor\ProveedorComponent;
use App\Http\Livewire\Tiposdedocumentos\TiposDeDocumentosComponent;
use App\Http\Livewire\Unidad\UnidadComponent;

use App\Http\Livewire\Localidades\LocalidadesComponent;
use App\Http\Livewire\Nacionalidad\NacionalidadComponent;
use App\Http\Livewire\Provincias\ProvinciasComponent;

// ERP
// =======

use App\Http\Livewire\erp\Certificado\CertificadoComponent;

use App\Http\Livewire\erp\Categoria\CategoriaproductoComponent;
use App\Http\Livewire\erp\Categoriaprofesional\CategoriaprofesionalComponent;
use App\Http\Livewire\erp\Cliente\ClienteComponent;
use App\Http\Livewire\erp\Compra\CompraSimpleComponent;
use App\Http\Livewire\erp\Compra\CompraComponent;
use App\Http\Livewire\erp\Empleado\EmpleadoComponent;
use App\Http\Livewire\erp\Haberes\HaberesComponent;
use App\Http\Livewire\erp\Producto\ProductoComponent;
use App\Http\Livewire\erp\Tag\TagComponent;
use App\Http\Livewire\erp\Venta\VentaComponent;
use App\Http\Livewire\erp\Venta\VentaMostradorComponent;

use App\Http\Livewire\erp\Tablas\TablasComponent;
use App\Http\Livewire\erp\Tablas\EditarTablaComponent;
use App\Http\Livewire\erp\Tablas\VisualizarTablaComponent;
use App\Http\Livewire\erp\Tablas\DisenarComponent;

// Geri
// ===============================================
use App\Http\Livewire\Geri\Actores\ActorComponent;
use App\Http\Livewire\Geri\Beneficios\clsBeneficios;
use App\Http\Livewire\Geri\Escolaridades\EscolaridadesComponent;
use App\Http\Livewire\Geri\Estadocama\EstadocamaComponent;
use App\Http\Livewire\Geri\Gradodependencia\GradodependenciaComponent;
use App\Http\Livewire\Geri\Habitacion\Habitacion;
use App\Http\Livewire\Geri\Informes\InformeComponent;
use App\Http\Livewire\Geri\Motivoegreso\MotivoegresoComponent;
use App\Http\Livewire\Geri\Personactivo\PersonActivoComponent;
use App\Http\Livewire\Geri\Tiposdepersonas\TiposDePersonasComponent;



use App\Http\Livewire\Geri\Personas\PersonaComponent;
use App\Http\Livewire\Geri\PersonaCampos\PersonasCamposComponent;
use App\Http\Livewire\Geri\Interfaces\InterfacesComponent;
use App\Http\Livewire\Geri\Medicamentos\MedicamentosComponent;
use App\Http\Livewire\Geri\Menu\MenuComponent;
// use App\Http\Livewire\Geri\Ingredientes\IngredientesComponent;
use App\Http\Livewire\Geri\Planalimentario\PlanAlimentarioComponent;

use App\Http\Livewire\erp\Cart\Payment\PaymentComponent;
use App\Http\Livewire\erp\Cart\Cart;
use App\Http\Controllers\Productos;
use App\Http\Livewire\Expendio\ExpendioComponent;
use App\Http\Livewire\Listas\ListaComponent;


// MENU
// ===============================================
use App\Http\Livewire\Menu\MenuCategoriaComponent;
use App\Http\Livewire\Menu\MenuesComponent;

//Imprenta
//========
use App\Http\Livewire\Imprenta\EnviarComponent;
use App\Http\Livewire\Imprenta\AdminComponent;
use App\Http\Livewire\Imprenta\PedidoComponent;

// Registro
//=========
use App\Http\Livewire\Registro\InformesonlineComponent;
use App\Http\Livewire\Registro\TramitesonlineComponent;
use App\Http\Livewire\Registro\ConfigurarRegistroComponent;
use App\Http\Livewire\Registro\EstimadorComponent;
use App\Http\Livewire\Registro\ConfigurarRegistroTramitesComponent;

// Mercado Pago
// ============
use App\Http\Controllers\PaymentController;

// Promociones
// ===========
use App\Http\Livewire\Promociones\PromocionesComponent;
use App\Http\Livewire\Promociones\ConfiguracionesComponent;

// Landing
// =========
use App\Http\Controllers\ContactController;


Route::get('/', function () {
    // return redirect()->route('login');
    // return view('dashboard');
    return view('home');
    //return view('welcome');
});

Route::get('/portfolio', function () { return view('portfolio'); });
Route::get('/nosotros', function () { return view('nosotros'); });
Route::view('/contacto', 'contacto')->name('contacto');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function ()
    {

        Route::get('/dashboard', function () { return view('home'); })->name('dashboard');
        Route::get('areas',AreaComponent::class)->name('areas');



Route::get('categorias',CategoriasComponent::class)->name('categorias');
Route::get('categoriaprofesional',CategoriaprofesionalComponent::class)->name('categoriaprofesional');
Route::get('categoriaproducto',CategoriaproductoComponent::class)->name('categoriaproducto');
Route::get('certificados',CertificadoComponent::class)->name('certificados');
Route::get('clientes',ClienteComponent::class)->name('clientes');
Route::get('compras',CompraComponent::class)->name('compras');
Route::get('cuentas',CuentaComponent::class)->name('cuentas');
Route::get('elementos',ElementosComponent::class)->name('elementos');
Route::get('empleados',EmpleadoComponent::class)->name('empleados');
Route::get('empresas', EmpresaComponent::class)->name('empresas');
Route::get('empresagestion',EmpresaGestion::class)->name('empresagestion');
Route::get('empresamodulos',EmpresaModulosComponent::class)->name('empresamodulos');
Route::get('empresausuarios',EmpresaUsuariosComponent::class)->name('empresausuarios');
Route::get('estados',EstadoComponent::class)->name('estados');
Route::get('haberes',HaberesComponent::class)->name('haberes');
Route::get('listas',ListaComponent::class)->name('listas');
Route::get('localidades',LocalidadesComponent::class)->name('localidades');
Route::get('modulos',ModuloComponent::class)->name('modulos');
Route::get('modulousuarios',ModuloUsuariosComponent::class)->name('modulousuarios');
Route::get('gestionmodulos', GestionModuloComponent::class)->name('gestionmodulos');
Route::get('nacionalidad',NacionalidadComponent::class)->name('nacionalidad');
Route::get('productos',ProductoComponent::class)->name('productos');

Route::get('producto/addtag/{product_id}/{tag_id}', [Productos::class, 'addtag'])->name('producto.addtag');
Route::get('producto/deltag/{product_id}/{tag_id}', [Productos::class, 'deltag'])->name('producto.deltag');
Route::get('producto/tag', [Productos::class, 'tag'])->name('producto.tag');
Route::get('producto/{producto}/tagedit', [Productos::class, 'tagedit'])->name('producto.tagedit');
Route::resource('producto',Productos::class);
Route::get('producto/productobajas', [Productos::class, 'productobajas'])->name('producto.productobajas');
Route::get('carts',Cart::class)->name('carts');
Route::get('payments',PaymentComponent::class)->name('payments');


// Route::get('/afip', function () {
//     return view('livewire.afip.afip');
// });
// Route::any('{any?}', function () {
//     return view('login');
// })->where('any', '.*');


Route::get('proveedores',ProveedorComponent::class)->name('proveedores');
Route::get('provincias',ProvinciasComponent::class)->name('provincias');
Route::get('roles', RolesComponent::class)->name('roles');
Route::get('tablas',TablasComponent::class)->name('tablas');
Route::get('tablas-edit',EditarTablaComponent::class)->name('tablas-edit');
Route::get('tablasver',VisualizarTablaComponent::class)->name('tablasver');
Route::get('tablas-disenar',DisenarComponent::class)->name('tablas-disenar');
Route::get('tags',TagComponent::class)->name('tags');
Route::get('unidades',UnidadComponent::class)->name('unidades');
Route::get('ventas',VentaComponent::class)->name('ventas');
Route::get('VentaSimple',CompraSimpleComponent::class)->name('VentaSimple');
Route::get('ventasmostrador',VentaMostradorComponent::class)->name('ventasmostrador');

Route::get('pdf/deuda/{ddesde}/{dhasta}', [ImprimirPDF::class, 'DeudaPFD'])->name('DeudaPFD');
Route::get('pdf/credito/{cdesde}/{chasta}', [ImprimirPDF::class, 'CreditoPFD'])->name('CreditoPFD');
Route::get('pdf/ivacompras/{anio}/{mes}', [ImprimirPDF::class, 'IvaCompras'])->name('IvaCompras');
Route::get('pdf/ivaventas/{anio}/{mes}', [ImprimirPDF::class, 'IvaVentas'])->name('IvaVentas');
Route::get('pdf/cta-cte-compras/{desde}/{hasta}', [ImprimirPDF::class, 'ComprasCtaCte'])->name('ComprasCtaCte');
Route::get('pdf/cta-cte-ventas/{desde}/{hasta}', [ImprimirPDF::class, 'VentasCtaCte'])->name('VentasCtaCte');

Route::get('pdf/recibos/{anio}/{mes}/{empleadoseleccionado}', [ImprimirPDF::class, 'Recibo'])->name('Recibos');
Route::get('pdf/informes/{nombre}', [VisualizarTablaComponent::class, 'GenerarPDF'])->name('InformePFD');

// Route::get('pdf/informes/{empresa_id}/{informe_name}', [ImprimirPDFInformes::class, 'PDF'])->name('InformePFD');


// ROUTES PARA GERI
// =================

Route::get('actores',ActorComponent::class)->name('actores');
Route::get('beneficios',clsBeneficios::class)->name('crudBeneficios');
Route::get('escolaridades',EscolaridadesComponent::class)->name('escolaridades');
Route::get('estadocama',EstadocamaComponent::class)->name('estadocama');
Route::get('estadosciviles',EstadosCivilesComponent::class)->name('crudEstadosCiviles');
Route::get('expendio',ExpendioComponent::class)->name('expendio');
Route::get('gradodependencia',GradodependenciaComponent::class)->name('gradodependencia');
Route::get('habitaciones',Habitacion::class)->name('habitaciones');
Route::get('informes',InformeComponent::class)->name('informes');
// Route::get('ingredientes',IngredientesComponent::class)->name('ingredientes');
Route::get('interfaces',InterfacesComponent::class)->name('interfaces');
Route::get('medicamentos',MedicamentosComponent::class)->name('medicamentos');
Route::get('menu',MenuComponent::class)->name('menu');
Route::get('motivoegreso',MotivoegresoComponent::class)->name('motivoegreso');
Route::get('personascampos',PersonasCamposComponent::class)->name('personascampos');
Route::get('personactivo',PersonActivoComponent::class)->name('crudPersonActivo');
Route::get('personas',ActorComponent::class)->name('personas');
Route::get('planalimentario',PlanAlimentarioComponent::class)->name('planalimentario');
Route::get('tiposdedocumentos',TiposDeDocumentosComponent::class)->name('crudTiposDeDocumentos');
Route::get('tiposdepersonas',TiposDePersonasComponent::class)->name('tiposdepersonas');
Route::get('pdf/informes', ActorComponent::class, 'showPDF');

Route::get('modalpreguntas',[ActorComponent::class,'ResponderInforme1'])->name('modalpreguntas');

// Route::get('areas',AreasComponent::class)->name('areas');

// Route::get('settings',[Settings::class,'index'])->name('admin.settings.index');
// Route::get('settings/beneficios',[clsBeneficios::class,'index'])->name('admin.settings.beneficios.index');
// Route::get('settings/beneficios', clsBeneficios::class);
// Route::get('settings/beneficios',[clsBeneficios::class,'index'])->name('liveware.settings.beneficios');
// Route::get('settings/beneficios',[clsBeneficios::class,'render'])->name('liveware.crudbeneficios');
// Route::get('settings/beneficios',[clsBeneficios::class,'render'])->name('liveware.crudbeneficios');
// Route::get('beneficios/createbeneficios',[clsBeneficios::class,'create'])->name('beneficios.create');
// Route::get('prueba',clsBeneficios::class);
// Route::get('otrascosas',[ClsOtrasCosasController::class,'index'])->name('admin.otrascosas');
// Route::get('otrascosas',ClsOtrasCosasController::class)->name('admin.otrascosas');
// Route::get('otrascosas',Liveotra::class)->name('admin.otrascosas');
// Route::get('empresas',EmpresaComponent::class)->name('empresas');
// Route::get('empresausuarios',EmpresaUsuariosComponent::class)->name('empresausuarios');
// Route::get('empresamodulos',EmpresaModulosComponent::class)->name('empresamodulos');
// Route::get('modulousuarios',ModuloUsuariosComponent::class)->name('modulousuarios');
// Route::get('empresagestion',EmpresaGestion::class)->name('empresagestion');
// Route::get('unidades',UnidadComponent::class)->name('unidades');
// Route::get('personas',PersonaComponent::class)->name('personas');




// use App\Http\Controllers\AfipController;
// // Para API
// Route::prefix('afip')->group(function () {
//     Route::get('status', [AfipController::class, 'checkStatus']);
//     Route::get('last-voucher', [AfipController::class, 'getLastVoucher']);
// });

// // Para web
// Route::middleware('auth')->prefix('afip')->group(function () {
//     Route::get('status', [AfipController::class, 'checkStatus'])->name('afip.status');
//     Route::get('statusgetLastVoucher', [AfipController::class, 'getLastVoucher'])->name('statusgetLastVoucher');
//     // Otras rutas web...
// });

//ROUTES PARA <MENU>
//================

// Route::get('menu_categorias', MenuCategoriaComponent::class);
// Route::get('/menu', MenuesComponent::class)->name('menu');
// Route::get('/menu/menueditar', ['Menu@editar'])->name('menueditar');

//ROUTES PARA <IMPRENTA>
//================
Route::get('/imprentaenvios', EnviarComponent::class)->name('enviar');
Route::get('/imprentaadmin', AdminComponent::class)->name('admin');
Route::get('/imprentapedidos', PedidoComponent::class)->name('pedidos');

// Route::get('/registro', function () {
//     return view('registro.index');
// })->name('registro');

Route::get('/sin-permisos', function () {
    return view('SinPermiso')->extends('layouts.adminlte');
})->name('sin-permisos');

  }
);


Route::view('/registro', 'registro.principal')->name('registro');
Route::view('/registro/transferenciadigital/first', 'registro.transferenciadigital.first')->name('transferenciadigital.first');
Route::view('/registro/tramite_online/first', 'registro.tramite_online.first')->name('tramite_online.first');
Route::view('/registro/tramite_online/second', 'registro.tramite_online.deepseek_html_20250809_cf6807')->name('tramite_online.second');

Route::view('tramite', TramitesonlineComponent::class)->name('tramite');

Route::get('/tramites-online', TramitesonlineComponent::class)->name('tramites.online');
Route::get('/informes-online', InformesonlineComponent::class)->name('informes.online');
Route::get('/configurar-registro', ConfigurarRegistroComponent::class)->name('registro.configurar');
Route::get('/configurartramites-registro', ConfigurarRegistroTramitesComponent::class)->name('registro.configurar.tramites');
Route::get('/estimador-registro', EstimadorComponent::class)->name('registro.estimador');

Route::get('/registro/success', [InformesonlineComponent::class, 'success'])->name('mercadopago.success');
// Route::get('/registro/webhooks', [InformesonlineComponent::class, 'webhooks'])->name('mercadopago.webhooks');

// Route::post('/create-payment', [PaymentController::class, 'createPayment'])->name('payment.create');
// Route::get('/payment/success', [PaymentController::class, 'success'])->name('mercadopago.success');
// Route::get('/payment/failure', [PaymentController::class, 'failure'])->name('mercadopago.failure');
// Route::get('/payment/pending', [PaymentController::class, 'pending'])->name('mercadopago.pending');
// Route::post('/payment/webhook', [PaymentController::class, 'webhook'])->name('mercadopago.webhook');

Route::get('/promociones', PromocionesComponent::class)->name('promociones');
Route::get('/promociones/buscar/{rubro}', PromocionesComponent::class)->name('buscar_promociones');
Route::get('configuraciones',ConfiguracionesComponent::class)->name('configuraciones');



use App\Http\Livewire\Proyectos\Dashboard;
use App\Http\Livewire\Proyectos\ProjectList;
use App\Http\Livewire\Proyectos\ProjectForm;
use App\Http\Livewire\Proyectos\TaskList;
use App\Http\Livewire\Proyectos\TimeTracker;
use App\Http\Livewire\Proyectos\FocusWidget;
use App\Http\Livewire\Proyectos\ProductBacklog;
use App\Models\Proyectos\Project;

/*-------------------------------------------------------------------------
| Project Manager Routes
|--------------------------------------------------------------------------
| Agregar estas rutas en routes/web.php de tu aplicación Laravel  */

Route::prefix('projects')->name('projects.')->group(function () {
    // Dashboard
    Route::get('/', Dashboard::class)->name('index');

    // Project CRUD
    Route::get('/create', ProjectForm::class)->name('create');
    Route::get('/{project}/edit', ProjectForm::class)->name('edit');

    // Tasks
    Route::get('/product-backlog/tasks', TaskList::class)->name('tasks');

    // Time Tracker
    Route::get('/time', TimeTracker::class)->name('time');

    //Product Backlog
    Route::get('/product-backlog/{project}',ProductBacklog::class)->name('product-backlog');
});

/* -------------------------------------------------------------------------
| Focus Widget Route (para embedding)
|--------------------------------------------------------------------------
| Puedes incluir el widget de Focus en cualquier página */

Route::get('/projects/focus-widget', FocusWidget::class)->name('projects.focus-widget');

/* ------------------------------------------------------------------------
| Uso del Focus Widget en otras páginas
|--------------------------------------------------------------------------
| En cualquier vista Blade, puedes usar:
|
|   @livewire(\App\Http\Livewire\FocusWidget::class)
|
| O incluir el componente:
|
|   <livewire:focus-widget /> */




// Route::get('/home', function () { return view('home'); });

// Landing
Route::post('/contacto/enviar', [ContactController::class, 'send'])->name('contact.send');
Route::get('/contacto/gracias', [ContactController::class, 'success'])->name('contact.success');

// Ruta para 404 - DEBE IR AL FINAL
Route::fallback([EmpresaComponent::class, 'notFound']);

