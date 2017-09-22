<?php

include_once 'configBanco.php';

class DataBase {
    private static $db = null;
    private static $pdo;
            
    //criação da classe do banco de dados
    final private function __construct() {
        try {
          //$this->getDb();
          self::getDb();                             
            
        } catch (Exception $ex) {
            $ex->getMessage();
        } 
       
    }
    //pegando uma instancia do banco, deve ser chamado sempre que necessitar acesso ao mesmo
    public static function getInstance(){
        if(self::$db === null){
            self::$db = new self();
        }
        return self::$db;
        
    }

    //retornar o acesso ao banco
    public function getDb() {
        if(self::$pdo == null){
            self::$pdo = new PDO("mysql:dbname=".BANCO.
                    ";host=".SERVIDOR,USUARIO,SENHA, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            
        }
        return self::$pdo;
            
        
    }
    
    
} 