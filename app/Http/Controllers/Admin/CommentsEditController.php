<?php namespace SimBlog\Http\Controllers\Admin;

use SimBlog\Http\Requests;
use SimBlog\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SimBlog\Models\Comments;

class CommentsEditController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $comments = Comments::orderBy('created_at', 'ase')->paginate(5);
        return view("admin.commentshow", ['comments' => $comments,
            'pages' => $comments->toArray(),
        ]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function del($id)
	{
        Comments::destroy($id);
        return \Redirect::to("/home/comment");
	}

}
