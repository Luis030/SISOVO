-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-08-2024 a las 20:24:18
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
  `Mail_Padres` varchar(30) NOT NULL,
  `Celular_Padres` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`ID_Alumno`, `ID_Usuario`, `Nombre`, `Apellido`, `Cedula`, `Fecha_Nac`, `Mail_Padres`, `Celular_Padres`) VALUES
(1, 2, 'Luis', 'Fernández', 33445566, '2008-05-15', 'luis.fernandez@padres.com', '555-6789'),
(2, 4, 'Andrea', 'Martínez', 44556677, '2007-04-22', 'andrea.martinez@padres.com', '555-7890'),
(3, 6, 'Pedro', 'Gómez', 55667788, '2009-03-18', 'pedro.gomez@padres.com', '555-8901'),
(4, 8, 'Sara', 'López', 66778899, '2006-02-25', 'sara.lopez@padres.com', '555-9012'),
(5, 10, 'Jorge', 'Torres', 77889900, '2010-01-30', 'jorge.torres@padres.com', '555-0123'),
(6, 2, 'Clara', 'Ríos', 88990011, '2008-06-15', 'clara.rios@padres.com', '555-2345'),
(7, 4, 'Fernando', 'Díaz', 99001122, '2007-07-20', 'fernando.diaz@padres.com', '555-3456'),
(8, 6, 'Marta', 'Jiménez', 10011223, '2009-08-25', 'marta.jimenez@padres.com', '555-4567'),
(9, 8, 'Diego', 'Navarro', 11122334, '2006-09-30', 'diego.navarro@padres.com', '555-5678'),
(10, 10, 'FEDERICO NICOLAS', 'SIMONELLI CAVALLO', 555, '2010-10-05', 'paula.romero@padres.com', '555-6789'),
(19, 96, 'LUIS MANUEL', 'SOSA BERROA', 56777350, '2024-08-17', 'LManuelSosa@gmail.com', '092504454');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos_clase`
--

CREATE TABLE `alumnos_clase` (
  `ID_Clase` int(11) NOT NULL,
  `ID_Alumno` int(11) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos_clase`
--

