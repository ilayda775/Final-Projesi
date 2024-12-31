<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Anasayfa::index');
$routes->get('anasayfa', 'Anasayfa::index');
$routes->match(['get' , 'post'], 'login', 'Anasayfa::login');
$routes->get('kayit', 'Anasayfa::kayit');
$routes->get('hakkimizda', 'Anasayfa::hakkimizda');
$routes->get('iletisim', 'Anasayfa::iletisim');
$routes->get('Panel', 'Panel::index');
$routes->get('hizmetler', 'Anasayfa::hizmetler');
$routes->get('projeler', 'Anasayfa::projeler');
$routes->get('haberler', 'Anasayfa::haberler');