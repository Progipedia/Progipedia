<?php
session_start();
?>

<!DOCTYPE HTML>

<html>

  <head>

	<title>Progipedia/Registrierung</title>
	<link rel="stylesheet" type="text/css" href="../css/standard.css" />
    <link rel="stylesheet" type="text/safari" href="../css/standard_safari.css" />
	<meta charset="UTF-8" />
	<link rel="icon" href="../Bilder/favicon.ico" type="image/x-icon"/>
    
  </head>

  <body>
    
<?php

	// Datenbankanbindung
	include ("datenbankanbindung.php");

if (isset($_POST['benutzername']) && isset($_POST['email']) && isset($_POST['passwort']) && isset($_POST['passwort2']) && isset($_POST['name']) && isset($_POST['vorname']) && !isset($_SESSION['berechtigter_benutzer'])) {

	//Variablenzuweisung
	$benutzername = $_POST['benutzername'];
	$email	  	  = $_POST['email'];
	$passwort	  = $_POST['passwort'];
	$passwort2	  = $_POST['passwort2'];
	$name		  = $_POST['name'];
	$vorname	  = $_POST['vorname'];

	//Überprüfung auf Korrektheit der Feldeintragung
	
	//Abfrage für die Untersuchung des bereits Vorhandenseins des selben Namens
	$abfrage = mysql_query 	("SELECT id_benutzer
							FROM tbl_benutzer
							WHERE benutzername LIKE '$benutzername'"
							);
							
	$menge = mysql_num_rows($abfrage);

	if($menge == 0) {
			
		$abfrage = mysql_query ("SELECT email
								FROM tbl_benutzer
								WHERE email LIKE '$email'"
								);
	
		$menge = mysql_num_rows($abfrage);
		
		if ($menge == 0) {
	
	
	$exit=0;
	//Email-Überprüfung
	$email_pruefung = 0;
	$email_laenge = strlen($email)-1;
	$email_at = 0;
	$email_punkt = 0;
		for ($i = 0;$i <= $email_laenge;$i++) {
		if ($email[$i] == " ") {
			$email_pruefung = 1;
		}
		if ($email[$i] == "@" && $i != 0) {
			$email_at++;
		}
	}
	if ($email_at != 1) {
		$email_pruefung = 1;
	}

	if ($benutzername == "" || $email == "" || $passwort == "" || $passwort2 == "") {
		echo "Bitte füllen Sie alle Pflichtfelder aus! <br />";
		$exit = 1; 
	}
	
	if ($email_pruefung == 1 && $email != "") {
		echo "Bitte geben Sie eine gültige E-Mail-Adresse an! <br />";
		$exit = 1; 
	}

	if ($passwort != $passwort2 && $passwort != "" && $passwort2 != "") {
		echo "Bitte verwenden Sie für beide Passwort-Felder den selben Eintrag! <br />";
		$exit = 1; 
	}
	
	if ($benutzername >= 30) {
		echo "Bitte verwenden Sie für den Benutzernamen nicht mehr als 30 Zeichen! <br />";
		$exit = 1; 
	}

	//Verlassen des PHP-Programmes
	if ($exit == 1) {
		echo '<a href="benutzer_registrieren.php">Erneut versuchen</a>';
		mysql_close($datenbank);
		exit;
	}
	
	//Passwort hashen
	$passwort = md5($passwort);
	
			//Eintragung des Benutzers
 	  		$eintrag = "Insert Into tbl_benutzer (benutzername,passwort,email,name,vorname,benutzergruppe_id)
						VALUES ('$benutzername','$passwort','$email','$name','$vorname','3')";
			$eintragen = mysql_query($eintrag);

			if($eintragen == 1) {
				echo 'Der Benutzer <span class="fett">'.$benutzername.'</span> wurde erstellt! <br /> <a href="benutzer_anmelden.php">Einloggen</a>';
		
				//Versendung der Bestätigungsemail
				$progipedia_name = "Progipedia";
				$progipedia_email = "alexander.borunski@googlemail.com"; //Zurzeit
				$email_betreff = "Willkommen bei Progipedia";
				$email_inhalt = "Hallo $benutzername, 
								 vielen Dank für die Anmeldung bei Progipedia!";
						 
				mail($email, $email_betreff, $email_inhalt, "From: $progipedia_name <$progipedia_email>");
		
   	  		}
			
		  	else {
        		echo 'Fehler bei der Registrierung! <br /> <a href="benutzer_registrieren.php">Erneut versuchen</a>';
       		}
		
		}
		else {
			echo 'Die angegebene E-Mail-Adresse existiert bereits!<br /> <a href="benutzer_registrieren.php">Erneut versuchen</a>';
		}
  		 
	}

	else {
		echo 'Der Benutzername <span class="fett">'.$benutzername.'</span> ist bereits vorhanden! <br /> <a href="benutzer_registrieren.php">Erneut versuchen</a>';
	}

	exit;

}
else if (isset($_SESSION['berechtigter_benutzer'])) {
	
		echo 'Sie sind bereits als <span class="fett">'.$_SESSION['benutzername'].'</span> angemeldet.<br/>Sie können im angemeldetem Zustand keine Registrierung vornehmen!<br/>Bitte melden Sie sich zuvor ab:<br/>';

?>

	<form action="benutzer_abmelden.php" method="POST">
	<input type="submit" value="Abmelden" name="abmelden">
	</form>

<?php

	exit;

}

?>

	<h1>Registrierung</h1>
	<form action="benutzer_registrieren.php" method="POST">
		<input type="text" name="benutzername" maxlength="30" size="21" placeholder="Benutzername" />* <br /> <br />
		<input type="text" name="email" maxlength="345" size="21" placeholder="E-Mail" />* <br /> <br />
		<input type="text" name="name" maxlength="50" size="21" placeholder="Name" /> <br /> <br />
		<input type="text" name="vorname" maxlength="50" size="21" placeholder="Vorname" /> <br /> <br />
		<input type="password" name="passwort" maxlength="15" size="21" placeholder="Passwort" />* <br /> <br />
		<input type="password" name="passwort2" maxlength="15" size="21" placeholder="Passwort wiederholen" />* <br /> <br />
		<input type="submit" value="Abschicken" />
	</form> <br />
	<a href="benutzer_anmelden.php">Einloggen</a> <br /> <br />
	Die *-Felder sind Pflichtfelder und müssen ausgefüllt werden!

<?php

mysql_close($datenbank);

?>

  </body>

</html>