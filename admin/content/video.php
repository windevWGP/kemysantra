<?php

if (isset($_POST["tambah"])) {
  if (tambah_video($_POST) > 0) {
    $berhasil = true;
    echo "<meta http-equiv='refresh' content='0; URL=index.php?p=video'>";
  } else {
    $gagal = true;
  }
}

if (isset($_GET["hapus"])) {
  if (hapus_video($_GET) > 0) {
    $berhasil = true;
    echo "<meta http-equiv='refresh' content='0; URL=index.php?p=video'>";
  } else {
    echo "<meta http-equiv='refresh' content='0; URL=index.php?p=video'>";
  }
}

?>

<?php if (isset($berhasil)) : ?>
  <div class="row">
    <div class="col-lg-12">
      <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Berhasil !</strong>
      </div>
    </div>
  </div>
<?php elseif (isset($gagal)) : ?>
  <div class="row">
    <div class="col-lg-12">
      <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Gagal !</strong>
      </div>
    </div>
  </div>
<?php endif; ?>

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-12 d-flex no-block align-items-center">
      <h4 class="page-title">Video</h4>
      <div class="ml-auto text-right">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="index.php?p=produk">Video</a></li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<?php if (isset($_GET["tambah"])) : ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card" style="min-height: 70vh;">
          <div class="card-header row justify-content-between">
            <h4 style="font-size: 16px;">
              Tambah Data Video
            </h4>
          </div>
          <div class="card-body">
            <form action="" method="POST">
              <div class="form-group">
                <label for="link_youtube">Link Youtube</label>
                <input type="text" name="link_youtube" id="link_youtube" class="form-control" placeholder="Masukkan Link Youtube ..." required>
              </div>

              <div class="form-group mt-5 mb-2 card-header p-0">
                <button type="submit" name="tambah" class="btn btn-sm btn-success mr-2">
                  <i class="fa fa-save"></i> SIMPAN
                </button>
                <button type="reset" class="btn btn-sm btn-danger mr-2">
                  <i class="fa fa-trash"></i> RESET
                </button>
                <a href="index.php?p=video" class="btn btn-sm btn-dark mr-2">
                  <i class="fa fa-arrow-left"></i> KEMBALI
                </a>
              </div>

            </form>
          </div>
        </div>
      </div>

    </div>
  </div>

<?php else : ?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card" style="min-height: 70vh;">
          <div class="card-header row justify-content-between">
            <h4 style="font-size: 16px;">
              Data Video
            </h4>
            <a href="index.php?p=video&tambah" class="btn btn-sm btn-success">
              <i class="fa fa-plus"></i> Tambah
            </a>
          </div>
          <div class="card-body">
            <table class="table table-hover table-sm table-responsive" id="zero_config" style="width: 100%;">
              <thead>
                <tr class="text-center">
                  <th>No.</th>
                  <th>Video</th>
                  <th>Judul</th>
                  <th>Aksi</th>
                </tr>
              </thead>

              <tbody>
                <?php $no = 1; ?>
                <?php $video = mysqli_query($conn, "SELECT * FROM video ORDER BY id DESC"); ?>
                <?php while ($row = mysqli_fetch_assoc($video)) : ?>
                  <?php
                  $id_video = $row["link_youtube"];
                  $title = get_youtube_title($id_video);
                  ?>
                  <tr>
                    <td class="text-center"><?= $no; ?></td>
                    <td>
                      <a href="https://www.youtube.com/watch?v=<?= $id_video; ?>" target="_blank">
                        <img src="https://img.youtube.com/vi/<?= $id_video; ?>/hqdefault.jpg" alt="" style="width: 180px; height: 140px;">
                      </a>
                    </td>
                    <td style="width: 80%; vertical-align: middle;"><?= $title; ?></td>
                    <td class="d-flex align-items-center" style="vertical-align: middle; margin: 50px 0;">
                      <a href="index.php?p=video&hapus&id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ? ')" title="Hapus">
                        <i class="fa fa-trash"></i> Hapus
                      </a>
                    </td>
                  </tr>
                  <?php $no++; ?>
                <?php endwhile; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>

<?php endif; ?>