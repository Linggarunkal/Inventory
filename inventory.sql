-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2016 at 11:03 AM
-- Server version: 10.1.13-MariaDB
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
-- Table structure for table `barang_tb`
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
-- RELATIONS FOR TABLE `barang_tb`:
--   `id_model`
--       `model_tb` -> `id_model`
--

--
-- Dumping data for table `barang_tb`
--

INSERT INTO `barang_tb` (`id_barang`, `id_model`, `condition_barang`, `status`, `create_on`, `remarks`, `qty`) VALUES
('BRG002', 'MDL002', 'Stock', 'Bad', '2016-11-23', 'Barang Rusak di kembalikan', 14),
('BRG003', 'MDL002', 'Use', 'Good', '2016-11-23', 'barang in stock', 12),
('BRG015', 'MDL008', 'Stock', 'Good', '2016-11-25', 'Ready di gudang', 12),
('BRG016', 'MDL009', 'Stock', 'Good', '2016-12-10', 'Barang Baru', 23),
('BRG017', 'MDL010', 'Stock', 'Good', '2016-12-11', 'baru datang stock baru', 2);

--
-- Triggers `barang_tb`
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
-- Table structure for table `barang_tb_seq`
--

CREATE TABLE `barang_tb_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `barang_tb_seq`:
--

--
-- Dumping data for table `barang_tb_seq`
--

INSERT INTO `barang_tb_seq` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(9),
(12),
(15),
(16),
(17);

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `role` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `catagory`:
--

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`role`) VALUES
('admin'),
('user'),
('manager'),
('Group admin');

-- --------------------------------------------------------

--
-- Table structure for table `detailpinjam_barang`
--

CREATE TABLE `detailpinjam_barang` (
  `id_detailPinjam` int(10) NOT NULL,
  `id_barang` varchar(10) DEFAULT NULL,
  `id_pinjam` int(10) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `detailpinjam_barang`:
--   `id_barang`
--       `barang_tb` -> `id_barang`
--   `id_pinjam`
--       `peminjaman_tb` -> `id_pinjam`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisi_tb`
--

