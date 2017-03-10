<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php
			//include "myndir.json";
		?>
		<form action="index.php" method="POST">
			Title: <input type="text" name="title"><br>
			URL: <input type="text" name="URL"><br>
			<input type="submit" name="submit" value="submit">
		</form>
		<?php
			if(isset($_POST['submit'])) {

				$movies = "movies";
				$title = $_POST['title'];
				$URL = $_POST['URL'];
				$json_count = 0;

				$file = "myndir.json";

				$json = json_decode(file_get_contents($file),TRUE); //decoder
				echo '<pre>';
				print_r($json);
				echo '</pre>';

				$json_count = count($json); //counts the array

				$json["$json_count"] = array("title" => $title, "URL" => $URL);

				file_put_contents($file, json_encode($json, JSON_FORCE_OBJECT));
			}
		?>
	</body>
</html>