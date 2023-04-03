-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Nov 2022 pada 19.39
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erdperpustakaan_kampusmerdeka`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `kode_anggota` varchar(10) NOT NULL,
  `nama_anggota` varchar(45) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `jurusan_anggota` varchar(45) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat_anggota` text DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `kode_anggota`, `nama_anggota`, `jenis_kelamin`, `jurusan_anggota`, `tgl_lahir`, `alamat_anggota`, `foto`) VALUES
(1, '110220170', 'Muhammad Ismail', 'L', 'teknik informatika', '2002-05-01', 'Jalan jabon mekar, kabupaten Bogor.', 'mail.jpg'),
(2, '0110220069', 'Amerina Yulina', 'P', 'Ekonomi Bisnis', '2002-02-21', 'Jalan kamboja raya , Kabupaten Depok.', 'merina.jpg'),
(3, '0110220078', 'Ahmad Noval', 'L', 'Sejarah', '2000-03-01', 'Jalan Tegal parang utara 01, Kota Jakarta Selatan.	\r\n', 'nopal.jpg'),
(4, '011220070', 'Arni Rahayu Suryani', 'P', 'Ilmu Komunikasi', '2002-02-17', 'Jalan Serengseng Sawah, Kota Jakarta Selatan.', 'arni.jpg'),
(6, '0110220126', 'Shalih Ahmad Syauqi', 'L', 'Pendidikan Agama Islam', '2001-03-17', 'Jalan Mayor Oking Jayaatmadja, Kota Citeureup Bogor.', 'uqi.jpg'),
(7, '0110220087', 'Aulia Putri', 'P', 'Psikolog', '2005-09-11', 'Jalan Prumpung Tengah IV, Kota Jakarta Timur ', 'aulia.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `kode_buku` char(5) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `penerbit_id` int(11) NOT NULL,
  `tahun_penerbit` char(4) DEFAULT NULL,
  `pengarang_id` int(11) NOT NULL,
  `rak_id` varchar(45) NOT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `kode_buku`, `judul_buku`, `penerbit_id`, `tahun_penerbit`, `pengarang_id`, `rak_id`, `foto`) VALUES
(10, '0001', 'MOBILE APP DEVELOPMENT WITH PHONEGAP', 2, '2014', 7, 'Rack001', 'komp.jpg'),
(11, '0002', 'REKSA DANA DAN TANGGUNG JAWAB MANAJER INVESTASI DALAM PASAR MODAL', 3, '2009', 8, 'Rack011', 'ekonomi.jpg'),
(12, '0003', 'KUMPULAN GENDHING-GENDHING LAN LAGON DOLANAN KI NARTA SABDA jilid 3', 4, '2013', 9, 'Rack001', 'sejarah.jpg'),
(13, '0004', 'KOMUNIKASI EFEKTIF (Suatu Pendekatan Lintas budaya)', 5, '2008', 10, 'Rack011', 'komunikasi.jpg'),
(14, '0005', 'MASA PERKEMBANGAN ANAK  CHILDREN', 6, '2011', 11, 'Rack001', 'psikologi.jpg'),
(15, '0006', 'PENDIDIKAN KARAKTER PERSPEKTIF ISLAM', 7, '2013', 12, 'Rack011', 'pendidikan.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `buku_id` int(11) NOT NULL,
  `petugas_id` int(11) NOT NULL,
  `anggota_id` int(11) NOT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `tgl_pinjam`, `tgl_kembali`, `buku_id`, `petugas_id`, `anggota_id`, `foto`) VALUES
