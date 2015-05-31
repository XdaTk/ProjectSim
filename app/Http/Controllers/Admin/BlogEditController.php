<?php namespace SimBlog\Http\Controllers\Admin;

use SimBlog\Http\Controllers\Controller;
use SimBlog\Http\Requests;
use SimBlog\Models\Blogs;
use SimBlog\Utils\ClassifiesUtils;
use Validator;

class BlogEditController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $blogs = Blogs::orderBy('created_at', 'ase')->paginate(5);
        return view("admin.blogshow", ['blogs' => $blogs,
            'pages' => $blogs->toArray(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("admin/blogcreate", ['classifys' => ClassifiesUtils::findClassify()]);
    }



    public function save()
    {
        $validator = Validator::make(\Input::all(),
            ['title' => 'required|min:5'],
            ['brief' => 'required|min:5'],
            ['article-markdown-doc' => 'required|min:5'],
            ['img' => 'required|min:5']
        );
        if ($validator->fails()) {
            return view("admin/blogcreate",
                ['classifys' => ClassifiesUtils::findClassify(),
                    "errors" => $validator->messages(),
                    "inputs" => \Input::all()
                ]);
        }
        $blog = new Blogs();
        $blog->user_id = \Auth::user()->id;
        $blog->type = 0;
        $blog->title = \Input::get("title");
        $blog->brief = \Input::get("brief");
        $blog->class_id = \Input::get("class_id");
        $blog->article = \Input::get("article-markdown-doc");
        $blog->url = \Input::get("img");
        $blog->reads = 0;
        $blog->loves = 0;
        $blog->save();
        return view('admin/admin');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function update($id)
    {
        return view("admin/blogupdate", ['classifys' => ClassifiesUtils::findClassify(),'blog'=>Blogs::find($id)]);
    }



    public function updatePost($id)
    {
        $validator = Validator::make(\Input::all(),
            ['title' => 'required|min:5'],
            ['brief' => 'required|min:5'],
            ['article-markdown-doc' => 'required|min:5'],
            ['img' => 'required|min:5']
        );
        if ($validator->fails()) {
            return view("admin/blogcreate",
                ['classifys' => ClassifiesUtils::findClassify(),
                    "errors" => $validator->messages(),
                    "blog" => Blogs::find($id)
                ]);
        }
        $blog = Blogs::find($id);
        $blog->title = \Input::get("title");
        $blog->brief = \Input::get("brief");
        $blog->class_id = \Input::get("class_id");
        $blog->article = \Input::get("article-markdown-doc");
        $blog->url = \Input::get("img");
        $blog->save();
        return view('admin/admin');
    }


    public function del($id)
    {
        Blogs::destroy($id);
        return \Redirect::to("/home/blog/");
    }

}
