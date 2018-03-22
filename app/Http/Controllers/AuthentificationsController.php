<?php namespace App\Http\Controllers;

	use DB;
	use Auth;
	use App\User;
	use App\Tutor;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use Illuminate\Hashing\BcryptHasher;
	use Illuminate\Support\Facades\Hash;
	use Illuminate\Support\Facades\Input;
	use Symfony\Component\HttpFoundation\Response;

	class AuthentificationsController extends Controller
		{
			public function __construct()
				{
					$this->middleware('auth', ['only' => 'logout']);
				}

			// Logging in that requires $email & $password
			// of the user that we get from the input textbox
			public function login(Request $request)
				{
					$this->validate($request, [
						'email' => 'required',
						'password' => 'required',
					]);
					
					// Using Hash
					// $password = app('hash')->make($request['password']);

					// dd($password);

					// Without Hash
					// $password = Input::get('password');

					$email = Input::get('email');

					if (User::where('email', '=', $email)->exists())
						{
							$user = User::where('email', $email)->first();

							if (Hash::check($request['password'], $user->password))
								{
									User::where('email', $email)->update(['remember_token' => $user->api_token]);

									$user = User::where('email', $email)->first();

									return response()->json(['status' => 'Successful Login', 'Role' => 'User' , 'user' => $user], $response->getStatusCode());
								}
							else
								{
									return response()->json('Failed to Login', $response->getStatusCode());
								}
						}
					else
						{
							$tutor = Tutor::where('email', $email)->first();

							if (Hash::check($request['password'], $tutor->password))
								{
									Tutor::where('email', $email)->update(['remember_token' => $tutor->api_token]);

									$tutor = Tutor::where('email', $email)->first();

									return response()->json(['status' => 'Successful Login', 'Role' => 'Tutor', 'user' => $tutor], $response->getStatusCode());
								}
							else
								{
									return response()->json('Failed to Login', $response->getStatusCode());
								}
						}
				}

			// Logging out the user with the given $id 
			public function logout(Request $request)
				{
					$email = Input::get('email');
					if (User::where('email', '=', $email)->exists())
						{
							User::where('email', $email)->update(['remember_token' => null]);
							return response()->json('Successful Logout', $response->getStatusCode());
						}
					else
						{
							Tutor::where('email', $email)->update(['remember_token' => null]);
							return response()->json('Successful Logout', $response->getStatusCode());
						}
					return response()->json('Failed Logout', $response->getStatusCode());
				}
		}
 ?>