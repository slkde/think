<?php
namespace app\pyadminurl\controller;
use app\pyadminurl\model\User as UserModel;
use think\Db;

class User extends Common
{

        public function  __construct()
        {
        	parent::__construct();
        	$this->model = new UserModel();
        }
      
        /** 
	   	 * 管理员列表
	     */
		public function index()
		{ 
			$data = Db::table('py_admin_user')->order('id asc')->select();
			$this->assign('data',$data);
			return view();
		}
   

	   	/** 
	   	 * 添加管理员
	     */
		public function add()
		{
			if(request()->isGet())
			{
				$data=Db::name('auth_group')->field('id,title')->select();
				$this->assign('data',$data);
                return view();
			}else{
               $data = input('post.');
               $count = $this->model->where('username',$data['username'])->count();
               if($count){ $this->errjson('用户名已经存在');}

               $userData = [
               	'username' => $data['username'],
               	'password' => md5($data['password'].config('admin_user_str')),
               	'status'   => $data['status'], 
                'register_time' => time()
               ];
               
               $this->model->save($userData);
               $uid = $this->model->id;
               if(!$uid){$this->errjson();}

               if(!empty($data['group']))
               {
                 $group_access= [];
                 foreach ($data['group'] as $k => $v) 
                 {   
                 	 $group_access[$k]['uid']  = $uid;
                 	 $group_access[$k]['group_id']  = $v;

                 }
                 Db::name('auth_group_access')->insertAll($group_access);
               }
              $this->sucjson('操作成功',1);

			}
		}

		/** 
	   	 * 修改管理员
	     */
		public function save()
		{
            if(request()->isGet())
            {   
                $uid = input('param.id');
                $user = Db::name('admin_user')->where('id',$uid)->field('id,username,status')->find();
                $data = Db::name('auth_group')->field('id,title')->select();
                $group_ids = Db::name('auth_group_access')->where('uid',$uid)->column('group_id');
                $this->assign('user',$user);
                $this->assign('group_ids',$group_ids);
                $this->assign('data',$data);
                return view();
            }else{
               $data = input('post.');
               $uid  = $data['id'];
               $userData = [
                'username' => $data['username'],
                'status'   => $data['status'] 
               ];

               if(!empty($data['password']))
               {
                $userData['password'] = md5($data['password'].config('admin_user_str'));
               }
               
               $this->model->save($userData,['id' => $uid]);

               if(!empty($data['group']))
               {
                 Db::name('auth_group_access')->where('uid',$uid)->delete();
                 $group_access = [];
                 foreach ($data['group'] as $k => $v) 
                 {   
                     $group_access[$k]['uid']  = $uid;
                     $group_access[$k]['group_id']  = $v;
                 }
                 Db::name('auth_group_access')->insertAll($group_access);
               }
              $this->sucjson('操作成功',1);

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