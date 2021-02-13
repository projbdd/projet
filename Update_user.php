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
                if (htmlspecialchars($ligne['Mdp']) == htmlspecialchars($_POST['old'])) {
                    if (htmlspecialchars($_POST['new']) == htmlspecialchars($_POST['confirm'])) {
                        $req2 = $bdd -> prepare("update tab_utilisateurs
                        set Mdp = :p_mdp
                        where ID_user = :p_user");
                        
                        $req2 -> execute(array(':p_user' => $_SESSION['ID'], ':p_mdp' => htmlspecialchars($_POST['new'])));

                        echo "</br> Le mot de passe de ".$_SESSION['prenom']." ".$_SESSION['nom']," a bien été changé. </br>";
                        echo '<a href = "EspaceDataM.php"/>Retour</a>';

                    } else { 
                        echo "</br> Les deux mots de passe doivent être identiques.</br>";
                        echo '<a href = "EspaceDataM.php"/>Réessayer</a>';
                    }
                } else { 
                    echo "</br> Aucune correspondance pour ce mot de passe.</br>";
                    echo '<a href = "EspaceDataM.php"/>Réessayer</a>';
                }
            } else { 
                echo "</br> Cet utilisateur n'a pas été trouvé.</br>";
                echo '<a href = "EspaceDataM.php"/>Réessayer</a>';
            };

            $req->closeCursor() ;

        } else if ($_SESSION['info'] == 'Type') {

            // Définition et stockage des paramètres de la requête dans un tableau 
            $req = $bdd -> prepare('select Type from tab_utilisateurs where ID_user = :p_user');
            $req->execute(array(':p_user' => $_SESSION['ID']));

            // Récupération des données de la première ligne de la requête
            $ligne = $req -> fetch();

            if ($ligne) { // Vérifier si l'utilisateur a bien été trouvé
                if (htmlspecialchars($_POST['new']) == htmlspecialchars($_POST['old'])) {
                        
                    echo "</br> Veuillez modifier la fonction.</br>";
                    echo '<a href = "EspaceDataM.php"/>Réessayer</a>';

                } else { 
                        
                    $req2 = $bdd -> prepare("update tab_utilisateurs
                    set Type = :p_type
                    where ID_user = :p_user");
                        
                    $req2 -> execute(array(':p_user' => $_SESSION['ID'], ':p_type' => htmlspecialchars($_POST['new'])));

                    echo "</br> La fonction de ".$_SESSION['prenom']." ".$_SESSION['nom']," a bien été changée. </br>";
                    echo '<a href = "EspaceDataM.php"/>Retour</a>';
                }

            } else { 
                
                echo "</br> Cet utilisateur n'a pas été trouvé.</br>";
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
                if (htmlspecialchars($ligne[0]) == htmlspecialchars($_POST['old'])) {
                    if (htmlspecialchars($_POST['new']) == htmlspecialchars($_POST['confirm'])) {
                        $req2 = $bdd -> prepare("update tab_utilisateurs
                        set ".$_SESSION['info']." = :p_new
                        where ID_user = :p_user");
                        
                        $req2 -> execute(array(':p_user' => $_SESSION['ID'], ':p_new' => htmlspecialchars($_POST['new'])));

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