<?php
session_start();
?>

<!DOCTYPE html>

<html>

  <head>

	<title>Progipedia/Hauptseite</title>
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
				<li><span id="nav_aktiv">Startseite</span></li>
                
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

			<table>
				<tbody>
					<tr>
						<td colspan="2" class="box">
							<div class="zentrieren">
								<h1 id="index_h1">Progipedia</h1>
								<p>
									Progipedia ist eine Dokumentationsplattform für sämtliche Lerninhalte im Fach Programmierung des 3-jährigen <abbr title="Informationstechnischer Assistent">ITA</abbr>-Lehrgangs. <abbr title="Berufskolleg für Technik und Informatik">BTI</abbr>-Schüler haben die Möglichkeit Artikel über programmierspezifische Begriffe zu erstellen, welche dann für die Schüler zur Verfügung stehen.
								</p>
							</div>
						</td>
					</tr>
					<tr>
						<td class="box">
							<h2>Neue Artikel</h2>
							<p>
								Auflistung der neu erstellten Artikel:
							</p>
							<ul class="index_listenpunkte">
								<li>
									<a href="....php">...</a>
								</li>
								<li>
									<a href="....php">...</a>
								</li>
								<li>
									<a href="...">...</a>
								</li>
							</ul>
						</td>
						<td class="box">
							<h2>Hilfe</h2>
							<p>
								Die Hilfeseiten stellen umfangreiche Informationen über die Strukturierungs- und Formatierungsvorgaben für die Erstellung eines Artikels bereit sowie andere nützliche Hinweise für dieses Wiki.<br/>
								Hier die Links zu den wichtigsten Hilfeseiten:
							</p>
							<ul class="innenabstand_links10px_oben5px">
								<li class="inline">
									<a href="hilfe:artikel_erstellen.php">Artikel erstellen</a>,
								</li>
								<li class="inline">
									<a href="hilfe:Medien.php">Medien</a>
								</li>
							</ul>
						</td>
					</tr>
					<tr>
						<td colspan="2" class="box">
							<h2>Administratoren</h2>
							<p>
								<a href="....php">Admin 1</a>, 
								<a href="....php">Admin 2</a>
							</p>
						</td>
					</tr>
				</tbody>	
			</table>
            
	    </article>

	</section>
    
<!-- Fußbereich -->

    <footer>
    
		<a href="ueber_progipedia.php">Über Progipedia</a> | <a href="impressum.php">Impressum</a>
        
    </footer>

  </body>

</html>
