<?php
/**
 * Created by PhpStorm.
 * User: XdaTk
 * Date: 2015/5/2
 * Time: 21:34
 */

namespace SimBlog\Utils;


use SimBlog\Models\Blogs;

class BlogUtils {

    public static function findNewsTop(){
       return Blogs::paginate(5)->sortBy('created_at');
    }

    public static function findReadsTop(){
        return Blogs::paginate(5)->sortBy('reads');
    }
    public static function findLovesTop(){
        return Blogs::paginate(5)->sortBy('loves');
    }

}