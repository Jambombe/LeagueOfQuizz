<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<link rel="stylesheet" href="../assets/css/style.css" media="all">
	<link rel="shortcut icon" type="image/x-icon" href="#" />

	<title>League Of Quizz</title>
</head>
<body>

	<div id="wrapper">
		<h1>League Of Quizz</h1>

		
		<?php

		require_once("../model/questions.class.php");

			$DATA['difficulty'] = $_POST['difficulty'];
			$DATA['pseudo'] = $_POST['pseudo'];

			include_once("lancement.ctrl.php");

			$DATA['questions'] = new questions($DATA['difficulty']);

		?>

	</div>


</body>
</html>