INSERT INTO `alumnos_clase` (`ID_Clase`, `ID_Alumno`, `Fecha`) VALUES
(1, 1, '2024-08-08'),
(2, 2, '2024-08-08'),
(3, 3, '2024-08-08'),
(4, 4, '2024-08-08'),
(5, 5, '2024-08-08'),
(6, 6, '2024-08-08'),
(7, 7, '2024-08-08'),
(8, 8, '2024-08-08'),
(9, 9, '2024-08-08'),
(10, 10, '2024-08-08'),
(1, 2, '2024-08-09'),
(2, 3, '2024-08-09'),
(3, 4, '2024-08-09'),
(4, 5, '2024-08-09'),
(5, 6, '2024-08-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `ID_Asistencia` int(11) NOT NULL,
  `ID_Clase` int(11) NOT NULL,
  `ID_Alumno` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Asistio` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`ID_Asistencia`, `ID_Clase`, `ID_Alumno`, `Fecha`, `Asistio`) VALUES
(1, 1, 1, '2024-08-08', 1),
(2, 2, 2, '2024-08-08', 1),
(3, 3, 3, '2024-08-08', 1),
(4, 4, 4, '2024-08-08', 0),
(5, 5, 5, '2024-08-08', 1),
(6, 6, 6, '2024-08-08', 0),
(7, 7, 7, '2024-08-08', 1),
(8, 8, 8, '2024-08-08', 1),
(9, 9, 9, '2024-08-08', 0),
(10, 10, 10, '2024-08-08', 1),
(11, 1, 2, '2024-08-09', 1),
(12, 2, 3, '2024-08-09', 0),
(13, 3, 4, '2024-08-09', 1),
(14, 4, 5, '2024-08-09', 0),
(15, 5, 6, '2024-08-09', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE `clase` (
  `ID_Clase` int(11) NOT NULL,
  `ID_Docente` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Dia` varchar(10) NOT NULL,
  `Inicio` time NOT NULL,
  `Final` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clase`
--

INSERT INTO `clase` (`ID_Clase`, `ID_Docente`, `Nombre`, `Dia`, `Inicio`, `Final`) VALUES
(1, 1, 'Álgebra', 'Lunes', '09:00:00', '10:30:00'),
(2, 2, 'Historia Moderna', 'Martes', '10:00:00', '11:30:00'),
(3, 3, 'Química', 'Miércoles', '11:00:00', '12:30:00'),
(4, 4, 'Literatura Inglesa', 'Jueves', '12:00:00', '13:30:00'),
(5, 5, 'Deportes', 'Viernes', '08:00:00', '09:30:00'),
(6, 1, 'Geometría', 'Lunes', '11:00:00', '12:30:00'),
(7, 2, 'Historia Antigua', 'Martes', '13:00:00', '14:30:00'),
(8, 3, 'Física', 'Miércoles', '09:00:00', '10:30:00'),
(9, 4, 'Poesía', 'Jueves', '14:00:00', '15:30:00'),
(10, 5, 'Natación', 'Viernes', '10:00:00', '11:30:00');

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
  `Mail` varchar(30) NOT NULL,
  `Celular` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`ID_Docente`, `ID_Usuario`, `Nombre`, `Apellido`, `Cedula`, `Mail`, `Celular`) VALUES
(1, 1, 'Carlos', 'Mendoza', 11223344, 'carlos.mendoza@ejemplo.com', '555-1234'),
(2, 3, 'María', 'López', 22334455, 'maria.lopez@ejemplo.com', '555-2345'),
(3, 5, 'Elena', 'Rodríguez', 33445566, 'elena.rodriguez@ejemplo.com', '555-3456'),
(4, 7, 'Lucía', 'Fernández', 44556677, 'lucia.fernandez@ejemplo.com', '555-4567'),
(5, 9, 'Laura', 'Díaz', 55667788, 'laura.diaz@ejemplo.com', '555-5678'),
(7, 82, '', '', 56777350, '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especializaciones`
--

CREATE TABLE `especializaciones` (
  `ID_Especializacion` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especializaciones`
--

INSERT INTO `especializaciones` (`ID_Especializacion`, `Nombre`) VALUES
(1, 'Matem├íticas'),
(2, 'Historia'),
(3, 'Ciencias'),
(4, 'Literatura'),
(5, 'Educaci├│n F├¡sica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especializacion_docente`
--

CREATE TABLE `especializacion_docente` (
  `ID_Especializacion` int(11) NOT NULL,
  `ID_Docente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especializacion_docente`
--

INSERT INTO `especializacion_docente` (`ID_Especializacion`, `ID_Docente`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(1, 2),
(2, 3),
(3, 4),
(4, 5),
(5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informes`
--

CREATE TABLE `informes` (
  `ID_Informe` int(11) NOT NULL,
  `ID_Docente` int(11) NOT NULL,
  `ID_Alumno` int(11) NOT NULL,
  `Titulo` varchar(20) NOT NULL,
  `Observaciones` text NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `informes`
--

INSERT INTO `informes` (`ID_Informe`, `ID_Docente`, `ID_Alumno`, `Titulo`, `Observaciones`, `Fecha`) VALUES
(1, 1, 1, 'Informe Mensual', 'Buen progreso en matemáticas.', '2024-08-08'),
(2, 2, 2, 'Informe Trimestral', 'Destaca en historia moderna.', '2024-08-08'),
(3, 3, 3, 'Informe Bimestral', 'Gran interés en ciencias.', '2024-08-08'),
(4, 4, 4, 'Informe Semanal', 'Necesita mejorar en literatura.', '2024-08-08'),
(5, 5, 5, 'Informe Quincenal', 'Muy activo en deportes.', '2024-08-08'),
(6, 1, 6, 'Informe Mensual', 'Mejoras en álgebra.', '2024-08-08'),
(7, 2, 7, 'Informe Trimestral', 'Buenas calificaciones en historia.', '2024-08-08'),
(8, 3, 8, 'Informe Bimestral', 'Excelente en física.', '2024-08-08'),
(9, 4, 9, 'Informe Semanal', 'Interés por la poesía.', '2024-08-08'),
(10, 5, 10, 'Informe Quincenal', 'Progreso en natación.', '2024-08-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `llegada_docente`
--

CREATE TABLE `llegada_docente` (
  `ID_Llegada` int(11) NOT NULL,
  `ID_Docente` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `llegada_docente`
--

INSERT INTO `llegada_docente` (`ID_Llegada`, `ID_Docente`, `Fecha`, `Hora`) VALUES
(1, 1, '2024-08-08', '08:45:00'),
(2, 2, '2024-08-08', '09:50:00'),
(3, 3, '2024-08-08', '10:45:00'),
(4, 4, '2024-08-08', '11:55:00'),
(5, 5, '2024-08-08', '07:45:00'),
(6, 1, '2024-08-09', '08:50:00'),
(7, 2, '2024-08-09', '09:55:00'),
(8, 3, '2024-08-09', '10:50:00'),
(9, 4, '2024-08-09', '11:50:00'),
(10, 5, '2024-08-09', '07:55:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patologias`
--

CREATE TABLE `patologias` (
  `ID_Patologia` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `patologias`
--

INSERT INTO `patologias` (`ID_Patologia`, `Nombre`) VALUES
(1, 'Alergia'),
(2, 'Asma'),
(3, 'Diabetes'),
(4, 'Hipertensi├│n'),
(5, 'Epilepsia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patologia_alumno`
--

CREATE TABLE `patologia_alumno` (
  `ID_Patologia` int(11) NOT NULL,
  `ID_Alumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `patologia_alumno`
--

INSERT INTO `patologia_alumno` (`ID_Patologia`, `ID_Alumno`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(1, 6),
(2, 7),
(3, 8),
(4, 9),
(5, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_Usuario` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Cedula` int(11) NOT NULL,
  `Contraseña` varchar(65) NOT NULL,
  `Tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_Usuario`, `Nombre`, `Cedula`, `Contraseña`, `Tipo`) VALUES
(1, 'Juan Pérez', 1, 'password1', 'docente'),
(2, 'Ana García', 2, 'password2', 'alumno'),
(3, 'María López', 3, 'password3', 'docente'),
(4, 'José Martínez', 4, 'password4', 'alumno'),
(5, 'Elena Rodríguez', 5, 'password5', 'docente'),
(6, 'Carlos Sánchez', 6, 'password6', 'alumno'),
(7, 'Lucía Fernández', 7, 'password7', 'docente'),
(8, 'Miguel Gómez', 8, 'password8', 'alumno'),
(9, 'Laura Díaz', 9, 'password9', 'docente'),
(10, 'FEDERICO NICOLAS SIMONELLI CAVALLO', 10, 'alumno', 'alumno'),
(11, 'admin', 11, 'admin', 'admin'),
(12, 'alumno', 12, 'alumno', 'alumno'),
(13, 'LUIS MANUEL SOSA BERROA', 13, 'admin', 'ADMIN'),
(14, 'FEDERICO NICOLAS SIMONELLI CAVALLO', 14, 'alumno', 'ALUMNO'),
(82, 'LUIS MANUEL SOSA BERROA', 15, 'admin', 'admin'),
(96, 'LUIS MANUEL SOSA BERROA', 56777350, '$2y$10$dJSrmoD/M/4d4E0LHny/c.4gfWj81ioXkSIYr2mhgDwisZA/Z8jIK', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`ID_Alumno`),
  ADD UNIQUE KEY `Cedula` (`Cedula`),
  ADD KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indices de la tabla `alumnos_clase`
--
ALTER TABLE `alumnos_clase`
  ADD KEY `ID_Clase` (`ID_Clase`),
  ADD KEY `ID_Alumno` (`ID_Alumno`);

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`ID_Asistencia`),
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
  ADD KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indices de la tabla `especializaciones`
--
ALTER TABLE `especializaciones`
  ADD PRIMARY KEY (`ID_Especializacion`);

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
-- Indices de la tabla `llegada_docente`
--
ALTER TABLE `llegada_docente`
  ADD PRIMARY KEY (`ID_Llegada`),
  ADD KEY `ID_Docente` (`ID_Docente`);

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
  ADD PRIMARY KEY (`ID_Usuario`),
  ADD UNIQUE KEY `Cedula` (`Cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `ID_Alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `ID_Asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `ID_Clase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `ID_Docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `especializaciones`
--
ALTER TABLE `especializaciones`
  MODIFY `ID_Especializacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `informes`
--
ALTER TABLE `informes`
  MODIFY `ID_Informe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `llegada_docente`
--
ALTER TABLE `llegada_docente`
  MODIFY `ID_Llegada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `patologias`
--
ALTER TABLE `patologias`
  MODIFY `ID_Patologia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

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
  ADD CONSTRAINT `alumnos_clase_ibfk_1` FOREIGN KEY (`ID_Clase`) REFERENCES `clase` (`ID_Clase`),
  ADD CONSTRAINT `alumnos_clase_ibfk_2` FOREIGN KEY (`ID_Alumno`) REFERENCES `alumnos` (`ID_Alumno`),
  ADD CONSTRAINT `alumnos_clase_ibfk_3` FOREIGN KEY (`ID_Alumno`) REFERENCES `alumnos` (`ID_Alumno`);

--
-- Filtros para la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `asistencias_ibfk_1` FOREIGN KEY (`ID_Clase`) REFERENCES `clase` (`ID_Clase`),
  ADD CONSTRAINT `asistencias_ibfk_2` FOREIGN KEY (`ID_Alumno`) REFERENCES `alumnos` (`ID_Alumno`);

--
-- Filtros para la tabla `clase`
--
ALTER TABLE `clase`
  ADD CONSTRAINT `clase_ibfk_1` FOREIGN KEY (`ID_Docente`) REFERENCES `docentes` (`ID_Docente`);

--
-- Filtros para la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `docentes_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuarios` (`ID_Usuario`);

--
-- Filtros para la tabla `especializacion_docente`
--
ALTER TABLE `especializacion_docente`
  ADD CONSTRAINT `especializacion_docente_ibfk_1` FOREIGN KEY (`ID_Especializacion`) REFERENCES `especializaciones` (`ID_Especializacion`),
  ADD CONSTRAINT `especializacion_docente_ibfk_2` FOREIGN KEY (`ID_Docente`) REFERENCES `docentes` (`ID_Docente`);

--
-- Filtros para la tabla `informes`
--
ALTER TABLE `informes`
  ADD CONSTRAINT `informes_ibfk_1` FOREIGN KEY (`ID_Docente`) REFERENCES `docentes` (`ID_Docente`),
  ADD CONSTRAINT `informes_ibfk_2` FOREIGN KEY (`ID_Alumno`) REFERENCES `alumnos` (`ID_Alumno`);

--
-- Filtros para la tabla `llegada_docente`
--
ALTER TABLE `llegada_docente`
  ADD CONSTRAINT `llegada_docente_ibfk_1` FOREIGN KEY (`ID_Docente`) REFERENCES `docentes` (`ID_Docente`);

--
-- Filtros para la tabla `patologia_alumno`
--
ALTER TABLE `patologia_alumno`
  ADD CONSTRAINT `patologia_alumno_ibfk_1` FOREIGN KEY (`ID_Patologia`) REFERENCES `patologias` (`ID_Patologia`),
  ADD CONSTRAINT `patologia_alumno_ibfk_2` FOREIGN KEY (`ID_Alumno`) REFERENCES `alumnos` (`ID_Alumno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
