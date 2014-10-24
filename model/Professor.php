<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Professor
 *
 * @author aluno
 */
class Professor extends Pessoa {

    protected $matricula;

//ToString usado para facilitar o relacionamento
    public function __toString() {
        return $this->id;
        // outra alteração
    }

}
