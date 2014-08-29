<?php

session_start();

function __autoload($classe) {
    include_once "../model/{$classe}.php";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['op'] == 'I') {
        //insert
        $u = new Usuario($_POST);
        $uDAO = new UsuarioDAO($u);
        $uDAO->gravar();
        header('Location:../view/usuario.php');
    } else if ($_POST['op'] = 'U') {
        //update
        $u = new Usuario($_POST);
        $uDAO = new UsuarioDAO($u);
        $uDAO->atualizar();
        //limpar a session para voltar para a lista
        unset($_SESSION['op']);
        header('Location:../view/usuario.php');
    }
} else {
    //Quando clica no botão novo
    if ($_GET['op'] == 'N') {
        $_SESSION['op'] = 'N';
        unset($_SESSION['obj']);
        header('Location:../view/usuario.php');
    } else if ($_GET['op'] == 'D') {
        //Delete
        $u = new Usuario($_GET);
        $uDAO = new UsuarioDAO($u);
        $uDAO->deletar();
        unset($_SESSION['op']);
        header('Location:../view/usuario.php');
    } else if ($_GET['op'] == 'U') {
        //Buscar
        $u = new Usuario($_GET);
        $uDAO = new UsuarioDAO($u);
        $_SESSION['obj'] = $uDAO->buscar();
        //Necessário para mostrar o formulário em modo de edição
        $_SESSION['op'] = 'U';
        header('Location:../view/usuario.php');
    }
} 