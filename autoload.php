<?php
spl_autoload_register(function($class){
    $caminho = __DIR__."\.$class";
    $caminho = str_replace('.', '', $caminho);
    require_once $caminho . ".php" ;
});


