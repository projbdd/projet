  
<?php session_start(); ?>
<html>
	<head>
		<meta charset="utf-8" />	
		<title>Informations patient </title>
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
include("connexion_bd.php");

$requete1 = $bdd -> prepare('UPDATE tab_suivi SET ID_med="999" WHERE N_dossier=:p_dossdoss;');
$requete1 -> execute(array(':p_dossdoss' => $_SESSION['numerodoss']));

$requete2 = $bdd -> prepare('SELECT ID_med FROM tab_suivi WHERE N_dossier=:p_dossdoss;');
$requete2 -> execute(array(':p_dossdoss' => $_SESSION['numerodoss']));
$ligne = $requete2->fetch();

{echo "Le patient ".$_SESSION['numerodoss']." a été supprimée. </br>";}

?>
</br>
<form method="POST" action="accueil.html">
	<input type="submit" value="Retour à l'accueil">
</form>
</div>
</body>
</html>