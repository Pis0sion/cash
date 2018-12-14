<?php
/**
 * Created by PhpStorm.
 * User: pis0sion
 * Date: 18-10-16
 * Time: 下午3:32
 */
/*
 * 控制层接受数据传递视图层处理业务
 */
namespace app\api\controller\cash;


use app\api\request\CashUserRequest;
use think\Controller;

class UserController extends Controller
{
    protected $cashUserRequest;

    public function __construct(CashUserRequest $cashUserRequest)
    {
        $this->cashUserRequest = $cashUserRequest;
        parent::__construct();
    }

    public function fitLer()
    {
        $this->cashUserRequest->userFitler();
    }
}