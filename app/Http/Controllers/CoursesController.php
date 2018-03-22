<?php namespace App\Http\Controllers;

	use DB;
	use App\Course;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use Illuminate\Hashing\BcryptHasher;
	use Symfony\Component\HttpFoundation\Response;

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
					$course = Course::create($request->all());

					return response()->json($course, $response->getStatusCode());
				}

			//  View a Course based on the given $id
			public function view($id)
				{
					$course = Course::find($id);

					return response()->json($course, $response->getStatusCode());
				}

			//  Edit a Course based on the given $id
			public function edit(Request $request, $id)
				{
					$course = Course::find($id);
					$course->update($request->all());

					return response()->json($course, $response->getStatusCode());
				}

			//  Delete a Course based on the given $id
			public function delete($id)
				{
					$course = Course::find($id);
					$course->delete();

					return response()->json('Removed successfully', $response->getStatusCode());
				}

			//  Display all the Course in the 'Courses' table
			public function allCourses()
				{
					//   $courses = Course::all();
					$courses = DB::table('courses')->get();

					return response()->json($courses, $response->getStatusCode());
				}

			// Get the Groups that studies the
			// Course with the given $id 
			public function groups($id)
				{
					$groups = Course::find($id)->groups;

					return response()->json($groups, $response->getStatusCode());
				}

			// Get the Tutors that teaches the
			// Course with the given $id 
			public function tutors($id)
				{
					$tutors = Course::find($id)->tutors;

					return response()->json($tutors, $response->getStatusCode());
				}
		}
 ?>