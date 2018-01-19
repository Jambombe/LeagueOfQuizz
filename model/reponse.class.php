<?php

	class reponse{

		private $ennonce;
		private $reponseCorrecte;


		function __construct($ennonce, $reponseCorrecte){
			$this->ennonce = $ennonce;
			$this->reponseCorrecte = $reponseCorrecte;
		}

		function ennonce() { return $this->ennonce; }
		function reponseCorrecte() { return $this->reponseCorrecte; }





	}

?>