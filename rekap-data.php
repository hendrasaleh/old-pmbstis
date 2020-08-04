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
		$status = $row['status'];
	}
}


?>
<h1 class="page-head-line">SEKOLAH TINGGI ILMU SYARIAH HUSNUL KHOTIMAH</h1>
<h2>Sistem Penerimaan Mahasiswa Baru Online</h2>
<br>
<div class="col-md-12">
	<?php
	$tmpdata = new database;
	$getdata = $tmpdata->getDb()->query("SELECT * FROM data_calon_mhs");
	$datas = $getdata->fetchAll();
	$i = 1;
	?>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3>REKAP DATA CALON MAHASISWA BARU</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>No. Pendaftaran</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Asal Sekolah</th>
							<th>Prodi Pilihan</th>
							<th>Status Pendaftaran</th>
						</tr>
					</thead>
					<tbody>
						<tr>
						<?php
							foreach ($datas as $key) {
								echo '<tr>';
								echo "<td>".$i."</td>";
								echo "<td>".$key['no_pendaftaran']."</td>";
								echo "<td>".$key['nama_lengkap']."</td>";
								echo "<td>".$key['kabupaten']." - ".$key['provinsi']."</td>";
								echo "<td>".$key['asal_sekolah']."</td>";
								switch ($key['kode_prodi']) {
										case 'ahs':
											# code...
											echo "<td>Hukum Keluarga Islam</td>";
											break;
										case 'hes':
											# code...
											echo "<td>Hukum Ekonomi Syariah</td>";
											break;
										
										default:
											# code...
											echo "<td>Belum memilih</td>";
											break;
									}
								if ($key['status'] == 0) {
									echo '<td><span class="label label-danger">not verified</span></td>';
								} else {
									echo '<td><span class="label label-success">verified</span></td>';
								}
								echo '</tr>';
								$i++;
							}
						?>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>