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
		// Routes for CRUD method on User object
		$router->post('users', 'UsersController@add');
		$router->get('users/{id}', 'UsersController@view');
		$router->get('users/{id}/groups', 'UsersController@groups');
		$router->put('users/{id}', 'UsersController@edit');
		$router->delete('users/{id}', 'UsersController@delete');
		$router->get('users', 'UsersController@allUsers');

		// Routes for CRUD method on Group object
		$router->post('groups', 'GroupsController@add');
		$router->get('groups/{id}', 'GroupsController@view');
		$router->get('groups/{id}/users', 'GroupsController@users');
		$router->put('groups/{id}', 'GroupsController@edit');
		$router->delete('groups/{id}', 'GroupsController@delete');
		$router->get('groups', 'GroupsController@allGroups');

		// Routes for Manipulating a User in a Group
		$router->post('groups/{group_id}/{user_id}', 'GroupsController@addUser');
		$router->put('groups/{group_id}/{user_id}', 'GroupsController@acceptUser');
		$router->put('admin/{group_id}/{user_id}', 'GroupsController@setAdmin');
		$router->delete('groups/{group_id}/{user_id}', 'GroupsController@removeUser');

		// Routes for Logging In and Logging Out 
		$router->post('auth/', 'AuthentificationsController@login');
		$router->post('auth/{id}', 'AuthentificationsController@logout');

		// Routes for CRUD method on Course object
		$router->post('courses', 'CoursesController@add');
		$router->get('courses/{id}', 'CoursesController@view');
		$router->get('courses/{id}/groups', 'CoursesController@groups');
		$router->put('courses/{id}', 'CoursesController@edit');
		$router->delete('courses/{id}', 'CoursesController@delete');
		$router->get('courses', 'CoursesController@allCourses');

	});

