<?php 

if (isset($_POST['tambah_data_produk'])) {
    if (tambah_data_produk($_POST) > 0) {
        $berhasil_tambah = true;
        echo ' <meta http-equiv="refresh" content="1; index.php?p=produk"> ';
    } else {
        $gagal_tambah = true;
    }
}

if (isset($_POST['ubah_data_produk'])) {
    if (ubah_data_produk($_POST) > 0) {
        $berhasil_tambah = true;
        echo ' <meta http-equiv="refresh" content="1; index.php?p=produk"> ';
    } else {
        $gagal_tambah = true;
    }
}

if (isset($_GET['hapus'])) {
    if (hapus_data_produk($_GET) > 0) {
        $berhasil_hapus = true;
    } else {
        $gagal_hapus = true;
    }
}

?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Produk</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="index.php?p=produk">Produk</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row el-element-overlay">
     <div class="col-lg-12">
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
        <?php elseif (isset($berhasil_hapus)): ?>
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

        <div class="card">
            <div class="card-body">
                <?php if (isset($_GET['tambah'])) : ?>
                    <?php $tipe_rumah = mysqli_query($conn, "SELECT * FROM tipe_rumah ORDER BY id ASC");  ?>
                    <h5 class="card-title mb-3">Tambah Data Produk</h5>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama_produk">Nama Produk</label>
                            <input type="text" name="nama_produk" id="nama_produk" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tipe">Tipe Rumah</label>
                            <select name="tipe" id="tipe" class="form-control">
                                <option value="">--- Pilih Tipe Rumah ---</option>
                                <?php while ($row = mysqli_fetch_assoc($tipe_rumah)): ?>
                                    <option value="<?= $row['tipe']; ?>"><?= $row['tipe']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="form-group mt-4">
                            <label for="editor">Deskripsi</label> <br>
                            <textarea name="deskripsi" id="editor" rows="6" class="form-control" required></textarea>
                            <script>
                                CKEDITOR.replace( 'editor', {
                                  height: '400px',
                                  enterMode: CKEDITOR.ENTER_BR, 
                                  toolbar:    
                                  [   { name: 'document', groups: [ 'document', 'doctools' ], items: [ 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
                                  { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
                                  { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },        '/',
                                  { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
                                  { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] }, { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
                                  { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar', 'PageBreak', 'Iframe', 'Syntaxhighlight' ] }, '/',
                                  { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
                                  { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                                  { name: 'others', groups: [ 'mode' ], items: [ 'Source', 'searchCode', 'autoFormat', 'CommentSelectedRange', 'UncommentSelectedRange', 'AutoComplete', '-', 'ShowBlocks' ] },
                                  { name: 'tools', items: [ 'Maximize' ] },
                                  ]});    
                              </script>
                          </div>
                          <div class="form-group mb-5">
                            <label id="foto_produk">Foto</label>
                            <div class="custom-file">
                                <label class="custom-file-label" for="foto_produk">Pilih File Foto ...</label>
                                <input type="file" name="foto" class="custom-file-input" id="foto_produk" accept="image/png, image/jpg, image/jpeg" required onchange="readURL(this);">
                            </div>
                            <img src="../img/noimage.jpg" id="foto" style="width: 100%; margin-top: 10px;">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="tambah_data_produk" class="btn btn-success" style="width: 200px;">
                                <i class="fa fa-fw fa-save"></i> Simpan
                            </button>
                        </div>
                    </form>

                    <?php elseif (isset($_GET['ubah'])) : ?>

                        <?php 
                            $id_produk = $_GET['id'];
                            $produk = mysqli_query($conn, "SELECT * FROM produk WHERE id=$id_produk"); 
                            if ($row = mysqli_fetch_assoc($produk)) {
                                $nama_produk = $row['nama_produk'];
                                $tipe = $row['tipe'];
                                $deskripsi = $row['deskripsi'];
                                $foto = $row['foto'];
                            }

                            $tipe_rumah1 = mysqli_query($conn, "SELECT * FROM tipe_rumah ORDER BY id ASC");
                        ?>

                        <h5 class="card-title mb-3">Ubah Data Produk</h5>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?= $id_produk; ?>">
                                <label for="nama_produk">Nama Produk</label>
                                <input type="text" name="nama_produk" id="nama_produk" value="<?= $nama_produk; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="tipe">Tipe Rumah</label>
                                <select name="tipe" id="tipe" class="form-control">
                                    <option value="">--- Pilih Tipe Rumah ---</option>
                                    <?php while ($row = mysqli_fetch_assoc($tipe_rumah1)): ?>
                                        <option value="<?= $row['tipe']; ?>" <?= ($tipe == $row['tipe']) ? 'selected' : ''; ?>>
                                            <?= $row['tipe']; ?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>

                            <div class="form-group mt-4">
                                <label for="editor">Deskripsi</label> <br>
                                <textarea name="deskripsi" id="editor" rows="6" class="form-control" required><?= $deskripsi; ?></textarea>
                                <script>
                                    CKEDITOR.replace( 'editor', {
                                      height: '400px',
                                      enterMode: CKEDITOR.ENTER_BR, 
                                      toolbar:    
                                      [   { name: 'document', groups: [ 'document', 'doctools' ], items: [ 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
                                      { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
                                      { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },        '/',
                                      { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
                                      { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] }, { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
                                      { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar', 'PageBreak', 'Iframe', 'Syntaxhighlight' ] }, '/',
                                      { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
                                      { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                                      { name: 'others', groups: [ 'mode' ], items: [ 'Source', 'searchCode', 'autoFormat', 'CommentSelectedRange', 'UncommentSelectedRange', 'AutoComplete', '-', 'ShowBlocks' ] },
                                      { name: 'tools', items: [ 'Maximize' ] },
                                      ]});    
                                  </script>
                              </div>
                              <div class="form-group mb-5">
                                <input type="hidden" name="fotolama" value="<?= $foto; ?>">
                                <label id="foto_produk">Foto</label>
                                <div class="custom-file">
                                    <label class="custom-file-label" for="foto_produk">Pilih File Foto ...</label>
                                    <input type="file" name="foto" class="custom-file-input" id="foto_produk" accept="image/png, image/jpg, image/jpeg" onchange="readURL(this);">
                                </div>
                                <img src="../img/foto_produk/<?= $foto; ?>" id="foto" style="width: 100%; margin-top: 10px;">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="ubah_data_produk" class="btn btn-success" style="width: 200px;">
                                    <i class="fa fa-fw fa-save"></i> Simpan
                                </button>
                            </div>
                        </form>

                        <?php else : ?>

                            <h5 class="card-title">Data Produk</h5>
                            <a href="index.php?p=produk&tambah" class="btn btn-success mb-3 mt-3">
                                + Tambah Produk
                            </a>
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Nama Produk</th>
                                            <th>Tipe</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                        <?php $data_produk = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC"); ?>
                                        <?php while ($row = mysqli_fetch_assoc($data_produk)) : ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td>
                                                    <img src="../img/foto_produk/<?= $row['foto']; ?>" style="width: 200px;">
                                                </td>
                                                <td><?= $row['nama_produk']; ?></td>
                                                <td><?= $row['tipe']; ?></td>
                                                <td>
                                                    <ul class="list-unstyled d-flex">
                                                        <li class="mr-2">
                                                            <a href="index.php?p=virtual&idp=<?= $row['id']; ?>" class="btn btn-secondary" data-toggle="tooltip" data-placement="bottom" title="Kelola Virtual Tour">
                                                                <i class="mdi mdi-panorama-horizontal"></i>
                                                            </a>
                                                        </li>
                                                        <li class="mr-2">
                                                            <a href="index.php?p=produk&ubah&id=<?= $row['id']; ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ubah">
                                                                <i class="fa fa-fw fa-edit"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="index.php?p=produk&hapus&id=<?= $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus ?')" data-toggle="tooltip" data-placement="bottom" title="Hapus">
                                                                <i class="fa fa-fw fa-trash"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <?php $no++; ?>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Container fluid  -->

