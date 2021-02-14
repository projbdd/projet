<?php session_start(); ?>
<html>
	<head>
		<meta charset="utf-8" />	
		<title>Informations patient</title>
</head>
<body>

<div class="navbar">
    <a href="motpasse_corrigé.html">Déconnexion</a>
    <div class="dropdown">
        <button class="dropbtn">Mon compte
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="mes_infos.php">Mes informations</a>
          <a href="mes_collègues.php">Mes collègues</a>
        </div>
    </div>
</div>

    
<!-- Reste de la page-->
<div class = "main">
	
<?php 

$_SESSION['jourvis']= htmlspecialchars($_POST['jourvis']);

echo "Le patient sélectionné est le patient numéro ".$_SESSION['numerodoss']." et la visite est celle du".$_SESSION['jourvis'].". </br>";
echo "Que voulez-vous faire ?</br>";

?>


<form method="POST" action="patient3.php">
	<input type="submit" value="Voir les informations sur cette visite">
</form>
</br>
<form method="POST" action="modif_suivi.php">
	<input type="submit" value="Modifier des informations sur cette visite">
</form>
</br>
<form method="POST" action="suppression_suivi.php">
	<input type="submit" value="Supprimer cette visite">
</form>

</div>

</body>
</html>
