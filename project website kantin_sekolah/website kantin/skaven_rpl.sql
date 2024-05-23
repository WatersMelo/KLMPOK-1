-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Bulan Mei 2024 pada 05.18
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skaven_rpl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `password`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'siswa', 'bcd724d15cde8c47650fda962968f102', 'siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `jumlah_barang` int(11) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `tipe_barang` varchar(50) DEFAULT NULL,
  `nip` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_prestasi`
--

CREATE TABLE `detail_prestasi` (
  `id_detail` int(11) NOT NULL,
  `id_prestasi` int(11) DEFAULT NULL,
  `nip` int(11) DEFAULT NULL,
  `nama_prestasi` varchar(100) DEFAULT NULL,
  `tanggal_prestasi` date DEFAULT NULL,
  `kategori` enum('umum','produktif') DEFAULT NULL,
  `peringkat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total_harga` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `id_produk`, `jumlah`, `total_harga`) VALUES
(20, 13, 10, 3, 12000.00),
(21, 13, 4, 2, 10000.00),
(22, 13, 8, 1, 12000.00),
(25, 15, 10, 4, 16000.00),
(26, 15, 9, 2, 16000.00),
(27, 16, 5, 10, 50000.00),
(28, 17, 12, 2, 20000.00),
(29, 17, 5, 1, 5000.00),
(30, 17, 2, 1, 5000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `eskul`
--

CREATE TABLE `eskul` (
  `eskul_id` int(11) NOT NULL,
  `namaeskul` varchar(100) DEFAULT NULL,
  `profileskul` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `eskul`
--

INSERT INTO `eskul` (`eskul_id`, `namaeskul`, `profileskul`) VALUES
(1, 'PMR', 1),
(2, 'OSIS', 2),
(3, 'Pramuka', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `eskul_siswa`
--

CREATE TABLE `eskul_siswa` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `eskul_id` int(11) DEFAULT NULL,
  `tanggal_gabung` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `event_sekolah`
--

CREATE TABLE `event_sekolah` (
  `id_event` int(11) NOT NULL,
  `nama_event` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `event_sekolah`
--

INSERT INTO `event_sekolah` (`id_event`, `nama_event`, `tanggal`, `lokasi`) VALUES
(1, 'Hari Pendidikan Nasional', '2023-05-02', 'Lapangan Sekolah'),
(2, 'Pameran Seni', '2023-06-15', 'Aula Sekolah'),
(3, 'Olimpiade Sains', '2023-07-10', 'Gedung Serbaguna');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `nip` int(11) NOT NULL,
  `nama_guru` varchar(100) DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `eskul_id` int(11) DEFAULT NULL,
  `bidang` enum('IT','desain','lkbb','matematika','pkn') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`nip`, `nama_guru`, `no_telepon`, `alamat`, `eskul_id`, `bidang`) VALUES
(2001, 'Bu Anti', '08123456789', 'Jl. Perintis', 1, 'IT'),
(2002, 'Pak Ibhe', '08123456789', 'Jl. Tanjung Bunga', 2, 'desain'),
(2003, 'Pak Fajar', '08123456789', 'BTP', 3, 'lkbb');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `nip` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(3, 'Alat Tulis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `tingkat` varchar(10) DEFAULT NULL,
  `nama_kelas` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `membimbing_prestasi`
--

CREATE TABLE `membimbing_prestasi` (
  `nip` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_daftar` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_event` int(11) DEFAULT NULL,
  `nama_siswa` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengawasan_event`
--

CREATE TABLE `pengawasan_event` (
  `id_pengawas` int(11) NOT NULL,
  `nip` int(11) DEFAULT NULL,
  `id_event` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `nama_prestasi` varchar(100) DEFAULT NULL,
  `tanggal_prestasi` date DEFAULT NULL,
  `kategori` enum('umum','produktif') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `stok`, `id_kategori`) VALUES
