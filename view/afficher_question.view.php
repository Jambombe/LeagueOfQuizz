<?php

	$numQuestion = $DATA['numQuestion'];

	$questions = $DATA['questions']->questions();

	// foreach ($questions as $q) {
	// 	var_dump($q);
	// }

	$difficulty = $DATA["difficulty"];

	echo "<div class=\"center\">";

		echo "<form action=\"../controler/terminer.ctrl.php?pseudo={$DATA['pseudo']}\" method=\"POST\">";

			for ($i=1; $i <=10 ; $i++) { 
				afficherQuestion($i);
			}

			// Champ utilisé pour recuperer le temps
			echo "<input type=\"radio\" name=\"time\" id=\"time\" value=\"e\" checked=\"checked\">";

			// Champ utilisé pour recuperer la difficulté
			echo "<input type=\"radio\" name=\"difficulty\" id=\"time\" value=\"$difficulty\" checked=\"checked\">";

			echo "<input type=\"submit\" name=\"end\" id=\"valider\" value=\"Terminer\" onclick=\"stopChrono\">";

		echo "</form>";
		
	echo "</div>";


	function afficherQuestion($numQuestion){

		global $questions; // $questions a une portee globale, c'est à dire que c'est la même que ligne 5
		$question = $questions[$numQuestion];

		$ennonce = $question->ennonce();
		$image = $question->urlImage();
		$reponses = $question->reponses();

		echo "<div class=\"question\" id=\"question{$numQuestion}\">";

			echo "<h3>$ennonce</h3>";
			echo "<img src=\"../assets/img/$image\">";

			echo "<div class=\"center\">";
				echo "<table>";

					// LIGNE 1
					echo "<tr>";
						echo "<td>";
							echo "<input type=\"radio\" name=\"q$numQuestion\" id=\"$numQuestion\" value=\"{$reponses[1]->reponseCorrecte()}\">";
							echo "<label for=\"$numQuestion\" class=\"reponses\">{$reponses[1]->ennonce()}</label>";
						echo "</td>";
						echo "<td>";
							echo "<input type=\"radio\" name=\"q$numQuestion\" id=\"$numQuestion+1\" value=\"{$reponses[2]->reponseCorrecte()}\">";
							echo "<label for=\"$numQuestion+1\" class=\"reponses\">{$reponses[2]->ennonce()}</label>";
						echo "</td>";
					echo "</tr>";

					// LIGNE 2
					echo "<tr>";
						echo "<td>";
							echo "<input type=\"radio\" name=\"q$numQuestion\" id=\"$numQuestion+2\" value=\"{$reponses[3]->reponseCorrecte()}\">";
							echo "<label for=\"$numQuestion+2\" class=\"reponses\">{$reponses[3]->ennonce()}</label>";
						echo "</td>";
						echo "<td>";
							echo "<input type=\"radio\" name=\"q$numQuestion\" id=\"$numQuestion+3\" value=\"{$reponses[4]->reponseCorrecte()}\">";
							echo "<label for=\"$numQuestion+3\" class=\"reponses\">{$reponses[4]->ennonce()}</label>";
						echo "</td>";
					echo "</tr>";

				echo "</table>";
			echo "</div>";

		echo "</div>";

		echo "<hr>";


	}


?>