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

$query="
		SELECT b.id,u.realname,u.username,u.id,COUNT(b.handler_id) AS Total
		FROM mantis_bug_table AS b, mantis_user_table AS u
		WHERE b.handler_id=u.id
		GROUP BY b.handler_id
        LIMIT 0,10
		";


/* FIN de consultas*/

$resultante=$conexion->consulta1($query);
echo "<form id='formulario'><p><h1>$label1</h1></p>";
    for($i=0;$resultante["contador"]>$i;$i++){
        echo "<input type='hidden' id='valor-id-$i' name='valor-id-$i' value='".$resultante["resultante"][$i]["Total"]."'/>";
        echo "<input type='hidden' id='valor-reu-$i' name='valor-reu-$i' value='".$resultante["resultante"][$i]["username"]."'/>";
        echo "<input type='hidden' id='Total-$i' name='Total-$i' value='".$resultante["resultante"][$i]["Total"]."'/>";
        echo "<input type='hidden' id='userid-$i' name='userid-$i' value='".$resultante["resultante"][$i]["id"]."'/>";
            $queryx="SELECT COUNT(*) AS resolved FROM mantis_bug_table WHERE handler_id=".$resultante["resultante"][$i]["id"]." AND status=80 ORDER BY handler_id";
            $resultado1=mysql_query($queryx);
            $resueltos=mysql_result($resultado1,0,"resolved");
            //echo "<p>Total de Resueltos :: $resueltos</p>";
            echo "<input type='hidden' id='res_usr-$i' name='res_usr-$i' value='".$resueltos."'/>";
    }    
    echo "<input type ='hidden' id='cantidad-1' name ='cantidad-1' value='".$resultante["contador"]."' />";
echo "</form>";
?>