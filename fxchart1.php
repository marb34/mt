<?php 
$contador=(int)$_GET["cantidad-1"];
for ($i=0;$contador>$i;$i++){
    $cant_casos=$_GET["valor-id-$i"];
    $uid=$_GET["userid-$i"];
    $usuario_nombre=$_GET["valor-reu-$i"];
    $Total_tipo=$_GET["res_usr-$i"];
    $primerarray[]=array("nombre"=>$usuario_nombre,"casos"=>(int)$cant_casos,"Resueltos"=>(int)$Total_tipo);
}
//var_dump($primerarray);
echo json_encode($primerarray);
$valores_recibidos=json_encode($primerarray);

//consulta extra

/*$nuevo=NEW MySQLCon;
$queryx="SELECT * FROM mantis_bug_table";
$resultado1=$nuevo->consulta1($queryx);
$cantidad2=$resultado1["contador"];
print_r($resultado1);
echo "<br/>";
*/
?>

<script type="text/javascript">
var chart1;

function loadChart()
{
	chart1 = new cfx.Chart();
	chart1.getData().setSeries(2);
	chart1.getAxisY().setMin(0);
	chart1.getAxisY().setMax(20);
	var series1 = chart1.getSeries().getItem(0);
	var series2 = chart1.getSeries().getItem(0);
	series1.setGallery(cfx.Gallery.Lines);
	series2.setGallery(cfx.Gallery.Bar);
	var data = /*[
	{ "Month": "Jan", "Bikes": 1800, "Parts": 1300 },
	{ "Month": "Feb", "Bikes": 1760, "Parts": 900 },
	{ "Month": "Mar", "Bikes": 1740, "Parts": 970 },
	{ "Month": "Apr", "Bikes": 1750, "Parts": 1010},
	{ "Month": "May", "Bikes": 1810, "Parts": 1070 },
	{ "Month": "Jun", "Bikes": 1920, "Parts": 1180 }
    
	]*/<?php echo $valores_recibidos;?>;
	chart1.setDataSource(data);
	var divHolder = document.getElementById('ChartDiv');
	chart1.create(divHolder);
}

</script>
<script>loadChart();</script>