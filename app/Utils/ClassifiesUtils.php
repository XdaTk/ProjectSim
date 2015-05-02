<?php
/**
 * Created by PhpStorm.
 * User: XdaTk
 * Date: 2015/5/2
 * Time: 22:04
 */

namespace SimBlog\Utils;


use SimBlog\Models\Classifies;

class ClassifiesUtils {
    public static function findClassify(){
        return Classifies::all();
    }
}