<?php namespace SimBlog\Http\Controllers\Index;

use SimBlog\Http\Controllers\Controller;
use SimBlog\Http\Requests;
use SimBlog\Models\Comments;
use Validator;

class CommentsController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($id)
    {
        $comment = new Comments();
        $comment->cid = $id;
        $comment->comment = \Input::get("comment");
        $comment->name = \Input::get("name");
        $comment->email = \Input::get("email");

        $validator = Validator::make(\Input::all(),
            ['comment' => 'required|min:5'],
            ['name' => 'required|min:5'],
            ['email' => 'required|min:5:email']
        );
        if ($validator->fails()) {
            return json_encode($validator->messages());
        } else {
            if ($comment->save()) {
                return json_encode("success");
            } else {
                return json_encode("fail");
            }
        }
    }

}
