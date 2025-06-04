<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['comercializacion'] = 'Welcome/comercializacion';
$route['contacto'] = 'Welcome/contacto';
$route['principal'] = 'Welcome/index';
$route['quien_soy'] = 'Welcome/quien_soy';
$route['term_cond'] = 'Welcome/term_cond';
$route['catalogo'] = 'Welcome/catalogo';
$route['consulta'] = 'Welcome/contacto';

/*
 Registro Cuenta
*/


$route['crearcuenta'] = 'Welcome/crearcuenta';
$route['verifico_nuevoregistro']='registro_controller';


/*
 Inicio de Sesion
*/

$route['iniciarsesion'] = 'Welcome/iniciarsesion';
$route['verifico_usuario']='login_controller'; 
$route['logout']= 'Welcome/logout'; 
$route['panel']= 'Welcome/us_logueado';


/*
   Ver Compras Hechas por el Usuario
*/
$route['micompra'] = 'producto_controller/mi_compra';

/*
   Ver perfil de usuario y edicion
*/
$route['edit_user'] = 'usuario_controller/edit_user';
$route['update_user'] = 'usuario_controller/update_user';

/*
   Resumenes de Ventas de todos los usuarios
*/
$route['ventas_resumen'] = 'producto_controller/listar_ventas';


/*
   Usuarios
*/
$route['usuarios'] = 'usuario_controller';
$route['usuariosadmin'] = 'usuario_controller/mostrarusuarios_admin';
$route['usuariosclient'] = 'usuario_controller/mostrarusuario_cliente';
$route['usuarios_activ/(:num)'] = 'usuario_controller/activar_usuario/$1';

$route['usuarios_agregar'] = 'usuario_controller/agregar_usuario';
$route['verifico_nuevousuario'] = 'usuario_controller/add_usuario';

$route['usuarios_baja/(:num)'] = 'usuario_controller/eliminar_usuario/$1';
$route['usuarios_eliminados'] = 'usuario_controller/muestrausuarios_eliminados';
$route['usuariosadmineli'] = 'usuario_controller/mostraradmin_eliminado';
$route['usuariosclienteli'] = 'usuario_controller/mostrarcliente_eliminado';

$route['usuarios_modifica/(:num)'] = 'usuario_controller/muestra_modifica/$1';
$route['verifico_modificausuario/(:num)'] = 'usuario_controller/modifica_usuario/$1';
$route['mostrarperfil'] = 'usuario_controller/mostrarperfil'; 
$route['mostrarperfil2'] = 'usuario_controller/mostrarperfil2';
$route['actualizarperfil'] = 'usuario_controller/actualizarperfil'; 


$route['buscaruser'] = 'usuario_controller/buscaruser';
$route['buscaruserelim'] = 'usuario_controller/buscaruserelim';
/*
   Productos
*/

$route['productos'] = 'producto_controller';
$route['productos_agrega'] = 'producto_controller/form_agrega_producto';
$route['verifico_nuevoproducto'] = 'producto_controller/agrega_producto';
$route['modificaproducto'] = 'producto_controller/modificaproducto';
$route['buscar'] = 'producto_controller/buscar';
$route['buscarcat'] = 'producto_controller/buscarcat';
$route['buscar_eliminados'] = 'producto_controller/buscar_eliminados';
$route['filtro_fernet'] = 'producto_controller/mostrar_fernet_catalogo';
$route['filtro_gancia'] = 'producto_controller/mostrar_gancia_catalogo';
$route['filtro_vodka'] = 'producto_controller/mostrar_vodka_catalogo';
$route['filtro_vino'] = 'producto_controller/mostrar_vino_catalogo';

$route['verifico_modificaproducto/(:num)'] = 'producto_controller/modificar_producto/$1';
$route['productos_modifica/(:num)'] = 'producto_controller/muestra_modificar/$1';

$route['producto_eliminar/(:num)'] = 'producto_controller/eliminar_producto/$1';
$route['productos_elim'] = 'producto_controller/muestra_eliminados';
$route['activar_producto/(:num)'] = 'producto_controller/activar_producto';

$route['mostrarfernet'] = 'producto_controller/mostrar_fernet';
$route['mostrargancia'] = 'producto_controller/mostrar_gancia';
$route['mostrarvodka'] = 'producto_controller/mostrar_vodka';
$route['mostrarvino'] = 'producto_controller/mostrar_vino';

$route['fernet_elim'] = 'producto_controller/mostrar_fernetelim';
$route['gancia_elim'] = 'producto_controller/mostrar_ganciaelim';
$route['vodka_elim'] = 'producto_controller/mostrar_vodkaelim';
$route['vino_elim'] = 'producto_controller/mostrar_vinoelim';

/**Catalogo*/
$route['todoslosproductos'] = 'carrito_controller';

/**Carrito*/
$route['carro'] = 'carrito_controller/muestra_compra';
$route['carrito_agrega'] = 'carrito_controller/add';
$route['carrito_elimina/(:any)'] = 'carrito_controller/remove/$1';
$route['borrar_carri'] = 'carrito_controller/borrar_carrito';
$route['carrito/remove'] = 'carrito_controller/remove';
$route['carrito/removeone'] = 'carrito_controller/remove_one';
$route['carrito'] = 'carrito_controller/muestra_compra';
$route['carrito_actualiza'] = 'carrito_controller/actualiza_carrito';
$route['comprar'] = 'carrito_controller/guarda_compra';
$route['cierre_venta'] = 'carrito_controller/guardar_cierre_venta';
$route['form_compra'] = 'carrito_controller/form_compras';
$route['detalle'] = 'carrito_controller/get_ventas_con_detalles';
$route['comprobar/(:num)'] = 'carrito_controller/comprobantear/$1';
$route['guardar_com/(:num)'] = 'carrito_controller/guardar_comprobante/$1';
$route['historia_de_compras'] = 'carrito_controller/historial_compras'; // Simplificar ruta para cargar historial directamente
$route['historia_de_ventas'] = 'carrito_controller/historial_ventas';
$route['detalle/(:num)'] = 'carrito_controller/detalle_compra/$1';
$route['detalle_venta/(:num)'] = 'carrito_controller/detalle_venta/$1';
$route['stock_actualizar'] = 'carrito_controller/carrito_actualiza';
$route['buscar_compras_por_fecha'] = 'carrito_controller/buscar_compras_por_fecha';
$route['buscar_ventas_por_fecha'] = 'carrito_controller/buscar_ventas_por_fecha';

/*Consultas*/
$route['verifico_nuevaconsulta'] = 'Consultas_controller/index';
$route['contact'] = 'consultas_controller/contactoview';
$route['ver_consultas'] = 'Consultas_controller/listar_consultas';
$route['consulta_leer/(:num)'] = 'Consultas_controller/leer_consulta/$1';
$route['consultas_leidas'] = 'Consultas_controller/listar_consultas_leidas';
$route['ver_consulta/(:num)'] = 'Consultas_controller/ver_consulta/$1';


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
