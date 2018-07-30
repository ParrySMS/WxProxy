<?php
/**
 * Created by PhpStorm.
 * User: L
 * Date: 2018-7-30
 * Time: 11:51
 */

require "./func/http.php";
require "./config/config.php";

try {
    //获取参数
    $url = isset($_GET['url']) ? $_GET['url'] : null;


} catch (Exception $e) {
    echo MSG_ERROR . $e->getMessage();
    $http->status($e->getCode());
}

