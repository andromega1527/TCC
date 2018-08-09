<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Lista de Orçamentos ativos</title>

	<?php
		require "link.php";
	?>
	<link rel="stylesheet" type="text/css" href="css2\main.css">

</head>
<?php
	require "menu.php";
?>


	<div id="lista">
		<h1>Lista de Orçamentos Ativos</h1><br>

		<div align="center">
			<table class="tabela" align="center">
				<thead>
					<tr>
						<td>Status</td>
						<td>Cliente</td>
						<td>Funcionário</td>
						<td>Data de Emissão</td>
						<td>Hora de Emissão</td>
						<td>Desconto</td>
						<td>Parcelamento</td>
						<td>SubTotal</td>
						<td>Total</td>
					</tr>
				</thead>

				<tbody>
					
				</tbody>
				
			</table>

		</div>
		
	</div>

<?php
	require "script.php";
?>

</body>
</html>