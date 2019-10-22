<?php
require './functions/functions.php';
require './database/connect.php';
/*
function contact_insert($id_doc,$tlf_local,$tlf_cel,$correo){
    global $db;

$sql = "SET FOREIGN_KEY_CHECKS=0;"."INSERT INTO contact_basic (id_doc,tlf_local,tlf_cel, correo)
VALUES (:id_doc,:tlf_local,:tlf_cel,:correo);"."SET FOREIGN_KEY_CHECKS=1;";

$result=$db->prepare($sql);
                            
$result->execute(array("id_doc"=>$id_doc,"tlf_local"=>$tlf_local,
"tlf_cel"=>$tlf_cel,"correo"=>$correo));

}

contact_insert("23117206","222","222","n@gmil.com");
*/


/*
function regist_docent($id_doc,$tipo_docent,$turno){

    global $db;
 
 $sql ="SET FOREIGN_KEY_CHECKS=0;"."INSERT INTO docentes(id_doc_docent,id_tipo_docent,id_turno) VALUES (:id_doc_docent,:id_tipo_docent,:id_turno);"."SET FOREIGN_KEY_CHECKS=1;";

 $result=$db->prepare($sql);
 
 $result->execute(array("id_doc_docent"=>$id_doc,"id_tipo_docent"=>$tipo_docent,"id_turno"=>$turno));
 
 }
 
 regist_docent("23117206","1","1");
*/


$nacionalidad = "1";
$id_doc = "24117206";
$nombres = "Pedro Jose";
$apellido_p = "Rodriguez";
$apellido_m = "Alvarado";
$sexo = "1";
$tipo_docent = "1";
$fecha_nac = "1975/08/02";
$lugar_nac = "Caracas";
$direcc_hab = "Guarenas";
$tlf_cel = "041255555";
$tlf_local = "023955555";
$correo = "n@gmail.com";
$estado_civil = "1";
$turno = "1";


?>