<?php

$username = $_SESSION['username'];

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
							<th>Nama</th>
							<th>Alamat</th>
							<th>No Handphone</th>
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
								echo "<td><a href='home-admin.php?hal=admin-detail-data&user=".$key['no_pendaftaran']."'>".strtoupper($key['nama_lengkap'])."</a></td>";
								echo "<td>".strtoupper($key['kabupaten'])." - ".strtoupper($key['provinsi'])."</td>";
								echo "<td>".$key['no_hp']."</td>";
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
