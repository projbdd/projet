<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title> Modifier information utilisateur </title>
	</head>
<body>

<form method = "POST" action = "Update_user.php" >
    <fieldset><legend><h3><?php echo "Modifier le : ".$_POST['selec']." de l'utilisateur ".$_POST['ID_to_update'];?></h3></legend>
        Ancien <?php echo $_POST['selec'];?> <input name = "old"> </br>
		Nouveau <?php echo $_POST['selec'];?> <input name = "new"></br>
		Confirmer <?php echo $_POST['selec'];?> <input name = "confirm"></br>
        <input type="submit" value="Confirmer"/>
    </fieldset>
</form>
</body>
</html>