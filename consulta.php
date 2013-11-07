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
SELECT *
FROM mantis_bug_table AS b, mantis_user_table AS u, mantis_bugnote_table AS bn, mantis_bugnote_text_table AS bnt
WHERE b.reporter_id=u.id
GROUP BY b.reporter_id";

/* FIN de consultas*/
/*
$resultante=mysql_query($query);
$cantidad=mysql_num_rows($resultante);
$resultante1=mysql_query($query1);
*/
$resultante=$conexion->consulta1($query1);
for($i=0;$resultante["contador"]>$i;$i++){
    echo "<hr/>";
    echo json_encode($resultante);
}
/*echo $cantidad."\n";
if ($cantidad==0) die ("Error en nombre");
for ($i=0;$i<$cantidad;$i++){
    echo mysql_result($resultante,$i,"b.id")."  ";
    echo mysql_result($resultante,$i,"u.id")."  ";
    echo mysql_result($resultante,$i,"u.realname")."  ";
    echo "<div>".mysql_result($resultante,$i,"bnt.note")."</div>  ";
    echo mysql_result($resultante,$i,"b.project_id")."<br/>";
}
echo "<h1>".mysql_result($resultante1,0,"total")."</h1><br/>";
*/
?>