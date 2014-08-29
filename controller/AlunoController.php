<?php

session_start();

function __autoload($classe) {
    include_once "../model/{$classe}.php";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //insert
    if ($_POST['op'] == 'I') {
        $a = new Aluno($_POST);
        $aDAO = new AlunoDAO($a);
        $aDAO->gravar();
        header('Location:../view/aluno.php');
    } else if ($_POST['op'] == 'U') {
        $a = new Aluno($_POST);
        $aDAO = new AlunoDAO($a);
        $aDAO->atualizar();
        header('Location:../view/aluno.php');
    }
    //update
} else {
    //Quando clica no botão novo
    if ($_GET['op'] == 'N') {
        $_SESSION['op'] = 'N';
        unset($_SESSION['obj']); 
        header('Location:../view/aluno.php');
        //select com critérios
    }if ($_GET['op'] == 'D') {
        //Delete
        $u = new Aluno($_GET);
        $uDAO = new AlunoDAO($u);
        $uDAO->deletar();
        unset($_SESSION['op']);
        header('Location:../view/aluno.php');
    }if($_GET['op']=='U'){
       //Buscar
        $u = new Aluno($_GET);
        $uDAO = new AlunoDAO($u);
        $_SESSION['obj'] = $uDAO->buscar();
        //Necessário para mostrar o formulário em modo de edição
        $_SESSION['op'] = 'U';
        header('Location:../view/aluno.php');
    }
} 