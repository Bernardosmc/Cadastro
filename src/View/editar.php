<?php
session_start();
require_once 'Partials/header.php';
require_once '../../config.php';
use src\Controller\UsuarioController;

$control = new UsuarioController($pdo);

$id = filter_input(INPUT_GET, 'id');

$usuario = $control->buscarPorId($id);

if(!$usuario){
    $_SESSION['warning'] = "ID inexistente";
    header("Location: visualizar.php");
    exit;
}

?>

<h1>Adicionar usuario</h1>

<?php
    if(isset($_SESSION['warning'])){
        echo '<p style=" color:red;">' . $_SESSION['warning'] . '</p>';
        $_SESSION['warning'] = '';
    }
?>

<form action="Action/editarAction.php?id=<?=$usuario->getId();?>" method="POST">

    <label>
        Nome: <br>
        <input type="text" name="nome" value="<?= $usuario->getNome(); ?>">
    </label>
    <br><br>
    <label>
        Nascimento: <Br>
        <input type="date" name="nascimento" value="<?= $usuario->getNascimento(); ?>">
    </label>
    <br><br>
    <input type="submit" value="Enviar">

</form>