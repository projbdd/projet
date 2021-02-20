<?php session_start()?>

<!------ LYVIA MAGLOIRE ------->

<html>
<head>
	<meta charset="utf-8" />	
	<title> Ajout d'un utilisateur </title>
    <link rel="stylesheet" media="screen" href="feuille_style.css">
</head>

<body>

<!-- Partie du haut -->
<div class="navbar">
    <a href="deconnexion.php">Déconnexion</a>
    <div class="dropdown">
  </div>
</div>

    
<!-- Reste de la page-->
<div class = "main">

    <?php

        // connexion  à la base de données
        include("connexion_bd.php");

        // Définition d'une requête pour implémenter la variable ID_prof de la tab_utilisateurs (qui n'est pas renseignée dans le formulaire). Doit être unique
        $prof = "SELECT max(ID_prof)+1 FROM tab_utilisateurs";
        $resultat = $bdd -> query($prof);
        $max = $resultat -> fetch();

        // Requête pour vérifier que l'identifiant de connexion soit unique
        $id_check = "SELECT ID_user FROM tab_utilisateurs WHERE ID_user LIKE '".$_POST['ID']."'";
        $resultat2 = $bdd -> query($id_check);
        $check = $resultat2 -> fetch();

        // Requête pour ajout
        $req = $bdd -> prepare('insert into tab_utilisateurs values (:p_prof, :p_nom, :p_prenom, :p_age, :p_tel, :p_user, :p_mdp, :p_type)');

        // Exécution de la requête : il faut que toutes les valeurs soient renseignée       
        if (htmlspecialchars($_POST['typeMed']) != 'Choissisez une fonction') {
            if ($check == NULL) {
                    if (htmlspecialchars($_POST['pwd']) == htmlspecialchars($_POST['conf_pwd'])) { // Contrôle sur les mots de passe

                        $req -> execute(array(':p_prof' => $max[0], ':p_nom' => htmlspecialchars($_POST['nomMed']), ':p_prenom' => htmlspecialchars($_POST['prenomMed']), ':p_age' => htmlspecialchars($_POST['ageMed']), ':p_tel' => htmlspecialchars($_POST['telMed']), ':p_user' => htmlspecialchars($_POST['ID']), ':p_mdp' => htmlspecialchars($_POST['pwd']), 'p_type' => $_POST['typeMed']));

                        if ($req != null) {
                                                
                            echo "</br><h3> Nouvel utilisateur ".htmlspecialchars($_POST['prenomMed'])." ".htmlspecialchars($_POST['nomMed'])." rajouté avec succès. </h3></br>";
                            echo "<a href='EspaceDataM.php'>Retour</a>";
                                                    
                        } else {

                            echo "</br><h4>Echec de la procédure. Veuillez réessayer.</h4></br>";
                            echo "<a href='EspaceDataM.php'>Retour</a>"; 

                        } 
                } else {
                    echo "</br><h3> Les deux mots de passe doivent être identiques.</h3></br>";
                    echo '<a href = "EspaceDataM.php"/>Réessayer</a>';  
                }                      
            } else {
                echo "</br><h3>Cet identifiant est déja utilisé pour un autre utilisateur.</h3></br>";
                echo '<a href = "EspaceDataM.php"/>Réessayer</a>'; 
            }                    
        } else {
            echo "</br><h3>Veuillez renseigner la fonction de l'utilisateur.</h3></br>";
            echo '<a href = "EspaceDataM.php"/>Réessayer</a>';
        }

        $req->closeCursor();

    ?>
</div>

</body>
</html>
