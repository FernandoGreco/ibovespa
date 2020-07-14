<?php
require_once 'app/modules/ibov.php';
require_once 'phplot/phplot.php';

$ibov = new ibov();

list($open,$high,$low,$close,$data) = $ibov->dados();


//tamanho da tela
$grafico = new phplot(1300, 600);


$grafico->SetFileFormat("png");
 
#Indicamos o títul do gráfico e o título dos dados no eixo X e Y do mesmo
$grafico->SetTitle("IBOVESPA 2019/2020");
$grafico->SetXTitle("Data");
$grafico->SetYTitle("IBOVESPA");
$grafico->SetLineWidths(2);
$grafico->SetDrawXGrid(True);


$total = count($data);


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


?>


