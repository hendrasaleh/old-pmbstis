<?php
$data = new database;

$no_pendaftaran = $_POST['no_pendaftaran'];
$aksi = $_POST['tindakan'];

if ($aksi == 'setuju') {

	$verify = $data->getDb()->query("UPDATE data_calon_mhs SET status ='1' WHERE no_pendaftaran = '$no_pendaftaran'");
	if ($verify) {
		header("location: ".MAIN_URL."home-admin.php?hal=admin-rekap-data");
	} else {
		echo "Gagal query.";
	}

} else {
	
	$verify = $data->getDb()->query("UPDATE data_calon_mhs SET status ='0' WHERE no_pendaftaran = '$no_pendaftaran'");
	if ($verify) {
		header("location: ".MAIN_URL."home-admin.php?hal=admin-rekap-data");
	} else {
		echo "Gagal query.";
	}

}


?>
