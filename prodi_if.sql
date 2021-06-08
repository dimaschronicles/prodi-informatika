-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2021 at 04:22 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prodi_if`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `title` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `date_creation` varchar(128) NOT NULL,
  `uploader` varchar(256) NOT NULL,
  `file_lampiran1` varchar(128) NOT NULL,
  `file_lampiran2` varchar(128) NOT NULL,
  `file_lampiran3` varchar(128) NOT NULL,
  `file_lampiran4` varchar(128) NOT NULL,
  `file_lampiran5` varchar(128) NOT NULL,
  `file_lampiran6` varchar(128) NOT NULL,
  `file_lampiran7` varchar(128) NOT NULL,
  `file_lampiran8` varchar(128) NOT NULL,
  `file_lampiran9` varchar(128) NOT NULL,
  `file_lampiran10` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `title`, `description`, `date_creation`, `uploader`, `file_lampiran1`, `file_lampiran2`, `file_lampiran3`, `file_lampiran4`, `file_lampiran5`, `file_lampiran6`, `file_lampiran7`, `file_lampiran8`, `file_lampiran9`, `file_lampiran10`) VALUES
(5, 'Pengumuman 2 Edit', 'Ini desktipso', '2021-06-08 21:06:06', 'Admin', 'coba_docx.docx', '', '', '', '', '', '', '', '', ''),
(6, 'Pengumuman 1', 'saadasd', '2021-06-08 21:05:54', 'Admin', 'jpg.jpg', 'coba_pdf.pdf', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nidn` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `address` varchar(512) NOT NULL,
  `gender` varchar(128) NOT NULL,
  `telephone` varchar(16) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nidn`, `name`, `email`, `address`, `gender`, `telephone`, `image`, `password`, `role`, `date_created`) VALUES
(1, '12345', 'Admin', 'admin@gmail.com', 'localhost 127.0.0.1', 'Laki-laki', '0987654321', 'official-logo2.jpg', '$2y$10$8gz/OfvNBnvbYyOmq.ScguNIorvgeTTgse1Bp7MrDkXNL4y5nRpfe', 1, 0),
(2, '18110031', 'Dimas CNA', 'dimas@gmail.com', 'Pliken RT06/RW06, Kec. Kembaran, Kab. Banyumas, Jawa Tengah, Indonesia, 53182.', 'Laki-laki', '081903304446', 'default.jpg', '$2y$10$RZbqgpsAv/As7lqC/Rsk5uLUMFhXJ/FKoxB8cYgpcSjszHf1/8Vcq', 2, 1622256508),
(3, '18110002', 'Anggie Febriansyah', 'anggie@gmail.com', 'Kebumen', 'Laki-laki', '12345', 'default.jpg', '$2y$10$Y/iUlK4AyT4WylwaAfEZTO4aMD/OR8beQDhDWeeKFzEAesFrzgcM.', 2, 1622256549),
(4, '18110007', 'Refri Riyanto', 'refri@gmail.com', 'Ajibarang', 'Laki-laki', '12345', 'default.jpg', '$2y$10$GCIRmur2odoLSPfl7LGe6uO/ucYJ3owYExXL9bMF.rnHfPk3h3iO2', 2, 1622256592),
(5, '18110011', 'Dimas Sepha', 'sepha@gmail.com', 'Cimanggu', 'Laki-laki', '12345', 'default.jpg', '$2y$10$vGCY3yJ2bSNQtYqJXyHHk.alpUQyrYWCuQ.LuRfxFlvsm4SoVIH4q', 2, 1622256631),
(6, '18110017', 'Maratun Soleha', 'leha@gmail.com', 'Rawalo', 'Perempuan', '12345', 'default.jpg', '$2y$10$kG4/y.Gii6LROYRm0FKJouC39DSgCDDbj9Z6uPFP6HpjKicWPYW/O', 2, 1622256687),
(7, '18110024', 'Faiq Hamdani', 'faiq@gmail.com', 'Bumiayu', 'Laki-laki', '12345', 'default.jpg', '$2y$10$eha9UYQ4/MbgdjZ8NBV7Te59xOpZr5kEy15dyvTEL31lmAmsIMFw6', 2, 1622256723),
(8, '18110028', 'Paras Taufani', 'paras@gmail.com', 'Purbalingga', 'Laki-laki', '12345', 'default.jpg', '$2y$10$MoVi6yP3QUCLep1Q1E0vOOQhxN0UNJt2mhg92dzecz44D.CcZpkUS', 2, 1622256760),
(9, '18110001', 'Ismi Susilawati', 'ismi@gmail.com', 'Kebasen', 'Perempuan', '12345', 'default.jpg', '$2y$10$KN6wFFJ0GlipzgErf3iIxOl3w/RezG3DAb58O0CD5jen6Y/0MYB4i', 2, 1622256803),
(10, '18110029', 'Farhan Ramdhani', 'farhan@gmail.com', 'Bumiayu', 'Laki-laki', '12345', 'default.jpg', '$2y$10$Eu9TEQsore7zs.J59TOhKucNsg1xtI4QfDTlbbadAv5YGvcBAn.VC', 2, 1622256859),
(11, '18110037', 'Zamna Rofiq', 'zamna@gmail.com', 'Pasir', 'Laki-laki', '12345', 'default.jpg', '$2y$10$/quP7rwUrSC1DT.ogeRSGe1UZsYmeh2/QnOdhSjIcuSR/bDGv8.W.', 2, 1622256931),
(12, '123456', 'Admin Backup', 'backup', 'localhost 127.0.0.1', 'Laki-laki', '12345', 'default.jpg', '$2y$10$62JW.I4C.CxPMiSSSZZot.e.ve7Exu/8XAzQytt2GY2mz5cAEBp4a', 1, 1622257116),
(13, '1234567', 'Administrator', 'admins', 'localhost 127.0.0.1', 'Laki-laki', '12345', 'default.jpg', '$2y$10$w16OPFUx9VeXIKxfyPA8eecHhsXs1LtPn/2mDiWaD1FEg98XO6Sa2', 1, 1622257215),
(14, '18110255', 'Slamet Fauzi', 'ozi@gmail.com', 'Cilongok', 'Laki-laki', '12345', 'default.jpg', '$2y$10$/FMCuDWVZtB/2owrvBlTDOH3RUOIPeV6YRoTZFZdE1d87SkAdw8UG', 2, 1622258082),
(15, '18110256', 'Rizki Bayu', 'bayu@gmail.co', 'Papringan', 'Laki-laki', '12345', 'default.jpg', '$2y$10$754.uksFxsk9RlL/nuzA.esufDj8biR.I0.DwtzNHuTUB8Pfb4Imq', 2, 1622258126);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_arsip`
--

