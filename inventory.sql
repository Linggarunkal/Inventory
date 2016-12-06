-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Des 2016 pada 10.34
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--
CREATE DATABASE IF NOT EXISTS `inventory` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `inventory`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_tb`
--

CREATE TABLE `barang_tb` (
  `id_barang` varchar(10) NOT NULL DEFAULT '0',
  `id_model` varchar(10) DEFAULT NULL,
  `condition_barang` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `create_on` date DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_tb`
--

INSERT INTO `barang_tb` (`id_barang`, `id_model`, `condition_barang`, `status`, `create_on`, `remarks`, `qty`) VALUES
('BRG002', 'MDL002', 'Stock', 'Bad', '2016-11-23', 'Barang Rusak di kembalikan', 2),
('BRG003', 'MDL002', 'Use', 'Good', '2016-11-23', 'barang in stock', 12),
('BRG015', 'MDL008', 'Stock', 'Good', '2016-11-25', 'Ready di gudang', 12);

--
-- Trigger `barang_tb`
--
DELIMITER $$
CREATE TRIGGER `tg_barang_seq` BEFORE INSERT ON `barang_tb` FOR EACH ROW BEGIN
    INSERT INTO barang_tb_seq VALUE (NULL);
    set NEW.id_barang = concat('BRG', LPAD(last_insert_id(), 3, '0'));
  END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_tb_seq`
--

CREATE TABLE `barang_tb_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_tb_seq`
--

INSERT INTO `barang_tb_seq` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(9),
(12),
(15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `catagory`
--

CREATE TABLE `catagory` (
  `role` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `catagory`
--

INSERT INTO `catagory` (`role`) VALUES
('admin'),
('user'),
('manager'),
('Group admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi_tb`
--

