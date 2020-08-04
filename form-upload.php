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
	}
}

?>
<h1 class="page-head-line">FORM PENDAFTARAN MAHASISWA BARU</h1>
<div class="col-md-8">
	<div class="alert alert-warning">
		Silahkan unggah berkas-berkas yang diperlukan untuk melengkapi pendaftaran meliputi <strong>Pasfoto</strong>, <strong>Scan Akta Kelahiran</strong> dan <strong>Scan Ijazah</strong>
	</div>
</div>
<div class="col-md-6">
	<div class="panel panel-primary">
		<div class="panel-heading">
			UNGGAH BERKAS YANG DIPERLUKAN
		</div>
		<div class="panel-body">
			<form role="form" method="post" enctype="multipart/form-data" action="index.php?hal=proses-upload-image">
			<div class="form-group">
				<label class="control-label col-lg-4">Pilih Pasfoto</label>
				<div class="">
					<div class="fileupload fileupload-new" data-provides="fileupload">
						<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="assets/img/demoUpload.jpg" alt="" /></div>
						<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
						<div>
							<span class="btn btn-file btn-success">
								<span class="fileupload-new">Select image</span>
								<span class="fileupload-exists">Change</span>
								<input type="file" name="myimage1">
								<input type="hidden" name="jenis_berkas1" value="foto">
								<input type="hidden" name="no_pendaftaran" value="<?php echo $no_pendaftaran; ?>">
							</span>
							<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-lg-4">Pilih Akta Kelahiran</label>
				<div class="">
					<div class="fileupload fileupload-new" data-provides="fileupload">
						<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="assets/img/demoUpload.jpg" alt="" /></div>
						<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
						<div>
							<span class="btn btn-file btn-success">
								<span class="fileupload-new">Select image</span>
								<span class="fileupload-exists">Change</span>
								<input type="file" name="myimage2">
								<input type="hidden" name="jenis_berkas2" value="akta">
							</span>
							<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-lg-4">Pilih Ijazah</label>
				<div class="">
					<div class="fileupload fileupload-new" data-provides="fileupload">
						<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="assets/img/demoUpload.jpg" alt="" /></div>
						<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
						<div>
							<span class="btn btn-file btn-success">
								<span class="fileupload-new">Select image</span>
								<span class="fileupload-exists">Change</span>
								<input type="file" name="myimage3">
								<input type="hidden" name="jenis_berkas3" value="ijazah">
							</span>
							<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
						</div>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-primary">Unggah Berkas</button>
			</form>
		</div>
	</div>
</div>