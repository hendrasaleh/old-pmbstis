<?php

$no_pendaftaran = $_POST['no_pendaftaran'];
$fileimage1 = $_FILES['myimage1'];
$fileimage2 = $_FILES['myimage2'];
$fileimage3 = $_FILES['myimage3'];
$jenis_berkas1 = $_POST['jenis_berkas1'];
$jenis_berkas2 = $_POST['jenis_berkas2'];
$jenis_berkas3 = $_POST['jenis_berkas3'];

?>

<h1 class="page-head-line">FORM PENDAFTARAN MAHASISWA BARU</h1>
<div class="col-md-10">
	<?php
		insertImage($no_pendaftaran, $fileimage1, $jenis_berkas1);
		insertImage($no_pendaftaran, $fileimage2, $jenis_berkas2);
		insertImage($no_pendaftaran, $fileimage3, $jenis_berkas3);
	?>
</div>
