<?php
// se connecter à la base de données
// en testant la présence d'erreur
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=projet', 'biostat', 'biostat', 	array(PDO::ATTR_ERRMODE => 	PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
};

?>

