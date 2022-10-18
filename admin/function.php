<?php
include '../database.php';

function query($query)
{

  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function get_youtube_title($ref)
{
  $json = file_get_contents('http://www.youtube.com/oembed?url=http://www.youtube.com/watch?v=' . $ref . '&format=json'); //get JSON video details
  $details = json_decode($json, true); //parse the JSON into an array
  return $details['title']; //return the video title
}

function compressImage($source, $destination, $quality)
{
  $info = getimagesize($source);
  if ($info['mime'] == 'image/jpeg')
    $image = imagecreatefromjpeg($source);
  elseif ($info['mime'] == 'image/gif')
    $image = imagecreatefromgif($source);
  elseif ($info['mime'] == 'image/png')
    $image = imagecreatefrompng($source);

  imagejpeg($image, $destination, $quality);
}

// Produk
function upload_foto_produk()
{
  $namafile = $_FILES['foto']['name'];
  $tmpname = $_FILES['foto']['tmp_name'];

  $ekstensifotovalid = ['jpg', 'jpeg', 'png'];
  $ekstensifoto = explode('.', $namafile);
  $ekstensifoto = strtolower(end($ekstensifoto));
  if (!in_array($ekstensifoto, $ekstensifotovalid)) {
    return false;
  }

  $namafilebaru = uniqid();
  $namafilebaru .= '.';
  $namafilebaru .= $ekstensifoto;
  move_uploaded_file($tmpname, '../img/foto_produk/' . $namafilebaru);
  return $namafilebaru;
}

function tambah_data_produk()
{
  global $conn;
  $nama_produk = htmlspecialchars($_POST['nama_produk']);
  $tipe = htmlspecialchars($_POST['tipe']);
  $deskripsi = $_POST['deskripsi'];
  $foto = upload_foto_produk();
  mysqli_query($conn, "INSERT INTO produk VALUES ('', '$nama_produk', '$tipe', '$deskripsi', '$foto')");
  return mysqli_affected_rows($conn);
}

function ubah_data_produk()
{
  global $conn;
  $id = $_POST['id'];
  $nama_produk = htmlspecialchars($_POST['nama_produk']);
  $tipe = htmlspecialchars($_POST['tipe']);
  $deskripsi = $_POST['deskripsi'];
  $fotolama = $_POST['fotolama'];
  if ($_FILES['foto']['error'] === 4) {
    $foto = $fotolama;
  } else {
    $foto = upload_foto_produk();
    // Hapus foto lama
    $carifoto = mysqli_query($conn, "SELECT * FROM produk WHERE id='$id' ");
    if ($hasilfoto = mysqli_fetch_assoc($carifoto)) {
      $hapusfoto = $hasilfoto["foto"];
    }
    unlink("../img/foto_produk/" . $hapusfoto);
  }
  mysqli_query($conn, "UPDATE produk SET nama_produk='$nama_produk', tipe='$tipe', deskripsi='$deskripsi', foto='$foto' WHERE id=$id ");
  return mysqli_affected_rows($conn);
}

function hapus_data_produk()
{
  global $conn;
  $id = $_GET['id'];
  // Hapus foto lama
  $carifoto = mysqli_query($conn, "SELECT * FROM produk WHERE id='$id' ");
  if ($hasilfoto = mysqli_fetch_assoc($carifoto)) {
    $hapusfoto = $hasilfoto["foto"];
  }
  unlink("../img/foto_produk/" . $hapusfoto);
  mysqli_query($conn, "DELETE FROM produk WHERE id='$id' ");
  return mysqli_affected_rows($conn);
}
// Akhir Produk


// Virtual Tour
function upload_foto_panorama()
{
  $namafile = $_FILES['foto']['name'];
  $ukuranfile = $_FILES['foto']['size'];
  $error = $_FILES['foto']['error'];
  $tmpname = $_FILES['foto']['tmp_name'];
  // cek apakah yang akan diupload adalah gambar
  $ekstensifotovalid = ['jpg', 'jpeg', 'png'];
  $ekstensifoto = explode('.', $namafile);
  $ekstensifoto = strtolower(end($ekstensifoto));
  if (!in_array($ekstensifoto, $ekstensifotovalid)) {
    return false;
  }
  // generate nama file agar unik
  $namafilebaru = uniqid();
  $namafilebaru .= '.';
  $namafilebaru .= $ekstensifoto;
  move_uploaded_file($tmpname, '../img/panorama/' . $namafilebaru);
  return $namafilebaru;
}

function tambah_data_virtual()
{
  global $conn;
  $id_produk = $_POST['id_produk'];
  $judul = htmlspecialchars($_POST['judul']);
  $foto_panorama = upload_foto_panorama();
  mysqli_query($conn, "INSERT INTO virtual_produk VALUES ('', '$id_produk', '$judul', '$foto_panorama')");
  return mysqli_affected_rows($conn);
}

function ubah_data_virtual()
{
  global $conn;
  $id = $_POST['id'];
  $judul = htmlspecialchars($_POST['judul']);
  $fotolama = $_POST['fotolama'];
  if ($_FILES['foto']['error'] === 4) {
    $foto_panorama = $fotolama;
  } else {
    $foto_panorama = upload_foto_panorama();
    // Hapus foto lama
    $carifoto = mysqli_query($conn, "SELECT * FROM virtual_produk WHERE id='$id' ");
    if ($hasilfoto = mysqli_fetch_assoc($carifoto)) {
      $hapusfoto = $hasilfoto["foto_panorama"];
    }
    unlink("../img/panorama/" . $hapusfoto);
  }
  mysqli_query($conn, "UPDATE virtual_produk SET judul='$judul', foto_panorama='$foto_panorama' WHERE id=$id ");
  return mysqli_affected_rows($conn);
}

function hapus_data_virtual()
{
  global $conn;
  $id = $_GET['id'];
  // Hapus foto lama
  $carifoto = mysqli_query($conn, "SELECT * FROM virtual_produk WHERE id='$id' ");
  if ($hasilfoto = mysqli_fetch_assoc($carifoto)) {
    $hapusfoto = $hasilfoto["foto_panorama"];
  }
  unlink("../img/panorama/" . $hapusfoto);
  mysqli_query($conn, "DELETE FROM virtual_produk WHERE id='$id' ");
  return mysqli_affected_rows($conn);
}
// Virtual Tour


// Galeri
function upload_foto_galeri()
{
  $namafile = $_FILES['foto']['name'];
  $tmpname = $_FILES['foto']['tmp_name'];

  $ekstensifotovalid = ['jpg', 'jpeg', 'png'];
  $ekstensifoto = explode('.', $namafile);
  $ekstensifoto = strtolower(end($ekstensifoto));
  if (!in_array($ekstensifoto, $ekstensifotovalid)) {
    return false;
  }

  $namafilebaru = uniqid();
  $namafilebaru .= '.';
  $namafilebaru .= $ekstensifoto;
  move_uploaded_file($tmpname, '../img/galeri/' . $namafilebaru);
  return $namafilebaru;
}

function tambah_album_foto()
{
  global $conn;
  $nama = htmlspecialchars($_POST['nama']);
  mysqli_query($conn, "INSERT INTO album_galeri VALUES ('', '$nama')");
  return mysqli_affected_rows($conn);
}

function ubah_album_foto()
{
  global $conn;
  $id = $_POST['id'];
  $nama = htmlspecialchars($_POST['nama']);
  mysqli_query($conn, "UPDATE album_galeri SET nama='$nama' WHERE id=$id ");
  return mysqli_affected_rows($conn);
}

function hapus_album_foto()
{
  global $conn;
  $id = $_GET['id'];
  // Hapus foto lama
  $carifoto = mysqli_query($conn, "SELECT * FROM galeri WHERE id_album='$id' ");
  while ($row = mysqli_fetch_assoc($carifoto)) {
    $foto = $row["foto"];
    unlink("../img/galeri/" . $foto);
    mysqli_query($conn, "DELETE FROM galeri WHERE id_album='$id' ");
  }
  mysqli_query($conn, "DELETE FROM album_galeri WHERE id='$id' ");
  return mysqli_affected_rows($conn);
}

function tambah_data_galeri()
{
  global $conn;
  $id_album = $_POST['id_album'];
  $judul = htmlspecialchars($_POST['judul']);
  $foto = upload_foto_galeri();
  mysqli_query($conn, "INSERT INTO galeri VALUES ('', '$id_album', '$judul', '$foto')");
  return mysqli_affected_rows($conn);
}

function ubah_data_galeri()
{
  global $conn;

  $id = $_POST['id'];
  $id_album = $_POST['id_album'];
  $judul = htmlspecialchars($_POST['judul']);
  $fotolama = $_POST['fotolama'];
  if ($_FILES['foto']['error'] === 4) {
    $foto = $fotolama;
  } else {
    $foto = upload_foto_galeri();

    $carifoto = mysqli_query($conn, "SELECT * FROM galeri WHERE id='$id' ");
    if ($hasilfoto = mysqli_fetch_assoc($carifoto)) {
      $hapusfoto = $hasilfoto["foto"];
    }
    unlink("../img/galeri/" . $hapusfoto);
  }
  mysqli_query($conn, "UPDATE galeri SET judul='$judul', foto='$foto' WHERE id=$id ");
  return mysqli_affected_rows($conn);
}

function hapus_data_galeri()
{
  global $conn;
  $id = $_GET['id'];
  // Hapus foto lama
  $carifoto = mysqli_query($conn, "SELECT * FROM galeri WHERE id='$id' ");
  if ($hasilfoto = mysqli_fetch_assoc($carifoto)) {
    $hapusfoto = $hasilfoto["foto"];
  }
  unlink("../img/galeri/" . $hapusfoto);
  mysqli_query($conn, "DELETE FROM galeri WHERE id='$id' ");
  return mysqli_affected_rows($conn);
}
// Akhir Galeri



// Video
function tambah_video()
{
  global $conn;

  $url = $_POST["link_youtube"];
  parse_str(parse_url($url, PHP_URL_QUERY), $my_array_of_vars);
  $link_youtube = $my_array_of_vars['v'];

  mysqli_query($conn, "INSERT INTO video VALUES ('', '$link_youtube')");
  return mysqli_affected_rows($conn);
}

function hapus_video()
{
  global $conn;

  $id = $_GET["id"];

  mysqli_query($conn, "DELETE FROM video WHERE id='$id' ");
  return mysqli_affected_rows($conn);
}
// Akhir Video


// Pengaturan Akun
function ubah_username()
{
  global $conn;
  $id = $_POST['id'];
  $username = htmlspecialchars($_POST['username']);
  // cek username sudah ada atau belum
  $result = mysqli_query($conn, "SELECT username FROM admin WHERE username='$username' ");
  if (mysqli_fetch_assoc($result)) {
    echo "<script>
                alert('Username sudah digunakan, mohon gunakan username lain ! ');
              </script>";
    return false;
  }
  mysqli_query($conn, "UPDATE admin SET username='$username' WHERE id='$id' ");
  return mysqli_affected_rows($conn);
}

function ubah_password()
{
  global $conn;
  $id = $_POST['id'];
  $password_baru = $_POST['password_baru'];
  $konfirmasi_password = $_POST['konfirmasi_password'];
  if ($password_baru != $konfirmasi_password) {
    echo "<script>
                    alert('Password tidak sesuai dengan konfirmasi ! ');
                  </script>
                  ";
    return false;
  }

  $password_baru_hash = password_hash($password_baru, PASSWORD_DEFAULT);
  mysqli_query($conn, "UPDATE admin SET password='$password_baru_hash' WHERE id='$id' ");
  return mysqli_affected_rows($conn);
}
// Akhir Pengaturan Akun