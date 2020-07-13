<?php
require_once 'app/modules/ibov.php';
require_once 'phplot/phplot.php';

$ibov = new ibov();

list($open,$high,$low,$close,$data) = $ibov->dados();


//var_dump($high);
//var_dump($close);
$grafico = new phplot(1300, 600);


$grafico->SetFileFormat("png");
 
#Indicamos o títul do gráfico e o título dos dados no eixo X e Y do mesmo
$grafico->SetTitle("IBOVESPA 2019/2020");
$grafico->SetXTitle("Data");
$grafico->SetYTitle("IBOVESPA");
//$grafico->SetXLabelType('time', '%d-%m-%Y');
$grafico->SetLineWidths(2);
$grafico->SetDrawXGrid(True);


$total = count($data);
#Definimos os dados do gráfico
//for($i=0;$i<6;$i++){
//$dados[$i] = array($data[$i],$open[$i]);
//};

//define o intervalo entre as datas
$intervalo = 2;
$cont = 0;
#Definimos os dados do gráfico
for($i=0;$i<$total;$i++){  
    if($intervalo == 2){        
        $dados[$cont] = array(strtotime($data[$i]),$open[$i],$high[$i],$low[$i],$close[$i]);
        $cont++;
        $intervalo = 0; 
    }
    $intervalo++;
};

//$data[] = array('', strtotime($data[0]), $d[1], $d[2], $d[3], $d[4]);


$grafico->SetGridColor('brown');
  
$grafico->SetDataValues($dados);
  
#Neste caso, usariamos o gráfico em barras
//$grafico->SetPlotType("lines");
$grafico->SetXLabelAngle(90);

$grafico->SetXLabelType('time', '%d-%m-%Y');

$grafico->SetPlotType('candlesticks');
$grafico->SetDataColors(array('#008000', 'red'));

$grafico->SetBackgroundColor('#ccffff'); 
#Exibimos o gráfico
$grafico->DrawGraph();

/*
$api = new hgApi();


$altaDoDia = $api->requestMoreOrLess('get-high');


$baixaDoDia = $api->requestMoreOrLess('get-low');

//retorna array com dados da moeda; name, buy, sell e variation
//1 parametro é a URL do local; 2 e 3 são parametros para o JSON 
$dolar =$api->request('finance/quotations','currencies','USD'); 
$euro = $api->request('finance/quotations','currencies','EUR'); 
$btc = $api->request('finance/quotations','currencies','BTC');
$ibov = $api->request('finance/quotations','stocks','IBOVESPA'); 


   //altera a cor do fundo da moeda; vermelho para negativo, azul positivo
	$variationDolar = ($dolar['variation'] < 0) ? 'danger' : 'info';
	$variationEuro = ($euro['variation'] < 0) ? 'danger' : 'info';
	$variationBitCoin = ($btc['variation'] < 0) ? 'danger' : 'info';
	$variationIbov = ($ibov['variation'] < 0) ? 'danger' : 'info';

	$home = new home();


	$home->template_header();
*/
	
?>




<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<div class="variation"></div>
<div class="container">
  <div class="row">

  <div class="col-12 col-sm-6 col-xl-3">

  <?php 
//exibe dados moeda
//$home->coin($ibov,$variationIbov);
?>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
  <?php 
//exibe dados moeda
//$home->coin($dolar,$variationDolar);
?>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
     <?php 
//exibe dados moeda
//$home->coin($euro,$variationEuro);
?>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
     <?php 
//exibe dados moeda
//$home->coin($btc,$variationBitCoin);
?>
   
    </div>
  </div>

  <?php
  //$home->bigVaration($altaDoDia,'alta');

  //$home->bigVaration($baixaDoDia,'baixa');
  ?>
</div>

<?php 

//new ibov();

//$home->templete_footer();
?>
</body>
</html>
