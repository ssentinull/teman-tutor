<?php namespace App\Http\Controllers;

	use App\User;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Illuminate\Hashing\BcryptHasher;
	use DB;

	class UsersController extends Controller
		{
			//method to create a new account
			public function add(Request $request)
				{
					$request['api_token'] = str_random(60);
					$request['password'] = app('hash')->make($request['password']);
					$user = User::create($request->all());
					// dd($request->all());

					return response()->json($user);
				}

			//method to view an account based on the given 'id'
			public function view($id)
				{
					$user = User::find($id);
					return response()->json($user);
				}

			//method to edit an account based on the given 'id'
			public function edit(Request $request, $id)
				{
					$user = User::find($id);
					$user->update($request->all());

					return response()->json($user);
				}

			//method to delete an account based on the given 'id'
			public function delete($id)
				{
					$user = User::find($id);
					$user->delete();

					return response()->json('Removed successfully.');
				}

			//method to display all accounts in the database
			public function allUser()
				{
					// $users = User::all();
					$users = DB::table('users')->get();
					return response()->json($users);
				}
		}
 ?>