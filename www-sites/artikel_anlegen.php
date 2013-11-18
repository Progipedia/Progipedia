<?php
session_start();
?>

<!DOCTYPE html>

<html>

  <head>

	<title>Progipedia/Artikel anlegen</title>
	<link rel="stylesheet" type="text/css" href="../css/standard.css" />
    <link rel="stylesheet" type="text/safari" href="../css/standard_safari.css" />
	<meta charset="UTF-8" />
	<link rel="icon" href="../Bilder/favicon.ico" type="image/x-icon"/>
	
  </head>

  <body>

<!-- Kopfbereich -->

	<header>
	
		<a href="index.php"><img id="bild_banner" src="../Bilder/banner.jpg" alt="Home" title="Home"/></a>
		<img id="bild_progipedia" src="../Bilder/progipedia.jpg" alt="Progipedia" title="Progipedia"/>
        <?php 
			
			if (!isset($_SESSION['berechtigter_benutzer'])) { 
			
		?>
		<a id="benutzerkonto_anlegen" href="benutzer_registrieren.php">
			Benutzerkonto anlegen
		</a>
		<div id="login_feld">
			<form action="benutzer_anmelden.php" method="POST">
				<input type="text" name="benutzername" maxlength="30" size="21" placeholder="Benutzername" />
				<input type="password" name="passwort" maxlength="15" size="21" placeholder="Passwort" />
				<input type="submit" value="Abschicken" />
			</form>
		</div>
        <?php 
		
		}
		else {
			
		?>
		
		<div id="logout_feld">
		<form action="benutzer_abmelden.php" method="POST">
		<input type="submit" value="Abmelden" name="abmelden">
		</form>
        </div>
		
        <?php
		
		}
		
		?>
		
	</header>

<!-- Inhaltsbereich -->

	<section>

<!-- Navigationsbereich -->

		<nav>

			<!-- <form action="index.php" method="GET">
				<input id="suchen_feld" type="search" name="suche" placeholder="Suche" />
			</form> -->
			<ul>
				<li><a href="index.php">Startseite</a></li>
                
				<li><a href="hauptkategorie.php">Artikelverzeichnis</a>
                	<ul>
						<li><a href="kategorie-C.php">C</a></li>
						<li><a href="kategorie-php.php">PHP</a></li>
                        <li><a href="kategorie-JavaScript.php">JavaScript</a></li>
						<li><a href="kategorie-sql.php">SQL</a></li>
					</ul>
                </li>
                    
				<li><a href="hilfe.php">Hilfe</a>
                	<ul>
						<li><a href="hilfe-artikel_erstellen.php">Artikel erstellen</a></li>
						<li><a href="hilfe-media.php">Medien</a></li>
                	</ul>
                </li>
				
                <li><span id="nav_aktiv">Artikel anlegen</span></li>
                
				<li><a href="...">Zufälliger Artikel</a></li>
                
				<li><a href="kategorie-jahrgang.php">Jahrgang</a>
					<ul>
                   		<li><a href="kategorie-jahrgang_1.php">Jahrgang 1</a></li>
						<li><a href="kategorie-jahrgang_2.php">Jahrgang 2</a></li>
						<li><a href="kategorie-jahrgang_3.php">Jahrgang 3</a></li>
                    </ul>
                </li>

				<li><a href="kategorie-Programmierlehrer">Programmierlehrer</a>
                	<ul>
						<li><a href="herr_bendadi.php">Herr Bendadi</a></li>
						<li><a href="herr_burlisnki.php">Herr Burlinski</a></li>
						<li><a href="herr_stein.php">Herr Stein</a></li>
						<li><a href="frau_zorlu.php">Frau Zorlu</a></li>
                	</ul>
                </li>
			</ul>

		</nav>

<!-- Artikelbereich -->

		<article>

<?php
	
if (isset($_SESSION['berechtigter_benutzer'])) {

?>

	<div id="artikel-anlegen_formular">
		<form action="artikel_anlegen.php" method="POST">
			<div id="artikel-anlegen_titel">
				<input type="text" name="titel" maxlength="30" size="21" />
			</div>
			
			<div id="artikel-anlegen_einleitung">
				<textarea name="einleitung" cols="70" rows="10"></textarea>
			</div>
				
			<div id="artikel-anlegen_hauptteil">
				<textarea name="hauptteil" cols="70" rows="30"></textarea>
			</div>
				
			<div id="artikel-anlegen_kategorie">
				<input type="text" name="kategorie" size="94" />
			</div>
				
		</form>
	</div>
		
<?php

}

else {

?>

Sie haben nicht das Recht einen Artikel zu erstellen. Bitte registrieren Sie sich oder melden Sie sich an.

<?php

}

?>

	    </article>

	</section>

<!-- Fußbereich -->

    <footer>
    
		<a href="ueber_progipedia.php">Über Progipedia</a> | <a href="impressum.php">Impressum</a>
        
    </footer>

  </body>

</html>