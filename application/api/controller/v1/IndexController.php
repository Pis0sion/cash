<?php
/**
 * Created by PhpStorm.
 * User: pis0sion
 * Date: 18-10-16
 * Time: 下午9:20
 */

namespace app\api\controller\v1;


class IndexController
{

    public function index()
    {
        return view("index/index");
    }



    public function receiveFromData()
    {
        return "123456";
        $file = request()->file("idcardFront");
        return $file ;
    }
}
