<?php 
session_start();
require_once 'Partials/header.php';
require_once '../../config.php';
use src\Controller\UsuarioController;

$control = new UsuarioController($pdo);

$lista = $control->listar();

?>

<h1>Ver todos registros...</h1>

<?php
    if(isset($_SESSION['warning'])){
        echo '<p class="warning">' . $_SESSION['warning'] . "</p>";
        $_SESSION['warning'] = '';
    }
    if(isset($_SESSION['success'])){
        echo '<p class="success">' . $_SESSION['success'] . "</p>";
        $_SESSION['success'] = '';
    }
?>

<table border="1">

    <tr>
        <th>Nome</th>
        <th>Nascimento</th>
        <th>AÇOES</th>
    </tr>

    <?php foreach($lista as $user): ?>

        <tr>
            <td> <?= $user->getNome(); ?> </td>
            <td> <?= $user->getNascimento(); ?> </td>

            <td>
                <a href="editar.php?id=<?=$user->getId();?>">Editar</a>
                <a href="Action/excluirAction.php?id=<?=$user->getId();?>" onclick="return confirm('Deseja mesmo excluir este usuario?')">Excluir</a>
            </td>
        </tr>

    <?php endforeach; ?>
    

</table>