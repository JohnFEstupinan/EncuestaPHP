-- MySQL Script generated by MySQL Workbench
-- Sun Apr  7 15:30:46 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema BDProyecto_Web
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema BDProyecto_Web
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `BDProyecto_Web` DEFAULT CHARACTER SET utf8 ;
USE `BDProyecto_Web` ;

-- -----------------------------------------------------
-- Table `BDProyecto_Web`.`Tbl_Grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDProyecto_Web`.`Tbl_Grupo` (
  `Grupo` INT NOT NULL,
  `Id_Grupo` INT NOT NULL,
  `Orden` VARCHAR(45) NOT NULL,
  `Num_Grupo` INT NOT NULL,
  PRIMARY KEY (`Grupo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BDProyecto_Web`.`Tbl_Materia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDProyecto_Web`.`Tbl_Materia` (
  `Id_Materia` INT NOT NULL,
  `Nom_Materia` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`Id_Materia`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BDProyecto_Web`.`Tbl_Docente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDProyecto_Web`.`Tbl_Docente` (
  `Id_Docente` INT NOT NULL,
  `NomApell_Docente` VARCHAR(300) NOT NULL,
  PRIMARY KEY (`Id_Docente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BDProyecto_Web`.`Tbl_Preguntas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDProyecto_Web`.`Tbl_Preguntas` (
  `Id_Preguntas` INT NOT NULL,
  `Pregunta` VARCHAR(200) NOT NULL,
  `Tipo_Pregunta` INT NOT NULL,
  PRIMARY KEY (`Id_Preguntas`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BDProyecto_Web`.`Tbl_Competencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDProyecto_Web`.`Tbl_Competencia` (
  `Id_Competencia` INT NOT NULL,
  `Nom_competencia` DATE NOT NULL,
  PRIMARY KEY (`Id_Competencia`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BDProyecto_Web`.`Tbl_Asignacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDProyecto_Web`.`Tbl_Asignacion` (
  `Num_Grupo` INT NULL,
  `Id_competencia` INT NULL,
  `Id_docente` INT NULL,
  INDEX `Num_Grupo_idx` (`Num_Grupo` ASC) VISIBLE,
  INDEX `Id_competencia_idx` (`Id_competencia` ASC) VISIBLE,
  INDEX `Id_Docente_idx` (`Id_docente` ASC) VISIBLE,
  CONSTRAINT `Num_Grupo`
    FOREIGN KEY (`Num_Grupo`)
    REFERENCES `BDProyecto_Web`.`Tbl_Grupo` (`Grupo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Id_competencia`
    FOREIGN KEY (`Id_competencia`)
    REFERENCES `BDProyecto_Web`.`Tbl_Competencia` (`Id_Competencia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Id_Docente`
    FOREIGN KEY (`Id_docente`)
    REFERENCES `BDProyecto_Web`.`Tbl_Docente` (`Id_Docente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BDProyecto_Web`.`Tbl_Encuesta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDProyecto_Web`.`Tbl_Encuesta` (
  `Num_grupo` INT NULL,
  `Id_competencia` INT NULL,
  `Id_Docente` INT NULL,
  `Num_registro` INT NOT NULL,
  `Evaluacion` INT NOT NULL,
  INDEX `Id_competencia_idx` (`Id_competencia` ASC) VISIBLE,
  INDEX `Id_Docente_idx` (`Id_Docente` ASC) VISIBLE,
  CONSTRAINT `Num_grupo`
    FOREIGN KEY (`Num_grupo`)
    REFERENCES `BDProyecto_Web`.`Tbl_Grupo` (`Grupo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Id_competencia`
    FOREIGN KEY (`Id_competencia`)
    REFERENCES `BDProyecto_Web`.`Tbl_Competencia` (`Id_Competencia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Id_Docente`
    FOREIGN KEY (`Id_Docente`)
    REFERENCES `BDProyecto_Web`.`Tbl_Docente` (`Id_Docente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
