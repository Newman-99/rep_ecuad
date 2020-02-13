<?php

try{
$db = new PDO('mysql:host=localhost;dbname=rep_ecuador2;charset=utf8','root','');
return 'Conexion Correcta';
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}catch(Exception $e){
    print_r('Error: '.$e->getMessage());
}


//$db -> exec("SET CHARACTER SET utf8"); 

?>