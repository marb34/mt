<!DOCTYPE html>
<html>
<head>
    <link type="image/x-icon" rel="shortcut-icon" href="favicon.ico" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
    <link rel="stylesheet" type="text/css" href="css/styles/jchartfx.css" />
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>
    <script type="text/javascript" src="js/jchartfx/jchartfx.system.js"></script>
    <script type="text/javascript" src="js/jchartfx/jchartfx.coreBasic.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $(".primero").click(function(){
            enviar1();
        });
    });
        function enviar1(){
            var user_name = document.getElementById("usuario").value;
            $.ajax({
                type    : "GET",
                url     : "consulta.php",
                data    : {user:user_name},
                success : function(data, textStatus, jqXHR){
                            $('#contenedor').html(data);
                            serializar();
                        }
            });
            }
        
        function serializar(){
            var contenido=$("#formulario").serialize();
            //alert(contenido);
            //$("#contenedor2").load("fxchart1.php");
            $.ajax({
                type    : "GET",
                url     : "fxchart1.php",
                data    : contenido,
                success : function(data, textStatus, jqXHR){
                            $('#contenedor2').html(data);
                        }
            });
        }
   </script>
</head>
<body >
	<header><?php include "menu.php"; ?></header>
	<div id="x1">
		<form>
			<input type='hidden' name='usuario' id="usuario" value=""/>
		</form>
	</div>
    <div id="contenedor"></div>
	<div id="contenedor2"></div>
	<div id="ChartDiv"></div>
</body>
</html>