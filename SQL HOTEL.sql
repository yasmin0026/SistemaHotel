CREATE DATABASE bd_hotelero;
use bd_hotelero;

create table tbl_rol(
	id_rol int not null primary key auto_increment,
	nombre_rol varchar(100) not null,
	crear char(2) NOT NULL,
	actualizar char(2) NOT NULL,
	eliminar char(2) NOT NULL
);

create table tbl_usuario(
	id_usuario int not null primary key auto_increment,
	nombres_usuario varchar(200)not null,
	apellido_usuario varchar(200) not null,
	nick_usuario varchar(200) not null,
	contrasena_usuario varchar(200) not null,
	id_rol int not null,
	recovery_pregunta varchar(100) not null,
	recovery_respuesta varchar(100) not null
);

create table tbl_modulos(
	id_modulo int not null primary key auto_increment,
    nombre_modulo varchar(200),
    url_modulo varchar(200),
    tipo int
);

create table menu_rol_modulo(
	id_menu int not null primary key auto_increment,
    id_rol int not null,
    id_modulo int not null
);


create table tbl_categoria(
	id_categoria int not null primary key auto_increment,
	tipo_habitacion varchar(100) not null
);

create table tbl_niveles(
	id_nivel int not null primary key auto_increment,
	nombre_nivel varchar(100) not null
);

create table tbl_tipo_estado(
	id_tipo_estado int not null primary key auto_increment, 
	estado_habitacion varchar(100) not null
);

create table tbl_habitacion(
	id_habitacion int not null primary key auto_increment,
	nombre_habitacion varchar(100) not null,
	id_categoria int not null,
	id_nivel int not null,
	id_tipo_estado int not null,
	precio_habitacion float not null,
	detalle_habitacion text not null
);

create table tbl_estado_reserva(
	id_estado_reserva int not null primary key auto_increment,
    estado_reserva  varchar(100) not null
);

create table tbl_estado_pago(
	id_estado_pago int not null primary key auto_increment,
    estado_pago varchar(100) not null
);

create table tbl_reserva(
	id int not null primary key auto_increment,
	id_habitacion int not null,
    title varchar(500) not null,
    color varchar(300) not null,
	start datetime not null, /*----fecha_inicio--*/
	end datetime not null, /*----fecha_final--*/
	id_estado_reserva int not null,
	nombre_cliente varchar(200) not null,
	id_estado_pago int not null
);

create table tbl_reserva_eliminada(
	id int not null primary key auto_increment,
	id_habitacion int not null,
    title varchar(500) not null,
    color varchar(300) not null,
	start datetime not null, /*----fecha_inicio--*/
	end datetime not null, /*----fecha_final--*/
	id_estado_reserva int not null,
	nombre_cliente varchar(200) not null,
	id_estado_pago int not null
);

create table tbl_tipo_documento(
	id_tipo_documento int not null primary key auto_increment,
    tipo_documento varchar(200) not null
);

create table tbl_cliente(
	id_cliente int not null primary key auto_increment,
    nombres_cliente varchar(600) not null,
    id_tipo_documento int not null,
    documento varchar(100) null,
    telefono_cliente int null
   
);

create table tbl_alojamiento(
  id_alojamiento int not null primary key auto_increment,
  id_cliente int not null,
  id_habitacion int not null,
  tarifa varchar(200) not null,
  fecha_entrada date not null,
  fecha_salida date null,
  precio_alojamiento float
);

create table tbl_personalizar(
	id_personalizar int not null primary key auto_increment,
	nombre_sistema varchar(200),
    color_sistema varchar(200),
    imagen_logo varchar(300)
);


create table tbl_imprevisto(
	id_imprevisto int not null primary key auto_increment,
	tipo_imprevisto varchar(200) not null,
	id_habitacion int not null,
    fecha_imprevisto date,
	descripcion text null,
	compensacion text null
);


/*------------------------------------------- LLAVES --------------------------------------------------------*/
ALTER TABLE tbl_usuario ADD FOREIGN KEY(id_rol) REFERENCES tbl_rol(id_rol) ON UPDATE CASCADE;


ALTER TABLE tbl_habitacion ADD FOREIGN KEY(id_categoria) references tbl_categoria(id_categoria)  ON UPDATE CASCADE;
ALTER TABLE tbl_habitacion ADD FOREIGN KEY(id_nivel) references tbl_niveles(id_nivel)  ON UPDATE CASCADE;
ALTER TABLE tbl_habitacion ADD FOREIGN KEY(id_tipo_estado) references tbl_tipo_estado(id_tipo_estado)  ON UPDATE CASCADE; 

 
ALTER TABLE tbl_reserva ADD FOREIGN KEY(id_habitacion) references tbl_habitacion(id_habitacion) ON UPDATE CASCADE; 
ALTER TABLE tbl_reserva ADD FOREIGN KEY(id_estado_reserva) references tbl_estado_reserva(id_estado_reserva)  ON UPDATE CASCADE;
ALTER TABLE tbl_reserva ADD FOREIGN KEY(id_estado_pago) references tbl_estado_pago(id_estado_pago)  ON UPDATE CASCADE;


