<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:71:"G:\phpStudy\WWW\think\public/../application/index\view\index\index.html";i:1526127809;s:72:"G:\phpStudy\WWW\think\public/../application/common\view\common\head.html";i:1526202323;s:72:"G:\phpStudy\WWW\think\public/../application/common\view\common\foot.html";i:1526125947;}*/ ?>
﻿<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>个人博客</title>
    <meta name="keywords" content="个人博客模板,博客模板" />
    <meta name="description" content="寻梦主题的个人博客模板，优雅、稳重、大气,低调。" />
    <link href="/static/css/base.css" rel="stylesheet">
    <link href="/static/css/index.css" rel="stylesheet">
    <script src="/static/PC/login/js/jquery-2.1.3.min.js"></script>
    <script src="/static/PC/login/js/login.js"></script>
    <script src="/static/PC/login/js/register.js"></script>
    <script src="/static/PC/login/js/reset.js"></script>
    <!--[if lt IE 9]>
    <script src="/static/js/modernizr.js"></script>
    <script src="/static/js/jquery-2.0.3.min.js"></script>
    <![endif]-->
</head>
<body>
<header>
    <div id="logo"><a href="/"></a></div>
    <nav class="topnav" id="topnav">
        <a href="<?php echo url('/index/index/index'); ?>"><span>首页</span><span class="en">Protal</span></a>
        <!--<a href="about.html"><span>关于我</span><span class="en">About</span></a>-->
        <!--<a href="newlist.html"><span>慢生活</span><span class="en">Life</span></a>-->
        <!--<a href="moodlist.html"><span>碎言碎语</span><span class="en">Doing</span></a>-->
        <!--<a href="share.html"><span>模板分享</span><span class="en">Share</span></a>-->

        <?php if(!(empty($member) || (($member instanceof \think\Collection || $member instanceof \think\Paginator ) && $member->isEmpty()))): ?>
        <!--已登录-start-->
        <div class="info-top">
            <div class="user-info clearfix">
                <img class="fl user-info-img" src="/static/PC/image/default_avatar_128_128.jpg">
                <div class="fl user-info-text">
                    <div class="user-name over-hide"><?php echo $member['user_nickname']; ?>
                    </div>
                </div>
            </div>
        <!--已登录-end-->
        <?php else: ?>
        <!--未登录-start-->
        <a href="<?php echo url('/index.php/member/member/login'); ?>"><span>登录</span><span class="en">Login</span></a>
        <a href="<?php echo url('/index.php/member/member/register'); ?>"><span>注册</span><span class="en">Register</span></a></nav>

        <!--未登录-end-->

        <?php endif; ?>

    </nav>
</header>
<div class="banner">
    <section class="box">
        <ul class="texts">
            <p>打了死结的青春，捆死一颗苍白绝望的灵魂。</p>
            <p>为自己掘一个坟墓来葬心，红尘一梦，不再追寻。</p>
            <p>加了锁的青春，不会再因谁而推开心门。</p>
        </ul>
        <div class="avatar"><a href="#"><span>坤哥</span></a> </div>
    </section>
</div>
<article>
  <h2 class="title_tj">
    <p>文章<span>推荐</span></p>
  </h2>
  <div class="bloglist left">
    <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <h3><?php echo $vo['art_title']; ?></h3>
    <figure><img src="<?php echo $vo['art_thumb']; ?>"></figure>
    <ul id="gkk_content">
      <a title="/" href="<?php echo url('/index.php/index/index/artlist',['art_id' => $vo['art_id']]); ?>" target="_blank" class="readmore">阅读全文>></a>
      <p><?php echo $vo['art_content']; ?></p>

    </ul>
    <p class="dateview"><span><?php echo date("y-m-d",$vo['art_time']); ?></span><span>作者：<?php echo $vo['art_editor']; ?></span><span>个人博客：[<a href="/news/life/">程序人生</a>]</span></p>
  <?php endforeach; endif; else: echo "" ;endif; ?>
    <?php echo $page; ?>
  </div>
  <aside class="right">
    <div class="weather"><iframe width="250" scrolling="no" height="60" frameborder="0" allowtransparency="true" src="http://i.tianqi.com/index.php?c=code&id=12&icon=1&num=1"></iframe></div>
    <div class="news">
    <h3>
      <p>最新<span>文章</span></p>
    </h3>
    <ul class="rank">
      <li><a href="/" title="Column 三栏布局 个人网站模板" target="_blank">Column 三栏布局 个人网站模板</a></li>
      <li><a href="/" title="with love for you 个人网站模板" target="_blank">with love for you 个人网站模板</a></li>
      <li><a href="/" title="免费收录网站搜索引擎登录口大全" target="_blank">免费收录网站搜索引擎登录口大全</a></li>
      <li><a href="/" title="做网站到底需要什么?" target="_blank">做网站到底需要什么?</a></li>
      <li><a href="/" title="企业做网站具体流程步骤" target="_blank">企业做网站具体流程步骤</a></li>
      <li><a href="/" title="建站流程篇——教你如何快速学会做网站" target="_blank">建站流程篇——教你如何快速学会做网站</a></li>
      <li><a href="/" title="box-shadow 阴影右下脚折边效果" target="_blank">box-shadow 阴影右下脚折边效果</a></li>
      <li><a href="/" title="打雷时室内、户外应该需要注意什么" target="_blank">打雷时室内、户外应该需要注意什么</a></li>
    </ul>
    <h3 class="ph">
      <p>点击<span>排行</span></p>
    </h3>
    <ul class="paih">
      <li><a href="/" title="Column 三栏布局 个人网站模板" target="_blank">Column 三栏布局 个人网站模板</a></li>
      <li><a href="/" title="withlove for you 个人网站模板" target="_blank">with love for you 个人网站模板</a></li>
      <li><a href="/" title="免费收录网站搜索引擎登录口大全" target="_blank">免费收录网站搜索引擎登录口大全</a></li>
      <li><a href="/" title="做网站到底需要什么?" target="_blank">做网站到底需要什么?</a></li>
      <li><a href="/" title="企业做网站具体流程步骤" target="_blank">企业做网站具体流程步骤</a></li>
    </ul>
      <h3 class="links">
    <p>友情<span>链接</span></p>
</h3>
<ul class="website">
    <li><a href="http://www.houdunwang.com">坤哥在此</a></li>
    <li><a href="http://bbs.houdunwang.com">坤哥在此呀</a></li>
</ul>
</div>
<!-- Baidu Button BEGIN -->
<div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
    document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script>
<!-- Baidu Button END -->
</aside>
</article>
<footer>
    <p>Design by 坤哥在此 <a href="http://www.itxdl.cn/" target="_blank">http:///www.itxdl.cn</a> <a href="/">网站统计</a></p>
</footer>
<script src="/static/js/silder.js"></script>
</body>
</html>
