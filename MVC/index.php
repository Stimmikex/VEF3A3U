<?php
	// function __autoload($cont) {
	//     $filename = $cont . ".php";

	//     if(file_exists($filename))
	//     {
	//         include_once($filename);
	//     }
	// }

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	include('cont/controller.php');
	$controller = new Controller();
	$controller->handle();
?>