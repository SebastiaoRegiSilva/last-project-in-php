-- Criar o banco de dados.
create database biblioteca;
-- Usar o banco de dados.
use biblioteca;
-- Criar a tabela com as suas propriedades.
create table livro(
    id int primary key auto_increment primary key,
    nomeLivro varchar(100) not null,
    nomeAutor varchar(100) not null,
    fotoCapa longblob,
    ISBM varchar(17),
    editora varchar(30) not null
);
-- Criar uma tabela dos usuários com as suas propriedades.
-- Nível de permissão vai diferenciar os usuários comuns dos administradores. 
create table usuario(
    id int auto_increment primary key,
    login varchar(10) not null,
    senha varchar(100) not null,
    permissao char(1) not null
);

-- #IMPORTANTE
-- Um super usuário vai ser cadastrado via query sql para viabilizar a navegação inicial no projeto.
INSERT INTO `biblioteca`.`usuario` (`login`, `senha`, `permissao`) VALUES ('admim', '123456', 'A');
INSERT INTO `biblioteca`.`usuario` (`login`, `senha`, `permissao`) VALUES ('jonas', '123456', 'C');
INSERT INTO `biblioteca`.`usuario` (`login`, `senha`, `permissao`) VALUES ('andre', '123456', 'A');
INSERT INTO `biblioteca`.`usuario` (`login`, `senha`, `permissao`) VALUES ('excluir', '123456', 'C');

-- Inserir um livro modelo na base.
INSERT INTO `biblioteca`.`livro`(`nomeLivro`,`nomeAutor`,`ISBM`,`editora`)VALUES("Do Mil ao Milhão. Sem Cortar o Cafezinho. ", "Thiago Nigro","666","HarperCollins");
INSERT INTO `biblioteca`.`livro`(`nomeLivro`,`nomeAutor`,`ISBM`,`editora`)VALUES("Teste de Cadastro", "Paulo Vilhena","6164584","Mundo Vivo");
INSERT INTO `biblioteca`.`livro`(`nomeLivro`,`nomeAutor`,`ISBM`,`editora`)VALUES("Rei dos piratas", "Eduardo Vasconcellos","94614","Quebra onda");


-- Criar a tabela com os suas propriedades.
create table emprestimo(
    id int auto_increment primary key,
    idUsuario  int null,
    idLivro int not null,
    permitido bool not null,
    dataInicial TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP, -- Insere da data do ato do empréstimo. Verificar na base como esse tipo de dado se comporta.
	dataFinal date,
    foreign key(idUsuario) references usuario(id),
    foreign key(idLivro) references livro(id)
);

select * from usuario;