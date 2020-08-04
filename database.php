<?php

class database
{
	function getDb() {
		$dbh = new PDO('mysql:host=localhost;dbname=u7164532_maba', 'u7164532_hendra', '##h4k4n3kunXXX');
		return $dbh;
	}
}