<?php

  session_start();
  

  
  //tutaj sprawdzamy czy w ogole ktoras zmienna do wypelnienia została wypelniona
  if( isset( $_POST['email'] ) ){
	//udana walidacja? Załóżmy że tak!
	$wszystko_OK=true;
	
	//Sprawdz poprawność nickname
	$nick = $_POST['nick']; //zalożmy od 3 do 20 znaków
	//Sprawdzenie dlugosci nicka
	//strlen - zwraca dlugosc slowa
	if( (strlen($nick)<3) || (strlen($nick)>20) ){
		$wszystko_OK=false;
		$_SESSION['e_nick']="Nick musi posiadac od 3 do 20 znaków!";
	}
	
	if(ctype_alnum($nick) == false){
		$wszystko_OK=false;
		$_SESSION['e_nick']="Nick może składać się tylko z liter i cyfr (bez znaków narodowych)";
	}
	
	///sprawdz poprawność pola email
	
	$email=$_POST['email'];
	//wysanityzowany znak - wyczyszczony znak z niebezpieczenstw
	$emailB=filter_var($email,FILTER_SANITIZE_EMAIL);
	
	//pierwszy człon ifa mówi "zwaliduj" poprawność tego if-a
	if( (filter_var($emailB, FILTER_VALIDATE_EMAIL) == false) || ($emailB!=$email ) ){
		$wszystko_OK=false;
		$_SESSION['e_email']="Email nie poprawny, Podaj poprawny e-mail";
	}
	
	//sprawdz poprawnosc hasla
	$haslo1 = $_POST['haslo1'];
	$haslo2 = $_POST['haslo2'];
	
	//zakladamy dlugosc hasla 8 do 20
	/*if( ( strlen($haslo1)<8 ) || ( strlen($haslo1>20) ) ){
		$wszystko_OK=false;
		$_SESSION['e_haslo']="Haslo musi posiadac od 8 do 20 znaków";
	}*/
	//haslo1 ma sie rownac hasle2
	if( $_POST['haslo1']!=$_POST['haslo2'] ){
		$wszystko_OK=false;
		$_SESSION['e_haslo']="Podane hasła sie nie zgadzają, wpisz je ponownie";
	}
	
	//w sumie warto zauważyć że zahashovanie hasla zanim je wyślemy do naszej bazy danych powoduje że znika problem sanityzacji kodu - już irytujacy / jest zahashovany jakimiś znakami niebrużdzącycmi
	$haslo_hash = password_hash($haslo1,PASSWORD_DEFAULT);
	
	//Checkbox
	//kiedy checkbox jest zaznaczony isset zwraca true a kiedy jest niezaznaczony zwraca false
	if(!isset($_POST['regulamin'])){
		$wszystko_OK=false;
		$_SESSION['e_regulamin']="Potwierdz akceptacje regulaminu";
	}
	
	
	//Bor or not? Oto jest pytanie - sekretny klucz recaptcha
	$sekret = "6Ld68FoUAAAAALYhf1bUen1hlpAt1JEirK30tDKp";
	
	
	//zewentrzny adres googla , siteverify - zweryfikuj captcha dla podanej strony, getem u wysyłamy secret=.$sekret i doklejamy odpowiedz rowna sie to co nam dal w odpowiedzi zaznaczone rysunki
	
	//na całę życie zapamietaj - zawsze com w takich rzeczach, nigdy pl!
	$sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
	
	
	//dekodowanie javascript object notation - przesył danych w lekki sposób
	$odpowiedz = json_decode($sprawdz);
	
	if($odpowiedz->success == false){
		$wszystko_OK=false;
		$_SESSION['e_bot']="Potwierdź, że nie jesteś botem";
	}
	if($wszystko_OK==true){
		//Hurra wszystkie testy zaliczone, dodajemy gracza do bazy
		echo "Udana Walidacja!";exit();
	}
  }

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
    <title>Załóż darmowe konto już dziś!</title>
    <link rel="stylesheet" href="css/szablon.css" type="text/css" />
    <link rel="stylesheet" href="css/rejestracja.css" type="text/css" />
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>    
	<form method="post">
	<!Kiedy mamy method post bez action to obslugujemy po prostu post w tym samym pliku, bez przesylania go do innego!>
			Nickname: <br /><input type="text" name="nick" /> <br/>
			
			<?php
			
				if(isset($_SESSION['e_nick'])){
					echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
					unset($_SESSION['e_nick']);
				}
			
			?>
			
			E-mail: <br /><input type="text" name="email" /> <br/>
			
			<?php
			
				if(isset($_SESSION['e_email'])){
					echo '<div class="error">'.$_SESSION['e_email'].'</div>';
					unset($_SESSION['e_email']);
				}
			
			?>
			
			Twoje hasło: <br /><input type="password" name="haslo1" /> <br/>
			
			<?php
			
				if(isset($_SESSION['e_regulamin'])){
					echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
					unset($_SESSION['e_regulamin']);
				}
			
			?>
			
			Powtórz hasło: <br /><input type="password" name="haslo2" /> <br/>
			
			<br/>
			
			<label>
				<input type="checkbox" name="regulamin"> Akceptuje regulamin
			</label>
			<!label jest po to żeby naciskajac na napis zaznaczal sie !>
			
			<?php
			
				if(isset($_SESSION['e_regulamin'])){
					echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
					unset($_SESSION['e_regulamin']);
				}
			
			?>
			
			<div class="g-recaptcha" data-sitekey="6Ld68FoUAAAAAArjL54JDUkgc3hOzQTcdm88347v">
			</div>
			<?php
			
				if(isset($_SESSION['e_bot'])){
					echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
					unset($_SESSION['e_bot']);
				}
			
			?>
			<br/>
			<input type="submit" value="Zarejestruj się"/>
			<br/>
			<br/>
			<input type="submit" value="Powrót"/>
	</form
	
</body>
</html>