<?php
/**
 * 单一入口文件
 */
// phpinfo();exit;
// echo gethostbyname('www.baidu.com');exit;
// ini_set("display_errors", "On");
// error_reporting(E_ALL | E_STRICT);
define('ROOT', dirname(__FILE__)); //系统根目录
define('CONF', ROOT . '/data/'); //配置目录
define('DEBUG',0); //是否开启调试模式 
/** 接口常量 **/
define('API_URL','http://cams.cshcc.cn/weixin/api/index.php/Home/'); //接口地址
// define('API_URL','http://ceshi.cshcc.cn/cams_ceshi/weixin/api/index.php/Home/'); //接口地址
define('SECRET_BROWSER'  , 'ksdhbfiuyh98182y379812hi9');//浏览器设备混淆码
define("SECRET_PASSWORD" , 'f983r2ewioeoiwaeefadsafew');//密码混淆码
define("SANDC_KEY"       , 'userinfo');//session和cookie的key
$arrHeader = array
			(
				 'Userid'        => 0       //当前用户ID
				,'Requesttime'   => null    //请求时间
				,'Logintime'     => null    //最后登录时间
				,'Clientversion' => 1.0     //版本号
				,'Devicetype'    => 1       //类型 1:浏览器设备 2:PC 3:安卓 4:iOS 5:其他 默认浏览器设备
				,'Checkcode'     => null    //用户和登陆时间组成加密字符
			);
/** 接口常量 **/
$arrOptions = array(
				 'appid'          => 'wx767442a77474c183'
				,'appsecret'      => '89250f4d7afaa84fd0cd030f08589146'
				,'encodingaeskey' => 'Ph2KYWNqmUP5lEk8jVfGCm3W4H4idqHqi9fkUWEMJka'
				,'token'          => 'cshcc'
				,'debug'          => '1'
		);
require_once ROOT . '/data/arr_config.php'; //框架引导文件
require_once ROOT . '/framework/Api.class.php';//接口文件
require_once ROOT . '/framework/core.php'; //框架引导文件