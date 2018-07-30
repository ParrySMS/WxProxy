<?php
/**
 * Created by PhpStorm.
 * User: L
 * Date: 2018-4-28
 * Time: 11:43
 */

define('ADDIP','');
define('APPSECRET','');



//获取code之后需要重定向的网址
define('REDIRECT_URI','');

//限制的接口范围

//OAUTH2微信网页授权
define('ACTION_URL_OAUTH',json_encode([
    'oauth2AccessToken'=>'https://api.weixin.qq.com/sns/oauth2/access_token',
    'oauth2RefreshToken'=>'https://api.weixin.qq.com/sns/oauth2/refresh_token',
    'oauth2Userinfo'=>' https://api.weixin.qq.com/sns/userinfo',
    'oauth2IsVaildAccessToken'=>'https://api.weixin.qq.com/sns/auth',
]));


//信息
define('MSG_ERROR','Error: ');

//todo 按组拆分掉url
define('ACTION_REGION','return array(
             
            \'getAuthAccessToken\',
            
            \'sendWxMsgTemplate\',
            \'setIndustry\',
            \'getIndustry\',
            \'addTemplate\',
            \'getAllPrivateTemplate\',
            \'delPrivateTemplate\',
            
            
            \'getJsapiTicket\'
            );
       ');
