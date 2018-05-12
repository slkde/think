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
	    $data = Db::name('article')
            ->where('is_display',1)
            ->paginate(3,false, ['type' => 'Bootstrap',
                'var_page' => 'page',
                'query' => request()->param(),
            ]);
        $page = $data->render();
        $this->assign([
            'data'=>$data,
            'page' => $page,
        ]);
		return view();
	}

	public function artList()
    {
        $art_id = input('art_id');
        var_dump($art_id);
        return view();
    }
     


}
