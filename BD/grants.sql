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