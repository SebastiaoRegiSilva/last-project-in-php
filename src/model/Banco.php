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
        * @param mixed $id Código de identificação.
        */ 
        abstract public function remove($id);
        
        /**
        * Busca usuários cadastrados na base de dados com base no códido de identificação.
        * @param mixed $id Código de identificação.
        */ 
        abstract public function find($id);
        
        /**
        * Quantifica todos os usuários cadastrados na base de dados.
        */ 
        //abstract public function count();
        
        /**
        * Lista todos os usuários cadastrados na base de dados.
        */ 
        abstract public function listAll();
    }   
?>