<?php

	SESSION_START();
	
	if (!isset($_SESSION['logged']))
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
	<?php
		$imie = $_SESSION['imie'];
		$nazwisko = $_SESSION['nazwisko'];
		
		echo "Witaj ".$imie." ".$nazwisko;
	?>
	<br/>
	<a href="wyloguj.php">Wyloguj się</a>
	
</body>


</html>