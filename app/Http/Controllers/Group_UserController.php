<?php namespace App\Http\Controllers;

	use DB;
	use App\Group_User;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use Illuminate\Hashing\BcryptHasher;
	use Illuminate\Support\Facades\Input;

	class Group_UserController extends Controller
		{
			// Limiting the Methods that could be
			// used without an 'api_token'
			function __construct()
				{
					$this->middleware('auth', ['only' => ['addUser',	'acceptUser', 
															'canDecUser', 'setAdmin', 'removeUser']]);
				}

			// Adding a logged-in User with the given $user_id
			// to a Group with the given $group_id
			public function add($group_id, $user_id)
				{
					$group_user = Group_User::create([
						'group_id' => $group_id,
						'user_id' => $user_id,
						'is_admin' => 0,
						'is_accepted' => 0,
					]);

					return response()->json($group_user);
				}

			// Accepting a User with the given $user_id that's 
			// trying to join a Group with the given $group_id   
			public function accept($group_id, $user_id)
				{
					$group_user = Group_User::where('user_id', $user_id)
																	->where('group_id', $group_id)
																	->update(['is_accepted' => 1]);
					
					$group_user = Group_User::where('user_id', $user_id)
																	->where('group_id', $group_id)
																	->get();

					return response()->json($group_user);
				}

			// Changing the status of the User with the given $user_id
			// of the Group with the give $group_id to an Admin   
			public function setAdmin($group_id, $user_id)
				{
					$group_user = Group_User::where('user_id', $user_id)
																	->where('group_id', $group_id)
																	->update(['is_admin' => 1]);
					
					$group_user = Group_User::where('user_id', $user_id)
																	->where('group_id', $group_id)
																	->get();

					return response()->json($group_user);
				}

			// Cancelling or Declining a join request for the Group with
			// the given $group_id from the User with the given $user_id
			// Removing the User with the given $user_id from the
			// Group with the given $group_id 
			public function delete($group_id, $user_id)
				{
					$group_tutor = Group_User::where('user_id', $user_id)
																	->where('group_id', $group_id)
																	->delete();

					return response()->json("Remove \ Cancel \ Decline Successfully");
				}
		}
 ?>