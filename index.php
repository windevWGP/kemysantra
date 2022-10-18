<?php
// error_reporting(0);
include 'function.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>PT. KEMYSANTRA</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link href="img/logo.png" rel="icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">
  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link rel="stylesheet" href="lib/portfolio-filter-gallery/portfolio-filter-gallery.css">
  <link rel="stylesheet" href="lib/fancybox-master/jquery.fancybox.min.css">
  <link rel="stylesheet" href="lib/range-slider/range-slider.css">
  <link rel="stylesheet" href="lib/owlcarousel/owl.carousel.min.css">
  <link rel="stylesheet" href="lib/owlcarousel/owl.theme.default.min.css">
  <!-- Main Stylesheet File -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <script src="js/aframe.min.js"></script>
</head>

<body>
  <!--==========================
  Header
  ============================-->
  <header id="header">
    <div class="container">
      <div id="logo" class="pull-left">
        <a href="./"><img src="img/logo_kemysantra.png" /></img></a>
      </div>
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li <?= (!isset($_GET['p'])) ? 'class="menu-active"' : ''; ?>>
            <a href="./">Beranda</a>
          </li>
          <li class="menu-has-children <?= ((isset($_GET['p'])) and ((($_GET['p']) == 'sejarah-perusahaan')) or (($_GET['p']) == 'visi-misi-perusahaan')) ? 'menu-active' : ''; ?>"><a href="">Profil</a>
            <ul>
              <li><a href="index.php?p=sejarah-perusahaan">Sejarah Perusahaan</a></li>
              <li><a href="index.php?p=visi-misi-perusahaan">Visi Misi Perusahaan</a></li>
            </ul>
          </li>
          <li <?= ((isset($_GET['p'])) and (($_GET['p']) == 'produk')) ? 'class="menu-active"' : ''; ?>>
            <a href="index.php?p=produk">Produk</a>
          </li>
          <li <?= ((isset($_GET['p'])) and (($_GET['p']) == 'artikel')) ? 'class="menu-active"' : ''; ?>>
            <a href="index.php?p=artikel">Artikel</a>
          </li>
          <li <?= ((isset($_GET['p'])) and (($_GET['p']) == 'galeri')) ? 'class="menu-active"' : ''; ?>>
            <a href="index.php?p=galeri">Galeri</a>
          </li>
          <li <?= ((isset($_GET['p'])) and (($_GET['p']) == 'video')) ? 'class="menu-active"' : ''; ?>>
            <a href="index.php?p=video">Video</a>
          </li>
          <li <?= ((isset($_GET['p'])) and (($_GET['p']) == 'kontak')) ? 'class="menu-active"' : ''; ?>>
            <a href="index.php?p=kontak">Kontak</a>
          </li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
  <div id="main-content">
    <?php if (isset($_GET['p'])) : ?>
      <div id="top-content-background"></div>
    <?php endif; ?>
    <?php include 'content.php'; ?>
  </div>
  <!--==========================
  Contact Section
  ============================-->
  <section id="contact">
    <div class="container wow fadeInUp">
      <div class="section-header mb-5">
        <h3 class="text-center">Hubungi Kami</h3>
        <hr style="border: 1px solid #fff;">
      </div>
    </div>
    <div class="container wow fadeInUp">
      <div class="row justify-content-center">
        <div class="col-lg-4 mb-5 mb-lg-0">
          <p style="margin-bottom: 10px;">Kontak</p>
          <div class="info">
            <div>
              <i class="fa fa-map-marker"></i>
              <p>
                Jl. Karvin No.6 (Samping Gedung Korpri), Benua Melayu Darat, Pontianak Selatan, <br>
                Kota Pontianak, Kalimantan Barat <br>
                78113
              </p>
            </div>
            <div>
              <i class="fa fa-envelope" style="font-size: 22px;"></i>
              <p>
                <a href="mailto:kemysantra@gmail.com" style="color: #fff;">kemysantra@gmail.com</a>
              </p>
            </div>
            <div>
              <i class="fa fa-phone" style="font-size: 28px;"></i>
              <p>
                <a href="tel:05618171107" style="color: #fff;">0561 817 1107</a>
              </p>
            </div>
          </div>
          <div class="social-links">
            <p style="margin-bottom: 10px; font-size: 14px;">Follow Our Social Media</p>
            <a href="https://www.facebook.com/profile.php?id=100036570383228" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="https://www.instagram.com/marketing.kemysantra/?hl=id" class="instagram"><i class="fa fa-instagram"></i></a>
          </div>
        </div>
        <div class="col-lg-3 mb-5 mb-lg-0">
          <p style="margin-bottom: 10px;">Partner & Support</p>
          <div class="row">
            <div class="col-6 mb-3">
              <a href="https://www.btn.co.id/" target="_blank">
                <img src="img/btn.jpg" style="width: 100%; height: 100%; margin-top: 3px; border-radius: 5px;">
              </a>
            </div>
            <div class="col-6">
              <a href="http://www.rei.or.id/newrei/" target="_blank">
                <img src="img/rei.png" style="height: 80px; border-radius: 5px;">
              </a>
            </div>
            <div class="col-6 mt-0 mt-lg-3">
              <a href="https://akcayakemyla.business.site/" target="_blank">
                <img src="img/akcaya_kemyla.jpg" style="width: 100%; height: 100%; border-radius: 5px;">
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <p style="margin-bottom: 10px;">Peta Lokasi Kantor Pemasaran</p>
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d498.72713508337864!2d109.34482807790985!3d-0.04516637116718656!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d59baed381d41%3A0x5980778daea83f6d!2sPT.+KEMYSANTRA!5e0!3m2!1sid!2sid!4v1557491430257!5m2!1sid!2sid" width="100%" height="280" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </section><!-- #contact -->
  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="container">
      <div class="copyright p-0">
        Copyright &copy; <strong><?= date('Y'); ?></strong> | PT. KEMYSANTRA | All Rights Reserved
      </div>
      <div class="credits">
        Developed Website by <a href="https://www.instagram.com/ewinbeckett/" target="_blank">Wiwin Galuh Prayetno</a>
      </div>
    </div>
  </footer><!-- #footer -->
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <!-- <script src="lib/WOW-master/dist/wow.min.js"></script> -->
  <script src="lib/fancybox-master/jquery.fancybox.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <!-- Main Javascript File -->
  <script src="js/main.js"></script>
</body>

</html>