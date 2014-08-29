<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pessoa
 *
 * @author aluno
 */
abstract class Pessoa {

    protected $id;
    protected $nome;
    protected $cpf;
    protected $telefone;
    protected $endereco;
    protected $sexo;
    protected $email;

    public function __construct(Array $lista = null) {
        if (isset($lista))
            $this->setAll($lista);
    }

    function __set($name, $value) {
        if (property_exists($this, $name))
            $this->$name = $value;
        return $this;
    }

    function __get($name) {
        if (property_exists($this, $name))
            return $this->$name;
    }

    public function setAll(Array $lista) {
        foreach ($lista as $key => $value) {
            $this->__set($key, $value);
        }
        return $this;
    }

    public function getAll(array $filtro = null) {
        $array = get_object_vars($this);
        //Filtro
        if (!is_null($filtro)) {
            foreach ($filtro as $value) {
                unset($array[$value]);
            }
        }
        return $array;
    }

    
    public function __toString() {
        $temp = "<tr><td>Nome:</td><td>{$this->nome}</td></tr>";
        $temp.="<tr><td>CPF:</td><td>{$this->cpf}</td></tr>";
        $temp.="<tr><td>Telefone:</td><td>{$this->telefone}</td></tr>";
        return $temp;
    }

}
