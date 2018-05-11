<?php
namespace app\pyadminurl\controller;
use think\Db;

	class Links extends Common
	{
 
        /** 
	   	 * 友情链接列表
	     */
		public function index()
		{
		    $data = Db::name('links')->order('sort asc')->select();
            $this->assign('data',$data);
            return view();
		}
   
	   	/** 
	   	 * 添加链接
	     */
		public function add()
		{
			if(request()->isGet())
			{
              return view();
			}else{
               $data = input('post.');
               $boolean = Db::name('links')->insert($data);
               $boolean ? $this->sucjson('操作成功',1): $this->errjson();
			}
		}

		/** 
	   	 * 修改菜单
	     */
		public function save()
		{
			if(request()->isGet())
			{
			   $id = input('param.id');
			   $data = Db::name('links')->where('id',$id)->find();
               $this->assign('data',$data);
               return view();
			}else{
               $data = input('post.');
               $boolean = Db::name('links')->where('id',$data['id'])->update($data);
               $boolean ? $this->sucjson('操作成功',1): $this->errjson();
			}
			
		}

		/**
		 * 删除菜单
		 */
		public function delete()
		{
			 $id = input('param.id');
			 $boolean = Db::name('links')->where('id',$id)->delete();
             $boolean ? $this->sucjson(): $this->errjson();
		}

       	/**
		 * 菜单排序
		 */
		public function sort()
		{
			$data=input('post.sort/a');
			$array = [] ;
			foreach ($data as $k => $v) 
			{
			 $array['sort'] =$v;
			 Db::name('links')->where('id',$k)->update($array);
			}
           
	        $this->sucjson();
		}




	}


