<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'CrudApp::index');
$routes->get('dashboard', 'CrudApp::index');
$routes->get('dashboard/create', 'CrudApp::create');
$routes->post('dashboard/store', 'CrudApp::store');
$routes->get('dashboard/edit/(:num)', 'CrudApp::edit/$1');
$routes->post('dashboard/update/(:num)', 'CrudApp::update/$1');
$routes->get('dashboard/delete/(:num)', 'CrudApp::delete/$1');
