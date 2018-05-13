<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"G:\phpStudy\WWW\think\public/../application/member\view\member\reset.html";i:1526183703;s:74:"G:\phpStudy\WWW\think\public/../application/common\view\common\common.html";i:1526091211;s:77:"G:\phpStudy\WWW\think\public/../application/common\view\common\toasttips.html";i:1526091211;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<noscript><style type="text/css">body{display:none;}</style></noscript>
<!--<script type="text/javascript" src="http://cn02.dwcheck.cn/Js/lockview.js?uid=LK0289929"></script>-->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="initial-scale=1, maximum-scale=3, minimum-scale=1, user-scalable=no">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="HandheldFriendly" content="true">
<meta name="MobileOptimized" content="320">
<meta name="screen-orientation" content="portrait">
<meta name="x5-orientation" content="portrait">
<meta name="full-screen" content="yes">
<meta name="x5-fullscreen" content="true">
<meta name="browsermode" content="application">
<meta name="x5-page-mode" content="app">
<meta name="msapplication-tap-highlight" content="no">

<!-- seo -->
<title><?php echo $title; ?></title>
<meta name="keywords" content="<?php echo $keywords; ?>"/>
<meta name="description" content="<?php echo $description; ?>"/>

<style>
    .toast-mask {
        display: none;
        position: fixed;
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        background: rgba(0, 0, 0, .6);
        z-index: 999998;
    }

    .toast-tip-box {
        display: none;
        border: 1px solid #ddd;
        width: 450px;
        background: #fff;
        position: fixed;
        left: 50%;
        top: 45%;
        transform: translate(-50%, -50%);
        z-index: 999999;
    }

    .toast-tip-title {
        color: #333;
        font-size: 16px;
        padding-left: 10px;
        height: 45px;
        line-height: 45px;
        width: 100%;
        border-bottom: 1px solid #ddd;
    }

    .toast-tip-content {
        text-align: center;
        color: #333;
        font-size: 16px;
        padding: 40px 20px;
        line-height: 25px;
        width: 100%;
    }

    .toast-tip-sub {
        height: 45px;
        line-height: 45px;
        width: 100%;
        border-top: 1px solid #ddd;
        padding-top: 5px;
    }

    .toast-tip-sub > input {
        right: 10px;
        position: absolute;
        width: 80px;
        height: 30px;
        background-color: #38f;
        border: none;
        border-radius: 3px;
        color: #fff;
    }

    #toast-tip-submit:hover {
        cursor: pointer;
        background-color: #3580cb;
    }

</style>
<div class="toast-mask"></div>
<div class="toast-tip-box">
    <div class="toast-tip-title"><span>系统提示</span></div>
    <div class="toast-tip-content">因系统不稳定你确定进行如下操作吗？</div>
    <div class="toast-tip-sub"><input type="button" value="确定" id="toast-tip-submit"/></div>
</div>
<script>
    window.writeCont = function (e,fn) {
        $(".toast-tip-content").html(e);
        $(".toast-tip-box").fadeIn(200);
        $('.toast-mask').fadeIn(200);
        if(!fn){return}
        $('body').on('click','#toast-tip-submit',fn)
    };
    $(function () {
        $("body").on("click", '#toast-tip-submit', function () {
            $('.toast-mask').fadeOut(100);
            $(".toast-tip-box").fadeOut(100);
        });
    });
</script>
<link rel="stylesheet" href="/static/PC/login/css/base.css">
<link rel="stylesheet" href="/static/PC/login/icon/iconfont.css">
<link rel="stylesheet" href="/static/PC/login/css/common.css">
<link rel="stylesheet" href="/static/PC/login/css/reset.css">

</head>
<div class="reset-box">
    <div class="top-banner">
        <p class="top-banner-tip">博客</p>
    </div>
    <div class="reset-wrapper">
            <div class="fl active">邮箱找回</div>
        <div class="reset-cont">
            <div class="email-reset" style="display: block">
                <!--邮箱找回表单--start-->
                <form id="emailSubmit">
                    <div class="form-item">
                        <i class="form-icon icon iconfont">&#xe641;</i>
                        <input class="form-cont" type="text"  name ='email' placeholder="请输入邮箱账号">
                    </div>
                    <div class="form-item">
                        <i class="form-icon icon iconfont">&#xe615;</i>
                        <input class="form-cont" type="text"  name="code" placeholder="请输入邮箱验证码">
                        <button class="email-btn">发送验证码</button>
                    </div>
                    <div class="form-item">
                        <i class="form-icon icon iconfont">&#xe6e6;</i>
                        <input class="form-cont" type="password" name="password" placeholder="请输入新密码">
                    </div>
                    <div class="form-item">
                        <i class="form-icon icon iconfont">&#xe6e6;</i>
                        <input class="form-cont" type="password"  name="confirm_password" placeholder="确认新密码">
                    </div>
                    <button class="btn" type="submit">提交</button>
                </form>
                
                <!--邮箱找回表单--end-->
            </div>
        </div>
    </div>
</div>
<script src="/static/PC/login/js/reset.js"></script>
</body>
</html>







