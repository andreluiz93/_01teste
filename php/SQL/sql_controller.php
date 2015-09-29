<?php

/*
PARA REALIZAR!!

1) RESTRUTURAR A METODOLOGIA DE REQUISIÇÕES DE BD 
    EM ANDAMENTO{
        2) REQUESTS
    }
    
    PARA REALIZAR{
        3) INSERTS
    }
    TERMINADOS
        1) CONEÇÃO
    }
2) METODOLOGIA DE TRATAMENTO DE ERROS
2) REFAZER A CONECÇÃO DOS ARQUIVOS JS COM OS ARQUIVOS PHP
3) 
*/

require 'connection.php';
require 'sql_services.php';

class SqlController {
    
    public static function init() {
        SqlController::connect();
    }
    
    public static function connect(){
        $conn = new Connection;
        $conn->Conn('remoto');
    }

    public static function Request($type, $var){
        
        $sql = new SQLService;

        if($type == 'RequestAccess'){
            
            $validateUser = SqlController::Validate('CheckUser', $var);
            if($validateUser == 'invalido') return 'nullUser';
            
            //Realize a query to field 'acesso', on the table 'pessoas', where 'usuario' equal $var
            $query = $sql->BuildSelecFromWhere('acesso', 'pessoas', 'usuario', $var);
            return $sql->mySqlResult($query);
        }
        
        elseif($type == 'RequestName'){
            
            //Realize a query to field 'nome', on the table 'pessoas', where 'usuario' equal $var
            $query = $sql->BuildSelecFromWhere('acesso', 'pessoas', 'usuario', $var);
            return $sql->mySqlResult($query);
        }
     
    }
    
    public static function Validate($type, $toCheck){
        
        $sql = new SQLService;
        
        if($type == 'CheckUser'){
            
             //Realize a query for validate if that variable ($toCheck) is valid
            $query = $sql->BuildSelectCountWhere('pessoas', 'usuario', $toCheck);
            $result = $sql->mySqlFechArray($query);
            
            if($result[0] > 0)
                return 'valido';
            else
                return 'invalido';
            
        }
        
    }
    
    public static function Insert(){
        
    }
    
    public static function Update(){
        
    }
    
    public static function Delet(){
        
    }
    
    
    
}

SqlController::init();
?>