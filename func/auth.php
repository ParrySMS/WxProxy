<?php
/**
 * Created by PhpStorm.
 * User: L
 * Date: 2018-4-29
 * Time: 10:41
 */

Class Auth implements IAuth
{
    public function isVaildSign($sign)
    {
        $day = date("Y-m-d-H");
        if ($sign != md5($day)) {
            throw new Exception("sign not vaild", 400);
        }
    }

    public function isVaildUrl($url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED)) {
            throw new Exception("url not vaild", 400);
        }
    }

}

