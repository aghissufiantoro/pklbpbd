-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jul 2024 pada 10.37
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bpbd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_web`
--

CREATE TABLE `admin_web` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` char(2) NOT NULL COMMENT '0=Super Admin, 1=Admin',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `admin_web`
--

INSERT INTO `admin_web` (`id`, `nama`, `username`, `password`, `hak_akses`, `created_at`, `updated_at`) VALUES
(1, 'staff', 'staffdarlog', '$2y$10$I4qwByTBBBeSxkAbFHijA.P58CQysAxgn460SwywCHBafNQubFV66', '0', '2017-12-11 10:17:21', '2017-12-11 10:17:21'),
(3, 'Darlog', 'darlog', '$2y$10$Elgt5dZP7DJWn0s2kDcI6erSiz.RFH66S9kJj1GIV89JOvJWkQHsK', '1', '2019-01-21 07:08:25', '2019-01-21 07:08:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `penulis_artikel` varchar(50) DEFAULT NULL,
  `judul_artikel` varchar(200) DEFAULT NULL,
  `slug_artikel` varchar(150) NOT NULL,
  `tgl_artikel` date DEFAULT NULL,
  `jenis_artikel` varchar(100) DEFAULT NULL,
  `moto_artikel` varchar(100) DEFAULT NULL,
  `isi_artikel` longtext DEFAULT NULL,
  `foto_artikel` longtext DEFAULT NULL,
  `foto_artikel1` longtext DEFAULT NULL,
  `foto_artikel2` longtext DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `penulis_artikel`, `judul_artikel`, `slug_artikel`, `tgl_artikel`, `jenis_artikel`, `moto_artikel`, `isi_artikel`, `foto_artikel`, `foto_artikel1`, `foto_artikel2`, `date_created`, `date_updated`) VALUES
