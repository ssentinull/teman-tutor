<?php namespace App\Http\Controllers;

	use App\Group;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Illuminate\Hashing\BcryptHasher;
	use DB;

	class GroupsController extends Controller
		{
			//  method to create a new group
			public function add(Request $request)
				{
					$group = Group::create($request->all());
					// dd($request->all());

					return response()->json($group);
				}

			//  method to view an group based on the given 'id'
			public function view($id)
				{
					$group = Group::find($id);

					return response()->json($group);
				}

			//   
			public function users($id)
				{
					$group = Group::find($id)->users;

					return response()->json($group);
				}

			//  method to edit a group based on the given 'id'
			public function edit(Request $request, $id)
				{
					$group = Group::find($id);
					$group->update($request->all());

					return response()->json($group);
				}

			//  method to delete a group based on the given 'id'
			public function delete($id)
				{
					$group = Group::find($id);
					$group->delete();

					return response()->json('Removed successfully.');
				}

			//  method to display all groups in the database
			public function allGroups()
				{
					//   $groups = Group::all();
					$groups = DB::table('groups')->get();

					return response()->json($groups);
				}
		}
 ?>