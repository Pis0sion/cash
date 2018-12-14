<?php
/**
 * Created by PhpStorm.
 * User: 麻破伦意识
 * Date: 2018/10/17
 * Time: 11:26
 */

namespace app\api\traits;


trait Singleton
{
    protected static $instance ;

    protected function __construct()
    {

    }

    protected function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public static function getInstance()
    {
        if(!self::$instance instanceof self)
        {
            self::$instance = new self ;
        }
        return self::$instance ;
    }
}