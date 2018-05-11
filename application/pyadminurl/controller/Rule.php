<?php
namespace app\pyadminurl\controller;
use app\pyadminurl\model\Rule as RuleModel;
use think\Db;

class Rule extends Common
{

        public function  __construct()
        {
        	parent::__construct();
        	$this->model = new RuleModel();
        }
      
        /** 
	   	 * 权限列表
	     */
		public function index()
		{
			$request = input('get.');
			
			if(!empty($request['orderDirection']))
			{
			  $order = $request['orderField']." ".$request['orderDirection'];	
			  $data=$this->model->order($order)->select();
			}else{      
			  $order = 'id asc';	
			  $data=$this->model->order($order)->select();	
			} 

            $this->assign('data',$this->getTreeData($data));
            return view();
		}
   

	   	/** 
	   	 * 添加权限
	     */
		public function add()
		{
			if(request()->isGet())
			{
              return view();
			}else{
               $data = input('post.');
               if(empty($data['name'])){ $this->errjson('权限名称不能为空');}
               if(empty($data['mca'])){unset($data['mca']);}
               $boolean = $this->model->save($data);
               $boolean ? $this->sucjson('操作成功',1): $this->errjson();
			}
		}

		/** 
	   	 * 修改权限
	     */
		public function save()
		{
			if(request()->isGet())
			{
			   $id = input('param.id');
			   $data = $this->model->where('id',$id)->find()->toArray();
               $this->assign('data',$data);
               return view();
			}else{
               $data = input('post.');
              // dump($data); die;
               if(empty($data['name'])){ $this->errjson('权限名称不能为空');}
               if(empty($data['mca'])){$data['mca'] = null;}
               $boolean = $this->model->save($data,['id'=>$data['id']]);
               $boolean ? $this->sucjson('操作成功',1): $this->errjson();
			}
			
		}

		/**
		 * 删除权限
		 */
		public function delete()
		{
			 $id = input('param.id');
			 $boolean = $this->model->where('id',$id)->delete();
             $boolean ? $this->sucjson(): $this->errjson();
		}


}