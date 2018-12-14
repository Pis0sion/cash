<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 2018/10/16
 * Time: 21:10
 */
/*
 * 业务层处理业务主要层面->model层/接口层
 */
namespace app\api\service\cash;


use app\api\validate\UserFitlerValidate;
use app\common\cash\CashHandle;

class CashUserService extends BaseCashService
{
    public $_handle;

    public function __construct()
    {
        $this->_handle = CashHandle::getInstance();
    }

    public function userFitler(array $data)
    {
        $data = $this->fieldMd5($data);

        $sign = $this->_handle->getSign($data,$this->getApiFication(__FUNCTION__));

        $result = $this->requests($sign,$data,__FUNCTION__);

        halt($result);
    }


}
