<?php
namespace  app\pyadminurl\controller;
use think\Db;

class Advcate extends Common
{

    /*
     * 分类列表
     */
    
    public function index($orderField ='id',$orderDirection = 'desc')
    {
      $order = $orderField." ".$orderDirection;	
      $data = Db::name('adv_category')->order($order)->select();
      $this->assign('data',$data);
      return view();
    }
    
     /*
      * 新增分类
      */

     public function add()
     {
     	if(request()->isGet())
    		{
              return view();
    		}else{

    			$data = input('post.');
    			$rule = ['title|分类名称'  => 'require'];

                $result = $this->validate($data,$rule);
    			if(true !== $result){
    			  $this->errjson($result);
    			}
                $boolean = Db::name('adv_category')->insert($data);
                $boolean ? $this->sucjson('操作成功',1): $this->errjson();
    		}
     }
 


      /*
      * 修改商品分类
      */

     public function save($id = 0)
     {
     	if(request()->isGet())
    		{ 
              $data = Db::name('adv_category')->where('id',$id)->find();
              $this->assign('data',$data);
              return view();
    		}else{
    			$data = input('post.');
    			$rule = ['title|分类名称'  => 'require'];
                $result = $this->validate($data,$rule);
    			if(true !== $result){
    			  $this->errjson($result);
    			}

                $boolean = Db::name('adv_category')->where('id',$data['id'])->update($data);
                $boolean ? $this->sucjson('操作成功',1): $this->errjson();
    		}
     }


      /*
      * 删除商品分类
      */

      public function status($id,$status)
      {
         $data['status'] = $status;
         $boolean = Db::name('adv_category')->where('id',$id)->update($data); 
         $boolean ? $this->sucjson('操作成功'): $this->errjson();
      }



}