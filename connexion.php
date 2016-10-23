<?php

if (empty($_POST)){
	$_POST = print_r("");	// Si le formulaire n'est pas encore rempli envoi rien dans le tableau $_POST
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Page de Connexion</title>
</head>
<body>
		<form method="POST" action="" >
			<label for="identifiant">Identifiant</label>
			<input id="identifiant" type="text" name="identifiant" required><br/> <!-- Saisie du login obligatoire -->
			<label for="pwd">Mot de passe</label>
			<input id="pwd" type="password" name="pwd" required><br/>   <!-- Saisie du mot de passe obligatoire -->
			<input type="submit" name="submit" value="Connexion">       <!-- Bouton envoyer -->
			<input type="reset" name="reset" value="Remise à zero">		<!-- Bouton reset -->






		</form>
		<?php  
		$fic = fopen('password.htaccess', 'r');  // Ouverture du fichier en lecteure seule
		while (!feof($fic)) {					 // On parcour le fichier
			$ligne = fgets($fic);
			$datas = explode(';', $ligne);       // On sépare les différentes informations avec un explode qui va aller dans le tableau $datas
			if (sha1($_POST['pwd']) == $datas[0] && $_POST['identifiant'] == $datas[1]) {   // si le mot de passe et le login sont pareils alors je suis connecté
				echo "Vous êtes connectés";
				
			}
			
		}
		fclose($fic); // fermeture du fichier 
		?>
		<p>Cliquez <a href="./index.php">ici</a> pour revenir à la page d\'accueil</p>









	
</body>
</html>
