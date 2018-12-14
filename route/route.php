<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
Route::miss('public/miss');

Route::group('api/:version',function()
{
    Route::get("test","api/:version.index/index");
    Route::post("image","api/:version.index/receiveFromData")->allowCrossDomain();
    Route::get("fitler","api/:version.User/fitLer");
    Route::resource('article','api/:version.Index')->allowCrossDomain();;
});















