<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

// spl_autoload_register(function ($class_name) {
//     include 'classes/'.$class_name . '.php';
// });


?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body class="Site">
		<?php  
			include 'loader.php';

		    $site = new csite();

		    // this is a function specific to this site!
		    initialise_site($site);

		    $page = new cpage("Welcome to my site!");
		    $site->setPage($page);

		    // $content = <<<EOT Welcome to my personal web site! EOT;
		    $content = "<p>This is a site made with classes</p>";
		    $page->setContent($content);

		    $site->render();
		?>	
	</body>
</html>
