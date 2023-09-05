CREATE DATABASE IF NOT EXISTS consesionario;
USE consesionario;

CREATE TABLE  coches(
    id          int(10) auto_increment not null,
    modelo      varchar(100) not null,
    marca       varchar(50),
    precio      int(255) not null,
    stock       int(255) not null,
    CONSTRAINT pk_coches PRIMARY KEY(id)
)ENGINE=InnoDB;

CREATE TABLE grupos(
    id          int(10) auto_increment not null,
    nombre      varchar(100) not null,
    ciudad      varchar(100),
    CONSTRAINT pk_grupos PRIMARY KEY(id)
)ENGINE=InnoDB;

CREATE TABLE vendedores(
    id          int(10) AUTO_INCREMENT NOT NULL,
    grupo_id    int(10) NOT NULL,
    jefe        INT(10),
    nombre      VARCHAR(100) NOT NULL,
    apellidos   VARCHAR(150),
    cargo       VARCHAR(50),
    fecha       DATE,
    sueldo      FLOAT(20,2),
    comision    FLOAT(10,2),
    CONSTRAINT pk_vendedores PRIMARY KEY(id),
    CONSTRAINT fk_vendedor_grupo FOREIGN KEY(grupo_id) REFERENCES grupos(id),
    CONSTRAINT fk_vendedor_jefe FOREIGN KEY REFERENCES venddores(id)
)ENGINE=InnoDB;

CREATE TABLE clientes(
    id          int(10) AUTO_INCREMENT NOT NULL,
    vendedor_id int(10),
    nombre      VARCHAR(150)NOT NULL,
    ciudad      VARCHAR(100),
    gastado     FLOAT(50,2),
    CONSTRAINT pk_clientes PRIMARY KEY(id),
    CONSTRAINT fk_clientes_vendedor FOREIGN KEY(vendedor_id) REFERENCES vendedores(id)
)ENGINE=InnoDB;

CREATE TABLE encargos(
    id          int(10) AUTO_INCREMENT NOT NULL,
    cliente_id  int(10) NOT NULL,
    coche_id    int(10) NOT NULL,
    cantidad    int(100),
    fecha       date,
    CONSTRAINT pk_encargos PRIMARY KEY(id),
    CONSTRAINT fk_encargos_cliente FOREIGN KEY(cliente_id) REFERENCES clientes(id),
    CONSTRAINT fk_encargo_coche FOREIGN KEY(coche_id) REFERENCES coches(id)
)ENGINE=InnoDB;