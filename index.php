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
        $(".boton1").click(function(){
            enviar1();
        });
        $(".boton2").click(function(){
            serializar();
        });
        });
        function enviar1(){
            var user_name = document.getElementById("usuario").value;
            alert (user_name);
            $.ajax({
                type    : "GET",
                url     : "consulta.php",
                data    : {user:user_name},
                success : function(data, textStatus, jqXHR){
                            $('#contenedor').html(data);
                        }
            });
            }
        
        function serializar(){
            var contenido=$("#formulario").serialize();
            alert(contenido);
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
			Nombre de Usuario : <input type='text' name='usuario' id="usuario" />
			<input type="button" value="ok" class="boton1" />
		</form>
	    <input type="button" value="try me" class="boton2" />
	</div>
	<div id="contenedor"></div>
	<div id="contenedor2"></div>
	<div id="ChartDiv"></div>
</body>
</html>