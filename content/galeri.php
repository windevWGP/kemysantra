<?php
$data_album = mysqli_query($conn, "SELECT * FROM album_galeri ORDER BY id DESC");
?>

<?php if (isset($_GET['album'])) : ?>

	<?php

	$id_album = $_GET['id'];

	$album = mysqli_query($conn, "SELECT * FROM album_galeri WHERE id=$id_album");

	if ($row = mysqli_fetch_assoc($album)) {
		$nama_album = $row['nama'];
	}
	$galeri = mysqli_query($conn, "SELECT * FROM galeri WHERE id_album='$id_album' ORDER BY id DESC");
	$jumlah_foto = count(query("SELECT * FROM galeri WHERE id_album='$id_album' ORDER BY id DESC"));
	$saran_album = mysqli_query($conn, "SELECT * FROM album_galeri WHERE id NOT LIKE '$id_album' ORDER BY RAND() ");

	?>
	<div class="container mt-3">
		<div class="portfolioContainer row border-0">
			<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-lg-3">

				<div class="text-left">

					<h5 class="fables-main-text-color font-20 my-3">Galeri - Album <?= $nama_album; ?></h5>

					<hr>

				</div>

				<div class="row">

					<?php if ($jumlah_foto > 0) : ?>

						<?php foreach ($galeri as $row) : ?>

							<div class="drawings places col-sm-6 col-md-4 col-xs-12 mb-4">

								<div class="filter-img-block position-relative image-container translate-effect-right">

									<img src="thumbnail.php?width=400&height=250&src=img/galeri/<?= $row['foto']; ?>" style="height:180px; object-fit: cover;">

									<div class="img-filter-overlay fables-main-color-transparent">

										<a data-fancybox="gallery" href="img/galeri/<?= $row['foto']; ?>" class="gallery-filter-icon white-color fables-second-hover-color" style="margin-top: 70px;">

											<span class="fa fa-search-plus" style="font-size: 25px;"></span>

										</a>

									</div>

								</div>

								<p style="color: #fff; background: #549290; padding: 8px 5px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; text-align: center; text-transform: capitalize;">

									<?= $row['judul']; ?>

								</p>

							</div>

						<?php endforeach; ?>



					<?php else : ?>



						<div class="col-lg-12">

							<div class="alert alert-success">

								<div class="row justify-content-center mt-4 mb-5">

									<div class="col-lg-4">

										<img src="img/empty-box.png" style="width: 250px; height: 200px;">

										<h3 class="text-center mt-3">

											Album <?= $nama_album; ?> <br> Kosong !

										</h3>

									</div>

								</div>

							</div>

						</div>



					<?php endif ?>

				</div>

			</div>



			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 p-lg-3">

				<div class="text-left">

					<h5 class="fables-main-text-color font-20 my-3">Album Lainnya</h5>

					<hr>

				</div>

				<div class="row">

					<?php foreach ($saran_album as $row) : ?>

						<div class="col-lg-12 mb-2">

							<a href="index.php?p=galeri&album&id=<?= $row['id']; ?>" class="saran-album">

								<div class="card">

									<div class="card-body d-flex p-0">

										<img src="img/icon-album.png" style="width: 80px; height: 80px;">

										<p class="font-weight-bold my-auto ml-3" style="font-size: 20px;"><?= $row['nama']; ?></p>

									</div>

								</div>

							</a>

						</div>

					<?php endforeach; ?>

				</div>

			</div>

		</div>

	</div>



<?php else : ?>



	<div class="container mt-3">

		<div class="row">

			<div class="col-lg-12">

				<div class="text-left">

					<h5 class="fables-main-text-color font-25 my-3">Galeri</h5>

					<hr>

				</div>

			</div>

		</div>

		<div class="gallery-filter">

			<div class="portfolioContainer row">

				<?php foreach ($data_album as $row) : ?>



					<div class="drawings places col-sm-6 col-md-3 col-xs-12 mb-4">

						<div class="filter-img-block position-relative image-container translate-effect-right" style="border: solid 2px #549290; border-top-left-radius: 20px;">

							<img src="img/icon-album.png" style="height: 200px; object-fit: contain;">

							<div class="img-filter-overlay fables-main-color-transparent row m-0">

								<a href="index.php?p=galeri&album&id=<?= $row['id']; ?>" class="gallery-filter-icon white-color fables-second-hover-color"><span class="fa fa-eye" style="font-size: 25px;"></span></a>

							</div>

						</div>

						<p style="color: #fff; background: #549290; padding: 8px 5px; border-bottom-right-radius: 20px; text-align: center; text-transform: capitalize;">

							<?= $row['nama']; ?>

						</p>

					</div>



				<?php endforeach; ?>



			</div>

		</div>

	</div>



<?php endif; ?>