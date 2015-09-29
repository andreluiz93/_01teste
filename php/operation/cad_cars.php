
<?php

require '../sql_service.php';



class CadCars {
    
    public static function init() {
        
    }
    
    public static function Controller(){
        
    }
    
    public function teste(){
    }
    
    
}

if($_POST["user"] == "" || $_POST["placa"] == "" || 
   $_POST["marca"] == "" || $_POST["mod"] == "") {
        echo "!fields";
        return;
}

$postUser = $_POST["user"];
$postPlaca = $_POST["placa"];
$postMarca = $_POST["marca"];
$postMod = $_POST["mod"];

$validUser = SQL::checkUser($postUser);
$validMarca = SQL::checkMarca($postMarca);
$validModelo = SQL::checkModelo($postMod);
$validPlaca = SQL::checkPlaca($postPlaca);
    
if($validUser == "existe"){
    if($validMarca == "existe"){
        if($validModelo == "existe"){
            if($validPlaca == "nao existe"){
                
                $user= SQL::requestIDUser($postUser);
                $modelo = SQL::requestIDModelo($postMod);
                $marca = SQL::requestIDMarca($postMarca);

                $valid = SQL::insertCar($user, $postPlaca, $marca, $modelo);
                
                if($valid) echo "added";
                else echo $valid;
            }
            
            else{
                echo "placa";
                return;
            }
        }
        
        else{
            echo "!modelo";
            return;
        }
    }
        
    else{
        echo "!marca";
        return;
    }
}

else{
    echo "!user";
    return;
}
?>