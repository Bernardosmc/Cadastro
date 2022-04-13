<?php
session_start();
require_once '../../../config.php';
use src\Model\Usuario;
use src\Controller\UsuarioController;
$control = new UsuarioController($pdo);

$id = filter_input(INPUT_GET, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$nascimento = filter_input(INPUT_POST, 'nascimento');

$usuario = $control->buscarPorId($id);

if(!$usuario){
    $_SESSION['warning'] = "ID inexistente";
    header("Location: ../visualizar.php");
    exit;
}else{
    if(!empty($nome) && !empty($nascimento)){
        // se os campos existirem...

        $usuario = new Usuario();

        $usuario->setId($id);
        $usuario->setNome($nome);
        $usuario->setNascimento($nascimento);

        $control->editar($usuario);

        $_SESSION['success'] = "Usuario alterado com sucesso!";
        header("Location: ../visualizar.php");
        exit;


    }else{
        $_SESSION['warning'] = "Preencha os campos corretamente!";
        header("Location: ../editar.php?id=$id");
        exit;
    }
}
