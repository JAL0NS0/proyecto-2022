CREATE TABLE Select_input(
	nombre_select varchar(20),
	orden int,
	obligatorio bit not null,
	Producto_id int not null,
	selector_nombre varchar(20),
	Primary Key(nombre_select),
	Foreign key(selector_nombre) references Tipo_input,
	Foreign key(Producto_Id) references Producto(Producto_id)
);

CREATE TABLE Producto(
	id int not null identity(1,1),
	Nombre varchar(50),
	Descripcion varchar(100),
	Precio_base decimal(10,2),
	Primary key (id)
);


CREATE TABLE `selector` (
  `nombre` varchar(30) NOT NULL,
  `Orden` int NOT NULL,
  `Obligatorio` tinyint NOT NULL,
  `Producto_id` int NOT NULL,
  `input_type` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`nombre`,`Producto_id`),
  KEY `Producto_id_idx` (`Producto_id`),
  KEY `Select_name_idx` (`input_type`),
  CONSTRAINT `Producto_id` FOREIGN KEY (`Producto_id`) REFERENCES `producto` (`id`) ON DELETE CASCADE,
  CONSTRAINT `Select_name` FOREIGN KEY (`input_type`) REFERENCES `tipo_input` (`tecnico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `producto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `Costo_base` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Nombre_UNIQUE` (`Nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `selector` (
  `nombre` varchar(30) NOT NULL,
  `Orden` int,
  `Producto_id` int NOT NULL,
  `input_type` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`nombre`,`Producto_id`),
  FOREIGN KEY (`Producto_id`) REFERENCES `producto` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`input_type`) REFERENCES `tipo_input` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `tipo_input` (
  `tecnico` varchar(30) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`tecnico`),
  UNIQUE KEY `tecnico_UNIQUE` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `valor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripción` varchar(45) NOT NULL,
  `costo` decimal(8,2) DEFAULT NULL,
  `producto` int NOT NULL,
  `nombre_selector` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`producto`) REFERENCES `selector` (`Producto_id`) ON DELETE CASCADE,
  FOREIGN KEY (`nombre_selector`) REFERENCES `selector` (`nombre`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



Insert into Producto(Nombre,Descripcion,Precio_base) 
values ('Zapatos','Los zapatos mas facheros facheritos', 200.50);


INSERT INTO `prototipo`.`tipo_input`(`Nombre`,`tecnico`)
VALUES('Radio Button','radio');

INSERT INTO `prototipo`.`selector`(`nombre`,`Orden`,`Obligatorio`,`Producto_id`,`input_type`)
VALUES(<{nombre: }>,<{Orden: }>,<{Obligatorio: }>,<{Producto_id: }>,<{input_type: }>);

INSERT INTO `prototipo`.`valor`(`id`,`descripción`,`costo`,`producto`,`type`)
VALUES(<{id: }>,<{descripción: }>,<{costo: }>,<{producto: }>,<{type: }>);