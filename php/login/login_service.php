<?php

require dirname(__DIR__) . '/SQL/sql_controller.php';

class ServiceLogin {
    public function validPOST($userPOST, $passPOST){
        
        if((!isset($userPOST) and !isset($passPOST)) or 
            ($userPOST != '' and $passPOST != '')) 
            
                return NULL;
        else
            echo 'nullFields';
            
    }
    
    public function insertSlashes($var){
        return addslashes($var);
    }
    
    public function ech($var){
        echo $var;
    }
    
    public function validLogin($user, $pass){
        
        $validUser = SqlController::validate('CheckUser', $user);
        $validPass = SqlController::validate('CheckPass', $pass);
        
        if($validPass == 'done' and $validUser == 'done')
            return 'success';
        
        else
            return '!user!pass';
        
    }
}

?>