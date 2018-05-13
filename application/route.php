<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;

// return [
//     '__pattern__' => [
//         'name' => '\w+',
//     ],
//     '[hello]'     => [
//         ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//         ':name' => ['index/hello', ['method' => 'post']],
//     ],

// ];

// Route::get('admin', function(){
//     echo 123;
// });

// Route::rule('index/admin', function(){
//     echo 123;
// });

Route::get('admin/','pyadminurl/login/index');
Route::post('admin/','pyadminurl/login/login');
Route::rule('admin/logout','pyadminurl/login/logout');
Route::get('login/captcha','pyadminurl/login/captcha');

Route::rule('admin/index','pyadminurl/index/index');
