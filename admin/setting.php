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
      <span class="gray tips">如：智云影院</span></td>
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
