<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Admin');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Home::index');

// Login
$routes->get('/login', 'Login::index');
$routes->get('/login/sair', 'Login::sair');
$routes->post('/login/autenticar', 'Login::autenticar');

// Sistema
$routes->get('/', 'Admin::index');

// Configurações
$routes->get('/configuracoes', 'Configuracoes::index');
$routes->post('/configuracoes/salvar', 'Configuracoes::salvar');

// Perfil
$routes->get('/perfil', 'Perfil::index');
$routes->post('/perfil/salvar', 'Perfil::salvar');
$routes->post('/perfil/alterarsenha', 'Perfil::alterarsenha');
//$routes->post('/perfil/processarfoto/(:alpha)', 'Perfil::processarfoto');

// Clientes
$routes->get('/clientes', 'Clientes::index');
$routes->get('/clientes/exibir', 'Clientes::exibir');
$routes->get('/clientes/relatorio/(:alpha)', 'Clientes::relatorio');
$routes->post('/clientes/editar', 'Clientes::editar');
$routes->post('/clientes/salvar', 'Clientes::salvar');
$routes->post('/clientes/excluir', 'Clientes::excluir');

// Usuarios
$routes->get('/usuarios', 'Usuarios::index');
$routes->get('/usuarios/exibir', 'Usuarios::exibir');
$routes->get('/usuarios/relatorio/(:alpha)', 'Usuarios::relatorio');
$routes->post('/usuarios/editar', 'Usuarios::editar');
$routes->post('/usuarios/salvar', 'Usuarios::salvar');
$routes->post('/usuarios/excluir', 'Usuarios::excluir');
$routes->post('/usuarios/salvarfoto/(:num)', 'Usuarios::processarfoto/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
