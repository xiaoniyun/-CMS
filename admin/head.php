<div id="header">
  <div class="con">
      <h1 class="logo png"><a href="./">极光影院管理系统</a></h1>
      <div class="aik_info"><a href="../" target="_blank">网站首页</a>，欢迎您，<?php echo $aik['admin_name']?>，&nbsp;<a href="./login.php?act=logout">退出</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
      <ul class="aik_nav">
		<li><a href="./"<?php echo $nav=='home'?' class="this"':''?>>首页</a></li>
		<li><a href="./setting.php"<?php echo $nav=='setting'?' class="this"':''?>>设置</a></li>

		<li><a href="./cache-del.php">更新缓存</a></li>
		
      </ul>
  </div>
</div>
