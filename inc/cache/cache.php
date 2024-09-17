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
