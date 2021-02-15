<html>
	<head>
		<meta charset="utf-8" />	
		<title>Informations patient</title>
		<link rel="stylesheet" media="screen" href="feuille_style_stats.css">
</head>

<body>

<?php
//Barre de navigation 
include("barr_navig.html");
?>
 
 
<!-- Reste de la page-->
<div class = "main">

<?php
include("connexion_bd.php");
// moyennes

//sexe
$requete1 = $bdd->prepare('select avg(nbsuivi) as moyenne from (select p.Num_dossier, count(s.ID_suivi) as nbsuivi from tab_suivi s inner join tab_patient p on s.N_dossier= p.Num_dossier where p.Sexe=1 group by p.Num_dossier ) AS T');
$requete1->execute();
$ligne1 = $requete1->fetch();

$requete2 = $bdd->prepare('select avg(nbsuivi) as moyenne from (select p.Num_dossier, count(s.ID_suivi) as nbsuivi from tab_suivi s inner join tab_patient p on s.N_dossier= p.Num_dossier where p.Sexe=2 group by p.Num_dossier ) AS T');
$requete2->execute();
$ligne2 = $requete2->fetch();

//tabagisme actif
$requete7 = $bdd->prepare('select avg(nbsuivi) as moyenne from (select p.Num_dossier, count(s.ID_suivi) as nbsuivi from tab_suivi s inner join tab_patient p on s.N_dossier= p.Num_dossier where p.tabagisme_actif=1 group by p.Num_dossier ) AS T');
$requete7->execute();
$ligne7 = $requete7->fetch();

$requete8 = $bdd->prepare('select avg(nbsuivi) as moyenne from (select p.Num_dossier, count(s.ID_suivi) as nbsuivi from tab_suivi s inner join tab_patient p on s.N_dossier= p.Num_dossier where p.tabagisme_actif=0 group by p.Num_dossier ) AS T');
$requete8->execute();
$ligne8 = $requete8->fetch();

//csp
$requetecsp1 = $bdd->prepare('select avg(nbsuivi) as moyenne from (select p.Num_dossier, count(s.ID_suivi) as nbsuivi from tab_suivi s inner join tab_patient p on s.N_dossier= p.Num_dossier where p.csp=1 group by p.Num_dossier ) AS T');
$requetecsp1->execute();
$lignecsp1 = $requetecsp1->fetch();

$requetecsp2 = $bdd->prepare('select avg(nbsuivi) as moyenne from (select p.Num_dossier, count(s.ID_suivi) as nbsuivi from tab_suivi s inner join tab_patient p on s.N_dossier= p.Num_dossier where p.csp=2 group by p.Num_dossier ) AS T');
$requetecsp2->execute();
$lignecsp2 = $requetecsp2->fetch();

$requetecsp3 = $bdd->prepare('select avg(nbsuivi) as moyenne from (select p.Num_dossier, count(s.ID_suivi) as nbsuivi from tab_suivi s inner join tab_patient p on s.N_dossier= p.Num_dossier where p.csp=3 group by p.Num_dossier ) AS T');
$requetecsp3->execute();
$lignecsp3 = $requetecsp3->fetch();

$requetecsp4 = $bdd->prepare('select avg(nbsuivi) as moyenne from (select p.Num_dossier, count(s.ID_suivi) as nbsuivi from tab_suivi s inner join tab_patient p on s.N_dossier= p.Num_dossier where p.csp=4 group by p.Num_dossier ) AS T');
$requetecsp4->execute();
$lignecsp4 = $requetecsp4->fetch();

$requetecsp5 = $bdd->prepare('select avg(nbsuivi) as moyenne from (select p.Num_dossier, count(s.ID_suivi) as nbsuivi from tab_suivi s inner join tab_patient p on s.N_dossier= p.Num_dossier where p.csp=5 group by p.Num_dossier ) AS T');
$requetecsp5->execute();
$lignecsp5 = $requetecsp5->fetch();

