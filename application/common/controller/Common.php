<?php
namespace app\common\controller;
use think\Cache;
use think\Controller;
use think\Db;
use think\View;
use think\Request;
use think\Session;

/*
 * 前台所有的控制器都要继承这个控制器
 * 过滤  集中控制
 */

class Common  extends Controller
{

	public  $switchs ;
	public  function __construct()
	{

      parent::__construct();
      $data = Db::name('web_config')->where('id',1)->find();
      $this->switchs = json_decode($data['webconfig'],true);

      if(empty($this->switchs['web']))
      {
        header("Content-type:text/html;charset=utf8");
        die("站点暂时关闭！具体开启时间请留意官方QQ群(531563291)");
      }

      View::share([
      'title' => config('WEB_NAME').',PUBG饰品交易,CSGO饰品交易,DOTA2饰品交易,购买PUBG饰品，购买DOTA2饰品，购买CSGO饰品，饰品交易，求购PUBG饰品，求购DOTA2饰品，求购CSGO饰品',
      'keywords' => '绝地求生饰品,csgo饰品,dota2饰品,绝地求生饰品',
      'description' => config('WEB_NAME').'是全球最大电竞饰品交易平台,提供全球范围DOTA2,CSGO,PUBG饰品交易,机器人自动处理报价,安全快捷高效' ,
      ]);
	  
	  
	}


   //存入登陆之后的跳转地址
   public  function  return_url($url)
   {
      $url = str_replace('-','/',$url);
      $url = '/index.php/'.$url.".html";
      Session::set('return_url',$url);
      $this->redirect('member/member/login');
   }

    /*
* 返回固定格式的json数据
*/

    function tojson($msg,$status = 0 ,$url  = '')
    {

        $json = [
            'msg' => $msg,
            'status' => $status,
            'url'=>$url
        ];
        if(!$url){ unset($json['url']);}
        die(json_encode($json));

    }


}