<?php 

function M($names){
	$names = $names.'Model';
	$module = gv('m','home');
	static $models;
	if (!isset($models[$module.'/'.$names]) || !is_object($models[$module.'/'.$names])){
		include "./".$module."/model/$names.class.php";
		$a = new $names();
		$models[$module.'/'.$names]=$a;
	}
		return $models[$module.'/'.$names];
	
}
function redirect($url){
	header("location:$url");
}

function run(){
	$module 	= gv('m', 'home');
	$controller	= gv('c', 'Index');
	$action		= gv('a', 'index');
	$controller = ucfirst($controller) . 'Controller';
	include "./".$module."/controller/".$controller.".class.php";
	$demo = new $controller;
	$demo ->$action();
}

function gv($name, $default=''){
	return isset($_GET[$name]) ? $_GET[$name] : $default;
}

function loadConfig($file='default', $param = ''){
	static $configs;
	if (!isset($configs[$file]) || !is_array($configs[$file]) || empty($configs[$file])){
		$cofi = include $file.".config.inc";
		$configs[$file] = $cofi;
	}
	if ($param) {
		return $configs[$file][$param];
	} else {
		return $configs[$file];
	}
}