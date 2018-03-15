<?php

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function($router)
	{

		//Routes for CRUD method on User object
		$router->post('users', 'UsersController@add');
		$router->get('users/{id}', 'UsersController@view');
		$router->get('users/{id}/groups', 'UsersController@groups');
		$router->put('users/{id}', 'UsersController@edit');
		$router->delete('users/{id}', 'UsersController@delete');
		$router->get('users', 'UsersController@allUsers');

		//Routes for CRUD method on Group object
		$router->post('groups', 'GroupsController@add');
		$router->get('groups/{id}', 'GroupsController@view');
		$router->get('groups/{id}/users', 'GroupsController@users');
		$router->put('groups/{id}', 'GroupsController@edit');
		$router->delete('groups/{id}', 'GroupsController@delete');
		$router->get('groups', 'GroupsController@allGroups');

	});

