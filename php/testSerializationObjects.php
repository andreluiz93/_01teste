<?php

require 'SQL/sql_controller.php';
require 'objects/car.php';

$t = new Car('admin', 'KIY7364', 'Wolks', 'Voyage G2');

$s = serialize($t);


$query = "insert into s 
          (user, object)
          values 
          ('admin','$s');";
         
$go=mysql_query($query);

if($go) echo "ma";
else echo "mu";

$query = SqlService::BuildSelecFromWhere('object', 's', 'user', 'admin');
$go = SqlService::mySqlResult($query);
$us = unserialize($go);
echo $us->getIdUser() . "<br>";
echo $us->getMark();

/*$write = fopen('sql.txt', 'w');
fwrite($write, $s);
fclose($write);

$open = fopen('sql.txt', 'r');
$string2 = fread($open, filesize('sql.txt'));


*/



?>