<?php session_start()?>

<!------ LYVIA MAGLOIRE ------->

<html>
	<head>
		<meta charset="utf-8" />
		<title> Supprimer un utilisateur </title>
    <link rel="stylesheet" media="screen" href="feuille_style.css">
	</head>

<body>

<!-- Barre de navigation -->
<div class="navbar">
    <a href="deconnexion.php">Déconnexion</a>
    <div class="dropdown">
  </div>
</div>

<!-- Reste de la page-->
<div class = "main">

    <?php

        // Connexion à la base de données
        include("connexion_bd.php");

        // On sauvegarde cette valeur pour la page d'après
        $_SESSION['del_user'] = htmlspecialchars($_POST['del_user']);

        // Pour avoir un message de confirmation, ou d'avertissement
        $conf = "SELECT Nom, Prenom FROM tab_utilisateurs WHERE ID_user = '".$_SESSION['del_user']."'";
        $affiche = $bdd -> query($conf);
        $message = $affiche -> fetch();

        if($message) {
            while($message) {
                echo "</br><h4>".htmlspecialchars($message['Prenom'])." ".htmlspecialchars($message['Nom'])." n'aura plus accès au site et à ses fonctionnalités. Voulez-vous continuer? </h4></br>";
                $message = $affiche -> fetch();
            }

            echo "<form method = 'POST' action = 'delete_user.php'>
            <input type = 'submit' value = 'Confirmer'></br></br>
            <a href = 'EspaceDataM.php'>Retour</a>
            </form>";

        } else {
            echo "</br><h3> Cet utilisateur n'est pas répertorié dans le serveur. </h3></br>";
            echo "<a href = 'EspaceDataM.php'>Réessayer</a>";
        }
    ?>
</div>
</body>
</html>
