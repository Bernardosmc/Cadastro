<?php
namespace src\Model;

class Usuario{

    private int $id;
    private string $nome;
    private string $nascimento;

    // setters
    public function setId(int $id)
    {
        $this->id = $id;
    }
    public function setNome(string $nome)
    {
        $this->nome = ucwords(trim($nome));
    }
    public function setNascimento(string $nasc)
    {
        $this->nascimento = trim($nasc);
    }

    // getters
    public function getId()
    {
        return $this->id;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function getNascimento()
    {
        return $this->nascimento;
    }

}