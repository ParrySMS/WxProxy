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
    //只使用post方法
    //获取参数
    $url = isset($_POST['url']) ? $_POST['url'] : null;
    $data = isset($_POST) ? $_POST : [];

    //todo post转发 地址url 数据data 

} catch (Exception $e) {
    echo MSG_ERROR . $e->getMessage();
    $http->status($e->getCode());
}

