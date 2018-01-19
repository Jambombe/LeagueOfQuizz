<?php 

	/**
	* Génère $nbTirages tirages aléatoires, comprit entre 1 et $max
	*
	* @pre $max > $nbTirages
	* @return un tableau avec les $nbTirages tirages aléatoires
	*/
	 function nbAleatoires($max, $nbTirages){
		 
		$i = 0;
		$tableau = array();
		while ($i<$nbTirages){

			// tirage d'un nombre aleatoire entre 1 et $max
		    $nb = rand(1, $max);
		    
		    // Si le nombre n'est pas présent, on l'ajoute au tableau
		    if (! in_array($nb, $tableau)) {
		        $tableau[$nb] = $nb;       
		            $i++;
		    }
		}
		 
		// echo '<pre>';
		// print_r($tableau);
		// echo '</pre>';

		// foreach ($tableau as $nb) {
		// 	echo "$nb - ";
		// }

		return $tableau;
		 
	}

 ?>