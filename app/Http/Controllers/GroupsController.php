<?php namespace App\Http\Controllers;

	use DB;
	use App\Group_User;
	use App\Group;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use Illuminate\Hashing\BcryptHasher;
	use Illuminate\Support\Facades\Input;

	class GroupsController extends Controller
		{
			// Limiting the Methods that could be
			// used without an 'api_token'
			function __construct()
				{
					$this->middleware('auth', ['only' => ['add', 'edit', 'delete', 'users']]);
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
						'user_id' => (int)$request['user_id'],
						'is_admin' => 1,
						'is_accepted' => 1,
					]);

					return response()->json(array('group' => $group, 'group_user' => $group_user), 200);
				}

			//  View a Group based on the given $id
			public function view($id)
				{
					$group = Group::find($id);

					return response()->json($group, 200);
				}

			//  Edit a Group based on the given $id
			public function edit(Request $request, $id)
				{
					$group = Group::find($id);
					$group->update($request->all());

					return response()->json($group, 200);
				}

			//  Delete a Group based on the given $id
			public function delete($id)
				{
					$group = Group::find($id);
					$group->delete();

					return response()->json('Removed Successfully', 200);
				}

			// Display all the Groups in the 'Groups' table
			public function allGroups()
				{
					//   $groups = Group::all();
					$groups = DB::table('groups')->get();

					return response()->json($groups, 200);
				}

			// Get the Users that are enrolled to the
			// Group with the id of $id
			public function users($id)
				{
					$users = Group::find($id)->users;

					return response()->json($users, 200);
				}
		}
 ?>