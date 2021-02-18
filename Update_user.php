<?php session_start()?>

<!------ LYVIA MAGLOIRE ------->

<html>
<head>
	<meta charset="utf-8" />	
	<title> Modifier les informations de l'utilisateur </title>
    <link rel="stylesheet" media="screen" href="feuille_style.css">
</head>

<body>

<!-- Barre de navigation -->
<div class="navbar">
    <a href="motpasse_corrigé.html">Déconnexion</a>
    <div class="dropdown">
  </div>
</div>

<!-- Reste de la page-->
<div class = "main">

    <?php
        // Connexion  à la base de données
        include("connexion_bd.php");


        // MODIFICATION DU MOT DE PASSE

        if ($_SESSION['info'] == 'Mot de passe') {

            // Définition et stockage des paramètres de la requête dans un tableau 
            $req = $bdd -> prepare('select Mdp from tab_utilisateurs where ID_user = :p_user');
            $req->execute(array(':p_user' => $_SESSION['ID']));

            // Récupération des données de la première ligne de la requête
            $ligne = $req -> fetch();

            if ($ligne) { // On vérifie que la requête s'effectue ...
                if (htmlspecialchars($ligne['Mdp']) == htmlspecialchars($_POST['old'])) { // ... que le mot de passe à modifier correspond bien à celui de la base ...
                    if (htmlspecialchars($_POST['new']) == htmlspecialchars($_POST['confirm'])) { // ... et que les deux nouveux mots de passe soient identiques
                        $req2 = $bdd -> prepare("update tab_utilisateurs
                        set Mdp = :p_mdp
                        where ID_user = :p_user");
                        
                        $req2 -> execute(array(':p_user' => $_SESSION['ID'], ':p_mdp' => htmlspecialchars($_POST['new'])));

                        echo "</br><h3> Le mot de passe de ".$_SESSION['prenom']." ".$_SESSION['nom']," a bien été changé. </h3></br>";
                        echo '<a href = "EspaceDataM.php"/>Retour</a>';

                    } else { 
                        echo "</br><h3> Les deux mots de passe doivent être identiques.</h3></br>";
                        echo '<a href = "EspaceDataM.php"/>Réessayer</a>';
                    }
                } else { 
                    echo "</br><h3> Aucune correspondance pour ce mot de passe.</h3></br>";
                    echo '<a href = "EspaceDataM.php"/>Réessayer</a>';
                }
            } else { 
                echo "</br><h3> Cet utilisateur n'a pas été trouvé.</h3></br>";
                echo '<a href = "EspaceDataM.php"/>Réessayer</a>';
            };

            $req->closeCursor() ;

        
        // MODIFICATION DE LA FONCTION DE L'UTILISATEUR

        } else if ($_SESSION['info'] == 'Type') {

            // Définition et stockage des paramètres de la requête dans un tableau 
            $req = $bdd -> prepare('select Type from tab_utilisateurs where ID_user = :p_user');
            $req->execute(array(':p_user' => $_SESSION['ID']));

            // Récupération des données de la première ligne de la requête
            $ligne = $req -> fetch();

            if ($ligne) { // On vérifie que la requête s'effectue ...
                if (htmlspecialchars($_POST['new']) == htmlspecialchars($_POST['old'])) { // ... et que la nouvelle fonction ne soit pas identique à l'ancienne 
                        
                    echo "</br><h3> Veuillez modifier la fonction.</h3></br>";
                    echo '<a href = "EspaceDataM.php"/>Réessayer</a>';

                } else { 
                        
                    $req2 = $bdd -> prepare("update tab_utilisateurs
                    set Type = :p_type
                    where ID_user = :p_user");
                        
                    $req2 -> execute(array(':p_user' => $_SESSION['ID'], ':p_type' => htmlspecialchars($_POST['new'])));

                    echo "</br><h3> La fonction de ".$_SESSION['prenom']." ".$_SESSION['nom']," a bien été changée.</h3></br>";
                    echo '<a href = "EspaceDataM.php"/>Retour</a>';
                }

            } else { 
                
                echo "</br><h3> Cet utilisateur n'a pas été trouvé.</h3></br>";
                echo '<a href = "EspaceDataM.php"/>Réessayer</a>';
            };

            $req->closeCursor() ;


        // AUTRES MODIFICATIONS     

        } else {

            // Définition et stockage des paramètres de la requête dans un tableau 
            $req = $bdd -> prepare('select '.$_SESSION['info'].' from tab_utilisateurs where ID_user = :p_user');
            $req->execute(array(':p_user' => $_SESSION['ID']));

            // Récupération des données de la première ligne de la requête
            $ligne = $req -> fetch();

            if ($ligne) { // On vérifie que la requête s'effectue...
                if (htmlspecialchars($ligne[0]) == htmlspecialchars($_POST['old'])) { // que l'ancienne information est retrouvée dans la base...
                    if (htmlspecialchars($_POST['new']) == htmlspecialchars($_POST['confirm'])) { // ... et que les deux nouvelles infos sont les mêmes
                        $req2 = $bdd -> prepare("update tab_utilisateurs
                        set ".$_SESSION['info']." = :p_new
                        where ID_user = :p_user");
                        
                        $req2 -> execute(array(':p_user' => $_SESSION['ID'], ':p_new' => htmlspecialchars($_POST['new'])));

                        echo "</br><h3> Le ".$_SESSION['info']." a bien été changé.</h3></br>";
                        echo '<a href = "EspaceDataM.php"/>Retour</a>';

                    } else { 
                        echo "</br><h3> Les informations doivent être identiques.</h3></br>";
                        echo '<a href = "EspaceDataM.php"/>Réessayer</a>';
                    }
                } else { 
                    echo "</br><h3> Cette information ne figure pas dans la base.</h3></br>";
                    echo '<a href = "EspaceDataM.php"/>Réessayer</a>';
                }
            } else { 
                echo "</br><h3> Cet utilisateur n'a pas été trouvé.</h3></br>";
                echo '<a href = "EspaceDataM.php"/>Réessayer</a>';
            };

            $req->closeCursor() ;
        }
            
    ?>
</div>

</body>
</html>
