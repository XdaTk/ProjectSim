<?php namespace SimBlog\Http\Controllers\Index;

use Response;
use SimBlog\Http\Controllers\Controller;
use SimBlog\Http\Requests;
use SimBlog\Models\Blogs;
use SimBlog\Utils\BlogUtils;
use SimBlog\Utils\ClassifiesUtils;
use SimBlog\Utils\LoveWebUtils;
use SimBlog\Utils\UserInfosUtils;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $blogs = Blogs::paginate(5);
        return view("index.blog", ['blogs' => $blogs,
            'pages' => $blogs->toArray(),
            'userInfos' => UserInfosUtils::findUserInfos(),
            'classifys' => ClassifiesUtils::findClassify(),
            'newsTops' => BlogUtils::findNewsTop(),
            'lovesTops' => BlogUtils::findLovesTop(),
            'readsTops' => BlogUtils::findReadsTop(),
            'loveWebs' => LoveWebUtils::findAllLoveWebs()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function classify($classify)
    {
        $blogs = Blogs::whereClassId($classify)->paginate(5);
        return view("index.blog", ['blogs' => $blogs,
            'pages' => $blogs->toArray(),
            'userInfos' => UserInfosUtils::findUserInfos(),
            'classifys' => ClassifiesUtils::findClassify(),
            'newsTops' => BlogUtils::findNewsTop(),
            'lovesTops' => BlogUtils::findLovesTop(),
            'readsTops' => BlogUtils::findReadsTop(),
            'loveWebs' => LoveWebUtils::findAllLoveWebs()
        ]);
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
        $this->blogReaderCount($blog, $id);
        if ($blog == null) {
            abort(404, \Lang::get('file.blogNotFound'));
        }
        return view("index.blogInfo", ['blogInfo' => $blog,
            'userInfos' => UserInfosUtils::findUserInfos(),
            'classifys' => ClassifiesUtils::findClassify(),
            'newsTops' => BlogUtils::findNewsTop(),
            'lovesTops' => BlogUtils::findLovesTop(),
            'readsTops' => BlogUtils::findReadsTop(),
            'loveWebs' => LoveWebUtils::findAllLoveWebs()
        ]);
    }

    /**
     * Set Blog Reader Count
     *
     * @param $id
     */
    protected function blogReaderCount($blog, $id)
    {
        if (\Session::get('blogReads' . $id) == null) {
            $blog->reads++;
            $blog->save();
            \Session::set('blogReads' . $id, true);
        }
    }

    public function blogLoverCount($id)
    {
        if (\Session::get('blogLove' . $id) == null) {
            $blog = Blogs::find($id);
            $blog->loves++;
            $blog->save();
            \Session::set('blogLove' . $id, true);
            return $blog->loves;
        }
    }

}
