<?php session_start()?>


<html>
<head>
	<meta charset="utf-8" />	
	<title> Afficher les prescriptions </title>
    <link rel="stylesheet" media="screen" href="feuille_style.css">
</head>

<body>

<?php
//Barre de navigation 
include("barr_navig.html");
?>
    
    
<!-- Reste de la page-->
<div class = "main">

    <?php

        // Connexion à la base de données
        include("connexion_bd.php");
    
        // Requête pour récuperer les informations de la prescription (+ infos sur les lentilles) 
        $req = $bdd -> prepare("select N_dossier, Date, Oeil, C.Id_lentille, Autre_nom_lentille, Ro, Diametre, Puissance, Commentaires, Nom_lentille, Laboratoire, Type_Lentille, Geometrie_lentille
            from tab_contacto as C inner join tab_codage_nom_lentilles as L on L.Id_lentille = C.Id_lentille
            where N_dossier = :p_doss");

        $req -> execute(array(':p_doss' => $_SESSION['numerodoss']));

        // Récupération des données de la première presc de la requête
        $presc = $req -> fetch();

        if ($presc) { // Vérifier si l'utilisateur a bien été trouvé
		
            echo "<h2> Prescriptions associées au dossier numéro ".$_SESSION['numerodoss']." </h2>";
        ?>
        
        <form method="POST" action="form_presc.php">
		<input id = "bouton" type="submit" value="Ajouter une prescription">
		</form>

		<?php
                
            while ($presc) {

                echo "<table id = 'presc'>
                        <th colspan= '2'> Date de la prescription : ".$presc['Date']."</th>
                    <tr class = 'presc1'>";

                if ($presc['Oeil'] == "1") {
                    echo "<td class = 'presc2' rowspan='8'> Oeil droit </td>
                        </tr>";
                } else if ($presc['Oeil'] == "2") {
                    echo "<td class = 'presc2' rowspan='8'> Oeil gauche </td>
                    </tr>";
                }
                
                if ($presc['Nom_lentille'] != NULL) {
                    echo "<tr><td> Lentille n°".$presc['Id_lentille']." : ".$presc['Nom_lentille'];
                } else { 
                    echo "<tr><td> Lentille n°".$presc['Id_lentille']." : nom non renseigné";
                }

                if ($presc['Autre_nom_lentille'] != NULL) {
                    echo "(Autre nom : ".$presc['Autre_nom_lentille'].")</td></tr>";
                } else {
                    echo "";
                }

                if ($presc['Laboratoire'] != NULL) {
                    echo "<tr><td> Développée par le laboratoire ".$presc['Laboratoire']."</td></tr>";
                } else {
                    echo "<tr><td> Laboratoire non renseigné </td></tr>";
                }

                if ($presc['Type_Lentille'] != NULL) {
                    echo "<tr><td> Type : ".$presc['Type_Lentille']."</td></tr>";
                } else {
                    echo "<tr><td> Type : non renseigné </td></tr>";
                }

                if ($presc['Diametre'] != NULL) {
                            echo "<tr><td> Diamètre : ".$presc['Diametre']."</td></tr>";
                } else {
                    echo "<tr><td> Diamètre : non renseigné </td></tr>";
                }

                if ($presc['Geometrie_lentille'] != NULL) {
                            echo "<tr><td> Géométrie de la lentille : ".$presc['Geometrie_lentille']."</td></tr>";
                } else {
                    echo "<tr><td> Géométrie de la lentille : non renseigné </td></tr>";
                }

                if ($presc['Puissance'] != NULL) {
                    echo "<tr><td> Puissance : ".$presc['Puissance']."</td></tr>";
                } else {
                    echo "<tr><td> Puissance non renseignée </td></tr>";
                }

                if ($presc['Ro'] != NULL) {
                    echo "<tr><td> Rayon de courbure : ".$presc['Ro']." </td></tr>";
                } else {
                    echo "<tr><td> Rayon de courbure non renseigné </td></tr>";
                }

                if($presc['Commentaires'] != NULL) {
                    echo "<tr><td colspan='2'> Commentaires : ".$presc['Commentaires']." </td></tr></br>";
                } else {
                    echo "<tr><td colspan='2'><em> Aucun commentaire </em></td></tr></br></br>";
                }

                $presc = $req -> fetch();
                
            }

        } else { 
        	echo "</br><h3> Pas de prescription de lentilles pour ce patient. </h3>"
        	?>      
        	
       	 	<form method="POST" action="form_presc.php">
			<input id = "bouton" type="submit" value="Ajouter une prescription">
			</form>
			
		<?php
        } ?>
        
    <!-- Lien vers d'autres pages -->
    <table id = end_table>
	<tr id = end_page>
	<td><a href = 'mes_patients.php'>Retour à la sélection du patient</a> </br></td>
	<td> &nbsp;&nbsp; </td>
	<td> <a href = 'patient2.php'>Retour à la page du patient</a></br> </td>
	</tr>
	</table>

    
</div>


</body>


   
</html>



