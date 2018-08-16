<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Lista de Clientes Ativos</title>

	<?php
		require "link.php";
	?>
	<link rel="stylesheet" type="text/css" href="css2\main.css">

</head>
<?php
	require "menu.php";
?>


	<div id="lista">
		<h1>Lista de Funcionarios Ativos</h1><br>

		<form method="Post" action="">
			<input type="text" name="pesquisa">
			<input type="submit" value="Pesquisar">
		</form><br><br>

		<div align="center">
			<table class="tabela" align="center">
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
					<?php
						@$pesquisa = $_POST['pesquisa'];

						if (isset($pesquisa)) {
							$sqlSelect = "SELECT * FROM Funcionario WHERE Nome LIKE '%$pesquisa%' and Status = 'Ativo' and Status = 'ativo' ORDER BY 'Nome' ASC ";
						} else {
							$sqlSelect = "SELECT * FROM Funcionario WHERE Status = 'ativo' or Status = 'Ativo' ORDER BY 'Nome' ASC ";
						}

						//Conexão com o Banco
						require("ConectBD.php");

						$resultado = mysqli_query($link, $sqlSelect);

						while ($cont = mysqli_fetch_array($resultado)) {
							$nome = $cont['Nome'];
							$cpf = $cont['CPF'];
							$sexo = $cont['Sexo'];
							$telefone = $cont['Telefone'];
							$celular = $cont['Celular'];
							$endereco = $cont['Endereco'];
							$cep = $cont['CEP'];
							$bairro = $cont['Bairro'];
							$numero = $cont['Numero'];
							$email = $cont['Email'];
							$status = $cont['Status'];

							echo "<tr>
									<td>$nome</td>
									<td>$cpf</td>
									<td>$sexo</td>
									<td>$telefone</td>
									<td>$celular</td>
									<td>$endereco</td>
									<td>$bairro</td>
									<td>$numero</td>
									<td>$email</td>
									<td>$status</td>
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