<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Cadastro de Clientes</title>

    <?php
        require "link.php";
    ?>
    <link rel="stylesheet" type="text/css" href="css2\main.css">
    
</head>
    
    <?php
        require "menu.php";
    ?>

    <div id="formulario">
    	<h1>Cadastro de Clientes</h1>

    	<form action="Res_Cad_Cliente.php" method="Post" name="formulario">

    		Nome/Ultimo Nome*<input placeholder="Leonardo Rodrigues" type="text" name="nome" size="31"><br>

    		Sexo*<input placeholder="Masculino/Feminino" type="text" name="sexo" size="31"><br>

      		Data de nascimento*<input  style="color:#cdcdcd" type="date" name="data" size="31"><br>

    		CPF*<input placeholder="432.040.080-10" type="text" name="cpf" size="31"><br>

    		CNPJ*<input placeholder="52.461.693/0001-13" type="text" name="cnpj" size="31"><br>

    		Telefone*<input placeholder="(79)99219-4620" type="text" name="telefone" size="31"><br>

    		Celular*<input placeholder="(79)3704-4267" type="text" name="celular" size="31"><br>

            CEP*<input placeholder="49087-548" type="text" name="cep" size="31"><br>

    		Endereço*<input placeholder="Rua Santos Dumont II" type="text" name="endereco" size="31"><br>

    		Bairro*<input placeholder="São Marco" type="text" name="bairro" size="31"><br>

    		Número*<input placeholder="110" type="text" name="num" size="31"><br>

    		e-mail/login*<input placeholder="salinasleonardo@live.com" type="text" name="email" size="31"><br>

    		Estado*<input type="text" name="estado" size="31">
    		<select>
    			<?php
    				require("ConectBD.php");

    				$resultado = mysqli_query($link, "SELECT * FROM Estado");

					while($cont = mysqli_fetch_array($resultado)) {
                        $nome = $cont['Nome'];

                        echo "<opition>$nome</opition>";
                    }

    			?>
    		</select><br>

    		Cidade*<input type="text" name="cidade" size="31">
    		<select>
    			<?php
                    require("ConectBD.php");

                    $resultado = mysqli_query($link, "SELECT * FROM Cidade ORDER BY 'Nome'");

                    while($cont = mysqli_fetch_array($resultado)) {
                        $nome = $cont['Nome'];

                        echo "<opition>$nome</opition>";
                    }

                ?>
    		</select><br><br>

    		<input type="submit" name="cadastrar" value="Cadastrar"><br><br>

    	</form>
    </div>

    <?php
        require "script.php";
    ?>
    
</body>
</html>