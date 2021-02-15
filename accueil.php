<?php  session_start(); ?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF8" />
<title> Accueil </title>
<link rel="stylesheet" media="screen" href="feuille_style.css">
</head>

<body>
    
    <!-- Partie du haut -->
    
    <div class="navbar">   
        <a href="deconnexion.php">Déconnexion</a> // Fermetture de la session avec session_destroy();
        <div class="dropdown">
        <button class="dropbtn">Mon compte
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="mes_infos.php">Mes informations</a>
          <a href="mes_collègues.php">Mes collègues</a>
        </div>
      </div>
    </div>
  
  <!-- Contenu de la page -->
    <div  style="text-align:center">

		<table id = "table1">
		<tr><th> Patients </th><th> Statistiques </th> </tr> <tr>
			 <td>  <button name = patient><a href="mes_patients.php"> <img src=lun.jpg     height="250px" width="300px"> </a></button> </td>
			<td id>  <button name = stat ><a href="page_stats.php"> <img src=stat.png     height="250px" width="300px"> </a></button>  </td>
		</tr>
		</table>
	</div>
	
	
  
</body>
</html>