CREATE TABLE `divisi_tb` (
  `id_divisi` varchar(10) NOT NULL DEFAULT '0',
  `divisi_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `divisi_tb`
--

INSERT INTO `divisi_tb` (`id_divisi`, `divisi_name`) VALUES
('DVS006', 'IT/MIS'),
('DVS010', 'Project Manager'),
('DVS034', 'TeleMarketing');

--
-- Trigger `divisi_tb`
--
DELIMITER $$
CREATE TRIGGER `tg_divisi_insert` BEFORE INSERT ON `divisi_tb` FOR EACH ROW BEGIN
  INSERT INTO divisi_tb_seq VALUES (NULL);
  SET NEW.id_divisi = CONCAT('DVS', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi_tb_seq`
--

CREATE TABLE `divisi_tb_seq` (
  `id_divisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `divisi_tb_seq`
--

INSERT INTO `divisi_tb_seq` (`id_divisi`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35);

-- --------------------------------------------------------

--
-- Struktur dari tabel `level_tb`
--

CREATE TABLE `level_tb` (
  `id_level` varchar(10) NOT NULL DEFAULT '0',
  `role_level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level_tb`
--

INSERT INTO `level_tb` (`id_level`, `role_level`) VALUES
('LVL001', 'Manager'),
('LVL002', 'Admin'),
('LVL003', 'User'),
('LVL004', 'Group Head');

--
-- Trigger `level_tb`
--
DELIMITER $$
CREATE TRIGGER `tg_level_insert` BEFORE INSERT ON `level_tb` FOR EACH ROW BEGIN
  INSERT INTO level_tb_seq VALUES (NULL);
  SET NEW.id_level = CONCAT('LVL', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `level_tb_seq`
--

CREATE TABLE `level_tb_seq` (
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level_tb_seq`
--

INSERT INTO `level_tb_seq` (`id_level`) VALUES
(1),
(2),
(3),
(4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_tb`
--

CREATE TABLE `model_tb` (
  `id_model` varchar(10) NOT NULL DEFAULT '0',
  `product_name` varchar(30) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `brand` varchar(30) DEFAULT NULL,
  `create_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `model_tb`
--

INSERT INTO `model_tb` (`id_model`, `product_name`, `type`, `brand`, `create_date`) VALUES
('MDL002', 'Lenovo Thinkpad E450', 'Laptop', 'Lenovo', '2016-11-18'),
('MDL004', 'Lenovo Thinkcentre Desktop E', 'Desktop', 'Lenovo', '2016-11-18'),
('MDL008', 'Samsung Galaxy S3', 'Smartphone', 'Samsung', '2016-11-24');

--
-- Trigger `model_tb`
--
DELIMITER $$
CREATE TRIGGER `tg_model_insert` BEFORE INSERT ON `model_tb` FOR EACH ROW BEGIN
    INSERT INTO model_tb_seq VALUE (null);
    set NEW.id_model = concat('MDL', LPAD(last_insert_id(), 3, '0'));
  END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_tb_seq`
--

CREATE TABLE `model_tb_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `model_tb_seq`
--

INSERT INTO `model_tb_seq` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_tb`
--

CREATE TABLE `user_tb` (
  `id_user` varchar(10) NOT NULL DEFAULT '0',
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `id_divisi` varchar(10) DEFAULT NULL,
  `id_level` varchar(10) DEFAULT NULL,
  `id_manager` varchar(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_tb`
--

INSERT INTO `user_tb` (`id_user`, `fname`, `lname`, `username`, `password`, `id_divisi`, `id_level`, `id_manager`, `email`) VALUES
('USR001', 'Linggar', 'Kurniawan', 'lkurniawan', 'mukidi', 'DVS006', 'LVL001', NULL, 'linggar@mail.com'),
('USR003', 'Eriya', 'madhona', 'emadhona', 'mukidi', 'DVS006', 'LVL003', 'USR001', 'eriya@mail.com'),
('USR007', 'Samson', 'Samson', 'sbetawi', 'mukidi', 'DVS010', 'LVL001', NULL, 'samson@mail.com');

--
-- Trigger `user_tb`
--
DELIMITER $$
CREATE TRIGGER `tg_user_tb_insert` BEFORE INSERT ON `user_tb` FOR EACH ROW begin
insert into user_tb_seq values (NULL);
set new.id_user = concat('USR', LPAD(LAST_INSERT_ID(), 3, '0'));
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_tb_seq`
--

CREATE TABLE `user_tb_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_tb_seq`
--

INSERT INTO `user_tb_seq` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_barang`
--
CREATE TABLE `v_barang` (
`id_barang` varchar(10)
,`product_name` varchar(30)
,`condition_barang` varchar(20)
,`status` varchar(20)
,`qty` int(10)
,`create_on` date
,`remarks` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_model`
--
CREATE TABLE `v_model` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_user`
--
CREATE TABLE `v_user` (
`id_user` varchar(10)
,`name` varchar(61)
,`username` varchar(30)
,`email` varchar(30)
,`divisi_name` varchar(20)
,`role_level` varchar(20)
,`Manager` varchar(30)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_barang`
--
DROP TABLE IF EXISTS `v_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_barang`  AS  select `barang_tb`.`id_barang` AS `id_barang`,`model_tb`.`product_name` AS `product_name`,`barang_tb`.`condition_barang` AS `condition_barang`,`barang_tb`.`status` AS `status`,`barang_tb`.`qty` AS `qty`,`barang_tb`.`create_on` AS `create_on`,`barang_tb`.`remarks` AS `remarks` from (`model_tb` join `barang_tb` on((`model_tb`.`id_model` = `barang_tb`.`id_model`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_model`
--
DROP TABLE IF EXISTS `v_model`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_model`  AS  select `model_tb`.`id_model` AS `id_model`,`model_tb`.`product_name` AS `product_name`,`model_tb`.`type` AS `type`,`model_tb`.`brand` AS `brand`,`user_tb`.`fname` AS `fname`,`model_tb`.`qty` AS `qty`,date_format(`model_tb`.`create_date`,'%d/%m/%Y') AS `create_date` from (`model_tb` join `user_tb` on((`model_tb`.`create_user` = `user_tb`.`id_user`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_user`
--
DROP TABLE IF EXISTS `v_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_user`  AS  select `user_tb`.`id_user` AS `id_user`,concat(`user_tb`.`fname`,' ',`user_tb`.`lname`) AS `name`,`user_tb`.`username` AS `username`,`user_tb`.`email` AS `email`,`divisi_tb`.`divisi_name` AS `divisi_name`,`level_tb`.`role_level` AS `role_level`,coalesce(`d`.`fname`,'-') AS `Manager` from (((`user_tb` join `divisi_tb` on((`user_tb`.`id_divisi` = `divisi_tb`.`id_divisi`))) join `level_tb` on((`user_tb`.`id_level` = `level_tb`.`id_level`))) left join `user_tb` `d` on((`user_tb`.`id_manager` = `d`.`id_user`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_tb`
--
ALTER TABLE `barang_tb`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `barang_tb` (`id_model`);

--
-- Indexes for table `barang_tb_seq`
--
ALTER TABLE `barang_tb_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisi_tb`
--
ALTER TABLE `divisi_tb`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `divisi_tb_seq`
--
ALTER TABLE `divisi_tb_seq`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `level_tb`
--
ALTER TABLE `level_tb`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `level_tb_seq`
--
ALTER TABLE `level_tb_seq`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `model_tb`
--
ALTER TABLE `model_tb`
  ADD PRIMARY KEY (`id_model`);

--
-- Indexes for table `model_tb_seq`
--
ALTER TABLE `model_tb_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tb`
--
ALTER TABLE `user_tb`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_divisi` (`id_divisi`),
  ADD KEY `id_level` (`id_level`),
  ADD KEY `id_manager` (`id_manager`);

--
-- Indexes for table `user_tb_seq`
--
ALTER TABLE `user_tb_seq`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_tb_seq`
--
ALTER TABLE `barang_tb_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `divisi_tb_seq`
--
ALTER TABLE `divisi_tb_seq`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `level_tb_seq`
--
ALTER TABLE `level_tb_seq`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `model_tb_seq`
--
ALTER TABLE `model_tb_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_tb_seq`
--
ALTER TABLE `user_tb_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang_tb`
--
ALTER TABLE `barang_tb`
  ADD CONSTRAINT `barang_tb` FOREIGN KEY (`id_model`) REFERENCES `model_tb` (`id_model`);

--
-- Ketidakleluasaan untuk tabel `user_tb`
--
ALTER TABLE `user_tb`
  ADD CONSTRAINT `user_tb_ibfk_1` FOREIGN KEY (`id_divisi`) REFERENCES `divisi_tb` (`id_divisi`),
  ADD CONSTRAINT `user_tb_ibfk_2` FOREIGN KEY (`id_level`) REFERENCES `level_tb` (`id_level`),
  ADD CONSTRAINT `user_tb_ibfk_3` FOREIGN KEY (`id_manager`) REFERENCES `user_tb` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
