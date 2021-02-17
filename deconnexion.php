
<!-- PAGE DE GRACE Z.-->

<?php
// Cette page ferme la session et oriente l'utilisateur vers la page de connexion 


session_start();

header ("Location: 1_CONNEXION.html");

session_destroy();

?>

