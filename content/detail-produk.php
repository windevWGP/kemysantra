<?php 

$id_produk = $_GET['id'];
$data_produk = mysqli_query($conn, "SELECT * FROM produk WHERE id='$id_produk' ");
if ($row = mysqli_fetch_assoc($data_produk)) {
	$nama_produk = $row['nama_produk'];
	$tipe = $row['tipe'];
	$deskripsi = $row['deskripsi'];
	$foto = $row['foto'];
}

$data_virtual = mysqli_query($conn, "SELECT * FROM virtual_produk WHERE id_produk='$id_produk' ");

?>

<section id="portfolio">
	<div class="container wow fadeInUp">
		<div class="row">
			<div class="col-lg-12">
				<div class="text-left">
					<h5 class="fables-main-text-color font-25">Detail Produk</h5>
					<hr>
				</div>
			</div>
		</div>

		<div class="row" id="portfolio-wrapper">
			<div class="col-lg-6 col-sm-6 col-xs-12">
				<h5 class="text-capitalize mb-0 font-weight-bold"><?= $nama_produk; ?></h5>
				<p class="font-italic"><?= $tipe; ?></p>
				<p class="text-justify">
					<?= $deskripsi; ?>
				</p>

				

				<hr>

				<h5 class="mb-0 font-weight-bold">Virtual Tour</h5>
				<p class="text-muted" style="font-size: 14px;">
					Gunakan Virtual Tour untuk mendapatkan penglihatan yang lebih luas tentang produk ini !
				</p>
				<div class="row pl-2 mb-5">
					<?php foreach ($data_virtual as $row): ?>
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 p-2">
							<a href="index.php?p=virtual-tour&idp=<?= $id_produk; ?>&id=<?= $row['id']; ?>" class="link-panorama">
								<img class="panorama-thumbnail" src="img/panorama/<?= $row['foto_panorama']; ?>">
								<img src="img/icon-360.png" class="icon-thumbnail">
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-xs-12">
				<div class="row">
					<div class="col-lg-12">
						<img src="thumbnail.php?width=400&height=350&src=img/foto_produk/<?= $foto; ?>" style="width: 100%; border-radius: 5px;">
					</div>
					<hr>
					<div class="col-lg-12 mt-4 mb-5">
						<p class="mb-2 font-weight-bold">Peta Lokasi Perumahan</p>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1000.007856118486!2d109.25281680836521!3d-0.06485251423350177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMMKwMDMnNTMuNSJTIDEwOcKwMTUnMTIuMyJF!5e1!3m2!1sen!2sid!4v1558970190275!5m2!1sen!2sid" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>

	</div>

</section>