<?php 
namespace app\pyadminurl\controller;
use app\pyadminurl\model\Config as webconf;
use think\Db;

class Config extends Common
{
    public function __construct(){
        parent::__construct();
        $this->model = new webconf();
    }
   
   //网站开关配置 
   public function index()
   {
        // echo 123;die;
        //   $data = Db::name('web_config')->where('id',1)->find();
        //   $this->assign('data',json_decode($data['webconfig'],true));
        $data = webconf::all(function($quert){
            $quert->order('conf_order', 'asc');
        });
        // var_dump($conf);die;
        $this->assign('data',$data);
        return view();	
   }

   public function add(){

        if(request()->isGet())
		{
			return view();
		}else{
			$data = input('post.');
			if(empty($data['conf_name'])){ $this->errjson('菜单名称不能为空');}
			$boolean = $this->model->save($data);
			$boolean ? $this->sucjson('操作成功',1): $this->errjson();
		}
   }

	public function delete()
	{
			$id = input('param.id');
			$boolean = $this->model->where('conf_id',$id)->delete();
			$boolean ? $this->sucjson(): $this->errjson();
    }
    

	// public function save()
	// {
    //     $data = input('post.');
    //     var_dump($data);die;
    //     foreach($data as $k => $v){
    //         if(empty($data[$v])){
    //             unset($data[$k]);
    //         }
    //     }
    //     if(empty($data['conf_name'])){ $this->errjson('菜单名称不能为空');}
    //     $boolean = $this->model->data($data)->save($data,['conf_id'=>$data['id']]);
    //     $boolean ? $this->sucjson('操作成功',1): $this->errjson();

		
    // }
    
    public function save()
	{
		if(request()->isGet())
		{
			$id = input('param.id');
			$data = $this->model->where('conf_id',$id)->find()->toArray();
			$this->assign('data',$data);
			return view();
		}else{
			$data = input('post.');
            if(empty($data['conf_name'])){ $this->errjson('配置名称不能为空');}
            if(empty($data['conf_id'])){ $this->errjson('配置ID不能为空');}
			$boolean = $this->model->data($data)->save($data,['conf_id'=>$data['id']]);
			$boolean ? $this->sucjson('操作成功',1): $this->errjson();
		}
		
	}

}
