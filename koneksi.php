<?php
	// variabel koneksi
	$konek = mysqli_connect("localhost","root","","dbsibop");
	if(!$konek){
		echo "Koneksi server database gagal ...!!";
	}
?>