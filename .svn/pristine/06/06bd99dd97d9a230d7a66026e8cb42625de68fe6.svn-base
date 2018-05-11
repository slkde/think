<?php
namespace app\pyadminurl\controller;
use app\pyadminurl\model\Group as GroupModel;
use think\Db;

class Group extends Common
{

        public function  __construct()
        {
        	parent::__construct();
        	$this->model = new GroupModel();
        }
      
        /** 
	   	 * 用户组列表
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
            $this->assign('data',$data);
            return view();
		}
   

	   	/** 
	   	 * 添加
	     */
		public function add()
		{
			if(request()->isGet())
			{
              return view();
			}else{
               $data = input('post.');
               if(empty($data['title'])){ $this->errjson('用户组名称不能为空');}
               $boolean = $this->model->save($data);
               $boolean ? $this->sucjson('操作成功',1): $this->errjson();
			}
		}

		/** 
	   	 * 修改
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
               if(empty($data['title'])){ $this->errjson('用户组名称不能为空');}
               $boolean = $this->model->data($data)->save($data,['id'=>$data['id']]);
               $boolean ? $this->sucjson('操作成功',1): $this->errjson();
			}
			
		}

		/**
		 * 删除
		 */
		public function delete()
		{
			 $id = input('param.id');
			 $boolean = $this->model->where('id',$id)->delete();
             $boolean ? $this->sucjson(): $this->errjson();
		}

		/**
		 * 权限分配
		 */
		public function  rule_group()
		{
			if(request()->isGet())
			{
			    $id = input('param.id');
			    // 获取用户组数据
	            $group_data = $this->model->where('id',$id)->find()->toArray();
	            $group_data['rules']=explode(',', $group_data['rules']);

	            // 获取规则数据
	            $rule_data = Db::name('auth_rule')->select();

	            $rule_data = $this->getTreeData($rule_data,'level');
	            $assign =[
	                'group_data'=>$group_data,
	                'rule_data'=>$rule_data
	                ];

	            $this->assign($assign);
                return view();
			}else{
               $request = input('post.');
               $id = $request['id'];
               $data['rules'] = implode(',',$request['ids']);
               if(empty($id)){ $this->errjson('数据异常');}
               $boolean = $this->model->data($data)->save($data,['id'=>$id]);
               $boolean ? $this->sucjson('操作成功',1): $this->errjson();
			}
		}


}