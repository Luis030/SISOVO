-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2024 a las 02:50:38
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

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`ID_Alumno`, `ID_Usuario`, `Nombre`, `Apellido`, `Cedula`, `Fecha_Nac`, `Celular_Padres`, `Estado`, `Grado`) VALUES
(1, 5, 'Carlos Pedro', 'Sosa Sanchez', 4, '2008-09-08', '099274994', 1, 3),
(2, 6, 'Martin Emiliano', 'Silva Fernández', 5, '2010-02-18', '092462957', 1, 6),
(3, 7, 'Juan Andrés', 'Rodríguez Pérez', 6, '2007-10-07', '098402759', 1, 2),
(4, 8, 'Santiago', 'Pereira González', 11, '2014-05-30', '099274926', 1, 2),
(5, 9, 'Santiago Mateo', 'Pereira Suárez', 12, '2010-11-08', '091475930', 1, 5),
(6, 10, 'Alejandro Sebastián', 'López Castro', 13, '2012-12-10', '097462856', 1, 6),
(7, 11, 'Nicolás Tomás', 'Fernández Días', 14, '2014-05-07', '099375629', 1, 5),
(8, 12, 'Gonzalo Javier', 'Méndez Cabrera', 15, '2008-01-06', '091573927', 1, 4),
(9, 13, 'Pablo Maximiliano', 'Pérez Sosa', 16, '2013-06-08', '099428285', 1, 4),
(10, 15, 'Agustín Fernando', 'Silva Morales', 18, '2010-05-29', '099457482', 1, 5),
(11, 16, 'Ana Laura', 'Gonzalez Pereira', 19, '2011-07-26', '098548209', 1, 4),
(12, 17, 'María Fernanda', 'Sánchez Rodríguez', 20, '2010-03-14', '091752829', 1, 3),
(13, 18, 'Lucía Belén', 'Torres Méndez', 21, '2008-02-17', '099472917', 1, 4),
(14, 19, 'Valentina Sofía', 'Díaz Correa', 22, '2013-04-19', '098572959', 1, 5);

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
(3, 3, 0, '2024-11-09', 1),
(1, 7, NULL, '2024-11-12', 1),
(1, 5, NULL, '2024-11-12', 1),
(1, 8, NULL, '2024-11-12', 1),
(2, 8, NULL, '2024-11-12', 1),
(2, 6, NULL, '2024-11-12', 1),
(3, 6, NULL, '2024-11-12', 1),
(3, 9, NULL, '2024-11-12', 1),
(4, 1, NULL, '2024-11-12', 1),
(4, 6, NULL, '2024-11-12', 1),
(4, 13, NULL, '2024-11-12', 1),
(4, 10, NULL, '2024-11-12', 1),
(5, 6, NULL, '2024-11-12', 1),
(5, 10, NULL, '2024-11-12', 1),
(5, 11, NULL, '2024-11-12', 1),
(5, 1, NULL, '2024-11-12', 1),
(5, 8, NULL, '2024-11-12', 1),
(5, 3, NULL, '2024-11-12', 1),
(5, 13, NULL, '2024-11-12', 1),
(5, 9, NULL, '2024-11-12', 1),
(5, 7, NULL, '2024-11-12', 1),
(5, 5, NULL, '2024-11-12', 1),
(5, 4, NULL, '2024-11-12', 1),
(5, 2, NULL, '2024-11-12', 1),
(5, 12, NULL, '2024-11-12', 1),
(5, 14, NULL, '2024-11-12', 1),
(1, 1, 0, '2024-11-10', 1),
(1, 2, 0, '2024-11-10', 1),
(1, 3, 1, '2024-11-10', 1),
(1, 7, 1, '2024-11-10', 1),
(1, 5, 1, '2024-11-10', 1),
(1, 8, 1, '2024-11-10', 1),
(1, 1, 1, '2024-11-12', 1),
(1, 2, 0, '2024-11-12', 1),
(1, 3, 0, '2024-11-12', 1),
(1, 7, 1, '2024-11-12', 1),
(1, 5, 1, '2024-11-12', 1),
(1, 8, 0, '2024-11-12', 1),
(6, 5, NULL, '2024-11-12', 1),
(6, 4, NULL, '2024-11-12', 1),
(6, 6, NULL, '2024-11-12', 1),
(6, 3, NULL, '2024-11-12', 1),
(11, 6, NULL, '2024-11-12', 1),
(11, 1, NULL, '2024-11-12', 1),
(9, 3, NULL, '2024-11-12', 1),
(9, 2, NULL, '2024-11-12', 1),
(9, 1, NULL, '2024-11-12', 1),
(9, 5, NULL, '2024-11-12', 1),
(8, 3, NULL, '2024-11-12', 1),
(8, 2, NULL, '2024-11-12', 1),
(10, 4, NULL, '2024-11-12', 1),
(10, 5, NULL, '2024-11-12', 1),
(10, 1, NULL, '2024-11-12', 1),
(8, 3, 0, '2024-11-12', 1),
(8, 2, 1, '2024-11-12', 1),
(6, 5, 1, '2024-11-12', 1),
(6, 4, 0, '2024-11-12', 1),
(6, 6, 1, '2024-11-12', 1),
(6, 3, 1, '2024-11-12', 1);

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
(3, 3, 'Clase3', 'Lun(13:00-14:00), Mar(17:00-18:00), Mie(15:00-17:00), Jue(17:00-18:00), Vie(10:00-11:00)', 1, 2024),
(4, 7, 'Clase4', 'Lun(10:00-11:00)', 1, 2024),
(5, 7, 'Clase6', 'Lun(10:00-11:00), Mie(20:00-21:00)', 1, 2024),
(6, 1, 'Clase10', 'Lun(10:00-11:00)', 1, 2024),
(7, 1, 'Clase9', 'Mie(14:00-15:00)', 1, 2024),
(8, 3, 'Clase8', 'Jue(20:00-21:00)', 1, 2024),
(9, 5, 'Clase7', 'Sab(05:55-06:55)', 1, 2024),
(10, 2, 'Clase5', 'Jue(20:00-21:00)', 1, 2024),
(11, 6, 'Clase11', 'Lun(10:00-11:00), Mie(20:00-21:00)', 1, 2024);

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
(1, 2, 'Sandra Lucia', 'Dominguez', 46295736, '092856395', '1990-10-02', 1, 1),
(2, 3, 'Renzo Gómez', 'Silva', 2, '2', '2024-11-09', 1, 2),
(3, 4, 'Carlos', 'Rodriguez', 3, '3', '2024-11-09', 1, 3),
(4, 14, 'Diego Alejandro', 'Suárez Costa', 83628593, '092869265', '1991-10-10', 1, 2),
(5, 20, 'Camila Andrea', 'Castro Suárez', 35926405, '092574037', '1998-02-10', 1, 3),
(6, 21, 'Florencia Paola', 'Machado Barreto', 49829461, '099482658', '2000-04-25', 1, 1),
(7, 22, 'Antonella Victoria', 'Sosa Silva', 47285903, '092759386', '1999-07-28', 1, 2);

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
(1, 'Escolar', 1, 1),
(2, 'Clínico', 1, 1),
(3, 'Educativo', 1, 1),
(4, 'Lengua', 2, 1),
(5, 'Apoyo Escolar', 2, 1),
(6, 'Matemáticas', 2, 1),
(7, 'Psicomotricidad', 3, 1),
(8, 'Psicopedagogía', 3, 1),
(9, 'Psicologia', 3, 1),
(10, 'Fonoaudiología', 3, 1),
(11, 'Terapia Ocupacional', 3, 1),
(12, 'Logopedia', 3, 1),
(13, 'Musicoterapia', 3, 1);

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
(7, 3, 1),
(6, 4, 1),
(5, 4, 1),
(9, 5, 1),
(3, 6, 1),
(4, 7, 1);

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
(3, 3, 3, 'Informe3', 'Informe 3 de muestra.', '2024-11-09', 1, 1),
(4, 1, 5, 'Informe de Santiago Noviembre', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2024-11-12', 1, 5),
(5, 1, 8, 'Informe de Javier Noviembre', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2024-11-12', 1, 4),
(6, 1, 2, 'Informe de Martin Noviembre', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2024-11-12', 1, 6),
(7, 1, 8, 'Informe de Gonzalo Noviembre', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2024-11-12', 1, 4),
(8, 1, 7, 'Informe de Nicolás Noviembre', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2024-11-12', 1, 5),
(9, 1, 2, 'Informe de Martin Septiembre', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2024-09-17', 1, 6),
(10, 1, 8, 'Informe de Gonzalo Septiembre', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2024-09-04', 1, 4),
(11, 1, 3, 'Informe de Juan Septiembre', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2024-09-16', 1, 2),
(12, 1, 5, 'Informe de Santiago Septiembre', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2024-09-04', 1, 5),
(13, 1, 8, 'Informe de Gonzalo Octubre', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2024-10-03', 1, 4),
(14, 1, 7, 'Informe de Nicolás Octubre', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2024-10-05', 1, 5),
(15, 1, 1, 'Informe de Carlos Octubre', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2024-10-14', 1, 3),
(16, 1, 8, 'Informe de Gonzalo Julio', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2024-07-04', 1, 4),
(17, 1, 8, 'Informe de Gonzalo Junio', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2024-06-07', 1, 4),
(18, 1, 8, 'Informe de Gonzalo Agosto', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2024-08-03', 1, 4),
(19, 1, 8, 'Informe de Gonzalo Mayo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2024-05-15', 1, 4),
(20, 1, 8, 'Informe de Gonzalo Abril', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2024-04-07', 1, 4),
(21, 1, 3, 'Informe de Juan Mayo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2024-05-02', 1, 2),
(22, 1, 3, 'Informe de Juan Junio', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2024-06-03', 1, 2),
(23, 1, 1, 'Informe de Carlos Mayo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2024-05-26', 1, 3),
(24, 1, 7, 'Informe de Nicolás Agosto', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2024-08-20', 1, 5),
(25, 1, 5, 'Informe de Santiago Julio', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2024-07-19', 1, 5),
(26, 1, 2, 'Informe de Martin Marzo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2024-03-02', 1, 6),
(27, 1, 7, 'Informe de Nicolas Febrero', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2024-02-08', 1, 5);

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
(6, 3, '2024-11-09', '15:13:05', 'S'),
(7, 1, '2024-11-06', '21:32:09', 'E'),
(8, 2, '2024-11-11', '21:32:11', 'E'),
(9, 3, '2024-11-11', '21:32:14', 'E'),
(10, 1, '2024-11-10', '21:32:24', 'S'),
(11, 2, '2024-11-10', '21:32:27', 'S'),
(12, 3, '2024-11-10', '21:32:28', 'S'),
(13, 1, '2024-11-01', '21:51:45', 'E'),
(14, 1, '2024-11-01', '21:51:47', 'S'),
(15, 1, '2024-05-02', '12:51:50', 'S'),
(16, 2, '2024-05-03', '11:04:08', 'E'),
(17, 2, '2024-11-12', '10:04:10', 'S'),
(18, 2, '2024-11-12', '22:09:09', 'E'),
(19, 2, '2024-11-12', '22:09:17', 'S'),
(20, 2, '2024-11-12', '22:09:19', 'E'),
(21, 2, '2024-11-12', '22:09:21', 'E'),
(22, 2, '2024-11-12', '22:09:22', 'E'),
(23, 2, '2024-06-12', '22:09:24', 'S'),
(24, 2, '2024-06-12', '22:09:26', 'S'),
(25, 2, '2024-07-12', '22:09:28', 'S'),
(26, 2, '2024-07-12', '22:10:13', 'E'),
(27, 2, '2024-08-12', '22:10:15', 'S');

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
(1, 'Trabajador Social', 1),
(2, 'Profesor', 1),
(3, 'Licenciado', 1),
(4, 'Maestro', 1);

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
(1, 'Dislexia', 1),
(2, 'Discalculia', 1),
(3, 'Trastorno del Espectro Autista (TEA)', 1),
(4, 'Trastorno del Procesamiento Auditivo', 1),
(5, 'Trastorno del Procesamiento Visual', 1),
(6, 'Disfasia', 1),
(7, 'Síndrome de Asperger', 1),
(8, 'Déficit en la Comprensión Lectora', 1),
(9, 'Trastorno de Ansiedad', 1),
(10, 'Disgrafía', 1),
(11, 'Trastorno de Ansiedad por Separación', 1),
(12, 'Discapacidad Visual', 1),
(13, 'Discapacidad Auditiva', 1),
(14, 'Trastorno del Desarrollo del Lenguaje (TDL)', 1);

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
(3, 3, 1),
(5, 1, 1),
(7, 1, 1),
(8, 1, 1),
(4, 1, 1),
(7, 3, 1),
(9, 3, 1),
(8, 2, 1),
(1, 2, 1),
(3, 2, 1),
(5, 4, 1),
(6, 5, 1),
(8, 5, 1),
(5, 6, 1),
(3, 6, 1),
(6, 7, 1),
(9, 7, 1),
(7, 7, 1),
(6, 8, 1),
(3, 9, 1),
(3, 10, 1),
(4, 11, 1),
(10, 11, 1),
(4, 12, 1),
(3, 13, 1),
(10, 13, 1),
(3, 14, 1),
(7, 8, 1);

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
(1, 'Administrador', 101, '$2y$10$dPtjt/xPXiNBxj4wHSXMnurD.y5WRd0GPnWEObtnQgebzPi78NqFK', 'admin', 1, 'reeducacionsalto@gmail.com'),
(2, 'Sandra Lucia Dominguez', 46295736, '$2y$10$36adktV7gM6fkF1llG2bOOafemS758BgHaqq5t/q7g0vexGpLfsSW', 'docente', 1, 'LManuelSosa@gmail.com'),
(3, 'Renzo Gómez Silva', 2, '$2y$10$GlKcVxIxcdEe0GqjcUPE1O0lWNJswMwf0.tFn.kC4GYKfqBk4qRem', 'docente', 1, 'rensilva3829@gmail.com'),
(4, 'Carlos Rodriguez', 3, '$2y$10$WHWpN4mDDer5.gOkMBnzdOZe4Y9BWZmiNUQsCyLWNaCobOOckrjW2', 'docente', 1, ''),
(5, 'Carlos Pedro Sosa Sanchez', 4, '$2y$10$7BTFvfUQrZyq4YYurU9/7uzDLupiK1s4DUkOLuRdCjozXU1IzfVBG', 'alumno', 1, 'carlossanchez543532@gmail.com'),
(6, 'Martin Emiliano Silva Fernández', 5, '$2y$10$GpEqV6z084OJ9GrBbYE0E.imWNvW/Mq8gsqA94/RNTtnzATijdeJq', 'alumno', 1, 'siilvaferNDZ8352@gmail.com'),
(7, 'Juan Andrés Rodríguez Pérez', 6, '$2y$10$.n0yfysAYoPZBuuH1aCkueGH0LmIizB3.zrpWOvjv38Qk/rqMN8ni', 'alumno', 1, 'juanandres38942@gmail.com'),
(8, 'Santiago Mateo Pereira González', 11, '$2y$10$wiNykzquawmtkHlRM5zQvObK2lgEG0.dEyfaTwZc3Ojpsu4ia1SqO', 'alumno', 1, 'santipere2523@gmail.com'),
(9, 'Santiago Mateo Pereira Suárez', 12, '$2y$10$u429NIFE7GROlJbQEBEYm.Z208ADFys.VU9JD7i2aaXwez0Hobxhm', 'alumno', 1, 'mater895739@gmail.com'),
(10, 'Alejandro Sebastián López Castro', 13, '$2y$10$Arhsd9seeOHZAnVufKZwwe8al/ALH0e1ISrQjHP4A7Iy7p8CO1Vue', 'alumno', 1, 'sebas893245@gmail.com'),
(11, 'Nicolás Tomás Fernández Días', 14, '$2y$10$VmUBCuH3LvrqXOmDYQ6qwu.CFVnm9G8pc.BwmuFNjrDTo80DuumQ2', 'alumno', 1, 'nicolasferdias345@gmail.com'),
(12, 'Gonzalo Javier Méndez Cabrera', 15, '$2y$10$UIbu5pQ..vzjr5bYyv8pqeF0udt0Q9p7GxOs4gzwCktu0zo6roEEG', 'alumno', 1, 'gonjavier5723@gmail.com'),
(13, 'Pablo Maximiliano Pérez Sosa', 16, '$2y$10$ALNfa0FFwHr04wIWwCDm9ecqSyxzy1aTsa2MGVaSvgsFbgw5Mjxii', 'alumno', 1, 'maxisosa8043@gmail.com'),
(14, 'Diego Alejandro Suárez Costa', 83628593, '$2y$10$x6cEYMMWcLSgI5parGBS8uveC5Azgpz/vca37pX5xq3O4QXsO2o.6', 'docente', 1, 'diegosuarez0493@gmail.com'),
(15, 'Agustín Fernando Silva Morales', 18, '$2y$10$LeEdsgFRPrnx8Pk96BYXzuJUzh4MFysDpQk4Z3uiOtOhPNj2c..p2', 'alumno', 1, 'fermorales95734@gmail.com'),
(16, 'Ana Laura Gonzalez Pereira', 19, '$2y$10$kqpziHje2YaJxXiHEwvp8eTEZvSBdIiDUZJcAkdMBXWIyvBbLsoRm', 'alumno', 1, 'analau29534@gmail.com'),
(17, 'María Fernanda Sánchez Rodríguez', 20, '$2y$10$3qF/AfInKxImCNUSTyH8SePeD6VGEogJlkqd7JSX6HfGrgKf8wNhS', 'alumno', 1, 'fertsanchez9053@gmail.com'),
(18, 'Lucía Belén Torres Méndez', 21, '$2y$10$/8inwp89GUp6OpOxyoye3uw2xTIOSGWhxazzpHYncYBsJAw6Rg8oC', 'alumno', 1, 'belenlu2859@gmail.com'),
(19, 'Valentina Sofía Díaz Correa', 22, '$2y$10$v3X6Q97WDb9yH4gsTNj4suGOaAwk.XCBT.LFB01JSH/Huu9h3tBS6', 'alumno', 1, 'valesofi42542@gmail.com'),
(20, 'Camila Andrea Castro Suárez', 35926405, '$2y$10$d.mvJSIIOSWYqpnJBKKX.exBgWTqcYI1/A3onIq3GHYWxYLCFcbLm', 'docente', 1, ''),
(21, 'Florencia Paola Machado Barreto', 49829461, '$2y$10$zhClUm9tygpnB2xKcKohJ..BTFgPqEj/k5ojSBzjmjvSpWTZOvzUm', 'docente', 1, ''),
(22, 'Antonella Victoria Sosa Silva', 47285903, '$2y$10$frTDrEjGj6hA/8o85tk70.i2ZKtuX6uf4ViW4q6moqk0F1Gzv1Hd2', 'docente', 1, 'vicky582095@gmail.com');

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
  MODIFY `ID_Alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `ID_Clase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `ID_Docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `especializaciones`
--
ALTER TABLE `especializaciones`
  MODIFY `ID_Especializacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `informes`
--
ALTER TABLE `informes`
  MODIFY `ID_Informe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `lista_docente`
--
ALTER TABLE `lista_docente`
  MODIFY `ID_Asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `ocupacion`
--
ALTER TABLE `ocupacion`
  MODIFY `ID_Ocupacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `patologias`
--
ALTER TABLE `patologias`
  MODIFY `ID_Patologia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
