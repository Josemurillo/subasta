DROP TABLE IF EXISTS subasta;
CREATE TABLE `subasta` (
	`guid` INT(10) NOT NULL,
	`race` TINYINT(3) NOT NULL,
	`class` TINYINT(3) NOT NULL,
	`cantidad_ini` INT(11) NOT NULL,
	`cantidad_actu` INT(11) NOT NULL,
	`cantidad_max` INT(11) NOT NULL,
	`tiempo_fin` TIMESTAMP NULL,
	`recibido` TINYINT(11) NULL DEFAULT NULL,
	`finalizado` TINYINT(11) NULL DEFAULT NULL,
	`cuenta_win` INT NULL DEFAULT NULL,
	PRIMARY KEY (`guid`)
)
COLLATE='latin1_swedish_ci'
ENGINE=MyISAM;

CREATE TABLE `subastalog` (
	`acc` INT(10) NULL DEFAULT NULL,
	`pj_sub` INT(10) NULL DEFAULT NULL,
	`cantidad` INT(10) NULL DEFAULT NULL,
	PRIMARY KEY (`acc`, `pj_sub`)
)
COLLATE='latin1_swedish_ci'
ENGINE=MyISAM;