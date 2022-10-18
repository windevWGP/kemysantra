<?php

$jumlah_produk = count(query("SELECT * FROM produk"));

?>
<section id="hero">
  <div class="hero-container">
    <h1>PT. KEMYSANTRA</h1>
    <h2>
      Penyedia Rumah Murah <span style="color: #2DC997;">Bersubsidi</span> Untuk Masyarakat Berpenghasilan Rendah <br>
      Di Provinsi Kalimantan Barat
    </h2>
    <a href="index.php?p=produk" class="btn-get-started">Lihat Produk</a>
    <a href="https://wa.me/+6289602694533;" target="_blank" class="btn-get-started" style="background: #02A734;">Pesan Online</a>
  </div>
</section><!-- #hero -->

<main id="main">

  <!--==========================
  About Us Section
  ============================-->
  <section id="about">
    <div class="container">
      <div class="row about-container">

        <div class="col-lg-6 content order-lg-1 order-2">
          <h2 class="title mb-3">Sekilas Tentang Kami</h2>
          <p class="mb-3 text-justify">
            PT. Kemysantra merupakan perusahaan yang bergerak dibidang RealEstat yang mana melakukan penyediaan Perumahan Rakyat Bersubsidi.
            Sudah ratusan rumah telah kami produksi, kepercayaan masyarakat akan produk kami semakin meningkat. Kami juga menyediakan jasa Kredit Pemilikan Rumah (KPR), dengan pelayanan kami akan menjaga kepercayaan konsumen kami sampai impian mereka memiliki rumah dapat tercapai.
          </p>

        </div>

        <div class="col-lg-6 background order-lg-2 order-1 wow fadeInRight"></div>
      </div>

    </div>
  </section><!-- #about -->

  <section id="services">
    <div class="container wow fadeIn">
      <div class="section-header mb-3">
        <h3 class="section-title">Layanan</h3>
        <p class="section-description mb-4">

        </p>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
          <div class="box">
            <div class="icon"><a href=""><i class="fa fa-desktop"></i></a></div>
            <h4 class="title"><a href=""> KPR BERSUBSIDI</a></h4>
            <p class="description">Dapatkan hunian pertama Anda dengan KPR BTN Subsidi dengan berbagai kemudahan dan biaya yang ringan</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
          <div class="box">
            <div class="icon"><a href=""><i class="fa fa-bar-chart"></i></a></div>
            <h4 class="title"><a href="">KONSULTASI KPR</a></h4>
            <p class="description">Melakukan konsultasi mengenai KPR</p>
          </div>
        </div>
      </div>
    </div>

    </div>
  </section><!-- #services -->

  <section id="services">
    <div class="container wow fadeIn">
      <div class="section-header mb-3">
        <h3 class="section-title">Video</h3>
      </div>

      <div class="row justify-content-center">
        <?php
        $data_video = mysqli_query($conn, "SELECT * FROM video ORDER BY id DESC LIMIT 3");
        ?>
        <?php while ($row = mysqli_fetch_assoc($data_video)) : ?>
          <?php $id_video = $row["link_youtube"]; ?>
          <div class="col-lg-4 mb-0 mb-lg-3">
            <div class="card wow fadeIn mb-3 mt-4" data-wow-delay=".1s" style="border-radius: 20px;">
              <div class="position-relative" style="border-top-right-radius: 20px;">
                <img src=" https://img.youtube.com/vi/<?= $id_video; ?>/hqdefault.jpg" alt="" class="w-100" style="border-top-right-radius: 20px;">
                <div class="demo-gallery-poster fables-main-gradient" style="border-top-right-radius: 20px;">
                  <a data-fancybox href="https://www.youtube.com/embed/<?= $id_video; ?>">
                    <img src="img/play-button.png" alt="play button" class="img-fluid">
                  </a>
                </div>
              </div>
              <div class="col-lg-12" style="background: #202D3A; border-bottom-left-radius: 20px;">
                <div class="text-center pt-1 pb-1 crop-text-2 font-11 text-white" style="height: 50px;">
                  <?php
                  $title = get_youtube_title($id_video);
                  echo $title;
                  ?>
                </div>
              </div>

            </div>
          </div>
        <?php endwhile; ?>

      </div>

    </div>

    </div>
  </section><!-- #services -->

  <section id="call-to-action">
    <div class="container wow fadeIn">
      <div class="row">
        <div class="col-lg-9 text-center text-lg-left">
          <h3 class="cta-title">Hubungi Kami Sekarang</h3>
          <p class="cta-text">
            Segera hubungi kami dan dapatkan promo menarik untuk mendapatkan rumah yang murah dan bersubsidi !
          </p>
        </div>
        <div class="col-lg-3 cta-btn-container text-center">
          <a class="cta-btn align-middle" href="https://wa.me/+6282253391445">Hubungi Kami</a>
        </div>
      </div>

    </div>
  </section><!-- #call-to-action -->
</main>