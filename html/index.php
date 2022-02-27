<?php include 'topbar.php';
include 'navbar.php';
?>


<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
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
        <h4 class="page-title">Anasayfa</h4>
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

    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Projeme Hoşgeldin!</h5>
          <p>
            • Yapılan araştırmalar sonucunda projenin OpenCV ve face_recognition kütüphanesi kullanılarak yapılmasına karar verildi.
          </p>
          <p>
            • İlk olarak python üzerinde canlı olarak çalışan bir yüz tanıma sistemi yaptım. Bunun öncesinde fotoğraflar üzerinden çalışmalar gerçekleştirdim ve canlı olarak çalıştırmaya başladım.
          </p>
          <p>
            • Ardından PHP ile yazdığım kişiye özel bir websitesi geliştirdim. Bu websitesine giriş yapmak için yöneticiye özel verilen bilgiler gerekmektedir.
          </p>
          <p>
            • Bu proje için MySQL üzerinde bir veritabanı oluşturdum.  Bu veritabanı hem python ile hemde websitesi ile entegre olarak çalışmaktadır.
          </p>
          <p>
            • Projemin çalışma mantığı, hazırladığım websitesi sayesinde veritabanına İsim,soyisim,fotoğraf ve açıklama şeklinde insan kaydediyoruz. Ardından bu kaydettiğimiz fotoğraf python dosyamız için artık tanınabilir bir yüz haline geliyor. Python dosyasını çalıştırarak eğer bu yüz daha önceden sisteme kaydedildiyse o kişinin yüzünde yeşil bir çerçeve oluşuyor, ismi yazıyor ve hoşgeldiniz mesajı gözüküyor. Bu yüz okuma işlemi sırasında veritabanına yüzü okunan kişinin adı ve giriş tarihi düşüyor. Eğer kişi veritabanında kayıtlı değilse bilinmiyor yazıyor ve kırmızı bir çerçeve oluşuyor. İnternet sitemizde giriş yapan kişinin fotoğrafı ve giriş yaptığı tarihte gözüküyor.
          </p>
          <h3>180508019 - Garip Cem İlyün</h3>
        </div>
      </div>
    </div>
    <?php include 'footer.php' ?>