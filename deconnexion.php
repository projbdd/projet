

<?php
// Cette page ferme la session et oriente l'utilisateur vers la page de connection 


session_start();

header ("Location: motpasse_corrigé.html");

session_destroy();

?>

