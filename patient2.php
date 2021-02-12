<?php session_start(); ?>
<html>
	<head>
		<meta charset="utf-8" />	
		<title>Informations patient</title>
</head>
<body>

<?php 
$_SESSION['numerodoss']= htmlspecialchars($_POST['numdoss']); 


include("connexion_bd.php");

// récupération des identifiants des médecins ayant reçu le patient
$req = $bdd->prepare('select ID_Med from tab_suivi where N_dossier= :p_numdossier');
$req->execute(array(':p_numdossier' => $_POST['numdoss']));
$ligne = $req->fetch();
$relation = ['non'];

while($ligne) { // permet de regarder si le médecin à bien fait au moins une visite de ce patient
	if ($ligne['ID_Med']==$_POST['ID_Prof']){
		$relation=['oui'];
	} else {
		$relation=$relation;
	}
	$ligne = $req -> fetch();
}

if ($relation['oui']) { // si le médecin a bien fait une visite, il peut consulter la visite qu'ul veut (y compris la visite initiale)
	echo "Quelle visite du patient ",htmlspecialchars($_POST['numdoss'])," souhaitez-vous consulter ? <br /> \n";
	$requete = $bdd -> ('select Date from tab_suivi where N_dossier= :p_numdossier');
	$requete -> execute(array(':p_numdossier' => $_POST['numdoss']));
	
?>

<form method="POST" action="patient3.php">
    <select name="jourvis">
        <option selected="selected">Date de la visite</option>
        <?php
        $jour = $requete->fetch();
        while ($jour)
        	{	
        		foreach($jour as $item)
        			{
            			echo "<option value=".$jour['Date'].">".$jour['Date']."</option>";
            			$jour = $requete->fetch();
        			}
        	}
			
        ?>
	<option selected="selected">Date de la visite</option>"Visite initiale"
    </select>
    <input type="submit" value="Submit">
</form>
	
<?php

	
} else {// si le médecin n'a pas fait de suivi de ce patient, il ne peut pas le consulter
	echo "Ce patient ne fait pas partie de la liste de vos patients, vous ne pouvoiez donc pas avoir accès à ses informations. <br />";
	echo "<a href='patient1.php'> Chercher un autre patient </a> "; // Permet de retourner sur la page pour chercher un patient
}

?>


</body>
</html>