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
       return Blogs::all()->sortBy('created_at')->take(5);
    }

    public static function findReadsTop(){
        return Blogs::all()->sortBy('reads')->take(5);
    }
    public static function findLovesTop(){
        return Blogs::all()->sortBy('loves')->take(5);
    }

}