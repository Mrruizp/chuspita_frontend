create database la_chuspita_bd;

create table correlativo
(
	tabla character varying(100) not null,
	numero integer not null,
	constraint pk_correlativo PRIMARY KEY (tabla)
);
               select * from sec_users      
			alter table sec_users 
            add column clave_desencriptada varchar(32);
            alter table sec_users 
            add column estado varchar(1);
            
create table sec_users
(
	login varchar(32),
	pswd varchar(32),
    nombre varchar(64),
    email varchar(64),
    estado varchar(1),
    activation_code varchar(32),
    pri_admin varchar(1),
    clave_desencriptada varchar(32),
	constraint pk_sec_users PRIMARY KEY (login)
);

create table region
(
	cod_region varchar(6) not null,
	descripcion varchar(30) not null,
	constraint pk_region_cod_region PRIMARY KEY (cod_region)
);

create table provincia
(
	cod_provincia varchar(6) not null,
    cod_region varchar(6) not null,
    descripcion varchar(30) not null,
	constraint pk_provincia_cod_provincia PRIMARY KEY (cod_provincia),
    constraint fk_provincia_cod_region foreign key (cod_region) references region(cod_region)
);

create table distrito
(
	cod_distrito varchar(6) not null,
    cod_provincia varchar(6) not null,
    cod_region varchar(6) not null,
    descripcion varchar(30) not null,
	constraint pk_distrito_cod_distrito PRIMARY KEY (cod_distrito),
    constraint fk_distrito_cod_provincia foreign key (cod_provincia) references provincia(cod_provincia)
);

create table cliente
(
 id_cliente int,
 cod_distrito varchar(6),
 cod_provincia varchar(6),
 cod_region varchar(6),
 tipo_cliente char(1),-- 0: natural, 1: jurídica
 tipo_documento varchar(6), -- 1: Carnet de extrangería, 2: DNI, 3: RUC
 nro_documento varchar(11),
 nombre varchar(100),
 nombre_comercial varchar(200),
 telefono_fijo varchar(100),
 telefono_celular varchar(100),
 fecha_nacimiento date,
 direccion varchar(250),
 correo varchar(200),
 id_zona_envio int,
constraint pk_cliente_id_cliente primary key(id_cliente),
constraint fk_cliente_cod_distrito foreign key (cod_distrito) references distrito (cod_distrito)
);


create table horario_entrega
(
 id_horario_entrega int,
 hora_ini datetime(0),
 hora_fin datetime(0),
 cantidad_cliente int,
 estado varchar(20),
constraint pk_horario_entrega_id_horario_entrega primary key(id_horario_entrega)
);

create table forma_pago
(
 id_forma_pago int,
 descripcion varchar(100),
constraint pk_forma_pago_id_forma_pago primary key(id_forma_pago)
);

create table banco
(
 id_banco int,
 descripcion varchar(200),
constraint pk_banco_pago_id_banco primary key(id_banco)
);


create table comprobante_pago
(
 id_comprobante_pago int,
 cliente_proveedor varchar(1),
 fechaemi date,
 serie varchar(4),
 nro_doc varchar(15),
 ruc varchar(11),
 razon_social varchar(200),
 direccion_sunat text,
 tipo_comprobante varchar(2),
 gravado decimal(12,2),
 inafecto decimal(12,2),
 exonerado decimal(12,2),
 subtotal decimal(12,2),
 igv decimal(12,2),
 redondeo decimal(12,2),
 importe_total decimal(12,2),
 observacion text,
 imagenrecibo varchar(100),
 usuario_creacion varchar(100),
 usuario_modificacion varchar(100),
 fecha_creacion datetime(0),
 fecha_modificacion datetime(0),
 fecha_pago datetime(0),
 id_forma_pago int,
 id_banco int,
 nro_movimiento varchar(15),
constraint pk_comprobante_pago_id_comprobante_pago primary key(id_comprobante_pago),
constraint fk_comprobante_pago_id_forma_pago foreign key(id_forma_pago) references forma_pago(id_forma_pago),
constraint fk_comprobante_pago_id_banco foreign key(id_banco) references banco(id_banco)
);

create table pedido 
(
 id_pedido int auto_increment,
 nro_pedido varchar(30),
 id_cliente int,
 fecha_pedido datetime(0),
 fecha_entrega datetime(0),
 cantidad_productos int,
 gravado decimal(12,2),
 inafecto decimal(12,2),
 exonerado decimal(12,2),
 subtotal decimal(12,2),
 igv decimal(12,2),
 redondeo decimal(12,2),
 importe_total decimal(12,2),
 observacion text,
 estado varchar(20),
 usuario_creacion varchar(100),
 usuario_modificacion varchar(100),
 fecha_creacion datetime(0),
 fecha_modificacion datetime(0),
 id_horario_entrega int,
 direccion_entrega varchar(250),
 referencia_entrega varchar(250),
 cod_distrito varchar(6),
 id_comprobante_pago int,
 id_forma_pago int,
 id_banco int,
 tipo_comprobante varchar(2),
 ruc varchar(11),
 razon_social varchar(300),
 direccion_sunat text,
 constraint pk_pedido_id_pedido primary key(id_pedido),
 constraint fk_pedido_id_horario_entrega foreign key(id_horario_entrega) references horario_entrega(id_horario_entrega),
 constraint fk_pedido_id_comprobante_pago foreign key(id_comprobante_pago) references comprobante_pago(id_comprobante_pago),
 constraint fk_pedido_id_forma_pago foreign key(id_forma_pago) references forma_pago(id_forma_pago),
 constraint fk_pedido_id_banco foreign key(id_banco) references banco(id_banco),
constraint fk_pedido_id_cliente foreign key(id_cliente) references cliente(id_cliente)
);

create table al_envase
(
 id_envase int,
 codigo_envase varchar(2),
 descripcion_envase varchar(200),
 descripcion_larga varchar(400),
 estado varchar(20),
constraint pk_al_envase_id_envase primary key(id_envase)
);


create table al_marca
(
 id_marca int,
 codigo_marca varchar(3),
 descripcion_marca varchar(200),
 descripcion_larga varchar(400),
 estado varchar(20),
constraint pk_al_marca_id_marca primary key(id_marca)
);

create table unidad_medida
(
 id_unidad_medida int,
 codigo varchar(200),
 descripcion varchar(400),
constraint pk_unidad_medida_id_unidad_medida primary key(id_unidad_medida)
);

-- ALTER TABLE unidad_medida CHANGE `descripcion_larga` `descripcion` varchar(400);

create table al_tipo
(
 id_tipo int,
 codigo_tipo varchar(2),
 descripcion_tipo varchar(200),
 descripcion_larga varchar(400),
 estado varchar(20),
constraint pk_al_tipo_id_tipo primary key(id_tipo)
);

create table al_categoria
(
 id_categoria int,
 id_tipo int,
 codigo_categoria varchar(2),
 descripcion_categoria varchar(200),
 descripcion_larga varchar(400),
 estado varchar(20),
constraint pk_al_categoria_id_categoria primary key(id_categoria),
constraint fk_al_categoria_id_tipo foreign key(id_tipo) references al_tipo(id_tipo)
);

create table al_seccion
(
id_seccion int auto_increment,
descripcion varchar(50),
constraint pk_al_seccion_id_seccion primary key(id_seccion)
);
alter table al_producto
add column tipo_impuesto varchar(3);

select * from al_producto;

create table al_producto
(
 id_producto int,
 id_categoria int,
 id_tipo int,
 id_marca int,
 id_envase int,
 id_unidad_medida int,
 cod_producto varchar(20),
 cod_producto_sunat varchar(50),
 cod_barra_producto varchar(50),
 descripcion varchar(200),
 contenido varchar(200),
 stock_minimo int,
 stock_actual int,
 perecible int,
 tiempo_reposicion int,
 paraventa varchar(2),
 usuario_ingreso varchar(100),
 fecha_modificacion datetime(0),
 usuario_modificacion varchar(100),
 estado varchar(20),
 id_seccion int,
 constraint pk_al_producto_id_producto primary key(id_producto),
 constraint fk_al_producto_id_categoria foreign key(id_categoria) references al_categoria(id_categoria),
 -- constraint fk_al_producto_id_tipo foreign key(id_tipo) references al_tipo(id_tipo),
 constraint fk_al_producto_id_marca foreign key(id_marca) references al_marca(id_marca),
 constraint fk_al_producto_id_envase foreign key(id_envase) references al_envase(id_envase),
 constraint fk_al_producto_id_unidad_medida foreign key(id_unidad_medida) references unidad_medida(id_unidad_medida),
 constraint fk_al_producto_id_seccion foreign key(id_seccion) references al_seccion(id_seccion)
);

/*
create table al_comprobante_pago
(
 id_comprobante_pago int,
 fechaemi date not null, -- fecha de emisión
 serie varchar(4) not null,
 nro_docu varchar(15), -- se complementa con la serie.
 ruc varchar(11),
 razon_social varchar(200), 
 tipo varchar(2) not null,
 subtotal decimal(12,2),
 gravado decimal(12,2),
 inactivo decimal(12,2),
 exonerado decimal(12,2),
 igv decimal(12,2),
 total decimal(12,2),
 observacion text,
 imagenrecibo varchar(100),
 usuario_creacion varchar(100),
 usuario_modificacion varchar(100),
 fecha_creacion datetime(0),
 fecha_modificacion datetime(0),
constraint pk_al_comprobante_pago_id_comprobante_pago primary key(id_comprobante_pago)
);
*/
create table precio_venta_producto
(
 id_precio_venta_producto int,
 id_producto int,
 precio decimal(12,2),
constraint pk_precio_venta_producto_id_precio_venta_producto primary key(id_precio_venta_producto)
);

drop table al_inventario;
select * from al_inventario;
create table al_inventario
(
 id_inventario int auto_increment,
 id_inventario_deta int,
 id_inventario_padre int,
 id_pedido int,
 id_comprobante_pago int,
 id_producto int,
 id_proveedor int,
 id_precio_venta_producto int,
 id_unidad_medida int,
 cantidad decimal(13,3),
 cantidad_salida decimal(13,3),
 stock_actual int,
 precio_costo decimal(12,2),
 total_costo decimal(12,2),
 estado varchar(20),
 paraventa varchar(2),
 tipo_transaccion char(1),
 nro_guia_remision varchar(25),
 tipo_salida varchar(1),
 precio_venta decimal(13,2),
 total_venta decimal(13,2), 
constraint pk_al_inventario_id_inventario primary key(id_inventario),
constraint fk_al_inventario_id_comprobante_pago foreign key(id_comprobante_pago) references comprobante_pago(id_comprobante_pago),
constraint fk_al_inventario_id_producto foreign key(id_producto) references al_producto(id_producto),
constraint fk_al_inventario_id_precio_venta_producto foreign key(id_precio_venta_producto) references precio_venta_producto(id_precio_venta_producto)
);



select * from al_seccion;

-- ----------------------------
-- Records of al_seccion
-- ----------------------------
INSERT INTO `al_seccion` VALUES ('01', 'LA CASERITA');
INSERT INTO `al_seccion` VALUES ('02', 'LA DULCERA');
INSERT INTO `al_seccion` VALUES ('03', 'LA REPOSTERA');
INSERT INTO `al_seccion` VALUES ('04', 'LIMPIEZA DEL HOGAR');
INSERT INTO `al_seccion` VALUES ('05', 'LIMPIEZA PERSONAL');

-- ----------------------------
-- Records of region
-- ----------------------------
INSERT INTO `region` VALUES ('01', 'AMAZONAS');
INSERT INTO `region` VALUES ('02', 'ANCASH');
INSERT INTO `region` VALUES ('03', 'APURIMAC');
INSERT INTO `region` VALUES ('04', 'AREQUIPA');
INSERT INTO `region` VALUES ('05', 'AYACUCHO');
INSERT INTO `region` VALUES ('06', 'CAJAMARCA');
INSERT INTO `region` VALUES ('07', 'PROV. CONST. DEL CALLAO');
INSERT INTO `region` VALUES ('08', 'CUSCO');
INSERT INTO `region` VALUES ('09', 'HUANCAVELICA');
INSERT INTO `region` VALUES ('10', 'HUANUCO');
INSERT INTO `region` VALUES ('11', 'ICA');
INSERT INTO `region` VALUES ('12', 'JUNIN');
INSERT INTO `region` VALUES ('13', 'LA LIBERTAD');
INSERT INTO `region` VALUES ('14', 'LAMBAYEQUE');
INSERT INTO `region` VALUES ('15', 'LIMA');
INSERT INTO `region` VALUES ('16', 'LORETO');
INSERT INTO `region` VALUES ('17', 'MADRE DE DIOS');
INSERT INTO `region` VALUES ('18', 'MOQUEGUA');
INSERT INTO `region` VALUES ('19', 'PASCO');
INSERT INTO `region` VALUES ('20', 'PIURA');
INSERT INTO `region` VALUES ('21', 'PUNO');
INSERT INTO `region` VALUES ('22', 'SAN MARTIN');
INSERT INTO `region` VALUES ('23', 'TACNA');
INSERT INTO `region` VALUES ('24', 'TUMBES');
INSERT INTO `region` VALUES ('25', 'UCAYALI');

