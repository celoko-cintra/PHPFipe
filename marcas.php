<?php
header('Content-Type: application/json');
require_once('funcoes.php');

$urlMarcas = 'http://veiculos.fipe.org.br/api/veiculos/ConsultarMarcas';

$mesCodigo = $_GET["mes"];

$arrayMarcas = array(
	'codigoTabelaReferencia' => $mesCodigo,
	'codigoTipoVeiculo' => 1
);

$jsonMarcas = curl($urlMarcas, $arrayMarcas);
$marcas = ($jsonMarcas);
echo trim($marcas);