#Insertar las categorias de alergia
/*https://www.laalergia.com/tipos-de-alergias*/

INSERT INTO `dentaid`.`categoriaalergia`(`categoria`)
VALUES ('Alergia estacional');

INSERT INTO `dentaid`.`categoriaalergia`(`categoria`)
VALUES ('Alergias de interior');

INSERT INTO `dentaid`.`categoriaalergia`(`categoria`)
VALUES ('Alergias a las mascotas');

INSERT INTO `dentaid`.`categoriaalergia`(`categoria`)
VALUES ('Alergias cutáneas');


INSERT INTO `dentaid`.`categoriaalergia`(`categoria`)
VALUES ('Alergias alimentarias');

use dentaid;
select * from categoriaalergia;

#Insertar las ALERGIAS

/*INSERT INTO `dentaid`.`alergia`(`nombre`,`reaccion`,`observaciones`,`idcategoriaAlergia`)
VALUES
(nombre, reaccion, alergiaalergiaalergia, observaciones, idcategoriaAlergia);*/

# Estacional
INSERT INTO `dentaid`.`alergia`(`nombre`,`reaccion`,`observaciones`,`idcategoriaAlergia`)
VALUES
('Alergia al polen','Congestión nasal, rinorrea y estornudos','Constante dificultad respiratoria',1);

INSERT INTO `dentaid`.`alergia`(`nombre`,`reaccion`,`observaciones`,`idcategoriaAlergia`)
VALUES
('Rinitis','Picor de nariz y ojos, importante secreción nasal acuosa, nariz taponada, estornudos frecuentes',
'Sintomas constantes durante más de una hora casi todos los días',1);

# Interiores

INSERT INTO `dentaid`.`alergia`(`nombre`,`reaccion`,`observaciones`,`idcategoriaAlergia`)
VALUES
('Alergia al moho','Tos, picazón de ojos, sibilancias, o enrojecimiento o picazón en los ojos o la piel',
'Sensación de una pequeña molestia en el ojo',2);

INSERT INTO `dentaid`.`alergia`(`nombre`,`reaccion`,`observaciones`,`idcategoriaAlergia`)
VALUES
('Alergia al penicillium','Urticaria, sarpullido y picazón','Asma grave',2);

#delete from alergia where idAlergia = 4

#Alergias a las mascotas

INSERT INTO `dentaid`.`alergia`(`nombre`,`reaccion`,`observaciones`,`idcategoriaAlergia`)
VALUES
('Alergia a los perros','Picazón, enrojecimiento o lagrimeo de ojos, picazón en los ojos, la nariz, el paladar o la garganta, goteo posnasal',
'Problemas para dormir',3);

INSERT INTO `dentaid`.`alergia`(`nombre`,`reaccion`,`observaciones`,`idcategoriaAlergia`)
VALUES
('Alergia a los gatos','Dificultad para respirar, presión o dolor en el pecho,Un silbido audible',
'Pérdida olfativa',3);
 
#Alergias cutáneas. 'Alergia al sol'

INSERT INTO `dentaid`.`alergia`(`nombre`,`reaccion`,`observaciones`,`idcategoriaAlergia`)
VALUES
('Urticaria ','Ronchas rojizas, elevadas y a menudo pruriginosa',
'Aparecieron luego de comer mariscos',4);

INSERT INTO `dentaid`.`alergia`(`nombre`,`reaccion`,`observaciones`,`idcategoriaAlergia`)
VALUES
('Dermatitis','Un sarpullido con picazón, manchas ásperas de un color oscuro, piel seca, agrietada y escamosa, ampollas, hinchazón, ardor o sensibilidad',
'El sarpullido pica tanto que no se puede dormir y el sarpullido afecta los ojos',4);  

#Alergias alimentarias

INSERT INTO `dentaid`.`alergia`(`nombre`,`reaccion`,`observaciones`,`idcategoriaAlergia`)
VALUES
('Alergia a la leche','Sensación de picazón u hormigueo alrededor de los labios o la boca, hinchazón de los labios, lengua o garganta',
'Dificultad para respirar además de una tos constante.',5);  

INSERT INTO `dentaid`.`alergia`(`nombre`,`reaccion`,`observaciones`,`idcategoriaAlergia`)
VALUES
('Alergia al pescado','Dolor abdominal, diarrea, náuseas o vómitos, mareos, aturdimiento o desmayo.',
'Sensación de opresión en la garganta.',5);  


Select * from alergia;

Select a.idAlergia, a.nombre, a.reaccion, a.observaciones, ca.categoria from alergia a, categoriaalergia ca
where a.idcategoriaAlergia = ca.idcategoriaAlergia;

#Inserción de las enfermedades
/*
INSERT INTO `dentaid`.`enfermedad`
(`nombre`, `observaciones`)
VALUES
(nombre, observaciones); */
#https://www.adeslasdental.es/las-10-enfermedades-bucodentales-mas-comunes/

INSERT INTO `dentaid`.`enfermedad` (`nombre`, `observaciones`)
VALUES
('Halitosis', 'Superficie irregular microscópica de la lengua puede atrapar bacterias que producen olores, los cuales contribuyen al mal aliento.');

INSERT INTO `dentaid`.`enfermedad` (`nombre`, `observaciones`)
VALUES
('Gingivitis dental', 'Enfermedad inflamatoria de las encías causada por la acumulación de placa bacteriana en la misma.');

INSERT INTO `dentaid`.`enfermedad` (`nombre`, `observaciones`)
VALUES
('Periodontitis', 'Grave infección de las encías que daña el tejido blando y que puede destruir el hueso que sostiene los dientes.');

INSERT INTO `dentaid`.`enfermedad` (`nombre`, `observaciones`)
VALUES
('Aftas bucales', 'Son úlceras pequeñas y superficiales que aparecen en la boca');

INSERT INTO `dentaid`.`enfermedad` (`nombre`, `observaciones`)
VALUES
('Erosión dental', 'Pérdida de la estructura dental causada por el ácido que ataca el esmalte.');