-- ----------------------------
-- Records of provincia
-- ----------------------------
INSERT INTO `provincia` VALUES ('0104', '01', 'CONDORCANQUI');
INSERT INTO `provincia` VALUES ('0105', '01', 'LUYA');
INSERT INTO `provincia` VALUES ('0106', '01', 'RODRÍGUEZ DE MENDOZA');
INSERT INTO `provincia` VALUES ('0107', '01', 'UTCUBAMBA');
INSERT INTO `provincia` VALUES ('0201', '02', 'HUARAZ');
INSERT INTO `provincia` VALUES ('0202', '02', 'AIJA');
INSERT INTO `provincia` VALUES ('0203', '02', 'ANTONIO RAYMONDI');
INSERT INTO `provincia` VALUES ('0204', '02', 'ASUNCIÓN');
INSERT INTO `provincia` VALUES ('0205', '02', 'BOLOGNESI');
INSERT INTO `provincia` VALUES ('0206', '02', 'CARHUAZ');
INSERT INTO `provincia` VALUES ('0207', '02', 'CARLOS F. FITZCARRALD');
INSERT INTO `provincia` VALUES ('0208', '02', 'CASMA');
INSERT INTO `provincia` VALUES ('0209', '02', 'CORONGO');
INSERT INTO `provincia` VALUES ('0210', '02', 'HUARI');
INSERT INTO `provincia` VALUES ('0211', '02', 'HUARMEY');
INSERT INTO `provincia` VALUES ('0212', '02', 'HUAYLAS');
INSERT INTO `provincia` VALUES ('0213', '02', 'MARISCAL LUZURIAGA');
INSERT INTO `provincia` VALUES ('0214', '02', 'OCROS');
INSERT INTO `provincia` VALUES ('0215', '02', 'PALLASCA');
INSERT INTO `provincia` VALUES ('0216', '02', 'POMABAMBA');
INSERT INTO `provincia` VALUES ('0217', '02', 'RECUAY');
INSERT INTO `provincia` VALUES ('0218', '02', 'SANTA');
INSERT INTO `provincia` VALUES ('0219', '02', 'SIHUAS');
INSERT INTO `provincia` VALUES ('0220', '02', 'YUNGAY');
INSERT INTO `provincia` VALUES ('0301', '03', 'ABANCAY');
INSERT INTO `provincia` VALUES ('0302', '03', 'ANDAHUAYLAS');
INSERT INTO `provincia` VALUES ('0303', '03', 'ANTABAMBA');
INSERT INTO `provincia` VALUES ('0304', '03', 'AYMARAES');
INSERT INTO `provincia` VALUES ('0305', '03', 'COTABAMBAS');
INSERT INTO `provincia` VALUES ('0306', '03', 'CHINCHEROS');
INSERT INTO `provincia` VALUES ('0307', '03', 'GRAU');
INSERT INTO `provincia` VALUES ('0401', '04', 'AREQUIPA');
INSERT INTO `provincia` VALUES ('0402', '04', 'CAMANA');
INSERT INTO `provincia` VALUES ('0403', '04', 'CARAVELI');
INSERT INTO `provincia` VALUES ('0404', '04', 'CASTILLA');
INSERT INTO `provincia` VALUES ('0405', '04', 'CAYLLOMA');
INSERT INTO `provincia` VALUES ('0406', '04', 'CONDESUYOS');
INSERT INTO `provincia` VALUES ('0407', '04', 'ISLAY');
INSERT INTO `provincia` VALUES ('0408', '04', 'LA UNION');
INSERT INTO `provincia` VALUES ('0501', '05', 'HUAMANGA');
INSERT INTO `provincia` VALUES ('0502', '05', 'CANGALLO');
INSERT INTO `provincia` VALUES ('0503', '05', 'HUANCA SANCOS');
INSERT INTO `provincia` VALUES ('0504', '05', 'HUANTA');
INSERT INTO `provincia` VALUES ('0505', '05', 'LA MAR');
INSERT INTO `provincia` VALUES ('0506', '05', 'LUCANAS');
INSERT INTO `provincia` VALUES ('0507', '05', 'PARINACOCHAS');
INSERT INTO `provincia` VALUES ('0508', '05', 'PAUCAR DEL SARA SARA');
INSERT INTO `provincia` VALUES ('0509', '05', 'SUCRE');
INSERT INTO `provincia` VALUES ('0510', '05', 'VICTOR FAJARDO');
INSERT INTO `provincia` VALUES ('0511', '05', 'VILCAS HUAMAN');
INSERT INTO `provincia` VALUES ('0601', '06', 'CAJAMARCA');
INSERT INTO `provincia` VALUES ('0602', '06', 'CAJABAMBA');
INSERT INTO `provincia` VALUES ('0603', '06', 'CELENDIN');
INSERT INTO `provincia` VALUES ('0604', '06', 'CHOTA');
INSERT INTO `provincia` VALUES ('0605', '06', 'CONTUMAZA');
INSERT INTO `provincia` VALUES ('0606', '06', 'CUTERVO');
INSERT INTO `provincia` VALUES ('0607', '06', 'HUALGAYOC');
INSERT INTO `provincia` VALUES ('0608', '06', 'JAEN');
INSERT INTO `provincia` VALUES ('0609', '06', 'SAN IGNACIO');
INSERT INTO `provincia` VALUES ('0610', '06', 'SAN MARCOS');
INSERT INTO `provincia` VALUES ('0611', '06', 'SAN MIGUEL');
INSERT INTO `provincia` VALUES ('0612', '06', 'SAN PABLO');
INSERT INTO `provincia` VALUES ('0613', '06', 'SANTA CRUZ');
INSERT INTO `provincia` VALUES ('0701', '07', 'PROV. CONST. DEL CALLAO');
INSERT INTO `provincia` VALUES ('0801', '08', 'CUSCO');
INSERT INTO `provincia` VALUES ('0802', '08', 'ACOMAYO');
INSERT INTO `provincia` VALUES ('0803', '08', 'ANTA');
INSERT INTO `provincia` VALUES ('0804', '08', 'CALCA');
INSERT INTO `provincia` VALUES ('0805', '08', 'CANAS');
INSERT INTO `provincia` VALUES ('0806', '08', 'CANCHIS');
INSERT INTO `provincia` VALUES ('0807', '08', 'CHUMBIVILCAS');
INSERT INTO `provincia` VALUES ('0808', '08', 'ESPINAR');
INSERT INTO `provincia` VALUES ('0809', '08', 'LA CONVENCION');
INSERT INTO `provincia` VALUES ('0810', '08', 'PARURO');
INSERT INTO `provincia` VALUES ('0811', '08', 'PAUCARTAMBO');
INSERT INTO `provincia` VALUES ('0812', '08', 'QUISPICANCHI');
INSERT INTO `provincia` VALUES ('0813', '08', 'URUBAMBA');
INSERT INTO `provincia` VALUES ('0901', '09', 'HUANCAVELICA');
INSERT INTO `provincia` VALUES ('0902', '09', 'ACOBAMBA');
INSERT INTO `provincia` VALUES ('0903', '09', 'ANGARAES');
INSERT INTO `provincia` VALUES ('0904', '09', 'CASTROVIRREYNA');
INSERT INTO `provincia` VALUES ('0905', '09', 'CHURCAMPA');
INSERT INTO `provincia` VALUES ('0906', '09', 'HUAYTARA');
INSERT INTO `provincia` VALUES ('0907', '09', 'TAYACAJA');
INSERT INTO `provincia` VALUES ('1001', '10', 'HUANUCO');
INSERT INTO `provincia` VALUES ('1002', '10', 'AMBO');
INSERT INTO `provincia` VALUES ('1003', '10', 'DOS DE MAYO');
INSERT INTO `provincia` VALUES ('1004', '10', 'HUACAYBAMBA');
INSERT INTO `provincia` VALUES ('1005', '10', 'HUAMALIES');
INSERT INTO `provincia` VALUES ('1006', '10', 'LEONCIO PRADO');
INSERT INTO `provincia` VALUES ('1007', '10', 'MARAÑON');
INSERT INTO `provincia` VALUES ('1008', '10', 'PACHITEA');
INSERT INTO `provincia` VALUES ('1009', '10', 'PUERTO INCA');
INSERT INTO `provincia` VALUES ('1010', '10', 'LAURICOCHA');
INSERT INTO `provincia` VALUES ('1011', '10', 'YAROWILCA');
INSERT INTO `provincia` VALUES ('1101', '11', 'ICA');
INSERT INTO `provincia` VALUES ('1102', '11', 'CHINCHA');
INSERT INTO `provincia` VALUES ('1103', '11', 'NAZCA');
INSERT INTO `provincia` VALUES ('1104', '11', 'PALPA');
INSERT INTO `provincia` VALUES ('1105', '11', 'PISCO');
INSERT INTO `provincia` VALUES ('1201', '12', 'HUANCAYO');
INSERT INTO `provincia` VALUES ('1202', '12', 'CONCEPCION');
INSERT INTO `provincia` VALUES ('1203', '12', 'CHANCHAMAYO');
INSERT INTO `provincia` VALUES ('1204', '12', 'JAUJA');
INSERT INTO `provincia` VALUES ('1205', '12', 'JUNIN');
INSERT INTO `provincia` VALUES ('1206', '12', 'SATIPO');
INSERT INTO `provincia` VALUES ('1207', '12', 'TARMA');
INSERT INTO `provincia` VALUES ('1208', '12', 'YAULI');
INSERT INTO `provincia` VALUES ('1209', '12', 'CHUPACA');
INSERT INTO `provincia` VALUES ('1301', '13', 'TRUJILLO');
INSERT INTO `provincia` VALUES ('1302', '13', 'ASCOPE');
INSERT INTO `provincia` VALUES ('1303', '13', 'BOLIVAR');
INSERT INTO `provincia` VALUES ('1304', '13', 'CHEPEN');
INSERT INTO `provincia` VALUES ('1305', '13', 'JULCAN');
INSERT INTO `provincia` VALUES ('1306', '13', 'OTUZCO');
INSERT INTO `provincia` VALUES ('1307', '13', 'PACASMAYO');
INSERT INTO `provincia` VALUES ('1308', '13', 'PATAZ');
INSERT INTO `provincia` VALUES ('1309', '13', 'SANCHEZ CARRION');
INSERT INTO `provincia` VALUES ('1310', '13', 'SANTIAGO DE CHUCO');
INSERT INTO `provincia` VALUES ('1311', '13', 'GRAN CHIMU');
INSERT INTO `provincia` VALUES ('1312', '13', 'VIRU');
INSERT INTO `provincia` VALUES ('1401', '14', 'CHICLAYO');
INSERT INTO `provincia` VALUES ('1402', '14', 'FERREÑAFE');
INSERT INTO `provincia` VALUES ('1403', '14', 'LAMBAYEQUE');
INSERT INTO `provincia` VALUES ('1501', '15', 'LIMA');
INSERT INTO `provincia` VALUES ('1502', '15', 'BARRANCA');
INSERT INTO `provincia` VALUES ('1503', '15', 'CAJATAMBO');
INSERT INTO `provincia` VALUES ('1504', '15', 'CANTA');
INSERT INTO `provincia` VALUES ('1505', '15', 'CAÑETE');
INSERT INTO `provincia` VALUES ('1506', '15', 'HUARAL');
INSERT INTO `provincia` VALUES ('1507', '15', 'HUAROCHIRI');
INSERT INTO `provincia` VALUES ('1508', '15', 'HUAURA');
INSERT INTO `provincia` VALUES ('1509', '15', 'OYON');
INSERT INTO `provincia` VALUES ('1510', '15', 'YAUYOS');
INSERT INTO `provincia` VALUES ('1601', '16', 'MAYNAS');
INSERT INTO `provincia` VALUES ('1602', '16', 'ALTO AMAZONAS');
INSERT INTO `provincia` VALUES ('1603', '16', 'LORETO');
INSERT INTO `provincia` VALUES ('1604', '16', 'MARISCAL RAMON CASTILLA');
INSERT INTO `provincia` VALUES ('1605', '16', 'REQUENA');
INSERT INTO `provincia` VALUES ('1606', '16', 'UCAYALI');
INSERT INTO `provincia` VALUES ('1607', '16', 'DATEM DEL MARAÑON');
INSERT INTO `provincia` VALUES ('1701', '17', 'TAMBOPATA');
INSERT INTO `provincia` VALUES ('1702', '17', 'MANU');
INSERT INTO `provincia` VALUES ('1703', '17', 'TAHUAMANU');
INSERT INTO `provincia` VALUES ('1801', '18', 'MARISCAL NIETO');
INSERT INTO `provincia` VALUES ('1802', '18', 'GENERAL SANCHEZ CERRO');
INSERT INTO `provincia` VALUES ('1803', '18', 'ILO');
INSERT INTO `provincia` VALUES ('1901', '19', 'PASCO');
INSERT INTO `provincia` VALUES ('1902', '19', 'DANIEL ALCIDES CARRION');
INSERT INTO `provincia` VALUES ('1903', '19', 'OXAPAMPA');
INSERT INTO `provincia` VALUES ('2001', '20', 'PIURA');
INSERT INTO `provincia` VALUES ('2002', '20', 'AYABACA');
INSERT INTO `provincia` VALUES ('2003', '20', 'HUANCABAMBA');
INSERT INTO `provincia` VALUES ('2004', '20', 'MORROPON');
INSERT INTO `provincia` VALUES ('2005', '20', 'PAITA');
INSERT INTO `provincia` VALUES ('2006', '20', 'SULLANA');
INSERT INTO `provincia` VALUES ('2007', '20', 'TALARA');
INSERT INTO `provincia` VALUES ('2008', '20', 'SECHURA');
INSERT INTO `provincia` VALUES ('2101', '21', 'PUNO');
INSERT INTO `provincia` VALUES ('2102', '21', 'AZANGARO');
INSERT INTO `provincia` VALUES ('2103', '21', 'CARABAYA');
INSERT INTO `provincia` VALUES ('2104', '21', 'CHUCUITO');
INSERT INTO `provincia` VALUES ('2105', '21', 'EL COLLAO');
INSERT INTO `provincia` VALUES ('2106', '21', 'HUANCANE');
INSERT INTO `provincia` VALUES ('2107', '21', 'LAMPA');
INSERT INTO `provincia` VALUES ('2108', '21', 'MELGAR');
INSERT INTO `provincia` VALUES ('2109', '21', 'MOHO');
INSERT INTO `provincia` VALUES ('2110', '21', 'SAN ANTONIO DE PUTINA');
INSERT INTO `provincia` VALUES ('2111', '21', 'SAN ROMAN');
INSERT INTO `provincia` VALUES ('2112', '21', 'SANDIA');
INSERT INTO `provincia` VALUES ('2113', '21', 'YUNGUYO');
INSERT INTO `provincia` VALUES ('2201', '22', 'MOYOBAMBA');
INSERT INTO `provincia` VALUES ('2202', '22', 'BELLAVISTA');
INSERT INTO `provincia` VALUES ('2203', '22', 'EL DORADO');
INSERT INTO `provincia` VALUES ('2204', '22', 'HUALLAGA');
INSERT INTO `provincia` VALUES ('2205', '22', 'LAMAS');
INSERT INTO `provincia` VALUES ('2206', '22', 'MARISCAL CACERES');
INSERT INTO `provincia` VALUES ('2207', '22', 'PICOTA');
INSERT INTO `provincia` VALUES ('2208', '22', 'RIOJA');
INSERT INTO `provincia` VALUES ('2209', '22', 'SAN MARTIN');
INSERT INTO `provincia` VALUES ('2210', '22', 'TOCACHE');
INSERT INTO `provincia` VALUES ('2301', '23', 'TACNA');
INSERT INTO `provincia` VALUES ('2302', '23', 'CANDARAVE');
INSERT INTO `provincia` VALUES ('2303', '23', 'JORGE BASADRE');
INSERT INTO `provincia` VALUES ('2304', '23', 'TARATA');
INSERT INTO `provincia` VALUES ('2401', '24', 'TUMBES');
INSERT INTO `provincia` VALUES ('2402', '24', 'CONTRALMIRANTE VILLAR');
INSERT INTO `provincia` VALUES ('2403', '24', 'ZARUMILLA');
INSERT INTO `provincia` VALUES ('2501', '25', 'CORONEL PORTILLO');
INSERT INTO `provincia` VALUES ('2502', '25', 'ATALAYA');
INSERT INTO `provincia` VALUES ('2503', '25', 'PADRE ABAD');
INSERT INTO `provincia` VALUES ('2504', '25', 'PURUS');


