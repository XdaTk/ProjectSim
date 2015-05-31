<?php namespace SimBlog\Http\Controllers\Admin;

use SimBlog\Http\Requests;
use SimBlog\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SimBlog\Models\Classifies;
use Validator;

class ClassifyEditController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $classify = Classifies::orderBy('created_at', 'ase')->paginate(5);
        return view("admin.classifyshow", ['classifys' => $classify,
            'pages' => $classify->toArray(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("admin/classifycreate");
    }



    public function save()
    {
        $validator = Validator::make(\Input::all(),
            ['name' => 'required|min:5'],
            ['about' => 'required|min:5'],
            ['url' => 'required|min:5']
        );
        if ($validator->fails()) {
            return view("admin/classifycreate",
                [
                    "errors" => $validator->messages(),
                    "inputs" => \Input::all()
                ]);
        }
        $classify = new Classifies();
        $classify->user_id = \Auth::user()->id;
        $classify->name = \Input::get("name");
        $classify->about = \Input::get("about");
        $classify->img = \Input::get("img");
        $classify->save();
        return view('admin/admin');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function update($id)
    {
        return view("admin/classifyupdate",['classify'=>Classifies::find($id)]);
    }



    public function updatePost($id)
    {
        $validator = Validator::make(\Input::all(),
            ['name' => 'required|min:5'],
            ['about' => 'required|min:5'],
            ['url' => 'required|min:5']
        );
        if ($validator->fails()) {
            return view("admin/classifyupdate",
                [
                    "errors" => $validator->messages(),
                    "classify" =>  Classifies::find($id)
                ]);
        }
        $classify = Classifies::find($id);
        $classify->name = \Input::get("name");
        $classify->about = \Input::get("about");
        $classify->img = \Input::get("img");
        $classify->save();
        return view('admin/admin');
    }


    public function del($id)
    {
        Classifies::destroy($id);
        return \Redirect::to("/home/classify/");
    }

}
