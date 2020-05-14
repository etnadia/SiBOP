<?php include "header.php"; ?>
<div class="container">
	<div class="panel panel-primary">
		<!-- Default panel contents -->
		<div class="panel-heading">
			<h3 class="panel-title">DATA PROFILE PAUD</h3>
		</div>
		<div class="panel-body">
			<div>
				<a href="tambah_profile.php" class="btn btn-success" style="margin-bottom: 10px;">
					<img src='assets/images/icon/teacher.png' alt='No' width='30px'> Tambah Data
				</a>
			</div>
			<!-- Table -->
			<table class="table">
				<tr>
					<th>No.</th>
					<th>ID Sekolah</th>
					<th>Nama Sekolah</th>
					<th>Alamat</th>
					<th>Kab/Kota</th>
					<th>Telp.</th>
					<th>Kepala Sekolah</th>
					<th>Jml Siswa</th>
					<th>Operasi</th>
				</tr>
				<?php
				$sql = mysqli_query(
					$konek,
					"SELECT * FROM profile ORDER BY idsekolah"
				);
				$no = 1;
				while ($d = mysqli_fetch_array($sql)) {
					//	$tgl = date('d-m-Y', strtotime($d['periode']));
					echo "<tr>
							<td>$no</td>
							<td> <img src='assets/images/icon/school.ico' alt='No' width='25pix'> 
							 $d[idsekolah]
              </td>
              <td>$d[namasek]</td>
              <td>$d[alamat]</td>
							<td>$d[kota]</td>
              <td>$d[telp]</td> 
							<td>$d[kepsek]</td>
              <td>$d[jmlsiswa]</td>							
							<td>
								<a class='btn btn-warning btn-xs' href='edit_profile.php?id=$d[idsek]'>Edit</a>  
								<a class='btn btn-danger btn-xs' href='hapus_profile.php?id=$d[idsek]'>Hapus</a>
							</td>
						</tr>";
					$no++;
				}
				?>
			</table>
		</div>
	</div>

</div>
<?php include "footer.php"; ?>