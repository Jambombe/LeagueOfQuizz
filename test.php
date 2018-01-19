<?php

	try{
		$bdd = new PDO('mysql:host=localhost;dbname=league_of_quizz;charset=utf8', 'root', '2070298');
	} catch (Exception $e){
	        die('Erreur : ' . $e->getMessage());
	}

	$resultat = $bdd->query('select * from questions_faciles');

	$donnees = $resultat->fetch();

	echo "Question : $donnees[1] <br />";

	for ($i=0; $i < 4; $i++) { 
		echo "Réponse $i : $donnees[$i] <br />";
	}

	foreach ($donnees as $key => $value) {
		echo "$key : $value <br />";
	}

?>