<?php namespace App\Http\Controllers;

	use DB;
	use App\Message;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use Illuminate\Hashing\BcryptHasher;
	use Illuminate\Support\Facades\Input;

	class MessagesController extends Controller
		{
			// Limiting the Methods that could be
			// used without an 'api_token'
			function __construct()
				{
					$this->middleware('auth');
				}

			// Create a new Message
			public function add(Request $request)
				{
					$message = Message::create($request->all());

					return response()->json($message, 200);
				}

			// View Messages that was sent from within
			// the Group with the given $group_id
			public function view($group_id)
				{
					$messages = Message::where('group_id', $group_id)
														->sortBy('created_at')
														->get();

					return response()->json($messages, 200);
				}

			// Delete a Message with the given $id in
			// the Group with the given $group_id
			public function delete($id)
				{
					$message = Message::find($id)->delete();

					return response()->json('Removed Successfully', 200);
				}
		}
 ?>