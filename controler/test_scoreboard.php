<?php

	require_once("../model/DAO.class.php");

	$dao = new DAO(0);
	$db = $dao->db();

	$cmd = "Select pseudo, temps From classement_questions_simples ORDER BY temps";

	$res = $db->query($cmd);

	$scores = $res->fetchAll();

	var_dump($scores);



?>