<?php
session_start();
require_once 'config.php';
use src\Controller\UsuarioController;
use src\Model\Usuario;
?>

<nav>
    <li>
        <a href="src/View/adicionar.php">Adicionar</a>
    </li>
    <li>
        <a href="src/view/visualizar.php">Ver todos registros</a>
    </li>
</nav>


<?php

    if(isset($_SESSION['success'])){
        $success = $_SESSION['success'];
        echo '<h3 style="color: green;">' . $success . "</h3>";
        $_SESSION['success'] = '';
    }

?>