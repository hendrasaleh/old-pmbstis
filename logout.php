<?php
session_start();
include "database.php";
include "function.php";
$absen = new database;
$nama = $_SESSION['username'];

unset($_SESSION['username']);
session_destroy();
header("location: ".MAIN_URL."home.php");