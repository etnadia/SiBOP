<?php
 ob_start();
//	session_start();
//	if(!isset($_SESSION['login'])){
//		header('location:login.php');
//	}
  include "koneksi.php";
  include "fungsi.php";
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Si-BOP</title>
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link href="assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style type="text/css">
  #imgDiv{
    width: 40px;
    height: 40px;
    background-position: -25px -20px;  
    border-radius: 50%;
    background-size: cover;
  }
</style>

</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    
      <form method="POST" action="" enctype="multipart/form-data">
					<div class="form-group row">
						<label for="nis" class="col-sm-2 col-form-label">NIS </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="vnis" placeholder="Nomor Induk Siswa" maxlength="12">
						</div>
					</div>

					<div class="form-group row">
						<label for="namasiswa" class="col-sm-2 col-form-label">Nama Siswa</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="vnamasiswa" placeholder="Nama Siswa" maxlength="40">
						</div>
					</div>

					<!-- Input Data Gender -->
					<div class="form-group row">
						<label for="gender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
						<div class="col-sm-8">
							<div class="form-check form-check-inline">
							 <div class="col-sm-6">	
							 <label class="radio-inline">
									<input type="radio" name="vgender" value="Laki-laki" checked>Laki-laki
								</label>
							 </div>
								<div class="col-sm-8">
								<label class="radio-inline">
									<input type="radio" name="vgender" value="Perempuan">Perempuan
								</label>
								</div>
							</div>
						</div>
					</div>

			<!-- Data Tempat Lahir --> 
			<div class="form-group row">
				<label for="tmplahir" class="col-sm-2 control-label">Tempat Lahir </label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="vtmplahir" placeholder="Tempat lahir">
				</div>
			</div>

			<!-- Input Data Tanggal Lahir -->
			<div class="form-group row">
				<label for="tglahir" class="col-sm-2 control-label">Tanggal Lahir</label>
				<div class="col-sm-3">
					<input type="date" class="form-control" name="vtglahir" placeholder="Tanggal lahir">
				</div>
			</div>

			<!-- Input Data Agama -->
			<div class="form-group row">
				<label for="agama" class="col-sm-2 col-form-label">Agama</label>
				<div class="col-sm-2">
					<select class="form-control" name="vagama">
  					<option value="Islam">Islam</option>
  					<option value="Kristen">Kristen</option>
  					<option value="Katolik">Katolik</option>
						<option value="Hindu">Hindu</option>
						<option value="Budha">Budha</option>
					</select>
				</div>
			</div>
			<!-- Input Data Alamat Rumah -->
			<div class="form-group row">
				<label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" name="valamat" placeholder="Alamat Rumah">
				</div>
			</div>
			<!-- Batas Section -->
			<div class="form-group row">
				<label for="alamat" class="col-sm-2 col-form-label"><b>DATA AYAH</b></label>
				<div class="col-sm-5">
					
				</div>
			</div>
			<!-- Input Data Nama Ayah -->
			<div class="form-group row">
				<label for="nmayah" class="col-sm-2 col-form-label">Nama Ayah</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="vnmayah" placeholder="Nama Ayah">
				</div>
			</div>
			<!-- Input Data Pendidikan Ayah -->
			<div class="form-group row">
				<label for="pndikayah" class="col-sm-2 col-form-label">Pendidikan Ayah</label>
				<div class="col-sm-2">
					<select class="form-control" name="vpndikayah">
  					<option value="SMA">SMA</option>
						<option value="D3">D3</option>						
  					<option value="S1">S1</option>
  					<option value="S2">S2</option>
						<option value="S3">S3</option>
					</select>
				</div>
			</div>
			<!-- Input Data Pekerjaan Ayah -->
			<div class="form-group row">
				<label for="JobAyah" class="col-sm-2 col-form-label">Pekerjaan Ayah</label>
				<div class="col-sm-3">
					<select class="form-control" name="vjobayah">
  					<option value="PNS">PNS</option>
  					<option value="TNI/POLRI">TNI/POLRI</option>						
						<option value="Swasta">Swasta</option>						
  					<option value="Petani/Nelayan">Petani/Nelayan</option>
						<option value="Wiraswasta">Wiraswasta</option>
						<option value="Lainnya">Lainnya</option>
					</select>
				</div>
			</div>
			<!-- Input Data Telp ayah -->
			<div class="form-group row">
				<label for="telpayah" class="col-sm-2 col-form-label">No.Telp Ayah</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="vtelpayah" placeholder="No. Telp. Ayah">
				</div>
			</div>

			<!-- Batas Section -->
			<div class="form-group row">
				<label for="alamat" class="col-sm-2 col-form-label"><b>DATA IBU</b></label>
				<div class="col-sm-5">
					
				</div>
			</div>

			<!-- Input Data Nama Ibu -->
			<div class="form-group row">
				<label for="nmibu" class="col-sm-2 col-form-label">Nama Ibu</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="vnmibu" placeholder="Nama Ibu">
				</div>
			</div>
			<!-- Input Data Pendidikan Ibu -->
			<div class="form-group row">
				<label for="pndikibu" class="col-sm-2 col-form-label">Pendidikan Ibu</label>
				<div class="col-sm-2">
					<select class="form-control" name="vpndikibu">
  					<option value="SMA">SMA</option>
						<option value="D3">D3</option>						
  					<option value="S1">S1</option>
  					<option value="S2">S2</option>
						<option value="S3">S3</option>
					</select>
				</div>
			</div>
			<!-- Input Data Pekerjaan Ibu -->
			<div class="form-group row">
				<label for="JobIbu" class="col-sm-2 col-form-label">Pekerjaan Ibu</label>
				<div class="col-sm-3">
					<select class="form-control" name="vjobibu">
  					<option value="PNS">PNS</option>
  					<option value="TNI/POLRI">TNI/POLRI</option>						
						<option value="Swasta">Swasta</option>						
  					<option value="Petani/Nelayan">Petani/Nelayan</option>
						<option value="Wiraswasta">Wiraswasta</option>
						<option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>						
					</select>
				</div>
			</div>
			<!-- Input Data Telp Ibu -->
			<div class="form-group row">
				<label for="telpibu" class="col-sm-2 col-form-label">No.Telp Ibu</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="vtelpibu" placeholder="No. Telp. Ibu">
				</div>
			</div>

			<div class="form-group row">
				<label for="thnajaran" class="col-sm-2 col-form-label">Angkatan</label>
				<div class="col-sm-3">
						<select class="form-control" name="vthnajaran">
						  <option value="2017/2018">2017/2018</option>
							<option value="2018/2019">2018/2019</option>
							<option value="2019/2020">2019/2020</option>
							<option value="2020/2021">2020/2021</option>
							<option value="2021/2022">2021/2022</option>
							<option value="2022/2023">2022/2023</option>
							<option value="2022/2023">2023/2024</option>
						</select>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-2"></div>
				<div class="col-sm-4">
					<input type="submit" class="btn btn-info" value="Simpan">
				</div>
			</div>
		</div>
		<div class="col-sm-2">
				<img src="assets/images/icon/boy.png" width="250px" class="img-thumbnail img-circle">
		</div>

		<div class="col-sm-2">
		<!-- Upload File Foto -->
		  <div class="form-group">
				 <div class="col-sm-2">
				   <input type="file" name="vfoto">
				 </div>
		 	</div>
	
      <div class=form-group>
			   <div class="col-sm-2">		
				   <img src="assets/images/icon/teacher.png" class="img-thumbnail" width=300px>
			   </div>
			</div>
	</form>

	</div>
	</div>
