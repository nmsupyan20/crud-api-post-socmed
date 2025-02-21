<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\PostController;
use App\Controllers\Home;

/**
 * @var RouteCollection $routes
 */

// Documentation Routes
$routes->get('/', [Home::class, 'index']);
$routes->get('/docs', [Home::class, 'generateAPIDocumentation']);

// CRUD API Routes
$routes->get('api/post', [PostController::class, 'index']);
$routes->get('api/post/(:num)', [[PostController::class, 'show'], '$1']);
$routes->post('api/post', [PostController::class, 'create']);
$routes->put('api/post/(:num)', [[PostController::class, 'update'], '$1']);
$routes->delete('api/post/(:num)', [[PostController::class, 'delete'], '$1']);