CREATE TABLE `user_arsip` (
  `id_user_arsip` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_file` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_arsip`
--

INSERT INTO `user_arsip` (`id_user_arsip`, `id_user`, `id_file`) VALUES
(24, 9, 4),
(25, 3, 4),
(26, 4, 4),
(27, 5, 4),
(28, 6, 4),
(29, 7, 5),
(30, 8, 5),
(31, 14, 5),
(32, 15, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_file`
--

CREATE TABLE `user_file` (
  `id_file` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `date_created` datetime NOT NULL,
  `uploader` varchar(128) NOT NULL,
  `userfile1` varchar(128) NOT NULL,
  `userfile2` varchar(128) NOT NULL,
  `userfile3` varchar(128) NOT NULL,
  `userfile4` varchar(128) NOT NULL,
  `userfile5` varchar(128) NOT NULL,
  `userfile6` varchar(128) NOT NULL,
  `userfile7` varchar(128) NOT NULL,
  `userfile8` varchar(128) NOT NULL,
  `userfile9` varchar(128) NOT NULL,
  `userfile10` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_file`
--

INSERT INTO `user_file` (`id_file`, `title`, `description`, `date_created`, `uploader`, `userfile1`, `userfile2`, `userfile3`, `userfile4`, `userfile5`, `userfile6`, `userfile7`, `userfile8`, `userfile9`, `userfile10`) VALUES
(4, 'Judl Edit', 'keerangangan', '2021-06-08 20:52:42', 'Admin', 'coba_docx.docx', '', '', '', '', '', '', '', '', ''),
(5, 'Pengumuman 2', 'Keterangan', '2021-06-08 21:03:52', 'Admin', 'coba_xlsx.xlsx', 'coba_pdf.pdf', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_arsip`
--
ALTER TABLE `user_arsip`
  ADD PRIMARY KEY (`id_user_arsip`);

--
-- Indexes for table `user_file`
--
ALTER TABLE `user_file`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_arsip`
--
ALTER TABLE `user_arsip`
  MODIFY `id_user_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_file`
--
ALTER TABLE `user_file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
