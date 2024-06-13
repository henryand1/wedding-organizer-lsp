<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


// Definisikan rute untuk halaman login
// $routes->post('/login', 'Auth::login'); // Penanganan login

// Grup rute untuk area admin
$routes->get('/', 'User::index');
$routes->group('/', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('login', 'User::login');
    $routes->get('logout', 'User::logout');
    $routes->post('loginn', 'User::tombollogin');
    $routes->get('loginadmin', 'Admin::login');
    $routes->post('loginadminn', 'Admin::tombollogin');
    $routes->get('logoutadmin', 'Admin::logout');
    $routes->get('homepage', 'User::index');
    $routes->get('formpesan', 'User::formpemesanan');
    $routes->get('listpesanan', 'User::listpesanan');
    $routes->get('contacts', 'User::ourcontacts');
    $routes->get('katalogOrder', 'User::katalog'); 
    $routes->get('detailKatalog/(:num)', 'User::detailKatalog/$1');
    $routes->get('bookOrder/(:num)', 'User::bookOrderKatalog/$1');
});

// Grup rute untuk area admin
$routes->group('/backsite', ['namespace' => 'App\Controllers', 'filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'Admin::index');
    $routes->get('laporanpesanan', 'Admin::laporpesanan');
    $routes->get('listkatalog', 'Admin::listkatalog');
    $routes->get('websettings', 'Admin::websettings');
    $routes->get('add-katalog', 'Admin::addkatalog');
    $routes->post('addpaket', 'Admin::addnewkatalog');
    $routes->get('edit-katalog/(:num)', 'Admin::editkatalog/$1');
    $routes->post('submiteditkatalog/(:num)', 'Admin::submiteditkatalog/$1');
    $routes->get('deletekatalog/(:num)', 'Admin::deletekatalog/$1');

});
