<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Connection
 *
 * @author instrutor
 */
class Connection {

    static private $conn = null;
    static private $tipo = 'mysql';
    static private $host = 'localhost';
    static private $db = 'embromation';
    static private $usuario = 'root';
    static private $senha = '';
    
    static public function getConnection(){
         if (is_null(self::$conn)) {
            self::$conn = new PDO(self::$tipo . ':host=' . self::$host . ';dbname=' . self::$db,
                            self::$usuario, self::$senha,
                            array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET Names UTF8'));
        }
        
        return self::$conn;
    }
    
    
    static public function closeConnection() {
        unset (self::$conn);
    }

    
    
    
}



?>
