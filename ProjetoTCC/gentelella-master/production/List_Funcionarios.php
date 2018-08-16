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

			<form method="Post" action="">
				<input type="text" name="pesquisa">
				<input type="submit" value="Pesquisar">
			</form><br><br>

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
						<td>Email</td>
						<td>Status</td>
					</tr>
				</thead>

				<tbody>
					<?php
						@$pesquisa = $_POST['pesquisa'];

						if(isset($pesquisa)){
						  $sqlSelect = "SELECT * FROM Funcionario WHERE Nome LIKE '%$pesquisa%' ORDER BY 'Nome' DESC ";
						} else {
						  $sqlSelect = "SELECT * FROM Funcionario ORDER BY 'Nome' DESC ";
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