<?php include "header.php"; ?>
<div class="container">
	<div class="panel panel-primary">
		<!-- Default panel contents -->
		<div class="panel-heading">
			<?php
			$sql = mysqli_query($konek, "SELECT * FROM profile");
			while ($p = mysqli_fetch_array($sql)) {
				$paud = $p['namasek'];
				$tgl = $p['periode'];
				echo "<h3 class='panel-title'>PENGUNAAN DANA KEGIATAN LAINNYA</h3>";
				echo "<h2 class='panel-title'> $paud </h2>";
				echo "<h3 class='panel-title'>Periode Pelaporan: $tgl </h3>";
			}
			?>
		</div>
		<div class="panel-body">
			<div>
				<a href="tambah_dana03.php" class="btn btn-success" style="margin-bottom: 10px;">
					<img src='assets/images/icon/cashbook+.png' alt='No' width='30pix'> Tambah Data
				</a>
			</div>

			<table class="table">
				<tr>
					<th>No.</th>
					<th>Kode Akun</th>
					<th>Tanggal</th>
					<th>Sub Kegiatan</th>
					<th>Nama Kegiatan</th>
					<th>Vol</th>
					<th>Satuan</th>
					<th>Harga Satuan</th>
					<th>Total Harga</th>
					<th>No. Bukti</th>
					<th>Bukti</th>
					<th>Operasi</th>
				</tr>
				<?php
				$sql = mysqli_query($konek, "SELECT * FROM tblusedana 
																	WHERE kegutama like 'KEGIATAN LAINNYA'
																	ORDER BY kodekeg");
				$no = 1;
				while ($d = mysqli_fetch_array($sql)) {
					$tgl = date('d-m-Y', strtotime($d['tanggal']));
					$nota = $d['bukti'];
					echo " <tr>
                <td align='center'>$no</td>
								<td> <img src='assets/images/icon/cashbook.png' alt='No' width='25pix'>
									$d[kodekeg]
                </td>
								<td>$tgl</td>
								<td>$d[subkegiatan]</td>
								<td>$d[kegiatan]</td>
								<td>$d[volume]</td>
								<td>$d[satuan]</td>
                <td>" . buatrp($d['harga']) . "</td>
								<td>" . buatrp($d['totharga']) . "</td>
								<td>$d[nobukti]</td>
								<td><a href='assets/images/" . $nota . "'>Tampilkan</a></td>
								<td>
									<a href='edit_dana.php?id=$d[idusedana]'
									   class='btn btn-warning btn-xs'>Edit</a>  
									<a href='hapus_dana.php?id=$d[idusedana]' class='btn btn-danger btn-xs'>Hapus</a>
								</td>
							 </tr>";
					$no++;
				}
				$sal = mysqli_query($konek, "SELECT sum(totharga) as grandtotal FROM tblusedana
			                            WHERE kegutama like 'KEGIATAN LAINNYA'
																	ORDER BY kodekeg");
				while ($saldo = mysqli_fetch_array($sal)) {
					echo "<tr class='alert alert-info'><td></td><td colspan=2><b>Grand Total Rp.</b></td>
								<td colspan=5><td><b>" . buatrp($saldo['grandtotal']) . "</b></td><td colspan=3></td>
							</tr>";
				}
				?>
			</table>
			<div class="alert alert-danger" role="alert">
				<b>Ingat!!</b> Menghapus Akun berarti juga <b><u>menghapus Saldo Akun</u></b>
			</div>
		</div>
	</div>

</div>
<?php include "footer.php"; ?>