#这是这个极光CMS的程序开发结构




##项目名称：极光CMS

项目结构
```
admin/
   └----/404
          /images/
          /js/
          /admincore.php
          /cache-del.php
          /config.php
          /foot.php
          /head.php
          /inc.php
          /index.php
          /login.php
          /setting.php
          /serurl.php
inc/
└----/cache/
       /aik.config.php
       /cache.php
       /init.php
       /page.php
       /zwca.php
       /zwcm.php
       /zwcn.php
/static/
index.php
movie.php
moviea.php
movieb.php

mplay.php
mplaya.php
mplayb.php

mplay1.php
mplay2.php
mplay3.php

404.php

seacher.php
seachera.php
seacherb.php

----------------------------
/admin/js/
/404/
/admin/images/
----------------------------

```
********************************
这是/admin/admincore.php代码
********************************
```

<?php
//ads
if(isset($_GET['act']) && $_GET['act']=='ads' &&isset($_POST['edit']) && $_POST['edit']==1){
	$datas = $_POST;
	$data = $datas['ads'];

    if(!isset($data['search'])){
		$data['search'] = $data['search'];
	}	
	$data['end_ad'] = htmlspecialchars_decode($data['end_ad']);
	if (get_magic_quotes_gpc()) {
		$data['end_ad'] = stripslashes($data['end_ad']);
	}
	$data['top_ad'] = htmlspecialchars_decode($data['top_ad']);
	if (get_magic_quotes_gpc()) {
		$data['top_ad'] = stripslashes($data['top_ad']);
	}

	if(file_put_contents('../data/aik.ads.php',"<?php\n \$ads =  ".var_export($data,true).";\n?>")){
		$tips = '<span class="green" style="font-size:18px; margin-bottom:15px; display:block;">成功！</span>';
	}else{
		$tips = '<span class="red" style="font-size:18px; margin-bottom:15px;display:block;">修改失败！可能是文件权限问题，请给予data/aik.ads.php写入权限</span>';
	}	
     $aik = $data;
}


//setting
if( isset($_GET['act']) && $_GET['act']=='setting' && isset($_POST['edit']) && $_POST['edit']==1){
	$datas = $_POST;
	$data = $datas['aik'];
	
	$data['description'] = strip_tags($data['description']);
	$data['foot'] = htmlspecialchars_decode($data['foot']);
	if (get_magic_quotes_gpc()) {
		$data['foot'] = stripslashes($data['foot']);
	}
	
	$data['hometopnotice'] = htmlspecialchars_decode($data['hometopnotice']);
	if (get_magic_quotes_gpc()) {
		$data['hometopnotice'] = stripslashes($data['hometopnotice']);
	}
	
	$data['hometopright'] = htmlspecialchars_decode($data['hometopright']);
	if (get_magic_quotes_gpc()) {
		$data['hometopright'] = stripslashes($data['hometopright']);
	}

	$data['homelink'] = htmlspecialchars_decode($data['homelink']);
	if (get_magic_quotes_gpc()) {
		$data['homelink'] = stripslashes($data['homelink']);
	}
	
	$data['sort'] = trim($data['sort'],',');
	if($data['sort']==''){
	   $data['sort'] = '1,2,3,4,5,6,7,8,9,10';	
	}
    if(!isset($datas['aik']['joinhotkey'])){
		$data['joinhotkey']='0';
	}
	if($data['admin_pass']==''){
		$data['admin_pass'] = $aik['admin_pass'];
	}else{
	    $data['admin_pass'] = md5ff(htmlspecialchars($data['admin_pass']));	
	}
	
	if(file_put_contents('../inc/aik.config.php',"<?php\n \$aik =  ".var_export($data,true).";\n?>")){
		$tips = '<span class="green" style="font-size:18px; margin-bottom:15px; display:block;">成功！</span>';
	}else{
		$tips = '<span class="red" style="font-size:18px; margin-bottom:15px;display:block;">修改失败！可能是文件权限问题，请给予inc/aik.config.php写入权限</span>';
	}	
     $aik = $data;
} 
 //setmovie
if( isset($_GET['act']) && $_GET['act']=='seturl' && isset($_POST['edit']) && $_POST['edit']==1){	
	$datas = $_POST;
    $seturl = $datas['seturl'];	
	foreach($seturl['title'] as $k=>$v){
		if(trim($seturl['title'][$k])==''){
			unset($seturl['type'][$k]);
			unset($seturl['title'][$k]);
			unset($seturl['newurl'][$k]);
			unset($seturl['img'][$k]);			
		}		
	}
	if(file_put_contents('../data/aik.seturl.php',"<?php\n \$seturl =  ".var_export($seturl,true).";\n?>")){
		$tips = '<span class="green" style="font-size:18px; margin-bottom:15px; display:block;">资源发布修改成功，你可在精选版块查看！</span>';
	}else{
	    $tips = '<span class="red" style="font-size:18px; margin-bottom:15px; display:block;">修改失败！</span>';	
	}    
}
//循环目录下的所有文件  
function deleteAll($path) {
    $op = dir($path);
    while(false != ($item = $op->read())) {
        if($item == '.' || $item == '..') {
            continue;
        }
        if(is_dir($op->path.'/'.$item)) {
            deleteAll($op->path.'/'.$item);
            rmdir($op->path.'/'.$item);
        } else {
            unlink($op->path.'/'.$item);
        }
    
    }   
echo '<span style="font-size:22px; color:green">清除完毕！</span>';
closedir( $op );  
}
?>

```
********************************
这是/admin/cache-del.php代码
********************************
```

<?php
 //设置需要删除的文件夹
  $path = $_SERVER['DOCUMENT_ROOT']."/inc/cache/";
  //清空文件夹函数和清空文件夹后删除空文件夹函数的处理
  function deldir($path){
   //如果是目录则继续
   if(is_dir($path)){
    //扫描一个文件夹内的所有文件夹和文件并返回数组
   $p = scandir($path);
   foreach($p as $val){
    //排除目录中的.和..
    if($val !="." && $val !=".."){
     //如果是目录则递归子目录，继续操作
     if(is_dir($path.$val)){
      //子目录中操作删除文件夹和文件
      deldir($path.$val.'/');
      //目录清空后删除空文件夹
      @rmdir($path.$val.'/');
     }else{
      //如果是文件直接删除
      unlink($path.$val);
     }
    }
   }
  }
  }
 //调用函数，传入路径
 deldir($path);
 	header("content-type:text/html;charset=utf-8");
 echo "<script>alert('缓存清理成功！');window.location.href='./'</script>";
?>

```
********************************
这是/admin/config.php代码
********************************
```

<?php
session_start();
error_reporting(0);
include('../inc/aik.config.php'); 
define('SYSPATH',$aik['path']);
$rep='foot';
if($_SESSION['admin_aik']!==base64_decode('aHR0cDovL3Yud29haWsuY29t')){
	header("location: ./login.php");
	exit;
}
$nav='';
function md5ff($str=1){
	return md5($str.'ff371');
}
?>
********************************
这是/admin/foot.php代码
********************************
<div id="footer">Copyright &copy; <span style="color:#FF5200">极光</span><span style="color:#0065FF">CMS</span> ,  <a href="https://xiaoniyun.github.io/" target="_blank">源码程序更新</a></div>

```
********************************
这是/admin/head.php代码
********************************
```

<div id="header">
  <div class="con">
      <h1 class="logo png"><a href="./">极光CMS管理系统</a></h1>
      <div class="aik_info"><a href="../" target="_blank">网站首页</a>，欢迎您，<?php echo $aik['admin_name']?>，&nbsp;<a href="./login.php?act=logout">退出</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
      <ul class="aik_nav">
		<li><a href="./"<?php echo $nav=='home'?' class="this"':''?>>首页</a></li>
		<li><a href="./setting.php"<?php echo $nav=='setting'?' class="this"':''?>>设置</a></li>

		<li><a href="./cache-del.php">更新缓存</a></li>
		
      </ul>
  </div>
</div>

********************************
这是/admin/inc.php代码
********************************
<title>极光CMS管理后台 - Powered by 极光</title>
<meta name="keywords" content="极光开发组" />
<meta name="description" content="极光CMS，苹果CMS程序" />
<link href="./images/woaik.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="./../favicon.ico">

```
********************************
这是/admin/index.php代码
********************************
```

<?php 
include('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>极光影视CMS管理后台</title>
<meta name="keywords" content="智卓星网开发组" />
<meta name="description" content="极光影音，极光影视CMS程序" />
<link href="./images/woaik.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="./../favicon.ico">
</head>
<body>
<?php $nav = 'home';include('head.php'); ?>
<div id="hd_main">
   <div style="margin:20px;">

      <table width="600" border="0" class="tablecss" cellspacing="0" cellpadding="0" align="center">
   <tr>
    <td colspan="2" align="center">欢迎使用极光CMS管理系统！</td>
    </tr>
  <tr>
    <td align="right">当前使用版：</td>
    <td><span>V3.0</span></td>
  </tr>
  <tr>
    <td align="right">程序开发文档：</td>
    <td><a href="https://xiaoniyun.github.io/" target="_blank"><font color="#FF0000">点击查看</font></a></td>
  </tr>
  <tr>
    <td width="213" align="right">服务器操作系统：</td>
    <td width="387"><?php $os = explode(" ", php_uname()); echo $os[0];?> (<?php if('/'==DIRECTORY_SEPARATOR){echo $os[2];}else{echo $os[1];} ?>)</td>
  </tr>
  <tr>
    <td width="213" align="right">服务器解译引擎：</td>
    <td width="387"><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
  </tr>
  <tr>
    <td width="213" align="right">PHP版本：</td>
    <td width="387"><?php echo PHP_VERSION?></td>
  </tr>
  <tr>
    <td align="right">域名：</td>
    <td><?php echo $_SERVER['HTTP_HOST']?></td>
  </tr>
  <tr>
    <td align="right">allow_url_fopen：</td>
    <td><?php echo ini_get('allow_url_fopen') ? '<span class="green">支持</span>' : '<span class="red">不支持</span>'?></td>
  </tr>
  <tr>
    <td align="right">curl_init：</td>
    <td><?php if ( function_exists('curl_init') ){ echo '<span class="green">支持</span>' ;}else{ echo '<span class="red">不支持</span>';}?></td>
  </tr>

<tr>
    <td align="right">/data/目录权限检测：</td>
    <td><?php echo is_writable('../data/') ? '<span class="green">可写</span>' : '<span class="red">不可写</span>'?></td>
  </tr>  

  <tr>
    <td colspan="2" style="line-height:220%; text-indent:28px;">欢迎使用本程序，网站全自动更新采集数据并缓存，可设置其他资源网采集链接，采集数据通用为苹果CMS接口（通用的josn数据接口），标签列表绑定请查看说明文档<font color="red">源码程序更新以及开发文档，具体详细信息请到官方开发文档查看</br>开发QQ1：000000，开发QQ2：000000；））</font></a>，感谢朋友们的支持！</br>QQ交流群号；000000</br>更多使用帮助及BUG反馈请移步：</br><a href="https://xiaoniyun.github.io/" target="_blank">点此进入查看开发文档Github</a>
</br>
<a href="https://gitee.com/xiaoniyun" target="_blank">点击进入Gitee开发文档</a>    
    </font></br></br>
</td>
    </tr>
   
</table>

   </div>

</div>
<?php include('foot.php'); ?>
</body>
</html>

```
********************************
这是/admin/login.php代码
********************************
```

<?php
session_start();
error_reporting(0);
if($_GET['act']=='logout'){
	unset($_SESSION);
	header("location: ./login.php");
	exit;
}
$tips='';
if($_POST['username'] && $_POST['password']){
	include('../inc/aik.config.php');
	$admin_name = htmlspecialchars($_POST['username']);
	$admin_pass = md5ff(htmlspecialchars($_POST['password']));
	if($admin_name==$aik['admin_name']  && $admin_pass==$aik['admin_pass']){
		$_SESSION['admin_aik'] = 'http://v.woaik.com';
		//header("location: ./index.php");
		echo '<script>window.location.href="./index.php";</script>';
		exit;
	}else{
		$tips = '账号或密码错误！';
	}
}
function md5ff($str=1){
	return md5($str.'ff371');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>后台管理登录 - Powered By 极光开发组</title>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<style>
body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,code,form,fieldset,legend,select,input,textarea,button,p,blockquote,th,td {margin:0; padding:0; outline:none;}
body {
 font-size:12px; color:#343434; background:#AACCEE;
}
a{ color:#343434; text-decoration:none}
a:hover{color:#F00;text-decoration:underline}
img{border:0;vertical-align:top;}
h3{font-size:14px;}
ul,ol,li{list-style:none;line-height:180%;}
table{border-collapse:collapse; border-spacing:0;}
input,button,select {color:#000; font:100% arial; vertical-align:middle; overflow:visible;}
select {height:20px; line-height:20px;}

.cl{clear:both; height:0px; overflow:hidden;}
.cl5{clear:both; height:5px; overflow:hidden;}

.in{ background-color:#FFC}

input{ outline:none;}


.tablecss{background:#D6E0EF;margin:0px auto;word-break:break-all;}
.tablecss tr{background:#F8F8F8;}
.tablecss td{ padding:5px 5px; font-size:12px;border:#D6E0EF solid 1px; *border:0px;}
.tablecss textarea{font-family:Courier New;padding:1px 3px 1px 3px;}
.tablecss input{font-family:11px; padding:1px 2px 1px 2px;}
.tablecss tr.header td{ padding:5px 7px 5px 7px; background-color:#525252; color:#FFFFFF;}
.tablecss tr.header td a{ color:#FFF;}

#footer{ text-align:center; clear:both; padding:10px auto; margin:20px; overflow:hidden; height:40px; color:#036}
#footer a{color:#03C}
</style>
<meta name="robots" content="noindex, nofollow" />
<script type="text/javascript">
function ck(){
    if(document.getElementById('username').value==''){
		alert('请输入用户名！');
		document.getElementById('username').focus();
		return false;
	}else if(document.getElementById('password').value==''){
		alert('请输入密码！');
		document.getElementById('password').focus();
		return false;
	}else{
		return true;

	}
}
</script>
<style>
.inp{height:25px; width:170px; font-size:16px; line-height:25px;}
</style>
</head>
<BODY>

<div class="mt2"></div>
<form name="loginform" method="post" action="" onsubmit="return ck();" style="padding:0;">
	<table border="0" cellspacing="1" cellpadding="0" width="400" class="tablecss" style="margin-top:100px; overflow:hidden;">
<tr class="header">
			<td colspan="4" align="center" style=" height:30px; font-size:18px; font-weight:bold;">影视系统登陆</td>
		</tr>
		<tr>
			<td width="117" align="right" valign="middle" class="tx" style="font-size:16px;">用户名：</td>
		  <td width="260" align="left" valign="middle"><input name="username" type="text" class="inp" id="username" value="" size="30" maxlength="32" autocomplete="off"><span class="gray tips">默认:admin</span></td>
		</tr>
		<tr>
			<td valign="middle" align="right" class="tx" style="font-size:16px;">密　码：</td>
		  <td align="left" valign="middle"><input name="password" type="password" class="inp" id="password" value="" size="30" maxlength="64"><span class="gray tips">默认:admin</span></td>
		</tr>
        
		<tr>
			<input name="act" type="hidden" value="go" /><input type="hidden" name="token" value="<?php echo md5(time())?>"/>   
		  <td align="center" colspan="4"><div class="cl5"></div><input type="submit" name="go" style="height:35px; width:100px;" value="     登 录    ">
<div class="cl5"></div>
<div style="height:30px; color:#F00; text-align:center; line-height:30px;"><?php echo $tips?></div>
          </td>
		</tr>
	</table>
<div class="mt2"></div>
</form>
<div class="mt"></div> 
<div class="cl10"></div>
<?php include('foot.php'); ?>
</BODY>
</HTML>

```
********************************
这是/admin/setting.php代码
********************************
```

<?php 
include('config.php'); 
$tips = '';
include('admincore.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include('inc.php'); ?>
<script type="text/javascript" src="./js/jquery.min.js"></script>
<script type="text/javascript" src="./js/jquery.dragsort-0.4.min.js"></script>


</head>

<body>
<?php $nav = 'setting';include('head.php'); ?>

<div id="hd_main">
  <div align="center"><?php echo $tips?></div>
 <form name="configform" id="configform" action="./setting.php?act=setting&t=<?php echo time()?>" method="post" onsubmit="return subck()">

<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="tablecss">
<tr class="thead">
<td colspan="10" align="center">基本设置</td>
</tr>
<tr>
    <td width="125" align="right" valign="middle" class="s_title">网站名称：</td>
    <td width="690" valign="middle"><input name="edit" id="edit" type="hidden" value="1" /><input type="text" name="aik[sitename]" value="<?php echo $aik['sitename']?>" size="50">
      <span class="gray tips">如：极光影院</span></td>
</tr>
<tr>
    <td width="125" align="right" valign="middle" class="s_title">网站域名：</td>
    <td width="690" valign="middle"><input type="text" name="aik[pcdomain]" id="aik_pcdomain" value="<?php echo $aik['pcdomain']?>" size="20"></br>
      <span class="gray tips">域名填写最后要加“/”，如 http://www.baidu.com/</span></td>
</tr>
<tr>
    <td width="125" align="right" valign="middle" class="s_title">首页标题：</td>
    <td valign="top"><input type="text" name="aik[title]" value="<?php echo $aik['title']?>" size="50">
      <span class="gray tips">显示在首页标题上，一般不超过80个字符</span></td>
</tr>
<tr>
    <td width="125" align="right" valign="middle" class="s_title">首页关键字：</td>
    <td valign="top"><span class="gray tips">关键字请用英文逗号分开，一般不超过100个字符</span><br><textarea name="aik[keywords]" cols="80" rows="2"><?php echo $aik['keywords']?></textarea></td>
      
</tr>
<tr>
    <td width="125" align="right" valign="middle" class="s_title">首页描述：</td>
    <td valign="top"><span class="gray tips">一般不超过200个字符</span><div class="cl5"></div><textarea name="aik[description]" cols="80" rows="3"><?php echo $aik['description']?></textarea></td>
</tr>
<!--<tr>
    <td width="125" align="right" valign="middle" class="s_title">首页顶部公告内容：</td>
    <td valign="top"><font color="red">没有可不填！支持代码改颜色</font><div class="cl5"></div><textarea name="aik[gonggao]" cols="80" rows="1"><?php echo $aik['gonggao']?></textarea></td>
</tr>-->
<tr>
    <td width="125" align="right" valign="middle" class="s_title">推荐链接：</td>
    <td valign="top"><textarea name="aik[icp]" cols="80" rows="5"><?php echo $aik['icp']?></textarea></td>
</tr>
<tr>
    <td width="125" align="right" valign="middle" class="s_title">版权说明：</td>
    <td valign="top"><textarea name="aik[foot]" cols="80" rows="5"><?php echo $aik['foot']?></textarea></td>
</tr>
<tr>
    <td width="125" align="right" valign="middle" class="s_title">统计信息：</td>
    <td valign="top"><textarea name="aik[tongji]" cols="80" rows="5"><?php $aik['tongji'] = str_replace("\\'","'",$aik['tongji']);echo htmlspecialchars($aik['tongji'])?></textarea>
      </td>
</tr>
<tr>
    <td width="125" align="right" valign="middle" class="s_title">其他链接：</td>

    <td valign="top"><font color="red">网站底部其他推荐链接</font><div class="cl5"></div><textarea name="aik[youlian]" cols="80" rows="5"><?php $aik['youlian'] = str_replace("\\'","'",$aik['youlian']);echo htmlspecialchars($aik['youlian'])?></textarea>
      </td>

</tr>

<tr>
    <td width="125" align="right" valign="middle" class="s_title">顶部导航栏：</td>    
    <td valign="top"><input type="text" name="aik[zfb_ad]" id="aik_zhanwai" value="<?php echo $aik['zfb_ad']?>" size="80"></td>
</tr>

<tr>
    <td width="125" align="right" valign="middle" class="s_title">授权码：</td>
    <td valign="top"><input type="text" name="aik[shouquan]" id="aik_shouquan" value="<?php echo $aik['shouquan']?>" size="80"></td>
</tr>
<tr class="thead">
<td colspan="10" align="center">采集设置<br><font color="red">关于标签列表请查看资源网提供的标签分类</font></td>
</tr> 
<tr>
    <td width="125" align="right" valign="middle" class="s_title">资源1链接：</td>    
    <td valign="top"><input type="text" name="aik[zhanwai]" id="aik_zhanwai" value="<?php echo $aik['zhanwai']?>" size="80"></td>
</tr>

<tr>
    <td width="150" align="right" valign="middle" class="s_title">资源1标签配置：</td>
    <td valign="top"><div class="cl5"></div><textarea name="aik[zhan1]" cols="80" rows="6"><?php echo $aik['zhan1']?></textarea></td>
</tr>

<tr>
    <td width="125" align="right" valign="middle" class="s_title">资源2链接：</td>    
    <td valign="top"><input type="text" name="aik[zhanwai1]" id="aik_zhanwai" value="<?php echo $aik['zhanwai1']?>" size="80"></td>
</tr>

<tr>
    <td width="150" align="right" valign="middle" class="s_title">资源2标签配置：</td>
    <td valign="top"><div class="cl5"></div><textarea name="aik[zhan2]" cols="80" rows="6"><?php echo $aik['zhan2']?></textarea></td>
</tr>

<tr>
    <td width="125" align="right" valign="middle" class="s_title">资源3链接：</td>    
    <td valign="top"><input type="text" name="aik[zhanwai2]" id="aik_zhanwai" value="<?php echo $aik['zhanwai2']?>" size="80"></td>
</tr>

<tr>
    <td width="150" align="right" valign="middle" class="s_title">资源3标签配置：</td>
    <td valign="top"><div class="cl5"></div><textarea name="aik[zhan3]" cols="80" rows="6"><?php echo $aik['zhan3']?></textarea></td>
</tr>


<tr class="thead">
<td colspan="10" align="center">视频解析设置</td>
</tr>
<tr>
    <td width="125" align="right" valign="middle" class="s_title">解析接口：</td>
    <td valign="top"><font color="red">默认播放器，无需修改</font><div class="cl5"></div>    
	<textarea name="aik[jiekou]" cols="80" rows="1"><?php echo $aik['jiekou']?></textarea><br>

	若更换其他播放器，请重新填入该播放器名称
      </td>
</tr>
<tr class="thead">
<td colspan="10" align="center">账号设置</td>
</tr>
<tr>
    <td width="125" align="right" valign="middle" class="s_title">登录账号：</td>
    <td valign="top"><input type="text" name="aik[admin_name]" value="<?php echo $aik['admin_name']?>" size="30">
      <span class="gray tips"></span></td>
</tr>
<tr>
    <td width="125" align="right" valign="middle" class="s_title">登录密码：</td>
    <td valign="top"><input type="text" name="aik[admin_pass]" value="" size="30">
      <span class="gray tips">不修改请留空</span></td>
</tr>


<tr>
    <td width="150" align="right" valign="middle" class="s_title">播放器下点播提示：</td>
    <td valign="top"><div class="cl5"></div><textarea name="aik[dbts]" cols="80" rows="3"><?php echo $aik['dbts']?></textarea></td>
</tr>

<tr class="thead">
<td colspan="10" align="center">缓存时间设置</br><span class="gray tips">缓存文件的时间，单位秒，86400秒是一天</span></td>
</tr>
<tr>
    <td width="150" align="right" valign="middle" class="s_title">缓存时间：</td>
    <td valign="top"><div class="cl5"></div><textarea name="aik[dtk_ad]" cols="80" rows="1"><?php echo $aik['dtk_ad']?></textarea></td>
</tr>
<tr class="thead">
<td colspan="10" align="center">视频侵权设置</td>
</tr>
<tr>
    <td width="150" align="right" valign="middle" class="s_title">侵权名称：</td>
    <td valign="top"><div class="cl5"></div><textarea name="aik[qq_name]" cols="80" rows="4"><?php echo $aik['qq_name']?></textarea></td>
</tr>

<tr><!--此处为更新及重要补充，请保留-->
<td colspan="10" align="center"><input name="edit" type="hidden" value="1" /><input id="configSave" type="submit" onclick="return getsort()" value="保 存"></td>
</tr>
</table>
</form>
<script type="text/javascript">
	$(".sxlist:first").dragsort();
</script>
</div>
<?php include('foot.php'); ?>
</body>
</html>

```
********************************
这是/admin/serurl.php代码
********************************
```

<?php 
include('config.php'); 
$tips = '';
include('admincore.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include('inc.php'); ?>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.dragsort-0.4.min.js"></script>
</head>

<body>
<?php $nav = 'seturl';include('head.php'); ?>

<div id="hd_main">
  <div align="center"><?php echo $tips?></div>
 <form name="configform" id="configform" action="./seturl.php?act=seturl&t=<?php echo time()?>" method="post">
<input name="edit" id="edit" type="hidden" value="1" />
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="tablecss">
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="tablecss">
<tr class="thead">
<td colspan="10" align="center">资源推荐发布<a href="https://xiaoniyun.github.io/" target="_blank">【发布说明】</a></td>
</tr>
<tr style="color:#999;">
    <td valign="top" style="padding-left:20px;"><span style="color:blue">★、提示：你可以在此处自定义添加自己喜爱的视频或直播或其他链接至精选板块。</br>
    </td>
</tr>
<?php
if(is_file('../data/aik.seturl.php')){
include('../data/aik.seturl.php');
if(is_array($seturl)){
foreach($seturl['title'] as $k=>$v){
?>
<tr>
    <td valign="top" style="padding-left:15px;">
		<span class="gray tips">类型 </span>
		<select name="seturl[type][]">
		<option value="1"<?php echo $seturl['type'][$k]==1?' selected="selected"':''?>>网页</option>
		<option value="2"<?php echo $seturl['type'][$k]==2?' selected="selected"':''?>>直链</option>
		<option value="3"<?php echo $seturl['type'][$k]==3?' selected="selected"':''?>>站内</option>
		</select>	
		<span class="gray tips">名称 </span>
		<input name="seturl[title][]" type="text" value="<?php echo $seturl['title'][$k]?>" size="20" />
		
		<textarea name="seturl[newurl][]" cols="80" rows="3"><?php $seturl['newurl'][] = str_replace("\\'","'",$seturl['newurl'][$k]);echo htmlspecialchars($seturl['newurl'][$k])?></textarea><span class="gray tips"> 资源链接</span>
	</td>
</tr>
<?php
}
}
}
?>
<tr>
    <td valign="top" style="padding-left:15px;">
		<span class="gray tips">类型 </span>
		<select name="seturl[type][]">
		<option value="1">网页</option>
		<option value="2">直链</option>
		<option value="3">站内</option>
		</select>	
		<span class="gray tips">名称 </span>
		<input name="seturl[title][]" type="text" value="" size="20" />

		<textarea name="seturl[newurl][]" cols="80" rows="3"><?php $seturl['newurl'][] = str_replace("\\'","'",$seturl['newurl'][$k]);?></textarea><span class="gray tips"> 资源链接</span>
    </td>
    </tr>
<tr id="fbox">
<td colspan="10" align="left" style="padding-left:20px;"><input id="configSave" type="submit" value="     保 存     ">   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (删除一条请清空该条的片名后保存)</td>
</tr>
</table>
</form>
</div>
<?php include('foot.php'); ?>
</body>
</html>
**********************
inc/cache/

```
********************************
这是inc/aik.config.php代码
********************************

