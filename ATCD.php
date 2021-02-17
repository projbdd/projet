<?php session_start()?>

<html>
<head>
	<meta charset="utf-8" />	
	<title> Afficher les antédécents médicaux </title>
    <link rel="stylesheet" media="screen" href="feuille_style.css">
</head>

<body>

<!-- Barre de navigation -->
<?php include("barr_navig.html"); ?>

    
<!-- Reste de la page-->
<div class = "main">
 
    <?php
    
        echo "<h2> Dossier numéro ".$_SESSION['numerodoss']." : antécédents médicaux</h2>";

        // Connexion à la base de données
        include("connexion_bd.php");

        // ANTECEDENTS PERSONNELS 
        echo "<h3><u> Antécédents personnels </u></h3>";

        $req_pers = $bdd -> prepare("select CCA.Categorie_ATCD, CA.Type_ATCD, Traitement_act, Traitement_passe           
                                    from tab_codage_catatcd as CCA 
                                    inner join tab_codage_atcd as CA on CCA.ID_categorie_ATCD = CA.ID_Categorie_ATCD 
                                    inner join tab_atcdperso as AP on AP.Num_Type = CA.Num_atcd 
                                    inner join tab_patient as P on P.Num_dossier = AP.Num_dossier 
                                    where P.Num_dossier = :p_doss");
        $req_pers -> execute(array(':p_doss' => $_SESSION['numerodoss']));
    
        // Récupération des données de la première presc de la requête
        $perso = $req_pers -> fetch();

        if ($perso) { // Vérifier si le patient a bien été trouvé
            
            while ($perso) {

                echo "<p><ul><li>Antécédent de type ".$perso['Categorie_ATCD']." : ".$perso['Type_ATCD']."</br>";
                    
                if ($perso['Traitement_act'] == '-1' && $perso['Traitement_passe'] == '-1') {
                    echo "<em>Traitement passé + en cours.</em></li></ul>";
                } else if ($perso['Traitement_passe'] == '-1' && ($perso['Traitement_act'] == '0' || $perso['Traitement_act'] == NULL)) {
                    echo "<em>Traitement passé.</em></li></ul>";
                } else if (($perso['Traitement_passe'] == '0' || $perso['Traitement_act'] == NULL) && $perso['Traitement_act'] == '-1') {
                    echo "<em>En cours de traitement.</em></li></ul>";
                } else if ($perso['Traitement_passe'] == '0' && $perso['Traitement_act'] == '0') {
                    echo "<em>Pas de traitement (ni passé ni actuel).</em></li></ul>";
                } else if ($perso['Traitement_passe'] == NULL && $perso['Traitement_act'] == NULL) {
                    echo "<em>Aucune information sur le traitement.</em></li></ul>";
                }

                $perso = $req_pers -> fetch(); 
            }

        } else {
            echo "Aucun antécédent médical personnel relevé pour ce patient.</br></br>";
        }


        // ANTECEDENTS FAMILIAUX
        echo "<h3><u>Antécédents familiaux</u></h3>";

        $req_fam = $bdd -> prepare("select Parente, ATCD_familier 
                                    from tab_atcd_famil as AF 
                                    inner join tab_codage_atcd_famil as CAF on CAF.Code = AF.Code_ATCD_fam 
                                    inner join tab_codage_parente as CP on AF.Codage_parente = CP.Code 
                                    inner join tab_patient as P on P.Num_dossier = AF.Num_dossier 
                                    where P.Num_dossier = :p_doss");
        $req_fam -> execute(array(':p_doss' => $_SESSION['numerodoss']));

        // Récupération des données de la première presc de la requête
        $famil = $req_fam -> fetch();

        if ($famil) { // Vérifier si le patient a bien été trouvé

            while ($famil) {
                echo "<ul><li>".$famil['ATCD_familier']." relevé chez le/la : ".$famil['Parente']."</li></ul>";
                
                $famil = $req_fam -> fetch();
            }

        } else {
            echo "Aucun antécédent médical familial relevé pour ce patient.</br></br>";
        }


        // ANTECEDANTS CHIRURGICAUX
        echo "<h3><u>Antécédents chirurgicaux</u></h3>";

        $req_chir = $bdd -> prepare("select Chirurgie, Oeil, Date_chirurgie, Chirurgie_Commentaires, Autre_type_chir 
                                    from tab_chirurgie as C 
                                    inner join tab_codage_chirurgie as CC on C.Code_chir = CC.Code 
                                    inner join tab_patient as P on P.Num_dossier = C.N_dossier
                                    where P.Num_dossier = :p_doss");
        $req_chir -> execute(array(':p_doss' => $_SESSION['numerodoss']));

        // Récupération des données de la première presc de la requête
        $chir = $req_chir -> fetch();

        if ($chir) { // Vérifier si le patient a bien été trouvé

            while ($chir) {

                echo "<table id = 'atcd'>
                    <th colspan='2'> Date de la chirurgie : ".$chir['Date_chirurgie']."</th>
                    <tr class = 'atcd1'>";
                
                if ($chir['Oeil'] == '1') {
                    echo "<td class = 'atcd2' rowspan='4'> Oeil droit </td></tr>";
                } else if ($chir['Oeil'] == '2') {
                    echo "<td class = 'atcd2' rowspan='4'> Oeil gauche </td></tr>";
                }
                    
                echo "<tr><td> Chirurgie réalisée : ".$chir['Chirurgie']." </td></tr>
                    <tr><td> Le ".$chir['Date_chirurgie']."</td></tr>
                    <tr><td> Autre type de chirurgie : ".$chir['Autre_type_chir']."</td></tr>";

                if ($chir['Chirurgie_Commentaires'] != NULL) {
                    echo "<tr><td colspan='2'> ".$chir['Chirurgie_Commentaires']." : </td></tr>
                    </table></br></br>";
                } else {
                    echo "<tr><td colspan='2'><em>Aucun commentaire</em></td></tr>
                    </table>";
                }
                
                    $chir = $req_chir -> fetch();
            }

        } else {
            echo "Ce patient n'a effectué aucune chirurgie.";
        }

        echo "</br></br></br><a href = 'mes_patients.php'>Retour à la sélection du patient</a></br>";
        echo "<a href = 'patient2.php'>Retour à la page du patient </a></br>";
    ?>

</div>

</body>
</html>
