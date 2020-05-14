<?php include "header.php"; ?>
<div class="container">
	<div class="panel panel-primary">
		<!-- Default panel contents -->
		<div class="panel-heading">
			<?php
			$sql = mysqli_query($konek, "SELECT * FROM profile");
			while ($p = mysqli_fetch_array($sql)) {
				$paud = $p['namasek'];
				$tgl = date('d-m-Y', strtotime($p['periode']));
				echo "<h3 class='panel-title'>KEGIATAN PENDUKUNG</h3>";
				echo "<h2 class='panel-title'> $paud </h2>";
				echo "<h3 class='panel-title'>Periode Pelaporan: $tgl </h3>";
			}
			?>
		</div>
		<div class="panel-body">
			<div>
				<a href="tambah_akun02.php" class="btn btn-success" style="margin-bottom: 10px;">
					<img src='assets/images/icon/cashbook+.png' alt='No' width='30pix'> Tambah Data
				</a>
			</div>

			<table class="table">
				<tr>
					<th>No.</th>
					<th>Kode Akun</th>
					<th>Nama Akun</th>
					<th>Nama Kegiatan</th>
					<th>Vol</th>
					<th>Satuan</th>
					<th>Harga Satuan</th>
					<th>Total Harga</th>
					<th>Waktu</th>
					<th>Operasi</th>
				</tr>
				<?php
				$sql = mysqli_query($konek, "SELECT * FROM akun 
			                            WHERE kegutama like 'KEGIATAN PENDUKUNG' 
			                            ORDER BY kodeakun");
				$no = 1;
				while ($d = mysqli_fetch_array($sql)) {
					echo " <tr>
								<td align='center'>$no</td>
								<td> <img src='assets/images/icon/cashbook.png' alt='No' width='25pix'>
									$d[kodeakun]
								</td>
								<td>$d[kegsubtama]</td>
								<td>$d[nmakun]</td>
								<td>$d[vol]</td>
								<td>$d[satuan]</td>
                <td>" . buatrp($d['hrgsatuan']) . "</td>
								<td>" . buatrp($d['totharga']) . "</td>
								<td>$d[waktu]</td>
								<td>
									<a href='edit_akun02.php?id=$d[idakun]'
									   class='btn btn-warning btn-xs'>Edit</a>  
									<a href='hapus_akun2.php?id=$d[idakun]' class='btn btn-danger btn-xs'>Hapus</a>
								</td>
							 </tr>";
					$no++;
				}
				$sal = mysqli_query($konek, "SELECT sum(totharga) as grandtotal FROM akun
																	WHERE kegutama like 'KEGIATAN PENDUKUNG' 
																	ORDER BY kodeakun");
				$sql = mysqli_query(
					$konek,
					"SELECT *,(jmlsiswa * danasiswa) as danabop FROM profile"
				);
				$e   = mysqli_fetch_array($sql);
				$sld = mysqli_query(
					$konek,
					"SELECT sum(totharga) as grand FROM akun 
														ORDER BY kodeakun"
				);
				$s   = mysqli_fetch_array($sld);
				while ($saldo = mysqli_fetch_array($sal)) {
					$grand    = $s['grand'];
					$danabop  = $e['danabop'];
					$vmaks    = $danabop * 0.35;
					$persen   = ($saldo['grandtotal'] / $vmaks) * 100;
					$kurang   = $vmaks - $saldo['grandtotal'];
					echo "<tr class='alert alert-info'>
								<td></td><td></td><td colspan='2'><b>Total Anggaran Kegiatan Pendukung Rp. </b></td><td></td>
								<td></td><td></td><td><b>" . buatrp($saldo['grandtotal']) . "</b></td>
								<td><b>" . number_format($persen, 2) . "%</b></td><td></td>
							</tr>";

					echo "<tr class='alert alert-warning'>
							 <td></td><td></td><td><b>Kurang Anggaran Rp. </b></td><td></td><td></td>
							 <td></td><td></td><td><b>" . buatrp($kurang) . "</b></td><td></td><td></td>
						 </tr>";
					echo "<tr class='alert alert-success'>
						 <td></td><td></td><td><b>Grand Total Anggaran Rp. </b></td><td></td><td></td>
						 <td></td><td></td><td><b>" . buatrp($grand) . "</b></td><td></td><td></td>
					 </tr>";
				}
				?>
			</table>
			<div class="alert alert-danger" role="alert">
				<?php
				$sql = mysqli_query(
					$konek,
					"SELECT *,(jmlsiswa * danasiswa) as danabop FROM profile"
				);
				$e = mysqli_fetch_array($sql);
				$jmlsiswa = $e['jmlsiswa'];
				$danabop  = $e['danabop'];
				$vmaks     = $danabop * 0.35;
				$dana      = number_format($e['danabop'], 0, ",", ".");
				$danasiswa = number_format($e['danasiswa'], 0, ",", ".");
				$maks      = number_format($vmaks, 0, ",", ".");

				echo "<b>TOTAL DANA BOP        : Rp. " . $dana . "</b>";
				echo " (" . $jmlsiswa . " Siswa x Rp. " . $danasiswa . ")<br>";
				echo "<b>KEGIATAN PENDUKUNG MAKS. 35% : Rp." . $maks . "</b>";
				?>
			</div>
		</div>
	</div>

</div>
<?php include "footer.php"; ?>