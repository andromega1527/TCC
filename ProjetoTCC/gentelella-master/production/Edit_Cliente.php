<?php
    $cod = $_GET['cod'];
    $codCi = $_GET['codCi'];
    $codE = $_GET['codE'];

    require('ConectBD.php');

    $resultado = mysqli_query($link, "SELECT * FROM Cliente WHERE Codigo_Cliente = $cod");
    $dados = mysqli_fetch_array($resultado);

    $resultadoCi = mysqli_query($link, "SELECT * FROM Cidade WHERE Codigo_Cidade = $codCi");
    $dadosCi = mysqli_fetch_array($resultadoCi);

    $resultadoE = mysqli_query($link, "SELECT * FROM Estado WHERE Codigo_Estado = $codE");
    $dadosE = mysqli_fetch_array($resultadoE);

    mysqli_close($link); // Fechar conexão com BD //
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Edição de Cadastro do Clientes</title>

    <?php
        require "link.php";
    ?>
    <link rel="stylesheet" type="text/css" href="css2\main.css">
    
</head>
    
    <?php
        require "menu.php";
    ?>

    <div id="formulario">
    	<h1>Edição de Cadastro do Clientes</h1>

    	<form action="Res_Edit_Cliente.php" method="Post" name="formulario">
            <input type="hidden" name="cod" value="<?php echo $dados["Codigo_Cliente"]; ?>">

    		Nome/Ultimo Nome*<input placeholder="Leonardo Rodrigues" type="text" name="nome" size="31" value="<?php echo $dados["Nome"]; ?>"><br>

    		Sexo*<input placeholder="Masculino/Feminino" type="text" name="sexo" size="31" value="<?php echo $dados["Sexo"]; ?>"><br>

      		Data de nascimento*<input  style="color:#cdcdcd" type="date" name="data" size="31" value="<?php echo $dados["Data_de_Nascimento"]; ?>"><br>

    		CPF*<input placeholder="432.040.080-10" type="text" name="cpf" size="31" value="<?php echo $dados["CPF"]; ?>"><br>

    		CNPJ*<input placeholder="52.461.693/0001-13" type="text" name="cnpj" size="31" value="<?php echo $dados["CNPJ"]; ?>"><br>

    		Telefone*<input placeholder="(79)99219-4620" type="text" name="telefone" size="31" value="<?php echo $dados["Telefone"]; ?>"><br>

    		Celular*<input placeholder="(79)3704-4267" type="text" name="celular" size="31" value="<?php echo $dados["Celular"]; ?>"><br>

            CEP*<input placeholder="49087-548" type="text" name="cep" size="31" value="<?php echo $dados["CEP"]; ?>"><br>

    		Endereço*<input placeholder="Rua Santos Dumont II" type="text" name="endereco" size="31" value="<?php echo $dados["Endereco"]; ?>"><br>

    		Bairro*<input placeholder="São Marco" type="text" name="bairro" size="31" value="<?php echo $dados["Bairro"]; ?>"><br>

    		Número*<input placeholder="110" type="text" name="num" size="31" value="<?php echo $dados["Numero"]; ?>"><br>

    		e-mail/login*<input placeholder="salinasleonardo@live.com" type="text" name="email" size="31" value="<?php echo $dados["Email"]; ?>"><br>

            <input type="hidden" name="codE" value="<?php echo $dadosE["Codigo_Estado"]; ?>">

    		Estado*<input type="text" name="estado" size="31" value="<?php echo $dadosE["Nome"]; ?>"><br>

            <input type="hidden" name="codCi" value="<?php echo $dadosCi["Codigo_Cidade"]; ?>">

    		Cidade*<input type="text" name="cidade" size="31" value="<?php echo $dadosCi["Nome"]; ?>"><br><br>

    		<input type="submit" name="cadastrar" value="Cadastrar"><br><br>

    	</form>
    </div>

    <?php
        require "script.php";
    ?>
    
</body>
</html>