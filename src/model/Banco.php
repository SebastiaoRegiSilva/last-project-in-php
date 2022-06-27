<?php
    /**
    * Classe responsável pela persistência de dados dentro da aplicação.
    */ 
    abstract class Banco
    {
        /**
        * Salva os usuários cadastrados na base de dados.
        */ 
        abstract public function save();
        
        /**
        * Remove os usuários cadastrados na base de dados com base no código de identificação.
        */ 
        abstract public function remove($id);
        
        /**
        * Busca usuários cadastrados na base de dados com base no códido de identificação.
        */ 
        abstract public function find($id);
        
        /**
        * Lista todos os usuários cadastrados na base de dados.
        */ 
        abstract public function listAll();
    }   
?>