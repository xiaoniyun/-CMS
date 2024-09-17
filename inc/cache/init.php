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