<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin(
    'contacts',
    ['path' => '/contacts'],
    function (RouteBuilder $routes) {
        $routes->connect('/', ['controller' => 'Contacts', 'action' => 'add']);
    }
);