INSERT INTO `dentaid`.`enfermedad` (`nombre`, `observaciones`)
VALUES
('Sensibilidad dental', 'Implica dolor o molestias en los dientes por los dulces, el aire frío, las bebidas calientes, las bebidas frías o los helados.');

INSERT INTO `dentaid`.`enfermedad` (`nombre`, `observaciones`)
VALUES
('Carie Radicular', 'Proceso carioso que se produce sobre la raíz del diente.');

INSERT INTO `dentaid`.`enfermedad` (`nombre`, `observaciones`)
VALUES
('Difteria', 'infección grave causada por cepas de bacterias Corynebacterium diphtheriae.');


select * from enfermedad;

#Inserción de medicamentos (https://www.binasss.sa.cr/revistas/farmacos/v12n2/art7.pdf)
/*
INSERT INTO `dentaid`.`medicamento` (`nombre`, `descripcion`)
VALUES
(nombre, descripcion); */

INSERT INTO `dentaid`.`medicamento` (`nombre`, `descripcion`)
VALUES 
('Metronidazol', 'Inhibe la síntesis de los ácidos nucleicos.');

INSERT INTO `dentaid`.`medicamento` (`nombre`, `descripcion`)
VALUES 
('Doxiciclina', 'Antibiótico que previene el crecimiento y propagación de las bacterias grampositivas y gramnegativas.');

INSERT INTO `dentaid`.`medicamento` (`nombre`, `descripcion`)
VALUES 
('Minociclina', 'Antibiótico antiinflamatorio.');

INSERT INTO `dentaid`.`medicamento` (`nombre`, `descripcion`)
VALUES 
('Zilactin-B ', 'Alivia el dolor de problemas bucales menores.');

INSERT INTO `dentaid`.`medicamento` (`nombre`, `descripcion`)
VALUES 
('Cefalexina', 'Actúa inhibiendo la síntesis de la pared celular bacteriana, lo que produce su destrucción y su muerte.');

INSERT INTO `dentaid`.`medicamento` (`nombre`, `descripcion`)
VALUES 
('Dimetilfumarato', 'Antibiótico usado para tratar infecciones causadas por las bacterias, como bronquitis, difteria.');

INSERT INTO `dentaid`.`medicamento` (`nombre`, `descripcion`)
VALUES 
('Penicilina V', 'Inhibe la tercera y última etapa de la síntesis de la pared celular bacteriana.');

INSERT INTO `dentaid`.`medicamento` (`nombre`, `descripcion`)
VALUES 
('Nistatina', 'Inhibe el crecimiento del hongo Candida albicans.');


select * from medicamento;

#Inserción de las especialidades de la odontología (https://universidadeuropea.com/blog/especialidades-odontologia/)

/*INSERT INTO `dentaid`.`especialidad` (`tipoEspecialidad`)
VALUES (tipoEspecialidad);*/

INSERT INTO `dentaid`.`especialidad` (`tipoEspecialidad`)
VALUES ('Odontología general');

INSERT INTO `dentaid`.`especialidad` (`tipoEspecialidad`)
VALUES ('Cirugía oral y maxilofacial');

INSERT INTO `dentaid`.`especialidad` (`tipoEspecialidad`)
VALUES ('Endodoncia');

INSERT INTO `dentaid`.`especialidad` (`tipoEspecialidad`)
VALUES ('Odontología estética');

INSERT INTO `dentaid`.`especialidad` (`tipoEspecialidad`)
VALUES ('Odontopediatría');

INSERT INTO `dentaid`.`especialidad` (`tipoEspecialidad`)
VALUES ('Ortodoncia');

INSERT INTO `dentaid`.`especialidad` (`tipoEspecialidad`)
VALUES ('Patología bucal');

INSERT INTO `dentaid`.`especialidad` (`tipoEspecialidad`)
VALUES ('Periodoncia');

INSERT INTO `dentaid`.`especialidad` (`tipoEspecialidad`)
VALUES ('Prostodoncia y rehabilitación oral');

INSERT INTO `dentaid`.`especialidad` (`tipoEspecialidad`)
VALUES ('Radiología oral');

select * from especialidad;

#Inserción de los tipos de usuario
INSERT INTO `dentaid`.`tipousuario` (`tipo`)
VALUES ('Administrador');

INSERT INTO `dentaid`.`tipousuario` (`tipo`)
VALUES ('Médico');

INSERT INTO `dentaid`.`tipousuario` (`tipo`)
VALUES ('Paciente');

select * from tipousuario;

#chat gpt
#give me a fictitious list of users with name, first last name, second last name, email and gender
#inserción de los usuarios
/*
INSERT INTO `dentaid`.`usuario` (`correo`,`nombre`,`primerApellido`,`segundoApellido`,`contrasena`,`genero`,`estado`,`idTipoUsuario`)
VALUES
(correo,nombre,primerApellido,segundoApellido,contrasena,genero,estado,idTipoUsuario);
*/
#Pendiente, Activo, Inactivo
#Primero usuarios ya verificados luego unos más para acceptar en el desarrollo

INSERT INTO `dentaid`.`usuario` (`correo`,`nombre`,`primerApellido`,`segundoApellido`,`contrasena`,`estado`,`idTipoUsuario`)
VALUES
('maikelgomezmurillo@gmail.com','Maikel','Gómez','Murillo','1234','Activo',1);

INSERT INTO `dentaid`.`usuario` (`correo`,`nombre`,`primerApellido`,`segundoApellido`,`contrasena`,`estado`,`idTipoUsuario`)
VALUES
('sarahgarcia@example.com','Sarah','Garcia','Rodriguez','1234','Activo',2);

INSERT INTO `dentaid`.`usuario` (`correo`,`nombre`,`primerApellido`,`segundoApellido`,`contrasena`,`estado`,`idTipoUsuario`)
VALUES
('joshualopez@example.com','Joshua','Lopez','Fernandez','1234','Activo',2);

INSERT INTO `dentaid`.`usuario` (`correo`,`nombre`,`primerApellido`,`segundoApellido`,`contrasena`,`estado`,`idTipoUsuario`)
VALUES
('emilysanchez@example.com','Emily','Sanchez','Alvarez','1234','Activo',2);

