<?php session_start()?>

<!------ LYVIA MAGLOIRE ------->

<html>
<head>
<meta charset="utf-8" />
<title> Espace Data Manager </title>
<link rel="stylesheet" media="screen" href="feuille_style.css">
</head>

<body>
    
<!-- Barre de navigation -->
<div class="navbar">
    <a href="deconnexion.php">Déconnexion</a>
    <div class="dropdown">
  </div>
</div>
  
<!-- Contenu de la page -->
<div class="main">
    <table class = "center"></br></br>
        <th colspan = "3"><h1> Espace Data-Manager </h1></th>
        <tr>

            <td> <!-- Formulaire pour rajouter un nouvel utilisateur -->
                <form method = "POST" action = "Ajout_user.php">
                    <fieldset><legend><h2> Ajout d'un nouvel utilisateur </h2></legend>
                        <!-- ID_prof <input name = "prof"></br> -->
                        Nom <input name = "nomMed" required><br><br>
                        Prénom <input name = "prenomMed" required><br><br>
                        Téléphone <input name = "telMed" required><br><br>
                        Age <input name = "ageMed" type ="number" min="0" max="9999999999" required><br><br><br>
                        <b>Création de son espace personnel </b></br><br>
                        Type d'utilisateur <select name = "typeMed" required>
                            <option selected = "yes"> Choissisez une fonction </option>
                            <option value = "Med"> Médecin </option>
                            <option value = "DM"> Data Manager </option>
                        </select></br><br>
                        Définir l'identifiant <input name = "ID" required><br><br>
                        Définir le mot de passe </strong><input type = "password" name = "pwd" required><br></br>
                        Confirmer le mot de passe </strong><input type = "password" name = "conf_pwd" required><br></br>
                        <input type = "submit" value = "Confirmer"/>
                    </fieldset>
                </form>
            </td>
                
            <td> <!-- Formulaire pour modifier les informations d'un utilisateur -->
                <form method = "POST" action = "Update1.php" >
                    <fieldset><legend><h2> Modification des informations utilisateur </h2></legend>
                        Identifiant <input name = "ID_to_update" required></br></br>
                            Modifier : <select name = "selec"> 
                            <option> Nom </option>
                            <option> Prenom </option>
                            <option> Telephone </option>
                            <option> Type </option>
                            <option> Mot de passe </option>
                        </select></br></br>
                        <input type="submit" value="Confirmer"/>
                    </fieldset>
                    </form>
            </td>

            <td> <!-- Formulaire pour supprimer l'accès d'un utilisateur à la base -->
                <form method = "POST" action = "Confirmation_del.php" enctype = "multipart/form-data">
                    <fieldset><legend><h2> Suppression d'un utilisateur </h2></legend>
                        Saisir l'identifiant de l'utilisateur <input name="del_user" required><br></br>
                        <input type="submit" value="Confirmer"/>
                    </fieldset>
                    </form>
            </td>
        </tr>
    </table>
</div>
  
</body>
</html>
