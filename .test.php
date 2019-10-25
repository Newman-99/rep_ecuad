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

<!--
                        
?>

$sql="SELECT in_p.id_doc, in_p.nombre,in_p.apellido_p,in_p.apellido_m,tr.descripcion descripcion_turno,tp.descripcion descripcion_tip_docent,cb.tlf_cel,cb.tlf_local,cb.correo,cl.grado,cl.seccion,cl.año_escolar1,cl.año_escolar2,cl.no_aula FROM docentes doc INNER JOIN info_personal in_p ON doc.id_doc_docent = in_p.id_doc INNER JOIN turnos tr ON doc.id_turno = tr.id_turno INNER JOIN clases cl ON doc.id_doc_docent = cl.id_doc_docent or doc.id_doc_docent = cl.id_doc_docent_fis or doc.id_doc_docent = cl.id_doc_docent_cult INNER JOIN tipos_docentes tp ON doc.id_tipo_docent = tp.id_tipo_docente INNER JOIN contact_basic cb ON doc.id_doc_docent = cb.id_doc
            WHERE doc.id_doc_docent = :id";
