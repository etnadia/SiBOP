<?php include "header.php"; ?>
<div class="container">
  <div class="panel panel-primary">
    <!-- Default panel contents -->
    <div class="panel-heading">
      <?php
      $sql = mysqli_query($konek, "SELECT * FROM profile");
      while ($p = mysqli_fetch_array($sql)) {
        $paud = $p['namasek'];
        $tahun = date('Y', strtotime($p['periode']));
        echo "<h3 class='panel-title'>RENCANAN KEGIATAN DAN ANGGARAN SATUAN (RKAS) PAUD</h3>";
        echo "<h3 class='panel-title'>TAHUN ANGGARAN " . $tahun . " </h3>";
        echo "<h2 class='panel-title'> $paud </h2>";
      }
      ?>
    </div>
    <div class="panel-body">

      <table class="table">
        <?php
        $sub = mysqli_query($konek, "SELECT jmlsiswa, danasiswa, (jmlsiswa*danasiswa) as grand 
                                   FROM profile");
        $g = mysqli_fetch_array($sub);
        ?>
        <tr>
          <td colspan=7><b>BOP PAUD (<?php echo $g['jmlsiswa']; ?> siswa x Rp. <?php echo buatrp($g['danasiswa']); ?>)</b></td>
          <td><b>Rp. <?php echo buatrp($g['grand']); ?></b></td>
          <td></td>
        </tr>
        <tr>
          <th>No.</th>
          <th>Kode</th>
          <th>Sub Kegiatan</th>
          <th>Nama Kegiatan</th>
          <th>Vol.</th>
          <th>Satuan</th>
          <th>Harga Satuan</th>
          <th>Total Harga</th>
          <th>Waktu</th>
        </tr>
        <?php
        $vmin  = $g['grand'] * 0.5;
        echo "<tr><td ><b><img src='assets/images/icon/cashbook.png' width='25pix'></b></td>
                <td colspan=8><b>1. KEGIATAN PEMBELAJARAN DAN BERMAIN (min. 50%) -  Rp. " . buatrp($vmin) . "</b></td>
            </tr>";
        $sql = mysqli_query($konek, "SELECT * FROM akun
                                  WHERE left(kodeakun,1)= '1' 
																	ORDER BY kodeakun");
        $no = 1;
        while ($d = mysqli_fetch_array($sql)) {
          echo "<tr>
                <td align='center'>$no</td>
								<td>$d[kodeakun]</td>
                <td>$d[kegsubtama]</td>
                <td>$d[nmakun]</td>
                <td>$d[vol]</td>
                <td>$d[satuan]</td>
                <td>" . buatrp($d['hrgsatuan']) . "</td>
                <td>" . buatrp($d['totharga']) . "</td>
                <td>$d[waktu]</td>
							 </tr>";
          $no++;
        }
        $sal = mysqli_query($konek, "SELECT sum(totharga) as subtotal1 
                                  FROM akun
                                  WHERE left(kodeakun,1)= '1'
                                  ORDER BY kodeakun");
        $sub = mysqli_query($konek, "SELECT (jmlsiswa*danasiswa) as grand 
                                  FROM profile");
        $g = mysqli_fetch_array($sub);

        while ($s = mysqli_fetch_array($sal)) {
          $grand     = $g['grand'];
          $subtotal1 = $s['subtotal1'];
          $persen    = ($subtotal1 / $grand) * 100;
          echo "<tr class='alert alert-info'><td></td><td></td><td><b>Sub Total Rp. </b></td>
                  <td colspan =4></td><td><b>" . buatrp($s['subtotal1']) . "</b></td>
                  <td><b>" . number_format($persen, 2) . "% </b></td>
				      </tr>";
        }

        // Kegiatan Nomor 2
        $vmaks2 = $grand * 0.35;
        echo "<tr><td ><b><img src='assets/images/icon/cashbook.png' alt='No' width='25pix'></b></td>
              <td colspan=8><b>2. KEGIATAN PENDUKUNG (maks. 35%) - Rp. " . buatrp($vmaks2) . "</b></td>
           </tr>";
        $sql = mysqli_query($konek, "SELECT * FROM akun
                                WHERE left(kodeakun,1)= '2' 
                                ORDER BY kodeakun");
        $no = 1;
        while ($d = mysqli_fetch_array($sql)) {
          echo "<tr>
              <td align='center'>$no</td>
              <td>$d[kodeakun]</td>
              <td>$d[kegsubtama]</td>
              <td>$d[nmakun]</td>
              <td>$d[vol]</td>
              <td>$d[satuan]</td>
              <td>" . buatrp($d['hrgsatuan']) . "</td>
              <td>" . buatrp($d['totharga']) . "</td>
              <td>$d[waktu]</td>
             </tr>";
          $no++;
        }
        $sal = mysqli_query($konek, "SELECT sum(totharga) as subtotal2 
        FROM akun
        WHERE left(kodeakun,1)= '2'
        ORDER BY kodeakun");
        $sub = mysqli_query($konek, "SELECT (jmlsiswa*danasiswa) as grand 
        FROM profile");
        $g = mysqli_fetch_array($sub);

        while ($s = mysqli_fetch_array($sal)) {
          $grand     = $g['grand'];
          $subtotal2 = $s['subtotal2'];
          $persen    = ($subtotal2 / $grand) * 100;

          echo "<tr class='alert alert-info'><td></td><td></td><td><b>Sub Total Rp. </b></td>
              <td colspan =4></td><td><b>" . buatrp($s['subtotal2']) . "</b></td>
              <td><b>" . number_format($persen, 2) . "% </b></td>
            </tr>";
        }

        // Kegiatan nomor 3
        $vmaks3 = $grand * 0.15;
        echo "<tr><td ><b><img src='assets/images/icon/cashbook.png' width='25pix'></b></td>
              <td colspan=8><b>3. KEGIATAN LAINNYA (maks. 15%) - Rp. " . buatrp($vmaks3) . "</b></td>
          </tr>";
        $sql = mysqli_query($konek, "SELECT * FROM akun
                          WHERE left(kodeakun,1)= '3' 
                          ORDER BY kodeakun");
        $no = 1;
        while ($d = mysqli_fetch_array($sql)) {
          echo "<tr>
        <td align='center'>$no</td>
        <td>$d[kodeakun]</td>
        <td>$d[kegsubtama]</td>
        <td>$d[nmakun]</td>
        <td>$d[vol]</td>
        <td>$d[satuan]</td>
        <td>" . buatrp($d['hrgsatuan']) . "</td>
        <td>" . buatrp($d['totharga']) . "</td>
        <td>$d[waktu]</td>
      </tr>";
          $no++;
        }
        $sal = mysqli_query($konek, "SELECT sum(totharga) as subtotal3 
                                FROM akun
                                WHERE left(kodeakun,1)= '3'
                                ORDER BY kodeakun");
        $sub = mysqli_query($konek, "SELECT (jmlsiswa*danasiswa) as grand 
    FROM profile");
        $g = mysqli_fetch_array($sub);

        while ($s = mysqli_fetch_array($sal)) {
          $grand     = $g['grand'];
          $subtotal3 = $s['subtotal3'];
          $persen    = ($subtotal3 / $grand) * 100;

          echo "<tr class='alert alert-info'><td></td><td></td><td><b>Sub Total Rp. </b></td>
                <td colspan =4></td><td><b>" . buatrp($s['subtotal3']) . "</b></td>
                <td><b>" . number_format($persen, 2) . "% </b></td>
              </tr>";
        }

        // Grand Total 
        $sal = mysqli_query($konek, "SELECT sum(totharga) as grandtotal 
                                FROM akun");
        $sub = mysqli_query($konek, "SELECT jmlsiswa, danasiswa, (jmlsiswa*danasiswa) as grand 
                                 FROM profile");
        $g = mysqli_fetch_array($sub);

        while ($saldo = mysqli_fetch_array($sal)) {
          $totalan = $g['jmlsiswa'] * $g['danasiswa'];
          $persen  = ($saldo['grandtotal'] / $totalan) * 100;
          echo "<tr class='alert alert-danger'><td></td><td></td><td><b>Sub Grand Rp. </b></td>
                <td colspan=4></td>
                <td><b>" . buatrp($saldo['grandtotal']) . "</b></td>
                <td><b>" . number_format($persen, 2) . "%</b></td>
            </tr>";
        }

        echo "<tr class='alert alert-danger'><td></td><td></td><td></td>
                <td colspan=4></td>
                <td><a href='ctk_lap_anggaran.php' class='btn btn-success' style='margin-bottom: 10px;'>
                <img src='assets/images/icon/cashbook+.png' alt='No' width='30pix'> Unduh Excel
                </a></td>
                <td></td>
            </tr>";
        ?>
      </table>
    </div>

  </div>
</div>
<?php include "footer.php"; ?>