-- ----------------------------
-- Records of distrito
-- ----------------------------
INSERT INTO `distrito` VALUES ('070101', '0701', '07', 'CALLAO');
INSERT INTO `distrito` VALUES ('070102', '0701', '07', 'BELLAVISTA');
INSERT INTO `distrito` VALUES ('070103', '0701', '07', 'CARMEN DE LA LEGUA R');
INSERT INTO `distrito` VALUES ('070104', '0701', '07', 'LA PERLA');
INSERT INTO `distrito` VALUES ('070105', '0701', '07', 'LA PUNTA');
INSERT INTO `distrito` VALUES ('070106', '0701', '07', 'VENTANILLA');
INSERT INTO `distrito` VALUES ('150101', '1501', '15', 'LIMA');
INSERT INTO `distrito` VALUES ('150102', '1501', '15', 'ANCON');
INSERT INTO `distrito` VALUES ('150103', '1501', '15', 'ATE');
INSERT INTO `distrito` VALUES ('150104', '1501', '15', 'BARRANCO');
INSERT INTO `distrito` VALUES ('150105', '1501', '15', 'BREÑA');
INSERT INTO `distrito` VALUES ('150106', '1501', '15', 'CARABAYLLO');
INSERT INTO `distrito` VALUES ('150107', '1501', '15', 'CHACLACAYO');
INSERT INTO `distrito` VALUES ('150108', '1501', '15', 'CHORRILLOS');
INSERT INTO `distrito` VALUES ('150109', '1501', '15', 'CIENEGUILLA');
INSERT INTO `distrito` VALUES ('150110', '1501', '15', 'COMAS');
INSERT INTO `distrito` VALUES ('150111', '1501', '15', 'EL AGUSTINO');
INSERT INTO `distrito` VALUES ('150112', '1501', '15', 'INDEPENDENCIA');
INSERT INTO `distrito` VALUES ('150113', '1501', '15', 'JESUS MARIA');
INSERT INTO `distrito` VALUES ('150114', '1501', '15', 'LA MOLINA');
INSERT INTO `distrito` VALUES ('150115', '1501', '15', 'LA VICTORIA');
INSERT INTO `distrito` VALUES ('150116', '1501', '15', 'LINCE');
INSERT INTO `distrito` VALUES ('150117', '1501', '15', 'LOS OLIVOS');
INSERT INTO `distrito` VALUES ('150118', '1501', '15', 'LURIGANCHO');
INSERT INTO `distrito` VALUES ('150119', '1501', '15', 'LURIN');
INSERT INTO `distrito` VALUES ('150120', '1501', '15', 'MAGDALENA DEL MAR');
INSERT INTO `distrito` VALUES ('150121', '1501', '15', 'PUEBLO LIBRE (MAGDAL');
INSERT INTO `distrito` VALUES ('150122', '1501', '15', 'MIRAFLORES');
INSERT INTO `distrito` VALUES ('150123', '1501', '15', 'PACHACAMAC');
INSERT INTO `distrito` VALUES ('150124', '1501', '15', 'PUCUSANA');
INSERT INTO `distrito` VALUES ('150125', '1501', '15', 'PUENTE PIEDRA');
INSERT INTO `distrito` VALUES ('150126', '1501', '15', 'PUNTA HERMOSA');
INSERT INTO `distrito` VALUES ('150127', '1501', '15', 'PUNTA NEGRA');
INSERT INTO `distrito` VALUES ('150128', '1501', '15', 'RIMAC');
INSERT INTO `distrito` VALUES ('150129', '1501', '15', 'SAN BARTOLO');
INSERT INTO `distrito` VALUES ('150130', '1501', '15', 'SAN BORJA');
INSERT INTO `distrito` VALUES ('150131', '1501', '15', 'SAN ISIDRO');
INSERT INTO `distrito` VALUES ('150132', '1501', '15', 'SAN JUAN DE LURIGANC');
INSERT INTO `distrito` VALUES ('150133', '1501', '15', 'SAN JUAN DE MIRAFLOR');
INSERT INTO `distrito` VALUES ('150134', '1501', '15', 'SAN LUIS');
INSERT INTO `distrito` VALUES ('150135', '1501', '15', 'SAN MARTIN DE PORRES');
INSERT INTO `distrito` VALUES ('150136', '1501', '15', 'SAN MIGUEL');
INSERT INTO `distrito` VALUES ('150137', '1501', '15', 'SANTA ANITA');
INSERT INTO `distrito` VALUES ('150138', '1501', '15', 'SANTA MARIA DEL MAR');
INSERT INTO `distrito` VALUES ('150139', '1501', '15', 'SANTA ROSA');
INSERT INTO `distrito` VALUES ('150140', '1501', '15', 'SANTIAGO DE SURCO');
INSERT INTO `distrito` VALUES ('150141', '1501', '15', 'SURQUILLO');
INSERT INTO `distrito` VALUES ('150142', '1501', '15', 'VILLA EL SALVADOR');
INSERT INTO `distrito` VALUES ('150143', '1501', '15', 'VILLA MARIA DEL TRIU');
INSERT INTO `distrito` VALUES ('150201', '1502', '15', 'BARRANCA');
INSERT INTO `distrito` VALUES ('150202', '1502', '15', 'PARAMONGA');
INSERT INTO `distrito` VALUES ('150203', '1502', '15', 'PATIVILCA');
INSERT INTO `distrito` VALUES ('150204', '1502', '15', 'SUPE');
INSERT INTO `distrito` VALUES ('150205', '1502', '15', 'SUPE PUERTO');
INSERT INTO `distrito` VALUES ('150301', '1503', '15', 'CAJATAMBO');
INSERT INTO `distrito` VALUES ('150302', '1503', '15', 'COPA');
INSERT INTO `distrito` VALUES ('150303', '1503', '15', 'GORGOR');
INSERT INTO `distrito` VALUES ('150304', '1503', '15', 'HUANCAPON');
INSERT INTO `distrito` VALUES ('150305', '1503', '15', 'MANAS');
INSERT INTO `distrito` VALUES ('150401', '1504', '15', 'CANTA');
INSERT INTO `distrito` VALUES ('150402', '1504', '15', 'ARAHUAY');
INSERT INTO `distrito` VALUES ('150403', '1504', '15', 'HUAMANTANGA');
INSERT INTO `distrito` VALUES ('150404', '1504', '15', 'HUAROS');
INSERT INTO `distrito` VALUES ('150405', '1504', '15', 'LACHAQUI');
INSERT INTO `distrito` VALUES ('150406', '1504', '15', 'SAN BUENAVENTURA');
INSERT INTO `distrito` VALUES ('150407', '1504', '15', 'SANTA ROSA DE QUIVES');
INSERT INTO `distrito` VALUES ('150501', '1505', '15', 'SAN VICENTE DE CAÑET');
INSERT INTO `distrito` VALUES ('150502', '1505', '15', 'ASIA');
INSERT INTO `distrito` VALUES ('150503', '1505', '15', 'CALANGO');
INSERT INTO `distrito` VALUES ('150504', '1505', '15', 'CERRO AZUL');
INSERT INTO `distrito` VALUES ('150505', '1505', '15', 'CHILCA');
INSERT INTO `distrito` VALUES ('150506', '1505', '15', 'COAYLLO');
INSERT INTO `distrito` VALUES ('150507', '1505', '15', 'IMPERIAL');
INSERT INTO `distrito` VALUES ('150508', '1505', '15', 'LUNAHUANA');
INSERT INTO `distrito` VALUES ('150509', '1505', '15', 'MALA');
INSERT INTO `distrito` VALUES ('150510', '1505', '15', 'NUEVO IMPERIAL');
INSERT INTO `distrito` VALUES ('150511', '1505', '15', 'PACARAN');
INSERT INTO `distrito` VALUES ('150512', '1505', '15', 'QUILMANA');
INSERT INTO `distrito` VALUES ('150513', '1505', '15', 'SAN ANTONIO');
INSERT INTO `distrito` VALUES ('150514', '1505', '15', 'SAN LUIS');
INSERT INTO `distrito` VALUES ('150515', '1505', '15', 'SANTA CRUZ DE FLORES');
INSERT INTO `distrito` VALUES ('150516', '1505', '15', 'ZUÑIGA');
INSERT INTO `distrito` VALUES ('150601', '1506', '15', 'HUARAL');
INSERT INTO `distrito` VALUES ('150602', '1506', '15', 'ATAVILLOS ALTO');
INSERT INTO `distrito` VALUES ('150603', '1506', '15', 'ATAVILLOS BAJO');
INSERT INTO `distrito` VALUES ('150604', '1506', '15', 'AUCALLAMA');
INSERT INTO `distrito` VALUES ('150605', '1506', '15', 'CHANCAY');
INSERT INTO `distrito` VALUES ('150606', '1506', '15', 'IHUARI');
INSERT INTO `distrito` VALUES ('150607', '1506', '15', 'LAMPIAN');
INSERT INTO `distrito` VALUES ('150608', '1506', '15', 'PACARAOS');
INSERT INTO `distrito` VALUES ('150609', '1506', '15', 'SAN MIGUEL DE ACOS');
INSERT INTO `distrito` VALUES ('150610', '1506', '15', 'SANTA CRUZ DE ANDAMA');
INSERT INTO `distrito` VALUES ('150611', '1506', '15', 'SUMBILCA');
INSERT INTO `distrito` VALUES ('150612', '1506', '15', 'VEINTISIETE DE NOVIE');
INSERT INTO `distrito` VALUES ('150701', '1507', '15', 'MATUCANA');
INSERT INTO `distrito` VALUES ('150702', '1507', '15', 'ANTIOQUIA');
INSERT INTO `distrito` VALUES ('150703', '1507', '15', 'CALLAHUANCA');
INSERT INTO `distrito` VALUES ('150704', '1507', '15', 'CARAMPOMA');
INSERT INTO `distrito` VALUES ('150705', '1507', '15', 'CHICLA');
INSERT INTO `distrito` VALUES ('150706', '1507', '15', 'CUENCA');
INSERT INTO `distrito` VALUES ('150707', '1507', '15', 'HUACHUPAMPA');
INSERT INTO `distrito` VALUES ('150708', '1507', '15', 'HUANZA');
INSERT INTO `distrito` VALUES ('150709', '1507', '15', 'HUAROCHIRI');
INSERT INTO `distrito` VALUES ('150710', '1507', '15', 'LAHUAYTAMBO');
INSERT INTO `distrito` VALUES ('150711', '1507', '15', 'LANGA');
INSERT INTO `distrito` VALUES ('150712', '1507', '15', 'LARAOS');
INSERT INTO `distrito` VALUES ('150713', '1507', '15', 'MARIATANA');
INSERT INTO `distrito` VALUES ('150714', '1507', '15', 'RICARDO PALMA');
INSERT INTO `distrito` VALUES ('150715', '1507', '15', 'SAN ANDRES DE TUPICO');
INSERT INTO `distrito` VALUES ('150716', '1507', '15', 'SAN ANTONIO');
INSERT INTO `distrito` VALUES ('150717', '1507', '15', 'SAN BARTOLOME');
INSERT INTO `distrito` VALUES ('150718', '1507', '15', 'SAN DAMIAN');
INSERT INTO `distrito` VALUES ('150719', '1507', '15', 'SAN JUAN DE IRIS');
INSERT INTO `distrito` VALUES ('150720', '1507', '15', 'SAN JUAN DE TANTARAN');
INSERT INTO `distrito` VALUES ('150721', '1507', '15', 'SAN LORENZO DE QUINT');
INSERT INTO `distrito` VALUES ('150722', '1507', '15', 'SAN MATEO');
INSERT INTO `distrito` VALUES ('150723', '1507', '15', 'SAN MATEO DE OTAO');
INSERT INTO `distrito` VALUES ('150724', '1507', '15', 'SAN PEDRO DE CASTA');
INSERT INTO `distrito` VALUES ('150725', '1507', '15', 'SAN PEDRO DE HUANCAY');
INSERT INTO `distrito` VALUES ('150726', '1507', '15', 'SANGALLAYA');
INSERT INTO `distrito` VALUES ('150727', '1507', '15', 'SANTA CRUZ DE COCACH');
INSERT INTO `distrito` VALUES ('150728', '1507', '15', 'SANTA EULALIA');
INSERT INTO `distrito` VALUES ('150729', '1507', '15', 'SANTIAGO DE ANCHUCAY');
INSERT INTO `distrito` VALUES ('150730', '1507', '15', 'SANTIAGO DE TUNA');
INSERT INTO `distrito` VALUES ('150731', '1507', '15', 'SANTO DOMINGO DE LOS');
INSERT INTO `distrito` VALUES ('150732', '1507', '15', 'SURCO');
INSERT INTO `distrito` VALUES ('150801', '1508', '15', 'HUACHO');
INSERT INTO `distrito` VALUES ('150802', '1508', '15', 'AMBAR');
INSERT INTO `distrito` VALUES ('150803', '1508', '15', 'CALETA DE CARQUIN');
INSERT INTO `distrito` VALUES ('150804', '1508', '15', 'CHECRAS');
INSERT INTO `distrito` VALUES ('150805', '1508', '15', 'HUALMAY');
INSERT INTO `distrito` VALUES ('150806', '1508', '15', 'HUAURA');
INSERT INTO `distrito` VALUES ('150807', '1508', '15', 'LEONCIO PRADO');
INSERT INTO `distrito` VALUES ('150808', '1508', '15', 'PACCHO');
INSERT INTO `distrito` VALUES ('150809', '1508', '15', 'SANTA LEONOR');
INSERT INTO `distrito` VALUES ('150810', '1508', '15', 'SANTA MARIA');
INSERT INTO `distrito` VALUES ('150811', '1508', '15', 'SAYAN');
INSERT INTO `distrito` VALUES ('150812', '1508', '15', 'VEGUETA');
INSERT INTO `distrito` VALUES ('150901', '1509', '15', 'OYON');
INSERT INTO `distrito` VALUES ('150902', '1509', '15', 'ANDAJES');
INSERT INTO `distrito` VALUES ('150903', '1509', '15', 'CAUJUL');
INSERT INTO `distrito` VALUES ('150904', '1509', '15', 'COCHAMARCA');
INSERT INTO `distrito` VALUES ('150905', '1509', '15', 'NAVAN');
INSERT INTO `distrito` VALUES ('150906', '1509', '15', 'PACHANGARA');
INSERT INTO `distrito` VALUES ('151001', '1510', '15', 'YAUYOS');
INSERT INTO `distrito` VALUES ('151002', '1510', '15', 'ALIS');
INSERT INTO `distrito` VALUES ('151003', '1510', '15', 'AYAUCA');
INSERT INTO `distrito` VALUES ('151004', '1510', '15', 'AYAVIRI');
INSERT INTO `distrito` VALUES ('151005', '1510', '15', 'AZANGARO');
INSERT INTO `distrito` VALUES ('151006', '1510', '15', 'CACRA');
INSERT INTO `distrito` VALUES ('151007', '1510', '15', 'CARANIA');
INSERT INTO `distrito` VALUES ('151008', '1510', '15', 'CATAHUASI');
INSERT INTO `distrito` VALUES ('151009', '1510', '15', 'CHOCOS');
INSERT INTO `distrito` VALUES ('151010', '1510', '15', 'COCHAS');
INSERT INTO `distrito` VALUES ('151011', '1510', '15', 'COLONIA');
INSERT INTO `distrito` VALUES ('151012', '1510', '15', 'HONGOS');
INSERT INTO `distrito` VALUES ('151013', '1510', '15', 'HUAMPARA');
INSERT INTO `distrito` VALUES ('151014', '1510', '15', 'HUANCAYA');
INSERT INTO `distrito` VALUES ('151015', '1510', '15', 'HUANGASCAR');
INSERT INTO `distrito` VALUES ('151016', '1510', '15', 'HUANTAN');
INSERT INTO `distrito` VALUES ('151017', '1510', '15', 'HUAÑEC');
INSERT INTO `distrito` VALUES ('151018', '1510', '15', 'LARAOS');
INSERT INTO `distrito` VALUES ('151019', '1510', '15', 'LINCHA');
INSERT INTO `distrito` VALUES ('151020', '1510', '15', 'MADEAN');
INSERT INTO `distrito` VALUES ('151021', '1510', '15', 'MIRAFLORES');
INSERT INTO `distrito` VALUES ('151022', '1510', '15', 'OMAS');
INSERT INTO `distrito` VALUES ('151023', '1510', '15', 'PUTINZA');
INSERT INTO `distrito` VALUES ('151024', '1510', '15', 'QUINCHES');
INSERT INTO `distrito` VALUES ('151025', '1510', '15', 'QUINOCAY');
INSERT INTO `distrito` VALUES ('151026', '1510', '15', 'SAN JOAQUIN');
INSERT INTO `distrito` VALUES ('151027', '1510', '15', 'SAN PEDRO DE PILAS');
INSERT INTO `distrito` VALUES ('151028', '1510', '15', 'TANTA');
INSERT INTO `distrito` VALUES ('151029', '1510', '15', 'TAURIPAMPA');
INSERT INTO `distrito` VALUES ('151030', '1510', '15', 'TOMAS');
INSERT INTO `distrito` VALUES ('151031', '1510', '15', 'TUPE');
INSERT INTO `distrito` VALUES ('151032', '1510', '15', 'VIÑAC');
INSERT INTO `distrito` VALUES ('151033', '1510', '15', 'VITIS');

