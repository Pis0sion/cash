<?php
/**
 * Created by PhpStorm.
 * User: 麻破伦意识
 * Date: 2018/10/16
 * Time: 17:53
 */

namespace app\index\controller;


class PublicController
{
    public function miss()
    {
        echo json_encode(['code'=>404,"msg"=>'页面不存在'],JSON_UNESCAPED_UNICODE);
    }
}