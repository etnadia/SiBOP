<?php include "header.php"; ?>
<div class="container">
  <div class="panel panel-primary">
    <!-- Default panel contents -->
    <div class="panel-heading">
      <?php
      $sql = mysqli_query($konek, "SELECT * FROM profile");
      while ($p = mysqli_fetch_array($sql)) {
        $tgl = date('d-m-Y', strtotime($p['periode']));
        $paud = $p['namasek'];
        echo "<h3 class='panel-title'>LAPORAN PENGUNAAN DANA</h3>";
        echo "<h2 class='panel-title'> $paud </h2>";
        echo "<h3 class='panel-title'>Periode Pelaporan: $tgl </h3>";
      }
      ?>
    </div>
    <div class="panel-body">

      <table class="table">
        <tr>
          <th>No.</th>
          <th>No.Kegiatan</th>
          <th>JENIS PENGELUARAN</th>
          <th>Tanggal</th>
          <th>Jumlah</th>
          <th>No. Bukti</th>
        </tr>
        <?php


        echo "<tr><td ><b><img src='assets/images/icon/cashbook.png' alt='No' width='25pix'></b></td><td colspan=4 align=left><b>KEGIATAN PEMBELAJARAN DAN BERMAIN</b></td><td colspan=4></td></tr>";
        $sql = mysqli_query($konek, "SELECT * FROM tblusedana
                                  WHERE left(kodekeg,1)= '1' 
																	ORDER BY kodekeg");
        $no = 1;
        while ($d = mysqli_fetch_array($sql)) {
          $tgl = date('d-m-Y', strtotime($d['tanggal']));
          echo "<tr>
                <td align='center'>$no</td>
								<td>$d[kodekeg]</td>
                <td>$d[kegiatan]</td>
                <td>$tgl</td>
                <td>" . buatrp($d['totharga']) . "</td>
                <td>$d[nobukti]</td>
							 </tr>";
          $no++;
        }
        $sal = mysqli_query($konek, "SELECT sum(totharga) as grandtotal 
                                  FROM tblusedana
                                  WHERE left(kodekeg,1)= '1'
																	ORDER BY kodekeg");
        while ($saldo = mysqli_fetch_array($sal)) {
          echo "<tr class='alert alert-info'><td></td><td></td><td><b>Sub Total Rp. </b></td><td></td>
				<td><b>" . buatrp($saldo['grandtotal']) . "</b></td><td></td>
				</tr>";
        }

        // Kegiatan Nomor 2
        echo "<tr><td ><b><img src='assets/images/icon/cashbook.png' alt='No' width='25pix'></b></td><td colspan=4 align=left><b>KEGIATAN PENDUKUNG</b></td><td colspan=4></td></tr>";
        while ($d = mysqli_fetch_array($sql)) {
          if (substr($d['kodekeg'], 0, 1) == '2') {
            echo "<tr><td><b><img src='assets/images/icon/cashbook.png' alt='No' width='25pix'></b></td><td><b>$d[kegutama]</b></td><td colspan=4></td></tr>";
          }
        }
        $sql = mysqli_query($konek, "SELECT * FROM tblusedana
                                WHERE left(kodekeg,1)= '2' 
                                ORDER BY kodekeg");
        //$no = 1;
        while ($d = mysqli_fetch_array($sql)) {
          $tgl = date('d-m-Y', strtotime($d['tanggal']));
          echo "<tr>
              <td align='center'>$no</td>
              <td>$d[kodekeg]</td>
              <td>$d[kegiatan]</td>
              <td>$tgl</td>
              <td>" . buatrp($d['totharga']) . "</td>
              <td>$d[nobukti]</td>
             </tr>";
          $no++;
        }
        $sal = mysqli_query($konek, "SELECT sum(totharga) as grandtotal 
                                FROM tblusedana
                                WHERE left(kodekeg,1)= '2'
                                ORDER BY kodekeg");
        while ($saldo = mysqli_fetch_array($sal)) {
          echo "<tr class='alert alert-info'><td></td><td></td><td><b>Sub Total Rp. </b></td><td></td>
      <td><b>" . buatrp($saldo['grandtotal']) . "</b></td><td></td>
      </tr>";
        }
        // Kegiata nomor 3
        echo "<tr><td ><b><img src='assets/images/icon/cashbook.png' alt='No' width='25pix'></b></td><td colspan=4 align=left><b>KEGIATAN PENDUKUNG LAINNYA</b></td><td colspan=4></td></tr>";
        while ($d = mysqli_fetch_array($sql)) {
          if (substr($d['kodekeg'], 0, 1) == '3') {
            echo "<tr><td><b><img src='assets/images/icon/cashbook.png' alt='No' width='25pix'></b></td><td><b>$d[kegutama]</b></td><td colspan=4></td></tr>";
          }
        }
        $sql = mysqli_query($konek, "SELECT * FROM tblusedana
                               WHERE left(kodekeg,1)= '3' 
                               ORDER BY kodekeg");
        //$no = 1;
        while ($d = mysqli_fetch_array($sql)) {
          $tgl = date('d-m-Y', strtotime($d['tanggal']));
          echo "<tr>
             <td align='center'>$no</td>
             <td>$d[kodekeg]</td>
             <td>$d[kegiatan]</td>
             <td>$tgl</td>
             <td>" . buatrp($d['totharga']) . "</td>
             <td>$d[nobukti]</td>
            </tr>";
          $no++;
        }
        $sal = mysqli_query($konek, "SELECT sum(totharga) as grandtotal 
                               FROM tblusedana
                               WHERE left(kodekeg,1)= '3'
                               ORDER BY kodekeg");
        while ($saldo = mysqli_fetch_array($sal)) {
          echo "<tr class='alert alert-info'><td></td><td></td><td><b>Sub Total Rp. </b></td><td></td>
     <td><b>" . buatrp($saldo['grandtotal']) . "</b></td><td></td>
     </tr>";
        }

        // Grand Total 
        $sal = mysqli_query($konek, "SELECT sum(totharga) as grandtotal 
                                FROM tblusedana
                                ORDER BY kodekeg");
        while ($saldo = mysqli_fetch_array($sal)) {
          echo "<tr class='alert alert-warning'><td></td><td></td><td><b>Sub Grand Rp. </b></td><td></td>
      <td><b>" . buatrp($saldo['grandtotal']) . "</b></td><td></td>
      </tr>";
        }

        ?>
      </table>
      <div class="alert alert-danger" role="alert">
        <a href='' class='btn btn-success' style='margin-bottom: 10px;'>
          <img src='assets/images/icon/cashbook+.png' alt='No' width='30pix'> Unduh Excel
        </a>
      </div>
    </div>
  </div>

</div>
<?php include "footer.php"; ?>