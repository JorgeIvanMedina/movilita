/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     22/09/2017 10:44:31                          */
/*==============================================================*/


drop table if exists HISTORIAL;

drop table if exists USUARIO;

/*==============================================================*/
/* Table: HISTORIAL                                             */
/*==============================================================*/
create table HISTORIAL
(
   IDENTIFICADOR        char(10) not null,
   NICKMANE             varchar(30) not null,
   FECHA_ACCESO         timestamp not null,
   primary key (IDENTIFICADOR)
);

/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
create table USUARIO
(
   NICKMANE             varchar(30) not null,
   NAME                 varchar(30) not null,
   PASSWORD             varchar(50) not null,
   E_MAIL               varchar(30) not null,
   CELL_PHONE           bigint not null,
   TYPE                 int not null,
   FECHA_REGISTRO       timestamp not null,
   ESTADO               int not null,
   primary key (NICKMANE)
);

alter table HISTORIAL add constraint FK_PERTENECE foreign key (NICKMANE)
      references USUARIO (NICKMANE) on delete restrict on update restrict;