(1, 'nasi padang', 15000.00, 48, 1),
(2, 'pop ice', 5000.00, 39, 2),
(4, 'bassang', 5000.00, 97, 1),
(5, 'pisang ijo', 5000.00, 19, 1),
(6, 'es teh', 3000.00, 50, 2),
(7, 'es buah', 5000.00, 60, 2),
(8, 'kapurung', 12000.00, 9, 1),
(9, 'nasi ayam', 8000.00, 46, 1),
(10, 'pulpen', 4000.00, 81, 3),
(12, 'kripik faroek', 10000.00, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_eskul`
--

CREATE TABLE `profil_eskul` (
  `ProfilEskulID` int(11) NOT NULL,
  `logo` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `profil_eskul`
--

INSERT INTO `profil_eskul` (`ProfilEskulID`, `logo`, `deskripsi`) VALUES
(1, 'logo_pmr.png', 'Ekstrakurikuler PMR bertujuan untuk melatih keterampilan pertolongan pertama.'),
(2, 'logo_osis.png', 'Ekstrakurikuler OSIS bertujuan untuk mengembangkan kepemimpinan siswa.'),
(3, 'logo_pramuka.png', 'Ekstrakurikuler Pramuka bertujuan untuk melatih kepemimpinan dan disiplin.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(11) NOT NULL,
  `nama_ruang` varchar(50) DEFAULT NULL,
  `nama_barang` int(11) DEFAULT NULL,
  `kapasitas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(100) DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jenis_kelamin` enum('P','L') DEFAULT NULL,
  `saldo` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `kelas`, `jurusan`, `alamat`, `jenis_kelamin`, `saldo`) VALUES
(2390, 'Andi Pratama', 'XII', 'IPA', 'Jl. Merdeka No. 10', 'L', 466000.00),
(2391, 'Siti Aminah', 'XI', 'IPS', 'Jl. Sudirman No. 15', 'P', 300000.00),
(2392, 'Budi Santoso', 'X', 'TKJ', 'Jl. Diponegoro No. 20', 'L', 400000.00),
(2393, 'Dewi Lestari', 'XII', 'IPA', 'Jl. Kartini No. 25', 'P', 568000.00),
(2394, 'Rizky Hidayat', 'XI', 'RPL', 'Jl. Ahmad Yani No. 30', 'L', 550000.00),
(2395, 'Nurul Aini', 'X', 'IPS', 'Jl. Gatot Subroto No. 35', 'P', 370000.00),
(2396, 'Fajar Nugroho', 'XII', 'TKJ', 'Jl. Pemuda No. 40', 'L', 350000.00),
(2398, 'Ahmad Fauzi', 'X', 'RPL', 'Jl. Kebangsaan No. 50', 'L', 184000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `total_bayar` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_siswa`, `tanggal_transaksi`, `total_bayar`) VALUES
(13, 2390, '2025-03-12', 34000.00),
(15, 2393, '2025-03-12', 32000.00),
(16, 2392, '2025-03-12', 50000.00),
(17, 2395, '2024-05-23', 30000.00);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `nip` (`nip`),
  ADD KEY `nis` (`id_siswa`);

--
-- Indeks untuk tabel `detail_prestasi`
--
ALTER TABLE `detail_prestasi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_prestasi` (`id_prestasi`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `eskul`
--
ALTER TABLE `eskul`
  ADD PRIMARY KEY (`eskul_id`),
  ADD KEY `profileskul` (`profileskul`);

--
-- Indeks untuk tabel `eskul_siswa`
--
ALTER TABLE `eskul_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`id_siswa`),
  ADD KEY `eskul_id` (`eskul_id`);

--
-- Indeks untuk tabel `event_sekolah`
--
ALTER TABLE `event_sekolah`
  ADD PRIMARY KEY (`id_event`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `eskul_id` (`eskul_id`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `membimbing_prestasi`
--
ALTER TABLE `membimbing_prestasi`
  ADD PRIMARY KEY (`nip`,`id_siswa`),
  ADD KEY `nis` (`id_siswa`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_daftar`),
  ADD KEY `nis` (`id_siswa`),
  ADD KEY `id_event` (`id_event`);

--
-- Indeks untuk tabel `pengawasan_event`
--
ALTER TABLE `pengawasan_event`
  ADD PRIMARY KEY (`id_pengawas`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_event` (`id_event`);

--
-- Indeks untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`),
  ADD KEY `nis` (`id_siswa`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `profil_eskul`
--
ALTER TABLE `profil_eskul`
  ADD PRIMARY KEY (`ProfilEskulID`);

--
-- Indeks untuk tabel `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`),
  ADD KEY `nama_barang` (`nama_barang`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `nis` (`id_siswa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2401;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Ketidakleluasaan untuk tabel `detail_prestasi`
--
ALTER TABLE `detail_prestasi`
  ADD CONSTRAINT `detail_prestasi_ibfk_1` FOREIGN KEY (`id_prestasi`) REFERENCES `prestasi` (`id_prestasi`),
  ADD CONSTRAINT `detail_prestasi_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`);

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `eskul`
--
ALTER TABLE `eskul`
  ADD CONSTRAINT `eskul_ibfk_1` FOREIGN KEY (`profileskul`) REFERENCES `profil_eskul` (`ProfilEskulID`);

--
-- Ketidakleluasaan untuk tabel `eskul_siswa`
--
ALTER TABLE `eskul_siswa`
  ADD CONSTRAINT `eskul_siswa_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`),
  ADD CONSTRAINT `eskul_siswa_ibfk_2` FOREIGN KEY (`eskul_id`) REFERENCES `eskul` (`eskul_id`);

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`eskul_id`) REFERENCES `eskul` (`eskul_id`);

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mata_pelajaran` (`id_mapel`),
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Ketidakleluasaan untuk tabel `membimbing_prestasi`
--
ALTER TABLE `membimbing_prestasi`
  ADD CONSTRAINT `membimbing_prestasi_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`),
  ADD CONSTRAINT `membimbing_prestasi_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Ketidakleluasaan untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`),
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`id_event`) REFERENCES `event_sekolah` (`id_event`);

--
-- Ketidakleluasaan untuk tabel `pengawasan_event`
--
ALTER TABLE `pengawasan_event`
  ADD CONSTRAINT `pengawasan_event_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`),
  ADD CONSTRAINT `pengawasan_event_ibfk_2` FOREIGN KEY (`id_event`) REFERENCES `event_sekolah` (`id_event`);

--
-- Ketidakleluasaan untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `prestasi_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `ruang`
--
ALTER TABLE `ruang`
  ADD CONSTRAINT `ruang_ibfk_1` FOREIGN KEY (`nama_barang`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
