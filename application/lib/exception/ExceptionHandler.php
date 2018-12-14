<?php
/**
 * Created by PhpStorm.
 * User: 麻破伦意识
 * Date: 2018/10/23
 * Time: 14:23
 */

namespace app\lib\exception;


use Exception;
use think\exception\Handle;
use think\exception\HttpException;
use think\Log;

class ExceptionHandler extends Handle
{

    private $code;
    private $msg;
    private $errorCode;
    private $status;

    /*
     * 捕捉异常处理
     */
    public function render(Exception $e)
    {

        if($e instanceof BaseException)
        {
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;
            $this->status = $e->status;
        }
        else{
            $this->code = 500;
            $this->msg = "sorry，we make a mistake. (^o^)Y";
            $this->errorCode = 999;
            $this->status = $e->status;
            $this->recordErrorLog($e);
        }

        $result = [
            'message' => $this->msg,
            'error_code' => $this->errorCode,
            'request_url' => request()->url(),
            'code' => $this->code,
        ];

        return json($result,$this->code);
    }

    /*
     * 记录异常错误日志
     */
    private function recordErrorLog(Exception $e)
    {
        \think\facade\Log::record($e->getMessage(),"error");
    }
}