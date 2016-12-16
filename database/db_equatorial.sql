-- MySQL Script generated by MySQL Workbench
-- 12/13/16 15:50:46
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema db_equatorial
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `db_equatorial` ;

-- -----------------------------------------------------
-- Schema db_equatorial
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_equatorial` DEFAULT CHARACTER SET utf8 ;
USE `db_equatorial` ;

-- -----------------------------------------------------
-- Table `db_equatorial`.`atividades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_equatorial`.`atividades` (
  `id_atividades` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(60) NULL,
  `sigla` VARCHAR(5) NULL,
  PRIMARY KEY (`id_atividades`))
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_equatorial`.`veiculo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_equatorial`.`veiculo` (
  `id_veiculo` INT NOT NULL AUTO_INCREMENT,
  `placa` VARCHAR(10) NULL,
  `tpo_veiculo` TINYINT(1) NOT NULL COMMENT '0 = Carro; 1 = Moto;',
  PRIMARY KEY (`id_veiculo`))
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_equatorial`.`holding`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_equatorial`.`holding` (
  `id_holding` INT NOT NULL AUTO_INCREMENT,
  `nm_holding` VARCHAR(45) NULL,
  PRIMARY KEY (`id_holding`))
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_equatorial`.`distribuidora`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_equatorial`.`distribuidora` (
  `id_distribuidora` INT NOT NULL AUTO_INCREMENT,
  `id_holding` INT NOT NULL,
  `nm_distribuidora` VARCHAR(80) NULL,
  `sigla` VARCHAR(5) NULL,
  PRIMARY KEY (`id_distribuidora`),
  INDEX `fk_distribuidora_holding_idx` (`id_holding` ASC),
  CONSTRAINT `fk_distribuidora_holding`
  FOREIGN KEY (`id_holding`)
  REFERENCES `db_equatorial`.`holding` (`id_holding`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_equatorial`.`diretoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_equatorial`.`diretoria` (
  `id_diretoria` INT NOT NULL AUTO_INCREMENT,
  `id_distribuidora` INT NOT NULL,
  `nm_diretoria` VARCHAR(60) NULL,
  PRIMARY KEY (`id_diretoria`),
  INDEX `fk_diretoria_distribuidora1_idx` (`id_distribuidora` ASC),
  CONSTRAINT `fk_diretoria_distribuidora1`
  FOREIGN KEY (`id_distribuidora`)
  REFERENCES `db_equatorial`.`distribuidora` (`id_distribuidora`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_equatorial`.`gerencia_executiva`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_equatorial`.`gerencia_executiva` (
  `id_gerencia_executiva` INT NOT NULL AUTO_INCREMENT,
  `id_diretoria` INT NOT NULL,
  `nm_gerencia` VARCHAR(80) NULL,
  PRIMARY KEY (`id_gerencia_executiva`),
  INDEX `fk_gerencia_executiva_diretoria1_idx` (`id_diretoria` ASC),
  CONSTRAINT `fk_gerencia_executiva_diretoria1`
  FOREIGN KEY (`id_diretoria`)
  REFERENCES `db_equatorial`.`diretoria` (`id_diretoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_equatorial`.`area_executiva`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_equatorial`.`area_executiva` (
  `id_area_executiva` INT NOT NULL AUTO_INCREMENT,
  `id_gerencia_executiva` INT NOT NULL,
  `nm_area_executiva` VARCHAR(80) NULL,
  PRIMARY KEY (`id_area_executiva`),
  INDEX `fk_area_executiva_gerencia_executiva1_idx` (`id_gerencia_executiva` ASC),
  CONSTRAINT `fk_area_executiva_gerencia_executiva1`
  FOREIGN KEY (`id_gerencia_executiva`)
  REFERENCES `db_equatorial`.`gerencia_executiva` (`id_gerencia_executiva`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_equatorial`.`regional`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_equatorial`.`regional` (
  `id_regional` INT NOT NULL AUTO_INCREMENT,
  `id_area_executiva` INT NOT NULL,
  `nm_regional` VARCHAR(80) NULL,
  `sigla` VARCHAR(5) NULL,
  PRIMARY KEY (`id_regional`),
  INDEX `fk_regional_area_executiva1_idx` (`id_area_executiva` ASC),
  CONSTRAINT `fk_regional_area_executiva1`
  FOREIGN KEY (`id_area_executiva`)
  REFERENCES `db_equatorial`.`area_executiva` (`id_area_executiva`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_equatorial`.`equipes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_equatorial`.`equipes` (
  `id_equipes` INT NOT NULL AUTO_INCREMENT,
  `id_atividades` INT NOT NULL,
  `id_veiculo` INT NOT NULL,
  `id_regional` INT NOT NULL,
  `cod_equatorial` VARCHAR(21) NULL,
  `nm_equipe` VARCHAR(60) NULL,
  PRIMARY KEY (`id_equipes`),
  INDEX `fk_equipes_atividades1_idx` (`id_atividades` ASC),
  INDEX `fk_equipes_veiculo1_idx` (`id_veiculo` ASC),
  INDEX `fk_equipes_regional1_idx` (`id_regional` ASC),
  CONSTRAINT `fk_equipes_atividades1`
  FOREIGN KEY (`id_atividades`)
  REFERENCES `db_equatorial`.`atividades` (`id_atividades`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipes_veiculo1`
  FOREIGN KEY (`id_veiculo`)
  REFERENCES `db_equatorial`.`veiculo` (`id_veiculo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipes_regional1`
  FOREIGN KEY (`id_regional`)
  REFERENCES `db_equatorial`.`regional` (`id_regional`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_equatorial`.`equipamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_equatorial`.`equipamentos` (
  `id_equipamentos` INT NOT NULL AUTO_INCREMENT,
  `tipo_equipamento` INT NOT NULL COMMENT '0 = EPI; 1 = EPC; 2 = Ferramenta;',
  `descricao` VARCHAR(60) NULL,
  PRIMARY KEY (`id_equipamentos`))
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_equatorial`.`colaborador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_equatorial`.`colaborador` (
  `id_colaborador` INT NOT NULL AUTO_INCREMENT,
  `id_distribuidora` INT NOT NULL,
  `id_diretoria` INT NOT NULL,
  `id_gerencia_executiva` INT NOT NULL,
  `id_area_executiva` INT NOT NULL,
  `id_regional` INT NOT NULL,
  `nm_colaborador` VARCHAR(120) NULL,
  `cpf_colaborador` VARCHAR(11) NULL,
  `matricula` VARCHAR(45) NULL,
  PRIMARY KEY (`id_colaborador`),
  INDEX `fk_colaborador_diretoria1_idx` (`id_diretoria` ASC),
  INDEX `fk_colaborador_area_executiva1_idx` (`id_area_executiva` ASC),
  INDEX `fk_colaborador_gerencia_executiva1_idx` (`id_gerencia_executiva` ASC),
  INDEX `fk_colaborador_distribuidora1_idx` (`id_distribuidora` ASC),
  INDEX `fk_colaborador_regional1_idx` (`id_regional` ASC),
  CONSTRAINT `fk_colaborador_diretoria1`
  FOREIGN KEY (`id_diretoria`)
  REFERENCES `db_equatorial`.`diretoria` (`id_diretoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_colaborador_area_executiva1`
  FOREIGN KEY (`id_area_executiva`)
  REFERENCES `db_equatorial`.`area_executiva` (`id_area_executiva`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_colaborador_gerencia_executiva1`
  FOREIGN KEY (`id_gerencia_executiva`)
  REFERENCES `db_equatorial`.`gerencia_executiva` (`id_gerencia_executiva`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_colaborador_distribuidora1`
  FOREIGN KEY (`id_distribuidora`)
  REFERENCES `db_equatorial`.`distribuidora` (`id_distribuidora`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_colaborador_regional1`
  FOREIGN KEY (`id_regional`)
  REFERENCES `db_equatorial`.`regional` (`id_regional`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_equatorial`.`instalacoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_equatorial`.`instalacoes` (
  `id_instalacoes` INT NOT NULL AUTO_INCREMENT,
  `id_regional` INT NOT NULL,
  `id_atividades` INT NOT NULL,
  `cod_equatorial` VARCHAR(21) NULL,
  `nm_instalacao` VARCHAR(60) NULL,
  `tp_instalacao` INT(11) NOT NULL COMMENT '0 = Subestação; 1 = Agência; 2 = Usina; 3 = Almoxarifado; 4 = Oficina; 5 = Escritório; 6 = Linha de Transmissão;',
  `sigla` VARCHAR(5) NULL,
  PRIMARY KEY (`id_instalacoes`),
  INDEX `fk_instalacoes_regional1_idx` (`id_regional` ASC),
  INDEX `fk_instalacoes_atividades1_idx` (`id_atividades` ASC),
  CONSTRAINT `fk_instalacoes_regional1`
  FOREIGN KEY (`id_regional`)
  REFERENCES `db_equatorial`.`regional` (`id_regional`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_instalacoes_atividades1`
  FOREIGN KEY (`id_atividades`)
  REFERENCES `db_equatorial`.`atividades` (`id_atividades`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_equatorial`.`obras`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_equatorial`.`obras` (
  `id_obras` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(60) NULL,
  `sigla` VARCHAR(5) NULL,
  PRIMARY KEY (`id_obras`))
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_equatorial`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_equatorial`.`usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `id_colaborador` INT NOT NULL,
  `tp_user` CHAR(1) NULL COMMENT '0 = Corporativo; 1 = Gestão; 2 = Operação;',
  `pswd` VARCHAR(80) NULL,
  PRIMARY KEY (`id_usuario`, `id_colaborador`),
  INDEX `fk_usuario_colaborador1_idx` (`id_colaborador` ASC),
  CONSTRAINT `fk_usuario_colaborador1`
  FOREIGN KEY (`id_colaborador`)
  REFERENCES `db_equatorial`.`colaborador` (`id_colaborador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_equatorial`.`colaborador_equipes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_equatorial`.`colaborador_equipes` (
  `id_colaborador` INT NOT NULL,
  `id_equipes` INT NOT NULL,
  PRIMARY KEY (`id_colaborador`, `id_equipes`),
  INDEX `fk_colaborador_has_equipes_equipes1_idx` (`id_equipes` ASC),
  INDEX `fk_colaborador_has_equipes_colaborador1_idx` (`id_colaborador` ASC),
  CONSTRAINT `fk_colaborador_has_equipes_colaborador1`
  FOREIGN KEY (`id_colaborador`)
  REFERENCES `db_equatorial`.`colaborador` (`id_colaborador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_colaborador_has_equipes_equipes1`
  FOREIGN KEY (`id_equipes`)
  REFERENCES `db_equatorial`.`equipes` (`id_equipes`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_equatorial`.`equipes_equipamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_equatorial`.`equipes_equipamentos` (
  `id_equipes` INT NOT NULL,
  `id_equipamentos` INT NOT NULL,
  PRIMARY KEY (`id_equipes`, `id_equipamentos`),
  INDEX `fk_equipes_has_equipamentos_equipamentos1_idx` (`id_equipamentos` ASC),
  INDEX `fk_equipes_has_equipamentos_equipes1_idx` (`id_equipes` ASC),
  CONSTRAINT `fk_equipes_has_equipamentos_equipes1`
  FOREIGN KEY (`id_equipes`)
  REFERENCES `db_equatorial`.`equipes` (`id_equipes`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipes_has_equipamentos_equipamentos1`
  FOREIGN KEY (`id_equipamentos`)
  REFERENCES `db_equatorial`.`equipamentos` (`id_equipamentos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_equatorial`.`colaborador_equipamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_equatorial`.`colaborador_equipamentos` (
  `id_colaborador` INT NOT NULL,
  `id_equipamentos` INT NOT NULL,
  PRIMARY KEY (`id_colaborador`, `id_equipamentos`),
  INDEX `fk_colaborador_has_equipamentos_equipamentos1_idx` (`id_equipamentos` ASC),
  INDEX `fk_colaborador_has_equipamentos_colaborador1_idx` (`id_colaborador` ASC),
  CONSTRAINT `fk_colaborador_has_equipamentos_colaborador1`
  FOREIGN KEY (`id_colaborador`)
  REFERENCES `db_equatorial`.`colaborador` (`id_colaborador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_colaborador_has_equipamentos_equipamentos1`
  FOREIGN KEY (`id_equipamentos`)
  REFERENCES `db_equatorial`.`equipamentos` (`id_equipamentos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

ALTER TABLE `equipamentos` AUTO_INCREMENT = 1000000;
ALTER TABLE `colaborador` AUTO_INCREMENT = 1000000;

-- -------------------------------------------------------------------------------------------- --
-- Insert Table Holding->Distribuidora->Diretoria->Gerencia Executiva->Area Executiva->Regional --
-- -------------------------------------------------------------------------------------------- --
INSERT INTO `holding`(`nm_holding`) VALUES ('EQUATORIAL');

INSERT INTO `distribuidora`(`id_holding`, `nm_distribuidora`, `sigla`) VALUES (1, 'CELPA', 'CL');
INSERT INTO `distribuidora`(`id_holding`, `nm_distribuidora`, `sigla`) VALUES (1, 'CEMAR', 'CM');

INSERT INTO `diretoria`(`id_distribuidora`, `nm_diretoria`) VALUES (1, 'DIRETORIA 1');
-- INSERT INTO `diretoria`(`id_distribuidora`, `nm_diretoria`) VALUES (2, 'diretoria 2');

INSERT INTO `gerencia_executiva`(`id_diretoria`, `nm_gerencia`) VALUES (1, 'GERÊNCIA 1');
-- INSERT INTO `gerencia_executiva`(`id_diretoria`, `nm_gerencia`) VALUES (1, 'gerencia 2');
-- INSERT INTO `gerencia_executiva`(`id_diretoria`, `nm_gerencia`) VALUES (2, 'gerencia 3');
-- INSERT INTO `gerencia_executiva`(`id_diretoria`, `nm_gerencia`) VALUES (2, 'gerencia 4');

INSERT INTO `area_executiva`(`id_gerencia_executiva`, `nm_area_executiva`) VALUES (1, 'ÁREA 1');
-- INSERT INTO `area_executiva`(`id_gerencia_executiva`, `nm_area_executiva`) VALUES (2, 'area 2');
-- INSERT INTO `area_executiva`(`id_gerencia_executiva`, `nm_area_executiva`) VALUES (3, 'area 3');
-- INSERT INTO `area_executiva`(`id_gerencia_executiva`, `nm_area_executiva`) VALUES (4, 'area 4');

INSERT INTO `regional`(`id_area_executiva`, `nm_regional`, `sigla`) VALUES (1, 'NORTE', 'NT');
INSERT INTO `regional`(`id_area_executiva`, `nm_regional`, `sigla`) VALUES (1, 'SUL', 'SL');
INSERT INTO `regional`(`id_area_executiva`, `nm_regional`, `sigla`) VALUES (1, 'LESTE', 'LE');
INSERT INTO `regional`(`id_area_executiva`, `nm_regional`, `sigla`) VALUES (1, 'OESTE', 'OE');
INSERT INTO `regional`(`id_area_executiva`, `nm_regional`, `sigla`) VALUES (1, 'CENTRO', 'CN');
INSERT INTO `regional`(`id_area_executiva`, `nm_regional`, `sigla`) VALUES (1, 'PINHEIRO', 'PI');

-- INSERT INTO `regional`(`id_area_executiva`, `nm_regional`, `sigla`) VALUES (2, 'NORTE', 'NT2');
-- INSERT INTO `regional`(`id_area_executiva`, `nm_regional`, `sigla`) VALUES (2, 'SUL', 'SL2');
-- INSERT INTO `regional`(`id_area_executiva`, `nm_regional`, `sigla`) VALUES (2, 'LESTE', 'LE2');
-- INSERT INTO `regional`(`id_area_executiva`, `nm_regional`, `sigla`) VALUES (2, 'OESTE', 'OE2');
-- INSERT INTO `regional`(`id_area_executiva`, `nm_regional`, `sigla`) VALUES (2, 'CENTRO', 'CN2');
-- INSERT INTO `regional`(`id_area_executiva`, `nm_regional`, `sigla`) VALUES (2, 'PINHEIRO', 'PI2');
--
-- INSERT INTO `regional`(`id_area_executiva`, `nm_regional`, `sigla`) VALUES (3, 'NORTE', 'NT3');
-- INSERT INTO `regional`(`id_area_executiva`, `nm_regional`, `sigla`) VALUES (3, 'SUL', 'SL3');
-- INSERT INTO `regional`(`id_area_executiva`, `nm_regional`, `sigla`) VALUES (3, 'LESTE', 'LE3');
-- INSERT INTO `regional`(`id_area_executiva`, `nm_regional`, `sigla`) VALUES (3, 'OESTE', 'OE3');
-- INSERT INTO `regional`(`id_area_executiva`, `nm_regional`, `sigla`) VALUES (3, 'CENTRO', 'CN3');
-- INSERT INTO `regional`(`id_area_executiva`, `nm_regional`, `sigla`) VALUES (3, 'PINHEIRO', 'PI3');
--
-- INSERT INTO `regional`(`id_area_executiva`, `nm_regional`, `sigla`) VALUES (4, 'NORTE', 'NT4');
-- INSERT INTO `regional`(`id_area_executiva`, `nm_regional`, `sigla`) VALUES (4, 'SUL', 'SL4');
-- INSERT INTO `regional`(`id_area_executiva`, `nm_regional`, `sigla`) VALUES (4, 'LESTE', 'LE4');
-- INSERT INTO `regional`(`id_area_executiva`, `nm_regional`, `sigla`) VALUES (4, 'OESTE', 'OE4');
-- INSERT INTO `regional`(`id_area_executiva`, `nm_regional`, `sigla`) VALUES (4, 'CENTRO', 'CN4');
-- INSERT INTO `regional`(`id_area_executiva`, `nm_regional`, `sigla`) VALUES (4, 'PINHEIRO', 'PI4');


-- ---------------------- --
-- Insert Table Atividades
-- ---------------------- --
INSERT INTO `atividades`(`descricao`, `sigla`) VALUES ('TRANSFORMAÇÃO', 'TF');
INSERT INTO `atividades`(`descricao`, `sigla`) VALUES ('GERAÇÃO', 'GE');
INSERT INTO `atividades`(`descricao`, `sigla`) VALUES ('PODA', 'PO');
INSERT INTO `atividades`(`descricao`, `sigla`) VALUES ('CORTE E RELIGA', 'CR');
INSERT INTO `atividades`(`descricao`, `sigla`) VALUES ('PLANTÃO', 'PL');

-- ---------------------- --
-- Insert Table Veiculos
-- ---------------------- --
INSERT INTO `veiculo` (`placa`, `tpo_veiculo`) values ('JUR-8387' ,1);
INSERT INTO `veiculo` (`placa`, `tpo_veiculo`) values ('DBZ-1983' ,0);

-- ---------------------- --
-- Insert Table Colaborador + Usuário
-- ---------------------- --

INSERT INTO `colaborador` (`id_distribuidora`,`id_diretoria`,`id_gerencia_executiva`,`id_area_executiva`,`id_regional`,`nm_colaborador`,`cpf_colaborador`,`matricula`) VALUES (1,1,1,1,1,'Colaborador Administrativo', '12312312312','COLAB182634');
INSERT INTO `usuario` (`id_colaborador`,`tp_user`,`pswd`) VALUES (1000000,0,'admin123');