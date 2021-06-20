<?php

	SESSION_START();
	
	if (isset($_SESSION['logged']))
	{
		header('Location: index.php');
		exit();
	}
	
	
	if (isset($_POST['imie']))
	{
		$imie = $_POST['imie'];
		$nazwisko = $_POST['nazwisko'];
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		
		require "bazadanych.php";
		$conn = new mysqli($host, $user, $pass, $database);
		$sql = "SELECT Login from uzytkownicy WHERE Login = '$login'";
		$zapytanie = $conn->query($sql);
		$zapytanie->fetch_assoc();
		if ($zapytanie->num_rows == 0)
		{
			$_SESSION['zalozone'] = "tak";
			$sql = "INSERT INTO uzytkownicy VALUES(NULL, '$imie', '$nazwisko', '$login', '$haslo')";
			$zapytanie = $conn->query($sql);
			$conn->close();
			header('Location: powitanie.php');
		}
		else
		{
			$_SESSION['blad'] = "Istnieje już użytkownik o takim loginie";
		}
		unset($_POST['imie']);
		unset($_POST['nazwisko']);
		unset($_POST['login']);
		unset($_POST['haslo']);
		
	}

?>


<!doctype html>

<html>

<head>
	<meta charset="utf-8"/>
	<title>Zarejestruj się</title>
</head>

<body>
	<h3>Rejestracja</h3> <br/>
	
	<form action="rejestracja.php" method="post">
	Imię: <br/> <input type="text" name="imie" pattern="[A-ZĄĘĆŃÓŚŻŹŁ][a-ząęćńóśżźł]{1,30}" required title="Podaj poprawne imię"> <br/>
	Nazwisko: <br/> <input type="text" name="nazwisko" pattern="[A-ZĄĘĆŃÓŚŻŹŁ][a-ząęćńóśżźł]{1,30}" required title="Podaj poprawne nazwisko"> <br/>
	Login: <br/> <input type="text" name="login" pattern="[A-ZĄĘĆŃÓŚŻŹŁa-ząęćńóśżźł]{3,20}" required title="Login musi zawierać od 3 do 20 liter"> <br/>
	Hasło: <br/> <input type="password" name="haslo" pattern=".{8,}" required title="Hasło musi zawierać minimum 8 znaków"> <br/>
	<?php
		if (isset($_SESSION['blad']))
		{
			echo "<br/> <b>".$_SESSION['blad']."</b> <br/>";
			unset($_SESSION['blad']);
		}
	?>
	<br/> <input type="submit" value="Zarejestruj się">
	</form>
</body>


</html>