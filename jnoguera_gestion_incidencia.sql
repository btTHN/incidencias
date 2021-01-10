-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Temps de generació: 10-01-2021 a les 18:04:37
-- Versió del servidor: 10.4.14-MariaDB
-- Versió de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `jnoguera_gestion_incidencia`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `incidencias`
--

CREATE TABLE `incidencias` (
  `id` int(4) NOT NULL,
  `id_usuario` int(4) NOT NULL,
  `fecha_inicio` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_final` datetime DEFAULT NULL,
  `material` varchar(25) NOT NULL,
  `comentario` varchar(250) DEFAULT NULL,
  `comentarioAdm` varchar(250) DEFAULT NULL,
  `aula` int(3) NOT NULL,
  `prioridad` varchar(10) NOT NULL DEFAULT 'BAJA',
  `estado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `incidencias`
--

INSERT INTO `incidencias` (`id`, `id_usuario`, `fecha_inicio`, `fecha_final`, `material`, `comentario`, `comentarioAdm`, `aula`, `prioridad`, `estado`) VALUES
(1, 1, '2021-01-10 18:01:43', '2021-01-10 18:02:41', 'teclado', 'No funciona', 'Cambiado!', 117, 'MEDIO', 2);

-- --------------------------------------------------------

--
-- Estructura de la taula `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(4) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `password`, `mail`, `role`) VALUES
(1, 'julio', 'P@ssw0rd', 'julio@merce.com', 'ROLE_USER'),
(2, 'albert', 'P@ssw0rd', 'albert@gmail.com', 'ROLE_USER'),
(3, 'david', 'P@ssw0rd', 'david@gmail.com', 'ROLE_ADMIN'),
(5, 'carlos', 'P@ssw0rd', 'carlos@gmail.com', 'ROLE_USER');

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índexs per a la taula `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la taula `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restriccions per a les taules bolcades
--

--
-- Restriccions per a la taula `incidencias`
--
ALTER TABLE `incidencias`
  ADD CONSTRAINT `incidencias_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