(4, '2022-10-24', '2022-10-26', 10, 1, 1, 'komputer.jpg'),
(5, '2022-10-26', '2022-10-29', 13, 2, 4, 'komunikasi.jpg'),
(6, '2022-10-27', '2022-10-31', 12, 3, 3, 'sejarah.jpg'),
(7, '2022-10-28', '2022-11-01', 14, 4, 7, 'psikologi.jpg'),
(8, '2022-10-27', '2022-11-02', 15, 4, 6, 'pendidikan.jpg'),
(9, '2022-10-29', '2022-11-03', 11, 4, 2, 'ekonomi.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

CREATE TABLE `penerbit` (
  `id` int(11) NOT NULL,
  `nama_penerbit` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `penerbit`
--

INSERT INTO `penerbit` (`id`, `nama_penerbit`) VALUES
(2, 'Andi Publishers'),
(3, 'kencana'),
(4, 'Cendrawasih'),
(5, 'Rosda'),
(6, 'Salemba Humanika'),
(7, 'Pustaka Setia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengarang`
--

CREATE TABLE `pengarang` (
  `id` int(11) NOT NULL,
  `nama_pengarang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pengarang`
--

INSERT INTO `pengarang` (`id`, `nama_pengarang`) VALUES
(7, 'Wahana Komputer'),
(8, 'Gunawan Widjaja'),
(9, 'Gatot Sasminto'),
(10, 'Proft. Dr. Deddy Mulyana, M.A.'),
(11, 'John W. Santrock'),
(12, 'Proft. Dr. Husaini Usman, M.Pd., M.T.'),
(13, 'DR. Hamdani Hamid, M.A.; Drs. Beni Ahmad Saebani, M.Si.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id` int(11) NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `denda` double NOT NULL,
  `buku_id` int(11) NOT NULL,
  `petugas_id` int(11) NOT NULL,
  `anggota_id` int(11) NOT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`id`, `tgl_pengembalian`, `denda`, `buku_id`, `petugas_id`, `anggota_id`, `foto`) VALUES
(3, '2022-10-26', 0, 10, 1, 1, 'komputer.jpg'),
(4, '2022-10-29', 0, 13, 2, 4, 'komunikasi.jpg'),
(5, '2022-10-31', 5000, 12, 3, 3, 'sejarah.jpg'),
(8, '2022-11-01', 0, 14, 4, 7, 'psikologi.jpg'),
(12, '2022-11-02', 5000, 15, 4, 6, 'pendidikan.jpg'),
(13, '2022-11-03', 0, 11, 4, 2, 'ekonomi.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `nama_petugas` varchar(45) NOT NULL,
  `jabatan_petugas` varchar(45) NOT NULL,
  `no_telp_petugas` char(13) DEFAULT NULL,
  `alamat_petugas` text DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id`, `nama_petugas`, `jabatan_petugas`, `no_telp_petugas`, `alamat_petugas`, `foto`) VALUES
(1, 'Iskari, SS, M.HUM', 'Kepala Perpustakaan', '08569779568', 'jalan lenteng agung raya, Kota Depok.', 'kar.jpg'),
(2, 'Ghina samawati', 'Kepala Sub Bagian LPP', '08576489209', 'Jalan kelapa dua raya, Kota Depok.', 'ghina.jpg'),
(3, 'Dewi Handayani, S.Sos', 'Supervisor senior bidang Pengembangan Digital', '08569899456', 'Jalan kamboja raya, Kota jakarta Selatan.', 'dewi.jpg'),
(4, 'Fatimah', 'Supervisor senior bidang Layanan', '08577268478', 'Jalan Kebon raya jaya, Kota Depok.', 'fatima.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role` enum('admin','anggota','guest') NOT NULL,
  `foto` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `username`, `password`, `role`, `foto`) VALUES
(1, 'Admin', 'walkinglibrary@gmail.com', 'admin', '0eb4e14e3a0af58fa4769fdad43ec79f52abfcdb', 'admin', 'admin.jpg'),
(2, 'Aurrelio', 'aurelio@gmail.com', 'aurel', 'b0590d417ea1e478a2576176ffc14bc1cac91a45', 'anggota', 'aurel.jpg'),
(3, 'Azalea Putri', 'azaleaptrin@gmail.com', 'alea', '5676a6138cba6a23bba22f946d91e4eb6109be64', 'guest', 'lea.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_anggota_UNIQUE` (`kode_anggota`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_buku_UNIQUE` (`kode_buku`),
  ADD KEY `fk_buku_penerbit1_idx` (`penerbit_id`),
  ADD KEY `fk_buku_pengarang1_idx` (`pengarang_id`),
  ADD KEY `fk_buku_rak1_idx` (`rak_id`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_peminjaman_petugas_idx` (`petugas_id`),
  ADD KEY `fk_peminjaman_anggota1_idx` (`anggota_id`),
  ADD KEY `fk_peminjaman_buku1_idx` (`buku_id`);

--
-- Indeks untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengarang`
--
ALTER TABLE `pengarang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tgl_pengembalian_UNIQUE` (`tgl_pengembalian`),
  ADD KEY `fk_pengembalian_petugas1_idx` (`petugas_id`),
  ADD KEY `fk_pengembalian_anggota1_idx` (`anggota_id`),
  ADD KEY `fk_pengembalian_buku1_idx` (`buku_id`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pengarang`
--
ALTER TABLE `pengarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `fk_buku_penerbit1` FOREIGN KEY (`penerbit_id`) REFERENCES `penerbit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_buku_pengarang1` FOREIGN KEY (`pengarang_id`) REFERENCES `pengarang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `fk_peminjaman_anggota1` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_peminjaman_buku1` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_peminjaman_petugas` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `fk_pengembalian_anggota1` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pengembalian_buku1` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pengembalian_petugas1` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
