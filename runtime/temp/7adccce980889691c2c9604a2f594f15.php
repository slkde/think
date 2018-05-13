<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"G:\phpStudy\WWW\think\public/../application/index\view\index\artlist.html";i:1526127092;s:72:"G:\phpStudy\WWW\think\public/../application/common\view\common\head.html";i:1526200041;s:72:"G:\phpStudy\WWW\think\public/../application/common\view\common\foot.html";i:1526125947;}*/ ?>
﻿<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>个人博客</title>
    <meta name="keywords" content="个人博客模板,博客模板" />
    <meta name="description" content="寻梦主题的个人博客模板，优雅、稳重、大气,低调。" />
    <link href="/static/css/base.css" rel="stylesheet">
    <link href="/static/css/index.css" rel="stylesheet">
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
        <a href="<?php echo url('/index.php/member/member/login'); ?>"><span>登录</span><span class="en">Login</span></a>
        <a href="<?php echo url('/index.php/member/member/register'); ?>"><span>注册</span><span class="en">Register</span></a></nav>
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
<link href="/static/css/style.css" rel="stylesheet">
<article class="blogs">
<h1 class="t_nav"><span>“慢生活”不是懒惰，放慢速度不是拖延时间，而是让我们在生活中寻找到平衡。</span><a href="/" class="n1">网站首页</a><a href="/" class="n2">慢生活</a></h1>
<div class="newblog left">
   <h2><?php echo $data[0]['art_title']; ?></h2>
   <p class="dateview"><span>发布时间：<?php echo date("y-m-d",$data[0]['art_time']); ?></span><span>作者：<?php echo $data[0]['art_editor']; ?></span><span>分类：[<a href="/news/life/">程序人生</a>]</span></p>
    <figure><img src="/static/images/001.png"></figure>
    <ul class="nlist">
      <p><?php echo $data[0]['art_content']; ?></p>
      <!--<a title="/" href="/" target="_blank" class="readmore">阅读全文>></a>-->
    </ul>
    <!--<div class="line"></div>-->
    </ul>
    <div class="line"></div>
    <div class="blank"></div>
    <!--<div class="ad">  -->
    <!--<img src="/static/images/ad.png">-->
    <!--</div>-->
    <!--<div class="page">-->

<!--&lt;!&ndash;<ul class="pagination"><li class="disabled"><span>«</span></li> <li class="active"><span>1</span></li><li><a href="http://blog.hd/admin/article?page=2">2</a></li> <li><a href="http://blog.hd/admin/article?page=2" rel="next">»</a></li></ul>&ndash;&gt;-->

 <!---->
    <!--</div>-->
</div>
<aside class="right">
   <div class="rnav">
      <ul>
       <li class="rnav1"><a href="/download/" target="_blank">日记</a></li>
       <li class="rnav2"><a href="/newsfree/" target="_blank">程序人生</a></li>
       <li class="rnav3"><a href="/web/" target="_blank">欣赏</a></li>
       <li class="rnav4"><a href="/newshtml5/" target="_blank">短信祝福</a></li>
     </ul>      
    </div>
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
    </div>
    <div class="visitors">
      <h3><p>最近访客</p></h3>
      <ul>

      </ul>
    </div>
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