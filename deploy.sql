-- Crear la base de datos

CREATE DATABASE intelcost_bienes;

-- Usar la Base de datos creada:

USE intelcost_bienes;

-- Crear la tabla ciudades:

CREATE TABLE ciudades (
  id_ciudad INT AUTO_INCREMENT PRIMARY KEY,
  ciudad VARCHAR (255) NOT NULL
);

-- Crear la tabla tipos:

CREATE TABLE tipos (
  id_tipo INT AUTO_INCREMENT PRIMARY KEY,
  tipo VARCHAR (255) NOT NULL
);

-- Crear la tabla bienes:

CREATE TABLE bienes (
  id_bien INT AUTO_INCREMENT PRIMARY KEY,
  id_ciudad INT NOT NULL,
  id_tipo INT NOT NULL,
  direccion VARCHAR (255) NOT NULL,
  telefono VARCHAR (20) NOT NULL,
  codigo_postal VARCHAR (20) NOT NULL,
  precio VARCHAR (50) NOT NULL,
  FOREIGN KEY (id_ciudad) REFERENCES ciudades(id_ciudad),
  FOREIGN KEY (id_tipo) REFERENCES tipos(id_tipo)
);

-- Insertar las ciudades:

INSERT INTO ciudades
    (ciudad)
VALUES
    ('New York');

INSERT INTO ciudades
    (ciudad)
VALUES
    ('Orlando');

INSERT INTO ciudades
    (ciudad)
VALUES
    ('Los Angeles');

INSERT INTO ciudades
    (ciudad)
VALUES
    ('Houston');

INSERT INTO ciudades
    (ciudad)
VALUES
    ('Washington');

INSERT INTO ciudades
    (ciudad)
VALUES
    ('Miami');


-- Insertar los tipos de bienes:

INSERT INTO tipos
    (tipo)
VALUES
    ('Casa');

INSERT INTO tipos
    (tipo)
VALUES
    ('Casa de Campo');

INSERT INTO tipos
    (tipo)
VALUES
    ('Apartamento');
