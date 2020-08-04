<?php

$no_pendaftaran = $_POST['no_pendaftaran'];
$aksi = $_POST['action'];

if ($aksi == 'setuju') {
	$tindak = 'memverifikasi';
} else {
	$tindak = 'menghapus';
}

$tmpdata = new database;
	$getdata = $tmpdata->getDb()->query("SELECT * FROM data_calon_mhs");
	$datas = $getdata->fetchAll();
	$i = 1;

?>
<h1 class="page-head-line">SEKOLAH TINGGI ILMU SYARIAH HUSNUL KHOTIMAH</h1>
<h2>Sistem Penerimaan Mahasiswa Baru Online</h2>
<br>
<div class="col-md-12">
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
							<th>Prodi Pilihan</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
						<?php
							foreach ($datas as $key) {
								echo '<form role="form" method="post" enctype="multipart/form-data" action="home-admin.php?hal=bridge">';
								echo '<tr>';
								echo "<td>".$i."</td>";
								echo "<td>".$key['no_pendaftaran']."</td>";
								echo "<td>".$key['nama_lengkap']."</td>";
								echo "<td>".$key['kabupaten']." - ".$key['provinsi']."</td>";
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

								if ($key['status'] == 1) {
									echo '<td>';
									echo '<input type="hidden" name="no_pendaftaran" value="'.$key['no_pendaftaran'].'" >';
									echo '<input type="hidden" name="action" value="hapus" >';
									echo '<button type="submit" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span></button>';
									echo '</td>';
								} else {
								echo '<td>';
								echo '<input type="hidden" name="no_pendaftaran" value="'.$key['no_pendaftaran'].'" >';
								echo '<input type="hidden" name="action" value="setuju" >';
								echo '<button type="submit" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-ok"></span></button>';
								echo '</td>';
								}
								echo '</tr>';
								$i++;
								echo '</form>';
							}
						?>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="verify" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<form role="form" method="post" enctype="multipart/form-data" action="home-admin.php?hal=verifikasi">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 class="modal-title" id="myModalLabel">KONFIRMASI</h3>
			</div>
			<div class="modal-body">
				<div class="alert alert-info">
					<h4>
						Apakah Anda yakin akan <?php echo $tindak; ?> Pendaftar ini?
						<input type="hidden" name="tindakan" value="<?php echo $aksi; ?>">
						<input type="hidden" name="no_pendaftaran" value="<?php echo $no_pendaftaran; ?>">
					</h4>
				</div>
			</div>
			<div class="modal-footer">
				<a href="home-admin.php?hal=admin-rekap-data"><button type="button" class="btn btn-default">Batal</button></a>
				<button type="submit" class="btn btn-primary">Ya</button>
			</div>
		</div>
	</div>
	</form>
</div>