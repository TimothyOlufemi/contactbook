<?php
 require 'default.php';
 define('DS', DIRECTORY_SEPARATOR);
 define('ROOT', dirname(__FILE__));
 $url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : [];

 // load up config functions
 require_once(ROOT . DS . 'config' . DS . 'config.php');
 require_once(ROOT . DS . 'app' . DS . 'Router.php');


 // Route the request
 Router::route($url);