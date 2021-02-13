<html>
	<head>
		<meta charset="utf-8" />	
		<title>Informations patient</title>
		<link rel="stylesheet" media="screen" href="feuille_style_stats.css">
</head>

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




?>


<table>
	<tr><th></th><th> Proportions de lentilles </th><th> Nombre moyen de consultations  </th> </tr> 
	<tr><th>Sexe</th></tr> 
	<tr><td>Femmes </td><td> <?php echo round(($ligne6["tot"]/$ligne5["tot"])*100,2), "%" ?> </td><td> <?php echo $ligne2["moyenne"] ?> </td></tr> 
	<tr><td>Hommes </td><td> <?php echo round(($ligne4["tot"]/$ligne3["tot"])*100,2), "%" ?> </td><td> <?php echo $ligne1["moyenne"] ?> </td></tr> 
	<tr><th>Tabagisme actif</th></tr> 
	<tr><td> Oui </td><td> <?php echo round(($ligne10["tot"]/$ligne9["tot"])*100,2), "%" ?> </td><td> <?php echo $ligne7["moyenne"] ?> </td></tr> 
	<tr><td> Non </td><td> <?php echo round(($ligne12["tot"]/$ligne11["tot"])*100,2), "%" ?> </td><td> <?php echo $ligne8["moyenne"] ?> </td></tr> 

</table>

<html>

