-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-09-2024 a las 03:13:24
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
  `Mail_Padres` varchar(60) NOT NULL,
  `Celular_Padres` varchar(9) NOT NULL,
  `Estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`ID_Alumno`, `ID_Usuario`, `Nombre`, `Apellido`, `Cedula`, `Fecha_Nac`, `Mail_Padres`, `Celular_Padres`, `Estado`) VALUES
(1, 1, 'Juan', 'Pérez', 78713177, '2016-08-06', 'padres.juan.pérez@example.com', '094523278', 1),
(2, 2, 'María', 'González', 84409802, '2007-08-19', 'padres.maría.gonzález@example.com', '098032878', 1),
(3, 3, 'Carlos', 'Rodríguez', 33045395, '2016-10-03', 'padres.carlos.rodríguez@example.com', '096292114', 1),
(4, 4, 'Lucía', 'Martínez', 41447172, '2016-09-07', 'padres.lucía.martínez@example.com', '097560505', 1),
(5, 5, 'Mateo', 'López', 58681693, '2008-02-15', 'padres.mateo.lópez@example.com', '094637655', 1),
(6, 6, 'Sofía', 'Díaz', 17812342, '2009-08-17', 'padres.sofía.díaz@example.com', '094385559', 1),
(7, 7, 'Tomás', 'Fernández', 13956930, '2011-04-30', 'padres.tomás.fernández@example.com', '095140250', 1),
(8, 8, 'Camila', 'García', 59170771, '2013-11-27', 'padres.camila.garcía@example.com', '098646116', 1),
(9, 9, 'Martín', 'Hernández', 12111791, '2009-05-28', 'padres.martín.hernández@example.com', '093064627', 1),
(10, 10, 'Valentina', 'Sánchez', 55397008, '2009-02-28', 'padres.valentina.sánchez@example.com', '095808961', 1),
(11, 22, 'Federico Nicolás', 'Simonelli Cavallo', 56129975, '2006-09-21', 'nopetif@gmail.com', '091890608', 1);

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
(2, 1, '0000-00-00'),
(2, 5, '0000-00-00'),
(2, 11, '0000-00-00'),
(2, 3, '0000-00-00'),
(2, 2, '0000-00-00'),
(3, 11, '0000-00-00'),
(3, 8, '0000-00-00'),
(3, 4, '0000-00-00'),
(3, 2, '0000-00-00'),
(3, 5, '0000-00-00'),
(4, 10, '0000-00-00'),
(4, 6, '0000-00-00'),
(4, 1, '0000-00-00'),
(4, 4, '0000-00-00'),
(4, 11, '0000-00-00'),
(5, 10, '0000-00-00'),
(5, 1, '0000-00-00'),
(5, 5, '0000-00-00'),
(5, 3, '0000-00-00'),
(5, 8, '0000-00-00'),
(6, 11, '0000-00-00'),
(6, 3, '0000-00-00'),
(6, 2, '0000-00-00'),
(6, 5, '0000-00-00'),
(6, 1, '0000-00-00'),
(7, 11, '0000-00-00'),
(7, 9, '0000-00-00'),
(7, 2, '0000-00-00'),
(7, 1, '0000-00-00'),
(7, 5, '0000-00-00'),
(8, 7, '0000-00-00'),
(8, 2, '0000-00-00'),
(8, 1, '0000-00-00'),
(8, 10, '0000-00-00'),
(8, 4, '0000-00-00'),
(9, 10, '0000-00-00'),
(9, 7, '0000-00-00'),
(9, 1, '0000-00-00'),
(9, 3, '0000-00-00'),
(9, 5, '0000-00-00'),
(10, 11, '0000-00-00'),
(10, 8, '0000-00-00'),
(10, 2, '0000-00-00'),
(10, 1, '0000-00-00'),
(10, 5, '0000-00-00'),
(11, 10, '0000-00-00'),
(11, 2, '0000-00-00'),
(11, 1, '0000-00-00'),
(11, 11, '0000-00-00'),
(11, 4, '0000-00-00');

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
(2, 13, 'Matemáticas', 'Lunes', '08:00:00', '09:30:00', 1),
(3, 2, 'Historia', 'Martes', '10:00:00', '11:30:00', 1),
(4, 3, 'Química', 'Miércoles', '13:00:00', '14:30:00', 1),
(5, 4, 'Física', 'Jueves', '09:00:00', '10:30:00', 1),
(6, 5, 'Literatura', 'Viernes', '14:00:00', '15:30:00', 1),
(7, 6, 'Geografía', 'Lunes', '11:00:00', '12:30:00', 1),
(8, 7, 'Biología', 'Martes', '13:30:00', '15:00:00', 1),
(9, 8, 'Educación Física', 'Miércoles', '16:00:00', '17:30:00', 1),
(10, 9, 'Arte', 'Jueves', '12:00:00', '13:30:00', 1),
(11, 10, 'Inglés', 'Viernes', '08:30:00', '10:00:00', 1);

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
  `Mail` varchar(60) NOT NULL,
  `Celular` varchar(9) DEFAULT NULL,
  `Fecha_Nac` date DEFAULT NULL,
  `ID_Ocupacion` int(11) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`ID_Docente`, `ID_Usuario`, `Nombre`, `Apellido`, `Cedula`, `Mail`, `Celular`, `Fecha_Nac`, `ID_Ocupacion`, `Estado`) VALUES
(1, 11, 'Ana', 'Ramírez', 69647322, 'ana.ramírez@example.com', '097958413', '1994-07-28', 1, 1),
(2, 12, 'Pedro', 'Gómez', 26673841, 'pedro.gómez@example.com', '097816287', '1991-08-14', 2, 1),
(3, 13, 'Laura', 'Fernández', 73882441, 'laura.fernández@example.com', '095430551', '2000-11-03', 3, 1),
(4, 14, 'Santiago', 'Morales', 61377294, 'santiago.morales@example.com', '098171709', '2003-10-26', 4, 1),
(5, 15, 'Claudia', 'Ruiz', 92692705, 'claudia.ruiz@example.com', '096836842', '2002-04-05', 5, 1),
(6, 16, 'Roberto', 'Torres', 52837341, 'roberto.torres@example.com', '092898511', '1986-11-23', 6, 1),
(7, 17, 'María', 'López', 16156404, 'maría.lópez@example.com', '098583986', '2000-09-07', 7, 1),
(8, 18, 'Carlos', 'Méndez', 45659784, 'carlos.méndez@example.com', '091633174', '1998-12-04', 8, 1),
(9, 19, 'Paula', 'Gutiérrez', 71192529, 'paula.gutiérrez@example.com', '098201334', '2004-08-19', 9, 1),
(10, 20, 'Jorge', 'Herrera', 15918386, 'jorge.herrera@example.com', '095486464', '1985-02-05', 10, 1),
(12, 23, 'Ian Andrés', 'Volpi Samit', 56499637, 'ianvol10@gmail.com', '123456789', '2007-02-10', 5, 1),
(13, 24, 'Luis Manuel', 'Sosa Berroa', 56777350, 'LManuelSosa@gmail.com', '092504454', '2007-03-27', 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especializaciones`
--

