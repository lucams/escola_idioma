<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author aluno
 */
class Usuario {

    private $id;
    private $nome;
    private $username;
    private $password;
    private $email;
    private $create_time;

    public function __construct(Array $lista = null) {
        if (isset($lista))
            $this->setAll($lista);
    }

    function __set($name, $value) {
        if (property_exists($this, $name)) {
            //criptografia da senha
            if ($name == 'password')
                $this->$name = sha1($value . '123');
            else if ($name == 'create_time')
                $this->$name = Helper::formataData($value);
            else
                $this->$name = $value;
        }
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

}
