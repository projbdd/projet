<?php session_start()?>

<html>
<head>
	<meta charset="utf-8" />	
	<title> Ajout d'un utilisateur </title>
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

        // connexion  à la base de données
        include("connexion_bd_projet.php");

        // Définition d'une requête pour implémenter la variable ID_prof de la tab_utilisateurs (qui n'est pas renseignée dans le formulaire)
        $prof = "SELECT max(ID_prof)+1 FROM tab_utilisateurs";
        $resultat = $bdd -> query($prof);
        $max = $resultat -> fetch();

        // Pour rajouter un utilisateur de type médecin
        if ($_POST['typeMed'] == 'Médecin') {
            
            // Requête pour ajout
            $req = $bdd -> prepare('insert into tab_utilisateurs values (:p_prof, :p_nom, :p_prenom, :p_age, :p_tel, :p_user, :p_mdp, :p_type)');

            // Exécution de la requête
            $req -> execute(array(':p_prof' => $max[0], ':p_nom' => $_POST['nomMed'], ':p_prenom' => $_POST['prenomMed'], ':p_age' => $_POST['ageMed'], ':p_tel' => $_POST['telMed'], ':p_user' => $_POST['ID'], ':p_mdp' => $_POST['pwd'], 'p_type' => 'Med'));

            if ($req != null) {
                echo "</br> Nouvel utilisateur ".htmlspecialchars($_POST['prenomMed'])." ".htmlspecialchars($_POST['nomMed'])." rajouté avec succès. </br>";
                echo "<a href='EspaceDataM.php'>Retour</a> ";
            }

            $req->closeCursor();
        }

        // Pour rajouter un utilisateur de type Data Manager
        else if ($_POST['typeMed'] == 'Data Manager') {

            // Requête pour ajout
            $req = $bdd -> prepare('insert into tab_utilisateurs values (:p_prof, :p_nom, :p_prenom, :p_age, :p_tel, :p_user, :p_mdp, :p_type)');

            // Exécution de la requête
            $req -> execute(array(':p_prof' => $max[0], ':p_nom' => $_POST['nomMed'], ':p_prenom' => $_POST['prenomMed'], ':p_age' => $_POST['ageMed'], ':p_tel' => $_POST['telMed'], ':p_user' => $_POST['ID'], ':p_mdp' => $_POST['pwd'], 'p_type' => 'DM'));

            if ($req != null) {
                echo "</br> Nouvel utilisateur ".htmlspecialchars($_POST['prenomMed']). " ".htmlspecialchars($_POST['nomMed'])." rajouté avec succès. </br>";
                echo "<a href='EspaceDataM.php'>Retour</a> ";
            }
            
            $req->closeCursor();
        }
    
    ?>
</div>

</body>
</html>