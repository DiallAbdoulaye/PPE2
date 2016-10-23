<?php

if (empty($_POST)){
	$_POST = print_r("");	
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Authentification</title>
</head>
<body>
	<form method="POST" action="form.php">
		
		<label for="nom">Nom</label>
		<input id="nom" type="text" name="nom"><br/>
		
		<label for="prenom">Prénom</label>
		<input id="prenom" type="text" name="prenom"><br/>

		<label for="identifiant">identifiant</label>
		<input id="identifiant" type="text" name="identifiant"><br/>
		
		<label for="section">Section</label>
		<select id="section" type="text" name="section">
			<option value="SIO">SIO</option>
			<option value="AG">AG</option>
			<option value= "MUC">MUC</option>
			<option value="Assurance">Assurance</option>
		</select><br/>	
		
		<label for="pwd">Mot de passe</label>
		<input id="pwd" type="password" name="pwd"><br/>

		<label for="pwd">Confirmation Mot de passe</label>
		<input id="pwd2" type="password" name="pwd2"><br/>	
		
		<input type="submit" name="submit" value="Connexion">

	</form>

<?php


$pwd = sha1($_POST['pwd']);
$pwd2 = sha1($_POST['pwd2']);

if ($pwd == $pwd2) {
	
$today = date("F j, Y, g:i a"); 
$fp = fopen('password.htaccess', 'a');
$donnees = fwrite($fp, $pwd .';'.$_POST['identifiant'] .';'. $_POST['nom'] .';'.$_POST['prenom'] .';'. $_POST['section'] .';'. $today. "\r\n");
	
	fclose($fp);
echo "Votre inscription a bien été prise en compte.";
}

else{
	echo "les mots de passe sont différents !";
}


?>

</body>
</html>