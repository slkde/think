<?php
namespace app\member\controller;
use app\common\controller\Common;
use think\View;
use think\Validate;
use think\Db;
use think\Session ;
class Member extends Common
{
    /*
    * 登陆
    */
    public  function login()
    {

        if(request()->isGet())
        {
            if(is_login()){$this->redirect('/');}
            \think\View::share('title','用户登陆');
            return view();
        }else{
            //判断登陆是否开启
            if(empty($this->switchs['login'])){tojson('登陆已关闭!');}
            //验证
            $validate = new Validate([
                'user_name|账号'  => 'require|max:50|min:6',
                'user_pass|密码' => 'require|max:50|min:6'
            ]);

            $data = input('post.');
            if (!$validate->check($data)) {tojson($validate->getError());}
            $map['user_name|email'] =  $data['user_name'];
            $member = Db::name('user')->where($map)->find();
            if(empty($member)){tojson('账号不存在！');}
            //if(empty($member['mobile'])){ tojson('请绑定手机号码！',-1);}
            if($member['status'] == -1){ tojson('账号已禁用');}

            if($member['user_pass'] != md5(sha1($data['user_pass']) . config('member_key')))
            {
                tojson('密码错误！');
            }else{

                //验证成功，登陆操作
                $request = \think\Request::instance();
                $ip =  $request->ip();
                $userData =
                    [
                        'last_login_ip' => $ip,
                        'last_login_time' => time()
                    ];

                Db::name('user')->where('id',$member['user_id'])->update($userData);
                $session['id'] = $member['user_id'];
                $session['user_name'] = $member['user_name'];
                $session['nickname'] = $member['nickname'];
                Session::set('member',$session);

                if(Session::has('return_url')){
                    $url = Session::pull('return_url');
                }else{
                    $url = '/';
                }
                die( json_encode(['status'=>1,'msg'=>'登陆成功,页面跳转中','url'=>$url]));
            }
        }
    }

    /*
   * 注册
   */
    public function register()
    {

        if(request()->isGet())
        {
            View::share('title','用户注册');
            return view();
        }else{
            //判断注册是否开启
            if(empty($this->switchs['register'])){ tojson('注册已关闭！');}
            $data = input('post.');

            $rule = [
                'password|密码'  => 'require|max:50|min:6',
                'nickname|昵称'  => 'max:50|min:6|unique:member',
                'email|邮箱'     => 'email|unique:member',
//                'mobile|手机号'    => 'regex:/^1[34578]\d{9}$/|unique:member',
            ];


                $userLogic = new \app\message\controller\Email();
                $check_code = $userLogic->sms_code_verify($data['email'], $data['code']);
                if($check_code['status'] != 1) { tojson('验证码验证失败!'); }

            //验证
            $validate = new Validate($rule);
            if (!$validate->check($data)) {tojson($validate->getError());}

            $request = \think\Request::instance();
            $ip =  $request->ip();

            $member = [
                'nickname' => $data['nickname'],
                'email' => $data['email']?:'',
                'mobile' => $data['mobile']?:'',
                'password' => md5(sha1($data['password']) . config('member_key')),
                'reg_time' => time(),
                'reg_ip' => $ip,
                'type' => 1
            ];

            $boolean = Db::name('member')->insert($member);
            if($boolean)
            {
                tojson('注册成功，请赶紧登陆吧！',1);
            }else{
                tojson('注册失败！',1);
            }
        }
    }
}