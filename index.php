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
            $.ajax({
				type 	: "GET",
				url     : "fxchart1.php",
				data	: $('#contenedor').serialize(),
				success	: function(data){
							alert (data);
					}
            });
    }
   </script>
</head>
<body onload="loadChart()">
<header><?php include "menu.php"; ?></header>
<div id="x1">
	<form>
	Nombre de Usuario : <input type='text' name='usuario' id="usuario" />
	<input type="button" value="ok" class="boton1" />
	</form>
</div>
<div id="contenedor"></div>

<div id="ChartDiv"></div>
</body>
</html>