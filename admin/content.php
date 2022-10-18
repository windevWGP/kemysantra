<?php

if (isset($_GET['p'])) {

	$page = $_GET['p'];

	switch ($page) {

		case 'sejarah-perusahaan':

			include "content/sejarah-perusahaan.php";

			break;

		case 'visi-misi-perusahaan':

			include "content/visi-misi-perusahaan.php";

			break;

		case 'produk':

			include "content/produk.php";

			break;

		case 'virtual':

			include "content/virtual.php";

			break;

		case 'panorama':

			include "content/panorama.php";

			break;

		case 'artikel':

			include "content/artikel.php";

			break;

		case 'galeri':

			include "content/galeri.php";

			break;

		case 'video':

			include "content/video.php";

			break;

		case 'kontak':

			include "content/kontak.php";

			break;

		case 'pengaturan-akun':

			include "content/pengaturan-akun.php";

			break;



		default:

			include 'content/dashboard.php';

			break;
	}
} else {

	include 'content/dashboard.php';
}
