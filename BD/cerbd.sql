-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2024 a las 23:13:13
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
(1, 1, 'Juan', 'Pérez', 78713177, '2016-08-06', '089250435', 0, 4),
(2, 2, 'María', 'González', 84409802, '2007-08-19', '098032878', 0, 5),
(3, 3, 'Carlos', 'Rodríguez', 33045395, '2016-10-03', '096292114', 0, 8),
(4, 4, 'Lucía', 'Martínez', 41447172, '2016-09-07', '097560505', 0, 10),
(5, 5, 'Mateo', 'López', 58681693, '2008-02-15', '094637655', 1, 15),
(6, 6, 'Sofía', 'Díaz', 17812342, '2009-08-17', '094385559', 0, 38),
(7, 7, 'Tomás', 'Fernández', 13956930, '2011-04-30', '095140250', 0, 7),
(8, 8, 'vbcbgc', 'fran', 59170771, '2013-11-27', '098646116', 1, 3),
(9, 9, 'martinez', 'Hernández', 12111791, '2009-05-28', '093064627', 1, 6),
(10, 10, 'Valentina', 'Sánchez', 55397008, '2009-02-28', '095808961', 1, 3),
(11, 22, 'luis sosa', 'Simonelli Cavallo', 56129975, '2006-09-21', '092504454', 1, 1),
(12, 26, 'Sofía Milagros', 'Gallero Monte', 56437766, '2006-10-23', '098280012', 0, 6),
(14, 29, 'fafsaf', 'sdfsfs', 56437766, '2024-10-31', '43253453', 1, 5),
(15, 30, 'fddgh', 'fsdfsdf', 56437766, '2024-10-31', '453535', 0, 3);

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
(2, 2, NULL, '2024-10-10', 0),
(2, 1, NULL, '2024-10-10', 0),
(2, 3, NULL, '2024-10-10', 0),
(2, 2, 0, '2024-10-10', 0),
(2, 1, 0, '2024-10-10', 0),
(2, 3, 1, '2024-10-10', 0),
(2, 6, NULL, '2024-10-10', 0),
(2, 2, 0, '2024-10-11', 0),
(2, 1, 0, '2024-10-11', 0),
(2, 3, 1, '2024-10-11', 0),
(2, 6, 0, '2024-10-11', 0),
(3, 2, NULL, '2024-10-11', 0),
(3, 3, NULL, '2024-10-11', 0),
(3, 7, NULL, '2024-10-11', 0),
(2, 11, NULL, '2024-10-16', 0),
(12, 4, NULL, '2024-10-16', 0),
(12, 8, NULL, '2024-10-16', 0),
(12, 4, 0, '2024-10-23', 0),
(12, 8, 1, '2024-10-23', 0),
(12, 4, 0, '2024-10-24', 0),
(12, 8, 0, '2024-10-24', 0),
(13, 4, NULL, '2024-10-24', 0),
(13, 1, NULL, '2024-10-24', 0),
(13, 5, NULL, '2024-10-24', 0),
(13, 2, NULL, '2024-10-24', 0),
(13, 3, NULL, '2024-10-24', 0),
(13, 11, NULL, '2024-10-24', 0),
(12, 5, NULL, '2024-10-24', 0),
(12, 6, NULL, '2024-10-24', 0),
(12, 1, NULL, '2024-10-24', 0),
(12, 2, NULL, '2024-10-24', 0),
(12, 9, NULL, '2024-10-24', 1),
(12, 7, NULL, '2024-10-24', 0),
(12, 10, NULL, '2024-10-24', 1),
(14, 9, NULL, '2024-10-24', 1),
(13, 4, 0, '2024-10-24', 0),
(13, 1, 1, '2024-10-24', 0),
(13, 5, 0, '2024-10-24', 0),
(13, 2, 1, '2024-10-24', 0),
(13, 11, 1, '2024-10-24', 0),
(13, 7, NULL, '2024-10-24', 0),
(13, 1, 1, '2024-10-30', 0),
(13, 2, 1, '2024-10-30', 0),
(13, 4, 1, '2024-10-30', 0),
(13, 5, 1, '2024-10-30', 0),
(13, 7, 1, '2024-10-30', 0),
(13, 11, 1, '2024-10-30', 0),
(2, 9, NULL, '2024-10-31', 1),
(2, 5, NULL, '2024-10-31', 1),
(4, 6, NULL, '2024-11-01', 0),
(16, 8, NULL, '2024-11-02', 0),
(13, 14, NULL, '2024-11-04', 1);

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
(2, 5, 'hgfhfth', 'Lunes', 0, 2024),
(3, 8, 'Historia', 'Martes', 0, 2024),
(4, 3, 'Área de lengua', 'Miércoles', 1, 2024),
(5, 4, 'Lengua', 'Jueves', 0, 2024),
(8, 5, 'Área de lengua', 'Lunes', 0, 2024),
(11, 10, 'Inglés', 'Viernes', 0, 2024),
(12, 13, 'clases', 'Jue(15:00-16:00)', 0, 2024),
(13, 13, 'naufrago', 'Mar(14:04-14:05)', 1, 2024),
(14, 5, 'gdfgdfg', 'Jue(03:04-05:03)', 0, 2024),
(15, 14, 'siempre fdsfsdf', 'Vie(03:09-03:59)', 1, 2024),
(16, 10, 'ghnvfcnfgxn dxhg', 'Mie(12:53-12:59)', 0, 2024);

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
(1, 11, 'Ana', 'Ramírez', 69647322, '097958413', '2024-10-24', 0, 6),
(2, 12, 'Pedro', 'Gómez', 26673841, '097816287', '1991-08-14', 1, 3),
(3, 13, 'Laura', 'Fernández', 73882441, '095430551', '2000-11-03', 1, 1),
(4, 14, 'Santiago', 'Morales', 61377294, '098171709', '2003-10-26', 1, 5),
(5, 15, 'Claudia', 'Ruiz', 92692705, '096836842', '2024-11-09', 0, 6),
(6, 16, 'Roberto', 'Torres', 52837341, '092898511', '1986-11-23', 1, 8),
(7, 17, 'María', 'López', 16156404, '098583986', '2000-09-07', 1, 9),
(8, 18, 'Carlos', 'Méndez', 45659784, '091633174', '1998-12-04', 0, 2),
(9, 19, 'Paula', 'Gutiérrez', 71192529, '098201334', '2004-08-19', 0, 2),
(10, 20, 'Jorge', 'Herrera', 15918386, '095486464', '1985-02-05', 0, 2),
(13, 24, 'Luis Manuel', 'Sosa Berroa', 56777350, '092504454', '2007-03-27', 1, 4),
(14, 25, 'Ian Andrés', 'Volpi Zamit', 56499637, '09250944', '2007-03-27', 1, 5);

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
(1, 'Marketing', 8, 1),
(2, 'Francés', 5, 1),
(3, 'Uruguayo', 5, 1),
(4, 'Inglés', 5, 1),
(5, 'Ingeniería de software', 3, 1),
(6, 'Psicología', 3, 1),
(7, 'rrgd', 3, 1),
(8, 'Orientación académica', 7, 1),
(9, 'Consejería psicológica', 7, 1),
(10, 'Desarrollo profesional y vocacional', 7, 1),
(11, 'Diseño instruccional', 8, 1),
(12, 'Tecnología educativa', 8, 1),
(13, 'Formación de habilidades técnicas', 6, 1),
(14, 'Formación en tecnología de la información', 6, 1),
(15, 'Formación en salud y seguridad laboral', 6, 1),
(16, 'Educación inclusiva', 1, 1),
(17, 'Educación emocional y social', 1, 1),
(18, 'Metodologías activas de aprendizaje', 1, 1),
(19, 'Educación interdisciplinaria', 2, 1),
(20, 'Educación tecnológica', 2, 1),
(21, 'Orientación vocacional y profesional', 2, 1),
(22, 'Tutoría académica personalizada', 10, 1),
(23, 'Desarrollo de habilidades de estudio', 10, 1),
(24, 'Orientación en aprendizaje socioemocional', 10, 1),
(25, 'auxiliar', 7, 0),
(26, 'gdgdgdf', 7, 1),
(27, 'perro', 1, 1),
(28, 'fgvdcgdf', 4, 1),
(29, 'dfgdfgj', 4, 1),
(30, 'ghfhdfg', 3, 1),
(31, 'ghdfhfdgh', 3, 1),
(32, 'carleto', 8, 0),
(33, 'carleto', 3, 1),
(34, 'carleto', 6, 1),
(35, 'carleto', 4, 1),
(36, 'carleto', 24, 1),
(37, 'carñps', 4, 1),
(38, 'jghhj', 4, 1),
(39, 'fudu', 4, 1),
(40, 'carleto', 19, 1),
(41, 'fdsfsdf', 4, 1);

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
(2, 8, 1),
(14, 1, 1),
(15, 1, 1),
(13, 1, 1),
(19, 9, 0),
(20, 9, 0),
(21, 9, 0),
(20, 10, 0),
(19, 10, 0),
(21, 10, 0),
(2, 14, 1),
(3, 14, 1),
(11, 6, 1),
(1, 6, 1),
(3, 4, 1),
(2, 4, 1);

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
(1, 13, 11, 'Informe de prueba', 'Informe de prueba del alumno Federico Nicolás.', '2024-09-27', 1, 4),
(2, 13, 11, 'Informe de prueba 2', 'Segundo informe de prueba del alumno Federico Nicolás.', '2024-09-27', 1, 4),
(3, 13, 2, 'informe nocturno', 'lo del grado lo va a solucionar dios asi nomas te lo digo zednic', '2024-10-18', 1, 4),
(4, 13, 4, 'informes askfal fklsf', 'probando', '2024-06-25', 1, 4),
(5, 13, 6, 'dffsdf', 'probando', '2024-06-25', 0, 4),
(6, 13, 7, 'jajash', 'probando', '2023-10-25', 1, 4),
(7, 13, 4, 'gjghj', 'probando', '2024-05-25', 1, 4),
(8, 13, 10, 'hfghfghf', 'probando', '2024-05-25', 1, 4),
(9, 13, 10, 'gfhfgjfjkghkgh hkh', 'gfdgdfg', '2024-04-25', 0, 4),
(10, 13, 2, 'larrana', 'probando', '2024-10-25', 1, 4),
(11, 13, 7, 'gfdgdg', 'probando', '2024-01-25', 0, 4),
(12, 13, 8, 'gfdgdfgdg', 'probando', '2024-02-25', 0, 4),
(13, 13, 1, 'gdfdjhfgjh', 'probando', '2024-05-25', 0, 4),
(14, 13, 11, 'jgjghjghjg', 'probando', '2024-04-25', 1, 4),
(15, 13, 4, 'hgjhgfj', 'fgsdfsfs', '2024-03-25', 1, 4),
(16, 13, 5, 'gdgd', 'probando', '2024-10-25', 0, 4),
(17, 13, 7, 'dfgdgf', 'gdfgd', '2024-10-25', 0, 4),
(18, 13, 10, 'jfjghjghjg', 'probando', '2024-10-25', 1, 4),
(19, 13, 6, 'jghjghj', 'probando', '2024-10-25', 1, 4),
(20, 13, 4, 'fgdgdf', 'probando', '2024-04-25', 0, 4),
(21, 13, 8, 'dsgdfgdf', 'probando', '2024-04-25', 0, 4),
(22, 13, 5, 'gfdgdgdfg', 'probando', '2024-04-25', 0, 4),
(23, 13, 6, 'gdhfjfjf', 'probando', '2024-04-25', 0, 4),
(24, 13, 7, 'nfgjghfjgkj', 'probando', '2024-08-25', 1, 4),
(25, 13, 8, 'fgdhfdhfjj', 'probando', '2024-09-25', 0, 4),
(26, 13, 5, 'hdj', 'probando', '2024-10-25', 0, 4),
(27, 13, 7, 'hfghdgfh', 'probando', '2024-10-25', 0, 4),
(28, 13, 11, 'ggfdgdsg', 'probando', '2024-10-25', 0, 4),
(29, 13, 5, 'dgfshsgfhd', 'probando', '2024-10-25', 0, 4),
(30, 13, 6, 'gdsgfsgfds', 'probando', '2024-10-25', 0, 4),
(31, 13, 9, 'fsfsfs', 'FFSAFASF', '2024-10-31', 0, 2);

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
(1, 13, '2024-10-08', '18:46:11', 'E'),
(2, 13, '2024-10-08', '18:46:13', 'S'),
(3, 13, '2024-10-08', '18:46:16', 'E'),
(4, 13, '2024-10-08', '18:46:17', 'E'),
(5, 13, '2024-10-08', '18:46:18', 'S'),
(6, 13, '2024-10-08', '18:46:19', 'E'),
(7, 13, '2024-10-08', '18:46:19', 'S'),
(8, 13, '2024-10-08', '18:46:20', 'E'),
(9, 13, '2024-10-08', '18:46:20', 'S'),
(10, 13, '2024-10-08', '18:46:20', 'S'),
(11, 13, '2024-10-08', '18:46:27', 'E'),
(12, 13, '2024-10-16', '19:00:47', 'E'),
(13, 13, '2024-10-16', '19:00:53', 'S'),
(14, 13, '2024-10-16', '19:00:57', 'E'),
(15, 13, '2024-10-16', '19:01:00', 'S'),
(16, 13, '2024-10-18', '16:14:40', 'E'),
(17, 13, '2024-10-18', '16:17:53', 'S'),
(18, 13, '2024-10-18', '16:17:59', 'E'),
(19, 13, '2024-10-18', '16:18:19', 'E'),
(20, 13, '2024-10-18', '16:22:17', 'S'),
(21, 13, '2024-10-18', '16:25:48', 'S'),
(22, 13, '2024-10-18', '16:26:06', 'E'),
(23, 13, '2024-10-18', '16:28:16', 'S'),
(24, 13, '2024-10-24', '19:40:21', 'E'),
(25, 13, '2024-10-24', '19:40:29', 'S');

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
(1, 'Maestro de primaria', 1),
(2, 'Profesor de secundaria', 1),
(3, 'Catedrático universitario', 1),
(4, 'ajjajaja', 1),
(5, 'Instructor de idiomas', 1),
(6, 'formadero tecniquiano', 1),
(7, 'asd', 0),
(8, 'Educador en línea', 1),
(9, 'Coordinador académico', 0),
(10, 'Tutor de estudio', 0),
(11, 'nadie trabaja aca', 1),
(12, 'hfdhdfg', 1),
(13, '12', 0),
(14, '13', 0),
(15, '14', 0),
(16, '15', 0),
(17, '16', 0),
(18, '17', 0),
(19, '18', 1),
(20, '19', 0),
(21, 'gfsdgsdgf', 1),
(22, 'ahfdhf', 1),
(23, 'carleto', 0),
(24, 'carleto', 1);

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
(1, 'Trastorno del déficit de atención e hiperactividad', 1),
(2, 'TEA', 1),
(3, 'islexia', 0),
(4, 'Parálisis cerebral', 0),
(5, 'Discapacidad intelectual', 0),
(6, 'Trastornos del aprendizaje', 1),
(7, 'Trastorno de ansiedad', 1),
(8, 'dafsdsf', 0),
(9, 'Trastornos del comportamiento', 1),
(10, 'Trastornos de la comunicación', 1),
(11, 'f', 0),
(12, 'perro', 0),
(13, 'gato', 0),
(14, 'federico cancer', 0),
(15, 'piromano', 0),
(16, 'grhdh', 0),
(17, 'gfdgsdfg', 0),
(18, 'gfj', 0),
(19, 'zombie', 0),
(20, 'dsadas', 0),
(21, 'asdad', 0),
(22, 'hfghfg', 0),
(23, 'jgjgh', 0),
(24, 'carlo', 0),
(25, 'perroviejo', 0),
(26, 'fgdgdg', 0),
(27, 'fsfs', 0),
(28, 'b', 0),
(29, 'segsgs', 0),
(30, 'dar', 0),
(31, 'e', 0),
(32, 'g', 0),
(33, 'h', 0),
(34, 'gadfgs', 0),
(35, 'hdshsdh', 0),
(36, 'carleto', 0),
(38, 'carleto', 0),
(39, 'Asma', 0),
(40, 'Asma', 0),
(41, 'Asma', 0),
(42, 'Asma', 0),
(43, 'Asma', 0),
(44, 'Asma', 0),
(45, 'Asma', 0),
(46, 'Asma', 0),
(47, 'Asma', 0),
(48, 'Asma', 0),
(49, 'Asma', 0);

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
(4, 11, 0),
(10, 7, 0),
(14, 7, 0),
(16, 2, 0),
(16, 3, 0),
(16, 5, 0),
(16, 6, 0),
(17, 2, 0),
(16, 3, 0),
(11, 2, 0),
(10, 2, 0),
(15, 2, 0),
(6, 2, 0),
(9, 2, 0),
(12, 2, 0),
(6, 4, 0),
(4, 4, 0),
(3, 12, 0),
(8, 12, 0),
(5, 12, 0),
(13, 12, 0),
(10, 12, 0),
(9, 12, 0),
(4, 12, 0),
(2, 12, 0),
(6, 12, 0),
(7, 12, 0),
(1, 12, 0),
(15, 12, 0),
(4, 1, 0),
(5, 9, 0),
(4, 9, 0),
(5, 14, 0),
(5, 15, 0),
(5, 3, 0),
(4, 3, 0),
(6, 3, 0),
(7, 3, 0),
(1, 3, 0),
(25, 3, 0),
(14, 3, 0),
(10, 3, 0),
(6, 10, 0),
(4, 10, 0),
(4, 14, 0),
(5, 14, 0),
(7, 15, 1),
(2, 15, 1);

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
(1, 'Juan Pérez', 12345678, 'contraseña123', 'alumno', 0, 'ccasdamd@gmail.com'),
(2, 'María González', 87654321, 'contraseña456', 'alumno', 0, 'padres.maría.gonzález@example.com'),
(3, 'Carlos Rodríguez', 23456789, 'contraseña789', 'alumno', 0, 'padres.carlos.rodríguez@example.com'),
(4, 'Lucía Martínez', 34567890, 'contraseña321', 'alumno', 0, 'padres.lucía.martínez@example.com'),
(5, 'Mateo López', 45678901, 'contraseña654', 'alumno', 1, 'padres.mateo.lópez@example.com'),
(6, 'Sofía Díaz', 56789012, 'contraseña987', 'alumno', 0, 'fsfsfsjfs@gmail.com'),
(7, 'Tomás Fernández', 67890123, 'contraseña741', 'alumno', 0, 'fsjfs@gmail.com'),
(8, 'Camila García', 78901234, 'contraseña852', 'alumno', 1, 'fs4234234jfs@gmail.com'),
(9, 'Martín Hernández', 89012345, 'contraseña963', 'alumno', 1, 'fs12313jfs@gmail.com'),
(10, 'Valentina Sánchez', 90123456, 'contraseña159', 'alumno', 1, 'fsjfs@gmail.comvdfhfg'),
(11, 'Ana Ramírez', 11223344, 'clave123', 'docente', 1, 'fsjfs@gmail.com231'),
(12, 'Pedro Gómez', 22334455, 'clave456', 'docente', 1, 'fsjfs@gmail.com'),
(13, 'Laura Fernández', 33445566, 'clave789', 'docente', 1, 'fsjfs@gmail.com'),
(14, 'Santiago Morales', 44556677, 'clave101', 'docente', 1, 'fsjfs@gmail.com'),
(15, 'Claudia Ruiz', 55667788, 'clave202', 'docente', 1, 'fsjfs@gmail.com'),
(16, 'Roberto Torres', 66778899, 'clave303', 'docente', 1, 'fsjfs@gmail.com'),
(17, 'María López', 77889900, 'clave404', 'docente', 1, 'fsjfs@gmail.com'),
(18, 'Carlos Méndez', 88990011, 'clave505', 'docente', 1, 'fsjfs@gmail.com'),
(19, 'Paula Gutiérrez', 99001122, 'clave606', 'docente', 1, 'fsjfs@gmail.com'),
(20, 'Jorge Herrera', 112233, 'clave707', 'docente', 0, 'fsjfs@gmail.com'),
(22, 'Federico Nicolás Simonelli Cavallo', 56129975, '$2y$10$J4ej1xPRzUb2u7OtBgwQGOKBq.0AlltLeLYV6Cr1/QfBe2koErr.K', 'alumno', 1, 'aguantenlospecaos@gmail.com'),
(24, 'Luis Manuel Sosa Berroa', 56777350, '$2y$10$h2zuvVvOTP83nDGosFXoVuPvljYWYjzxH0cTDm0RxcHSUYdi20Woi', 'docente', 1, 'luissosaberroa@gmail.com'),
(25, 'Ian Andrés Volpi Zamit', 56499637, '$2y$10$Toi3W/kIYWR3W0sgNMBiVuHpcAtP8Tc1Ba/R9WUieRPOJQfKHz/Di', 'admin', 1, 'luissosaberroa@gmail.com'),
(26, 'Sofía Milagros Gallero Monte', 56437766, '$2y$10$05u5ljEissXBYxLvbHMdAOI9dsuoEvuM7ZIJfBZRXURxYKXCaYbz6', 'alumno', 0, NULL),
(28, 'sofia simonelli monte cavallo', 56437766, '$2y$10$d.yDPDt/aJ79lnJHgW.NROE.qTm2pvBBQX.4ZWXM6.6lvku53R18q', 'alumno', 1, 'fsjfs@gmail.com'),
(29, 'fafsaf sdfsfs', 56437766, '$2y$10$Js7faqODTorQGOO.Zj4oyOvoayZZm3vm0UKECSEQmyRcNRHBGDLrm', 'alumno', 1, 'gdfgdf'),
(30, 'fdsfsd fsdfsdf', 56437766, '$2y$10$YNf8wV9M10eiwBX7hygy6.qBT/tl20X0uWF6xXd/0AHuweNVKKeFO', 'alumno', 0, NULL);

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
  MODIFY `ID_Alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `ID_Clase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `ID_Docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `especializaciones`
--
ALTER TABLE `especializaciones`
  MODIFY `ID_Especializacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `informes`
--
ALTER TABLE `informes`
  MODIFY `ID_Informe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `lista_docente`
--
ALTER TABLE `lista_docente`
  MODIFY `ID_Asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `ocupacion`
--
ALTER TABLE `ocupacion`
  MODIFY `ID_Ocupacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `patologias`
--
ALTER TABLE `patologias`
  MODIFY `ID_Patologia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
