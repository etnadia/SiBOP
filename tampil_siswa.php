<?php include "header.php"; ?>
<div class="container">
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">
		<h3 class="panel-title">DATA SISWA</h3>
	</div>
  <div class="panel-body">
	<div> 
			<a href="tambah_siswa.php" class="btn btn-success" style="margin-bottom: 10px;">
		<img src='assets/img/icon/student+.png' alt='No' width='30pix'> Tambah Data
		</a>
	</div>
		<table class="table">
		<tr>
			<th>No.</th>
			<th>NIS</th>
			<th>Nama Siswa</th>
			<th>Gender</th>
			<th>Angkatan</th>
			<th>Tmp. Lahir</th>
			<th>Tgl. Lahir</th>
			<th>Nama Ayah</th>
			<th>Nama Ibu</th>
			<th>Alamat</th>
			<th>Operasi</th>
		</tr>
		<?php
			$sql  = mysqli_query($konek,"SELECT * FROM siswa ORDER BY kelas");
			$no = 1;
			while ($d=mysqli_fetch_array($sql)) {
				$tgl = date('d-m-Y', strtotime($d['tglahir']));
				echo " <tr>
								<td align='center'>$no</td>
								<td> <img src='assets/img/".$d['foto']."' id='imgDiv'>
									$d[nis]
								</td>
								<td>$d[namasiswa]</td>
								<td>$d[gender]</td>
								<td>$d[tahunajaran]</td>
								<td>$d[tmplahir]</td>
								<td>$tgl</td>
								<td>$d[nmayah]</td>
								<td>$d[nmibu]</td>
								<td>$d[alamat]</td>

								<td>
									<a href='edit_siswa.php?id=$d[idsiswa]'
									   class='btn btn-warning btn-xs'>Edit</a>  
									<a href='delsiswa.php?id=$d[idsiswa]' class='btn btn-danger btn-xs'>Hapus</a>
								</td>
							 </tr>";
				$no++;
			}
		?>
	</table>
		<div class="alert alert-danger" role="alert">
		<b>Ingat!!</b> Menghapus siswa berarti juga <b><u>menghapus Tagihan</u></b>
		</div>
	</div>
</div>
	
</div>
<?php include "footer.php"; ?>