<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Calhacas</title>
    <link rel="stylesheet" type="text/css" href="css\main.css">
</head>
<body>

    <div id="formulario">
    	<h1>Cadastro de Clientes</h1>

    	<form action="Res_Cad_Cliente.php" method="Post" name="formulario">

    		Nome: <input type="text" name="nome"><br>

    		Sexo: <input type="text" name="sexo"><br>

    		Data de Nascimento: <input type="text" name="data"><br>

    		CPF: <input type="text" name="cpf"><br>

    		CNPJ: <input type="text" name="cnpj"><br>

    		Telefone: <input type="text" name="telefone"><br>

    		Celular: <input type="text" name="celular"><br>

    		Endereço: <input type="text" name="endereco"><br>

    		CEP: <input type="text" name="cep"><br>

    		Bairro: <input type="text" name="bairro"><br>

    		Número: <input type="text" name="num"><br>

    		Email: <input type="text" name="email"><br>

    		Estado: <input type="text" name="estado">
    		<select>
    			<?php
    				require("ConectBD.php");

    				$resultado = mysqli_query($link, "SELECT Codigo_Estado FROM estado");
					$dados = mysqli_fetch_array($resultado);

    				for ($i = 0; $i <= strlen($dados["Codigo_Estado"]); $i++) { 
    					echo '<option><?php echo $dados["Nome"]; ?></option>';
    				}
    			?>
    		</select><br>

    		Cidade: <input type="text" name="cidade">
    		<select>
    			<?php

    				$resultado = mysqli_query($link, "SELECT Codigo_Cidade FROM cidade");
					$dados = mysqli_fetch_array($resultado);

    				for ($i = 0; $i <= strlen($dados["Codigo_Cidade"]); $i++) { 
    					echo '<option><?php echo $dados["Nome"]; ?></option>';
    				}
    			?>
    		</select><br><br>

    		<input type="submit" name="cadastrar" value="Cadastrar">

    	</form>
    </div>
    
</body>
</html>