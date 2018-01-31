<? session_start(); ?>

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

						require_once("../model/DAO.class.php");

						$pseudo = $_GET['pseudo'];
						$difficulty = $_POST['difficulty'];

						$nbReponsesCorrectes = calculerPoints(); // Nombres de reponses correctes (sachant que pas de reponse = 0)
						$penalites = (10 - $nbReponsesCorrectes) *15; // penalités = nbMauvaiseReponses *

						$min = intval(substr($_POST['time'], 0, 2));
						$sec = intval(substr($_POST['time'], 3, 2));
						$msec = intval(substr($_POST['time'], 6, 3));

						echo "Temps : " . $min . ":" . $sec . ":" . $msec . "<br/><br/>";

						$sec = $sec + $penalites;

						// Si les secondes sont >= à 60, on rajoute 1 min et on suppr 60s
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
						// echo "Score : " . $nbReponsesCorrectes*100 . "<br/>";
						echo "<strong>Temps Final : $temps</strong>";

						echo "<br/> <br/> <hr>";

						// Si le score n'est pas présent dans la table, on l'ajoute
						if (! isInTable($pseudo, $temps, $difficulty)){

							ajouterScoreClassement($pseudo, $temps, $difficulty);
						}

						echo " <br />";

						include_once("../view/afficher_scoreboard.view.php");

						echo "<br/> <hr><br/>";

						echo "<div class=\"center\">";
						echo "<a href=\"index.php\">Rejouer</a>";
						echo "</div>";



					function isInTable($pseudo, $temps, $difficulty){

						$daoSelect = new DAO(0);
						$dbSelect = $daoSelect->db();

						switch ($difficulty) {
							case 'EASY':
								$cmd = "SELECT * from classement_questions_simples WHERE pseudo=\"$pseudo\" AND temps = \"$temps\"";
								break;

							case 'MEDIUM':
								$cmd = "SELECT * from classement_questions_moyennes WHERE pseudo=\"$pseudo\" AND temps = \"$temps\"";
								break;

							case 'HARD':
								$cmd = "SELECT * from classement_questions_difficiles WHERE pseudo=\"$pseudo\" AND temps = \"$temps\"";
								break;
							
							default:
								die("Difficulté inconnue - impossible d'ajouter le score");
								break;
						}

						// Si le tuple existe, la fonction réussie et retourne TRUE sinon FALSE (ce qui signifie que le score n'existe pas)
						$res = $dbSelect->query($cmd);
						$res = $res->fetchAll();

						return $res;

					}


					function ajouterScoreClassement($pseudo, $temps, $difficulty){

						switch ($difficulty) {
							case 'EASY':
								$cmd = "INSERT INTO classement_questions_simples(pseudo, temps) VALUES (\"$pseudo\", \"$temps\")";
								break;

							case 'MEDIUM':
								$cmd = "INSERT INTO classement_questions_moyennes(pseudo, temps) VALUES (\"$pseudo\", \"$temps\")";
								break;

							case 'HARD':
								$cmd = "INSERT INTO classement_questions_difficiles(pseudo, temps) VALUES (\"$pseudo\", \"$temps\")";
								break;
							
							default:
								die("Difficulté inconnue - impossible d'ajouter le score");
								break;
						}

						// INSERTION SCORE
						$dao = new DAO(1);
						$db = $dao->db();

						$res = $db->query($cmd);

						// if ($res) {
						// 	echo "insertion OK";
						// } else {
						// 	echo "Insertion failed";
						// }

					}


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

