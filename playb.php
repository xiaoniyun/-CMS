<?php
include ('./inc/aik.config.php');
include ('./inc/cache.php');
$link=$aik['pcdomain'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>正在播放-<?php echo $aik["sitename"];?></title>
<meta name="keywords" content="正在播放-播放页">
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
<script type="text/javascript" src="static/js/play.js"></script>
<script type="text/javascript">var playn='<?php echo $_GET['url'];?>', playp='<?php echo $_GET['url'];?>';</script>
<script type="text/javascript" src="static/js/history.js"></script>
<script type="text/javascript">var vod_name='<?php echo $_GET['url'];?>',vod_url=window.location.href,vod_part='智卓星网';</script>
<script type="text/javascript" src="static/js/repl.js"></script>
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
<input class="form-control" id="wd" placeholder="输入影片关键词..." name="searchword" type="text" id="keyword" required>
<input type="submit" id="searchbutton" value class="hide">
<button class="submit" id="submit" onClick="$('#formsearch').submit();"></button>
</form>
<div id="word" class="autocomplete-suggestions active" style="display: none;"></div>
</div>
<ul class="stui-header__user">
<li class="hidden-xs">
<a class="icon_gbook" href="javascript:history.back(-1)" title="留言"></a>
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

<div class="stui-player col-pd">
<iframe src="<?php echo $_GET['url'];?>" width="100%" height="360" id="myiframe" scrolling="no" frameborder="0" allowfullscreen="true"></iframe>

</div>
<div class="stui-player__detail">
<ul class="more-btn">
<li>
<a href="javascript:;" class="btn btn-default" onclick="window.location.reload()">刷新重试 <i class="icon iconfont icon-refresh hidden-xs"></i></a>
</li>

</ul>
<h1 class="title"><a href="javascript:location.reload();">正在播放</a> <i class="icon iconfont icon-more hidden-xs"></i></h1>
<p class="data margin-0">
</p>
</div>
</div>
</div>




<div class="stui-pannel playz clearfix">
<div class="stui-pannel__head clearfix">
<span style="float:left;">
<i class="fa fa-envelope" style="color: #be6319;"></i> #提示：<?php echo $aik["dbts"];?></span>
<span class="text-muted pull-right"><a href="<?php echo $aik['icp']?>"><font color="blue">本站其他推荐</font></a></span>
</div>

<div class="stui-pannel stui-pannel-bg clearfix">
<div class="stui-pannel-box">
<div class="stui-pannel_hd">
<div class="stui-pannel__head bottom-line active clearfix">

<h3 class="title t">云播</h3>
</div>
</div>
<div class="stui-pannel_bd col-pd clearfix">

<ul class="stui-content__playlist column10 clearfix">

<li><a href="javascript:;" data-url="<?php echo $_GET['url'];?>" class="btnplay">播放源</a></li>

</ul>
</div>
<script type="text/javascript">$(".btnplay").each(function(){$(this).click(function() {var url=$(this).attr("data-url");var jj='';$("#myiframe").attr("src",jj+url);$(this).addClass("selected").removeClass("");$(this).siblings().removeClass("selected").addClass("");});});</script>

<style>
.playon{ } .playon a{color: white;
background-color: red;
border-radius: 5px;}
.playz {
	max-height: 300px;
	overflow-y: scroll;
	overflow-x: hidden
}

.playz::-webkit-scrollbar {
	width: 8px;
}

.playz::-webkit-scrollbar-thumb {
	background-color: #ff443f;
}
.t {
    padding-left: 14px;
    border-left: 5px solid #ff443f;
}

</style>
</div>
<div style="clear: both;"></div>
</div>
</div>
</div>
<div class="stui-pannel stui-pannel-bg clearfix">
<div class="stui-pannel-box">
<div class="stui-pannel_hd">
<div class="stui-pannel__head bottom-line active clearfix">

</div>


<div class="stui-pannel clearfix" id="desc">
<div class="stui-pannel__head clearfix">
<span class="text-muted pull-right"></span>
<h3 class="title">
<i class="iconfont icon-form"></i> 播放提示
</h3>
</div>
<div class="col-pd clearfix">
<div class="stui-content__desc">
视频不会自动播放，请点击播放框内的左下角的播放按钮进行观看
</div>
</div>
</div>



</div>
</div>

</div>
</div>
<script type="text/javascript">
	    	$(document).ready(function(){
	    		$(".stui-content__playlist a[style='color:red']").css("color","").closest("li").addClass("active");
	    	})
	    </script>
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
