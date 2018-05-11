<?php 
namespace app\pyadminurl\controller;
use think\Db;
class Config extends Common
{
   
   //网站开关配置 
   public function switchs()
   {
   	 if(request()->isGet())
   	 {
   	   $data = Db::name('web_config')->where('id',1)->find();
   	   $this->assign('data',json_decode($data['webconfig'],true));
   	   return view();	
   	 }else{
       $post  = input('post.');
       //dump($post);
       $boolean = Db::name('web_config')->where('id',1)->update(['webconfig' => json_encode($post)]);
       $boolean ? $this->sucjson():$this->errjson();  
   	 }
        
   }

}
