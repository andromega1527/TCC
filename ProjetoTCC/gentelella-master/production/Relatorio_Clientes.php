<!DOCTYPE html>
<html>
<head>
	<html lang="pt">
	<meta charset="utf-8" />
	<title>Relatório de Clientes</title>

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
		
		<h1>Relatório de Clientes</h1><br>

		<form method="Post" action="">
			<input type="text" name="pesquisa">
			<input type="submit" value="Pesquisar">
		</form><br><br>

		<div id="tabela" align="center">

			<table class="tabela" border="2px" align="center">
				<thead id="tabela">
					<tr id="coluna_Principal">
						<td>Nome</td>
						<td>Estado</td>
						<td>Cidade</td>
					</tr>
				</thead>

				<tbody id="tabela_Dados">
					<?php
						@$pesquisa = $_POST['pesquisa'];

						//Conexão com o Banco
						require("ConectBD.php");

						if(isset($pesquisa)){
						  	$sqlSelect = "SELECT Cliente.Codigo_Cliente, Cliente.Nome, Cidade.Codigo_Cidade, Cidade.Nome, Estado.Codigo_Estado, Estado.Nome 
						  				  FROM Cliente 
						  				  INNER JOIN Cidade ON Cliente.Cidade = Cidade.Codigo_Cidade
						  				  INNER JOIN Estado ON Cliente.Estado = Estado.Codigo_Estado
						  				  WHERE Cliente.Nome LIKE '%$pesquisa%' ORDER BY 'Cliente.Nome' ASC ";
						} else {
						  	$sqlSelect = "SELECT Cliente.Codigo_Cliente, Cliente.Nome, Cidade.Codigo_Cidade, Cidade.Nome, Estado.Codigo_Estado, Estado.Nome 
						  				  FROM Cliente
						  				  INNER JOIN Cidade ON Cliente.Cidade = Cidade.Codigo_Cidade
						  				  INNER JOIN Estado ON Cliente.Estado = Estado.Codigo_Estado
						  				  ORDER BY 'Cliente.Nome' ASC";
						}

						$resultado = mysqli_query($link, $sqlSelect);

						$c = 1;

						while ($cont = mysqli_fetch_array($resultado)) {
							$cod = $cont['Codigo_Cliente'];
							$codE = $cont['Codigo_Estado'];
							$codCi = $cont['Codigo_Cidade'];
							$nome = $cont[1];
							$estado = $cont[3];
							$cidade = $cont['Nome'];

							echo "<tr id=\"edit". $c++ ."\">
									<input type=\"hidden\" name=\"cod\" value=\"$cod\">
									<td>$nome</td>
									<td>$estado</td>
									<td>$cidade</td>
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