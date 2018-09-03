<!DOCTYPE html>
<html>
<head>
	<html lang="pt">
	<meta charset="utf-8" />
	<title>Histórico de Alteração de Dados</title>

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
		<h1>Histórico de Alteração de Dados</h1><br>

		<form method="Post" action="">
			<input type="text" name="pesquisa">
			<input type="submit" value="Pesquisar">
		</form><br><br>

		<div align="center">
			<table class="tabela" align="center">
				<thead>
					<tr>
						<td>Funcionario</td>
						<td>Data</td>
						<td>Descrição do Registro</td>
					</tr>
				</thead>

				<tbody>
					<?php
						@$pesquisa = $_POST['pesquisa'];

						//Conexão com o Banco
						require("ConectBD.php");

						if(isset($pesquisa)){
						  $sqlSelect = "SELECT Registro.Codigo_Registro, Registro.Funcionario, Registro.Data, Registro.Descricao, Funcionario.Codigo_Funcionario, Funcionario.Nome
						  				FROM Registro
						  				INNER JOIN Funcionario ON Registro.Funcionario = Funcionario.Codigo_Funcionario
						  				WHERE Funcionario.Nome LIKE '%$pesquisa%' ORDER BY Funcionario.Nome ASC ";
						} else {
						  $sqlSelect = "SELECT Registro.Codigo_Registro, Registro.Funcionario, Registro.Data, Registro.Descricao, Funcionario.Codigo_Funcionario, Funcionario.Nome
						  				FROM Registro
						  				INNER JOIN Funcionario ON Registro.Funcionario = Funcionario.Codigo_Funcionario
						  				ORDER BY Funcionario.Nome ASC ";
						}

						$resultado = mysqli_query($link, $sqlSelect);

						while ($cont = mysqli_fetch_array($resultado)) {
							$nome = $cont['Nome'];
							$data = $cont['Data'];
							$descricao = $cont['Descricao'];

							echo "<tr>
									<td>$nome</td>
									<td>$data</td>
									<td>$descricao</td>
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