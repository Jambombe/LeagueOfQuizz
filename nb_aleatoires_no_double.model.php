<?php 

	 function nbAleatoires($max, $nbTirages){
		 
		$i=0;
		$tableau = array();
		while ($i<$nbTirages){

			// tirage d'un nb aleatoire entre 1 et $max
		    $image = rand(1, $max);
		    
		    // Si le nombre n'est pas présent, on l'ajoute au tableau
		    if (! in_array($image, $tableau)) {
		        $tableau[] = $image;       
		            $i++;
		    }
		}
		 
		echo '<pre>';
		print_r($tableau);
		echo '</pre>';

		foreach ($tableau as $nb) {
			echo "$nb - ";
		}
		 
	}

	nbAleatoires(100,10);

 ?>