INSERT INTO `dentaid`.`usuario` (`correo`,`nombre`,`primerApellido`,`segundoApellido`,`contrasena`,`estado`,`idTipoUsuario`)
VALUES
('alexanderhernandez@example.com','Alexander','Hernandez','Perez','1234','Activo',2);

INSERT INTO `dentaid`.`usuario` (`correo`,`nombre`,`primerApellido`,`segundoApellido`,`contrasena`,`estado`,`idTipoUsuario`)
VALUES
('isabellarodriguez@example.com','Isabella','Isabella','Gonzalez','1234','Activo',2);

INSERT INTO `dentaid`.`usuario` (`correo`,`nombre`,`primerApellido`,`segundoApellido`,`contrasena`,`estado`,`idTipoUsuario`)
VALUES
('lucasmartinez@example.com','Lucas','Martinez','Diaz','1234','Activo',2);

INSERT INTO `dentaid`.`usuario` (`correo`,`nombre`,`primerApellido`,`segundoApellido`,`contrasena`,`estado`,`idTipoUsuario`)
VALUES
('sofiagarcia@example.com','Sofia','Garcia','Perez','1234','Activo',2);

INSERT INTO `dentaid`.`usuario` (`correo`,`nombre`,`primerApellido`,`segundoApellido`,`contrasena`,`estado`,`idTipoUsuario`)
VALUES
('danielramirez@example.com','Daniel','Ramirez','Gonzalez','1234','Activo',2);

INSERT INTO `dentaid`.`usuario` (`correo`,`nombre`,`primerApellido`,`segundoApellido`,`contrasena`,`estado`,`idTipoUsuario`)
VALUES
('miahernandez@example.com','Mia','Hernandez','Sanchez','1234','Activo',2);

INSERT INTO `dentaid`.`usuario` (`correo`,`nombre`,`primerApellido`,`segundoApellido`,`contrasena`,`estado`,`idTipoUsuario`)
VALUES
('ethanperez@example.com','Ethan','Perez','Martinez','1234','Activo',2);

# usuarios paciente activos

INSERT INTO `dentaid`.`usuario` (`correo`,`nombre`,`primerApellido`,`segundoApellido`,`contrasena`,`estado`,`idTipoUsuario`)
VALUES
('johndoe@example.com','John','Smith','Johnson','1234','Activo',3);

INSERT INTO `dentaid`.`usuario` (`correo`,`nombre`,`primerApellido`,`segundoApellido`,`contrasena`,`estado`,`idTipoUsuario`)
VALUES
('janedoe@example.com','Jane','Rodriguez','Brown','1234','Activo',3);

INSERT INTO `dentaid`.`usuario` (`correo`,`nombre`,`primerApellido`,`segundoApellido`,`contrasena`,`estado`,`idTipoUsuario`)
VALUES
('emmarodriguez@example.com','Emma','Rodriguez','Perez','1234','Activo',3);

INSERT INTO `dentaid`.`usuario` (`correo`,`nombre`,`primerApellido`,`segundoApellido`,`contrasena`,`estado`,`idTipoUsuario`)
VALUES
('jacobjackson@example.com','Jacob','Jackson','Davis','1234','Activo',3);

INSERT INTO `dentaid`.`usuario` (`correo`,`nombre`,`primerApellido`,`segundoApellido`,`contrasena`,`estado`,`idTipoUsuario`)
VALUES
('avadavis@example.com','Ava','Davis','Brown','1234','Activo',3);

select * from usuario where idTipoUsuario = 3 and estado = "activo";

# usuarios médicos pendiente

INSERT INTO `dentaid`.`usuario` (`correo`,`nombre`,`primerApellido`,`segundoApellido`,`contrasena`,`estado`,`idTipoUsuario`)
VALUES
('jennifersmith@example.com','Jennifer','Smith','Jones','1234','Pendiente',2);

INSERT INTO `dentaid`.`usuario` (`correo`,`nombre`,`primerApellido`,`segundoApellido`,`contrasena`,`estado`,`idTipoUsuario`)
VALUES
('alexandergonzalez@example.com','Alexander','Gonzalez','Perez','1234','Pendiente',2);

INSERT INTO `dentaid`.`usuario` (`correo`,`nombre`,`primerApellido`,`segundoApellido`,`contrasena`,`estado`,`idTipoUsuario`)
VALUES
('hannahkimlee@example.com','Hannah','Kim','Lee','1234','Pendiente',2);

select * from Usuario where idTipoUsuario = 2 and estado = "Pendiente";

# usuarios médicos inactivo

INSERT INTO `dentaid`.`usuario` (`correo`,`nombre`,`primerApellido`,`segundoApellido`,`contrasena`,`estado`,`idTipoUsuario`)
VALUES
('danielrodriguez@example.com','Daniel','Rodriguez','Rivera','1234','Inactivo',2);

INSERT INTO `dentaid`.`usuario` (`correo`,`nombre`,`primerApellido`,`segundoApellido`,`contrasena`,`estado`,`idTipoUsuario`)
VALUES
('kaitlynnguyen@example.com','Kaitlyn','Nguyen','Tran','1234','Inactivo',2);

select * from Usuario where idTipoUsuario = 2 and estado = "Inactivo";

# usuarios pacientes pendiente

INSERT INTO `dentaid`.`usuario` (`correo`,`nombre`,`primerApellido`,`segundoApellido`,`contrasena`,`estado`,`idTipoUsuario`)
VALUES
('joshuapatel.@example.com','Joshua','Patel','Shah','1234','Pendiente',3);

INSERT INTO `dentaid`.`usuario` (`correo`,`nombre`,`primerApellido`,`segundoApellido`,`contrasena`,`estado`,`idTipoUsuario`)
VALUES
('ameliagarcia.@example.com','Amelia','Garcia','Sanchez','1234','Pendiente',3);

INSERT INTO `dentaid`.`usuario` (`correo`,`nombre`,`primerApellido`,`segundoApellido`,`contrasena`,`estado`,`idTipoUsuario`)
VALUES
('Anna.@example.com','Anna','Jackson','Smith','1234','Pendiente',3);

