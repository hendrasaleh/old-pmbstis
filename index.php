<?php
session_start();

include "function.php";


if (isset($_GET['hal'])) {
	$file = $_GET['hal'];
}

else {
	$file = 'home-akun';
}

$content = $file.".php";

if (!isset($_SESSION['username']))
{
	header("location: ".MAIN_URL."home.php");
}

elseif ($_SESSION['status'] == 1) {
	header("location: ".MAIN_URL."home-admin.php");
}

else
{

	if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800))
	{
		session_unset();
		session_destroy();

		header("location: ".MAIN_URL."home.php");
	}

	$_SESSION['LAST_ACTIVITY'] = time();

	require "template.php";
}