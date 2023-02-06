<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/printers','Home::printers');
$routes->get('/printer-components/(:num)','Home::components/$1');
$routes->get("/low-levels",'Home::lowlevels');
$routes->get('/assignments','Home::assignments');
$routes->get('/assignments/(:num)','Home::listassignments/$1');
$routes->get('/new-assignment/(:num)','Home::newassignment/$1');
$routes->get('/return/(:num)','Home::returns/$1');
$routes->get('/detail-assignment/(:num)','Home::detailassignment/$1');
$routes->get('/new-employee','Home::newemployee');
$routes->get('/edit-employee/(:num)','Home::editemployee/$1');
$routes->get('/orders','Home::orders');
$routes->get('/shoppingbag','Home::bag');
$routes->get('/new-printer','Home::newprinter');
$routes->get('/orders/detail/(:num)','Home::orderdetail/$1');
$routes->get("/new-component/(:num)",'Home::newcomponent/$1');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
