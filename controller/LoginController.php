<?php
session_start();
function __autoload($classe) {
    include_once "../model/{$classe}.php";
}

//Verificar se os campos estão setados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Instanciar Usuario
    $u = new Usuario($_POST);
    $usuarioDAO = new UsuarioDAO($u);
    if ($usuarioDAO->verificar()) {
        //Caso o login seja efetuado
        $u = $usuarioDAO->getObj();
        $_SESSION['usuario'] = $u;
        header('Location:../view/index.php');
    } else {
        header('Location:../view/login.php');
    }
} else {
    session_destroy();
    header('Location:../view/login.php');
}


