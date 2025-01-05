<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Anasayfa::index');
$routes->get('anasayfa', 'Anasayfa::index');
$routes->match(['get' , 'post'], 'login', 'Anasayfa::login');
$routes->get('hakkimizda', 'Anasayfa::hakkimizda');
$routes->get('iletisim', 'Anasayfa::iletisim');
$routes->get('Panel', 'Panel::index');
$routes->get('hizmetler', 'Anasayfa::hizmetler');
$routes->get('projeler', 'Anasayfa::projeler');
$routes->get('haberler', 'Anasayfa::haberler');
$routes->get('adfooter', 'Anasayfa::adfooter');
$routes->get('panel', 'Anasayfa::panel');
$routes->post('logout', 'Auth::logout');
$routes->post('iletisim/save', 'Iletisim::save');
$routes->get('admin/iletisimler', 'Admin::iletisimler');
$routes->post('admin/cevapla/(:segment)', 'Admin::cevapla/$1');
$routes->get('iletisim_liste', 'Anasayfa::iletisim_liste');
$routes->get('admin/iletiler', 'Admin::iletiler'); // İletileri listeleme

