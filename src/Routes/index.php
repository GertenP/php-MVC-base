<?php

use App\Controllers\JournalController;
use App\Router;

$router = new Router();
$router->get('/journals', JournalController::class, 'index');
$router->get('/journals/details', JournalController::class, 'details');
$router->get('/journals/edit', JournalController::class, 'edit');
$router->post('/journals/edit', JournalController::class, 'update');

$router->dispatch();
