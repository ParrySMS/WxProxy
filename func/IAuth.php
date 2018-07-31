<?php
/**
 * Created by PhpStorm.
 * User: L
 * Date: 2018-7-30
 * Time: 10:30
 */

interface IAuth
{
    /** 防止其他人恶意调用
     * @param $sign
     * @return mixed
     */
    public function isVaildSign($sign);

    /** 前端传输的加密（建议使用https）
     * @param array $data
     * @return mixed
     */
    public function paramsDecode(Array $data);
}