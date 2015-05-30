<?php
/**
 * Created by PhpStorm.
 * User: XdaTk
 * Date: 2015/5/2
 * Time: 21:34
 */

namespace SimBlog\Utils;


use SimBlog\Models\Blogs;

class BlogUtils
{

    public static function findNewsTop()
    {
        $value = \Cache::get('findNewsTop');
        if ($value == null) {
            $value = Blogs::all()->sortBy('created_at')->take(5);
            \Cache::put('findNewsTop', $value, 60);
        }
        return $value;
    }

    public static function findReadsTop()
    {
        $value = \Cache::get('findReadsTop');
        if ($value == null) {
            $value = Blogs::all()->sortBy('reads')->take(5);
            \Cache::put('findReadsTop', $value, 60);
        }
        return $value;
    }

    public static function findLovesTop()
    {
        $value = \Cache::get('findLovesTop');
        if ($value == null) {
            $value = Blogs::all()->sortBy('loves')->take(5);
            \Cache::put('findLovesTop', $value, 60);
        }
        return $value;
    }

}