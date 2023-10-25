<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::index');
$routes->post('authenticate', 'Auth::authenticate');
$routes->get('logout', 'Auth::logout');
$routes->get('register', 'Auth::register');
$routes->post('createUser', 'Auth::createUser');
$routes->match(['get', 'post'], 'updateUser', 'Auth::updateUser');
$routes->get('deleteUser', 'Auth::deleteUser');

$routes->match(['get', 'post'], 'eventos/update/(:num)', 'EventController::updateEvento/$1');
$routes->get('dashboard', 'Home::index', ['filter' => 'auth']);

$routes->get('language/{locale}', 'LanguageController::setLanguage');
$routes->match(['get', 'post'], 'eventosCadastrados', 'EventController::showEvento');
$routes->post('createEvento', 'EventController::createEvento');
$routes->get('createEvento', 'EventController::cadastro');