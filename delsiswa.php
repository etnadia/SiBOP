<?php
	session_start();
	if(isset($_SESSION['login'])){
		include "koneksi.php";
		$hapus = mysqli_query($konek,
		 "DELETE FROM siswa 
		  WHERE idsiswa='$_GET[id]'");
		if($hapus){
				header('location:view_siswa.php');
		}else{
			echo "Hapus Data Gagal, data sedang digunakan tabel SPP <br><a href='view_siswa.php'>Kembali</a>";
		}
	}else{
		echo "Anda tidak memiliki akses ke halaman ini, silahkan logout dan login kembali";
	}
?> 