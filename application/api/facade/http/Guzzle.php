<?php
/**
 * Created by PhpStorm.
 * User: 麻破伦意识
 * Date: 2018/10/17
 * Time: 15:33
 */

namespace app\api\facade\http;


use think\Facade;

class Guzzle extends Facade
{
    protected static function getFacadeClass()
    {
        return \app\common\tools\Guzzle::class;
    }
}