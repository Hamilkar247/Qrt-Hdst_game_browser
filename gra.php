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
    <link rel="stylesheet" href="css/szablon.css" type="text/css" />
    <link rel="stylesheet" href="css/gra.css" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
</head>

<body>  
	<div id="container">
		<div id="logo" >
		<?php
		  echo "Witaj ".$_SESSION['user'].'![ <a href="logout.php">Wyloguj się!</a> ]';
		  echo "<b>E-mail</b>: ".$_SESSION['email']; 
		  echo "<b> Dni Premium</b>: ".$_SESSION['dnipremium']."</p>"; 
		  echo "<b>Drewno</b>:".$_SESSION['drewno'];
		  echo " |<b>Kamień:".$_SESSION['kamien'];
		  echo " |<b>Zboże:".$_SESSION['zboze']."";
			

		?>
		</div>
		<div id="nav">
			<div class="kafelek">
			 <p><a href="Miasto.php">Miasto</a> </p>
			</div>
			
			<div class="kafelek">
			 <p><a href="Dyplomacja.php">Dyplomacja</a> </p>
			</div>
			
			<div class="kafelek">
			 <p><a href="Mapa.php">Mapa</a> </p>
			</div>
			<div class="kafelek">
			 <p><a href="Ludnosc.php">Ludność</a> </p>
			</div>
			<div class="kafelek">
			 <p><a href="Wojsko.php">Wojsko</a> </p>
			</div>
			<div class="kafelek">
			 <p><a href="Eventy.php">Eventy</a> </p>
			</div>
		</div>
		<div id="content">
			<h2>Legend of Elissa</h2>
			This paper deals with the origin of the toponym Byrsa rather known as the Byrsa hill, the
centre of the Punic Carthage, a hilltop overlooking what is today known as the Gulf of Tunis
and whose name is often associated with carthage (Carthage-Byrsa). This area, a current
elegant residential city, offers wonderful vestiges and relics of ancient civilizations.
Indeed, the toponym of Byrsa is closely linked to the story of the founding of the city of
Carthage. According to various sources, this story is legendary as it recounts the shrewdness
of the Princess Elissa from Tyre (in Lebanon) who came to these shores to set up a new city
(Carthage).
Given the various cultures having succeeded (Phoenico-Punic, Roman, Paleochristian,
Arabic) and besides the historical depth of Tunisia that they recall, these toponyms
represent a part of the national cultural patrimony and serve as a witness to the enduring
heritage that needs to be preserved by all means, especially through the standardization of
geographical names. In present day Tunisia, they are still an important 
		<br/>
		<br/>
THE HISTORY OF CARTHAGE
Carthage, in Arabic : قرطاج ; in Latin : Carthage, Carthago or Karthago ; in Punic : KartHadasht,
is located in the northern suburb of the capital, situated 17km from Tunis with a
population of about 21.000. Carthage has been classified a UNESCO world heritage site
since 26 October 1979.
Founded in 814 BC by the phoeniciens (Elissa, princess of Tyre), Carthage - or in Punic,
Kart- Hadasht, meaning new city or shiny city-, is an extensive archaeological site, located on
a hill (Byrsa hill) dominating the Gulf of Tunis and the surrounding plain. Exceptional place of
mixing, diffusion and blossoming of several cultures that succeeded one another (PhoenicoPunic,
Roman, Paleochristian and Arab)

		</div>

		<div id="ad">
			<img src="img/port_cartaginian.jpg"/>
		</div>
	
		<div id="footer">
			Gra przeglądarkowa! &copy; Wszelkie prawa 	zastrzeżone
		</div>
	</div>
  

</body>
</html>