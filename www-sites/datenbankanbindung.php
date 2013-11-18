<?php

// Datenbankanbindung
$datenbank = @mysql_connect("127.0.0.1","root","")
			 OR die ("Die Verbindung zur Datenbank konnte nicht hergestellt werden!");
			 
			 mysql_select_db("db_progipedia",$datenbank)
			 OR die ('Die Datenbank "db_progipedia" nicht vorhanden!');
?>