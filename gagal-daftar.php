<?php
$status = $_GET['status'];

if ($status == 1) {
	# code...
	$content = "warning.php";
} else {
	# code...
	$content = "warning2.php";
}

require "template2.php";