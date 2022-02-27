<?php include 'topbar.php';
include 'navbar.php';


if (isset($_POST['kaydet'])) {
  $adi = $_POST['adi'];
  $soyadi = $_POST['soyadi'];
  $aciklama = $_POST['aciklama'];

  $izinli_uzantilar=array('jpg','png','jpeg');

  $ae = explode(".",$_FILES['fotograf']['name']);
  $aw = count($ae);
  $ext = $ae[$aw-1];


  if (in_array($ext, $izinli_uzantilar)===false) {
    echo '<script>alert("Sadece .jpg , .png , .jpeg uzantılı dosyalar yüklenebilir!")</script>';
  } else {

    $uploads_dir = '../uygulama/upload';

    @$tmp_name = $_FILES['fotograf']["tmp_name"];
    $newfilename = $adi." ".$soyadi.".jpg";

    $refimgyol=$uploads_dir."/".$newfilename;
    $refimgyolmain="uygulama/upload/".($newfilename);

    @move_uploaded_file($tmp_name, ("$uploads_dir/$newfilename"));


    $sorgu = $conn->prepare("INSERT INTO yuzler (adi, soyadi, aciklama, fotograf) VALUES (?,?,?,?)");
    $sorgu->bindParam(1,$adi,PDO::PARAM_STR);
    $sorgu->bindParam(2,$soyadi,PDO::PARAM_STR);
    $sorgu->bindParam(3,$aciklama,PDO::PARAM_STR);
    $sorgu->bindParam(4,$refimgyolmain,PDO::PARAM_STR);
    $sorgu->execute();
    if($sorgu->rowCount() > 0){
      $alert = array
      (
        'type' => "success",
        'msg' => "Yüz başarıyla eklendi.",
        'second' => "2",
        'url' => "form-basic.php"
      );

    }else{
      $alert = array
      (
        'type' => "danger",
        'msg' => "Bir hata oluştu.",
        'second' => "2",
        'url' => "form-basic.php"
      );
    }

  }

}

?>
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
  <!-- ============================================================== -->
  <!-- Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Kişi Ekle</h4>
        <div class="ms-auto text-end">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                Kişi Ekle
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
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data" data-parsley-validate>
            <div class="card-body">
             <?php
             if (isset($alert)) { ?>
              <div class="alert alert-<?php echo $alert['type'] ?>"><?php echo $alert['msg'] ?></div>
              <?php

              if ($alert['url'] != "0") { ?>
                <meta http-equiv="refresh" content="<?php echo $alert['second'] ?>;URL=<?php echo $alert['url'] ?>">
              <?php } else { ?>
                <meta http-equiv="refresh" content="<?php echo $alert['second'] ?>;">
              <?php } ?>                     
            <?php } ?>
            <h4 class="card-title">Kişi Bilgileri</h4>
            <div class="form-group row">
              <label
              for="fname"
              class="col-sm-3 text-end control-label col-form-label"
              >Adı</label
              >
              <div class="col-sm-2">
                <input
                type="text"
                class="form-control"
                id="fname"
                name="adi"
                placeholder="Adını buraya yazınız."
                />
              </div>
            </div>
            <div class="form-group row">
              <label
              for="lname"
              class="col-sm-3 text-end control-label col-form-label"
              >Soyadı</label
              >
              <div class="col-sm-2">
                <input
                type="text"
                class="form-control"
                id="lname"
                name="soyadi"
                placeholder="Soyadını buraya yazınız."
                />
              </div>
            </div>
            <div class="form-group row">
              <label
              for="fname"
              class="col-sm-3 text-end control-label col-form-label"
              >Fotoğraf</label
              >
              <div class="col-md-9">
                <div class="custom-file">
                  <input
                  type="file"
                  class="custom-file-input"
                  id="validatedCustomFile"
                  name="fotograf"
                  required
                  />
                  <div class="invalid-feedback">
                    Example invalid custom file feedback
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label
              for="cono1"
              class="col-sm-3 text-end control-label col-form-label"
              >Not</label
              >
              <div class="col-sm-2">
                <textarea class="form-control" name="aciklama"></textarea>
              </div>
            </div>
          </div>
          <div class="border-top">
            <div class="card-body">
              <button type="submit" name="kaydet" class="btn btn-primary">
                Kaydet
              </button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
  <!-- editor -->
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
<?php include 'footer.php' ?>