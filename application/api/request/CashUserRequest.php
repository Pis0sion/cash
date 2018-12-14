<?php
/**
 * Created by PhpStorm.
 * User: 麻破伦意识
 * Date: 2018/10/16
 * Time: 17:56
 */
/*
 * 校验层 过滤非法字段，传递给业务层
 */
namespace app\api\request;

use think\Request;
use app\api\validate\UserFitlerValidate;

class CashUserRequest extends Request
{

    public function userFitler()
    {
        (new UserFitlerValidate())->goCheck();
        $post = Request::only(['user_name','user_phone','user_idcard']);
        return app("CashUser")->userFitler($post);
    }





}