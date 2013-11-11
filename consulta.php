<?php

/**
 * @author Marco Ramirez
 * @version 0.1
 */
$usuario1=$_GET["user"]; 
require_once "connect.php";

$conexion=new MySQLCon;
$conexion->conectar("localhost","root","marb180575","bugtracker1");

/*Consultas*/
$query="
		SELECT * 
		FROM mantis_bug_table AS b, mantis_user_table AS u, mantis_bugnote_table AS bn, mantis_bugnote_text_table AS bnt
		WHERE b.reporter_id=u.id AND b.id=bn.bug_id AND bn.bugnote_text_id=bnt.id AND u.username='$usuario1'";

$query1="
		SELECT *,COUNT(*) AS Total
		FROM mantis_bug_table AS b, mantis_user_table AS u
		WHERE b.handler_id=u.id
		GROUP BY b.handler_id
		LIMIT 0,30";

$query3 ="
        SELECT *
        FROM mantis_bug_table
        WHERE status=80
";

/* FIN de consultas*/

$resultante=$conexion->consulta1($query1);
//print_r($resultante);
echo "<form id='formulario'>";
for($i=0;$resultante["contador"]>$i;$i++){
    echo "<input type='text' id='valor-id-$i' name='valor-id-$i' value='".$resultante["resultante"][$i]["id"]."'/>";
    echo "<input type='text' id='valor-reu-$i' name='valor-reu-$i' value='".$resultante["resultante"][$i]["realname"]."'/>";
    echo "<br/>";
}    
echo "<input type ='hidden' id='cantidad' name ='cantidad' value='".$resultante["contador"]."' />";
echo "</form>";
echo "<hr/>";
echo "<hr/>";
$resultante2=$conexion->consulta1($query3);
echo "<form id='formulario2'>";
for($i=0;$resultante2["contador"]>$i;$i++){
    echo "ID :: <input type = 'text' name='resid$i' id='resid$i' value='".$resultante2["resultante"][$i]["id"]."' />";
	echo "Reportero :: <input type = 'text' name='rerep$i' id='rerep$i' value='".$resultante2["resultante"][$i]["reporter_id"]."'/>";
	echo "Asignado :: <input type = 'text' value='".$resultante2["resultante"][$i]["handler_id"]."' />";
	echo "Status :: <input type = 'text' value='".$resultante2["resultante"][$i]["status"]."'/>";
    echo "<br/>";
}
echo "</form>";
?>