<?php

	// session_start();
	$_SESSION['difficulty'] = $_POST['difficulty'];
	$_SESSION['pseudo'] = $_POST['pseudo'];

	var_dump($_SESSION);

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- <META HTTP-EQUIV="Content-Type" CONTENT="text/html;charset=utf-8" -->

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

			$DATA['questions'] = new questions($DATA['difficulty']);
			$_POST['difficulty'] = $DATA['difficulty'];

		?>

		<div class="fixed-top">

			<div class="center">

				<script type="text/javascript" src="../assets/js/chrono.js"></script>

				<div id="chrono"></div> <!-- Chronomètre affiché ici -->

			</div>
		</div>

		<?php

			$DATA['numQuestion'] = 1;

			include_once("../view/afficher_question.view.php");

			// mysql_close();

		?>



	</div>


</body>
</html>

