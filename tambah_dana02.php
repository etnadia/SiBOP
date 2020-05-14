<?php include "header.php"; ?>
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">
				<img src='assets/images/icon/cashbook.png' alt='No' width='30pix'>PENCATATAN PENGGUNAAN DANA KEGIATAN PENDUKUNG</h3>
		</div>
		<div class="panel-body">
			<form method="POST" action="" class="form-horizontal" name="frmakun" enctype="multipart/form-data">
				<div class="col-sm-8">
					<div class="form-group">
						<label for="vtanggal" class="col-sm-3 control-label">Tanggal Transaksi</label>
						<div class="col-sm-4">
							<input type="date" class="form-control" name="vtanggal">
						</div>
					</div>

					<!-- Data Pilihan Sub Kegiatan -->
					<div class="form-group">
						<label for="vkegsub" class="col-sm-3 control-label">Sub Kegiatan</label>
						<div class="col-sm-6">
							<select name="vkegsub" class="form-control">
								<option value="" selected>Sub Kegiatan</option>
								<?php
								$sql = mysqli_query($konek, "SELECT * 
																							FROM tblkomponen
																							WHERE idkomponen like '2'");
								while ($k1 = mysqli_fetch_array($sql)) {
									echo '<option value="' . $k1['subkomponen'] . '">' . $k1['subkomponen'] . '</option>';
								}
								?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="vnmakun" class="col-sm-3 control-label">Nama Kegiatan</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="vnmakun" placeholder="Nama Akun" maxlength="40">
						</div>
					</div>

					<div class="form-group">
						<label for="vsatuan" class="col-sm-3 control-label">Satuan</label>
						<div class="col-sm-2">
							<select name="vsatuan" class="form-control">
								<option value="" selected>Satuan</option>
								<option value="Keg">Kegiatan</option>
								<option value="Bln">Bulan</option>
								<option value="Eks">Eksemplar</option>
								<option value="Buah">Buah</option>
								<option value="Pack">Pack</option>
								<option value="Pcs">Peaces</option>
								<option value="Org">Orang</option>
								<option value="Unit">Unit</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="vharga" class="col-sm-3 control-label">Harga Satuan Rp.</label>
						<div class="col-sm-4">
							<input type="number" class="form-control" name="vharga" placeholder="9999" maxlength="14">
						</div>
					</div>
					<div class="form-group">
						<label for="vjumlah" class="col-sm-3 control-label">Jumlah</label>
						<div class="col-sm-2">
							<input type="number" class="form-control" name="vjumlah" placeholder="99" onkeyup="hitung();">
						</div>
					</div>

					<div class="form-group">
						<label for="vtotharga" class="col-sm-3 control-label">Total Harga Rp.</label>
						<div class="col-sm-4">
							<input type="number" class="form-control" name="vtothargax" disabled="disabled">
							<input type="hidden" class="form-control" name="vtotharga">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-3"></div>
						<div class="col-sm-4">
							<input type="submit" class="btn btn-info" value="Simpan">
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<!-- Input Data Foto Bukti -->
					<label for="vbukti">Upload Bukti.</label>
					<div class="form-group">
						<div class="col-sm-3">
							<input type="file" name="vbukti">
						</div>
					</div>

					<div class=form-group>
						<div class="col-sm-6">
							<img src="assets/images/icon/account.png" class="img-thumbnail" width=300px>

						</div>
					</div>
				</div>

			</form>
		</div>
	</div>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$tanggal	= $_POST['vtanggal'];
	$kegsub   = $_POST['vkegsub'];
	$kegiatan = $_POST['vnmakun'];
	$satuan   = $_POST['vsatuan'];
	$harga    = $_POST['vharga'];
	$volume   = $_POST['vjumlah'];
	$totharga = $_POST['vtotharga'];
	$kegutama = "KEGIATAN PENDUKUNG";
	if ($kegsub == '' || $kegiatan == '') {
		echo "Form belum diisi..!!";
	} else {

		if ($kegsub == "Penyediaan Makanan Tambahan") {
			// Ambil jumlah data Bermain
			$sql = mysqli_query($konek, "SELECT * FROM tblusedana 
								 WHERE subkegiatan like 'Penyediaan Makanan Tambahan'
			           ORDER BY kodekeg");
			$jumlah_record = mysqli_num_rows($sql);
			if ($jumlah_record == 0) {
				$kode    = "2.1.1";
				$nobukti = "MT21-1";
			} else {
				$nomor = $jumlah_record + 1;
				$kode    = "2.1." . $nomor;
				$nobukti = "MT21-" . $nomor;
			}
		} elseif ($kegsub == "Pembelian alat-alat DDTK") {
			$sql = mysqli_query($konek, "SELECT * FROM tblusedana 
				WHERE subkegiatan like 'Pembelian alat-alat DDTK'
				ORDER BY kodekeg");
			$jumlah_record = mysqli_num_rows($sql);
			if ($jumlah_record == 0) {
				$kode    = "2.2.1";
				$nobukti = "DD22-1";
			} else {
				$nomor = $jumlah_record + 1;
				$kode    = "2.2." . $nomor;
				$nobukti = "DD22-" . $nomor;
			}
		} elseif ($kegsub == "Pembelian obat-obatan ringan, dan isi kotak P3K") {
			$sql = mysqli_query($konek, "SELECT * FROM tblusedana 
				WHERE subkegiatan like 'Pembelian obat-obatan ringan, dan isi kotak P3K'
				ORDER BY kodekeg");
			$jumlah_record = mysqli_num_rows($sql);
			if ($jumlah_record == 0) {
				$kode    = "2.3.1";
				$nobukti = "PK23-1";
			} else {
				$nomor = $jumlah_record + 1;
				$kode = "2.3." . $nomor;
				$nobukti = "PK23-" . $nomor;
			}
		} elseif ($kegsub == "Kegiatan pertemuan dengan orang tua/wali murid") {
			$sql = mysqli_query($konek, "SELECT * FROM tblusedana 
				WHERE subkegiatan like 'Kegiatan pertemuan dengan orang tua/wali murid'
				ORDER BY kodekeg");
			$jumlah_record = mysqli_num_rows($sql);
			if ($jumlah_record == 0) {
				$kode = "2.4.1";
				$nobukti = "WA24-1";
			} else {
				$nomor = $jumlah_record + 1;
				$kode = "2.4." . $nomor;
				$nobukti = "WA24-" . $nomor;
			}
		} elseif ($kegsub == "Memberi transport pendidik") {
			$sql = mysqli_query($konek, "SELECT * FROM tblusedana 
				WHERE subkegiatan like 'Memberi transport pendidik'
				ORDER BY kodekeg");
			$jumlah_record = mysqli_num_rows($sql);
			if ($jumlah_record == 0) {
				$kode = "2.5.1";
				$nobukti = "TA25-1";
			} else {
				$nomor = $jumlah_record + 1;
				$kode = "2.5." . $nomor;
				$nobukti = "TA25-" . $nomor;
			}
		} else {
			$sql = mysqli_query($konek, "SELECT * FROM tblusedana 
				WHERE subkegiatan like 'Penyediaan buku administrasi'
				ORDER BY kodekeg");
			$jumlah_record = mysqli_num_rows($sql);
			if ($jumlah_record == 0) {
				$kode = "2.6.1";
				$nobukti = "BA26-1";
			} else {
				$nomor = $jumlah_record + 1;
				$kode = "2.6." . $nomor;
				$nobukti = "BA26-" . $nomor;
			}
		}

		// Variabel untuk foto //
		$bukti = $_FILES['vbukti']['name'];
		$tmp = $_FILES['vbukti']['tmp_name'];
		// Rename nama fotonya dengan menambahkan tanggal dan jam upload
		$buktibaru = date('dmY') . $bukti;
		// Set path folder tempat menyimpan fotonya
		$path = "assets/img/";
		$terupload = move_uploaded_file($tmp, $path . $buktibaru) or die("Gagal Upload bro");

		if ($terupload) { // Cek apakah gambar berhasil diupload atau tidaka
			// Proses simpan ke Database
			$simpan = "INSERT INTO tblusedana(
															 kodekeg,
															 tanggal,
															 kegutama,
															 subkegiatan,
															 kegiatan,
															 satuan,
															 volume,
															 harga,
															 totharga,
															 bukti,
															 nobukti) 
										VALUES ('$kode',
														'$tanggal',
														'$kegutama',
														'$kegsub',
														'$kegiatan',
														'$satuan',
														'$volume',
														'$harga',
														'$totharga',
														'$buktibaru',
														'$nobukti')";

			mysqli_query($konek, $simpan) or die("Gagal Perintah SQL" . mysql_error());

			if ($simpan) { // Cek jika proses simpan ke database sukses atau tidak
				// Jika Sukses, Lakukan :
				header("location: tampil_dana02.php"); // Redirect ke halaman index.php
			} else {
				// Jika Gagal, Lakukan :
				echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
				echo "<br><a href='tambah_dana02.php'>Kembali Ke Form</a>";
			}
		} else {
			// Jika gambar gagal diupload, Lakukan :
			echo "Maaf, Gambar gagal untuk diupload.";
			echo "<br><a href='tambah_dana02.php'>Kembali Ke Form</a>";
		}
	}
}
?>
<?php include "footer.php"; ?>