<?php

$id_produk = $_GET['idp'];

$data_virtual = mysqli_query($conn, "SELECT * FROM virtual_produk WHERE id_produk='$id_produk' ORDER BY id DESC");



if (isset($_POST['tambah_data_virtual'])) {

    if (tambah_data_virtual($_POST) > 0) {

        $berhasil_tambah = true;

        echo ' <meta http-equiv="refresh" content="1; index.php?p=virtual&idp=' . $id_produk . '"> ';
    } else {

        $gagal_tambah = true;
    }
}



if (isset($_POST['ubah_data_virtual'])) {

    if (ubah_data_virtual($_POST) > 0) {

        $berhasil_ubah = true;

        echo ' <meta http-equiv="refresh" content="1; index.php?p=virtual&idp=' . $id_produk . '"> ';
    } else {

        $gagal_ubah = true;
    }
}



if (isset($_GET['hapus'])) {

    if (hapus_data_virtual($_GET) > 0) {

        $berhasil_hapus = true;

        echo ' <meta http-equiv="refresh" content="0; index.php?p=virtual&idp=' . $id_produk . '"> ';
    } else {

        $gagal_hapus = true;
    }
}



?>



<div class="page-breadcrumb">

    <div class="row">

        <div class="col-12 d-flex no-block align-items-center">

            <h4 class="page-title">Virtual Tour Produk</h4>

            <div class="ml-auto text-right">

                <nav aria-label="breadcrumb">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>

                        <li class="breadcrumb-item active"><a href="index.php?p=produk">Produk</a></li>

                        <li class="breadcrumb-item active">

                            <a href="index.php?p=virtual&idp=<?= $id_produk; ?>">Virtual Tour</a>

                        </li>

                    </ol>

                </nav>

            </div>

        </div>

    </div>

</div>



<?php if (isset($_GET['tambah'])) : ?>



    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-12">

                <div class="card">

                    <div class="card-body">

                        <h5>Tambah Foto Panorama</h5>

                        <?php if (isset($berhasil_tambah)) : ?>

                            <div class="alert alert-success alert-dismissible fade show" role="alert">

                                <strong>Data berhasil disimpan !</strong>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                                    <span aria-hidden="true">&times;</span>

                                </button>

                            </div>

                        <?php elseif (isset($gagal_tambah)) : ?>

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">

                                <strong>Data gagal disimpan, mohon periksa kembali data yang anda masukkan !</strong>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                                    <span aria-hidden="true">&times;</span>

                                </button>

                            </div>

                        <?php endif; ?>

                        <form action="" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="id_produk" value="<?= $id_produk; ?>">

                            <div class="form-group">

                                <label for="judul">Judul Foto</label>

                                <input type="text" name="judul" id="judul" required class="form-control">

                            </div>

                            <div class="form-group mb-5">

                                <label id="foto_panorama">Foto Panorama</label>

                                <div class="custom-file">

                                    <label class="custom-file-label" for="foto_panorama">Pilih File Foto ...</label>

                                    <input type="file" name="foto" class="custom-file-input" id="foto_panorama" accept="image/png, image/jpg, image/jpeg" required onchange="readURL(this);">

                                </div>

                                <img src="../img/noimage.jpg" id="foto" style="width: 100%; margin-top: 10px;">

                            </div>

                            <div class="form-group">

                                <button type="submit" name="tambah_data_virtual" class="btn btn-success" style="width: 200px;">

                                    <i class="fa fa-fw fa-save"></i> Simpan

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>



