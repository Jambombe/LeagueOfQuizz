<?php

	$numQuestion = $DATA['numQuestion'];

	$questions = $DATA['questions']->questions();
	$question = $questions[$numQuestion];

	$ennonce = $question->ennonce();
	$image = $question->urlImage();
	$reponses = $question->reponses();

	// var_dump($question);

	echo "<div class=\"center\">";
		echo "<div class=\"question\" id=\"question{$numQuestion}\">";

			echo "<h3>$ennonce</h3>";
			echo "<img src=\"../assets/img/$image\">";

			echo "<div class=\"center\">";
				echo "<table>";

					// LIGNE 1
					echo "<tr>";
						echo "<td>";
							echo "<a href=\"../view/afficher_question.view.php\">{$reponses[1]->ennonce()}</a>";
						echo "</td>";
						echo "<td>";
							echo "<a href=\"\">{$reponses[2]->ennonce()}</a>";
						echo "</td>";
					echo "</tr>";

					// LIGNE 2
					echo "<tr>";
						echo "<td>";
							echo "<a href=\"\">{$reponses[3]->ennonce()}</a>";
						echo "</td>";
						echo "<td>";
							echo "<a href=\"\">{$reponses[4]->ennonce()}</a>";
						echo "</td>";
					echo "</tr>";

				echo "</table>";
			echo "</div>";

		echo "</div>";
	echo "</div>";

	$DATA['numQuestion']++;

	if ($DATA['numQuestion'] <= 2){
		include("afficher_question.view.php");
	}



?>