select * from Usuario where idTipoUsuario = 3 and estado = "Pendiente";

# usuarios pacientes inactivo

INSERT INTO `dentaid`.`usuario` (`correo`,`nombre`,`primerApellido`,`segundoApellido`,`contrasena`,`estado`,`idTipoUsuario`)
VALUES
('nathandavis.@example.com','Nathan','Davis','Miller','1234','Inactivo',3);

INSERT INTO `dentaid`.`usuario` (`correo`,`nombre`,`primerApellido`,`segundoApellido`,`contrasena`,`estado`,`idTipoUsuario`)
VALUES
('katherinemartinez.@example.com','Katherine','Martinez','Lopez','1234','Inactivo',3);

select * from Usuario where idTipoUsuario = 3 and estado = "Inactivo";

INSERT INTO `dentaid`.`usuario` (`correo`,`nombre`,`primerApellido`,`segundoApellido`,`contrasena`,`estado`,`idTipoUsuario`)
VALUES
('maikeldoctor@gmail.com','D','D','D','1234','Activo',2);

INSERT INTO `dentaid`.`usuario` (`correo`,`nombre`,`primerApellido`,`segundoApellido`,`contrasena`,`estado`,`idTipoUsuario`)
VALUES
('maikelpaciente@gmail.com','P','P','P','1234','Activo',3);
# usuarios médicos activos

#telefonos de los usuarios

INSERT INTO `dentaid`.`telefono` (`telefono`,`telefonoEmergencia`,`idUsuario`) VALUES ('506-6250-9013', '506-6400-5678',1);

INSERT INTO `dentaid`.`telefono` (`telefono`,`telefonoEmergencia`,`idUsuario`) VALUES ('506-5600-9012', '506-7800-3456',2);

INSERT INTO `dentaid`.`telefono` (`telefono`,`telefonoEmergencia`,`idUsuario`) VALUES ('506-6100-7890', '506-7300-2345',3);

INSERT INTO `dentaid`.`telefono` (`telefono`,`telefonoEmergencia`,`idUsuario`) VALUES ('506-7200-1234', '506-7500-6789',4);

INSERT INTO `dentaid`.`telefono` (`telefono`,`telefonoEmergencia`,`idUsuario`) VALUES ('506-6777-0123', '506-7999-4567',5);

INSERT INTO `dentaid`.`telefono` (`telefono`,`telefonoEmergencia`,`idUsuario`) VALUES ('506-6000-7891', '506-7222-3333',6);

INSERT INTO `dentaid`.`telefono` (`telefono`,`telefonoEmergencia`,`idUsuario`) VALUES ('506-7444-5555', '506-6666-7777',7);

INSERT INTO `dentaid`.`telefono` (`telefono`,`telefonoEmergencia`,`idUsuario`) VALUES ('506-7888-9999', '506-8111-2222',8);

INSERT INTO `dentaid`.`telefono` (`telefono`,`telefonoEmergencia`,`idUsuario`) VALUES ('506-8333-4444', '506-7555-6666',9);

INSERT INTO `dentaid`.`telefono` (`telefono`,`telefonoEmergencia`,`idUsuario`) VALUES ('506-7777-8888', '506-9899-0000',10);

INSERT INTO `dentaid`.`telefono` (`telefono`,`telefonoEmergencia`,`idUsuario`) VALUES ('506-1283-4567', '506-2227-1111',11);

INSERT INTO `dentaid`.`telefono` (`telefono`,`telefonoEmergencia`,`idUsuario`) VALUES ('506-3343-2222', '506-4744-3333',12);

INSERT INTO `dentaid`.`telefono` (`telefono`,`telefonoEmergencia`,`idUsuario`) VALUES ('506-5553-4444','506-6666-5555',13);

INSERT INTO `dentaid`.`telefono` (`telefono`,`telefonoEmergencia`,`idUsuario`) VALUES ('506-7767-6666', '506-8858-7777',14);

INSERT INTO `dentaid`.`telefono` (`telefono`,`telefonoEmergencia`,`idUsuario`) VALUES ('506-9699-8888', '506-1233-4567',15);

INSERT INTO `dentaid`.`telefono` (`telefono`,`telefonoEmergencia`,`idUsuario`) VALUES ('506-2622-3344', '506-4464-5566',16);

INSERT INTO `dentaid`.`telefono` (`telefono`,`telefonoEmergencia`,`idUsuario`) VALUES ('506-6666-7788', '506-8838-9900',17);

INSERT INTO `dentaid`.`telefono` (`telefono`,`telefonoEmergencia`,`idUsuario`) VALUES ('506-1611-2233', '506-3333-4455',18);

INSERT INTO `dentaid`.`telefono` (`telefono`,`telefonoEmergencia`,`idUsuario`) VALUES ('506-5565-6677', '506-3777-8899',19);

INSERT INTO `dentaid`.`telefono` (`telefono`,`telefonoEmergencia`,`idUsuario`) VALUES ('506-9996-0011', '506-0060-1122',20);

INSERT INTO `dentaid`.`telefono` (`telefono`,`telefonoEmergencia`,`idUsuario`) VALUES ('506-2262-3456', '506-4434-6789',21);

INSERT INTO `dentaid`.`telefono` (`telefono`,`telefonoEmergencia`,`idUsuario`) VALUES ('506-6666-9012', '506-8868-2345',22);

INSERT INTO `dentaid`.`telefono` (`telefono`,`telefonoEmergencia`,`idUsuario`) VALUES ('506-1131-5678', '506-3233-8901',23);

INSERT INTO `dentaid`.`telefono` (`telefono`,`telefonoEmergencia`,`idUsuario`) VALUES ('506-5585-1234', '506-6555-1234',24);

INSERT INTO `dentaid`.`telefono` (`telefono`,`telefonoEmergencia`,`idUsuario`) VALUES ('506-3999-7890', '506-0060-0123',25);

INSERT INTO `dentaid`.`telefono` (`telefono`,`telefonoEmergencia`,`idUsuario`) VALUES ('506-2622-3456', '506-4344-5678',26);

