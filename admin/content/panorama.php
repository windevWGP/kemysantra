<?php 

$id_foto_panorama = $_GET['id'];
$id_produk = $_GET['idp'];
$data_virtual = mysqli_query($conn, "SELECT * FROM virtual_produk WHERE id='$id_foto_panorama' ");
if ($row = mysqli_fetch_assoc($data_virtual)) {
    $judul = $row['judul'];
    $foto_panorama = $row['foto_panorama'];
}

?>

<div class="page-breadcrumb">
	<div class="row">
		<div class="col-12 d-flex no-block align-items-center">
			<h4 class="page-title">Panorama</h4>
			<div class="ml-auto text-right">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="index.php?p=produk">Produk</a></li>
						<li class="breadcrumb-item">
							<a href="index.php?p=virtual&idp=<?= $id_produk; ?>">Virtual Tour</a>
						</li>
                        <li class="breadcrumb-item active">Panorama</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
    <div class="row el-element-overlay">
        <div class="col-lg-12" style="height: 78px;">
            <a-scene style="width: 100%; height: 70vh;" embedded>
              <a-assets>
                <img id="panorama" src="../img/panorama/<?= $foto_panorama; ?>" crossorigin/>
              </a-assets>
              <a-sky src="#panorama" rotation="0 10 0"></a-sky>
            </a-scene>
        </div>
        <div class="col-lg-12" style="margin-top: 62vh; position: relative;">
            <a href="index.php?p=virtual&idp=<?= $id_produk; ?>" class="btn btn-dark">
                <i class="mdi mdi-keyboard-backspace"></i> Kembali
            </a>
        </div>
    </div>
</div>

