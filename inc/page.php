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