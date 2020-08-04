<?php
$daftar = new database;

$getid = $daftar->getDb()->query("SELECT * FROM jml_pendaftar");

foreach ($getid as $row) {
	# code...
	$id = $row['no_akhir'];
}

function formatNo($num) {
	$num = $num + 1;
    switch (strlen($num))
    {
    case 1 : $NoTrans = "00".$num; break;
    case 2 : $NoTrans = "0".$num; break;
    default: $NoTrans = $num;   
    }      
    return $NoTrans;
}
$noId = formatNo($id);

//data_calon_mhs
$username = $_SESSION['username'];
$no_pendaftaran = $_POST['prodi']."1819".$noId;
$nama1 = addslashes($_POST['nama_mhs']);
$nama_mhs = strtoupper($nama1);
$jenis_kelamin = strtoupper($_POST['jenis_kelamin']);
$tmp_lahir = strtoupper($_POST['tmp_lahir']);
$tgl_lahir = $_POST['thn_lahir']."-".$_POST['bln_lahir']."-".$_POST['tgl_lahir'];
$alamat_mhs = strtoupper($_POST['alamat_mhs']);
$desa_mhs = strtoupper($_POST['desa_mhs']);
$kec_mhs = strtoupper($_POST['kec_mhs']);
$kab_mhs = strtoupper($_POST['kab_mhs']);
$prov_mhs = strtoupper($_POST['prov_mhs']);
$kodepos_mhs = $_POST['kodepos_mhs'];
$nohp_mhs = $_POST['nohp_mhs'];
$email_mhs = $_POST['email_mhs'];
$penyakit_mhs = $_POST['penyakit_mhs'];
$prodi = $_POST['prodi'];

//data_pendidikan
$jenjang01 = $_POST['jenjang01'];
$namasd = addslashes($_POST['nama_sd']);
$nama_sd = strtoupper($namasd);
$kota_sd = strtoupper($_POST['kota_sd']);
$thn_lulus_sd = $_POST['thn_lulus_sd'];
$jenjang02 = $_POST['jenjang02'];
$namasmp = addslashes($_POST['nama_smp']);
$nama_smp = strtoupper($namasmp);
$kota_smp = strtoupper($_POST['kota_smp']);
$thn_lulus_smp = $_POST['thn_lulus_smp'];
$jenjang03 = $_POST['jenjang03'];
$namasma = addslashes($_POST['nama_sma']);
$nama_sma = strtoupper($namasma);
$kota_sma = strtoupper($_POST['kota_sma']);
$thn_lulus_sma = $_POST['thn_lulus_sma'];
$jurusan = strtoupper($_POST['jurusan']);
$no_ijazah = $_POST['no_ijazah'];

//data_prestasi
$jenis_prestasi01 = strtoupper($_POST['jenis_prestasi01']);
$tingkat_prestasi01 = strtoupper($_POST['tingkat_prestasi01']);
$thn_raih_01 = $_POST['thn_raih_01'];
$jenis_prestasi02 = strtoupper($_POST['jenis_prestasi02']);
$tingkat_prestasi02 = strtoupper($_POST['tingkat_prestasi02']);
$thn_raih_02 = $_POST['thn_raih_02'];
$jenis_prestasi03 = strtoupper($_POST['jenis_prestasi03']);
$tingkat_prestasi03 = strtoupper($_POST['tingkat_prestasi03']);
$thn_raih_03 = $_POST['thn_raih_03'];

//data_lain
$sumber_info = $_POST['sumber_info'];
$infaq_st = $_POST['infaq_st'];

