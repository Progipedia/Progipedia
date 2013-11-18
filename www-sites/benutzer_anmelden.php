<?php
session_start();
?>

<!DOCTYPE HTML>

<html>

  <head>
  
	<title>Progipedia/Anmeldung</title>
	<link rel="stylesheet" type="text/css" href="../css/standard.css" />
    <link rel="stylesheet" type="text/safari" href="../css/standard_safari.css" />
	<meta charset="UTF-8" />
	<link rel="icon" href="../Bilder/favicon.ico" type="image/x-icon"/>
    
  </head>

  <body>
  
<?php

	// Datenbankanbindung
	include ("datenbankanbindung.php");

if (isset($_POST['benutzername']) && isset($_POST['passwort']) && !isset($_SESSION['berechtigter_benutzer'])) {

	//Variablenzuweisung
	$benutzername = $_POST['benutzername'];
	$passwort = md5($_POST['passwort']);
	
	$exit = 0;

	//Überprüfung auf Korrektheit der Feldeintragung
	if ($benutzername == "" || $passwort == "d41d8cd98f00b204e9800998ecf8427e") {
		echo "Bitte füllen Sie beide Felder aus! <br />";
		$exit = 1; 
	}
	
	//Verlassen des PHP-Programmes
	if ($exit == 1) {
		echo '<a href="benutzer_anmelden.php">Erneut versuchen</a>';
		mysql_close($datenbank);
		exit;
	}

	//Suchen des Benutzers
	$abfrage = "SELECT benutzername, passwort
				FROM tbl_benutzer
				WHERE benutzername LIKE '$benutzername' LIMIT 1";
			
	$ergebnis = mysql_query($abfrage);
	$menge = mysql_num_rows($ergebnis);
	if ($menge == 0) {
		echo 'Der Benutzer <span class="fett">'.$benutzername.'</span> existiert nicht! <br /> <a href="benutzer_anmelden.php">Erneut versuchen</a>';
	}
	else {
		$datensatz = mysql_fetch_object($ergebnis);
	
		if ($datensatz->passwort == $passwort) {

			//Feststellung der Benutzergruppe
			$abfrage = "SELECT bg.bezeichnung
						FROM tbl_benutzer b, tbl_benutzergruppe bg
						WHERE b.benutzername = '$benutzername' AND b.benutzergruppe_id = bg.id_benutzergruppe";
			$ergebnis = mysql_query($abfrage);
		
			$benutzergruppe = mysql_result($ergebnis,0,0);
		
			//Sessionvariablen zuweisen
			if ($benutzergruppe == "Registrierter Benutzer") {
				$_SESSION['berechtigter_benutzer'] = 3;
			}
			if ($benutzergruppe == "Moderator") {
				$_SESSION['berechtigter_benutzer'] = 2;
			}
			if ($benutzergruppe == "Administrator") {
				$_SESSION['berechtigter_benutzer'] = 1;
			}
			$_SESSION['benutzername'] = $benutzername;
		
			echo 'Herzlich Willkommen <span class="fett">'.$benutzername.'</span><br/><a href="index.php">Zur Startseite</a>';
		}
		else {
			echo 'Sie haben ein falsches Passwort verwendet! <br /> <a href="benutzer_anmelden.php">Erneut versuchen</a>';
		} 
		
	}

	exit;

}

else if (isset($_SESSION['berechtigter_benutzer'])) {
	
	echo 'Sie sind bereits als <span class="fett">'.$_SESSION['benutzername'].'</span> angemeldet.<br/>Sie können im angemeldetem Zustand keine erneute Anmeldung vornehmen!<br/>Bitte melden Sie sich zuvor ab:<br/>';

?>

	<form action="benutzer_abmelden.php" method="POST">
	<input type="submit" value="Abmelden" name="abmelden">
	</form><br/>

	<a href="index.php">Zur Startseite</a>
<?php

	exit;

}

?>

  	<h1>Anmeldung</h1>
	<form action="benutzer_anmelden.php" method="POST">
		<input type="text" name="benutzername" maxlength="30" size="21" placeholder="Benutzername" />
		<input type="password" name="passwort" maxlength="15" size="21" placeholder="Passwort" />
		<input type="submit" value="Abschicken" />
	</form> <br />
	<a href="benutzer_registrieren.php">Regestrieren</a>
    
<?php

mysql_close($datenbank);

?>

		<br/><br/><a href="index.php">Zur Startseite</a>

  </body>

</html>