<?php namespace SimBlog\Http\Controllers\Index;

use Response;
use SimBlog\Http\Controllers\Controller;
use SimBlog\Http\Requests;
use SimBlog\Models\Blogs;

class BlogController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $blogs = Blogs::paginate(15);
        return view("index.blog", ['blogs' => $blogs, 'pages' => $blogs->toArray()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $blog = Blogs::find($id);
        if($blog==null){
            abort(404,\Lang::get('file.blogNotFound'));
        }
        return view("index.blogInfo", ['blogInfo' => $blog]);
    }

}