</div>

<?php ob_start();
  if($_SERVER['REQUEST_METHOD']=='POST'){
		$nis      = $_POST['vnis'];
		$nama     = $_POST['vnamasiswa'];
		$gender   = $_POST['vgender'];
		$tmplahir = $_POST['vtmplahir'];
		$tglahir  = $_POST['vtglahir'];
		$agama    = $_POST['vagama'];
		$alamat   = $_POST['valamat'];
		$nmayah   = $_POST['vnmayah'];
		$pndikayah = $_POST['vpndikayah'];
		$jobayah  = $_POST['vjobayah'];
		$telpayah = $_POST['vtelpayah'];
		$nmibu    = $_POST['vnmibu'];
		$pndikibu = $_POST['vpndikibu'];
		$jobibu   = $_POST['vjobibu'];
		$telpibu  = $_POST['vtelpibu'];
    $tahun    = $_POST['vthnajaran'];
    $vfoto    = $_POST['vfoto']; 
		// membuat array untuk menampun data bulan
		$bulanid = array(
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember' 
		);
	  // Variabel untuk foto //
		$foto = $_FILES['vfoto']['name'];
		$tmp = $_FILES['vfoto']['tmp_name'];
  	// Rename nama fotonya dengan menambahkan tanggal dan jam upload
		$fotobaru = 'SW-'.date('dmY');
		// Set path folder tempat menyimpan fotonya
		$path = "assets/images/";
    $terupload = move_uploaded_file($tmp, $path.$fotobaru) or die("Gagal Upload bro");
		// Proses upload
	  if($terupload){ // Cek apakah gambar berhasil diupload atau tidak
			// Proses simpan ke Database
			$simpan = "INSERT INTO siswa(
				                nis,
												namasiswa,
												gender,
												tmplahir,
												tglahir,
												agama,
												alamat,
												nmayah,
												pndikayah,
												jobayah,
												telpayah,
												nmibu,
												pndikibu,
												jobibu,
												telpibu,												
												tahunajaran,
                        foto) 
			          VALUES ('$nis',
			 									'$nama',
												'$gender',
												'$tmplahir',
												'$tglahir',
												'$agama',
												'$alamat',
												'$nmayah',
												'$pndikayah',
												'$jobayah',
												'$telpayah',
												'$nmibu',
												'$pndikibu',
												'$jobibu',
												'$telpibu',
												'$tahun',
                        '$fotobaru')";
			mysqli_query($konek, $simpan) or die ("Gagal Perintah SQL".mysql_error());
			// ambil data id siswa terakhir
			if($simpan){ // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan 
        header("location:view_siswa.php"); // Redirect ke halaman index.php
      
			}else{
				// Jika Gagal, Lakukan :
				echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
				echo "<br><a href='inform.php'>Kembali Ke Form</a>";
      }
    }else{
			// Jika gambar gagal diupload, Lakukan :
			echo "Maaf, Gambar gagal untuk diupload.";
			echo "<br><a href='view_siswa.php'>Kembali Ke Form</a>";
		}
	}	
  ob_flush();
?>
                <!-- ============================================================== -->
                  <!-- End Form Input -->
                  <!-- ============================================================== -->
     
              <!-- ============================================================== -->
              <!-- End Container fluid  -->
              <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                Progdi Akuntansi - Fakultas Ekonomi dan Bisnis UDINUS
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        
   
</body>

</html>