```

<?php
 $aik =  array (
  'sitename' => '极光影院',
  'pcdomain' => './',
  'title' => '极光影院-在线免费观看最新好看的电影和电视剧',
  'keywords' => '极光影院,电视直播网站,苹果CMS程序,高清电影,云点播,免费看视频,最新电视剧,最新综艺节目,最新电影免费在线观看',
  'description' => '极光影院,热剧快播,最好看的剧情片尽在﻿极光影院,高清云影视免费为大家提供最新最全的免费电影，电视剧，综艺，动漫无广告在线云点播，以及电视直播',
  'icp' => 'https://xiaoniyun.github.io/',
  'foot' => '网站提供新影视资源均系收集各大网站，并不提供影片资源存储，也不参与任何视频录制、上传<br>若本站收集的节目无意侵犯了贵司版权，请在留言板联系我们，我们处理相应资源',
  'tongji' => '<script type="text/javascript" src="https://js.users.51.la/21354177.js"></script>',
  'youlian' => '<a target="_blank" rel="nofollow" href="https://v.qq.com/">腾讯视频</a><span class="split-line"></span>
<a target="_blank" rel="nofollow" href="https://www.youku.com/">优酷视频</a><span class="split-line"></span>
<a target="_blank" rel="nofollow" href="https://www.iqiyi.com/">爱奇艺</a><span class="split-line"></span>
<a target="_blank" rel="nofollow" href="https://xiaoniyun.github.io/htm/index.html">极光CMS</a>',
  'shouquan' => 'NzNiYmQwNGI2YjUxZWViODIzNDI2YzgwODBkMWI0YTQ2NDJmOQ==',
  'zhanwai' => 'http://23.224.101.30/api.php/provide/vod/from/lzm3u8/',
  'zhan1' => '<li><a rel="nofollow"  href="?cid=6&page=1">动作片</a></li>
<li><a href="?cid=7&page=1">喜剧片</a></li>
<li><a href="?cid=8&page=1">爱情片</a></li>
<li><a href="?cid=9&page=1">科幻片</a></li>
<li><a href="?cid=10&page=1">恐怖片</a></li>
<li><a href="?cid=11&page=1">剧情片</a></li>
<li><a href="?cid=12&page=1">战争片</a></li>
<li><a href="?cid=13&page=1">国产剧</a></li>
<li><a href="?cid=14&page=1">香港剧</a></li>
<li><a href="?cid=15&page=1">韩国剧</a></li>
<li><a href="?cid=16&page=1">欧美剧</a></li>
<li><a href="?cid=20&page=1">记录片</a></li>
<li><a href="?cid=21&page=1">台湾剧</a></li>
<li><a href="?cid=22&page=1">日本剧</a></li>
<li><a href="?cid=23&page=1">海外剧</a></li>
<li><a href="?cid=24&page=1">泰国剧</a></li>
<li><a href="?cid=25&page=1">大陆综艺</a></li>
<li><a href="?cid=26&page=1">港台综艺</a></li>
<li><a href="?cid=27&page=1">日韩综艺</a></li>
<li><a href="?cid=28&page=1">欧美综艺</a></li>
<li><a href="?cid=29&page=1">国产动漫</a></li>
<li><a href="?cid=30&page=1">日韩动漫</a></li>
<li><a href="?cid=31&page=1">欧美动漫</a></li>
<li><a href="?cid=32&page=1">港台动漫</a></li>
<li><a href="?cid=33&page=1">海外动漫</a></li>
<li><a href="?cid=37&page=1">足球</a></li>
<li><a href="?cid=38&page=1">篮球</a></li>
<li><a href="?cid=39&page=1">网球</a></li>
<li><a href="?cid=40&page=1">斯诺克</a></li>
<li><a href="?cid=41&page=1">演员</a></li>
<li><a href="?cid=42&page=1">新闻资讯</a></li>
<li><a href="?cid=43&page=1">电影资讯</a></li>
<li><a href="?cid=44&page=1">娱乐新闻</a></li>
<li><a href="?cid=45&page=1">预告片</a></li>
<li><a href="?cid=46&page=1">短剧</a></li>',
    'zhanwai1' => 'https://api.wujinapi.me/api.php/provide/vod/',
  'zhan2' => '<li><a href="?cid=6&page=1">动作片</a></li>
<li><a href="?cid=7&page=1">喜剧片</a></li>
<li><a href="?cid=8&page=1">爱情片</a></li>
<li><a href="?cid=9&page=1">科幻片</a></li>
<li><a href="?cid=10&page=1">恐怖片</a></li>
<li><a href="?cid=11&page=1">剧情片</a></li>
<li><a href="?cid=12&page=1">战争片</a></li>
<li><a href="?cid=13&page=1">国产剧</a></li>
<li><a href="?cid=14&page=1">香港剧</a></li>
<li><a href="?cid=15&page=1">台湾剧</a></li>
<li><a href="?cid=16&page=1">美国剧</a></li>
<li><a href="?cid=21&page=1">纪录片</a></li>
<li><a href="?cid=22&page=1">韩国剧</a></li>
<li><a href="?cid=23&page=1">日本剧</a></li><li><a href="?cid=24&page=1">海外剧</a></li><li><a href="?cid=25&page=1">大陆综艺</a></li>
<li><a href="?cid=26&page=1">日韩综艺</a></li>
<li><a href="?cid=27&page=1">港台综艺</a></li>
<li><a href="?cid=28&page=1">欧美综艺</a></li>
<li><a href="?cid=29&page=1">国产动漫</a></li>
<li><a href="?cid=30&page=1">日韩动漫</a></li>
<li><a href="?cid=31&page=1">欧美动漫</a></li>
<li><a href="?cid=32&page=1">悬疑片</a></li>
<li><a href="?cid=33&page=1">动画片</a></li>
<li><a href="?cid=34&page=1">犯罪片</a></li>
<li><a href="?cid=35&page=1">奇幻片</a></li>
<li><a href="?cid=36&page=1">邵氏电影</a></li>
<li><a href="?cid=37&page=1">泰剧</a></li>
<li><a href="?cid=38&page=1">体育赛事</a></li>
<li><a href="?cid=40&page=1">影视解说</a></li>',
    'zhanwai2' => 'https://api.tiankongapi.com/api.php/provide/vod/from/tkm3u8/',
  'zhan3' => '<li><a href="?cid=6&page=1">动作片</a></li>
<li><a href="?cid=12&page=1">喜剧片</a></li>
<li><a href="?cid=7&page=1">爱情片</a></li>
<li><a href="?cid=8&page=1">科幻片</a></li>
<li><a href="?cid=9&page=1">恐怖片</a></li>
<li><a href="?cid=10&page=1">剧情片</a></li>
<li><a href="?cid=11&page=1">战争片</a></li>
<li><a href="?cid=21&page=1">犯罪片</a></li>
<li><a href="?cid=22&page=1">大陆剧</a></li>
<li><a href="?cid=5&page=1">港澳剧</a></li>
<li><a href="?cid=23&page=1">韩剧</a></li>
<li><a href="?cid=16&page=1">日剧</a></li>
<li><a href="?cid=2&page=1">纪录片</a></li>
<li><a href="?cid=30&page=1">台湾剧</a></li>
<li><a href="?cid=35&page=1">泰剧</a></li>
<li><a href="?cid=36&page=1">日剧</a></li>
<li><a href="?cid=4&page=1">欧美剧</a></li>
<li><a href="?cid=26&page=1">大陆综艺</a></li>
<li><a href="?cid=28&page=1">日韩综艺</a></li>
<li><a href="?cid=27&page=1">港台综艺</a></li>
<li><a href="?cid=29&page=1">欧美综艺</a></li>
<li><a href="?cid=31&page=1">国产动漫</a></li>
<li><a href="?cid=32&page=1">日韩动漫</a></li>
<li><a href="?cid=33&page=1">欧美动漫</a></li>
<li><a href="?cid=34&page=1">海外动画</a></li>
<li><a href="?cid=38&page=1">奇幻片</a></li>
<li><a href="?cid=39&page=1">灾难片</a></li>
<li><a href="?cid=40&page=1">悬疑片</a></li>
<li><a href="?cid=41&page=1">其他片</a></li>
<li><a href="?cid=44&page=1">微短剧</a></li>
<li><a href="?cid=37&page=1">影片解说</a></li>
<li><a href="?cid=42&page=1">体育赛事</a></li>',
  'jiekou' => 'ck/index.html?url=',
  'admin_name' => 'admin',
  'admin_pass' => '3ceb0e9fb16f8673c35f707e8657124a',
  'admin_email' => 'admin@admin.com',
  'logo_dh' => '<img src="images/logo.png">',
  'logo_ss' => '<img id="imgsrc" src="images/sologo.png">',
  'movie_ad' => '<a href="https://xiaoniyun.github.io/" target="_blank"><img src="images/dc5c7986daef50c.gif" style="width:100%"></a>',
  'tv_ad' => '<a href="https://xiaoniyun.github.iol" target="_blank"><img src="images/dc5c7986daef50c.gif" style="width:100%"></a>',
  'zongyi_ad' => '<a href="https://xiaoniyun.github.io/" target="_blank"><img src="images/dc5c7986daef50c.gif" style="width:100%"></a>',
  'dongman_ad' => '公告：欢迎访问极光CMS！聚合全网，你想看的全都有！海量资源，想看啥就看啥！最新、最热、最全的大片，高清正版免费在线观看！更多精彩资源请下载官方APP或收藏官方发布页及关注官方微信公众号',
  'bofang_ad' => '<a href="https://xiaoniyun.github.io" target="_blank"><img src="images/dc5c7986daef50c.gif" style="width:100%"></a>',
  'jiazai_ad' => '<a href="https://xiaoniyun.github.io/" target="_blank"><img src="images/jiazai.png" width="100%"></a>',
  'tishi_ad' => '<li><a rel="nofollow" href="./">首页</a></li>
<li><a rel="nofollow" href="movie.php?page=1">片库</a></li>
<li><a rel="nofollow" href="yy.php">舞曲</a></li>
<li><a rel="nofollow" href="bb.php?page=1">哔哩</a></li>
<li><a rel="nofollow" href="zbtv.php">直播</a></li>
<li><a rel="nofollow" href="https://xiaoniyun.github.io/">其他</a></li>',
  'dbts' => '部分视频需缓存一会才播放，若未显示内容请刷新当前页面或返回选择其他资源线路观看',
  'zfb_ad' => '<li><a href="moviea.php?page=1"> 片库</a></li>
<li><a href="zbtv.php"> 电视直播</a></li>
<li><a href="bb.php?page=1"> 哔哔视频</a></li>',
  'wx_ad' => '<img src="images/wx.png">',
  'cebian1_ad' => '<a class="style01" href="http://wpa.qq.com/msgrd?v=3&uin=000000000&site=qq&menu=yes" target="_blank"><strong>官方发布</strong><h2>更好的视频主题</h2><p>若视频未能播放出来，请点击播放框框内的 m3u8播放 或者点击 直链播放 并等待视频加载一会才能播放！或者在影片资源频道选择其他资源线路进行观看...1.扁平化、简洁风、多功能配置，优秀的电脑、平板、手机支持，响应式布局，不同设备不同展示效果...2.视频全自动采集，不需人工干预，懒人必备！</p></a>',
  'cebian2_ad' => '<a class="style02"  href="gm.php" target="_blank"><strong>本站同款</strong></br></br><img src="images/aly.jpg"></a>',
  'cebian3_ad' => '<a class="style03" href="http://qm.qq.com/cgi-bin/qm/qr?_wv=1027&k=4bwF0c8YXDeo_uRfk03do2_6FhZmK7tw&authKey=P0I5XNiblqzBqXhE24K8S1NPiXf1r5hmllIII2%2FdvYlqSKMk2VV%2F1beXmcpECME1&noverify=0&group_code=群号" target="_blank"><strong>多功能影院</strong><h2>看电影不卡顿</h2><img src="images/llq.png"></a>',
  'cebian4_ad' => '<a class="style04"><strong>官方提示</strong><h2>免费在线观看最新电影电视</h2><p>1.部分视频需要加载缓存一会才能播放！更多精彩分享请收藏官方发布链接地址...<p>2.观看视频：点击选择视频的列表名称进行播放！提示：如播放有问题请选择其他资源频道线路进行观看！或者添加官方QQ交流群以及微信号反馈</p></a></div>',
  'top1_ad' => '<a href="app.php">客户端</a>',
  'top2_ad' => '',
  'top_ad' => '<a href="app.php">APP下载</a>',
  'weixin_ad' => '<img src="images/qrcode.png">',
  'end_ad' => '<a href="app.php"><span><img src="images/gouwu.png"/>APP</span></a>',
  'dtk_ad' => '3600',
  'cache' => '1',
  'qq_name' => '名字1#名字2#名字3',
  'hometopnotice' => '',
  'hometopright' => '',
  'homelink' => '',
  'sort' => '1,2,3,4,5,6,7,8,9,10',
  'joinhotkey' => '0',
);
?>

```
********************************
这是inc/cache.php代码
********************************
```
<?php
error_reporting(0);
include ('./inc/aik.config.php');
include ('aik.config.php');

?>
<?php
$pizza = $aik['dtk_ad'];
define('CACHE_ROOT', dirname(__FILE__).'/cache');
//缓存文件的生命期，单位秒，86400秒是一天
define('CACHE_LIFE', $pizza);
define('CACHE_SUFFIX','.html');
$file_name  = md5($_SERVER['REQUEST_URI']).CACHE_SUFFIX;
$cache_dir  = CACHE_ROOT.'/'.substr($file_name,0,2);

$cache_file = $cache_dir.'/'.$file_name;
if($_SERVER['REQUEST_METHOD']=='GET')
{
    //如果缓存文件存在，并且没有过期，就把它读出来。
    if(file_exists($cache_file) && time()-filemtime($cache_file)<CACHE_LIFE)
    {
        $fp = fopen($cache_file,'rb');
        fpassthru($fp);
        fclose($fp);
        exit;
    }
    elseif(!file_exists($cache_dir))
    {
        if(!file_exists(CACHE_ROOT))
        {
            mkdir(CACHE_ROOT,0777);
            chmod(CACHE_ROOT,0777);
        }
        mkdir($cache_dir,0777);
        chmod($cache_dir,0777);
    }
    //回调函数，当程序结束时自动调用此函数
    function auto_cache($contents)
    {
        global $cache_file;
        $fp = fopen($cache_file,'wb');
        fwrite($fp,$contents);
        fclose($fp);
        chmod($cache_file,0777);
        //生成新缓存的同时，自动删除所有的老缓存。以节约空间。
        clean_old_cache();
        return $contents;
    }
    function clean_old_cache()
    {
        chdir(CACHE_ROOT);
        foreach (glob("*/*".CACHE_SUFFIX) as $file)
        {
           if(time()-filemtime($file)>CACHE_LIFE)
           {
               unlink($file);
           }
        }
    }
    //回调函数 auto_cache
    ob_start('auto_cache');
}
else
{
    if(file_exists($cache_file))unlink($cache_file);
}
?>

```
********************************
这是inc/init.php代码
********************************
```
<?php
function getPageHtml($page, $pages, $url){
  $_pageNum = 5;
  $page = $page<1?1:$page;
  $page = $page > $pages ? $pages : $page;
  $pages = $pages < $page ? $page : $pages;
  $_start = $page - floor($_pageNum/2);
  $_start = $_start<1 ? 1 : $_start;
  $_end = $page + floor($_pageNum/2);
  $_end = $_end>$pages? $pages : $_end;

  $_curPageNum = $_end-$_start+1;

  if($_curPageNum<$_pageNum && $_start>1){  
   $_start = $_start - ($_pageNum-$_curPageNum);
   $_start = $_start<1 ? 1 : $_start;
   $_curPageNum = $_end-$_start+1;
  }
  if($_curPageNum<$_pageNum && $_end<$pages){ 
   $_end = $_end + ($_pageNum-$_curPageNum);
   $_end = $_end>$pages? $pages : $_end;
  }


  if($page>1){
   $_pageHtml .= '<a  title="上一页" href="'.$url.($page-1).'&page='.($page-1).'"">上一页</a>';
  }
  for ($i = $_start; $i <= $_end; $i++) {
   if($i == $page){
    $_pageHtml .= '<a style="background:#ff6651;"><font color="#fff">'.$i.'</font></a>';
   }else{
    $_pageHtml .= '<a href="'.$url.$i.'&page='.$i.'">'.$i.'</a>';
   }
  }
  if($page<$_end){
   $_pageHtml .= '<a  title="下一页" href="'.$url.($page+1).'&page='.($page+1).'"">下一页</a>';
  }
  return  $_pageHtml;
}
?>

********************************
这是inc/page.php代码
********************************
<?php
if(isset($_GET['page'])){
  $HidoveInfo = [
    'page' => $_GET['page'],
  ];
}else{
  $HidoveInfo = [
      'page' => 0,
  ];
}
?>
<li><a href="?page=<?php echo ($HidoveInfo['page']-1)?>">上一页</a></li>  <li><a href="?page=<?php echo ($HidoveInfo['page']+1)?>"> 下一页</a></li>
<li class="active visible-xs"><span class="num">当前第 <?php echo $_GET['page'];?> 页</span></li>

```
***********************
这是inc/zwca.php代码
***********************
```
<?php

?>
//以下代码为PHP核心代码 极光开发组
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

```
********************************
这是inc/zwcm.php代码
********************************
```
<?php

?>
<?php
//以下代码为PHP核心代码 如若不明 请勿修改
include ('./inc/aik.config.php');
$cxurl = $aik['zhanwai2'];
$url = $cxurl."?ac=videolist&h=24";
error_reporting(0);
header('Content-type:text/html;charset=utf-8');
$info=file_get_contents($url);
//print_r($info);
$szz1='#"vod_name":"(.*?)"#';
$szz2='#"vod_id":(.*?),#';
$szz3='#"vod_pic":"(.*?)"#';
$szz4='#"vod_time":"(.*?)"#';
$info = str_replace("\/", "/", $info);
preg_match_all($szz1, $info,$sarr1);
preg_match_all($szz2, $info,$sarr2);
preg_match_all($szz3, $info,$sarr3);
preg_match_all($szz4, $info,$sarr4);
       for($i =0;$i<18;$i++){   
           $zname=$sarr1[1][$i];//名字
           $two=$sarr2[1][$i];//ID
                                                         $time=$sarr4[1][$i];//ID                                           
           $zimg=$sarr3[1][$i];//图片
          $link="mplayb.php?id=".$two;
           //echo $zname;
           //echo $gul;//取出播放链接
           echo "
           <li class='stui-vodlist__item'>
<a class='stui-vodlist__thumb lazyload' href='$link' title='极光' data-original='$zimg'>
<span class='play hidden-xs'></span>
<span class='pic-text'>推荐</span>
</a>
<h4 class='stui-vodlist__title'><a href='$link'>$zname</a></h4>
</li>";
       }
?>

```
********************************
这是inc/zwcn.php代码
********************************
```
<?php

?>
<?php
//以下代码为PHP核心代码 如若不明 请勿修改
include ('./inc/aik.config.php');
$cxurl = $aik['zhanwai1'];
$url = $cxurl."?ac=videolist&h=24";
error_reporting(0);
header('Content-type:text/html;charset=utf-8');
$info=file_get_contents($url);
//print_r($info);
$szz1='#"vod_name":"(.*?)"#';
$szz2='#"vod_id":(.*?),#';
$szz3='#"vod_pic":"(.*?)"#';
$szz4='#"vod_time":"(.*?)"#';
$info = str_replace("\/", "/", $info);
preg_match_all($szz1, $info,$sarr1);
preg_match_all($szz2, $info,$sarr2);
preg_match_all($szz3, $info,$sarr3);
preg_match_all($szz4, $info,$sarr4);
       for($i =0;$i<18;$i++){   
           $zname=$sarr1[1][$i];//名字
           $two=$sarr2[1][$i];//ID
                                                         $time=$sarr4[1][$i];//ID                                           
           $zimg=$sarr3[1][$i];//图片
          $link="mplaya.php?id=".$two;
           //echo $zname;
           //echo $gul;//取出播放链接
           echo "
           <li class='stui-vodlist__item'>
<a class='stui-vodlist__thumb lazyload' href='$link' title='极光' data-original='$zimg'>
<span class='play hidden-xs'></span>
<span class='pic-text'>推荐</span>
</a>
<h4 class='stui-vodlist__title'><a href='$link'>$zname</a></h4>
</li>";
       }
?>

```
********************************
这是index.php代码
********************************
```
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

```
********************************
这是movie.php代码
********************************
```
<?php

?>
include ('./inc/aik.config.php');
include ('./inc/cache.php');
$id=$_GET['cid'];
$info2=file_get_contents($aik['zhanwai']);
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
<?php echo $aik['zhan1'];?>

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
if(empty($_GET['page'])){$html=''.$aik["zhanwai"].'?ac=detail&type=1&pg=1';
}else{ 
$html=''.$aik["zhanwai"].'?ac=detail&t='.$_GET['cid']. '&pg='.$_GET['page'];
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
    $cc="./mplay.php?id=";
    $ccb=$cc.$do1;
    echo "
<li class='stui-vodlist__item'>
<a class='stui-vodlist__thumb lazyload' href='mplay.php?id=$xbflist[$key]' title='极光' data-original='$ximga[$key]'>
<span class='play hidden-xs'></span>
</a>
<h4 class='stui-vodlist__title'>
<a href='mplay.php?id=$xbflist[$key]'>$xname[$key]</a>
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
```
********************************
这是moviea.php代码
********************************
```
<?php

?>
include ('./inc/aik.config.php');
include ('./inc/cache.php');
$id=$_GET['cid'];
$info2=file_get_contents($aik['zhanwai1']);
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
<form name="formsearch" id="formsearch" action="seachera.php" method="post" autocomplete="off">
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
<?php echo $aik['zhan2'];?>

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
if(empty($_GET['page'])){$html=''.$aik["zhanwai1"].'?ac=detail&type=1&pg=1';
}else{ 
$html=''.$aik["zhanwai1"].'?ac=detail&t='.$_GET['cid']. '&pg='.$_GET['page'];
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
    $cc="./mplaya.php?id=";
    $ccb=$cc.$do1;
    echo "
<li class='stui-vodlist__item'>
<a class='stui-vodlist__thumb lazyload' href='mplaya.php?id=$xbflist[$key]' title='极光' data-original='$ximga[$key]'>
<span class='play hidden-xs'></span>
</a>
<h4 class='stui-vodlist__title'>
<a href='mplaya.php?id=$xbflist[$key]'>$xname[$key]</a>
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
```
********************************
这是movieb.php代码
********************************
```
<?php

?>
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
<a class='stui-vodlist__thumb lazyload' href='mplayb.php?id=$xbflist[$key]' title='极光' data-original='$ximga[$key]'>
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
```
********************************
这是mplay.php代码
********************************
```
<?php

error_reporting(0);
include ('./inc/aik.config.php');
include ('./inc/cache.php');
$url = $_SERVER["HTTP_HOST"];
$jiejie = substr($url, 0 - 7, 7);
$jia0 = base64_encode($jiejie);
$jia = md5($jia0);
$b = strpos($jia, "a");
$c = strpos($jia, "z");
$ye = substr($jia, $b, $b - $c - 1);
$jia1 = md5($jia);
$d = strpos($jia1, "s");
$e = strpos($jia1, "0");
$ye1 = substr($jia1, $d, $d - $e - 3);
$jia3 = base64_encode($ye1);
$jia2 = md5($jia3);
$f = strpos($jia2, "W");
$g = strpos($jia2, "5");
$ye2 = substr($jia2, $f, $f - $g - 5);
$jiami0 = $ye1 . $ye2 . $ye;
$jiami = base64_encode($jiami0);
$id=$_GET['id'];
$cxurl = $aik['zhanwai'];
$url = $cxurl."?ac=detail&ids=".$id;
$data=json_decode(file_get_contents($url),true);            

?>
<?php
$pizza = $aik['qq_name'];
$pieces = explode("#", $pizza); 
if ((!empty($pizza))&&(in_array($data['data'][0]['vod_name'], $pieces))) {
 echo "<meta http-equiv=refresh content='0; url=404.php'>";
die();
}
?>
<?php
function fileget($url,$timeout = 5) {
    $user_agent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36 Edg/112.0.1722.68";
    $curl = curl_init(); 
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_USERAGENT,$user_agent);
    curl_setopt($curl, CURLOPT_REFERER,$url) ;
    curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
    curl_setopt($curl, CURLOPT_HEADER, 0); 
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION,1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, '0');
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, '0');
    curl_setopt($curl, CURLOPT_ENCODING, '');
    return curl_exec($curl);
    curl_close($curl);
}
$url = 'http://'.$_SERVER['HTTP_HOST'].'/mplay1.php?id='.$_GET['id']. '';
$content = file_get_contents($url);

$pattern_neirong = '/<a href="(.*)">.*/isU';
preg_match_all($pattern_neirong, $content, $match_neirong);
//$match_neirong = mb_convert_encoding($match_neirong, 'UTF-8', 'GBK');

$pattern_name = '/<a title="(.*?)"><\/td>.*/isU';
preg_match_all($pattern_name, $content, $match_name);
$pattern_content1 = '/<a content="(.*?)"><\/div>.*/isU';
preg_match_all($pattern_content1, $content, $match_content1);

?>
<?php
$pizza = $aik["qq_name"];
$pieces = explode("#", $pizza);
$mzurl = $match_name[1][0];
if (!empty($pizza) && in_array($mzurl, $pieces)) {
?><meta http-equiv=refresh content='0; url=404.php'><?php
	exit(0);
} else {
	echo "";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>正在播放-<?php echo $match_name[1][0]; ?>-<?php echo $aik["sitename"];?></title>
<meta name="keywords" content="正在播放-<?php echo $match_name[1][0]; ?>-播放页">
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
<script type="text/javascript">var playn='<?php echo $match_name[1][0]; ?>', playp='<?php echo $match_name[1][0]; ?>';</script>
<script type="text/javascript" src="static/js/history.js"></script>
<script type="text/javascript">var vod_name='<?php echo $match_name[1][0]; ?>',vod_url=window.location.href,vod_part='<?php echo $match_name[1][0]; ?>';</script>
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

<iframe src="<?php echo $aik['jiekou'];?><?php echo $match_neirong[1][0]; ?>" width="100%" height="360" id="myiframe" scrolling="no" frameborder="0" allowfullscreen="true"></iframe>
</div>
<div class="stui-player__detail">
<ul class="more-btn">
<li>
<a href="javascript:;" class="btn btn-default" onclick="window.location.reload()">刷新重试 <i class="icon iconfont icon-refresh hidden-xs"></i></a>
</li>

</ul>
<h1 class="title"><a href="javascript:location.reload();"><?php echo $match_name[1][0]; ?></a> <i class="icon iconfont icon-more hidden-xs"></i></h1>
<p class="data margin-0">
</p>
</div>
</div>
</div>




<div class="stui-pannel playz clearfix">
<div class="stui-pannel__head clearfix">
<span style="float:left;">
<i class="fa fa-envelope" style="color: #be6319;"></i> #提示：<?php echo $aik["dbts"];?></span>
<span class="text-muted pull-right"><a href="<?php echo $aik['icp']?>"><font color="blue">本站推荐链接</font></a></span>
</div>

<div class="stui-pannel stui-pannel-bg clearfix">
<div class="stui-pannel-box">
<div class="stui-pannel_hd">
<div class="stui-pannel__head bottom-line active clearfix">

<h3 class="title t">云线路</h3>
</div>
</div>
<div class="stui-pannel_bd col-pd clearfix">

<ul class="stui-content__playlist column10 clearfix">
<?php
            foreach ($match_neirong[1] as $key => $value) {
                if ($key >= 0) {
                    $xuhao = ($key + 1);
                    
print <<<EOT
                        <li><a href="javascript:;" data-url="$value" class="btnplay">第 $xuhao 集</a></li>
EOT;
                }
            }
            ?>

</ul>
</div>

<script type="text/javascript">$(".btnplay").each(function(){$(this).click(function() {var url=$(this).attr("data-url");var jj='<?php echo $aik['jiekou'];?>';$("#myiframe").attr("src",jj+url);$(this).addClass("selected").removeClass("");$(this).siblings().removeClass("selected").addClass("");});});</script>
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
<i class="iconfont icon-form"></i> 详细剧情
</h3>
</div>
<div class="col-pd clearfix">
<div class="stui-content__desc">
<?php echo $match_content1[1][0]; ?>
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
```
********************************
这是mplaya.php代码
********************************
```
<?php

error_reporting(0);
include ('./inc/aik.config.php');
include ('./inc/cache.php');
$url = $_SERVER["HTTP_HOST"];
$jiejie = substr($url, 0 - 7, 7);
$jia0 = base64_encode($jiejie);
$jia = md5($jia0);
$b = strpos($jia, "a");
$c = strpos($jia, "z");
$ye = substr($jia, $b, $b - $c - 1);
$jia1 = md5($jia);
$d = strpos($jia1, "s");
$e = strpos($jia1, "0");
$ye1 = substr($jia1, $d, $d - $e - 3);
$jia3 = base64_encode($ye1);
$jia2 = md5($jia3);
$f = strpos($jia2, "W");
$g = strpos($jia2, "5");
$ye2 = substr($jia2, $f, $f - $g - 5);
$jiami0 = $ye1 . $ye2 . $ye;
$jiami = base64_encode($jiami0);
$id=$_GET['id'];
$cxurl = $aik['zhanwai1'];
$url = $cxurl."?ac=detail&ids=".$id;
$data=json_decode(file_get_contents($url),true);            

?>
<?php
$pizza = $aik['qq_name'];
$pieces = explode("#", $pizza); 
if ((!empty($pizza))&&(in_array($data['data'][0]['vod_name'], $pieces))) {
 echo "<meta http-equiv=refresh content='0; url=404.php'>";
die();
}
?>
<?php
function fileget($url,$timeout = 5) {
    $user_agent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36 Edg/112.0.1722.68";
    $curl = curl_init(); 
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_USERAGENT,$user_agent);
    curl_setopt($curl, CURLOPT_REFERER,$url) ;
    curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
    curl_setopt($curl, CURLOPT_HEADER, 0); 
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION,1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, '0');
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, '0');
    curl_setopt($curl, CURLOPT_ENCODING, '');
    return curl_exec($curl);
    curl_close($curl);
}
$url = 'http://'.$_SERVER['HTTP_HOST'].'/mplay2.php?id='.$_GET['id']. '';
$content = file_get_contents($url);

$pattern_neirong = '/<a href="(.*)">.*/isU';
preg_match_all($pattern_neirong, $content, $match_neirong);
//$match_neirong = mb_convert_encoding($match_neirong, 'UTF-8', 'GBK');

$pattern_name = '/<a title="(.*?)"><\/td>.*/isU';
preg_match_all($pattern_name, $content, $match_name);
$pattern_content1 = '/<a content="(.*?)"><\/div>.*/isU';
preg_match_all($pattern_content1, $content, $match_content1);

?>
<?php
$pizza = $aik["qq_name"];
$pieces = explode("#", $pizza);
$mzurl = $match_name[1][0];
if (!empty($pizza) && in_array($mzurl, $pieces)) {
?><meta http-equiv=refresh content='0; url=404.php'><?php
	exit(0);
} else {
	echo "";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>正在播放-<?php echo $match_name[1][0]; ?>-<?php echo $aik["sitename"];?></title>
<meta name="keywords" content="正在播放-<?php echo $match_name[1][0]; ?>-播放页">
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
<script type="text/javascript">var playn='<?php echo $match_name[1][0]; ?>', playp='<?php echo $match_name[1][0]; ?>';</script>
<script type="text/javascript" src="static/js/history.js"></script>
<script type="text/javascript">var vod_name='<?php echo $match_name[1][0]; ?>',vod_url=window.location.href,vod_part='<?php echo $match_name[1][0]; ?>';</script>
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
<form name="formsearch" id="formsearch" action="seachera.php" method="post" autocomplete="off">
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

<iframe src="<?php echo $aik['jiekou'];?><?php echo $match_neirong[1][0]; ?>" width="100%" height="360" id="myiframe" scrolling="no" frameborder="0" allowfullscreen="true"></iframe>
</div>
<div class="stui-player__detail">
<ul class="more-btn">
<li>
<a href="javascript:;" class="btn btn-default" onclick="window.location.reload()">刷新重试 <i class="icon iconfont icon-refresh hidden-xs"></i></a>
</li>

</ul>
<h1 class="title"><a href="javascript:location.reload();"><?php echo $match_name[1][0]; ?></a> <i class="icon iconfont icon-more hidden-xs"></i></h1>
<p class="data margin-0">
</p>
</div>
</div>
</div>




<div class="stui-pannel playz clearfix">
<div class="stui-pannel__head clearfix">
<span style="float:left;">
<i class="fa fa-envelope" style="color: #be6319;"></i> #提示：<?php echo $aik["dbts"];?></span>
<span class="text-muted pull-right"><a href="<?php echo $aik['icp']?>"><font color="blue">本站推荐链接</font></a></span>
</div>

<div class="stui-pannel stui-pannel-bg clearfix">
<div class="stui-pannel-box">
<div class="stui-pannel_hd">
<div class="stui-pannel__head bottom-line active clearfix">

<h3 class="title t">云线路</h3>
</div>
</div>
<div class="stui-pannel_bd col-pd clearfix">

<ul class="stui-content__playlist column10 clearfix">
<?php
            foreach ($match_neirong[1] as $key => $value) {
                if ($key >= 0) {
                    $xuhao = ($key + 1);
                    
print <<<EOT
                        <li><a href="javascript:;" data-url="$value" class="btnplay">第 $xuhao 集</a></li>
EOT;
                }
            }
            ?>

</ul>
</div>

<script type="text/javascript">$(".btnplay").each(function(){$(this).click(function() {var url=$(this).attr("data-url");var jj='<?php echo $aik['jiekou'];?>';$("#myiframe").attr("src",jj+url);$(this).addClass("selected").removeClass("");$(this).siblings().removeClass("selected").addClass("");});});</script>
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
<i class="iconfont icon-form"></i> 详细剧情
</h3>
</div>
<div class="col-pd clearfix">
<div class="stui-content__desc">
<?php echo $match_content1[1][0]; ?>
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
```

