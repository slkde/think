<?php 
use think\Db;

 //通过ID得到用户的管理组
 function getusergroup($uid)
 {

   $titles =  Db::view('py_auth_group_access')
		        ->view('py_auth_group','title','py_auth_group.id=py_auth_group_access.group_id','RIGHT')
		        ->where('uid',$uid)
		        ->select();
    
    if(empty($titles))
    {
    	return  ;
    }else{

    	foreach ($titles as $k => $v) {
          $array[] = $v['title'];
        }
        return implode(',',$array);

    }

 }
