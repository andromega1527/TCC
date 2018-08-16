<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Cadastro de Funcionários</title>

    <?php
        require "link.php";
    ?>
    <link rel="stylesheet" type="text/css" href="css2\main.css">

</head>
    
    <?php
        require "menu.php";
    ?>

    <div id="formulario">
    	<h1>Cadastro de Funcionários</h1>

    	<form action="Res_Cad_Funcionario.php" method="Post" name="formulario">

    		Nome: <input type="text" name="nome"><br>

    		Sexo: <input type="text" name="sexo"><br>

    		CPF: <input type="text" name="cpf"><br>

    		Telefone: <input type="text" name="telefone"><br>

    		Celular: <input type="text" name="celular"><br>

    		Endereço: <input type="text" name="endereco"><br>

    		CEP: <input type="text" name="cep"><br>

    		Bairro: <input type="text" name="bairro"><br>

    		Número: <input type="text" name="num"><br>

            Email: <input type="text" name="email"><br>

            Status: <input type="text" name="status"><br><br>

    		<input type="submit" name="cadastrar" value="Cadastrar">

    	</form>
    </div>

    <?php
        require "script.php";
    ?>
    
</body>
</html>