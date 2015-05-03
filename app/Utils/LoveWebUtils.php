<?php
/**
 * Created by PhpStorm.
 * User: XdaTk
 * Date: 2015/5/3
 * Time: 17:29
 */

namespace SimBlog\Utils;


use SimBlog\Models\LoveWeb;

class LoveWebUtils {
    public static function findAllLoveWebs(){
        return LoveWeb::all();
    }
}