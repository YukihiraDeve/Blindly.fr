create table projetannuel.Connexion
(
    email varchar(50) not null,
    id    int         not null,
    date  varchar(50) not null
);

create table projetannuel.DESSIN_ANIME
(
    id          int auto_increment primary key,
    nom         varchar(30) not null,
    categorie   varchar(30) not null,
    cleCryptage int not null
);

create table projetannuel.POP
(
    id          int auto_increment primary key,
    musique     varchar(50) not null,
    nom         varchar(30) not null,
    categorie   varchar(30) not null,
    cleCryptage int not null
);

create table projetannuel.RAP
(
    id          int auto_increment primary key,
    musique     varchar(100) not null,
    nom         varchar(30)  not null,
    categorie   varchar(30) not null,
    cleCryptage int not null
);

create table projetannuel.ROCK
(
    id          int auto_increment primary key,
    musique     varchar(50) not null,
    nom         varchar(30) not null,
    categorie   varchar(30) not null,
    cleCryptage int not null
);

create table projetannuel.users
(
    id               int auto_increment primary key not null,
    email            varchar(50) not null,
    pseudo           varchar(50) not null,
    password         varchar(50) not null,
    validate         int default 0 not null,
    admin            int default 0 not null,
    total_score      int default 0,
    game_played      int default 0,
    latitude         varchar(20) default null,
    longitude        varchar(20) default null,
    image            varchar(100) default 'slimani.png' ,
    date_inscription varchar(20)  default '16/01/2021',
    top              int default 0   
);
