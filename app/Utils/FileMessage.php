<?php
/**
 * Created by PhpStorm.
 * User: XdaTk
 * Date: 2015/3/21
 * Time: 19:03
 */

namespace SimBlog\Utils;


class FileMessage
{
    public static $UPUCCESS = 1;
    public static $UPFAIL = 0;
    public $success;
    public $message;
    public $url;
}