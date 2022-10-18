<section style="padding-top: 10px;">
	<?php if (isset($_GET["view"])) : ?>
		<?php
		$id = $_GET["id"];
		$data_berita = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM berita WHERE id='$id' "));
		$berita_terkait = mysqli_query($conn, "SELECT * FROM berita WHERE status='1' AND id != '$id' ORDER BY id DESC LIMIT 8");
		$id_kategori = $data_berita["id_kategori"];
		$kategori = mysqli_query($conn, "SELECT * FROM (SELECT * FROM kategori_berita WHERE id != '$id_kategori' ORDER BY RAND() LIMIT 50) t1 ORDER BY kategori ASC");
		$data_kategori = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kategori_berita WHERE id='$id_kategori' "));
		?>

		<div class="container mt-0 mt-lg-4">
			<div class="row mb-5">
				<div class="col-lg-8 mb-4 mb-lg-0 wow fadeIn" data-wow-delay=".2s">
					<div class="wow fadeInLeft">
						<h2 class="font-25 font-weight-bold text-justify" style="color: #000;">
							<?= $data_berita["judul"]; ?>
						</h2>
						<hr style="border: solid 2px #015456;">
					</div>
					<div class="image-container zoomIn-effect">
						<div class="above-date fables-fifth-text-color float-left w-100">
							<div class="float-left font-13 mb-4">
								<span class="fables-iconcalender"></span> <?= strftime('%A, %e %b %Y | %H:%M WIB', strtotime($data_berita['tanggal_publish'])); ?>
							</div>
							<div class="float-right font-13 mb-4">
								<span class="fa fa-list-alt"></span>
								<?= $data_kategori["kategori"]; ?>
							</div>
						</div>
						<a href="index.php?p=artikel&view&id=<?= $data_berita['id']; ?>">
							<img src="<?= (empty($data_berita['foto_headline'])) ? 'img/bgnoimage.png' : 'img/headline_berita/' . $data_berita['foto_headline']; ?>" style="width: 100%; height: 100%;">
						</a>
					</div>

					<div class="mt-4">
						<?= $data_berita["isi"]; ?>
					</div>

					<div class="row mt-5">
						<div class="col-lg-12 text-left">
							<h5 class="mt-4">Tag</h5>
							<hr style="width: 100%; border: solid 1px #015456;">
							<?php
							$data_tag_berita = $data_berita["tag_berita"];
							$tags = explode("#", $data_tag_berita);
							?>
							<?php for ($i = 1; $i < count($tags); $i++) : ?>
								<a href="index.php?p=artikel&tag=<?= $tags[$i]; ?>" style="float: left; color: #015456;"><?= "#" . $tags[$i] . "&nbsp;"; ?></a>
							<?php endfor; ?>
						</div>
					</div>

				</div>

				<div class="col-lg-4" style="margin-top: 0px;">
					<form action="index.phpindex.php?p=artikel" method="GET">
						<input type="hidden" name="p" value="berita">
						<div class="d-flex">
							<input type="text" name="search" id="search" class="form-control" placeholder="Cari berita ..." style="width: 80%; border: solid 2px #333;" required>
							<button type="submit" style="background: #015456; color: #fff; display: flex; cursor: pointer; border: none; border-top-right-radius: 5px; border-bottom-right-radius: 5px;"><i class="fa fa-search mt-1 mr-2"></i> Cari</button>
						</div>
					</form>
					<br>
					<h3 class=" font-22 font-weight-bold" style="color: #000;">
						Artikel Terkait
					</h3>
					<hr style="border: solid 2px #015456;">

					<div class="row">
						<?php while ($row = mysqli_fetch_assoc($berita_terkait)) : ?>
							<a href="index.php?p=artikel&view&id=<?= $row['id']; ?>" class="tombol-berita-terkait">
								<div class="col-12 mb-3 image-container shine-effect">
									<div class="border rounded bg-white d-flex">
										<img src="<?= (empty($row['foto_headline'])) ? 'img/bgnoimage.png' : 'img/headline_berita/' . $row['foto_headline']; ?>" style="width: 120px; height: 75px; object-fit: cover;">
										<div class="font-14 crop-text-3 p-2" style="height: 75px;">
											<?= $row["judul"]; ?>
										</div>
									</div>
								</div>
							</a>
						<?php endwhile; ?>

					</div>

					<h3 class=" font-22 font-weight-bold mt-5" style="color: #000;">
						Kategori
					</h3>
					<hr style="border: solid 2px #015456;">
					<div class="row" style="margin: 0px;">
						<?php if ($id_kategori != "") : ?>
							<a href="index.php?p=artikel&kategori&id=<?= $id_kategori; ?>kategori=<?= $data_kategori['kategori']; ?>" class="link-kategori-active border rounded d-flex mr-2 mb-2">
								<div class="font-14 crop-text-3 p-2">
									<?= $data_kategori["kategori"]; ?>
								</div>
							</a>
						<?php endif; ?>
						<?php while ($row = mysqli_fetch_assoc($kategori)) : ?>
							<a href="index.php?p=artikel&kategori&id=<?= $row['id']; ?>&kategori=<?= $row['kategori']; ?>" class="link-kategori border rounded d-flex mr-2 mb-2">
								<div class="font-14 crop-text-3 p-2">
									<?= $row["kategori"]; ?>
								</div>
							</a>
						<?php endwhile; ?>
					</div>

				</div>

			</div>
		</div>

	<?php elseif (isset($_GET["tag"])) : ?>
		<?php
		$tag = "#" . $_GET["tag"];
		$data_berita = mysqli_query($conn, "SELECT * FROM berita WHERE tag_berita LIKE '%$tag%' AND status='1' ORDER BY id DESC");
		$berita_terkait = mysqli_query($conn, "SELECT * FROM berita WHERE status='1' AND id != '$id' ORDER BY id DESC LIMIT 8");
		$kategori = mysqli_query($conn, "SELECT * FROM (SELECT * FROM kategori_berita WHERE id != '$id_kategori' ORDER BY RAND() LIMIT 50) t1 ORDER BY kategori ASC");
		?>

		<div class="container mt-0 mt-lg-4">
			<div class="row">
				<div class="col-lg-8">
					<div class="row">
						<div class="col-12 wow fadeInLeft">
							<h2 class="font-25 font-weight-bold" style="color: #000;">
								Artikel - <span style="color: #015456;">Tag : <?= $tag; ?></span>
							</h2>
							<hr style="border: solid 2px #000;">
							<br>
						</div>
						<?php while ($row = mysqli_fetch_assoc($data_berita)) : ?>
							<?php
							$id_kategori = $row["id_kategori"];
							$data_kategori = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kategori_berita WHERE id='$id_kategori' "));
							?>
							<div class="col-12 col-md-6 mb-5 mb-md-5 wow fadeIn" data-wow-delay=".1s">
								<div class="image-container zoomIn-effect">
									<a href="index.php?p=artikel&view&id=<?= $row['id']; ?>">
										<img src="<?= (empty($row['foto_headline'])) ? 'img/bgnoimage.png' : 'img/headline_berita/' . $row['foto_headline']; ?>" style="width: 100%; height: 200px; object-fit: cover;">
									</a>
								</div>
								<div class="above-date py-2 py-lg-3 fables-fifth-text-color float-left w-100 d-md-none d-lg-block">
									<div class="float-left font-13">
										<span class="fables-iconcalender"></span> <?= strftime('%A, %e %b %Y | %H:%M WIB', strtotime($row['tanggal_publish'])); ?>
									</div>
									<div class="float-right font-13">
										<span class="fables-iconnews"></span> <?= $data_kategori["kategori"]; ?>
									</div>
								</div>
								<h2 class="font-weight-bold font-20 my-2 pl-1 pr-1 crop-text-3" style="height: 75px;">
									<a href="index.php?p=artikel&view&id=<?= $row['id']; ?>" class="fables-main-text-color fables-second-hover-color">
										<?= $row["judul"]; ?>
									</a>
								</h2>
								<div class="fables-forth-text-color font-14 crop-text-3" style="height: 75px;">
									<?= $row["isi"]; ?>
								</div>
								<a href="index.php?p=artikel&view&id=<?= $row['id']; ?>" class="btn fables-main-text-color fables-second-hover-color p-0 mt-2">
									<span class="underline">Baca selengkapnya ...</span>
									<span class="fables-iconarrow-light ml-2"></span>
								</a>
							</div>

						<?php endwhile; ?>
					</div>

					<h3 class=" font-22 font-weight-bold mt-5" style="color: #000;">
						Artikel Terkait
					</h3>
					<hr style="border: solid 2px #015456;">
					<div class="row">
						<?php while ($row = mysqli_fetch_assoc($berita_terkait)) : ?>
							<div class="col-lg-6 mb-3 image-container shine-effect">
								<a href="index.php?p=artikel&view&id=<?= $row['id']; ?>" class="tombol-berita-terkait">
									<div class="bg-white d-flex border rounded ">
										<img src="<?= (empty($row['foto_headline'])) ? 'img/bgnoimage.png' : 'img/headline_berita/' . $row['foto_headline']; ?>" style="width: 120px; height: 75px; object-fit: cover;">
										<div class="font-14 crop-text-3 p-2" style="height: 75px;">
											<?= $row["judul"]; ?>
										</div>
									</div>
								</a>
							</div>
						<?php endwhile; ?>
					</div>

				</div>

				<div class="col-lg-4 mt-5 mt-lg-0" style="margin-top: 0px;">
					<form action="index.phpindex.php?p=artikel" method="GET">
						<input type="hidden" name="p" value="berita">
						<div class="d-flex">
							<input type="text" name="search" id="search" class="form-control" placeholder="Cari berita ..." style="width: 80%; border: solid 2px #333;" required>
							<button type="submit" style="background: #015456; color: #fff; display: flex; cursor: pointer; border: none; border-top-right-radius: 5px; border-bottom-right-radius: 5px;"><i class="fa fa-search mt-1 mr-2"></i> Cari</button>
						</div>
					</form>

					<h3 class="font-22 font-weight-bold mt-4" style="color: #000;">
						Artikel
					</h3>
					<hr style="border: solid 2px #015456;">
					<div class="row" style="margin: 0px;">
						<?php while ($row = mysqli_fetch_assoc($kategori)) : ?>
							<a href="index.php?p=artikel&kategori&id=<?= $row['id']; ?>&kategori=<?= $row['kategori']; ?>" class="link-kategori border rounded d-flex mr-2 mb-2">
								<div class="font-14 crop-text-3 p-2">
									<?= $row["kategori"]; ?>
								</div>
							</a>
						<?php endwhile; ?>
					</div>

				</div>

			</div>
		</div>

	<?php elseif (isset($_GET["kategori"])) : ?>

		<?php
		$id_kategori = $_GET["id"];
		$data_kategori_select = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kategori_berita WHERE id='$id_kategori' "));

		$tag = "#" . $_GET["tag"];
		$data_berita = mysqli_query($conn, "SELECT * FROM berita WHERE id_kategori='$id_kategori' AND status='1' ORDER BY id DESC");
		$jumlah_data_berita = count(query("SELECT * FROM berita WHERE id_kategori='$id_kategori' AND status='1' ORDER BY id DESC"));
		$berita_terkait = mysqli_query($conn, "SELECT * FROM berita WHERE status='1' ORDER BY id DESC LIMIT 8");
		$kategori = mysqli_query($conn, "SELECT * FROM (SELECT * FROM kategori_berita WHERE id != '$id_kategori' ORDER BY RAND() LIMIT 50) t1 ORDER BY kategori ASC");
		?>

		<div class="container mt-0 mt-lg-4">
			<div class="row">
				<div class="col-lg-8 mb-5">
					<div class="row">
						<div class="col-12 wow fadeInLeft">
							<h2 class="font-25 font-weight-bold" style="color: #000;">
								Artikel - <span style="color: #015456;">Kategori : <?= $data_kategori_select["kategori"]; ?></span>
							</h2>
							<hr style="border: solid 2px #000;">
							<br>
						</div>
						<?php if ($jumlah_data_berita < 1) : ?>
							<div class="col-12 wow fadeIn mb-5" data-wow-delay=".1s">
								<div class="card">
									<div class="card-body pt-5 pb-5" style="border: 2px solid #015456;">
										<p class="text-center">
											Maaf, artikel dengan kategori <span class="font-weight-bold font-italic"><?= $data_kategori_select["kategori"]; ?></span> tidak ditemukan !
										</p>
									</div>
								</div>
							</div>
						<?php endif; ?>

						<?php while ($row = mysqli_fetch_assoc($data_berita)) : ?>
							<?php
							$id_kategori = $row["id_kategori"];
							$data_kategori = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kategori_berita WHERE id='$id_kategori' "));
							?>
							<div class="col-12 col-md-6 mb-5 mb-md-5 wow fadeIn" data-wow-delay=".1s">
								<div class="image-container zoomIn-effect">
									<a href="index.php?p=artikel&view&id=<?= $row['id']; ?>">
										<img src="<?= (empty($row['foto_headline'])) ? 'img/bgnoimage.png' : 'img/headline_berita/' . $row['foto_headline']; ?>" style="width: 100%; height: 200px; object-fit: cover;">
									</a>
								</div>
								<div class="above-date py-2 py-lg-3 fables-fifth-text-color float-left w-100 d-md-none d-lg-block">
									<div class="float-left font-13">
										<span class="fables-iconcalender"></span> <?= strftime('%A, %e %b %Y | %H:%M WIB', strtotime($row['tanggal_publish'])); ?>
									</div>
									<div class="float-right font-13">
										<span class="fables-iconnews"></span> <?= $data_kategori["kategori"]; ?>
									</div>
								</div>
								<h2 class="font-weight-bold font-20 my-2 pl-1 pr-1 crop-text-3" style="height: 75px;">
									<a href="index.php?p=artikel&view&id=<?= $row['id']; ?>" class="fables-main-text-color fables-second-hover-color">
										<?= $row["judul"]; ?>
									</a>
								</h2>
								<div class="fables-forth-text-color font-14 crop-text-3" style="height: 75px;">
									<?= $row["isi"]; ?>
								</div>
								<a href="index.php?p=artikel&view&id=<?= $row['id']; ?>" class="btn fables-main-text-color fables-second-hover-color p-0 mt-2">
									<span class="underline">Baca selengkapnya ...</span>
									<span class="fables-iconarrow-light ml-2"></span>
								</a>
							</div>
						<?php endwhile; ?>
					</div>

					<h3 class=" font-22 font-weight-bold mt-5" style="color: #000;">
						Artikel Terkait
					</h3>
					<hr style="border: solid 2px #015456;">
					<div class="row">
						<?php while ($row = mysqli_fetch_assoc($berita_terkait)) : ?>
							<div class="col-lg-6 mb-3 image-container shine-effect">
								<a href="index.php?p=artikel&view&id=<?= $row['id']; ?>" class="tombol-berita-terkait">
									<div class="bg-white d-flex border rounded ">
										<img src="<?= (empty($row['foto_headline'])) ? 'img/bgnoimage.png' : 'img/headline_berita/' . $row['foto_headline']; ?>" style="width: 120px; height: 75px; object-fit: cover;">
										<div class="font-14 crop-text-3 p-2" style="height: 75px;">
											<?= $row["judul"]; ?>
										</div>
									</div>
								</a>
							</div>
						<?php endwhile; ?>
					</div>

				</div>

				<div class="col-lg-4 mt-5 mt-lg-0" style="margin-top: 0px;">
					<form action="index.phpindex.php?p=artikel" method="GET">
						<input type="hidden" name="p" value="berita">
						<div class="d-flex">
							<input type="text" name="search" id="search" class="form-control" placeholder="Cari berita ..." style="width: 80%; border: solid 2px #333;" required>
							<button type="submit" style="background: #015456; color: #fff; display: flex; cursor: pointer; border: none; border-top-right-radius: 5px; border-bottom-right-radius: 5px;"><i class="fa fa-search mt-1 mr-2"></i> Cari</button>
						</div>
					</form>

					<h3 class=" font-22 font-weight-bold mt-5" style="color: #000;">
						Kategori
					</h3>
					<hr style="border: solid 2px #015456;">
					<div class="row" style="margin: 0px;">
						<?php if ($id_kategori != "") : ?>
							<a href="index.php?p=artikel&kategori&id=<?= $id_kategori; ?>kategori=<?= $data_kategori_select['kategori']; ?>" class="link-kategori-active border rounded d-flex mr-2 mb-2">
								<div class="font-14 crop-text-3 p-2">
									<?= $data_kategori_select["kategori"]; ?>
								</div>
							</a>
						<?php endif; ?>
						<?php while ($row = mysqli_fetch_assoc($kategori)) : ?>
							<a href="index.php?p=artikel&kategori&id=<?= $row['id']; ?>&kategori=<?= $row['kategori']; ?>" class="link-kategori border rounded d-flex mr-2 mb-2">
								<div class="font-14 crop-text-3 p-2">
									<?= $row["kategori"]; ?>
								</div>
							</a>
						<?php endwhile; ?>
					</div>

				</div>

			</div>
		</div>

	<?php elseif (isset($_GET["search"])) : ?>
		<?php
		$search = $_GET["search"];

		$data_berita = mysqli_query($conn, "SELECT * FROM berita WHERE judul LIKE '%$search%' OR tag_berita LIKE '%$search%' AND status='1' ORDER BY id DESC");
		$jumlah_data_berita = count(query("SELECT * FROM berita WHERE judul LIKE '%$search%' OR tag_berita LIKE '%$search%' AND status='1' "));
		$berita_terkait = mysqli_query($conn, "SELECT * FROM berita WHERE status='1' ORDER BY id DESC LIMIT 8");
		$kategori = mysqli_query($conn, "SELECT * FROM (SELECT * FROM kategori_berita ORDER BY RAND() LIMIT 50) t1 ORDER BY kategori ASC");

		?>

		<div class="container mt-0 mt-lg-4">
			<div class="row">
				<div class="col-lg-8 mb-5">
					<div class="row">
						<div class="col-12 wow fadeInLeft">
							<h2 class="font-25 font-weight-bold" style="color: #000;">
								Artikel - <span style="color: #015456;">Keyword Pencarian : <?= $search; ?></span>
							</h2>
							<hr style="border: solid 2px #000;">
							<br>
						</div>
						<?php if ($jumlah_data_berita < 1) : ?>
							<div class="col-12 wow fadeIn mb-5" data-wow-delay=".1s">
								<div class="card">
									<div class="card-body pt-5 pb-5" style="border: 2px solid #015456;">
										<p class="text-center">
											Maaf, artikel dengan keyword <span class="font-weight-bold font-italic"><?= $search; ?></span> tidak ditemukan !
										</p>
									</div>
								</div>
							</div>
						<?php endif; ?>

						<?php while ($row = mysqli_fetch_assoc($data_berita)) : ?>
							<?php
							$id_kategori = $row["id_kategori"];
							$data_kategori = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kategori_berita WHERE id='$id_kategori' "));
							?>
							<div class="col-12 col-md-6 mb-5 mb-md-5 wow fadeIn" data-wow-delay=".1s">
								<div class="image-container zoomIn-effect">
									<a href="index.php?p=artikel&view&id=<?= $row['id']; ?>">
										<img src="<?= (empty($row['foto_headline'])) ? 'img/bgnoimage.png' : 'img/headline_berita/' . $row['foto_headline']; ?>" style="width: 100%; height: 200px; object-fit: cover;">
									</a>
								</div>
								<div class="above-date py-2 py-lg-3 fables-fifth-text-color float-left w-100 d-md-none d-lg-block">
									<div class="float-left font-13">
										<span class="fables-iconcalender"></span> <?= strftime('%A, %e %b %Y | %H:%M WIB', strtotime($row['tanggal_publish'])); ?>
									</div>
									<div class="float-right font-13">
										<span class="fables-iconnews"></span> <?= $data_kategori["kategori"]; ?>
									</div>
								</div>
								<h2 class="font-weight-bold font-20 my-2 pl-1 pr-1 crop-text-3" style="height: 75px;">
									<a href="index.php?p=artikel&view&id=<?= $row['id']; ?>" class="fables-main-text-color fables-second-hover-color">
										<?= $row["judul"]; ?>
									</a>
								</h2>
								<div class="fables-forth-text-color font-14 crop-text-3" style="height: 75px;">
									<?= $row["isi"]; ?>
								</div>
								<a href="index.php?p=artikel&view&id=<?= $row['id']; ?>" class="btn fables-main-text-color fables-second-hover-color p-0 mt-2">
									<span class="underline">Baca selengkapnya ...</span>
									<span class="fables-iconarrow-light ml-2"></span>
								</a>
							</div>
						<?php endwhile; ?>
					</div>

					<h3 class=" font-22 font-weight-bold mt-5" style="color: #000;">
						Artikel Terkait
					</h3>
					<hr style="border: solid 2px #015456;">
					<div class="row">
						<?php while ($row = mysqli_fetch_assoc($berita_terkait)) : ?>
							<div class="col-lg-6 mb-3 image-container shine-effect">
								<a href="index.php?p=artikel&view&id=<?= $row['id']; ?>" class="tombol-berita-terkait">
									<div class="bg-white d-flex border rounded ">
										<img src="<?= (empty($row['foto_headline'])) ? 'img/bgnoimage.png' : 'img/headline_berita/' . $row['foto_headline']; ?>" style="width: 120px; height: 75px; object-fit: cover;">
										<div class="font-14 crop-text-3 p-2" style="height: 75px;">
											<?= $row["judul"]; ?>
										</div>
									</div>
								</a>
							</div>
						<?php endwhile; ?>
					</div>

				</div>

				<div class="col-lg-4 mt-5 mt-lg-0" style="margin-top: 0px;">
					<form action="index.phpindex.php?p=artikel" method="GET">
						<input type="hidden" name="p" value="berita">
						<div class="d-flex">
							<input type="text" name="search" id="search" class="form-control" placeholder="Cari berita ..." style="width: 80%; border: solid 2px #333;" required>
							<button type="submit" style="background: #015456; color: #fff; display: flex; cursor: pointer; border: none; border-top-right-radius: 5px; border-bottom-right-radius: 5px;"><i class="fa fa-search mt-1 mr-2"></i> Cari</button>
						</div>
					</form>

					<h3 class=" font-22 font-weight-bold mt-5" style="color: #000;">
						Kategori
					</h3>
					<hr style="border: solid 2px #015456;">
					<div class="row" style="margin: 0px;">
						<?php while ($row = mysqli_fetch_assoc($kategori)) : ?>
							<a href="index.php?p=artikel&kategori&id=<?= $row['id']; ?>&kategori=<?= $row['kategori']; ?>" class="link-kategori border rounded d-flex mr-2 mb-2">
								<div class="font-14 crop-text-3 p-2">
									<?= $row["kategori"]; ?>
								</div>
							</a>
						<?php endwhile; ?>
					</div>

				</div>

			</div>
		</div>

	<?php else : ?>

		<?php
		$data_berita = mysqli_query($conn, "SELECT * FROM berita WHERE status='1' ORDER BY id DESC");
		?>

		<div class="container mt-4">
			<div class="row">
				<div class="col-12 col-md-7 wow fadeInLeft">
					<h2 class="font-25 font-weight-bold" style="color: #000;">
						Artikel
					</h2>
					<hr style="border: solid 2px #000;">
					<br>
				</div>
				<div class="col-12 col-md-5 mt-0 mt-lg-5 pb-5 pb-lg-0 wow fadeInLeft">
					<form action="index.phpindex.php?p=artikel" method="GET">
						<input type="hidden" name="p" value="berita">
						<div class="d-flex">
							<input type="text" name="search" id="search" class="form-control" placeholder="Cari berita ..." style="width: 80%; border: solid 2px #333;" required>
							<button type="submit" style="background: #015456; color: #fff; display: flex; cursor: pointer; border: none; border-top-right-radius: 5px; border-bottom-right-radius: 5px;"><i class="fa fa-search mt-1 mr-2"></i> Cari</button>
						</div>
					</form>
				</div>
			</div>

			<div class="row">
				<?php while ($row = mysqli_fetch_assoc($data_berita)) : ?>

					<div class="col-12 col-md-4 mb-5 mb-md-5 wow fadeIn" data-wow-delay=".1s">
						<div class="image-container zoomIn-effect">
							<a href="index.php?p=artikel&view&id=<?= $row['id']; ?>">
								<img src="<?= (empty($row['foto_headline'])) ? 'img/bgnoimage.png' : 'img/headline_berita/' . $row['foto_headline']; ?>" style="width: 100%; height: 200px; object-fit: cover;">
							</a>
						</div>
						<div class="above-date py-2 py-lg-3 fables-fifth-text-color float-left w-100 d-md-none d-lg-block">
							<div class="float-left font-13">
								<span class="fables-iconcalender"></span> <?= strftime('%A, %e %b %Y | %H:%M WIB', strtotime($row['tanggal_publish'])); ?>
							</div>
							<div class="float-right font-13">
								<span class="fables-iconnews"></span> Artikel
							</div>
						</div>
						<h2 class="font-weight-bold font-20 my-2 pl-1 pr-1 crop-text-3" style="height: 75px;">
							<a href="index.php?p=artikel&view&id=<?= $row['id']; ?>" class="fables-main-text-color fables-second-hover-color">
								<?= $row["judul"]; ?>
							</a>
						</h2>
						<div class="fables-forth-text-color font-14 crop-text-3" style="height: 75px;">
							<?= $row["isi"]; ?>
						</div>
						<a href="index.php?p=artikel&view&id=<?= $row['id']; ?>" class="btn fables-main-text-color fables-second-hover-color p-0 mt-2">
							<span class="underline">Baca selengkapnya ...</span>
							<span class="fables-iconarrow-light ml-2"></span>
						</a>
					</div>

				<?php endwhile; ?>

			</div>
		</div>

	<?php endif; ?>
</section>