<?php elseif (isset($_GET['ubah'])) : ?>

    <?php

    $id_foto = $_GET['id'];

    $virtual = mysqli_query($conn, "SELECT * FROM virtual_produk WHERE id=$id_foto");

    if ($row = mysqli_fetch_assoc($virtual)) {

        $judul = $row['judul'];

        $foto = $row['foto_panorama'];
    }

    ?>



    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-12">

                <div class="card">

                    <div class="card-body">

                        <h5>Ubah Foto Panorama</h5>

                        <?php if (isset($berhasil_ubah)) : ?>

                            <div class="alert alert-success alert-dismissible fade show" role="alert">

                                <strong>Data berhasil disimpan !</strong>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                                    <span aria-hidden="true">&times;</span>

                                </button>

                            </div>

                        <?php elseif (isset($gagal_ubah)) : ?>

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">

                                <strong>Data gagal disimpan, mohon periksa kembali data yang anda masukkan !</strong>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                                    <span aria-hidden="true">&times;</span>

                                </button>

                            </div>

                        <?php endif; ?>

                        <form action="" method="post" enctype="multipart/form-data">

                            <div class="form-group">

                                <input type="hidden" name="id_produk" value="<?= $id_produk; ?>">

                                <input type="hidden" name="id" value="<?= $id_foto; ?>">

                                <label for="judul">Judul Foto</label>

                                <input type="text" name="judul" id="judul" value="<?= $judul; ?>" required class="form-control">

                            </div>

                            <div class="form-group mb-5">

                                <input type="hidden" name="fotolama" value="<?= $foto; ?>">

                                <label id="foto_panorama">Foto</label>

                                <div class="custom-file">

                                    <label class="custom-file-label" for="foto_panorama">Pilih File Foto ...</label>

                                    <input type="file" name="foto" class="custom-file-input" id="foto_panorama" accept="image/png, image/jpg, image/jpeg" onchange="readURL(this);">

                                </div>

                                <img src="../img/panorama/<?= $foto; ?>" id="foto" style="width: 100%; margin-top: 10px;">

                            </div>

                            <div class="form-group">

                                <button type="submit" name="ubah_data_virtual" class="btn btn-success" style="width: 200px;">

                                    <i class="fa fa-fw fa-save"></i> Simpan

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>



<?php else : ?>



    <!-- Container fluid  -->

    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-12">

                <div class="row mb-3">

                    <a href="index.php?p=virtual&tambah&idp=<?= $id_produk; ?>" class="btn btn-success mr-3">

                        + Tambah Foto Panorama

                    </a>

                    <a href="index.php?p=produk" class="btn btn-dark">

                        <i class="mdi mdi-keyboard-backspace"></i> Kembali

                    </a>

                </div>

                <hr>

                <?php if (isset($berhasil_hapus)) : ?>

                    <div class="alert alert-success alert-dismissible fade show" role="alert">

                        <strong>Data berhasil dihapus !</strong>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                            <span aria-hidden="true">&times;</span>

                        </button>

                    </div>

                <?php elseif (isset($gagal_hapus)) : ?>

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">

                        <strong>Data gagal dihapus !</strong>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                            <span aria-hidden="true">&times;</span>

                        </button>

                    </div>

                <?php endif; ?>

            </div>

        </div>

        <div class="row el-element-overlay">

            <?php while ($row = mysqli_fetch_assoc($data_virtual)) : ?>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

                    <div class="card" style="border-radius: 5px;">

                        <div class="el-card-item">

                            <div class="el-card-avatar el-overlay-1">

                                <img src="../img/panorama/<?= $row['foto_panorama']; ?>" style="width: 100%; height: 200px; object-fit: cover; object-position: top; border-top-left-radius: 5px; border-top-right-radius: 5px;" />

                                <div class="el-overlay">

                                    <ul class="list-style-none el-info">

                                        <li class="el-item">

                                            <a class="btn btn-success btn-outline image-popup-vertical-fit el-link" href="index.php?p=panorama&idp=<?= $id_produk; ?>&id=<?= $row['id']; ?>">

                                                <i class="mdi mdi-eye-outline"></i>

                                            </a>

                                        </li>

                                        <li class="el-item">

                                            <a class="btn btn-warning btn-outline image-popup-vertical-fit el-link" href="index.php?p=virtual&idp=<?= $id_produk; ?>&ubah&id=<?= $row['id']; ?>">

                                                <i class="fa fa-fw fa-edit"></i>

                                            </a>

                                        </li>

                                        <li class="el-item">

                                            <a class="btn btn-danger btn-outline el-link" href="index.php?p=virtual&idp=<?= $id_produk; ?>&hapus&id=<?= $row['id']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus ?')">

                                                <i class="mdi mdi-delete"></i>

                                            </a>

                                        </li>

                                    </ul>

                                </div>

                            </div>

                            <div class="el-card-content">

                                <h4 class="m-b-0"><?= $row['judul']; ?></h4>

                            </div>

                        </div>

                    </div>

                </div>

            <?php endwhile; ?>

        </div>

    </div>

    <!-- End Container fluid  -->

<?php endif ?>