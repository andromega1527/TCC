<!DOCTYPE html>
<html>
<head>
	<html lang="pt">
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

<div id="scroll" class="right_col" role="main">
	<div id="lista">
		
		<h1>Lista de Clientes</h1><br><br>

		<form method="Post" action="">
			<input type="text" name="pesquisa">
			<input type="submit" value="Pesquisar">
		</form><br><br>

		<div id="tabela" align="center">
			<div id="botao-editar">
				<button id="editar">Editar Dados</button>
			</div>

			<table id="datatable" class="tabela table table-striped table-bordered" border="2px" align="center">
				<thead id="tabela">
					<tr id="coluna_Principal" style="color: black">
						<td>Nome</td>
						<td>Sexo</td>
						<td>Data de Nascimento</td>
						<td>CPF/CNPJ</td>
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
						  	$sqlSelect = "SELECT Cliente.Codigo_Cliente, Cliente.Nome, Cliente.Sexo, Cliente.Data_de_Nascimento, Cliente.CPF, Cliente.CNPJ, Cliente.Telefone, Cliente.Celular, Cliente.Endereco, Cliente.CEP, Cliente.Bairro, Cliente.Numero, Cliente.Email, Estado.Codigo_Estado, Estado.Nome, Cidade.Codigo_Cidade, Cidade.Nome
						  				  FROM Cliente 
						  				  INNER JOIN Estado ON Cliente.Estado = Estado.Codigo_Estado
						  				  INNER JOIN Cidade ON Cliente.Cidade = Cidade.Codigo_Cidade
						  				  WHERE Cliente.Nome LIKE '%$pesquisa%' ORDER BY Cliente.Nome ASC ";
						} else {
						  	$sqlSelect = "SELECT Cliente.Codigo_Cliente, Cliente.Nome, Cliente.Sexo, Cliente.Data_de_Nascimento, Cliente.CPF, Cliente.CNPJ, Cliente.Telefone, Cliente.Celular, Cliente.Endereco, Cliente.CEP, Cliente.Bairro, Cliente.Numero, Cliente.Email, Estado.Codigo_Estado, Estado.Nome, Cidade.Codigo_Cidade, Cidade.Nome 
						  			      FROM Cliente
						  			      INNER JOIN Estado ON Cliente.Estado = Estado.Codigo_Estado
						  				  INNER JOIN Cidade ON Cliente.Cidade = Cidade.Codigo_Cidade
						  			      ORDER BY Cliente.Nome ASC ";
						}

						$resultado = mysqli_query($link, $sqlSelect);

						$c = 1;

						while ($cont = mysqli_fetch_array($resultado)) {
							$cod = $cont['Codigo_Cliente'];
							$codE = $cont['Codigo_Estado'];
							$codCi = $cont['Codigo_Cidade'];
							$nome = $cont[1];
							$sexo = $cont['Sexo'];
							$data = $cont['Data_de_Nascimento'];

							if (isset($cont['CPF']) and $cont['CPF'] != '') {
								$cpf = $cont['CPF'];
								$cTD = "<td>$cpf</td>";
							} else if(isset($cont['CNPJ']) and $cont['CNPJ'] != '') {
								$cnpj = $cont['CNPJ'];
								$cTD = "<td>$cnpj</td>";
							}

							$telefone = $cont['Telefone'];
							$celular = $cont['Celular'];
							$endereco = $cont['Endereco'];
							$cep = $cont['CEP'];
							$bairro = $cont['Bairro'];
							$numero = $cont['Numero'];
							$email = $cont['Email'];
							$estado = $cont[14];
							$cidade = $cont['Nome'];

							echo "<tr id=\"edit". $c++ ."\">
									<input type=\"hidden\" name=\"cod\" value=\"$cod\">
									<td>$nome</td>
									<td>$sexo</td>
									<td>$data</td>".
									$cTD
									."<td>$telefone</td>
									<td>$celular</td>
									<td>$endereco</td>
									<td>$cep</td>
									<td>$bairro</td>
									<td>$numero</td>
									<td>$email</td>
									<td>$estado</td>
									<td>$cidade</td>
									<td id=\"excluir-modal\"><a class=\"btn-modal\"></a></td>
					  			</tr>";
						}
					?>

				</tbody>
				
			</table>
			
		
		</div>
		
	</div>


	<!-- -------------------------------------- Começo da Janela -------------------------------------- 
            ----------------------------------------------------------------------------------------------- -->

                <div id="modal">
                    <div class="modal-box">
                        <div id="borda">
                            <div class="fechar"><b><a style="color: black" class="sla">X</a></b></div>
                        </div>
                        <div id="formulario-modal">

                        	<h4>Se você fizer isso, esses dados não poderão ser recuperados. Tem certeza que você quer fazer isso?</h4>

                            <div class="modal-box-conteudo">
	                            <form method="Post" name="formulario">

	                                <input type="submit" name="Sim" value="Sim">

	                            </form>

                                <button id="cancel" style="float: right;">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- -------------------------------------- Final da Janela -------------------------------------- 
            ---------------------------------------------------------------------------------------------- -->


<?php
	require "script.php";
?>

<script src="js2/mainCliente.js"></script>
<script src="js2/mainModal.js"></script>

</body>
</html>