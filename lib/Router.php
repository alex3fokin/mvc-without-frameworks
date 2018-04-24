<?php

class Router {

    static public function load() {
	$url = $_SERVER['REQUEST_URI'];
	$urlComponents = explode('/', $url);
	$sectionName = $urlComponents[1];
	$className = ucfirst($sectionName);
	if (!class_exists($className)) {
	    $className = 'news';
	}
	$sectionObj = new $className();
	$actionName = $urlComponents[2];
	if (empty($actionName)) {
	    $actionName = 'index';
	} else if(is_numeric($actionName)) {
	    $data = $actionName;
	    $actionName = 'showItem';
	}
	$actionMethodName = 'action_'.$actionName;
	if(!method_exists($sectionObj, $actionMethodName)) {
	    self::notFound();
	}
	if($urlComponents[3]) {
	    $data = $urlComponents[3];
	    if(!is_numeric($data)) {
		self::notFound();
	    }
	}
	$sectionObj->$actionMethodName($data);//$id только для метода action_showItem
    }

    static public function notFound() {
	header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found', true, 404);
	include_once 'error404.php';
	exit();
    }
    
    static public function redirect($path) {
	header("Location: ".$path);
    }
}
