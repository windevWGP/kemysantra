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
		case 'detail-produk':
			include "content/detail-produk.php";
			break;
		case 'virtual-tour':
			include "content/virtual-tour.php";
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

		default:
			include 'content/beranda.php';
			break;
	}
} else {
	include 'content/beranda.php';
}
