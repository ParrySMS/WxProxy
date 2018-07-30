<?php
/**
 * Created by PhpStorm.
 * User: L
 * Date: 2018-4-28
 * Time: 17:12
 */
require "./func/http.php";
require "./config/config.php";

try {
    //获取参数
    $code = isset($_GET['code']) ? $_GET['code'] : null;
    $url = isset($_GET['url']) ? $_GET['url'] : null;

    //检查code
    if (!is_string($code)) {
        throw new Exception('code error', 500);
    }

    //检查url
    $pattern = "/\b(?:(?:https?|http):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
    if (!preg_match($pattern, $url)) {
        throw new Exception("invaild : $url ", 500);
    }

    //跳转
    $http = new Http();
//    var_dump($url);
    $http->jump2Url($url . "?code=$code");

} catch (Exception $e) {
    echo MSG_ERROR . $e->getMessage();
    $http->status($e->getCode());
}
