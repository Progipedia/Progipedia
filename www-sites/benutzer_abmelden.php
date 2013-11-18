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

//Dieser Fall trifft ein, wenn ein Benutzer auf den Abmeldebutton klickt oder die Seite daraufhinaktualisiert (der Wert "abmelden" wurde übertragen)
if (isset($_POST['abmelden'])) {
	$abmelden = $_POST['abmelden'];

	if (isset($_SESSION['berechtigter_benutzer'])) {

		//Session wird gelöscht
		$_SESSION=array();
		session_destroy();
		
		if (!isset($_SESSION['berechtigter_benutzer'])) {
			echo "Sie haben sich erfolgreich abgemeldet!<br/>";
		}
		// Paradoxer Fall: Die Session wird zuvor gelöscht, also dürfte dieser Fall niemals eintreten!
		else {
			
			echo "Bei Ihrer Abmeldung ist ein Fehler aufgetreten!<br/>Sie besitzen noch weiterhin eine gesetzte Session-Variable!<br/> Wenden Sie sich bitte an die Administratoren oder versuchen Sie es erneut";
		
		?>

			<a href="anmelden.php">Erneut anmelden</a>
			
		
			<form action="..." method="POST">
			<input type="submit" value="Administrator melden" name="administrator_melden">
			</form>

		<?php
		
		}
		
	}

	//Dieser Fall trifft ein, wenn ein bereits abgemeldeter Benutzer erneut den Abmeldebutton betätigt (z.B. wenn der Benutzer während seiner Anmeldephase weitere Tabs offen hat, in denen der Abmeldebutton noch zu sehen ist) oder die Seite aktualisiert
	else if (!isset($_SESSION['berechtigter_benutzer'])) {
		
		echo 'Sie haben diese Seite aktualisiert oder den Abmeldebutton erneut gedrückt. Dies hat keinen Effekt!<br/> Bitte melden Sie sich an: <a href="benutzer_anmelden.php">Benutzer anmelden</a>';
		
	}

}

//Dieser Fall trifft ein, wenn ein Benutzer das PHP-Dokument in die URL-Leiste einträgt (der Wert "abmelden" wurde nicht übertragen)
else if (!isset($_POST['abmelden'])) {

	//Dieser Fall trifft ein, wenn ein angemeldeter Benutzer das PHP-Dokument in die URL-Leiste einträgt
	if (isset($_SESSION['berechtigter_benutzer'])) {
	
		echo "Eine Löschung der aktuellen Sitzung (Session) bzw. eine Abmeldung durch das Einfügen des PHP-Dokumentes in die URL-Leiste zu erzwingen ist nicht möglich.<br/>Bitte melden Sie sich über den dafür vorgesehenen Abmelde-Button ab:<br/>";
		
		?>
		
		<form action="benutzer_abmelden.php" method="POST">
		<input type="submit" value="Abmelden" name="abmelden">
		</form>
		
		<?php
		
	}
	
	//Dieser Fall trifft ein, wenn ein nicht angemeldeter Benutzer das PHP-Dokument in die URL-Leiste einträgt (der Wert "abmelden" wurde nicht übertragen)
	else if (!isset($_SESSION['berechtigter_benutzer'])) {
		
		echo 'Eine Löschung der aktuellen Sitzung (Session) bzw. eine Abmeldung durch das Einfügen des PHP-Dokumentes in die URL-Leiste zu erzwingen ist nicht möglich.<br/>Darüber hinaus sind Sie nicht angemeldet.<br/> Bitte melden Sie sich an: <a href="benutzer_anmelden.php">Benutzer anmelden</a>';
		
	}
}

?>

		<a href="index.php">Zur Startseite</a>

  </body>

</html>