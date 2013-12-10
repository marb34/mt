<?php

/**
 * @author Marco Ramirez
 * @copyright 2013
 */

$conexion2=new MySQLCon;
$conexion2->conectar("localhost","root","marb180575","bugtracker1");

$query="
		SELECT b.id,u.realname,u.username,u.id,COUNT(b.handler_id) AS Total
		FROM mantis_bug_table AS b, mantis_user_table AS u
		WHERE b.handler_id=u.id
		GROUP BY b.handler_id
        LIMIT 0,10
		";

?>