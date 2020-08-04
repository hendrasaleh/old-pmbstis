<?php

session_start();

include "function.php";


if (isset($_GET['hal'])) {
	$file = $_GET['hal'];
}

else {
	$file = 'welcome3';
}

if (isset($_GET['user'])) {
    $user = $_GET['user'];
} else {
    $user = '';
}

$content = $file.".php";

if (!isset($_SESSION['username']))
{
	header("location: ".MAIN_URL."home.php");
}

elseif ($_SESSION['status'] == 1) {
	if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800))
	{
		session_unset();
		session_destroy();

		header("location: ".MAIN_URL."home.php");
	}

	$_SESSION['LAST_ACTIVITY'] = time();

	require "template3.php";
} else {
    header("location: ".MAIN_URL."index.php");
}


