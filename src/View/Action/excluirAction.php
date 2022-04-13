<?php
session_start();
require_once '../../../config.php';
use src\Model\Usuario;
use src\Controller\UsuarioController;
$control = new UsuarioController($pdo);

$id = filter_input(INPUT_GET, 'id');

if($id){
    if($control->buscarPorId($id)){

        $control->excluir($id);
        $_SESSION['success'] = 'Usuario excluido com sucesso!';
        header("Location: ../visualizar.php");
        exit;

    }else{
        $_SESSION['warning'] = 'ID inexistente!';
        header("Location: ../visualizar.php");
        exit;
    }
}else{
    $_SESSION['warning'] = 'ID inexistente!';
    header("Location: ../visualizar.php");
    exit;
}
