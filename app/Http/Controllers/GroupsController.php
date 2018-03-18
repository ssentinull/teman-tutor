<?php namespace App\Http\Controllers;

	use App\Group;
	use App\Group_User;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Illuminate\Hashing\BcryptHasher;
	use DB;

	class GroupsController extends Controller
		{
			// Limiting the Methods that could be
			// used without an 'api_token'
			function __construct()
				{
					$this->middleware('auth', ['only' => ['add', 'edit', 'delete', 'users', 
										'addUser',	'acceptUser', 'setAdmin', 'removeUser']]);
				}

			//  Create a new Group based on the input
			public function add(Request $request)
				{
					// The id of the User who created this
					// group should be included in the $request
					
					// dd($data->all());
					
					$group = Group::create($request->all());

					$group_user = Group_User::create([
						'group_id' => $group->id,
						'user_id' => (int)$request['id'],
						'is_admin' => 1,
						'is_accepted' => 1,
					]);

					return response()->json(array('group' => $group, 'group_user' => $group_user));
				}

			//  View a Group based on the given $id
			public function view($id)
				{
					$group = Group::find($id);

					return response()->json($group);
				}

			//  Edit a Group based on the given $id
			public function edit(Request $request, $id)
				{
					$group = Group::find($id);
					$group->update($request->all());

					return response()->json($group);
				}

			//  Delete a Group based on the given $id
			public function delete($id)
				{
					$group = Group::find($id);
					$group->delete();

					return response()->json('Removed successfully.');
				}

			//  Display all the Groups in the 'Groups' table
			public function allGroups()
				{
					//   $groups = Group::all();
					$groups = DB::table('groups')->get();

					return response()->json($groups);
				}

			// Get the user that is enrolled to the
			// Group with the id of $id
			public function users($id)
				{
					$group = Group::find($id)->users;

					return response()->json($group);
				}

			// Adding a logged-in User with the given $user_id
			// to a Group with the given $group_id
			public function addUser($group_id, $user_id)
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
			public function acceptUser($group_id, $user_id)
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

			// Delete the User with the give $user_id from the
			// Group with the given $group_id   
			public function removeUser($group_id, $user_id)
				{
					$group_user = Group_User::where('user_id', $user_id)
																	->where('group_id', $group_id);

					$group_user->delete();

					return response()->json('Removed successfully.');

				}
		}
 ?>