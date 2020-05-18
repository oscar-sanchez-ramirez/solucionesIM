<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::login');
$routes->get('/home', 'Home::show');



$routes->get('/admin', 'Admin::index');
$routes->get('/admin/crearOrdenes', 'Admin::crearOrdenes');
$routes->post('/admin/saveOrdenes', 'Admin::saveOrdenes');
$routes->post('/admin/listarOrdenes', 'Admin::listarOrdenes');
$routes->get('/admin/verOrden', 'Admin::verOrden');
$routes->get('/admin/listarUsuarios', 'Admin::listarUsuarios');
$routes->get('/admin/crearUsuario', 'Admin::crearUsuario');
$routes->post('/admin/saveUsuario', 'Admin::saveUsuario');
$routes->post('/admin/actualizarUsuario', 'Admin::actualizarUsuario');
$routes->post('/admin/updateUser', 'Admin::updateUser');
$routes->post('/admin/deleteUser', 'Admin::deleteUser');





$routes->post('/perfil', 'Perfil::signin');
$routes->post('/perfil/signout', 'Perfil::signout');

$routes->get('/clientes', 'Clientes::index');

$routes->get('/ordenes', 'Ordenes::index');
//$routes->get('/ordenes/pagos/(:num)', 'Ordenes::index/$1');



$routes->get('/pagos', 'Pagos::index');
$routes->get('/pagos/tarjeta', 'Pagos::tarjeta');
//$routes->get('/pagos/stripe', 'Pagos::stripe');

$routes->get('/verificador', 'Verificador::index');

$routes->get('/checador', 'Checador::index');

$routes->get('/confirmacion', 'Confirmacion::index');

$routes->get('/comprobantes', 'Comprobantes::index');

















/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
