<?php
namespace app\index\controller;
use app\common\controller\Common;
use think\Cache;
use think\Url;
use think\Db;
use think\Session; 

//header("Content-type:text/html;charset=UTF-8");
header("Content-type:text/html;charset=utf-8");
class Index  extends Common
{

	/*
	* 博客网站首页
	*/
	public function index()
	{
	    $data = Db::name('article')->where('is_display',1)->select();
        foreach($data as $key=>&$value){
            $value['cate_name'] = Db::name('category')->where('cate_id',$value['cate_id'])->value('cate_name');
//            var_dump($value);die;
        }
//        var_dump($data);die;
        $this->assign('data',$data);
		return view();
	}
     


}
