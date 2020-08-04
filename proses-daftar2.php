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
$no_pendaftaran = $_POST['prodi']."1819".$noId;
$nama_mhs = $_POST['nama_mhs'];
$tmp_lahir = $_POST['tmp_lahir'];
$tgl_lahir = $_POST['thn_lahir']."-".$_POST['bln_lahir']."-".$_POST['tgl_lahir'];
$alamat_mhs = $_POST['alamat_mhs'];
$desa_mhs = $_POST['desa_mhs'];
$kec_mhs = $_POST['kec_mhs'];
$kab_mhs = $_POST['kab_mhs'];
$prov_mhs = $_POST['prov_mhs'];
$kodepos_mhs = $_POST['kodepos_mhs'];
$nohp_mhs = $_POST['nohp_mhs'];
$email_mhs = $_POST['email_mhs'];
$penyakit_mhs = $_POST['penyakit_mhs'];
$prodi = $_POST['prodi'];

//data_pendidikan
$jenjang01 = $_POST['jenjang01'];
$nama_sd = $_POST['nama_sd'];
$kota_sd = $_POST['kota_sd'];
$thn_lulus_sd = $_POST['thn_lulus_sd'];
$jenjang02 = $_POST['jenjang02'];
$nama_smp = $_POST['nama_smp'];
$kota_smp = $_POST['kota_smp'];
$thn_lulus_smp = $_POST['thn_lulus_smp'];
$jenjang03 = $_POST['jenjang03'];
$nama_sma = $_POST['nama_sma'];
$kota_sma = $_POST['kota_sma'];
$thn_lulus_sma = $_POST['thn_lulus_sma'];
$jurusan = $_POST['jurusan'];
$no_ijazah = $_POST['no_ijazah'];

//data_prestasi
$jenis_prestasi01 = $_POST['jenis_prestasi01'];
$tingkat_prestasi01 = $_POST['tingkat_prestasi01'];
$thn_raih_01 = $_POST['thn_raih_01'];
$jenis_prestasi02 = $_POST['jenis_prestasi02'];
$tingkat_prestasi02 = $_POST['tingkat_prestasi02'];
$thn_raih_02 = $_POST['thn_raih_02'];
$jenis_prestasi03 = $_POST['jenis_prestasi03'];
$tingkat_prestasi03 = $_POST['tingkat_prestasi03'];
$thn_raih_03 = $_POST['thn_raih_03'];

//data_lain
$sumber_info = $_POST['sumber_info'];
$infaq_st = $_POST['infaq_st'];

//data_ayah
$nama_ayah = $_POST['nama_ayah'];
$usia_ayah = $_POST['usia_ayah'];
$pendidikan_terakhir_ayah = $_POST['pendidikan_terakhir_ayah'];
$pekerjaan_ayah = $_POST['pekerjaan_ayah']." ".$_POST['opsi_pekerjaan_ayah'];
$penghasilan_ayah = $_POST['penghasilan_ayah'];
$alamat_ayah = $_POST['alamat_ayah'];
$desa_ayah = $_POST['desa_ayah'];
$kec_ayah = $_POST['kec_ayah'];
$kab_ayah = $_POST['kab_ayah'];
$prov_ayah = $_POST['prov_ayah'];
$kodepos_ayah = $_POST['kodepos_ayah'];
$nohp_ayah = $_POST['nohp_ayah'];
$email_ayah = $_POST['email_ayah'];

//data_ibu
$nama_ibu = $_POST['nama_ibu'];
$usia_ibu = $_POST['usia_ibu'];
$pendidikan_terakhir_ibu = $_POST['pendidikan_terakhir_ibu'];
$pekerjaan_ibu = $_POST['pekerjaan_ibu']." ".$_POST['opsi_pekerjaan_ibu'];
$penghasilan_ibu = $_POST['penghasilan_ibu'];
$alamat_ibu = $_POST['alamat_ibu'];
$desa_ibu = $_POST['desa_ibu'];
$kec_ibu = $_POST['kec_ibu'];
$kab_ibu = $_POST['kab_ibu'];
$prov_ibu = $_POST['prov_ibu'];
$kodepos_ibu = $_POST['kodepos_ibu'];
$nohp_ibu = $_POST['nohp_ibu'];
$email_ibu = $_POST['email_ibu'];

