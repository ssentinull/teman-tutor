<?php namespace App\Http\Controllers;

	use App\Course;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Illuminate\Hashing\BcryptHasher;
	use DB;

	class CoursesController extends Controller
		{
			// Limiting the Methods that could be
			// used without an 'api_token'
			function __construct()
				{
					$this->middleware('auth', ['only' =>['add', 'edit', 'delete']]);
				}

			//  Create a new Course based on the input
			public function add(Request $request)
				{
					// The id of the User who created this
					// group should be included in the $request
					
					// dd($data->all());
					
					$course = Course::create($request->all());

					return response()->json($course);
				}

			//  View a Course based on the given $id
			public function view($id)
				{
					$course = Course::find($id);

					return response()->json($course);
				}

			//  Edit a Course based on the given $id
			public function edit(Request $request, $id)
				{
					$course = Course::find($id);
					$course->update($request->all());

					return response()->json($course);
				}

			//  Delete a Course based on the given $id
			public function delete($id)
				{
					$course = Course::find($id);
					$course->delete();

					return response()->json('Removed successfully.');
				}

			//  Display all the Course in the 'Courses' table
			public function allCourses()
				{
					//   $courses = Course::all();
					$courses = DB::table('courses')->get();

					return response()->json($courses);
				}

			// Get the Groups that studies the
			// Course with the given $id 
			public function groups($id)
				{
					$groups = Course::find($id)->groups;

					return response()->json($groups);
				}

			// Get the Tutors that teaches the
			// Course with the given $id 
			public function tutors($id)
				{
					$tutors = Course::find($id)->tutors;

					return response()->json($tutors);
				}
		}
 ?>