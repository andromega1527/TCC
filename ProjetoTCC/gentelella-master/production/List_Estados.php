<!DOCTYPE html>
<html>
<head>
	<html lang="pt">
	<meta charset="utf-8" />
	<title>Lista de Estados</title>

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
		
		<h1>Lista de Estados</h1><br>

		<form method="Post" action="">
			<input type="text" name="pesquisa">
			<input type="submit" value="Pesquisar">
		</form><br><br>

		<div id="tabela" align="center">
			<button id="editar">Editar Dados</button>

			<table class="tabela" align="center">
				<thead id="tabela">
					<tr id="coluna_Principal">
						<td>Nome</td>
						<td>Descrição</td>
					</tr>
				</thead>

				<tbody id="tabela_Dados">
					<?php
						@$pesquisa = $_POST['pesquisa'];

						//Conexão com o Banco
						require("ConectBD.php");

						if(isset($pesquisa)){
						  $sqlSelect = "SELECT * FROM Estado WHERE Nome LIKE '%$pesquisa%' ORDER BY Nome ASC ";
						} else {
						  $sqlSelect = "SELECT * FROM Estado ORDER BY Nome ASC ";
						}

						$resultado = mysqli_query($link, $sqlSelect);

						$c = 1;

						while ($cont = mysqli_fetch_array($resultado)) {
							$cod = $cont['Codigo_Estado'];
							$nome = $cont['Nome'];
							$descricao = $cont['Descricao'];

							echo "<tr id=\"edit". $c++ ."\">
									<input type=\"hidden\" name=\"cod\" value=\"$cod\">
									<td>$nome</td>
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

<script src="js2/mainEstado.js"></script>

</body>
</html>