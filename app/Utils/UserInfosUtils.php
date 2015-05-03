<?php
/**
 * Created by PhpStorm.
 * User: XdaTk
 * Date: 2015/5/2
 * Time: 22:03
 */

namespace SimBlog\Utils;


use SimBlog\Models\User;

class UserInfosUtils {
    public static function findUserInfos(){
        $value = \Cache::get('findUserInfos');
        if ($value == null) {
            $value = User::all();
            \Cache::pull('findUserInfos', $value, 60);
        }
        return $value;
    }
}