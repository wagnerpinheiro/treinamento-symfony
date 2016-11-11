
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- departamentos
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `departamentos`;


CREATE TABLE `departamentos`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`departamento` VARCHAR(60),
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- funcionarios
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `funcionarios`;


CREATE TABLE `funcionarios`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(120),
	`email` VARCHAR(120),
	`departamento_id` INTEGER(11),
	`nascimento` DATE,
	PRIMARY KEY (`id`),
	KEY `departamento_id`(`departamento_id`),
	CONSTRAINT `funcionarios_FK_1`
		FOREIGN KEY (`departamento_id`)
		REFERENCES `departamentos` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
