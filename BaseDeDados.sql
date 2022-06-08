create database livraria;
use livraria;

create table livro(
    id int primary key auto_increment primary key,
    nomeLivro varchar(100) not null,
    nomeAutor varchar(100) not null,
    fotoCapa longblob,
    ISBM varchar(17),
    editora varchar(30) not null
);

create table usuario(
    id int auto_increment primary key,
    login varchar(10),
    senha varchar(100),
    permissao char(1)
);

create table visualizacao(
    id int auto_increment primary key,
    idUsuario  int,
    idLivro int,
    data date,
    hora time,
    foreign key(idUsuario) references usuario(id),
    foreign key(idLivro) references livro(id)
);