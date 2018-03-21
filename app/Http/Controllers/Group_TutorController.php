<?php namespace App\Http\Controllers;

	use DB;
	use App\Group_Tutor;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use Illuminate\Hashing\BcryptHasher;
	use Illuminate\Support\Facades\Input;

	class Group_TutorController extends Controller
		{
			// Limiting the Methods that could be
			// used without an 'api_token'
			function __construct()
				{
					$this->middleware('auth', ['only' => ['create', 'edit', 'accept', 'decline']]);
				}

			// Create a new Appointment for the Group with the given
			// $group_id with a Tutor with the given $tutor_id
			public function create(Request $request, $group_id, $tutor_id)
				{
					$group_tutor = Group_Tutor::create([
						'group_id' => $group_id,
						'tutor_id' => $tutor_id,
						'date' => Input::get('date'),
						// 'hour' => Input::get('hour'),
						'place' => Input::get('place'),
						'subject' => Input::get('subject'),
						'is_accepted' => 0,
					]);

					return response()->json($group_tutor);
				}	

			public function userApps($group_id, $user_id)
				{
					$apps = Group_Tutor::where('group_id', $group_id)->get();
					// $groups = Group::where('user_id', $user_id)->toArray();
					return response()->json($apps);
				}

			//  Edit an Appointment based on the given $id
			public function edit(Request $request, $group_id, $tutor_id)
				{
					$group_tutor = Group_Tutor::where('tutor_id', $tutor_id)
																	->where('group_id', $group_id)
																	->update($request->all());

					$group_tutor = Group_Tutor::where('tutor_id', $tutor_id)
																	->where('group_id', $group_id)
																	->get();

					return response()->json($group_tutor);
				}

			// Accepting an Appointment request from the Group with the  
			// given $group_id for the Tutor with the given $tutor_id   
			public function accept($group_id, $tutor_id)
				{
					$group_tutor = Group_Tutor::where('tutor_id', $tutor_id)
																	->where('group_id', $group_id)
																	->update(['is_accepted' => 1]);
					
					$group_tutor = Group_Tutor::where('tutor_id', $tutor_id)
																	->where('group_id', $group_id)
																	->get();

					return response()->json($group_tutor);
				}

			// Declining an Appointment request from the Group with the  
			// given $group_id for the Tutor with the given $tutor_id   
			public function decline($group_id, $tutor_id)
				{
					$group_tutor = Group_Tutor::where('tutor_id', $tutor_id)
																	->where('group_id', $group_id)
																	->delete();

					return response()->json("Declined Successful");
				}
		}
 ?>