<?php
header('Content-Type: application/json');
require_once('funcoes.php');

$urlModelos = 'http://veiculos.fipe.org.br/api/veiculos/ConsultarModelos';

$mesCodigo = $_GET["mes"];
$marcaCodigo = $_GET["marca"];

$arrayModelos = array(
	'codigoTipoVeiculo'	=> 1,
	'codigoTabelaReferencia' => $mesCodigo,
	'codigoModelo' => '',
	'codigoMarca' => $marcaCodigo,
	'ano' => '',
	'codigoTipoCombustivel' => '',
	'anoModelo' => '',
	'modeloCodigoExterno' => ''
);

$jsonModelos = curl($urlModelos, $arrayModelos);
$modelos = ($jsonModelos);
echo trim($modelos);