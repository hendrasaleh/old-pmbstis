<?php
include "function.php";

$conn = new database;
$username = strtolower($_POST['username']);
$passwd = md5($_POST['password']);


if (!isset($username) || !isset($passwd))
{
	header("location: ".MAIN_URL."home.php");
}
elseif (empty($username) || empty($passwd))
{
	header("location: ".MAIN_URL."home.php");
}

else

{
	
	$hasil = $conn->getDb()->query("SELECT * FROM user_table WHERE username = '$username' AND password = '$passwd'");
	$data = $hasil->fetchAll();
	$rowCount = count($data);

	if ($rowCount == 1)
	{
		foreach ($data as $row)
		{
			$username = $row['username'];
			$level = $row['level'];
			
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['status'] = $level;
			header("location: ".MAIN_URL."index.php");
		}
	}
	else
	{
		header("location: ".MAIN_URL."home.php");
	}
}
