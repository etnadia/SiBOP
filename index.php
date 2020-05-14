<?php include "header.php"; ?>
<div class="row text-center">
    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                              <h1 class="font-light text-white"><i class="mdi mdi-account-location"></i></h1>
                                <h6 class="text-white">
                                  Jumlah Siswa : 
                                    <?php
                                    $sql = mysqli_query($konek, "SELECT * FROM siswa");
                                    while ($d = mysqli_fetch_array($sql)) {
                                      $jml[] = $d;
                                    }
                                    $jmlrec = count($jml);
                                    echo $jmlrec + 25;
                                    ?>																	
                                 </h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-account-multiple"></i></h1>
                                <h6 class="text-white">Jml Guru : 4</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-cash"></i></h1>
                                <h6 class="text-white">Dana BOP : Rp. 18.000.000</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-cash-multiple"></i></h1>
                                <h6 class="text-white">Total Penggunaan : Rp. 9.500.000</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="d-md-flex align-items-center">
        <div>
            <h1 class="card-title text-warning"><b>SI-BOP</b></h1>
            <h3 class="card-subtitle text-info">
                <b>(Sistem Informasi Bantuan Operasional Pendidikan)</b>
            </h3>
            <h2 class="card-subtitle text-danger">
                <b>TK/KB TADIKA PURI BUNDA</b>
            </h2>
        </div>
        </div>
        <div class="row">
        <!-- column -->
        <div class="col-lg-12">

            <!-- <img src="assets/images/background/paud2.jpg" class="img-fluid" width=50%> -->
        </div>
        <!-- column -->
        </div>
        </div>
      </div>
    </div>
   </div>
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
 </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
<?php include "footer.php"; ?>