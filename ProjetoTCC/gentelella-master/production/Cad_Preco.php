<!DOCTYPE html>
<html>
<head>
    <html lang="pt">
    <meta charset="utf-8" />
    <title>Cadastro de Preços</title>

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
        	<h1>Cadastro de Preços</h1><br><br>

        	<form action="Res_Cad_Preco.php" method="Post" name="formulario">

        		<label>Preço por Metro:</label><input id="alinhar" placeholder="Robsom Marques" type="text" name="preco" size="31"><br><br>

        		<label>Estado</label>
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

                <label>Cidade</label>
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