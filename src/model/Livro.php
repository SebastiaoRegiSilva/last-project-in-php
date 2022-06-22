<?php
    require_once 'Banco.php';
    require_once './Conexao.php';

    /**
    * Objeto de valor que representa um livro.
    */ 
    class Livro extends Banco
    {
        /**
        * Código de identificação do livro.
        */
        private $id;
        
        /**
        * Nome do livro.
        */
        private $nomeLivro;
        
        /**
        * Nome do autor do livroi.
        */
        private $nomeAutor;
        
        /**
        * Foto da capa do livro.
        */
        private $fotoCapa;
        
        /**
        * International Standard Book Number/ Padrão Internacional de Numeração de Livro).
        */
        private $ISBN;
        
        /**
        * Nome da editora responsável pela edição, publicação e venda do livro.
        */
        private $editora;
        
        // Getters para obter informações. Esse tipo de método sempre retorna um valor.
        public function getId()
        {
            return $this->id;
        }

        public function getNomeLivro()
        {
            return $this->nomeLivro;
        }

        public function getNomeAutor()
        {
            return $this->nomeAutor;
        }
        
        public function getFotoCapa()
        {
            return $this->fotoCapa;
        }

        public function getISBN()
        {
            return $this->ISBN;
        }

        public function getEditora()
        {
            return $this->editora;
        }

        // Setters para definir valores. Esse tipo de método não retorna valores.
        
        public function setId($id)
        {
            $this->id = $id;
        }
        
        public function setNomeLivro($nomeLivro)
        {
            $this->nomeLivro = $nomeLivro;
        }
        
        public function setNomeAutor($nomeAutor)
        {
            $this->nomeAutor = $nomeAutor;
        }
        
        public function setFotoCapa($fotoCapa)
        {
            $this->fotoCapa = $fotoCapa;
        }
        
        public function setISBN($ISBN)
        {
            $this->ISBN = $ISBN;
        }
        
        public function setEditora($editora)
        {
            $this->editora = $editora;
        }
        
        /**
        * Cadastra um livro na base de dados, caso não exista e edita se existir.
        */ 
        public function save()
        {
            $result = false;

            // Conexão com o banco de dados.
            $conexao = new Conexao();
           // Cria a conexão com o banco de dados.
            if($conn = $conexao->getConection())
            {
                if($this->id > 0)
                {
                    $query = "UPDATE livro SET nomeLivro = :nomeLivro, nomeAutor = :nomeAutor, fotoCapa = :fotoCapa, ISBN = :ISBN, editora = :editora WHERE id = :id";
                    $stmt = $conn->prepare($query);
                    if($stmt->execute(array(':nomeLivro' => $this->nomeLivro, ':nomeAutor' => $this->nomeAutor, ':fotoCapa' => $this->fotoCapa, ':ISBN' => $this->ISBN, ':editora' => $this->editora, ':id' => $this->id)))
                        $result = $stmt->rowCount();
                }
                else
                {
                    $query = "INSERT INTO livro (id, nomeLivro, nomeAutor, fotoCapa, ISBN, editora) values (null, :nomeLivro, :nomeAutor, :fotoCapa, :ISBN, :editora)";
                    $stmt = $conn->prepare($query);
                    if($stmt->execute(array(":nomeLivro" => $this->nomeLivro, ":nomeAutor" => $this->nomeAutor, ":fotoCapa" => $this->fotoCapa, ":ISBN" => $this->ISBN, ':editora' => $this->editora)))
                        $result = $stmt->rowCount();
                }
            }
            return $result;
        }

        /**
        * Remove um livro na base de dados baseado no código de identificação.
        * @param mixed $id Código de identificação do livro.
        */ 
        public function remove($id)
        {
            // Objeto responsável pela conexão.
            $conexao = new Conexao();
            // Cria a conexão com o banco de dados.
            $conn = $conexao->getConection();
            // Cria query de busca com base no código de identificação.. 
            $query = "SELECT * FROM livro WHERE id = :id";
            // Prepara a query para execução.
            $stmt = $conn->prepare($query);
            // Executa a query.
            if($stmt->execute(array(':id'=>$id)))
            {
                // Verifica se houve algum registro encontrado.
                if($stmt->rowCount() > 0)
                    // O resultado da busca será retornado como um objeto da classe.
                    $result = $stmt->fetchObject(Livro::class);
                else
                    $result = false;
                
            }
            return $result;
        }

        /**
        * Remove um livro na base de dados baseado no nome do livro.
        * @param mixed $nomeLivro Nome do livro.
        */ 
        public function removeLivroNome($nomeLivro)
        {
            // Objeto responsável pela conexão.
            $conexao = new Conexao();
            // Cria a conexão com o banco de dados.
            $conn = $conexao->getConection();
            // Cria query de busca com base no código de identificação.. 
            $query = "DELETE * FROM livro WHERE nomeLivro = :nomeLivro";
            // Prepara a query para execução.
            $stmt = $conn->prepare($query);
            // Executa a query.
            if($stmt->execute(array(':nomeLivro'=>$nomeLivro)))
            {
                // Verifica se houve algum registro encontrado.
                if($stmt->rowCount() > 0)
                    // O resultado da busca será retornado como um objeto da classe.
                    $result = $stmt->fetchObject(Livro::class);
                else
                    $result = false;
            }
            return $result;
        }

        /**
        * Busca um livro na base de dados baseado no Id.
        * @param mixed $id Código de identificação do livro.
        */ 
        public function find($id)
        {
            $conexao = new Conexao();
            $conn = $conexao->getConection();
            $query = "SELECT * FROM livro WHERE id = :id";
            $stmt = $conn->prepare($query);
            $result = array();
            if($stmt->execute())
            {
                while($rs = $stmt->fetchObject(Livro::class))
                    $result[] = $rs;
            }
            else
                $result = false;
            
            return $result;
        }

        /**
        * Lista todos os livros cadastrados na base de dados.
        */ 
        public function listAll()
        {
            // Cria um objeto do tipo conexão.
            $conexao = new Conexao();
            // Cria a conexão com o banco de dados.
            $conn = $conexao->getConection();
            // Cria query de seleção.
            $query = "SELECT * FROM livro";
            // Prepara a query para execução.
            $stmt = $conn->prepare($query);
            // Cria um array para receber o resultado da seleção.
            $result = array();
            // Executa a query.
            if ($stmt->execute()) {
                // O resultado da busca será retornado como um objeto da classe
                while ($rs = $stmt->fetchObject(Livro::class))
                    // Armazena esse objeto em uma posição do vetor.
                    $result[] = $rs;
            }
            else
                $result = false;
            
            return $result;
        }
        
        /**
        * Busca livro cadastrado na base de dados com base no nome.
        * @param mixed $nomeLivro Nome do livro.
        */ 
        public function findName($nomeLivro)
        {
            $result = false;

            $conexao = new Conexao();
            $conn = $conexao->getConection();
            $query = "SELECT * FROM livro WHERE nome = :nomeLivro";
            $stmt = $conn->prepare($query);
            if($stmt->execute(array(':nomeLivro'=>$nomeLivro)))
            {
                if($stmt->rowCount() > 0)
                    $result = $stmt->fetchObject(Livro::class);
            }
            return $result;
        }

        /**
        * Busca livros cadastrados na base de dados com base no nome do autor.
        * @param mixed $nomeAutor Autor do livro.
        */ 
        public function findActor($nomeAutor)
        {
            $result = false;

            $conexao = new Conexao();
            $conn = $conexao->getConection();
            $query = "SELECT * FROM livro WHERE nomeAutor = :nomeAutor";
            $stmt = $conn->prepare($query);
            if($stmt->execute(array(':nomeAutor'=>$nomeAutor)))
            {
                if($stmt->rowCount() > 0)
                    $result = $stmt->fetchObject(Livro::class);
            }
            return $result;    
        }
    }
?>