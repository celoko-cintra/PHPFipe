<?php
header('Content-Type: application/json');
require_once('funcoes.php');

$urlAno = 'http://veiculos.fipe.org.br/api/veiculos/ConsultarAnoModelo';

$mesCodigo = $_GET["mes"];
$marcaCodigo = $_GET["marca"];
$modeloCodigo = $_GET["modelo"];

$arrayAno = array(
	'codigoTipoVeiculo' => 1,
	'codigoTabelaReferencia' => $mesCodigo,
	'codigoMarca' => $marcaCodigo,
	'codigoModelo' => $modeloCodigo,
	'ano' =>'',
	'codigoTipoCombustivel' =>'',
	'anoModelo' =>'',
	'modeloCodigoExterno' =>'',
);

$jsonAno = str_replace('32000 ', '0km ', curl($urlAno, $arrayAno));
$ano = ($jsonAno);
echo trim($ano);