//data_ayah
$nama2 = addslashes($_POST['nama_ayah']);
$nama_ayah = strtoupper($nama2);
$usia_ayah = $_POST['usia_ayah'];
$pendidikan_terakhir_ayah = $_POST['pendidikan_terakhir_ayah'];
$pekerjaan_ayah = $_POST['pekerjaan_ayah']." ".$_POST['opsi_pekerjaan_ayah'];
$penghasilan_ayah = $_POST['penghasilan_ayah'];
$alamat_ayah = strtoupper($_POST['alamat_ayah']);
$desa_ayah = strtoupper($_POST['desa_ayah']);
$kec_ayah = strtoupper($_POST['kec_ayah']);
$kab_ayah = strtoupper($_POST['kab_ayah']);
$prov_ayah = strtoupper($_POST['prov_ayah']);
$kodepos_ayah = $_POST['kodepos_ayah'];
$nohp_ayah = $_POST['nohp_ayah'];
$email_ayah = $_POST['email_ayah'];

//data_ibu
$nama3 = addslashes($_POST['nama_ibu']);
$nama_ibu = strtoupper($nama3);
$usia_ibu = $_POST['usia_ibu'];
$pendidikan_terakhir_ibu = $_POST['pendidikan_terakhir_ibu'];
$pekerjaan_ibu = $_POST['pekerjaan_ibu']." ".$_POST['opsi_pekerjaan_ibu'];
$penghasilan_ibu = $_POST['penghasilan_ibu'];
$alamat_ibu = strtoupper($_POST['alamat_ibu']);
$desa_ibu = strtoupper($_POST['desa_ibu']);
$kec_ibu = strtoupper($_POST['kec_ibu']);
$kab_ibu = strtoupper($_POST['kab_ibu']);
$prov_ibu = strtoupper($_POST['prov_ibu']);
$kodepos_ibu = $_POST['kodepos_ibu'];
$nohp_ibu = $_POST['nohp_ibu'];
$email_ibu = $_POST['email_ibu'];

$query1 = "INSERT INTO data_calon_mhs (username, no_pendaftaran, nama_lengkap, jenis_kelamin, tempat_lahir, tgl_lahir, asal_sekolah, alamat, desa, kecamatan, kabupaten, provinsi, kode_pos, no_hp, email, penyakit_berat, kode_prodi) VALUES ('$username', '$no_pendaftaran', '$nama_mhs', '$jenis_kelamin', '$tmp_lahir', '$tgl_lahir', '$nama_sma', '$alamat_mhs', '$desa_mhs', '$kec_mhs', '$kab_mhs', '$prov_mhs', '$kodepos_mhs', '$nohp_mhs', '$email_mhs', '$penyakit_mhs', '$prodi')";
$query2 = "INSERT INTO data_pendidikan (no_pendaftaran, jenjang, jurusan, nama_lembaga, alamat_lembaga, thn_lulus, no_ijazah) VALUES ('$no_pendaftaran', '$jenjang01', '', '$nama_sd', '$kota_sd', '$thn_lulus_sd', ''), ('$no_pendaftaran', '$jenjang02', '', '$nama_smp', '$kota_smp', '$thn_lulus_smp', ''), ('$no_pendaftaran', '$jenjang03', '$jurusan', '$nama_sma', '$kota_sma', '$thn_lulus_sma', '$no_ijazah')";
$query3 = "INSERT INTO data_prestasi (no_pendaftaran, jenis_prestasi, tingkat, tahun) VALUES ('$no_pendaftaran', '$jenis_prestasi01', '$tingkat_prestasi01', '$thn_raih_01'), ('$no_pendaftaran', '$jenis_prestasi02', '$tingkat_prestasi02', '$thn_raih_02'), ('$no_pendaftaran', '$jenis_prestasi03', '$tingkat_prestasi03', '$thn_raih_03')";
$query4 = "INSERT INTO data_lain (no_pendaftaran, sumber_info, infaq_sekolah_tinggi) VALUES ('$no_pendaftaran', '$sumber_info', '$infaq_st')";
$query5 = "INSERT INTO data_ayah (no_pendaftaran, nama_ayah, usia, pendidikan, pekerjaan, penghasilan, alamat, desa, kecamatan, kabupaten, provinsi, kode_pos, no_hp, email) VALUES ('$no_pendaftaran', '$nama_ayah', '$usia_ayah', '$pendidikan_terakhir_ayah', '$pekerjaan_ayah', '$penghasilan_ayah', '$alamat_ayah', '$desa_ayah', '$kec_ayah', '$kab_ayah', '$prov_ayah', '$kodepos_ayah', '$nohp_ayah', '$email_ayah')";
$query6 = "INSERT INTO data_ibu (no_pendaftaran, nama_ibu, usia, pendidikan, pekerjaan, penghasilan, alamat, desa, kecamatan, kabupaten, provinsi, kode_pos, no_hp, email) VALUES ('$no_pendaftaran', '$nama_ibu', '$usia_ibu', '$pendidikan_terakhir_ibu', '$pekerjaan_ibu', '$penghasilan_ibu', '$alamat_ibu', '$desa_ibu', '$kec_ibu', '$kab_ibu', '$prov_ibu', '$kodepos_ibu', '$nohp_ibu', '$email_ibu')";

