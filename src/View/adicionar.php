<?php 
session_start();
require_once 'Partials/header.php'; ?>

<h1>Adicionar usuario</h1>
<form action="Action/adicionarAction.php" method="POST">

    <?php

        if(isset($_SESSION['warning'])){
            $warning = $_SESSION['warning'];
            echo '<h3 class="warning">' . $warning . "</h3>";
            $_SESSION['warning'] = '';
        }

    ?>


        <label>
            Nome: <br>
            <input type="text" name="nome" autocomplete="off">
        </label>
    <br><br>
        <label>
            Nascimento: <Br>
            <input type="date" name="nascimento">
        </label>
    <br><br>
        <input type="submit" value="Enviar">

</form>