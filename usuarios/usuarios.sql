-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2024 at 01:28 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usuarios`
--

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `documento` int(15) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `pass` char(40) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `movil` varchar(10) NOT NULL,
  `tipo_user` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha_reg` date NOT NULL,
  `fecha_mod` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_user`, `nombre`, `apellidos`, `documento`, `usuario`, `pass`, `mail`, `movil`, `tipo_user`, `estado`, `fecha_reg`, `fecha_mod`) VALUES
(1, 'PEDRO IGNACIO', 'PEREZ GONZALEZ', 1111111111, 'PEDRO123', '', 'pedro.perez@prueba.com', '3433434343', 2, 2, '2024-03-15', '2024-03-16'),
(2, 'JUAN CARLOS', 'MARTINEZ', 80898765, 'JUAN', 'f638e2789006da9bb337fd5689e37a265a70f359', 'JUAN.MARTINEZ@ALGO.COM', '7676767676', 1, 1, '2024-03-15', NULL),
(3, 'JHON ALEXANDER', 'CELIS CELIS', 2147483647, 'JHONC', 'd528fca3b163c05703e88b5285440bec28ecf185', 'JHON@PRUEBA.COM', '5654321234', 1, 1, '2024-03-15', '2024-03-16'),
(4, 'LAURA SOFIA', 'SANCHEZ GOMEZ', 11111111, 'LAURA', '70352f41061eda4ff3c322094af068ba70c3b38b', 'LAURA@PRUEBA.COM', '8888888888', 1, 1, '2024-03-14', NULL),
(5, 'FABIO NELSON', 'DIAZ ROJAS', 2147483647, 'FABIO', '8104ba1dc0409b259f487ed07db477c38f205a30', 'FABIO@PRUEBA.COM', '2345676890', 1, 2, '2024-03-13', '2024-03-16'),
(6, 'FERNANDO', 'MONTANO RUBIANO', 99099876, 'FER444', '70352f41061eda4ff3c322094af068ba70c3b38b', 'FERNANDO@PRUEBA.COM', '3212345678', 1, 1, '2024-03-16', '2024-03-16'),
(7, 'GIOVANNY', 'SARMIENTO', 80808976, 'GIOSARLO', '70352f41061eda4ff3c322094af068ba70c3b38b', 'GIOVANNY@PRUEBA.COM', '3132323236', 1, 1, '2024-03-16', NULL),
(8, 'JORGE ALBERTO', 'CAMARGO LUGO', 45645645, 'JORGE', '70352f41061eda4ff3c322094af068ba70c3b38b', 'JORGE@JERGE.COM', '3124567890', 2, 1, '2024-03-14', '2024-03-17'),
(9, 'JUANITO', 'LOPEZ RUIZ', 2147483647, 'JUANITO', 'e976399c504625e37d8d3474b0ab1ca80c6ec196', 'JHON1@PRUEBA.COM', '2343234323', 1, 1, '2024-03-20', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
