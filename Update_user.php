<?php session_start()?>

<html>
<head>
	<meta charset="utf-8" />	
	<title> Modifier les informations de l'utilisateur </title>
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
        // Connexion  à la base de données
        include("connexion_bd_projet.php");

        if ($_SESSION['info'] == 'Mot de passe') {

            // Définition et stockage des paramètres de la requête dans un tableau 
            $req = $bdd -> prepare('select Mdp from tab_utilisateurs where ID_user = :p_user');
            $req->execute(array(':p_user' => $_SESSION['ID']));

            // Récupération des données de la première ligne de la requête
            $ligne = $req -> fetch();

            if ($ligne) { // Vérifier si l'utilisateur a bien été trouvé
                if ($ligne['Mdp']==$_POST['old']) {
                    if ($_POST['new'] == $_POST['confirm']) {
                        $req2 = $bdd -> prepare("update tab_utilisateurs
                        set Mdp = :p_mdp
                        where ID_user = :p_user");
                        
                        $req2 -> execute(array(':p_user' => $_SESSION['ID'], ':p_mdp' => $_POST['new']));

                        echo "Le mot de passe de ".$_SESSION['prenom']." ".$_SESSION['nom']," a bien été changé. </br>";
                        echo '<a href = "EspaceDataM.php"/>Retour</a>';

                    } else { 
                        echo "Les deux mots de passe doivent être identiques.</br>";
                        echo '<a href = "EspaceDataM.php"/>Réessayer</a>';
                    }
                } else { 
                    echo "</br> Aucune correspondance pour ce mot de passe.</br>";
                    echo '<a href = "EspaceDataM.php"/>Réessayer</a>';
                }
            } else { 
                echo "Cet utilisateur n'a pas été trouvé.</br>";
                echo '<a href = "EspaceDataM.php"/>Réessayer</a>';
            };

            $req->closeCursor() ;

        } else {

            // Définition et stockage des paramètres de la requête dans un tableau 
            $req = $bdd -> prepare('select '.$_SESSION['info'].' from tab_utilisateurs where ID_user = :p_user');
            $req->execute(array(':p_user' => $_SESSION['ID']));

            // Récupération des données de la première ligne de la requête
            $ligne = $req -> fetch();

            if ($ligne) { // Vérifier si l'utilisateur a bien été trouvé
                if ($ligne[0] == $_POST['old']) {
                    if ($_POST['new'] == $_POST['confirm']) {
                        $req2 = $bdd -> prepare("update tab_utilisateurs
                        set ".$_SESSION['info']." = :p_new
                        where ID_user = :p_user");
                        
                        $req2 -> execute(array(':p_user' => $_SESSION['ID'], ':p_new' => $_POST['new']));

                        echo "</br> Le ".$_SESSION['info']." a bien été changé. </br>";
                        echo '<a href = "EspaceDataM.php"/>Retour</a>';

                    } else { 
                        echo "</br> Les informations doivent être identiques.</br>";
                        echo '<a href = "EspaceDataM.php"/>Réessayer</a>';
                    }
                } else { 
                    echo "</br> Cette information ne figure pas dans la base.</br>";
                    echo '<a href = "EspaceDataM.php"/>Réessayer</a>';
                }
            } else { 
                echo "</br> Cet utilisateur n'a pas été trouvé.</br>";
                echo '<a href = "EspaceDataM.php"/>Réessayer</a>';
            };

            $req->closeCursor() ;
        }
            
    ?>
</div>

</body>
</html>