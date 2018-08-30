<!DOCTYPE html>
<html>
<head>
    <html lang="pt">
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

    <div class="right_col" role="main">
        <div id="formulario">
            <h1>Cadastro de Clientes</h1><br><br>

            <form action="Res_Cad_Cliente.php" method="Post" name="formulario">

            	<label>Nome/Ultimo*</label><input id="alinhar" placeholder="Leonardo Rodrigues" type="text" name="nome" size="31"><br><br>

            	<label>Sexo*</label><input id="alinhar" placeholder="Masculino/Feminino" type="text" name="sexo" size="31"><br><br>

              	<label>Data de nascimento*</label><input id="alinhar" type="date" name="data" size="31"><br><br>

            	<label>CPF*</label><input id="alinhar" placeholder="432.040.080-10" type="text" name="cpf" size="31"><br><br>

            	<label>CNPJ*</label><input id="alinhar" placeholder="52.461.693/0001-13" type="text" name="cnpj" size="31"><br><br>

            	<label>Telefone*</label><input id="alinhar" placeholder="(79)99219-4620" type="text" name="telefone" size="31"><br><br>

            	<label>Celular*</label><input id="alinhar" placeholder="(79)3704-4267" type="text" name="celular" size="31"><br><br>

                <label>CEP*</label><input id="alinhar" placeholder="49087-548" type="text" name="cep" size="31"><br><br>

            	<label>Endereço*</label><input id="alinhar" placeholder="Rua Santos Dumont II" type="text" name="endereco" size="31"><br><br>

            	<label>Bairro*</label><input id="alinhar" placeholder="São Marco" type="text" name="bairro" size="31"><br><br>

            	<label>Número*</label><input id="alinhar" placeholder="100" type="text" name="num" size="31"><br><br>

            	<label>e-mail/login*</label><input id="alinhar" placeholder="salinasleonardo@live.com" type="text" name="email" size="31"><br><br>

            	<label>Estado*</label>
            	<select name="estado" id="combo_left">
                    <option>Selecione</option>

            		<?php
            			require("ConectBD.php");

            			$resultado = mysqli_query($link, "SELECT Codigo_Estado, Nome FROM Estado");

        				while($cont = mysqli_fetch_array($resultado)) {
                            $cod = $cont['Codigo_Estado'];
                            $nome = $cont['Nome'];
                    ?>

                    <option value="<?php echo $cod; ?>"><?php echo $nome; ?></option>

                    <?php } ?>

            		?>
            	</select><br><br>

            	<label>Cidade*</label>
            	<select name="cidade" id="combo_left">
                    <option>Selecione</option>

            		<?php
                        require("ConectBD.php");

                        $resultado = mysqli_query($link, "SELECT Codigo_Cidade, Nome FROM Cidade");

                        while($cont = mysqli_fetch_array($resultado)) {
                            $cod = $cont['Codigo_Cidade'];
                            $nome = $cont['Nome'];
                    ?>
                    
                    <option value="<?php echo $cod; ?>"><?php echo $nome; ?></option>

                    <?php } ?>

                    ?>
            	</select><br><br>

            	<input type="submit" name="cadastrar" value="Cadastrar"><br><br><br>

            </form>
        </div>

    <?php
        require "script.php";
    ?>
    
</body>
</html>