<?php
header('Content-Type: application/json');
require_once('funcoes.php');

$urlValor = 'http://veiculos.fipe.org.br/api/veiculos/ConsultarValorComTodosParametros';

$mesCodigo = $_GET["mes"];
$marcaCodigo = $_GET["marca"];
$modeloCodigo = $_GET["modelo"];
$anoCodigo = $_GET["ano"];
$separaAno = explode('-',$anoCodigo);
$codigoTipoCombustivel = $separaAno[1];
$anoModelo = $separaAno[0];

$arrayValor = array(
	'codigoTipoVeiculo' => 1,
	'codigoTabelaReferencia' => $mesCodigo,
	'codigoModelo' => $modeloCodigo,
	'codigoMarca' => $marcaCodigo,
	'ano' => $anoCodigo,
	'codigoTipoCombustivel' => $codigoTipoCombustivel,
	'anoModelo' => $anoModelo,
	'tipoConsulta' => 'Tradicional'
);

$jsonValor = curl($urlValor, $arrayValor);
$valor = ($jsonValor);
echo trim($valor);