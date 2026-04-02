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
$router->get('/admin/obat/detail/{id}', 'ObatController@detail');
$router->get('/admin/obat/delete/{id}', 'ObatController@destroy');

//pasien
$router->get('/admin/pasien', 'PasienController@index');
$router->get('/admin/pasien/create', 'PasienController@create');
$router->post('/admin/pasien/store', 'PasienController@store');
$router->get('/admin/pasien/edit/{id}', 'PasienController@edit');
$router->post('/admin/pasien/update/{id}', 'PasienController@update');
$router->get('/admin/pasien/detail/{id}', 'PasienController@detail');
$router->get('/admin/pasien/delete/{id}', 'PasienController@destroy');

//dokter
$router->get('/admin/dokter', 'DokterController@index');
$router->get('/admin/dokter/create', 'DokterController@create');
$router->post('/admin/dokter/store', 'DokterController@store');
$router->get('/admin/dokter/edit/{id}', 'DokterController@edit');
$router->post('/admin/dokter/update/{id}', 'DokterController@update');
$router->get('/admin/dokter/detail/{id}', 'DokterController@detail');
$router->get('/admin/dokter/delete/{id}', 'DokterController@destroy');

//reservasi
$router->get('/admin/reservasi', 'ReservasiController@index');
$router->get('/admin/reservasi/create', 'ReservasiController@create');
$router->post('/admin/reservasi/store', 'ReservasiController@store');
$router->get('/admin/reservasi/edit/{id}', 'ReservasiController@edit');
$router->post('/admin/reservasi/update/{id}', 'ReservasiController@update');
$router->get('/admin/reservasi/detail/{id}', 'ReservasiController@detail');
$router->get('/admin/reservasi/delete/{id}', 'ReservasiController@destroy');

//rekam medis
$router->get('/admin/rekam-medis', 'RekamMedisController@index');
$router->get('/admin/rekam-medis/create', 'RekamMedisController@create');
$router->post('/admin/rekam-medis/store', 'RekamMedisController@store');
$router->get('/admin/rekam-medis/edit/{id}', 'RekamMedisController@edit');
$router->post('/admin/rekam-medis/update/{id}', 'RekamMedisController@update');
$router->get('/admin/rekam-medis/detail/{id}', 'RekamMedisController@detail');
$router->get('/admin/rekam-medis/delete/{id}', 'RekamMedisController@destroy');
