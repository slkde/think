<?php 
namespace app\pyadminurl\controller;
use think\Db;
use think\Session ; 
use think\Controller;
use app\pyadminurl\model\User;
use app\config;
class Login  extends Controller
{
    
    /** 
     * 登陆
     */
    public function index(){
        if(Session::get('user'))
        $this->redirect('admin/index');
        return view();
    }
    public function login()
    {   /*
        $session['id'] = 1;
        $session['username'] = 'pyadmin';
        Session::set('user',$session);
        */
        // echo 123;die;
        // if(request()->isGet())
        // {  
        //     if(Session::get('user'))
        //     $this->redirect('Index/index');
        //     return view();
        // }else{
            $post = input('post.');
            // var_dump($post);die;
            $request = \think\Request::instance();
            $ip =  $request->ip();

            if(empty($post['username']) || empty($post['password']) || empty($post['captcha']) )
            {
                 return ['status'=>0,'msg'=>'信息输入不完整！'];
            }
             
            //php获取今日开始时间戳和结束时间戳
            // $beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
            // $endToday=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;

            //验证当前用户今天是否登陆失败3次   
            // $count = Db::name('login_error')
            // ->where('username',$post['username'])
            // ->where('create_time',['>',$beginToday],['<',$endToday],'and')
            // ->count();

            
            // if($count >=3){ return ['status'=>0,'msg'=>'失败次数过多，不能登陆'];}   
 
            // //验证当前ip今天是否登陆失败3次
            // $count = Db::name('login_error')
            // ->where('ip',$ip)
            // ->where('create_time',['>',$beginToday],['<',$endToday],'and')
            // ->count();
            
            // if($count >=3){ return ['status'=>0,'msg'=>'失败次数过多，不能登陆'];}  
            // $this->validate($data,[
            //     'captcha|验证码'=>'require|captcha'
            // ]); 
            // echo md5($post['password'].config('admin_user_str'));die();
            // $data = User::get(['user_name' => $post['username']])->toArray();
            // $data->update(['user_pass' => md5($post['password']).config('admin_user_str')]);
            // var_dump($data['password']);die;

            $captcha = new \think\captcha\Captcha();
            $boolean = $captcha->check($post['captcha'],'admin');
            // var_dump($boolean);die;
            if(!$boolean) { 
                // $this->errlogin($post['username'],1);
                return ['status'=>0,'msg'=>'验证码不正确!'];
            } 
            // User::find();die;
            // $data = Db::name('user')->where('user_name',$post['username'])->find();

            $data = User::get(['user_name' => $post['username']])->toArray();
            // var_dump($data);die();
            if(empty($data)){
                // $this->errlogin($post['username'],2);
                return ['status'=>0,'msg'=>'账号不存在!'];
            }
            if($data['user_pass'] != md5($post['password'].config('admin_user_str')))
            {   
                // $this->errlogin($post['username'],3);
                return ['status'=>0,'msg'=>'密码错误！'];
            }else{
                // $userData = 
                // [
                //     'last_login_ip' => $ip,
                //     'last_login_time' => time()
                // ];
                // Db::name('admin_user')->where('id',$data['id'])->update($userData);
                $session['id'] = $data['user_id'];
                $session['username'] = $data['user_name'];
                Session::set('user',$session);
                return ['status'=>1,'msg'=>'登陆成功']; 
            }
        // }
    }


    /*
     * 登陆失败，日志记录
     */
    public function errlogin($username,$status,$type = 1)
    { 
      
        $request = \think\Request::instance();
        $data = [
            'username' => $username,
            'status'=> $status,
            'type' => $type,
            'ip' => $request->ip(),
            'create_time' => time()
        ];
        
        Db::name('login_error')->insert($data);
        
    }

    /*
     *  退出
     */
    public function logout()
    {
        // var_dump(redirect('admin'));die;
        Session::delete('user');
        return $this->redirect('/admin');
    }


    public function captcha()
    {
    	$config = [
		    // 验证码字体大小
		    'fontSize'    => 18,    
		    // 验证码位数
		    'length'      => 4,   
		    // 关闭验证码杂点
		    'useNoise'    => false, 
		    'useCurve'=>false,
		    'imageH' =>40,
		    'imageW' =>140
		];
		$captcha = new \think\captcha\Captcha($config);
		return $captcha->entry('admin');
    }



}