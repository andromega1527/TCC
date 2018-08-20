<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Lista de Orçamentos</title>

	<?php
		require "link.php";
	?>
	<link rel="stylesheet" type="text/css" href="css2\main.css">

</head>

<?php
	require "menu.php";
?>

	<div id="lista">
		<h1>Lista de Orçamentos</h1><br>

		<form method="Post" action="">
			<input type="text" name="pesquisa">
			<input type="submit" value="Pesquisar">
		</form><br><br>

		<div align="center">
			<table class="tabela" border="2px" align="center">
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
					<?php
						@$pesquisa = $_POST['pesquisa'];

						if (isset($pesquisa)) {
							$sqlSelect = "SELECT * FROM Orcamento WHERE Cliente.Nome LIKE '%$pesquisa%' ORDER BY 'Cliente.Nome' ASC ";
						} else {
							$sqlSelect = "SELECT * FROM Orcamento ORDER BY 'Cliente' ASC ";
						}

						//Conexão com o Banco
						require("ConectBD.php");

						$resultado = mysqli_query($link, $sqlSelect);

						while ($cont = mysqli_fetch_array($resultado)) {
							$status = $cont['Status'];
							$cliente = $cont['Cliente'];
							$funcionario = $cont['Funcionario'];
							$data = $cont['Data_Emissao'];
							$hora = $cont['Hora_Emissao'];
							$desconto = $cont['Desconto'];
							$parcelamento = $cont['Parcelamento'];
							$subT = $cont['SubTotal'];
							$total = $cont['Total'];

							echo "<tr>
									<td>$status</td>
									<td>$cliente</td>
									<td>$funcionario</td>
									<td>$data</td>
									<td>$hora</td>
									<td>$desconto</td>
									<td>$parcelamento</td>
									<td>$subT</td>
									<td>$total</td>
					  			</tr>";
						}
					?>
				</tbody>
				
			</table>

		</div>
		
	</div>

<?php
	require "script.php";
?>

</body>
</html>