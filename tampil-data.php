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
			echo '<div class="alert alert-danger">Proses pendaftaran anda belum terverifikasi. Silahkan lakukan pembayaran dan lakukan konfirmasi ke bagian Administrasi untuk mengaktifkan status pendaftafan anda. Jumlah yang harus anda bayar adalah Rp.200.'.substr($no_pendaftaran,-3).',-</div>';
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
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th colspan="2">
								<?php
									displayImage($no_pendaftaran, 'foto');
								?>
							</th>
						</tr>
						<tr>
							<th colspan="2">
								<h3>Data Pribadi</h3>
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Nomor Pendaftaran</td>
							<td>: <?php echo $no_pendaftaran; ?></td>
						</tr>
						<tr>
							<td>Nama Lengkap</td>
							<td>: <?php echo $mhs['nama_lengkap']; ?></td>
						</tr>
						<tr>
							<td>Tempat dan tanggal lahir</td>
							<td>: <?php echo $mhs['tempat_lahir'].", ".tanggal_indo($mhs['tgl_lahir']); ?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>: <?php echo $mhs['alamat'].", <strong>Desa/Kelurahan</strong> ".$mhs['desa'].", <strong>Kecamatan</strong> ".$mhs['kecamatan']."," ?></td>
						</tr>
						<tr>
							<td></td>
							<td> <?php echo "<strong>Kabupaten</strong> ".$mhs['kabupaten'].", <strong>Provinsi</strong> ".$mhs['provinsi'].", <strong>Kode Pos</strong> ".$mhs['kode_pos']; ?></td>
						</tr>
						<tr>
							<td>Nomor Handphone</td>
							<td>: <?php echo $mhs['no_hp']; ?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td>: <?php echo $mhs['email']; ?></td>
						</tr>
						<tr>
							<td>Penyakit yang pernah diderita</td>
							<td>: <?php echo $mhs['penyakit_berat']; ?></td>
						</tr>
						<tr>
							<td>Program Studi yang dipilih</td>
							<td>
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
							</td>
						</tr>
					</tbody>
				</table>
				<table class="table table-hover">
					<thead>
						<tr>
							<th colspan="4">
								<h3>Riwayat Pendidikan</h3>
							</th>
						</tr>
					</thead>
					<thead>
						<tr>
							<th>
								No
							</th>
							<th>
								Jenjang
							</th>
							<th>
								Nama Lembaga
							</th>
							<th>
								Alamat Lembaga
							</th>
							<th>
								Tahun Lulus
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
						<?php

						$pend = $camaba->getDb()->query("SELECT * FROM data_pendidikan WHERE no_pendaftaran = '$no_pendaftaran'");
						$i = 1;
						foreach ($pend as $key) {
							echo '<tr>';
							echo '<td>'.$i;
							echo '</td>';
							echo '<td>';
							echo '<label>Tingkat '.$key['jenjang'].' / Sederajat</label>';
							echo '</td>';
							echo '<td>';
							echo $key['nama_lembaga'];
							echo '</td>';
							echo '<td>';
							echo $key['alamat_lembaga'];
							echo '</td>';
							echo '<td>';
							echo $key['thn_lulus'];
							echo '</td>';
							echo '</tr>';
							$i++;
						}

						?>
						</tr>
					</tbody>
				</table>
				<table class="table table-hover">
					<thead>
						<tr>
							<th colspan="4">
								<h3>Data Prestasi</h3>
							</th>
						</tr>
					</thead>
					<thead>
						<tr>
							<th>
								No
							</th>
							<th>
								Jenis Prestasi
							</th>
							<th>
								Tingkat Lomba
							</th>
							<th>
								Tahun Diraih
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php
								echo '<tr>';
								$pres = $camaba->getDb()->query("SELECT * FROM data_prestasi WHERE no_pendaftaran = '$no_pendaftaran'");
								$data = $pres->fetchAll();
								$hit = count($data);
								$i = 1;

								if ($hit > 0) {
									foreach ($data as $key) {
									echo '<tr>';
									echo '<td>'.$i;
									echo '</td>';
									echo '<td>';
									echo $key['jenis_prestasi'];
									echo '</td>';
									echo '<td>';
									echo $key['tingkat'];
									echo '</td>';
									echo '<td>';
									echo $key['tahun'];
									echo '</td>';
									echo '</tr>';
									$i++;
								}
								} else {
								    echo '<tr>';
									echo '<td>'.$i;
									echo '</td>';
									echo '<td>';
									echo '-';
									echo '</td>';
									echo '<td>';
									echo '-';
									echo '</td>';
									echo '<td>';
									echo '-';
									echo '</td>';
									echo '</tr>';
									$i++;
								}
								echo '</tr>';
							?>
						</tr>
					</tbody>
				</table>
				<table class="table table-hover">
					<thead>
						<tr>
							<th colspan="2">
								<h3>Data Orangtua</h3>
							</th>
						</tr>
						<tr>
							<th colspan="2">
								<h4>Data Ayah</h4>
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Nama Lengkap</td>
							<td>: <?php echo $ayah['nama_ayah']; ?></td>
						</tr>
						<tr>
							<td>Usia</td>
							<td>: <?php echo $ayah['usia']." tahun"; ?></td>
						</tr>
						<tr>
							<td>Pendidikan</td>
							<td>: <?php echo $ayah['pendidikan']; ?></td>
						</tr>
						<tr>
							<td>Pekerjaan</td>
							<td>: <?php echo $ayah['pekerjaan']; ?></td>
						</tr>
						<tr>
							<td>Penghasilan rata-rata</td>
							<td>: <?php echo $ayah['penghasilan']; ?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>: <?php echo $ayah['alamat'].", <strong>Desa/Kelurahan</strong> ".$ayah['desa'].", <strong>Kecamatan</strong> ".$ayah['kecamatan']."," ?></td>
						</tr>
						<tr>
							<td></td>
							<td> <?php echo "<strong>Kabupaten</strong> ".$ayah['kabupaten'].", <strong>Provinsi</strong> ".$ayah['provinsi'].", <strong>Kode Pos</strong> ".$ayah['kode_pos']; ?></td>
						</tr>
						<tr>
							<td>Nomor Handphone</td>
							<td>
								: <?php
								if (empty($ayah['no_hp'])) {
									echo "-";
								} else {
								echo $ayah['no_hp'];
								}
								?>
							</td>
						</tr>
						<tr>
							<td>Email</td>
							<td>
								: <?php
								if (empty($ayah['email'])) {
									echo "-";
								} else {
								echo $ayah['email'];
								}
								?>
							</td>
						</tr>
					</tbody>
					<thead>
						<tr>
							<th colspan="2">
								<h4>Data Ibu</h4>
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Nama Lengkap</td>
							<td>: <?php echo $ibu['nama_ibu']; ?></td>
						</tr>
						<tr>
							<td>Usia</td>
							<td>: <?php echo $ibu['usia']." tahun"; ?></td>
						</tr>
						<tr>
							<td>Pendidikan</td>
							<td>: <?php echo $ibu['pendidikan']; ?></td>
						</tr>
						<tr>
							<td>Pekerjaan</td>
							<td>: <?php echo $ibu['pekerjaan']; ?></td>
						</tr>
						<tr>
							<td>Penghasilan rata-rata</td>
							<td>: <?php echo $ibu['penghasilan']; ?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>: <?php echo $ibu['alamat'].", <strong>Desa/Kelurahan</strong> ".$ibu['desa'].", <strong>Kecamatan</strong> ".$ibu['kecamatan']."," ?></td>
						</tr>
						<tr>
							<td></td>
							<td> <?php echo "<strong>Kabupaten</strong> ".$ibu['kabupaten'].", <strong>Provinsi</strong> ".$ibu['provinsi'].", <strong>Kode Pos</strong> ".$ibu['kode_pos']; ?></td>
						</tr>
						<tr>
							<td>Nomor Handphone</td>
							<td>
								: <?php
								if (empty($ibu['no_hp'])) {
									echo "-";
								} else {
								echo $ibu['no_hp'];
								}
								?>
							</td>
						</tr>
						<tr>
							<td>Email</td>
							<td>
								: <?php
								if (empty($ibu['email'])) {
									echo "-";
								} else {
								echo $ibu['email'];
								}
								?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!--<a href="#editData" data-toggle="modal"><button class="btn btn-info">Edit Data</button></a>-->
	<div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form role="form" method="post" enctype="multipart/form-data" action="#">
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title" id="myModalLabel">EDIT DATA</h4>
					</div>
					<div class="modal-body">
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
													<input class="form-control" type="text" name="nama_mhs" value="<?php echo $mhs['nama_lengkap']; ?>">
												</div>			
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-4">
													<label>Tempat dan tanggal lahir</label>
												</div>
												<div class="col-md-8">
													<input class="form-control" type="text" name="tmp_lahir" value="<?php echo $mhs['tempat_lahir']?>">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-4">

												</div>
												<div class="col-md-3">
													<select class="form-control" name="tgl_lahir">
														<option value="-">tanggal</option>
													<?php
														for ($i=1;$i<=31;$i++)
														{
															echo "<option value=".$i.">".$i."</option>";
														}
													?>
														
													</select>
												</div>
												<div class="col-md-3">
													<select class="form-control" name="bln_lahir">
														<option value="-">bulan</option>
														<option value="01">Januari</option>
														<option value="02">Februari</option>
														<option value="03">Maret</option>
														<option value="04">April</option>
														<option value="05">Mei</option>
														<option value="06">Juni</option>
														<option value="07">Juli</option>
														<option value="08">Agustus</option>
														<option value="09">September</option>
														<option value="10">Oktober</option>
														<option value="11">Nopember</option>
														<option value="12">Desember</option>
													</select>
												</div>
												<div class="col-md-2">
													<select class="form-control" name="thn_lahir">
														<option value="-">tahun</option>
														<?php
															$now = date('Y');
															$begin = $now - 17;
															$end = $begin - 20;
															for ($i=$end; $i<=$begin; $i++) {
																echo "<option value=".$i.">".$i."</option>";
															}
														?>
													</select>
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
					</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>