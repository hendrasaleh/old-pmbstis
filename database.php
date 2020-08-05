<?php

class database
{
	function getDb() {
		$dbh = new PDO('mysql:host=localhost;dbname=sim', 'hendra', 'h4k4n3kunXXX');
		return $dbh;
	}
}