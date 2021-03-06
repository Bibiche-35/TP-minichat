<?php
// Écrire un cookie
setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);

// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=tp_minichat;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO minichat (pseudo, message) VALUES(?, ?)');
$req->execute(array($_POST['pseudo'], $_POST['message']));

// Redirection du visiteur vers la page du minichat
header('Location: minichat.php');
?>