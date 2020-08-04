<?php

$camaba = new database;

$username = $_SESSION['username'];
$hasil = $camaba->getDb()->query("SELECT * FROM data_calon_mhs WHERE username = '$username'");
$data = $hasil->fetchAll();
$rowCount = count($data);

if ($rowCount == 1) {
	foreach ($data as $row) {
		# code...
		$no_pendaftaran = $row['no_pendaftaran'];
	}
}

$tmpdata = new database;
$getdata = $tmpdata->getDb()->query("SELECT * FROM data_calon_mhs");
$datas = $getdata->fetchAll();
print_r($datas);
$i = 1;



?>