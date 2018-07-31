<?php
/**
 * Created by PhpStorm.
 * User: L
 * Date: 2018-7-30
 * Time: 11:51
 */

require "./func/Http.php";
require "./func/Auth.php";
require "./config/config.php";

try {

    //只使用post方法
    if (!$_SERVER['REQUEST_METHOD'] == 'POST') {
        throw new Exception('Method Not Allowed', 405);
    }

    //获取数据参数
    $data = isset($_POST) ? $_POST : [];
    if(sizeof($data)==0){
        throw new Exception('data error',400);
    }

    //前端传输的解密 默认无加密
    $auth = new Auth();
    $data = $auth->paramsDecode($data);

    //获取参数
    $sign = isset($_POST['sign']) ? $_POST['sign'] : null;
    $method = isset($_POST['method']) ? $_POST['method'] : null;
    $url = isset($_POST['url']) ? urldecode($_POST['url']) : null;

    //参数校验
    if(in_array(null,[$sign,$method,$url])){
        throw new Exception('params has null',400);
    }
    $auth->isVaildSign($sign);
    $auth->isVaildUrl($url);

    //根据方法请求地址url 使用数据data
    $http = new Http();
    switch ($method) {
        case 'GET':
        case 'get':
            $res = $http->get($url, $data);
            break;
        case 'POST':
        case 'post':
            $res = $http->post($url, $data);
            break;
        default:
            throw new Exception('method params error', 400);
    }

    if (!is_null($res)) {
        print_r($res);
    }

} catch (Exception $e) {
    echo MSG_ERROR . $e->getMessage();
    $http->status($e->getCode());
}

