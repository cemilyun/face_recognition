<?php include 'topbar.php';
include 'navbar.php';

$sorgu = $conn->prepare("SELECT * FROM yuzler");
$sorgu->execute();
$girisler = $conn->prepare("SELECT name FROM giris WHERE giris_durumu='enabled' GROUP BY name");
$girisler->execute();
$ciktigiris = $girisler->fetchAll(PDO::FETCH_COLUMN);

?>
<div class="page-wrapper">
  <!-- ============================================================== -->
  <!-- Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Veri Tabanı</h4>
        <div class="ms-auto text-end">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                Veri Tabanı
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- End Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- Container fluid  -->
  <!-- ============================================================== -->
  <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->


    <div class="row el-element-overlay">
      <?php while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) { ?>

        <div class="col-lg-3 col-md-6">
          <div class="card">
            <div class="el-card-item">
              <div class="el-card-avatar el-overlay-1">
                <img src="<?php echo "../".$cikti['fotograf'] ?>" alt="user" style="width: 100%; height: 200px;" />
                <div class="el-overlay">
                </div>
              </div>
              <div class="el-card-content">
                <h4 class="mb-0"><?php echo $cikti['adi']." ".$cikti['soyadi'] ?></h4>
                <span class="text-muted"><?php echo $cikti['aciklama']?></span>
                <hr/>
                <?php 
                if (in_array($cikti['adi']." ".$cikti['soyadi'] , $ciktigiris)) { ?>
                  <div class="alert alert-success" role="alert" style="width:200px; height: 100px; margin: auto;">
                    <h4 class="alert-heading">Giriş Yaptı!</h4>
                    <hr />
                    <p class="mb-0">
                      <?php 

                      $sorx = $conn->prepare("SELECT * FROM giris where name LIKE ? order by id DESC LIMIT 1");
                      $sorx->execute(array('%'.$cikti['adi']." ".$cikti['soyadi'].'%'));
                      $sorxcek = $sorx->fetch(PDO::FETCH_ASSOC);
                      echo $sorxcek['date'];
                      ?>
                    </p>
                  </div>
                <?php  }else{ ?>
                 <div class="alert alert-danger" role="alert" style="width:200px; height: 100px; margin: auto;">
                  <h4 class="alert-heading">Giriş Yapmadı!</h4>
                  <hr />
                  <p class="mb-0">
                    ----
                  </p>
                  </div> <?php  } ?>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>




      <!-- ============================================================== -->
      <!-- End PAge Content -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Right sidebar -->
      <!-- ============================================================== -->
      <!-- .right-sidebar -->
      <!-- ============================================================== -->
      <!-- End Right sidebar -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- End Page wrapper  -->
  <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<?php include 'footer.php' ?>
<!-- this page js -->
<script src="../assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
<script src="../assets/libs/magnific-popup/meg.init.js"></script>

