<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Turma
 *
 * @author aluno
 */
class Turma {

    private $id;
    private $descricao;
    private $turno;
    private $nivel;
    private $sala;
    private $idioma;
    private $numeroAulas;
    private $lotacao;
    private $dataInicio;
    private $professor;

    public function __construct(Array $lista = null) {
        if (isset($lista))
            $this->setAll($lista);
    }

    function __set($name, $value) {
        if (property_exists($this, $name)) {
            if (strstr( $name,'data')) {
                $this->$name = Helper::formataData($value);
            } else {
                $this->$name = $value;
            }
        }
        return $this;
    }

    function __get($name) {
        if (property_exists($this, $name))
            return $this->$name;
    }

    public function setAll(Array $lista) {
        foreach ($lista as $key => $value) {
            if (strstr($key,'professor')) {
                $p = ProfessorDAO::buscarMap($value);
                $this->__set('professor', $p);
            } else {
                $this->__set($key, $value);
            }
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
        //substituição do objeto em id pelo mapeamento
        $array['professor'] = $array['professor']->__get('id');
        return $array;
    }

}
