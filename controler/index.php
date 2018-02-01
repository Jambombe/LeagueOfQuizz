<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<link rel="stylesheet" href="../assets/css/style.css" media="all">
	<link rel="shortcut icon" type="image/x-icon" href="#" />

	<title>League Of Quizz</title>
</head>
<body>

	<div id="wrapper">
		<h1>League Of Quizz</h1>

		<div class="start">

			<form action="jeu.php" method="post">
				
				<div class="center">
					<input id="pseudo" type="text" name="pseudo" placeholder="Pseudonyme" minlength="3" maxlength="20" rows="1" wrap="off" required>

					<input type="radio" name="difficulty" id="EASY" value="EASY" checked="checked">
					<label for="EASY" class="difficulty">Facile</label>

					<input type="radio" name="difficulty" id="MEDIUM" value="MEDIUM" DISABLED>
					<label for="MEDIUM" class="difficulty" title="Pas encore disponible">Moyen</label>

					<input type="radio" name="difficulty" id="HARD" value="HARD" DISABLED>
					<label for="HARD" class="difficulty" title="Pas encore disponible">Difficile</label>
				</div>
				<input type="submit" name="play" id="valider" value="Jouer">


			</form>

		</div>


		<div class="center rules">

			<br/><br/>
			
			<p><u>Objectif :</u> Répondre correctement aux 10 questions en un minimum de temps</p>

			<ul>
				<li>10 questions tirées aléatoirement en fonction de la difficulté sélectionnée</li>
				<li>1 question non répondue ou avec une réponse incorrecte entraine une pénalité de 15 secondes</li>
				<li>Seuls les 10 meilleurs scores de chaque difficulté sont sauvegardés</li>
			</ul>


		</div>

	</div>


</body>
</html>