$requetecsp6 = $bdd->prepare('select avg(nbsuivi) as moyenne from (select p.Num_dossier, count(s.ID_suivi) as nbsuivi from tab_suivi s inner join tab_patient p on s.N_dossier= p.Num_dossier where p.csp=6 group by p.Num_dossier ) AS T');
$requetecsp6->execute();
$lignecsp6 = $requetecsp6->fetch();

$requetecsp7 = $bdd->prepare('select avg(nbsuivi) as moyenne from (select p.Num_dossier, count(s.ID_suivi) as nbsuivi from tab_suivi s inner join tab_patient p on s.N_dossier= p.Num_dossier where p.csp=7 group by p.Num_dossier ) AS T');
$requetecsp7->execute();
$lignecsp7 = $requetecsp7->fetch();

$requetecsp8 = $bdd->prepare('select avg(nbsuivi) as moyenne from (select p.Num_dossier, count(s.ID_suivi) as nbsuivi from tab_suivi s inner join tab_patient p on s.N_dossier= p.Num_dossier where p.csp=8 group by p.Num_dossier ) AS T');
$requetecsp8 -> execute();
$lignecsp8 = $requetecsp8->fetch();

//ethnie 

$requeteethnie1 = $bdd->prepare('select avg(nbsuivi) as moyenne from (select p.Num_dossier, count(s.ID_suivi) as nbsuivi from tab_suivi s inner join tab_patient p on s.N_dossier= p.Num_dossier where p.ethnie=1 group by p.Num_dossier ) AS T');
$requeteethnie1->execute();
$ligneethnie1 = $requeteethnie1->fetch();

$requeteethnie2 = $bdd->prepare('select avg(nbsuivi) as moyenne from (select p.Num_dossier, count(s.ID_suivi) as nbsuivi from tab_suivi s inner join tab_patient p on s.N_dossier= p.Num_dossier where p.ethnie=2 group by p.Num_dossier ) AS T');
$requeteethnie2->execute();
$ligneethnie2 = $requeteethnie2->fetch();

$requeteethnie3 = $bdd->prepare('select avg(nbsuivi) as moyenne from (select p.Num_dossier, count(s.ID_suivi) as nbsuivi from tab_suivi s inner join tab_patient p on s.N_dossier= p.Num_dossier where p.ethnie=3 group by p.Num_dossier ) AS T');
$requeteethnie3->execute();
$ligneethnie3 = $requeteethnie3->fetch();

$requeteethnie4 = $bdd->prepare('select avg(nbsuivi) as moyenne from (select p.Num_dossier, count(s.ID_suivi) as nbsuivi from tab_suivi s inner join tab_patient p on s.N_dossier= p.Num_dossier where p.ethnie=4 group by p.Num_dossier ) AS T');
$requeteethnie4->execute();
$ligneethnie4 = $requeteethnie4->fetch();

$requeteethnie5 = $bdd->prepare('select avg(nbsuivi) as moyenne from (select p.Num_dossier, count(s.ID_suivi) as nbsuivi from tab_suivi s inner join tab_patient p on s.N_dossier= p.Num_dossier where p.ethnie=5 group by p.Num_dossier ) AS T');
$requeteethnie5->execute();
$ligneethnie5 = $requeteethnie5->fetch();



// proportions

//sexe 
$requete3 = $bdd->prepare('select count( distinct Num_dossier) as tot from tab_patient where Sexe=2 ');
$requete3->execute();
$ligne3 = $requete3->fetch();
$requete4 = $bdd->prepare('select   count( distinct c.N_dossier) as tot from tab_contacto c inner join tab_patient p on c.N_dossier= p.Num_dossier where p.Sexe=2');
$requete4->execute();
$ligne4 = $requete4->fetch();

$requete5 = $bdd->prepare('select count( distinct Num_dossier) as tot from tab_patient where Sexe=1 ');
$requete5->execute();
$ligne5 = $requete5->fetch();
$requete6 = $bdd->prepare('select   count( distinct c.N_dossier) as tot from tab_contacto c inner join tab_patient p on c.N_dossier= p.Num_dossier where p.Sexe=1');
$requete6->execute();
$ligne6 = $requete6->fetch();

