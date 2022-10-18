-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 22 Jun 2021 pada 21.21
-- Versi server: 10.3.29-MariaDB-cll-lve
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kemysantra`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'kemysantra', '$2y$10$MRwZnO2E36P4CAlNSh972OKu2fb2GRPksQOGCWYK83ahZlSAwUMb.'),
(2, 'wiwingaluh', '$2y$10$lITcmtn4XhrXW3kT.moRtejn24YuHXZpNaxvO3PAHUuiz0wWsK7y.'),
(3, 'kokoganteng', '$2y$10$vJveb7hhFcA5GZo96xjkSedPEFOombmXQMK/frlYFT8ICO342Gmwi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `album_galeri`
--

CREATE TABLE `album_galeri` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `album_galeri`
--

INSERT INTO `album_galeri` (`id`, `nama`) VALUES
(2, 'Perumahan Akcaya Kemyla '),
(3, 'jsdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `id_admin` int(10) NOT NULL,
  `tanggal_buat` datetime NOT NULL,
  `tanggal_publish` datetime DEFAULT NULL,
  `id_kategori` int(10) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `foto_headline` varchar(200) DEFAULT NULL,
  `isi` varchar(10000) DEFAULT NULL,
  `tag_berita` varchar(500) DEFAULT NULL,
  `tampil_headline` enum('0','1') NOT NULL,
  `komentar` enum('0','1') NOT NULL,
  `status` enum('0','1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `id_admin`, `tanggal_buat`, `tanggal_publish`, `id_kategori`, `judul`, `foto_headline`, `isi`, `tag_berita`, `tampil_headline`, `komentar`, `status`) VALUES
(1, 1, '2020-04-05 17:28:43', '2020-04-05 17:28:43', 17, 'Rakernis Fungsi Reserse TA 2019 â€“ â€œMemecahkan Masalah Menemukan Solusiâ€', '5e89b2db96862rakernis-fungsi-reserse-2019-polda-kalbar.jpeg', '<p style=\"text-align:justify\"><span style=\"font-size:16px\">Pontianak &ndash; (<strong>3/12/19</strong>) Direktorat Reserse Kriminal Khusus, Ditreskrimum, dan Ditresnarkoba Polda Kalimantan Barat melaksanakan Rakernis Fungsi Reserse&nbsp; yang diadakan pada tanggal 03 Desember 2019 di ruang Graha Khatulistiwa. Kegiatan ini dihadiri oleh para Kasat Reskrim jajaran Polda Kalimantan Barat. Kegiatan dimulai pukul 09:00 WIB sampai dengan pukul 17:30.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Dalam kegiatan Rakernis Fungsi Reserse Tahun Anggaran 2019&nbsp; dibagi menjadi 3 sesi diskusi. Hadir sebagai narasumber dalam Rakernis ini adalah sebagai berikut:</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Sesi pertama diisi oleh narasumber dari:</span></p>\r\n\r\n<ol>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">Balai KSDA yaitu Drs. Alexander Rombonam, MM,MMA</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">Dinas Kehutanan yaitu Ir. Untad Dharmawan</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">Dinas Kelautan dan Perikanan yaitu Ir. Eka Perdana, M.P</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">Dinas Karantina yaitu drh. Devi Kusuma Ningrum, M.H</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">Kasubdit Siber yaitu AKBP Hujra Soumena, S.IK, M.H</span></li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Sesi kedua diisi oleh narasumber dari</span></p>\r\n\r\n<ol>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">Kejaksaan Tinggi Kalimantan Barat yaitu Jabal Nur, S.H, M.H selaku Aspidum Kejaksaan Tinggi Kalbar</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">Kemenkumham Kalimantan Barat Yaitu Husni Thamrin, S.H, M.H</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">Kepala Dinas Kependudukan dan Catatan Sipil yaitu Y Anthonius Rawing, S.E, M.Si</span></li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Sesi ketiga di isi oleh narasumber dari</span></p>\r\n\r\n<ol>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">Badan Narkotika Nasional yaitu Brigjen Pol. Drs. Suyatmo, M.si</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">Balai Pengawasan Obat dan Makanan yaitu Dra. Gracia Arpan, Apt. M.Si</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">Bea Cukai Kalimantan Barat Yaitu Azhar Rasyidi</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">Komandan POM AU Supadio Kalimantan Barat Yaitu Letkol Pom Suharto, M.Han</span></li>\r\n</ol>\r\n', '#rakernis#ditreskrimsus', '1', '1', '1'),
(2, 1, '2020-04-05 17:33:04', '2020-04-05 17:33:04', 2, 'Polda Kalbar Selamatkan Uang Negara Rp 11,894 Miliar Sepanjang 2019', '5e89b3e008e22selamakan-uang-negara-polda-kalbar-2019.jpg', '<p><span style=\"font-size:16px\">Pontianak &ndash; (<strong>31/12/2019</strong>) Kepolisian Daerah Kalimantan Barat berhasil selamatkan uang negara sebanyak Rp 11,894 miliar selama 2019. Kapolda Kalbar, Irjen Pol Didi Haryono memaparkan rilis kasus akhir tahun yang telah ditangani Polda Kalbar, Selasa (31/12).</span></p>\r\n\r\n<p><span style=\"font-size:16px\">Di tahun 2018, jumlah kasus tikonendak pidana korupsi berjumlah 28 kasus, sedangkan di tahun 2019, terdapat 26 kasus. Jumlah kasus tipikor mengalami penurunan 2 kasus, atau turun 7,14 persen. Sementara itu, kerugian negara yang berhasil diungkap di tahun 2018, sebanyak Rp 2,090 miliar, sedangkan di tahun 2019 meningkat menjadi sebanyak Rp 7,282 miliar.</span></p>\r\n\r\n<p><span style=\"font-size:16px\">Keuangan negara yang berhasil diselamatkan oleh Polda Kalbar pada tahun 2018 berjumlah Rp 4,023 miliar, dan kian meningkat di tahun 2019, Polda Kalbar berhasil menyelamatkan uang negara sebesar Rp 11,894 miliar.</span></p>\r\n\r\n<p><span style=\"font-size:16px\">Pada konferensi pers yang digelar Polda Kalbar tersebut, turut hadir pula Gubernur Kalbar, Sutarmidji untuk memantau laporan kasus sepanjang 2019.</span></p>\r\n\r\n<p><span style=\"font-size:16px\">&ldquo;Tadi sudah kita apresiasi sepanjang 2019, Polda Kalbar banyak mendapat penghargaan, tingkat kejahatan semua menurun di Kalbar, dan tingkat kepercayaan masyarakat kepada Polda juga tinggi, ini modal awal untuk memacu kedepannya lah,&rdquo; tutur Sutarmidji.</span></p>\r\n', '#korupsi#tipikor#konferensi_pers', '1', '0', '1'),
(3, 1, '2020-04-05 17:46:57', '2020-04-05 17:46:57', 10, 'Rapat Koordinasi Ditbinmas Polda Kalbar bersama Kepolisian Khusus Tahun 2019', '5e89b7214598eRapat-Koordinasi-Ditbinmas-Polda-Kalbar-1.jpeg', '<p style=\"text-align:justify\"><span style=\"font-size:16px\">Pontianak &ndash; (<strong>04/12/2019</strong>) Ditreskrimsus Polda Kalbar yang diwakili Kasi Korwas PPNS menjadi pemateri dalam Rapat Koordinasi Ditbinmas Polda Kalbar bersama Kepolisian Khusus yang diadakan pada hari Rabu tanggal 04 Desember 2019 di Harris Hotel, Kota Pontianak.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Mengusung tema &ldquo;<strong>Membina dan Membangun Sinergi POLRI dan POLSUS dalam upaya mengelola Keamanan dalam Negeri</strong>&rdquo; dibuka oleh Direktur Binmas Polda Kalbar Kombes Pol. Yulza Sulaiman, S.I.K,. M.H. dan dilanjutkan sesi foto bersama.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Rapat Koordinasi diikuti oleh peserta dari instansi :</span></p>\r\n\r\n<ol>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">Satpol PP Prov. Kalbar;</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">Rutan Klas II B Putussibau;</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">KBO Polres Sekadau;</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">Satbinmas Polres Kubu Raya;</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">Satpol PP Bengkayang;</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">Satbinmas Polres Kapuas Hulu;</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">Gakkum KLHK (SPORC);</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">Satbinmas Polres Mempawah;</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">KBO Polres Sintang;</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">KBO Polres Mempawah;</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">KBO Polres Sintang;</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">KBO Polres Melawi;</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">Satbinmas Polres Bengkayang;</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">KPLP;</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">Dishub KKU;</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">Imigrasi Singkawang;</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">Dishub Prov. Kalbar;</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">Rutan Pontianak;</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">Satpol PP. Kab. Mempawah;</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">Rudenim;</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">KPH Bengkayang;</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">LPKA;</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">Rutan Bengkayang;</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">Satpol PP. Kubu Raya;</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">PSDKP;</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">BKSDA;</span></li>\r\n	<li style=\"text-align: justify;\"><span style=\"font-size:16px\">Balai Karantina Pertanian.</span></li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Rapat dilanjutkan dengan materi yang disampaikan oleh Wadir Intelkam Polda Kalbar dengan Judul : &ldquo;Peran Fungsi Intelkam dalam mendukung tugas Polsus&rdquo;. Kemudian dilanjutkan oleh pemateri dari Kasi Korwas PPNS Ditreskrimsus dengan Judul : &ldquo;Pembinaan, Koordinasi dan Pengawasan PPNS&rdquo;.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Rapat dilanjutkan dengan sesi tanya jawab dan Pembulatan Materi yang disampaikan oleh Kasi Korwas Polsus Ditbinmas Polda Kalbar.</span></p>\r\n', '#rapat_koordinasi#polsus#polri#sinergi', '1', '1', '1'),
(4, 1, '2020-04-05 17:48:59', '2020-04-05 17:48:59', 9, 'Kapolda Kalbar â€ŽBeberkan Hasil Kinerja Tahun 2019', '5e89b79b0f7b3Kapolda-Kalbar-_Beberkan-Hasil-Kinerja-Tahun-2019.jpg', '<p style=\"text-align:justify\"><span style=\"font-size:16px\">Pontianak &ndash; (<strong>31/12/2019</strong>) Kepolisian Daerah Kalimantan Barat mencatat hasil&nbsp;kinerja&nbsp;selama tahun 2019, telah terjadi penurunan tindak kejahatan dan pelanggaran lalu lintas lebih dari 10 persen hingga meraih penghargaan tingkat nasional terkait pelayanan dan&nbsp;kinerja.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Kapolda Kalbar Irjen Pol H Didi Haryono menuturkan Polda Kalbar dan jajaran mencatat telah terjadi penurunan Kasus Kejahatan di Kalbar Turun 16,55 persen dan pelanggaran Lalu lintas hingga 12 persen.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Selain itu Polda Kalbar dan jajaran juga telah meraih sejumlah &lrm;penghargaan Tingkat Nasional Maupun Daerah Terkait Pelayanan dan Kinerja.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Dalam konferensi pers akhir tahun yang digelar di Balai Kemitraan Polda Kalbar pada Selasa (31/12) kemarin yang dihadiri Forkopimda Provinsi Kalbar seperti Gubernur Kalbar Sutarmidji, Pangdam XII/Tanjungpura Mayjen TNI Muhammad Nur Rahmad serta Para tokoh tokoh agama, tokoh masyarakat.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Kapolda Kalbar Irjen Pol H Didi Haryono memimpin langsung pelaksaan konferensi pers mengatakan bahwa tujuan dilaksanakan kegiatan ini sebagai wujud pertanggungjawaban kepada publik terhadap&nbsp;kinerja&nbsp;Polda Kalbar sepanjang tahun 2019.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">&ldquo;Konferensi pers akhir tahun dengan materi penyampaian hasil&nbsp;kinerja&nbsp;Polda Kalbar ialah merupakan pertanggungjawaban kepada publik. Polri merupakan institusi milik rakyat, termasuk dukungan anggarannya,&rdquo; kata&nbsp;Kapolda&nbsp;Kalbar</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Kapolda Didi menuturkan dirinya yang sejak menjabat sebagai&nbsp;Kapolda&nbsp;Kalbar&nbsp;sejak 2017 ini menjelaskan bahwa di tahun 2019 yang menjadi program Polda Kalbar ialah &ldquo;Polsek Sebagai lini Terdepan Harkamtibmas&rdquo;.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Dengan program ini diharapkan memberikan nuansa baru terhadap polsek sebagai unit lengkap satuan terkecil kewilayahan.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">&ldquo;Program ini sejalan dengan yang dicanangkan oleh Gubernur Kalbar yaitu desa mandiri, maka dengan polsek sebagai lini terdepan harkamtibmas ini salah satunya yaitu keberadaan pos kamling yang dilengkapi dengan personel yang mempuni,&rdquo; jelasnya</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Dikatakannya lagi, &ldquo;Dalam program tersebut berdampak menurunnya Kasus Kejahatan di Kalbar hingga 16,55 persen,&rdquo; katanya.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">&ldquo;Jumlah total kejahatan di tahun 2018 sebanyak 5.932 kasus, sedangkan di tahun 2019 sebanyak 4.950 kasus. Artinya tingkat kejahatan di kalbar turun 16,55 persen selama tahun 2019,&rdquo; ungkapnya</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Ia melanjutkan jumlah penyelesaian kasus oleh Polda Kalbar dan jajaran di tahun 2018 sebanyak 4.759 kasus atau 80,22 %.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Sedangkan sepanjang tahun 2019, presentase penyelesaian kasusnya sebanyak 4.360 kasus atau 88,08%.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Artinya&nbsp;kinerja&nbsp;penyelesaian kasus di tahun 2019 ini meningkat 7,86% jika dibanding dengan tahun 2018.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">&ldquo;Untuk jenis kejahatan konvensional di tahun 2018 terdapat sebanyak 4.623 kasus; sedangkan di tahun 2019 terdapat 3.592 kasus; mengalami penurunan 1.031 kasus atau setara 22,3%,&rdquo; jelasnya.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Lanjutnya,Untuk jenis kejahatan transnasional di tahun 2018 terdapat sebanyak 724 kasus, sedangkan di tahun 2019 terdapat 762 kasus; mengalami peningkatan 38 kasus atau setara 5,2%.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Untuk jenis kejahatan terhadap kekayaan negara di tahun 2018 terdapat sebanyak 556 kasus.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Sedangkan di tahun 2019 terdapat 526 kasus, mengalami penurunan 30 kasus atau setara 5,4%, serta Untuk jenis kejahatan kontijensi di tahun 2018 terdapat sebanyak 29 kasus.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Sedangkan di tahun 2019 terdapat 70 kasus; mengalami peningkatan sebanyak 41 kasus.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Pada kesempatan yang sama, selama tahun 2019, Polda Kalbar melalui Direktorat Resnarkoba telah tangani 728 Perkara Kasus Narkotika dan Sita Barang Bukti 113 Kg lebih Shabu dan 30 Ribu Pil Ekstasi.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Sepanjang tahun 2019, Polda Kalimantan Barat menangani sebanyak 728 perkara kasus kejahatan narkotika.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Turun sebanyak 7,37% dibanding 2018 yang menangani 789 perkara.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">&ldquo;Untuk kasus narkoba, di banding 2018 ada penurnuan perkara sebesar 7,37%. Namun ada peningkatan dalam jumlah barang bukti yang disita selama 2019 yang signifikan&rdquo; jelasnya</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Namun pada tahun 2018 jumlah barang bukti yang di sita jenis shabu sebanyak 36.263 gram dan jenis ekstasi 5.568 butir.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Sedangkan di tahun 2019 barang bukti yang disita jenis shabu 113.528 gram (meningkat 213%) dan jenis ekstasi 30.772 butir (meningkat 452%).</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Secara umum, untuk kasus narkoba di tahun 2019 mengalami penurunan baik jumlah kasus maupun jumlah tersangkanya jika dibanding dengan tahun 2018.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Namun mengalami peningkatan yang sangat signifikan untuk jumlah barang bukti yang berhasil disita, khususnya untuk jenis shabu dan ekstasi.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Kapolda juga menambahkan dari total jumlah barang bukti kasus narkoba yang telah disita sepanjang tahun 2019, sebanyak kurang lebih 998.224 jiwa berhasil diselamatkan dari penyalahgunaan narkoba.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Sementara itu, penanganan kasus Korupsi di tahun 2018 jumlah kasus tipikor ada 28 kasus dan di tahun 2019 menangani 26 kasus. Mengalami penurunan 2 kasus atau turun 7,14%</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Dan untuk pelanggaran Lalu Lintas Oleh Pengendara di Provinsi Kalbar Mengalami Penurunan di Tahun 2019 yang berdasarkan data yang di himpun Direktorat Lalu Lintas Polda Kalbar di tahun 2019 jumlah pelanggaran lalu lintas mengalamai penurunan dibanding tahun 2018. Baik itu berupa teguran atau tilang.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">&ldquo;Di tahun 2018 jumlah pelangaran lalulintas sebanyak 118.581 pelanggaran, sedangkan di tahun 2019 sebanyak 103.525 pelanggaran, turun sebesar 12,7%, Jumlah teguran di tahun 2018 sebanyak 41.763 teguran, sedangkan tahun 2019 sebanyak 30.048, terjadi penurunan sebesar 28,05%,&rdquo; jelasnya.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Dan untuk jumlah tilang juga turut mengalami penurunan sebanyak 4.34% yaitu dari 76.815 tilang di tahun 2018, di tahun 2019 sebanyak 73.477.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">dengan capaikan&nbsp;kinerja&nbsp;Polda kalbar dan jajaran, berdampak adanya sejumlah penghargaan yang berhasil di raih Tingkat Nasional Maupun Daerah Terkait Pelayanan dan Kinerja*</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Kapolda Kalbar Irjen Pol Didi Haryono pada kesempatan ini menyampaikan rasa terimakasihnya kepada seluruh lapisan masyarakat yang ada di Kalimantan Barat.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Karena menurutnya, pencapaian yang dilakukan Polda Kalbar tidak lepas dari dukungan dan kerjsama seluruh lapisan masyarakat di Kalimantan Barat.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">&ldquo;Kurang lebih 2 tahun 2 bulan saya memimpin Polda Kalbar, capaian&nbsp;kinerja&nbsp;Polda Kalbar pada periode tahun 2018-2019, alhamdulillah mendapat apresiasi dan penghargaan dari berbagai pihak.&rdquo;</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">&ldquo;Tentunya ini adalah hasil dari kerja keras dan kerjasama kita semua untuk selalu bahu membahu mewujudkan wilayah kalimantan barat yang semakin maju, kompetitif, dan unggul&rdquo; ucapnya</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Beberapa penghargaan lainnya yang telah didapat polda kalbar adalah penghargaan dari Kemenpan RB terhadap 4 Polres di Polda Kalbar sebagai unit kerja pelayanan wilayah bebas dari korupsi (WBK), yaitu Polresta Pontianak Kota, Polres Mempawah, Singkawang dan Sambas.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Kemudian penghargaan sebagai role model penyelenggara pelayanan publik kategori sangat baik yaitu Polres Sambas dan Polres Singkawang, serta 7 polres lainnya sebagai penyelenggara pelayanan publik kategori baik.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Kemudian, pada bidang anggaran di tahun 2019 ini 5 satker jajaran polda kalbar mendapatkan pe', '#hasil_kinerja', '1', '0', '1'),
(5, 1, '2020-04-05 18:03:18', '2020-04-05 18:03:18', 1, 'Kapolda Sampaikan Harapan Tahun 2020 Untuk Kalbar Lebih Baik', '5e89baf6e1efbKapolda-Sampaikan-Harapan-Tahun-2020-Untuk-Kalbar-Lebih-Baik.jpg', '<p style=\"text-align:justify\"><span style=\"font-size:16px\">Pontianak &ndash; (<strong>01/01/2020</strong>) Kapolda&nbsp;Kalbar&nbsp;Irjen Didi Haryono menyampaikan tahun&nbsp;2020&nbsp;merupakan tahun yang penuh harapan. Berbagai kegiatan lokal dan internasional serta pembangunan yang telah terselenggara dengan aman dan lancar di&nbsp;Kalbar.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Kapolda berharap bisa menjadi refleksi untuk membangun&nbsp;Kalbar&nbsp;yang lebih baik&nbsp;kedepan di tahun&nbsp;2020.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">&ldquo;Tentunya kami dari jajaran kepolisian, beserta seluruh komponen masyarakat serta stakeholder yang ada mengucapkan terima kasih kepada seluruh warga&nbsp;Kalbar, yang benar &ndash; benar perduli terhadap kondusifitas situasi keamanan Kalimantan Barat,&rdquo;ujarnya saat hadiri Silaturahmi&nbsp;Kalbar&nbsp;Unggul di Makodam XII Tanjungpura. Rabu (1/1/2020).</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Kemudian, pada tahun&nbsp;2020, bakal dilaksanakan Pilkada serentak di 7 Kabupaten di&nbsp;Kalbar, diharapnya semua dapat berjalan aman dan lancar.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Jendral Putra asli Kalbar itu juga mengharap dukungan dari seluruh masyarakat Kalbar terhadap berbagai program yang di jalan pemerintah Kalbar di bawah ke pemimpinan Sutarmidiji. Khususnya tentang pembangunan Desa Mandiri di&nbsp;Kalbar.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Ia menilai, dengan pembangunan Desa Mandiri, maka stabilitas keamanan di satu wilayah akan terjaga dengan baik.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">&ldquo;Tentunya program bapak gubernur, membangun Desa mandiri, yang tadinya hanya satu sekarang sudah 87, dan akan terus meningkat, ini tentunya merupakan satu Indikator, untuk kemajuan, keamanan dan kesejahteraan wilayah&nbsp;Kalbar,&rdquo;tuturnya.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">&ldquo;Apabila 2031 Desa menjadi desa mandiri, tentunya indikator tentang ketahanan sosial ketahanan lingkungan dan ketahanan ekonomi, itu meliputi semua bidang, kalau itu bisa di cover setiap desa, dapat dipastikan desa ini dapat maju, Desa akan sejahtera, otomatis desa itu aman, inilah yang menjadi harapan kita semua, mari semua warga kalbar kita dukung semua program pembangunan pemerintah,&rdquo;tutupnya.</span></p>\r\n', '', '0', '0', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `id_album` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id`, `id_album`, `judul`, `foto`) VALUES
(3, 2, 'Brosur Perumahan Akcaya Kemyla', '5daa9d6d7b96f.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_berita`
--

CREATE TABLE `kategori_berita` (
  `id` int(11) NOT NULL,
  `kategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_berita`
--

INSERT INTO `kategori_berita` (`id`, `kategori`) VALUES
(1, 'Politik'),
(2, 'Tipikor'),
(3, 'Apel'),
(4, 'Kriminal'),
(5, 'Terorisme'),
(6, 'Cybercrime'),
(8, 'Rapat Kerja'),
(9, 'Konferensi Pers'),
(10, 'Rapat Koordinasi'),
(11, 'Kunjungan Kerja'),
(12, 'Anggaran Dana Desa'),
(13, 'Perbatasan'),
(14, 'Perindustrian'),
(15, 'Perdagangan'),
(16, 'Perlindungan Konsumen'),
(17, 'Telekomunikasi'),
(18, 'Pangan'),
(19, 'Kesehatan'),
(20, 'Penyelundupan'),
(21, 'Fidusia'),
(22, 'Perbankan'),
(23, 'Asuransi'),
(24, 'Transfer Dana'),
(25, 'Money Laundring'),
(26, 'Penyiaran'),
(27, 'Saham'),
(28, 'Reksadana'),
(29, 'Korupsi'),
(30, 'Satwa Liar'),
(31, 'Satwa yang dilindungi'),
(32, 'Tumbuhan yang dilindungi'),
(33, 'BBM'),
(34, 'Lingkungan Hidup'),
(35, 'Perkebunan'),
(36, 'Kehutanan'),
(37, 'Pertambangan'),
(38, 'Pembalakan Liar'),
(39, 'Pertanian'),
(40, 'Perikanan'),
(41, 'Peternakan'),
(42, 'Ujaran Kebencian'),
(43, 'Hoax'),
(44, 'SARA'),
(45, 'Manipulasi Data'),
(46, 'Hacking'),
(47, 'Penipuan Online'),
(48, 'Berita Bohong'),
(49, 'Asusila'),
(50, 'Perjudian'),
(51, 'Penghinaan'),
(52, 'Pencemaran Nama Baik'),
(53, 'Korwas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `tipe` varchar(200) NOT NULL,
  `deskripsi` varchar(10000) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `tipe`, `deskripsi`, `foto`) VALUES
(15, 'AKCAYA KEMYLA 4', 'Tipe 36', 'Fasilitas :<br />\r\nListrik 1300 Watt,<br />\r\nBadan Jalan 6 Meter,<br />\r\nAir Bersih Dari Sumur<br />\r\n<br />\r\nSpesifikasi Teknis :<br />\r\nPondasi&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; : Cor Beton<br />\r\nTiang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Kolom Praktis<br />\r\nDinding&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Batako Displester<br />\r\nLantai&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Cor beton + Keramik<br />\r\nAtap&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Seng Metal<br />\r\nPintu Kamar&nbsp; &nbsp; &nbsp;: Double Triplek<br />\r\nPintu WC&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: PVC<br />\r\nPintu Depan&nbsp; &nbsp; &nbsp;: Pintu Panel Kelas 2<br />\r\nJendela&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Kayu Kelas 2 + Kaca 5mm<br />\r\nCat&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Cat Air<br />\r\nPlafon&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : GRC Board<br />\r\nKM/WC&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Kloset Jongkok<br />\r\n&nbsp;', '5cdc30df79e12.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_rumah`
--

CREATE TABLE `tipe_rumah` (
  `id` int(11) NOT NULL,
  `tipe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tipe_rumah`
--

INSERT INTO `tipe_rumah` (`id`, `tipe`) VALUES
(1, 'Tipe 21'),
(2, 'Tipe 36'),
(3, 'Tipe 45'),
(4, 'Tipe 54'),
(5, 'Tipe 60'),
(6, 'Tipe 70'),
(7, 'Tipe 100'),
(8, 'Tipe 120'),
(9, 'Tipe 140'),
(10, 'Tipe 160'),
(11, 'Tipe 180'),
(12, 'Tipe 200');

-- --------------------------------------------------------

--
-- Struktur dari tabel `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `link_youtube` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `video`
--

INSERT INTO `video` (`id`, `link_youtube`) VALUES
(1, 'xu2zWXFAcIs'),
(2, 'sDy5rXkYH2M'),
(3, 'L7Wh8Slvod4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `virtual_produk`
--

CREATE TABLE `virtual_produk` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `foto_panorama` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `virtual_produk`
--

INSERT INTO `virtual_produk` (`id`, `id_produk`, `judul`, `foto_panorama`) VALUES
(2, 12, 'Test 1', '5cd83028cf7bf.jpg'),
(4, 11, 'Test 1', '5cd7e5b6f09c5.jpg'),
(5, 13, 'Test 12222', '5cd82da9ce134.jpg'),
(6, 14, 'Kamar Tidur', '5cd835c058ebc.jpg'),
(7, 14, 'Ruang Tamu', '5cd844269bd3f.jpg'),
(8, 14, 'Halaman Belakang Rumah', '5cd848fcae635.jpg'),
(9, 14, 'Halaman Depan Rumah', '5cd8490e4582b.jpg'),
(10, 14, 'lapangan', '5cd8d82f731b5.jpg'),
(14, 15, 'Tampak Jalan', '5cdc36df19f0a.jpg'),
(15, 15, 'Tampak Teras Depan', '5cdc375f0fd05.jpg'),
(16, 15, 'Tampak Ruang Tamu', '5cdc37a590954.jpg'),
(17, 15, 'Kamar depan', '5cdc37d232157.jpg'),
(18, 15, 'Kamar belakang', '5cdc37f0bc7f2.jpg'),
(19, 15, 'Blok E &amp; F', '5ceb7c8e7f664.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `album_galeri`
--
ALTER TABLE `album_galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tipe_rumah`
--
ALTER TABLE `tipe_rumah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `virtual_produk`
--
ALTER TABLE `virtual_produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `album_galeri`
--
ALTER TABLE `album_galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tipe_rumah`
--
ALTER TABLE `tipe_rumah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `virtual_produk`
--
ALTER TABLE `virtual_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
