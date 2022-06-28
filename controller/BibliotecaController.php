<?php
    require_once '../model/Biblioteca.php';

    /**
    * Controller que provê endpoints relacionados a entidade livro.
    */ 
    class LivroController
    {
        /**
        * Persiste uma novo livro no repositório.
        */ 
        public static function salvar()
        {
            $biblioteca = new Biblioteca();

            $biblioteca ->setId($_POST["id"]);
            $biblioteca->setNomeLivro($_POST["nomeLivro"]);
            $biblioteca->setNomeAutor($_POST["nomeAutor"]);
            $biblioteca->setFotoCapa($_POST['fotoCapa']);
            $biblioteca->setISBN($_POST["isbn"]);
            $biblioteca->setEditora($_POST["editora"]);

            $biblioteca->save();
        }

        /**
        * Lista todos os livros cadastrados no repositório.
        */ 
        public static function listar()
        {
            $biblioteca= new Biblioteca();
            return $biblioteca->listAll();
        }

        /**
        * Busca um livro cadastrado com base em seu código de identificação.
        * @param mixed $id  Código de identificação do livro.
        */
        public static function buscarLivroId($id)
        {
            
            $biblioteca = new Biblioteca;
            $biblioteca = $biblioteca->find($id);

            return $biblioteca;
        }

        /**
        * Exclui um livro cadastrado com base em seu código de identificação.
        * @param mixed $id  Código de identificação do livro.
        */
        public static function excluirLivroId($id)
        {
            $biblioteca = new Biblioteca();
            $biblioteca = $biblioteca->remove($id);
        }
    }
?>

