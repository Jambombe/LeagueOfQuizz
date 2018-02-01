<?php

	require_once("reponse.class.php");
	require_once("DAO.class.php");

	class question{

		private $id;
		private $_ennonce;
		private $_urlImage;
		private $_reponses; // Array contenant toutes les reponses proposées pour la question


		function __construct($id, $ennonce, $urlImage, $difficulty){ // $id sert à charger les reponses de la question n° $id
			$this->id = $id;
			$this->_ennonce = $ennonce;
			$this->_urlImage = $urlImage;

			$this->_reponses = $this->loadReponses($id, $difficulty);
		}

		function id() { return $this->id; }
		function ennonce() { return $this->_ennonce; }
		function urlImage() { return $this->_urlImage; }
		function reponses() { return $this->_reponses; }


		// Charge les reponses depuis la bd selon l'$id de la question
		function loadReponses($id, $difficulty){

			$dao = new DAO(0);
			$db = $dao->db();

			switch ($difficulty) {
				case 'EASY':
					$cmd = "Select * from reponses_questions_simples where id=$id";
					break;
				
				case 'MEDIUM':
					$cmd = "Select * from reponses_questions_moyennes where id=$id";
					break;				

				case 'HARD':
					$cmd = "Select * from reponses_questions_difficiles where id=$id";
					break;
				
				default:
					die("Difficulté inconnue - Impossible de charger les réponses");
					break;
			}


			$cmd = "Select * from reponses_questions_simples where id=$id";

			$res = $db->query($cmd);
			$rep = $res->fetchAll();

			$tab = array();
			$nb = 1;
			foreach ($rep as $r) {

				$tab[$nb] = new reponse($r[1], $r[2]);
				$nb++;
				
			}

			// ERREUR : Le chrono ne se lance pas ..?
			// shuffle($tab);

			return $tab;

		}

	}














?>