<?php

	require_once("../model/DAO.class.php");
	require_once("../model/question.class.php");

	$dao = new DAO();
	$db = $dao->db();


	$cmd = "select * from questions_simples where id=1";
	$res = $db->query($cmd);
	$donnees = $res->fetchAll();

	$question[1] = new question($donnees[0][1], $donnees[0][2], $donnees[0][0]);

	var_dump($question[1]);

?>