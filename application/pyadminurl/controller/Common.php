<?php
namespace app\pyadminurl\controller;
use think\Controller;
use think\Request;
use think\Session;
use think\Db;


/**
  后台控制基类，除了登陆后台所有的控制器都要继承这个类
*/

class Common extends controller
{
     
	/**
	 * 初始化方法 
	 */
	public function _initialize()
	{
		parent::_initialize();
        
		// $auth = new \zzh\Auth();
		// $request = Request::instance();
		// $m = $request->module();
		// $c = $request->controller();
		// $a = $request->action();

		// $rule_name=$m.'/'.$c.'/'.$a;
		// $request = \think\Request::instance();
		// $ip = $request->ip();
        // $params = input('param.');
    
        // if(count($params) > 0 )
        // {
        //  Zlog($params,'Admin','ip:'.$ip .'操作的方法为:'.$rule_name);   
        // }

		// if(!Session::get('user.id') == 1)
		// {
		// 	$result=$auth->check($rule_name,Session::get('user.id'));
		// 	if(!$result){
		// 		$this->errjson('您没有权限访问!');
		// 	}
		// }
		if(!Session::get('user')){
			return $this->redirect('/admin');
		}
		
	}

     /**
      *后台操作成功返回数据
      *$close代表是否关闭窗体
      */
	 public function sucjson($msg = '操作成功',$close = 0)
	 {
        $return['statusCode'] = 200;
        $return['message'] = $msg;
        if($close)
            $return['closeCurrent'] = true;
        die(json_encode($return));
	 }

	 /**
	  *后台操作失败返回数据
	  */
	 public function errjson($msg = '操作失败')
	 {
        $return['statusCode'] = 300;
        $return['message'] = $msg;
        die(json_encode($return));
	 }



 	/**
	 * 获取全部菜单
	 * @param  string $type tree获取树形结构 level获取层级结构
	 * @return array       	结构数据
	 */
	public  function getTreeData($data,$type = 'tree',$title = 'name')
	{
       
		// 获取树形或者结构数据
		if($type=='tree')
		{
			$data = \zzh\Data::tree($data,$title,'id','pid');

		}elseif($type="level"){
			$data = \zzh\Data::channelLevel($data,0,'&nbsp;','id');
			// 显示有权限的菜单
			$auth = new \zzh\Auth();
            $uid = Session::get('user.id');
            if($uid != 1)
            {
				 foreach ($data as $k => $v) 
				 {
				 	//echo $v['mca']
				 	if ($auth->check($v['mca'],$uid)) 
				 	{
				 		foreach ($v['_data'] as $m => $n) 
				 		{
				 			if(!$auth->check($n['mca'],$uid))
				 			{
				 				//echo  $data[$k]['_data'][$m]."<br/>";
								unset($data[$k]['_data'][$m]);
							}
						}
					}else{
						// 删除无权限的菜单
						unset($data[$k]);
					}
				}
			}

		}
		// p($data);die;
		return $data;
	}


	/*
	 *  上传图片
	 */

	 public function uploadimg()
	 {
 	    $file = request()->file('file');
	    // 移动到框架应用根目录/public/uploads/ 目录下
	    if($file)
	    {
	        $info = $file->move(ROOT_PATH.'/public/Uploads/Picture');
	        if($info){

	        	$array = [
	        		'filename' => '/Uploads/Picture/'.$info->getSaveName(),
	        		'statusCode' => '200',
	        		'message' => '上传成功'
	        	];  
	            return json($array);
	        }else{
	        	$array = [
	        		'filename' => '/Uploads/Picture/'.$info->getSaveName(),
	        		'statusCode' => '300',
	        		'message' => $file->getError()
	        	]; 
	            return json($array);
	        }
	    }
	 }


}