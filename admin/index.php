<?php 
include('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>极光影视CMS管理后台</title>
<meta name="keywords" content="北极光开发-开源CMS" />
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
    <td colspan="2" align="center">欢迎使用极光影院CMS管理系统！</td>
    </tr>
  <tr>
    <td align="right">当前使用版：</td>
    <td><span>V3.0</span></td>
  </tr>
  <tr>
    <td align="right">程序开发文档：</td>
    <td><a href="https://zhiyun66.github.io/cms/index.html" target="_blank"><font color="#FF0000">点击查看</font></a></td>
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
    <td colspan="2" style="line-height:220%; text-indent:28px;">欢迎使用本程序，网站全自动更新采集数据并缓存，可设置其他资源网采集链接，采集数据通用为苹果CMS接口（通用的josn数据接口），标签列表绑定请查看说明文档<font color="red">源码程序更新以及开发文档，具体详细信息请到官方开发文档查看</br>开发QQ1：2328167917，开发QQ2：2328167917；））</font></a>，感谢朋友们的支持！</br>QQ交流群号；000000</br>更多使用帮助及BUG反馈请移步：</br><a href="https://xiaoniyun.github.io/cms/index.html" target="_blank">点此进入查看开发文档Github</a>
</br>
<a href="https://github.com/xiaoniyun" target="_blank">点击进入Gitee开发文档</a>    
    </font></br></br>
</td>
    </tr>
   
</table>

   </div>

</div>
<?php include('foot.php'); ?>
</body>
</html>
