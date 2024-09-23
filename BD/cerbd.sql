-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-09-2024 a las 00:38:53
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
  `Celular_Padres` varchar(9) NOT NULL,
  `Estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`ID_Alumno`, `ID_Usuario`, `Nombre`, `Apellido`, `Cedula`, `Fecha_Nac`, `Mail_Padres`, `Celular_Padres`, `Estado`) VALUES
(1, 2, 'Luis', 'Fernández', 33445566, '2008-05-15', 'luis.fernandez@padres.com', '555-6789', 1),
(2, 4, 'Andrea', 'Martínez', 44556677, '2007-04-22', 'andrea.martinez@padres.com', '555-7890', 1),
(3, 6, 'Pedro', 'Gómez', 55667788, '2009-03-18', 'pedro.gomez@padres.com', '555-8901', 1),
(4, 8, 'Sara', 'López', 66778899, '2006-02-25', 'sara.lopez@padres.com', '555-9012', 1),
(5, 10, 'Jorge', 'Torres', 77889900, '2010-01-30', 'jorge.torres@padres.com', '555-0123', 1),
(6, 2, 'Clara', 'Ríos', 88990011, '2008-06-15', 'clara.rios@padres.com', '555-2345', 1),
(7, 4, 'Fernando', 'Díaz', 99001122, '2007-07-20', 'fernando.diaz@padres.com', '555-3456', 1),
(8, 6, 'Marta', 'Jiménez', 10011223, '2009-08-25', 'marta.jimenez@padres.com', '555-4567', 1),
(9, 8, 'Diego', 'Navarro', 11122334, '2006-09-30', 'diego.navarro@padres.com', '555-5678', 1),
(10, 10, 'FEDERICO NICOLAS', 'SIMONELLI CAVALLO', 555, '2010-10-05', 'paula.romero@padres.com', '555-6789', 1),
(31, 122, 'FEDERICO NICOLAS CAR', 'SIMONELLI CAVALOO', 56129975, '2014-09-12', 'LManuelSosa@gmail.com', '239759827', 1),
(32, 123, 'IAN ANDRÉS', 'VOLPI ZAMIT', 56499637, '2007-02-10', 'ianvol10@gmail.com', '123456789', 1);

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
(3, 3, '2024-08-08'),
(5, 5, '2024-08-08'),
(6, 6, '2024-08-08'),
(7, 7, '2024-08-08'),
(8, 8, '2024-08-08'),
(9, 9, '2024-08-08'),
(10, 10, '2024-08-08'),
(1, 2, '2024-08-09'),
(3, 4, '2024-08-09'),
(5, 6, '2024-08-09'),
(1, 31, '0000-00-00'),
(3, 31, '0000-00-00'),
(11, 2, '0000-00-00'),
(11, 3, '0000-00-00'),
(11, 31, '0000-00-00'),
(11, 5, '0000-00-00'),
(12, 5, '0000-00-00'),
(12, 7, '0000-00-00');

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
(3, 3, 3, '2024-08-08', 1),
(5, 5, 5, '2024-08-08', 1),
(6, 6, 6, '2024-08-08', 0),
(7, 7, 7, '2024-08-08', 1),
(8, 8, 8, '2024-08-08', 1),
(9, 9, 9, '2024-08-08', 0),
(10, 10, 10, '2024-08-08', 1),
(11, 1, 2, '2024-08-09', 1),
(13, 3, 4, '2024-08-09', 1),
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
  `Final` time NOT NULL,
  `Estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clase`
--

INSERT INTO `clase` (`ID_Clase`, `ID_Docente`, `Nombre`, `Dia`, `Inicio`, `Final`, `Estado`) VALUES
(1, 1, 'Álgebra', 'Lunes', '09:00:00', '10:30:00', 1),
(3, 3, 'Química', 'Miércoles', '11:00:00', '12:30:00', 1),
(5, 5, 'Deportes', 'Viernes', '08:00:00', '09:30:00', 1),
(6, 1, 'Geometría', 'Lunes', '11:00:00', '12:30:00', 1),
(7, 2, 'Historia Antigua', 'Martes', '13:00:00', '14:30:00', 1),
(8, 3, 'Física', 'Miércoles', '09:00:00', '10:30:00', 1),
(9, 4, 'Poesía', 'Jueves', '14:00:00', '15:30:00', 1),
(10, 5, 'Natación', 'Viernes', '10:00:00', '11:30:00', 1),
(11, 14, 'Clase de Luis', 'Lunes', '04:00:00', '10:00:00', 1),
(12, 14, 'Otra clase de Luis', 'Martes', '02:00:00', '04:00:00', 1);

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
  `Celular` varchar(9) DEFAULT NULL,
  `Fecha_Nac` date DEFAULT NULL,
  `ID_Ocupacion` int(11) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`ID_Docente`, `ID_Usuario`, `Nombre`, `Apellido`, `Cedula`, `Mail`, `Celular`, `Fecha_Nac`, `ID_Ocupacion`, `Estado`) VALUES
(1, 1, 'Carlos', 'Mendoza', 11223344, 'carlos.mendoza@ejemplo.com', '555-1234', NULL, 1, 1),
(2, 3, 'María', 'López', 22334455, 'maria.lopez@ejemplo.com', '555-2345', NULL, 2, 1),
(3, 5, 'Elena', 'Rodríguez', 33445566, 'elena.rodriguez@ejemplo.com', '555-3456', NULL, 3, 1),
(4, 7, 'Lucía', 'Fernández', 44556677, 'lucia.fernandez@ejemplo.com', '555-4567', NULL, 2, 1),
(5, 9, 'Laura', 'Díaz', 55667788, 'laura.diaz@ejemplo.com', '555-5678', NULL, 3, 1),
(8, 113, 'fsd', 'SOSA CARLOS', 6464324, 'ert', '3634636', '2024-08-23', 1, 1),
(9, 114, 'fgh', 'fgh', 34, 'gdf', '346', '2024-08-23', 2, 1),
(10, 115, 'FEDERICO', 'SOSA SINIESTRO', 2147483647, 'nopetif@gmail.com', '3634636', '2024-08-23', 3, 1),
(11, 116, 'g', 'cb', 324, '2fsad', '24252', '2024-08-23', 1, 1),
(12, 117, 'da', 'dsa', 53453, 'dsa', '5423', '2024-08-23', 2, 1),
(14, 120, 'LUIS MANUEL', 'SOSA BERROA', 56777350, 'LManuelSosa@gmail.com', '09250944', '2024-09-03', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especializaciones`
--

