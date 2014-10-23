<?php





/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Helper
 *
 * @author aluno
 */
class Helper {

    static public function formataData($data) {
        if (strstr($data, '/')) {
            $data = explode('/', $data);
            return "{$data[2]}-{$data[1]}-{$data[0]}";
        } else {
            $data = explode('-', $data);
            return "{$data[2]}/{$data[1]}/{$data[0]}";
        }
    }

}


