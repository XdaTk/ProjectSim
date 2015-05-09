<?php namespace SimBlog\Http\Controllers\Admin;

use SimBlog\Http\Requests;
use SimBlog\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return view('admin/admin');
	}
}
