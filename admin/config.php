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