ALTER TABLE tbl_cliente ADD FOREIGN KEY (id_tipo_documento) references tbl_tipo_documento(id_tipo_documento) ON UPDATE CASCADE;


ALTER TABLE tbl_alojamiento ADD FOREIGN KEY (id_cliente) references tbl_cliente(id_cliente) ON UPDATE CASCADE;
ALTER TABLE tbl_alojamiento ADD FOREIGN KEY (id_habitacion) references tbl_habitacion(id_habitacion) ON UPDATE CASCADE;


ALTER TABLE menu_rol_modulo ADD FOREIGN KEY (id_modulo) references tbl_modulos(id_modulo) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE menu_rol_modulo ADD FOREIGN KEY (id_rol) references tbl_rol(id_rol) ON UPDATE CASCADE ON DELETE CASCADE;


/*-------------------------------------- INSERT --------------------------------------------------*/
insert into tbl_rol values(1, 'root', 'si', 'si','si');
insert into tbl_rol values(2, 'administador', 'si', 'si','si');


insert into tbl_usuario values (1, 'root','root','root','123',1, 'root', 'root');
insert into tbl_usuario values (2, 'admin','admin','admin','123',2, 'admin', 'admin');


insert into tbl_estado_pago values(1, 'Pendiente');
insert into tbl_estado_pago values(2, '50%');
insert into tbl_estado_pago values(3, 'Cancelado');


insert into tbl_estado_reserva values(1,'Ocupado');
insert into tbl_estado_reserva values(2,'Disponible');


insert into tbl_personalizar values(1,'Sistema Hotelero', 'rgba(9,20,56,1)','2.jpg');

SELECT * FROM tbl_rol;
SELECT * FROM tbl_usuario;
SELECT * FROM tbl_reserva;


INSERT INTO tbl_modulos VALUES(1,'Reserva','LoginController/index', 1);
INSERT INTO tbl_modulos VALUES(2,'Recepcion','RecepcionController/index', 1);
INSERT INTO tbl_modulos VALUES(3,'Tipo de documento','DocumentoController/index', 1);


/*--------------------------- DROP DOWN HABITACIONES -----------------------------*/

INSERT INTO tbl_modulos VALUES(4,'Estado de Habitación','EstadoController/index', 2);
INSERT INTO tbl_modulos VALUES(5,'Habitaciones','HabitacionesController/index', 2);
INSERT INTO tbl_modulos VALUES(6,'Categorias','CategoriasController/index', 2);
INSERT INTO tbl_modulos VALUES(7,'Ubicacion','NivelesController/index', 2);
INSERT INTO tbl_modulos VALUES(8,'Imprevistos','ImprevistoController//index', 2);
INSERT INTO tbl_modulos VALUES(9,'Estado pago','EstadoPagoController/index', 2);
INSERT INTO tbl_modulos VALUES(10,'Estado reserva','EstadoReservaController/index', 2);

/*--------------------------- DROP DOWN CONFIGURACIÓN -----------------------------*/
INSERT INTO tbl_modulos VALUES(11,'Usuarios y Roles','UsuarioController/index', 3);
INSERT INTO tbl_modulos VALUES(12,'Personalizar Página','PersonalizarPage', 3);
INSERT INTO tbl_modulos VALUES(13,'Asignar Permisos','PermisosController/index', 3);
INSERT INTO tbl_modulos VALUES(14,'Reportes','ReportesController/index', 3);
INSERT INTO tbl_modulos VALUES(15,'Mi Cuenta','ReportesController/index', 3);

SELECT * FROM tbl_modulos;


/*-------------------------------------- -------------------------------------------------------*/


delete from tbl_reserva where id = 3;

/*------------------------------------------------- TRIGGER ---------------------------------------*/
drop trigger tg_reservas_eliminadas;

delimiter //
create trigger tg_reservas_eliminadas
before delete on tbl_reserva
for each row
BEGIN
	insert into tbl_reserva_eliminada (id,id_habitacion,title,color,start, end, id_estado_reserva,nombre_cliente,id_estado_pago) 
    values (old.id,old.id_habitacion,old.title,color,old.start, old.end, old.id_estado_reserva,old.nombre_cliente,old.id_estado_pago);

END //
delimiter ;
