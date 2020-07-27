create database if not exists dawm_db;

# use dawm_db;
use dawm_db;

create table if not exists Employes
(
    id       int auto_increment not null,
    prenom   varchar(50)        not null,
    ddn      date,
    fonction varchar(25)        not null,
    email    varchar(50)        not null,
    salaire  int                not null,
    constraint pk_employes primary key (id),
    constraint uq_prenom_employes unique (prenom),
    constraint uq_email_employes unique (email)
);


insert into Employes(prenom, ddn, fonction, email, salaire)
values ('Badji', '2010-10-10', 'pdg', 'badji@dawm.as', 75000),
       ('Toulepi', '2010-10-10', 'dg', 'toulepi@dawm.as', 65000),
       ('Aouakas', '2010-10-10', 'rh', 'aouakas@dawm.as', 60000),
       ('Soulaimane', '2010-10-10', 'dsi', 'soulaimane@dawm.as', 55000),
       ('Bakary', '2010-10-10', 'rh', 'bakary@dawm.as', 60000),
       ('Talia', '2010-10-10', 'pdg', 'talia@dawm.as', 750000),
       ('Sabrine', '2010-10-10', 'rh', 'sabrine@dawm.as', 60000);

drop table Employes;
