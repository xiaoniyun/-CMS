<?php
include ('./inc/aik.config.php');
include ('./inc/cache.php');
$link=$aik['pcdomain'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $aik['title'];?></title>
<meta name='referrer' content="never">
<meta name="keywords" content="<?php echo $aik['keywords'];?>">
<meta name="description" content="<?php echo $aik['description'];?>">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<script src="static/js/4rxyw0fp5zd5suv_c9lysgatbns.js"></script><link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="static/css/iconfont.css" type="text/css" />
<link rel="stylesheet" href="static/css/default.css" type="text/css" />
<link rel="stylesheet" href="static/css/color-gules.css" type="text/css" name="skin" />
<script type="text/javascript" src="static/js/jquery.min.js"></script>
<script type="text/javascript" src="static/js/library.js"></script>
<script type="text/javascript" src="static/js/default.js"></script>
<script type="text/javascript" src="static/js/common.js"></script>
<script type="text/javascript" src="static/js/function.js"></script>
<script type="text/javascript">var sitePath='', siteUrl=''</script>
<script type="text/javascript" src="static/js/instantpage-5.1.1.js"></script>
<!--[if lt IE 9]>
<script src="static/js/html5.min.js"></script>
<script src="static/js/respond.min.js"></script>
<![endif]-->
</head>
<body data-instant-allow-query-string data-instant-intensity="mousedown">
<div class="container">
<div class="row">
<div class="stui-header__top clearfix">
<div class="stui-header__hd clearfix">
<div class="stui-header__logo">
<a class="logo" href="./"></a>
</div>
<div class="stui-header__search">
<form name="formsearch" id="formsearch" action="seacher.php" method="post" autocomplete="off">
<input class="form-control" id="wd" placeholder="输入影片关键词..." name="wd" type="text" id="keyword" required>
<input type="submit" id="searchbutton" value class="hide">
<button class="submit" id="submit" onClick="$('#formsearch').submit();"></button>
</form>
<div id="word" class="autocomplete-suggestions active" style="display: none;"></div>
</div>
<ul class="stui-header__user">
<li class="hidden-xs">
<a class="icon_gbook" href="javascript:location.reload();" title="留言反馈"></a>
</li>


</ul>
</div>
<div class="stui-header__menu clearfix">
<span class="more hidden-xs"></span>
<ul class="type-slide clearfix">
<li class="home"><a href="./">首页</a></li>
<?php echo $aik['zfb_ad']?>


<li class="news"><a href="<?php echo $aik['icp']?>"><font color="Chartreuse">其他</font></a></li>
</ul>
</div>
</div>
<script type="text/javascript">
	$(".stui-header__user li").click(function(){
		$(this).find(".dropdown").toggle();
	});
</script>

<div class="stui-pannel clearfix">
<div class="stui-pannel__head clearfix">
<h1 class="title">
<i class="iconfont icon-hot"></i>最近更新
</h1>
<ul class="tabs">
<li class="active"><a href="#home1" data-toggle="tab">最新</a></li>
</ul>
</div>
<div class="tab-content">
<ul id="home1" class="stui-vodlist tab-pane fade in active clearfix">
<?php include './inc/zwca.php';?>


</ul>

</div>
</div>


<div class="stui-pannel clearfix">
<div class="stui-pannel__head clearfix">
<a class="text-muted pull-right" href="moviea.php?page=1">更多 <i class="iconfont icon-more"></i></a>
<span class="hidden-sm hidden-xs pull-right">
<a href="javascript:history.back(-1)" class="text-muted">返回</a> <span class="split-line"></span>

</span>
<h1 class="title">
<i class="iconfont icon-viewgallery"></i> 最新热片
</h1>
</div>
<ul class="stui-vodlist clearfix">
<?php include './inc/zwcn.php';?>

</ul>
</div>


</div>
</div>
<script type="text/javascript">$(".stui-header__menu .home").addClass("active");</script>
<div class="stui-foot clearfix">

<p><a href="./">返回首页</a><span class="split-line"></span><a href="javascript:history.back(-1)">返回上页</a><span class="split-line"></span><a href="javascript:scroll(0, 0)">返回顶部</a></p>
<div class="hidden-xs">Copyright © <a href="<?php echo $aik['pcdomain']?>"><?php echo $aik['sitename'];?></a> <br>
<a href="<?php echo $aik['icp']?>" rel="nofollow" target="_blank">其他推荐</a></div>
</div>
<div class="hide">
<div style="display: none"><?php echo $aik['tongji'];?></div>

</div>
</body>
</html>
