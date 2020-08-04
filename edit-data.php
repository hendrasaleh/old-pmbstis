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

$mhs = tampilData($no_pendaftaran, 'data_calon_mhs');
$ayah = tampilData($no_pendaftaran, 'data_ayah');
$ibu = tampilData($no_pendaftaran, 'data_ibu');
$datalain = tampilData($no_pendaftaran, 'data_lain');

?>
<h1 class="page-head-line">SEKOLAH TINGGI ILMU SYARIAH HUSNUL KHOTIMAH</h1>
<h2>Sistem Penerimaan Mahasiswa Baru Online</h2>
<br>
<div class="col-md-11">
	<?php
		if ($status == 0) {
			# code...
			echo '<div class="alert alert-danger">Proses pendaftaran anda belum terverifikasi. Silahkan lakukan pembayaran dan lakukan konfirmasi ke bagian Administrasi untuk mengaktifkan status pendaftafan anda. Jumlah yang harus anda bayar adalah Rp.100.'.substr($no_pendaftaran,-3).',-</div>';
		} else {
			# code...
			echo "";
		}
		

	?>
	<div class="panel panel-primary">
		<div class="panel-heading">
			DATA CALON MAHASISWA
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<h3><strong>Data Pribadi</strong></h3>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label>Nama Lengkap</label>
							</div>
							<div class="col-md-8">
								: <?php echo $mhs['nama_lengkap']; ?>
							</div>			
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label>Tempat dan tanggal lahir</label>
							</div>
							<div class="col-md-8">
								: <?php echo $mhs['tempat_lahir'].", ".tanggal_indo($mhs['tgl_lahir']); ?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label>Alamat Lengkap</label>
							</div>
							<div class="col-md-8">
								: <?php echo $mhs['alamat'].", <strong>Desa/Kelurahan</strong> ".$mhs['desa'].", <strong>Kecamatan</strong> ".$mhs['kecamatan'].", <strong>Kabupaten</strong> ".$mhs['kabupaten'].", <strong>Provinsi</strong> ".$mhs['provinsi'].", <strong>Kode Pos</strong> ".$mhs['kode_pos']; ?>
							</div>			
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label>Nomor Handphone</label>
							</div>
							<div class="col-md-8">
								: <?php echo $mhs['no_hp']; ?>
								&emsp;&emsp; <!--karakter ini berfungsi memberikan tab -->
								<label>Email : </label>
								<?php echo $mhs['email']; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label>Penyakit berat yang pernah diderita</label>
							</div>
							<div class="col-md-8">
								: <?php echo $mhs['penyakit_berat']; ?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label>Program Studi yang dipilih</label>
							</div>
							<div class="col-md-6">
								: <?php
									switch ($mhs['kode_prodi']) {
										case 'ahs':
											# code...
											echo "Ahwal Syakhshiyyah (Hukum Keluarga Islam)";
											break;
										case 'hes':
											# code...
											echo "Muamalah (Hukum Ekonomi Syariah)";
											break;
										
										default:
											# code...
											echo "Belum memilih Program Studi";
											break;
									}
								?>
							</div>			
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3><strong>Riwayat Pendidikan</strong></h3>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								
							</div>
							<div class="col-md-3">
								<label>Nama Lembaga</label>
							</div>
							<div class="col-md-3">
								<label>Alamat Lembaga</label>
							</div>
							<div class="col-md-2">
								<label>Tahun Lulus</label>
							</div>
						</div>
					<?php
						echo '<div class="form-group">';
						$pend = $camaba->getDb()->query("SELECT * FROM data_pendidikan WHERE no_pendaftaran = '$no_pendaftaran'");

						foreach ($pend as $key) {
							echo '<div class="row">';
							echo '<div class="col-md-4">';
							echo '<label>Tingkat '.$key['jenjang'].' / Sederajat</label>';
							echo '</div>';
							echo '<div class="col-md-3">';
							echo $key['nama_lembaga'];
							echo '</div>';
							echo '<div class="col-md-3">';
							echo $key['alamat_lembaga'];
							echo '</div>';
							echo '<div class="col-md-2">';
							echo $key['thn_lulus'];
							echo '</div>';
							echo '</div>';
						}
						echo '</div>';
					?>
					</div>
				</div>
			</div>
			<div class="row"><br>
				<div class="col-md-12">
					<h3><strong>Data Prestasi</strong></h3>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								
							</div>
							<div class="col-md-3">
								<label>Jenis Prestasi</label>
							</div>
							<div class="col-md-3">
								<label>Tingkat Lomba</label>
							</div>
							<div class="col-md-2">
								<label>Tahun Diraih</label>
							</div>
						</div>
						<?php
						echo '<div class="form-group">';
						$pres = $camaba->getDb()->query("SELECT * FROM data_prestasi WHERE no_pendaftaran = '$no_pendaftaran'");
						$data = $pres->fetchAll();
						$hit = count($data);
						$i = 1;

						if ($hit > 0) {
							foreach ($data as $key) {
							echo '<div class="row">';
							echo '<div class="col-md-4">';
							echo '<label>Jenis Prestasi '.$i.'</label>';
							echo '</div>';
							echo '<div class="col-md-3">';
							echo $key['jenis_prestasi'];
							echo '</div>';
							echo '<div class="col-md-3">';
							echo $key['tingkat'];
							echo '</div>';
							echo '<div class="col-md-2">';
							echo $key['tahun'];
							echo '</div>';
							echo '</div>';
							$i++;
						}
						} else {
							echo '<div class="row">';
							echo '<div class="col-md-4">';
							echo '<label>Jenis Prestasi '.$i.'</label>';
							echo '</div>';
							echo '<div class="col-md-3">';
							echo '-';
							echo '</div>';
							echo '<div class="col-md-3">';
							echo '-';
							echo '</div>';
							echo '<div class="col-md-2">';
							echo '-';
							echo '</div>';
							echo '</div>';
						}
						echo '</div>';
						?>
					</div>
				</div>
			</div>
			<div class="row"><br>
				<div class="col-md-12">
					<h3><strong>Data Orangtua</strong></h3>
					<h4><strong>1. Data Ayah</strong></h4>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label>Nama Lengkap Ayah</label>
							</div>
							<div class="col-md-8">
								: <?php echo $ayah['nama_ayah']; ?>
							</div>			
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label>Usia</label>
							</div>
							<div class="col-md-3">
								: <?php echo $ayah['usia']." tahun"; ?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label>Pendidikan Terakhir</label>
							</div>
							<div class="col-md-4">
								: <?php echo $ayah['pendidikan']; ?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label>Pekerjaan</label>
							</div>
							<div class="col-md-4">
								: <?php echo $ayah['pekerjaan']; ?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label>Penghasilan Rata-rata</label>
							</div>
							<div class="col-md-4">
								: <?php echo $ayah['penghasilan']; ?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label>Alamat Lengkap</label>
							</div>
							<div class="col-md-8">
								: <?php echo $ayah['alamat'].", <strong>Desa/Kelurahan</strong> ".$ayah['desa'].", <strong>Kecamatan</strong> ".$ayah['kecamatan'].", <strong>Kabupaten</strong> ".$ayah['kabupaten'].", <strong>Provinsi</strong> ".$ayah['provinsi'].", <strong>Kode Pos</strong> ".$ayah['kode_pos']; ?>
							</div>			
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label>Nomor Handphone</label>
							</div>
							<div class="col-md-8">
								: <?php
									if (empty($ayah['no_hp'])) {
										echo "-";
									} else {
										echo $ayah['no_hp'];
									}
									
								?>
								&emsp;&emsp; <!--karakter ini berfungsi memberikan tab -->
								<label>Email : </label>
								<?php

									if (empty($ayah['email'])) {
										echo "-";
									} else {
										echo $ayah['email'];;
									}
									
								?>
							</div>
						</div>
					</div>
					<h4><strong>1. Data Ibu</strong></h4>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label>Nama Lengkap Ibu</label>
							</div>
							<div class="col-md-8">
								: <?php echo $ibu['nama_ibu']; ?>
							</div>			
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label>Usia</label>
							</div>
							<div class="col-md-3">
								: <?php echo $ibu['usia']." tahun"; ?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label>Pendidikan Terakhir</label>
							</div>
							<div class="col-md-4">
								: <?php echo $ibu['pendidikan']; ?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label>Pekerjaan</label>
							</div>
							<div class="col-md-4">
								: <?php echo $ibu['pekerjaan']; ?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label>Penghasilan Rata-rata</label>
							</div>
							<div class="col-md-4">
								: <?php echo $ibu['penghasilan']; ?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label>Alamat Lengkap</label>
							</div>
							<div class="col-md-8">
								: <?php echo $ibu['alamat'].", <strong>Desa/Kelurahan</strong> ".$ibu['desa'].", <strong>Kecamatan</strong> ".$ibu['kecamatan'].", <strong>Kabupaten</strong> ".$ibu['kabupaten'].", <strong>Provinsi</strong> ".$ibu['provinsi'].", <strong>Kode Pos</strong> ".$ibu['kode_pos']; ?>
							</div>			
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label>Nomor Handphone</label>
							</div>
							<div class="col-md-8">
								: <?php
									if (empty($ibu['no_hp'])) {
										echo "-";
									} else {
										echo $ibu['no_hp'];
									}
									
								?>
								&emsp;&emsp; <!--karakter ini berfungsi memberikan tab -->
								<label>Email : </label>
								<?php

									if (empty($ibu['email'])) {
										echo "-";
									} else {
										echo $ibu['email'];;
									}
									
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<button type="submit" class="btn btn-info">Register</button>
</div>