GRANT ALL PRIVILEGES ON cerbd.* TO cer IDENTIFIED by 'clinicacer';
grant insert on cerbd.alumnos to administrador IDENTIFIED by 'admin@pass';
grant insert on cerbd.docentes to administrador;
grant insert on cerbd.clase to administrador;
grant insert on cerbd.patologias to administrador;
grant insert on cerbd.especializaciones to administrador;
grant insert on cerbd.usuarios to administrador;
grant insert on cerbd.ocupacion to administrador;
grant insert on cerbd.patologia_alumno to administrador;
grant insert on cerbd.especializacion_docente to administrador;
grant insert on cerbd.lista_docente to administrador;
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
grant select on cerbd.lista_docente to administrador;
grant select on cerbd.alumnos_clase to administrador;
grant select on cerbd.informes to administrador;

grant update on cerbd.alumnos to administrador;
grant update on cerbd.docentes to administrador;
grant update on cerbd.clase to administrador;
grant update on cerbd.patologias to administrador;
grant update on cerbd.especializaciones to administrador;
grant update on cerbd.patologia_alumno to administrador;
grant update on cerbd.especializacion_docente to administrador;
grant update on cerbd.usuarios to administrador;
grant update on cerbd.ocupacion to administrador;
grant update on cerbd.alumnos_clase to administrador;

grant select on cerbd.informes to docente IDENTIFIED by 'docente@pass';
grant select on cerbd.usuarios to docente;
grant select on cerbd.alumnos to docente;
grant select on cerbd.patologia_alumno to docente;
grant select on cerbd.clase to docente;
grant select on cerbd.alumnos_clase to docente;
grant select on cerbd.patologias to docente;

grant insert on cerbd.informes to docente;
grant insert on cerbd.alumnos_clase to docente;

grant update on cerbd.informes to docente;
grant update on cerbd.alumnos_clase to docente;

grant select on cerbd.informes to alumno IDENTIFIED by 'alumno@pass';
grant select on cerbd.usuarios to alumno;

grant update on cerbd.usuarios to alumno;