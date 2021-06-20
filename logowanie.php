<?php

	SESSION_START();
	
	if (isset($_SESSION['logged']))
	{
		header('Location: index.php');
		exit();
	}
	

?>

<!doctype html>

<html>

<head>
	<meta charset="utf-8"/>
	<title>Logowanie</title>
</head>

<body>
	<h1>McSpace</h1><br/>
	<h3>Logowanie</h3>	
	
	<form action="login.php" method="POST">
	Login: <br/>
	<input type="text" name="login"> <br/>
	Hasło: <br/>
	<input type="password" name="haslo"> <br/>
	<input type="submit" value="Zaloguj się">
	
	</form>
	
	
	<br/><br/><br/>
		<a href="rejestracja.php">Nie masz jeszcze konta? Zarejestruj się!</a>
		
	
</body>


</html>