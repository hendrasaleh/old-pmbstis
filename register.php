<?php

require_once "database.php";

$url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$url .= "://".$_SERVER['HTTP_HOST'];
$url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

define('MAIN_URL', $url);

function isEmail($emailAddress) {
          return preg_match('/^([A-Za-z][A-Za-z0-9\-\.\_]*)\@([A-Za-z][A-Za-z0-9\-\_]*)(\.[A-Za-z][A-Za-z0-9\-\_]*)+$/',$emailAddress) ;
     }

$reg = new database;

$nama = addslashes($_POST['nama']);
$emailAddress = strtolower($_POST['email']);
$password = md5($_POST['password']);
$repass = md5($_POST['repassword']);

$cek = $reg->getDb()->query("SELECT * FROM user_table WHERE username = '$emailAddress'");
$cek2 = $cek->fetchAll();
$rowCount = count($cek2);

if (isEmail($emailAddress) == FALSE) {
    header("location: ".MAIN_URL."gagal-daftar.php?status=1");
} elseif ($rowCount == 1) {
	# code...
	header("location: ".MAIN_URL."gagal-daftar.php?status=2");
} elseif (empty($nama) || empty($emailAddress) || empty($password)) {
	# code...
	header("location: ".MAIN_URL."gagal-daftar.php?status=1");
} elseif ($password != $repass) {
	# code...
	header("location: ".MAIN_URL."gagal-daftar.php?status=2");
} else {
	$query = "INSERT INTO user_table (nama, username, password, level) VALUES ('$nama', '$emailAddress', '$password', '2')";
	$insert = $reg->getDb()->query($query);

	if ($insert) {
		header("location: ".MAIN_URL."daftar.php");
	} else {
		echo '<div class="alert alert-danger">Registrasi gagal dilakukan. Silahkan ulangi lagi.</div>';
	}
}
