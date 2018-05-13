<?php
/** 发送验证身份接口 */
namespace app\message\controller;
use app\common\controller\Common;
use think\Db;
class Authentication extends Common
{
	function sendVerification($real_name,$card_id){
		 
		header('Content-type:text/html;charset=utf-8');

		//配置您申请的appkey
		$appkey = "c9f0718cdf363f3745b91efef68b6793";
		 
		 
		 
		 
		//************1.真实姓名和身份证号码判断是否一致************
		$url = "http://op.juhe.cn/idcard/query";
		$params = array(
		      "idcard" => $card_id,//身份证号码
		      "realname" => $real_name,//真实姓名
		      "key" => $appkey,//应用APPKEY(应用详细页查询)
		);
		$paramstring = http_build_query($params);
		$content = $this->juhecurl($url,$paramstring);
		return $content;
		// $result = json_decode($content,true);
		// if($result){
		//     if($result['error_code']=='0'){
		//         if($result['result']['res'] == '1'){
		//             echo "身份证号码和真实姓名一致";
		//         }else{
		//             echo "身份证号码和真实姓名不一致";
		//         }
		//         #print_r($result);
		//     }else{
		//         echo $result['error_code'].":".$result['reason'];
		//     }
		// }else{
		//     echo "请求失败";
		// }
	}

	/**
	 * 请求接口返回内容
	 * @param  string $url [请求的URL地址]
	 * @param  string $params [请求的参数]
	 * @param  int $ipost [是否采用POST形式]
	 * @return  string
	 */
	function juhecurl($url,$params=false,$ispost=0){
	    $httpInfo = array();
	    $ch = curl_init();
	 
	    curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
	    curl_setopt( $ch, CURLOPT_USERAGENT , 'JuheData' );
	    curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 60 );
	    curl_setopt( $ch, CURLOPT_TIMEOUT , 60);
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	    if( $ispost )
	    {
	        curl_setopt( $ch , CURLOPT_POST , true );
	        curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
	        curl_setopt( $ch , CURLOPT_URL , $url );
	    }
	    else
	    {
	        if($params){
	            curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
	        }else{
	            curl_setopt( $ch , CURLOPT_URL , $url);
	        }
	    }
	    $response = curl_exec( $ch );
	    if ($response === FALSE) {
	        //echo "cURL Error: " . curl_error($ch);
	        return false;
	    }
	    $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
	    $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
	    curl_close( $ch );
	    return $response;
	}

}