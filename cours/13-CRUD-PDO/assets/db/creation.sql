create database if not exists formation_db;

use formation_db;

create table if not exists Employes
(
    id      int auto_increment not null,
    prenom  varchar(50)        not null,
    ddn     date,
    fonction   varchar(25)        not null,
    email   varchar(50)        not null,
    salaire int                not null,
    constraint pk_employe primary key (id),
    constraint uq_prenom_employe unique (prenom),
    constraint uq_email_employe unique (email)
);