CREATE TABLE `especializaciones` (
  `ID_Especializacion` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `ID_Ocupacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especializaciones`
--

INSERT INTO `especializaciones` (`ID_Especializacion`, `Nombre`, `ID_Ocupacion`) VALUES
(2, 'Historia', 2),
(3, 'Ciencias', 2),
(4, 'Literatura', 2),
(5, 'Educaci├│n F├¡sica', 2),
(6, 'Cardiología', 3),
(7, 'Neurología', 3),
(8, 'Oncología', 3),
(10, 'Neumología', 3),
(11, 'Endocrinología', 3),
(12, 'Reumatología', 3),
(13, 'Nefrología', 3),
(14, 'Hematología', 3),
(15, 'Infectología', 3),
(17, 'Traumatología', 3),
(18, 'Oftalmología', 3),
(19, 'Otorrinolaringología', 3),
(20, 'Dermatología', 3),
(21, 'Psiquiatría', 3),
(22, 'Medicina Interna', 3),
(23, 'Cirugía General', 3),
(24, 'Urología', 3),
(25, 'Ginecología', 3),
(26, 'Obstetricia', NULL),
(27, 'Ortopedia', NULL),
(28, 'Medicina Familiar', NULL),
(29, 'Anestesiología', NULL),
(30, 'Radiología', NULL),
(31, 'Patología', NULL),
(32, 'Medicina del Trabajo', NULL),
(33, 'Medicina de Urgencia', NULL),
(34, 'Cirugía Cardiaca', NULL),
(35, 'Cirugía Plástica', NULL),
(36, 'Cirugía Pediátrica', NULL),
(37, 'Cirugía Ortopédica', NULL),
(38, 'Medicina Física y Re', NULL),
(39, 'Inmunología', NULL),
(40, 'Alergología', NULL),
(41, 'Cirugía Oncológica', NULL),
(42, 'Neurocirugía', NULL),
(43, 'Geriatría', NULL),
(44, 'Medicina Paliativa', NULL),
(45, 'Medicina de Rehabili', NULL),
(46, 'Medicina Deportiva', NULL),
(47, 'Medicina Estética', NULL),
(48, 'Medicina de Emergenc', NULL),
(49, 'Medicina de Rehabili', NULL),
(50, 'Medicina Preventiva', NULL),
(51, 'Medicina Submarina', NULL),
(52, 'Medicina del Sueño', NULL),
(53, 'Medicina de Familia', NULL),
(54, 'Medicina General', NULL),
(55, 'Medicina Perinatal', NULL),
(56, 'Medicina del Viajero', NULL),
(57, 'Medicina del Trabajo', NULL),
(58, 'Medicina Preventiva', NULL),
(59, 'Medicina Intensiva', NULL),
(60, 'Medicina Comunitaria', NULL),
(61, 'Medicina Forense', NULL),
(62, 'Medicina del Deporte', NULL),
(63, 'Medicina Estética', NULL),
(64, 'Medicina de Rehabili', NULL),
(65, 'Medicina Vascular', NULL),
(66, 'Medicina de Emergenc', NULL),
(67, 'Medicina Regenerativ', NULL),
(68, 'Medicina Genómica', NULL),
(69, 'Medicina del Niño', NULL),
(70, 'Medicina Familiar y ', NULL),
(71, 'Medicina del Adulto', NULL),
(72, 'Medicina del Adolesc', NULL),
(73, 'somo portadores', NULL),
(74, 'lengua', NULL),
(75, 'matemáticas', NULL),
(76, 'dada', NULL),
(77, 'gdsg', NULL),
(78, 'gfdgd', NULL),
(79, 'gdf', NULL),
(80, 'gfd', NULL),
(81, 'PEPEca', 2),
(82, 'faust;VV;', 2),
(83, 'fsdfsdf', 3),
(84, 'dsfdsf', 3),
(87, 'Parlamento', 1),
(88, 'perro', 1),
(89, 'viehjo', 1),
(90, 'fdsafdas', 4),
(91, 'dasda', 4);

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
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(2, 3),
(3, 4),
(4, 5),
(5, 1),
(2, 10),
(3, 10),
(2, 11),
(4, 12),
(2, 14),
(3, 14),
(4, 14);

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
  `Grado` int(11) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `informes`
--

INSERT INTO `informes` (`ID_Informe`, `ID_Docente`, `ID_Alumno`, `Titulo`, `Observaciones`, `Fecha`, `Grado`, `Estado`) VALUES
(1, 1, 1, 'Informe Mensual', 'Buen progreso en matemáticas.', '2024-08-08', NULL, 1),
(2, 2, 2, 'Informe Trimestral', 'Destaca en historia moderna.', '2024-08-08', NULL, 1),
(3, 3, 3, 'Informe Bimestral', 'Gran interés en ciencias.', '2024-08-08', NULL, 1),
(4, 4, 4, 'Informe Semanal', 'Necesita mejorar en literatura.', '2024-08-08', NULL, 1),
(5, 5, 5, 'Informe Quincenal', 'Muy activo en deportes.', '2024-08-08', NULL, 1),
(6, 1, 6, 'Informe Mensual', 'Mejoras en álgebra.', '2024-08-08', NULL, 1),
(7, 2, 7, 'Informe Trimestral', 'Buenas calificaciones en historia.', '2024-08-08', NULL, 1),
(8, 3, 8, 'Informe Bimestral', 'Excelente en física.', '2024-08-08', NULL, 1),
(9, 4, 9, 'Informe Semanal', 'Interés por la poesía.', '2024-08-08', NULL, 1),
(10, 5, 10, 'Informe Quincenal', 'Progreso en natación.', '2024-08-08', NULL, 1),
(11, 2, 31, 'SADIO MANE', 'Observacion dos en el informe para probar otro.', '0000-00-00', 3, 1),
(12, 3, 31, 'AAAAAAAAAAAAAAAAAAAA', 'El alumno es una persona muy despiadada que logro sabotear la informacion del sitio de tal manera que logro sabotear la informacion confidencial del sitio. Se le conocen transtornos psicopatas que no se lograron mejorar tras 5 años de tratamiento, el alumno tiene la intencion de placer propio y no siente empatia por llos demas, se le habia asignado un gran tutor pero no fue de ayuda ya que se volvio adicto a la piromania. El alumno ha sido sentenciado a pena de muerte.', '2007-03-27', 5, 1),
(13, 3, 31, 'faga', 'ESTO ES UN TEXTO QUE ESTA SIENDO PROBADO POR LA CIA\r\n\r\nESTO ES UN TEXTO QUE ESTA SIENDO PROBADO POR LA CIAESTO ES UN TEXTO QUE ESTA SIENDO PROBADO POR LA CIAESTO ES UN TEXTO QUE ESTA SIENDO PROBADO POR LA CIAESTO ES UN TEXTO QUE ESTA SIENDO PROBADO POR LA CIAESTO ES UN TEXTO QUE ESTA SIENDO PROBADO POR LA CIAESTO ES UN TEXTO QUE ESTA SIENDO PROBADO POR LA CIAESTO ES UN TEXTO QUE ESTA SIENDO PROBADO POR LA CIAESTO ES UN TEXTO QUE ESTA SIENDO PROBADO POR LA CIAESTO ES UN TEXTO QUE ESTA SIENDO PROBADO POR LA CIA\r\n\r\n\r\nFIRMA: ___ LUIS', '2024-09-12', 2, 1),
(14, 14, 5, 'Probando', 'fsfsf', '2024-09-16', 3, 1),
(15, 14, 31, 'Informe mensual Simo', 'Area de literatura:\nNo se sabe leer el pobre estudiante es un topo que no sabra nunca la materia analista\nfsjlflsd fsdflksdjfl sdfjlk sdlkjf s\nfdslkfjlsf\n\nArea de psicologia:\nel alumno esta loco askjdhakfaskj fkashfk hsakfhksdjf\n', '2024-09-16', 0, 1),
(16, 14, 31, 'hola chavales', 'el alumno saco un revolver en la calse', '2024-09-17', 99, 1),
(17, 14, 31, 'Informe mensual de prueba', 'Área del conocimiento de lengua:\r\nLectura parcial, le cuesta pronunciar palabras largas o con ñ.\r\nErrores ortográficos y problema con el agrupamiento de cifras de números.\r\n\r\nÁrea del conocimiento matemático:\r\nSabe números de hasta 4 cifras.\r\nErrores graves al intentar sumar y restar números.\r\n\r\nObservaciones conductuales:\r\nEs un niño tranquilo y muy callado. No tiene amigos.\r\nNo se relaciona con nadie de sus compañeros o el docente.\r\n\r\nEn suma:\r\nEs un niño que presenta problemas en varias áreas del aprendizaje. \r\nSe sugiere continuar con apoyo.', '2024-09-17', 5, 1),
(18, 14, 31, 'Informe mensual Simonelli', 'GJFGJGHF', '2024-09-18', 5, 1),
(19, 14, 5, 'Informe mensual Simonelli', 'GFHF', '2024-09-18', 7, 1),
(20, 14, 31, 'Informe mensual de prueba 3', 'm,jlhjlñjk', '2024-09-20', 5, 1);

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
(1, 'Maestro', 1),
(2, 'Profesor', 1),
(3, 'Licenciado', 1),
(4, 'Auxiliar', 1),
(5, 'fdfsfsdf', 1);

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
(76, ',hlkh'),
(157, 'a'),
(188, 'aa'),
(158, 'ad'),
(95, 'afasdfccCCCC'),
(11, 'Alergia Alimentaria'),
(12, 'Anemia'),
(13, 'Artritis'),
(151, 'asad'),
(156, 'asd'),
(98, 'asfasfasfasfasfasfas'),
(2, 'Asma'),
(14, 'Bronquitis Crónica'),
(185, 'cancer'),
(15, 'Cáncer de Pulmón'),
(16, 'Cardiopatía Congénit'),
(166, 'carlua'),
(180, 'ciencias'),
(177, 'cirrosis'),
(17, 'Colesterol Alto'),
(53, 'Colitis Ulcerosa'),
(18, 'COVID-19'),
(155, 'da'),
(154, 'das'),
(146, 'dasda'),
(150, 'dasdsa'),
(159, 'dcsadfas'),
(19, 'Depresión'),
(20, 'Dermatitis Atópica'),
(114, 'dfasfds'),
(137, 'dfs'),
(176, 'dfsfsf'),
(94, 'dfssdf'),
(3, 'Diabetes'),
(153, 'dsa'),
(152, 'dsad'),
(139, 'dsada'),
(148, 'dsadad'),
(144, 'dsadsad'),
(127, 'dsdsfs'),
(172, 'dsfs'),
(173, 'dsfsf coronavirus'),
(129, 'dsgdfgsfg'),
(21, 'Eczema'),
(22, 'Enfermedad de Crohn'),
(54, 'Enfermedad de Huntin'),
(23, 'Enfermedad de Parkin'),
(24, 'Enfermedad Renal Cró'),
(5, 'Epilepsia'),
(25, 'Esclerosis Múltiple'),
(55, 'Esquizofrenia'),
(164, 'fdgvbd'),
(169, 'fdsafsd'),
(149, 'fdsfs'),
(126, 'fdsfsdfs'),
(78, 'FEDERICOVALORANT'),
(130, 'fgdgdfg'),
(26, 'Fibromialgia'),
(143, 'foasfi'),
(27, 'Gastritis'),
(115, 'gdfgd'),
(183, 'gdgdf'),
(131, 'gdsds'),
(162, 'gfdg'),
(123, 'gfdgd'),
(165, 'gfdgdf'),
(168, 'gfdgf'),
(28, 'Gripe Estacional'),
(86, 'gsd'),
(80, 'gsdgsd'),
(186, 'hdfhfg'),
(125, 'hdhdf'),
(29, 'Hepatitis B'),
(30, 'Hernia Discal'),
(170, 'hfhg'),
(187, 'hgfhfg'),
(124, 'hgfhfgh'),
(31, 'Hiperplasia Benigna '),
(9, 'Hipertensión'),
(4, 'Hipertensi├│n'),
(32, 'Hipertiroidismo'),
(33, 'Hipotiroidismo'),
(161, 'hola'),
(34, 'Insuficiencia Cardía'),
(35, 'Insuficiencia Respir'),
(175, 'jauagua'),
(147, 'kjhmhj'),
(179, 'kufhdkgsdgdfa'),
(36, 'Leucemia'),
(37, 'Lupus'),
(182, 'malagradecido'),
(38, 'Malaria'),
(181, 'maleducado'),
(184, 'matematicas'),
(174, 'mcgregor'),
(10, 'Migraña'),
(39, 'Miopía'),
(163, 'naruto'),
(40, 'Neumonía'),
(41, 'Osteoporosis'),
(42, 'Pancreatitis'),
(145, 'papa'),
(160, 'parorespitaroido'),
(96, 'PAT1'),
(97, 'pat2'),
(167, 'pdkflñsd'),
(82, 'perroviejo'),
(43, 'Psoriasis'),
(71, 'qasma'),
(84, 'sad'),
(178, 'sdadasda'),
(128, 'sdtsdggfcbv'),
(77, 'sfafsa'),
(85, 'sgfsd'),
(44, 'Síndrome de Asperger'),
(45, 'Síndrome de Down'),
(171, 'tf'),
(46, 'Trombosis Venosa Pro'),
(47, 'Tuberculosis'),
(48, 'Uveítis'),
(49, 'Varicela'),
(50, 'Vértigo Posicional B'),
(51, 'Vitiligo'),
(52, 'Zika');

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
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(2, 7),
(3, 8),
(4, 9),
(5, 10),
(18, 31),
(54, 31),
(37, 31),
(177, 32);

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
  `Estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_Usuario`, `Nombre`, `Cedula`, `Contraseña`, `Tipo`, `Estado`) VALUES
