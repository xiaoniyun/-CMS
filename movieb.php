<?php
// 开源代码弃坑。当前仅支持JSON接口，如需xml版自行二开开发文档📄提供JSON和XML两种数据格式API开发示列。不可用作非法运营，二开程序与本人无关/
//此程序【极光CMS】苹果CMS10-JSON数据格式源 (免费版），北极光 QQ：2328167917 

include ('./inc/aik.config.php');
include ('./inc/cache.php');
$id=$_GET['cid'];
$info2=file_get_contents($aik['zhanwai2']);
$curl = $info2."?ac=detail&id=1&pg=1".$id;
if (empty($_GET['cid'])) {
    $cxurl = $curl;
    $x=$_GET['page'];
    $url = $cxurl."?ac=detail&t=".$x;
} else {
    $cxurl = $curl."?ac=detail&t=".$_GET["cid"];
    $x=$_GET['page'];
    $y=$_GET['cid'];
    $url = $curl."?ac=detail&t=".$y."?pg=".$x;
}
if(empty($_GET['page'])){
    $_GET['page']='1';
}
$list=json_decode(file_get_contents($cxurl),true);
$data=json_decode(file_get_contents($url),true);
$recordcount = $data['page']['recordcount'];
$pagesize = $data['page']['pagesize'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>影片列表-全网最新影片-<?php echo $aik['title'];?></title>
<meta name="keywords" content="影片列表-在线观看的最新电影，影片库，视频列表">
<meta name="description" content="<?php echo $aik['title'];?>-影片资源列表">
<meta name='referrer' content="never">
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
<form name="formsearch" id="formsearch" action="seacherb.php" method="post" autocomplete="off">
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
<li class="active">
<a href="movie.php?page=1"> 片库</a></li>
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

<div class="stui-screen clearfix">
<ul class="stui-screen__list top type-slide clearfix">
<li>
<span class="text-muted">按频道</span>
</li>
<li><a href="movie.php?page=1"> 频道一</a></li>
<li><a href="moviea.php?page=1"> 频道二</a></li>
<li><a href="movieb.php?page=1"> 频道三</a></li>

</ul>
<ul class="stui-screen__list type-slide clearfix">
<li>
<span class="text-muted">按分类</span>
</li>
<?php echo $aik['zhan3'];?>

</ul>

</div>
</div>
<div class="stui-screen__ft">
<a href="javascript:;" class="screen-open"><i class="iconfont icon-add"></i> 更多选项</a>
</div>


<ul class="stui-pannel__nav clearfix">
<li class="active"><a href="javascript:location.reload();">按时间</a></li>
<li><a href="javascript:history.back(-1)">返回</a></li>

</ul>


<ul class="stui-vodlist clearfix">
<?php
//初始化
    $curl = curl_init();
    //设置抓取的url
    curl_setopt($curl, CURLOPT_URL, $html);
    //设置头文件的信息作为数据流输出
    curl_setopt($curl, CURLOPT_HEADER, 1);
    //设置获取的信息以文件流的形式返回，而不是直接输出。
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    //执行命令
    $response = curl_exec($curl);
    //关闭URL请求
    curl_close($curl);
    //显示获得的数据
if(empty($_GET['page'])){$html=''.$aik["zhanwai2"].'?ac=detail&type=1&pg=1';
}else{ 
$html=''.$aik["zhanwai2"].'?ac=detail&t='.$_GET['cid']. '&pg='.$_GET['page'];
}
?>
<?php
$rurl=file_get_contents($html);
$vname='#"vod_id":(.*?),#';//取出播放
$vname1='#"vod_name":"(.*?)"#';//取出名称
$vname2='#"vod_pic":"(.*?)"#';//取出图片
$vname3='#"vod_time":"(.*?)"#';//取出时间
preg_match_all($vname, $rurl,$xarr);
preg_match_all($vname1, $rurl,$xarr1);
preg_match_all($vname2, $rurl,$xarr2);
preg_match_all($vname3, $rurl,$xarr3);
$xbflist=$xarr[1];//播放
$xname=$xarr1[1];//名字
$ximg=$xarr2[1];//封面图
$shijian=$xarr3[1];//时间
$ximga = str_replace('\/','/',$ximg);
$rurl = str_replace('\/','/',$rurl);
foreach ($ximga as $key=>$imga);
foreach ($xname as $key=>$xvau){
    $do=$xbflist[$key];
    $do1=base64_encode($do);
    $cc="./mplayb.php?id=";
    $ccb=$cc.$do1;
    echo "
<li class='stui-vodlist__item'>
<a class='stui-vodlist__thumb lazyload' href='mplayb.php?id=$xbflist[$key]' title='智云' data-original='$ximga[$key]'>
<span class='play hidden-xs'></span>
</a>
<h4 class='stui-vodlist__title'>
<a href='mplayb.php?id=$xbflist[$key]'>$xname[$key]</a>
</h4>
</li>
";
}
//print_r($rurl);
?>

</ul>


<ul class="stui-page text-center clearfix">
<?php
if(!empty($_GET['cid'])){
    $page=$_GET['page'];
    $cid=$_GET['cid'];
    $c="&cid=".$cid;}
    else{$c="";}
if($_GET['page'] != 1){
     echo '<li><a href="?page=1'.$c.'">首页</a></li>';
     echo '<li><a href="?page=' . ($_GET['page']-1) .$c.'">上一页</a></li>';
     } else {
echo '<li><a href="?page=1'.$c.'">首页</a></li>';
}
if($_GET['page'] == 1){
    echo '';
}else
echo '<li class="hidden-xs"><a href="?page='.($_GET['page']-1).$c.'">'.($_GET['page']-1).'</a></li>';
echo '<li class="hidden-xs"><a href="?page='.$_GET['page'].$c.'">'.$_GET['page'].'</a></li>';
if($_GET['page'] == 200){
    echo '';
}else
echo '<li class="hidden-xs"><a href="?page='.($_GET['page']+1).$c.'">'.($_GET['page']+1).'</a></li>';

if($_GET['page'] < 200){
     echo '<li><a href="?page=' . ($_GET['page']+1) .$c.'">下一页</a></li>';
     echo '';
     } else {
echo '';
}    
?>
<li class="active visible-xs"><span class="num">当前第<?php echo $_GET['page'];?>页</span></li>

</ul>

</div>
</div>
</div>
<script type="text/javascript">
			$(".screen-open").click(function() {
				$(".screen-hide").css("height","100%");
				$(this).remove();
				$(".stui-screen__ft").remove();
			})
		</script>
<div class="stui-foot clearfix">
<script type="text/javascript" src="static/js/link.js"></script>
<!--<img src="static/picture/8f51758a2a09255c.png" style="height:100px;"><br>-->
<p><a href="./">返回首页</a><span class="split-line"></span><a href="javascript:history.back(-1)">返回上页</a><span class="split-line"></span><a href="javascript:scroll(0, 0)">返回顶部</a></p>
<div class="hidden-xs">Copyright © <a href="<?php echo $aik['pcdomain']?>"><?php echo $aik['sitename'];?></a> <br>
<a href="<?php echo $aik['icp']?>" rel="nofollow" target="_blank">其他推荐</a></div>
</div>
<div class="hide">
<div style="display: none"><?php echo $aik['tongji'];?></div>

</div>
</body>
</html>