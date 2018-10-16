<!DOCTYPE html>
<html>
<head>
	<html lang="pt">
	<meta charset="utf-8" />
	<title>Relatório de Orçamentos</title>

	<?php
		require "link.php";
	?>
	<link rel="stylesheet" type="text/css" href="css2\main.css">

</head>

<?php
	require "menu.php";
?>

<div id="scroll" class="right_col" role="main">
	<div id="lista">
		
		<h1>Relatório de Orçamentos</h1><br>

		<form method="Post" action="">
			<input type="text" name="pesquisa">
			<input type="submit" value="Pesquisar">
		</form><br><br>

		<div id="tabela" align="center">

			<table class="tabela" border="2px" align="center">
				<thead id="tabela">
					<tr id="coluna_Principal">
						<td>Orçamento</td>
						<td>Nome do Cliente</td>
						<td>Nome do Funcionario</td>
					</tr>
				</thead>

				<tbody id="tabela_Dados">
					<?php
						@$pesquisa = $_POST['pesquisa'];

						//Conexão com o Banco
						require("ConectBD.php");

						if(isset($pesquisa)){
						  	$sqlSelect = "SELECT Orcamento.Codigo_Orcamento, Orcamento.Cliente, Orcamento.Funcionario, Cliente.Codigo_Cliente, Cliente.Nome, Funcionario.Codigo_Funcionario, Funcionario.Nome
						  				  FROM Orcamento
						  				  INNER JOIN Cliente ON Orcamento.Cliente = Cliente.Codigo_Cliente
						  				  INNER JOIN Funcionario ON Orcamente.Funcionario = Funcionario.Codigo_Funcionario
						  				  WHERE Cliente.Nome LIKE '%$pesquisa%' ORDER BY Cliente.Nome ASC ";
						} else {
						  	$sqlSelect = "SELECT Orcamento.Codigo_Orcamento, Orcamento.Cliente, Orcamento.Funcionario, Cliente.Codigo_Cliente, Cliente.Nome, Funcionario.Codigo_Funcionario, Funcionario.Nome
						  				  FROM Orcamento
						  				  INNER JOIN Cliente ON Orcamento.Cliente = Cliente.Codigo_Cliente
						  				  INNER JOIN Funcionario ON Orcamento.Funcionario = Funcionario.Codigo_Funcionario
						  				  ORDER BY Cliente.Nome ASC";
						}

						$resultado = mysqli_query($link, $sqlSelect);

						$c = 1;

						while ($cont = mysqli_fetch_array($resultado)) {
							$nomeC = $cont[4];
							$nomeF = $cont['Nome'];
							$cod = $cont['Codigo_Orcamento'];

							echo "<tr id=\"edit". $c++ ."\">
									<td>$cod</td>
									<td>$nomeC</td>
									<td>$nomeF</td>
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