<?php 

$data_album = mysqli_query($conn, "SELECT * FROM album_galeri ORDER BY id DESC");

if (isset($_POST['tambah_data_galeri'])) {
    $id_album = $_POST['id_album'];
    if (tambah_data_galeri($_POST) > 0) {
        $berhasil_tambah = true;
        echo ' <meta http-equiv="refresh" content="1; index.php?p=galeri&album&id='.$id_album.'"> ';
    } else {
        $gagal_tambah = true;
    }
}

if (isset($_POST['ubah_data_galeri'])) {
    $id_album = $_POST['id_album'];
    if (ubah_data_galeri($_POST) > 0) {
        $berhasil_ubah = true;
        echo ' <meta http-equiv="refresh" content="1; index.php?p=galeri&album&id='.$id_album.'"> ';
    } else {
        $gagal_ubah = true;
    }
}

if (isset($_GET['hapus_foto'])) {
    $id_album = $_GET['id_album'];
    if (hapus_data_galeri($_GET) > 0) {
        $berhasil_hapus = true;
        echo ' <meta http-equiv="refresh" content="1; index.php?p=galeri&album&id='.$id_album.'"> ';
    } else {
        $gagal_hapus = true;
    }
}

if (isset($_POST['tambah_album_foto'])) {
    if (tambah_album_foto($_POST) > 0) {
        $berhasil_tambah = true;
        echo ' <meta http-equiv="refresh" content="1; index.php?p=galeri"> ';
    } else {
        $gagal_tambah = true;
    }
}

if (isset($_POST['ubah_album_foto'])) {
    if (ubah_album_foto($_POST) > 0) {
        $berhasil_ubah = true;
        echo ' <meta http-equiv="refresh" content="1; index.php?p=galeri"> ';
    } else {
        $gagal_ubah = true;
    }
}

if (isset($_GET['hapus_album'])) {
    if (hapus_album_foto($_GET) > 0) {
        $berhasil_hapus = true;
        echo ' <meta http-equiv="refresh" content="0; index.php?p=galeri"> ';
    } else {
        $gagal_hapus = true;
    }
}

?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Galeri</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="index.php?p=galeri">Galeri</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
    
