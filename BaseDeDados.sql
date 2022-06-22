-- Criar o banco de dados.
create database biblioteca;
-- Usar o banco de dados.
use biblioteca;
-- Criar a tabela com os suas propriedades.
create table livro(
    id int primary key auto_increment primary key,
    nomeLivro varchar(100) not null,
    nomeAutor varchar(100) not null,
    fotoCapa longblob,
    ISBM varchar(17),
    editora varchar(30) not null
);
-- Criar a tabela com os suas propriedades.
create table usuario(
    id int auto_increment primary key,
    login varchar(10) not null,
    senha varchar(100) not null,
    permissao char(1) not null
);

-- #IMPORTANTE
-- Um super usuário vai ser cadastrado via query sql para viabilizar a navegação inicial no projeto.

-- Criar a tabela com os suas propriedades.
create table emprestimo(
    id int auto_increment primary key,
    idUsuario  int,
    idLivro int,
    dataInicial TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP, -- Insere da data do ato do empréstimo. Verificar na base como esse tipo de dado se comporta.
	dataFinal date,
    foreign key(idUsuario) references usuario(id),
    foreign key(idLivro) references livro(id)
);
-- Descrição das colunas de uma tabela.
show COLUMNS from <nomeDaTabela>;