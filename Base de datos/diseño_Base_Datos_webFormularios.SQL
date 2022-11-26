/**Creacion de la base de datos para proyecto final*/

CREATE DATABASE DB_CSE_WEB;

USE  DB_CSE_WEB;


-- Tabla de pacientes
Create table pacientes (
	idPaciente int(4) not null auto_increment,
	primerNombre varchar(20) not null,
    apellidoPaterno varchar(20) not null,
    estadoCivil varchar(15) not null,
    fechaNacimiento date not null,
    sexo char(1) not null,
    escolaridad varchar(45) not null,
    ocupacion tinytext not null,
    usuario varchar(25) not null,
	contraseña varchar(15) not null,
    fechaCreacion datetime not null default current_timestamp,
    primary key (idPaciente)
) ENGINE=InnoDB  DEFAULT CHARSET= utf8 collate utf8_general_ci;


-- Tabla de administradores
create table administradores (
	idAdministrador int(4) not null auto_increment,
    primerNombre varchar(20) not null,
    apellidoPaterno varchar(20) not null,
	usuario varchar(25) not null,
    contraseña varchar(15) not null,
    fechaCreacion datetime not null default current_timestamp,
     primary key (idAdministrador)
)ENGINE=InnoDB  DEFAULT CHARSET= utf8 collate utf8_general_ci;




-- Tablas para cuestionarios y preguntas

