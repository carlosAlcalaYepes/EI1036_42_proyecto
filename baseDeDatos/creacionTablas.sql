CREATE TABLE cliente (
   id_cliente SERIAL NOT NULL,
   nombre varchar(25)  NOT NULL,
   apellidos varchar(25)  NOT NULL,
   direccion varchar(50)  NOT NULL,
   ciudad varchar(25)  NOT NULL,
   foto_file varchar(25)  NOT NULL,
   zip_code varchar(25)  NOT NULL,
   rol varchar(25)  NOT NULL,
   contraseña varchar(25)  NOT NULL,
   CONSTRAINT cliente_pk PRIMARY KEY (id_cliente)
);

CREATE TABLE Producto (
   id_producto SERIAL  NOT NULL,
   nombre varchar(25)  NOT NULL,
   imagen varchar(256)  NOT NULL,
   CONSTRAINT Producto_pk PRIMARY KEY (id_producto)
);

CREATE TABLE compra (
   id_compra SERIAL  NOT NULL,
   fecha date  NOT NULL,
   id_cliente int  NOT NULL,
   id_producto int  NOT NULL,
   CONSTRAINT compra_pk PRIMARY KEY (id_compra)
);

ALTER TABLE compra ADD CONSTRAINT compra_cliente
   FOREIGN KEY (id_cliente)
   REFERENCES cliente (id_cliente)
   ON DELETE  RESTRICT 
   ON UPDATE  CASCADE 
   NOT DEFERRABLE 
   INITIALLY IMMEDIATE
;

ALTER TABLE compra ADD CONSTRAINT compra_Producto
   FOREIGN KEY (id_producto)
   REFERENCES Producto (id_producto)
   ON DELETE  RESTRICT 
   ON UPDATE  CASCADE 
   NOT DEFERRABLE 
   INITIALLY IMMEDIATE
;

INSERT INTO cliente(nombre,apellidos,direccion, ciudad, foto_file, zip_code,rol, contraseña)  Values('carlos','alcala yepes','calle 3', 'castellon', 'url' , 'url', 'normal', '123');
INSERT INTO cliente(nombre,apellidos,direccion, ciudad, foto_file, zip_code,rol, contraseña)  Values('maria jesus','prior bruno','calle 3', 'castellon', 'url' , 'url', 'administrador', 'admin');
INSERT INTO producto(nombre,imagen) Values('manzana 1kg','url');
INSERT INTO compra(fecha, id_cliente, id_producto)  Values('2020-10-26',1,1);



