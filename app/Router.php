<?php
 class Router {
 	
 	public static function route($url) {
 			
 		// controller 
 		$controller = (isset($url[0]) && $url[0] != '') ? ucwords($url[0]) : DEFAULT_CONTROLLER;
 		$controller_name = $controller; 
 		array_shift($url);

 		//action
 		$action = (isset($url[0]) && $url[0] != '') ? $url[0] . 'Action' : 'indexAction';
 		$action_name = $controller; 
 		array_shift($url);

 		if (!class_exists($controller_name)) {
 			include '404.php';
 			exit();
 		}
 		else{
 			
 		// parameters
 		$queryParams = $url;

 		$dispatch = new $controller($controller_name, $action);

 		if (method_exists($controller, $action)) {
 			call_user_func_array([$dispatch, $action], $queryParams);
 		}else{
 			include '404.php';
 			exit();
 			// die('That Method does not exist in the controller \"' . $controller_name . '\"');
 		}
 		}
 	}
}

class Index {
	public function indexAction(){
		require 'model/DB.php';
		require 'controllers/index-controller.php';
		require 'view/indexView.php';	
	}
}


class EditContact{
	public function indexAction(){
		require 'model/DB.php';
		require 'controllers/edituser-controller.php';
		require 'view/edituserView.php';
	}

}

class NewContact{
	public function indexAction(){
		require 'model/DB.php';
		require 'controllers/newcontact-controller.php';
		require 'view/newcontactView.php';	
	}
}

class Contactgroups{
	public function indexAction(){
		require 'model/DB.php';
		require 'controllers/IndexGroup-controller.php';
		require 'view/IndexGroupView.php';	
	}
	public function configureAction(){
		require 'model/DB.php';
		require 'controllers/ConfigureGroup-controller.php';
		require 'view/ConfigureGroupView.php';	
	}
}