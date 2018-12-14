<?php
/**
 * Created by PhpStorm.
 * User: 麻婆伦意识
 * Date: 2018/10/16
 * Time: 22:40
 */

namespace app\api\validate;


class UserFitlerValidate extends BaseValidate
{
    protected $rule = [
        'user_name' => 'require',
        'user_phone' => 'require|isMobile',
        'user_idcard' => 'require|cardNo',
    ];

    protected $message = [
        'user_name.require' => '请填写用户姓名',
        'user_phone.require' => '请填写用户手机号',
        'user_phone.isMobile' => '手机号码不正确',
        'user_idcard.require' => '请填写用户身份证号码',
        'user_idcard.cardNo' => '身份证号码不正确'
    ];
}