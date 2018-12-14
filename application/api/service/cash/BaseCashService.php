<?php
/**
 * Created by PhpStorm.
 * User: 麻破伦意识
 * Date: 2018/10/17
 * Time: 13:48
 */

namespace app\api\service\cash;

use app\api\facade\http\Guzzle;
use app\lib\exception\ParameterException;
use think\facade\Config;

class BaseCashService
{

    public function requests(string $sign,array $data,string $funcode)
    {
        $url = Config::get('cash.config')['url'];
        $ua = Config::get('cash.config')['ua'];
        $funCode = Config::get('cash.interface.'.$funcode);
        $timestamp = (string)time();
        $data = base64_encode(json_encode($data));
        $list = compact("ua","funCode","data","sign","timestamp");
        try
        {
            Guzzle::setHeaders(['content-type'=>"application/x-www-form-urlencoded;charset=UTF-8"]);
            $re = Guzzle::post($url,$list);
        }
        catch (RequestException $exception)
        {
            throw new ParameterException();
        }
        return Guzzle::parseJson($re) ;
    }

    protected function getApiFication(string $functName):string
    {
        $path = "cash.interface.".$functName;
        return Config::get($path);
    }


    protected function fieldMd5(array $data)
    {
        $fieldmd5s = Config::get('cash.fieldsmd5');
        array_walk($fieldmd5s,function($value)use(&$data)
        {
            if(array_key_exists($value,$data))
            {
                $data[$value."_md5"] = strtoupper(md5($value));
                unset($data[$value]);
            }
        });
        return $data;
    }
}