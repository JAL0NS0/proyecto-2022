CREATE TABLE `empleado` (
  `email` varchar(50) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `contrasena` varchar(32) DEFAULT NULL,
  `cargo` int DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `categoria` (
  `nombre` varchar(50) NOT NULL,
  `num_productos` int DEFAULT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
VALUES(<{id: }>,<{tipo_selector: }>);


CREATE TABLE `producto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `modificacion` datetime DEFAULT NULL,
  `imagen` varchar(40) DEFAULT NULL,
  `precio_base` decimal(8,2) DEFAULT NULL,
  `solicitudes` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `pertenece` (
  `productoid` int NOT NULL,
  `categoria` varchar(50) NOT NULL,
  PRIMARY KEY (`productoid`,`categoria`),
  KEY `pertenece_ibfk_2` (`categoria`),
  CONSTRAINT `pertenece_ibfk_1` FOREIGN KEY (`productoid`) REFERENCES `producto` (`id`),
  CONSTRAINT `pertenece_ibfk_2` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




CREATE TABLE `caracteristica` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `productoid` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `caracteristica_ibfk_1` (`productoid`),
  CONSTRAINT `caracteristica_ibfk_1` FOREIGN KEY (`productoid`) REFERENCES `producto` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `texto` (
  `id` int NOT NULL,
  `costo` decimal(8,2) DEFAULT NULL,
  `maximo` int DEFAULT NULL,
  `minimo` int DEFAULT NULL,
  `separacion` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `texto_ibfk_1` FOREIGN KEY (`id`) REFERENCES `caracteristica` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `selector` (
  `id` int NOT NULL,
  `tipo_selector` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `selector_ibfk_1` FOREIGN KEY (`id`) REFERENCES `caracteristica` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



CREATE TABLE `opcion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `costo` decimal(8,2) DEFAULT NULL,
  `selectorid` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `opcion_ibfk_1` (`selectorid`),
  CONSTRAINT `opcion_ibfk_1` FOREIGN KEY (`selectorid`) REFERENCES `selector` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `usuario` (
  `email` varchar(50) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `contrasena` varchar(32) DEFAULT NULL,
  `edad` int DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `solicitud` (
  `productoid` int DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `empleado` varchar(50) DEFAULT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `etapa` int DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `punteo` int DEFAULT NULL,
  `detalle` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productoid` (`productoid`),
  KEY `usuario` (`usuario`),
  KEY `empleado` (`empleado`),
  CONSTRAINT `solicitud_ibfk_1` FOREIGN KEY (`productoid`) REFERENCES `producto` (`id`),
  CONSTRAINT `solicitud_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`email`),
  CONSTRAINT `solicitud_ibfk_3` FOREIGN KEY (`empleado`) REFERENCES `empleado` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

