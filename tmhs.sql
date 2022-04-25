-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2022 at 04:07 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `tmhs`
--

CREATE TABLE `tmhs` (
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tmhs`
--

INSERT INTO `tmhs` (`email`, `no_telp`, `password`, `nama_lengkap`, `jenis_kelamin`, `tanggal_lahir`, `alamat`) VALUES
('dellia@gmail.com', '085777777777', 'deltaaa', 'Dellia Deltania', 'Perempuan', '2012-03-02', 'Bandung, Jawa Barat'),
('fajar@yahoo.com', '088888888888', 'fajarrr', 'Fajar A', 'Laki-laki', '2022-03-04', 'Mana aja'),
('fajar', '000000', 'apa_aja', 'fajarrr', 'Laki-laki', '0000-00-00', 'Karawang'),
('hmmm@gmail.com', '9999999999', 'berapadeh', 'Siapa ya', 'Perempuan', '0000-00-00', 'keliling kota');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
