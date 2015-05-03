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
        $value = \Cache::get('findClassify');
        if ($value == null) {
            $value = Classifies::all();
            \Cache::pull('findClassify', $value, 60);
        }
        return $value;
    }
}