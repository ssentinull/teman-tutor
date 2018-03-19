<?php namespace App\Http\Controllers;

	use App\Tutor;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Illuminate\Hashing\BcryptHasher;
	use DB;

	class TutorsController extends Controller
		{
			// Limiting the Methods that could be
			// used without an 'api_token'
			function __construct()
				{
					$this->middleware('auth', ['only' => ['edit', 'delete']]);
				}

			// Create a new Tutor Account
			public function add(Request $request)
				{
					$request['api_token'] = str_random(60);
					$request['password'] = app('hash')->make($request['password']);
					$tutor = Tutor::create($request->all());
					// dd($request->all());

					return response()->json($tutor);
				}

			// View an Tutor based on the given 'id'
			public function view($id)
				{
					$tutor = Tutor::find($id);
					return response()->json($tutor);
				}

			// Edit a Tutor based on the given 'id'
			public function edit(Request $request, $id)
				{
					$tutor = Tutor::find($id);
					$tutor->update($request->all());

					return response()->json($tutor);
				}

			// Delete a Tutor based on the given 'id'
			public function delete($id)
				{
					$tutor = Tutor::find($id);
					$tutor->delete();

					return response()->json('Removed successfully.');
				}

			// View all Tutors in the database
			public function allTutors()
				{
					// $tutors = Tutor::all();
					$tutors = DB::table('tutors')->get();
					return response()->json($tutors);
				}
		}
 ?>