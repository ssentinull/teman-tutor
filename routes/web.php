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
		$router->post('groups/{group_id}/{user_id}', 'Group_UserController@add');
		$router->put('groups/{group_id}/{user_id}', 'Group_UserController@accept');
		$router->put('admin/{group_id}/{user_id}', 'Group_UserController@setAdmin');
		$router->delete('groups/{group_id}/{user_id}', 'Group_UserController@delete');

		// Routes for Logging In and Logging Out 
		$router->post('login/', 'AuthentificationsController@login');
		$router->post('logout/', 'AuthentificationsController@logout');

		// Routes for CRUD method on Course object
		$router->post('courses', 'CoursesController@add');
		$router->get('courses/{id}', 'CoursesController@view');
		$router->get('courses/{id}/groups', 'CoursesController@groups');
		$router->get('courses/{id}/tutors', 'CoursesController@tutors');
		$router->put('courses/{id}', 'CoursesController@edit');
		$router->delete('courses/{id}', 'CoursesController@delete');
		$router->get('courses', 'CoursesController@allCourses');

		// Routes for CRUD method on Tutor object
		$router->post('tutors', 'TutorsController@add');
		$router->get('tutors/{id}', 'TutorsController@view');
		$router->put('tutors/{id}', 'TutorsController@edit');
		$router->delete('tutors/{id}', 'TutorsController@delete');
		$router->get('tutors', 'TutorsController@allTutors');

		// Routes for creating a Group Appointment
		$router->post('apps/{group_id}/{tutor_id}', 'Group_TutorController@create');
		$router->get('apps/{user_id}', 'Group_TutorController@userApps');
		$router->put('apps/{group_id}/{tutor_id}', 'Group_TutorController@edit');
		$router->put('accept/{group_id}/{tutor_id}', 'Group_TutorController@accept');
		$router->delete('decline/{group_id}/{tutor_id}', 'Group_TutorController@decline');
	});