?>
<h1 class="page-head-line">FORM PENDAFTARAN MAHASISWA BARU</h1>
<div class="col-md-11">
	<div class="panel panel-info">
		<div class="panel-heading">
			DATA CALON MAHASISWA
		</div>
		<div class="panel-body">
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
										<label>Nomor Pendaftaran</label>
									</div>
									<div class="col-md-8">
										<?php echo $no_pendaftaran; ?>
									</div>			
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Nama Lengkap</label>
									</div>
									<div class="col-md-8">
										<?php echo $nama_mhs; ?>
									</div>			
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Tempat dan tanggal lahir</label>
									</div>
									<div class="col-md-8">
										<?php echo $tmp_lahir.", ".$tgl_lahir; ?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Alamat Lengkap</label>
									</div>
									<div class="col-md-8">
										<?php echo $alamat_mhs; ?>
									</div>			
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Desa/Kelurahan</label>
									</div>
									<div class="col-md-3">
										<?php echo $desa_mhs; ?>
									</div>
									<div class="col-md-2">
										<label>Kecamatan</label>
									</div>
									<div class="col-md-3">
										<?php echo $kec_mhs; ?>
									</div>	
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Kabupaten/Kota</label>
									</div>
									<div class="col-md-3">
										<?php echo $kab_mhs; ?>
									</div>
									<div class="col-md-2">
										<label>Provinsi</label>
									</div>
									<div class="col-md-3">
										<?php echo $prov_mhs; ?>
									</div>	
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Kode Pos</label>
									</div>
									<div class="col-md-2">
										<?php echo $kodepos_mhs; ?>
									</div>			
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Nomor Handphone</label>
									</div>
									<div class="col-md-3">
										<?php echo $nohp_mhs; ?>
									</div>
									<div class="col-md-2">
										<label>Email</label>
									</div>
									<div class="col-md-3">
										<?php echo $email_mhs; ?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Penyakit berat yang pernah diderita</label>
									</div>
									<div class="col-md-4">
										<?php echo $penyakit_mhs; ?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Program Studi yang dipilih</label>
									</div>
									<div class="col-md-6">
										<?php echo $prodi; ?>
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
									</div>
									<div class="col-md-3">
										<?php echo $nama_sd; ?>
									</div>
									<div class="col-md-3">
										<?php echo $kota_sd; ?>
									</div>
									<div class="col-md-2">
										<?php echo $thn_lulus_sd; ?>
									</div>	
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Tingkat Menengah Pertama (SMP/MTs)</label>
									</div>
									<div class="col-md-3">
										<?php echo $nama_smp; ?>
									</div>
									<div class="col-md-3">
										<?php echo $kota_smp; ?>
									</div>
									<div class="col-md-2">
										<?php echo $thn_lulus_smp; ?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Tingkat Menengah Atas (SMA/MA)</label>
									</div>
									<div class="col-md-3">
										<?php echo $nama_sma; ?>
									</div>
									<div class="col-md-3">
										<?php echo $kota_sma; ?>
									</div>
									<div class="col-md-2">
										<?php echo $thn_lulus_sma; ?>
									</div>
								</div><br>
								<div class="row">
									<div class="col-md-4">
										
									</div>
									<div class="col-md-3">
										<?php echo $jurusan; ?>
									</div>
									<div class="col-md-3">
										<?php echo $no_ijazah; ?>
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
										<?php echo $jenis_prestasi01; ?>
									</div>
									<div class="col-md-3">
										<?php echo $tingkat_prestasi01; ?>
									</div>
									<div class="col-md-2">
										<?php echo $thn_raih_01; ?>
									</div>	
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Prestasi II</label>
									</div>
									<div class="col-md-3">
										<?php echo $jenis_prestasi02; ?>
									</div>
									<div class="col-md-3">
										<?php echo $tingkat_prestasi02; ?>
									</div>
									<div class="col-md-2">
										<?php echo $thn_raih_02; ?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Prestasi III</label>
									</div>
									<div class="col-md-3">
										<?php echo $jenis_prestasi03; ?>
									</div>
									<div class="col-md-3">
										<?php echo $tingkat_prestasi03; ?>
									</div>
									<div class="col-md-2">
										<?php echo $thn_raih_03; ?>
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
										<?php echo $sumber_info; ?>
									</div>			
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Infaq Sekolah Tinggi</label>
									</div>
									<div class="col-md-2">
										<?php echo $infaq_st; ?>
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
										<?php echo $nama_ayah; ?>
									</div>			
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Usia</label>
									</div>
									<div class="col-md-1">
										<?php echo $usia_ayah; ?>
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
										<?php echo $pendidikan_terakhir_ayah; ?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Pekerjaan</label>
									</div>
									<div class="col-md-4">
										<?php echo $pekerjaan_ayah; ?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Penghasilan Rata-rata</label>
									</div>
									<div class="col-md-4">
										<?php echo $penghasilan_ayah; ?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Alamat Lengkap</label>
									</div>
									<div class="col-md-8">
										<?php echo $alamat_ayah; ?>
									</div>			
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Desa/Kelurahan</label>
									</div>
									<div class="col-md-3">
										<?php echo $desa_ayah; ?>
									</div>
									<div class="col-md-2">
										<label>Kecamatan</label>
									</div>
									<div class="col-md-3">
										<?php echo $kec_ayah; ?>
									</div>	
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Kabupaten/Kota</label>
									</div>
									<div class="col-md-3">
										<?php echo $kab_ayah; ?>
									</div>
									<div class="col-md-2">
										<label>Provinsi</label>
									</div>
									<div class="col-md-3">
										<?php echo $prov_ayah; ?>
									</div>	
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Kode Pos</label>
									</div>
									<div class="col-md-2">
										<?php echo $kodepos_ayah; ?>
									</div>			
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Nomor Handphone</label>
									</div>
									<div class="col-md-3">
										<?php echo $nohp_ayah; ?>
									</div>
									<div class="col-md-2">
										<label>Email</label>
									</div>
									<div class="col-md-3">
										<?php echo $email_ayah; ?>
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
										<?php echo $nama_ibu; ?>
									</div>			
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Usia</label>
									</div>
									<div class="col-md-1">
										<?php echo $usia_ibu; ?>
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
										<?php echo $pendidikan_terakhir_ibu; ?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Pekerjaan</label>
									</div>
									<div class="col-md-4">
										<?php echo $pekerjaan_ibu; ?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Penghasilan Rata-rata</label>
									</div>
									<div class="col-md-4">
										<?php echo $penghasilan_ibu; ?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Alamat Lengkap</label>
									</div>
									<div class="col-md-8">
										<?php echo $alamat_ibu; ?>
									</div>			
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Desa/Kelurahan</label>
									</div>
									<div class="col-md-3">
										<?php echo $desa_ibu; ?>
									</div>
									<div class="col-md-2">
										<label>Kecamatan</label>
									</div>
									<div class="col-md-3">
										<?php echo $kec_ibu; ?>
									</div>	
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Kabupaten/Kota</label>
									</div>
									<div class="col-md-3">
										<?php echo $kab_ibu; ?>
									</div>
									<div class="col-md-2">
										<label>Provinsi</label>
									</div>
									<div class="col-md-3">
										<?php echo $prov_ibu; ?>
									</div>	
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Kode Pos</label>
									</div>
									<div class="col-md-2">
										<?php echo $kodepos_ibu; ?>
									</div>			
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Nomor Handphone</label>
									</div>
									<div class="col-md-3">
										<?php echo $nohp_ibu; ?>
									</div>
									<div class="col-md-2">
										<label>Email</label>
									</div>
									<div class="col-md-3">
										<?php echo $email_ibu; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-info">Mendaftar</button>
		</div>
	</div>
</div>