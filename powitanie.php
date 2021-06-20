<?php

	SESSION_START();
	
	if (!isset($_SESSION['zalozone']))
	{
		header('Location: logowanie.php');
		exit();
	}
	

?>


<!doctype html>

<html>

<head>
	<meta charset="utf-8"/>
	<title>McSpace</title>
</head>

<body>
	<h3>Dziękujemy za założenie konta na naszym serwisie!</h3>
	<br/>
	<h3>Możesz już się zalogować:</h3>
	
	<form action="login.php" method="POST">
	Login: <br/>
	<input type="text" name="login"> <br/>
	Hasło: <br/>
	<input type="password" name="haslo"> <br/>
	<input type="submit" value="Zaloguj się">
	
	</form>
	
</body>


</html>