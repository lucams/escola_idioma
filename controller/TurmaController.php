<?php

session_start();

function __autoload($classe) {
    include_once "../model/{$classe}.php";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //insert
    if ($_POST['op'] == 'I') {
        $a = new Turma($_POST);
        $aDAO = new TurmaDAO($a);
        $aDAO->gravar();
        header('Location:../view/turma.php');
    } else if ($_POST['op'] == 'U') {
        $a = new Turma($_POST);
        $aDAO = new TurmaDAO($a);
        $aDAO->atualizar();
        header('Location:../view/turma.php');
    }
    //update
} else {
    //Quando clica no botão novo
    if ($_GET['op'] == 'N') {
        $_SESSION['op'] = 'N';
        unset($_SESSION['obj']); 
        header('Location:../view/turma.php');
        //select com critérios
    }if ($_GET['op'] == 'D') {
        //Delete
        $u = new Turma($_GET);
        $uDAO = new TurmaDAO($u);
        $uDAO->deletar();
        unset($_SESSION['op']);
        header('Location:../view/turma.php');
    }if($_GET['op']=='U'){
       //Buscar
        $u = new Turma($_GET);
        $uDAO = new TurmaDAO($u);
        $_SESSION['obj'] = $uDAO->buscar();
        //Necessário para mostrar o formulário em modo de edição
        $_SESSION['op'] = 'U';
        header('Location:../view/turma.php');
    }
} 