INSERT INTO `dentaid`.`telefono` (`telefono`,`telefonoEmergencia`,`idUsuario`) VALUES ('506-2622-3456', '506-4344-5678',27);

INSERT INTO `dentaid`.`telefono` (`telefono`,`telefonoEmergencia`,`idUsuario`) VALUES ('506-2622-3456', '506-4344-5678',28);

Select u.nombre, u.primerApellido, t.telefono, t.telefonoEmergencia from Usuario u, telefono t
where u.idUsuario = t.idUsuario;


#medico consulta (se anexa el usuario a la consulta medico para posteriormente este añada una hora a su horario )
#Me puedes dar una lista de direciones de consultorios odontologicos en Costa Rica? Chat gpt

/*INSERT INTO `dentaid`.`medicoconsulta` (`consultorioUbicacion`,`precio`,`idUsuario`,`idEspecialidad`)
VALUES (consultorioUbicacion,precio,idUsuario,idEspecialidad); */

# especialidades del 1 al 10 en id
#  medicos van del 2 hasta 11 y el 17 al 21


INSERT  INTO `dentaid`.`medicoconsulta` (`consultorioUbicacion`,`precio`,`idUsuario`,`idEspecialidad`)
VALUES ('Plaza Itskatzu, San Rafael de Escazú, Costa Rica',60000,2,2);

INSERT  INTO `dentaid`.`medicoconsulta` (`consultorioUbicacion`,`precio`,`idUsuario`,`idEspecialidad`)
VALUES ('Avenida 2da, Calle 38, San José, Costa Rica',80000,3,3);

INSERT  INTO `dentaid`.`medicoconsulta` (`consultorioUbicacion`,`precio`,`idUsuario`,`idEspecialidad`)
VALUES ('Avenida Escazú, San Rafael de Escazú, Costa Rica',25000,4,4);

INSERT  INTO `dentaid`.`medicoconsulta` (`consultorioUbicacion`,`precio`,`idUsuario`,`idEspecialidad`)
VALUES ('Curridabat, San José, Costa Rica',27000,5,5);

INSERT  INTO `dentaid`.`medicoconsulta` (`consultorioUbicacion`,`precio`,`idUsuario`,`idEspecialidad`)
VALUES ('Avenida 10, Calle 33, San José, Costa Rica',40000,6,6);

INSERT  INTO `dentaid`.`medicoconsulta` (`consultorioUbicacion`,`precio`,`idUsuario`,`idEspecialidad`)
VALUES ('Zapote, San José, Costa Rica',120000,7,7);

INSERT  INTO `dentaid`.`medicoconsulta` (`consultorioUbicacion`,`precio`,`idUsuario`,`idEspecialidad`)
VALUES ('Santa Ana, San José, Costa Rica',50000,8,8);

INSERT  INTO `dentaid`.`medicoconsulta` (`consultorioUbicacion`,`precio`,`idUsuario`,`idEspecialidad`)
VALUES ('Heredia, Costa Rica',110000,9,9);

INSERT  INTO `dentaid`.`medicoconsulta` (`consultorioUbicacion`,`precio`,`idUsuario`,`idEspecialidad`)
VALUES ('San Pedro, Montes de Oca, San José, Costa Rica',70000,10,10);

INSERT  INTO `dentaid`.`medicoconsulta` (`consultorioUbicacion`,`precio`,`idUsuario`,`idEspecialidad`)
VALUES ('Alajuela Centro. Avenida 6, diagonal a Farmacia Fishel.',100000,11,9);

INSERT  INTO `dentaid`.`medicoconsulta` (`consultorioUbicacion`,`precio`,`idUsuario`,`idEspecialidad`)
VALUES ('Alajuela (0.3 km) frente a Escuela Republica de Guatemala',60000,17,6);

INSERT  INTO `dentaid`.`medicoconsulta` (`consultorioUbicacion`,`precio`,`idUsuario`,`idEspecialidad`)
VALUES ('San Pablo de Heredia',30000,18,1);

INSERT  INTO `dentaid`.`medicoconsulta` (`consultorioUbicacion`,`precio`,`idUsuario`,`idEspecialidad`)
VALUES ('Heredia, 125 metros este del parque de La Aurora',65000,19,2);

INSERT  INTO `dentaid`.`medicoconsulta` (`consultorioUbicacion`,`precio`,`idUsuario`,`idEspecialidad`)
VALUES ('125 metros este del parque de La Aurora',850000,20,3);

INSERT  INTO `dentaid`.`medicoconsulta` (`consultorioUbicacion`,`precio`,`idUsuario`,`idEspecialidad`)
VALUES ('Alajuela Centro. Avenida 6, diagonal a Farmacia Fishel.',70000,21,10);

INSERT INTO `dentaid`.`medicoconsulta`
(`consultorioUbicacion`,`precio`,`idUsuario`,`idEspecialidad`)
VALUES
('Plaza Itskatzu, San Rafael de Escazú, Costa Rica',60000,27,2);


#delete from medicoconsulta;

select * from medicoconsulta m, usuario u, tipousuario T where m.idUsuario = u.idUsuario
and T.idTipoUsuario = U.idTipoUsuario and u.idTipoUsuario = 2;



# añadir el horario de disponibilidad del médico

INSERT INTO `dentaid`.`horario` (`titulo`,`fechaHoraInicial`, `fechaHoraFinal`, `disponible`,`idMedicoConsulta`)
VALUES ('Cita pendiente',(STR_TO_DATE('4/17/2023, 2:00:00 PM', '%m/%d/%Y, %h:%i:%s %p')),(STR_TO_DATE('4/17/2023, 3:00:00 PM', '%m/%d/%Y, %h:%i:%s %p')),'0', 2);

INSERT INTO `dentaid`.`horario` (`titulo`,`fechaHoraInicial`, `fechaHoraFinal`, `disponible`,`idMedicoConsulta`)
VALUES ('Cita pendiente',(STR_TO_DATE('4/17/2023, 10:00:00 AM', '%m/%d/%Y, %h:%i:%s %p')),(STR_TO_DATE('4/17/2023, 11:00:00 AM', '%m/%d/%Y, %h:%i:%s %p')),'0', 2);

