<?php
// Perment de se connecter à la base de données en testant la présence d'erreurs

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=projet', 'biostat', 'biostat', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
};

?>

