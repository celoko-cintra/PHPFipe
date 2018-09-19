<?php
header('Content-Type: application/json');
require_once('funcoes.php');

$urlMes = 'http://veiculos.fipe.org.br/api/veiculos/ConsultarTabelaDeReferencia';

$jsonMes = curl($urlMes);
$mes = ($jsonMes);
echo trim($mes);