?>

<h1 class="page-head-line">FORM PENDAFTARAN MAHASISWA BARU</h1>
<div class="col-md-11">
<?php
$insert1 = $daftar->getDb()->query($query1);
if ($insert1) {
	$hasil1 = 1;
} else {
	$hasil1 = 0;
}

if ($hasil1 == 0) {
	echo '<div class="alert alert-danger">Ups, gagal input data diri!</div>';
} else {
	$insert2 = $daftar->getDb()->query($query2);
}

if ($insert2) {
	$hasil2 = 1;
} else {
	$hasil2 = 0;
}

if ($hasil2 == 0) {
	echo '<div class="alert alert-danger">Ups, gagal input data pendidikan!</div>';
} else {
	$insert3 = $daftar->getDb()->query($query3);
}

if ($insert3) {
	$delete = "DELETE FROM data_prestasi WHERE tahun = '-'";
	$qry_delete = $daftar->getDb()->query($delete);
	$hasil3 = 1;
} else {
	$hasil3 = 0;
}

if ($hasil3 == 0) {
	echo '<div class="alert alert-danger">Ups, gagal input data prestasi!</div>';
} else {
	$insert4 = $daftar->getDb()->query($query4);
}

if ($insert4) {
	$hasil4 = 1;
} else {
	$hasil4 = 0;
}

if ($hasil4 == 0) {
	echo '<div class="alert alert-danger">Ups, gagal input data lain!</div>';
} else {
	$insert5 = $daftar->getDb()->query($query5);
}

if ($insert5) {
	$hasil5 = 1;
} else {
	$hasil5 = 0;
}

if ($hasil5 == 0) {
	echo '<div class="alert alert-danger">Ups, gagal input data ayah!</div>';
} else {
	$insert6 = $daftar->getDb()->query($query6);
}

if ($insert6) {
	$hasil6 = 1;
} else {
	$hasil6 = 0;
}

if ($hasil6 == 1) {
	echo '<div class="alert alert-success">Pendaftaran berhasil dilakukan! Nomor Pendaftaran anda adalah <strong>'.$no_pendaftaran.'</strong>. Silahkan lakukan pembayaran uang pendaftaran sejumlah Rp. 200.'.$noId.' ke No. Rek. Bank Muamalat 1320014633 a.n STIS HUSNUL KHOTIMAH, dan lakukan konfirmasi pembayaran ke 081324402448.<br>Format Konfirmasi: <strong>nama#no_pendaftaran#tgl_transfer#sudah transfer uang pendaftaran STIS HK.</strong><br>contoh<br><strong>Hendra#ahs1819001#01-05-2018#sudah transfer uang pendaftaran STIS HK.</strong></div>';
} else {
	echo '<div class="alert alert-danger">Ups, gagal input data ibu!</div>';
}
?>
</div>