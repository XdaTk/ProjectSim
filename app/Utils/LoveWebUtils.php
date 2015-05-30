<?php
/**
 * Created by PhpStorm.
 * User: XdaTk
 * Date: 2015/5/3
 * Time: 17:29
 */

namespace SimBlog\Utils;


use SimBlog\Models\LoveWeb;

class LoveWebUtils
{
    public static function findAllLoveWebs()
    {
        $value = \Cache::get('findAllLoveWebs');
        if ($value == null) {
            $value = LoveWeb::all();
            \Cache::put('findAllLoveWebs', $value, 60);
        }
        return $value;
    }
}