<?php

require '../SQL/sql_controller.php';


if(isset($_SESSION["login"])){
    
    $usuario = SqlController::Request('RequestName', $_SESSION['login']);
    echo $usuario;

}

else 
    echo "Realizar login";

?>