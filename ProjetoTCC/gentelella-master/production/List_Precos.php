<!DOCTYPE html>
<html>
<head>
	<html lang="pt">
	<meta charset="utf-8" />
	<title>Lista de Preços</title>

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
		
		<h1>Lista de Preços</h1><br><br>

		<form method="Post" action="">
			<input type="text" name="pesquisa">
			<input type="submit" value="Pesquisar">
		</form><br><br>

		<div id="tabela" align="center">
			<div id="botao-editar">
				<button id="editar">Editar Dados</button>
			</div>

			<table id="datatable" class="tabela table table-striped table-bordered" align="center">
				<thead id="tabela">
					<tr id="coluna_Principal" style="color: black">
						<td>Preço por Metro</td>
						<td>Cidade</td>
						<td>Estado</td>
					</tr>
				</thead>

				<tbody id="tabela_Dados">
					<?php
						@$pesquisa = $_POST['pesquisa'];

						//Conexão com o Banco
						require("ConectBD.php");

						if(isset($pesquisa)){
						  $sqlSelect = "SELECT Preco.Codigo_Preco, Preco.Preco_por_Metro, Estado.Codigo_Estado, Estado.Nome, Cidade.Codigo_Cidade, Cidade.Nome
						  				FROM Preco
						  				INNER JOIN Estado ON Preco.Estado = Estado.Codigo_Estado
						  				INNER JOIN Cidade ON Preco.Cidade = Cidade.Codigo_Cidade
						  				WHERE Preco.Preco_por_Metro LIKE '%$pesquisa%' ORDER BY Preco.Preco_por_Metro ASC ";
						} else {
						  $sqlSelect = "SELECT Preco.Codigo_Preco, Preco.Preco_por_Metro, Estado.Codigo_Estado, Estado.Nome, Cidade.Codigo_Cidade, Cidade.Nome 
						  				FROM Preco
						  				INNER JOIN Estado ON Preco.Estado = Estado.Codigo_Estado
						  				INNER JOIN Cidade ON Preco.Cidade = Cidade.Codigo_Cidade
						  				ORDER BY Preco.Preco_por_Metro ASC ";
						}

						$resultado = mysqli_query($link, $sqlSelect);

						$c = 1;

						while ($cont = mysqli_fetch_array($resultado)) {
							$cod = $cont['Codigo_Preco'];
							$codE = $cont['Codigo_Estado'];
							$codCi = $cont['Codigo_Cidade'];
							$preco = $cont['Preco_por_Metro'];
							$estado = $cont[3];
							$cidade = $cont['Nome'];

							echo "<tr id=\"edit". $c++ ."\">
									<input type=\"hidden\" name=\"cod\" value=\"$cod\">
									<input type=\"hidden\" name=\"codE\" value=\"$codE\">
									<input type=\"hidden\" name=\"codCi\" value=\"$codCi\">
									<td>$preco</td>
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

<script src="js2/mainPreco.js"></script>
<script src="js2/mainModal.js"></script>

</body>
</html>