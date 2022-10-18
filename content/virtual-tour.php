<?php 

	$id_produk = $_GET['idp'];
	$data_produk = mysqli_query($conn, "SELECT * FROM produk WHERE id='$id_produk' ");
	if ($row = mysqli_fetch_assoc($data_produk)) {
		$nama_produk = $row['nama_produk'];
		$tipe = $row['tipe'];
		$deskripsi = $row['deskripsi'];
		$foto = $row['foto'];
	}

	$id_foto_panorama = $_GET['id'];
	$foto_panorama = mysqli_query($conn, "SELECT * FROM virtual_produk WHERE id='$id_foto_panorama' ");
	if ($row = mysqli_fetch_assoc($foto_panorama)) {
		$judul = $row['judul'];
		$foto_panorama = $row['foto_panorama'];
	}
	$data_virtual = mysqli_query($conn, "SELECT * FROM virtual_produk WHERE id_produk='$id_produk' AND id NOT LIKE '$id_foto_panorama' ");

?>

<section id="virtual">
  <div class="container-fluid">
    <div class="row p-0">
        <div class="col-lg-12 p-0">
	        <div class="text-left">
	          <h5 class="font-weight-bold mb-0"><?= $nama_produk; ?></h5>
	          <h5 class="font-weight-bold mb-0"><?= $tipe; ?></h5>
	        </div>
	        <div class="text-right">
	          <h5 class="font-weight-bold mb-0"><?= $judul; ?></h5>
	        </div>
        	<a-scene style="width: 100%; height: 87vh; position: relative;" embedded>
	          <a-assets>
	            <img id="panorama" src="img/panorama/<?= $foto_panorama; ?>"/>
	          </a-assets>
	          <a-sky src="#panorama" rotation="0 0 0"></a-sky>
	        </a-scene>
        	<div class="row justify-content-center mt-4 mt-lg-0" id="row-thumbnail-virtual">
				<?php foreach ($data_virtual as $row): ?>
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 p-2 p-lg-1 mb-lg-2">
					<a href="index.php?p=virtual-tour&idp=<?= $id_produk; ?>&id=<?= $row['id']; ?>" class="link-panorama <?= ($row['id'] == $id_foto_panorama) ? 'panorama-active' : ''; ?>">
						<img class="panorama-thumbnail" src="img/panorama/<?= $row['foto_panorama']; ?>">
						<img src="img/icon-360.png" class="icon-thumbnail">
						<p class="judul-thumbnail"><?= $row['judul']; ?></p>
					</a>
				</div>
				<?php endforeach; ?>
		    </div>
		    <div class="row row-tombol-kembali-detail-produk">
		    	<div class="col-lg-12">
		    		<a href="index.php?p=detail-produk&id=<?= $id_produk; ?>" class="btn btn-outline-dark border-top-0 border-left-0 border-right-0 border-white font-weight-bold">
			    		<= Back
			    	</a>
		    	</div>
		    </div>
        </div>
    </div>
  </div>
</section>