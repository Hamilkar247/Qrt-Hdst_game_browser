<?php

  session_start();

  if( (!isset($_SESSION['udanarejestracja'])) ){
      header('Location: index.php');
      exit();//wychodzimy z pliku index.php
  }
  else
  {
	 unset($_SESSION['udanarejestracja']);
  }
  
  	//Usuwanie zmiennych pamiętających wartości wpisane do formularza
	if (isset($_SESSION['fr_nick'])) unset($_SESSION['fr_nick']);
	if (isset($_SESSION['fr_email'])) unset($_SESSION['fr_email']);
	if (isset($_SESSION['fr_haslo1'])) unset($_SESSION['fr_haslo1']);
	if (isset($_SESSION['fr_haslo2'])) unset($_SESSION['fr_haslo2']);
	if (isset($_SESSION['fr_regulamin'])) unset($_SESSION['fr_regulamin']);
	
	//Usuwanie błędów rejestracji
	if (isset($_SESSION['e_nick'])) unset($_SESSION['e_nick']);
	if (isset($_SESSION['e_email'])) unset($_SESSION['e_email']);
	if (isset($_SESSION['e_haslo'])) unset($_SESSION['e_haslo']);
	if (isset($_SESSION['e_regulamin'])) unset($_SESSION['e_regulamin']);
	if (isset($_SESSION['e_bot'])) unset($_SESSION['e_bot']);

	
	//Usuwanie zmiennych pamietajacych wpisane wartosci do formularza
	if(isset($_SESSION['fr_nick'])) unset($_SESSION['fr_nick']);
	if(isset($_SESSION['fr_email'])) unset($_SESSION['fr_email']);
	if(isset($_SESSION['fr_regulamin'])) unset($_SESSION['fr_regulamin']);
	
	
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
    <title>Qrt-Hdst - gra przeglądarkowa.</title>
    <link rel="stylesheet" href="css/szablon.css" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">
</head>

<body>  

    <div id="cytat"> Znajdziemy drogę, lub wykreślimy nową - Hannibal Barkas </div>

	Dziekujemy za rejestracje w serwisie! Możesz już zalogować się na swoje konto<br /> <br />
	
	<a href="index.php">Zaloguj się na swoje konto!</a>
	<br />
	<br />
	


    
<?php
  //isset-em sprawdzam czy w sesji istnieje zmienna o naziwe blad 
  if(isset($_SESSION['blad'])){
    echo $_SESSION['blad'];
  }
    
?>
    
</body>
</html>