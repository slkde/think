<?php

namespace app\pyadminurl\controller;
use app\pyadminurl\model\Navs as NavModel;

class Nav extends Common
{

	
	public function  __construct()
	{
		parent::__construct();
		$this->model = new NavModel();
	}
	
	/** 
	 * 菜单列表
		*/
	public function index()
	{
		// return 123;die;
		// $request = input('get.');
		
		// if(!empty($request['orderDirection']))
		// {
		//   $order = $request['orderField']." ".$request['orderDirection'];	
		//   $data=$this->model->order($order)->select();
		// }else{      
		//   $order = 'sort asc';	
		//   $data=$this->model->order($order)->select();	
		// } 

		// $this->assign('data',$this->getTreeData($data));
		$data = $this->model->all()->toArray();
		$this->assign('data',$data);
		return view();
	}


	/** 
	 * 添加菜单
		*/
	public function add()
	{
		if(request()->isGet())
		{
			return view();
		}else{
			$data = input('post.');
			if(empty($data['name'])){ $this->errjson('菜单名称不能为空');}
			$boolean = $this->model->save($data);
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
			$data = $this->model->where('id',$id)->find()->toArray();
			$this->assign('data',$data);
			return view();
		}else{
			$data = input('post.');
			if(empty($data['name'])){ $this->errjson('菜单名称不能为空');}
			$boolean = $this->model->data($data)->save($data,['id'=>$data['id']]);
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
		foreach ($data as $k => $v) {
			$array[$k]['id'] =$k;
			$array[$k]['sort'] =$v;
		}
		$this->model->saveAll($array);
		$this->sucjson();
	}


}


