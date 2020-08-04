<h1 class="page-head-line">FORM PENDAFTARAN MAHASISWA BARU</h1>
<div class="col-md-11">
	<div class="alert alert-warning">
		Pastikan anda mengisi semua informasi yang dibutuhkan meliputi <strong>Data Diri, Data Ayah</strong> dan <strong>Data Ibu</strong>.
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">
			DATA CALON MAHASISWA
		</div>
		<div class="panel-body">
			<form role="form" method="post" enctype="multipart/form-data" action="index.php?hal=proses-daftar">
			<ul class="nav nav-pills">
				<li class="active"><a href="#data-pills" data-toggle="tab">Data Diri</a></li>
				<li class=""><a href="#ayah-pills" data-toggle="tab">Data Ayah</a></li>
				<li class=""><a href="#ibu-pills" data-toggle="tab">Data Ibu</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane fade active in" id="data-pills">
					<div class="row"><br>
						<div class="col-md-12">
							<h4><strong>Data Pribadi</strong></h4>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Nama Lengkap</label>
									</div>
									<div class="col-md-8">
										<input class="form-control" type="text" name="nama_mhs">
										<input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
									</div>			
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Jenis Kelamin</label>
									</div>
									<div class="col-md-3">
										<select class="form-control" name="jenis_kelamin">
											<option value="laki-laki">Laki-laki</option>
											<option value="perempuan">Perempuan</option>
										</select>
									</div>			
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Tempat dan tanggal lahir</label>
									</div>
									<div class="col-md-2">
										<input class="form-control" type="text" name="tmp_lahir" placeholder="tempat lahir">
									</div>
									<div class="col-md-2">
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
									<div class="col-md-2">
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
										<textarea class="form-control" rows="3" name="alamat_mhs"></textarea>
									</div>			
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Desa/Kelurahan</label>
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" name="desa_mhs">
									</div>
									<div class="col-md-2">
										<label>Kecamatan</label>
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" name="kec_mhs">
									</div>	
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Kabupaten/Kota</label>
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" name="kab_mhs">
									</div>
									<div class="col-md-2">
										<label>Provinsi</label>
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" name="prov_mhs">
									</div>	
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Kode Pos</label>
									</div>
									<div class="col-md-2">
										<input class="form-control" type="text" name="kodepos_mhs">
									</div>			
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Nomor Handphone</label>
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" name="nohp_mhs">
									</div>
									<div class="col-md-2">
										<label>Email</label>
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" name="email_mhs">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Penyakit berat yang pernah diderita</label>
									</div>
									<div class="col-md-4">
										<input class="form-control" type="text" name="penyakit_mhs">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Program Studi yang dipilih</label>
									</div>
									<div class="col-md-6">
										<select class="form-control" name="prodi">
											<option value="-">Pilih Prodi</option>
											<option value="ahs">Ahwal Syakhshiyyah (Hukum Keluarga Islam)</option>
											<option value="hes">Muamalah (Hukum Ekonomi Syariah)</option>
										</select>
									</div>			
								</div>
							</div>
						</div>
					</div>
					<div class="row"><br>
						<div class="col-md-12">
							<h4><strong>Riwayat Pendidikan</strong></h4>
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
								<div class="row">
									<div class="col-md-4">
										<label>Tingkat Dasar (SD/MI)</label>
										<input type="hidden" name="jenjang01" value="SD">
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" placeholder="isi nama sekolah" name="nama_sd">
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" placeholder="misal: Kuningan" name="kota_sd">
									</div>
									<div class="col-md-2">
										<select class="form-control" name="thn_lulus_sd">
											<option value="-"><?php echo date('Y'); ?></option>
											<?php
											$now = date('Y');
											$begin = $now - 20;
											for ($i=$begin; $i<=$now; $i++){
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
										<label>Tingkat Menengah Pertama (SMP/MTs)</label>
										<input type="hidden" name="jenjang02" value="SMP">
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" placeholder="isi nama sekolah" name="nama_smp">
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" placeholder="misal: Kuningan" name="kota_smp">
									</div>
									<div class="col-md-2">
										<select class="form-control" name="thn_lulus_smp">
											<option value="-"><?php echo date('Y'); ?></option>
											<?php
											$now = date('Y');
											$begin = $now - 20;
											for ($i=$begin; $i<=$now; $i++){
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
										<label>Tingkat Menengah Atas (SMA/MA)</label>
										<input type="hidden" name="jenjang03" value="SMA">
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" placeholder="isi nama sekolah" name="nama_sma">
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" placeholder="misal: Kuningan" name="kota_sma">
									</div>
									<div class="col-md-2">
										<select class="form-control" name="thn_lulus_sma">
											<option value="-"><?php echo date('Y'); ?></option>
											<?php
											$now = date('Y');
											$begin = $now - 20;
											for ($i=$begin; $i<=$now; $i++){
												echo "<option value=".$i.">".$i."</option>";
											}
											?>
										</select>
									</div>
								</div><br>
								<div class="row">
									<div class="col-md-4">
										
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" placeholder="Nomor Induk Siswa Nasional (NISN)" name="jurusan">
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" placeholder="no. Ijazah SMA" name="no_ijazah">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row"><br>
						<div class="col-md-12">
							<h4><strong>Data Prestasi</strong></h4>
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
								<div class="row">
									<div class="col-md-4">
										<label>Prestasi I</label>
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" placeholder="mis: Juara 1 Pidato" name="jenis_prestasi01">
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" placeholder="mis: Kabupaten" name="tingkat_prestasi01">
									</div>
									<div class="col-md-2">
										<select class="form-control" name="thn_raih_01">
											<option value="-"><?php echo date('Y'); ?></option>
											<?php
											$now = date('Y');
											$begin = $now - 20;
											for ($i=$begin; $i<=$now; $i++){
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
										<label>Prestasi II</label>
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" placeholder="mis: Juara 1 Pidato" name="jenis_prestasi02">
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" placeholder="mis: Kabupaten" name="tingkat_prestasi02">
									</div>
									<div class="col-md-2">
										<select class="form-control" name="thn_raih_02">
											<option value="-"><?php echo date('Y'); ?></option>
											<?php
											$now = date('Y');
											$begin = $now - 20;
											for ($i=$begin; $i<=$now; $i++){
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
										<label>Prestasi III</label>
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" placeholder="mis: Juara 1 Pidato" name="jenis_prestasi03">
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" placeholder="mis: Kabupaten" name="tingkat_prestasi03">
									</div>
									<div class="col-md-2">
										<select class="form-control" name="thn_raih_03">
											<option value="-"><?php echo date('Y'); ?></option>
											<?php
											$now = date('Y');
											$begin = $now - 20;
											for ($i=$begin; $i<=$now; $i++){
												echo "<option value=".$i.">".$i."</option>";
											}
											?>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row"><br>
						<div class="col-md-12">
							<h4><strong>Data Lainnya</strong></h4>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Sumber Informasi Tentang STIS HK</label>
									</div>
									<div class="col-md-5">
										<input class="form-control" type="text" placeholder="misal: Teman/Keluarga/Interent dll" name="sumber_info">
									</div>			
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Infaq Sekolah Tinggi</label>
									</div>
									<div class="col-md-2">
										<input class="form-control" type="text" name="infaq_st">
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										
									</div>
									<div class="col-md-8">
									<p class="help-block"><i>Silahkan isi nominal bila anda ingin memberikan infaq sukarela.</i></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	
				<div class="tab-pane fade" id="ayah-pills">
					<div class="row"><br>
						<div class="col-md-12">
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Nama Lengkap Ayah</label>
									</div>
									<div class="col-md-8">
										<input class="form-control" type="text" name="nama_ayah">
									</div>			
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Usia</label>
									</div>
									<div class="col-md-1">
										<input class="form-control" type="text" name="usia_ayah">
									</div>
									<div class="col-md-2">
										Tahun
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Pendidikan Terakhir</label>
									</div>
									<div class="col-md-4">
										<select class="form-control" name="pendidikan_terakhir_ayah">
											<?php
												$kode_pend = ['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3'];
												$pendidikan = ['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'Diploma 1 (D1)', 'Diploma 2 (D2)', 'Diploma 3 (D3)', 'Strata 1 (S1)', 'Strata 2 (S2)', 'Strata 3 (S3)'];
												for ($i=0; $i<=9; $i++) {
													echo "<option value='".$kode_pend[$i]."'>".$pendidikan[$i]."</option>";
												}
											?>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Pekerjaan</label>
									</div>
									<div class="col-md-4">
										<select class="form-control" name="pekerjaan_ayah">
											<?php
												$pekerjaan = ['Mengurus rumah tangga', 'Pensiunan/Almarhum', 'PNS (non guru dan dokter)', 'TNI', 'Polisi', 'Guru', 'Dosen', 'Pegawai Swasta', 'Pengusaha (Wiraswasta)', 'Pengacara', 'Hakim', 'Jaksa', 'Notaris', 'Seniman (Pelukis/Artis/Penulis/Sejenis)', 'Dokter', 'Bidan', 'Perawat', 'Pilot', 'Pramugari', 'Petani/Peternak', 'Nelayan', 'Buruh (Tani/Pabrik/Bangunan)', 'Sopir', 'Masinis', 'Kondektur', 'Politikus (Anggota Dewan/Pengurus Partai)', 'Lainnya -'];
												for ($i=0; $i<=26; $i++) {
													echo "<option value='".$pekerjaan[$i]."'>".$pekerjaan[$i]."</option>";
												}
											?>
										</select>
									</div>
									<div class="col-md-4">
										<input class="form-control" type="text" placeholder="diisi bila memilih opsi Lainnya" name="opsi_pekerjaan_ayah">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Penghasilan Rata-rata</label>
									</div>
									<div class="col-md-4">
										<select class="form-control" name="penghasilan_ayah">
											<?php
												$penghasilan = ['Kurang dari 1.000.000', '1.000.000 - 2.000.000', '2.000.001 - 3.000.000', '3.000.001 - 4.000.000', '4.000.001 - 5.000.000', 'lebih dari 5.000.000'];
												for ($i=0; $i<=5; $i++) {
													echo "<option value='".$penghasilan[$i]."'>".$penghasilan[$i]."</option>";
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
										<textarea class="form-control" rows="3" name="alamat_ayah"></textarea>
									</div>			
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Desa/Kelurahan</label>
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" name="desa_ayah">
									</div>
									<div class="col-md-2">
										<label>Kecamatan</label>
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" name="kec_ayah">
									</div>	
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Kabupaten/Kota</label>
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" name="kab_ayah">
									</div>
									<div class="col-md-2">
										<label>Provinsi</label>
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" name="prov_ayah">
									</div>	
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Kode Pos</label>
									</div>
									<div class="col-md-2">
										<input class="form-control" type="text" name="kodepos_ayah">
									</div>			
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Nomor Handphone</label>
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" name="nohp_ayah">
									</div>
									<div class="col-md-2">
										<label>Email</label>
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" name="email_ayah">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="ibu-pills">
					<div class="row"><br>
						<div class="col-md-12">
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Nama Lengkap Ibu</label>
									</div>
									<div class="col-md-8">
										<input class="form-control" type="text" name="nama_ibu">
									</div>			
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Usia</label>
									</div>
									<div class="col-md-1">
										<input class="form-control" type="text" name="usia_ibu">
									</div>
									<div class="col-md-2">
										Tahun
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Pendidikan Terakhir</label>
									</div>
									<div class="col-md-4">
										<select class="form-control" name="pendidikan_terakhir_ibu">
											<?php
												$kode_pend = ['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3'];
												$pendidikan = ['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'Diploma 1 (D1)', 'Diploma 2 (D2)', 'Diploma 3 (D3)', 'Strata 1 (S1)', 'Strata 2 (S2)', 'Strata 3 (S3)'];
												for ($i=0; $i<=9; $i++) {
													echo "<option value='".$kode_pend[$i]."'>".$pendidikan[$i]."</option>";
												}
											?>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Pekerjaan</label>
									</div>
									<div class="col-md-4">
										<select class="form-control" name="pekerjaan_ibu">
											<?php
												$pekerjaan = ['Mengurus rumah tangga', 'Pensiunan/Almarhum', 'PNS (non guru dan dokter)', 'TNI', 'Polisi', 'Guru', 'Dosen', 'Pegawai Swasta', 'Pengusaha (Wiraswasta)', 'Pengacara', 'Hakim', 'Jaksa', 'Notaris', 'Seniman (Pelukis/Artis/Penulis/Sejenis)', 'Dokter', 'Bidan', 'Perawat', 'Pilot', 'Pramugari', 'Petani/Peternak', 'Nelayan', 'Buruh (Tani/Pabrik/Bangunan)', 'Sopir', 'Masinis', 'Kondektur', 'Politikus (Anggota Dewan/Pengurus Partai)', 'Lainnya -'];
												for ($i=0; $i<=26; $i++) {
													echo "<option value='".$pekerjaan[$i]."'>".$pekerjaan[$i]."</option>";
												}
											?>
										</select>
									</div>
									<div class="col-md-4">
										<input class="form-control" type="text" placeholder="diisi bila memilih opsi Lainnya" name="opsi_pekerjaan_ibu">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Penghasilan Rata-rata</label>
									</div>
									<div class="col-md-4">
										<select class="form-control" name="penghasilan_ibu">
											<?php
												$penghasilan = ['Kurang dari 1.000.000', '1.000.000 - 2.000.000', '2.000.001 - 3.000.000', '3.000.001 - 4.000.000', '4.000.001 - 5.000.000', 'lebih dari 5.000.000'];
												for ($i=0; $i<=5; $i++) {
													echo "<option value='".$penghasilan[$i]."'>".$penghasilan[$i]."</option>";
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
										<textarea class="form-control" rows="3" name="alamat_ibu"></textarea>
									</div>			
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Desa/Kelurahan</label>
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" name="desa_ibu">
									</div>
									<div class="col-md-2">
										<label>Kecamatan</label>
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" name="kec_ibu">
									</div>	
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Kabupaten/Kota</label>
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" name="kab_ibu">
									</div>
									<div class="col-md-2">
										<label>Provinsi</label>
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" name="prov_ibu">
									</div>	
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Kode Pos</label>
									</div>
									<div class="col-md-2">
										<input class="form-control" type="text" name="kodepos_ibu">
									</div>			
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Nomor Handphone</label>
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" name="nohp_ibu">
									</div>
									<div class="col-md-2">
										<label>Email</label>
									</div>
									<div class="col-md-3">
										<input class="form-control" type="text" name="email_ibu">
									</div>
								</div>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-info">Mendaftar</button>
				</div>
			</div><br>
			<ul class="nav nav-pills">
				<li class="active"><a href="#data-pills" data-toggle="tab">Data Diri</a></li>
				<li class=""><a href="#ayah-pills" data-toggle="tab">Data Ayah</a></li>
				<li class=""><a href="#ibu-pills" data-toggle="tab">Data Ibu</a></li>
			</ul>
			</form>
		</div>
	</div>
</div>