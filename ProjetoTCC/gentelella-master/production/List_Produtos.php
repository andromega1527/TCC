<!DOCTYPE html>
<html>
<head>
	<html lang="pt">
	<meta charset="utf-8" />
	<title>Lista de Produtos</title>

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
		
		<h1>Lista de Produtos</h1><br><br>

		<form method="Post" action="">
			<input type="text" name="pesquisa">
			<input type="submit" value="Pesquisar">
		</form><br><br>

		<div id="tabela" align="center">
			<button id="editar">Editar Dados</button>

			<table class="tabela" align="center">
				<thead id="tabela">
					<tr id="coluna_Principal" style="color: black">
						<td>Descrição do Produto</td>
						<td>Preço Unitario</td>
					</tr>
				</thead>

				<tbody id="tabela_Dados">
					<?php
						@$pesquisa = $_POST['pesquisa'];

						//Conexão com o Banco
						require("ConectBD.php");

						if(isset($pesquisa)){
						  $sqlSelect = "SELECT Produto.Codigo_Produto, Produto.Descricao, Preco.Codigo_Preco, Preco.Preco_por_Metro
						  				FROM Produto
						  				INNER JOIN Preco ON Produto.Preco_Unitario = Preco.Codigo_Preco
						  				WHERE Preco.Preco_por_Metro LIKE '%$pesquisa%' ORDER BY Preco.Preco_por_Metro ASC ";
						} else {
						  $sqlSelect = "SELECT Produto.Codigo_Produto, Produto.Descricao, Preco.Codigo_Preco, Preco.Preco_por_Metro
						  				FROM Produto
						  				INNER JOIN Preco ON Produto.Preco_Unitario = Preco.Codigo_Preco
						  				ORDER BY Preco.Preco_por_Metro ASC ";
						}

						$resultado = mysqli_query($link, $sqlSelect);

						$c = 1;

						while ($cont = mysqli_fetch_array($resultado)) {
							$cod = $cont['Codigo_Produto'];
							$codPre = $cont['Codigo_Preco'];
							$descricao = $cont['Descricao'];
							$preco = $cont['Preco_por_Metro'];

							echo "<tr id=\"edit". $c++ ."\">
									<input type=\"hidden\" name=\"cod\" value=\"$cod\">
									<input type=\"hidden\" name=\"codPre\" value=\"$codPre\">
									<td>$descricao</td>
									<td>$preco</td>
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

<script src="js2/mainProduto.js"></script>
<script src="js2/mainModal.js"></script>

</body>
</html>