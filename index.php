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
<script type="text/javascript">
    var chart1;

    function loadChart()
      {
           chart1 = new cfx.Chart();
            chart1.getData().setSeries(2);
            chart1.getAxisY().setMin(500);
            chart1.getAxisY().setMax(2000);
            var series1 = chart1.getSeries().getItem(0);
            var series2 = chart1.getSeries().getItem(1);
            series1.setGallery(cfx.Gallery.Lines);
            series2.setGallery(cfx.Gallery.Bar);
            var data = [
            { "Month": "Jan", "Bikes": 1800, "Parts": 1300 },
            { "Month": "Feb", "Bikes": 1760, "Parts": 900 },
            { "Month": "Mar", "Bikes": 1740, "Parts": 970 },
            { "Month": "Apr", "Bikes": 1750, "Parts": 1010},
            { "Month": "May", "Bikes": 1810, "Parts": 1070 },
            { "Month": "Jun", "Bikes": 1920, "Parts": 1180 }
            ];
            chart1.setDataSource(data);
            var divHolder = document.getElementById('ChartDiv');
        chart1.create(divHolder);
      }

</script>
</body>
</html>