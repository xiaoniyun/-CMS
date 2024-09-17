<?php
// 开源代码弃坑。当前仅支持JSON接口，如需xml版自行二开开发文档📄提供JSON和XML两种数据格式API开发示列。不可用作非法运营，二开程序与本人无关/
//此程序【极光CMS】苹果CMS10-JSON数据格式源 (免费版），北极光 QQ：2328167917
//以下代码为PHP核心代码 
error_reporting(0);
header('Content-type:text/html;charset=utf-8');
include ('./inc/aik.config.php');
include ('aik.config.php');
include ('./inc/init.php');
$link = $aik["zhanwai"];
$queryURL = $link . "?ac=videolist&h=24";
	$useragent = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)";
	$header = array("Accept-Language: zh-cn", "Connection: Keep-Alive", "Cache-Control: no-cache");
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_REFERER, $queryURL);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
	curl_setopt($ch, CURLOPT_URL, $queryURL);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 6);
	$result = curl_exec($ch);
	$result = mb_convert_encoding($result, "utf-8", "utf-8");
	$result = str_replace("\/", "/", $result);
	$pattern = "#\"vod_pic\":\"(.*?)\"#";
	$pattern1 = "#\"vod_id\":(.*?),#";
	$pattern2 = "#\"vod_name\":\"(.*?)\"#";	
	$pattern3 = "#\"vod_time\":\"(.*?)\"#";
	preg_match_all($pattern, $result, $matches);
	preg_match_all($pattern1, $result, $matches1);
	preg_match_all($pattern2, $result, $matches2);
	preg_match_all($pattern3, $result, $matches3);
	$xh = 0;
	while ($xh < 18) {
?>
<li class="stui-vodlist__item">
<a class="stui-vodlist__thumb lazyload" href="mplay.php?id=<?php echo $matches1[1][$xh];?>" title="极光" data-original="<?php echo $matches[1][$xh];?>">
<span class="play hidden-xs"></span>
<span class="pic-text">最新</span>
</a>
<h4 class="stui-vodlist__title"><a href="mplay.php?id=<?php echo $matches1[1][$xh];?>"><?php echo $matches2[1][$xh];?></a></h4>
</li>
<?php
		$xh = $xh + 1;
	}