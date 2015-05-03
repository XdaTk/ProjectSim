<?php namespace SimBlog\Http\Controllers\Index;

use SimBlog\Http\Requests;
use SimBlog\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CommentsController extends Controller {


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
        return json_encode(\Input::all());
	}

}