//tabagisme actif 
$requete9 = $bdd->prepare('select count( distinct Num_dossier) as tot from tab_patient where tabagisme_actif=1 ');
$requete9->execute();
$ligne9 = $requete9->fetch();
$requete10 = $bdd->prepare('select   count( distinct c.N_dossier) as tot from tab_contacto c inner join tab_patient p on c.N_dossier= p.Num_dossier where p.tabagisme_actif=1');
$requete10->execute();
$ligne10 = $requete10->fetch();

$requete11 = $bdd->prepare('select count( distinct Num_dossier) as tot from tab_patient where tabagisme_actif=0 ');
$requete11->execute();
$ligne11 = $requete11->fetch();
$requete12 = $bdd->prepare('select   count( distinct c.N_dossier) as tot from tab_contacto c inner join tab_patient p on c.N_dossier= p.Num_dossier where p.tabagisme_actif=0');
$requete12->execute();
$ligne12 = $requete12->fetch();

//csp
$requetecsp1tt = $bdd->prepare('select count( distinct Num_dossier) as tot from tab_patient where csp=1 ');
$requetecsp1tt->execute();
$lignecsp1tt = $requetecsp1tt->fetch();
$requetecsp1t = $bdd->prepare('select   count( distinct c.N_dossier) as tot from tab_contacto c inner join tab_patient p on c.N_dossier= p.Num_dossier where p.csp=1');
$requetecsp1t->execute();
$lignecsp1t = $requetecsp1t->fetch();

$requetecsp2tt = $bdd->prepare('select count( distinct Num_dossier) as tot from tab_patient where csp=2 ');
$requetecsp2tt->execute();
$lignecsp2tt = $requetecsp2tt->fetch();
$requetecsp2t = $bdd->prepare('select   count( distinct c.N_dossier) as tot from tab_contacto c inner join tab_patient p on c.N_dossier= p.Num_dossier where p.csp=2');
$requetecsp2t->execute();
$lignecsp2t = $requetecsp2t->fetch();

$requetecsp3tt = $bdd->prepare('select count( distinct Num_dossier) as tot from tab_patient where csp=3 ');
$requetecsp3tt->execute();
$lignecsp3tt = $requetecsp3tt->fetch();
$requetecsp3t = $bdd->prepare('select   count( distinct c.N_dossier) as tot from tab_contacto c inner join tab_patient p on c.N_dossier= p.Num_dossier where p.csp=3');
$requetecsp3t ->execute();
$lignecsp3t = $requetecsp3t->fetch();

$requetecsp4tt = $bdd->prepare('select count( distinct Num_dossier) as tot from tab_patient where csp=4 ');
$requetecsp4tt->execute();
$lignecsp4tt = $requetecsp4tt->fetch();
$requetecsp4t = $bdd->prepare('select   count( distinct c.N_dossier) as tot from tab_contacto c inner join tab_patient p on c.N_dossier= p.Num_dossier where p.csp=4');
$requetecsp4t->execute();
$lignecsp4t = $requetecsp4t->fetch();

$requetecsp5tt = $bdd->prepare('select count( distinct Num_dossier) as tot from tab_patient where csp=5 ');
$requetecsp5tt->execute();
$lignecsp5tt = $requetecsp5tt->fetch();
$requetecsp5t = $bdd->prepare('select   count( distinct c.N_dossier) as tot from tab_contacto c inner join tab_patient p on c.N_dossier= p.Num_dossier where p.csp=5');
$requetecsp5t->execute();
$lignecsp5t = $requetecsp5t->fetch();

$requetecsp6tt = $bdd->prepare('select count( distinct Num_dossier) as tot from tab_patient where csp=6 ');
$requetecsp6tt->execute();
$lignecsp6tt = $requetecsp6tt->fetch();
$requetecsp6t = $bdd->prepare('select   count( distinct c.N_dossier) as tot from tab_contacto c inner join tab_patient p on c.N_dossier= p.Num_dossier where p.csp=6');
$requetecsp6t->execute();
$lignecsp6t = $requetecsp6t->fetch();

