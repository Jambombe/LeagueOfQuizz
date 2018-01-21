<?php

	require_once("question.class.php");
	require_once("nb_aleatoires_no_double.class.php");

	class questions{

		private $_questions;

		function __construct($difficulty){

			$this->_questions = $this->loadQuestions($difficulty);

		}

		function questions() { return $this->_questions; }

		function loadQuestions($difficulty){

			$dao = new DAO(0);
			$db = $dao->db();

			switch ($difficulty) {
				case 'EASY':
					$cmd = "Select count(*) from questions_simples";
					break;

				case 'MEDIUM':
					$cmd = "Select count(*) from questions_moyennes";
					break;

				case 'HARD':
					$cmd = "Select count(*) from questions_difficiles";
					break;
				
				default:
					die("ERREUR difficulty");
					break;
			}

			$res = $db->query($cmd);
			$nbTotalQuestions = $res->fetchAll();
			$nbTotalQuestions = intval($nbTotalQuestions[0][0]);

			$nbAleatoires = nbAleatoires($nbTotalQuestions , 10);

			$tab = array();
			$nb = 1;
			foreach ($nbAleatoires as $id) {

				switch ($difficulty) {
					case 'EASY':
						$cmd = "Select * from questions_simples where id=$id";
						break;

					case 'MEDIUM':
						$cmd = "Select * from questions_moyennes where id=$id";
						break;

					case 'HARD':
						$cmd = "Select * from questions_difficiles where id=$id";
						break;
					
					default:
						die("ERREUR difficulty");
						break;
				}

				$res = $db->query($cmd);
				$question = $res->fetchAll();

				$tab[$nb] = new question($question[0][0], $question[0][1], $question[0][2]);
				$nb++;

			}

			return $tab;

		}



	}




?>