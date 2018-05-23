<?php

  session_start();

  if( ((isset($_SESSION['zalogowany'])) &&($_SESSION['zalogowany']))  == true ){
      echo 'chlip';
      header('Location: gra.php');
      exit();//wychodzimy z pliku index.php
  }

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
    <title>Qrt-Hdst - gra przeglądarkowa.</title>
    <link rel="stylesheet" href="css/szablon.css" type="text/css" />
    <link rel="stylesheet" href="css/index.css" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">
</head>

<body>    
    <div id="cytat"> Znajdziemy drogę, lub wykreślimy nową - Hannibal Barkas </div>
    
	<div id="rejestracja">
		<a href = "rejestracja.php">Rejestracja - załóż darmowe konto!</a>
    </div>
	
    <form action="zaloguj.php" method="post">
        Login: <br/> <input type="text" name="login"/> <br/>
        Hasło: <br/> <input type="password" name="haslo" /> <br/> <br/>
        <input type="submit" value="zaloguj sie"/>
    </form>
    
<?php
  //isset-em sprawdzam czy w sesji istnieje zmienna o naziwe blad 
  if(isset($_SESSION['blad'])){
    echo $_SESSION['blad'];
  }
    
?>
    
</body>
</html>