-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2024 a las 16:51:30
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cerbd`
--
CREATE DATABASE IF NOT EXISTS cerbd;
use cerbd;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `ID_Alumno` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellido` varchar(20) NOT NULL,
  `Cedula` int(11) NOT NULL,
  `Fecha_Nac` date NOT NULL,
  `Celular_Padres` varchar(9) NOT NULL,
  `Estado` tinyint(1) DEFAULT 1,
  `Grado` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos_clase`
--

CREATE TABLE `alumnos_clase` (
  `ID_Clase` int(11) NOT NULL,
  `ID_Alumno` int(11) NOT NULL,
  `Asistio` tinyint(1) DEFAULT NULL,
  `Fecha` date DEFAULT curdate(),
  `Estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE `clase` (
  `ID_Clase` int(11) NOT NULL,
  `ID_Docente` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Horario` varchar(100) NOT NULL,
  `Estado` tinyint(1) DEFAULT 1,
  `Año` int(11) DEFAULT year(curdate())
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `ID_Docente` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellido` varchar(20) NOT NULL,
  `Cedula` int(11) NOT NULL,
  `Celular` varchar(9) DEFAULT NULL,
  `Fecha_Nac` date DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT 1,
  `ID_Ocupacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especializaciones`
--

CREATE TABLE `especializaciones` (
  `ID_Especializacion` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `ID_Ocupacion` int(11) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especializacion_docente`
--

CREATE TABLE `especializacion_docente` (
  `ID_Especializacion` int(11) NOT NULL,
  `ID_Docente` int(11) NOT NULL,
  `Estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informes`
--

CREATE TABLE `informes` (
  `ID_Informe` int(11) NOT NULL,
  `ID_Docente` int(11) NOT NULL,
  `ID_Alumno` int(11) NOT NULL,
  `Titulo` varchar(50) NOT NULL,
  `Observaciones` text NOT NULL,
  `Fecha` date NOT NULL DEFAULT curdate(),
  `Estado` tinyint(1) DEFAULT 1,
  `Grado` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_docente`
--

CREATE TABLE `lista_docente` (
  `ID_Asistencia` int(11) NOT NULL,
  `ID_Docente` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Tipo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ocupacion`
--

CREATE TABLE `ocupacion` (
  `ID_Ocupacion` int(11) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patologias`
--

CREATE TABLE `patologias` (
  `ID_Patologia` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patologia_alumno`
--

CREATE TABLE `patologia_alumno` (
  `ID_Patologia` int(11) NOT NULL,
  `ID_Alumno` int(11) NOT NULL,
  `Estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_Usuario` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Cedula` int(11) NOT NULL,
  `Contraseña` varchar(65) NOT NULL,
  `Tipo` varchar(10) NOT NULL,
  `Estado` tinyint(1) DEFAULT 1,
  `Correo` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_Usuario`, `Nombre`, `Cedula`, `Contraseña`, `Tipo`, `Estado`, `Correo`) VALUES
(1, 'admin', 101, '$2y$10$1ASu9MLxP7ELcTD/TXa2w.2iNfm51hAPX7QUdFWnT/Ha9mGQVdL2K', 'admin', 1, 'reeducacionsalto@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`ID_Alumno`),
  ADD KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indices de la tabla `alumnos_clase`
--
ALTER TABLE `alumnos_clase`
  ADD KEY `ID_Clase` (`ID_Clase`),
  ADD KEY `ID_Alumno` (`ID_Alumno`);

--
-- Indices de la tabla `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`ID_Clase`),
  ADD KEY `ID_Docente` (`ID_Docente`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`ID_Docente`),
  ADD KEY `ID_Usuario` (`ID_Usuario`),
  ADD KEY `ID_Ocupacion` (`ID_Ocupacion`);

--
-- Indices de la tabla `especializaciones`
--
ALTER TABLE `especializaciones`
  ADD PRIMARY KEY (`ID_Especializacion`),
  ADD KEY `ID_Ocupacion` (`ID_Ocupacion`);

--
-- Indices de la tabla `especializacion_docente`
--
ALTER TABLE `especializacion_docente`
  ADD KEY `ID_Especializacion` (`ID_Especializacion`),
  ADD KEY `ID_Docente` (`ID_Docente`);

--
-- Indices de la tabla `informes`
--
ALTER TABLE `informes`
  ADD PRIMARY KEY (`ID_Informe`),
  ADD KEY `ID_Docente` (`ID_Docente`),
  ADD KEY `ID_Alumno` (`ID_Alumno`);

--
-- Indices de la tabla `lista_docente`
--
ALTER TABLE `lista_docente`
  ADD PRIMARY KEY (`ID_Asistencia`),
  ADD KEY `ID_Docente` (`ID_Docente`);

--
-- Indices de la tabla `ocupacion`
--
ALTER TABLE `ocupacion`
  ADD PRIMARY KEY (`ID_Ocupacion`);

--
-- Indices de la tabla `patologias`
--
ALTER TABLE `patologias`
  ADD PRIMARY KEY (`ID_Patologia`);

--
-- Indices de la tabla `patologia_alumno`
--
ALTER TABLE `patologia_alumno`
  ADD KEY `ID_Patologia` (`ID_Patologia`),
  ADD KEY `ID_Alumno` (`ID_Alumno`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `ID_Alumno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `ID_Clase` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `ID_Docente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `especializaciones`
--
ALTER TABLE `especializaciones`
  MODIFY `ID_Especializacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `informes`
--
ALTER TABLE `informes`
  MODIFY `ID_Informe` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lista_docente`
--
ALTER TABLE `lista_docente`
  MODIFY `ID_Asistencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ocupacion`
--
ALTER TABLE `ocupacion`
  MODIFY `ID_Ocupacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `patologias`
--
ALTER TABLE `patologias`
  MODIFY `ID_Patologia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuarios` (`ID_Usuario`);

--
-- Filtros para la tabla `alumnos_clase`
--
ALTER TABLE `alumnos_clase`
  ADD CONSTRAINT `alumnos_clase_ibfk_2` FOREIGN KEY (`ID_Alumno`) REFERENCES `alumnos` (`ID_Alumno`),
  ADD CONSTRAINT `alumnos_clase_ibfk_3` FOREIGN KEY (`ID_Clase`) REFERENCES `clase` (`ID_Clase`);

--
-- Filtros para la tabla `clase`
--
ALTER TABLE `clase`
  ADD CONSTRAINT `clase_ibfk_1` FOREIGN KEY (`ID_Docente`) REFERENCES `docentes` (`ID_Docente`);

--
-- Filtros para la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `docentes_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuarios` (`ID_Usuario`),
  ADD CONSTRAINT `docentes_ibfk_2` FOREIGN KEY (`ID_Ocupacion`) REFERENCES `ocupacion` (`ID_Ocupacion`);

--
-- Filtros para la tabla `especializaciones`
--
ALTER TABLE `especializaciones`
  ADD CONSTRAINT `especializaciones_ibfk_1` FOREIGN KEY (`ID_Ocupacion`) REFERENCES `ocupacion` (`ID_Ocupacion`);

--
-- Filtros para la tabla `especializacion_docente`
--
ALTER TABLE `especializacion_docente`
  ADD CONSTRAINT `especializacion_docente_ibfk_2` FOREIGN KEY (`ID_Docente`) REFERENCES `docentes` (`ID_Docente`),
  ADD CONSTRAINT `especializacion_docente_ibfk_3` FOREIGN KEY (`ID_Especializacion`) REFERENCES `especializaciones` (`ID_Especializacion`);

--
-- Filtros para la tabla `informes`
--
ALTER TABLE `informes`
  ADD CONSTRAINT `informes_ibfk_1` FOREIGN KEY (`ID_Docente`) REFERENCES `docentes` (`ID_Docente`),
  ADD CONSTRAINT `informes_ibfk_2` FOREIGN KEY (`ID_Alumno`) REFERENCES `alumnos` (`ID_Alumno`);

--
-- Filtros para la tabla `lista_docente`
--
ALTER TABLE `lista_docente`
  ADD CONSTRAINT `lista_docente_ibfk_1` FOREIGN KEY (`ID_Docente`) REFERENCES `docentes` (`ID_Docente`);

--
-- Filtros para la tabla `patologia_alumno`
--
ALTER TABLE `patologia_alumno`
  ADD CONSTRAINT `patologia_alumno_ibfk_2` FOREIGN KEY (`ID_Alumno`) REFERENCES `alumnos` (`ID_Alumno`),
  ADD CONSTRAINT `patologia_alumno_ibfk_3` FOREIGN KEY (`ID_Patologia`) REFERENCES `patologias` (`ID_Patologia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
