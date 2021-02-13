<?php session_start()?>

<html>
	<head>
		<meta charset="utf-8" />
		<title> Supprimer un utilisateur </title>
        <link rel="stylesheet" media="screen" href="feuille_style.css">
	</head>

<body>

<!-- Partie du haut -->
<div class="navbar">
    <a href="motpasse_corrigé.html">Déconnexion</a>
    <div class="dropdown">
    <button class="dropbtn">Mon compte
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="Infos_DM.php">Mes informations</a>
    </div>
  </div>
</div>

<!-- Reste de la page-->
<div class = "main">

    <?php

        // Connexion à la base de données
        include("connexion_bd.php");

        // On sauvegarde cette valeur pour la page d'après
        $_SESSION['del_user'] = $_POST['del_user'];

        // Pour avoir un message de confirmation
        $conf = "SELECT Nom, Prenom FROM tab_utilisateurs WHERE ID_user = '".$_SESSION['del_user']."'";
        $affiche = $bdd -> query($conf);
        $message = $affiche -> fetch();

        if($message) {
            while($message) {
                echo "</br>".$message['Prenom']." ".$message['Nom']." n'aura plus accès au site et à ses fonctionnalités. Voulez-vous continuer? </br></br>";
                $message = $affiche -> fetch();
            }

            echo "<form method = 'POST' action = 'delete_user.php'>
            <input type = 'submit' value = 'Confirmer'></br>
            <a href = 'EspaceDataM.php'>Retour</a>
            </form>";

        } else {
            echo "</br> Cet utilisateur n'est pas répertorié dans le serveur. </br>";
            echo "<a href = 'EspaceDataM.php'>Réessayer</a>";
        }
    ?>
</div>
</body>
</html>
