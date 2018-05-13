<?php
/** 发送邮箱验证码 */
namespace app\message\controller;
use app\common\controller\Common;
use think\Db;
class Email extends Common
{


       
        //发送找回邮箱验证码
        public function  sendResetEmailCode($toemail = '1558573029@qq.com')
        {   
            $boolean = filter_var($toemail, FILTER_VALIDATE_EMAIL);
            if(!$boolean){ die('请输入正确的邮箱！');} 
            // $boolean = Db::name('member')->where('email',$toemail)->count();
            // if($boolean){ die('邮箱已存在！'); } 
            $code = rand(100000, 999999);
            $send = $this->sms_log($toemail,$code);
            if($send['status'] != 1) { die($send['msg']);}
            $subject = config('WEB_NAME').'邮箱验证';
            $body = config('WEB_NAME')."邮箱验证码:".$code;
            $this->sendEmail($toemail,$subject,$body); 
        }



       //发送绑定邮箱验证码
        public function  sendEmailCode($toemail = '1558573029@qq.com')
        {   
            $boolean = filter_var($toemail, FILTER_VALIDATE_EMAIL);
            if(!$boolean){ die('请输入正确的邮箱！');} 
            $boolean = Db::name('member')->where('email',$toemail)->count();
            if($boolean){ die('邮箱已存在！'); } 
            $code = rand(100000, 999999);
            $send = $this->sms_log($toemail,$code);
            if($send['status'] != 1) { die($send['msg']);}
            $subject = config('WEB_NAME').'邮箱验证';
            $body = config('WEB_NAME')."邮箱验证码:".$code;
            $this->sendEmail($toemail,$subject,$body); 
        }
       

        /**
         * 发送验证码记录
         * @param $mobile
         * @param $code
         * @return array
         * @author hanjb
         * @time 2016/09/24 04:28
         */
        public function sms_log($email,$code,$type='email')
        {   
            $uid = is_login();
            if(!$uid){ $uid = 0 ;}
            $data = Db::name('verify')->where('account',$email)->order('id desc')->find();
            $sms_time_out = 120;
            if($data && (time() - $data['create_time']) < $sms_time_out)
            {
               return array('status'=>-1,'msg'=>$sms_time_out.'秒内不允许重复发送');
            }
              
            $flag = Db::name('verify')->insert(array('account'=>$email,'uid' => $uid,'type'=>$type, 'verify'=>$code, 'create_time'=>time()));
            if(!$flag)
                return array('status'=>-1,'msg'=>'发送失败');
             return array('status'=>1,'msg'=>'发送成功');
         }


      

        /* 验证码验证
         * @param $mobile  邮箱
         * @param $code  验证码
         * @return bool
         */
        public function sms_code_verify($email, $code)
        {
            $data = Db::name('verify')->where(array('account'=>$email, 'verify'=>$code))->order('id DESC')->find();
            if(empty($data))
                return array('status'=>-1,'msg'=>'验证码不匹配');
            $sms_time_out = 120;
            if((time() - $data['create_time']) > $sms_time_out)
                return array('status'=>-1,'msg'=>'验证码超时'); //超时处理
            //M('verify')->where(array('account'=>$mobile, 'verify'=>$code))->delete();
            return array('status'=>1,'msg'=>'验证成功');
         }





    //发送邮箱验证码
    public function sendEmail($toemail,$subject,$body )
    {
        // $toemail = '1021314274@qq.com';//定义收件人的邮箱
        $mail = new \zzh\PHPmailer();


        $mail->isSMTP();// 使用SMTP服务
        $mail->CharSet = "utf8";// 编码格式为utf8，不设置编码的话，中文会出现乱码
        $mail->Host = "mail.qq.com";// 发送方的SMTP服务器地址
        $mail->SMTPAuth = true;// 是否使用身份验证
        $mail->Username = "1558573029@qq.com";// 发送方的163邮箱用户名，就是你申请163的SMTP服务使用的163邮箱</span><span style="color:#333333;">
        $mail->Password = "duanhao662240";// 发送方的邮箱密码，注意用163邮箱这里填写的是“客户端授权密码”而不是邮箱的登录密码！</span><span style="color:#333333;">
        $mail->SMTPSecure = "ssl";// 使用ssl协议方式</span><span style="color:#333333;">
        $mail->Port = 465;// 163邮箱的ssl协议方式端口号是465/994

        $mail->setFrom("1558573029@qq.com","博客");// 设置发件人信息，如邮件格式说明中的发件人，这里会显示为Mailer(xxxx@163.com），Mailer是当做名字显示
        $mail->addAddress($toemail,'Wang');// 设置收件人信息，如邮件格式说明中的收件人，这里会显示为Liang(yyyy@163.com)
        $mail->addReplyTo("1558573029@qq.com","Reply");// 设置回复人信息，指的是收件人收到邮件后，如果要回复，回复邮件将发送到的邮箱地址
        //$mail->addCC("xxx@163.com");// 设置邮件抄送人，可以只写地址，上述的设置也可以只写地址(这个人也能收到邮件)
        //$mail->addBCC("xxx@163.com");// 设置秘密抄送人(这个人也能收到邮件)
        //$mail->addAttachment("bug0.jpg");// 添加附件

        $mail->Subject = $subject;// 邮件标题
        $mail->Body = $body;// 邮件正文
        $mail->IsHTML(true); //支持html格式内容
        //$mail->AltBody = "This is the plain text纯文本";// 这个是设置纯文本方式显示的正文内容，如果不支持Html方式，就会用到这个，基本无用

        if(!$mail->send())
        {// 发送邮件
            echo $mail->ErrorInfo;
        }else{
            echo 'OK';
        }
    }



}