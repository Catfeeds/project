<?php
	// exit("not zhixing;you need shangchuan this file");
	if(empty($_GET['status']))exit('stop');
	$path    = '/www/wdlinux/apache_php-5.5.9/bin/php ';
	$files   = $cmd = array();
	$files[] = '/home/wwwroot/cams_cshcc/public_html/weixin/Workerman/index.php '.urldecode($_GET['status']);//正式服cams微信定时器
	$files[] = '/home/wwwroot/zgrz_zbzytech_com/public_html/weixin/Workerman/index.php '.urldecode($_GET['status']);//正式服中规微信定时器
	$files[] = '/home/wwwroot/eims_zbzy/public_html/api/extend/GateWay/vendor/linux/start.php '.urldecode($_GET['status']);//正式服中规微信定时器
	foreach($files as $file)
	{
		exec($path.$file,$cmd[$path.$file]);
	}
	echo '<pre />';
	print_r($cmd);exit;