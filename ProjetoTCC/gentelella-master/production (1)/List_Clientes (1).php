<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Lista de Clientes</title>

	<?php
		require "link.php";
	?>
	<link rel="stylesheet" type="text/css" href="css2\main.css">

</head>

<?php
	require "menu.php";
?>

	<div id="lista">
		<h1>Lista de Clientes</h1><br>

		<div align="center">
			<table class="tabela" border="2px" align="center">
				<thead>
					<tr>
						<td>Nome</td>
						<td>Sexo</td>
						<td>Data de Nascimento</td>
						<td>CPF</td>
						<td>CNPJ</td>
						<td>Telefone</td>
						<td>Celular</td>
						<td>Endereço</td>
						<td>Bairro</td>
						<td>Número</td>
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