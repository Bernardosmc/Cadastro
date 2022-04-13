<?php
session_start();
require_once '../../../config.php';

use src\Model\Usuario;
use src\Controller\UsuarioController;


$control = new UsuarioController($pdo);



$nome = filter_input(INPUT_POST, 'nome');
$nascimento = filter_input(INPUT_POST, 'nascimento');


if(empty($nome) || empty($nascimento)){
    $_SESSION['warning'] = 'Preencha os campos corretamente!';
    header("Location: ../adicionar.php");
    exit;
}else{

    $usuario = new Usuario();
    $usuario->setNome($nome);
    $usuario->setNascimento($nascimento);
    $control->adicionar($usuario);

    $_SESSION['success'] = 'Usuario cadastrado com sucesso!';
    header("Location: ../visualizar.php");
    exit;

}