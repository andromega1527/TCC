<!DOCTYPE html>
<html>
<head>
	<html lang="pt">
	<meta charset="utf-8" />
	<title>Lista de Orçamentos Ativos</title>

	<?php
		require "link.php";
	?>
	<link rel="stylesheet" type="text/css" href="css2\main.css">

</head>
<?php
	require "menu.php";
?>

<div class="right_col" id="scroll" role="main">
	<div id="lista">
		<h1>Lista de Orçamentos Ativos</h1><br>

		<form method="Post" action="">
			<input type="text" name="pesquisa">
			<input type="submit" value="Pesquisar">
		</form><br><br>

		<div id="tabela" align="center">
			<button id="editar">Editar Dados</button>

			<table class="tabela" align="center">
				<thead>
					<tr style="color: black">
						<td>Status</td>
						<td>Cliente</td>
						<td>Funcionário</td>
						<td>Data de Emissão</td>
						<td>Hora de Emissão</td>
						<td>Desconto</td>
						<td>SubTotal</td>
						<td>Total</td>
						<td>Produto</td>
					</tr>
				</thead>

				<tbody id="tabela_Dados">
					<?php
						@$pesquisa = $_POST['pesquisa'];

						//Conexão com o Banco
						require("ConectBD.php");

						if (isset($pesquisa)) {
							$sqlSelect = "SELECT Orcamento.Codigo_Orcamento, Orcamento.Status, Orcamento.Cliente, Orcamento.Funcionario, Orcamento.Data_Emissao, Orcamento.Hora_Emissao, Orcamento.Desconto, Orcamento.SubTotal, Orcamento.Total, Cliente.Codigo_Cliente, Cliente.Nome, Funcionario.Codigo_Funcionario, Funcionario.Nome
										  FROM Orcamento
										  INNER JOIN Cliente ON Orcamento.Cliente = Cliente.Codigo_Cliente
										  INNER JOIN Funcionario ON Orcamento.Funcionario = Funcionario.Codigo_Funcionario
										  WHERE Cliente.Nome LIKE '%$pesquisa%' and Orcamento.Status = 'Ativo' ORDER BY Cliente.Nome ASC ";
						} else {
							$sqlSelect = "SELECT Orcamento.Codigo_Orcamento, Orcamento.Status, Orcamento.Cliente, Orcamento.Funcionario, Orcamento.Data_Emissao, Orcamento.Hora_Emissao, Orcamento.Desconto, Orcamento.SubTotal, Orcamento.Total, Cliente.Codigo_Cliente, Cliente.Nome, Funcionario.Codigo_Funcionario, Funcionario.Nome
										  FROM Orcamento 
										  INNER JOIN Cliente ON Orcamento.Cliente = Cliente.Codigo_Cliente
										  INNER JOIN Funcionario ON Orcamento.Funcionario = Funcionario.Codigo_Funcionario
										  WHERE Orcamento.Status = 'Ativo' ORDER BY Cliente.Nome ASC ";
						}

						$resultado = mysqli_query($link, $sqlSelect);

						$c = 1;

						while ($cont = mysqli_fetch_array($resultado)) {
							$cod = $cont['Codigo_Orcamento'];
							$status = $cont['Status'];
							$cliente = $cont[10];
							$funcionario = $cont['Nome'];
							$data = $cont['Data_Emissao'];
							$hora = $cont['Hora_Emissao'];
							$desconto = $cont['Desconto'];
							$subT = $cont['SubTotal'];
							$total = $cont['Total'];

							echo "<tr id=\"edit". $c++ ."\">
									<input type=\"hidden\" name=\"cod\" value=\"$cod\">
									<td>$status</td>
									<td>$cliente</td>
									<td>$funcionario</td>
									<td>$data</td>
									<td>$hora</td>
									<td>$desconto</td>
									<td>$subT</td>
									<td>$total</td>
									<td><a href=\"List_ProdutosL.php?cod=$cod\"><button>Produtos</button></a></td>
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
<script src="js2/mainOrcamentoAtivo.js"></script>

</body>
</html>