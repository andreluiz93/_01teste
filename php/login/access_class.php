<?php

class ServiceAccess {
    
    public function requestAccess($user) {
        
        if(isset($user))
            return SqlController::Request('RequestAccess', $user);
            
        else
            return 'dont';
    }
    
    public function openPage($accessValided){
        
        switch($accessValided) {
            
            case 'a':
                header('location: ../../html/pages/main_login_a.html');
                break;
                    
            case 'f':
                header('location: ../../html/pages/main_login_f.html');
                break;
            
            case 'c':
                header('location: ../../html/pages/main_login_c.html');
                break;
            
            default:
                header('location: ../../html/forms/form_login.html');
                break;
            }
                
    }
}
/*
if(isset($_SESSION['login']) ){
    
    //Requisita Acesso
    $access = SqlController::Request('RequestAcess', $_SESSION['login']);
    
    //Faz a separação
    accessNow($access);
    
    /* IMPLEMENTAR
    if($_POST['testAccess'] != '')

    }
    else
    header('location: ../../html/operation/login/form_login.html');

}
else 
    header('location: ../../html/forms/form_login.html');


function accessNow($access){
    
    if($access == 'a')
        header('location: ../../html/pages/main_login_a.html');

    else if($access == 'f')
        header('location: ../../html/pages/main_login_f.html');

    else if($access == 'c')
        header('location: ../../html/pages/main_login_c.html');

    else
        header('location: ../../html/forms/form_login.html');
}
*/
?>