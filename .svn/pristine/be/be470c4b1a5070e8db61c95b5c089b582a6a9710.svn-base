<?php 
namespace app\pyadminurl\controller;
use think\Db;
class Adv extends Common
{
    
     public function __construct()
     {
     	 parent::__construct();
     	 $category = Db::name('adv_category')->where('status',1)->select();
     	 //dump($category);
     	 $this->assign('category',$category);
     }

     //广告列表
     public function index($pageSize = 50 , $pageCurrent = 1 , $cid = 0)
     { 
        if($cid){$where['cid'] = $cid ;}
        if(empty($where)){$where = "1 = 1" ; } 

        $pagesizes = array(50,100,200);
        //总条数
        $total = Db::view('adv')
        ->view('adv_category','title as ctitle','adv_category.id=adv.cid','LEFT') 
        ->where($where)  
        ->count();


        $data =  Db::view('adv')
        ->view('adv_category','title as ctitle','adv_category.id=adv.cid','LEFT') 
        ->where($where)  
        ->order('adv.sort asc')
        ->page($pageCurrent .','. $pageSize)
        ->select();     
  
        $this->assign([
        'data'  => $data,
        'total' => $total,
        'pagesize' => $pageSize,
        'pagesizes' =>$pagesizes,
        'pageCurrent' => $pageCurrent,
        'cid' => $cid,
        ]);
        
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
               $data['start_time'] = strtotime($data['start_time']);
               $data['end_time'] = strtotime($data['end_time']);
               $data['create_time'] = time();
               $boolean = Db::name('adv')->insert($data);
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
			   $data = Db::name('adv')->where('id',$id)->find();
               $this->assign('data',$data);
               return view();
			}else{
               $data = input('post.');
               //dump($data);
               $data['start_time'] = strtotime($data['start_time']);
               $data['end_time'] = strtotime($data['end_time']);

               //dump($data); die;
               $boolean = Db::name('adv')->where('id',$data['id'])->update($data);
               $boolean ? $this->sucjson('操作成功',1): $this->errjson();
			}
			
		}

		/**
		 * 删除菜单
		 */
		public function delete()
		{
			 $id = input('param.id');
			 $boolean = Db::name('adv')->where('id',$id)->delete();
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
			 Db::name('adv')->where('id',$k)->update($array);
			}
           
	        $this->sucjson();
		}




}