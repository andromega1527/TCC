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
    <html lang="pt">
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

    <div class="right_col" role="main">
        <div id="formulario">
        	<h1>Cadastro de Funcionários</h1>

        	<form action="Res_Edit_Funcionario.php" method="Post" name="formulario">
                <input type="hidden" name="cod" value="<?php echo $dados["Codigo_Funcionario"]; ?>">

        		<label>Nome:</label><input id="alinhar" size="31" type="text" name="nome" value="<?php echo $dados["Nome"]; ?>"><br><br>

        		<label>Sexo:</label><input id="alinhar" size="31" type="text" name="sexo" value="<?php echo $dados["Sexo"]; ?>"><br><br>

        		<label>CPF:</label><input id="alinhar" size="31" type="text" name="cpf" value="<?php echo $dados["CPF"]; ?>"><br><br>

        		<label>Telefone:</label><input id="alinhar" size="31" type="text" name="telefone" value="<?php echo $dados["Telefone"]; ?>"><br><br>

        		<label>Celular:</label><input id="alinhar" size="31" type="text" name="celular" value="<?php echo $dados["Celular"]; ?>"><br><br>

        		<label>Endereço:</label><input id="alinhar" size="31" type="text" name="endereco" value="<?php echo $dados["Endereco"]; ?>"><br><br>

        		<label>CEP:</label><input id="alinhar" size="31" type="text" name="cep" value="<?php echo $dados["CEP"]; ?>"><br><br>

        		<label>Bairro:</label><input id="alinhar" size="31" type="text" name="bairro" value="<?php echo $dados["Bairro"]; ?>"><br><br>

        		<label>Número:</label><input id="alinhar" size="31" type="text" name="num" value="<?php echo $dados["Numero"]; ?>"><br><br>

                <label>Email:</label><input id="alinhar" size="31" type="text" name="email" value="<?php echo $dados["Email"]; ?>"><br><br>

                <label>Status:</label>
                <select name="status" id="combo_left">
                    <option>Selecione</option>
                    <option value="Ativo">Ativo</option>
                    <option value="Desativo">Desativo</option>
                </select><br><br>
                <br><br>

        		<input type="submit" name="cadastrar" value="Cadastrar"><br><br><br>

        	</form>
        </div>

    <?php
        require "script.php";
    ?>
    
</body>
</html>