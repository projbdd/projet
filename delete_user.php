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

        // Connexion  à la base de données
        include("connexion_bd.php");

        // Définition et stockage des paramètres de la requête dans un tableau 
        $req = $bdd -> prepare("select Type from tab_utilisateurs where ID_user = :p_user");
        $req -> execute(array(':p_user' => $_SESSION['del_user']));

        // Récupération des données de la première ligne de la requête
        $ligne = $req->fetch();

        if ($ligne) { // On vérifie si la requête s'effectue
            $req2 = $bdd -> prepare("update tab_utilisateurs
            set Type = :p_type
            where ID_user = :p_user");

            $req2 -> execute(array(':p_user' => $_SESSION['del_user'], ':p_type' => 'NA'));
            
            echo "</br><h3> Cet utilisateur a été supprimé du serveur. </h3>";
            echo "<a href='EspaceDataM.php'>Retour</a> ";
        } 
        
        $req->closeCursor() ;
    ?>
</div>

</body>
</html>
