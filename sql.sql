-- curso de PHP
-- creación de BD --

CREATE TABLE 	usuarios(
id			int(255) auto_increment not null,
nombre		varchar(100) not null,
apellidos	varchar(100) not null,
email		varchar(255) not null,
password	varchar(255) not null,
fecha		date  not null,
CONSTRAINT pk_usuarios PRIMARY KEY(id)
CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;

CREATE TABLE 	categorias(
id			int(255) auto_increment not null,
nombre		varchar(100),
CONSTRAINT pk_categorias PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE 	ENTRADAS(
id				int(255) auto_increment not null,
usuario_id		int(255) not null,
categoria_id	int(255) not null,
titulo			varchar(255) not null,
descripcion		MEDIUMTEXT,
fecha			DATE NOT null,
CONSTRAINT pk_entradas PRIMARY KEY(ID),
CONSTRAINT fk_entrada_usuarios FOREIGN KEY(usuario_id) REFERENCES usuarios(id),
CONSTRAINT fk_entradas_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id) ON DELETE SET NULL 
)ENGINE=InnoDb;

