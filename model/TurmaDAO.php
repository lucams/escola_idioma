<?php

session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TurmaDAO
 *
 * @author aluno
 */
class TurmaDAO {

    private $obj;
    private $con;

    function __construct(Turma $obj) {
        $this->obj = $obj;
        $this->con = Connection::getConnection();
    }

    public function getObj() {
        return $this->obj;
    }

    public function gravar() {
        $query = $this->con->prepare('INSERT INTO turma (id,descricao,turno,nivel,sala,idioma,numeroAulas,lotacao,dataInicio,professor_id)'
                . 'values(:id,:descricao,:turno,:nivel,:sala,:idioma,:numeroAulas,:lotacao,:dataInicio,:professor)');
        echo $query->execute($this->obj->getAll());
    }

    static public function listar() {
        $query = Connection::getConnection()->prepare('select * from turma where ativo="S"');
        $query->execute();
        $lista = array();
        while ($linha = $query->fetch(PDO::FETCH_ASSOC)) {
            $lista[] = new Turma($linha);
        }
        return $lista;
    }

    public function deletar() {
        $query = $this->con->prepare('delete from turma where id=?');
        $query->execute(array($this->obj->__get('id')));
    }

    public function buscar() {
        $query = $this->con->prepare('select * from turma where id=?');
        $query->execute(array($this->obj->__get('id')));
        return $this->obj->setAll($query->fetch(PDO::FETCH_ASSOC));
    }

    public function atualizar() {
        $query = $this->con->prepare('UPDATE turma SET '
                . 'descricao=:descricao,'
                . 'turno=:turno,'
                . 'nivel=:nivel,'
                . 'sala=:sala,'
                . 'idioma=:idioma,'
                . 'numeroAulas=:numeroAulas,'
                . 'lotacao=:lotacao,'
                . 'dataInicio=:dataInicio, '
                . 'professor_id=:professor '
                . 'WHERE id=:id');
       
        echo $query->execute(
                $this->obj->getAll());
    }

}