CREATE TABLE `especializaciones` (
  `ID_Especializacion` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `ID_Ocupacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especializaciones`
--

INSERT INTO `especializaciones` (`ID_Especializacion`, `Nombre`, `ID_Ocupacion`) VALUES
(1, 'Marketing', 8),
(2, 'Francés', 5),
(3, 'Alemán', 5),
(4, 'Inglés', 5),
(5, 'Ingeniería de software', 3),
(6, 'Psicología', 3),
(7, 'Administración de empresas', 3),
(8, 'Orientación académica', 7),
(9, 'Consejería psicológica', 7),
(10, 'Desarrollo profesional y vocacional', 7),
(11, 'Diseño instruccional', 8),
(12, 'Tecnología educativa', 8),
(13, 'Formación de habilidades técnicas', 6),
(14, 'Formación en tecnología de la información', 6),
(15, 'Formación en salud y seguridad laboral', 6),
(16, 'Educación inclusiva', 1),
(17, 'Educación emocional y social', 1),
(18, 'Metodologías activas de aprendizaje', 1),
(19, 'Educación interdisciplinaria', 2),
(20, 'Educación tecnológica', 2),
(21, 'Orientación vocacional y profesional', 2),
(22, 'Tutoría académica personalizada', 10),
(23, 'Desarrollo de habilidades de estudio', 10),
(24, 'Orientación en aprendizaje socioemocional', 10);

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
(2, 12),
(3, 13);

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
(1, 13, 11, 'Informe de prueba', 'Informe de prueba del alumno Federico Nicolás.', '2024-09-27', 13, 1),
(2, 13, 11, 'Informe de prueba 2', 'Segundo informe de prueba del alumno Federico Nicolás.', '2024-09-27', 13, 1);

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
(4, 'Educador de educación especial', 1),
(5, 'Instructor de idiomas', 1),
(6, 'Formador técnico', 1),
(7, 'Consejero escolar', 1),
(8, 'Educador en línea', 1),
(9, 'Coordinador académico', 1),
(10, 'Tutor de estudio', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patologias`
--

CREATE TABLE `patologias` (
  `ID_Patologia` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `patologias`
--

INSERT INTO `patologias` (`ID_Patologia`, `Nombre`) VALUES
(8, 'Depresión'),
(5, 'Discapacidad intelectual'),
(3, 'Dislexia'),
(4, 'Parálisis cerebral'),
(2, 'TEA'),
(7, 'Trastorno de ansiedad'),
(1, 'Trastorno del déficit de atención e hiperactividad'),
(10, 'Trastornos de la comunicación'),
(6, 'Trastornos del aprendizaje'),
(9, 'Trastornos del comportamiento');

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
(3, 11);

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
(1, 'Juan Pérez', 12345678, 'contraseña123', 'alumno', 1),
(2, 'María González', 87654321, 'contraseña456', 'alumno', 1),
(3, 'Carlos Rodríguez', 23456789, 'contraseña789', 'alumno', 1),
(4, 'Lucía Martínez', 34567890, 'contraseña321', 'alumno', 1),
(5, 'Mateo López', 45678901, 'contraseña654', 'alumno', 1),
(6, 'Sofía Díaz', 56789012, 'contraseña987', 'alumno', 1),
(7, 'Tomás Fernández', 67890123, 'contraseña741', 'alumno', 1),
(8, 'Camila García', 78901234, 'contraseña852', 'alumno', 1),
(9, 'Martín Hernández', 89012345, 'contraseña963', 'alumno', 1),
(10, 'Valentina Sánchez', 90123456, 'contraseña159', 'alumno', 1),
(11, 'Ana Ramírez', 11223344, 'clave123', 'docente', 1),
(12, 'Pedro Gómez', 22334455, 'clave456', 'docente', 1),
(13, 'Laura Fernández', 33445566, 'clave789', 'docente', 1),
(14, 'Santiago Morales', 44556677, 'clave101', 'docente', 1),
(15, 'Claudia Ruiz', 55667788, 'clave202', 'docente', 1),
(16, 'Roberto Torres', 66778899, 'clave303', 'docente', 1),
(17, 'María López', 77889900, 'clave404', 'docente', 1),
(18, 'Carlos Méndez', 88990011, 'clave505', 'docente', 1),
(19, 'Paula Gutiérrez', 99001122, 'clave606', 'docente', 1),
(20, 'Jorge Herrera', 112233, 'clave707', 'docente', 1),
(22, 'Federico Nicolás Simonelli Cavallo', 56129975, '$2y$10$4Z0SClNg.Evh2eVrI.daWuKodQfZeObBqRewU2uInm9OSC1Vmkwxe', 'alumno', 1),
(23, 'Ian Andrés Volpi Samit', 56499637, '$2y$10$AAV6SsgVfLAqIY5LgHxVf.b0CtVvjtzprcr58RqCD9Qhb82P4pyqi', 'admin', 1),
(24, 'Luis Manuel Sosa Berroa', 56777350, '$2y$10$AEGAlZvNY1avPNO2yiQzcO4JgDlSCg2BA7kQ1e5dIEn3Np3m6hYvy', 'docente', 1);



GRANT ALL PRIVILEGES ON cerbd.* TO cer identified by 'clinicacer';
grant insert on cerbd.alumnos to administrador identified by 'admin@pass';
grant insert on cerbd.docentes to administrador;
grant insert on cerbd.clase to administrador;
grant insert on cerbd.patologias to administrador;
grant insert on cerbd.especializaciones to administrador;
grant insert on cerbd.usuarios to administrador;
grant insert on cerbd.ocupacion to administrador;
grant insert on cerbd.patologia_alumno to administrador;
grant insert on cerbd.especializacion_docente to administrador;
grant insert on cerbd.llegada_docente to administrador;
grant insert on cerbd.alumnos_clase to administrador;

grant select on cerbd.alumnos to administrador;
grant select on cerbd.docentes to administrador;
grant select on cerbd.clase to administrador;
grant select on cerbd.patologias to administrador;
grant select on cerbd.especializaciones to administrador;
grant select on cerbd.usuarios to administrador;
grant select on cerbd.ocupacion to administrador;
grant select on cerbd.patologia_alumno to administrador;
grant select on cerbd.especializacion_docente to administrador;
grant select on cerbd.llegada_docente to administrador;
grant select on cerbd.alumnos_clase to administrador;
grant select on cerbd.informes to administrador;

grant delete on cerbd.patologias to administrador;
grant delete on cerbd.especializaciones to administrador;
grant delete on cerbd.clase to administrador;
grant delete on cerbd.alumnos_clase to administrador;

grant update(Nombre, apellido, cedula, estado, fecha_nac, apellido, celular_padres, mail_padres) on cerbd.alumnos to administrador;
grant update(Nombre, apellido, cedula, mail, celular, estado, fecha_nac) on cerbd.docentes to administrador;
grant update(Nombre, inicio, final, dia, estado) on cerbd.clase to administrador;
grant update(Nombre) on cerbd.patologias to administrador;
grant update(Nombre) on cerbd.especializaciones to administrador;
grant update(Nombre, cedula, estado) on cerbd.usuarios to administrador;
grant update(Nombre, estado) on cerbd.ocupacion to administrador;

grant select on cerbd.informes to docente identified by 'docente@pass';
grant select on cerbd.usuarios to docente;
grant select on cerbd.alumnos to docente;
grant select on cerbd.asistencias to docente;
grant select on cerbd.patologia_alumno to docente;
grant select on cerbd.clase to docente;
grant select on cerbd.alumnos_clase to docente;
grant select on cerbd.patologias to docente;
grant insert on cerbd.informes to docente;

grant update on cerbd.informes to docente;

grant select on cerbd.informes to alumno identified by 'alumno@pass';
grant select on cerbd.usuarios to alumno;
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
  MODIFY `ID_Alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `ID_Asistencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `ID_Clase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `ID_Docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `especializaciones`
--
ALTER TABLE `especializaciones`
  MODIFY `ID_Especializacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `informes`
--
ALTER TABLE `informes`
  MODIFY `ID_Informe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `llegada_docente`
--
ALTER TABLE `llegada_docente`
  MODIFY `ID_Llegada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ocupacion`
--
ALTER TABLE `ocupacion`
  MODIFY `ID_Ocupacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `patologias`
--
ALTER TABLE `patologias`
  MODIFY `ID_Patologia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
