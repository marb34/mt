<?php

/**
 * @author Marco Ramirez
 * @version 0.1
 */
$usuario1=$_GET["user"]; 
$option1=$_GET["option"];
$label1=$_GET["labelopt"];
require_once "connect.php";

$conexion=new MySQLCon;
$conexion->conectar("localhost","root","marb180575","bugtracker1");
/*Consultas*/
if(isset($usuario1)&& $usuario1!=''){
   $where="AND u.username='$usuario1'"; 
}
else{
    $where="AND 1=1";
}

$query1="
		SELECT *,username
		FROM mantis_bug_table AS b, mantis_user_table AS u
		WHERE b.handler_id=u.id
        $where
        GROUP BY b.handler_id
		";

$query="
		SELECT *,COUNT(*) AS Total
		FROM mantis_bug_table AS b, mantis_user_table AS u
		WHERE b.handler_id=u.id
        AND status=$option1
		GROUP BY b.handler_id
		";

$query3 ="
        SELECT *
        FROM mantis_bug_table
        ";

/* FIN de consultas*/

echo $query."<br/>";
echo $query1;
$resultante=$conexion->consulta1($query);
//$resultante2=$conexion->consulta1($query);
//print_r($resultante);
echo "<form id='formulario'><p><h1>$label1</h1></p>";
    for($i=0;$resultante["contador"]>$i;$i++){
        echo "<input type='text' id='valor-id-$i' name='valor-id-$i' value='".$resultante["resultante"][$i]["id"]."'/>";
        echo "<input type='text' id='valor-reu-$i' name='valor-reu-$i' value='".$resultante["resultante"][$i]["realname"]."'/>";
        echo "<br/>";
    }    
    echo "<input type ='hidden' id='cantidad' name ='cantidad' value='".$resultante["contador"]."' />";
echo "</form>";
echo "<hr/>";
echo "<hr/>";
$resultante2=$conexion->consulta1($query1);
echo "<script>alert(".json_encode($resultante2).");</script>";
echo "<form id='formulario2'>";
for($i=0;$resultante2["contador"]>$i;$i++){
    echo "ID :: <input type = 'text' name='resid$i' id='resid$i' value='".$resultante2["resultante"][$i]["id"]."' />";
	echo "Reportero :: <input type = 'text' name='rerep$i' id='rerep$i' value='".$resultante2["resultante"][$i]["reporter_id"]."'/>";
	echo "Asignado :: <input type = 'text' value='".$resultante2["resultante"][$i]["handler_id"]."' />";
	echo "Usr_asignado :: <input type = 'text' value='".$resultante2["resultante"][$i]["username"]."' />";
    echo "Status :: <input type = 'text' value='".$resultante2["resultante"][$i]["Total"]."'/>";
    echo "<br/>";
}
echo "</form>";
?>