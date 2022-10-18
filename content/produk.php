<?php 
  $data_produk_semua = mysqli_query($conn, "SELECT * FROM produk ORDER BY RAND()");
  $data_produk_terbaru = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC LIMIT 8");
?>

<section id="portfolio">
  <div class="container wow fadeInUp">
    <div class="row">
      <div class="col-lg-12">
        <div class="text-left">
          <h5 class="fables-main-text-color font-25">Produk</h5>
          <hr>
        </div>
      </div>
      <div class="col-lg-12">
        <ul id="portfolio-flters">
          <li data-filter=".no-filter" class="filter-active">Semua Produk</li>
          <li data-filter=".filter-terbaru">Produk Terbaru</li>
        </ul>
      </div>
    </div>

    <div class="row" id="portfolio-wrapper">

    <?php foreach ($data_produk_semua as $row): ?>
      <div class="col-lg-3 col-md-6 portfolio-item no-filter mb-4">
        <a href="index.php?p=detail-produk&id=<?= $row['id']; ?>">
          <img src="thumbnail.php?width=400&height=200&src=img/foto_produk/<?= $row['foto']; ?>" style="width: 100%; height: 200px; object-fit: cover;">
          <div class="details">
            <h4><?= $row['nama_produk']; ?></h4>
            <span><?= $row['tipe']; ?></span>
          </div>
        </a>
      </div>
    <?php endforeach; ?>

    <?php foreach ($data_produk_terbaru as $row): ?>
      <div class="col-lg-3 col-md-6 portfolio-item filter-terbaru mb-4">
        <a href="index.php?p=detail-produk&id=<?= $row['id']; ?>">
          <img src="thumbnail.php?width=300&height=250&src=img/foto_produk/<?= $row['foto']; ?>" style="width: 100%; height: 200px; object-fit: cover; object-position: top;">
          <div class="details">
            <h4><?= $row['nama_produk']; ?></h4>
            <span><?= $row['tipe']; ?></span>
          </div>
        </a>
      </div>
    <?php endforeach; ?>

    </div>

  </div>
  </section><!-- #portfolio -->