<?php
    /**
    * Classe responsável pela persistência de dados dentro da aplicação.
    */ 
    abstract class Banco
    {
        /**
        * Salva os dados cadastrados na base de dados.
        */ 
        abstract public function save();
        
        /**
        * Remove os dados cadastrados na base de dados com base no código de identificação.
        */ 
        abstract public function remove($id);
        
        /**
        * Busca dados cadastrados na base de dados com base no códido de identificação.
        */ 
        abstract public function find($id);
        
        /**
        * Busca dados cadastrados na base de dados com base no nome do livro.
        */ 
        abstract public function findName($nomeLivro);

        /**
        * Busca dados cadastrados na base de dados com base no nome do autor.
        */ 
        abstract public function findActor($nomeAutor);
        
        /**
        * Quantifica todos os dados cadastrados na base de dados.
        */ 
        abstract public function count();
        
        /**
        * Lista todos os dados cadastrados na base de dados.
        */ 
        abstract public function listAll();
    }   
?>