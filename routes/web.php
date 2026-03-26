<?php

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/login', 'AuthController@showLogin');
$router->post('/login', 'AuthController@login');
$router->get('/logout', 'AuthController@logout');
$router->get('/admin/dashboard', 'DashboardController@index');

//obat
$router->get('/admin/obat', 'ObatController@index');
$router->get('/admin/obat/create', 'ObatController@create');
$router->post('/admin/obat/store', 'ObatController@store');
$router->get('/admin/obat/edit/{id}', 'ObatController@edit');
$router->post('/admin/obat/update/{id}', 'ObatController@update');
$router->get('/admin/obat/delete/{id}', 'ObatController@destroy');
