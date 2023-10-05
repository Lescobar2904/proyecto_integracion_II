CREATE TABLE `trabajador` (
  `rut` INT(10),
  `nombre` Varchar(25),
  `apellido` Varchar(25),
  `sueldo` INT(10),
  `salud` Varchar(10),
  `cargo` Varchar(15),
  `correo` Varchar(50),
  `telefono` INT(15),
  PRIMARY KEY (`rut`)
);

CREATE TABLE `asistencias` (
  `id` INT(6),
  `rut` INT(10),
  `Fecha` date,
  `codigo_barra` INT(15),
  `` <type>,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`rut`) REFERENCES `trabajador`(`rut`)
);

CREATE TABLE `consultas` (
  `id` INT(6),
  `rut` INT(10),
  `email` Varchar(),
  `cansulta` Varchar(300),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`rut`) REFERENCES `trabajador`(`rut`)
);

CREATE TABLE `usuarios` (
  `id` INT(6),
  `rut` INT(10),
  `usuario` Varchar(25),
  `clave` Varchar(30),
  `Nombre_Completo` Varchar(50),
  PRIMARY KEY (`id`)
);

