<?php namespace SimBlog\Http\Controllers\Admin;

use SimBlog\Http\Requests;
use SimBlog\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SimBlog\Models\LoveWeb;
use Validator;

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

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function loveindex()
    {
        $loves = LoveWeb::orderBy('created_at', 'ase')->paginate(5);
        return view("admin.loveshow", ['loves' => $loves,
            'pages' => $loves->toArray(),
        ]);
    }

    public function lovedel($id)
    {
        LoveWeb::destroy($id);
        return \Redirect::to("/home/love/");
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function lovecreate()
    {
        return view("admin/lovecreate");
    }



    public function lovesave()
    {
        $validator = Validator::make(\Input::all(),
            ['name' => 'required|min:5'],
            ['url' => 'required|min:5'],
            ['img' => 'required|min:5']
        );
        if ($validator->fails()) {
            return view("admin/lovecreate",
                [
                    "errors" => $validator->messages(),
                    "inputs" => \Input::all()
                ]);
        }
        $love = new LoveWeb();
        $love->user_id = \Auth::user()->id;
        $love->name = \Input::get("name");
        $love->url = \Input::get("url");
        $love->img = \Input::get("img");
        $love->save();
        return view('admin/admin');
    }

}
