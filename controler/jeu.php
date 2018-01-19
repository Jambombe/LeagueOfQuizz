<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<link rel="stylesheet" href="../assets/css/style.css" media="all">
	<link rel="shortcut icon" type="image/x-icon" href="#" />
	<!-- <script type="text/javascript" src="../assets/js/questions.js"></script> -->

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

			$DATA['penalites'] = 0;

			require_once("../assets/js/questions.php");

		?>

		<div class="center">

			<script type="text/javascript" src="../assets/js/chrono.js"></script>

			<div id="chrono"></div> <!-- Chronomètre affiché ici -->

			<button onclick="afficherQuestion()">OUI</button>

			<div id="test"></div>

		</div>

		<?php

			$DATA['numQuestion'] = 1;
			$DATA['numNextQuestion'] = 1;

			include_once("../view/afficher_question.view.php");

			// while ($DATA['numQuestion'] <=10 ){
			// 	if ($DATA['numQuestion'] == $DATA['numNextQuestion']){
			// 		include_once("../view/afficher_question.view.php");
			// 	} else {
			// 		$DATA['numQuestion']++;
			// 	}
			// }

		?>



	</div>


</body>
</html>

