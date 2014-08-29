<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aluno
 *
 * @author aluno
 */
class Aluno extends Pessoa{
   
    protected $nivel;
    
    
    public function __toString() {
        $temp = '<table border=1 bgcolor="#ff0000">';
        $temp.= parent::__toString();
        $temp.='</table>';
        return $temp;
    }

    public function getNivelExtenso(){

        switch ($this->nivel) {
            case 'B':return 'Básico';
                break;
            case 'A':return 'Avançado';
                break;
            case 'I':return 'Intermediário';
                break;
            default:return 'Não Cadastrado';
                break;
        }
        
    }
    
}
