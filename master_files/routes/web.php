<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });

$router->group(['prefix' => 'orders/v1'], function () use ($router) {
    $router->get('/',  ['uses' => 'OrderController@index']);
    $router->post('add-order',  ['uses' => 'OrderController@add_order']);
    $router->patch('update-status/{id}',  ['uses' => 'OrderController@update_status']);
    $router->get('delay-orders',  ['uses' => 'OrderController@delay_orders']);
  });