<?php if (isset($_GET['tambah_album'])): ?>
   <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Tambah Album Foto</h5>
                        <?php if (isset($berhasil_tambah)): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>Album berhasil disimpan !</strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <?php elseif(isset($gagal_tambah)): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>Album gagal disimpan, mohon periksa kembali data yang anda masukkan !</strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <?php endif; ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="nama">Nama Album</label>
                                <input type="text" name="nama" id="nama" required class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" name="tambah_album_foto" class="btn btn-success" style="width: 200px;">
                                    <i class="fa fa-fw fa-save"></i> Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php elseif (isset($_GET['ubah_album'])): ?>
    <?php 
        $id_album = $_GET['id'];
        $album = mysqli_query($conn, "SELECT * FROM album_galeri WHERE id='$id_album' ");
        if ($row = mysqli_fetch_assoc($album)) {
            $nama = $row['nama'];
        }
    ?>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Ubah Album Foto</h5>
                        <?php if (isset($berhasil_ubah)): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>Album berhasil diubah !</strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <?php elseif(isset($gagal_ubah)): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>Album gagal diubah, mohon periksa kembali data yang anda masukkan !</strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <?php endif; ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?= $id_album; ?>">
                                <label for="nama">Nama Album</label>
                                <input type="text" name="nama" id="nama" value="<?= $nama; ?>" required class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" name="ubah_album_foto" class="btn btn-success" style="width: 200px;">
                                    <i class="fa fa-fw fa-save"></i> Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php elseif (isset($_GET['tambah_foto'])): ?>
    <?php $id_album = $_GET['id']; ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Tambah Foto Galeri</h5>
                        <?php if (isset($berhasil_tambah)): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>Data berhasil disimpan !</strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <?php elseif(isset($gagal_tambah)): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>Data gagal disimpan, mohon periksa kembali data yang anda masukkan !</strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <?php endif; ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="id_album" value="<?= $id_album; ?>">
                                <label for="judul">Judul Foto</label>
                                <input type="text" name="judul" id="judul" required class="form-control">
                            </div>
                            <div class="form-group mb-5">
                                <label id="foto_galeri">Foto</label>
                                <div class="custom-file">
                                    <label class="custom-file-label" for="foto_galeri">Pilih File Foto ...</label>
                                    <input type="file" name="foto" class="custom-file-input" id="foto_galeri" accept="image/png, image/jpg, image/jpeg" required onchange="readURL(this);">
                                </div>
                                <img src="../img/noimage.jpg" id="foto" style="width: 100%; margin-top: 10px;">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="tambah_data_galeri" class="btn btn-success" style="width: 200px;">
                                    <i class="fa fa-fw fa-save"></i> Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php elseif (isset($_GET['ubah_foto'])): ?>
    <?php 
        $id_foto = $_GET['id'];
        $foto_galeri = mysqli_query($conn, "SELECT * FROM galeri WHERE id=$id_foto");
        if ($row = mysqli_fetch_assoc($foto_galeri)) {
            $id_album = $row['id_album'];     
            $judul = $row['judul'];     
            $foto = $row['foto'];     
        } 
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Ubah Foto Galeri</h5>
                        <?php if (isset($berhasil_ubah)): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>Data berhasil disimpan !</strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <?php elseif(isset($gagal_ubah)): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>Data gagal disimpan, mohon periksa kembali data yang anda masukkan !</strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <?php endif; ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?= $id_foto; ?>">
                                <input type="hidden" name="id_album" value="<?= $id_album; ?>">
                                <label for="judul">Judul Foto</label>
                                <input type="text" name="judul" id="judul" value="<?= $judul; ?>" required class="form-control">
                            </div>
                            <div class="form-group mb-5">
                                <input type="hidden" name="fotolama" value="<?= $foto; ?>">
                                <label id="foto_galeri">Foto</label>
                                <div class="custom-file">
                                    <label class="custom-file-label" for="foto_galeri">Pilih File Foto ...</label>
                                    <input type="file" name="foto" class="custom-file-input" id="foto_galeri" accept="image/png, image/jpg, image/jpeg" onchange="readURL(this);">
                                </div>
                                <img src="../img/galeri/<?= $foto; ?>" id="foto" style="width: 100%; margin-top: 10px;">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="ubah_data_galeri" class="btn btn-success" style="width: 200px;">
                                    <i class="fa fa-fw fa-save"></i> Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php elseif (isset($_GET['album'])): ?>
    <?php 
        $id_album = $_GET['id'];
        $data_galeri = mysqli_query($conn, "SELECT * FROM galeri WHERE id_album='$id_album' ORDER BY id DESC");
    ?>

    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row mb-3">
                    <div class="col-lg-12">
                        <a href="index.php?p=galeri&tambah_foto&id=<?= $id_album; ?>" class="btn btn-success mr-3">
                            + Tambah Foto Galeri 
                        </a>
                        <a href="index.php?p=galeri" class="btn btn-dark">
                            <i class="fa fa-fw fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
                <hr>
                <?php if (isset($berhasil_hapus)): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Data berhasil dihapus !</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php elseif(isset($gagal_hapus)): ?>
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
            <?php while ($row = mysqli_fetch_assoc($data_galeri)): ?>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="card" style="border-radius: 5px;">
                    <div class="el-card-item">
                        <div class="el-card-avatar el-overlay-1"> 
                            <img src="../img/galeri/<?= $row['foto']; ?>" style="width: 100%; height: 200px; object-fit: cover; object-position: top; border-top-left-radius: 5px; border-top-right-radius: 5px;"/>
                            <div class="el-overlay">
                                <ul class="list-style-none el-info">
                                    <li class="el-item">
                                        <a class="btn btn-success btn-outline image-popup-vertical-fit el-link" target="_blank" href="../img/galeri/<?= $row['foto']; ?>">
                                            <i class="mdi mdi-magnify-plus"></i>
                                        </a>
                                    </li>
                                    <li class="el-item">
                                        <a class="btn btn-warning btn-outline image-popup-vertical-fit el-link" href="index.php?p=galeri&ubah_foto&id_album=<?= $id_album; ?>&id=<?= $row['id']; ?>">
                                            <i class="fa fa-fw fa-edit"></i>
                                        </a>
                                    </li>
                                    <li class="el-item">
                                        <a class="btn btn-danger btn-outline el-link" href="index.php?p=galeri&hapus_foto&id_album=<?= $id_album; ?>&id=<?= $row['id']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus ?')">
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

<?php else: ?>

     <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <a href="index.php?p=galeri&tambah_album" class="btn btn-success mb-3">
                    + Tambah Album Foto
                </a>
                <hr>
                <?php if (isset($berhasil_hapus)): ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Album berhasil dihapus !</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php elseif(isset($gagal_hapus)): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Album gagal dihapus !</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="row el-element-overlay">
            <?php while ($row = mysqli_fetch_assoc($data_album)): ?>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="card" style="border-radius: 5px;">
                    <div class="el-card-item">
                        <div class="el-card-avatar el-overlay-1"> 
                            <img src="../img/icon-album.png" style="width: 100%; height: 200px; object-fit: contain; border-top-left-radius: 5px; border-top-right-radius: 5px;"/>
                            <div class="el-overlay">
                                <ul class="list-style-none el-info">
                                    <li class="el-item">
                                        <a class="btn btn-success btn-outline image-popup-vertical-fit el-link" href="index.php?p=galeri&album&id=<?= $row['id']; ?>">
                                            <i class="mdi mdi-eye"></i>
                                        </a>
                                    </li>
                                    <li class="el-item">
                                        <a class="btn btn-warning btn-outline image-popup-vertical-fit el-link" href="index.php?p=galeri&ubah_album&id=<?= $row['id']; ?>">
                                            <i class="fa fa-fw fa-edit"></i>
                                        </a>
                                    </li>
                                    <li class="el-item">
                                        <a class="btn btn-danger btn-outline el-link" href="index.php?p=galeri&hapus_album&id=<?= $row['id']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus ?')">
                                            <i class="mdi mdi-delete"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="el-card-content">
                            <h4 class="m-b-0"><?= $row['nama']; ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <?php endif ?>