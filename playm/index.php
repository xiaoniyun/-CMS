<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>HTML5 Player P2P加速</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <script src="js/index.browser.min.js"></script>
    <script src="js/hlsjs-p2p-engine.min.js"></script>
    <script src="js/p2p-chimee-kernel-hls@latest"></script>
    <style>
      body,html{width:100%;height:100%;background:#000;padding:0;margin:0;overflow-x:hidden;overflow-y:hidden}
      #player{position:absolute;top:0;left:0;width:100%;height:100%;}
      .b-videobottom {width:100%;height:30px;background:#1D1D1D;position:fixed;text-align:center;left:0;z-index:100;}
      .b-adicon {font-size:12px;color:#555;line-height:30px;margin-left:5px;display:none;}
    </style>  
  </head>  
  <body> 
    <div id="player"></div>
    <!--<div class="b-videobottom"><span class="b-adicon" style="display: inline;">文字广告</span>-->
	</div>
	<script>     
		var player = new Chimee({
			wrapper: '#player',
			src: '<?php echo $_GET['url'];?>',
			controls: true,
            autoplay: true,
            preload: true,
			kernels: {
				hls: {
					handler: window.ChimeeKernelHls,
					maxBufferSize: 0,
					maxBufferLength: 5,
					liveSyncDuration: 30, 
					p2pConfig: {
						logLevel: 'debug',
						live: false,
					}
				}
			},
		});
	</script>
	</div>
	<div style="display: none">
<script type="text/javascript" src="https://js.users.51.la/21354177.js"></script>
    </div>
  </body>
</html>
