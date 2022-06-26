<?php
    /**
    * Classe responsável com a conexão com o banco de dados.
    */ 
    class Conexao
    {
        private $servername = 'localhost:3306';
        private $username = 'sebastiao';
        private $password = 'machoAlfa2022';
        private $database = 'biblioteca';
        private $conection;

        /**
        * Realiza a conexão com a base de dados.
        */ 
        public function getConection()
        {
            if(is_null($this->conection))
            {
                $this->conection = new PDO('mysql:host='.$this->servername.';dbname='.$this->database, $this->username,$this->password);
                $this->conection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                $this->conection->exec('set names utf8');
            }
            return $this->conection;
        }
    }
?>