-- ----------------------------
-- Records of al_tipo
select * from al_tipo;
delete from al_tipo;
-- ----------------------------
INSERT INTO `al_tipo` (`id_tipo`, `codigo_tipo`, `descripcion_tipo`, `descripcion_larga`, `estado`) VALUES
(1, '01', 'ASEO PERSONAL', 'ASEO PERSONAL', '1'),
(2, '02', 'COCINA', 'COCINA', '1'),
(3, '03', 'CONDIMENTOS', 'CONDIMENTOS', '1'),
(4, '04', 'ENLATADOS', 'ENLATADOS', '1'),
(5, '05', 'ENVASADOS', 'ENVASADOS', '1'),
(6, '06', 'GOLOSINAS', 'GOLOSINAS', '1'),
(7, '07', 'INSTANTANEOS', 'INSTANTANEOS', '1'),
(8, '08', 'LACTEOS', 'LACTEOS', '1'),
(9, '09', 'LIMPIEZA DEL HOGAR', 'LIMPIEZA DEL HOGAR', '1'),
(10, '10', 'REPOSTERA', 'REPOSTERA', '1'),
(11, '11', 'SALSAS', 'SALSAS', '1');

  -- ----------------------------
-- Records of al_categoria
-- ----------------------------
delete from al_categoria;
select * from al_categoria;

INSERT INTO `al_categoria` (`id_categoria`, `id_tipo`, `codigo_categoria`, `descripcion_categoria`, `descripcion_larga`, `estado`) VALUES
(1, 1, '01', 'JABON', 'JABON', '1'),
(2, 1, '02', 'PAÑITOS HUMEDOS', 'PAÑITOS HUMEDOS', '1'),
(3, 1, '03', 'PASTA DENTAL', 'PASTA DENTAL', '1'),
(4, 1, '04', 'TOALLA HIGIENICA', 'TOALLA HIGIENICA', '1'),
(5, 2, '05', 'ACEITE', 'ACEITE', '1'),
(6, 2, '06', 'ATÃšN', 'ATÃšN', '1'),
(7, 2, '07', 'AZUCAR BLANCA', 'AZUCAR BLANCA', '1'),
(8, 2, '08', 'AZUCAR RUBIA', 'AZUCAR RUBIA', '1'),
(9, 2, '09', 'FIDEOS', 'FIDEOS', '1'),
(10, 2, '10', 'SAL', 'SAL', '1'),
(11, 2, '11', 'VINAGRE BLANCO', 'VINAGRE BLANCO', '1'),
(12, 2, '12', 'VINAGRE TINTO', 'VINAGRE TINTO', '1'),
(13, 3, '13', 'AJI PANQUITA', 'AJI PANQUITA', '1'),
(14, 3, '14', 'AJO MOLIDO', 'AJO MOLIDO', '1'),
(15, 3, '15', 'COMINO', 'COMINO', '1'),
(16, 3, '16', 'CUBITOS', 'CUBITOS', '1'),
(17, 3, '17', 'OREGANO', 'OREGANO', '1'),
(18, 3, '18', 'PALILLO', 'PALILLO', '1'),
(19, 3, '19', 'PIMIENTA', 'PIMIENTA', '1'),
(20, 3, '20', 'SAZONADOR', 'SAZONADOR', '1'),
(21, 3, '21', 'TUCO', 'TUCO', '1'),
(22, 4, '22', 'ATÃšN FILETE', 'ATÃšN FILETE', '1'),
(23, 4, '23', 'ATÃšN TROZOS', 'ATÃšN TROZOS', '1'),
(24, 5, '24', 'ARROZ', 'ARROZ', '1'),
(25, 5, '25', 'ARVEJA', 'ARVEJA', '1'),
(26, 5, '26', 'AZUCAR BLANCA', 'AZUCAR BLANCA', '1'),
(27, 5, '27', 'AZUCAR RUBIA', 'AZUCAR RUBIA', '1'),
(28, 5, '28', 'CAFÉ', 'CAFÉ', '1'),
(29, 5, '29', 'CANARIO', 'CANARIO', '1'),
(30, 5, '30', 'CHOCOLATE EN POLVO', 'CHOCOLATE EN POLVO', '1'),
(31, 5, '31', 'FRIJOL CANARIO', 'FRIJOL CANARIO', '1'),
(32, 5, '32', 'FRIJOL CASTILLA', 'FRIJOL CASTILLA', '1'),
(33, 5, '33', 'GARBANZO', 'GARBANZO', '1'),
(34, 5, '34', 'LENTEJA', 'LENTEJA', '1'),
(35, 5, '35', 'MERMELADA', 'MERMELADA', '1'),
(36, 5, '36', 'PALLAR', 'PALLAR', '1'),
(37, 5, '37', 'POP CORN', 'POP CORN', '1'),
(38, 5, '38', 'QUINUA', 'QUINUA', '1'),
(39, 6, '39', 'CHOCOLATE', 'CHOCOLATE', '1'),
(40, 6, '40', 'GALLETA', 'GALLETA', '1'),
(41, 7, '41', 'AVENA', 'AVENA', '1'),
(42, 7, '42', 'CAFÉ', 'CAFÉ', '1'),
(43, 7, '43', 'SOPA INSTANTANEA', 'SOPA INSTANTANEA', '1'),
(44, 8, '44', 'LECHE', 'LECHE', '1'),
(45, 9, '45', 'DETERGENTE', 'DETERGENTE', '1'),
(46, 9, '46', 'JABÓN', 'JABÓN', '1'),
(47, 9, '47', 'LAVAVAJILLA', 'LAVAVAJILLA', '1'),
(48, 9, '48', 'LEJÍA', 'LEJÍA', '1'),
(49, 9, '49', 'LIMPIATODO', 'LIMPIATODO', '1'),
(50, 9, '50', 'PAÑO LIMPIADOR', 'PAÑO LIMPIADOR', '1'),
(51, 9, '51', 'PAPEL HIGIENICO', 'PAPEL HIGIENICO', '1'),
(52, 9, '52', 'PAPEL TOALLA', 'PAPEL TOALLA', '1'),
(53, 9, '53', 'QUITAMANCHAS', 'QUITAMANCHAS', '1'),
(54, 10, '54', 'ESENCIA DE VAINILLA', 'ESENCIA DE VAINILLA', '1'),
(55, 10, '55', 'HARINA', 'HARINA', '1'),
(56, 10, '56', 'LECHE CONDENSADA', 'LECHE CONDENSADA', '1'),
(57, 10, '57', 'MAICENA', 'MAICENA', '1'),
(58, 11, '58', 'AJI', 'AJI', '1'),
(59, 11, '59', 'KETCHUP', 'KETCHUP', '1'),
(60, 11, '60', 'MAYONESA', 'MAYONESA', '1'),
(61, 11, '61', 'MAYONESA LIGHT', 'MAYONESA LIGHT', '1'),
(62, 11, '62', 'MOSTAZA', 'MOSTAZA', '1'),
(63, 11, '63', 'SILLAO', 'SILLAO', '1');
  
-- ----------------------------
-- Records of al_envase
-- ----------------------------
delete from al_envase;
select * from al_envase;

INSERT INTO `al_envase` (`id_envase`, `codigo_envase`, `descripcion_envase`, `descripcion_larga`, `estado`) VALUES
(1, '01', 'BOLSA', 'BOLSA', '1'),
(2, '02', 'BOTELLA', 'BOTELLA', '1'),
(3, '03', 'CAJA', 'CAJA', '1'),
(4, '04', 'ENVASADO', 'ENVASADO', '1'),
(5, '05', 'ENVOLTORIO', 'ENVOLTORIO', '1'),
(6, '06', 'LATA', 'LATA', '1'),
(7, '07', 'PAQUETE', 'PAQUETE', '1'),
(8, '08', 'POTE', 'POTE', '1'),
(9, '09', 'SACHET', 'SACHET', '1'),
(10, '10', 'SOBRE', 'SOBRE', '1'),
(11, '11', 'SOBRECITO', 'SOBRECITO', '1'),
(12, '12', 'VASO', 'VASO', '1');

-- ----------------------------
-- Records of al_marca
delete from al_marca;
select * from al_marca;
-- ----------------------------
INSERT INTO `al_marca` (`id_marca`, `codigo_marca`, `descripcion_marca`, `descripcion_larga`, `estado`) VALUES
(1, '001', '3 OSITOS', '3 OSITOS', '1'),
(2, '002', 'AJINOMEN', 'AJINOMEN', '1'),
(3, '003', 'AJINO-SILLAO', 'AJINO-SILLAO', '1'),
(4, '004', 'ALACENA', 'ALACENA', ''),
(5, '005', 'ALPESA', 'ALPESA', '1'),
(6, '006', 'BABYSEC', 'BABYSEC', '1'),
(7, '007', 'BLANCA FLOR', 'BLANCA FLOR', '1'),
(8, '008', 'BOLIVAR', 'BOLIVAR', '1'),
(9, '009', 'CAFETAL', 'CAFETAL', '1'),
(10, '010', 'CAMPOMAR', 'CAMPOMAR', '1'),
(11, '011', 'CAPRI', 'CAPRI', '1'),
(12, '012', 'CASINO', 'CASINO', '1'),
(13, '013', 'CHARADA', 'CHARADA', '1'),
(14, '014', 'CHIPS AHOY', 'CHIPS AHOY', '1'),
(15, '015', 'CHOCOSODA', 'CHOCOSODA', '1'),
(16, '016', 'COCINERO', 'COCINERO', '1'),
(17, '017', 'COLGATE', 'COLGATE', '1'),
(18, '018', 'CORONITA', 'CORONITA', '1'),
(19, '019', 'COSTEÑO', 'COSTEÑO', '1'),
(20, '020', 'CUA CUA', 'CUA CUA', '1'),
(21, '021', 'DELI ARROZ', 'DELI ARROZ', '1'),
(22, '022', 'DON VITTORIO', 'DON VITTORIO', '1'),
(23, '023', 'DOÑA GUSTA', 'DOÑA GUSTA', '1'),
(24, '024', 'DOÑA PEPA', 'DOÑA PEPA', '1'),
(25, '025', 'DULFINA', 'DULFINA', '1'),
(26, '026', 'ELITE', 'ELITE', '1'),
(27, '027', 'EMSAL', 'EMSAL', '1'),
(28, '028', 'FANNY', 'FANNY', '1'),
(29, '029', 'FIRME', 'FIRME', '1'),
(30, '030', 'FLORIDA', 'FLORIDA', '1'),
(31, '031', 'GLACITAS', 'GLACITAS', '1'),
(32, '032', 'HOJA REDONDA', 'HOJA REDONDA', '1'),
(33, '033', 'HUGGIES', 'HUGGIES', '1'),
(34, '034', 'IDEAL', 'IDEAL', '1'),
(35, '035', 'KIRMA', 'KIRMA', '1'),
(36, '036', 'KOLYNOS', 'KOLYNOS', '1'),
(37, '037', 'LADYSOFT', 'LADYSOFT', '1'),
(38, '038', 'LIGURIA', 'LIGURIA', '1'),
(39, '039', 'MAGGUI', 'MAGGUI', '1'),
(40, '040', 'MILO', 'MILO', '1'),
(41, '041', 'MOROCHAS', 'MOROCHAS', '1'),
(42, '042', 'NEGRITA', 'NEGRITA', '1'),
(43, '043', 'NESTLE', 'NESTLE', '1'),
(44, '044', 'NICOLINI', 'NICOLINI', '1'),
(45, '045', 'NIVEA', 'NIVEA', '1'),
(46, '046', 'OPAL', 'OPAL', '1'),
(47, '047', 'OREO', 'OREO', '1'),
(48, '048', 'PAISANA', 'PAISANA', '1'),
(49, '049', 'PALMOLIVE', 'PALMOLIVE', '1'),
(50, '050', 'PARAMONGA', 'PARAMONGA', '1'),
(51, '051', 'PRIMOR', 'PRIMOR', '1'),
(52, '052', 'PRINCESA', 'PRINCESA', '1'),
(53, '053', 'PROTEX', 'PROTEX', '1'),
(54, '054', 'QUAKER', 'QUAKER', '1'),
(55, '055', 'RITZ', 'RITZ', '1'),
(56, '056', 'SAPOLIO', 'SAPOLIO', '1'),
(57, '057', 'SAYON ', 'SAYON', '1'),
(58, '058', 'SIBARITA', 'SIBARITA', 'SIBARITA'),
(59, '059', 'SUAVE', 'SUAVE', '1'),
(60, '060', 'SUBLIME', 'SUBLIME', '1'),
(61, '061', 'TARI', 'TARI', '1'),
(62, '062', 'TENTACIÓN', 'TENTACIÓN', '1'),
(63, '063', 'TRIÁNGULO', 'TRIÁNGULO', '1'),
(64, '064', 'VANISH', 'VANISH', '1'),
(65, '065', 'YES', 'YES', '1'),
(66, '66', 'AJINOMOTO', 'AJINOMOTO', '1');

