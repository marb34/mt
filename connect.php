<?php

/**
 * @author : Marco Ramirez
 * @version : 0.1
 */

class MySQLCon {
    private $server="";
    private $user_name="";
    private $passw="";
    private $DB=""; 
    
    /**
     * This function is used to connect to the database
     * @param $servidor : String Server name
     * @param $usuario  : String User name
     * @param $contras  : String Password
     * @param $base     : String Dtabase Name
     */
     
    function conectar($servidor,$usuario,$contras,$base){
        $link=mysql_connect($servidor,$usuario,$contras) or die ("Can't connect to the Database Server");
        $conect=mysql_select_db($base,$link) or die ("Can't find the database");
        return $conect;
    }
    
    /**
     * To realize a complete select
     * @param string $table
     * @return resource
     */
    function cons_todo($table){
        $result=mysql_query("SELECT * FROM $table");
        return $result;
    }
    
    /**
     * Realize the query and return the associative array and the count
     * @param string $query
     * @return array with (resource,int)
     */
    function consulta1($query){
        $resultado=mysql_query($query);
        $devolver["resultante"]=mysql_fetch_assoc($resultado);
        $devolver["contador"]=mysql_num_rows($resultado);
        return $devolver;
    }
} 
?>