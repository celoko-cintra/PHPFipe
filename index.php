<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Consulta FIPE</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
	
	<p>Consulta FIPE:</p>

	<p><select id="mes">
	</select></p>

	<p><select id="marcas">
	</select></p>

	<p><select id="modelos">
	</select></p>

	<p><select id="ano">
	</select></p>

	<p><span id="valor"></span></p>


	<script language="javascript">
		$(document).ready(function() {
			var urlBase = "./mes.php";

			/** Mes**/
			$.getJSON("./mes.php", function(data) {
				var items = ["<option value=\"\">ESCOLHA UM MÊS</option>"];
				$.each(data, function(key, val) {
					items += ("<option value='" + val.Codigo + "'>" + val.Mes + "</option>");
				});
				$("#mes").html(items);
			});

			/** Marcas**/
			$("#mes").change(function() {
				$.getJSON("./marcas.php?mes=" + $("#mes").val(), function(data) {
					var items = ["<option value=\"\">ESCOLHA UMA MARCA</option>"];
					$.each(data, function(key, val) {
						items += ("<option value='" + val.Value + "'>" + val.Label + "</option>");
					});
					$("#marcas").html(items);
				});
			});

			/** Veiculo**/
			$("#marcas").change(function() {
				$.getJSON("./modelos.php?mes=" + $("#mes").val() + "&marca=" + $("#marcas").val(), function(data) {
					var items = ["<option value=\"\">ESCOLHA UM VEICULO</option>"];
					$.each(data.Modelos, function(key, val) {
						items += ("<option value='" + val.Value + "'>" + val.Label + "</option>");
					});
					$("#modelos").html(items);
				});
			});

			/** Ano**/
			$("#modelos").change(function() {
				$.getJSON("./ano.php?mes=" + $("#mes").val() + "&marca=" + $("#marcas").val() + "&modelo=" + $("#modelos").val(), function(data) {
					var items = ["<option value=\"\">ESCOLHA O ANO</option>"];
					$.each(data, function(key, val) {
						items += ("<option value='" + val.Value + "'>" + val.Label + "</option>");
					});
					$("#ano").html(items);
				});
			});

			/** Valor**/

			/* detalhes:
			{"Valor":"R$ 28.520,00","Marca":"GM - Chevrolet","Modelo":"Classic Life/LS 1.0 VHC FlexP. 4p","AnoModelo":2016,"Combustivel":"Gasolina","CodigoFipe":"004360-5","MesReferencia":"setembro de 2018 ","Autenticacao":"n3qkq11chvy1","TipoVeiculo":1,"SiglaCombustivel":"G","DataConsulta":"terça-feira, 11 de setembro de 2018 18:52"}
			*/

			$("#ano").change(function() {
				$.getJSON("./detalhes.php?mes=" + $("#mes").val() + "&marca=" + $("#marcas").val() + "&modelo=" + $("#modelos").val() + "&ano=" + $("#ano").val(), function(data) {
					$("#valor").html(data.Valor);
				});
			});
		});  	
	</script>
</body>

</html>