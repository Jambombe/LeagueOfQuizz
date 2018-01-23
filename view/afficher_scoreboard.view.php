<?php

	require_once("../model/DAO.class.php");

	$dao = new DAO(0);
	$db = $dao->db();


	switch ($difficulty) {
		case 'EASY':
			$title = "Difficulté FACILE";
			$cmd = "Select pseudo, temps From classement_questions_simples ORDER BY temps LIMIT 10";
			break;

		case 'MEDIUM':
			$title = "Difficulté MOYENNE";
			$cmd = "Select pseudo, temps From classement_questions_simples ORDER BY temps LIMIT 10";
			break;

		case 'HARD':
			$title = "Difficulté DIFFICILE";
			$cmd = "Select pseudo, temps From classement_questions_simples ORDER BY temps LIMIT 10";
			break;
		
		default:
			die("Difficulté inconnue - Impossible d'afficher les scores");
			break;
	}



	$res = $db->query($cmd);

	$scores = $res->fetchAll();

	$place = 1;

	echo "<div class=\"center\">";

		echo "<table class=\"scoreboard\">";
			echo "<tr><th id=\"col1\"></th><th id=\"col2\">$title</th><th id=\"col3\"></th></tr>";

			foreach ($scores as $score) {
				echo "<tr id=\"p$place\">";
					echo "<td>$place</td>";
					echo "<td>$score[0]</td>";
					echo "<td>$score[1]</td>";
				echo "</tr>";

				$place++;
			}


		echo "</table>";

	echo "</div>";



?>