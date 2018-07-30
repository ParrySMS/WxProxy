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
define("REDIRECT_URI",'');

//限制的接口范围

//OAUTH2微信网页授权
define('ACTION_URL_OAUTH2',json_encode([
    'oauth2AccessToken'=>'https://api.weixin.qq.com/sns/oauth2/access_token',
    'oauth2RefreshToken'=>'https://api.weixin.qq.com/sns/oauth2/refresh_token',
]));





define('ACTION_REGION','return array(
            \'getSnsAccessToken\'=>\'\',
            \'refreshWxToken\',
            \'getWxUserinfo\',
            
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
