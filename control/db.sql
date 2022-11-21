CREATE TABLE `opcion` (
  `codigo` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `costo` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`nombre`,`codigo`),
  KEY `codigo` (`codigo`),
  CONSTRAINT `opcion_ibfk_1` FOREIGN KEY (`codigo`) REFERENCES `selector` (`codigo`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `selector` (
  `productoid` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipo_selector` int DEFAULT NULL,
  `codigo` int NOT NULL AUTO_INCREMENT,
  `tipo_valor` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`nombre`,`productoid`),
  UNIQUE KEY `codigo_UNIQUE` (`codigo`),
  KEY `selector_ibfk_2` (`productoid`),
  CONSTRAINT `selector_ibfk_1` FOREIGN KEY (`nombre`) REFERENCES `caracteristica` (`nombre`) ON DELETE CASCADE,
  CONSTRAINT `selector_ibfk_2` FOREIGN KEY (`productoid`) REFERENCES `caracteristica` (`productoid`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `caracteristica` (
  `productoid` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`nombre`,`productoid`),
  KEY `productoid` (`productoid`),
  CONSTRAINT `caracteristica_ibfk_1` FOREIGN KEY (`productoid`) REFERENCES `producto` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `texto` (
  `productoid` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `costo_letra` decimal(8,2) DEFAULT NULL,
  `maximo` int DEFAULT NULL,
  `minimo` int DEFAULT NULL,
  `separacion` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
























CREATE TABLE `opcion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `costo` decimal(8,2) DEFAULT NULL,
  `selectorid` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `selector` (
  `id` int NOT NULL,
  `tipo_selector` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