INSERT INTO `dentaid`.`horario` (`titulo`,`fechaHoraInicial`, `fechaHoraFinal`, `disponible`,`idMedicoConsulta`)
VALUES ('Cita pendiente',(STR_TO_DATE('4/17/2023, 3:00:00 PM', '%m/%d/%Y, %h:%i:%s %p')),(STR_TO_DATE('4/17/2023, 4:00:00 PM', '%m/%d/%Y, %h:%i:%s %p')), '0', 3);

INSERT INTO `dentaid`.`horario` (`titulo`,`fechaHoraInicial`, `fechaHoraFinal`, `disponible`,`idMedicoConsulta`)
VALUES ('Cita pendiente',(STR_TO_DATE('4/18/2023, 9:30:00 AM', '%m/%d/%Y, %h:%i:%s %p')),(STR_TO_DATE('4/18/2023, 10:00:00 AM', '%m/%d/%Y, %h:%i:%s %p')), '0', 3);

INSERT INTO `dentaid`.`horario` (`titulo`,`fechaHoraInicial`, `fechaHoraFinal`, `disponible`,`idMedicoConsulta`)
VALUES ('Cita pendiente',(STR_TO_DATE('4/18/2023, 2:30:00 PM', '%m/%d/%Y, %h:%i:%s %p')),(STR_TO_DATE('4/18/2023, 3:00:00 PM', '%m/%d/%Y, %h:%i:%s %p')), '0', 4);

INSERT INTO `dentaid`.`horario` (`titulo`,`fechaHoraInicial`, `fechaHoraFinal`, `disponible`,`idMedicoConsulta`)
VALUES ('Cita disponible',(STR_TO_DATE('4/19/2023, 3:30:00 PM', '%m/%d/%Y, %h:%i:%s %p')),(STR_TO_DATE('4/19/2023, 4:30:00 PM', '%m/%d/%Y, %h:%i:%s %p')), '1', 4);

INSERT INTO `dentaid`.`horario` (`titulo`,`fechaHoraInicial`, `fechaHoraFinal`, `disponible`,`idMedicoConsulta`)
VALUES ('Cita disponible',(STR_TO_DATE('4/20/2023, 8:30:00 AM', '%m/%d/%Y, %h:%i:%s %p')),(STR_TO_DATE('4/20/2023, 9:30:00 AM', '%m/%d/%Y, %h:%i:%s %p')), '1', 5);

INSERT INTO `dentaid`.`horario` (`titulo`,`fechaHoraInicial`, `fechaHoraFinal`, `disponible`,`idMedicoConsulta`)
VALUES ('Cita disponible',(STR_TO_DATE('4/20/2023, 11:30:00 AM', '%m/%d/%Y, %h:%i:%s %p')),(STR_TO_DATE('4/20/2023, 12:00:00 AM', '%m/%d/%Y, %h:%i:%s %p')), '1', 5);

INSERT INTO `dentaid`.`horario` (`titulo`,`fechaHoraInicial`, `fechaHoraFinal`, `disponible`,`idMedicoConsulta`)
VALUES ('Cita disponible',(STR_TO_DATE('4/21/2023, 8:00:00 AM', '%m/%d/%Y, %h:%i:%s %p')),(STR_TO_DATE('4/21/2023, 9:00:00 AM', '%m/%d/%Y, %h:%i:%s %p')), '1', 6);

INSERT INTO `dentaid`.`horario` (`titulo`,`fechaHoraInicial`, `fechaHoraFinal`, `disponible`,`idMedicoConsulta`)
VALUES ('Cita disponible',(STR_TO_DATE('4/21/2023, 9:00:00 AM', '%m/%d/%Y, %h:%i:%s %p')),(STR_TO_DATE('4/21/2023, 10:00:00 AM', '%m/%d/%Y, %h:%i:%s %p')), '1', 6);

INSERT INTO `dentaid`.`horario` (`titulo`,`fechaHoraInicial`, `fechaHoraFinal`, `disponible`,`idMedicoConsulta`)
VALUES ('Cita disponible',(STR_TO_DATE('4/21/2023, 10:15:00 AM', '%m/%d/%Y, %h:%i:%s %p')),(STR_TO_DATE('4/21/2023, 11:40:00 AM', '%m/%d/%Y, %h:%i:%s %p')), '1', 7);

INSERT INTO `dentaid`.`horario` (`titulo`,`fechaHoraInicial`, `fechaHoraFinal`, `disponible`,`idMedicoConsulta`)
VALUES ('Cita disponible',(STR_TO_DATE('4/21/2023, 1:50:00 PM', '%m/%d/%Y, %h:%i:%s %p')),(STR_TO_DATE('4/21/2023, 3:40:00 PM', '%m/%d/%Y, %h:%i:%s %p')), '1', 7);

INSERT INTO `dentaid`.`horario` (`titulo`,`fechaHoraInicial`, `fechaHoraFinal`, `disponible`,`idMedicoConsulta`)
VALUES ('Cita disponible',(STR_TO_DATE('4/16/2023, 4:00:00 PM', '%m/%d/%Y, %h:%i:%s %p')),(STR_TO_DATE('4/16/2023, 5:10:00 PM', '%m/%d/%Y, %h:%i:%s %p')), '1', 8);

INSERT INTO `dentaid`.`horario` (`titulo`,`fechaHoraInicial`, `fechaHoraFinal`, `disponible`,`idMedicoConsulta`)
VALUES ('Cita disponible',(STR_TO_DATE('4/16/2023, 5:30:00 PM', '%m/%d/%Y, %h:%i:%s %p')),(STR_TO_DATE('4/16/2023, 6:30:00 PM', '%m/%d/%Y, %h:%i:%s %p')), '1', 8);

INSERT INTO `dentaid`.`horario` (`titulo`,`fechaHoraInicial`, `fechaHoraFinal`, `disponible`,`idMedicoConsulta`)
VALUES ('Cita disponible',(STR_TO_DATE('4/19/2023, 1:40:00 PM', '%m/%d/%Y, %h:%i:%s %p')),(STR_TO_DATE('4/19/2023, 2:10:00 PM', '%m/%d/%Y, %h:%i:%s %p')), '1', 9);