(1, 'Kecamatan Bulak', 'BPBD Kota Surabaya Respon Kejadian 2 Atap Rumah Roboh Di Jl Wonosari Wetan', 'bpbd-kota-surabaya-respon-kejadian-2-atap-rumah-roboh-di-jl-wonosari-wetan.html', '2024-04-11', 'Tanggap Darurat', NULL, '<p>BPBD Kota Surabaya terima laporan dari command center 112 adanya w atap rumah warga yang roboh di jalan wonosari wetan 1 dan Wonosari Wetan 2b.<br><br>BPBD Kota Surabaya memberikan bantuan pemasangan terpal dan paket sembako bagi keluarga rumah terdampak.</p>', '810e2d778829f0a450ed99e97cc529f4.jpg', '2876a0b2e937e5793c1bb88f10ac590f.jpg', '21be374578acdb9efc82a57fee187e49.jpg', '2024-04-22 13:55:35', '2024-06-19 19:26:33'),
(3, 'BPBD', 'Tim SAR Gabungan Kota Surabaya Berhasil Menemukan Korban Tenggelam Di Sungai Jagir', 'tim-sar-gabungan-kota-surabaya-berhasil-menemukan-korban-tenggelam-di-sungai-jagir.html', '2023-06-20', 'Tanggap Darurat', NULL, '<p>Tim SAR gabungan Kota Surabaya berhasil menemukan korban tenggelam di Sungai Jagir.<br>Selama 2 hari proses pencarian dilakukan sejak hari minggu pukul 14.00 WIB hingga siang tadi pukul 11.09 WIB mayat korban tenggelam ditemukan mengambang tersangkut ranting di mangrove wonorejo.</p>\r\n<p><br>Menurut keterangan dari warga setempat pada hari sabtu pukul 05,00 WIB, sempat berbincang dengan korban namun tidak lama kemudian korban menceburkan diri dari sisi pintu air jagir, dikarenakan kondisi air sungai yang deras korban langsung hanyut dan tidak ditemukan keberadaannya.</p>\r\n<p><br>Pihak keluarga yang merasa tidak mendapat kabar dari korban melapor ke kepolisian setempat dan setelah dilakukan pendataan kondisi dan ciri - ciri korban sama dengan mayat yang ditemukan tim sar gabungan.<br>Tim SAR gabungan selanjutnya mengevakuasi mayat korban kemudian dibawa ke RSUD dr Soetomo didampingi pihak keluarga.  </p>', '90a679057ea40c7f9537a793d22027d6.png', '6fec439c510b5d98a00f2ed8e97e93e4.png', 'e7f4f6d46fdf0f26dd32b9eb41a0771d.png', '2023-06-20 14:08:25', '2024-03-04 10:46:49'),
(4, 'Kecamatan Bulak', 'BPBD Kota Surabaya Respon Lansia Sakit Di Jalan Semolowaru Bahari', 'bpbd-kota-surabaya-respon-lansia-sakit-di-jalan-semolowaru-bahari.html', '2024-04-13', 'Kategori 1', NULL, '<p>BPBD Kota Surabaya terima laporan dari command center 112 adanya Seorang lansia sakit dan membutuhkan perawatan lebih lanjut<br><br>Setelah mendapat pengecekan medis dari Tim TGC Dinkes, BPBD Kota Surabaya mengevakuasi lansia tersebut untuk selanjutnya di rujuk ke rumah sakit</p>', '39ea4def5fb3b50005bbaa06a3cbf625.jpg', 'f8d85e53b233ddfad5be69a03ceb7ce3.jpg', 'ad1d59e6bbf9468772844cfe5e16ce3b.jpg', '2024-04-22 14:04:24', NULL),
(5, 'Kecamatan Bulak', 'Tim Evakuator BPBD Kota Surabaya Evakuasi Ibu Hamil Pingsan Di Kebun Binatang Surabaya', 'tim-evakuator-bpbd-kota-surabaya-evakuasi-ibu-hamil-pingsan-di-kebun-binatang-surabaya.html', '2024-04-14', 'Tanggap Darurat', NULL, '<p>Selama masa libur lebaran Petugas BPBD Kota Surabaya bersiaga di beberapa lokasi di Kota Surabaya, salah satunya di tempat wisata Kebun Binatang Surabaya.<br><br>Saat melakukan patroli di sekitaran area KBS, Tim Evakuator BPBD menerima laporan adanya Ibu hamil yang tiba-tiba pingsan.<br><br>Tim evakuator BPBD bersama instansi terkait mengevakuasi ibu hamil tersebut kemudian dibawa ke Posko Kesehatan Kebun Binatang Surabaya untuk mendapat perawatan medis lebih lanjut.</p>', '39fb6ab956a5def84fad1b8bb3a64238.jpg', 'aaa86ed2154ef0f38e5c440a726fb780.jpg', '5c6ee9188c78267ca4b993887299dcc0.jpg', '2024-04-22 14:08:01', '2024-04-30 10:03:13'),
(13, 'Kecamatan Bulak', 'Tim Evakuator BPBD Kota Surabaya Evakuasi Ibu Hamil Pingsan Di Kebun Binatang Surabaya', 'tim-evakuator-bpbd-kota-surabaya-evakuasi-ibu-hamil-pingsan-di-kebun-binatang-surabaya.html', '2024-04-14', 'Tanggap Darurat', NULL, '<p>Selama masa libur lebaran Petugas BPBD Kota Surabaya bersiaga di beberapa lokasi di Kota Surabaya, salah satunya di tempat wisata Kebun Binatang Surabaya.<br><br>Saat melakukan patroli di sekitaran area KBS, Tim Evakuator BPBD menerima laporan adanya Ibu hamil yang tiba-tiba pingsan.<br><br>Tim evakuator BPBD bersama instansi terkait mengevakuasi ibu hamil tersebut kemudian dibawa ke Posko Kesehatan Kebun Binatang Surabaya untuk mendapat perawatan medis lebih lanjut.</p>', '39fb6ab956a5def84fad1b8bb3a64238.jpg', 'aaa86ed2154ef0f38e5c440a726fb780.jpg', '5c6ee9188c78267ca4b993887299dcc0.jpg', '2024-04-22 14:08:01', '2024-04-30 10:03:13'),
(14, 'Kecamatan Bulak', 'Tim Evakuator BPBD Kota Surabaya Evakuasi Ibu Hamil Pingsan Di Kebun Binatang Surabaya', 'tim-evakuator-bpbd-kota-surabaya-evakuasi-ibu-hamil-pingsan-di-kebun-binatang-surabaya.html', '2024-04-14', 'Kategori 1', NULL, '<p>Selama masa libur lebaran Petugas BPBD Kota Surabaya bersiaga di beberapa lokasi di Kota Surabaya, salah satunya di tempat wisata Kebun Binatang Surabaya.<br><br>Saat melakukan patroli di sekitaran area KBS, Tim Evakuator BPBD menerima laporan adanya Ibu hamil yang tiba-tiba pingsan.<br><br>Tim evakuator BPBD bersama instansi terkait mengevakuasi ibu hamil tersebut kemudian dibawa ke Posko Kesehatan Kebun Binatang Surabaya untuk mendapat perawatan medis lebih lanjut.</p>', '39fb6ab956a5def84fad1b8bb3a64238.jpg', 'aaa86ed2154ef0f38e5c440a726fb780.jpg', '5c6ee9188c78267ca4b993887299dcc0.jpg', '2024-04-22 14:08:01', '2024-04-30 10:03:13'),
(15, 'BPBD', 'Tim SAR Gabungan Kota Surabaya Berhasil Menemukan Korban Tenggelam Di Sungai Jagir', 'tim-sar-gabungan-kota-surabaya-berhasil-menemukan-korban-tenggelam-di-sungai-jagir.html', '2023-06-20', 'Tanggap Darurat', NULL, '<p>Tim SAR gabungan Kota Surabaya berhasil menemukan korban tenggelam di Sungai Jagir.<br>Selama 2 hari proses pencarian dilakukan sejak hari minggu pukul 14.00 WIB hingga siang tadi pukul 11.09 WIB mayat korban tenggelam ditemukan mengambang tersangkut ranting di mangrove wonorejo.</p>\r\n<p><br>Menurut keterangan dari warga setempat pada hari sabtu pukul 05,00 WIB, sempat berbincang dengan korban namun tidak lama kemudian korban menceburkan diri dari sisi pintu air jagir, dikarenakan kondisi air sungai yang deras korban langsung hanyut dan tidak ditemukan keberadaannya.</p>\r\n<p><br>Pihak keluarga yang merasa tidak mendapat kabar dari korban melapor ke kepolisian setempat dan setelah dilakukan pendataan kondisi dan ciri - ciri korban sama dengan mayat yang ditemukan tim sar gabungan.<br>Tim SAR gabungan selanjutnya mengevakuasi mayat korban kemudian dibawa ke RSUD dr Soetomo didampingi pihak keluarga.  </p>', '90a679057ea40c7f9537a793d22027d6.png', '6fec439c510b5d98a00f2ed8e97e93e4.png', 'e7f4f6d46fdf0f26dd32b9eb41a0771d.png', '2023-06-20 14:08:25', '2024-03-04 10:46:49'),
(16, 'BPBD', 'Tim SAR Gabungan Kota Surabaya Berhasil Menemukan Korban Tenggelam Di Sungai Jagir', 'tim-sar-gabungan-kota-surabaya-berhasil-menemukan-korban-tenggelam-di-sungai-jagir.html', '2023-06-20', 'Kategori 2', NULL, '<p>Tim SAR gabungan Kota Surabaya berhasil menemukan korban tenggelam di Sungai Jagir.<br>Selama 2 hari proses pencarian dilakukan sejak hari minggu pukul 14.00 WIB hingga siang tadi pukul 11.09 WIB mayat korban tenggelam ditemukan mengambang tersangkut ranting di mangrove wonorejo.</p>\r\n<p><br>Menurut keterangan dari warga setempat pada hari sabtu pukul 05,00 WIB, sempat berbincang dengan korban namun tidak lama kemudian korban menceburkan diri dari sisi pintu air jagir, dikarenakan kondisi air sungai yang deras korban langsung hanyut dan tidak ditemukan keberadaannya.</p>\r\n<p><br>Pihak keluarga yang merasa tidak mendapat kabar dari korban melapor ke kepolisian setempat dan setelah dilakukan pendataan kondisi dan ciri - ciri korban sama dengan mayat yang ditemukan tim sar gabungan.<br>Tim SAR gabungan selanjutnya mengevakuasi mayat korban kemudian dibawa ke RSUD dr Soetomo didampingi pihak keluarga.  </p>', '90a679057ea40c7f9537a793d22027d6.png', '6fec439c510b5d98a00f2ed8e97e93e4.png', 'e7f4f6d46fdf0f26dd32b9eb41a0771d.png', '2023-06-20 14:08:25', '2024-03-04 10:46:49'),
(17, 'BPBD', 'Tim SAR Gabungan Kota Surabaya Berhasil Menemukan Korban Tenggelam Di Sungai Jagir', 'tim-sar-gabungan-kota-surabaya-berhasil-menemukan-korban-tenggelam-di-sungai-jagir.html', '2023-06-20', 'Tanggap Darurat', NULL, '<p>Tim SAR gabungan Kota Surabaya berhasil menemukan korban tenggelam di Sungai Jagir.<br>Selama 2 hari proses pencarian dilakukan sejak hari minggu pukul 14.00 WIB hingga siang tadi pukul 11.09 WIB mayat korban tenggelam ditemukan mengambang tersangkut ranting di mangrove wonorejo.</p>\r\n<p><br>Menurut keterangan dari warga setempat pada hari sabtu pukul 05,00 WIB, sempat berbincang dengan korban namun tidak lama kemudian korban menceburkan diri dari sisi pintu air jagir, dikarenakan kondisi air sungai yang deras korban langsung hanyut dan tidak ditemukan keberadaannya.</p>\r\n<p><br>Pihak keluarga yang merasa tidak mendapat kabar dari korban melapor ke kepolisian setempat dan setelah dilakukan pendataan kondisi dan ciri - ciri korban sama dengan mayat yang ditemukan tim sar gabungan.<br>Tim SAR gabungan selanjutnya mengevakuasi mayat korban kemudian dibawa ke RSUD dr Soetomo didampingi pihak keluarga.  </p>', '90a679057ea40c7f9537a793d22027d6.png', '6fec439c510b5d98a00f2ed8e97e93e4.png', 'e7f4f6d46fdf0f26dd32b9eb41a0771d.png', '2023-06-20 14:08:25', '2024-03-04 10:46:49'),
(18, 'BPBD', 'Tim SAR Gabungan Kota Surabaya Berhasil Menemukan Korban Tenggelam Di Sungai Jagir', 'tim-sar-gabungan-kota-surabaya-berhasil-menemukan-korban-tenggelam-di-sungai-jagir.html', '2023-06-20', 'Kategori 2', NULL, '<p>Tim SAR gabungan Kota Surabaya berhasil menemukan korban tenggelam di Sungai Jagir.<br>Selama 2 hari proses pencarian dilakukan sejak hari minggu pukul 14.00 WIB hingga siang tadi pukul 11.09 WIB mayat korban tenggelam ditemukan mengambang tersangkut ranting di mangrove wonorejo.</p>\r\n<p><br>Menurut keterangan dari warga setempat pada hari sabtu pukul 05,00 WIB, sempat berbincang dengan korban namun tidak lama kemudian korban menceburkan diri dari sisi pintu air jagir, dikarenakan kondisi air sungai yang deras korban langsung hanyut dan tidak ditemukan keberadaannya.</p>\r\n<p><br>Pihak keluarga yang merasa tidak mendapat kabar dari korban melapor ke kepolisian setempat dan setelah dilakukan pendataan kondisi dan ciri - ciri korban sama dengan mayat yang ditemukan tim sar gabungan.<br>Tim SAR gabungan selanjutnya mengevakuasi mayat korban kemudian dibawa ke RSUD dr Soetomo didampingi pihak keluarga.  </p>', '90a679057ea40c7f9537a793d22027d6.png', '6fec439c510b5d98a00f2ed8e97e93e4.png', 'e7f4f6d46fdf0f26dd32b9eb41a0771d.png', '2023-06-20 14:08:25', '2024-03-04 10:46:49'),
(20, 'Kecamatan Bulak', 'Adasdasdas', 'adasdasdas.html', '2024-04-30', 'adadad', NULL, '<p>adadadada</p>', '7c2d2b2bb464b1cf1c7a4583db18683f.jpg', '884557b6577afd3cec0e9ae189700671.jpg', '5bd4b85f2ecba3d25008d4175d24bf67.jpg', '2024-05-20 00:45:09', NULL),
(21, 'Kecamatan Bulak', 'Adasdada', 'adasdada.html', '2024-05-14', 'asdasdasdad', NULL, '<p>dadadad</p>', '768a62e8423bc0e93bea8cf1ab7da15d.jpg', '9c7db19fef36957a93d94f30676ba54e.jpg', 'ac1963f99096e7e3a810de5f37939c11.jpg', '2024-05-20 00:45:27', NULL),
(22, 'Kecamatan Bulak', 'Ini Tes Thumbnail', 'ini-tes-thumbnail.html', '2024-06-11', NULL, NULL, '<p>dasdasdasd</p>', 'ebc44dcde3b330851e0a281def7508d0.jpg', '010e11515c3c4fcb05acb9c9b3e7b77a.jpg', 'a48ec3bca9bebafc9ac6c6fd88fe8b88.jpg', '2024-06-16 21:40:33', NULL),
(23, 'Kecamatan Bulak', 'Ini Tes Thumbnail', 'ini-tes-thumbnail.html', '0000-00-00', NULL, NULL, '<p>asdasdasd</p>', '6537d7d99c7a9c0f8a20a149a6301e2b.jpg', 'fe87aae95bcfd25e866c0d3c8a17196e.jpg', '20b5e1a43c35840939c69b5ac1145175.jpg', '2024-06-16 21:54:57', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `content`
--

CREATE TABLE `content` (
  `id` bigint(20) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `jenis` char(1) NOT NULL COMMENT '0=Berita, 1=Artikel',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `content`
--

INSERT INTO `content` (`id`, `judul`, `gambar`, `content`, `jenis`, `created_at`, `updated_at`) VALUES
(1, '18 Daerah di Jatim yang Ekonominya Terancam Bencana Alam', '1.jpg', '<p>\r\n\r\n</p><p><b>Liputan6.com, Bangkalan -</b>&nbsp;Badan Penanggulangan <a target=\"_blank\" rel=\"nofollow\" href=\"http://news.liputan6.com/read/3143966/pdip-gandeng-basarnas-latih-anggota-badan-penanggulangan-bencana\">Bencana </a>Daerah Jawa Timur mencatat dari 38 kabupaten dan kota di Provinsi Jawa Timur, terdapat 29 kabupaten dan kota yang rawan bencana alam. Dari jumlah itu, 18 diantara merupakan daerah dengan pertumbuhan ekonomi yang tinggi, namun perekonomiannya rawan terganggu oleh bencana alam.</p><p>\"Data ini berdasarkan hitungan indeks resiko <a target=\"_blank\" rel=\"nofollow\" href=\"http://news.liputan6.com/read/3143966/pdip-gandeng-basarnas-latih-anggota-badan-penanggulangan-bencana\">bencana</a>,” kata Kepala Badan Penanggulangan Bencana Daerah Jawa Timur, Sudarmawan, di Kabupaten Bangkalan, Minggu (5/11/2017), dalam kegiatan bersih-bersih sungai dan kali di Kelurahan Tunjung, Kecamatan Burneh.</p><p>18 kabupaten dan kota yang paling rawan itu disebut dengan istilah ‘Gerbang Kerto Susilo’, singkatan dari Gresik, Bangkalan, Mojokerto, Surabaya, Sidoarjo dan Lamongan. Di Madura, selain Bangkalan, Kabupaten Pamekasan juga masuk kategori ini&nbsp;\r\n\r\n</p><p>Untuk meminimalisir potensi <a target=\"_blank\" rel=\"nofollow\" href=\"http://news.liputan6.com/read/3143966/pdip-gandeng-basarnas-latih-anggota-badan-penanggulangan-bencana\">bencana </a>di 18 daerah tersebut, kata Sudarmawan, BPBD Jatim meluncurkan program Pengurangan Resiko Bencana (PRB). Salah satu kegiatan PRB direalisasikan dalam bentuk menggelar sekolah tak berdinding yang disebut sekolah sungai, laut dan gunung.</p><p>Di Jatim sekolah ini baru berdiri di sembilan kabupaten, tiga sekolah sungai, tiga sekolah gunung dan tiga sekolah laut. Para ‘siswanya’ adalah masyarakat yang kehidupan sehari-harinya berhubungan langsung dengan Sungai, laut dan gunung di daerahnya.</p><p>\"Bergantung bencana yang paling rawan apa, di Bangkalan ini banyak sungai kritis karena sedimentasi, jadi kita buat sekolah sungai,\" ujar dia.</p>\r\n\r\n<p></p><p></p>', '0', '2024-02-28 07:25:54', '2017-12-11 11:20:23'),
(2, 'Libur Natal dan Tahun Baru, Risma Ingatkan Pentingnya Nomor 112', '2.jpg', '<p>\r\n\r\n</p><p><b>Liputan6.com, Surabaya -</b>&nbsp;Ribuan personel dari gabungan jajaran pengamanan seperti Linmas, Satpol PP, Dinas Perhubungan (Dishub), Polrestabes Surabaya hingga Babinsa dan Babinkantibmas, siap menjaga kondusivitas Kota Surabaya selama <a target=\"_blank\" rel=\"nofollow\" href=\"http://otomotif.liputan6.com/read/3204096/sahabat-daihatsu-dikawal-selama-libur-natal-dan-tahun-baru\">libur Natal</a>&nbsp;dan Tahun Baru 2018.</p><p>Selain itu, juga ada personel dari Dinas Kebersihan dan Ruang Terbuka Hijau (DKRTH), Dinas Pekerjaan Umum Bina Marga dan Pematusan, petugas dari Palang Merah Indonesia, PDAM Surya Sembada hingga PD Pasar Surya yang siap mewujudkan Surabaya tetap aman dan nyaman.</p><p>Wali Kota Surabaya, <a target=\"_blank\" rel=\"nofollow\" href=\"http://news.liputan6.com/read/3192742/risma-sebut-medsos-jadi-tantangan-saat-kampanye-gus-ipul-azwar\">Tri Rismaharini</a>&nbsp;menyampaikan, para petugas pengamanan yang akan melaksanakan tugas selama <a target=\"_blank\" rel=\"nofollow\" href=\"http://bisnis.liputan6.com/read/3203943/hadapi-libur-natal-kai-gelar-operasi-18-desember-8-januari\">libur Natal</a>&nbsp;dan pergantian tahun, mengemban tugas mulia.</p>\r\n\r\n\r\n\r\n<p>Sebab, ketika kebanyakan orang tengah beribadah dan juga berlibur bersama keluarga masing-masing, para personel pengamanan tersebut tetap bekerja.</p><p>\"Saya atas nama pemkot, bangga dengan petugas pengamanan ini. Di saat semuanya beribadah dan liburan, tapi petugas tetap melaksanakan tugas yang sebenarnya lebih berat dibandingkan tugas biasanya,\" tutur Wali Kota Surabaya, Sabtu (23/12/2017).</p><p>\"Karena itu, pesan saya, lakukan tugas mulia ini dengan tulus dan ikhlas agar hasil maksimal,\"<a target=\"_blank\" rel=\"nofollow\" href=\"http://bisnis.liputan6.com/read/3184556/risma-beri-gaji-pengamen-surabaya-rp-2-juta\">&nbsp;Risma</a>menambahkan.</p>\r\n\r\n<br><p></p>', '0', '2024-02-28 07:25:54', '2017-12-26 11:55:40'),
(3, 'Risma: Suroboyo Bus Akan Terkoneksi Trem', '3.jpg', '<p>\r\n\r\nsuarasurabaya.net&nbsp;- Tri Rismaharini Wali Kota Surabaya mengatakan, kehadiran Suroboyo Bus ke depannya akan difungsikan sebagai <i>trunk</i>(angkutan penghantar) menuju halte Trem. Karena beberapa hal menuju Trem belum siap, maka akan difungsikan sebagai angkutan alternatif. <br><br>\"Sebetulnya ini untuk angkutan alternatif sebelum ada trem. Karena untuk Trem ada beberapa yang belum siap, konektifitas antara trem dengan trunk ini diantaranya,\" ujarnya di Balai Kota Surabaya, Jumat (29/12/2017).<br><br>Risma mengatakan, karena hal ini mendesak maka cepat dikejar untuk realisasi pembelian angkutan bus ini. Karena tidak ada persyaratan tertentu dari Pemerintah Pusat untuk pengadaan ini.<br><br>\"Kami masih punya PR untuk Trem, ini sedang kami siapkan koneksinya,\" katanya.<br><br>Menurut Risma, yang terpenting dari angkutan Suroboyo Bus adalah tepat waktu, aman dan nyaman. Angkutan ini tidak ada yang boleh <i>ngetem</i>, tidak kena lampu merah karena otomatis terintegrasi dengan SITS.<br><br>\"Bus ini aman karena ada 12 kamera yang akan membantu mengawasi penumpang, ada kursi khusus difabel, lansia dan ibu hamil. Ada AC tentunya, dan juga rendah. Kalau tinggi, aksesnya kan naik dulu. Kalau ini di atas pedestrian bisa langsung melangkah masuk. Ini memang agak mahal, tapi lebih aman dan nyaman, bisa konek dengan pedestrian kita,\" kata Risma.<br><br>Untuk warga difabel, kata Risma bisa naik sendiri karena ada akses khusus seperti jembatan kecil di pintu masuk bus.<br><br>Saat ini pengadaan bus seharga Rp2,4 miliar per unit ini berjumlah 8. Tahun depan, kata Risma akan nambah 10 unit lagi.<br><br>Untuk tenaga pengemudinya, Pemkot akan merekrut sopir bus yang ada, tapi harus ditraining terlebih dahulu tentang kedisiplinan, tepat waktu dan bersih.<br><br>\"Karena kami punya sistem di SITS itu tidak murah untuk mendukung transportasi ini, bagaimana kalau sopirnya masih belum disiplin,\" katanya.<br><br>Bus ini rencananya akan melewati rute jalur tengah yaitu Terminal Purabaya (Bungurasih)-Joyoboyo-Tunjungan Plaza-Siola.<br><br>Para penumpang bisa melihat keberadaan bus melalui aplikasi di handphone nantinya. Di halte-halte juga disediakan papan informasi yang terkoneksi GPS di bus tersebut. (bid/dwi)\r\n\r\n<br></p>', '0', '2024-02-28 07:25:54', '2017-12-28 16:07:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_entry_sembako`
--

CREATE TABLE `data_entry_sembako` (
  `id_transaksi` varchar(15) NOT NULL,
  `tanggal_entry` date NOT NULL,
  `kode_barang` varchar(256) NOT NULL,
  `status_barang` varchar(256) NOT NULL,
  `qty_barang` int(9) NOT NULL,
  `penerima_barang` varchar(256) NOT NULL,
  `lokasi_diterima` varchar(1500) NOT NULL,
  `keterangan_barang` varchar(1500) NOT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `kelurahan` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `id_kejadian` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kejadian`
--

CREATE TABLE `data_kejadian` (
  `id_kejadian` varchar(12) NOT NULL,
  `tanggal` date NOT NULL,
  `kejadian` varchar(256) NOT NULL,
  `waktu_berita` time NOT NULL,
  `waktu_tiba` time NOT NULL,
  `lokasi_kejadian` varchar(256) NOT NULL,
  `kecamatan_kejadian` varchar(256) NOT NULL,
  `kelurahan_kejadian` varchar(256) NOT NULL,
  `alamat_kejadian` varchar(1000) NOT NULL,
  `kronologi` varchar(1000) NOT NULL,
  `tindak_lanjut` varchar(1000) NOT NULL,
  `petugas_lokasi` varchar(1000) NOT NULL,
  `dokumentasi` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_kejadian`
--

INSERT INTO `data_kejadian` (`id_kejadian`, `tanggal`, `kejadian`, `waktu_berita`, `waktu_tiba`, `lokasi_kejadian`, `kecamatan_kejadian`, `kelurahan_kejadian`, `alamat_kejadian`, `kronologi`, `tindak_lanjut`, `petugas_lokasi`, `dokumentasi`) VALUES
('DK010170001', '2024-06-23', 'Kebakaran', '22:11:00', '22:11:00', 'Surabaya Pusat', '35.78.28', '35.78.28.1001', 'dsadsadsasd', 'dasadsads', 'test', 'dsadadas', 'default.png'),
('DK010170002', '2024-06-25', 'Pohon Tumbang', '05:55:00', '05:55:00', 'Surabaya Pusat', '35.78.28', '35.78.28.1001', 'Test Data5', 'Test Data5', 'Test Data5', 'Test Data5', 'default.png'),
('DK010170003', '2024-06-25', 'Pohon Tumbang', '06:59:00', '06:59:00', 'Surabaya Pusat', '35.78.28', '35.78.28.1001', 'Test Data6', 'Test Data6', 'Test Data6', 'Test Data6', 'default.png'),
('DK010170004', '2024-06-25', 'Pohon Tumbang', '22:22:00', '22:22:00', 'Surabaya Pusat', '35.78.28', '35.78.28.1001', 'Test Data', 'Test Data ', 'test', 'test', 'default.png'),
('DK010170005', '2024-06-25', 'Pohon Tumbang', '22:22:00', '22:22:00', 'Surabaya Pusat', '35.78.28', '35.78.28.1001', 'Test Data', 'Test Data ', 'test', 'test', 'default.png'),
('DK010224001', '2024-02-23', 'Darurat Medis', '04:00:00', '04:00:00', 'Surabaya Barat', '35.78.13', '35.78.13.1002', 'bulak rukem 57', 'tabrakan', 'dirujuk', 'bpb', '6667feabd8f71.png'),
('DK010224002', '2024-06-03', 'Darurat Medis', '04:00:00', '04:00:00', 'Surabaya Barat', '35.78.20', '35.78.20.1001', 'bulak rukem 57', 'asma', 'diberi obat', 'bpbd', '665e1f622a4ac.png'),
('DK010224003', '2024-06-01', 'Kebakaran', '20:01:15', '20:01:15', 'Surabaya Barat', '35.78.03', '35.78.03.1005', 'bulak rukem 57', 'aluran listrik konslet', 'dipadamkan', 'bpbd', '665e2015e1a15.png'),
('DK010224004', '2024-06-04', 'Pohon Tumbang', '03:41:00', '03:41:00', 'Surabaya Timur', '35.78.13', '35.78.13.1003', 'dawdwadw', 'drhdrh', 'ewew', 'bpb', '665e2a83d1388.jpg'),
('DK010224005', '2024-05-15', 'Penemuan Jenazah', '20:01:15', '20:01:15', 'Surabaya Timur', '35.78.06', '35.78.06.1003', 'bulak rukem 57', 'adanya informasi dari masyarakat', 'diangkat', 'bpbd', '665e20acb2a83.png'),
('DK010224006', '2024-05-09', 'Orang Tenggelam', '04:00:00', '04:00:00', 'Surabaya Selatan', '35.78.09', '35.78.09.1002', 'bulak rukem 57', 'mancing ditepi sungai', 'diselamatkan', 'bpbd', '665e20da75193.png'),
('DK010224007', '2024-05-23', 'Lainnya', '20:01:15', '20:01:15', 'Surabaya Utara', '35.78.18', '35.78.18.1002', 'bulak rukem 57', 'keseleo main futsal', 'diberi pengobatan', 'bpbd', '665e212088ebd.jpg'),
('DK062024001', '2024-06-23', 'Kebakaran', '22:22:00', '22:22:00', 'Surabaya Pusat', '35.78.28', '', 'Test Data ', 'Test Data ', 'test', 'test', 'default.png'),
('DK062024002', '2024-06-23', 'Pohon Tumbang', '11:11:00', '11:12:00', 'Surabaya Pusat', '35.78.28', '35.78.28.1002', 'aaa', 'aaa', 'aaa', 'aaa', 'default.png'),
('DK062024003', '2024-06-23', 'Pohon Tumbang', '11:11:00', '11:12:00', 'Surabaya Pusat', '35.78.28', '35.78.28.1002', 'aaa', 'aaa', 'aaa', 'aaa', 'default.png'),
('DK070724001', '2024-07-07', 'Kecelakaan Lalu Lintas', '01:30:00', '01:45:00', 'Surabaya Timur', '35.78.09', '35.78.09.1001', 'Keputih', 'tabrak mobil ke motor', '-', 'BPBD', 'default.png'),
('DK070724002', '2024-07-07', 'Penemuan Jenazah', '16:00:00', '16:25:00', 'Surabaya Timur', '35.78.26', '35.78.26.1001', 'Mulyorejo Indah 1', 'jenazah di toren', 'kubur', 'bpbd, PMI', 'default.png'),
('DK210624001', '2024-06-21', 'Kebakaran', '22:22:00', '22:23:00', 'Surabaya Timur', '35.78.28', '35.78.28.1001', 'asfdfasfdasdf', 'dass', 'dasdsa', 'dsaads', 'default.png'),
('DK220724001', '2024-07-22', 'Kecelakaan Lalu Lintas', '11:23:00', '11:23:00', 'SURABAYA BARAT', 'ASEM ROWO', 'ASEM ROWO', 'mkl', 'tabrak mobil ke motor', 'kubur', 'BPBD', '/upload/data_kejadian/dokumentasi/3d733bd703533b73120883a619131d5c.jpg'),
('DK2306202400', '2024-06-23', 'Kebakaran', '22:22:00', '22:22:00', 'Surabaya Pusat', '35.78.13', '35.78.13.1001', 'dsasds', 'dasads', 'dsaads', 'dsadsa', 'default.png'),
('DK230620401', '2024-06-23', 'Penemuan Jenazah', '11:11:00', '11:11:00', 'Surabaya Pusat', '35.78.28', '35.78.28.1001', 'Test Data', 'Test Data ', 'test', 'test', 'default.png'),
('DK240620001', '2024-06-24', 'Orang Tenggelam', '13:31:00', '13:31:00', 'Surabaya Pusat', '35.78.29', '35.78.29.1001', 'dsaadsasdsa', 'dsaadsdas', 'dsadsaasd', 'dasadsasd', 'default.png'),
('DK240620002', '2024-06-24', 'Kecelakaan Lalu Lintas', '03:21:00', '03:13:00', 'Surabaya Pusat', '35.78.28', '35.78.28.1001', 'dsasds', 'dsadasdas', 'dasadsads', 'dsadsa', 'default.png'),
('DK240624001', '2024-06-24', 'Pohon Tumbang', '12:21:00', '21:12:00', 'Surabaya Pusat', '35.78.28', '35.78.28.1001', 'dsadsadas', 'adsdasdsa', 'dsaadsads', 'test', 'default.png'),
('DK240624002', '2024-06-24', 'Pohon Tumbang', '12:11:00', '12:12:00', 'Surabaya Pusat', '35.78.28', '35.78.28.1001', 'dasadsdas', 'dasdasads', 'dasadsads', 'dasadsads', 'default.png'),
('DK250624001', '2024-06-25', 'Pohon Tumbang', '22:22:00', '11:11:00', 'Surabaya Timur', '35.78.28', '35.78.28.1001', 'dsdasdsa', 'Test Data ', 'test', 'aaaa', 'default.png'),
('DK250624002', '2024-06-25', 'Pohon Tumbang', '22:22:00', '22:22:00', 'Surabaya Pusat', '35.78.28', '35.78.28.1001', 'Test Data', 'Test Data ', 'test', 'test', 'default.png'),
('DK250624003', '2024-06-25', 'Pohon Tumbang', '22:02:00', '22:02:00', 'Surabaya Pusat', '', '', 'Test Data22', 'Test Data ', 'test', 'test', 'default.png'),
('DK250624004', '2024-06-25', 'Pohon Tumbang', '22:22:00', '22:22:00', 'Surabaya Pusat', '35.78.28', '35.78.28.1001', 'Test Data ', 'Test Data', 'test', 'test', 'default.png'),
('DK250624005', '2024-06-25', 'Pohon Tumbang', '03:33:00', '03:33:00', 'Surabaya Pusat', '35.78.28', '35.78.28.1001', 'Test Data3', 'Test Data3', 'Test Data3', 'Test Data3', 'default.png'),
('DK250624006', '2024-06-25', 'Pohon Tumbang', '03:33:00', '03:33:00', 'Surabaya Pusat', '35.78.28', '35.78.28.1001', 'Test Data3', 'Test Data3', 'Test Data3', 'Test Data3', 'default.png'),
('DK250624007', '2024-06-25', 'Pohon Tumbang', '04:44:00', '04:44:00', 'Surabaya Pusat', '35.78.28', '35.78.28.1001', 'Test Data4', 'Test Data4', 'Test Data4', 'Test Data4', 'default.png'),
('DK250624008', '2024-06-25', 'Pohon Tumbang', '05:55:00', '05:55:00', 'Surabaya Pusat', '35.78.28', '35.78.28.1001', 'Test Data5', 'Test Data5', 'Test Data5', 'Test Data5', 'default.png'),
('DK250624009', '2024-06-25', 'Pohon Tumbang', '22:22:00', '11:01:00', 'Surabaya Pusat', '35.78.28', '35.78.28.1001', 'Test Data', '1111', '1111', '11111', 'default.png'),
('DK250624010', '2024-06-25', 'Pohon Tumbang', '22:22:00', '11:01:00', 'Surabaya Pusat', '35.78.28', '35.78.28.1001', 'Test Data', '1111', '1111', '11111', 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kompi`
--

CREATE TABLE `data_kompi` (
  `id_petugas` int(11) NOT NULL,
  `jenis_kompi` varchar(256) NOT NULL,
  `regu` varchar(256) NOT NULL,
  `kedudukan` varchar(256) NOT NULL,
  `nama_petugas` varchar(256) NOT NULL,
  `jenis_kelamin` char(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_kompi`
--

INSERT INTO `data_kompi` (`id_petugas`, `jenis_kompi`, `regu`, `kedudukan`, `nama_petugas`, `jenis_kelamin`) VALUES
(4, 'B', 'B1', 'Anggota Regu', 'BINTANG GISKA PRADANA', 'L'),
(5, 'B', 'B1', 'ANGGOTA REGU', 'AHMAD SETYAWAN', 'L'),
(6, 'B', 'B1', 'ANGGOTA REGU', 'BENNY OKTO FANDI', 'L'),
(7, 'B', 'B1', 'ANGGOTA REGU', 'HERU NUGROHO', 'L'),
(8, 'B', 'B1', 'ANGGOTA REGU', 'MUHAMMAD YUSUF RIZKY RAMADANI', 'L'),
(9, 'B', 'B1', 'ANGGOTA REGU', 'RIZKI FIRMANTO', 'L'),
(10, 'B', 'B1', 'ANGGOTA REGU', 'SAFAATULLAH AQDHOM', 'L'),
(11, 'B', 'B1', 'ANGGOTA REGU', 'ARDIAN PUTRA PRATAMA', 'L'),
(12, 'B', 'B1', 'ANGGOTA REGU', 'LUKITO ADHI', 'L'),
(13, 'B', 'B1', 'ANGGOTA REGU', 'RIZAL ADITYA SETIAWAN', 'L'),
(14, 'B', 'B1', 'DRIVER', 'SUWITO', 'L'),
(15, 'B', 'B1', 'DRIVER', 'AGUS SUTJIPTO', 'L'),
(16, 'B', 'B1', 'DRIVER', 'SYAMSUL ARIF', 'L'),
(17, 'B', 'B2', 'DANRU B2', 'AGUS SULISTYO HADI', 'L'),
(18, 'B', 'B2', 'WADANRU B2.1', 'TRIYONO EFFENDI', 'L'),
(19, 'B', 'B2', 'ANGGOTA REGU', 'M GUNTUR NAJIB AL JABAR', 'L'),
(20, 'B', 'B2', 'ANGGOTA REGU', 'MOCH HAMDANI ASIAH CHOLIL', 'L'),
(21, 'B', 'B2', 'ANGGOTA REGU', 'MUHAMMAD FAQIH FIRDAUS', 'L'),
(22, 'B', 'B2', 'ANGGOTA REGU', 'RYAN ALIFIANSYAH SULISTYO', 'L'),
(23, 'B', 'B2', 'ANGGOTA REGU', 'MOCH NIZAR OKTAFIAN', 'L'),
(24, 'B', 'B2', 'ANGGOTA REGU', 'BUHUR FAWAID', 'L'),
(25, 'B', 'B2', 'ANGGOTA REGU', 'M. ARIF RISKI RIZALDI', 'L'),
(26, 'B', 'B2', 'ANGGOTA REGU', 'HAMID JUNAIDI', 'L'),
(27, 'B', 'B2', 'DRIVER', 'ARI DWI SETIO', 'L'),
(28, 'B', 'B2', 'DRIVER', 'WANDIH', 'L'),
(29, 'B', 'B2', 'DRIVER', 'SURYADI', 'L'),
(30, 'B', 'B3', 'DANRU B3', 'ARIS MUNANDAR', 'L'),
(31, 'B', 'B3', 'WADANRU B3.1', 'MOCH. HAMIM', 'L'),
(32, 'B', 'B3', 'ANGGOTA REGU', 'HADHI RAHMAT ROMADHON', 'L'),
(33, 'B', 'B3', 'ANGGOTA REGU', 'HERI SISWAHYULIANTO', 'L'),
(34, 'B', 'B3', 'ANGGOTA REGU', 'MUCHAMAD ZAINAL ABIDIN', 'L'),
(35, 'B', 'B3', 'ANGGOTA REGU', 'BAGUS SAPUTRO', 'L'),
(36, 'B', 'B3', 'ANGGOTA REGU', 'MUCH. ALWI NOVA ARDIANSYAH', 'L'),
(37, 'B', 'B3', 'ANGGOTA REGU', 'SUPRIYANTO', 'L'),
(38, 'B', 'B3', 'ANGGOTA REGU', 'LUKMAN HAKIM (80006)', 'L'),
(39, 'B', 'B3', 'ANGGOTA REGU', 'ROI', 'L'),
(40, 'B', 'B3', 'DRIVER', 'ARIS HANJALI', 'L'),
(41, 'B', 'B3', 'DRIVER', 'GUSTI NUGRAHA WAHDANY', 'L'),
(42, 'B', 'B3', 'DRIVER', 'EKO SUKWANDARI HARIYANTO', 'L'),
(43, 'B', 'B4', 'DANRU B4 / SRIKANDI', 'NURUL ISTIQOMAH', 'P'),
(44, 'B', 'B4', 'ANGGOTA REGU', 'MARLITA', 'P'),
(45, 'B', 'B4', 'ANGGOTA REGU', 'LISA YOLANDA', 'P'),
(46, 'B', 'B4', 'ANGGOTA REGU', 'RISALDA AYU SAVIRA', 'P'),
(47, 'B', 'B4', 'ANGGOTA REGU', 'DHENOK ANITA CHRISTY', 'P'),
(48, 'B', 'B4', 'ANGGOTA REGU', 'TITA KUSUMA ARFINE', 'P'),
(49, 'B', 'B4', 'ANGGOTA REGU', 'DWI SEFTIYANI PUTRI', 'P'),
(50, 'B', 'B4', 'ANGGOTA REGU', 'NIKITA SAID', 'P'),
(51, 'B', 'B4', 'ANGGOTA REGU', 'ANDINI MELATI PUTRI', 'P'),
(52, 'B', 'B4', 'ANGGOTA REGU', 'INTAN ANDINI', 'P'),
(53, 'B', 'B5', 'DANRU B5 / PETIR', 'LILIK PUJIANTO', 'L'),
(54, 'B', 'B5', 'WADANRU B5.1 / PETIR', 'FEBRIANTO PRADANA PUTRA', 'L'),
(55, 'B', 'B5', 'ANGGOTA REGU', 'BAGAS MAULANA RAFSANJANI', 'L'),
(56, 'B', 'B5', 'ANGGOTA REGU', 'LUTVY PRATAMA', 'L'),
(57, 'B', 'B5', 'ANGGOTA REGU', 'MOCH. BASTOMI', 'L'),
(58, 'B', 'B5', 'ANGGOTA REGU', 'MUHAMMAD MU`TASIM BILLAH', 'L'),
(59, 'B', 'B5', 'ANGGOTA REGU', 'TEGUH RANU SAPUTRO', 'L'),
(60, 'B', 'B5', 'ANGGOTA REGU', 'ALVIYAN ALIMUDDIN ZUHRI', 'L'),
(61, 'B', 'B5', 'ANGGOTA REGU', 'FERI AGUSTIN KURNIAWAN', 'L'),
(62, 'B', 'B5', 'ANGGOTA REGU', 'TAUFIK AJI SAPUTRA', 'L'),
(63, 'B', 'B5', 'ANGGOTA REGU', 'ONGKI NURUL EFENDI', 'L'),
(64, 'B', 'B5', 'ANGGOTA REGU', 'OKTANIO FERRYL YUDHISTIRAH', 'L'),
(65, 'B', 'B5', 'ANGGOTA REGU', 'HENDRO', 'L'),
(66, 'B', 'B5', 'ANGGOTA REGU', 'YOYOK AKBAR ALI HAMZAH', 'L'),
(67, 'B', 'B5', 'ANGGOTA REGU', 'YUSRIL ACHWAN SAPUTRO', 'L'),
(68, 'B', 'B6', 'DANRU B6 / PAWANA', 'FAZAR QHOTIBUL U', 'L'),
(69, 'B', 'B6', 'WADANRU B6.1 / PAWANA', 'SHAIFUL ARIF', 'L'),
(70, 'B', 'B6', 'ANGGOTA REGU', 'SAIFUL HUZEN', 'L'),
(71, 'B', 'B6', 'ANGGOTA REGU', 'MOHAMMAD ERLANGGA', 'L'),
(72, 'B', 'B6', 'ANGGOTA REGU', 'MOCHAMAD CHOIRON', 'L'),
(73, 'B', 'B6', 'ANGGOTA REGU', 'ROBY RIZANI', 'L'),
(74, 'B', 'B6', 'ANGGOTA REGU', 'WAHYU PERMANA PUTRA', 'L'),
(75, 'B', 'B6', 'ANGGOTA REGU', 'AHMAD BUSTOMI', 'L'),
(76, 'B', 'B6', 'ANGGOTA REGU', 'ACHMAD ALI MUDZAKIR MARUF', 'L'),
(77, 'B', 'B6', 'ANGGOTA REGU', 'JONATHAN MARKUS SEA', 'L'),
(78, '', '', 'MANGGALAPATI', 'HARTANTO SRI PAMUNGKAS', 'L'),
(79, '', '', 'WAKIL MANGGALAPATI', 'WAHYUDI', 'L'),
(80, 'A', '', 'DANKI A', 'NUNGKI PAOLINA R', 'L'),
(81, 'A', '', 'WADANKI A', 'ZAINUL ARIFIN', 'L'),
(82, 'B', '', 'DANKI B', 'EKO SUPRIYANTO', 'L'),
(83, 'B', '', 'WADANKI B', 'MOCH AMINUL HALIM', 'L'),
(84, 'C', '', 'DANKI C', 'MOCHAMAD CHAIRUL TAKWOLO', 'L'),
(85, 'C', '', 'WADANKI C', 'YUDA WIDAS P', 'L'),
(86, 'A', 'A1', 'DANRU A1', 'MUHAMMAD PRATAMA MULYA', 'L'),
(87, 'A', 'A1', 'WADANRU A1.1', 'ZAM ZAM AULIYA AKHMAD', 'L'),
(88, 'A', 'A1', 'ANGGOTA REGU', 'M. SYAFII', 'L'),
(89, 'A', 'A1', 'ANGGOTA REGU', 'SAIFUDDIN PASHA', 'L'),
(90, 'A', 'A1', 'ANGGOTA REGU', 'SAIFUL AKBAR', 'L'),
(91, 'A', 'A1', 'ANGGOTA REGU', 'RIZQI SULAIMAN', 'L'),
(92, 'A', 'A1', 'ANGGOTA REGU', 'IFAN FAUZI', 'L'),
(93, 'A', 'A1', 'ANGGOTA REGU', 'SAIFUL HIDAYAT', 'L'),
(94, 'A', 'A1', 'ANGGOTA REGU', 'AGUNG WIRANATA', 'L'),
(95, 'A', 'A1', 'ANGGOTA REGU', 'MOCHAMAD HUSEIN', 'L'),
(96, 'A', 'A1', 'ANGGOTA REGU', 'YUNUS TRI PUTRA ASMORO', 'L'),
(97, 'A', 'A1', 'DRIVER', 'ANGGA MEI CAHYA PERMANA', 'L'),
(98, 'A', 'A1', 'DRIVER', 'NONOK PRAMBODO', 'L'),
(99, 'A', 'A1', 'DRIVER', 'MOCHAMAD SUWADJI', 'L'),
(100, 'A', 'A2', 'DANRU A2', 'TITO SUMARSONO', 'L'),
(101, 'A', 'A2', 'WADANRU A2.1', 'MARANDRI ASRULZANI', 'L'),
(102, 'A', 'A2', 'ANGGOTA REGU', 'DIMAS PUTRA ASMANDIKA D', 'L'),
(103, 'A', 'A2', 'ANGGOTA REGU', 'DEDDY BAYU SETIYAWAN', 'L'),
(104, 'A', 'A2', 'ANGGOTA REGU', 'SULAKSONO HADI', 'L'),
(105, 'A', 'A2', 'ANGGOTA REGU', 'USTADI', 'L'),
(106, 'A', 'A2', 'ANGGOTA REGU', 'JULIO ADE MAULANA', 'L'),
(107, 'A', 'A2', 'ANGGOTA REGU', 'ACHMAD RIZAL FATAHILLAH', 'L'),
(108, 'A', 'A2', 'ANGGOTA REGU', 'ARGA YONGKI ANDARESTU', 'L'),
(109, 'A', 'A2', 'ANGGOTA REGU', 'ANDIKA FERDIAN', 'L'),
(110, 'A', 'A2', 'ANGGOTA REGU', 'LUKMAN HAKIM (40002)', 'L'),
(111, 'A', 'A2', 'DRIVER', 'AINUR SAHRUL', 'L'),
(112, 'A', 'A2', 'DRIVER', 'MOCH IFAN MA`RUF', 'L'),
(113, 'A', 'A2', 'DRIVER', 'ABD.MACHFUD', 'L'),
(114, 'A', 'A3', 'DANRU A3', 'FAUZI EFENDI', 'L'),
(115, 'A', 'A3', 'WADANRU A3.1', 'SURYO WIBOWO', 'L'),
(116, 'A', 'A3', 'ANGGOTA REGU', 'AHMAD JUNAIDI', 'L'),
(117, 'A', 'A3', 'ANGGOTA REGU', 'AHMAD YAZID RYAN SAPUTRA', 'L'),
(118, 'A', 'A3', 'ANGGOTA REGU', 'EKA DICKY ALVIANDI', 'L'),
(119, 'A', 'A3', 'ANGGOTA REGU', 'YULI PRASETYO ADJI', 'L'),
(120, 'A', 'A3', 'ANGGOTA REGU', 'RICO ILHAM RYAN HERNANDA', 'L'),
(121, 'A', 'A3', 'ANGGOTA REGU', 'TEDDY FAJAR NOVIANTO', 'L'),
(122, 'A', 'A3', 'ANGGOTA REGU', 'DANI DWI PURWANTO', 'L'),
(123, 'A', 'A3', 'ANGGOTA REGU', 'MUSTIKA', 'L'),
(124, 'A', 'A3', 'ANGGOTA REGU', 'MOCH ULIL AZMI JAUHARI', 'L'),
(125, 'A', 'A3', 'DRIVER', 'DANIEL KISLEW HARDICAHYA', 'L'),
(126, 'A', 'A3', 'DRIVER', 'MUZAKKI', 'L'),
(127, 'A', 'A3', 'DRIVER', 'DIDIT KUSWANTO', 'L'),
(128, 'A', 'A4', 'DANRU A4 / SRIKANDI', 'TANIA AFFRIDA W', 'P'),
(129, 'A', 'A4', 'SRIKANDI', 'NISA NOR KHOLIFAH', 'P'),
(130, 'A', 'A4', 'SRIKANDI', 'AINUL QURANIN NAFISAH', 'P'),
(131, 'A', 'A4', 'SRIKANDI', 'RENI APRILIA NISMAYA', 'P'),
(132, 'A', 'A4', 'SRIKANDI', 'FEBRY KAMISA SARI', 'P'),
(133, 'A', 'A4', 'SRIKANDI', 'FEBRIANTI RAMADHANI', 'P'),
(134, 'A', 'A4', 'SRIKANDI', 'DESI ERIKA NATALIA', 'P'),
(135, 'A', 'A4', 'SRIKANDI', 'USWATUN KHASANAH', 'P'),
(136, 'A', 'A5', 'DANRU A5 / PETIR', 'CHUSNUL ASHADI', 'L'),
(137, 'A', 'A5', 'DANRU A5.1 / PETIR', 'AHMAD RIFAI', 'L'),
(138, 'A', 'A5', 'ANGGOTA REGU', 'ACH. FAISOL', 'L'),
(139, 'A', 'A5', 'ANGGOTA REGU', 'BAYU EKO PRASETIANTO', 'L'),
(140, 'A', 'A5', 'ANGGOTA REGU', 'DINO SANTOSO WAHYUDINATA', 'L'),
(141, 'A', 'A5', 'ANGGOTA REGU', 'HUSNI RIZQI PRATAMA', 'L'),
(142, 'A', 'A5', 'ANGGOTA REGU', 'ROBBI AFDI PRANATA', 'L'),
(143, 'A', 'A5', 'ANGGOTA REGU', 'FERY MAULANA', 'L'),
(144, 'A', 'A5', 'ANGGOTA REGU', 'MOCH FADIL RIFKIAN', 'L'),
(145, 'A', 'A5', 'ANGGOTA REGU', 'ROHMAN FERDIANSYAH', 'L'),
(146, 'A', 'A5', 'ANGGOTA REGU', 'TEDY SAPUTRA', 'L'),
(147, 'A', 'A5', 'ANGGOTA REGU', 'GUNTUR AJI WICAKSONO', 'L'),
(148, 'A', 'A5', 'ANGGOTA REGU', 'MUHAMMAD AYUB ASMARA FADILLAH', 'L'),
(149, 'A', 'A5', 'ANGGOTA REGU', 'AKBAR FIRDAUS MUZAKKI', 'L'),
(150, 'A', 'A5', 'ANGGOTA REGU', 'DONI SLAMET MUJIARTO', 'L'),
(151, 'A', 'A6', 'DANRU A6 / PAWANA', 'DIDIK SETIAWAN', 'L'),
(152, 'A', 'A6', 'DANRU A6.1 / PAWANA', 'MOCH ROMZI', 'L'),
(153, 'A', 'A6', 'RUNNER LOGISTIK', 'YULES IVAN WAHYU ADINATA', 'L'),
(154, 'A', 'A6', 'RUNNER LOGISTIK', 'WAHYU DWI SANTOSO', 'L'),
(155, 'A', 'A6', 'RUNNER LOGISTIK', 'ADITYA DWI CHANDRA', 'L'),
(156, 'A', 'A6', 'RUNNER LOGISTIK', 'ERLAN DWI FIRMANSYAH', 'L'),
(157, 'A', 'A6', 'RUNNER LOGISTIK', 'SYAMSUL ARIFIN', 'L'),
(158, 'A', 'A6', 'RUNNER LOGISTIK', 'BAGUS KRISNA FIBRIANTO', 'L'),
(159, 'A', 'A6', 'RUNNER LOGISTIK', 'RADITYA IKSAN PRADANA', 'L'),
(160, 'A', 'A6', 'RUNNER LOGISTIK', 'ARIS SETIAWAN', 'L'),
(161, 'A', 'A6', 'RUNNER LOGISTIK', 'M. HOLIK', 'L'),
(162, 'C', 'C1', 'DANRU C1', 'ACHMAD JUNIANTO', 'L'),
(163, 'C', 'C1', 'WADANRU C1.1', 'FARUK', 'L'),
(164, 'C', 'C1', 'ANGGOTA REGU', 'ALFATH DWIANGGA', 'L'),
(165, 'C', 'C1', 'ANGGOTA REGU', 'CHRISTARDA NUGRAHA E', 'L'),
(166, 'C', 'C1', 'ANGGOTA REGU', 'MIFTAKHUL QULUB', 'L'),
(167, 'C', 'C1', 'ANGGOTA REGU', 'PUTRA EKO BAGUS PRASETYO', 'L'),
(168, 'C', 'C1', 'ANGGOTA REGU', 'FEBRI IBNU GRAHA', 'L'),
(169, 'C', 'C1', 'ANGGOTA REGU', 'JOKO PRASETYO', 'L'),
(170, 'C', 'C1', 'ANGGOTA REGU', 'MAULANA ANDITAYATNA', 'L'),
(171, 'C', 'C1', 'ANGGOTA REGU', 'MOCHAMAD KURNIAWAN', 'L'),
(172, 'C', 'C1', 'ANGGOTA REGU', 'ARGA SUMARNO', 'L'),
(173, 'C', 'C1', 'DRIVER', 'DIYANTO', 'L'),
(174, 'C', 'C1', 'DRIVER', 'MOCH. ROZI', 'L'),
(175, 'C', 'C1', 'DRIVER', 'MOCH SIFAK ELBY', 'L'),
(176, 'C', 'C2', 'DANRU C2', 'NOVINDA RIYANTOKO', 'L'),
(177, 'C', 'C2', 'WADANRU C2.1', 'SUKARDJI', 'L'),
(178, 'C', 'C2', 'ANGGOTA REGU', 'ACHMAD BAHRUDIN', 'L'),
(179, 'C', 'C2', 'ANGGOTA REGU', 'DYMAS APRIAMUDATAMA', 'L'),
(180, 'C', 'C2', 'ANGGOTA REGU', 'MOCH. MUSA', 'L'),
(181, 'C', 'C2', 'ANGGOTA REGU', 'MUHAMMAD ANDI BIANTORO', 'L'),
(182, 'C', 'C2', 'ANGGOTA REGU', 'MUHAMAD IHZA NURALIM', 'L'),
(183, 'C', 'C2', 'ANGGOTA REGU', 'EKO DARMAWAN', 'L'),
(184, 'C', 'C2', 'ANGGOTA REGU', 'M MUCKLIS S ABIDIN', 'L'),
(185, 'C', 'C2', 'ANGGOTA REGU', 'ANDY SETYA PRADANA', 'L'),
(186, 'C', 'C2', 'DRIVER', 'DANA YASA JATI DIRI', 'L'),
(187, 'C', 'C2', 'DRIVER', 'BAGUS BAYU SEPTYOADI', 'L'),
(188, 'C', 'C2', 'DRIVER', 'ACHMAD HATTA NURUDIN', 'L'),
(189, 'C', 'C3', 'DANRU C3', 'ANTONIS MERET', 'L'),
(190, 'C', 'C3', 'WADANRU C3.1', 'ALFREDA HENDRYELIAN', 'L'),
(191, 'C', 'C3', 'ANGGOTA REGU', 'MOCH.ARIF RAHMAN', 'L'),
(192, 'C', 'C3', 'ANGGOTA REGU', 'NOVALDI LUCKY PRATAMA', 'L'),
(193, 'C', 'C3', 'ANGGOTA REGU', 'SYAFRI DEO NUR BUDI A', 'L'),
(194, 'C', 'C3', 'ANGGOTA REGU', 'AHMAD FARID', 'L'),
(195, 'C', 'C3', 'ANGGOTA REGU', 'FIRDIAN ALIANSYAH', 'L'),
(196, 'C', 'C3', 'ANGGOTA REGU', 'ABDUL KAFI', 'L'),
(197, 'C', 'C3', 'ANGGOTA REGU', 'ACHMAD FAISOL', 'L'),
(198, 'C', 'C3', 'ANGGOTA REGU', 'AGUNG WIDO SUHARTO', 'L'),
(199, 'C', 'C3', 'ANGGOTA REGU', 'BENY ABDUL RHOMAN', 'L'),
(200, 'C', 'C3', 'DRIVER', 'YOGA LUDRA WIYASA', 'L'),
(201, 'C', 'C3', 'DRIVER', 'TEGUH PRASETYO', 'L'),
(202, 'C', 'C4 ', 'DANRU C4 / SRIKANDI', 'YUNI NUR RAHMA', 'P'),
(203, 'C', 'C4', 'SRKANDI', 'DINDA RADIKA DEWI', 'P'),
(204, 'C', 'C4', 'SRIKANDI', 'TIARA YUFFITA SARI', 'P'),
(205, 'C', 'C4', 'SRIKANDI', 'DELA PUSVITA SARI', 'P'),
(206, 'C', 'C4', 'SRIKANDI', 'NURUL HIDAYATI', 'P'),
(207, 'C', 'C4', 'SRIKANDI', 'ADELLIA NEVY TAMALA', 'P'),
(208, 'C', 'C4', 'SRIKANDI', 'PUTRI HARUM MEILINA', 'P'),
(209, 'C', 'C4', 'SRIKANDI', 'SUHARTATIK', 'P'),
(210, 'C', 'C4', 'SRIKANDI', 'TRI WAHYUNINGSIH', 'P'),
(211, 'C', 'C4', 'SRIKANDI', 'VIRGINA ISABELLA', 'P'),
(212, 'C', 'C5', 'DANRU C5 / PETIR', 'SYAMSUL AHMADI', 'L'),
(213, 'C', 'C5', 'WADANRU C5.1 / PETIR', 'YUDA SETIAWAN', 'P'),
(214, 'C', 'C5', 'ANGGOTA REGU', 'ACHMAD SURYA ABRIYANTO', 'L'),
(215, 'C', 'C4', 'ANGGOTA REGU', 'AGUS SUCIPTO', 'L'),
(216, 'C', 'C5', 'ANGGOTA REGU', 'ALI HUROSIM', 'L'),
(217, 'C', 'C5', 'ANGGOTA REGU', 'RICHY CHRISTIAN SAPUTRA', 'L'),
(218, 'C', 'C5', 'ANGGOTA REGU', 'RM NUR DONI SETIYAWAN', 'L'),
(219, 'C', 'C5', 'ANGGOTA REGU', 'HERLAMBANG', 'L'),
(220, 'C', 'C5', 'ANGGOTA REGU', 'M IDHAM ZAMRONI', 'L'),
(221, 'C', 'C5', 'ANGGOTA REGU', 'M. KHAFID HIDAYATULLAH', 'L'),
(222, 'C', 'C5', 'ANGGOTA REGU', 'BAGUS APRILIO', 'L'),
(223, 'C', 'C5', 'ANGGOTA REGU', 'FIRGA AMALIAN', 'L'),
(224, 'C', 'C5', 'ANGGOTA REGU', 'KRISNA ARISTIAWAN', 'L'),
(225, 'C', 'C5', 'ANGGOTA REGU', 'M. HATEM', 'L'),
(226, 'C', 'C5', 'ANGGOTA REGU', 'HAGI EKA SETYO', 'L'),
(227, 'C', 'C6', 'DANRU C6 / PAWANA', 'TAUFIK FAQUR ROHMAN', 'L'),
(228, 'C', 'C6', 'WADANRU C6.1 / PAWANA', 'RABITHA ALAM NURMANSAH', 'L'),
(229, 'C', 'C6', 'RUNNER LOGISTIK', 'DIKI HARI JATMIKO', 'L'),
(230, 'C', 'C6', 'RUNNER LOGISTIK', 'FADINAL AINUROZY', 'L'),
(231, 'C', 'C6', 'RUNNER LOGISTIK', 'BUYUNG FIRMANSYAH', 'L'),
(232, 'C', 'C6', 'RUNNER LOGISTIK', 'MUHAMMAD NABIL', 'L'),
(233, 'C', 'C6', 'RUNNER LOGISTIK', 'ILHAM ADIWIJAYA', 'L'),
(234, 'C', 'C6', 'RUNNER LOGISTIK', 'LUCKY JOKO PURWANTORO', 'L'),
(235, 'C', 'C6', 'RUNNER LOGISTIK', 'AKHMAD ANSORI', 'L'),
(236, 'C', 'C6', 'RUNNER LOGISTIK', 'SYAIFUDIN', 'L'),
(237, 'A', 'C5', 'Wadanru B2', 'INAN ROHADIIIsss', 'L'),
(238, 'A', 'C5', 'Wadanru B2', 'INAN ROHADIIIsss', 'L'),
(239, 'A', 'C5', 'Wadanru B2', 'HAHAHAHAHHAHAHAH', 'L');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_master_sembako`
--

CREATE TABLE `data_master_sembako` (
  `kode_barang` varchar(256) NOT NULL,
  `nama_barang` varchar(256) NOT NULL,
  `kategori_barang` varchar(256) NOT NULL,
  `satuan_barang` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_master_sembako`
--

INSERT INTO `data_master_sembako` (`kode_barang`, `nama_barang`, `kategori_barang`, `satuan_barang`) VALUES
('BR0001', 'baju', 'Pakaian', 'Pack'),
('BR0002', 'baju', 'Pakaian', 'Pack'),
('BR0003', 'sabun', 'Alat Mandi', 'Kaleng');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `ni_pegawai` varchar(100) DEFAULT NULL COMMENT 'Nomor Induk',
  `tmp_lahir_pegawai` varchar(100) DEFAULT NULL,
  `tgl_lahir_pegawai` date DEFAULT NULL,
  `instansi_pegawai` varchar(100) DEFAULT NULL,
  `pangkat_pegawai` varchar(100) DEFAULT NULL,
  `golongan_pegawai` varchar(100) DEFAULT NULL,
  `jabatan_pegawai` varchar(100) DEFAULT NULL,
  `plt_pegawai` varchar(100) DEFAULT NULL,
  `eselon_pegawai` varchar(100) DEFAULT NULL,
  `nama_pegawai` varchar(100) DEFAULT NULL,
  `telp_pegawai` varchar(100) DEFAULT NULL,
  `alamat_pegawai` text DEFAULT NULL,
  `jk_pegawai` varchar(100) DEFAULT NULL,
  `foto_pegawai` text DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_pegawai`
--

INSERT INTO `data_pegawai` (`id_pegawai`, `ni_pegawai`, `tmp_lahir_pegawai`, `tgl_lahir_pegawai`, `instansi_pegawai`, `pangkat_pegawai`, `golongan_pegawai`, `jabatan_pegawai`, `plt_pegawai`, `eselon_pegawai`, `nama_pegawai`, `telp_pegawai`, `alamat_pegawai`, `jk_pegawai`, `foto_pegawai`, `date_created`, `date_updated`) VALUES
(1, '196906121998031019', 'Lumajang', '1969-06-12', 'BPBD Kota Surabaya', 'Pembina Tingkat I', 'IV/c', '1', 'Iya', 'II.b', 'AGUS HEBI DJUNIANTORO ST, MT', NULL, NULL, 'Laki-laki', '6642f02d28c59.jpg', '2024-06-03 13:18:02', '2024-06-03 13:18:02'),
(2, '197104301990031002', 'Surabaya', '1971-04-30', 'BPBD Kota Surabaya', 'Pembina Tingkat I', 'IV/b', '2', 'Iya', 'III.a', 'Drs BAMBANG UDI UKORO SH, MSi', '08555', 'aaaa', 'Laki-laki', '6642f4cdb78b1.jpg', '2024-05-14 12:21:17', '2024-05-14 12:21:17'),
(3, '198208182010012016', 'Surabaya', '1982-08-18', 'BPBD Kota Surabaya', 'Penata Tingkat I', 'III/d', '10', 'Iya', 'N-E', 'TYAS DARYA KHAMALIA S AP', '08555', 'aaaa', 'Perempuan', '6642f4fc178e9.jpg', '2024-05-14 12:22:04', '2024-05-14 12:22:04'),
(4, '198501112010011011', 'Surabaya', '1985-01-11', 'BPBD Kota Surabaya', 'Penata Tingkat I', 'III/d', '5', 'Iya', 'IV.a', 'BAYU PRABHATA ARINUGRAHA SE', '08555', 'aaaa', 'Laki-laki', '6642f64b275b1.jpg', '2024-05-14 12:27:39', '2024-05-14 12:27:39'),
(5, '197201301992011001', 'Surabaya', '1972-01-30', 'BPBD Kota Surabaya', 'Pembina Tingkat I', 'IV/b', '3', 'Iya', 'III.b', 'Drs YANU MARDIANTO M Si ', '08555', 'aaaa', 'Laki-laki', '6642f52b09d04.jpg', '2024-05-14 12:22:51', '2024-05-14 12:22:51'),
(6, '196706282006041009', 'Surabaya', '1967-06-28', 'BPBD Kota Surabaya', 'Penata Tingkat I', 'III/d', '6', 'Iya', 'N-E', 'Ir HARRY ASJTANTO MM', '08555', 'aaaa', 'Laki-laki', '6642f54316916.jpg', '2024-05-14 12:23:15', '2024-05-14 12:23:15'),
(7, '196607191997121002', 'Solo', '1966-07-19', 'BPBD Kota Surabaya', 'Penata Tingkat I', 'III/d', '6', 'Iya', 'N-E', 'Drs WIDYO NUGROHO', '08555', 'aaaa', 'Laki-laki', '6642f5611307b.jpg', '2024-05-14 12:23:45', '2024-05-14 12:23:45'),
(8, '198010091999121002', 'Surabaya', '1980-10-09', 'BPBD Kota Surabaya', 'Pembina', 'IV/a', '4', 'Iya', 'III.b', 'BUYUNG HIDAYAT RACHMAN S STP, M Si', '08555', 'aaaa', 'Laki-laki', '6642f5861000c.jpg', '2024-05-14 12:24:22', '2024-05-14 12:24:22'),
(9, '197708122001121005', 'Bojonegoro', '1977-08-12', 'BPBD Kota Surabaya', 'Penata Tingkat I', 'III/d', '8', 'Iya', 'N-E', 'ARIF SUNANDAR PRANOTO NEGORO S Sos, M S', '08555', 'aaaa', 'Laki-laki', '6642f5c3df70b.jpg', '2024-05-14 12:25:23', '2024-05-14 12:25:24'),
(10, '197906032006041021', 'Surabaya', '1979-06-03', 'BPBD Kota Surabaya', 'Penata Tingkat I', 'III/d', '9', 'Iya', 'N-E', 'ADITYA INDRADI SETIAWAN S H', '08555', 'aaaa', 'Laki-laki', '6642f5db00a06.jpg', '2024-05-14 12:25:47', '2024-05-14 12:25:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_stock_logistik`
--

CREATE TABLE `data_stock_logistik` (
  `kode_barang` varchar(12) NOT NULL,
  `qty_masuk` int(11) NOT NULL,
  `qty_keluar` int(11) NOT NULL,
  `qty_rusak` int(11) NOT NULL,
  `qty_tersedia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_stock_logistik`
--

INSERT INTO `data_stock_logistik` (`kode_barang`, `qty_masuk`, `qty_keluar`, `qty_rusak`, `qty_tersedia`) VALUES
('BR0001', 0, 0, 0, 0),
('BR0002', 0, 0, 0, 0),
('BR0003', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumentasi`
--

CREATE TABLE `dokumentasi` (
  `id_dokumentasi` int(11) NOT NULL,
  `nama_kegiatan` varchar(200) DEFAULT NULL,
  `video_dokumentasi` text DEFAULT NULL,
  `tgl_dokumentasi` date DEFAULT NULL,
  `narasumber` text DEFAULT NULL,
  `thumbnail_dokumentasi` text DEFAULT NULL,
  `dok_dokumentasi` text DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `lokasi_dokumentasi` text DEFAULT NULL,
  `alamat_dokumentasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dokumentasi`
--

INSERT INTO `dokumentasi` (`id_dokumentasi`, `nama_kegiatan`, `video_dokumentasi`, `tgl_dokumentasi`, `narasumber`, `thumbnail_dokumentasi`, `dok_dokumentasi`, `date_created`, `date_updated`, `lokasi_dokumentasi`, `alamat_dokumentasi`) VALUES
(1, 'Sosialisasi Gawat Darurat', 'SDN Tenggilis', '2024-04-20', '15 Peserta', 'default.png', 'default.png', '2024-04-30 12:10:33', NULL, NULL, ''),
(3, 'Sosialisasi Kebencanaan', 'SDN Jemursari', '2024-04-29', '25 Peserta', 'default.png', 'default.png', '2024-05-02 09:55:48', NULL, NULL, ''),
(4, 'Sosialisasi Bencana ', NULL, '2024-05-06', '50 Peserta', 'default.png', 'default.png', '2024-05-02 09:56:42', NULL, NULL, ''),
(5, 'Sosialisasi Gempa Bumi ', NULL, '2024-04-24', '50 Peserta', 'default.png', 'default.png', '2024-05-02 11:58:12', NULL, NULL, ''),
(7, 'tes123', 'https://www.youtube.com/watch?v=CSxVByni_MU', '2024-05-07', 'apa ya', '3cc7bb1d520d026901592b552d1115a1.png', '[\"4b2c7460547c3a0e696db293a5f14ae8.png\",\"8a75b303cda3b650376b29e17d904476.png\",\"641566bb2b8312cbc3bf41548e7100d0.png\"]', '2024-05-17 15:44:12', '2024-06-11 11:58:24', '', ''),
(8, 'Sosialisasi Kebencanaan', 'https://youtu.be/fvlc-ewp4VU?si=GKJVt-RTErNGHCFT', '2024-05-07', 'pak harto spd mpd', '6b19e551a1d4f7a35ddda7b1e4dc680b.png', '[\"4378a06c94df65a5327fa33a61fd1be3.jpg\",\"aa58038891b91d8bb26d5ffe3a70e33e.jpg\",\"c3a1222b1fb4559366fb364c531d17e2.jpg\",\"7f7783167534657b52cbf197e005cdee.jpg\",\"f34e562e48eaef28b718f5a44f31f757.jpg\",\"4fff172bf564ca346aa28bf8346ae656.jpg\"]', '2024-05-20 00:31:22', '2024-06-11 12:28:55', 'SDN WONOREJO VI', 'WOnorejo utara, jawa timur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumentasi_sinasini`
--

CREATE TABLE `dokumentasi_sinasini` (
  `id_dokumentasi_sinasini` int(11) NOT NULL,
  `nama_kegiatan_sinasini` varchar(200) DEFAULT NULL,
  `video_dokumentasi_sinasini` text DEFAULT NULL,
  `tgl_dokumentasi_sinasini` date DEFAULT NULL,
  `thumbnail_dokumentasi_sinasini` text DEFAULT NULL,
  `dok_dokumentasi_sinasini` text DEFAULT NULL,
  `lokasi_dokumentasi_sinasini` text DEFAULT NULL,
  `alamat_dokumentasi_sinasini` text NOT NULL,
  `date_create_sinasini` datetime DEFAULT NULL,
  `date_update_sinasini` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dokumentasi_sinasini`
--

INSERT INTO `dokumentasi_sinasini` (`id_dokumentasi_sinasini`, `nama_kegiatan_sinasini`, `video_dokumentasi_sinasini`, `tgl_dokumentasi_sinasini`, `thumbnail_dokumentasi_sinasini`, `dok_dokumentasi_sinasini`, `lokasi_dokumentasi_sinasini`, `alamat_dokumentasi_sinasini`, `date_create_sinasini`, `date_update_sinasini`) VALUES
(14, 'Mengajar kebencanaan ', 'https://youtu.be/5GXkWPcvHr0?si=WVle-KbaktmaOuFo ', '2024-07-17', '748e65b3bd7523ba564ef01800561a84.jpg', '[\"d005fef176ce4833f36914c85bab5e19.jpg\"]', 'KB-TK Khadijah 2, Surabaya', 'Jl. Ahmad Yani', '2024-07-18 09:14:06', NULL),
(15, 'PPT Harapan Bunda Tanggap Bencana', 'https://www.youtube.com/watch?v=UZ9l9jkrG30&pp=ygUMbWF3YXIgamluZ2dh', '2024-07-16', '40aab1db70ee0c93ca8d9b7f711d8fb1.jpg', '[\"277b2fa958d46840b6238226c9d7edca.jpg\",\"3b9229382cb9d0dd10a4e7bc96a222b6.jpg\",\"473407d78048ae78f85067c90c1dbcd1.jpg\"]', 'PPT Harapan Bunda', 'Jl. Bogangin Praja', '2024-07-18 09:17:35', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_darurat_medis`
--

CREATE TABLE `form_darurat_medis` (
  `id_kejadian` varchar(256) NOT NULL,
  `nama` varchar(1000) NOT NULL,
  `alamat` varchar(1000) NOT NULL,
  `usia` int(11) NOT NULL,
  `kondisi` varchar(1000) NOT NULL,
  `riwayat_penyakit` varchar(1000) NOT NULL,
  `jenis_kelamin` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_kebakaran`
--

CREATE TABLE `form_kebakaran` (
  `id_kejadian` varchar(100) NOT NULL,
  `objek_terbakar` varchar(1000) NOT NULL,
  `luas_terbakar` varchar(1000) NOT NULL,
  `luas_bangunan` varchar(1000) NOT NULL,
  `penyebab` varchar(1000) NOT NULL,
  `status_bangunan` varchar(1000) NOT NULL,
  `nama` varchar(1000) NOT NULL,
  `usia` int(100) NOT NULL,
  `jenis_kelamin` varchar(1000) NOT NULL,
  `alamat` varchar(1000) NOT NULL,
  `lebar_jalan` int(255) NOT NULL,
  `kondisi_bangunan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_lain`
--

CREATE TABLE `form_lain` (
  `id_kejadian` varchar(100) NOT NULL,
  `jenis_kejadian_lain` varchar(1000) NOT NULL,
  `nama` varchar(1000) NOT NULL,
  `alamat` varchar(1000) NOT NULL,
  `detail_obyek` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_laka`
--

CREATE TABLE `form_laka` (
  `id_kejadian` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `usia` int(100) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `kendaraan` varchar(100) NOT NULL,
  `luka` varchar(100) NOT NULL,
  `kondisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_orang_tenggelam`
--

CREATE TABLE `form_orang_tenggelam` (
  `id_kejadian` varchar(100) NOT NULL,
  `nama_saksi` varchar(1000) NOT NULL,
  `usia_saksi` int(11) NOT NULL,
  `alamat_saksi` varchar(1000) NOT NULL,
  `hubungan_saksi` varchar(1000) NOT NULL,
  `nama_korban` varchar(1000) NOT NULL,
  `usia_korban` int(11) NOT NULL,
  `jenis_kelamin` varchar(11) NOT NULL,
  `alamat` varchar(1000) NOT NULL,
  `kondisi` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_penemuan_jenazah`
--

CREATE TABLE `form_penemuan_jenazah` (
  `id_kejadian` varchar(100) NOT NULL,
  `nama_saksi` varchar(1000) NOT NULL,
  `usia_saksi` int(11) NOT NULL,
  `alamat_saksi` varchar(1000) NOT NULL,
  `nama_korban` varchar(1000) NOT NULL,
  `usia_korban` int(11) NOT NULL,
  `alamat_korban` varchar(1000) NOT NULL,
  `alamat_domisili_korban` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `form_penemuan_jenazah`
--

INSERT INTO `form_penemuan_jenazah` (`id_kejadian`, `nama_saksi`, `usia_saksi`, `alamat_saksi`, `nama_korban`, `usia_korban`, `alamat_korban`, `alamat_domisili_korban`) VALUES
('', 'tegar', 20, 'bangkalan', 'yazid', 21, 'tenggilis', 'mulyorejo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_pohon_tumbang`
--

CREATE TABLE `form_pohon_tumbang` (
  `id_kejadian` varchar(12) NOT NULL,
  `jenis_pohon` varchar(1000) NOT NULL,
  `diameter` int(255) NOT NULL,
  `tinggi` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `form_pohon_tumbang`
--

INSERT INTO `form_pohon_tumbang` (`id_kejadian`, `jenis_pohon`, `diameter`, `tinggi`) VALUES
('', '1111', 1111, 111);

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `jenis` char(1) NOT NULL,
  `keterangan` varchar(150) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `embed` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `jenis`, `keterangan`, `gambar`, `embed`, `created_at`, `updated_at`) VALUES
(3, '1', 'Seleksi Calon Anggota Linmas', NULL, 'km3XWFCj2oQ', '2024-02-28 07:28:20', '2019-01-23 21:44:59'),
(5, '0', 'Bantuan Bencana Lombok-NTB', '4.jpg', NULL, '2024-02-28 07:28:20', '2018-08-31 23:45:22'),
(6, '0', '', '6.jpg', NULL, '2024-02-28 07:28:20', '2018-08-31 23:45:40'),
(7, '0', 'Rescue Ular Phyton di Rumah Pompa Prapen', '7.jpg', NULL, '2024-02-28 07:28:20', '2019-01-21 13:41:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gb_berita`
--

CREATE TABLE `gb_berita` (
  `id_gambar` bigint(20) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `keterangan` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `gb_berita`
--

INSERT INTO `gb_berita` (`id_gambar`, `gambar`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '1.jpg', '', '2024-02-28 07:29:00', '2019-01-23 17:53:17'),
(2, '2.jpg', '', '2024-02-28 07:29:00', '2019-01-23 17:53:26'),
(3, '3.jpg', '', '2024-02-28 07:29:00', '2019-01-29 14:47:24'),
(4, '4.jpg', '', '2024-02-28 07:29:00', '2019-01-29 13:56:10'),
(5, '5.jpg', '', '2024-02-28 07:29:00', '2019-01-29 14:29:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan_pegawai`
--

CREATE TABLE `jabatan_pegawai` (
  `id_jabatan_pegawai` int(11) NOT NULL,
  `nama_jabatan_pegawai` varchar(100) DEFAULT NULL,
  `no_urut_jabatan_pegawai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jabatan_pegawai`
--

INSERT INTO `jabatan_pegawai` (`id_jabatan_pegawai`, `nama_jabatan_pegawai`, `no_urut_jabatan_pegawai`) VALUES
(1, 'Kepala Badan', 1),
(2, 'Sekretaris Badan', 2),
(3, 'Kepala Bidang Pencegahan dan Kesiapsiagaan', 3),
(4, 'Kepala Bidang Kedaruratan, Logistik, Rehabilitasi dan Rekontruksi', 4),
(5, 'Ka. Sub Bagian Keuangan', 5),
(6, 'Sub Koor Bidang Pencegahan', 6),
(7, 'Sub Koor Kesiapsiagaan', 7),
(8, 'Sub Koor Kedaruratan', 8),
(9, 'Sub Koor Logistik, Rehabilitasi dan Rekontrusi', 9),
(10, 'Sub Bagian Kepegawaian', 10),
(18, 'Tenaga Kontrak / OS', 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id` bigint(20) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_barang`
--

INSERT INTO `kategori_barang` (`id`, `kategori`) VALUES
(1, 'Alat Mandi'),
(2, 'ATK'),
(3, 'Kebutuhan'),
(4, 'Makanan'),
(5, 'Medis'),
(6, 'Pakaian'),
(7, 'Pangan'),
(8, 'Sandang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kejadian`
--

CREATE TABLE `kejadian` (
  `id_kejadian` varchar(15) NOT NULL,
  `kejadian` varchar(256) NOT NULL,
  `tanggal` date NOT NULL,
  `sub_kejadian` varchar(256) NOT NULL,
  `deskripsi_kejadian` text NOT NULL,
  `waktu_berita` time NOT NULL,
  `waktu_tiba` time NOT NULL,
  `lokasi_kejadian` varchar(256) NOT NULL,
  `alamat_kejadian` varchar(1000) NOT NULL,
  `kecamatan_kejadian` varchar(256) NOT NULL,
  `kelurahan_kejadian` varchar(256) NOT NULL,
  `kronologi` text NOT NULL,
  `catatan_tindaklanjut` text NOT NULL,
  `petugas_lapangan` text NOT NULL,
  `jenis_objek` varchar(256) NOT NULL,
  `objek` varchar(256) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `jenis_kelamin` varchar(256) NOT NULL,
  `usia` int(3) NOT NULL,
  `status_kependudukan` varchar(256) NOT NULL,
  `alamat_ktp` varchar(1000) NOT NULL,
  `kecamatan_ktp` varchar(256) NOT NULL,
  `kelurahan_ktp` varchar(256) NOT NULL,
  `kabkota_nonsby` varchar(256) NOT NULL,
  `keterlibatan_subjek` varchar(256) NOT NULL,
  `keterangan_status` varchar(256) NOT NULL,
  `kondisi_subjek` varchar(256) NOT NULL,
  `keterangan_kondisi` varchar(1000) NOT NULL,
  `kerugian_individu` varchar(1000) NOT NULL,
  `tindak_lanjut_darurat_medis` varchar(256) NOT NULL,
  `rujukan` varchar(256) NOT NULL,
  `dokumentasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kejadian`
--

INSERT INTO `kejadian` (`id_kejadian`, `kejadian`, `tanggal`, `sub_kejadian`, `deskripsi_kejadian`, `waktu_berita`, `waktu_tiba`, `lokasi_kejadian`, `alamat_kejadian`, `kecamatan_kejadian`, `kelurahan_kejadian`, `kronologi`, `catatan_tindaklanjut`, `petugas_lapangan`, `jenis_objek`, `objek`, `nama`, `jenis_kelamin`, `usia`, `status_kependudukan`, `alamat_ktp`, `kecamatan_ktp`, `kelurahan_ktp`, `kabkota_nonsby`, `keterlibatan_subjek`, `keterangan_status`, `kondisi_subjek`, `keterangan_kondisi`, `kerugian_individu`, `tindak_lanjut_darurat_medis`, `rujukan`, `dokumentasi`) VALUES
('KJ001', 'Kebakaran', '2024-05-01', 'Rumah', 'Kebakaran di rumah warga', '14:30:00', '14:45:00', 'Jl. Merdeka No.1', 'Jl. Merdeka No.1, Kelurahan A, Kecamatan B', 'Kecamatan B', 'Kelurahan A', 'Api berasal dari korsleting listrik', 'Pemadaman oleh tim damkar', 'Budi, Andi', 'Bangunan', 'Rumah', 'Slamet', 'Laki-laki', 45, 'Penduduk Setempat', 'Jl. Merdeka No.1', 'Kecamatan B', 'Kelurahan A', 'Kab. X', 'Pemilik', 'Luka Ringan', 'Selamat', 'Tersengat listrik', 'Rp 50.000.000', 'Tidak Ada', 'Tidak Ada', 'Foto1, Foto2'),
('KJ002', 'Banjir', '2024-05-02', 'Perumahan', 'Banjir akibat hujan deras', '16:00:00', '16:30:00', 'Perumahan Citra', 'Perumahan Citra Blok D, Kelurahan C, Kecamatan D', 'Kecamatan D', 'Kelurahan C', 'Air mencapai ketinggian 1 meter', 'Evakuasi warga oleh tim SAR', 'Asep, Rudi', 'Area Perumahan', 'Perumahan', 'Ani', 'Perempuan', 38, 'Penduduk Setempat', 'Jl. Kebon Jeruk No.3', 'Kecamatan D', 'Kelurahan C', 'Kab. Y', 'Penghuni', 'Tidak Ada', 'Sehat', 'Mengungsi', 'Rp 10.000.000', 'Diberikan pertolongan pertama', 'Tidak Ada', 'Foto3'),
('KJ003', 'Kecelakaan', '2024-05-03', 'Lalu Lintas', 'Kecelakaan antara motor dan mobil', '07:15:00', '07:25:00', 'Jl. Sudirman', 'Jl. Sudirman No.5, Kelurahan E, Kecamatan F', 'Kecamatan F', 'Kelurahan E', 'Motor tertabrak dari belakang oleh mobil', 'Polisi mengatur lalu lintas', 'Agus, Dewi', 'Kendaraan', 'Motor', 'Joko', 'Laki-laki', 30, 'Penduduk Setempat', 'Jl. Sudirman No.6', 'Kecamatan F', 'Kelurahan E', 'Kab. Z', 'Pengendara', 'Luka Berat', 'Dibawa ke rumah sakit', 'Patah tulang kaki', 'Rp 5.000.000', 'Dibawa ke UGD', 'RS Harapan', 'Foto4'),
('KJ004', 'Pencurian', '2024-05-04', 'Toko', 'Pencurian di toko emas', '11:00:00', '11:15:00', 'Jl. Ahmad Yani', 'Jl. Ahmad Yani No.10, Kelurahan G, Kecamatan H', 'Kecamatan H', 'Kelurahan G', 'Pelaku memecahkan etalase toko', 'Pelaku berhasil ditangkap', 'Santoso, Beni', 'Bangunan', 'Toko Emas', 'Siti', 'Perempuan', 50, 'Penduduk Setempat', 'Jl. Ahmad Yani No.11', 'Kecamatan H', 'Kelurahan G', 'Kab. A', 'Pemilik Toko', 'Trauma', 'Selamat', 'Shock', 'Rp 100.000.000', 'Tidak Ada', 'Polsek Setempat', 'Foto5'),
('KJ005', 'Gempa', '2024-05-05', 'Bangunan', 'Gempa bumi mengakibatkan kerusakan bangunan', '08:30:00', '08:40:00', 'Jl. Mangga', 'Jl. Mangga No.20, Kelurahan I, Kecamatan J', 'Kecamatan J', 'Kelurahan I', 'Bangunan runtuh akibat gempa', 'Tim SAR melakukan evakuasi', 'Bayu, Citra', 'Bangunan', 'Ruko', 'Tono', 'Laki-laki', 60, 'Penduduk Setempat', 'Jl. Mangga No.21', 'Kecamatan J', 'Kelurahan I', 'Kab. B', 'Pemilik Ruko', 'Meninggal', 'Tertimpa reruntuhan', 'Cedera berat kepala', 'Rp 200.000.000', 'Tidak Ada', 'Tidak Ada', 'Foto6, Foto7'),
('KJ006', 'Kebakaran', '2024-05-06', 'Pasar', 'Kebakaran di pasar tradisional', '03:00:00', '03:20:00', 'Pasar Induk', 'Pasar Induk Blok A, Kelurahan K, Kecamatan L', 'Kecamatan L', 'Kelurahan K', 'Diduga akibat arus pendek', 'Pemadaman oleh tim damkar', 'Tina, Ronny', 'Bangunan', 'Pasar', 'Eko', 'Laki-laki', 55, 'Penduduk Setempat', 'Jl. Merpati No.2', 'Kecamatan L', 'Kelurahan K', 'Kab. C', 'Pedagang', 'Tidak Ada', 'Sehat', 'Mengungsi', 'Rp 75.000.000', 'Tidak Ada', 'Tidak Ada', 'Foto8'),
('KJ007', 'Banjir', '2024-05-07', 'Jalan Raya', 'Banjir mengakibatkan macet total', '18:45:00', '19:00:00', 'Jl. Pemuda', 'Jl. Pemuda No.15, Kelurahan M, Kecamatan N', 'Kecamatan N', 'Kelurahan M', 'Air menggenangi jalan hingga setinggi 50 cm', 'Polisi mengatur lalu lintas', 'Sari, Doni', 'Area Publik', 'Jalan Raya', 'Linda', 'Perempuan', 28, 'Penduduk Setempat', 'Jl. Pemuda No.16', 'Kecamatan N', 'Kelurahan M', 'Kab. D', 'Pengguna Jalan', 'Tidak Ada', 'Sehat', 'Mengungsi', 'Rp 1.000.000', 'Tidak Ada', 'Tidak Ada', 'Foto9'),
('KJ008', 'Kecelakaan', '2024-05-08', 'Kereta Api', 'Tabrakan antara kereta api dan mobil', '10:30:00', '10:40:00', 'Stasiun Utama', 'Stasiun Utama, Kelurahan O, Kecamatan P', 'Kecamatan P', 'Kelurahan O', 'Mobil tertabrak kereta saat melewati perlintasan', 'Tim SAR melakukan evakuasi', 'Surya, Ilham', 'Kendaraan', 'Mobil', 'Rina', 'Perempuan', 34, 'Penduduk Setempat', 'Jl. Mawar No.4', 'Kecamatan P', 'Kelurahan O', 'Kab. E', 'Pengendara', 'Luka Berat', 'Dibawa ke rumah sakit', 'Luka dalam', 'Rp 15.000.000', 'Dibawa ke UGD', 'RS Sejahtera', 'Foto10'),
('KJ009', 'Pohon Tumbang', '2024-05-08', 'dasdas', 'dsadada', '21:01:00', '21:03:00', 'Surabaya Barat', 'asfdfasfdasdf', 'Sambikerep', 'Dukuh Sutorejo', 'dasasd', 'dada', 'BPBD Kota Surabaya; TGC Posko Selatan; Ambulance PMI', 'Bangunan ', 'rumah ', 'andara', 'L', 21, 'adasdad', 'dsa', 'Pakal', 'Dukuh Sutorejo', 'adsdasdsa', 'adsdasdsa', 'dsadsadas', 'dsaasas', 'dsadasdsa', 'dasdasdas', 'dasadsasd', 'asdadsadsads', 'default.png'),
('KJ010', 'Darurat Medis', '2024-05-25', 'Test Data ', 'Test Data ', '12:12:00', '11:01:00', 'Surabaya Barat', 'Test Data ', 'Sawahan', 'Embung Tambak', 'Test Data ', 'Test Data ', 'Test Data ', 'Test Data ', 'Test Data ', 'Test Data ', 'L', 21, 'Test Data ', 'Test Data ', 'Sawahan', 'Gayungan', 'Test Data ', 'Test Data ', 'Test Data ', 'Test Data ', 'Test Data ', 'Test Data ', 'Test Data ', 'Test Data ', 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak_opd`
--

CREATE TABLE `kontak_opd` (
  `id_kontak_opd` int(11) NOT NULL,
  `jabatan_kontak_opd` varchar(100) DEFAULT NULL,
  `nama_kontak_opd` varchar(100) DEFAULT NULL,
  `telp_kontak_opd` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kontak_opd`
--

INSERT INTO `kontak_opd` (`id_kontak_opd`, `jabatan_kontak_opd`, `nama_kontak_opd`, `telp_kontak_opd`) VALUES
(1, 'Pengadministrasi Data Penyajian dan Publikasi', 'SANUBARI BHARATA S KOM', '082132540803'),
(2, 'Pengadministrasi Data Penyajian dan Publikasi', 'TINTUS FEBRIANTO, SE', '087757588882'),
(3, 'Pengadministrasi Data Penyajian dan Publikasi', 'LUCKY CAHYO KURNIAWAN', '085157783355'),
(4, 'Pengadministrasi Data Penyajian dan Publikasi', 'MIKO PRASETYA ARIYANTO', '087881800458'),
(5, 'Pengadministrasi Data Penyajian dan Publikasi', 'MUHAMMAD AULIA RAHMANSYAH', '082221792675'),
(6, 'Pengadministrasi Kepegawaian', 'SAUSAN MUFIDAH', '08973944399'),
(7, 'Pengadministrasi Persuratan', 'INDAH KUSASIH', '08999081736'),
(8, 'Pengadministrasi Umum', 'HAMAS MAULANA', '081347111884'),
(9, 'Pengadministrasi Umum', 'NOVEL BENI ANTORO', '083873665528'),
(10, 'Pengadministrasi Umum', 'MOCH  ARIFIN', '083857454300'),
(11, 'Pengelola Data Administrasi dan Verifikasi', 'NUNGKI PERMATASARI', '081277542821'),
(12, 'Petugas Kebersihan', 'AGUS SETIONO', '081216570251'),
(13, 'Petugas Kebersihan', 'KRISTIANINGSIH', '083856336955'),
(14, 'Petugas Kebersihan', 'DONNY ONWARDONO', '083193990026'),
(15, 'Sopir VIP', 'SUSIAWAN JUNI CAHYONO', '081357812125'),
(16, 'Pengadministrasi Keuangan', 'GITA APRILYANI UTAMI', '089691398920'),
(17, 'Pengadministrasi Keuangan', 'ERFANDY HARSANTO', '089616160586'),
(18, 'Pengadministrasi Data Penyajian dan Publikasi', 'MUHAMMAD DIKI FIRMANSYAH', '085733319825'),
(19, 'Pengadministrasi Data Penyajian dan Publikasi', 'NADYA SUKMA BATUBARA', '085156544586'),
(20, 'Pengadministrasi Data Penyajian dan Publikasi', 'YUNISA PRAFITRI', '08123090586'),
(21, 'Pengadministrasi Data Penyajian dan Publikasi', 'AMANG FAQTUROCHZI', '083850002238'),
(22, 'Pengadministrasi Data Penyajian dan Publikasi', 'RIZKY AYU INDRAWATI ARIEF', '082231168722'),
(23, 'Pengadministrasi Data Penyajian dan Publikasi', 'DESI AYU WIDYA RAHMA', '082139497096'),
(24, 'Pengadministrasi Data Penyajian dan Publikasi', 'FREYA ALFREDA AGRIPINA', '085704829740'),
(25, 'Pengadministrasi Data Penyajian dan Publikasi', 'DEDY ARYA SETIAWAN', '08983895027'),
(26, 'Pengadministrasi Data Penyajian dan Publikasi', 'AUFANDY AMIR RIZKY', '081228753988'),
(27, 'Pengadministrasi Data Penyajian dan Publikasi', 'PRANOTO ALIP KHIBAR', '085819722879'),
(28, 'Pengadministrasi Data Penyajian dan Publikasi', 'NOVIAN GUSTI BANCA MURNI', '08973989284'),
(29, 'Pengadministrasi Data Penyajian dan Publikasi', 'SAMSUL ARIFIN', '0818332118'),
(30, 'Analis Bencana', 'ACHMAD CAUTSAR', '081273437894'),
(31, 'Analis Kerusakan Fisik dan Bangunan', 'MARIA ULFA RAMADHANI', '081217382612'),
(32, 'Komandan Pasukan', 'MOCHAMAD HADIWIDJAJA', '082139743702'),
(33, 'Komandan Pasukan', 'AGUS SUPRIYANTO', '085655331338'),
(34, 'Komandan Pasukan', 'AHMAD RIFAI', '08997276321'),
(35, 'Komandan Pasukan', 'ACHMAD JUNIANTO', '08,95E+11'),
(36, 'Komandan Pasukan', 'SOEKO BASUKI', '082142867777'),
(37, 'Komandan Pasukan', 'AHMAD HADI', '085649065535'),
(38, 'Komandan Pasukan', 'MOCH HAMIM', '085785623435'),
(39, 'Komandan Pasukan', 'MARANDRI ASRULZANI', '08121664630'),
(40, 'Komandan Pasukan', 'DIDIK SETIAWAN', '085784820483'),
(41, 'Komandan Pasukan', 'FARUK', '081330257330'),
(42, 'Komandan Pasukan', 'NUNGKI PAOLINA RUSDIANTI', '083830401125'),
(43, 'Komandan Pasukan', 'SUKARDJI', '085648131438'),
(44, 'Komandan Pasukan', 'ANTONIS MERET', '083830096973'),
(45, 'Komandan Pasukan', 'MOCH AMINUL HALIM', '083830291649'),
(46, 'Komandan Pasukan', 'YUNI NUR RAHMA LESTARI', '082139070115'),
(47, 'Komandan Pasukan', 'FEBRIANTO PRADANA PUTRA', '082330967026'),
(48, 'Komandan Pasukan', 'ALFREDA HENDRYELIAN SE', '085645661268'),
(49, 'Komandan Pasukan', 'SHAIFUL ARIF', '085607842928'),
(50, 'Komandan Pasukan', 'ARIS MUNANDAR', '083856801020'),
(51, 'Komandan Pasukan', 'ZAINUL ARIFIN', '081216849636'),
(52, 'Komandan Pasukan', 'NURUL ISTIQOMAH', '081808494245'),
(53, 'Komandan Pasukan', 'LILIK PUJIANTO', '081231978092'),
(54, 'Komandan Pasukan', 'TANIA AFFRIDA WIJAYANTI', '089606011313'),
(55, 'Komandan Pasukan', 'SLAMET SUTOWO', '081233907614'),
(56, 'Komandan Pasukan', 'NOVINDA RIYANTOKO', '081333396959'),
(57, 'Komandan Pasukan', 'WAHYUDI', '081357645483'),
(58, 'Komandan Pasukan', 'FAUZI EFENDI', '087843547691'),
(59, 'Komandan Pasukan', 'SYAMSUL AHMADI', '081515174963'),
(60, 'Komandan Pasukan', 'SURYO WIBOWO', '081249902939'),
(61, 'Komandan Pasukan', 'TRIYONO EFFENDI', '08,81E+11'),
(62, 'Komandan Pasukan', 'MUHAMMAD PRATAMA MULYA SUNARKO', '082141297395'),
(63, 'Komandan Pasukan', 'TITO SUMARSONO', '089524009700'),
(64, 'Komandan Pasukan', 'YUDA WIDAS PRATAMA', '087853027316'),
(65, 'Komandan Pasukan', 'TAUFIK FAQUR ROHMAN', '083856303548'),
(66, 'Komandan Pasukan', 'CHUSNUL ASHADI', '083831077049'),
(67, 'Komandan Pasukan', 'ARIPIN EFFENDI', '03134218995'),
(68, 'Komandan Pasukan', 'YUDA SETIAWAN', '08973843712'),
(69, 'Komandan Pasukan', 'AGUS SULISTYOHADI', '085732309686'),
(70, 'Komandan Pasukan', 'FAZAR QHOTIBUL UMAM', '083834258765'),
(71, 'Komandan Pasukan', 'INAN ROHADI', '089677228266'),
(72, 'Komandan Pasukan', 'BINTANG GISKA PRADANA', '08973484194'),
(73, 'Komandan Pasukan', 'RABITHA ALAM NURMANSAH', '087716870088'),
(74, 'Komandan Pasukan', 'MOCH ROMZI', '082331142475'),
(75, 'Pengadministrasi Data Penyajian dan Publikasi', 'NATASHA AMALIA', '082145007395'),
(76, 'Pengadministrasi Data Penyajian dan Publikasi', 'FIKRI ARI HADIANSYAH', '089506258579'),
(77, 'Pengadministrasi Data Penyajian dan Publikasi', 'KURNIA MAHARANI PUTRI', '08981577636'),
(78, 'Pengadministrasi Kepegawaian', 'ULFIYATI RODIYAH', '081234096253'),
(79, 'Pengadministrasi Kepegawaian', 'IRMA DWI ANGGRAINI', '085604816400'),
(80, 'Pengadministrasi Pengaduan Publik', 'YUSI DWI LAKSMINI', '087840181230'),
(81, 'Pengadministrasi Pengaduan Publik', 'NOVIAR ARI AHMAD BASUNI', '085745112514'),
(82, 'Pengadministrasi Pengaduan Publik', 'NOVI ALVIANI', '081553522095'),
(83, 'Pengadministrasi Pengaduan Publik', 'WAHYUDIN', '081217375652'),
(84, 'Pengadministrasi Pengaduan Publik', 'MOCHAMAD BARQY BAYU PRISTIAN', '081958472371'),
(85, 'Pengadministrasi Pengaduan Publik', 'BRENDA OLGA REFTA', '089528110218'),
(86, 'Pengadministrasi Pengaduan Publik', 'INTAN WAHYU RAHASTIN', '085708393878'),
(87, 'Pengadministrasi Pengaduan Publik', 'THIO ANDIKA PRATAMA', '081234463776'),
(88, 'Pengadministrasi Pengaduan Publik', 'DEWI SUHARTATIK', '08113020209'),
(89, 'Pengadministrasi Pengaduan Publik', 'EFENDI GUNAWAN', '08,95E+11'),
(90, 'Pengadministrasi Pengaduan Publik', 'APRILIA SRI KARINA SARI', '082165446892'),
(91, 'Pengadministrasi Umum', 'AGUNG SETYABUDI', '082259248718'),
(92, 'Pengadministrasi Umum', 'HARI SISWANTO', '082234580328'),
(93, 'Pengadministrasi Umum', 'WIWIT TRIYANI', '08992512007'),
(94, 'Pengadministrasi Umum', 'EKA NOERMAN PRAMUDITA', '081257585551'),
(95, 'Pengadministrasi Umum', 'AGUS ANTA MUZAKKI', '081234967819'),
(96, 'Pengelola Laporan dan Evaluasi Pelaksanaan Bantuan Bencana', 'DWI INDAH NURUL AULIA, A Md', '085648583898'),
(97, 'Pengelola Laporan dan Evaluasi Pelaksanaan Bantuan Bencana', 'AWANG DHANI SARIFUDDIN', '089649510028'),
(98, 'Penyusun Program Perencanaan Operasi', 'MOCHAMAD CHAIRUL TAKWOLO', '085732020636'),
(99, 'Penyusun Program Perencanaan Operasi', 'EKO SUPRIYANTO', '08113162727'),
(100, 'Penyusun Program Perencanaan Operasi', 'ZAM ZAM AULIYA AKHMAD', '081230260007'),
(101, 'Satgas Kebencanaan', 'M  HATEM', '0'),
(102, 'Satgas Kebencanaan', 'NURUL HIDAYATI', '083857004403'),
(103, 'Satgas Kebencanaan', 'FATUR ROZIKIN', '081332279289'),
(104, 'Satgas Kebencanaan', 'SYAFRI DEO NUR BUDI ARIFIN', '085203020344'),
(105, 'Satgas Kebencanaan', 'TAUFIK AJI SAPUTRA', '083854795945'),
(106, 'Satgas Kebencanaan', 'MUHAMMAD YUSUF RIZKY RAMADANI', '08819480930'),
(107, 'Satgas Kebencanaan', 'USTADI', '081357148245'),
(108, 'Satgas Kebencanaan', 'IFA MARIATI SHOLIKAH', '082111951577'),
(109, 'Satgas Kebencanaan', 'TEGUH RANU SAPUTRO', '085815789225'),
(110, 'Satgas Kebencanaan', 'YULES IVAN WAHYU ADINATA', '089658951015'),
(111, 'Satgas Kebencanaan', 'HAMID JUNAIDI', '08,95E+11'),
(112, 'Satgas Kebencanaan', 'RIFQI SYAHPUTRA JUNAIDI', '089697328240'),
(113, 'Satgas Kebencanaan', 'MUSTIKA', '087794182583'),
(114, 'Satgas Kebencanaan', 'EDI PRIYONO', '081231161494'),
(115, 'Satgas Kebencanaan', 'ACHMAD FATKHUR ROBBANI', '089687024287'),
(116, 'Satgas Kebencanaan', 'BAGUS SAPUTRO', '083849414167'),
(117, 'Satgas Kebencanaan', 'DIKI HARI JATMIKO', '081917529264'),
(118, 'Satgas Kebencanaan', 'AKBAR MUSA JIHAD', '081333542118'),
(119, 'Satgas Kebencanaan', 'FADJAR RIZKI PANGESTU', '08,95E+11'),
(120, 'Satgas Kebencanaan', 'FEBRI IBNU GRAHA', '081328589869'),
(121, 'Satgas Kebencanaan', 'ERLAN DWI FIRMANSYAH', '08,81E+11'),
(122, 'Satgas Kebencanaan', 'GEOFANY ADE PRATAMA', '085730284103'),
(123, 'Satgas Kebencanaan', 'FENDY SUDIRMAWAN', '081348327171'),
(124, 'Satgas Kebencanaan', 'AHMAD FAHMI ZAMZAMI', '083111120680'),
(125, 'Satgas Kebencanaan', 'FERY MAULANA', '082228742339'),
(126, 'Satgas Kebencanaan', 'DODIT BAGASKARA', '08,81E+11'),
(127, 'Satgas Kebencanaan', 'ADI SUTOKO', '085730725443'),
(128, 'Satgas Kebencanaan', 'NOVEL AFIYATAN AL HARTI', '082221000955'),
(129, 'Satgas Kebencanaan', 'LUKMAN HAKIM', '088230491578'),
(130, 'Satgas Kebencanaan', 'MOCH ARIF RAHMAN', '081216866056'),
(131, 'Satgas Kebencanaan', 'RIZQI FIRMANSYAH', '08,95E+11'),
(132, 'Satgas Kebencanaan', 'EDY CAHYONO, S S', '085648584211'),
(133, 'Satgas Kebencanaan', 'NURARENDRA BRAMASTASANUBARI', '089699550483'),
(134, 'Satgas Kebencanaan', 'Moch  Ulil Azmi Jauhari', '087817985013'),
(135, 'Satgas Kebencanaan', 'SULAKSONO HADI', '085732389243'),
(136, 'Satgas Kebencanaan', 'JONATHAN MARKUS SEA', '082333571681'),
(137, 'Satgas Kebencanaan', 'ADELLIA NEVY TAMALA', '082126666200'),
(138, 'Satgas Kebencanaan', 'ALIF BAHARUDIN', '087756618725'),
(139, 'Satgas Kebencanaan', 'MOCHAMMAD TOHIR', '083830298516'),
(140, 'Satgas Kebencanaan', 'MUHAMMAD ARDIANSYAH PUTRA PANJAITAN', '085158077112'),
(141, 'Satgas Kebencanaan', 'BENY ABDUL RHOMAN', '081229859005'),
(142, 'Satgas Kebencanaan', 'NISA NOR KHOLIFAH', '085745488436'),
(143, 'Satgas Kebencanaan', 'DANI DWI PURWANTO', '085655953074'),
(144, 'Satgas Kebencanaan', 'RENI APRILIA NISMAYA', '085718561746'),
(145, 'Satgas Kebencanaan', 'I KOMANG BRAHMUDITHA WISNU NUGRAHA', '081252832161'),
(146, 'Satgas Kebencanaan', 'ACHMAD MULIA', '08,96E+11'),
(147, 'Satgas Kebencanaan', 'M  SYAFII', '08,81E+11'),
(148, 'Satgas Kebencanaan', 'ANDIKA FERDIAN', '087861420620'),
(149, 'Satgas Kebencanaan', 'RIYO LIAN NUGROHO', '08,16E+11'),
(150, 'Satgas Kebencanaan', 'MOCH FADIL RIFKIAN', '085731017994'),
(151, 'Satgas Kebencanaan', 'ALRISAH SANG AZIZAT', '087803107740'),
(152, 'Satgas Kebencanaan', 'ANIL BACHTIAR ALAM', '085755904796'),
(153, 'Satgas Kebencanaan', 'DYMAS APRIAMUDATAMA', '08,95E+11'),
(154, 'Satgas Kebencanaan', 'MOCHAMAT SHOLEKUDIN', '085730139223'),
(155, 'Satgas Kebencanaan', 'HERI SISWAHYULIANTO', '081331022278'),
(156, 'Satgas Kebencanaan', 'HADHI RAHMAT ROMADHON', '08,82E+11'),
(157, 'Satgas Kebencanaan', 'WAHYU DWI SANTOSO', '081226233717'),
(158, 'Satgas Kebencanaan', 'SAIFUL AKBAR', '08,95E+11'),
(159, 'Satgas Kebencanaan', 'DHENOK ANITA CHRISTY,SH', '081230171727'),
(160, 'Satgas Kebencanaan', 'ROBY RIZANI', '089698937549'),
(161, 'Satgas Kebencanaan', 'ALI HUROSIM', '083856737191'),
(162, 'Satgas Kebencanaan', 'DESI ERIKA NATALIA', '08998781228'),
(163, 'Satgas Kebencanaan', 'PEBRIANTO', '08,95E+11'),
(164, 'Satgas Kebencanaan', 'DEDY WAHYU PAMUJI', '085655231522'),
(165, 'Satgas Kebencanaan', 'AHMAD RIZALDI SAPUTRA', '083854107701'),
(166, 'Satgas Kebencanaan', 'MUHAMMAD NABIL', '082244638177'),
(167, 'Satgas Kebencanaan', 'AINUN MUJIBUR ROHMAN', '081230774165'),
(168, 'Satgas Kebencanaan', 'MUHAMMAD LUTHFI', '083830230089'),
(169, 'Satgas Kebencanaan', 'DIMAS DICKY SAPUTRA', '081390604507'),
(170, 'Satgas Kebencanaan', 'RONY DHARMAWAN ARIFIN', '082338393933'),
(171, 'Satgas Kebencanaan', 'HANIFAH DEWI MUSTIKA', '08,81E+11'),
(172, 'Satgas Kebencanaan', 'ARIF RACHMAN HAKIM', '08,82E+11'),
(173, 'Satgas Kebencanaan', 'ARGA YONGKI ANDARESTU', '081230532416'),
(174, 'Satgas Kebencanaan', 'LUTVY PRATAMA', '08,95E+11'),
(175, 'Satgas Kebencanaan', 'MOCHAMAD CHOIRON', '085749436890'),
(176, 'Satgas Kebencanaan', 'LUKITO ADHI', '08993539142'),
(177, 'Satgas Kebencanaan', 'DIKKY PUTRA PRADANA', '08976453024'),
(178, 'Satgas Kebencanaan', 'MUHAMAD NUR', '03199248500'),
(179, 'Satgas Kebencanaan', 'ARGA SUMARNO', '085815262512'),
(180, 'Satgas Kebencanaan', 'MATIUS FANDHI SETYONO', '087851194821'),
(181, 'Satgas Kebencanaan', 'WAHYU RIZKY HIDAYAH', '083856878358'),
(182, 'Satgas Kebencanaan', 'DEDDY BAYU SETIYAWAN', '08,78E+11'),
(183, 'Satgas Kebencanaan', 'TRI WAHYUNINGSIH', '083857188869'),
(184, 'Satgas Kebencanaan', 'SULAIMAN', '085606013067'),
(185, 'Satgas Kebencanaan', 'ONGKI NURUL EFENDI', '085606000835'),
(186, 'Satgas Kebencanaan', 'ROBBI AFDI PRANATA', '085731144643'),
(187, 'Satgas Kebencanaan', 'SUPRIYANTO', '081230619688'),
(188, 'Satgas Kebencanaan', 'MUHAMAD FAJAR FITRIANTO', '088231579419'),
(189, 'Satgas Kebencanaan', 'MOH KHAFID HIDAYATULLAH', '082132382368'),
(190, 'Satgas Kebencanaan', 'ACHMAD RIZAL FATAHILLAH', '088235534484'),
(191, 'Satgas Kebencanaan', 'ACH  FAISOL', '082228886100'),
(192, 'Satgas Kebencanaan', 'SYAMSUL ARIFIN', '081946791692'),
(193, 'Satgas Kebencanaan', 'MOCHAMAD KURNIAWAN', '085706873950'),
(194, 'Satgas Kebencanaan', 'ANGGONO PUTRA', '081259100140'),
(195, 'Satgas Kebencanaan', 'TEDDY FAJAR NOVIANTO', '085335398624'),
(196, 'Satgas Kebencanaan', 'ARDIAN PUTRA PRATAMA', '08,95E+11'),
(197, 'Satgas Kebencanaan', 'KRISNA ARISTIAWAN', '082336955460'),
(198, 'Satgas Kebencanaan', 'ROI', '081296775327'),
(199, 'Satgas Kebencanaan', 'MARLITA', '081325543955'),
(200, 'Satgas Kebencanaan', 'AHMAD FARID', '085367777172'),
(201, 'Satgas Kebencanaan', 'SANDI RAMA PERMANA', '085646236509'),
(202, 'Satgas Kebencanaan', 'ANGGA FEBRI PRASTIAWAN', '083831494773'),
(203, 'Satgas Kebencanaan', 'ACHMAD SURYA ABRIYANTO', '082142906774'),
(204, 'Satgas Kebencanaan', 'ACHMAD ALI MUDZAKIR MARUF', '088228553501'),
(205, 'Satgas Kebencanaan', 'YOYOK AKBAR ALI HAMZAH', '081999976521'),
(206, 'Satgas Kebencanaan', 'RICHY CHRISTIAN SAPUTRA', '087730168635'),
(207, 'Satgas Kebencanaan', 'MOCHAMAD HUSEIN', '082282998864'),
(208, 'Satgas Kebencanaan', 'KURNIAWAN S Sos', '085749714176'),
(209, 'Satgas Kebencanaan', 'LISA YOLANDA', '085608399451'),
(210, 'Satgas Kebencanaan', 'ANDY SETYA PRADANA', '085791251604'),
(211, 'Satgas Kebencanaan', 'AHMAD BUSTOMI', '083825509828'),
(212, 'Satgas Kebencanaan', 'SYAIFUDIN', '08,96E+11'),
(213, 'Satgas Kebencanaan', 'TIARA YUFFITA SARI', '082230462272'),
(214, 'Satgas Kebencanaan', 'RIZQI SULAIMAN', '089687527278'),
(215, 'Satgas Kebencanaan', 'ABDUL KAFI', '082335748866'),
(216, 'Satgas Kebencanaan', 'SAIFUL HIDAYAT', '089612503755'),
(217, 'Satgas Kebencanaan', 'DONI ADITYA UTAMA', '08,95E+11'),
(218, 'Satgas Kebencanaan', 'ADETIA PRASETYO', '081232647380'),
(219, 'Satgas Kebencanaan', 'FERI AGUSTIN KURNIAWAN', '089699773705'),
(220, 'Satgas Kebencanaan', 'HUSNI RIZQI PRATAMA', '082146068677'),
(221, 'Satgas Kebencanaan', 'PANCA ALIMMAHMUDA', '08,95E+11'),
(222, 'Satgas Kebencanaan', 'INTAN ANDINI', '08,95E+11'),
(223, 'Satgas Kebencanaan', 'IRWAN EFENDI', '085954732143'),
(224, 'Satgas Kebencanaan', 'MOCHAMAD ILHAM', '083856301438'),
(225, 'Satgas Kebencanaan', 'FAHMI KRISTANTO', '089661184321'),
(226, 'Satgas Kebencanaan', 'AKBAR FIRDAUS MUZAKKI', '085232921137'),
(227, 'Satgas Kebencanaan', 'M GUNTUR NAJIB AL JABAR', '085784390890'),
(228, 'Satgas Kebencanaan', 'LUKMAN HAKIM', '08816395098'),
(229, 'Satgas Kebencanaan', 'EKO DARMAWAN', '081358222773'),
(230, 'Satgas Kebencanaan', 'FIRGA AMALIAN', '081393333484'),
(231, 'Satgas Kebencanaan', 'ARGA PUJANGGA HARJUNTA SAB', '083849686257'),
(232, 'Satgas Kebencanaan', 'MAULANA ANDITAYATNA', '08,95E+11'),
(233, 'Satgas Kebencanaan', 'DINDA RADIKA DEWI', '0‪088996817604‬'),
(234, 'Satgas Kebencanaan', 'EKA DICKY ALVIANDI', '085172101075'),
(235, 'Satgas Kebencanaan', 'TIVAN RAKASIWI', '082264017873'),
(236, 'Satgas Kebencanaan', 'MOCH  BASTOMI', '08,95E+11'),
(237, 'Satgas Kebencanaan', 'YOGA PRATAMA', '081331735058'),
(238, 'Satgas Kebencanaan', 'IFAN FAUZI', '089663821472'),
(239, 'Satgas Kebencanaan', 'MUHAMMAD ANDI BIANTORO', '087817630784'),
(240, 'Satgas Kebencanaan', 'HAGI EKA SETYO', '089612804804'),
(241, 'Satgas Kebencanaan', 'MAHMUDAH,SE', '082142413456'),
(242, 'Satgas Kebencanaan', 'SULAIMAN AFFANDY', '081330630061'),
(243, 'Satgas Kebencanaan', 'HANAFI', '08981557008'),
(244, 'Satgas Kebencanaan', 'AHMAD SETYAWAN', '08,95E+11'),
(245, 'Satgas Kebencanaan', 'ADI SUSILO', '081285961987'),
(246, 'Satgas Kebencanaan', 'BRIAN DELTAMA FANI', '088289177285'),
(247, 'Satgas Kebencanaan', 'JOKO PRASETYO', '089612169148'),
(248, 'Satgas Kebencanaan', 'ARIS SETIAWAN', '089694990891'),
(249, 'Satgas Kebencanaan', 'SLAMET MUSTOFA', '087759188013'),
(250, 'Satgas Kebencanaan', 'ABU BAKAR', '085233680422'),
(251, 'Satgas Kebencanaan', 'MOH MUAZAM', '081703711833'),
(252, 'Satgas Kebencanaan', 'BUHUR FAWAID', '085954421561'),
(253, 'Satgas Kebencanaan', 'BUDI SUYITNO', '081913525933'),
(254, 'Satgas Kebencanaan', 'M IDHAM ZAMRONI', '083830484850'),
(255, 'Satgas Kebencanaan', 'SUTRISNO', '081287545982'),
(256, 'Satgas Kebencanaan', 'MONTHERADO ANDHI WIJAYA', '082335534199'),
(257, 'Satgas Kebencanaan', 'WAHYU PERMANA PUTRA', '081231555128'),
(258, 'Satgas Kebencanaan', 'RM NUR DONI SETIYAWAN', '08,95E+11'),
(259, 'Satgas Kebencanaan', 'ANDINI MELATI PUTRI', '08,81E+11'),
(260, 'Satgas Kebencanaan', 'TITA KUSUMA ARFINE', '083830666227'),
(261, 'Satgas Kebencanaan', 'MOCHAMMAD QIDIR UTOMO', '082139121081'),
(262, 'Satgas Kebencanaan', 'BUYUNG FIRMANSYAH', '082145447631'),
(263, 'Satgas Kebencanaan', 'SUWANDI', '0818598656'),
(264, 'Satgas Kebencanaan', 'DIMAS SURYA SATLY SAGA', '085203556440'),
(265, 'Satgas Kebencanaan', 'MOCHAMMAD ROZIKIN', '085234028537'),
(266, 'Satgas Kebencanaan', 'BAGUS APRILIO', '082235150009'),
(267, 'Satgas Kebencanaan', 'MADA ASPIRANSA', '08,96E+11'),
(268, 'Satgas Kebencanaan', 'M  HOLIK', '087766524233'),
(269, 'Satgas Kebencanaan', 'FERRY IRAWAN', '085655833713'),
(270, 'Satgas Kebencanaan', 'RIZAL ADITYA SETIAWAN', '089507319580'),
(271, 'Satgas Kebencanaan', 'MOCHAMMAD BAGUS DWI PRASETYO', '087883800307'),
(272, 'Satgas Kebencanaan', 'HERLAMBANG', '082257144083'),
(273, 'Satgas Kebencanaan', 'SAIFUL HUZEN', '081515475864'),
(274, 'Satgas Kebencanaan', 'LUTFINDRA FAJAR ARIS SETIAWAN', '081231451550'),
(275, 'Satgas Kebencanaan', 'YUSRIL ACHWAN SAPUTRO', '081918256016'),
(276, 'Satgas Kebencanaan', 'ANGGA DENFAUZI', '089530389086'),
(277, 'Satgas Kebencanaan', 'TRIBUANA TUNGGAL DEWI RACHMAN', '08998906108'),
(278, 'Satgas Kebencanaan', 'SAIFUDDIN PASHA', '081515942896'),
(279, 'Satgas Kebencanaan', 'YUNUS TRI PUTRA ASMORO', '085931370649'),
(280, 'Satgas Kebencanaan', 'MOCH  NIZAR OKTAFIAN', '085784829146'),
(281, 'Satgas Kebencanaan', 'ABDUL GHOFAR', '087765444476'),
(282, 'Satgas Kebencanaan', 'AGUS NUR DIANSYAH', '081333753780'),
(283, 'Satgas Kebencanaan', 'VITRA ADI PRATAMA SE', '085755498171'),
(284, 'Satgas Kebencanaan', 'REYMOONDA ANANDA MUSTAPA', '083856628945'),
(285, 'Satgas Kebencanaan', 'ACHMAD FAISOL', '08,95E+11'),
(286, 'Satgas Kebencanaan', 'FIRGA ROMANSYAH', '083176005600'),
(287, 'Satgas Kebencanaan', 'MOCH  ROZI', '081252171515'),
(288, 'Satgas Kebencanaan', 'MOHAMMAD ERLANGGA', '088996874058'),
(289, 'Satgas Kebencanaan', 'MIFTAKHUL QULUB', '08,81E+11'),
(290, 'Satgas Kebencanaan', 'AGUNG WIDO SUHARTO', '087854845404'),
(291, 'Satgas Kebencanaan', 'LUCKY JOKO PURWANTORO', '085733426272'),
(292, 'Satgas Kebencanaan', 'RIZKY NUR PRATAMA', '085755003104'),
(293, 'Satgas Kebencanaan', 'MUCH  ALWI NOVA ARDIANSYAH', '08,95E+11'),
(294, 'Satgas Kebencanaan', 'RYAN ALIFIANSYAH SULISTYO', '089617350102'),
(295, 'Satgas Kebencanaan', 'SAFAATULLAH AQDHOM', '08,81E+11'),
(296, 'Satgas Kebencanaan', 'DONI SLAMET MUJIARTO', '085100567816'),
(297, 'Satgas Kebencanaan', 'RADITYA IKSAN PRADANA', '082257798615'),
(298, 'Satgas Kebencanaan', 'ADITYA DWI CHANDRA', '082139823426'),
(299, 'Satgas Kebencanaan', 'MUHAMMAD AYUB ASMARA FADILLAH', '081909108386'),
(300, 'Satgas Kebencanaan', 'AHMAD JUNAIDI', '083119784223'),
(301, 'Satgas Kebencanaan', 'HERLINA NOVITASARI', '087850410041'),
(302, 'Satgas Kebencanaan', 'ILFAL DANI ESTU', '082146200065'),
(303, 'Satgas Kebencanaan', 'NIKITA SAID', '089685669773'),
(304, 'Satgas Kebencanaan', 'ALFATH DWIANGGA', '087797513923'),
(305, 'Satgas Kebencanaan', 'AGUNG WIRANATA', '08998017020'),
(306, 'Satgas Kebencanaan', 'HERU NUGROHO', '08,95E+11'),
(307, 'Satgas Kebencanaan', 'RISAL ANDIKA', '085259684736'),
(308, 'Satgas Kebencanaan', 'ACHMAD RIDWAN KUSUMO  P', '081217430361'),
(309, 'Satgas Kebencanaan', 'HENDRO', '081259465700'),
(310, 'Satgas Kebencanaan', 'PUTRI HARUM MEILINA', '087765953766'),
(311, 'Satgas Kebencanaan', 'SYAIFUDIN WASIK, ST ', '085784545500'),
(312, 'Satgas Kebencanaan', 'AIR BUDIONO', '085731018761'),
(313, 'Satgas Kebencanaan', 'MUHAMAD IHZA NURALIM', '085328917007'),
(314, 'Satgas Kebencanaan', 'ROHMAN FERDIANSYAH', '081358468136'),
(315, 'Satgas Kebencanaan', 'DINO SANTOSO WAHYUDINATA', '089616636810'),
(316, 'Satgas Kebencanaan', 'AGUS SUCIPTO', '085732236004'),
(317, 'Satgas Kebencanaan', 'MUHAMMAD AFANDHI', '083830531592'),
(318, 'Satgas Kebencanaan', 'MOCH  MUSA', '085859187636'),
(319, 'Satgas Kebencanaan', 'RONY KURNIAWAN, SH', '082245652112'),
(320, 'Satgas Kebencanaan', 'MUCHAMAD ZAINAL ABIDIN', '085715543511'),
(321, 'Satgas Kebencanaan', 'FADINAL AINUROZY', '089683661277'),
(322, 'Satgas Kebencanaan', 'PUTRA EKO BAGUS PRASETYO', '081232395990'),
(323, 'Satgas Kebencanaan', 'FEBRIANTI RAMADHANI', '089507967999'),
(324, 'Satgas Kebencanaan', 'BAYU EKO PRASETIANTO', '081336121502'),
(325, 'Satgas Kebencanaan', 'RISALDA AYU SAVIRA', '08973124806'),
(326, 'Satgas Kebencanaan', 'GESANG ARYA WIBOWO', '089675935121'),
(327, 'Satgas Kebencanaan', 'Vira Anggraeny Febriani', '081703537331'),
(328, 'Satgas Kebencanaan', 'SUHARTATIK', '089678581245'),
(329, 'Satgas Kebencanaan', 'JULIO ADE MAULANA', '085725544487'),
(330, 'Satgas Kebencanaan', 'YULI PRASETYO ADJI', '081234344470'),
(331, 'Satgas Kebencanaan', 'FIRDIAN ALIANSYAH', '089525346444'),
(332, 'Satgas Kebencanaan', 'YUSTIANTO BASUKI', '087818203098'),
(333, 'Satgas Kebencanaan', 'MOCH HAMDANI ASIAH CHOLIL', '08,96E+11'),
(334, 'Satgas Kebencanaan', 'MUHAMMAD FAQIH FIRDAUS', '089525369987'),
(335, 'Satgas Kebencanaan', 'TEDY SAPUTRA', '08,95E+11'),
(336, 'Satgas Kebencanaan', 'EKO AGUS SURYONO', '085645048516'),
(337, 'Satgas Kebencanaan', 'SEPTYAN SAMUDRA PUTRA', '083830142971'),
(338, 'Satgas Kebencanaan', 'ILHAM ADIWIJAYA', '081231671561'),
(339, 'Satgas Kebencanaan', 'DODI NOVIYANTO PRATOMO', '083119070780'),
(340, 'Satgas Kebencanaan', 'DELA PUSVITA SARI', '081336204531'),
(341, 'Satgas Kebencanaan', 'DWI SEFTIYANI PUTRI', '083857833900'),
(342, 'Satgas Kebencanaan', 'MAS KULTHUM ABIBULLAH', '087814978573'),
(343, 'Satgas Kebencanaan', 'BAGUS KRISNA FIBRIANTO', '08888'),
(344, 'Satgas Kebencanaan', 'HANINDITO UTOMO', '081944946969'),
(345, 'Satgas Kebencanaan', 'CORIF', '081556751937'),
(346, 'Satgas Kebencanaan', 'ALVIYAN ALIMUDDIN ZUHRI', '085755359896'),
(347, 'Satgas Kebencanaan', 'HANDRY MELVIAN TEGUH MAHENDRA', '085813351290'),
(348, 'Satgas Kebencanaan', 'MOCH ILHAM MALIK', '085646816920'),
(349, 'Satgas Kebencanaan', 'MUHAMMAD MU`TASIM BILLAH', '088226277695'),
(350, 'Satgas Kebencanaan', 'RICO ILHAM RYAN HERNANDA', '081998344435'),
(351, 'Satgas Kebencanaan', 'VIRGINA ISABELLA SUBAGIO', '0‪081358468130‬'),
(352, 'Satgas Kebencanaan', 'ANDIK PURWANTO', '082233654511'),
(353, 'Satgas Kebencanaan', 'CHRISTARDA NUGRAHA EONARD JOHAN', '08,95E+11'),
(354, 'Satgas Kebencanaan', 'RESTU PUTRA ANANDA', '082213118022'),
(355, 'Satgas Kebencanaan', 'KURNIA FANDY ACHMAD SHOLIKAN', '081230705068'),
(356, 'Satgas Kebencanaan', 'DIMAS RADEN TRIWAHYU SATRIA', '089685549111'),
(357, 'Satgas Kebencanaan', 'HARIYANTO', '081515484544'),
(358, 'Satgas Kebencanaan', 'BENNY OKTO FANDI', '085732008200'),
(359, 'Satgas Kebencanaan', 'AKHMAD ANSORI', '08,59E+11'),
(360, 'Satgas Kebencanaan', 'ACHMAD BAHRUDIN', '085707660405'),
(361, 'Satgas Kebencanaan', 'ANGGA PUTRA HIDAYAT', '081336506390'),
(362, 'Satgas Kebencanaan', 'AHMAD YAZID RYAN SAPUTRA', '089617985588'),
(363, 'Satgas Kebencanaan', 'M  ARIF RISKI RIZALDI', '081932135018'),
(364, 'Satgas Kebencanaan', 'AJI PUTRA MARANDITA', '08,97E+11'),
(365, 'Satgas Kebencanaan', 'ARDHANA KUSUMA PUTRA', '08,81E+11'),
(366, 'Satgas Kebencanaan', 'HADI PURNOMO', '08819324585'),
(367, 'Satgas Kebencanaan', 'M  MUCKLIS S  ABIDIN', '082132657187'),
(368, 'Satgas Kebencanaan', 'BAGAS MAULANA RAFSANJANI', '082146428263'),
(369, 'Satgas Kebencanaan', 'GUNTUR AJI WICAKSONO', '085748209043'),
(370, 'Satgas Kebencanaan', 'ERIKA ANDHINI PUTRI', '082233529959'),
(371, 'Satgas Kebencanaan', 'NOVALDI LUCKY PRATAMA', '08973417844'),
(372, 'Satgas Kebencanaan', 'OKTANIO FERRYL YUDHISTIRA', '081335160936'),
(373, 'Satgas Kebencanaan', 'FEBRY KAMISA SARI', '081233378321'),
(374, 'Satgas Kebencanaan', 'DIMAS PUTRA ASMANDIKA DAMAYANTO', '082188590925'),
(375, 'Satgas Kebencanaan', 'RIZKI FIRMANTO', '087849071611'),
(376, 'Satgas Kebencanaan', 'USWATUN KHASANAH', '081331525727'),
(377, 'Satgas Kebencanaan', 'AINUL QURANIN NAFISAH', '081234624656'),
(378, 'Sopir', 'IMAM SUBARKAH ROMADHONI', '08,95E+11'),
(379, 'Sopir', 'ABD MACHFUD', '083830599483'),
(380, 'Sopir', 'MOCHAMAD SUWADJI', '082244483607'),
(381, 'Sopir', 'MUZAKKI', '085733503080'),
(382, 'Sopir', 'WANDIH', '081330663001'),
(383, 'Sopir', 'ANGGA MEI CAHYA PERMANA', '087751105050'),
(384, 'Sopir', 'DANA YASA JATI DIRI', '085784197010'),
(385, 'Sopir', 'ARI DWI SETIO', '087852838963'),
(386, 'Sopir', 'TEGUH PRASETYO', '081703744378'),
(387, 'Sopir', 'ACHMAD HATTA NURUDIN', '085730031345'),
(388, 'Sopir', 'MOCHAMMAD ZULHILMI ABADI', '081252546160'),
(389, 'Sopir', 'AGUS SUTJIPTO', '081703340740'),
(390, 'Sopir', 'HARIS ABDUL RACHMAN', '081276434748'),
(391, 'Sopir', 'ERIK YULIUSTIONO,SE', '081234937182'),
(392, 'Sopir', 'AGUS MINARNO', '085645553651'),
(393, 'Sopir', 'DIYANTO', '085257685113'),
(394, 'Sopir', 'SURYADI', '081329347771'),
(395, 'Sopir', 'BAGUS BAYU SEPTYOADI', '081326200517'),
(396, 'Sopir', 'ARIS HANJALI', '081217266454'),
(397, 'Sopir', 'SYAMSUL ARIF', '082237871409'),
(398, 'Sopir', 'SUWITO', '085732520084'),
(399, 'Sopir', 'NONOK PRAMBODO', '085785858886'),
(400, 'Sopir', 'YOGA LUDRA WIYASA', '089681142102'),
(401, 'Sopir', 'GUSTI NUGRAHA WAHDANY', '087864396280'),
(402, 'Sopir', 'LUDY FERDIAN', '081235578965'),
(403, 'Sopir', 'MASRUCHAN', '082244033406'),
(404, 'Sopir', 'ACHMAD NUR SALAM', '085100407708'),
(405, 'Sopir', 'DIDIT KUSWANTO', '081331881120'),
(406, 'Sopir', 'MOCH IFAN MA`RUF', '082131973811'),
(407, 'Sopir', 'HENCHY Y H WOPARI, S T ', '085244787709'),
(408, 'Sopir', 'MOCH SIFAK ELBY', '081227851442'),
(409, 'Sopir', 'RAHADYAN YUNAN', '083856141005'),
(410, 'Sopir', 'DANIEL KISLEW HARDICAHYA', '082229291977'),
(411, 'Sopir', 'EKO SUKWANDARI HARIYANTO', '082336107445'),
(412, 'Sopir', 'AINUR SAHRUL', '083800345255');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi_pos`
--

CREATE TABLE `lokasi_pos` (
  `id_lokasi_pos` int(11) NOT NULL,
  `nama_lokasi_pos` varchar(100) DEFAULT NULL,
  `lat_lokasi_pos` text DEFAULT NULL,
  `lon_lokasi_pos` text DEFAULT NULL,
  `kec_lokasi_pos` varchar(100) DEFAULT NULL,
  `kel_lokasi_pos` varchar(100) DEFAULT NULL,
  `alamat_lokasi_pos` text DEFAULT NULL,
  `ket_lokasi_pos` text DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lokasi_pos`
--

INSERT INTO `lokasi_pos` (`id_lokasi_pos`, `nama_lokasi_pos`, `lat_lokasi_pos`, `lon_lokasi_pos`, `kec_lokasi_pos`, `kel_lokasi_pos`, `alamat_lokasi_pos`, `ket_lokasi_pos`, `date_created`, `date_updated`) VALUES
(4, 'Mako JemurSari', '-7.323343124656869', '112.74525374204377', '35.78.02', '35.78.02.1004', 'Jl. Jemursari Tim. II No.2, Jemur Wonosari, Kec. Wonocolo, Surabaya, Jawa Timur 60237', 'Pos Pantau 1', '2023-07-10 08:40:34', '2023-12-29 15:14:44'),
(7, 'Pos Pantau Taman Pelangi', '-7.316907742028266', '112.72543164558218', '35.78.22', '35.78.22.1001', 'Jl. Ahmad Yani No.138, Gayungan, Kec. Gayungan, Surabaya, Jawa Timur 60235', 'Pos Pantau 2', '2023-12-29 14:18:10', '2023-12-29 15:15:59'),
(8, 'Pos Pantau Panjang Jiwo', '-7.317588795595469', '112.76495384564862', '35.78.24', '35.78.24.1004', 'Jl. Panjang Jiwo, Panjang Jiwo, Kec. Tenggilis Mejoyo, Surabaya, Jawa Timur 60234', 'Pos Pantau 3', '2023-12-29 15:45:59', NULL),
(9, 'Pos Pantau UKM MERR', '-7.306001182719118', '112.78066191273899', '35.78.09', '35.78.09.1007', 'Jl. Dr. Ir. H. Soekarno No.11, Medokan Semampir, Kec. Sukolilo, Surabaya, Jawa Timur 60298', 'Pos Pantau Merr', '2024-01-10 09:33:26', '2024-01-31 15:45:59'),
(10, 'Kantor PMI', '-7.271350368600869', '112.74791354031734', '35.78.08', '35.78.08.1001', 'Jl. Sumatra no. 71, Surabaya, Indonesia 60281', 'MAKO PMI', '2024-01-29 15:57:21', NULL),
(11, 'Kantor PMI', '-7.271350368600869', '112.74791354031734', '35.78.08', '35.78.08.1001', 'Jl. Sumatra no. 71, Surabaya, Indonesia 60281', 'MAKO PMI', '2024-01-29 15:57:26', NULL),
(12, 'Pos Pantau RSIA Kenjeran', '-7.250209520394297', '112.78648497489505', '35.78.26', '35.78.26.1006', 'l. Dr. Ir. H. Soekarno No.2, Kalijudan, Kec. Mulyorejo, Surabaya, Jawa Timur 60134', 'Pos Pantau RSIA Kenjeran', '2024-01-30 08:56:57', NULL),
(15, 'Taman Sejarah', '-7.236122137942124', '112.73782974148766', '35.78.15', '35.78.15.1001', 'Jl. Taman Jayengrono No.2-4, Krembangan Sel., Kec. Krembangan, Surabaya, Jawa Timur 60175', 'Pos Pantau Taman Sejarah', '2024-01-30 09:26:40', NULL),
(16, 'Pos Pantau Tugu Pahlawan', '-7.246207714493311', '112.73781927951096', '35.78.13', '35.78.13.1001', 'Jl. Pahlawan, Alun-alun Contong, Kec. Bubutan, Surabaya, Jawa Timur 60174', 'Pos Pantau Tugu Pahlawan', '2024-01-30 09:29:29', NULL),
(17, 'Pos Pantau Indrapura', '-7.242816778132382', '112.7337343214732', '35.78.15', '35.78.15.1001', 'Jl. Indrapura No.3, Krembangan Sel., Kec. Krembangan, Surabaya, Jawa Timur 60175', 'Pos Pantau Indrapura', '2024-01-30 09:38:05', NULL),
(18, 'Pos Pantau Tidar', '-7.256854977340737', '112.72247755588012', '35.78.13', '35.78.13.1005', 'Jl. Tidar No.111, Tembok Dukuh, Kec. Bubutan, Surabaya, Jawa Timur 60252', 'Pos Pantau tidar', '2024-01-30 09:50:01', NULL),
(19, 'Pos Pantau Sedep Malam', '-7.260803474580043', '112.74733729289873', '35.78.07', '35.78.07.1004', 'Jln. Sedep Malam Kel/Ds. Ketabang Kec. Genteng - Surabaya Jawa Timur', 'Pos Pantau Sedep Malam', '2024-01-30 09:56:30', NULL),
(20, 'Pos Pantau Genteng besar', '-7.258696194651807', '112.74045993470908', '35.78.07', '35.78.07.1002', 'Jalan Genteng Besar, Genteng, Surabaya, East Java 60275', 'Pos Pantau Genteng besar', '2024-01-30 10:00:36', NULL),
(21, 'Pos Pantau bambu Runcing', '-7.2682054831188205', '112.74452182847232', '35.78.07', '35.78.07.1001', 'Jl. Panglima Sudirman, Embong Kaliasin, Kec. Genteng, Surabaya, Jawa Timur 60271', 'Pos Pantau Bambu Runcing', '2024-01-30 14:05:53', NULL),
(22, 'Pos Pantau Taman Bungkul', '-7.291719752992105', '112.73933629880703', '35.78.04', '35.78.04.1005', 'Jl. Taman Bungkul, Darmo, Kec. Wonokromo, Surabaya, Jawa Timur 60241', 'Pos Pantau Taman Bungkul', '2024-01-30 14:13:28', NULL),
(23, 'Pos Pantau Gor Pancasila', '-7.287756645304685', '112.73119947874002', '35.78.04', '35.78.04.1005', 'Jl. Patmosusastro No.12, Darmo, Kec. Wonokromo, Surabaya, Jawa Timur 60256', 'Pos Pantau Gor Pancasila', '2024-01-30 14:16:47', NULL),
(24, 'Pos Pantau KBS', '-7.297819862216626', '112.73782080442167', '35.78.04', '35.78.04.1005', 'Jl. Setail No.1, Darmo, Kec. Wonokromo, Surabaya, Jawa Timur 60241', 'Pos Pantau KBS', '2024-01-30 14:18:49', NULL),
(25, 'Pos Pantau PMK Wiyung', '-7.312479870860677', '112.68829508118218', '35.78.20', '35.78.20.1001', 'Jl. Raya Wiyung, Wiyung, Kec. Wiyung, Surabaya, Jawa Timur 60228', 'Pos Pantau PMK Wiyung', '2024-01-30 15:04:48', NULL),
(26, 'Pos Pantau PMK Wiyung', '-7.312479870860677', '112.68829508118218', '35.78.20', '35.78.20.1001', 'Jl. Raya Wiyung, Wiyung, Kec. Wiyung, Surabaya, Jawa Timur 60228', 'Pos Pantau PMK Wiyung', '2024-01-30 15:04:52', NULL),
(27, 'Posko Terpadu Utara', '-7.235419673911865', '112.73630906785202', '35.78.15', '35.78.15.1001', 'Jl. Kasuari No.1, RT.007/RW.15, Krembangan Sel., Kec. Krembangan, Surabaya, Jawa Timur 60175', 'Posko Terpadu Utara', '2024-01-31 14:47:54', NULL),
(28, 'Pos Terpadu Barat', '-7.259031444391697', '112.6780481877061', '35.78.14', '35.78.14.1002', 'Kompleks Perumnas Balongsari Tandes / Jalan Raya Tandes Surabaya Wwilayah kecamatan tandes', 'Pos Terpadu Barat', '2024-01-31 15:14:00', NULL),
(29, 'Posko Terpadu Dukuh Pakis', '-7.290640662445882', '112.71508819802766', '35.78.21', '35.78.21.1003', 'Jl. Mayjen Sungkono No.122, Gn. Sari, Kec. Dukuhpakis, Surabaya, Jawa Timur 60224', 'Posko Terpadu Dukuh Pakis', '2024-01-31 15:18:00', NULL),
(30, 'Posko Terpadu Selatan', '-7.343527665262174', '112.72732434841582', '35.78.22', '35.78.22.1003', 'Jl. Dukuh Menanggal No.1, Dukuh Menanggal, Kec. Gayungan, Surabaya, Jawa Timur 60234', 'Posko Terpadu Selatan', '2024-01-31 15:20:41', NULL),
(31, 'Posko Terpadu Timur', '-7.289197575355074', '112.78025838324263', '35.78.09', '35.78.09.1003', 'Jl. Arief Rachman Hakim No.100, RT.005/RW.02, Klampis Ngasem, Sukolilo, Surabaya, East Java 60117', 'Posko Terpadu Timur', '2024-01-31 15:30:08', NULL),
(32, 'Posko Terpadu Kedung Cowek', '-7.226702642963946', '112.77551777350722', '35.78.17', '35.78.17.1001', 'Jalan Kedung Cowek No. 350 Surabaya ( Kecamatan Kenjeran )', 'Posko Terpadu Kedung Cowek', '2024-01-31 15:37:17', NULL),
(33, 'Posko Terpadu Pusat', '-7.271350368600869', '112.74795170665396', '35.78.08', '35.78.08.1001', 'Jl. Sumatera No.71, Gubeng, Kec. Gubeng, Surabaya, Jawa Timur 60281', 'Posko Terpadu Pusat', '2024-01-31 15:40:49', NULL),
(34, 'Posko Terpadu Pusat', '-7.271350368600869', '112.74795170665396', '35.78.08', '35.78.08.1001', 'Jl. Sumatera No.71, Gubeng, Kec. Gubeng, Surabaya, Jawa Timur 60281', 'Posko Terpadu Pusat', '2024-01-31 15:40:58', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perpus`
--

CREATE TABLE `perpus` (
  `id_perpus` int(11) NOT NULL,
  `judul_perpus` varchar(100) DEFAULT NULL,
  `jenis_perpus` varchar(100) DEFAULT NULL,
  `tgl_perpus` date DEFAULT NULL,
  `ket_perpus` text DEFAULT NULL,
  `thumbnail_perpus` text DEFAULT NULL,
  `dok_perpus` text DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `perpus`
--

INSERT INTO `perpus` (`id_perpus`, `judul_perpus`, `jenis_perpus`, `tgl_perpus`, `ket_perpus`, `thumbnail_perpus`, `dok_perpus`, `date_created`, `date_updated`) VALUES
(1, 'Laporan Realisasi Anggaran 2021', 'Laporan Realisasi Anggaran', '2022-02-25', 'Berikut adalah dokumen laporan realisasi anggaran pada tahun 2021', 'e95779ba9f22c4051dd3eb7b89915c3c.jpg', '1bdb18adf5ae3eedb07fecfea23f9794.pdf', '2024-05-19 01:24:53', NULL),
(5, 'Data Pendukung BPBD', 'Dok. Penanggulangan Bencana', '2024-01-03', 'Data Pendukung', 'ba265c776a0fcedaf68d781359bda34d.png', '35e12366892f9149b1a452216d0fdd76.pdf', '2024-01-03 11:41:41', NULL),
(6, 'Laporan Realisasi Anggaran 2022', 'Laporan Realisasi Anggaran', '2023-02-28', 'Berikut adalah dokumen laporan realisasi anggaran pada tahun 2022', 'c98547ebb32f02b585a6a1701d2f8d27.jpg', '79222a587c6f13065b675b267f53b742.pdf', '2024-05-19 01:26:49', NULL),
(7, 'Laporan Realisasi Anggaran 2023', 'Laporan Realisasi Anggaran', '2024-02-20', 'Berikut adalah dokumen laporan realisasi anggaran pada tahun 2023', '96437f52fe5d598a4aaffa2f66ac2ddb.jpg', '9e4258f4012721aee06377cb5e2ffb7f.pdf', '2024-05-19 01:27:19', NULL),
(8, 'Laporan Operasional 2021', 'Laporan Operasional', '2022-02-25', 'Berikut adalah dokumen laporan operasional tahun 2021', '11abca283e526da7b12bee47ced48691.jpg', 'b243f0235dcaef8309badff0286dade1.pdf', '2024-05-19 01:28:06', NULL),
(9, 'Laporan Operasional 2022', 'Laporan Operasional', '2023-02-28', 'Berikut adalah dokumen laporan operasional tahun 2022', 'bf3452a85a982804b075dc3a2b1cccb4.jpg', 'c60642eae64b24c085b80ede1cd40c8b.pdf', '2024-05-19 01:28:31', NULL),
(10, 'Laporan Operasional 2023', 'Laporan Operasional', '2024-02-20', 'Berikut adalah dokumen laporan operasional tahun 2023', '99075ce0c232af31139b2be21fd3310c.jpg', '652aac46c023db69c95ebd30c7d43058.pdf', '2024-05-19 01:28:57', NULL),
(11, 'Neraca 2021', 'Neraca', '2022-02-25', 'Berikut adalah dokumen neraca tahun 2021', '648129441d402d2efb91f53db32ff330.jpg', 'd169d0a1415af631bf5209690dbc4cb8.pdf', '2024-05-19 01:29:22', NULL),
(12, 'Neraca 2022', 'Neraca', '2023-02-28', 'Berikut adalah dokumen neraca tahun 2022', '330d45ce89312592677a131605d6e669.jpg', 'c0615f2e9f6b75b5ba8dbf65b3907b1a.pdf', '2024-05-19 01:29:46', NULL),
(13, 'Neraca 2023', 'Neraca', '2024-02-20', 'Berikut adalah dokumen neraca tahun 2023', '4114cd617b2b7a35b3efaa5b80167e75.jpg', 'b9b0f038a86e54b7a61a882923af3802.pdf', '2024-05-19 01:30:08', NULL),
(14, 'Data Aset dan Inventaris', 'Data Aset dan Inventaris', '2024-01-12', 'Berikut data aset dan inventaris yang dimiliki oleh BPBD Kota Surabaya', '235e136a3d8c0511a96e394e8c49f4c8.jpg', '27058ca4728cad15bf74770b135d5db9.pdf', '2024-05-19 01:30:34', NULL),
(15, 'Peraturan Walikota Surabaya Nomor 92 Tahun 2021 tentang Kedudukan, Organisasi dan Tupoksi BPBD Kota ', 'Peraturan Walikota Surabaya', '2021-09-21', 'Berikut adalah dokumen Peraturan Walikota Surabaya Nomor 92 Tahun 2021', NULL, NULL, '2024-07-18 10:15:28', '2024-07-18 10:15:28'),
(16, 'Peraturan Walikota Surabaya Nomor 115 Tahun 2021 tentang Penyelenggaraan Penanggulangan Bencana', 'Peraturan Walikota Surabaya', '2021-12-10', 'Berikut adalah dokumen Peraturan Walikota Surabaya Nomor 115 Tahun 2021 tentang Penyelenggaraan Penanggulangan Bencana ', NULL, NULL, '2024-07-18 10:38:48', '2024-07-18 10:38:48'),
(17, 'Peraturan Walikota Surabaya Nomor 113 Tahun 2022 tentang Perubahan Perwali Nomor 92 Tahun 2021 tenta', 'Peraturan Walikota Surabaya', '2022-11-02', 'Berikut adalah dokumen Peraturan Walikota Surabaya Nomor 113 Tahun 2022 \r\n', NULL, NULL, '2024-07-18 10:44:00', '2024-07-18 10:44:00'),
(18, 'Dokumen KRB Kota Surabaya 2019 - 2023', 'Dokumen Kajian Resiko Bencana ', '2019-07-01', 'Berikut adalah laporan Dokumen KRB Kota Surabaya 2019 - 2023', '', NULL, '2024-07-19 04:20:19', '2024-07-19 04:20:19'),
(19, 'SK Tim Reaksi Cepat (TRC) Tahun 2023', 'SK TRC', '2023-03-27', 'Berikut adalah dokumen surat keputusan tim reaksi cepat tahun 2023', NULL, NULL, '2024-07-19 06:15:31', '2024-07-19 06:15:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `isi_review` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tampilkan` int(1) NOT NULL DEFAULT 0,
  `rating` int(11) DEFAULT 4
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `review`
--

INSERT INTO `review` (`id`, `nama`, `isi_review`, `tampilkan`, `rating`) VALUES
(1, 'hanif', 'halo aku suka', 1, 4),
(3, 'siapa', 'Tim SAR gabungan Kota Surabaya berhasil menemukan korban tenggelam di Sungai Jagir.\r\nSelama 2 hari proses pencarian dilakukan sejak hari minggu pukul 14.00 WIB hingga siang tadi pukul 11.09 WIB mayat korban tenggelam ditemukan mengambang tersangkut ranting di mangrove wonorejo.\r\nTim SAR gabungan Kota Surabaya berhasil menemukan korban tenggelam di Sungai Jagir.\r\nSelama 2 hari proses pencarian dilakukan sejak hari minggu pukul 14.00 WIB hingga siang tadi pukul 11.09 WIB mayat korban tenggelam ditemukan mengambang tersangkut ranting di mangrove wonorejo.\r\n\r\n\r\n', 1, 3),
(5, 'haniff', 'ini bagus', 0, 2),
(11, 'aaa', 'bro', 1, 5),
(12, 'Zoell', 'dkalsjdkajs asjdlka jdwio huahsdj a jdh wkjqh bbq hbdhdb ashda bhkx khgciq giwyegqwheg khqe qeqw sa', 1, 5),
(14, 'gento', 'anjay', 0, 4),
(15, 'aghis', 'tes', 0, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_login`
--

CREATE TABLE `role_login` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(100) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `role_login`
--

INSERT INTO `role_login` (`id_role`, `nama_role`, `date_created`, `date_updated`) VALUES
(1, 'Administrator', '2022-02-02 06:00:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan_barang`
--

CREATE TABLE `satuan_barang` (
  `id` bigint(20) NOT NULL,
  `satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `satuan_barang`
--

INSERT INTO `satuan_barang` (`id`, `satuan`) VALUES
(1, 'Buah'),
(2, 'Dus'),
(3, 'Kaleng'),
(4, 'Lembar'),
(5, 'Lusin'),
(6, 'M'),
(7, 'Pack'),
(8, 'Paket'),
(9, 'Pasang'),
(10, 'Potong'),
(11, 'Stel'),
(12, 'Unit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `survey_kepuasan`
--

CREATE TABLE `survey_kepuasan` (
  `id_survey` int(11) NOT NULL,
  `nama_survey` varchar(100) DEFAULT NULL,
  `alamat_survey` text DEFAULT NULL,
  `prov_survey` varchar(100) DEFAULT NULL,
  `kota_kab_survey` varchar(100) DEFAULT NULL,
  `kec_survey` varchar(100) DEFAULT NULL,
  `kel_survey` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `alasan` text DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `survey_kepuasan`
--

INSERT INTO `survey_kepuasan` (`id_survey`, `nama_survey`, `alamat_survey`, `prov_survey`, `kota_kab_survey`, `kec_survey`, `kel_survey`, `nilai`, `alasan`, `status`, `date_created`) VALUES
(1, 'wqewq', 'qwewqewq', '11', '11.12', '11.12.01', '11.12.01.2024', 3, 'wqdsdsadf', 'Tampil', '2023-07-13 08:48:50'),
(366, '1', '1', '11', '1', '1', '1', 5, '1', 'Tampil', '2024-01-04 07:11:02'),
(367, 'jharot', 'Bendul Merisi', '35', '35.78', '35.78.24', '35.78.24.1003', 5, 'MANTAP', 'Tampil', '2024-01-09 08:09:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_kegiatan`
--

CREATE TABLE `tabel_kegiatan` (
  `tanggal` date NOT NULL,
  `id_kegiatan` varchar(15) NOT NULL,
  `shift` varchar(20) NOT NULL,
  `giat` varchar(100) NOT NULL,
  `waktu_kegiatan` varchar(500) NOT NULL,
  `kegiatan` text NOT NULL,
  `lokasi_kegiatan` varchar(256) NOT NULL,
  `jumlah_personel` int(11) NOT NULL,
  `jumlah_jarko` int(11) NOT NULL,
  `keterangan` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tabel_kegiatan`
--

INSERT INTO `tabel_kegiatan` (`tanggal`, `id_kegiatan`, `shift`, `giat`, `waktu_kegiatan`, `kegiatan`, `lokasi_kegiatan`, `jumlah_personel`, `jumlah_jarko`, `keterangan`) VALUES
('2024-03-01', 'PL01032024001', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Sedap Malam', 2, 0, 'Jam 06.00 WIB Standby berdiri di lokasi Pedestrian Pintu Selatan sampai Jam 10.00 WIB dan jam 15.00 - 18.00 WIB sesuai\nploting pedestrian'),
('2024-03-01', 'PL01032024002', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Genteng Besar -TIM 6', 1, 0, 'Jam 06.00 Standby berdiri di lokasi Simpang 3 SMA Trimurti\nsampai jam 10.00 WIB dan Jam 15.00 - 18.00 WIB sesuai ploting pedestrian'),
('2024-03-01', 'PL01032024003', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Tidar - TIM 20', 1, 0, 'Standby di TL Embong Malang Goskate Jam 06.00 - 10.00 WIB dan\nJam 15.00 - 18.00 WIB'),
('2024-03-01', 'PL01032024004', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Tugu Pahlawan - Tim 21', 1, 0, 'Standby di lokasi Pedestrian BG Junction Jam 06.00 - 10.00 WIB\ndan Jam 15.00 - 18.00 WIB'),
('2024-03-01', 'PL01032024005', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Taman Kalongan - TIM 22', 1, 0, 'Standby di lokasi Pedestrian Depan Sekolah Takmiriyah Jam\n07.00 - 10.00 WIB dan jam 15.00 - 18.00 WIB'),
('2024-03-01', 'PL01032024006', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Taman Bungkul - TIM 11', 1, 0, 'Jam 06.00 Standby berdiri di TL Bengawan arah masuk kota lanjut geser jam 08.00 WIB  di Lokasi Halte RKZ sampai Jam 10.00 WIB dan jam 15.00 - 18.00 WIB sesuai ploting pedestrian'),
('2024-03-01', 'PL01032024007', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'KBS - TIM 10', 1, 0, 'Jam 06.00 WIB - 10.00 WIB standby berdiri di Zebra?Cross?Jl? Diponegoro?-?Setail?Sisi?Utara?Pos?Pantau arah masuk kota dan Jam 15.00 - 18.00 WIB sesuai ploting pedestrian'),
('2024-03-01', 'PL01032024008', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Dupak', 1, 0, 'Standby di TL Pasar turi Jam 06.00 - 10.00 WIB, jam 15.00 -\n18.00 WIB'),
('2024-03-01', 'PL01032024009', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'RSIA', 1, 0, 'Standby di lokasi Depan Pos Pantau Jam 06.00 - 10.00 WIB dan\nJam 15.00 -18.00 WIB'),
('2024-03-01', 'PL01032024010', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'UKM Merr', 1, 0, 'Standby di lokasi TL Stikom Jam 06.00 - 10.00 WIB dan Jam 15.00 -\n18.00 WIB'),
('2024-03-01', 'PL01032024011', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Panjang Jiwo', 1, 0, 'Standby di lokasi TL Prapen Jam 06.00 - 10.00 WIB dan Jam 15.00 -\n18.00 WIB'),
('2024-03-01', 'PL01032024012', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Wiyung', 1, 0, 'Standby di lokasi  TL?Babatan  Jam 06.00 - 10.00 WIB dan Jam\n15.00 - 18.00 WIB'),
('2024-03-01', 'PL01032024013', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Taman Pelangi - TIM 2', 1, 0, 'Jam 06.00 Standby berdiri di depan Pos Taman Pelangi lanjut geser jam 08.00 WIB di lokasi Pedestrian DBL Arena sampai Jam\n10.00 WIB dan Jam 15.00 - 18.00 WIB sesuai ploting pedestrian'),
('2024-03-01', 'PL01032024014', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Gelora Pancasila - TIM 12', 1, 0, 'Standby di lokasi Pedestrian Adityawarman KPU Jam 06.00 - 10.00\nWIB dan Jam 15.00 - 18.00 WIB'),
('2024-03-01', 'PL01032024015', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Bambu Runcing - TIM 7', 1, 0, 'Standby di lokasi Tikungan Alun2 Suroboyo Jam 06.00 - 10.00\nWIB dan Jam 15.00 - 18.00 WIB'),
('2024-03-01', 'PL01032024016', 'Pagi', 'Giat Utama', '06:00', 'Gudang Peralatan', 'Menur - TIM 24', 2, 0, '(2 Pawana) Standby di lokasi Pedestrian Samsat Manyar Jam 06.00 -\n10.00 WIB dan jam 15.00 - 18.00 WIB'),
('2024-03-01', 'PL01032024017', 'Pagi', 'Giat Utama', '06:00', 'Gudang Peralatan', 'Hitechmall - TIM 16 dan 28', 2, 0, 'Bantu Kerja Bakti Pembersihan di ZONA 7 Hitech Mall'),
('2024-03-01', 'PL01032024018', 'Pagi', 'Giat Utama', '06:00', 'Poster Barat', 'Kantor Kecamatan Tandes', 3, 0, ''),
('2024-03-01', 'PL01032024019', 'Pagi', 'Giat Utama', '06:00', 'Poster Utara', 'Park n Ride Jl Kasuari', 3, 0, ''),
('2024-03-01', 'PL01032024020', 'Pagi', 'Giat Utama', '06:00', 'Poster Timur', 'Park n Ride Jl Arif Rahman\nHakim', 4, 0, ''),
('2024-03-01', 'PL01032024021', 'Pagi', 'Giat Utama', '06:00', 'Poster Kedung Cowek', 'Kantor Kecamatan Kenjeran', 3, 0, ''),
('2024-03-01', 'PL01032024022', 'Pagi', 'Giat Utama', '06:00', 'Poster Pakis', 'Park n Ride Jl Mayjend\nSungkono', 4, 0, ''),
('2024-03-01', 'PL01032024023', 'Pagi', 'Giat Utama', '06:00', 'Poster Selatan', 'Kantor Dishub Kota Surabaya', 4, 0, ''),
('2024-03-01', 'PL01032024024', 'Pagi', 'Giat Utama', '06:00', 'Poster Pusat', 'Hitechmall', 2, 0, 'Petir'),
('2024-03-01', 'PL01032024025', 'Pagi', 'Giat Utama', '06:00', 'Rumah Bhinneka', 'Jl Nginden Jangkungan', 1, 0, ''),
('2024-03-01', 'PL01032024026', 'Pagi', 'Giat Utama', '06:00', 'Graha Bunda Paud', 'Jl Pawiyatan', 1, 0, ''),
('2024-03-01', 'PL01032024027', 'Pagi', 'Giat Utama', '06:00', 'RSLT', 'Jl Kedung Cowek', 2, 0, 'Standby di Poster Kedung Cowek (Mobile Checkpoint 1-2 Jam\nsekali)'),
('2024-03-01', 'PL01032024028', 'Pagi', 'Giat Utama', '06:00', 'Resepsionis', 'Mako BPBD', 1, 0, 'Srikandi'),
('2024-03-01', 'PL01032024029', 'Pagi', 'Giat Utama', '06:00', 'Siaga Mako/Antisipasi Kejadian', 'Mako BPBD', 1, 3, 'Kerja Bakti Rutin'),
('2024-03-01', 'PL01032024030', 'Pagi', 'Giat Utama', '06:00', 'Aplos Perbantuan Pasar Keputran', 'TL Sunda', 1, 1, 'Bawa Kotak P3K - Aplos Shift Malam (ANTISIPASI KEJADIAN\nPUSAT)'),
('2024-03-01', 'PL01032024031', 'Pagi', 'Giat Utama', 'Jam 6 WIB sudah di lokasi\n', 'Petugas Upacara dalam Rangka HUT Damkar ke 105', 'Lapangan Makodam V/Brawijaya', 5, 2, 'Bawa Sarung tangan dan 2 Dus Air Mineral (Jumlah Personil sesuai SP 30 Personil gabungan Kompi B, Kompi C dan Balai\nRW)'),
('2024-03-01', 'PL01032024032', 'Pagi', 'Giat Utama', 'Jam 6 WIB sudah di lokasi\n', 'Tim Evakuator Upacara  dalam Rangka HUT Damkar ke 105', 'Lapangan Makodam V/Brawijaya', 2, 3, 'Bawa Alkes 1 set + 2 Tabung set nassal, 3 Velbed orange, 1 dus air mineral, 1 Terpal Bekas, Tulisan tenda Medis'),
('2024-03-01', 'PL01032024033', 'Pagi', 'Giat Utama', 'Jam 6 WIB sudah di lokasi\n', 'Tim Srikandi Dukungan Logistik\nUpacara', 'Lapangan Makodam\nV/Brawijaya', 6, 2, 'Danki Nungki dan Wadanru Tania - Koordinasi Bu Satiah\nBakesbangpol'),
('2024-03-01', 'PL01032024034', 'Pagi', 'Giat Utama', 'Jam 6 WIB sudah di lokasi\n', 'Petugas Tampilan Atraksi dalam Rangka HUT Damkar ke 105', 'Lapangan Makodam V/Brawijaya', 1, 0, 'Anggota Pawana nama Yules (bersama Fazar, Taufik Faqurrahman, Ach Choiron, Buyung Firmansyah) - Unit yang digunakan pakai Traga 01, Helm Orange 5, 1 Box Makanan siap\nsaji, air mineral 3 dus'),
('2024-03-01', 'PL01032024035', 'Pagi', 'Giat Utama', 'Jam 6 WIB sudah di lokasi\n', 'Kerja Bakti', 'Zona 7 Hitech Mall', 0, 2, 'Bawa 4 chainsaw, Cadangan BBM Olie, Kunci busi, Kikir, Sekrop 5, garuk 5, air galon 1, Sapu Lidi 5 (2 Personil Orientasi,\n2 Pawana Hitech) + Staff 15 Orang'),
('2024-03-01', 'PL01032024036', 'Pagi', 'Giat Lanjutan', 'Menyesuaikan sikon\n', 'PATROLI WILAYAH ANTISIPASI KEJADIAN / PERUBAHAN CUACA (UPDATE LAPORAN PANWIL DI GRUP)', 'Pusat, Timur, Barat, Utara', 0, 0, 'Bagi tim'),
('2024-03-01', 'PL01032024037', 'Pagi', 'Giat Lanjutan', '', 'Checkpoint melakukan pengawasan dan penghalauan anak2/orang yang berada di area\nsungai', '', 0, 0, 'Pos Pantau yang berdekatan dengan sungai'),
('2024-03-01', 'PL01032024038', 'Pagi', 'Giat Lanjutan', 'Setelah Upacara\n', 'Posko PMI', 'Jl Sumatra', 1, 0, 'Srikandi'),
('2024-03-01', 'PL01032024039', 'Pagi', 'Giat Lanjutan', 'Setelah Upacara\n', 'Pembongkaran 2 Tenda Uk 4X6', 'Lapangan Makodam\nV/Brawijaya', 0, 0, 'Bawa Mako'),
('2024-03-01', 'PL01032024040', 'Pagi', 'Giat Lanjutan', 'Setelah Upacara\n', 'Kerja Bakti Pengecatan Rumah\nPadat Karya', 'Jl Kyai Abdulloh no 17', 4, 2, 'Bawa Alat Kebersihan dan Cat'),
('2024-03-01', 'PL01032024041', 'Pagi', 'Giat Lanjutan', '10:30', 'Antisipasi Sholat Jumat', 'Masjid Muhajirin', 0, 0, 'Pos Pantau Sedap Malam'),
('2024-03-01', 'PL01032024042', 'Pagi', 'Giat Lanjutan', '16:30', 'Pengiriman Lampu Sorot Penerangan kegiatan pembersihan RPH Babi oleh DSDABM, DPRKPP\ndan DLH', 'RPH Sebelah utara Kelurahan Ampel Jl Pegirian', 0, 0, 'Drop Lampu Sorot - serah terima diambil shift malam'),
('2024-03-01', 'PL01032024043', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Sedap Malam', 2, 0, 'Tetap Standby di Pos Pantau'),
('2024-03-01', 'PL01032024044', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Genteng Besar -TIM 6', 1, 0, 'Standby di lokasi Simpang 3 SMA Trimurti Jam 18.00 - 20.00 WIB\nselanjutnya kembali ke Pos Pantau Genteng Besar'),
('2024-03-01', 'PL01032024045', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Tidar - TIM 20', 1, 0, 'Standby di lokasi Pedestrian Go Skate Embong Malang Jam 18.00 -\n20.00 WIB selanjutnya kembali ke Pos Pantau Tidar'),
('2024-03-01', 'PL01032024046', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Tugu Pahlawan - Tim 21', 1, 0, 'Standby di lokasi Pedestrian BG Junction Jam 18.00 - 20.00 WIB\nselanjutnya kembali ke Pos Pantau Tugu Pahlawan'),
('2024-03-01', 'PL01032024047', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Taman Kalongan - TIM 22', 1, 0, 'Standby di lokasi Pedestrian Depan Sekolah Takmiriyah Jam\n18.00 - 20.00 WIB selanjutnya kembali ke Pos Pantau Taman Kalongan'),
('2024-03-01', 'PL01032024048', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Taman Bungkul - TIM 11', 1, 0, 'Standby di lokasi Halte RKZ Jam 18.00 - 20.00 WIB selanjutnya\nkembali ke Pos Pantau Taman Bungkul'),
('2024-03-01', 'PL01032024049', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'KBS - TIM 10', 1, 0, 'Standby di Zebra?Cross?Jl?Diponegoro?-?Setail?Sisi?Utara?Pos?\nPantau  Jam 18.00 - 20.00 WIB'),
('2024-03-01', 'PL01032024050', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Dupak', 1, 0, 'Tetap Standby di Pos Pantau'),
('2024-03-01', 'PL01032024051', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'RSIA', 2, 0, 'Tetap Standby di Pos Pantau'),
('2024-03-01', 'PL01032024052', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'UKM Merr', 1, 0, 'Tetap Standby di Pos Pantau'),
('2024-03-01', 'PL01032024053', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Panjang Jiwo', 1, 0, 'Tetap Standby di Pos Pantau'),
('2024-03-01', 'PL01032024054', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Wiyung', 1, 0, 'Standby di lokasi TL?Babatan  Jam 18.00 - 20.00 WIB\nselanjutnya kembali ke Pos Wiyung'),
('2024-03-01', 'PL01032024055', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Taman Pelangi - TIM 2', 1, 0, 'Standby di lokasi Pedestrian DBL Arena Jam 18.00 - 20.00 WIB\nselanjutnya kembali ke Pos Pantau Taman Pelangi'),
('2024-03-01', 'PL01032024056', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Gelora Pancasila - TIM 12', 1, 0, 'Standby di lokasi Pedestrian Adityawarman KPU Jam 18.00 - 20.00 WIB selanjutnya kembali ke Pos Pantau GOR pancasila'),
('2024-03-01', 'PL01032024057', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Bambu Runcing - TIM 7', 1, 0, 'Standby di lokasi Tikungan Granada Jam 18.00 - 20.00 WIB selanjutnya kembali ke Pos Pantau Bambu Runcing'),
('2024-03-01', 'PL01032024058', 'Malam', 'Giat Utama', '18:00', 'Gudang Peralatan', 'Menur - TIM 24', 2, 0, '(2 Pawana) Standby di lokasi Samsat Manyar Jam 18.00 - 20.00\nWIB selanjutnya kembali ke Menur'),
('2024-03-01', 'PL01032024059', 'Malam', 'Giat Utama', '18:00', 'Gudang Peralatan', 'Hitechmall - TIM 16 dan 28', 2, 0, '(2 Pawana) 1 Pawana Standby di lokasi Monkasel, dan 1 Pawana\nStandby Pedestrian Hotel Sahid Jam 18.00 - 20.00 WIB selanjutnya kembali ke Hitech mall'),
('2024-03-01', 'PL01032024060', 'Malam', 'Giat Utama', '18:00', 'Poster Barat', 'Kantor Kecamatan Tandes', 3, 0, ''),
('2024-03-01', 'PL01032024061', 'Malam', 'Giat Utama', '18:00', 'Poster Utara', 'Park n Ride Jl Kasuari', 3, 0, ''),
('2024-03-01', 'PL01032024062', 'Malam', 'Giat Utama', '18:00', 'Poster Timur', 'Park n Ride Jl Arif Rahman\nHakim', 4, 0, ''),
('2024-03-01', 'PL01032024063', 'Malam', 'Giat Utama', '18:00', 'Poster Kedung Cowek', 'Kantor Kecamatan Kenjeran', 3, 0, ''),
('2024-03-01', 'PL01032024064', 'Malam', 'Giat Utama', '18:00', 'Poster Pakis', 'Park n Ride Jl Mayjend\nSungkono', 4, 0, ''),
('2024-03-01', 'PL01032024065', 'Malam', 'Giat Utama', '18:00', 'Poster Selatan', 'Kantor Dishub Kota Surabaya', 4, 0, ''),
('2024-03-01', 'PL01032024066', 'Malam', 'Giat Utama', '18:00', 'Poster Pusat', 'Hitechmall', 2, 0, 'Petir'),
('2024-03-01', 'PL01032024067', 'Malam', 'Giat Utama', '18:00', 'Rumah Bhinneka', 'Jl Nginden Jangkungan', 2, 0, ''),
('2024-03-01', 'PL01032024068', 'Malam', 'Giat Utama', '18:00', 'Graha Bunda Paud', 'Jl Pawiyatan', 1, 0, ''),
('2024-03-01', 'PL01032024069', 'Malam', 'Giat Utama', '18:00', 'RSLT', 'Jl Kedung Cowek', 2, 0, 'Standby di Poster Kedung Cowek (Mobile Checkpoint 1-2 Jam\nsekali)'),
('2024-03-01', 'PL01032024070', 'Malam', 'Giat Utama', '18:00', 'Resepsionis', 'Mako BPBD', 1, 0, 'Srikandi'),
('2024-03-01', 'PL01032024071', 'Malam', 'Giat Utama', '18:00', 'Siaga Mako/Antisipasi Kejadian', 'Mako BPBD', 4, 4, ''),
('2024-03-01', 'PL01032024072', 'Malam', 'Giat Utama', '18:00', 'Posko PMI', 'Jl Sumatra', 1, 0, 'Srikandi'),
('2024-03-01', 'PL01032024073', 'Malam', 'Giat Utama', '18:00', 'Tunjungan Romansa / Antisipasi Pedestrian', '', 1, 2, '1 Driver - Pedestrian Jl Tunjungan - Bawa Kotak P3K'),
('2024-03-01', 'PL01032024074', 'Malam', 'Giat Utama', '18:00', 'Patroli Pedestrian/Antisipasi Kejadian Pusat', '', 2, 3, '1 Driver - TL?Alfalah?Darmo?Arah?Luar?Kota, Pedestrian Kimia Farma Pandegiling, McD Basuki Rahmat, Siola - Bawa Kotak\nP3K'),
('2024-03-01', 'PL01032024075', 'Malam', 'Giat Utama', '18:00', 'Patroli TL dan Pedestrian/antisipasi kejadian Timur', '', 3, 2, '1 Driver - Lapangan Hockey, Depan IRD Dr Soetomo, Halte SMKN 5, TL KONI, Galaksi Mall - Bawa Kotak P3K'),
('2024-03-01', 'PL01032024076', 'Malam', 'Giat Utama', '18:00', 'Patroli Pedestrian/Antisipasi Kejadian Barat', '', 2, 1, '1 Driver - Standby berdiri di Bakso Rindu malam, TMP mayjend Sungkono. Depan kantor Kecamatan Dukuh Pakis, Petra Jl HR\nMuhammad - Bawa Kotak P3K'),
('2024-03-01', 'PL01032024077', 'Malam', 'Giat Utama', '18:00', 'Aplos Perbantuan Pasar Keputran', 'TL Sunda', 1, 1, 'Bawa Kotak P3K - Aplos Shift Pagi'),
('2024-03-01', 'PL01032024078', 'Malam', 'Giat Lanjutan', '21:30', 'Pengambilan Lampu Sorot Penerangan kegiatan pembersihan RPH Babi oleh\nDSDABM, DPRKPP dan DLH', 'RPH Sebelah utara Kelurahan Ampel Jl Pegirian', 0, 0, ''),
('2024-03-01', 'PL01032024079', 'Malam', 'Giat Lanjutan', '22:00', 'Asuhan Rembulan', 'Halaman Taman Surya', 6, 6, ''),
('2024-03-01', 'PL01032024080', 'Malam', 'Giat Lanjutan', '23:00', 'Patroli Wilayah/Antisipasi Kejadian', 'Mobile', 2, 2, 'Bawa Peralatan Chainsaw, Kotak P3K'),
('2024-03-01', 'PL01032024081', 'Malam', 'Giat Lanjutan', '', 'Pengecekan dan pengondisian\nKelengkapan Pos Pantau, Pos Terpadu, CC Room', '', 0, 0, 'Tindaklanjut Wadanki dibantu Danru - Laporan serah terima shift pagi'),
('2024-03-13', 'PL01332024001', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Sedap Malam', 2, 0, 'Jam 06.00 WIB Standby berdiri di lokasi Pedestrian Pintu Selatan sampai Jam 10.00 WIB dan jam 15.00 - 18.00 WIB sesuai\nploting pedestrian'),
('2024-03-13', 'PL01332024002', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Genteng Besar -TIM 6', 1, 0, 'Jam 06.00 Standby berdiri di lokasi Simpang 3 SMA Trimurti\nsampai jam 10.00 WIB dan Jam 15.00 - 18.00 WIB sesuai ploting pedestrian'),
('2024-03-13', 'PL01332024003', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Tidar - TIM 20', 1, 0, 'Standby di TL Embong Malang Goskate Jam 06.00 - 10.00 WIB dan\nJam 15.00 - 18.00 WIB'),
('2024-03-13', 'PL01332024004', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Tugu Pahlawan - Tim 21', 1, 0, 'Standby di lokasi Pedestrian BG Junction Jam 06.00 - 10.00 WIB\ndan Jam 15.00 - 18.00 WIB'),
('2024-03-13', 'PL01332024005', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Indrapura - TIM 22', 1, 0, 'Standby di lokasi Pedestrian Depan Sekolah Takmiriyah Jam\n07.00 - 10.00 WIB dan jam 15.00 - 18.00 WIB'),
('2024-03-13', 'PL01332024006', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Taman Bungkul - TIM 11', 1, 0, 'Jam 06.00 Standby berdiri di TL Bengawan arah masuk kota lanjut geser jam 08.00 WIB  di Lokasi Halte RKZ sampai Jam 10.00 WIB dan jam 15.00 - 18.00 WIB sesuai ploting pedestrian'),
('2024-03-13', 'PL01332024007', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'KBS - TIM 10', 1, 0, 'Jam 06.00 WIB - 10.00 WIB standby berdiri di Zebra?Cross?Jl? Diponegoro?-?Setail?Sisi?Utara?Pos?Pantau arah masuk kota dan Jam 15.00 - 18.00 WIB sesuai ploting pedestrian'),
('2024-03-13', 'PL01332024008', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Taman Sejarah', 1, 0, 'Standby di TL Pasar turi Jam 06.00 - 10.00 WIB, jam 15.00 -\n18.00 WIB'),
('2024-03-13', 'PL01332024009', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'RSIA', 1, 0, 'Standby di lokasi Depan Pos Pantau Jam 06.00 - 10.00 WIB dan\nJam 15.00 -18.00 WIB'),
('2024-03-13', 'PL01332024010', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'UKM Merr', 1, 0, 'Standby di lokasi TL Stikom Jam 06.00 - 10.00 WIB dan Jam 15.00 -\n18.00 WIB'),
('2024-03-13', 'PL01332024011', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Panjang Jiwo', 1, 0, 'Standby di lokasi TL Prapen Jam 06.00 - 10.00 WIB dan Jam 15.00 -\n18.00 WIB'),
('2024-03-13', 'PL01332024012', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Wiyung', 1, 0, 'Standby di lokasi  TL?Babatan  Jam 06.00 - 10.00 WIB dan Jam\n15.00 - 18.00 WIB'),
('2024-03-13', 'PL01332024013', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Taman Pelangi - TIM 2', 1, 0, 'Jam 06.00 Standby berdiri di depan Pos Taman Pelangi lanjut geser jam 08.00 WIB di lokasi Pedestrian DBL Arena sampai Jam\n10.00 WIB dan Jam 15.00 - 18.00 WIB sesuai ploting pedestrian'),
('2024-03-13', 'PL01332024014', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Gelora Pancasila - TIM 12', 1, 0, 'Standby di lokasi Pedestrian Adityawarman KPU Jam 06.00 - 10.00\nWIB dan Jam 15.00 - 18.00 WIB'),
('2024-03-13', 'PL01332024015', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Bambu Runcing - TIM 7', 1, 0, 'Standby di lokasi Tikungan Alun2 Suroboyo Jam 06.00 - 10.00\nWIB dan Jam 15.00 - 18.00 WIB'),
('2024-03-13', 'PL01332024016', 'Pagi', 'Giat Utama', '06:00', 'Gudang Peralatan', 'Menur - TIM 24', 2, 0, '(2 Pawana) Standby di lokasi Pedestrian Samsat Manyar Jam 06.00 -\n10.00 WIB dan jam 15.00 - 18.00 WIB'),
('2024-03-13', 'PL01332024017', 'Pagi', 'Giat Utama', '06:00', 'Gudang Peralatan', 'Hitechmall - TIM 16 dan 28', 2, 0, 'Bantu Kerja Bakti Pembersihan di ZONA 7 Hitech Mall'),
('2024-03-13', 'PL01332024018', 'Pagi', 'Giat Utama', '06:00', 'Poster Barat', 'Kantor Kecamatan Tandes', 3, 0, ''),
('2024-03-13', 'PL01332024019', 'Pagi', 'Giat Utama', '06:00', 'Poster Utara', 'Park n Ride Jl Kasuari', 3, 0, ''),
('2024-03-13', 'PL01332024020', 'Pagi', 'Giat Utama', '06:00', 'Poster Timur', 'Park n Ride Jl Arif Rahman\nHakim', 4, 0, ''),
('2024-03-13', 'PL01332024021', 'Pagi', 'Giat Utama', '06:00', 'Poster Kedung Cowek', 'Kantor Kecamatan Kenjeran', 3, 0, ''),
('2024-03-13', 'PL01332024022', 'Pagi', 'Giat Utama', '06:00', 'Poster Pakis', 'Park n Ride Jl Mayjend\nSungkono', 4, 0, ''),
('2024-03-13', 'PL01332024023', 'Pagi', 'Giat Utama', '06:00', 'Poster Selatan', 'Kantor Dishub Kota Surabaya', 4, 0, ''),
('2024-03-13', 'PL01332024024', 'Pagi', 'Giat Utama', '06:00', 'Poster Pusat', 'Hitechmall', 2, 0, 'Petir'),
('2024-03-13', 'PL01332024025', 'Pagi', 'Giat Utama', '06:00', 'Rumah Bhinneka', 'Jl Nginden Jangkungan', 1, 0, ''),
('2024-03-13', 'PL01332024026', 'Pagi', 'Giat Utama', '06:00', 'Graha Bunda Paud', 'Jl Pawiyatan', 1, 0, ''),
('2024-03-13', 'PL01332024027', 'Pagi', 'Giat Utama', '06:00', 'RSLT', 'Jl Kedung Cowek', 2, 0, 'Standby di Poster Kedung Cowek (Mobile Checkpoint 1-2 Jam\nsekali)'),
('2024-03-13', 'PL01332024028', 'Pagi', 'Giat Utama', '06:00', 'Posko PMI', 'Jl Sumatra', 1, 0, 'Srikandi'),
('2024-03-13', 'PL01332024029', 'Pagi', 'Giat Utama', '06:00', 'Resepsionis', 'Mako BPBD', 1, 0, 'Srikandi'),
('2024-03-13', 'PL01332024030', 'Pagi', 'Giat Utama', '06:00', 'Siaga Mako/Antisipasi Kejadian', 'Mako BPBD', 1, 3, 'Kerja Bakti Rutin'),
('2024-03-13', 'PL01332024031', 'Pagi', 'Giat Utama', '06:00', 'Aplos Perbantuan Pasar Keputran', 'TL Sunda', 1, 1, 'Bawa Kotak P3K - Aplos Shift Malam (ANTISIPASI KEJADIAN\nPUSAT)'),
('2024-03-13', 'PL01332024032', 'Pagi', 'Giat Utama', '06:00', 'Patroli TL dan Pedestrian/antisipasi kejadian Pusat', 'Patroli Checkpoint melakukan pengawasan dan penghalauan anak2/orang yang berada di area sungai ', 3, 2, ''),
('2024-03-13', 'PL01332024033', 'Pagi', 'Giat Utama', '06:00', 'Patroli TL dan Pedestrian/antisipasi kejadian Timur', '', 3, 2, ''),
('2024-03-13', 'PL01332024034', 'Pagi', 'Giat Utama', '06:00', 'Patroli TL dan Pedestrian/antisipasi kejadian Barat', '', 3, 2, ''),
('2024-03-13', 'PL01332024035', 'Pagi', 'Giat Lanjutan', 'Setelah Pedestrian', 'PATROLI WILAYAH ANTISIPASI KEJADIAN / PERUBAHAN CUACA (UPDATE LAPORAN PANWIL DI GRUP)', 'Pusat, Timur, Barat, Utara', 0, 0, 'Bagi tim'),
('2024-03-13', 'PL01332024036', 'Pagi', 'Giat Lanjutan', '08:00', 'Survey lokasi persiapan peringatan Isra miraj dan Pelantikan pengurus serta peresmian Kantor Forum Musyawarah Kyai Kampung Nusantara', 'Masjid Muhajirin', 0, 0, 'Monitor Patroli Pusat'),
('2024-03-13', 'PL01332024037', 'Pagi', 'Giat Lanjutan', '10:30', 'Antisipasi Sholat Jumat', 'Masjid Muhajirin', 0, 0, 'Bawa Kotak P3K'),
('2024-03-13', 'PL01332024038', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Sedap Malam', 2, 0, 'Tetap Standby di Pos Pantau'),
('2024-03-13', 'PL01332024039', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Genteng Besar -TIM 6', 1, 0, 'Standby di lokasi Simpang 3 SMA Trimurti Jam 18.00 - 20.00 WIB\nselanjutnya kembali ke Pos Pantau Genteng Besar'),
('2024-03-13', 'PL01332024040', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Tidar - TIM 20', 1, 0, 'Standby di lokasi Pedestrian Go Skate Embong Malang Jam 18.00 -\n20.00 WIB selanjutnya kembali ke Pos Pantau Tidar'),
('2024-03-13', 'PL01332024041', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Tugu Pahlawan - Tim 21', 1, 0, 'Standby di lokasi Pedestrian BG Junction Jam 18.00 - 20.00 WIB\nselanjutnya kembali ke Pos Pantau Tugu Pahlawan'),
('2024-03-13', 'PL01332024042', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Indrapura - TIM 22', 1, 0, 'Standby di lokasi Pedestrian Depan Sekolah Takmiriyah Jam\n18.00 - 20.00 WIB selanjutnya kembali ke Pos Pantau Taman Kalongan'),
('2024-03-13', 'PL01332024043', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Taman Bungkul - TIM 11', 1, 0, 'Standby di lokasi Halte RKZ Jam 18.00 - 20.00 WIB selanjutnya\nkembali ke Pos Pantau Taman Bungkul'),
('2024-03-13', 'PL01332024044', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'KBS - TIM 10', 1, 0, 'Standby di Zebra?Cross?Jl?Diponegoro?-?Setail?Sisi?Utara?Pos?\nPantau  Jam 18.00 - 20.00 WIB'),
('2024-03-13', 'PL01332024045', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Taman Sejarah', 1, 0, 'Tetap Standby di Pos Pantau'),
('2024-03-13', 'PL01332024046', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'RSIA', 2, 0, 'Tetap Standby di Pos Pantau'),
('2024-03-13', 'PL01332024047', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'UKM Merr', 1, 0, 'Tetap Standby di Pos Pantau'),
('2024-03-13', 'PL01332024048', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Panjang Jiwo', 1, 0, 'Tetap Standby di Pos Pantau'),
('2024-03-13', 'PL01332024049', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Wiyung', 1, 0, 'Standby di lokasi TL?Babatan  Jam 18.00 - 20.00 WIB\nselanjutnya kembali ke Pos Wiyung'),
('2024-03-13', 'PL01332024050', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Taman Pelangi - TIM 2', 1, 0, 'Standby di lokasi Pedestrian DBL Arena Jam 18.00 - 20.00 WIB\nselanjutnya kembali ke Pos Pantau Taman Pelangi'),
('2024-03-13', 'PL01332024051', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Gelora Pancasila - TIM 12', 1, 0, 'Standby di lokasi Pedestrian Adityawarman KPU Jam 18.00 - 20.00 WIB selanjutnya kembali ke Pos Pantau GOR pancasila'),
('2024-03-13', 'PL01332024052', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Bambu Runcing - TIM 7', 1, 0, 'Standby di lokasi Tikungan Granada Jam 18.00 - 20.00 WIB selanjutnya kembali ke Pos Pantau Bambu Runcing'),
('2024-03-13', 'PL01332024053', 'Malam', 'Giat Utama', '18:00', 'Gudang Peralatan', 'Menur - TIM 24', 2, 0, '(2 Pawana) Standby di lokasi Samsat Manyar Jam 18.00 - 20.00\nWIB selanjutnya kembali ke Menur'),
('2024-03-13', 'PL01332024054', 'Malam', 'Giat Utama', '18:00', 'Gudang Peralatan', 'Hitechmall - TIM 16 dan 28', 2, 0, '(2 Pawana) 1 Pawana Standby di lokasi Monkasel, dan 1 Pawana\nStandby Pedestrian Hotel Sahid Jam 18.00 - 20.00 WIB selanjutnya kembali ke Hitech mall'),
('2024-03-13', 'PL01332024055', 'Malam', 'Giat Utama', '18:00', 'Poster Barat', 'Kantor Kecamatan Tandes', 3, 0, ''),
('2024-03-13', 'PL01332024056', 'Malam', 'Giat Utama', '18:00', 'Poster Utara', 'Park n Ride Jl Kasuari', 3, 0, ''),
('2024-03-13', 'PL01332024057', 'Malam', 'Giat Utama', '18:00', 'Poster Timur', 'Park n Ride Jl Arif Rahman\nHakim', 4, 0, ''),
('2024-03-13', 'PL01332024058', 'Malam', 'Giat Utama', '18:00', 'Poster Kedung Cowek', 'Kantor Kecamatan Kenjeran', 3, 0, ''),
('2024-03-13', 'PL01332024059', 'Malam', 'Giat Utama', '18:00', 'Poster Pakis', 'Park n Ride Jl Mayjend\nSungkono', 4, 0, ''),
('2024-03-13', 'PL01332024060', 'Malam', 'Giat Utama', '18:00', 'Poster Selatan', 'Kantor Dishub Kota Surabaya', 4, 0, ''),
('2024-03-13', 'PL01332024061', 'Malam', 'Giat Utama', '18:00', 'Poster Pusat', 'Hitechmall', 2, 0, 'Petir'),
('2024-03-13', 'PL01332024062', 'Malam', 'Giat Utama', '18:00', 'Rumah Bhinneka', 'Jl Nginden Jangkungan', 2, 0, ''),
('2024-03-13', 'PL01332024063', 'Malam', 'Giat Utama', '18:00', 'Graha Bunda Paud', 'Jl Pawiyatan', 1, 0, ''),
('2024-03-13', 'PL01332024064', 'Malam', 'Giat Utama', '18:00', 'RSLT', 'Jl Kedung Cowek', 2, 0, 'Standby di Poster Kedung Cowek (Mobile Checkpoint 1-2 Jam\nsekali)'),
('2024-03-13', 'PL01332024065', 'Malam', 'Giat Utama', '18:00', 'Resepsionis', 'Mako BPBD', 1, 0, 'Srikandi'),
('2024-03-13', 'PL01332024066', 'Malam', 'Giat Utama', '18:00', 'Siaga Mako/Antisipasi Kejadian', 'Mako BPBD', 5, 4, ''),
('2024-03-13', 'PL01332024067', 'Malam', 'Giat Utama', '18:00', 'Posko PMI', 'Jl Sumatra', 1, 0, 'Srikandi'),
('2024-03-13', 'PL01332024068', 'Malam', 'Giat Utama', '18:00', 'Tunjungan Romansa / Antisipasi Pedestrian', '', 1, 2, '1 Driver - Pedestrian Jl Tunjungan - Bawa Kotak P3K'),
('2024-03-13', 'PL01332024069', 'Malam', 'Giat Utama', '18:00', 'Patroli Pedestrian/Antisipasi Kejadian Pusat', '', 2, 3, '1 Driver - TL?Alfalah?Darmo?Arah?Luar?Kota, Pedestrian Kimia Farma Pandegiling, McD Basuki Rahmat, Siola - Bawa Kotak\nP3K'),
('2024-03-13', 'PL01332024070', 'Malam', 'Giat Utama', '18:00', 'Patroli TL dan Pedestrian/antisipasi kejadian Timur', '', 3, 2, '1 Driver - Lapangan Hockey, Depan IRD Dr Soetomo, Halte SMKN 5, TL KONI, Galaksi Mall - Bawa Kotak P3K'),
('2024-03-13', 'PL01332024071', 'Malam', 'Giat Utama', '18:00', 'Patroli Pedestrian/Antisipasi Kejadian Barat', '', 2, 1, '1 Driver - Standby berdiri di Bakso Rindu malam, TMP mayjend Sungkono. Depan kantor Kecamatan Dukuh Pakis, Petra Jl HR\nMuhammad - Bawa Kotak P3K'),
('2024-03-13', 'PL01332024072', 'Malam', 'Giat Utama', '18:00', 'Aplos Perbantuan Pasar Keputran', 'TL Sunda', 1, 1, 'Bawa Kotak P3K - Aplos Shift Pagi'),
('2024-03-13', 'PL01332024073', 'Malam', 'Giat Lanjutan', '22:00', 'Asuhan Rembulan', 'Halaman Taman Surya', 6, 6, ''),
('2024-03-13', 'PL01332024074', 'Malam', 'Giat Lanjutan', '23:00', 'Patroli Wilayah/Antisipasi Kejadian', 'Mobile', 2, 2, 'Bawa Peralatan Chainsaw, Kotak P3K'),
('2024-03-02', 'PL02032024001', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Sedap Malam', 2, 0, 'Jam 06.00 WIB Standby berdiri di lokasi Pedestrian Pintu Selatan sampai Jam 10.00 WIB dan jam 15.00 - 18.00 WIB sesuai\nploting pedestrian'),
('2024-03-02', 'PL02032024002', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Genteng Besar -TIM 6', 1, 0, 'Jam 06.00 Standby berdiri di lokasi Simpang 3 SMA Trimurti\nsampai jam 10.00 WIB dan Jam 15.00 - 18.00 WIB sesuai ploting pedestrian'),
('2024-03-02', 'PL02032024003', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Tidar - TIM 20', 1, 0, 'Standby di TL Embong Malang Goskate Jam 06.00 - 10.00 WIB dan\nJam 15.00 - 18.00 WIB'),
('2024-03-02', 'PL02032024004', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Tugu Pahlawan - Tim 21', 1, 0, 'Standby di lokasi Pedestrian BG Junction Jam 06.00 - 10.00 WIB\ndan Jam 15.00 - 18.00 WIB'),
('2024-03-02', 'PL02032024005', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Indrapura - TIM 22', 1, 0, 'Standby di lokasi Pedestrian Depan Sekolah Takmiriyah Jam\n07.00 - 10.00 WIB dan jam 15.00 - 18.00 WIB'),
('2024-03-02', 'PL02032024006', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Taman Bungkul - TIM 11', 1, 0, 'Jam 06.00 Standby berdiri di TL Bengawan arah masuk kota lanjut geser jam 08.00 WIB  di Lokasi Halte RKZ sampai Jam 10.00 WIB dan jam 15.00 - 18.00 WIB sesuai ploting pedestrian'),
('2024-03-02', 'PL02032024007', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'KBS - TIM 10', 1, 0, 'Jam 06.00 WIB - 10.00 WIB standby berdiri di Zebra?Cross?Jl? Diponegoro?-?Setail?Sisi?Utara?Pos?Pantau arah masuk kota dan Jam 15.00 - 18.00 WIB sesuai ploting pedestrian'),
('2024-03-02', 'PL02032024008', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Taman Sejarah', 1, 0, 'Standby di TL Pasar turi Jam 06.00 - 10.00 WIB, jam 15.00 -\n18.00 WIB'),
('2024-03-02', 'PL02032024009', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'RSIA', 1, 0, 'Standby di lokasi Depan Pos Pantau Jam 06.00 - 10.00 WIB dan\nJam 15.00 -18.00 WIB'),
('2024-03-02', 'PL02032024010', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'UKM Merr', 1, 0, 'Standby di lokasi TL Stikom Jam 06.00 - 10.00 WIB dan Jam 15.00 -\n18.00 WIB'),
('2024-03-02', 'PL02032024011', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Panjang Jiwo', 1, 0, 'Standby di lokasi TL Prapen Jam 06.00 - 10.00 WIB dan Jam 15.00 -\n18.00 WIB'),
('2024-03-02', 'PL02032024012', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Wiyung', 1, 0, 'Standby di lokasi  TL?Babatan  Jam 06.00 - 10.00 WIB dan Jam\n15.00 - 18.00 WIB'),
('2024-03-02', 'PL02032024013', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Taman Pelangi - TIM 2', 1, 0, 'Jam 06.00 Standby berdiri di depan Pos Taman Pelangi lanjut geser jam 08.00 WIB di lokasi Pedestrian DBL Arena sampai Jam\n10.00 WIB dan Jam 15.00 - 18.00 WIB sesuai ploting pedestrian'),
('2024-03-02', 'PL02032024014', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Gelora Pancasila - TIM 12', 1, 0, 'Standby di lokasi Pedestrian Adityawarman KPU Jam 06.00 - 10.00\nWIB dan Jam 15.00 - 18.00 WIB'),
('2024-03-02', 'PL02032024015', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Bambu Runcing - TIM 7', 1, 0, 'Standby di lokasi Tikungan Alun2 Suroboyo Jam 06.00 - 10.00\nWIB dan Jam 15.00 - 18.00 WIB'),
('2024-03-02', 'PL02032024016', 'Pagi', 'Giat Utama', '06:00', 'Gudang Peralatan', 'Menur - TIM 24', 2, 0, '(2 Pawana) Standby di lokasi Pedestrian Samsat Manyar Jam 06.00 -\n10.00 WIB dan jam 15.00 - 18.00 WIB'),
('2024-03-02', 'PL02032024017', 'Pagi', 'Giat Utama', '06:00', 'Gudang Peralatan', 'Hitechmall - TIM 16 dan 28', 2, 0, 'Bantu Kerja Bakti Pembersihan di ZONA 7 Hitech Mall'),
('2024-03-02', 'PL02032024018', 'Pagi', 'Giat Utama', '06:00', 'Poster Barat', 'Kantor Kecamatan Tandes', 3, 0, ''),
('2024-03-02', 'PL02032024019', 'Pagi', 'Giat Utama', '06:00', 'Poster Utara', 'Park n Ride Jl Kasuari', 3, 0, ''),
('2024-03-02', 'PL02032024020', 'Pagi', 'Giat Utama', '06:00', 'Poster Timur', 'Park n Ride Jl Arif Rahman\nHakim', 4, 0, ''),
('2024-03-02', 'PL02032024021', 'Pagi', 'Giat Utama', '06:00', 'Poster Kedung Cowek', 'Kantor Kecamatan Kenjeran', 3, 0, ''),
('2024-03-02', 'PL02032024022', 'Pagi', 'Giat Utama', '06:00', 'Poster Pakis', 'Park n Ride Jl Mayjend\nSungkono', 4, 0, ''),
('2024-03-02', 'PL02032024023', 'Pagi', 'Giat Utama', '06:00', 'Poster Selatan', 'Kantor Dishub Kota Surabaya', 4, 0, ''),
('2024-03-02', 'PL02032024024', 'Pagi', 'Giat Utama', '06:00', 'Poster Pusat', 'Hitechmall', 2, 0, 'Petir'),
('2024-03-02', 'PL02032024025', 'Pagi', 'Giat Utama', '06:00', 'Rumah Bhinneka', 'Jl Nginden Jangkungan', 1, 0, ''),
('2024-03-02', 'PL02032024026', 'Pagi', 'Giat Utama', '06:00', 'Graha Bunda Paud', 'Jl Pawiyatan', 1, 0, ''),
('2024-03-02', 'PL02032024027', 'Pagi', 'Giat Utama', '06:00', 'RSLT', 'Jl Kedung Cowek', 2, 0, 'Standby di Poster Kedung Cowek (Mobile Checkpoint 1-2 Jam\nsekali)'),
('2024-03-02', 'PL02032024028', 'Pagi', 'Giat Utama', '06:00', 'Posko PMI', 'Jl Sumatra', 1, 0, 'Srikandi'),
('2024-03-02', 'PL02032024029', 'Pagi', 'Giat Utama', '06:00', 'Resepsionis', 'Mako BPBD', 1, 0, 'Srikandi'),
('2024-03-02', 'PL02032024030', 'Pagi', 'Giat Utama', '06:00', 'Siaga Mako/Antisipasi Kejadian', 'Mako BPBD', 1, 3, 'Kerja Bakti Rutin'),
('2024-03-02', 'PL02032024031', 'Pagi', 'Giat Utama', '06:00', 'Aplos Perbantuan Pasar Keputran', 'TL Sunda', 1, 1, 'Bawa Kotak P3K - Aplos Shift Malam (ANTISIPASI KEJADIAN\nPUSAT)'),
('2024-03-02', 'PL02032024032', 'Pagi', 'Giat Utama', '06:00', 'Patroli TL dan Pedestrian/antisipasi kejadian Pusat', 'Patroli Checkpoint melakukan pengawasan dan penghalauan anak2/orang yang berada di area sungai ', 3, 2, ''),
('2024-03-02', 'PL02032024033', 'Pagi', 'Giat Utama', '06:00', 'Patroli TL dan Pedestrian/antisipasi kejadian Timur', '', 3, 2, ''),
('2024-03-02', 'PL02032024034', 'Pagi', 'Giat Utama', '06:00', 'Patroli TL dan Pedestrian/antisipasi kejadian Barat', '', 3, 2, ''),
('2024-03-02', 'PL02032024035', 'Pagi', 'Giat Lanjutan', 'Setelah Pedestrian', 'PATROLI WILAYAH ANTISIPASI KEJADIAN / PERUBAHAN CUACA (UPDATE LAPORAN PANWIL DI GRUP)', 'Pusat, Timur, Barat, Utara', 0, 0, 'Bagi tim'),
('2024-03-02', 'PL02032024036', 'Pagi', 'Giat Lanjutan', '08:00', 'Survey lokasi persiapan peringatan Isra miraj dan Pelantikan pengurus serta peresmian Kantor Forum Musyawarah Kyai Kampung Nusantara', 'Masjid Muhajirin', 0, 0, 'Monitor Patroli Pusat'),
('2024-03-02', 'PL02032024037', 'Pagi', 'Giat Lanjutan', '10:30', 'Antisipasi Sholat Jumat', 'Masjid Muhajirin', 0, 0, 'Bawa Kotak P3K'),
('2024-03-02', 'PL02032024038', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Sedap Malam', 2, 0, 'Tetap Standby di Pos Pantau'),
('2024-03-02', 'PL02032024039', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Genteng Besar -TIM 6', 1, 0, 'Standby di lokasi Simpang 3 SMA Trimurti Jam 18.00 - 20.00 WIB\nselanjutnya kembali ke Pos Pantau Genteng Besar'),
('2024-03-02', 'PL02032024040', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Tidar - TIM 20', 1, 0, 'Standby di lokasi Pedestrian Go Skate Embong Malang Jam 18.00 -\n20.00 WIB selanjutnya kembali ke Pos Pantau Tidar'),
('2024-03-02', 'PL02032024041', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Tugu Pahlawan - Tim 21', 1, 0, 'Standby di lokasi Pedestrian BG Junction Jam 18.00 - 20.00 WIB\nselanjutnya kembali ke Pos Pantau Tugu Pahlawan'),
('2024-03-02', 'PL02032024042', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Indrapura - TIM 22', 1, 0, 'Standby di lokasi Pedestrian Depan Sekolah Takmiriyah Jam\n18.00 - 20.00 WIB selanjutnya kembali ke Pos Pantau Taman Kalongan'),
('2024-03-02', 'PL02032024043', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Taman Bungkul - TIM 11', 1, 0, 'Standby di lokasi Halte RKZ Jam 18.00 - 20.00 WIB selanjutnya\nkembali ke Pos Pantau Taman Bungkul'),
('2024-03-02', 'PL02032024044', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'KBS - TIM 10', 1, 0, 'Standby di Zebra?Cross?Jl?Diponegoro?-?Setail?Sisi?Utara?Pos?\nPantau  Jam 18.00 - 20.00 WIB'),
('2024-03-02', 'PL02032024045', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Taman Sejarah', 1, 0, 'Tetap Standby di Pos Pantau'),
('2024-03-02', 'PL02032024046', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'RSIA', 2, 0, 'Tetap Standby di Pos Pantau'),
('2024-03-02', 'PL02032024047', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'UKM Merr', 1, 0, 'Tetap Standby di Pos Pantau'),
('2024-03-02', 'PL02032024048', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Panjang Jiwo', 1, 0, 'Tetap Standby di Pos Pantau'),
('2024-03-02', 'PL02032024049', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Wiyung', 1, 0, 'Standby di lokasi TL?Babatan  Jam 18.00 - 20.00 WIB\nselanjutnya kembali ke Pos Wiyung'),
('2024-03-02', 'PL02032024050', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Taman Pelangi - TIM 2', 1, 0, 'Standby di lokasi Pedestrian DBL Arena Jam 18.00 - 20.00 WIB\nselanjutnya kembali ke Pos Pantau Taman Pelangi'),
('2024-03-02', 'PL02032024051', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Gelora Pancasila - TIM 12', 1, 0, 'Standby di lokasi Pedestrian Adityawarman KPU Jam 18.00 - 20.00 WIB selanjutnya kembali ke Pos Pantau GOR pancasila'),
('2024-03-02', 'PL02032024052', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Bambu Runcing - TIM 7', 1, 0, 'Standby di lokasi Tikungan Granada Jam 18.00 - 20.00 WIB selanjutnya kembali ke Pos Pantau Bambu Runcing'),
('2024-03-02', 'PL02032024053', 'Malam', 'Giat Utama', '18:00', 'Gudang Peralatan', 'Menur - TIM 24', 2, 0, '(2 Pawana) Standby di lokasi Samsat Manyar Jam 18.00 - 20.00\nWIB selanjutnya kembali ke Menur'),
('2024-03-02', 'PL02032024054', 'Malam', 'Giat Utama', '18:00', 'Gudang Peralatan', 'Hitechmall - TIM 16 dan 28', 2, 0, '(2 Pawana) 1 Pawana Standby di lokasi Monkasel, dan 1 Pawana\nStandby Pedestrian Hotel Sahid Jam 18.00 - 20.00 WIB selanjutnya kembali ke Hitech mall'),
('2024-03-02', 'PL02032024055', 'Malam', 'Giat Utama', '18:00', 'Poster Barat', 'Kantor Kecamatan Tandes', 3, 0, ''),
('2024-03-02', 'PL02032024056', 'Malam', 'Giat Utama', '18:00', 'Poster Utara', 'Park n Ride Jl Kasuari', 3, 0, ''),
('2024-03-02', 'PL02032024057', 'Malam', 'Giat Utama', '18:00', 'Poster Timur', 'Park n Ride Jl Arif Rahman\nHakim', 4, 0, ''),
('2024-03-02', 'PL02032024058', 'Malam', 'Giat Utama', '18:00', 'Poster Kedung Cowek', 'Kantor Kecamatan Kenjeran', 3, 0, ''),
('2024-03-02', 'PL02032024059', 'Malam', 'Giat Utama', '18:00', 'Poster Pakis', 'Park n Ride Jl Mayjend\nSungkono', 4, 0, ''),
('2024-03-02', 'PL02032024060', 'Malam', 'Giat Utama', '18:00', 'Poster Selatan', 'Kantor Dishub Kota Surabaya', 4, 0, ''),
('2024-03-02', 'PL02032024061', 'Malam', 'Giat Utama', '18:00', 'Poster Pusat', 'Hitechmall', 2, 0, 'Petir'),
('2024-03-02', 'PL02032024062', 'Malam', 'Giat Utama', '18:00', 'Rumah Bhinneka', 'Jl Nginden Jangkungan', 2, 0, ''),
('2024-03-02', 'PL02032024063', 'Malam', 'Giat Utama', '18:00', 'Graha Bunda Paud', 'Jl Pawiyatan', 1, 0, ''),
('2024-03-02', 'PL02032024064', 'Malam', 'Giat Utama', '18:00', 'RSLT', 'Jl Kedung Cowek', 2, 0, 'Standby di Poster Kedung Cowek (Mobile Checkpoint 1-2 Jam\nsekali)'),
('2024-03-02', 'PL02032024065', 'Malam', 'Giat Utama', '18:00', 'Resepsionis', 'Mako BPBD', 1, 0, 'Srikandi'),
('2024-03-02', 'PL02032024066', 'Malam', 'Giat Utama', '18:00', 'Siaga Mako/Antisipasi Kejadian', 'Mako BPBD', 5, 4, ''),
('2024-03-02', 'PL02032024067', 'Malam', 'Giat Utama', '18:00', 'Posko PMI', 'Jl Sumatra', 1, 0, 'Srikandi'),
('2024-03-02', 'PL02032024068', 'Malam', 'Giat Utama', '18:00', 'Tunjungan Romansa / Antisipasi Pedestrian', '', 1, 2, '1 Driver - Pedestrian Jl Tunjungan - Bawa Kotak P3K'),
('2024-03-02', 'PL02032024069', 'Malam', 'Giat Utama', '18:00', 'Patroli Pedestrian/Antisipasi Kejadian Pusat', '', 2, 3, '1 Driver - TL?Alfalah?Darmo?Arah?Luar?Kota, Pedestrian Kimia Farma Pandegiling, McD Basuki Rahmat, Siola - Bawa Kotak\nP3K'),
('2024-03-02', 'PL02032024070', 'Malam', 'Giat Utama', '18:00', 'Patroli TL dan Pedestrian/antisipasi kejadian Timur', '', 3, 2, '1 Driver - Lapangan Hockey, Depan IRD Dr Soetomo, Halte SMKN 5, TL KONI, Galaksi Mall - Bawa Kotak P3K'),
('2024-03-02', 'PL02032024071', 'Malam', 'Giat Utama', '18:00', 'Patroli Pedestrian/Antisipasi Kejadian Barat', '', 2, 1, '1 Driver - Standby berdiri di Bakso Rindu malam, TMP mayjend Sungkono. Depan kantor Kecamatan Dukuh Pakis, Petra Jl HR\nMuhammad - Bawa Kotak P3K'),
('2024-03-02', 'PL02032024072', 'Malam', 'Giat Utama', '18:00', 'Aplos Perbantuan Pasar Keputran', 'TL Sunda', 1, 1, 'Bawa Kotak P3K - Aplos Shift Pagi'),
('2024-03-02', 'PL02032024073', 'Malam', 'Giat Lanjutan', '21:30', 'Pengambilan Lampu Sorot Penerangan kegiatan pembersihan RPH Babi oleh\nDSDABM, DPRKPP dan DLH', 'RPH Sebelah utara Kelurahan Ampel Jl Pegirian', 0, 0, ''),
('2024-03-02', 'PL02032024074', 'Malam', 'Giat Lanjutan', '22:00', 'Asuhan Rembulan', 'Halaman Taman Surya', 6, 6, ''),
('2024-03-02', 'PL02032024075', 'Malam', 'Giat Lanjutan', '23:00', 'Patroli Wilayah/Antisipasi Kejadian', 'Mobile', 2, 2, 'Bawa Peralatan Chainsaw, Kotak P3K'),
('2024-03-02', 'PL02032024076', 'Malam', 'Giat Lanjutan', '', 'Pengecekan dan pengondisian\nKelengkapan Pos Pantau, Pos Terpadu, CC Room', '', 0, 0, 'Tindaklanjut Wadanki dibantu Danru - Laporan serah terima shift pagi'),
('2024-03-03', 'PL03032024001', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Sedap Malam', 2, 0, 'Jam 06.00 WIB Standby berdiri di lokasi Pedestrian Pintu Selatan sampai Jam 10.00 WIB dan jam 15.00 - 18.00 WIB sesuai\nploting pedestrian'),
('2024-03-03', 'PL03032024002', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Genteng Besar -TIM 6', 1, 0, 'Jam 06.00 Standby berdiri di lokasi Simpang 3 SMA Trimurti\nsampai jam 10.00 WIB dan Jam 15.00 - 18.00 WIB sesuai ploting pedestrian'),
('2024-03-03', 'PL03032024003', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Tidar - TIM 20', 1, 0, 'Standby di TL Embong Malang Goskate Jam 06.00 - 10.00 WIB dan\nJam 15.00 - 18.00 WIB'),
('2024-03-03', 'PL03032024004', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Tugu Pahlawan - Tim 21', 1, 0, 'Standby di lokasi Pedestrian BG Junction Jam 06.00 - 10.00 WIB\ndan Jam 15.00 - 18.00 WIB'),
('2024-03-03', 'PL03032024005', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Indrapura - TIM 22', 1, 0, 'Standby di lokasi Pedestrian Depan Sekolah Takmiriyah Jam\n07.00 - 10.00 WIB dan jam 15.00 - 18.00 WIB'),
('2024-03-03', 'PL03032024006', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Taman Bungkul - TIM 11', 1, 0, 'Jam 06.00 Standby berdiri di TL Bengawan arah masuk kota lanjut geser jam 08.00 WIB  di Lokasi Halte RKZ sampai Jam 10.00 WIB dan jam 15.00 - 18.00 WIB sesuai ploting pedestrian'),
('2024-03-03', 'PL03032024007', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'KBS - TIM 10', 1, 0, 'Jam 06.00 WIB - 10.00 WIB standby berdiri di Zebra?Cross?Jl? Diponegoro?-?Setail?Sisi?Utara?Pos?Pantau arah masuk kota dan Jam 15.00 - 18.00 WIB sesuai ploting pedestrian'),
('2024-03-03', 'PL03032024008', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Taman Sejarah', 1, 0, 'Standby di TL Pasar turi Jam 06.00 - 10.00 WIB, jam 15.00 -\n18.00 WIB'),
('2024-03-03', 'PL03032024009', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'RSIA', 1, 0, 'Standby di lokasi Depan Pos Pantau Jam 06.00 - 10.00 WIB dan\nJam 15.00 -18.00 WIB'),
('2024-03-03', 'PL03032024010', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'UKM Merr', 1, 0, 'Standby di lokasi TL Stikom Jam 06.00 - 10.00 WIB dan Jam 15.00 -\n18.00 WIB'),
('2024-03-03', 'PL03032024011', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Panjang Jiwo', 1, 0, 'Standby di lokasi TL Prapen Jam 06.00 - 10.00 WIB dan Jam 15.00 -\n18.00 WIB'),
('2024-03-03', 'PL03032024012', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Wiyung', 1, 0, 'Standby di lokasi  TL?Babatan  Jam 06.00 - 10.00 WIB dan Jam\n15.00 - 18.00 WIB'),
('2024-03-03', 'PL03032024013', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Taman Pelangi - TIM 2', 1, 0, 'Jam 06.00 Standby berdiri di depan Pos Taman Pelangi lanjut geser jam 08.00 WIB di lokasi Pedestrian DBL Arena sampai Jam\n10.00 WIB dan Jam 15.00 - 18.00 WIB sesuai ploting pedestrian'),
('2024-03-03', 'PL03032024014', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Gelora Pancasila - TIM 12', 1, 0, 'Standby di lokasi Pedestrian Adityawarman KPU Jam 06.00 - 10.00\nWIB dan Jam 15.00 - 18.00 WIB'),
('2024-03-03', 'PL03032024015', 'Pagi', 'Giat Utama', '06:00', 'Pos Pantau', 'Bambu Runcing - TIM 7', 1, 0, 'Standby di lokasi Tikungan Alun2 Suroboyo Jam 06.00 - 10.00\nWIB dan Jam 15.00 - 18.00 WIB'),
('2024-03-03', 'PL03032024016', 'Pagi', 'Giat Utama', '06:00', 'Gudang Peralatan', 'Menur - TIM 24', 2, 0, '(2 Pawana) Standby di lokasi Pedestrian Samsat Manyar Jam 06.00 -\n10.00 WIB dan jam 15.00 - 18.00 WIB'),
('2024-03-03', 'PL03032024017', 'Pagi', 'Giat Utama', '06:00', 'Gudang Peralatan', 'Hitechmall - TIM 16 dan 28', 2, 0, 'Bantu Kerja Bakti Pembersihan di ZONA 7 Hitech Mall'),
('2024-03-03', 'PL03032024018', 'Pagi', 'Giat Utama', '06:00', 'Poster Barat', 'Kantor Kecamatan Tandes', 3, 0, ''),
('2024-03-03', 'PL03032024019', 'Pagi', 'Giat Utama', '06:00', 'Poster Utara', 'Park n Ride Jl Kasuari', 3, 0, ''),
('2024-03-03', 'PL03032024020', 'Pagi', 'Giat Utama', '06:00', 'Poster Timur', 'Park n Ride Jl Arif Rahman\nHakim', 4, 0, ''),
('2024-03-03', 'PL03032024021', 'Pagi', 'Giat Utama', '06:00', 'Poster Kedung Cowek', 'Kantor Kecamatan Kenjeran', 3, 0, ''),
('2024-03-03', 'PL03032024022', 'Pagi', 'Giat Utama', '06:00', 'Poster Pakis', 'Park n Ride Jl Mayjend\nSungkono', 4, 0, ''),
('2024-03-03', 'PL03032024023', 'Pagi', 'Giat Utama', '06:00', 'Poster Selatan', 'Kantor Dishub Kota Surabaya', 4, 0, ''),
('2024-03-03', 'PL03032024024', 'Pagi', 'Giat Utama', '06:00', 'Poster Pusat', 'Hitechmall', 2, 0, 'Petir'),
('2024-03-03', 'PL03032024025', 'Pagi', 'Giat Utama', '06:00', 'Rumah Bhinneka', 'Jl Nginden Jangkungan', 1, 0, ''),
('2024-03-03', 'PL03032024026', 'Pagi', 'Giat Utama', '06:00', 'Graha Bunda Paud', 'Jl Pawiyatan', 1, 0, ''),
('2024-03-03', 'PL03032024027', 'Pagi', 'Giat Utama', '06:00', 'RSLT', 'Jl Kedung Cowek', 2, 0, 'Standby di Poster Kedung Cowek (Mobile Checkpoint 1-2 Jam\nsekali)'),
('2024-03-03', 'PL03032024028', 'Pagi', 'Giat Utama', '06:00', 'Posko PMI', 'Jl Sumatra', 1, 0, 'Srikandi'),
('2024-03-03', 'PL03032024029', 'Pagi', 'Giat Utama', '06:00', 'Resepsionis', 'Mako BPBD', 1, 0, 'Srikandi'),
('2024-03-03', 'PL03032024030', 'Pagi', 'Giat Utama', '06:00', 'Siaga Mako/Antisipasi Kejadian', 'Mako BPBD', 1, 3, 'Kerja Bakti Rutin'),
('2024-03-03', 'PL03032024031', 'Pagi', 'Giat Utama', '06:00', 'Aplos Perbantuan Pasar Keputran', 'TL Sunda', 1, 1, 'Bawa Kotak P3K - Aplos Shift Malam (ANTISIPASI KEJADIAN\nPUSAT)'),
('2024-03-03', 'PL03032024032', 'Pagi', 'Giat Utama', '06:00', 'Patroli TL dan Pedestrian/antisipasi kejadian Pusat', 'Patroli Checkpoint melakukan pengawasan dan penghalauan anak2/orang yang berada di area sungai ', 3, 2, ''),
('2024-03-03', 'PL03032024033', 'Pagi', 'Giat Utama', '06:00', 'Patroli TL dan Pedestrian/antisipasi kejadian Timur', '', 3, 2, ''),
('2024-03-03', 'PL03032024034', 'Pagi', 'Giat Utama', '06:00', 'Patroli TL dan Pedestrian/antisipasi kejadian Barat', '', 3, 2, ''),
('2024-03-03', 'PL03032024035', 'Pagi', 'Giat Lanjutan', 'Setelah Pedestrian', 'PATROLI WILAYAH ANTISIPASI KEJADIAN / PERUBAHAN CUACA (UPDATE LAPORAN PANWIL DI GRUP)', 'Pusat, Timur, Barat, Utara', 0, 0, 'Bagi tim'),
('2024-03-03', 'PL03032024036', 'Pagi', 'Giat Lanjutan', '08:00', 'Survey lokasi persiapan peringatan Isra miraj dan Pelantikan pengurus serta peresmian Kantor Forum Musyawarah Kyai Kampung Nusantara', 'Masjid Muhajirin', 0, 0, 'Monitor Patroli Pusat'),
('2024-03-03', 'PL03032024037', 'Pagi', 'Giat Lanjutan', '10:30', 'Antisipasi Sholat Jumat', 'Masjid Muhajirin', 0, 0, 'Bawa Kotak P3K'),
('2024-03-03', 'PL03032024038', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Sedap Malam', 2, 0, 'Tetap Standby di Pos Pantau'),
('2024-03-03', 'PL03032024039', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Genteng Besar -TIM 6', 1, 0, 'Standby di lokasi Simpang 3 SMA Trimurti Jam 18.00 - 20.00 WIB\nselanjutnya kembali ke Pos Pantau Genteng Besar'),
('2024-03-03', 'PL03032024040', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Tidar - TIM 20', 1, 0, 'Standby di lokasi Pedestrian Go Skate Embong Malang Jam 18.00 -\n20.00 WIB selanjutnya kembali ke Pos Pantau Tidar'),
('2024-03-03', 'PL03032024041', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Tugu Pahlawan - Tim 21', 1, 0, 'Standby di lokasi Pedestrian BG Junction Jam 18.00 - 20.00 WIB\nselanjutnya kembali ke Pos Pantau Tugu Pahlawan'),
('2024-03-03', 'PL03032024042', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Indrapura - TIM 22', 1, 0, 'Standby di lokasi Pedestrian Depan Sekolah Takmiriyah Jam\n18.00 - 20.00 WIB selanjutnya kembali ke Pos Pantau Taman Kalongan'),
('2024-03-03', 'PL03032024043', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Taman Bungkul - TIM 11', 1, 0, 'Standby di lokasi Halte RKZ Jam 18.00 - 20.00 WIB selanjutnya\nkembali ke Pos Pantau Taman Bungkul'),
('2024-03-03', 'PL03032024044', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'KBS - TIM 10', 1, 0, 'Standby di Zebra?Cross?Jl?Diponegoro?-?Setail?Sisi?Utara?Pos?\nPantau  Jam 18.00 - 20.00 WIB'),
('2024-03-03', 'PL03032024045', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Taman Sejarah', 1, 0, 'Tetap Standby di Pos Pantau'),
('2024-03-03', 'PL03032024046', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'RSIA', 2, 0, 'Tetap Standby di Pos Pantau'),
('2024-03-03', 'PL03032024047', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'UKM Merr', 1, 0, 'Tetap Standby di Pos Pantau'),
('2024-03-03', 'PL03032024048', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Panjang Jiwo', 1, 0, 'Tetap Standby di Pos Pantau'),
('2024-03-03', 'PL03032024049', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Wiyung', 1, 0, 'Standby di lokasi TL?Babatan  Jam 18.00 - 20.00 WIB\nselanjutnya kembali ke Pos Wiyung'),
('2024-03-03', 'PL03032024050', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Taman Pelangi - TIM 2', 1, 0, 'Standby di lokasi Pedestrian DBL Arena Jam 18.00 - 20.00 WIB\nselanjutnya kembali ke Pos Pantau Taman Pelangi'),
('2024-03-03', 'PL03032024051', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Gelora Pancasila - TIM 12', 1, 0, 'Standby di lokasi Pedestrian Adityawarman KPU Jam 18.00 - 20.00 WIB selanjutnya kembali ke Pos Pantau GOR pancasila'),
('2024-03-03', 'PL03032024052', 'Malam', 'Giat Utama', '18:00', 'Pos Pantau', 'Bambu Runcing - TIM 7', 1, 0, 'Standby di lokasi Tikungan Granada Jam 18.00 - 20.00 WIB selanjutnya kembali ke Pos Pantau Bambu Runcing');
INSERT INTO `tabel_kegiatan` (`tanggal`, `id_kegiatan`, `shift`, `giat`, `waktu_kegiatan`, `kegiatan`, `lokasi_kegiatan`, `jumlah_personel`, `jumlah_jarko`, `keterangan`) VALUES
('2024-03-03', 'PL03032024053', 'Malam', 'Giat Utama', '18:00', 'Gudang Peralatan', 'Menur - TIM 24', 2, 0, '(2 Pawana) Standby di lokasi Samsat Manyar Jam 18.00 - 20.00\nWIB selanjutnya kembali ke Menur'),
('2024-03-03', 'PL03032024054', 'Malam', 'Giat Utama', '18:00', 'Gudang Peralatan', 'Hitechmall - TIM 16 dan 28', 2, 0, '(2 Pawana) 1 Pawana Standby di lokasi Monkasel, dan 1 Pawana\nStandby Pedestrian Hotel Sahid Jam 18.00 - 20.00 WIB selanjutnya kembali ke Hitech mall'),
('2024-03-03', 'PL03032024055', 'Malam', 'Giat Utama', '18:00', 'Poster Barat', 'Kantor Kecamatan Tandes', 3, 0, ''),
('2024-03-03', 'PL03032024056', 'Malam', 'Giat Utama', '18:00', 'Poster Utara', 'Park n Ride Jl Kasuari', 3, 0, ''),
('2024-03-03', 'PL03032024057', 'Malam', 'Giat Utama', '18:00', 'Poster Timur', 'Park n Ride Jl Arif Rahman\nHakim', 4, 0, ''),
('2024-03-03', 'PL03032024058', 'Malam', 'Giat Utama', '18:00', 'Poster Kedung Cowek', 'Kantor Kecamatan Kenjeran', 3, 0, ''),
('2024-03-03', 'PL03032024059', 'Malam', 'Giat Utama', '18:00', 'Poster Pakis', 'Park n Ride Jl Mayjend\nSungkono', 4, 0, ''),
('2024-03-03', 'PL03032024060', 'Malam', 'Giat Utama', '18:00', 'Poster Selatan', 'Kantor Dishub Kota Surabaya', 4, 0, ''),
('2024-03-03', 'PL03032024061', 'Malam', 'Giat Utama', '18:00', 'Poster Pusat', 'Hitechmall', 2, 0, 'Petir'),
('2024-03-03', 'PL03032024062', 'Malam', 'Giat Utama', '18:00', 'Rumah Bhinneka', 'Jl Nginden Jangkungan', 2, 0, ''),
('2024-03-03', 'PL03032024063', 'Malam', 'Giat Utama', '18:00', 'Graha Bunda Paud', 'Jl Pawiyatan', 1, 0, ''),
('2024-03-03', 'PL03032024064', 'Malam', 'Giat Utama', '18:00', 'RSLT', 'Jl Kedung Cowek', 2, 0, 'Standby di Poster Kedung Cowek (Mobile Checkpoint 1-2 Jam\nsekali)'),
('2024-03-03', 'PL03032024065', 'Malam', 'Giat Utama', '18:00', 'Resepsionis', 'Mako BPBD', 1, 0, 'Srikandi'),
('2024-03-03', 'PL03032024066', 'Malam', 'Giat Utama', '18:00', 'Siaga Mako/Antisipasi Kejadian', 'Mako BPBD', 5, 4, ''),
('2024-03-03', 'PL03032024067', 'Malam', 'Giat Utama', '18:00', 'Posko PMI', 'Jl Sumatra', 1, 0, 'Srikandi'),
('2024-03-03', 'PL03032024068', 'Malam', 'Giat Utama', '18:00', 'Tunjungan Romansa / Antisipasi Pedestrian', '', 1, 2, '1 Driver - Pedestrian Jl Tunjungan - Bawa Kotak P3K'),
('2024-03-03', 'PL03032024069', 'Malam', 'Giat Utama', '18:00', 'Patroli Pedestrian/Antisipasi Kejadian Pusat', '', 2, 3, '1 Driver - TL?Alfalah?Darmo?Arah?Luar?Kota, Pedestrian Kimia Farma Pandegiling, McD Basuki Rahmat, Siola - Bawa Kotak\nP3K'),
('2024-03-03', 'PL03032024070', 'Malam', 'Giat Utama', '18:00', 'Patroli TL dan Pedestrian/antisipasi kejadian Timur', '', 3, 2, '1 Driver - Lapangan Hockey, Depan IRD Dr Soetomo, Halte SMKN 5, TL KONI, Galaksi Mall - Bawa Kotak P3K'),
('2024-03-03', 'PL03032024071', 'Malam', 'Giat Utama', '18:00', 'Patroli Pedestrian/Antisipasi Kejadian Barat', '', 2, 1, '1 Driver - Standby berdiri di Bakso Rindu malam, TMP mayjend Sungkono. Depan kantor Kecamatan Dukuh Pakis, Petra Jl HR\nMuhammad - Bawa Kotak P3K'),
('2024-03-03', 'PL03032024072', 'Malam', 'Giat Utama', '18:00', 'Aplos Perbantuan Pasar Keputran', 'TL Sunda', 1, 1, 'Bawa Kotak P3K - Aplos Shift Pagi'),
('2024-03-03', 'PL03032024073', 'Malam', 'Giat Lanjutan', '22:00', 'Asuhan Rembulan', 'Halaman Taman Surya', 6, 6, ''),
('2024-03-03', 'PL03032024074', 'Malam', 'Giat Lanjutan', '23:00', 'Patroli Wilayah/Antisipasi Kejadian', 'Mobile', 2, 2, 'Bawa Peralatan Chainsaw, Kotak P3K'),
('2024-07-03', 'PL03072024001', 'Pagi', '', '', 'Pos Pantau', 'Bambu Runcing', 1, 1, 'ket');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_penugasan_petugas`
--

CREATE TABLE `tabel_penugasan_petugas` (
  `id_kegiatan` varchar(50) NOT NULL,
  `id_penugasan` varchar(50) NOT NULL,
  `id_petugas` varchar(50) NOT NULL,
  `lokasi_kegiatan` text NOT NULL,
  `tanggal` date NOT NULL,
  `shift` varchar(10) NOT NULL,
  `no_wa` varchar(20) NOT NULL,
  `uraian_kegiatan` text NOT NULL,
  `dokumentasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tabel_penugasan_petugas`
--

INSERT INTO `tabel_penugasan_petugas` (`id_kegiatan`, `id_penugasan`, `id_petugas`, `lokasi_kegiatan`, `tanggal`, `shift`, `no_wa`, `uraian_kegiatan`, `dokumentasi`) VALUES
('PL01032024001', 'TL01032024002', '4', 'Sedap Malam', '2024-03-01', 'Pagi', '0855546315446', 'Penjagaan kesehatan ', '[\"55854cfe6668d47afa073d7acbb00649.png\"]'),
('PL01032024001', 'TL01032024003', '6', 'Sedap Malam', '2024-03-01', 'Pagi', '0855546315446', 'Penjagaan kesehatan ', '[\"55854cfe6668d47afa073d7acbb00649.png\"]'),
('PL01032024001', 'TL01032024004', '5', 'Sedap Malam', '2024-03-01', 'Pagi', '0855546315446', 'Penjagaan kesehatan ', '[\"55854cfe6668d47afa073d7acbb00649.png\"]'),
('PL01032024001', 'TL01032024005', '15', 'Sedap Malam', '2024-03-01', 'Pagi', '0855546315446', 'Penjagaan kesehatan ', '[\"55854cfe6668d47afa073d7acbb00649.png\"]'),
('PL03072024001', 'TL03072024001', '102', 'Bambu Runcing', '2024-07-03', 'Pagi', '0999', 'oo', '[\"6e90149bc47363c19d890a43a7b513ce.jpg\"]');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_group`
--

CREATE TABLE `tb_group` (
  `id_group` mediumint(8) UNSIGNED NOT NULL,
  `nama_group` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_group`
--

INSERT INTO `tb_group` (`id_group`, `nama_group`, `keterangan`) VALUES
(1, 'admin', 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas_harian`
--

CREATE TABLE `tugas_harian` (
  `id_tugas_harian` varchar(15) NOT NULL,
  `nama_staff` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `uraian_kegiatan` varchar(100) DEFAULT NULL,
  `penanggung_jawab` varchar(100) DEFAULT NULL,
  `hasil_kegiatan` varchar(100) DEFAULT NULL,
  `dokumentasi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tugas_harian`
--

INSERT INTO `tugas_harian` (`id_tugas_harian`, `nama_staff`, `tanggal`, `waktu`, `lokasi`, `uraian_kegiatan`, `penanggung_jawab`, `hasil_kegiatan`, `dokumentasi`) VALUES
('TH10072024001', 'SAUSAN MUFIDAH', '2024-07-10', '03:49:00', 'akuef', 'uayo', 'Kasubbag Keuangan', 'akuwts', '[\"fa0b76421b93d3bf12118391e8554374.png\"]'),
('TH10072024003', 'NUNGKI PERMATASARI', '2024-07-10', '10:49:00', 'AUIWT', 'IUATIU', 'Sekretaris Badan', 'AJSYTRI', 'default.png'),
('TH22072024001', 'MUHAMMAD AULIA RAHMANSYAH', '2024-07-22', '11:20:00', 'balkot', '-', 'Kepala Badan', '-', '[\"47a4dde258183e6829cb6c8777a0337e.jpg\"]'),
('TH26072024001', 'SAUSAN MUFIDAH', '2024-07-26', '16:03:00', 'ouhvefob0bhr2bh', 'jkwfweof', 'Kasubbag Keuangan', 'f3;ojpfo3', '[\"7f75e871a898fe60a3c6b65aca6d7a29.jpg\"]');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nama_depan` varchar(50) DEFAULT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  `no_telp` varchar(50) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`, `email`, `nama_depan`, `nama_belakang`, `no_telp`, `code`, `active`, `date_created`, `date_updated`) VALUES
(1, 'admin', '1c0834da7b54209f9f5237f19f04e4e3', 1, 'novelben@gmail.com', 'Administrator', 'BPBD', '085231669716', NULL, NULL, '2020-02-13 13:56:09', NULL),
(2, 'artikel', '4d2ba5d462fc6a43179a40a345d628b0', 20, 'artikel@gmail.com', 'Penyusun', 'Artikel', '929139219042', NULL, NULL, '2021-09-28 13:57:57', NULL),
(3, 'admin1', '13233', 1, 'hhauyha@gmail.com', 'Administrator', 'BPBD', '085231669716', NULL, NULL, '2020-02-13 13:56:09', NULL),
(4, 'dianita', '8ec94b4f810b77b8d83e686e875fc423', 1, 'email@email.com', 'Nita', 'Nita', '08111111111', NULL, NULL, '2024-05-14 11:03:43', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 3),
(3, 3, 2),
(4, 4, 4),
(5, 5, 3),
(6, 6, 5),
(7, 8, 2),
(8, 9, 2),
(9, 10, 3),
(10, 11, 3),
(11, 12, 2),
(12, 13, 2),
(13, 14, 2),
(14, 15, 2),
(15, 16, 2),
(16, 17, 2),
(17, 18, 2),
(18, 19, 2),
(19, 20, 2),
(20, 21, 2),
(21, 22, 2),
(22, 23, 2),
(23, 24, 2),
(24, 25, 2),
(25, 26, 2),
(26, 27, 2),
(27, 28, 2),
(28, 29, 2),
(29, 30, 2),
(30, 31, 2),
(31, 32, 2),
(32, 33, 2),
(33, 34, 2),
(34, 35, 5),
(35, 36, 2),
(36, 37, 2),
(37, 38, 2),
(38, 39, 2),
(39, 40, 2),
(40, 41, 2),
(41, 42, 2),
(42, 43, 2),
(43, 44, 2),
(44, 45, 5),
(45, 46, 5),
(46, 47, 5),
(47, 48, 5),
(48, 49, 5),
(49, 50, 5),
(50, 51, 2),
(51, 52, 1),
(52, 53, 5),
(53, 54, 2),
(54, 55, 2),
(55, 56, 2),
(56, 57, 2),
(57, 58, 2),
(58, 59, 2),
(59, 60, 2),
(60, 61, 2),
(61, 62, 2),
(62, 63, 2),
(63, 64, 2),
(64, 65, 2),
(65, 66, 2),
(66, 67, 2),
(67, 68, 2),
(68, 69, 2),
(69, 70, 2),
(70, 71, 2),
(71, 72, 5),
(72, 73, 6),
(73, 74, 6),
(74, 75, 6),
(75, 76, 6),
(76, 77, 6),
(77, 78, 6),
(78, 79, 6),
(79, 80, 5),
(80, 81, 6),
(81, 82, 5),
(82, 83, 5),
(83, 84, 5),
(84, 85, 5),
(85, 86, 5),
(86, 87, 5),
(87, 88, 5),
(88, 89, 5),
(89, 90, 6),
(90, 91, 6),
(91, 92, 6),
(92, 93, 6),
(93, 94, 6),
(94, 95, 6),
(95, 96, 6),
(96, 97, 6),
(97, 98, 6),
(98, 99, 6),
(99, 100, 6),
(100, 101, 6),
(101, 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wilayah_2022`
--

CREATE TABLE `wilayah_2022` (
  `DESA` text DEFAULT NULL,
  `PROVINSI` text DEFAULT NULL,
  `KAB_KOTA` text DEFAULT NULL,
  `KECAMATAN` text DEFAULT NULL,
  `WILAYAH` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `wilayah_2022`
--

INSERT INTO `wilayah_2022` (`DESA`, `PROVINSI`, `KAB_KOTA`, `KECAMATAN`, `WILAYAH`) VALUES
('PACARKEMBANG', 'JAWA TIMUR', 'SURABAYA', 'TAMBAKSARI', 'SURABAYA TIMUR'),
('ALUN-ALUN CONTONG', 'JAWA TIMUR', 'SURABAYA', 'BUBUTAN', 'SURABAYA PUSAT'),
('BUBUTAN', 'JAWA TIMUR', 'SURABAYA', 'BUBUTAN', 'SURABAYA PUSAT'),
('JEPARA', 'JAWA TIMUR', 'SURABAYA', 'BUBUTAN', 'SURABAYA PUSAT'),
('TANDES', 'JAWA TIMUR', 'SURABAYA', 'TANDES', 'SURABAYA BARAT'),
('SEMEMI', 'JAWA TIMUR', 'SURABAYA', 'BENOWO', 'SURABAYA BARAT'),
('TAMBAK SARIOSO', 'JAWA TIMUR', 'SURABAYA', 'ASEM ROWO', 'SURABAYA BARAT'),
('BULAK', 'JAWA TIMUR', 'SURABAYA', 'BULAK', 'SURABAYA UTARA'),
('KETABANG', 'JAWA TIMUR', 'SURABAYA', 'GENTENG', 'SURABAYA PUSAT'),
('KARANGPILANG', 'JAWA TIMUR', 'SURABAYA', 'KARANGPILANG', 'SURABAYA SELATAN'),
('SIDOSERMO', 'JAWA TIMUR', 'SURABAYA', 'WONOCOLO', 'SURABAYA SELATAN'),
('KALIRUNGKUT', 'JAWA TIMUR', 'SURABAYA', 'RUNGKUT', 'SURABAYA TIMUR'),
('NGAGEL', 'JAWA TIMUR', 'SURABAYA', 'WONOKROMO', 'SURABAYA SELATAN'),
('RUNGKUT KIDUL', 'JAWA TIMUR', 'SURABAYA', 'RUNGKUT', 'SURABAYA TIMUR'),
('KEDUNG BARUK', 'JAWA TIMUR', 'SURABAYA', 'RUNGKUT', 'SURABAYA TIMUR'),
('WONOREJO', 'JAWA TIMUR', 'SURABAYA', 'RUNGKUT', 'SURABAYA TIMUR'),
('MEDOKAN AYU', 'JAWA TIMUR', 'SURABAYA', 'RUNGKUT', 'SURABAYA TIMUR'),
('WONOKROMO', 'JAWA TIMUR', 'SURABAYA', 'WONOKROMO', 'SURABAYA SELATAN'),
('SAWUNGGALING', 'JAWA TIMUR', 'SURABAYA', 'WONOKROMO', 'SURABAYA SELATAN'),
('WONOREJO', 'JAWA TIMUR', 'SURABAYA', 'TEGALSARI', 'SURABAYA PUSAT'),
('SAWAHAN', 'JAWA TIMUR', 'SURABAYA', 'SAWAHAN', 'SURABAYA SELATAN'),
('TEGALSARI', 'JAWA TIMUR', 'SURABAYA', 'TEGALSARI', 'SURABAYA PUSAT'),
('BANYUURIP', 'JAWA TIMUR', 'SURABAYA', 'SAWAHAN', 'SURABAYA SELATAN'),
('GENTENG', 'JAWA TIMUR', 'SURABAYA', 'GENTENG', 'SURABAYA PUSAT'),
('DR. SOETOMO', 'JAWA TIMUR', 'SURABAYA', 'TEGALSARI', 'SURABAYA PUSAT'),
('KEDUNGDORO', 'JAWA TIMUR', 'SURABAYA', 'TEGALSARI', 'SURABAYA PUSAT'),
('AIRLANGGA', 'JAWA TIMUR', 'SURABAYA', 'GUBENG', 'SURABAYA TIMUR'),
('BARATAJAYA', 'JAWA TIMUR', 'SURABAYA', 'GUBENG', 'SURABAYA TIMUR'),
('GEBANG PUTIH', 'JAWA TIMUR', 'SURABAYA', 'SUKOLILO', 'SURABAYA TIMUR'),
('GADING', 'JAWA TIMUR', 'SURABAYA', 'TAMBAKSARI', 'SURABAYA TIMUR'),
('MENUR PUMPUNGAN', 'JAWA TIMUR', 'SURABAYA', 'SUKOLILO', 'SURABAYA TIMUR'),
('NGINDEN JANGKUNGAN', 'JAWA TIMUR', 'SURABAYA', 'SUKOLILO', 'SURABAYA TIMUR'),
('SEMOLOWARU', 'JAWA TIMUR', 'SURABAYA', 'SUKOLILO', 'SURABAYA TIMUR'),
('RANGKAH', 'JAWA TIMUR', 'SURABAYA', 'TAMBAKSARI', 'SURABAYA TIMUR'),
('SIDODADI', 'JAWA TIMUR', 'SURABAYA', 'SIMOKERTO', 'SURABAYA PUSAT'),
('BONGKARAN', 'JAWA TIMUR', 'SURABAYA', 'PABEAN CANTIKAN', 'SURABAYA UTARA'),
('KREMBANGAN UTARA', 'JAWA TIMUR', 'SURABAYA', 'PABEAN CANTIKAN', 'SURABAYA UTARA'),
('MANUKAN KULON', 'JAWA TIMUR', 'SURABAYA', 'TANDES', 'SURABAYA BARAT'),
('KREMBANGAN SELATAN', 'JAWA TIMUR', 'SURABAYA', 'KREMBANGAN', 'SURABAYA UTARA'),
('PERAK BARAT', 'JAWA TIMUR', 'SURABAYA', 'KREMBANGAN', 'SURABAYA UTARA'),
('MOROKREMBANGAN', 'JAWA TIMUR', 'SURABAYA', 'KREMBANGAN', 'SURABAYA UTARA'),
('AMPEL', 'JAWA TIMUR', 'SURABAYA', 'SEMAMPIR', 'SURABAYA UTARA'),
('PEGIRIKAN', 'JAWA TIMUR', 'SURABAYA', 'SEMAMPIR', 'SURABAYA UTARA'),
('SIDOTOPO', 'JAWA TIMUR', 'SURABAYA', 'SEMAMPIR', 'SURABAYA UTARA'),
('SIDOTOPO WETAN', 'JAWA TIMUR', 'SURABAYA', 'KENJERAN', 'SURABAYA UTARA'),
('TAMBAK WEDI', 'JAWA TIMUR', 'SURABAYA', 'KENJERAN', 'SURABAYA UTARA'),
('BANGKINGAN', 'JAWA TIMUR', 'SURABAYA', 'LAKARSANTRI', 'SURABAYA BARAT'),
('LIDAH KULON', 'JAWA TIMUR', 'SURABAYA', 'LAKARSANTRI', 'SURABAYA BARAT'),
('SUMUR WELUT', 'JAWA TIMUR', 'SURABAYA', 'LAKARSANTRI', 'SURABAYA BARAT'),
('KANDANGAN', 'JAWA TIMUR', 'SURABAYA', 'BENOWO', 'SURABAYA BARAT'),
('TAMBAK OSOWILANGUN', 'JAWA TIMUR', 'SURABAYA', 'BENOWO', 'SURABAYA BARAT'),
('ROMOKALISARI', 'JAWA TIMUR', 'SURABAYA', 'BENOWO', 'SURABAYA BARAT'),
('WIYUNG', 'JAWA TIMUR', 'SURABAYA', 'WIYUNG', 'SURABAYA SELATAN'),
('GUNUNG SARI', 'JAWA TIMUR', 'SURABAYA', 'DUKUHPAKIS', 'SURABAYA SELATAN'),
('GAYUNGAN', 'JAWA TIMUR', 'SURABAYA', 'GAYUNGAN', 'SURABAYA SELATAN'),
('JAMBANGAN', 'JAWA TIMUR', 'SURABAYA', 'JAMBANGAN', 'SURABAYA SELATAN'),
('KARAH', 'JAWA TIMUR', 'SURABAYA', 'JAMBANGAN', 'SURABAYA SELATAN'),
('KEBONSARI', 'JAWA TIMUR', 'SURABAYA', 'JAMBANGAN', 'SURABAYA SELATAN'),
('KENDANGSARI', 'JAWA TIMUR', 'SURABAYA', 'TENGGILIS MEJOYO', 'SURABAYA TIMUR'),
('KALIJUDAN', 'JAWA TIMUR', 'SURABAYA', 'MULYOREJO', 'SURABAYA TIMUR'),
('RUNGKUT TENGAH', 'JAWA TIMUR', 'SURABAYA', 'GUNUNG ANYAR', 'SURABAYA TIMUR'),
('MANYAR SABRANGAN', 'JAWA TIMUR', 'SURABAYA', 'MULYOREJO', 'SURABAYA TIMUR'),
('KALISARI', 'JAWA TIMUR', 'SURABAYA', 'MULYOREJO', 'SURABAYA TIMUR'),
('DUKUH SUTOREJO', 'JAWA TIMUR', 'SURABAYA', 'MULYOREJO', 'SURABAYA TIMUR'),
('ASEM ROWO', 'JAWA TIMUR', 'SURABAYA', 'ASEM ROWO', 'SURABAYA BARAT'),
('GENTING KALIANAK', 'JAWA TIMUR', 'SURABAYA', 'ASEM ROWO', 'SURABAYA BARAT'),
('PAKAL', 'JAWA TIMUR', 'SURABAYA', 'PAKAL', 'SURABAYA BARAT'),
('SUMBER REJO', 'JAWA TIMUR', 'SURABAYA', 'PAKAL', 'SURABAYA BARAT'),
('BENOWO', 'JAWA TIMUR', 'SURABAYA', 'PAKAL', 'SURABAYA BARAT'),
('GUNDIH', 'JAWA TIMUR', 'SURABAYA', 'BUBUTAN', 'SURABAYA PUSAT'),
('TEMBOK DUKUH', 'JAWA TIMUR', 'SURABAYA', 'BUBUTAN', 'SURABAYA PUSAT'),
('PENELEH', 'JAWA TIMUR', 'SURABAYA', 'GENTENG', 'SURABAYA PUSAT'),
('KARANG POH', 'JAWA TIMUR', 'SURABAYA', 'TANDES', 'SURABAYA BARAT'),
('TAMBAKSARI', 'JAWA TIMUR', 'SURABAYA', 'TAMBAKSARI', 'SURABAYA TIMUR'),
('KEDUNG COWEK', 'JAWA TIMUR', 'SURABAYA', 'BULAK', 'SURABAYA UTARA'),
('PLOSO', 'JAWA TIMUR', 'SURABAYA', 'TAMBAKSARI', 'SURABAYA TIMUR'),
('KENJERAN', 'JAWA TIMUR', 'SURABAYA', 'BULAK', 'SURABAYA UTARA'),
('KAPASARI', 'JAWA TIMUR', 'SURABAYA', 'GENTENG', 'SURABAYA PUSAT'),
('KEBRAON', 'JAWA TIMUR', 'SURABAYA', 'KARANGPILANG', 'SURABAYA SELATAN'),
('KEDURUS', 'JAWA TIMUR', 'SURABAYA', 'KARANGPILANG', 'SURABAYA SELATAN'),
('WARUGUNUNG', 'JAWA TIMUR', 'SURABAYA', 'KARANGPILANG', 'SURABAYA SELATAN'),
('SUKOLILO BARU', 'JAWA TIMUR', 'SURABAYA', 'BULAK', 'SURABAYA UTARA'),
('BENDUL MERISI', 'JAWA TIMUR', 'SURABAYA', 'WONOCOLO', 'SURABAYA SELATAN'),
('MARGOREJO', 'JAWA TIMUR', 'SURABAYA', 'WONOCOLO', 'SURABAYA SELATAN'),
('JAGIR', 'JAWA TIMUR', 'SURABAYA', 'WONOKROMO', 'SURABAYA SELATAN'),
('JEMUR WONOSARI', 'JAWA TIMUR', 'SURABAYA', 'WONOCOLO', 'SURABAYA SELATAN'),
('SIWALANKERTO', 'JAWA TIMUR', 'SURABAYA', 'WONOCOLO', 'SURABAYA SELATAN'),
('PENJARINGANSARI', 'JAWA TIMUR', 'SURABAYA', 'RUNGKUT', 'SURABAYA TIMUR'),
('LONTAR', 'JAWA TIMUR', 'SURABAYA', 'SAMBIKEREP', 'SURABAYA BARAT'),
('NGAGEL REJO', 'JAWA TIMUR', 'SURABAYA', 'WONOKROMO', 'SURABAYA SELATAN'),
('DARMO', 'JAWA TIMUR', 'SURABAYA', 'WONOKROMO', 'SURABAYA SELATAN'),
('PETEMON', 'JAWA TIMUR', 'SURABAYA', 'SAWAHAN', 'SURABAYA SELATAN'),
('PUTATJAYA', 'JAWA TIMUR', 'SURABAYA', 'SAWAHAN', 'SURABAYA SELATAN'),
('KUPANG KRAJAN', 'JAWA TIMUR', 'SURABAYA', 'SAWAHAN', 'SURABAYA SELATAN'),
('PAKIS', 'JAWA TIMUR', 'SURABAYA', 'SAWAHAN', 'SURABAYA SELATAN'),
('EMBONG KALIASIN', 'JAWA TIMUR', 'SURABAYA', 'GENTENG', 'SURABAYA PUSAT'),
('KEPUTRAN', 'JAWA TIMUR', 'SURABAYA', 'TEGALSARI', 'SURABAYA PUSAT'),
('GUBENG', 'JAWA TIMUR', 'SURABAYA', 'GUBENG', 'SURABAYA TIMUR'),
('MOJO', 'JAWA TIMUR', 'SURABAYA', 'GUBENG', 'SURABAYA TIMUR'),
('KERTAJAYA', 'JAWA TIMUR', 'SURABAYA', 'GUBENG', 'SURABAYA TIMUR'),
('PUCANGSEWU', 'JAWA TIMUR', 'SURABAYA', 'GUBENG', 'SURABAYA TIMUR'),
('KEPUTIH', 'JAWA TIMUR', 'SURABAYA', 'SUKOLILO', 'SURABAYA TIMUR'),
('KLAMPIS NGASEM', 'JAWA TIMUR', 'SURABAYA', 'SUKOLILO', 'SURABAYA TIMUR'),
('MEDOKAN SEMAMPIR', 'JAWA TIMUR', 'SURABAYA', 'SUKOLILO', 'SURABAYA TIMUR'),
('PACAR KELING', 'JAWA TIMUR', 'SURABAYA', 'TAMBAKSARI', 'SURABAYA TIMUR'),
('KAPASMADYA BARU', 'JAWA TIMUR', 'SURABAYA', 'TAMBAKSARI', 'SURABAYA TIMUR'),
('DUKUH SETRO', 'JAWA TIMUR', 'SURABAYA', 'TAMBAKSARI', 'SURABAYA TIMUR'),
('SIMOKERTO', 'JAWA TIMUR', 'SURABAYA', 'SIMOKERTO', 'SURABAYA PUSAT'),
('KAPASAN', 'JAWA TIMUR', 'SURABAYA', 'SIMOKERTO', 'SURABAYA PUSAT'),
('SIMOLAWANG', 'JAWA TIMUR', 'SURABAYA', 'SIMOKERTO', 'SURABAYA PUSAT'),
('TAMBAKREJO', 'JAWA TIMUR', 'SURABAYA', 'SIMOKERTO', 'SURABAYA PUSAT'),
('NYAMPLUNGAN', 'JAWA TIMUR', 'SURABAYA', 'PABEAN CANTIKAN', 'SURABAYA UTARA'),
('PERAK TIMUR', 'JAWA TIMUR', 'SURABAYA', 'PABEAN CANTIKAN', 'SURABAYA UTARA'),
('PERAK UTARA', 'JAWA TIMUR', 'SURABAYA', 'PABEAN CANTIKAN', 'SURABAYA UTARA'),
('BALONGSARI', 'JAWA TIMUR', 'SURABAYA', 'TANDES', 'SURABAYA BARAT'),
('MANUKAN WETAN', 'JAWA TIMUR', 'SURABAYA', 'TANDES', 'SURABAYA BARAT'),
('BANJAR SUGIHAN', 'JAWA TIMUR', 'SURABAYA', 'TANDES', 'SURABAYA BARAT'),
('KEMAYORAN', 'JAWA TIMUR', 'SURABAYA', 'KREMBANGAN', 'SURABAYA UTARA'),
('DUPAK', 'JAWA TIMUR', 'SURABAYA', 'KREMBANGAN', 'SURABAYA UTARA'),
('WONOKUSUMO', 'JAWA TIMUR', 'SURABAYA', 'SEMAMPIR', 'SURABAYA UTARA'),
('UJUNG', 'JAWA TIMUR', 'SURABAYA', 'SEMAMPIR', 'SURABAYA UTARA'),
('TANAH KALIKEDINDING', 'JAWA TIMUR', 'SURABAYA', 'KENJERAN', 'SURABAYA UTARA'),
('BULAK BANTENG', 'JAWA TIMUR', 'SURABAYA', 'KENJERAN', 'SURABAYA UTARA'),
('JERUK', 'JAWA TIMUR', 'SURABAYA', 'LAKARSANTRI', 'SURABAYA BARAT'),
('LAKARSANTRI', 'JAWA TIMUR', 'SURABAYA', 'LAKARSANTRI', 'SURABAYA BARAT'),
('LIDAH WETAN', 'JAWA TIMUR', 'SURABAYA', 'LAKARSANTRI', 'SURABAYA BARAT'),
('JAJAR TUNGGAL', 'JAWA TIMUR', 'SURABAYA', 'WIYUNG', 'SURABAYA SELATAN'),
('BABATAN', 'JAWA TIMUR', 'SURABAYA', 'WIYUNG', 'SURABAYA SELATAN'),
('BALAS KLUMPRIK', 'JAWA TIMUR', 'SURABAYA', 'WIYUNG', 'SURABAYA SELATAN'),
('DUKUH PAKIS', 'JAWA TIMUR', 'SURABAYA', 'DUKUHPAKIS', 'SURABAYA SELATAN'),
('DUKUH KUPANG', 'JAWA TIMUR', 'SURABAYA', 'DUKUHPAKIS', 'SURABAYA SELATAN'),
('PRADAKALIKENDAL', 'JAWA TIMUR', 'SURABAYA', 'DUKUHPAKIS', 'SURABAYA SELATAN'),
('MENANGGAL', 'JAWA TIMUR', 'SURABAYA', 'GAYUNGAN', 'SURABAYA SELATAN'),
('DUKUH MENANGGAL', 'JAWA TIMUR', 'SURABAYA', 'GAYUNGAN', 'SURABAYA SELATAN'),
('KETINTANG', 'JAWA TIMUR', 'SURABAYA', 'GAYUNGAN', 'SURABAYA SELATAN'),
('PAGESANGAN', 'JAWA TIMUR', 'SURABAYA', 'JAMBANGAN', 'SURABAYA SELATAN'),
('KUTISARI', 'JAWA TIMUR', 'SURABAYA', 'TENGGILIS MEJOYO', 'SURABAYA TIMUR'),
('TENGILIS MEJOYO', 'JAWA TIMUR', 'SURABAYA', 'TENGGILIS MEJOYO', 'SURABAYA TIMUR'),
('PANJANG JIWO', 'JAWA TIMUR', 'SURABAYA', 'TENGGILIS MEJOYO', 'SURABAYA TIMUR'),
('GUNUNG ANYAR', 'JAWA TIMUR', 'SURABAYA', 'GUNUNG ANYAR', 'SURABAYA TIMUR'),
('RUNGKUT MENANGGAL', 'JAWA TIMUR', 'SURABAYA', 'GUNUNG ANYAR', 'SURABAYA TIMUR'),
('GUNUNG ANYAR TAMBAK', 'JAWA TIMUR', 'SURABAYA', 'GUNUNG ANYAR', 'SURABAYA TIMUR'),
('MULYOREJO', 'JAWA TIMUR', 'SURABAYA', 'MULYOREJO', 'SURABAYA TIMUR'),
('KEJAWAAN PUTIH TAMBA', 'JAWA TIMUR', 'SURABAYA', 'MULYOREJO', 'SURABAYA TIMUR'),
('SUKOMANUNGGAL', 'JAWA TIMUR', 'SURABAYA', 'SUKOMANUNGGAL', 'SURABAYA BARAT'),
('TANJUNGSARI', 'JAWA TIMUR', 'SURABAYA', 'SUKOMANUNGGAL', 'SURABAYA BARAT'),
('SONOKWIJENAN', 'JAWA TIMUR', 'SURABAYA', 'SUKOMANUNGGAL', 'SURABAYA BARAT'),
('PUTAT GEDE', 'JAWA TIMUR', 'SURABAYA', 'SUKOMANUNGGAL', 'SURABAYA BARAT'),
('SIMOMULYO', 'JAWA TIMUR', 'SURABAYA', 'SUKOMANUNGGAL', 'SURABAYA BARAT'),
('SIMOMULYO BARU', 'JAWA TIMUR', 'SURABAYA', 'SUKOMANUNGGAL', 'SURABAYA BARAT'),
('BABAT JERAWAT', 'JAWA TIMUR', 'SURABAYA', 'PAKAL', 'SURABAYA BARAT'),
('SAMBIKEREP', 'JAWA TIMUR', 'SURABAYA', 'SAMBIKEREP', 'SURABAYA BARAT'),
('MADE', 'JAWA TIMUR', 'SURABAYA', 'SAMBIKEREP', 'SURABAYA BARAT'),
('BRINGIN', 'JAWA TIMUR', 'SURABAYA', 'SAMBIKEREP', 'SURABAYA BARAT');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin_web`
--
ALTER TABLE `admin_web`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indeks untuk tabel `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_entry_sembako`
--
ALTER TABLE `data_entry_sembako`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `Kode_Barang_Entry` (`kode_barang`),
  ADD KEY `FK_kejadian_id` (`id_kejadian`);

--
-- Indeks untuk tabel `data_kejadian`
--
ALTER TABLE `data_kejadian`
  ADD PRIMARY KEY (`id_kejadian`);

--
-- Indeks untuk tabel `data_kompi`
--
ALTER TABLE `data_kompi`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `data_master_sembako`
--
ALTER TABLE `data_master_sembako`
  ADD PRIMARY KEY (`kode_barang`) USING BTREE;

--
-- Indeks untuk tabel `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `data_stock_logistik`
--
ALTER TABLE `data_stock_logistik`
  ADD KEY `fk_data_stock_logistik_data_master_sembako` (`kode_barang`);

--
-- Indeks untuk tabel `dokumentasi`
--
ALTER TABLE `dokumentasi`
  ADD PRIMARY KEY (`id_dokumentasi`);

--
-- Indeks untuk tabel `dokumentasi_sinasini`
--
ALTER TABLE `dokumentasi_sinasini`
  ADD PRIMARY KEY (`id_dokumentasi_sinasini`);

--
-- Indeks untuk tabel `form_darurat_medis`
--
ALTER TABLE `form_darurat_medis`
  ADD KEY `id_kejadian` (`id_kejadian`);

--
-- Indeks untuk tabel `form_kebakaran`
--
ALTER TABLE `form_kebakaran`
  ADD PRIMARY KEY (`id_kejadian`);

--
-- Indeks untuk tabel `form_lain`
--
ALTER TABLE `form_lain`
  ADD KEY `id_kejadian` (`id_kejadian`);

--
-- Indeks untuk tabel `form_laka`
--
ALTER TABLE `form_laka`
  ADD KEY `id_kejadian` (`id_kejadian`);

--
-- Indeks untuk tabel `form_orang_tenggelam`
--
ALTER TABLE `form_orang_tenggelam`
  ADD KEY `id_kejadian` (`id_kejadian`);

--
-- Indeks untuk tabel `form_penemuan_jenazah`
--
ALTER TABLE `form_penemuan_jenazah`
  ADD KEY `id_kejadian` (`id_kejadian`);

--
-- Indeks untuk tabel `form_pohon_tumbang`
--
ALTER TABLE `form_pohon_tumbang`
  ADD KEY `form_pohon_tumbang_ibfk_1` (`id_kejadian`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `gb_berita`
--
ALTER TABLE `gb_berita`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indeks untuk tabel `jabatan_pegawai`
--
ALTER TABLE `jabatan_pegawai`
  ADD PRIMARY KEY (`id_jabatan_pegawai`);

--
-- Indeks untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kejadian`
--
ALTER TABLE `kejadian`
  ADD PRIMARY KEY (`id_kejadian`);

--
-- Indeks untuk tabel `kontak_opd`
--
ALTER TABLE `kontak_opd`
  ADD PRIMARY KEY (`id_kontak_opd`);

--
-- Indeks untuk tabel `lokasi_pos`
--
ALTER TABLE `lokasi_pos`
  ADD PRIMARY KEY (`id_lokasi_pos`);

--
-- Indeks untuk tabel `perpus`
--
ALTER TABLE `perpus`
  ADD PRIMARY KEY (`id_perpus`);

--
-- Indeks untuk tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role_login`
--
ALTER TABLE `role_login`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `satuan_barang`
--
ALTER TABLE `satuan_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `survey_kepuasan`
--
ALTER TABLE `survey_kepuasan`
  ADD PRIMARY KEY (`id_survey`);

--
-- Indeks untuk tabel `tabel_penugasan_petugas`
--
ALTER TABLE `tabel_penugasan_petugas`
  ADD PRIMARY KEY (`id_penugasan`);

--
-- Indeks untuk tabel `tb_group`
--
ALTER TABLE `tb_group`
  ADD PRIMARY KEY (`id_group`);

--
-- Indeks untuk tabel `tugas_harian`
--
ALTER TABLE `tugas_harian`
  ADD PRIMARY KEY (`id_tugas_harian`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `data_kompi`
--
ALTER TABLE `data_kompi`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT untuk tabel `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `dokumentasi`
--
ALTER TABLE `dokumentasi`
  MODIFY `id_dokumentasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `dokumentasi_sinasini`
--
ALTER TABLE `dokumentasi_sinasini`
  MODIFY `id_dokumentasi_sinasini` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kontak_opd`
--
ALTER TABLE `kontak_opd`
  MODIFY `id_kontak_opd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=414;

--
-- AUTO_INCREMENT untuk tabel `perpus`
--
ALTER TABLE `perpus`
  MODIFY `id_perpus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `satuan_barang`
--
ALTER TABLE `satuan_barang`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_entry_sembako`
--
ALTER TABLE `data_entry_sembako`
  ADD CONSTRAINT `FK_kejadian_id` FOREIGN KEY (`id_kejadian`) REFERENCES `kejadian` (`id_kejadian`),
  ADD CONSTRAINT `Kode_Barang_Entry` FOREIGN KEY (`kode_barang`) REFERENCES `data_master_sembako` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_stock_logistik`
--
ALTER TABLE `data_stock_logistik`
  ADD CONSTRAINT `Kode_Barang_Stock` FOREIGN KEY (`kode_barang`) REFERENCES `data_master_sembako` (`kode_barang`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
