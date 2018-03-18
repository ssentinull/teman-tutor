<?php namespace App\Http\Controllers;

	use App\User;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Illuminate\Hashing\BcryptHasher;
	use DB;
	use Auth;

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

					$user = User::where('email', $request->input('email'))->first();

					if($request->input('password') == $user->password)
						{
							$remember_token = $user->api_token;

							User::where('email', $request->input('email'))->update(['remember_token' => $remember_token]);

							$user = User::where('email', $request->input('email'))->first();

							return response()->json(['status' => 'Successful Login', 'user' => $user]);
						}
					else
						{
							return 'Fail to Login';
						}

				}

			// Logging out the user with the given $id 
			public function logout($id)
				{
					User::find($id)->update(['remember_token' => null]);

					return 'Successful Logout';
				}
		}
 ?>