-- ----------------------------
-- Records of unidad_medida
-- ----------------------------
INSERT INTO `unidad_medida` VALUES (1, '4A', 'BOBINAS');
INSERT INTO `unidad_medida` VALUES (2, 'BJ', 'BALDE');
INSERT INTO `unidad_medida` VALUES (3, 'BLL', 'BARRILES');
INSERT INTO `unidad_medida` VALUES (4, 'BG', 'BOLSA');
INSERT INTO `unidad_medida` VALUES (5, 'BO', 'BOTELLAS');
INSERT INTO `unidad_medida` VALUES (6, 'BX', 'CAJA');
INSERT INTO `unidad_medida` VALUES (7, 'CT', 'CARTONES');
INSERT INTO `unidad_medida` VALUES (8, 'CMK', 'CENTIMETROCUADRADO');
INSERT INTO `unidad_medida` VALUES (9, 'CMQ', 'CENTIMETROCUBICO');
INSERT INTO `unidad_medida` VALUES (10, 'CMT', 'CENTIMETROLINEAL');
INSERT INTO `unidad_medida` VALUES (11, 'CEN', 'CIENTODEUNIDADES');
INSERT INTO `unidad_medida` VALUES (12, 'CY', 'CILINDRO');
INSERT INTO `unidad_medida` VALUES (13, 'CJ', 'CONOS');
INSERT INTO `unidad_medida` VALUES (14, 'DZN', 'DOCENA');
INSERT INTO `unidad_medida` VALUES (15, 'DZP', 'DOCENAPOR10**6');
INSERT INTO `unidad_medida` VALUES (16, 'BE', 'FARDO');
INSERT INTO `unidad_medida` VALUES (17, 'GLI', 'GALONINGLES(4,545956L)');
INSERT INTO `unidad_medida` VALUES (18, 'GRM', 'GRAMO');
INSERT INTO `unidad_medida` VALUES (19, 'GRO', 'GRUESA');
INSERT INTO `unidad_medida` VALUES (20, 'HLT', 'HECTOLITRO');
INSERT INTO `unidad_medida` VALUES (21, 'LEF', 'HOJA');
INSERT INTO `unidad_medida` VALUES (22, 'SET', 'JUEGO');
INSERT INTO `unidad_medida` VALUES (23, 'KGM', 'KILOGRAMO');
INSERT INTO `unidad_medida` VALUES (24, 'KTM', 'KILOMETRO');
INSERT INTO `unidad_medida` VALUES (25, 'KWH', 'KILOVATIOHORA');
INSERT INTO `unidad_medida` VALUES (26, 'KT', 'KIT');
INSERT INTO `unidad_medida` VALUES (27, 'CA', 'LATAS');
INSERT INTO `unidad_medida` VALUES (28, 'LBR', 'LIBRAS');
INSERT INTO `unidad_medida` VALUES (29, 'LTR', 'LITRO');
INSERT INTO `unidad_medida` VALUES (30, 'MWH', 'MEGAWATTHORA');
INSERT INTO `unidad_medida` VALUES (31, 'MTR', 'METRO');
INSERT INTO `unidad_medida` VALUES (32, 'MTK', 'METROCUADRADO');
INSERT INTO `unidad_medida` VALUES (33, 'MTQ', 'METROCUBICO');
INSERT INTO `unidad_medida` VALUES (34, 'MGM', 'MILIGRAMOS');
INSERT INTO `unidad_medida` VALUES (35, 'MLT', 'MILILITRO');
INSERT INTO `unidad_medida` VALUES (36, 'MMT', 'MILIMETRO');
INSERT INTO `unidad_medida` VALUES (37, 'MMK', 'MILIMETROCUADRADO');
INSERT INTO `unidad_medida` VALUES (38, 'MMQ', 'MILIMETROCUBICO');
INSERT INTO `unidad_medida` VALUES (39, 'MLL', 'MILLARES');
INSERT INTO `unidad_medida` VALUES (40, 'UM', 'MILLONDEUNIDADES');
INSERT INTO `unidad_medida` VALUES (41, 'ONZ', 'ONZAS');
INSERT INTO `unidad_medida` VALUES (42, 'PF', 'PALETAS');
INSERT INTO `unidad_medida` VALUES (43, 'PK', 'PAQUETE');
INSERT INTO `unidad_medida` VALUES (44, 'PR', 'PAR');
INSERT INTO `unidad_medida` VALUES (45, 'FOT', 'PIES');
INSERT INTO `unidad_medida` VALUES (46, 'FTK', 'PIESCUADRADOS');
INSERT INTO `unidad_medida` VALUES (47, 'FTQ', 'PIESCUBICOS');
INSERT INTO `unidad_medida` VALUES (48, 'C62', 'PIEZAS');
INSERT INTO `unidad_medida` VALUES (49, 'PG', 'PLACAS');
INSERT INTO `unidad_medida` VALUES (50, 'ST', 'PLIEGO');
INSERT INTO `unidad_medida` VALUES (51, 'INH', 'PULGADAS');
INSERT INTO `unidad_medida` VALUES (52, 'RM', 'RESMA');
INSERT INTO `unidad_medida` VALUES (53, 'DR', 'TAMBOR');
INSERT INTO `unidad_medida` VALUES (54, 'STN', 'TONELADACORTA');
INSERT INTO `unidad_medida` VALUES (55, 'LTN', 'TONELADALARGA');
INSERT INTO `unidad_medida` VALUES (56, 'TNE', 'TONELADAS');
INSERT INTO `unidad_medida` VALUES (57, 'TU', 'TUBOS');
INSERT INTO `unidad_medida` VALUES (58, 'NIU', 'UNIDAD(BIENES)');
INSERT INTO `unidad_medida` VALUES (59, 'ZZ', 'UNIDAD(SERVICIOS)');
INSERT INTO `unidad_medida` VALUES (60, 'GLL', 'USGALON(3,7843L)');
INSERT INTO `unidad_medida` VALUES (61, 'YRD', 'YARDA');
INSERT INTO `unidad_medida` VALUES (62, 'YDK', 'YARDACUADRADA');

select * from al_tipo;
select * from al_producto;
delete from al_producto;

-- ----------------------------
-- Records of al_producto
alter table al_producto
add column tipo_impuesto varchar(3);
-- ----------------------------
delete from al_producto;
                      select * from al_producto;     
