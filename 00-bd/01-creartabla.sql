CREATE TABLE `tareas`(
	`id` INT UNSIGNED AUTO_INCREMENT
	,`tarea` VARCHAR(500)
	,`estado` TINYINT UNSIGNED DEFAULT 0
	,`prioridad` TINYINT UNSIGNED DEFAULT 0
    ,PRIMARY KEY (`id`)
);
