/**Creacion de la base de datos para proyecto final*/

CREATE DATABASE DB_CSE_WEB;

USE  DB_CSE_WEB;


-- Tabla de pacientes


CREATE TABLE IF NOT EXISTS `pacientes` (
  `idPaciente` INT(4) NOT NULL AUTO_INCREMENT,
  `primerNombre` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `apellidoPaterno` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `estadoCivil` VARCHAR(15) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `fechaNacimiento` DATE NOT NULL,
  `sexo` CHAR(1) NOT NULL,
  `escolaridad` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `ocupacion` TINYTEXT CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `usuario` VARCHAR(25) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `contraseña` VARCHAR(15) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `fechaCreacion` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idPaciente`))ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;


-- Tabla de administradores

CREATE TABLE IF NOT EXISTS `administradores` (
  `idAdministrador` INT(4) NOT NULL  Auto_Increment,
  `primerNombre` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `apellidoPaterno` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `usuario` VARCHAR(25) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `contraseña` VARCHAR(15) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `fechaCreacion` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idAdministrador`))ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;



-- Tablas para instrumentos y preguntas

CREATE TABLE IF NOT EXISTS `instrumentos` (
  `idInstrumento` INT NOT NULL AUTO_INCREMENT,
  `idAutor` INT NOT NULL,
  `nom_Instrumento` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `autor` VARCHAR(150) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `descripcion` TINYTEXT CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `fechaCreacion` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `imagen` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  PRIMARY KEY (`idInstrumento`),
  INDEX `idAutor_idx` (`idAutor` ASC) VISIBLE,
  CONSTRAINT `idAutor` FOREIGN KEY (`idAutor`) REFERENCES `administradores` (`idAdministrador`)
  ON DELETE NO ACTION ON UPDATE NO ACTION)ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;
 



  -- Tabla de tipo de preguntas
  CREATE TABLE IF NOT EXISTS `tipoPreguntas` (
  `idtipo_Pregunta` INT NOT NULL,
  `Tipo` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  PRIMARY KEY (`idtipo_Pregunta`))ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;



-- Tabla de preguntas

CREATE TABLE IF NOT EXISTS `preguntas` (
  `idPregunta` INT NOT NULL,
  `idInstru` INT NOT NULL,
  `tipo` INT NOT NULL,
  `ordenPregunta` INT NOT NULL,
  `descripcion` MEDIUMTEXT CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `requerido` TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`idPregunta`),
  INDEX `idInstr_idx` (`idInstru` ASC) VISIBLE,
  INDEX `idTipo_idx` (`tipo` ASC) VISIBLE,
  CONSTRAINT `idInstr`FOREIGN KEY (`idInstru`) REFERENCES `instrumentos` (`idInstrumento`)
  ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `idTipo` FOREIGN KEY (`tipo`) REFERENCES `tipoPreguntas` (`idtipo_Pregunta`)
  ON DELETE CASCADE ON UPDATE CASCADE) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;
  
  
-- Tabla de respuestas

CREATE TABLE IF NOT EXISTS `respuestas` (
  `idRespuesta` INT NOT NULL,
  `idPregunta` INT NOT NULL,
  `respuesta` VARCHAR(2) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `valor` INT NOT NULL,
  `etiqueta` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  PRIMARY KEY (`idRespuesta`),
  INDEX `idPregunta_idx` (`idPregunta` ASC) VISIBLE,
  CONSTRAINT `idPregunta`FOREIGN KEY (`idPregunta`) REFERENCES `preguntas` (`idPregunta`)
    ON DELETE CASCADE ON UPDATE CASCADE) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;



-- Tabla del historial

CREATE TABLE IF NOT EXISTS `historial_Instrumentos` (
  `idInstrumentoCreado` INT NOT NULL,
  `nom_Instrumento` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `autor` VARCHAR(150) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `descripcion` MEDIUMTEXT CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `fechaCreacion` DATETIME NOT NULL,
  `respuestas` INT NULL DEFAULT 0,
  PRIMARY KEY (`idInstrumentoCreado`),
  UNIQUE INDEX `idInstrumentoCreado_UNIQUE` (`idInstrumentoCreado` ASC) VISIBLE)ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;



-- Tabla de reportes

CREATE TABLE IF NOT EXISTS `reportes` (
  `idReporte` INT NOT NULL,
  `idInstrumento` INT NOT NULL,
  `idPaciente` INT NOT NULL,
  `datos` LONGTEXT CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `puntaje` INT NOT NULL ,
  `fechaRealizacion` DATETIME NOT NULL,
  `informacionReporte` MEDIUMTEXT CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  PRIMARY KEY (`idReporte`, `idInstrumento`, `idPaciente`),
  INDEX `idPaciente_idx` (`idPaciente` ASC) VISIBLE,
  INDEX `idInstrumento_idx` (`idInstrumento` ASC) VISIBLE,
  UNIQUE INDEX `idReporte_UNIQUE` (`idReporte` ASC) VISIBLE,
  CONSTRAINT `idPaciente`
    FOREIGN KEY (`idPaciente`)
    REFERENCES `pacientes` (`idPaciente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idInstrumento`
    FOREIGN KEY (`idInstrumento`)
    REFERENCES `historial_Instrumentos` (`idInstrumentoCreado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;


-- Tabla con los registros de datos
CREATE TABLE IF NOT EXISTS `registrosDatos` (
  `idRegistroDato` INT NOT NULL,
  `idReporte` INT NOT NULL,
  `numPregunta` INT NOT NULL,
  `descripcion` MEDIUMTEXT CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `respuesta` VARCHAR(2) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `valor` INT NOT NULL,
  PRIMARY KEY (`idRegistroDato`, `idReporte`),
  INDEX `idHistorial_idx` (`idReporte` ASC) VISIBLE,
  CONSTRAINT `idHistorial` FOREIGN KEY (`idReporte`) REFERENCES `reportes` (`idReporte`)
    ON DELETE NO ACTION ON UPDATE NO ACTION) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8
