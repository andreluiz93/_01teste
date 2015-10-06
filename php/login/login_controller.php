<?php

require 'service_login.php';
require 'access_class.php';

Class Login{
    
    public function init() {
        session_start();
        $this->controll();
    }
    
    public function controll() {
        
        $svcLogin = new ServiceLogin;
        $svcAccess = new ServiceAccess;
        
        $valid = $svcLogin->validPOST($_POST['user'], $_POST['pass']);

        
        if($validContent) {
            $svcLogin->ech($valid);
            return;
        }
        $u = $svcLogin->insertSlashes($_POST['user']);
        $p = $svcLogin->insertSlashes($_POST['pass']);

        $validLogin = $svcLogin->validLogin($u, $p);
        
        if($validLogin == 'success' and !isset($validContent)) {
            
            $_SESSION['login'] = $u;
            $svcLogin->ech($validLogin);
        }
        
        else
            $svcLogin->ech($validLogin);
    }
}
$login = new Login;
$login->init();


/*
//Valida os $_POST
if(!isset($_POST['user']) || !isset($_POST['pass'])){
    echo 3;
    return 0;
}

$user = addslashes($_POST['user']);
$pass = addslashes($_POST['pass']);

//Valida se estão preenchidos
if($user == '' || $pass == ''){
    echo "nullFields";
    return 0;
}

//Requisita validação de usuário e senha
$validation = checkUserPass($user, md5($pass));

if($validation == "existe"){
    session_start();
    //Abre uma nova sessão
    $_SESSION['login'] = $user;
    echo "success";
}
else if($validation == "no")
    echo "!user!pass";

else
    echo 'Nothing here, man...';
    */
?>