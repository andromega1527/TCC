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

		<form method="Post" action="">
			<input type="text" name="pesquisa">
			<input type="submit" value="Pesquisar">
		</form><br><br>

		<div id="tabela" align="center">
			<button id="editar">Editar Dados</button>

			<table class="tabela" border="2px" align="center">
				<thead id="tabela">
					<tr id="coluna_Principal">
						<td>Codigo do Cliente</td>
						<td>Nome</td>
						<td>Sexo</td>
						<td>Data de Nascimento</td>
						<td>CPF</td>
						<td>CNPJ</td>
						<td>Telefone</td>
						<td>Celular</td>
						<td>Endereço</td>
						<td>CEP</td>
						<td>Bairro</td>
						<td>Número</td>
						<td>Email</td>
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
						  	$sqlSelect = "SELECT * FROM Cliente WHERE Nome LIKE '%$pesquisa%' ORDER BY 'Nome' ASC ";
						} else {
						  	$sqlSelect = "SELECT * FROM Cliente ORDER BY 'Nome' ASC ";
						}

						$resultado = mysqli_query($link, $sqlSelect);
						$resultadoE = mysqli_query($link, "SELECT * FROM Estado");
						$resultadoCi = mysqli_query($link, "SELECT * FROM Cidade");

						$c = 1;

						while ($cont = mysqli_fetch_array($resultado) and $contE = mysqli_fetch_array($resultadoE) and $contCi = mysqli_fetch_array($resultadoCi)) {
							$cod = $cont['Codigo_Cliente'];
							$codE = $contE['Codigo_Estado'];
							$codCi = $contCi['Codigo_Cidade'];
							$nome = $cont['Nome'];
							$sexo = $cont['Sexo'];
							$data = $cont['Data_de_Nascimento'];
							$cpf = $cont['CPF'];
							$cnpj = $cont['CNPJ'];
							$telefone = $cont['Telefone'];
							$celular = $cont['Celular'];
							$endereco = $cont['Endereco'];
							$cep = $cont['CEP'];
							$bairro = $cont['Bairro'];
							$numero = $cont['Numero'];
							$email = $cont['Email'];
							$estado = $contE['Nome'];
							$cidade = $contCi['Nome'];

							echo "<tr id=\"edit". $c++ ."\">
									<input type=\"hidden\" name=\"cod\" value=\"$cod\">
									<input type=\"hidden\" name=\"codCi\" value=\"$codCi\">
									<input type=\"hidden\" name=\"codE\" value=\"$codE\">
									<td>$cod</td>
									<td>$nome</td>
									<td>$sexo</td>
									<td>$data</td>
									<td>$cpf</td>
									<td>$cnpj</td>
									<td>$telefone</td>
									<td>$celular</td>
									<td>$endereco</td>
									<td>$cep</td>
									<td>$bairro</td>
									<td>$numero</td>
									<td>$email</td>
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

<script src="js2/mainCliente.js"></script>

</body>
</html>