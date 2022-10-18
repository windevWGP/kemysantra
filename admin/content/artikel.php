<?php

if (isset($_POST['ubah_username'])) {

  if (ubah_username($_POST) > 0) {

    $berhasil = true;

    echo ' <meta http-equiv="refresh" content="0; logout.php"> ';
  } else {

    $gagal = true;
  }
}



if (isset($_POST['ubah_password'])) {

  if (ubah_password($_POST) > 0) {

    $berhasil = true;

    echo ' <meta http-equiv="refresh" content="0; logout.php"> ';
  } else {

    $gagal = true;
  }
}



?>



<div class="page-breadcrumb">

  <div class="row">

    <div class="col-12 d-flex no-block align-items-center">

      <h4 class="page-title">Pengaturan Akun</h4>

      <div class="ml-auto text-right">

        <nav aria-label="breadcrumb">

          <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>

            <li class="breadcrumb-item active"><a href="index.php?p=pengaturan-akun">Pengaturan Akun</a></li>

          </ol>

        </nav>

      </div>

    </div>

  </div>

</div>



<!-- Container fluid  -->

<div class="container-fluid">

  <!-- Start Page Content -->

  <div class="row">

    <div class="col-lg-6">

      <div class="card h-100">

        <div class="card-body">

          <h5 class="card-title text-white p-3 bg-warning mb-3"><i class="fa fa-fw fa-edit"></i> Ubah Username</h5>

          <form action="" method="post" enctype="multipart/form-data">

            <div class="form-group mb-4">

              <input type="hidden" name="id" value="<?= $_SESSION['id_user']; ?>">

              <label for="username"><i class="mdi mdi-account-edit"></i> Username</label>

              <input type="text" name="username" id="username" class="form-control" value="<?= $_SESSION['username']; ?>">

            </div>

            <div class="form-group">

              <button type="submit" name="ubah_username" class="btn btn-success">

                <i class="fa fa-fw fa-save"></i> Simpan

              </button>

            </div>

          </form>



        </div>

      </div>

    </div>



    <div class="col-lg-6">

      <div class="card h-100">

        <div class="card-body">

          <h5 class="card-title bg-warning p-3 text-white mb-3"><i class="fa fa-fw fa-edit"></i> Ubah Password</h5>

          <form action="" method="post" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?= $_SESSION['id_user']; ?>">

            <div class="form-group">

              <label for="password_baru"><i class="mdi mdi-account-key"></i> Password Baru</label>

              <input type="password" name="password_baru" id="password_baru" class="form-control">

            </div>

            <div class="form-group mb-4">

              <label for="konfirmasi_password"><i class="mdi mdi-account-key"></i> Konfirmasi Password</label>

              <input type="password" name="konfirmasi_password" id="konfirmasi_password" class="form-control">

            </div>

            <div class="form-group">

              <button type="submit" name="ubah_password" class="btn btn-success">

                <i class="fa fa-fw fa-save"></i> Simpan

              </button>

            </div>

          </form>

        </div>

      </div>

    </div>

  </div>

</div>

<!-- End Container fluid  -->