<?php
namespace src\Controller;

use PDO;
use src\Model\Usuario;


class UsuarioController{

    private $pdo;

    public function __construct($engine){
        if($engine instanceof PDO){
            $this->pdo = $engine;
        }else{
            echo "o driver do controller tem que ser PDO";
        }
        
    }

    public function buscarPorId($id)
    {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindvalue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $dados = $sql->fetch();

            $user = new Usuario();
            $user->setId($dados['id']);
            $user->setNome($dados['nome']);
            $user->setNascimento($dados['nascimento']);
            return $user;

        }else{
            return false;
        }
        
    }

    public function adicionar(Usuario $u)
    {
        $sql = $this->pdo->prepare("INSERT INTO usuarios (nome, nascimento) VALUES (:nome, :nascimento)");
        $sql->bindValue(":nome", $u->getNome());
        $sql->bindValue(":nascimento", $u->getNascimento());
        $sql->execute();
        return true;
    }

    public function listar()
    {
        $lista = [];

        $sql = $this->pdo->query("SELECT * FROM usuarios");

        if($sql->rowCount() > 0){
            $dados = $sql->fetchAll();

            foreach($dados as $registro){
                $usuario = new Usuario();
                // mudando data do padrão americano pro padrão brasileiro;
                $nascimento = date('d/m/Y', strtotime($registro['nascimento']));

                $usuario->setId($registro['id']);
                $usuario->setNome($registro['nome']);
                $usuario->setNascimento($nascimento);

                $lista[] = $usuario;
            }
        }
        return $lista;
    }

    public function editar(Usuario $u)
    {
        $sql = $this->pdo->prepare("UPDATE usuarios SET nome = :nome, nascimento = :nascimento WHERE id = :id");
        $sql->bindValue(":nome", $u->getNome());
        $sql->bindValue(":nascimento", $u->getNascimento());
        $sql->bindValue(":id", $u->getId());
        $sql->execute();

        return true;
    }

    public function excluir($id)
    {
        $sql = $this->pdo->prepare('DELETE FROM usuarios WHERE id = :id');
        $sql->bindValue(":id", $id);
        $sql->execute();
        return true;
    }
}