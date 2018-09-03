<!DOCTYPE html>
<html>
<head>
	<html lang="pt">
	<meta charset="utf-8" />
	<title>Lista de Funcionários Ativos</title>

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
		<h1>Lista de Funcionários Ativos</h1><br>

		<form method="Post" action="">
			<input type="text" name="pesquisa">
			<input type="submit" value="Pesquisar">
		</form><br><br>

		<div id="tabela" align="center">
			<button id="editar">Editar Dados</button>

			<table class="tabela" align="center">
				<thead id="tabela">
					<tr id="coluna_Principal" style="color: black">
						<td>Nome</td>
						<td>CPF</td>
						<td>Sexo</td>
						<td>Telefone</td>
						<td>Celular</td>
						<td>Endereço</td>
						<td>CEP</td>
						<td>Bairro</td>
						<td>Número</td>
						<td>Email</td>
						<td>Senha</td>
						<td>Status</td>
						<td>Permissão</td>
					</tr>
				</thead>

				<tbody id="tabela_Dados">
					<?php
						@$pesquisa = $_POST['pesquisa'];

						//Conexão com o Banco
						require("ConectBD.php");

						if (isset($pesquisa)) {
							$sqlSelect = "SELECT * FROM Funcionario WHERE Nome LIKE '%$pesquisa%' and Status = 'Ativo' ORDER BY Nome ASC ";
						} else {
							$sqlSelect = "SELECT * FROM Funcionario WHERE Status = 'Ativo' ORDER BY Nome ASC ";
						}

						$resultado = mysqli_query($link, $sqlSelect);

						$c = 1;

						while ($cont = mysqli_fetch_array($resultado)) {
							$cod = $cont['Codigo_Funcionario'];
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
							$senha = $cont['Senha'];
							$status = $cont['Status'];
							$permissao = $cont['Permissao'];

							echo "<tr id=\"edit". $c++ ."\">
									<input type=\"hidden\" name=\"cod\" value=\"$cod\">
									<td>$nome</td>
									<td>$cpf</td>
									<td>$sexo</td>
									<td>$telefone</td>
									<td>$celular</td>
									<td>$endereco</td>
									<td>$cep</td>
									<td>$bairro</td>
									<td>$numero</td>
									<td>$email</td>
									<td>$senha</td>
									<td>$status</td>
									<td>$permissao</td>
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

<script src="js2/mainFuncionarioAtivo.js"></script>

</body>
</html>