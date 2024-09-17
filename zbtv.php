<?php
include ('./inc/aik.config.php');
include ('./inc/cache.php');
$link=$aik['pcdomain'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>电视TV直播-<?php echo $aik["sitename"];?></title>
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
<script type="text/javascript">var playn='电视直播', playp='电视直播';</script>
<script type="text/javascript" src="static/js/history.js"></script>
<script type="text/javascript">var vod_name='电视直播',vod_url=window.location.href,vod_part='智卓星网';</script>
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
<iframe src="player/index.html?vurl=http://traffic.jbh.tjbh.com/live/bhtv3/playlist.m3u8" width="100%" height="360" id="myiframe" scrolling="no" frameborder="0" allowfullscreen="true"></iframe>

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

<li><a href="javascript:;" data-url="http://glive.grtn.cn/live/jilupian.m3u8" class="btnplay">GRTN纪录片</a></li>
<li><a href="javascript:;" data-url="http://glive.grtn.cn/live/wenhua_test0203.m3u8" class="btnplay">GRTN文化</a></li>
<li><a href="javascript:;" data-url="http://glive.grtn.cn/live/life.m3u8" class="btnplay">GRTN生活</a></li>
<li><a href="javascript:;" data-url="http://glive.grtn.cn/live/health.m3u8" class="btnplay">GRTN健康</a></li>
<li><a href="javascript:;" data-url="http://glive.grtn.cn/live/lizhi.m3u8" class="btnplay">荔枝台TV</a></li>
<li><a href="javascript:;" data-url="http://live.hznet.tv:1935/live/live3/500K/tzwj_video.m3u8" class="btnplay">菏泽影视</a></li>
<li><a href="javascript:;" data-url="http://snapshot-live-ht.ahtv.cn/atvrtmp/143_q_live161829369249612.m3u8" class="btnplay">安徽影视</a></li>
<li><a href="javascript:;" data-url="http://stream.hrbtv.net/yspd/sd/live.m3u8" class="btnplay">哈尔滨影视</a></li>
<li><a href="javascript:;" data-url="http://traffic.jbh.tjbh.com/live/bhtv3/playlist.m3u8" class="btnplay">滨海影视</a></li>
<li><a href="javascript:;" data-url="http://live.xtgdw.cn:1935/live/xtys/playlist.m3u8" class="btnplay">泰安新泰影视</a></li>
<li><a href="javascript:;" data-url="http://stream.hrbtv.net/yspd/sd/live.m3u8" class="btnplay">哈尔滨影视</a></li>
<li><a href="javascript:;" data-url="https://klmyzb.rcsxzx.com/hls/klmy3.m3u8" class="btnplay">新疆克拉玛依影视</a></li>
<li><a href="javascript:;" data-url="http://live.lsrmw.cn/ysyl/sd/live.m3u8" class="btnplay">溧水影视</a></li>
<li><a href="javascript:;" data-url="http://zhibo.hkstv.tv/livestream/mutfysrq/playlist.m3u8" class="btnplay">香港卫视</a></li>
<li><a href="javascript:;" data-url="https://livedoc.cgtn.com/500d/prog_index.m3u8" class="btnplay">CGTN纪录</a></li>
<li><a href="javascript:;" data-url="http://stream.qhbtv.com/qhsh/sd/live.m3u8?_upt=da5c1be11702978122" class="btnplay">青海经视</a></li>
<li><a href="javascript:;" data-url="http://stream.qhbtv.com/qhds/sd/live.m3u8?_upt=77ea47b11702979545" class="btnplay">青海都市</a></li>
<li><a href="javascript:;" data-url="http://pluslive.zunyifb.com/xwpd/playlist.m3u8?_upt=deb034ed1702986222" class="btnplay">遵义综合</a></li>
<li><a href="javascript:;" data-url="http://pluslive.zunyifb.com/ggpd/playlist.m3u8?_upt=caec41881702986236" class="btnplay">遵义公共</a></li>
<li><a href="javascript:;" data-url="http://pluslive.zunyifb.com/dspd/playlist.m3u8?_upt=b69c58fc1702986229" class="btnplay">遵义都市</a></li>
<li><a href="javascript:;" data-url="https://liveout.xntv.tv/a65jur/96iln2.m3u8" class="btnplay">西宁综合</a></li>
<li><a href="javascript:;" data-url="https://liveout.xntv.tv/a65jur/90p2i1.m3u8" class="btnplay">西宁生活</a></li>
<li><a href="javascript:;" data-url="http://hplayer1.juyun.tv/camera/133635181.m3u8" class="btnplay">安顺一套综合</a></li>
<li><a href="javascript:;" data-url="http://hplayer1.juyun.tv/camera/116587130.m3u8" class="btnplay">安顺二套公共</a></li>
<li><a href="javascript:;" data-url="http://stream.qhbtv.com/adws/sd/live.m3u8" class="btnplay">安多卫视</a></li>
<li><a href="javascript:;" data-url="http://stream1.jlntv.cn/jygw/playlist.m3u8" class="btnplay">贵州家有购物</a></li>
<li><a href="javascript:;" data-url="http://lglivepull.sznews.com/showto_live/2646.m3u8" class="btnplay">深圳东部</a></li>
<li><a href="javascript:;" data-url="http://livepull-tcyzb.sztv.com.cn/live/dushi01.m3u8" class="btnplay">深圳都市</a></li>
<li><a href="javascript:;" data-url="http://lglivepull.sznews.com/showto_live/2645.m3u8" class="btnplay">深圳众创</a></li>
<li><a href="javascript:;" data-url="http://lives.jnnews.tv/video/s10001-JNTV-1/index.m3u8" class="btnplay">济宁综合</a></li>
<li><a href="javascript:;" data-url="http://lives.jnnews.tv/video/s10001-SDTV/index.m3u8" class="btnplay">济宁图文</a></li>
<li><a href="javascript:;" data-url="http://lives.jnnews.tv/video/s10001-JNTV3/index.m3u8" class="btnplay">济宁公共</a></li>
<li><a href="javascript:;" data-url="http://lives.jnnews.tv/video/s10001-SDTV/index.m3u8" class="btnplay">济宁教育</a></li>
<li><a href="javascript:;" data-url="http://stream.hrbtv.net/xwzh/sd/live.m3u8" class="btnplay">哈尔滨综合</a></li>
<li><a href="javascript:;" data-url="http://stream.hrbtv.net/shpd/sd/live.m3u8" class="btnplay">哈尔滨生活</a></li>
<li><a href="javascript:;" data-url="http://stream.hrbtv.net/ylpd/sd/live.m3u8" class="btnplay">哈尔滨娱乐</a></li>
<li><a href="javascript:;" data-url="http://stream.hrbtv.net/yspd/sd/live.m3u8" class="btnplay">哈尔滨影视</a></li>
<li><a href="javascript:;" data-url="http://live.hznet.tv:1935/live/live1/500K/tzwj_video.m3u8" class="btnplay">菏泽一套综合</a></li>
<li><a href="javascript:;" data-url="http://live.hznet.tv:1935/live/live3/500K/tzwj_video.m3u8" class="btnplay">菏泽三套影视</a></li>
<li><a href="javascript:;" data-url="http://live.hznet.tv:1935/live/live2/500K/tzwj_video.m3u8" class="btnplay">菏泽二套生活</a></li>
<li><a href="javascript:;" data-url="http://hls.nntv.cn/nnlive/LATV_A.m3u8" class="btnplay">隆安电视台</a></li>
<li><a href="javascript:;" data-url="http://stream.zztvzd.com/3/sd/live.m3u8" class="btnplay">枣庄公共</a></li>
<li><a href="javascript:;" data-url="http://czlive.czgd.tv:85/live/xnyt.m3u8" class="btnplay">沧州电视台一套</a></li>
<li><a href="javascript:;" data-url="http://czlive.czgd.tv:85/live/xnet.m3u8" class="btnplay">沧州电视台二套</a></li>
<li><a href="javascript:;" data-url="http://czlive.czgd.tv:85/live/xnst.m3u8" class="btnplay">沧州电视台三套</a></li>
<li><a href="javascript:;" data-url="https://jwliveqxzb.hebyun.com.cn/hdgg/hdgg.m3u8" class="btnplay">邯郸公共</a></li>
<li><a href="javascript:;" data-url="https://jwliveqxzb.hebyun.com.cn/hdkj/hdkj.m3u8" class="btnplay">邯郸科教</a></li>
<li><a href="javascript:;" data-url="http://hw-m-l.cztv.com/channels/lantian/channel02/1080p.m3u8" class="btnplay">浙江都市</a></li>
<li><a href="javascript:;" data-url="http://hw-m-l.cztv.com/channels/lantian/channel05/1080p.m3u8" class="btnplay">浙江影视娱乐</a></li>
<li><a href="javascript:;" data-url="http://hw-m-l.cztv.com/channels/lantian/channel04/1080p.m3u8" class="btnplay">浙江教育科技</a></li>
<li><a href="javascript:;" data-url="http://hw-m-l.cztv.com/channels/lantian/channel03/1080p.m3u8" class="btnplay">浙江经视</a></li>
<li><a href="javascript:;" data-url="http://hw-m-l.cztv.com/channels/lantian/channel06/1080p.m3u8" class="btnplay">浙江民生休闲</a></li>
<li><a href="javascript:;" data-url="http://hw-m-l.cztv.com/channels/lantian/channel07/1080p.m3u8" class="btnplay">浙江综合</a></li>
<li><a href="javascript:;" data-url="http://hw-m-l.cztv.com/channels/lantian/channel08/1080p.m3u8" class="btnplay">浙江少儿</a></li>
<li><a href="javascript:;" data-url="http://hw-m-l.cztv.com/channels/lantian/channel10/1080p.m3u8" class="btnplay">浙江国际</a></li>
<li><a href="javascript:;" data-url="http://hw-m-l.cztv.com/channels/lantian/channel09/1080p.m3u8" class="btnplay">留学世界</a></li>
<li><a href="javascript:;" data-url="https://live.yjtvw.com:8081/live/smil:yjtv1.smil/playlist.m3u8" class="btnplay">阳江综合</a></li>
<li><a href="javascript:;" data-url="https://live.yjtvw.com:8081/live/smil:yjtv2.smil/playlist.m3u8" class="btnplay">阳江公共</a></li>
<li><a href="javascript:;" data-url="http://tmpstream.hyrtv.cn/xwzh/sd/live.m3u8" class="btnplay">河源综合</a></li>
<li><a href="javascript:;" data-url="http://tmpstream.hyrtv.cn/hygg/sd/live.m3u8" class="btnplay">河源公共</a></li>
<li><a href="javascript:;" data-url="https://hls.ningxiahuangheyun.com/live/nxws1M.m3u8" class="btnplay">宁夏卫视</a></li>
<li><a href="javascript:;" data-url="https://hls.ningxiahuangheyun.com/live/nxgg1M.m3u8" class="btnplay">宁夏公共</a></li>
<li><a href="javascript:;" data-url="https://hls.ningxiahuangheyun.com/live/nxse1M.m3u8" class="btnplay">宁夏少儿</a></li>
<li><a href="javascript:;" data-url="https://tv.lanjingfm.com/cctbn/hainan.m3u8" class="btnplay">中国交通</a></li>
<li><a href="javascript:;" data-url="http://live.wzqmt.com/wztv1/sd/live.m3u8" class="btnplay">温州综合</a></li>
<li><a href="javascript:;" data-url="http://live.lyg1.com/zhpd/sd/live.m3u8" class="btnplay">连云港综合</a></li>
<li><a href="javascript:;" data-url="http://live.lyg1.com/ggpd/sd/live.m3u8" class="btnplay">连云港公共</a></li>
<li><a href="javascript:;" data-url="https://qxlmlive9.cbg.cn/applive/kzpd01/chunklist.m3u8" class="btnplay">开州综合</a></li>
<li><a href="javascript:;" data-url="http://hls.nntv.cn/nnlive/NNTV_NEWS_A.m3u8" class="btnplay">南宁综合</a></li>
<li><a href="javascript:;" data-url="http://hls.nntv.cn/nnlive/NNTV_METRO_A.m3u8" class="btnplay">南宁都市</a></li>
<li><a href="javascript:;" data-url="http://hls.nntv.cn/nnlive/NNTV_VOD_A.m3u8" class="btnplay">南宁影视</a></li>
<li><a href="javascript:;" data-url="http://hls.nntv.cn/nnlive/NNTV_PUB_A.m3u8" class="btnplay">南宁公共</a></li>
<li><a href="javascript:;" data-url="https://qxlmlive9.cbg.cn/applive/zxtv2/chunklist.m3u8" class="btnplay">忠县综合</a></li>
<li><a href="javascript:;" data-url="https://qxlmlive9.cbg.cn/applive/zxtv2/chunklist.m3u8" class="btnplay">忠县文旅</a></li>
<li><a href="javascript:;" data-url="https://tvlive.ugoshop.com/ugotvlive/ssgotv.m3u8?auth_key=2312509421-0-0-6642ec3645caa943da6855a9ef7e2129" class="btnplay">重庆时尚购物</a></li>
<li><a href="javascript:;" data-url="http://live.shaoxing.com.cn/video/s10001-sxtv3/index.m3u8" class="btnplay">绍兴文化影视</a></li>
<li><a href="javascript:;" data-url="http://live.shaoxing.com.cn/video/s10001-sxtv2/index.m3u8" class="btnplay">绍兴公共</a></li>
<li><a href="javascript:;" data-url="http://live.shaoxing.com.cn/video/s10001-sxtv1/index.m3u8" class="btnplay">绍兴综合</a></li>
<li><a href="javascript:;" data-url="http://cm-wshls.homecdn.com/live/8bb.m3u8" class="btnplay">扬州新闻</a></li>
<li><a href="javascript:;" data-url="http://cm-wshls.homecdn.com/live/8bd.m3u8" class="btnplay">扬州城市</a></li>
<li><a href="javascript:;" data-url="http://cm-wshls.homecdn.com/live/8bf.m3u8" class="btnplay">扬州生活</a></li>
<li><a href="javascript:;" data-url="http://cm-wshls.homecdn.com/live/8c3.m3u8" class="btnplay">扬州邗江</a></li>
<li><a href="javascript:;" data-url="http://www.dalitv.com.tw:4568/live/dali/index.m3u8" class="btnplay">大立電视</a></li>
<li><a href="javascript:;" data-url="http://lb.streaming.sk/fashiontv/stream/chunklist.m3u8" class="btnplay">時尚台FTV</a></li>
<li><a href="javascript:;" data-url="https://live.mastvnet.com/lsdream/lY44pmm/2000/live.m3u8" class="btnplay">澳亚卫视</a></li>
<li><a href="javascript:;" data-url="http://61.216.67.119:1935/TWHG/E1/chunklist_w705811302.m3u8" class="btnplay">台湾番薯台</a></li>
<li><a href="javascript:;" data-url="https://live-350k.streamingfast.net/hls-live/goodtv/_definst_/liveevent/live-ch6-2.m3u8" class="btnplay">GoodTV 经典音乐</a></li>
<li><a href="javascript:;" data-url="https://cdn.deepcore.online/hlsme/ctv_hk.m3u8" class="btnplay">创世电视</a></li>
<li><a href="javascript:;" data-url="http://moneytoday1.ktcdn.co.kr:1935/mtnlive/720/playlist.m3u8" class="btnplay">韓國新聞</a></li>
<li><a href="javascript:;" data-url="http://mgugaklive.nowcdn.co.kr/gugakvideo/gugakvideo.stream/playlist.m3u8" class="btnplay">Gugak TV</a></li>
<li><a href="javascript:;" data-url="http://119.77.96.184:1935/chn05/chn05/chunklist_w1306745753.m3u8" class="btnplay">韩国-KCTV</a></li>
<li><a href="javascript:;" data-url="http://moneytoday1.ktcdn.co.kr:1935/mtnlive/720/playlist.m3u8" class="btnplay">CJB TV</a></li>
<li><a href="javascript:;" data-url="https://gstv-gsshop.gsshop.com/gsshop_hd/gsshop_hd.stream/playlist.m3u8" class="btnplay">GS Shop</a></li>
<li><a href="javascript:;" data-url="http://1.222.207.80:1935/live/cjbtv/playlist.m3u8" class="btnplay">韩国-EBS1</a></li>
<li><a href="javascript:;" data-url="http://119.200.131.11:1935/KBCTV/tv/playlist.m3u8" class="btnplay">KBC 광주방송</a></li>
<li><a href="javascript:;" data-url="http://ebsonairios.ebs.co.kr/groundwavefamilypc/familypc1m/playlist.m3u8" class="btnplay">韩国阿里郎</a></li>
<li><a href="javascript:;" data-url="https://hlive.ktv.go.kr/live/klive_h.stream/playlist.m3u8" class="btnplay">Korea TV</a></li>
<li><a href="javascript:;" data-url="http://amdlive.ctnd.com.edgesuite.net/arirang_1ch/smil:arirang_1ch.smil/playlist.m3u8" class="btnplay">韩国EBS少儿</a></li>
<li><a href="javascript:;" data-url="http://cdn-live1.qvc.jp/iPhone/800/800.m3u8" class="btnplay">日本QVC Japan</a></li>
<li><a href="javascript:;" data-url="http://brics.bonus-tv.ru/cdn/brics/chinese/tracks-v1a1/index.m3u8" class="btnplay">俄罗斯BRICS 中文</a></li>
<li><a href="javascript:;" data-url="http://online.video.rbc.ru/online/rbctv_480p/index.m3u8" class="btnplay">RBK TV 俄语</a></li>
<li><a href="javascript:;" data-url="https://rt-glb.rttv.com/live/rtnews/playlist.m3u8" class="btnplay">RT英语新闻</a></li>
<li><a href="javascript:;" data-url="http://de1se01.v2beat.live/chunks.m3u8" class="btnplay">Vibee音乐</a></li>
<li><a href="javascript:;" data-url="http://live.m2.tv/hls3/stream.m3u8" class="btnplay">乌克兰M2-音乐</a></li>
<li><a href="javascript:;" data-url="http://livestreamcdn.net:1935/ExtremaTV/ExtremaTV/playlist.m3u8" class="btnplay">西班牙Extrema</a></li>
<li><a href="javascript:;" data-url="https://streaming01.divercom.be/notele_live/_definst_/direct.stream/chunklist.m3u8" class="btnplay">法国notélé</a></li>
<li><a href="javascript:;" data-url="http://lb.streaming.sk/fashiontv/stream/playlist.m3u8" class="btnplay">FTV-捷克&斯洛伐克</a></li>
<li><a href="javascript:;" data-url="http://tstv-stream.tsm.utexas.edu/hls/livestream_hi/index.m3u8" class="btnplay">德克萨斯大学奥斯汀分校TSTV</a></li>
<li><a href="javascript:;" data-url="http://video.oct.dc.gov/out/u/DCN.m3u8" class="btnplay">哥伦比亚特区电视</a></li>
<li><a href="javascript:;" data-url="http://streaming.astrakhan.ru/astrakhan24/index.m3u8" class="btnplay">俄罗斯Astrakhan 24 </a></li>
<li><a href="javascript:;" data-url="http://s1.media-planet.sk:80/live/novezamky/BratuMarian.m3u8" class="btnplay">斯洛伐克TVNZ</a></li>
<li><a href="javascript:;" data-url="https://stream.krgv.com/krgv-english/krgv-somos.smil/playlist.m3u8" class="btnplay">KRGV-DT2</a></li>
<li><a href="javascript:;" data-url="https://stream.swagit.com/live-edge/houstontx/smil:hd-16x9-2-a/playlist.m3u8" class="btnplay">HTV 1 Houston Television</a></li>
<li><a href="javascript:;" data-url="https://cdn.jaybirdtv.com/wfmz/channel/1/master.m3u8" class="btnplay">WFMZ-DT1</a></li>
<li><a href="javascript:;" data-url="https://castus-vod-dev.s3.amazonaws.com/vod_clients/kvcr/live/ch1/video.m3u8" class="btnplay">KVCR-DT2</a></li>
<li><a href="javascript:;" data-url="https://streamer1.connectto.com/AABC_WEB_1201/index.m3u8" class="btnplay">KIIO-LD4</a></li>
<li><a href="javascript:;" data-url="https://edge1.lifestreamcdn.com/live/geb/playlist.m3u8" class="btnplay">KBPX-LD5</a></li>
<li><a href="javascript:;" data-url="https://reflect-stream6-capsmedia.cablecast.tv/live/live.m3u8" class="btnplay">CAPS Channel</a></li>
<li><a href="javascript:;" data-url="https://livecdn.live247stream.com/eternallife/tv/playlist.m3u8" class="btnplay">Eternal Life TV Network</a></li>
<li><a href="javascript:;" data-url="https://cdn3.wowza.com/5/cHYzekYzM2kvTVFH/elsegundo/G0014_002/playlist.m3u8" class="btnplay">El Segundo Media</a></li>
<li><a href="javascript:;" data-url="https://mtchls.wns.live/hls/stream.m3u8" class="btnplay">MTC时尚</a></li>
<li><a href="javascript:;" data-url="https://live.feed.thepalmbeaches.tv/index.m3u8" class="btnplay">Palm Beaches TV</a></li>
<li><a href="javascript:;" data-url="https://hls.keshishhamid.live/hls/stream.m3u8" class="btnplay">Payame Aramesh TV</a></li>
<li><a href="javascript:;" data-url="https://stream.rcncdn.com/live/vsinproxy.m3u8" class="btnplay">VSiN</a></li>
<li><a href="javascript:;" data-url="http://67.53.122.248/live-4/live/live.m3u8" class="btnplay">City TV Lawndale</a></li>
<li><a href="javascript:;" data-url="http://live-hls-web-aje.getaj.net/AJE/01.m3u8" class="btnplay">半岛新闻</a></li>
<li><a href="javascript:;" data-url="http://stream.revma.ihrhls.com/zc2001/hls.m3u8" class="btnplay">FM电台 106.1 The Breeze</a></li>
<li><a href="javascript:;" data-url="http://stream.revma.ihrhls.com/zc1997/hls.m3u8" class="btnplay">FM电台 Q102 Music</a></li>
<li><a href="javascript:;" data-url="http://stream.revma.ihrhls.com/zc6043/hls.m3u8" class="btnplay">FM电台 NBC News</a></li>
<li><a href="javascript:;" data-url="http://178.33.224.197:1935/euroindiemusic/euroindiemusic/playlist.m3u8" class="btnplay">Euroindie音乐台</a></li>

</ul>
</div>
<script type="text/javascript">$(".btnplay").each(function(){$(this).click(function() {var url=$(this).attr("data-url");var jj='player/index.html?vurl=';$("#myiframe").attr("src",jj+url);$(this).addClass("selected").removeClass("");$(this).siblings().removeClass("selected").addClass("");});});</script>

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