INSERT INTO `dentaid`.`horario` (`titulo`,`fechaHoraInicial`, `fechaHoraFinal`, `disponible`,`idMedicoConsulta`)
VALUES ('Cita disponible',(STR_TO_DATE('4/19/2023, 7:40:00 AM', '%m/%d/%Y, %h:%i:%s %p')),(STR_TO_DATE('4/19/2023, 8:10:00 AM', '%m/%d/%Y, %h:%i:%s %p')), '1', 9);

INSERT INTO `dentaid`.`horario` (`titulo`,`fechaHoraInicial`, `fechaHoraFinal`, `disponible`,`idMedicoConsulta`)
VALUES ('Cita disponible',(STR_TO_DATE('4/19/2023, 4:00:00 PM', '%m/%d/%Y, %h:%i:%s %p')),(STR_TO_DATE('4/19/2023, 5:10:00 PM', '%m/%d/%Y, %h:%i:%s %p')), '1', 10);

INSERT INTO `dentaid`.`horario` (`titulo`,`fechaHoraInicial`, `fechaHoraFinal`, `disponible`,`idMedicoConsulta`)
VALUES ('Cita disponible',(STR_TO_DATE('4/18/2023, 5:30:00 PM', '%m/%d/%Y, %h:%i:%s %p')),(STR_TO_DATE('4/18/2023, 6:30:00 PM', '%m/%d/%Y, %h:%i:%s %p')), '1', 10);

INSERT INTO `dentaid`.`horario` (`titulo`,`fechaHoraInicial`, `fechaHoraFinal`, `disponible`,`idMedicoConsulta`)
VALUES ('Cita disponible',(STR_TO_DATE('4/17/2023, 1:40:00 PM', '%m/%d/%Y, %h:%i:%s %p')),(STR_TO_DATE('4/17/2023, 2:10:00 PM', '%m/%d/%Y, %h:%i:%s %p')), '1', 11);

INSERT INTO `dentaid`.`horario` (`titulo`,`fechaHoraInicial`, `fechaHoraFinal`, `disponible`,`idMedicoConsulta`)
VALUES ('Cita disponible',(STR_TO_DATE('4/17/2023, 7:40:00 AM', '%m/%d/%Y, %h:%i:%s %p')),(STR_TO_DATE('4/17/2023, 8:10:00 AM', '%m/%d/%Y, %h:%i:%s %p')), '1', 11);


INSERT INTO `dentaid`.`horario` (`titulo`,`fechaHoraInicial`, `fechaHoraFinal`, `disponible`,`idMedicoConsulta`)
VALUES ('Cita disponible',(STR_TO_DATE('4/17/2023, 7:40:00 AM', '%m/%d/%Y, %h:%i:%s %p')),(STR_TO_DATE('4/17/2023, 8:10:00 AM', '%m/%d/%Y, %h:%i:%s %p')), '1', 16);
INSERT INTO `dentaid`.`horario` (`titulo`,`fechaHoraInicial`, `fechaHoraFinal`, `disponible`,`idMedicoConsulta`)
VALUES ('Cita disponible',(STR_TO_DATE('4/17/2023, 1:40:00 PM', '%m/%d/%Y, %h:%i:%s %p')),(STR_TO_DATE('4/17/2023, 2:10:00 PM', '%m/%d/%Y, %h:%i:%s %p')), '1', 16);


select * from horario;



select * from medicoconsulta m, usuario u, tipousuario T where m.idUsuario = u.idUsuario
and T.idTipoUsuario = U.idTipoUsuario and u.idTipoUsuario = 2 and estado = "Activo";

# inserción de los expedientes
# tipos A+ , A-, B+ , B- .AB+, AB-, O+, O-

---------- 
INSERT INTO `dentaid`.`expediente` (`sexo`,`fechaNacimiento`,`tipoSangre`,`residencia`,`idUsuario`)
VALUES ('masculino','2000-04-26','A+','Calle 32, Barrio Escalante, San José',12);

# -alergia 
INSERT INTO `dentaid`.`expedientealergia`(`idExpediente`,`idAlergia`) VALUES (1,1);
INSERT INTO `dentaid`.`expedientealergia`(`idExpediente`,`idAlergia`)  VALUES (1,3);
INSERT INTO `dentaid`.`expedientealergia`(`idExpediente`,`idAlergia`)  VALUES (1,5);

# -enfermedad 
INSERT INTO `dentaid`.`expedienteenfermedad`(`idExpediente`,`idEnfermedad`) VALUES(1,1);
INSERT INTO `dentaid`.`expedienteenfermedad`(`idExpediente`,`idEnfermedad`) VALUES(1,2);

# -medicamento
INSERT INTO `dentaid`.`expedientemedicamento`(`idExpediente`,`idMedicamento`)VALUES(1,2);

----------
INSERT INTO `dentaid`.`expediente` (`sexo`,`fechaNacimiento`,`tipoSangre`,`residencia`,`idUsuario`)
VALUES ('masculino','1996-02-15','A-','200 metros al este del Parque Central, Alajuela',13);

# -alergia 
INSERT INTO `dentaid`.`expedientealergia`(`idExpediente`,`idAlergia`)  VALUES (2,4);

# -enfermedad 
INSERT INTO `dentaid`.`expedienteenfermedad`(`idExpediente`,`idEnfermedad`) VALUES(2,5);
INSERT INTO `dentaid`.`expedienteenfermedad`(`idExpediente`,`idEnfermedad`) VALUES(2,6);

# -medicamento
INSERT INTO `dentaid`.`expedientemedicamento`(`idExpediente`,`idMedicamento`)VALUES(2,4);

----------
INSERT INTO `dentaid`.`expediente` (`sexo`,`fechaNacimiento`,`tipoSangre`,`residencia`,`idUsuario`)
VALUES ('femenino','1998-05-11','B+','Carretera Principal, Santa Ana, San José',14);

