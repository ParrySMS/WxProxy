<?php
/**
 * Created by PhpStorm.
 * User: L
 * Date: 2018-7-31
 * Time: 9:12
 */

class Http
{
    /** 定时跳转到指定页面
     * @param $url string 跳转地址
     * @param $time int 指定秒数
     */
    public function jump2Url($url, $time = 0)
    {
        print <<<to
    <head><meta http-equiv="refresh" content=$time;url="$url"></head>
to;
    }


    /** 弹窗并跳转到某页面
     * @param $info
     * @param null $url
     */
    public function alert2Url($info, $url = null)
    {
        echo '<script language="JavaScript">';
        echo 'alert(" ' . $info . ' ");';
        echo 'location.href=" ' . $url . ' ";</script>';
    }

    /** 发送请求
     * @param $url
     * @param null $data
     * @return mixed
     */
    public function post($url, $data = null)
    {
        $ch = curl_init();
        /* 设置验证方式 */
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Accept:text/plain;charset=utf-8',
            'Content-Type:application/x-www-form-urlencoded',
            'charset=utf-8'
        ));
        /* 设置返回结果为流 */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        /* 设置超时时间*/
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        /* 设置通信方式 */
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        if (!empty($data)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        }
        $result = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);
        if ($result === false) {
//        echo 'Curl error: ' . $error;
//            return 'Curl error: ' . $error;
            throw new Exception('Curl error: ' . $error, 500);
        } else {
            return $result;
        }
    }

    public function get($url, $data = null)
    {
        $ch = curl_init();
        /* 设置验证方式 */
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Accept:text/plain;charset=utf-8',
            'Content-Type:application/x-www-form-urlencoded',
            'charset=utf-8'
        ));
        /* 设置返回结果为流 */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        /* 设置超时时间*/
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        /* 设置通信方式 */
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        if (!empty($data)) {
            $url = $url . '?' . http_build_query($data);
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);
        if ($result === false) {
//            return 'Curl error: ' . $error;
            throw new Exception('Curl error: ' . $error, 500);
        } else {
            return $result;
        }
    }

    public function status($status_code)
    {
        $http = array(
            100 => "HTTP/1.1 100 Continue",
            101 => "HTTP/1.1 101 Switching Protocols",
            200 => "HTTP/1.1 200 OK",
            201 => "HTTP/1.1 201 Created",
            202 => "HTTP/1.1 202 Accepted",
            203 => "HTTP/1.1 203 Non-Authoritative Information",
            204 => "HTTP/1.1 204 No Content",
            205 => "HTTP/1.1 205 Reset Content",
            206 => "HTTP/1.1 206 Partial Content",
            300 => "HTTP/1.1 300 Multiple Choices",
            301 => "HTTP/1.1 301 Moved Permanently",
            302 => "HTTP/1.1 302 Found",
            303 => "HTTP/1.1 303 See Other",
            304 => "HTTP/1.1 304 Not Modified",
            305 => "HTTP/1.1 305 Use Proxy",
            307 => "HTTP/1.1 307 Temporary Redirect",
            400 => "HTTP/1.1 400 Bad Request",
            401 => "HTTP/1.1 401 Unauthorized",
            402 => "HTTP/1.1 402 Payment Required",
            403 => "HTTP/1.1 403 Forbidden",
            404 => "HTTP/1.1 404 Not Found",
            405 => "HTTP/1.1 405 Method Not Allowed",
            406 => "HTTP/1.1 406 Not Acceptable",
            407 => "HTTP/1.1 407 Proxy Authentication Required",
            408 => "HTTP/1.1 408 Request Time-out",
            409 => "HTTP/1.1 409 Conflict",
            410 => "HTTP/1.1 410 Gone",
            411 => "HTTP/1.1 411 Length Required",
            412 => "HTTP/1.1 412 Precondition Failed",
            413 => "HTTP/1.1 413 Request Entity Too Large",
            414 => "HTTP/1.1 414 Request-URI Too Large",
            415 => "HTTP/1.1 415 Unsupported Media Type",
            416 => "HTTP/1.1 416 Requested range not satisfiable",
            417 => "HTTP/1.1 417 Expectation Failed",
            500 => "HTTP/1.1 500 Internal Server Error",
            501 => "HTTP/1.1 501 Not Implemented",
            502 => "HTTP/1.1 502 Bad Gateway",
            503 => "HTTP/1.1 503 Service Unavailable",
            504 => "HTTP/1.1 504 Gateway Time-out"
        );
        header($http[$status_code]);
    }
}