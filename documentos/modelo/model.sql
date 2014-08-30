/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     18-08-2014 11:48:29                          */
/*==============================================================*/


drop table if exists TBL_ACTIVIDAD;

drop table if exists TBL_IMAGEN;

drop table if exists TBL_TIPO_ACTIVIDAD;

drop table if exists TBL_CLIENTES;

/*==============================================================*/
/* Table: TBL_ACTIVIDAD                                         */
/*==============================================================*/
create table TBL_ACTIVIDAD
(
   ID_ACTIVIDAD         int not null,
   ID_TIPO_ACTIVIDAD    int,
   NOMBRE_ACTIVIDAD     varchar(100),
   RESUMEN              varchar(1000),
   DESCRIPCION          varchar(80000),
   IMAGEN_RESUMEN       varchar(300),
   IMAGEN_RESUMEN_CHICA varchar(300),
   URL_WEB              varchar(300),
   ACTIVA               bit,
   primary key (ID_ACTIVIDAD)
);

/*==============================================================*/
/* Table: TBL_IMAGEN                                            */
/*==============================================================*/
create table TBL_IMAGEN
(
   ID_IMAGEN            int not null auto_increment,
   ID_ACTIVIDAD         int,
   URL_IMAGEN           varchar(300),
   ES_PRINCIPAL         bit,
   primary key (ID_IMAGEN)
);

/*==============================================================*/
/* Table: TBL_TIPO_ACTIVIDAD                                    */
/*==============================================================*/
create table TBL_TIPO_ACTIVIDAD
(
   ID_TIPO_ACTIVIDAD    int not null,
   NOMBRE_TIPO_ATIVIDAD varchar(50),
   primary key (ID_TIPO_ACTIVIDAD)
);

/*==============================================================*/
/* Table: TBL_CLIENTES                                            */
/*==============================================================*/
create table TBL_CLIENTES
(
   ID_CLIENTE      int not null auto_increment,
   NOMBRE          varchar(100),
   EMAIL           varchar(100),
   TELEFONO        varchar(100),
   ASUNTO          varchar(100),
   COMENTARIO      varchar(5000),
   FECHA_CREACION  date,
   primary key (ID_CLIENTE)
);

alter table TBL_ACTIVIDAD add constraint FK_REFERENCE_1 foreign key (ID_TIPO_ACTIVIDAD)
      references TBL_TIPO_ACTIVIDAD (ID_TIPO_ACTIVIDAD) on delete restrict on update restrict;

alter table TBL_IMAGEN add constraint FK_REFERENCE_2 foreign key (ID_ACTIVIDAD)
      references TBL_ACTIVIDAD (ID_ACTIVIDAD) on delete restrict on update restrict;

