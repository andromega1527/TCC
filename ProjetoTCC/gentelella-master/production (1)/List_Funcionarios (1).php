<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Lista de Funcionários</title>

	<?php
		require "link.php";
	?>
	<link rel="stylesheet" type="text/css" href="css2\main.css">

</head>
<?php
	require "menu.php";
?>


	<div id="lista">
		<div align="center">
			<h1>Lista de Funcionários</h1><br>

			<table class="tabela" align="center">
				<thead>
					<tr>
						<td>Nome</td>
						<td>CPF</td>
						<td>Sexo</td>
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