(1, 'Juan Pérez', 1, 'password1', 'docente', 1),
(2, 'Ana García', 2, 'password2', 'alumno', 1),
(3, 'María López', 3, 'password3', 'docente', 1),
(4, 'José Martínez', 4, 'password4', 'alumno', 1),
(5, 'Elena Rodríguez', 5, 'password5', 'docente', 1),
(6, 'Carlos Sánchez', 6, 'password6', 'alumno', 1),
(7, 'Lucía Fernández', 7, 'password7', 'docente', 1),
(8, 'Miguel Gómez', 8, 'password8', 'alumno', 1),
(9, 'Laura Díaz', 9, 'password9', 'docente', 1),
(10, 'FEDERICO NICOLAS SIMONELLI CAVALLO', 10, 'alumno', 'alumno', 1),
(11, 'admin', 11, 'admin', 'admin', 1),
(12, 'alumno', 12, 'alumno', 'alumno', 1),
(13, 'LUIS MANUEL SOSA BERROA', 13, 'admin', 'ADMIN', 1),
(14, 'FEDERICO NICOLAS SIMONELLI CAVALLO', 14, 'alumno', 'ALUMNO', 1),
(82, 'LUIS MANUEL SOSA BERROA', 15, 'admin', 'admin', 1),
(113, 'fsd SOSA CARLOS', 6464324, '$2y$10$AS6/snNZaLwhmr.zu7O6RuvL1KBmRxayrMvLqGBjQnV6VmPemhjB.', 'docente', 1),
(114, 'fgh fgh', 34, '$2y$10$YQsk2tLfZIdwZlvtkX.GcufMoiRWDyJSzuvJDRIXwiH.dQRqB.TP2', 'docente', 1),
(115, 'FEDERICO SOSA SINIESTRO', 2147483647, '$2y$10$QTkCRc69GBJQiPCPqzhOmOC/D1y/wETYMAt962mPzeIfSqmj1R7Zu', 'docente', 1),
(116, 'g cb', 324, '$2y$10$Ei/pOBm1ztXKucRMNhAkje8.B5grLB8sZvgo.D9/u24JeVzf3H0je', 'docente', 1),
(117, 'da dsa', 53453, '$2y$10$eKtvyKzhsFr2KS3XJfM.N.MYgkXOkafvTuZQCCCNesYujopZ/suW6', 'docente', 1),
(120, 'LUIS MANUEL SOSA BERROA', 56777350, '$2y$10$HCrUd.jNkBQy5DI9oQ43d.IgZL1C/3nuV4j5gNB8HfWnL9q3GVVuK', 'docente', 1),
(122, 'FEDERICO NICOLAS SIMONELLI CAVALLO', 56129975, '$2y$10$3ghl60w2rlX6hvLSZGPoLu08.RUasbcVzgb5ObWwIALQXF44Lj9b2', 'alumno', 1),
(123, 'IAN ANDRÉS VOLPI ZAMIT', 56499637, '$2y$10$EOlQd7.cTahmH15TmmDD1.jsrL1HGp8PsCFosCzxkujhoeVWWIS0a', 'admin', 1);

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
-- Indices de la tabla `llegada_docente`
--
ALTER TABLE `llegada_docente`
  ADD PRIMARY KEY (`ID_Llegada`),
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
  ADD PRIMARY KEY (`ID_Patologia`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

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
  MODIFY `ID_Alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `ID_Asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `ID_Clase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `ID_Docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `especializaciones`
--
ALTER TABLE `especializaciones`
  MODIFY `ID_Especializacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de la tabla `informes`
--
ALTER TABLE `informes`
  MODIFY `ID_Informe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `llegada_docente`
--
ALTER TABLE `llegada_docente`
  MODIFY `ID_Llegada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ocupacion`
--
ALTER TABLE `ocupacion`
  MODIFY `ID_Ocupacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `patologias`
--
ALTER TABLE `patologias`
  MODIFY `ID_Patologia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

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
  ADD CONSTRAINT `alumnos_clase_ibfk_3` FOREIGN KEY (`ID_Clase`) REFERENCES `clase` (`ID_Clase`) ON DELETE CASCADE;

--
-- Filtros para la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `asistencias_ibfk_2` FOREIGN KEY (`ID_Alumno`) REFERENCES `alumnos` (`ID_Alumno`),
  ADD CONSTRAINT `asistencias_ibfk_3` FOREIGN KEY (`ID_Clase`) REFERENCES `clase` (`ID_Clase`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `especializacion_docente_ibfk_3` FOREIGN KEY (`ID_Especializacion`) REFERENCES `especializaciones` (`ID_Especializacion`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `patologia_alumno_ibfk_2` FOREIGN KEY (`ID_Alumno`) REFERENCES `alumnos` (`ID_Alumno`),
  ADD CONSTRAINT `patologia_alumno_ibfk_3` FOREIGN KEY (`ID_Patologia`) REFERENCES `patologias` (`ID_Patologia`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
