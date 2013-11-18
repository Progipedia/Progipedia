<?php
session_start();
?>

<!DOCTYPE html>

<html>

  <head>
 
	<title>Progipedia/Artikelbeispiel</title>
    <link rel="stylesheet" type="text/css" href="../css/standard.css" />
    <link rel="stylesheet" type="text/safari" href="../css/standard_safari.css" />
    <link rel="icon" href="../Bilder/favicon.ico" type="image/x-icon"/>
	<meta charset="UTF-8" />
	
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
				
                <li><a href="artikel_anlegen.php">Artikel anlegen</a></li>
                
				<li><a href="...">Zufälliger Artikel</a></li>
                
				<li><a href="kategorie-jahrgang.php">Jahrgang</a>
					<ul>
                   		<li><a href="kategorie-jahrgang_1.php">Jahrgang 1<br/></a></li>
						<li><a href="kategorie-jahrgang_2.php">Jahrgang 2<br/></a></li>
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

			<h1>Überschrift</h1>
			<p id="einleitung">
				Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.
			</p>
			<table id="inhaltsverzeichnis">
				<tr>
					<td>
						<h4>Inhaltsverzeichnis</h4>
						<ul>
							<li> <a href="#Unterueberschrift_1">Unterüberschrift 1</a>
                           		<ul class="liste_ausrichten_1">
									<li><a href="#Unterunterueberschrift_1">Unterunterüberschrift 1</a></li>
                           		</ul>
							</li>
							<li><a href="#Unterueberschrift_2">Unterüberschrift 2</a></li>
							<li><a href="#Unterueberschrift_3">Unterüberschrift 3</a></li>
						</ul>
					</td>
				</tr>
			</table>
			<div id="hauptteil">
				<h2><a name="Unterueberschrift_1">Unterüberschrift 1</a></h2>
				<p>
					Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est <a href="...">Lorem</a> ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita <a href="...">kasd</a> gubergren.
				</p>
				<h3><a name="Unterunterueberschrift_1">Unterunterüberschrift 1</a></h3>
				<p>
					Lorem ipsum dolor sit amet, consetetur <a href="index.php">labore</a> justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est <a href="...">Lorem</a> ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita <a href="...">kasd</a> gubergren.
				</p>
				<h2><a name="Unterueberschrift_2">Unterüberschrift 2</a></h2>
				<p>
					Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam <a href="...">lasim</a> et justo duo dolores et ea rebum.</br> Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</br> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat.
				</p>
				<h2><a name="Unterueberschrift_3">Unterüberschrift 3</a></h2>
				<p>
					Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus <a href="...">taskaram</a> est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam <a href="...">erat</a>, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut <a href="index.php">labore</a> et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</br>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse <a href="...">molesti</a> consequat.
				</p>
			</div>
            <div  id="kategoriefeld">
   		   		<a href="Kategorie_1.php">Kategorie 1</a>, <a href="Kategorie_1.php">Kategorie 2</a>
            </div>
		
	    </article>

	</section>

<!-- Fußbereich -->

    <footer>
    
		<a href="ueber_progipedia.php">Über Progipedia</a> | <a href="impressum.php">Impressum</a>
        
    </footer>

  </body>

</html>
