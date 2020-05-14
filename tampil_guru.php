<?php include "header.php"; ?>
<div class="container">
	<div class="panel panel-primary">
		<!-- Default panel contents -->
		<div class="panel-heading">
			<h3 class="panel-title">DATA GURU</h3>
		</div>
		<div class="panel-body">
			<div>
				<a href="tambah_guru.php" class="btn btn-success" style="margin-bottom: 10px;">
					<img src='assets/images/icon/teacher.png' alt='No' width='30pix'> Tambah Data
				</a>
			</div>
			<!-- Table -->
			<table class="table">
				<tr>
					<th>No.</th>
					<th>NIP</th>
					<th>Nama Guru</th>
					<th>Gender</th>
					<th>Tmp. Lahir</th>
					<th>Tgl. Lahir</th>
					<th>Agama</th>
					<th>Pendidikan</th>
					<th>TMT</th>
					<th>Operasi</th>
				</tr>
				<?php
				$sql = mysqli_query(
					$konek,
					"SELECT * FROM guru ORDER BY idguru"
				);
				$no = 1;
				while ($d = mysqli_fetch_array($sql)) {
					$tgl1 = date('d-m-Y', strtotime($d['tglahir']));
					$tgl2 = date('d-m-Y', strtotime($d['tmtsekolah']));
					echo "<tr>
							<td>$no</td>
							<img></img>
							<td> <img src='assets/images/" . $d['foto'] . "' id='imgDiv'> 
							 $d[nip]
							</td>
							<td>$d[namaguru]</td>
							<td>$d[gender]</td>
							<td>$d[tmplahir]</td>
							<td>$tgl1</td>
							<td>$d[agama]</td>
							<td>$d[pendidikan]</td>
							<td>$tgl2</td>
							<td>
								<a class='btn btn-warning btn-xs' href='edit_guru.php?id=$d[idguru]'>Edit</a>  
								<a class='btn btn-danger btn-xs' href='hapus_guru.php?id=$d[idguru]'>Hapus</a>
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