CREATE TABLE `divisi_tb` (
  `id_divisi` varchar(10) NOT NULL DEFAULT '0',
  `divisi_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `divisi_tb`:
--

--
-- Dumping data for table `divisi_tb`
--

INSERT INTO `divisi_tb` (`id_divisi`, `divisi_name`) VALUES
('DVS006', 'IT/MIS'),
('DVS010', 'Project Manager'),
('DVS034', 'TeleMarketing');

--
-- Triggers `divisi_tb`
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
-- Table structure for table `divisi_tb_seq`
--

CREATE TABLE `divisi_tb_seq` (
  `id_divisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `divisi_tb_seq`:
--

--
-- Dumping data for table `divisi_tb_seq`
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
(35),
(36);

-- --------------------------------------------------------

--
-- Table structure for table `level_tb`
--

CREATE TABLE `level_tb` (
  `id_level` varchar(10) NOT NULL DEFAULT '0',
  `role_level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `level_tb`:
--

--
-- Dumping data for table `level_tb`
--

INSERT INTO `level_tb` (`id_level`, `role_level`) VALUES
('LVL001', 'Manager'),
('LVL002', 'Admin'),
('LVL003', 'User'),
('LVL004', 'Group Head');

--
-- Triggers `level_tb`
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
-- Table structure for table `level_tb_seq`
--

CREATE TABLE `level_tb_seq` (
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `level_tb_seq`:
--

--
-- Dumping data for table `level_tb_seq`
--

INSERT INTO `level_tb_seq` (`id_level`) VALUES
(1),
(2),
(3),
(4);

-- --------------------------------------------------------

--
-- Table structure for table `model_tb`
--

CREATE TABLE `model_tb` (
  `id_model` varchar(10) NOT NULL DEFAULT '0',
  `product_name` varchar(30) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `brand` varchar(30) DEFAULT NULL,
  `create_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `model_tb`:
--

--
-- Dumping data for table `model_tb`
--

INSERT INTO `model_tb` (`id_model`, `product_name`, `type`, `brand`, `create_date`) VALUES
('MDL002', 'Lenovo Thinkpad E450', 'Laptop', 'Lenovo', '2016-11-18'),
('MDL004', 'Lenovo Thinkcentre Desktop E', 'Desktop', 'Lenovo', '2016-11-18'),
('MDL008', 'Samsung Galaxy S3', 'Smartphone', 'Samsung', '2016-11-24'),
('MDL009', 'Cisco', 'Cisco Switch Catalyst', 'Cisco', '2016-12-10'),
('MDL010', 'Mouse Wireless', 'Property Komputer', 'Lenovo', '2016-12-11');

--
-- Triggers `model_tb`
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
-- Table structure for table `model_tb_seq`
--

CREATE TABLE `model_tb_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `model_tb_seq`:
--

--
-- Dumping data for table `model_tb_seq`
--

INSERT INTO `model_tb_seq` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_tb`
--

CREATE TABLE `peminjaman_tb` (
  `id_pinjam` int(10) NOT NULL,
  `id_user` varchar(10) DEFAULT NULL,
  `requestDate` datetime DEFAULT NULL,
  `requestDue` datetime DEFAULT NULL,
  `note` varchar(100) DEFAULT NULL,
  `status` enum('approve','reject','waiting') DEFAULT 'waiting'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `peminjaman_tb`:
--   `id_user`
--       `user_tb` -> `id_user`
--

-- --------------------------------------------------------

--
-- Table structure for table `temp_detbarang`
--

CREATE TABLE `temp_detbarang` (
  `id_temp` int(10) NOT NULL,
  `id_barang` varchar(10) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `temp_detbarang`:
--   `id_barang`
--       `barang_tb` -> `id_barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_tb`
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
-- RELATIONS FOR TABLE `user_tb`:
--   `id_divisi`
--       `divisi_tb` -> `id_divisi`
--   `id_level`
--       `level_tb` -> `id_level`
--   `id_manager`
--       `user_tb` -> `id_user`
--

--
-- Dumping data for table `user_tb`
--

INSERT INTO `user_tb` (`id_user`, `fname`, `lname`, `username`, `password`, `id_divisi`, `id_level`, `id_manager`, `email`) VALUES
('USR001', 'Linggar', 'Kurniawan', 'lkurniawan', 'mukidi', 'DVS006', 'LVL001', NULL, 'linggar@mail.com'),
('USR003', 'Eriya', 'madhona', 'emadhona', 'mukidi', 'DVS006', 'LVL003', 'USR001', 'eriya@mail.com'),
('USR007', 'Samson', 'Samson', 'sbetawi', 'mukidi', 'DVS010', 'LVL001', NULL, 'samson@mail.com'),
('USR008', 'mukidi', 'mukidi', 'smukidi', 'mukidi', 'DVS006', 'LVL003', 'USR001', 'mukidi@mail.com');

--
-- Triggers `user_tb`
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
-- Table structure for table `user_tb_seq`
--

CREATE TABLE `user_tb_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `user_tb_seq`:
--

--
-- Dumping data for table `user_tb_seq`
--

INSERT INTO `user_tb_seq` (`id`) VALUES
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
-- Stand-in structure for view `v_stock_barang`
--
CREATE TABLE `v_stock_barang` (
`id_barang` varchar(10)
,`product_name` varchar(30)
,`qty` int(10)
,`status` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_temp_detbarang`
--
CREATE TABLE `v_temp_detbarang` (
`id_temp` int(10)
,`product_name` varchar(30)
,`qty` int(10)
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
-- Structure for view `v_barang`
--
DROP TABLE IF EXISTS `v_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_barang`  AS  select `barang_tb`.`id_barang` AS `id_barang`,`model_tb`.`product_name` AS `product_name`,`barang_tb`.`condition_barang` AS `condition_barang`,`barang_tb`.`status` AS `status`,`barang_tb`.`qty` AS `qty`,`barang_tb`.`create_on` AS `create_on`,`barang_tb`.`remarks` AS `remarks` from (`model_tb` join `barang_tb` on((`model_tb`.`id_model` = `barang_tb`.`id_model`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_model`
--
DROP TABLE IF EXISTS `v_model`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_model`  AS  select `model_tb`.`id_model` AS `id_model`,`model_tb`.`product_name` AS `product_name`,`model_tb`.`type` AS `type`,`model_tb`.`brand` AS `brand`,`user_tb`.`fname` AS `fname`,`model_tb`.`qty` AS `qty`,date_format(`model_tb`.`create_date`,'%d/%m/%Y') AS `create_date` from (`model_tb` join `user_tb` on((`model_tb`.`create_user` = `user_tb`.`id_user`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_stock_barang`
--
DROP TABLE IF EXISTS `v_stock_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stock_barang`  AS  select `barang_tb`.`id_barang` AS `id_barang`,`model_tb`.`product_name` AS `product_name`,`barang_tb`.`qty` AS `qty`,`barang_tb`.`status` AS `status` from (`model_tb` join `barang_tb` on((`model_tb`.`id_model` = `barang_tb`.`id_model`))) where (`barang_tb`.`condition_barang` = 'Stock') ;

-- --------------------------------------------------------

--
-- Structure for view `v_temp_detbarang`
--
DROP TABLE IF EXISTS `v_temp_detbarang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_temp_detbarang`  AS  select `temp_detbarang`.`id_temp` AS `id_temp`,`model_tb`.`product_name` AS `product_name`,`temp_detbarang`.`qty` AS `qty` from ((`model_tb` join `barang_tb` on((`model_tb`.`id_model` = `barang_tb`.`id_model`))) join `temp_detbarang` on((`barang_tb`.`id_barang` = `temp_detbarang`.`id_barang`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_user`
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
-- Indexes for table `detailpinjam_barang`
--
ALTER TABLE `detailpinjam_barang`
  ADD PRIMARY KEY (`id_detailPinjam`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_pinjam` (`id_pinjam`);

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
-- Indexes for table `peminjaman_tb`
--
ALTER TABLE `peminjaman_tb`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `temp_detbarang`
--
ALTER TABLE `temp_detbarang`
  ADD PRIMARY KEY (`id_temp`),
  ADD KEY `id_barang` (`id_barang`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `detailpinjam_barang`
--
ALTER TABLE `detailpinjam_barang`
  MODIFY `id_detailPinjam` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `divisi_tb_seq`
--
ALTER TABLE `divisi_tb_seq`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `level_tb_seq`
--
ALTER TABLE `level_tb_seq`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `model_tb_seq`
--
ALTER TABLE `model_tb_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `peminjaman_tb`
--
ALTER TABLE `peminjaman_tb`
  MODIFY `id_pinjam` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `temp_detbarang`
--
ALTER TABLE `temp_detbarang`
  MODIFY `id_temp` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_tb_seq`
--
ALTER TABLE `user_tb_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_tb`
--
ALTER TABLE `barang_tb`
  ADD CONSTRAINT `barang_tb` FOREIGN KEY (`id_model`) REFERENCES `model_tb` (`id_model`);

--
-- Constraints for table `detailpinjam_barang`
--
ALTER TABLE `detailpinjam_barang`
  ADD CONSTRAINT `detailpinjam_barang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang_tb` (`id_barang`),
  ADD CONSTRAINT `detailpinjam_barang_ibfk_2` FOREIGN KEY (`id_pinjam`) REFERENCES `peminjaman_tb` (`id_pinjam`);

--
-- Constraints for table `peminjaman_tb`
--
ALTER TABLE `peminjaman_tb`
  ADD CONSTRAINT `peminjaman_tb_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_tb` (`id_user`);

--
-- Constraints for table `temp_detbarang`
--
ALTER TABLE `temp_detbarang`
  ADD CONSTRAINT `temp_detbarang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang_tb` (`id_barang`);

--
-- Constraints for table `user_tb`
--
ALTER TABLE `user_tb`
  ADD CONSTRAINT `user_tb_ibfk_1` FOREIGN KEY (`id_divisi`) REFERENCES `divisi_tb` (`id_divisi`),
  ADD CONSTRAINT `user_tb_ibfk_2` FOREIGN KEY (`id_level`) REFERENCES `level_tb` (`id_level`),
  ADD CONSTRAINT `user_tb_ibfk_3` FOREIGN KEY (`id_manager`) REFERENCES `user_tb` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
