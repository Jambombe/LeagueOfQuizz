<?php

	include_once("model/nb_aleatoires_no_double.model.php");

	// var_dump(nbAleatoires(100,10));

	try{
		$bdd = new PDO('mysql:host=localhost;dbname=league_of_quizz;charset=utf8', 'root', '');
	} catch (Exception $e){
	        die('Erreur : ' . $e->getMessage());
	}

	// Comptage du nombre de questions dans notre table
	$nbQuestions = ($bdd->query('select count(*) from questions_simples'));
	$nbQuestions = $nbQuestions->fetch();
	var_dump($nbQuestions);

	// On recupere les id des questions
	$idQuestions = nbAleatoires($nbQuestions[0], 2);
	var_dump($idQuestions);

	foreach ($idQuestions as $id) {
		// echo "$id - ";
		// echo "$idQuestions[$id] <br />";

		$cmd = "select * from questions_simples where id=$idQuestions[$id]";
		$res = $bdd->query($cmd);
		$donnees = $res->fetchAll();

		$cmd = "select * From reponses_questions_simples where id=$idQuestions[$id]";
		$res = $bdd->query($cmd);
		$reponses = $res->fetchAll();

		echo "<b>{$donnees[0][1]}</b>";

		foreach ($reponses as $rep) {
			echo "$rep[1]  ";
		}
	}

	// echo "Question : $donnees[1] <br />";

	// for ($i=0; $i < 4; $i++) { 
	// 	echo "Réponse $i : $donnees[$i] <br />";
	// }

	// foreach ($donnees as $key => $value) {
	// 	echo "$key : $value <br />";
	// }

?>