# -alergia 
INSERT INTO `dentaid`.`expedientealergia`(`idExpediente`,`idAlergia`)  VALUES (3,7);

# -enfermedad 
INSERT INTO `dentaid`.`expedienteenfermedad`(`idExpediente`,`idEnfermedad`) VALUES(3,8);

# -medicamento
INSERT INTO `dentaid`.`expedientemedicamento`(`idExpediente`,`idMedicamento`)VALUES(3,8);
INSERT INTO `dentaid`.`expedientemedicamento`(`idExpediente`,`idMedicamento`)VALUES(3,6);

----------
INSERT INTO `dentaid`.`expediente` (`sexo`,`fechaNacimiento`,`tipoSangre`,`residencia`,`idUsuario`)
VALUES ('masculino','1999-12-1','B-','Calle 5, Paseo Colón, San José',15);

# -alergia 
INSERT INTO `dentaid`.`expedientealergia`(`idExpediente`,`idAlergia`)  VALUES (4,9);
INSERT INTO `dentaid`.`expedientealergia`(`idExpediente`,`idAlergia`)  VALUES (4,10);

# -enfermedad 
INSERT INTO `dentaid`.`expedienteenfermedad`(`idExpediente`,`idEnfermedad`) VALUES(4,5);
INSERT INTO `dentaid`.`expedienteenfermedad`(`idExpediente`,`idEnfermedad`) VALUES(4,7);

# -medicamento
INSERT INTO `dentaid`.`expedientemedicamento`(`idExpediente`,`idMedicamento`)VALUES(4,1);
INSERT INTO `dentaid`.`expedientemedicamento`(`idExpediente`,`idMedicamento`)VALUES(4,2);

----------
INSERT INTO `dentaid`.`expediente` (`sexo`,`fechaNacimiento`,`tipoSangre`,`residencia`,`idUsuario`)
VALUES ('femenino','2003-4-10','O-','Calle 12, Avenida 10, Barrio Otoya',16);

# -alergia 
INSERT INTO `dentaid`.`expedientealergia`(`idExpediente`,`idAlergia`)  VALUES (5,4);

# -enfermedad 
INSERT INTO `dentaid`.`expedienteenfermedad`(`idExpediente`,`idEnfermedad`) VALUES(5,4);

# -medicamento
INSERT INTO `dentaid`.`expedientemedicamento`(`idExpediente`,`idMedicamento`)VALUES(5,4);


#consultar info del expediente asociado a un paciente de manera modular

Select u.idUsuario, u.nombre , e.sexo, e.fechaNacimiento, e.tipoSangre 
from expediente e, usuario u where e.idUsuario = u.idUsuario;


Select u.idUsuario, u.nombre ,m.idMedicamento, m.nombre as medicamento  
from expediente e,  medicamento m, expedienteMedicamento em, usuario u 
where e.idExpediente = em.idExpediente
and e.idUsuario = u.idUsuario
and em.idMedicamento = m.idMedicamento
and  e.idUsuario = 16;

select u.idUsuario, u.nombre ,a.idAlergia, a.nombre as alergia
from alergia a, expedienteAlergia ea, expediente e, usuario u
where ea.idAlergia = a.idAlergia
and e.idUsuario = u.idUsuario
and e.idExpediente = ea.idExpediente 
and  e.idUsuario = 16;

select u.idUsuario, u.nombre ,en.idEnfermedad,en.nombre 
from enfermedad en, expedienteEnfermedad ee, expediente e, usuario u
where ee.idEnfermedad = en.idEnfermedad
and e.idUsuario = u.idUsuario
and e.idExpediente = ee.idExpediente
and  e.idUsuario = 16;

# inserción de cirucia a pacientes activos
/* 
Cirugía de injerto de hueso
Cirugía dental en las encías
Cirugía dental en las encías
Cirugía de elevación de seno maxilar
*/
INSERT INTO `dentaid`.`cirugia` (`nombre`,`fecha`,`lugar`,`idExpediente`)
VALUES
('Cirugía de implantes dentales','2023-4-6','Avenida 2, Calle 40, Barrio La Granja, San José',1);


INSERT INTO `dentaid`.`cirugia` (`nombre`,`fecha`,`lugar`,`idExpediente`)
VALUES
('Cirugía dental cosmética','2003-4-7','500 metros al sur de la entrada principal de la Universidad de Costa Rica, Montes de Oca, San José',2);

INSERT INTO `dentaid`.`cirugia` (`nombre`,`fecha`,`lugar`,`idExpediente`)
VALUES
('Cirugía mandibular correctiva','2003-4-8','Avenida 7, Calle 3, Barrio Amón, San José',3);

INSERT INTO `dentaid`.`cirugia` (`nombre`,`fecha`,`lugar`,`idExpediente`)
VALUES
('Cirugía periapical','2003-4-9','Calle 2, Avenida 4, Barrio La California, San José', 4);

INSERT INTO `dentaid`.`cirugia` (`nombre`,`fecha`,`lugar`,`idExpediente`)
VALUES
('Cirugía de muelas del juicio','2003-4-7', 'Calle 2, Avenida 4, Barrio La California, San José', 5);

select * from cirugia;


#inserción de citas de pacientes con expediente
# Cancelada, Pendiente, Completa

Select u.idUsuario, u.nombre , e.sexo, e.fechaNacimiento, e.tipoSangre 
from expediente e, usuario u where e.idUsuario = u.idUsuario;


INSERT INTO `dentaid`.`cita` (`estado`,`idUsuario`,`idHorario`)
VALUES ('Pendiente',12,1);

INSERT INTO `dentaid`.`cita` (`estado`,`idUsuario`,`idHorario`)
VALUES ('Pendiente',13,2);

INSERT INTO `dentaid`.`cita` (`estado`,`idUsuario`,`idHorario`)
VALUES ('Pendiente',14,3);

INSERT INTO `dentaid`.`cita` (`estado`,`idUsuario`,`idHorario`)
VALUES ('Pendiente',15,4);

INSERT INTO `dentaid`.`cita` (`estado`,`idUsuario`,`idHorario`)
VALUES ('Pendiente',16,5);

select * from cita;

