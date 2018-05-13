<?php 
namespace app\pyadminurl\controller;
use think\Db;
class Config extends Common
{
   
   //网站开关配置 
   public function index()
   {
      // echo 123;die;
      // $data = Db::name('web_config')->where('id',1)->find();
      // $this->assign('data',json_decode($data['webconfig'],true));
      return view();	
   }

   public function switchs(){
      $post  = input('post.');
      //dump($post);
      $boolean = Db::name('web_config')->where('id',1)->update(['webconfig' => json_encode($post)]);
      $boolean ? $this->sucjson():$this->errjson();  
   }

}
