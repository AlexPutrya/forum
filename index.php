<?php
spl_autoload_register(function($class_name){
	include_once "Classes/" . $class_name . ".php";
});
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
$module = 'index';
$action = 'index';

$params = array();

if ($_SERVER['REQUEST_URI'] !='/') {
 	$url_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
 	$uri_parts = explode("/", trim($url_path, '/'));

 if(count($uri_parts) % 2){
 	echo "Ошибка адреса";
 }

 $module = array_shift($uri_parts);
 $action = array_shift($uri_parts);

 for($i=0; $i < count($uri_parts); $i++){
 	$params[$uri_parts[$i]] = $uri_parts[++$i];
 }
}
$user = new $module();

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<a href="http://localhost9/User/getName">Выполнить</a><br>
	<?php
	echo "Модуль -". $module . "<br> Метод" . $action; 
	echo $user->$action();
	?>
</body>
</html>