INSERT INTO `al_producto` (`id_producto`, `id_categoria`, `id_tipo`, `id_marca`, `id_envase`, `id_unidad_medida`, `cod_producto`, `cod_producto_sunat`, `cod_barra_producto`, `descripcion`, `contenido`, `stock_minimo`, `stock_actual`, `perecible`, `tiempo_reposicion`, `paraventa`, `usuario_ingreso`, `fecha_modificacion`, `usuario_modificacion`, `tipo_impuesto`, `estado`, `id_seccion`) VALUES
(1, '44', '08', '43', '06', '18', '084404306001', '', '1', 'IDEAL EVAPORADA ENTERA CREMOSITA 390GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(2, '28', '05', '43', '06', '18', '052804306001', '', '2', 'CAFE INSTANTANEO KIRMA 190GR LATA', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(3, '30', '05', '40', '06', '18', '053004006001', '', '3', 'MILO 400GR LATA', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(4, '16', '03', '39', '03', '18', '031603903001', '', '4', 'MAGGUI CUBO GALLINA 75.2GR ', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(5, '16', '03', '39', '03', '18', '031603903002', '', '5', 'MAGGUI CUBO CARNE 75.2GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(6, '56', '10', '43', '06', '18', '105604306001', '', '6', 'LECHE CONDENSADA NESTLÉ TARRO 393GR', 'SI','', 0, 0, 1, 0, '', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 3),
(7, '39', '06', '60', '05', '18', '063906005001', '', '7', 'SUBLIME CLASICO 30GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(8, '39', '06', '63', '05', '18', '063906305001', '', '8', 'TRIANGULO CLASICO 30GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(9, '39', '06', '52', '05', '18', '063905205001', '', '9', 'PRINCESA BARRA 30GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(10, '40', '06', '41', '07', '18', '064004107001', '', '10', 'MOROCHAS GALLETAS 30GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(11, '40', '06', '41', '05', '18', '064004105001', '', '11', 'MOROCHAS SNACK 46GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(12, '24', '05', '19', '01', '18', '052401901001', '', '12', 'COSTEÃ‘O EXTRA 750GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'EXO', 'ACTIVADO', 1),
(13, '24', '05', '19', '01', '18', '052401901002', '', '13', 'COSTEÃ‘O SUPERIOR 750GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'EXO', 'ACTIVADO', 1),
(14, '24', '05', '48', '01', '18', '052404801001', '', '14', 'PAISANA EXTRA 750GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'EXO', 'ACTIVADO', 1),
(15, '24', '05', '48', '01', '18', '052404801002', '', '15', 'PAISANA SUPERIOR 750GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'EXO', 'ACTIVADO', 1),
(16, '24', '05', '32', '01', '18', '052403201001', '', '16', 'HR EXTRA 750GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'EXO', 'ACTIVADO', 1),
(17, '24', '05', '32', '01', '18', '052403201002', '', '17', 'HR SUPERIOR 750GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'EXO', 'ACTIVADO', 1),
(18, '26', '05', '19', '01', '23', '052601901001', '', '18', 'COSTEÑO AZUCAR BLANCA 1KG', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(19, '27', '05', '19', '01', '23', '052701901001', '', '19', 'COSTEÑO AZUCAR RUBIA 1KG', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(20, '25', '05', '19', '01', '18', '052501901001', '', '20', 'COSTEÑO ARVEJA VERDE 500GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'EXO', 'ACTIVADO', 1),
(21, '31', '05', '19', '01', '18', '053101901001', '', '21', 'COSTEÑO FRIJOL CANARIO 500GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'EXO', 'ACTIVADO', 1),
(22, '32', '05', '19', '01', '18', '053201901001', '', '22', 'COSTEÑO FRIJOL CASTILLA 500GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'EXO', 'ACTIVADO', 1),
(23, '33', '05', '19', '01', '18', '053301901001', '', '23', 'COSTEÑO GARBANZO 500GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'EXO', 'ACTIVADO', 1),
(24, '34', '05', '19', '01', '18', '053401901001', '', '24', 'COSTEÑO LENTEJA 500GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'EXO', 'ACTIVADO', 1),
(25, '36', '05', '19', '01', '18', '053601901001', '', '25', 'COSTEÑO PALLAR 500GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'EXO', 'ACTIVADO', 1),
(26, '37', '05', '19', '01', '18', '053701901001', '', '26', 'COSTEÑO POP CORN 500GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(27, '38', '05', '19', '01', '18', '053801901001', '', '27', 'COSTEÑO QUINUA 500GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(28, '25', '05', '48', '01', '18', '052504801001', '', '28', 'PAISANA ARVEJA 500GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'EXO', 'ACTIVADO', 1),
(29, '34', '05', '48', '01', '18', '053404801001', '', '29', 'PAISANA LENTEJA 500GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'EXO', 'ACTIVADO', 1),
(30, '29', '05', '48', '01', '18', '052904801001', '', '30', 'PAISANA CANARIO 500GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'EXO', 'ACTIVADO', 1),
(31, '36', '05', '48', '01', '18', '053604801001', '', '31', 'PAISANA PALLAR 500GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'EXO', 'ACTIVADO', 1),
(32, '33', '05', '48', '01', '18', '053304801001', '', '32', 'PAISANA GARBANZO 500GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'EXO', 'ACTIVADO', 1),
(33, '37', '05', '48', '01', '18', '053704801001', '', '33', 'PAISANA POP CORN 500GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(34, '38', '05', '48', '01', '18', '053804801001', '', '34', 'PAISANA QUINUA 500GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(35, '31', '05', '32', '01', '18', '053103201001', '', '35', 'HR FRIJOL CANARIO 500GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'EXO', 'ACTIVADO', 1),
(36, '34', '05', '32', '01', '18', '053403201001', '', '36', 'HR LENTEJAS 500GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'EXO', 'ACTIVADO', 1),
(37, '25', '05', '32', '01', '18', '052503201001', '', '37', 'HR ARVERJA VERDE 500GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'EXO', 'ACTIVADO', 1),
(38, '36', '05', '32', '01', '18', '053603201001', '', '38', 'HR PALLARES 500GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'EXO', 'ACTIVADO', 1),
(39, '33', '05', '32', '01', '18', '053303201001', '', '39', 'HR GARBANZOS 500GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'EXO', 'ACTIVADO', 1),
(40, '37', '05', '32', '01', '18', '053703201001', '', '40', 'HR POP CORN 500GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(41, '38', '05', '32', '01', '18', '053803201001', '', '41', 'HR QUINUA 500GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(42, '22', '04', '10', '06', '18', '042201006001', '', '42', 'ATÚN CAMPOMAR FILETE 170GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(43, '23', '04', '10', '06', '18', '042301006001', '', '43', 'ATÚN CAMPOMAR TROZOS DE ATUN 170GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(44, '35', '05', '028', '12', '18', '053502812001', '', '44', 'MERMELADA FRESA FANNY VASO 310GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(45, '41', '07', '54', '01', '18', '074105401001', '', '45', 'AVENA QUAKER FAMILIAR BOLSA 130G', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(46, '41', '07', '01', '01', '18', '074100101001', '', '46', 'AVENA ECONOMICA 3 OSITOS BOLSA 135G', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(47, '20', '03', '23', '11', '18', '032002311001', '', '47', 'DOÑA GUSTA - GALLINA 7GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(48, '20', '03', '23', '11', '18', '032002311002', '', '48', 'DOÑA GUSTA - CARNE 7GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(49, '20', '03', '21', '11', '01', '032002111001', '', '49', 'DELI ARROZ 12GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(50, '20', '03', '02', '11', '18', '032000211001', '', '50', 'AJINOMOTO 52G', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(51, '63', '11', '03', '02', '18', '116300302001', '', '51', 'AJINO-SILLAO 150GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(52, '63', '11', '03', '02', '18', '116300302002', '', '52', 'AJINO-SILLAO 280GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(53, '12', '02', '30', '02', '35', '021203002001', '', '53', 'VINAGRE TINTO FLORIDA 625ML', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(54, '11', '02', '30', '02', '35', '021103002001', '', '54', 'VINAGRE BLANCO FLORIDA 625ML', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(55, '43', '07', '02', '05', '18', '074300205001', '', '55', 'SOPA AJINOMEN SABOR CARNE 80GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(56, '43', '07', '02', '05', '18', '074300205002', '', '56', 'SOPA AJINOMEN SABOR GALLINA 80GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(57, '43', '07', '02', '05', '18', '074300205003', '', '57', 'SOPA AJINOMEN SABOR POLLO 80GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(58, '46', '09', '45', '05', '18', '460904505001', '', '58', 'JABON HUMECTANTE NIVEA CREME CARE 75GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 5),
(59, '02', '01', '06', '07', '58', '010200607001', '', '59', 'TOALLITAS HUMEDAS BABYSEC PREMIUM PAQX50UND', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 5),
(60, '04', '01', '37', '07', '58', '010403707001', '', '60', 'TOALLA HIGIÉNICA LADYSOFT NORMAL PAQX10UND', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 5),
(61, '51', '09', '26', '07', '58', '095102607001', '', '61', 'PAPEL HIGIÉNICO ELITE CELESTE DOBLE HOJA X2UND', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 5),
(62, '48', '09', '38', '02', '35', '094803802001', '', '63', 'LEJÍA TRADICIONAL LIGURIA 636ML', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 5),
(63, '52', '09', '26', '07', '58', '095202607001', '', '64', 'PAPEL TOALLA ELITE ROJO MEGARROLLO X2UND ', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 5),
(64, '53', '09', '64', '09', '35', '095306409001', '', '65', 'LIQUIDO ROSA VANISH SACHET 100ML', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 5),
(65, '53', '09', '64', '09', '35', '095306409002', '', '66', 'LIQUIDO BLANCO VANISH SACHET 100ML', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 5),
(66, '50', '09', '65', '07', '58', '095006507001', '', '67', 'PAÃ‘O YES AZUL X6UND', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 5),
(67, '06', '02', '30', '06', '18', '020603006001', '', '68', 'ATÚN FLORIDA FILETE 170GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(68, '27', '02', '50', '04', '23', '022705004001', '', '69', 'AZUCAR RUBIA PARAMONGA 1K', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(69, '08', '02', '25', '04', '23', '020802504001', '', '70', 'AZUCAR RUBIA DULFINA 1K', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(70, '07', '02', '25', '04', '23', '020702504001', '', '71', 'AZUCAR BLANCA DULFINA 1K', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(71, '10', '02', '27', '04', '23', '021002704001', '', '72', 'EMSAL MARINA CAJA DE 25UND 1K', '', 0, 0, 1, 0,'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(72, '01', '01', '49', '05', '18', '010104905001', '', '73', 'JABON DE TOCADOR PALMOLIVE ALOE Y OLIVA VERDE 120GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 5),
(73, '01', '01', '53', '05', '18', '010105305001', '', '74', 'JABON PROTEX AVENA 120GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 5),
(74, '03', '01', '17', '03', '35', '010301703001', '', '75', 'COLGATE TRIPLE ACCION 75ML', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 5),
(75, '03', '01', '36', '03', '35', '010303603001', '', '76', 'KOLYNOS SUPER BLANCO 75ML', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 5),
(76, '03', '01', '36', '03', '35', '010303603002', '', '77', 'KOLYNOS TRIPLE ACCION 90ML', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 5),
(77, '03', '01', '36', '03', '35', '010303603003', '', '78', 'KOLYNOS SUPER BLANCO 22ML', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 5),
(78, '45', '09', '56', '01', '18', '094505601001', '', '79', 'DETERGENTE SAPOLIO LIMON 150GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 4),
(79, '02', '01', '33', '07', '58', '010203307001', '', '80', 'HUGGIES LIMPIEZA EFECTIVA X16UND', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 5),
(80, '51', '09', '59', '07', '58', '095105907001', '', '81', 'PAPEL HIGIENICO SUAVE VERDE X4 UND', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 5),
(81, '51', '09', '59', '07', '58', '095105907002', '', '82', 'PAPEL HIGIENICO SUAVE VERDE X2 UND', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 5),
(82, '49', '09', '56', '02', '35', '094905602001', '', '83', 'LIMPIATODO FLORAL SAPOLIO 900ML', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 4),
(83, '40', '06', '14', '07', '18', '064001407001', '', '84', 'GALLETA CHIPS AHOY 45GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 2),
(84, '39', '06', '24', '07', '18', '063902407001', '', '85', 'CHOCOLATE DOÃ‘A PEPA 23GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 2),
(85, '39', '06', '20', '07', '18', '063902007001', '', '86', 'CHOCOLATE CUA CUA 18GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 2),
(86, '40', '06', '15', '07', '18', '064001507001', '', '87', 'GALLETA CHOCOSODA 36GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 2),
(87, '40', '06', '47', '07', '18', '064004707001', '', '88', 'GALLETA OREO REGULAR 36GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 2),
(88, '40', '06', '13', '07', '18', '064001307001', '', '89', 'GALLETA CHARADA CLASICA 40GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 2),
(89, '40', '06', '18', '07', '18', '064001807001', '', '90', 'GALLETA CORONITA CHOCOLATE 38GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 2),
(90, '40', '06', '55', '07', '18', '064005507001', '', '91', 'GALLETA RITZ CLASICA 6 UNDS 22.4GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 2),
(91, '40', '06', '55', '07', '18', '064005507002', '', '92', 'GALLETA RITZ TACO 67GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 2),
(92, '17', '03', '58', '10', '18', '031705810001', '', '93', 'OREGANO 3.5GR X3UND', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(93, '14', '03', '58', '10', '18', '031405810001', '', '94', 'AJO MOLIDO AJOSIBA 24GR ', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(94, '20', '03', '58', '10', '18', '032005810001', '', '95', 'SASONADOR SIBARITA 32.4GR X2UND', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(95, '13', '03', '58', '10', '18', '031305810001', '', '96', 'AJI PANQUITA 100GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(96, '12', '02', '29', '02', '35', '021202902001', '', '97', 'VINAGRE TINTO DEL FIRME BOTELLA 1000ML', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(97, '11', '02', '29', '02', '35', '021102902001', '', '98', 'VINAGRE BLANCO DEL FIRME BOTELLA 1000ML', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(98, '21', '03', '58', '10', '18', '032105810001', '', '99', 'TUCO 32.4GR X2UND', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(99, '18', '03', '58', '10', '18', '031805810001', '', '100', 'PALILLO 32.4GR X2UND', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(100, '19', '03', '58', '10', '18', '031905810001', '', '101', 'PIMIENTA 10GR ', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(101, '15', '03', '58', '10', '18', '031505810001', '', '102', 'COMINO 10GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(102, '09', '02', '22', '07', '18', '020902207001', '', '103', 'DON VITTORIO LINGUINI 500GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(103, '09', '02', '44', '07', '18', '020904407001', '', '104', 'SPAGHETTI NICOLINI 500GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(104, '09', '02', '22', '07', '18', '020902207002', '', '105', 'DON VITTORIO CANUTO CHICO 250GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(105, '09', '02', '44', '07', '18', '020904407002', '', '106', 'NICOLINI CODO CHICO 250GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(106, '05', '02', '51', '02', '29', '020505102001', '', '107', 'ACEITE PRIMOR VEGETAL 1L', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(107, '05', '02', '11', '02', '29', '020501102001', '', '108', 'ACEITE CAPRI 1L', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(108, '05', '02', '16', '02', '29', '020501602001', '', '109', 'ACEITE COCINERO 1L', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(109, '06', '02', '51', '06', '18', '020605106001', '', '110', 'ATUN PRIMOR FILETE CAJA 170G', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(110, '42', '07', '09', '01', '18', '074200901001', '', '111', 'CAFE CAFETAL SELECTO 454GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(111, '10', '02', '05', '01', '23', '021000501001', '', '112', 'SAL DE MESA ALPESA 1K', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(112, '60', '11', '04', '09', '18', '116000409001', '', '113', 'ALACENA MAYONESA 190GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(113, '61', '11', '04', '09', '18', '116100409001', '', '114', 'ALACENA MAYONESA LIGHT 500GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(114, '59', '11', '04', '09', '18', '115900409001', '', '115', 'KETCHUP ALACENA 100GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(115, '62', '11', '04', '09', '18', '116200409001', '', '116', 'ALACENA MOSTAZA 100GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(116, '58', '11', '61', '09', '18', '115806109001', '', '117', 'AJI TARI 85GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(117, '58', '11', '61', '09', '18', '115806109002', '', '118', 'AJI TARI 400GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 1),
(118, '55', '10', '07', '07', '23', '105500707001', '', '119', 'HARINA DE TRIGO PREPARADA BLANCA FLOR 1K', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 3),
(119, '57', '10', '42', '07', '18', '105704207001', '', '120', 'MAICENA NEGRITA 180GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 3),
(120, '54', '10', '42', '02', '35', '105404202001', '', '121', 'ESENCIA DE VAINILLA NEGRITA 90ML', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 3),
(121, '45', '09', '08', '01', '18', '094500801001', '', '122', 'DETERGENTE BOLIVAR EVOLUTION 500GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 4),
(122, '45', '09', '46', '01', '18', '094504601001', '', '123', 'OPAL ULTRA 780GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 4),
(123, '46', '09', '08', '07', '18', '094600807001', '', '124', 'JABON BOLIVAR BLANCO PERFECTO 210G', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 5),
(124, '48', '09', '56', '02', '18', '094805602001', '', '125', 'LEJIA ORIGINAL SAPOLIO 500GR + 34%', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 4),
(125, '47', '09', '56', '08', '18', '094705608001', '', '126', 'LAVAVAJILLA LIMON SAPOLIO 900G', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 4),
(126, '49', '09', '56', '02', '35', '094905602002', '', '127', 'LIMPIATODO LAVANDA SAPOLIO 648ML', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 4),
(127, '40', '06', '57', '07', '18', '064005707001', '', '128', 'GALLETA SAYON MARGARITA 163GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 2),
(128, '40', '06', '31', '07', '18', '064003107001', '', '129', 'GALLETA VICTORIA MINI GLACITAS CHOCO 55GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 2),
(129, '40', '06', '31', '07', '18', '064003107002', '', '130', 'GALLETA VICTORIA MINI GLACITAS TOFFEE 55GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 2),
(130, '40', '06', '62', '07', '18', '064006207001', '', '131', 'GALLETA VICTORIA MINI TENTACION CHOCO 75GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 2),
(131, '40', '06', '62', '07', '18', '064006207002', '', '132', 'GALLETA VICTORIA MINI TENTA NARANJA 75GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 2),
(132, '40', '06', '12', '07', '18', '064001207001', '', '133', 'GALLETA VICTORIA CASINO MENTA 43GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 2),
(133, '40', '06', '12', '07', '18', '064001207002', '', '134', 'GALLETA VICTORIA CASINO CHOCOLATE 43GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 2),
(134, '40', '06', '12', '07', '18', '064001207003', '', '135', 'GALLETA VICTORIA CASINO FRESA 35GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 2),
(135, '40', '06', '12', '07', '18', '064001207004', '', '136', 'GALLETA VICTORIA CASINO LUCUMA 43GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 2),
(136, '40', '06', '12', '07', '18', '064001207005', '', '137', 'GALLETA VICTORIA CASINO COCO 43GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 2),
(137, '40', '06', '12', '07', '18', '064001207006', '', '138', 'GALLETA VICTORIA CASINO ALFAJOR 43GR', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO', 2),
(138, '00', '00', '00', '00', '00', '000000000001', '', '00', 'BOLSA BIODEGRADABLE', '', 0, 0, 1, 0, 'SI','', '0000-00-00 00:00:00', '', 'GRA', 'ACTIVADO');



-- ----------------------------
-- Records of banco
-- ----------------------------
INSERT INTO `banco` VALUES (1, '');
INSERT INTO `banco` VALUES (2, 'CONTINENTAL');
INSERT INTO `banco` VALUES (3, 'BCP');
INSERT INTO `banco` VALUES (4, 'INTERBANK');

-- ----------------------------
-- Records of forma_pago
-- ----------------------------
INSERT INTO `forma_pago` VALUES (1, NULL);

-- ----------------------------
-- Records of horario_entrega
-- ----------------------------
INSERT INTO `horario_entrega` VALUES (1, NULL, NULL, NULL, NULL);
INSERT INTO `horario_entrega` VALUES (2, '2020-09-10 08:00:00', '2020-09-10 09:00:00', 0, 'NO DISPONIBLE');
INSERT INTO `horario_entrega` VALUES (3, '2020-09-10 09:00:00', '2020-09-10 10:00:00', 0, 'NO DISPONIBLE');
INSERT INTO `horario_entrega` VALUES (4, '2020-09-10 10:00:00', '2020-09-10 11:00:00', 0, 'NO DISPONIBLE');
INSERT INTO `horario_entrega` VALUES (5, '2020-09-10 11:00:00', '2020-09-10 12:00:00', 0, 'NO DISPONIBLE');
INSERT INTO `horario_entrega` VALUES (6, '2020-09-10 12:00:00', '2020-09-10 13:00:00', 3, 'DISPONIBLE');

-- ----------------------------
-- Records of comprobante_pago
-- ----------------------------
INSERT INTO `comprobante_pago` VALUES (1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `comprobante_pago` VALUES (2, 'P', '2020-09-08', 'F001', '00000001', '10419844808', 'ENZO REYES', NULL, '01', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '', '', '', '', NULL, NULL, NULL, NULL, 1, '');

-- ----------------------------
-- Records of precio_venta_producto
delete from precio_venta_producto;
delete from al_producto;
delete from al_inventario;
-- ----------------------------
select * from precio_venta_producto;


INSERT INTO `precio_venta_producto` VALUES (1, 1, 3.3);
INSERT INTO `precio_venta_producto` VALUES (2, 2, 22);
INSERT INTO `precio_venta_producto` VALUES (3, 3, 16.5);
INSERT INTO `precio_venta_producto` VALUES (4, 4, 2.5);
INSERT INTO `precio_venta_producto` VALUES (5, 5, 5.5);
INSERT INTO `precio_venta_producto` VALUES (6, 6, 2.5);
INSERT INTO `precio_venta_producto` VALUES (7, 7, 1.3);
INSERT INTO `precio_venta_producto` VALUES (8, 8, 1.5);
INSERT INTO `precio_venta_producto` VALUES (9, 9, 1.4);
INSERT INTO `precio_venta_producto` VALUES (10, 10, 0.9);
INSERT INTO `precio_venta_producto` VALUES (11, 11, 1.5);
INSERT INTO `precio_venta_producto` VALUES (12, 12, 3.6);
INSERT INTO `precio_venta_producto` VALUES (13, 13, 3.2);
INSERT INTO `precio_venta_producto` VALUES (14, 14, 3.2);
INSERT INTO `precio_venta_producto` VALUES (15, 15, 2.9);
INSERT INTO `precio_venta_producto` VALUES (16, 16, 2.9);
INSERT INTO `precio_venta_producto` VALUES (17, 17, 2.7);
INSERT INTO `precio_venta_producto` VALUES (18, 18, 3.5);
INSERT INTO `precio_venta_producto` VALUES (19, 19, 3.5);
INSERT INTO `precio_venta_producto` VALUES (20, 20, 3.5);
INSERT INTO `precio_venta_producto` VALUES (21, 21, 8.1);
INSERT INTO `precio_venta_producto` VALUES (22,22, 5);
INSERT INTO `precio_venta_producto` VALUES (23,23, 5.4);
INSERT INTO `precio_venta_producto` VALUES (24,24, 5.6);
INSERT INTO `precio_venta_producto` VALUES (25,25, 6.8);
INSERT INTO `precio_venta_producto` VALUES (26,26, 3.3);
INSERT INTO `precio_venta_producto` VALUES (27,27, 8.3);
INSERT INTO `precio_venta_producto` VALUES (28,28, 4);
INSERT INTO `precio_venta_producto` VALUES (29,29, 2);
INSERT INTO `precio_venta_producto` VALUES (30,30, 5);
INSERT INTO `precio_venta_producto` VALUES (31, 31, 3.5);
INSERT INTO `precio_venta_producto` VALUES (32, 32, 8.1);
INSERT INTO `precio_venta_producto` VALUES (33,33, 5);
INSERT INTO `precio_venta_producto` VALUES (34,34, 5.4);
INSERT INTO `precio_venta_producto` VALUES (35,35, 5.6);
INSERT INTO `precio_venta_producto` VALUES (36,36, 6.8);
INSERT INTO `precio_venta_producto` VALUES (37,37, 3.3);
INSERT INTO `precio_venta_producto` VALUES (38,38, 8.3);
INSERT INTO `precio_venta_producto` VALUES (39,39, 4);
INSERT INTO `precio_venta_producto` VALUES (40,40, 2);
INSERT INTO `precio_venta_producto` VALUES (41,41, 2);
INSERT INTO `precio_venta_producto` VALUES (42,42, 2);
INSERT INTO `precio_venta_producto` VALUES (43,43, 4);
INSERT INTO `precio_venta_producto` VALUES (44,44, 5);
INSERT INTO `precio_venta_producto` VALUES (45,45, 6);
INSERT INTO `precio_venta_producto` VALUES (46,46, 4);
INSERT INTO `precio_venta_producto` VALUES (47,47, 3);
INSERT INTO `precio_venta_producto` VALUES (48,48, 2);
INSERT INTO `precio_venta_producto` VALUES (49,49, 1);
INSERT INTO `precio_venta_producto` VALUES (50,50, 1);
INSERT INTO `precio_venta_producto` VALUES (51,51, 2);
INSERT INTO `precio_venta_producto` VALUES (52,52, 1);
INSERT INTO `precio_venta_producto` VALUES (53,53, 5);
INSERT INTO `precio_venta_producto` VALUES (54,54, 6);
INSERT INTO `precio_venta_producto` VALUES (55,55, 4);
INSERT INTO `precio_venta_producto` VALUES (56,56, 3);
INSERT INTO `precio_venta_producto` VALUES (57,57, 2);
INSERT INTO `precio_venta_producto` VALUES (58,58, 4);
INSERT INTO `precio_venta_producto` VALUES (59,59, 5);
INSERT INTO `precio_venta_producto` VALUES (60,60, 7);
INSERT INTO `precio_venta_producto` VALUES (61,61, 8);
INSERT INTO `precio_venta_producto` VALUES (62,62, 8);
INSERT INTO `precio_venta_producto` VALUES (63,63, 1);
INSERT INTO `precio_venta_producto` VALUES (64,64, 2);
INSERT INTO `precio_venta_producto` VALUES (65,65, 1.5);
INSERT INTO `precio_venta_producto` VALUES (66,66, 2);
INSERT INTO `precio_venta_producto` VALUES (67,67, 2);
INSERT INTO `precio_venta_producto` VALUES (68,68, 11);
INSERT INTO `precio_venta_producto` VALUES (69,69, 15);
INSERT INTO `precio_venta_producto` VALUES (70,70, 5.2);
INSERT INTO `precio_venta_producto` VALUES (71,71, 1);
INSERT INTO `precio_venta_producto` VALUES (72,72, 2);
INSERT INTO `precio_venta_producto` VALUES (73,73, 1);
INSERT INTO `precio_venta_producto` VALUES (74,74, 2);
INSERT INTO `precio_venta_producto` VALUES (75,75, 3);
INSERT INTO `precio_venta_producto` VALUES (76,76, 4);
INSERT INTO `precio_venta_producto` VALUES (77,77, 5);
INSERT INTO `precio_venta_producto` VALUES (78,78, 6);
INSERT INTO `precio_venta_producto` VALUES (79,79, 5);
INSERT INTO `precio_venta_producto` VALUES (80,80, 4);
INSERT INTO `precio_venta_producto` VALUES (81,81, 3);
INSERT INTO `precio_venta_producto` VALUES (82,82, 2);
INSERT INTO `precio_venta_producto` VALUES (83,83, 1);
INSERT INTO `precio_venta_producto` VALUES (84,84, 1);
INSERT INTO `precio_venta_producto` VALUES (85,85, 2);
INSERT INTO `precio_venta_producto` VALUES (86,86, 3);
INSERT INTO `precio_venta_producto` VALUES (87,87, 4);
INSERT INTO `precio_venta_producto` VALUES (88,88, 5);
INSERT INTO `precio_venta_producto` VALUES (89,89, 6);
INSERT INTO `precio_venta_producto` VALUES (90,90, 7);
INSERT INTO `precio_venta_producto` VALUES (91,91, 6);
INSERT INTO `precio_venta_producto` VALUES (92,92, 5);
INSERT INTO `precio_venta_producto` VALUES (93,93, 4);
INSERT INTO `precio_venta_producto` VALUES (94,94, 4);
INSERT INTO `precio_venta_producto` VALUES (95,95, 3);
INSERT INTO `precio_venta_producto` VALUES (96,96, 3);
INSERT INTO `precio_venta_producto` VALUES (97,97, 2);
INSERT INTO `precio_venta_producto` VALUES (98,98, 2);
INSERT INTO `precio_venta_producto` VALUES (99,99, 1);
INSERT INTO `precio_venta_producto` VALUES (100,100, 1);
INSERT INTO `precio_venta_producto` VALUES (101,101, 1);
INSERT INTO `precio_venta_producto` VALUES (102,102, 2);
INSERT INTO `precio_venta_producto` VALUES (103,103, 3);
INSERT INTO `precio_venta_producto` VALUES (104,104, 4);
INSERT INTO `precio_venta_producto` VALUES (105,105, 5);
INSERT INTO `precio_venta_producto` VALUES (106,106, 6);
INSERT INTO `precio_venta_producto` VALUES (107,107, 7);
INSERT INTO `precio_venta_producto` VALUES (108,108, 6);
INSERT INTO `precio_venta_producto` VALUES (109,109, 5);
INSERT INTO `precio_venta_producto` VALUES (110,110, 4);
INSERT INTO `precio_venta_producto` VALUES (111,111, 1);
INSERT INTO `precio_venta_producto` VALUES (112,112, 2);
INSERT INTO `precio_venta_producto` VALUES (113,113, 3);
INSERT INTO `precio_venta_producto` VALUES (114,114, 2);
INSERT INTO `precio_venta_producto` VALUES (115,115, 4);
INSERT INTO `precio_venta_producto` VALUES (116,116, 3);
INSERT INTO `precio_venta_producto` VALUES (117,117, 2);
INSERT INTO `precio_venta_producto` VALUES (118,118, 1);
INSERT INTO `precio_venta_producto` VALUES (119,119, 1);
INSERT INTO `precio_venta_producto` VALUES (120,120, 1);
INSERT INTO `precio_venta_producto` VALUES (121,121, 2);
INSERT INTO `precio_venta_producto` VALUES (122,122, 2);
INSERT INTO `precio_venta_producto` VALUES (123,123, 3);
INSERT INTO `precio_venta_producto` VALUES (124,124, 4);
INSERT INTO `precio_venta_producto` VALUES (125,125, 5);
INSERT INTO `precio_venta_producto` VALUES (126,126, 5);
INSERT INTO `precio_venta_producto` VALUES (127,127, 4);
INSERT INTO `precio_venta_producto` VALUES (128,128, 1);
INSERT INTO `precio_venta_producto` VALUES (129,129, 2);
INSERT INTO `precio_venta_producto` VALUES (130,130, 2);
INSERT INTO `precio_venta_producto` VALUES (131,131, 1);
INSERT INTO `precio_venta_producto` VALUES (132,132, 1);
INSERT INTO `precio_venta_producto` VALUES (133,133, 5);
INSERT INTO `precio_venta_producto` VALUES (134,134, 4);
INSERT INTO `precio_venta_producto` VALUES (135,135, 4);
INSERT INTO `precio_venta_producto` VALUES (136,136, 3);
INSERT INTO `precio_venta_producto` VALUES (137,137, 2);
INSERT INTO `precio_venta_producto` VALUES (138,138, 4);


select * from al_producto;

-- ----------------------------
-- Records of pedido
-- ----------------------------
INSERT INTO `pedido` VALUES (1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `pedido` VALUES (15, '000005', 1, '2020-09-15 00:00:00', '2020-09-10 00:00:00', 330, 0.00, 0.00, 0.00, 962.00, 0.00, 0.00, 962.00, '', 'PENDIENTE', '', '', '2020-09-15 21:18:16', NULL, 5, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `pedido` VALUES (16, '000002', 1, '2020-09-15 00:00:00', '2020-09-10 00:00:00', 150, 0.00, 0.00, 0.00, 434.00, 0.00, 0.00, 434.00, '', 'PENDIENTE', '', '', '2020-09-15 21:41:39', NULL, 5, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `pedido` VALUES (17, '000003', 1, '2020-09-18 00:00:00', '2020-09-10 00:00:00', 80, 0.00, 0.00, 0.00, 230.00, 0.00, 0.00, 230.00, '', 'PENDIENTE', '', '', '2020-09-18 18:04:08', '2020-09-20 04:48:11', 6, 'DFSDD', 'GGGASAS', '150130', 9, 4, 3, '01', '10419844808', 'ENZO REYES', 'CONDOMINIO ALAMEDA COLONIAL EDIF 2 DPTO 204\nCALLAO');
INSERT INTO `pedido` VALUES (18, '', 1, '2020-09-19 00:00:00', '2020-09-10 00:00:00', 22, 0.00, 0.00, 0.00, 66.20, 0.00, 0.00, 66.20, '', 'PENDIENTE', '', '', '2020-09-19 23:53:11', NULL, 6, '', '', '', 1, 1, 1, '', '', '', '');

-- ----------------------------
-- Records of al_inventario
-- ----------------------------
select * from al_inventario;
delete from al_inventario;

INSERT INTO `al_inventario` VALUES (530, 0, 0, 1, 1, 12, 1, 1, 58, 120.000, 0.000, 0.000, 1.67, 200.00, 'INGRESO', 'SI', 'I', '', NULL, NULL, NULL);
INSERT INTO `al_inventario` VALUES (531, 0, 0, 1, 1, 12, 1, 1, 58, 120.000, 0.000, 0.000, 1.50, 180.00, 'INGRESO', 'SI', 'I', '', NULL, NULL, NULL);
INSERT INTO `al_inventario` VALUES (532, 0, 0, 1, 1, 12, 1, 1, 58, 140.000, 0.000, 80.000, 1.43, 200.00, 'INGRESO', 'SI', 'I', '', NULL, NULL, NULL);
INSERT INTO `al_inventario` VALUES (533, 0, 0, 1, 1, 13, 1, 1, 58, 40.000, 0.000, 0.000, 0.50, 20.00, 'INGRESO', 'SI', 'I', '', NULL, NULL, NULL);
INSERT INTO `al_inventario` VALUES (534, 0, 0, 1, 1, 13, 1, 1, 58, 144.000, 0.000, 0.000, 1.39, 200.00, 'INGRESO', 'SI', 'I', '', NULL, NULL, NULL);
INSERT INTO `al_inventario` VALUES (535, 0, 0, 1, 1, 13, 1, 1, 58, 130.000, 0.000, 44.000, 1.54, 200.00, 'INGRESO', 'SI', 'I', '', NULL, NULL, NULL);
INSERT INTO `al_inventario` VALUES (536, 0, 0, 15, 1, 12, 1, 2, 58, -190.000, 190.000, 0.000, 0.00, 0.00, 'PEDIDO', 'SI', 'S', '', 'C', 3.00, 570.00);
INSERT INTO `al_inventario` VALUES (537, 0, 0, 15, 1, 13, 1, 3, 58, -140.000, 140.000, 0.000, 0.00, 0.00, 'PEDIDO', 'SI', 'S', '', 'C', 2.80, 392.00);
-- 
INSERT INTO `al_inventario` VALUES (538, 536, 530, 15, NULL, 12, 1, 2, 58, NULL, 120.000, NULL, 1.67, NULL, 'SALIDA', NULL, 'S', NULL, 'D', 3.00, NULL);
INSERT INTO `al_inventario` VALUES (539, 536, 531, 15, NULL, 12, 1, 2, 58, NULL, 70.000, NULL, 1.50, NULL, 'SALIDA', NULL, 'S', NULL, 'D', 3.00, NULL);
INSERT INTO `al_inventario` VALUES (540, 537, 533, 15, NULL, 13, 1, 3, 58, NULL, 40.000, NULL, 0.50, NULL, 'SALIDA', NULL, 'S', NULL, 'D', 2.80, NULL);
INSERT INTO `al_inventario` VALUES (541, 537, 534, 15, NULL, 13, 1, 3, 58, NULL, 100.000, NULL, 1.39, NULL, 'SALIDA', NULL, 'S', NULL, 'D', 2.80, NULL);
INSERT INTO `al_inventario` VALUES (542, 0, 0, 16, 1, 12, 1, 2, 58, -70.000, 70.000, 0.000, 0.00, 0.00, 'PEDIDO', 'SI', 'S', '', 'C', 3.00, 210.00);
INSERT INTO `al_inventario` VALUES (543, 0, 0, 16, 1, 13, 1, 3, 58, -80.000, 80.000, 0.000, 0.00, 0.00, 'PEDIDO', 'SI', 'S', '', 'C', 2.80, 224.00);
INSERT INTO `al_inventario` VALUES (544, 542, 531, 16, NULL, 12, 1, 2, 58, NULL, 50.000, NULL, 1.50, NULL, 'SALIDA', NULL, 'S', NULL, 'D', 3.00, NULL);
INSERT INTO `al_inventario` VALUES (545, 542, 532, 16, NULL, 12, 1, 2, 58, NULL, 20.000, NULL, 1.43, NULL, 'SALIDA', NULL, 'S', NULL, 'D', 3.00, NULL);
INSERT INTO `al_inventario` VALUES (546, 543, 534, 16, NULL, 13, 1, 3, 58, NULL, 44.000, NULL, 1.39, NULL, 'SALIDA', NULL, 'S', NULL, 'D', 2.80, NULL);
INSERT INTO `al_inventario` VALUES (547, 543, 535, 16, NULL, 13, 1, 3, 58, NULL, 36.000, NULL, 1.54, NULL, 'SALIDA', NULL, 'S', NULL, 'D', 2.80, NULL);
INSERT INTO `al_inventario` VALUES (548, 0, 0, 17, 9, 12, 1, 2, 58, -30.000, 30.000, 0.000, 0.00, 0.00, 'PEDIDO', 'SI', 'S', '', 'C', 3.00, 90.00);
INSERT INTO `al_inventario` VALUES (549, 0, 0, 17, 9, 13, 1, 3, 58, -50.000, 50.000, 0.000, 0.00, 0.00, 'PEDIDO', 'SI', 'S', '', 'C', 2.80, 140.00);
INSERT INTO `al_inventario` VALUES (550, 548, 532, 17, 9, 12, 1, 2, 58, NULL, 30.000, NULL, 1.43, NULL, 'SALIDA', NULL, 'S', NULL, 'D', 3.00, NULL);
INSERT INTO `al_inventario` VALUES (551, 549, 535, 17, 9, 13, 1, 3, 58, NULL, 50.000, NULL, 1.54, NULL, 'SALIDA', NULL, 'S', NULL, 'D', 2.80, NULL);
INSERT INTO `al_inventario` VALUES (554, 0, 0, 1, 1, 18, 1, 1, 58, 100.000, 0.000, 100.000, 0.50, 50.00, 'INGRESO', 'NO', 'I', '', NULL, NULL, NULL);
INSERT INTO `al_inventario` VALUES (555, 0, 0, 18, 1, 12, 1, 2, 58, -10.000, 10.000, 0.000, 0.00, 0.00, 'PEDIDO', 'SI', 'S', '', 'C', 3.00, 30.00);
INSERT INTO `al_inventario` VALUES (556, 555, 532, 18, NULL, 12, 1, 2, 58, NULL, 10.000, NULL, 1.43, NULL, 'SALIDA', NULL, 'S', NULL, 'D', 3.00, NULL);
INSERT INTO `al_inventario` VALUES (557, 0, 0, 18, 1, 18, 1, 4, 58, 0.000, 2.000, 0.000, 0.00, 0.00, 'PEDIDO', 'NO', 'S', '', 'C', 0.60, 1.20);
INSERT INTO `al_inventario` VALUES (558, 0, 0, 1, 1, 12, 1, 1, 58, 120.000, 0.000, 120.000, 1.67, 200.00, 'INGRESO', 'SI', 'I', '', NULL, NULL, NULL);


INSERT INTO `forma_pago` VALUES (1, 'EFECTIVO');
INSERT INTO `forma_pago` VALUES (2, 'POS');
INSERT INTO `forma_pago` VALUES (3, 'PLIN');
INSERT INTO `forma_pago` VALUES (4, 'TRANSFERENCIA BANCARIA');
INSERT INTO `forma_pago` VALUES (5, 'YAPE');


SET SQL_SAFE_UPDATES = 0;

select * from al_inventario;

-- PROCEDIMIENTOS ALMACENADOS

-- 1. Registrar o actualizar datos del cliente

DELIMITER $$ 
create procedure p_registrar_actualizar_datos_clientes
														(
															in p_tipo_cliente char(1),
                                                            in p_tipo_documento varchar(6),
                                                            in p_nro_documento varchar(11),
                                                            in p_nombre varchar(100),
                                                            in p_nombre_comercial varchar(200),
                                                            in p_telefono_fijo varchar(100),
                                                            in p_telefono_celular varchar(100),
                                                            in p_fecha_nacimiento date,
                                                            in p_direccion varchar(250),
                                                            in p_correo varchar(200),
                                                            in p_cod_distrito varchar(6)
                                                        )
begin
	declare p_estado int; /* 0: registrar; 1: actualizar */
    declare p_correlativo_cliente int;
/* Iniciamos el valor del p_estado */
	select count(*) into p_estado from cliente where correo = p_correo;
   select 
			(c.numero+1 ) into p_correlativo_cliente
		from 
			correlativo c 
		where 
			c.tabla = 'cliente';
    
    if p_estado = 0 then 
		insert into cliente
							(
								id_cliente,
								tipo_cliente, 
								tipo_documento, 
								nro_documento, 
								nombre, 
								nombre_comercial, 
								telefono_fijo,
								telefono_celular,
								fecha_nacimiento,
								direccion, 
								cod_distrito
                            )
		values(
				p_correlativo_cliente, 
                p_tipo_cliente, 
                p_tipo_documento, 
                p_nro_documento, 
                p_nombre, 
                p_nombre_comercial, 
                p_telefono_fijo,
                p_telefono_celular,
                p_fecha_nacimiento,
                p_direccion, 
                p_cod_distrito
			);
	else
		update cliente
        set 
			tipo_cliente     = p_tipo_cliente,
			tipo_documento 	 = p_tipo_documento,
            nro_documento  	 = p_nro_documento,
            nombre 			 = p_nombre,
            nombre_comercial = p_nombre_comercial,
            telefono_fijo 	 = p_telefono_fijo,
            telefono_celular = p_telefono_celular,
            fecha_nacimiento = p_fecha_nacimiento,
			direccion 		 = p_direccion,
			correo 			 = p_correo,
            cod_distrito 	 = p_cod_distrito
		where
			correo = p_correo;
	end if;


end$$


select * from cliente;
-- 2. Correlativo

(call f_generar_correlativo('cliente')  n;

DELIMITER $$ 
CREATE procedure f_generar_correlativo(in p_tabla character varying(100))

begin
	
		select 
			c.numero+1 
		from 
			correlativo c 
		where 
			c.tabla = p_tabla;
end$$
select * from al_inventario

delete from al_inventario
where id_inventario  = 95;

delete from pedido
where id_pedido = 38;

delete from al_inventario
where id_pedido = 38;

call f_add_car(12, 1, 1);

select * from al_inventario;

DELIMITER $$ 
CREATE procedure f_add_car(
							-- in p_producto_id int,
                            in p_descripcion varchar(200),
                            in p_cant decimal(13,3),
                            in p_id_cliente int
                            )

begin
declare estado_pedido varchar(20);
declare p_precio decimal(12,2);
declare id_pedido_estado int; -- identifica, 0: sin registros(registrar) y 1: con registros (actualizar)
declare p_pedido_id int;
declare precio_venta_total decimal(12,2); 
declare p_estado_registro int;
declare p_id_precio_venta_producto int;
declare p_id_unidad_medida int;
declare p_producto_id int;
-- declare p_id_inventario int;

select id_producto into p_producto_id from al_producto where descripcion = p_descripcion;
select count(*) into id_pedido_estado from pedido where id_cliente = p_id_cliente and estado = 'carrito'; -- 1 / 0: no hay registro

select precio into p_precio from precio_venta_producto where id_producto = p_producto_id; -- 3.00 / 12 id producto

select id_precio_venta_producto into p_id_precio_venta_producto from precio_venta_producto where id_producto = p_producto_id; 

        if id_pedido_estado = 0 then
			insert into pedido (id_cliente, estado)
			values(p_id_cliente, 'CARRITO');
			
            select id_pedido into p_pedido_id from pedido where id_cliente = p_id_cliente and estado = 'carrito';
			select estado into estado_pedido from pedido where id_cliente = p_id_cliente and estado = 'carrito';
            select id_producto into p_producto_id from al_producto where descripcion = p_descripcion;
            
            select id_unidad_medida into p_id_unidad_medida from al_producto where id_producto = p_producto_id;
			
            insert into al_inventario(id_pedido, id_producto, cantidad, precio_venta, total_venta, id_precio_venta_producto, id_inventario_deta, id_inventario_padre, id_comprobante_pago, id_proveedor, id_unidad_medida, stock_actual, precio_costo, total_costo, estado, paraventa, tipo_transaccion, tipo_salida, cantidad_salida)
			values(p_pedido_id, p_producto_id, p_cant, p_precio, (p_cant * p_precio), p_id_precio_venta_producto, 0,0,1,1,p_id_unidad_medida,0.00,0.00,0.00,'CARRITO','SI','S','C', p_cant);
				-- insert into al_inventario(id_pedido, id_producto, cantidad, precio_venta, total_venta, id_precio_venta_producto, estado, id_unidad_medida)
				-- values(p_pedido_id, p_producto_id, p_cant, p_precio, (p_cant * p_precio), p_id_precio_venta_producto, 'CARRITO', p_id_unidad_medida);
                
		else
			select id_pedido into p_pedido_id from pedido where id_cliente = p_id_cliente and estado = 'carrito'; -- 30
            select id_producto into p_producto_id from al_producto where descripcion = p_descripcion;
            select count(*) into p_estado_registro from al_inventario where id_producto = p_producto_id and id_pedido = p_pedido_id; -- si el producto no se encuentra en al_inventario entonces registra si nó, update.
            if p_estado_registro = 0 then
            select id_producto into p_producto_id from al_producto where descripcion = p_descripcion;
				insert into al_inventario(id_pedido, id_producto, cantidad, precio_venta, total_venta, id_precio_venta_producto, id_inventario_deta, id_inventario_padre, id_comprobante_pago, id_proveedor, id_unidad_medida, stock_actual, precio_costo, total_costo, estado, paraventa, tipo_transaccion, tipo_salida, cantidad_salida)
				values(p_pedido_id, p_producto_id, p_cant, p_precio, (p_cant * p_precio), p_id_precio_venta_producto, 0,0,1,1,58,0.00,0.00,0.00,'CARRITO','SI','S','C', p_cant);
			else
            select id_producto into p_producto_id from al_producto where descripcion = p_descripcion;
				update 
					al_inventario
				set
                    cantidad_salida			= p_cant,
					cantidad 				= p_cant,
					total_venta 			= (p_cant * p_precio)
				where
					id_producto = p_producto_id;
			end if;
		end if;
end$$

call f_add_car('LECHE CONDENSADA NESTLÉ TARRO 393GR', 2, 1);

SELECT * FROM pedido;
SELECT * FROM cliente;

	
delete from AL_INVENTARIO;

call f_add_pedido('13', 2, 1);

DELIMITER $$ 
CREATE procedure f_add_pedido(
							in p_cod_distrito varchar(6), 
                            in p_dir_entrega varchar(250), 
                            in p_ref_entrega varchar(250), 
                            in p_obs text, 
                            in p_tipo_pago int,
                            in p_nro_documento varchar(11)
                            )

begin

declare p_cant decimal(13,3);
declare p_total_venta decimal(13,2); 
declare p_id_pedido int;
						
                        select 
							p.id_pedido into p_id_pedido
						from
							cliente c inner join pedido p 
						on
							c.id_cliente = p.id_cliente
						where
							c.nro_documento = p_nro_documento and p.estado = 'CARRITO';
                        
						select sum(cantidad) into p_cant from al_inventario where id_pedido = p_id_pedido;
                        select sum(total_venta) into p_total_venta from al_inventario where id_pedido = p_id_pedido;
                        
							update 
								al_inventario
                            set
								estado = 'PEDIDO COMPLETADO'
                            where
								id_pedido = p_id_pedido;
                                
							update 
								pedido
                            set
								 
								 fecha_pedido = (select now()),
								 fecha_entrega = (select now()),
								 cantidad_productos = p_cant,
								 gravado = 0.00,
								 inafecto = 0.00 ,
								 exonerado = 0.00,
								 subtotal = p_total_venta,
								 igv = 0.00,
								 redondeo = 0.00,
								 importe_total = p_total_venta,
								 observacion = p_obs,
								 estado = 'PEDIDO COMPLETADO',								 
								 -- fecha_creacion = '2020-09-19 23:53:11',
								 fecha_creacion = (select now()),
								 id_horario_entrega = 6,
								 direccion_entrega = p_dir_entrega,
								 referencia_entrega = p_ref_entrega,
								 cod_distrito = p_cod_distrito,
								 id_comprobante_pago = 1,
								 id_forma_pago = p_tipo_pago,
								 id_banco = 1
							where
								id_pedido = p_id_pedido;
                                
end$$



                    
                    
                    
                    