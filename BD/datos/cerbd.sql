-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2024 a las 19:31:32
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

CREATE DATABASE IF NOT EXISTS cerbd
USE cerbd

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

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`ID_Alumno`, `ID_Usuario`, `Nombre`, `Apellido`, `Cedula`, `Fecha_Nac`, `Celular_Padres`, `Estado`, `Grado`) VALUES
(1, 5, 'AlumnoNombre1', 'AlumnoNombre1', 4, '2024-11-09', '4', 1, 1),
(2, 6, 'AlumnoNombre2', 'AlumnoNombre2', 5, '2024-11-09', '5', 1, 1),
(3, 7, 'AlumnoNombre3', 'AlumnoApellido3', 6, '2024-11-09', '6', 1, 1);

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

--
-- Volcado de datos para la tabla `alumnos_clase`
--

INSERT INTO `alumnos_clase` (`ID_Clase`, `ID_Alumno`, `Asistio`, `Fecha`, `Estado`) VALUES
(1, 1, NULL, '2024-11-09', 1),
(1, 2, NULL, '2024-11-09', 1),
(1, 3, NULL, '2024-11-09', 1),
(2, 1, NULL, '2024-11-09', 1),
(2, 2, NULL, '2024-11-09', 1),
(2, 3, NULL, '2024-11-09', 1),
(3, 1, NULL, '2024-11-09', 1),
(3, 2, NULL, '2024-11-09', 1),
(3, 3, NULL, '2024-11-09', 1),
(1, 1, 0, '2024-11-09', 1),
(1, 2, 0, '2024-11-09', 1),
(1, 3, 0, '2024-11-09', 1),
(2, 1, 0, '2024-11-09', 1),
(2, 2, 0, '2024-11-09', 1),
(2, 3, 0, '2024-11-09', 1),
(3, 1, 0, '2024-11-09', 1),
(3, 2, 1, '2024-11-09', 1),
(3, 3, 0, '2024-11-09', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE `clase` (
  `ID_Clase` int(11) NOT NULL,
  `ID_Docente` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Horario` varchar(100) NOT NULL,
  `Estado` tinyint(1) DEFAULT 1,
  `Año` int(11) DEFAULT year(curdate())
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clase`
--

INSERT INTO `clase` (`ID_Clase`, `ID_Docente`, `Nombre`, `Horario`, `Estado`, `Año`) VALUES
(1, 1, 'Clase1', 'Lun(14:00-15:00)', 1, 2024),
(2, 2, 'Clase2', 'Lun(14:00-15:00), Mie(16:00-17:00), Vie(17:00-18:00)', 1, 2024),
(3, 3, 'Clase3', 'Lun(13:00-14:00), Mar(17:00-18:00), Mie(15:00-17:00), Jue(17:00-18:00), Vie(10:00-11:00)', 1, 2024);

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

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`ID_Docente`, `ID_Usuario`, `Nombre`, `Apellido`, `Cedula`, `Celular`, `Fecha_Nac`, `Estado`, `ID_Ocupacion`) VALUES
(1, 2, 'DocenteNombre1', 'DocenteApellido1', 1, '1', '2024-11-09', 1, 1),
(2, 3, 'DocenteNombre2', 'DocenteApellido2', 2, '2', '2024-11-09', 1, 2),
(3, 4, 'DocenteNombre3', 'DocenteApellido3', 3, '3', '2024-11-09', 1, 3);

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

--
-- Volcado de datos para la tabla `especializaciones`
--

INSERT INTO `especializaciones` (`ID_Especializacion`, `Nombre`, `ID_Ocupacion`, `Estado`) VALUES
(1, 'Especialidad 1', 1, 1),
(2, 'Especialidad 2', 1, 1),
(3, 'Especialidad 3', 1, 1),
(4, 'Especialidad 4', 2, 1),
(5, 'Especialidad 5', 2, 1),
(6, 'Especialidad 6', 2, 1),
(7, 'Especialidad 7', 3, 1),
(8, 'Especialidad 8', 3, 1),
(9, 'Especialidad 9', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especializacion_docente`
--

CREATE TABLE `especializacion_docente` (
  `ID_Especializacion` int(11) NOT NULL,
  `ID_Docente` int(11) NOT NULL,
  `Estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especializacion_docente`
--

INSERT INTO `especializacion_docente` (`ID_Especializacion`, `ID_Docente`, `Estado`) VALUES
(1, 1, 1),
(4, 2, 1),
(7, 3, 1);

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

--
-- Volcado de datos para la tabla `informes`
--

INSERT INTO `informes` (`ID_Informe`, `ID_Docente`, `ID_Alumno`, `Titulo`, `Observaciones`, `Fecha`, `Estado`, `Grado`) VALUES
(1, 1, 1, 'Informe1', 'Informe 1 de muestra.', '2024-11-09', 1, 1),
(2, 2, 2, 'Informe2', 'Informe 2 de muestra.', '2024-11-09', 1, 1),
(3, 3, 3, 'Informe3', 'Informe 3 de muestra.', '2024-11-09', 1, 1);

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

--
-- Volcado de datos para la tabla `lista_docente`
--

INSERT INTO `lista_docente` (`ID_Asistencia`, `ID_Docente`, `Fecha`, `Hora`, `Tipo`) VALUES
(1, 1, '2024-11-09', '15:12:53', 'E'),
(2, 1, '2024-11-09', '15:12:55', 'S'),
(3, 2, '2024-11-09', '15:12:58', 'E'),
(4, 2, '2024-11-09', '15:13:00', 'S'),
(5, 3, '2024-11-09', '15:13:02', 'E'),
(6, 3, '2024-11-09', '15:13:05', 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ocupacion`
--

CREATE TABLE `ocupacion` (
  `ID_Ocupacion` int(11) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ocupacion`
--

INSERT INTO `ocupacion` (`ID_Ocupacion`, `Nombre`, `Estado`) VALUES
(1, 'Ocupación 1', 1),
(2, 'Ocupación 2', 1),
(3, 'Ocupación 3', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patologias`
--

CREATE TABLE `patologias` (
  `ID_Patologia` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `patologias`
--

INSERT INTO `patologias` (`ID_Patologia`, `Nombre`, `Estado`) VALUES
(1, 'Patología 1', 1),
(2, 'Patología 2', 1),
(3, 'Patología 3', 1),
(4, 'Patología 4', 1),
(5, 'Patología 5', 1),
(6, 'Patología 6', 1),
(7, 'Patología 7', 1),
(8, 'Patología 8', 1),
(9, 'Patología 9', 1),
(10, 'Patología 10', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patologia_alumno`
--

CREATE TABLE `patologia_alumno` (
  `ID_Patologia` int(11) NOT NULL,
  `ID_Alumno` int(11) NOT NULL,
  `Estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `patologia_alumno`
--

INSERT INTO `patologia_alumno` (`ID_Patologia`, `ID_Alumno`, `Estado`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1);

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
(1, 'admin', 12345678, '$2y$10$8dcqUdE3w7KC1/2YzXhN9uV7ThhEo.7Fsm7vcLpTsFkM67E.4t9ia', 'admin', 1, 'reeducacionsalto@gmail.com'),
(2, 'DocenteNombre1 DocenteApellido1', 1, '$2y$10$o1FDvp5BpTheeu/gZ87zK.0ikBpWHQq5a/AJK.k2uSbfVf1yUzBQ.', 'docente', 1, ''),
(3, 'DocenteNombre2 DocenteApellido2', 2, '$2y$10$GlKcVxIxcdEe0GqjcUPE1O0lWNJswMwf0.tFn.kC4GYKfqBk4qRem', 'docente', 1, ''),
(4, 'DocenteNombre3 DocenteApellido3', 3, '$2y$10$WHWpN4mDDer5.gOkMBnzdOZe4Y9BWZmiNUQsCyLWNaCobOOckrjW2', 'docente', 1, ''),
(5, 'AlumnoNombre1 AlumnoNombre1', 4, '$2y$10$7BTFvfUQrZyq4YYurU9/7uzDLupiK1s4DUkOLuRdCjozXU1IzfVBG', 'alumno', 1, ''),
(6, 'AlumnoNombre2 AlumnoNombre2', 5, '$2y$10$GpEqV6z084OJ9GrBbYE0E.imWNvW/Mq8gsqA94/RNTtnzATijdeJq', 'alumno', 1, ''),
(7, 'AlumnoNombre3 AlumnoApellido3', 6, '$2y$10$.n0yfysAYoPZBuuH1aCkueGH0LmIizB3.zrpWOvjv38Qk/rqMN8ni', 'alumno', 1, '');

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
  MODIFY `ID_Alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `ID_Clase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `ID_Docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `especializaciones`
--
ALTER TABLE `especializaciones`
  MODIFY `ID_Especializacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `informes`
--
ALTER TABLE `informes`
  MODIFY `ID_Informe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `lista_docente`
--
ALTER TABLE `lista_docente`
  MODIFY `ID_Asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ocupacion`
--
ALTER TABLE `ocupacion`
  MODIFY `ID_Ocupacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `patologias`
--
ALTER TABLE `patologias`
  MODIFY `ID_Patologia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
