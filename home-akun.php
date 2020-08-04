
<h1 class="page-head-line">SEKOLAH TINGGI ILMU SYARIAH HUSNUL KHOTIMAH</h1>
<h2>Selamat Datang Di Sistem Penerimaan Mahasiswa Baru Online</h2>
<br>
<div class="row">
	<div class="col-md-8">
		<?php
		if ($status == 0) {
			# code...
			echo '<div class="alert alert-danger">Proses pendaftaran anda belum terverifikasi. Silahkan lakukan pembayaran dan lakukan konfirmasi ke bagian Administrasi untuk mengaktifkan status pendaftafan anda. Nomor pendaftaran anda adalah <strong>'.$no_pendaftaran.'</strong>. Jumlah yang harus anda bayar adalah Rp.200.'.substr($no_pendaftaran,-3).',-</div>';
		} elseif ($status == 1) {
			# code...
			echo '<div class="alert alert-success">Selamat! Status pendaftaran anda sudah terverifikasi. Nomor pendaftaran anda adalah <strong>'.$no_pendaftaran.'</strong>. Anda sudah bisa mendapatkan kartu Ujian Masuk. Silahkan hubungi bagian adiminstrasi.</div>';
		} else {
			echo '<div class="alert alert-danger">Anda belum mengisi Form Pendaftaran. Silahkan mengisi form terlebih dahulu.</div>';
		}
		

		?>
		<div class="panel panel-primary">
			<div class="panel-heading">
				Silahkan ikuti langkah-langkah berikut
			</div>
			<div class="panel-body">
				<div class="alert alert-info">
					<ul>
						<li>
							<i class="fa fa-edit "></i> Silahkan lakukan registrasi terlebih dahulu untuk mendapatkan akun di Sistem Pendaftaran Online STIS HK.
						</li>
						<li>
							<i class="fa fa-edit "></i> Lakukan login menggunakan akun yang sudah didaftarkan.
						</li>
						<li>
							<i class="fa fa-edit "></i> Mengisi formulir pendaftaran secara lengkap meliputi data diri, data ayah dan data ibu.
						</li>
						<li>
							<i class="fa fa-edit "></i> Mengunggah berkas yang dibutuhkan meliputi pas foto, scan Akta Kelahiran dan scan Ijazah atau surat keterangan lulus.
						</li>
						<li>
							<i class="fa fa-edit "></i> Setelah melakukan pengisian formulir, anda akan mendapatkan nomor pendaftaran dan jumlah nominal yang harus dibayarkan sebagai uang pendaftaran.
						</li>
						<li>
							<i class="fa fa-edit "></i> Silahkan lakukan pembayaran sesuai dengan jumlah yang tertera dengan cara transfer ke nomor rekening yang tercantum.
						</li>
						<li>
							<i class="fa fa-edit "></i> Lakukan konfirmasi pembayaran ke bagian administrasi.
						</li>
						<li>
							<i class="fa fa-edit "></i> Pembayaran akan dikonfirmasi paling lambat 2x24 jam dan status pendaftaran akan berubah menjadi verified.
						</li>
						<li>
							<i class="fa fa-edit "></i> Setelah status pendaftaran berubah menjadi verified, maka anda sudah bisa mencetak kartu test anda.
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
