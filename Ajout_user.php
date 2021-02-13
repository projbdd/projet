<html>
<head>
	<meta charset="utf-8" />	
	<title> Espace Data Manager </title>
</head>

<body>
    <?php

        // connexion  à la base de données
        include("connexion_bd_projet.php");

        // AJOUT D'UN MEDECIN

        $prof = "SELECT max(ID_prof)+1 FROM tab_utilisateurs";
        $resultat = $bdd -> query($prof);
        $max = $resultat -> fetch();
    
        if ($_POST['typeMed'] == 'Médecin') {

           $req = $bdd -> prepare('insert into tab_utilisateurs values (:p_prof, :p_nom, :p_prenom, :p_age, :p_tel, :p_user, :p_mdp, :p_type)');

            // exécution de la requête
            $req -> execute(array(':p_prof' => $max[0], ':p_nom' => $_POST['nomMed'], ':p_prenom' => $_POST['prenomMed'], ':p_age' => $_POST['ageMed'], ':p_tel' => $_POST['telMed'], ':p_user' => $_POST['ID'], ':p_mdp' => $_POST['pwd'], 'p_type' => 'Med'));

            if ($req != null) {
                echo "Nouvel utilisateur ".htmlspecialchars($_POST['prenomMed'])." ".htmlspecialchars($_POST['nomMed'])." rajouté avec succès. </br>";
                echo "<a href='EspaceDataM.html'>Retour</a> ";
            }
        }

        else if ($_POST['typeMed'] == 'Data Manager') {

            $req = $bdd -> prepare('insert into tab_utilisateurs values (:p_prof, :p_nom, :p_prenom, :p_age, :p_tel, :p_user, :p_mdp, :p_type)');

            // exécution de la requête
            $req -> execute(array(':p_prof' => $max[0], ':p_nom' => $_POST['nomMed'], ':p_prenom' => $_POST['prenomMed'], ':p_age' => $_POST['ageMed'], ':p_tel' => $_POST['telMed'], ':p_user' => $_POST['ID'], ':p_mdp' => $_POST['pwd'], 'p_type' => 'DM'));

            if ($req != null) {
                echo "Nouvel utilisateur ".htmlspecialchars($_POST['prenomMed']). " ".htmlspecialchars($_POST['nomMed'])." rajouté avec succès. </br>";
                echo "<a href='EspaceDataM.html'>Retour</a> ";
            }
        }

        // MISE A JOUR

        // définition de la requête - les paramètres sont identifiés ; on n'a pas besoin de gérer les guillemets -
        $req = $bdd->prepare('select mdp from tab_utilisateur where user= :p_user');

        // exécution de la requête - les valeurs des paramètres sont données dans un tableau
        $req->execute(array(':p_user' => $_POST['utilisateur']));

        // Récupération des données de la première ligne de la requête
        $ligne = $req->fetch();

        if ($ligne)  // permet de tester si l'utilisateur a bien été trouvé
        {
            if ($ligne['mdp']==$_POST['old_mdp']) {
                if ($_POST['new_mdp'] == $_POST['confirm_mdp']) {
                    $req2 = $bdd -> prepare("update tab_utilisateur
                    set mdp = :p_mdp
                    where user = :p_user");
                    
                    $req2 -> execute(array(':p_user' => $_POST['utilisateur'], ':p_mdp' => $_POST['new_mdp']));

                    echo "Le mot de passe de ",$_POST['utilisateur']," a bien été changé.";

                } else { 
                    echo "Les deux mots de passe doivent être identiques.</br>";
                    echo '<a href = "form_update2.html"/>Réessayer</a>';}
            } else { 
                echo "Aucune correspondance pour ce mot de passe.</br>";
                echo '<a href = "form_update2.html"/>Réessayer</a>';}
        } else { echo "Cet utilisateur n'a pas été trouvé.</br>";
            echo '<a href = "form_update2.html"/>Réessayer</a>';};

        $req->closeCursor() ;
    ?>

</body>
</html>