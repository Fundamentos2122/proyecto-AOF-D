-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2022 at 01:43 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `money_me`
--

-- --------------------------------------------------------

--
-- Table structure for table `ahorros`
--

CREATE TABLE `ahorros` (
  `id` int(11) NOT NULL,
  `concepto` varchar(25) NOT NULL,
  `ahorrado` int(11) NOT NULL,
  `objetivo` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `activo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ahorros`
--

INSERT INTO `ahorros` (`id`, `concepto`, `ahorrado`, `objetivo`, `user_id`, `estado`, `activo`) VALUES
(1, 'Camara', 2000, 10000, 1, 0, 1),
(4, 'Computadora', 1500, 20001, 0, 0, 1),
(5, 'Teclado', 500, 2000, 0, 0, 1),
(6, 'Lentes', 500, 1500, 0, 0, 1),
(9, 'testo', 12, 1000, 1, 0, 1),
(10, 'Abono inicial, moto', 1000, 4000, 2, 0, 1),
(11, 'Lentes', 10, 2000, 7, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `asunto` varchar(35) NOT NULL,
  `mensaje` tinytext NOT NULL,
  `fecha` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `activo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mensajes`
--

INSERT INTO `mensajes` (`id`, `asunto`, `mensaje`, `fecha`, `user_id`, `activo`) VALUES
(1, '¡Felicidades!', 'He visto tu comportamiento a lo largo de estos meses. Has mejorado considerablemente.', '2022-06-04', 1, 1),
(2, 'Puedes mejorar...', 'Tu desempeño no ha sido excelente, puedes mejorar aún.', '2022-06-03', 2, 1),
(8, 'Bienvenido', 'Bienvenido a la web', '2022-06-06', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `metas`
--

CREATE TABLE `metas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(35) NOT NULL,
  `descripcion` tinytext NOT NULL,
  `ahorrado` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `activo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metas`
--

INSERT INTO `metas` (`id`, `titulo`, `descripcion`, `ahorrado`, `fecha`, `user_id`, `activo`) VALUES
(1, 'Tomar fotografias en una selva', 'Desde siempre he querido tomar fotografias a animales salvajes en su hábitat. Necesito dinero y tiempo para lograr este objetivo.', 5000, '2022-06-24', 1, 1),
(3, 'Tomar un curso de otro idoma', 'En verano hay cursos', 300, '2022-06-16', 0, 1),
(5, 'Terminar clases', 'Me falta una computadora', 3000, '2022-06-08', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `name` varchar(35) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `activo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `name`, `type`, `admin`, `activo`) VALUES
(1, 'user1', '123', 'Estudiante de Web', 1, 0, 1),
(2, 'user2', '123', 'Estudiante de Web 2', 2, 0, 1),
(3, 'user3', '123', 'Estudiante de Web 3', 3, 0, 1),
(4, 'admin', '123', 'El admin roberto', 0, 1, 1),
(6, 'user4', '123', 'Estudiante web 4', 3, 0, 1),
(7, 'user5', '123', 'Estudiante Web 5', 1, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ahorros`
--
ALTER TABLE `ahorros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metas`
--
ALTER TABLE `metas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ahorros`
--
ALTER TABLE `ahorros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `metas`
--
ALTER TABLE `metas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
