<?php
/**
 * Created by PhpStorm.
 * User: 麻破伦意识
 * Date: 2018/10/17
 * Time: 9:14
 */

namespace app\common\cash;

use app\api\traits\Singleton;
use app\lib\exception\ParameterException;
use think\facade\Config;

class CashHandle
{
    protected  $config;

    use Singleton;

    protected function __construct()
    {
        if(Config::has('cash.config'))
        {
            $this->config = Config::get('cash.config');
        }
        else{
            throw new ParameterException();
        }
    }

    protected  function getSignKey()
    {
        $signkey = $this->config['ua'].$this->config['key'].$this->config['ua'].$this->config['key'].$this->config['ua'];

        return $signkey;
    }

    public  function getSign(array $data,string $funcode) :string
    {
        $data = json_encode($data);

        $signkey = $this->getSignKey();

        $sign = strtoupper(md5($signkey.$data.$signkey.$funcode.$signkey));

        return $sign;
    }


}