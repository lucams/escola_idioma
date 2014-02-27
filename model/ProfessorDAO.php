<?php

session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AlunoDAO
 *
 * @author aluno
 */
class ProfessorDAO {

    private $obj;
    private $con;

    function __construct(Aluno $obj) {
        $this->obj = $obj;
        $this->con = Connection::getConnection();
    }

    public function getObj() {
        return $this->obj;
    }

    public function gravar() {
        $query = $this->con->prepare('INSERT INTO professor (id,nome,endereco,cpf,telefone,sexo,nivel,email) values (:id,:nome,:endereco,:cpf,:telefone,:sexo,:nivel,:email)');
        echo $query->execute($this->obj->getAll());
    }

    static public function listar() {
        $query = Connection::getConnection()->prepare('SELECT * FROM professor where ativo="S"');
        $query->execute();
        $lista = array();
        while ($linha = $query->fetch(PDO::FETCH_ASSOC)) {
            $lista[] = new Professor($linha);
        }
        return $lista;
    }

    public function deletar() {
        //Exclusão Física
        //$query = $this->con->prepare('delete from aluno where id=?');
        //Exclusão Lógica
        $query = $this->con->prepare('update professor set ativo="N" where id=?');
        $query->execute(array($this->obj->__get('id')));
    }

    public function atualizar() {

        $query = $this->con->prepare('UPDATE professor '
                . 'set nome=:nome,'
                . 'endereco=:endereco,'
                . 'cpf=:cpf,'
                . 'telefone=:telefone,'
                . 'sexo=:sexo,'
                . 'nivel=:nivel,'
                . 'email=:email'
                . ' WHERE id=:id');
        echo $query->execute($this->obj->getAll());
    }

    public function buscar() {
        $query = $this->con->prepare('select * from professor where id=?');
        $query->execute(array($this->obj->__get('id')));
        return $this->obj->setAll($query->fetch(PDO::FETCH_ASSOC));
    }

    static public function buscarMap($id) {
        $p = new Professor();
        $query = Connection::getConnection()->prepare('select * from professor where id=?');
        $query->execute(array($id));
        return $p->setAll($query->fetch(PDO::FETCH_ASSOC));
    }

}
