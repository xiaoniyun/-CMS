// 开源代码弃坑。当前仅支持JSON接口，如需xml版自行二开开发文档📄提供JSON和XML两种数据格式API开发示列。不可用作非法运营，二开程序与本人无关/
//此程序【极光CMS】苹果CMS10-JSON数据格式源 (免费版），北极光 QQ：2328167917
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