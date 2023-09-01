-- Para Postgres --

CREATE TABLE coches(
	id		serial not null,
	modelo	VARCHAR(100) not null,
	marca	varchar(50),
	precio	integer not null,
	stock 	integer not null,
	CONSTRAINT pk_coches PRIMARY KEY(id)
);

CREATE TABLE grupos(
	id		serial not null,
	nombre	varchaR(100) not null,
	ciudad	varchar(100),
	CONSTRAINT pk_grupos PRIMARY KEY(id)
);

CREATE TABLE vendedores(
	id			serial not null,
	grupo_id	integer not null,
	jefe		integer,
	nombre		varchar(100) not null,
	apellidos	varchar(150),
	cargo		varchar(50),
	fecha		date,
	sueldo		float,
	comision	float,
	CONSTRAINT pk_vendedores PRIMARY KEY(id),
	CONSTRAINT pk_vendedor_grupo FOREIGN KEY(grupo_id) REFERENCES grupos(id),
	CONSTRAINT fk_vendedor_jefe FOREIGN KEY(jefe) REFERENCES vendedores(id)
);

CREATE TABLE clientes(
	id			serial not null,
	vendedor_id	integer,
	nombre		varchar(150) not null,
	ciudad		varchar(100),
	gastado		float,
	fecha		date,
	CONSTRAINT pk_clientes PRIMARY KEY(id),
	CONSTRAINT fk_clientes_vendedor FOREIGN KEY(vendedor_id) REFERENCES vendedores(id)
);

CREATE TABLE encargos(
	id			serial not null,
	cliente_id	integer not null,
	coches_id	integer not null,
	cantidad	integer not null,
	fecha		date,
	CONSTRAINT pk_encargos PRIMARY KEY(id),
	CONSTRAINT fk_encargo_clientes FOREIGN KEY(cliente_id) REFERENCES clientes(id),
	CONSTRAINT fk_encargo_coche FOREIGN KEY(coches_id) REFERENCES coches(id)
);



-- Ingresa datos coches --

INSERT INTO coches (modelo, marca, precio, stock) values ('Renaul Clio', 'Renault', 12000, 13);
INSERT INTO coches (modelo, marca, precio, stock) values ('Seat panda', 'Seat', 10000, 10);
INSERT INTO coches (modelo, marca, precio, stock) values ('Mercedes Ranchera', 'Mercedez Benz', 32000, 24);
INSERT INTO coches (modelo, marca, precio, stock) values ('Porche Cayene', 'Porche', 6500, 5);
INSERT INTO coches (modelo, marca, precio, stock) values ('Lambo Aventador', 'Lamborgini', 17000, 2);
INSERT INTO coches (modelo, marca, precio, stock) values ('Ferrari Spider', 'Ferrari', 24500, 80);

-- Ingresa datos grupos --
INSERT INTO grupos (nombre, ciudad) values ('Vendedores A', 'Madrid');
INSERT INTO grupos (nombre, ciudad) values ('Vendedores B', 'Madrid');
INSERT INTO grupos (nombre, ciudad) values ('Directores mecanicos', 'Madrid');
INSERT INTO grupos (nombre, ciudad) values ('Vendedores A', 'Barcelona');
INSERT INTO grupos (nombre, ciudad) values ('Vendedores B', 'Barcelona');
INSERT INTO grupos (nombre, ciudad) values ('Vendedores C', 'Valencia');
INSERT INTO grupos (nombre, ciudad) values ('Vendedores A', 'Bilbao');
INSERT INTO grupos (nombre, ciudad) values ('Vendedores B', 'Panplona');
INSERT INTO grupos (nombre, ciudad) values ('Vendedores C', 'Santiago de Compostela');

-- Ingresa datos vendedores --
INSERT INTO vendedores (grupo_id, jefe, nombre,apellidos,cargo,fecha,sueldo,comision) values (1, NULL, 'David', 'Lopez','Responsable de tienda', current_date,30000,4);
INSERT INTO vendedores (grupo_id, jefe, nombre,apellidos,cargo,fecha,sueldo,comision) values (1, 1, 'Fran', 'Martinez','Ayudante de tienda', current_date,23000,2);
INSERT INTO vendedores (grupo_id, jefe, nombre,apellidos,cargo,fecha,sueldo,comision) values (2, NULL, 'Nelson', 'Sanchez','Responsable de tienda', current_date,38000,5);
INSERT INTO vendedores (grupo_id, jefe, nombre,apellidos,cargo,fecha,sueldo,comision) values (2, 3, 'Jesus', 'Lopez','Ayudante de tienda', current_date,12000,6);
INSERT INTO vendedores (grupo_id, jefe, nombre,apellidos,cargo,fecha,sueldo,comision) values (3, NULL, 'Victor', 'Lopez','Mecanico jefe', current_date,50000,2);
INSERT INTO vendedores (grupo_id, jefe, nombre,apellidos,cargo,fecha,sueldo,comision) values (4, NULL, 'Antonio', 'Lopez','Vendedor de recambios', current_date,13000,8);
INSERT INTO vendedores (grupo_id, jefe, nombre,apellidos,cargo,fecha,sueldo,comision) values (5, NULL, 'Salvador', 'Lopez','Vendedor experto', current_date,60000,2);
INSERT INTO vendedores (grupo_id, jefe, nombre,apellidos,cargo,fecha,sueldo,comision) values (6, NULL, 'Joaquin', 'Lopez','Ejecutivo de cuentas', current_date,80000,1);
INSERT INTO vendedores (grupo_id, jefe, nombre,apellidos,cargo,fecha,sueldo,comision) values (6, 8, 'Luis', 'Lopez','Ayudante de tienda', current_date,10000,10);

-- Ingresa datos clientes --
INSERT INTO clientes (vendedor_id,nombre, ciudad, gastado, fecha) values (1,'Construcciones Diaz Inc.', 'Alcobendas',24000, current_date);
INSERT INTO clientes (vendedor_id,nombre, ciudad, gastado, fecha) values (1,'Fruteria Antonia Inc.', 'Fuenlabrada',40000, current_date);
INSERT INTO clientes (vendedor_id,nombre, ciudad, gastado, fecha) values (1,'Imprenta Martinez Inc.', 'Barcelona',32000, current_date);
INSERT INTO clientes (vendedor_id,nombre, ciudad, gastado, fecha) values (1,'Jesus Colchones Inc.', 'El Prat',96000, current_date);
INSERT INTO clientes (vendedor_id,nombre, ciudad, gastado, fecha) values (1,'Bar Pepe Diaz Inc.', 'Valencia',170000, current_date);
INSERT INTO clientes (vendedor_id,nombre, ciudad, gastado, fecha) values (1,'Tienda PC Inc.', 'Murcia',245000, current_date);



-- Ingresa datos encargos --
INSERT INTO encargos (cliente_id, coches_id, cantidad, fecha) values (1, 1, 2, current_date);
INSERT INTO encargos (cliente_id, coches_id, cantidad, fecha) values (2, 2, 4, current_date);
INSERT INTO encargos (cliente_id, coches_id, cantidad, fecha) values (3, 3, 1, current_date);
INSERT INTO encargos (cliente_id, coches_id, cantidad, fecha) values (4, 3, 3, current_date);
INSERT INTO encargos (cliente_id, coches_id, cantidad, fecha) values (5, 5, 1, current_date);
INSERT INTO encargos (cliente_id, coches_id, cantidad, fecha) values (6, 6, 1, current_date);