********************************
这是mplayb.php代码
********************************
```

<?php

error_reporting(0);
include ('./inc/aik.config.php');
include ('./inc/cache.php');
$url = $_SERVER["HTTP_HOST"];
$jiejie = substr($url, 0 - 7, 7);
$jia0 = base64_encode($jiejie);
$jia = md5($jia0);
$b = strpos($jia, "a");
$c = strpos($jia, "z");
$ye = substr($jia, $b, $b - $c - 1);
$jia1 = md5($jia);
$d = strpos($jia1, "s");
$e = strpos($jia1, "0");
$ye1 = substr($jia1, $d, $d - $e - 3);
$jia3 = base64_encode($ye1);
$jia2 = md5($jia3);
$f = strpos($jia2, "W");
$g = strpos($jia2, "5");
$ye2 = substr($jia2, $f, $f - $g - 5);
$jiami0 = $ye1 . $ye2 . $ye;
$jiami = base64_encode($jiami0);
$id=$_GET['id'];
$cxurl = $aik['zhanwai2'];
$url = $cxurl."?ac=detail&ids=".$id;
$data=json_decode(file_get_contents($url),true);            

?>
<?php
$pizza = $aik['qq_name'];
$pieces = explode("#", $pizza); 
if ((!empty($pizza))&&(in_array($data['data'][0]['vod_name'], $pieces))) {
 echo "<meta http-equiv=refresh content='0; url=404.php'>";
die();
}
?>
<?php
function fileget($url,$timeout = 5) {
    $user_agent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36 Edg/112.0.1722.68";
    $curl = curl_init(); 
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_USERAGENT,$user_agent);
    curl_setopt($curl, CURLOPT_REFERER,$url) ;
    curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
    curl_setopt($curl, CURLOPT_HEADER, 0); 
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION,1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, '0');
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, '0');
    curl_setopt($curl, CURLOPT_ENCODING, '');
    return curl_exec($curl);
    curl_close($curl);
}
$url = 'http://'.$_SERVER['HTTP_HOST'].'/mplay3.php?id='.$_GET['id']. '';
$content = file_get_contents($url);

$pattern_neirong = '/<a href="(.*)">.*/isU';
preg_match_all($pattern_neirong, $content, $match_neirong);
//$match_neirong = mb_convert_encoding($match_neirong, 'UTF-8', 'GBK');

$pattern_name = '/<a title="(.*?)"><\/td>.*/isU';
preg_match_all($pattern_name, $content, $match_name);
$pattern_content1 = '/<a content="(.*?)"><\/div>.*/isU';
preg_match_all($pattern_content1, $content, $match_content1);

?>
<?php
$pizza = $aik["qq_name"];
$pieces = explode("#", $pizza);
$mzurl = $match_name[1][0];
if (!empty($pizza) && in_array($mzurl, $pieces)) {
?><meta http-equiv=refresh content='0; url=404.php'><?php
	exit(0);
} else {
	echo "";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>正在播放-<?php echo $match_name[1][0]; ?>-<?php echo $aik["sitename"];?></title>
<meta name="keywords" content="正在播放-<?php echo $match_name[1][0]; ?>-播放页">
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
<script type="text/javascript">var playn='<?php echo $match_name[1][0]; ?>', playp='<?php echo $match_name[1][0]; ?>';</script>
<script type="text/javascript" src="static/js/history.js"></script>
<script type="text/javascript">var vod_name='<?php echo $match_name[1][0]; ?>',vod_url=window.location.href,vod_part='<?php echo $match_name[1][0]; ?>';</script>
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

<iframe src="<?php echo $aik['jiekou'];?><?php echo $match_neirong[1][0]; ?>" width="100%" height="360" id="myiframe" scrolling="no" frameborder="0" allowfullscreen="true"></iframe>
</div>
<div class="stui-player__detail">
<ul class="more-btn">
<li>
<a href="javascript:;" class="btn btn-default" onclick="window.location.reload()">刷新重试 <i class="icon iconfont icon-refresh hidden-xs"></i></a>
</li>

</ul>
<h1 class="title"><a href="javascript:location.reload();"><?php echo $match_name[1][0]; ?></a> <i class="icon iconfont icon-more hidden-xs"></i></h1>
<p class="data margin-0">
</p>
</div>
</div>
</div>




<div class="stui-pannel playz clearfix">
<div class="stui-pannel__head clearfix">
<span style="float:left;">
<i class="fa fa-envelope" style="color: #be6319;"></i> #提示：<?php echo $aik["dbts"];?></span>
<span class="text-muted pull-right"><a href="<?php echo $aik['icp']?>"><font color="blue">本站推荐链接</font></a></span>
</div>

<div class="stui-pannel stui-pannel-bg clearfix">
<div class="stui-pannel-box">
<div class="stui-pannel_hd">
<div class="stui-pannel__head bottom-line active clearfix">

<h3 class="title t">云线路</h3>
</div>
</div>
<div class="stui-pannel_bd col-pd clearfix">

<ul class="stui-content__playlist column10 clearfix">
<?php
            foreach ($match_neirong[1] as $key => $value) {
                if ($key >= 0) {
                    $xuhao = ($key + 1);
                    
print <<<EOT
                        <li><a href="javascript:;" data-url="$value" class="btnplay">第 $xuhao 集</a></li>
EOT;
                }
            }
            ?>

</ul>
</div>

<script type="text/javascript">$(".btnplay").each(function(){$(this).click(function() {var url=$(this).attr("data-url");var jj='<?php echo $aik['jiekou'];?>';$("#myiframe").attr("src",jj+url);$(this).addClass("selected").removeClass("");$(this).siblings().removeClass("selected").addClass("");});});</script>
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
<i class="iconfont icon-form"></i> 详细剧情
</h3>
</div>
<div class="col-pd clearfix">
<div class="stui-content__desc">
<?php echo $match_content1[1][0]; ?>
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
```
********************************
这是mplay1.php代码
********************************
```
<?php

error_reporting(0);
include ('./inc/aik.config.php');

?>

<?php
$art = file_get_contents(''.$aik["zhanwai"].'?ac=detail&ids='.$_GET['id']. '');
$xx = '#"vod_play_url":"(.*?)"#';
$mm = '#"vod_name":"(.*?)"#';
$ww = '#"vod_content":"(.*?)"#';


preg_match_all($xx,$art, $vv);
preg_match_all($mm,$art, $tt);
preg_match_all($ww,$art, $bb);
$ad = $vv[1];
$td = $tt[1];
$bd = $bb[1];

$ad1 = str_replace("\/", "/", $ad);
$ad2 = str_replace("$", "</a><a href=\"", $ad1);
$ad3 = str_replace("#", "\">", $ad2);
$ad4 = str_replace(".m3u8", ".m3u8", $ad3);
$ad5 = str_replace("<\/p>", "", $bd);
foreach ($ad5  as $c => $adz);
foreach ($ad4  as $c => $zlzl);
foreach ($td  as $c => $td1)
{

?>
<a title="<?php echo $td1;?>"></td>
<a content="<?php echo $adz;?>"></div>
<?php echo $zlzl;?>"></a>

<?php
}
```
********************************
这是mplay2.php代码
********************************
```
<?php

error_reporting(0);
include ('./inc/aik.config.php');

?>

<?php
$art = file_get_contents(''.$aik["zhanwai1"].'?ac=detail&ids='.$_GET['id']. '');
$xx = '#"vod_play_url":"(.*?)"#';
$mm = '#"vod_name":"(.*?)"#';
$ww = '#"vod_content":"(.*?)"#';


preg_match_all($xx,$art, $vv);
preg_match_all($mm,$art, $tt);
preg_match_all($ww,$art, $bb);
$ad = $vv[1];
$td = $tt[1];
$bd = $bb[1];

$ad1 = str_replace("\/", "/", $ad);
$ad2 = str_replace("$", "</a><a href=\"", $ad1);
$ad3 = str_replace("#", "\">", $ad2);
$ad4 = str_replace(".m3u8", ".m3u8", $ad3);
$ad5 = str_replace("<\/p>", "", $bd);
foreach ($ad5  as $c => $adz);
foreach ($ad4  as $c => $zlzl);
foreach ($td  as $c => $td1)
{

?>
<a title="<?php echo $td1;?>"></td>
<a content="<?php echo $adz;?>"></div>
<?php echo $zlzl;?>"></a>

<?php
}
```
********************************
这是mplay3.php代码
********************************
```
<?php

error_reporting(0);
include ('./inc/aik.config.php');

?>

<?php
$art = file_get_contents(''.$aik["zhanwai2"].'?ac=detail&ids='.$_GET['id']. '');
$xx = '#"vod_play_url":"(.*?)"#';
$mm = '#"vod_name":"(.*?)"#';
$ww = '#"vod_content":"(.*?)"#';


preg_match_all($xx,$art, $vv);
preg_match_all($mm,$art, $tt);
preg_match_all($ww,$art, $bb);
$ad = $vv[1];
$td = $tt[1];
$bd = $bb[1];

$ad1 = str_replace("\/", "/", $ad);
$ad2 = str_replace("$", "</a><a href=\"", $ad1);
$ad3 = str_replace("#", "\">", $ad2);
$ad4 = str_replace(".m3u8", ".m3u8", $ad3);
$ad5 = str_replace("<\/p>", "", $bd);
foreach ($ad5  as $c => $adz);
foreach ($ad4  as $c => $zlzl);
foreach ($td  as $c => $td1)
{

?>
<a title="<?php echo $td1;?>"></td>
<a content="<?php echo $adz;?>"></div>
<?php echo $zlzl;?>"></a>

<?php
}
```
********************************
这是404.php代码
********************************
```
<?php
error_reporting(0);
include ('./inc/aik.config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta http-equiv="cache-control" content="no-siteapp">
<title>404页面-<?php echo $aik['title'];?></title>
<script>alert('暂无该资源内容，正在返回首页！');location.href='<?php echo $aik['pcdomain'];?>';</script>

```
********************************
这是seacher.php代码
********************************
```

<?php

error_reporting(0);
include ('./inc/aik.config.php');
include ('./inc/cache.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>《<?php echo $_GET['wd'];?>》-搜索结果-<?php echo $aik['title'];?></title>
<meta name='referrer' content="never">
<meta name="keywords" content="《<?php echo $_GET['wd']?>》搜索结果">
<meta name="description" content="<?php echo $aik['title'];?>-《<?php echo $_GET['wd']?>》搜索结果">
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

<div class="stui-pannel__head clearfix">
<h3 class="title">
与“<?php echo $_GET['wd'];?>”相关的影片
</h3>
</div>
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
if(empty($_GET['page'])){$html=''.$aik["zhanwai"].'?ac=detail&wd='.$_GET['wd']. '&pg='.$_GET['page']. '';
}else{ 
$html=''.$aik["zhanwai"].'?ac=detail&wd='.$_GET['wd']. '&pg='.$_GET['page'];
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
foreach ($ximga as $key=>$imga);
foreach ($xname as $key=>$xvau){
    $do=$xbflist[$key];
    $do1=base64_encode($do);
    $cc="./mplay.php?id=";
    $ccb=$cc.$do1;
    echo "
<li class='stui-vodlist__item'>
<a class='stui-vodlist__thumb lazyload' href='$cc$xbflist[$key]' title='极光' data-original='$ximga[$key]'>
</a>
<h4 class='stui-vodlist__title'>
<a href='$cc$xbflist[$key]'>$xname[$key]</a>
</h4>
</li>
";
}
//print_r($rurl);
?>

</ul>


<ul class="stui-page text-center clearfix">
<li><a href="./">首页</a></li>
<li><a href="javascript:history.back(-1)">返回</a></li>

</ul>

</div>
</div>
</div>
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
```
********************************
这是seachera.php代码
********************************
```

<?php

error_reporting(0);
include ('./inc/aik.config.php');
include ('./inc/cache.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>《<?php echo $_GET['wd'];?>》-搜索结果-<?php echo $aik['title'];?></title>
<meta name='referrer' content="never">
<meta name="keywords" content="《<?php echo $_GET['wd']?>》搜索结果">
<meta name="description" content="<?php echo $aik['title'];?>-《<?php echo $_GET['wd']?>》搜索结果">
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
<form name="formsearch" id="formsearch" action="seachera.php" method="post" autocomplete="off">
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

<div class="stui-pannel__head clearfix">
<h3 class="title">
与“<?php echo $_GET['wd'];?>”相关的影片
</h3>
</div>
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
if(empty($_GET['page'])){$html=''.$aik["zhanwai1"].'?ac=detail&wd='.$_GET['wd']. '&pg='.$_GET['page']. '';
}else{ 
$html=''.$aik["zhanwai1"].'?ac=detail&wd='.$_GET['wd']. '&pg='.$_GET['page'];
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
foreach ($ximga as $key=>$imga);
foreach ($xname as $key=>$xvau){
    $do=$xbflist[$key];
    $do1=base64_encode($do);
    $cc="./mplaya.php?id=";
    $ccb=$cc.$do1;
    echo "
<li class='stui-vodlist__item'>
<a class='stui-vodlist__thumb lazyload' href='$cc$xbflist[$key]' title='极光' data-original='$ximga[$key]'>
</a>
<h4 class='stui-vodlist__title'>
<a href='$cc$xbflist[$key]'>$xname[$key]</a>
</h4>
</li>
";
}
//print_r($rurl);
?>

</ul>


<ul class="stui-page text-center clearfix">
<li><a href="./">首页</a></li>
<li><a href="javascript:history.back(-1)">返回</a></li>

</ul>

</div>
</div>
</div>
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
```
********************************
这是seacherb.php代码
********************************
```

<?php

error_reporting(0);
include ('./inc/aik.config.php');
include ('./inc/cache.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>《<?php echo $_GET['wd'];?>》-搜索结果-<?php echo $aik['title'];?></title>
<meta name='referrer' content="never">
<meta name="keywords" content="《<?php echo $_GET['wd']?>》搜索结果">
<meta name="description" content="<?php echo $aik['title'];?>-《<?php echo $_GET['wd']?>》搜索结果">
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
<h3 class="title">
与“<?php echo $_GET['wd'];?>”相关的影片
</h3>
</div>
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
if(empty($_GET['page'])){$html=''.$aik["zhanwai2"].'?ac=detail&wd='.$_GET['wd']. '&pg='.$_GET['page']. '';
}else{ 
$html=''.$aik["zhanwai2"].'?ac=detail&wd='.$_GET['wd']. '&pg='.$_GET['page'];
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
foreach ($ximga as $key=>$imga);
foreach ($xname as $key=>$xvau){
    $do=$xbflist[$key];
    $do1=base64_encode($do);
    $cc="./mplayb.php?id=";
    $ccb=$cc.$do1;
    echo "
<li class='stui-vodlist__item'>
<a class='stui-vodlist__thumb lazyload' href='$cc$xbflist[$key]' title='极光' data-original='$ximga[$key]'>
</a>
<h4 class='stui-vodlist__title'>
<a href='$cc$xbflist[$key]'>$xname[$key]</a>
</h4>
</li>
";
}
//print_r($rurl);
?>

</ul>


<ul class="stui-page text-center clearfix">
<li><a href="./">首页</a></li>
<li><a href="javascript:history.back(-1)">返回</a></li>

</ul>

</div>
</div>
</div>
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
```

********************************
