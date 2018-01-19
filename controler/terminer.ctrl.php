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
		<div class="center">
			<h1>League Of Quizz</h1>



				<?php

					$nbReponsesCorrectes = calculerPoints(); // Nombres de reponses correctes (sachant que pas de reponse = 0)
					$penalites = (10 - $nbReponsesCorrectes) *15; // penalités = nbMauvaiseReponses *

					$min = intval(substr($_POST['time'], 0, 2));
					$sec = intval(substr($_POST['time'], 3, 2));
					$msec = intval(substr($_POST['time'], 6, 3));

					$sec = $sec + $penalites;

					// Si les secondes sont > à 60, on rajoute 1 min et on suppr 60s
					while ($sec >= 60){
						$min++;
						$sec = $sec - 60;
					}

					// Rajout du 0 devant si necessaire
					if ($sec < 10){
						$sec = "0" . $sec;
					}

					if ($min < 10){
						$min = "0" . $min;
					}
					// ------

					$temps = $min . ":" . $sec . ":" . $msec;

					echo "Nombre de réponses correctes : $nbReponsesCorrectes /10<br/>";
					echo "Pénalités : " . $penalites . " secondes <br/>";
					echo "Score : " . $nbReponsesCorrectes*100 . "<br/>";

					echo "Temps : " . $temps . "<br/>";



					// Calcul des points
					function calculerPoints(){

						$pts = 0;
						foreach ($_POST as $key => $value) {
							if ($key != "end"){
								$pts += intval($value);
							}
						}
						return $pts;
					}


				?>
			
		
		</div>
	</div>


</body>
</html>

