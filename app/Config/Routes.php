<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'UserController::index');
$routes->post('authenticate', 'UserController::authenticate');
$routes->get('logout', 'UserController::logout');
$routes->get('registerUser', 'UserController::registerUser');
$routes->post('createUser', 'UserController::createUser');
$routes->match(['get', 'post'], 'updateUser', 'UserController::updateUser');
$routes->get('deleteUser', 'UserController::deleteUser');


$routes->match(['get', 'post'], 'event/updateEvent/(:num)', 'EventController::updateEvent/$1');
$routes->get('dashboard', 'HomeController::index', ['filter' => 'auth']);

$routes->get('language/{locale}', 'LanguageController::setLanguage');
$routes->match(['get', 'post'], 'registeredEvent', 'EventController::showEvent');
$routes->post('createEvent', 'EventController::createEvent');
