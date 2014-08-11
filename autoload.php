<?php
// Author: zbqyexingknog
// Creat Date: 2014.8
// Email: zbqyexingkong@163.com
// Github:https://github.com/zbqyxingkong

#自动实例化需要使用的类,其他每个.php文件都应include此文件
function __autoload($class_path) {
	$classname = "/home/web/www/match/".$class_path.".class.php";
	if (file_exists($classname)) {
		include_once ($classname);
	} else {
		echo "<script >alert($classname.'不存在!');</script>\n";
	}
}
