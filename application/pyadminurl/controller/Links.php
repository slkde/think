<?php
namespace app\pyadminurl\controller;
use think\Db;
use app\pyadminurl\model\Links as LinksModel;

	class Links extends Common
	{
		public $model = '';
 
       
		public function __construct(){
			parent::__construct();
			$this->model = new LinksModel();
		}


 		/** 
	   	 * 友情链接列表
	     */
		public function index()
		{
			// $data = $this->model->order('sort','asc');
			$data = LinksModel::find();
			// echo '<pre>';var_dump($data);die;
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
               $boolean = $this->model->insert($data);
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
			   $data = $this->model->where('id',$id)->find();
               $this->assign('data',$data);
               return view();
			}else{
               $data = input('post.');
               $boolean = $this->model->where('id',$data['id'])->update($data);
               $boolean ? $this->sucjson('操作成功',1): $this->errjson();
			}
			
		}

		/**
		 * 删除菜单
		 */
		public function delete()
		{
			 $id = input('param.id');
			 $boolean = $this->model->where('id',$id)->delete();
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
			 $this->model->where('id',$k)->update($array);
			}
           
	        $this->sucjson();
		}




	}


