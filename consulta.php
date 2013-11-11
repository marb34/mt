<?php

/**
 * @author Marco Ramirez
 * @version 0.1
 */
$usuario1=$_GET["user"]; 
//echo $usuario1." ";
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

/* FIN de consultas*/
/*
$resultante=mysql_query($query);
$cantidad=mysql_num_rows($resultante);
$resultante1=mysql_query($query1);
*/
$resultante=$conexion->consulta1($query1);
for($i=0;$resultante["contador"]>$i;$i++){
	echo json_encode($resultante["resultante"][$i]["realname"])." :: ";
	echo json_encode($resultante["resultante"][$i]["Total"])."<br/>";
	echo "<hr/>";
}

?>