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
       return  User::all();
    }
}