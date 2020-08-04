<?php

$username = $_SESSION['username'];

$tmpdata = new database;
	$getdata = $tmpdata->getDb()->query("SELECT kabupaten, COUNT(*) AS total, SUM(IF(status='1',1,0)) AS ver, SUM(IF(status='0',1,0)) AS non FROM `data_calon_mhs` GROUP BY kabupaten");
	$datas = $getdata->fetchAll();
	$i = 1;

?>
<h1 class="page-head-line">SEKOLAH TINGGI ILMU SYARIAH HUSNUL KHOTIMAH</h1>
<h2>Sistem Penerimaan Mahasiswa Baru Online</h2>
<br>
<div class="col-md-10">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3>JUMLAH PENDAFTAR BERDASARKAN KOTA</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Kota/Kabupaten</th>
							<th>Jumlah Pendaftar</th>
							<th>Verified</th>
							<th>Not Verified</th>
						</tr>
					</thead>
					<tbody>
						<tr>
						<?php
							foreach ($datas as $key) {
								echo '<tr>';
								echo "<td>".$i."</td>";
								echo "<td>".strtoupper($key['kabupaten'])."</td>";
								echo "<td>".$key['total']."</td>";
								echo "<td>".$key['ver']."</td>";
								echo "<td>".$key['non']."</td>";
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
