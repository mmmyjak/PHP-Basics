<?php

	SESSION_START();

	if (!isset($_POST['login']) || !isset($_POST['haslo']))
	{
		
		header('Location: logowanie.php');
		exit();
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		require "bazadanych.php";
		$conn = new mysqli($host, $user, $pass, $database);
		$sql = "SELECT * from uzytkownicy WHERE Login = '$login' AND Haslo = '$haslo'";
		$zapytanie = $conn->query($sql);
		$wiersz = $zapytanie->fetch_assoc();
		if ($zapytanie->num_rows == 1)
		{
			$_SESSION['logged'] = "tak";
			$_SESSION['login'] = $wiersz['Login'];
			$_SESSION['haslo'] = $wiersz['Haslo'];
			$_SESSION['imie'] = $wiersz['Imie'];
			$_SESSION['nazwisko'] = $wiersz['Nazwisko'];
			$conn->close();
			header('Location: index.php');
		}
		
	}
	
	

?>


<!doctype html>

<html>

<head>
	<meta charset="utf-8"/>
	<title>McSpace</title>
</head>

<body>
	

</body>


</html>