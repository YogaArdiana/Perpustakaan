-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2023 at 02:33 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `nama_buku` varchar(50) NOT NULL,
  `deskripsi_buku` text NOT NULL,
  `kategori_buku` varchar(30) NOT NULL,
  `pencipta_buku` varchar(50) NOT NULL,
  `sampul_buku` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `nama_buku`, `deskripsi_buku`, `kategori_buku`, `pencipta_buku`, `sampul_buku`, `created_at`) VALUES
(25, 'One Piece Vol 62', 'Kelompok Topi Jerami berkumpul kembali di kepulauan Sabaody, setelah berpisah selama 2 tahun. Mereka pun kemudian pergi menuju panggung berikutnya. ', 'komik', 'Eiichiro Oda', '653e2dd9c4aa6.jpg', '2023-10-29 10:03:05'),
(26, 'One Piece Vol 102', 'Luffy yang kembali bangkit, menghadapi Kaido sekali lagi! Ke mana arah pertempuran dua tokoh besar yang sudah menjelang babak penghabisan ini!? Sementara itu, waktu penentuan telah tiba bagi kawan-kawannya yang sedang melakukan pertempuran sengit melawan para petinggi di setiap tempat. Simak kisah petualangan di lautan, One Piece!!', 'komik', 'Eiichiro Oda', '653e3eb3920fa.jpg', '2023-10-29 11:14:59'),
(27, 'One Piece Vol 1', 'One Piece mengisahkan Luffy yang bercita-cita sebagai raja bajak laut dan ingin menemukan harta karun legendaris milik Gold D. Roger yang lokasinya di suatu tempat di Grand Line dan masih tidak diketahui oleh siapapun.', 'komik', 'Eiichiro Oda', '653e3ef4d4d08.jpg', '2023-10-29 11:16:04'),
(28, 'One Piece Vol 97', 'Komik One Piece 97 karya Eiichiro Oda menjadi salah satu komik yang wajib untuk diikuti. Kubu samurai Kinâ€™emon terjepit oleh Pengkhianatan Kanjuro yang terungkap tepat sebelum penyerbuan. Kanjuro bahkan sempat menculik Momonosuke yang dibawanya ke Onigashima, tempat Kaido dan Orochi berada. Namun sekalipun terjepit, bantuan dari tokoh tak terduga dan aliansi Luffy, Law, dan Kid pun muncul memberikan secercah harapan. Rombongan mereka pun pergi menuju ke Onigashima. Yuk, mulai ikuti kisah komik One Piece yang menyajikan pertarungan unik dan epik.', 'komik', 'Eiichiro Oda', '653e3f5cd4bd7.jpg', '2023-10-29 11:17:48'),
(29, 'One Piece Vol 9', 'Saat kecil, Monkey D. Luffy bercita-cita menjadi Raja Bajak Laut. Namun hidupnya berubah ketika dia secara tidak sengaja memperoleh kekuatan untuk meregang seperti karetâ€¦dengan konsekuensi tidak bisa berenang lagi! Bertahun-tahun kemudian, Luffy berangkat mencari \"One Piece\", yang dikatakan sebagai harta karun terbesar di dunia...\r\n\r\nLuffy dan kru harus berhadapan dengan \"Saw-Tooth\" Arlong dan bajak laut Manusia Ikan jahatnya, yang berspesialisasi dalam menggunakan taktik mafia untuk memeras nyawa penduduk desa yang tidak bersalah. Tak perlu dikatakan lagi, ini merupakan kejutan besar bagi semua orang bahwa Nami yang membenci bajak laut sebenarnya adalah anggota kru Arlong!', 'komik', 'Eiichiro Oda', '653e404d24346.jpg', '2023-10-29 11:21:49'),
(30, 'One Piece Vol 99', 'pada seri ke-99 menceritakan pertarungan duel antara Big Mom dengan Marco Phoenix. Pertarungan terjadi sangat sengit, Big Mom berhasil memojokan Marco yang merupakan seorang mantan Empat Kaisar. Meskipun begitu di masa kritis, Big Mom meminta bantuan untuk menghabisi Marco namun serangannya kali ini berhasil digagalkan oleh Wanda dan Carrot yang berwujud sulong. Seperti tidak ada titik terang dalam pertarungan Big Mom memutuskan pergi meninggalkan Marco menuju atap istana.\r\n\r\nDalam komik ini juga diceritakan para anggota Tobiroppo yaitu Sasaki yang menghadapi Franky, Whoâ€™s Who dan menghadang Jinbei. Pertarungan para monster masih terus berlanjut. Luffy menuju ke puncak Onigashima untuk melakukan konfrontasi kepada Kaido, pertempuran terus terjadi dan anggota Topi Jerami ikut bertarung melawan. Jumlahnya tidak memihak mereka dan mereka membutuhkan peluang untuk mendapat dukungan dari sekutu.', 'komik', 'Eiichiro Oda', '653e40808de63.jpg', '2023-10-29 11:22:40'),
(31, 'Jujutsu Kaisen Vol 1', 'YÅ«ji Itadori adalah seorang siswa SMA dengan atletisitas yang tidak wajar yang tinggal di Sendai bersama kakeknya. Ia sering menghindari Klub Lari karena keengganannya pada bidang atletik, meskipun dia memiliki bakat bawaan untuk olahraga tersebut. Sebaliknya, dia memilih untuk bergabung dengan Klub Penelitian Ilmu Gaib, agar dirinya dapat bersantai dan bergaul dengan para seniornya. Setiap hari, YÅ«ji meninggalkan sekolah pada pukul 17.00 untuk mengunjungi kakeknya di rumah sakit. Ketika dia mengunjunginya, kakeknya memberikan dua pesan kuat kepada YÅ«ji, yaitu \"selalu membantu orang\" dan \"mati dikelilingi orang\". Setelah kematian kakeknya, YÅ«ji menafsirkan pesan-pesan tersebut sebagai satu pernyataanâ€”bahwa setiap orang berhak mendapatkan \"kematian yang layak\".', 'komik', 'Gege Akutami', '653e40fe8d07b.jpg', '2023-10-29 11:24:46'),
(32, 'Jujutsu Kaisen Vol 2', 'Komik Jujutsu Kaisen 2 karya Gege Akutami menjadi salah satu komik yang wajib untuk diikuti. Sebuah kutukan yang menyerupai janin tiba-tiba muncul di lapas anak pria. Itadori dan murid tahun pertama lainnya diutus untuk menyelamatkan orang-orang yang masih berada di lapas tersebut. Akan tetapi, janin yang telah bermetamorfosis menjadi kutukan tingkat tinggi itu melancarkan serangannya sehingga Itadori dkk berada dalam bahaya. Itadori kemudian bertukar dengan Sukuna untuk mengalahkan kutukan tersebut, tapi...!? Yuk, mulai ikuti dan simak serial komik ini dengan konsep pertarungan unik dan epik.', 'komik', 'Gege Akutami', '653e4179f1c59.jpg', '2023-10-29 11:26:49'),
(33, 'Jujutsu Kaisen Vol 3', 'Setelah berpetualang dan berlatih di bawah guru Gojo, Yuji dan Megumi bekerja sama dengan siswa tahun kedua Yuta Okkotsu dan Yuki Tsukumo. seorang penyihir jujutsu kelas khusus dan salah satu penyihir paling kuat sepanjang masa bersama dengan Choso setengah manusia, setengah Kutukan dan siswa tahun kedua. Maki Zenin untuk bertemu dengan Tengen.', 'komik', 'Gege Akutami', '653e41d937bfd.jpg', '2023-10-29 11:28:25'),
(34, 'Jujutsu Kaisen Vol 0', 'Jujutsu Kaisen 0 berfokus pada karakter protagonis bernama Yuta Okkotsu. Yuta merupakan anak SMA yang kaku dan menjadi korban perundungan. Suatu hari, Rika Orimoto, teman masa kecil Yuta, meninggal karena kecelakaan. Sejak saat itu, Yuta ditempeli roh kutukan perwujudan dari Rika.', 'komik', 'Gege Akutami', '653e42023581a.jpg', '2023-10-29 11:29:06'),
(35, 'Naruto Vol 2', 'Naruto bercerita seputar kehidupan tokoh utamanya, Naruto Uzumaki, seorang ninja yang hiperaktif, periang, dan ambisius yang ingin mewujudkan keinginannya untuk mendapatkan gelar Hokage, atau juga disebut pemimpin dan ninja terkuat di desanya.', 'komik', 'Masashi Kishimoto', '653e43fbe0704.jpg', '2023-10-29 11:37:31'),
(36, 'Naruto Vol 72', 'Kaguya berhasil disegel dan perang besar pun berakhir. Namun, Sasuke memulai pemberontakan! Demi menyampaikan perasaan mereka yang selalu bertentangan, Naruto dan Sasuke pun saling berhadapan. Inilah akhir pertarungan yang mempertaruhkan segalanya di antara dua orang pahlawan!', 'komik', 'Masashi Kishimoto', '653e444f6095f.jpg', '2023-10-29 11:38:55'),
(37, 'Vagabond Vol 37', 'Musashi mendatangi Nagaoka Sado untuk meminta bantuan makanan untuk desanya yang kelaparan. Ia mau memberikan bantuan, tapi dengan imbalan Musashi harus bekerja di kastil Kokura.\r\nApa keputusan Musashi? Apa dia akan meninggalkan desa dan pergi ke Kokura?', 'komik', 'Takehiko Inoue', '653e44c84e4d6.jpg', '2023-10-29 11:40:56'),
(38, 'Berserk Vol 1', 'Menceritakan tentang seorang pendekar pedang bernama Guts yang juga tentara bayaran tunggal. Gaya bertarung yang brutal dengan zirah berpelindung bahu panjang sambil menenteng pedang berukuran besar sebagai senjata.', 'komik', 'Kentaro Miura | Kouji Mori', '653e45e7c501b.jpg', '2023-10-29 11:45:43'),
(39, 'Black Clover Vol 1', 'Mengisahkan tentang seorang anak laki-laki bernama Asta yang lahir tanpa kekuatan sihir, suatu fenomena yang tidak normal di dunia tempatnya tinggal. Bersama dengan teman-temannya dari Banteng hitam, dia bercita-cita untuk menjadi Kaisar sihir. Manga ini dimuat berseri dalam majalah Weekly ShÅnen Jump terbitan Shueisha sejak bulan Februari 2015, dan telah dibundel menjadi 35 volume tankÅbon per bulan Juni 2023.', 'komik', 'Yuki Tabata', '653e46911dbb5.jpg', '2023-10-29 11:48:33'),
(40, 'Dragon Ball Super Vol 12', 'Penjahat kelas kakap Moro dan para pelarian dari penjara galaksi yang menjadi anak buahnya tengah berkeliling mengacau di seluruh penjuru galaksi untuk mencari planet dengan energi kehidupan yang tinggi!!', 'komik', 'Akira Toriyama', '653e46ec2158e.jpg', '2023-10-29 11:50:04'),
(41, 'One Punch Man Vol 27', 'One Punch Man merupakan serial anime bergenre laga komedi produksi studio Madhouse yang rilis pada 2015. Sinopsis One Punch Man mengisahkan tentang perjalanan Saitama yang mempunyai mimpi besar menjadi seorang pahlawan', 'komik', 'ONE(nama samaran)', '653e4797b4b9c.jpg', '2023-10-29 11:52:55'),
(42, 'Filosofi Teras', 'Filosofi Teras adalah sebuah buku pengantar filsafat Stoa yang dibuat khusus sebagai panduan moral anak muda. Buku ini ditulis untuk menjawab permasalahan tentang tingkat kekhawatiran yang cukup tinggi dalam skala nasional, terutama yang dialami oleh anak muda.', 'filosofi', 'Henry Manampiring', '653e483e41230.png', '2023-10-29 11:55:42'),
(43, 'Atomic Habits', 'Buku Atomic Habits adalah buku tentang bagaimana mengubah kebiasaan-kebiasaan kita menjadi lebih baik dan tentunya menjadi perubahan yang permanen. James Clear mengajarkan kita untuk mencapai tujuan jangka panjang kita melalui kebiasaan-kebiasaan kecil yang kita lakukan setiap harinya.', 'filosofi', 'James Clear', '653e48647a3e0.jpg', '2023-10-29 11:56:20'),
(45, 'Clean Code', 'Diterjemahkan dari bahasa Inggris-Robert Cecil Martin, bahasa sehari-hari disebut \"Paman Bob\", adalah seorang insinyur perangkat lunak, instruktur, dan penulis Amerika. Dia paling dikenal karena mempromosikan banyak prinsip desain perangkat lunak dan sebagai penulis dan penandatangan Agile Manifesto yang berpengaruh.', 'pelajaran', 'Robert Cecil Martin', '653e500e86865.jpg', '2023-10-29 12:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `data_pinjaman_buku`
--

CREATE TABLE `data_pinjaman_buku` (
  `id_pinjaman` int(11) NOT NULL,
  `nama_buku` varchar(50) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `sampul_buku` text NOT NULL,
  `kategori_buku` varchar(30) NOT NULL,
  `nama_siswa` varchar(60) NOT NULL,
  `nim` varchar(30) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `jurusan` varchar(40) NOT NULL,
  `no_tlp` int(16) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tengat_pengembalian` date NOT NULL,
  `status` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_pinjaman_buku`
--

INSERT INTO `data_pinjaman_buku` (`id_pinjaman`, `nama_buku`, `id_buku`, `sampul_buku`, `kategori_buku`, `nama_siswa`, `nim`, `kelas`, `jurusan`, `no_tlp`, `tanggal_pinjam`, `tengat_pengembalian`, `status`, `created_at`) VALUES
(2, 'Atomic Habits', 23, '653b971fbe0ba.jpg', 'filosofi', 'yoga', '273728', '', 'RPL', 2147483647, '2023-10-27', '2023-11-27', 'sudah', '2023-10-27 11:55:16'),
(3, 'Atomic Habits', 23, '653b971fbe0ba.jpg', 'filosofi', 'Adit', '273729', 'TKJ', 'TKJ', 2147483647, '2023-10-27', '2023-11-27', 'sudah', '2023-10-27 12:01:32'),
(7, 'Atomic Habits', 23, '653b971fbe0ba.jpg', 'filosofi', 'Wandi Nugroho', '273729', 'XII', 'MM', 392939, '2023-10-27', '2023-10-28', 'belum', '2023-10-27 14:03:18'),
(8, 'Atomic Habits', 23, '653b971fbe0ba.jpg', 'filosofi', 'abdul', '273728', 'XI', 'TKJ', 392939, '2023-10-29', '2023-10-30', 'belum', '2023-10-29 03:27:18'),
(9, 'One Piece Vol 62', 25, '653e2dd9c4aa6.jpg', 'komik', 'yoga', '273728', 'XII', 'RPL', 2147483647, '2023-10-29', '2023-12-29', 'belum', '2023-10-29 10:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `tlp` varchar(14) NOT NULL,
  `location` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `tlp`, `location`, `username`, `password`) VALUES
(1, 'namiszs', '08973847383', 'Gianyar, Bali', 'NamiCwan', 'namicwan123s'),
(8, 'Yoga Ardiana', '0896064535', 'Gianyar,Bali', 'yoga', '$2y$10$2BpV0zyXHq1qZXQKOUscEOX3EkPUJaT7NOnz6W03rza/oYtWMbVvG'),
(14, 'Guest Account', '06989898', 'Gianyar,Bali', 'guest', '$2y$10$RQKaXefitcGxubtoCUEITuo3qF8weoKrWf0k2TUwW8x/IGIQBX8fi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `data_pinjaman_buku`
--
ALTER TABLE `data_pinjaman_buku`
  ADD PRIMARY KEY (`id_pinjaman`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `data_pinjaman_buku`
--
ALTER TABLE `data_pinjaman_buku`
  MODIFY `id_pinjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
