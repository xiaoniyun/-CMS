<?php
// 开源代码弃坑。当前仅支持JSON接口，如需xml版自行二开开发文档📄提供JSON和XML两种数据格式API开发示列。不可用作非法运营，二开程序与本人无关/
//此程序【极光CMS】苹果CMS10-JSON数据格式源 (免费版），北极光 QQ：2328167917 

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