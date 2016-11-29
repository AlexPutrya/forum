<?php
spl_autoload_register($class_name){
	include_once 'classes/' . $class_name . '.php';
}
?>