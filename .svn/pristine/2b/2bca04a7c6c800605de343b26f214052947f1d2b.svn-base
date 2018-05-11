<?php
// 应用公共文件
use think\Session;
use think\Db;
use \think\Request;

//规避非致命报错
error_reporting(E_ERROR | E_WARNING | E_PARSE);

//返回登陆用户的ID
if (!function_exists('is_login'))
{
  function is_login()
  { 
    return  Session::get('member.id');
  }
}



/**
  充值集合 
*/
function pay($array)
{
  $type = $array['type'] ; //指定选用的支付方式
  unset($array['type']);
  $notify_url = $array['notify_url']; //指定异步回调地址
  $return_url = $array['return_url']; //指定同步回调地址
  $order_sn = $array['order_sn']; //订单号
  $amount = $array['amount']; //金额
  if($type && $notify_url && $return_url && $amount >= 0)
  {
      //支付宝支付
      if($type == 1)
      {
         $alipay = new \pay\alipay\Alipay();
         $alipay->pay($array);
      //新浪支付   
      }elseif($type == 2){ 
         $xlpay = new \pay\xlpay\Xlpay();
         $xlpay->pay($array);
      }elseif($type == 3){
         $alipaywap = new \pay\alipaywap\Alipay();
         $array['WIDsubject'] = '余额充值';
         $alipaywap->pay($array);
      }


  }else{
    tojson('参数不正确');
  }
}



/** 输出日志  ZZH 2017-09-08
 * content 内容，数组字符串随意
 *   file 文件名称，默认为default
 */
function Zlog($content,$filename ='default',$title = "")
{  
    $filename = trim($filename,'/');
    $fileUrl = 'Log/'.$filename ;
    if(!file_exists('Log')){mkdir('Log',0777); fopen('Log/index.html','w');}
    if(!file_exists($fileUrl))
    {
      $fileUrl = 'Log/';
      $array = explode('/',$filename);
      foreach ($array as $k=> $v) 
      {
        $fileUrl .= $v.'/';
        @mkdir($fileUrl,0777); 
        @fopen($fileUrl.'/index.html','w');
      }
      $fileUrl = rtrim($fileUrl,'/');
    }


    $logUrl = $fileUrl.'/'.date('Y-m-d').'.txt';
    $file = fopen($logUrl,'a');
    if(is_array($content)){$text = json_encode($content);}else{$text = $content;}
    $text="【".date('Y-m-d H:i:s').'】'.'('.$title.')'.$text;
    fwrite($file, $text ."\r\n");
    fclose($file);
}


