<?php
header( 'Content-type: text/html; charset=utf-8' );
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Documento sin título</title>
<style>
	.progreso { width: 100px; height: 20px; border:1px solid black; float:left;}
	.avance { height:20px; float:left; background: red; }
</style>
</head>
<body>
<div class="progreso">
	<div class="barra">
	<?php
    $link=mysql_connect("localhost","root","marb180575") or die("mmm, no");
            mysql_select_db("bugtracker1",$link) or die ("creo que te equivocaste de nombre de tabla");
			$res1=mysql_query("SELECT * FROM mantis_bug_table");
		for($i=0;$i<10;$i++)
		{
			echo '<span style="width:10px;" class="avance"></span>';
            /*
            $link=mysql_connect("localhost","root","marb180575") or die("mmm, no");
            mysql_select_db("bugtracker1",$link) or die ("creo que te equivocaste de nombre de tabla");
			$res1=mysql_query("SELECT * FROM mantis_bug_table");
            */
            flush();
			ob_flush();
            sleep(1);
            
		}
        for($u=0;$u<mysql_num_rows($res1);$u++){
		  echo mysql_result($res1,$u,"reporter_id")."<br/>";
		}
	?>
	</div>
</div>
</body>
</html>