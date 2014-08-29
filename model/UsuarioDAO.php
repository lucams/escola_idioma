<?php
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioDAO
 *
 * @author aluno
 */
class UsuarioDAO {

    private $obj;
    private $con;

    function __construct(Usuario $obj) {
        $this->obj = $obj;
        $this->con = Connection::getConnection();
    }

    public function verificar() {
        $query = $this->con->prepare('SELECT * FROM usuario WHERE username=? AND password=?');
        $query->execute(
                array(
                    $this->obj->__get('username'),
                    $this->obj->__get('password')
        ));

        $linha = $query->fetch(PDO::FETCH_ASSOC);

        if ($linha) {
            $this->obj->setAll($linha);
            return true;
        } else {
            return false;
        }
    }

    public function getObj() {
        return $this->obj;
    }

    public function gravar() {
        try {

            $query = $this->con->prepare('INSERT INTO usuario (id,nome,username,password,email,create_time)values(:id,:nome,:username,:password,:email,NOW())');
            $query->execute($this->obj->getAll(array('create_time')));

            if (true) {
                throw new Exception("Erro na aplicação");
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    static public function listar() {
        $query = Connection::getConnection()->prepare('select * from usuario where ativo="S"');
        $query->execute();
        $lista = array();
        while ($linha = $query->fetch(PDO::FETCH_ASSOC)) {
            $lista[] = new Usuario($linha);
        }
        return $lista;
    }

    public function deletar() {
        $query = $this->con->prepare('delete from usuario where id=?');
        $query->execute(array($this->obj->__get('id')));
    }

    public function buscar() {
        $query = $this->con->prepare('select * from usuario where id=?');
        $query->execute(array($this->obj->__get('id')));
        return $this->obj->setAll($query->fetch(PDO::FETCH_ASSOC));
    }

    public function atualizar() {
        $query = $this->con->prepare('UPDATE usuario SET '
                . 'nome=:nome,'
                . 'username=:username,'
                . 'email=:email '
                . 'WHERE id=:id');
        echo $query->execute(
                $this->obj->getAll(
                        array('create_time',
                            'password')));
    }

}
