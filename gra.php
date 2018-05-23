<?php

  session_start();
  
  if(!isset($_SESSION['zalogowany']))
  {
	  header('Location: index.php');
	  exit();
  }

?>


<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
    <title>Qrt-Hdst - gra przeglądarkowa</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>    
<?php

  echo "<p>Witaj ".$_SESSION['user'].'![ <a href="logout.php">Wyloguj się!</a> ]</p>';
  echo "<p><b>Drewno</b>:".$_SESSION['drewno'];
  echo " |<b>Kamień:".$_SESSION['kamien'];
  echo " |<b>Zboże:".$_SESSION['zboze']."</p>";
    
  echo "<p><b>E-mail</b>: ".$_SESSION['email']; 
  echo "<br/><b>Dni Premium</b>: ".$_SESSION['dnipremium']."</p>"; 

?>
</body>
</html>