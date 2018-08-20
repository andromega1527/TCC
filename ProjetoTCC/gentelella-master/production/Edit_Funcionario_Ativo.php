<?php
    $cod = $_GET['cod'];

    require('ConectBD.php');

    $resultado = mysqli_query($link, "SELECT * FROM Funcionario WHERE Codigo_Funcionario = $cod");
    $dados = mysqli_fetch_array($resultado);

    mysqli_close($link); // Fechar conexão com BD //
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Edição de Cadastro de Funcionários</title>

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

    	<form action="Res_Edit_Funcionario_Ativo.php" method="Post" name="formulario">
            <input type="hidden" name="cod" value="<?php echo $dados["Codigo_Funcionario"]; ?>">

    		Nome: <input type="text" name="nome" value="<?php echo $dados["Nome"]; ?>"><br>

    		Sexo: <input type="text" name="sexo" value="<?php echo $dados["Sexo"]; ?>"><br>

    		CPF: <input type="text" name="cpf" value="<?php echo $dados["CPF"]; ?>"><br>

    		Telefone: <input type="text" name="telefone" value="<?php echo $dados["Telefone"]; ?>"><br>

    		Celular: <input type="text" name="celular" value="<?php echo $dados["Celular"]; ?>"><br>

    		Endereço: <input type="text" name="endereco" value="<?php echo $dados["Endereco"]; ?>"><br>

    		CEP: <input type="text" name="cep" value="<?php echo $dados["CEP"]; ?>"><br>

    		Bairro: <input type="text" name="bairro" value="<?php echo $dados["Bairro"]; ?>"><br>

    		Número: <input type="text" name="num" value="<?php echo $dados["Numero"]; ?>"><br>

            Email: <input type="text" name="email" value="<?php echo $dados["Email"]; ?>"><br>

            Status: <input type="text" name="status" value="<?php echo $dados["Status"]; ?>"><br><br>

    		<input type="submit" name="cadastrar" value="Cadastrar">

    	</form>
    </div>

    <?php
        require "script.php";
    ?>
    
</body>
</html>