$requetecsp7tt = $bdd->prepare('select count( distinct Num_dossier) as tot from tab_patient where csp=7 ');
$requetecsp7tt->execute();
$lignecsp7tt = $requetecsp7tt->fetch();
$requetecsp7t = $bdd->prepare('select   count( distinct c.N_dossier) as tot from tab_contacto c inner join tab_patient p on c.N_dossier= p.Num_dossier where p.csp=7');
$requetecsp7t->execute();
$lignecsp7t = $requetecsp7t->fetch();

$requetecsp8tt = $bdd->prepare('select count( distinct Num_dossier) as tot from tab_patient where csp=8 ');
$requetecsp8tt->execute();
$lignecsp8tt = $requetecsp8tt->fetch();
$requetecsp8t = $bdd->prepare('select   count( distinct c.N_dossier) as tot from tab_contacto c inner join tab_patient p on c.N_dossier= p.Num_dossier where p.csp=8');
$requetecsp8t->execute();
$lignecsp8t = $requetecsp8t->fetch();

// ethnie 
$requeteethnie1tt = $bdd->prepare('select count( distinct Num_dossier) as tot from tab_patient where ethnie=1 ');
$requeteethnie1tt->execute();
$ligneethnie1tt = $requeteethnie1tt->fetch();
$requeteethnie1t = $bdd->prepare('select   count( distinct c.N_dossier) as tot from tab_contacto c inner join tab_patient p on c.N_dossier= p.Num_dossier where p.ethnie=1');
$requeteethnie1t->execute();
$ligneethnie1t = $requeteethnie1t->fetch();

$requeteethnie2tt = $bdd->prepare('select count( distinct Num_dossier) as tot from tab_patient where ethnie=2 ');
$requeteethnie2tt->execute();
$ligneethnie2tt = $requeteethnie2tt->fetch();
$requeteethnie2t = $bdd->prepare('select   count( distinct c.N_dossier) as tot from tab_contacto c inner join tab_patient p on c.N_dossier= p.Num_dossier where p.ethnie=2');
$requeteethnie2t->execute();
$ligneethnie2t = $requeteethnie2t->fetch();

$requeteethnie3tt = $bdd->prepare('select count( distinct Num_dossier) as tot from tab_patient where ethnie=3 ');
$requeteethnie3tt->execute();
$ligneethnie3tt = $requeteethnie3tt->fetch();
$requeteethnie3t = $bdd->prepare('select   count( distinct c.N_dossier) as tot from tab_contacto c inner join tab_patient p on c.N_dossier= p.Num_dossier where p.ethnie=3');
$requeteethnie3t ->execute();
$ligneethnie3t = $requeteethnie3t->fetch();

$requeteethnie4tt = $bdd->prepare('select count( distinct Num_dossier) as tot from tab_patient where ethnie=4 ');
$requeteethnie4tt->execute();
$ligneethnie4tt = $requeteethnie4tt->fetch();
$requeteethnie4t = $bdd->prepare('select   count( distinct c.N_dossier) as tot from tab_contacto c inner join tab_patient p on c.N_dossier= p.Num_dossier where p.ethnie=4');
$requeteethnie4t->execute();
$ligneethnie4t = $requeteethnie4t->fetch();

$requeteethnie5tt = $bdd->prepare('select count( distinct Num_dossier) as tot from tab_patient where ethnie=5 ');
$requeteethnie5tt->execute();
$ligneethnie5tt = $requeteethnie5tt->fetch();
$requeteethnie5t = $bdd->prepare('select   count( distinct c.N_dossier) as tot from tab_contacto c inner join tab_patient p on c.N_dossier= p.Num_dossier where p.ethnie=5');
$requeteethnie5t->execute();
$ligneethnie5t = $requeteethnie5t->fetch();



?>


