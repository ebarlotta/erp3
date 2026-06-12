<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // modulos del 1-7
        DB::table('modulos')->insert(['name' => 'Empresas', 'pagina' =>           'empresagestion','imagen'=>'empresa.jpg','leyenda'=>'ABM de Empresas.','habilitado'=>1]);  // 1
        DB::table('modulos')->insert(['name' => 'Módulos x Empresa', 'pagina' =>  'empresamodulos','imagen'=>'empresamodulos.jpg','leyenda'=>'ABM de Módulos x Empresa.','habilitado'=>1]);  // 2
        DB::table('modulos')->insert(['name' => 'Gestión de Módulos', 'pagina' => 'gestionmodulos','imagen'=>'gestionmodulos.jpg','leyenda'=>'Gestión de Módulos.','habilitado'=>1]);  // 3
        DB::table('modulos')->insert(['name' => 'Usuarios x Empresa', 'pagina' => 'empresausuarios','imagen'=>'empresausuarios.jpg','leyenda'=>'Gestión de Usuarios x Empresa.','habilitado'=>1]);  // 4
        DB::table('modulos')->insert(['name' => 'Módulos x Usuario', 'pagina' =>  'modulousuarios','imagen'=>'modulousuarios.jpg','leyenda'=>'Gestión de Módulos x Usuarios.','habilitado'=>1]);  // 5
        DB::table('modulos')->insert(['name' => 'Roles', 'pagina' =>              'roles','imagen'=>'roles.jpg','leyenda'=>'Gestión de Roles.','habilitado'=>1]);  // 6
        DB::table('modulos')->insert(['name' => 'Certificados', 'pagina' =>       'certificados','imagen'=>'certificados.jpg','leyenda'=>'Gestión de Certificados.','habilitado'=>1]);  // 7

        // modulos 8-22
        DB::table('modulos')->insert(['name' => 'Unidades', 'pagina' => 'unidades','imagen'=>'unidades.jpg','leyenda'=>'Permite individualizar a cada producto con sus unidades de medida precisa a la hora de tener un control del stock de los mismos.','habilitado'=>1]);   // 8
        DB::table('modulos')->insert(['name' => 'Cuentas', 'pagina' => 'cuentas','imagen'=>'cuentas.jpg','leyenda'=>'Divida los movimientos en distintas cuentas contables que puede utilizar para filtrar información.','habilitado'=>1]);   // 9
        DB::table('modulos')->insert(['name' => 'Areas', 'pagina' => 'areas','imagen'=>'areas.jpg','leyenda'=>'Genere áreas/sectores/unidades de negocio de su organización para poder llevar un control más detallado.','habilitado'=>1]);   // 10
        DB::table('modulos')->insert(['name' => 'Elementos', 'pagina' => 'elementos','imagen'=>'elementos.jpg','leyenda'=>'Gestione distintos tipos de elementos a utilizar dentro del sistema.','habilitado'=>1]);   // 11
        DB::table('modulos')->insert(['name' => 'Estados_Civiles', 'pagina' => 'estadosciviles','imagen'=>'estadosciviles.jpg','leyenda'=>'Gestione distintos tipos de Estados civiles de las personas dentro del sistema.','habilitado'=>1]);   // 12
        DB::table('modulos')->insert(['name' => 'Tipos_de_documentos', 'pagina' => 'tiposdedocumentos','imagen'=>'tiposdedocumentos.jpg','leyenda'=>'Gestione distintos tipos de Documentos dentro del sistema.','habilitado'=>1]);   // 13
        DB::table('modulos')->insert(['name' => 'Localidades', 'pagina' => 'localidades','imagen'=>'localidades.jpg','leyenda'=>'Gestione las distintas localidades dentro del sistema.','habilitado'=>1]);   // 14
        DB::table('modulos')->insert(['name' => 'Nacionalidad', 'pagina' => 'nacionalidad','imagen'=>'nacionalidad.jpg','leyenda'=>'Gestione distintos tipos de Nacionalidades dentro del sistema.','habilitado'=>1]);  // 15
        DB::table('modulos')->insert(['name' => 'Provincias', 'pagina' => 'provincias','imagen'=>'provincias.jpg','leyenda'=>'Gestione distintas Provincias dentro del sistema.','habilitado'=>1]);  // 16
        DB::table('modulos')->insert(['name' => 'Actores', 'pagina' => 'actores','imagen'=>'actores.jpg','leyenda'=>'En este módulo se podrán gestionar todos los actores que participan en el sistema, tales como Cliente  // 1s, Proveedores, Empleados.','habilitado'=>1]); // 17
        DB::table('modulos')->insert(['name' => 'Listas', 'pagina' => 'listas','imagen'=>'listas.jpg','leyenda'=>'Cree, modifique y elimine listas de precios para distintos tipos de clientes','habilitado'=>1]);  // 18
        DB::table('modulos')->insert(['name' => 'Categorías Profesionales', 'pagina' => 'categoriaprofesional','imagen'=>'categoriaprofesional.jpg','leyenda'=>'Gestiona las categorías profesionales de los empleados','habilitado'=>1]);  // 19
        DB::table('modulos')->insert(['name' => 'Beneficios', 'pagina' => 'beneficios','imagen'=>'beneficios.jpg','leyenda'=>'Gestiona los distintos tipos de beneficios/obras sociales','habilitado'=>1]);  // 20
        DB::table('modulos')->insert(['name' => 'Escolaridades', 'pagina' => 'escolaridades','imagen'=>'escolaridades.jpg','leyenda'=>'Gestiona las escolaridades de las personas','habilitado'=>1]);  // 21
        DB::table('modulos')->insert(['name' => 'Tablas/Informes', 'pagina' => 'tablas','imagen'=>'tablas.jpg','leyenda'=>'Gestiona informes','habilitado'=>1]);  // 22

        // modulos 23-37

        // modulos 23-36
        DB::table('modulos')->insert(['name' => 'Clientes', 'pagina' => 'clientes','imagen'=>'clientes.jpg','leyenda'=>'Agregue nuevos clientes o modifique los datos ya ingresados.','habilitado'=>1]);    //erp  23
        DB::table('modulos')->insert(['name' => 'Compras', 'pagina' => 'compras','imagen'=>'compras.jpg','leyenda'=>'Registre todos los comprobantes de las compras/gastos realizados. Ingrese al stock los productos adquiridos.','habilitado'=>1]);   //erp 24
        DB::table('modulos')->insert(['name' => 'Compras-Ventas-Mini', 'pagina' => 'compras-mini','imagen'=>'Compras-Ventas-Mini.jpg','leyenda'=>'Registre todos los comprobantes de las compras/gastos realizados. Ingrese al stock los productos adquiridos.','habilitado'=>1]);   //erp 25
        DB::table('modulos')->insert(['name' => 'Empleados', 'pagina' => 'empleados','imagen'=>'empleados.jpg','leyenda'=>'Realice altas, modificaciones, y bajas del personal que desarrolla las actividades en su organización.','habilitado'=>1]);   //erp 26
        DB::table('modulos')->insert(['name' => 'Proveedores', 'pagina' => 'proveedores','imagen'=>'proveedores.jpg','leyenda'=>'Registre, modifique o elimine información de sus proveedores. Registre email y números de teléfonos de los mismos.','habilitado'=>1]); //erp 27
        DB::table('modulos')->insert(['name' => 'Ventas', 'pagina' => 'ventas','imagen'=>'ventas.jpg','leyenda'=>'Registre comprobantes de ventas, consulte informes en distintas escalas de tiempo. Envíe la información a los distintos organismos.','habilitado'=>1]);   //erp 28
        DB::table('modulos')->insert(['name' => 'Productos', 'pagina' => 'productos','imagen'=>'productos.jpg','leyenda'=>'Agregue productos para su empresa, los mismos aparecerán en su carrito de compras de la empresa. Venda esos roductos.','habilitado'=>1]);    //erp 29
        DB::table('modulos')->insert(['name' => 'Informes', 'pagina' => 'tablasver','imagen'=>'informes.jpg','leyenda'=>'Genere informes resumidos de los movimientos de compras, ventas y demás. Son herramientas empresariales claves para a gestión de su empresa.','habilitado'=>1]);  //erp 30
        DB::table('modulos')->insert(['name' => 'Etiquetas', 'pagina' => 'tags','imagen'=>'tags.jpg','leyenda'=>'Identifique sus productos mediante etiquetas para que sus clientes encuentren más facilmente los productos a la hora de realizar una compra.','habilitado'=>1]);    //erp 31
        DB::table('modulos')->insert(['name' => 'Categorías de Productos', 'pagina' => 'categoriaproducto','imagen'=>'categoriaproductos.jpg','leyenda'=>'Agrupe sus productos mediante categorías para una búsqueda más dinámica.','habilitado'=>1]);  //erp 32
        DB::table('modulos')->insert(['name' => 'Estados', 'pagina' => 'estados','imagen'=>'estados.jpg','leyenda'=>'Los productos pueden cambiar de estados ya que pueden ser nuevos, usados o ser eliminado por algún motivo.','habilitado'=>1]);    //erp 33
        DB::table('modulos')->insert(['name' => 'Haberes', 'pagina' => 'haberes','imagen'=>'haberes.jpg','leyenda'=>'Calcule las liquidaciones de haberes de su personal. Revise liquidaciones de períodos anteriores.','habilitado'=>1]);  //erp 34
        DB::table('modulos')->insert(['name' => 'Ventas Mostrador', 'pagina' => 'ventasmostrador','imagen'=>'ventasmostrador.jpg','leyenda'=>'Registre comprobantes de ventas, consulte informes en distintas escalas de tiempo.','habilitado'=>1]);  //erp 35
        DB::table('modulos')->insert(['name' => 'Compra-Ventas Simple', 'pagina' => 'VentaSimple','imagen'=>'compraventa.jpg','leyenda'=>'Registre comprobantes de ventas o de compras facilmente desde su dispositivo móvil, registre rápidamente sus operaciones','habilitado'=>1]);    //erp 36
        DB::table('modulos')->insert(['name' => 'Estado de Personas', 'pagina' => 'personactivo','imagen'=>'personactivo.jpg','leyenda'=>'Registre los distintos estados de las personas que participan.','habilitado'=>1]);    //erp 37


        // modulos 38-52
        DB::table('modulos')->insert(['name' => 'Categorias', 'pagina' => 'categorias','imagen'=>'categorias.jpg','leyenda'=>'Configure las distintas categorias de Ingredientes.','habilitado'=>1]);    // Geri 38
        DB::table('modulos')->insert(['name' => 'Estado de Cama', 'pagina' => 'estadocama','imagen'=>'estadocama.jpg','leyenda'=>'Estado individual de cada una de las camas en la institución.','habilitado'=>1]);    // Geri 39
        DB::table('modulos')->insert(['name' => 'Grado de pendencia', 'pagina' => 'gradodependencia','imagen'=>'dependencia.jpg','leyenda'=>'Resgitre el estado de dependencia de una persona.','habilitado'=>1]);  // Geri 40
        DB::table('modulos')->insert(['name' => 'Habitaciones', 'pagina' => 'habitaciones','imagen'=>'habitacion.jpg','leyenda'=>'Cada una de las habitaciones en la institución y si está habilitada o no.','habilitado'=>1]);    // Geri 41
        DB::table('modulos')->insert(['name' => 'Ingredientes', 'pagina' => 'ingredientes','imagen'=>'ingredientes.jpg','leyenda'=>'Calcule las liquidaciones de haberes de su personal. Revise liquidaciones de períodos anteriores.','habilitado'=>1]);    // Geri 42
        DB::table('modulos')->insert(['name' => 'Interfaces', 'pagina' => 'interfaces','imagen'=>'interfaces.jpg','leyenda'=>'Generación de interfaces necesarias para la aplicación diseñada.','habilitado'=>1]);    // Geri 43
        DB::table('modulos')->insert(['name' => 'Medicamentos', 'pagina' => 'medicamentos','imagen'=>'medicamentos.jpg','leyenda'=>'Administre nombres y tipos de medicamentos.','habilitado'=>1]);  // Geri 44
        DB::table('modulos')->insert(['name' => 'Menú', 'pagina' => 'menu','imagen'=>'menu.jpg','leyenda'=>'Gestione los distintos menúes a servir.','habilitado'=>1]);    // Geri 45
        DB::table('modulos')->insert(['name' => 'Motivo de Egreso', 'pagina' => 'motivoegreso','imagen'=>'egresos.jpg','leyenda'=>'Diversos motivos por los cuales la persona no continua en el lugar.','habilitado'=>1]);    // Geri 46
        DB::table('modulos')->insert(['name' => 'Personas Campos', 'pagina' => 'personascampos','imagen'=>'haberes.jpg','leyenda'=>'Distintintos campos utilizados a una persona.','habilitado'=>1]);   // Geri 47
        DB::table('modulos')->insert(['name' => 'otrascosas', 'pagina' => 'otrascosas','imagen'=>'haberes.jpg','leyenda'=>'Otras cosas.','habilitado'=>1]);    // Geri 48
        DB::table('modulos')->insert(['name' => 'Perfil', 'pagina' => 'profile','imagen'=>'haberes.jpg','leyenda'=>'Modifique los datos personales.','habilitado'=>1]);   // Geri 49
        DB::table('modulos')->insert(['name' => 'Tipos de Personas', 'pagina' => 'tiposdepersonas','imagen'=>'tiposdepersonas.jpg','leyenda'=>'Administra los distintos actores/personas dentro del sistema.','habilitado'=>1]);   // Geri 50
        DB::table('modulos')->insert(['name' => 'Planes Alimentarios', 'pagina' => 'planalimentario','imagen'=>'planalimentario.jpg','leyenda'=>'Administra los distintos Planes alimentarios de la institución.','habilitado'=>1]);   // Geri 51
        DB::table('modulos')->insert(['name' => 'Expendio', 'pagina' => 'expendio','imagen'=>'expendio.jpg','leyenda'=>'Administra el expendio de los menúes.','habilitado'=>1]);   // Geri 52

        // Módulos 53-55  --- IMPRENTA
        DB::table('modulos')->insert(['name' => 'Pedidos', 'pagina' => 'imprentapedidos','imagen'=>'pedido.jpg','leyenda'=>'Gestiona los pedidos de clientes','habilitado'=>1]);   // 53
        DB::table('modulos')->insert(['name' => 'Envíos', 'pagina' => 'imprentaenvios','imagen'=>'envio.jpg','leyenda'=>'Gestiona los envíos.','habilitado'=>1]);   // 54
        DB::table('modulos')->insert(['name' => 'Administración Imprenta', 'pagina' => 'imprentaadmin','imagen'=>'administracion.jpg','leyenda'=>'Administra la Imprenta/Centro de Copiado.','habilitado'=>1]);   // 55

        // Módulos 56-60       Carrito
        DB::table('modulos')->insert(['name' => 'Agregar Etiqueta', 'pagina' => 'producto/tag','imagen'=>'administracion.jpg','leyenda'=>'Agrega Etiqueta.','habilitado'=>1]);   // 56
        DB::table('modulos')->insert(['name' => 'Agregar Producto', 'pagina' => 'producto/create','imagen'=>'administracion.jpg','leyenda'=>'Agrega Producto.','habilitado'=>1]);   // 57
        DB::table('modulos')->insert(['name' => 'Modificar / Eliminar', 'pagina' => 'producto','imagen'=>'administracion.jpg','leyenda'=>'Modifica / Elimina Producto.','habilitado'=>1]);   // 58
        DB::table('modulos')->insert(['name' => 'Gestión de Producto', 'pagina' => 'productoscarts','imagen'=>'administracion.jpg','leyenda'=>'Gestiona el Producto.','habilitado'=>1]);   // 59
        DB::table('modulos')->insert(['name' => 'Registrar Bajas', 'pagina' => 'productobajas','imagen'=>'administracion.jpg','leyenda'=>'Registra Bajas','habilitado'=>1]);   // 60

    }
}
