-- Inicia la transacción
START TRANSACTION;

-- Inserta datos en la tabla `usuarios`
INSERT INTO `usuarios` (`ID_Usuario`, `Nombre`, `Cedula`, `Contraseña`, `Tipo`) VALUES
(1, 'Juan Pérez', 12345678, 'password1', 'docente'),
(2, 'Ana García', 87654321, 'password2', 'alumno'),
(3, 'María López', 11223344, 'password3', 'docente'),
(4, 'José Martínez', 22334455, 'password4', 'alumno'),
(5, 'Elena Rodríguez', 33445566, 'password5', 'docente'),
(6, 'Carlos Sánchez', 44556677, 'password6', 'alumno'),
(7, 'Lucía Fernández', 55667788, 'password7', 'docente'),
(8, 'Miguel Gómez', 66778899, 'password8', 'alumno'),
(9, 'Laura Díaz', 77889900, 'password9', 'docente'),
(10, 'Daniel Torres', 88990011, 'password10', 'alumno');

-- Inserta datos en la tabla `docentes`
INSERT INTO `docentes` (`ID_Docente`, `ID_Usuario`, `Nombre`, `Apellido`, `Cedula`, `Mail`, `Celular`) VALUES
(1, 1, 'Carlos', 'Mendoza', 11223344, 'carlos.mendoza@ejemplo.com', '555-1234'),
(2, 3, 'María', 'López', 22334455, 'maria.lopez@ejemplo.com', '555-2345'),
(3, 5, 'Elena', 'Rodríguez', 33445566, 'elena.rodriguez@ejemplo.com', '555-3456'),
(4, 7, 'Lucía', 'Fernández', 44556677, 'lucia.fernandez@ejemplo.com', '555-4567'),
(5, 9, 'Laura', 'Díaz', 55667788, 'laura.diaz@ejemplo.com', '555-5678');

-- Inserta datos en la tabla `especializaciones`
INSERT INTO `especializaciones` (`ID_Especializacion`, `Nombre`) VALUES
(1, 'Matemáticas'),
(2, 'Historia'),
(3, 'Ciencias'),
(4, 'Literatura'),
(5, 'Educación Física');

-- Inserta datos en la tabla `especializacion_docente`
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

-- Inserta datos en la tabla `clase`
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

-- Inserta datos en la tabla `alumnos`
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
(10, 10, 'Paula', 'Romero', 12233445, '2010-10-05', 'paula.romero@padres.com', '555-6789');

-- Inserta datos en la tabla `alumnos_clase`
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

-- Inserta datos en la tabla `asistencias`
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

-- Inserta datos en la tabla `llegada_docente`
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

-- Inserta datos en la tabla `patologias`
INSERT INTO `patologias` (`ID_Patologia`, `Nombre`) VALUES
(1, 'Alergia'),
(2, 'Asma'),
(3, 'Diabetes'),
(4, 'Hipertensión'),
(5, 'Epilepsia');

-- Inserta datos en la tabla `patologia_alumno`
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

-- Inserta datos en la tabla `informes`
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

-- Finaliza la transacción
COMMIT;
