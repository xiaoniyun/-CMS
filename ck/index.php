<!DOCTYPE html>
<html>
<head>
    <title>北极光Player极速播放</title>  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><!-- IE内核 强制使用最新的引擎渲染网页 -->
    <meta name="referrer" content="never">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <meta http-equiv="Access-Control-Allow-Credentials" content="*"><!--解除跨域-->
    <meta name="renderer" content="webkit">  <!-- 启用360浏览器的极速模式(webkit) -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0 ,maximum-scale=1.0, user-scalable=no"><!-- 手机H5兼容模式 -->
    <meta name="x5-fullscreen" content="true" ><meta name="x5-page-mode" content="app" > <!-- X5  全屏处理 -->
    <meta name="full-screen" content="yes"><meta name="browsermode" content="application">  <!-- UC 全屏应用模式 -->
    <meta name="apple-mobile-web-app-capable" content="yes"> <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" /> <!--  苹果全屏应用模式 -->
    <meta name="referrer" content="never">
    <link rel="stylesheet" href="static/css/mui-player.min.css">
    <link rel="stylesheet" href="static/css/muiplayer.css">
    <link rel="stylesheet" href="static/css/index.css">
    <script src="static/js/jquery.min.js"></script>
    <script src="static/js/mui-player.min.js"></script>
    <script src="static/js/mui-player-desktop-plugin.min.js"></script>
    <script src="static/js/mui-player-mobile-plugin.min.js"></script>
    <script src="static/js/jquery.xctips.js"></script>
    <script src="static/js/hls.light.min.js"></script>
    <script src="static/js/flv.min.js"></script>
    <script src="static/js/setting.js"></script>
	<style type="text/css">html,body{height:100%;margin:0;padding:0;overflow:hidden;text-align:center;background:#181818} *{margin:0;border:0;padding:0;text-decoration:none} #video{height:100%} .dplayer-logo{max-width:px;max-height:px;left:auto;right:5%;top:5%}</style>
    <script type="text/javascript">$("#my-loading", parent.document).remove();</script>
</head>
<body>
<div id="loading"  align="center"></div>
<script type="text/javascript">
    if ((navigator.userAgent.indexOf('MSIE') >= 0) || (navigator.userAgent.indexOf('Trident') >= 0)) {
        alert("本播放器在IE浏览器和兼容模式下无法播放，请将浏览器设置为 极速模式！")
    }
    var config = {
        "url": "<?php echo $_GET["url"];?>",
        "vkey": "b70f4a838626047034020bf7687c83d5",
        "key":"b70f4a838626047034020bf7687c83d5",
        "next":"",
        "title":"北极光Player极速播放",
        "tim":"b70f4a838626047034020bf7687c83d5",
    }
    player(config);
</script>
</div>
    <div style="display: none">
<script type="text/javascript" src="https://这里输入统计"></script>
    </div>
</body>
</html>
