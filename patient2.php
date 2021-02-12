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

?>


</body>
</html>