<table>
	<tr><th></th><th> Proportions de lentilles </th><th> Nombre moyen de consultations  </th> </tr> 
	<tr><th>Sexe</th></tr> 
	<tr><td>Femmes </td><td> <?php echo round(($ligne6["tot"]/$ligne5["tot"])*100,2), "%" ?> </td><td> <?php echo $ligne2["moyenne"] ?> </td></tr> 
	<tr><td>Hommes </td><td> <?php echo round(($ligne4["tot"]/$ligne3["tot"])*100,2), "%" ?> </td><td> <?php echo $ligne1["moyenne"] ?> </td></tr> 
	<tr><th>Tabagisme actif</th></tr> 
	<tr><td> Oui </td><td> <?php echo round(($ligne10["tot"]/$ligne9["tot"])*100,2), "%" ?> </td><td> <?php echo $ligne7["moyenne"] ?> </td></tr> 
	<tr><td> Non </td><td> <?php echo round(($ligne12["tot"]/$ligne11["tot"])*100,2), "%" ?> </td><td> <?php echo $ligne8["moyenne"] ?> </td></tr> 
	<tr><th>CSP</th></tr> 
	<tr><td> Agriculteurs Indépendants </td><td> <?php echo round(($lignecsp1t["tot"]/$lignecsp1tt["tot"])*100,2), "%" ?> </td><td> <?php echo $lignecsp1["moyenne"] ?> </td></tr> 
	<tr><td> Artisans, commerçants et chefs d'entreprise </td><td> <?php echo round(($lignecsp2t["tot"]/$lignecsp2tt["tot"])*100,2), "%" ?> </td><td> <?php echo $lignecsp2["moyenne"] ?> </td></tr> 
	<tr><td> Cadres, professions libérales, professeurs  </td><td> <?php echo round(($lignecsp3t["tot"]/$lignecsp3tt["tot"])*100,2), "%" ?> </td><td> <?php echo $lignecsp3["moyenne"] ?> </td></tr> 
	<tr><td> Professions intermédiaires de l'enseignement...</td><td> <?php echo round(($lignecsp4t["tot"]/$lignecsp4tt["tot"])*100,2), "%" ?> </td><td> <?php echo $lignecsp4["moyenne"] ?> </td></tr> 
	<tr><td> Employés </td><td> <?php echo round(($lignecsp5t["tot"]/$lignecsp5tt["tot"])*100,2), "%" ?> </td><td> <?php echo $lignecsp5["moyenne"] ?> </td></tr> 
	<tr><td> Ouvriers </td><td> <?php echo round(($lignecsp6t["tot"]/$lignecsp6tt["tot"])*100,2), "%" ?> </td><td> <?php echo $lignecsp6["moyenne"] ?> </td></tr> 
	<tr><td> Retraités </td><td> <?php echo round(($lignecsp7t["tot"]/$lignecsp7tt["tot"])*100,2), "%" ?> </td><td> <?php echo $lignecsp7["moyenne"] ?> </td></tr> 
	<tr><td> Sans activité  </td><td> <?php echo round(($lignecsp8t["tot"]/$lignecsp8tt["tot"])*100,2), "%" ?> </td><td> <?php echo $lignecsp8["moyenne"] ?> </td></tr> 
	<tr><th>Ethnie</th></tr> 
	<tr><td> Caucasien </td><td> <?php echo round(($lignecsp1t["tot"]/$lignecsp1tt["tot"])*100,2), "%" ?> </td><td> <?php echo $lignecsp1["moyenne"] ?> </td></tr> 
	<tr><td> Africain ou Afro-antillais </td><td> <?php echo round(($lignecsp2t["tot"]/$lignecsp2tt["tot"])*100,2), "%" ?> </td><td> <?php echo $lignecsp2["moyenne"] ?> </td></tr> 
	<tr><td> Asiatique ou Indien  </td><td> <?php echo round(($lignecsp3t["tot"]/$lignecsp3tt["tot"])*100,2), "%" ?> </td><td> <?php echo $lignecsp3["moyenne"] ?> </td></tr> 
	<tr><td> Arabe </td><td> <?php echo round(($lignecsp4t["tot"]/$lignecsp4tt["tot"])*100,2), "%" ?> </td><td> <?php echo $lignecsp4["moyenne"] ?> </td></tr> 
	<tr><td> Autre </td><td> <?php echo round(($lignecsp5t["tot"]/$lignecsp5tt["tot"])*100,2), "%" ?> </td><td> <?php echo $lignecsp5["moyenne"] ?> </td></tr> 
	

</table>

</div>
</body>
<html>

