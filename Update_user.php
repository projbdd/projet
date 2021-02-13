<html>
<head>
	<meta charset="utf-8" />	
	<title> Espace Data Manager </title>
</head>

<body>
    <?php

        // connexion  à la base de données
        include("connexion_bd_projet.php");

        // définition de la requête - les paramètres sont identifiés ; on n'a pas besoin de gérer les guillemets -
        $req = $bdd -> prepare('select Mdp from tab_utilisateurs where ID_user = :p_user');

        // exécution de la requête - les valeurs des paramètres sont données dans un tableau
        $req->execute(array(':p_user' => $_POST['ID_to_update']));

        // Récupération des données de la première ligne de la requête
        $ligne = $req->fetch();

        if ($ligne)  // permet de tester si l'utilisateur a bien été trouvé
        {
            if ($ligne['mdp']==$_POST['old']) {
                if ($_POST['new'] == $_POST['confirm']) {
                    $req2 = $bdd -> prepare("update tab_utilisateurs
                    set mdp = :p_mdp
                    where user = :p_user");
                    
                    $req2 -> execute(array(':p_user' => $_POST['ID_to_update'], ':p_mdp' => $_POST['new_mdp']));

                    echo "Le mot de passe de ",$_POST['ID_to_update']," a bien été changé. </br>";
                    echo '<a href = "EspaceDataM.html"/>Retour</a>';

                } else { 
                    echo "Les deux mots de passe doivent être identiques.</br>";
                    echo '<a href = "EspaceDataM.html"/>Réessayer</a>';}
            } else { 
                echo "Aucune correspondance pour ce mot de passe.</br>";
                echo '<a href = "form_update2.html"/>Réessayer</a>';}
        } else { echo "Cet utilisateur n'a pas été trouvé.</br>";
            echo '<a href = "EspaceDataM.html"/>Réessayer</a>';};

        $req->closeCursor() ;
    ?>

</body>
</html>