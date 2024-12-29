<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Anasayfa::index');
$routes->match(['get', 'post'],'login', 'Anasayfa::login');
$routes->match(['get', 'post'],'kayit', 'Anasayfa::kayit');