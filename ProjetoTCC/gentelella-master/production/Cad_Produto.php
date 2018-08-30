<!DOCTYPE html>
<html>
<head>
    <html lang="pt">
    <meta charset="utf-8" />
    <title>Cadastro de Produtos</title>

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
        	<h1>Cadastro de Produtos</h1><br><br>

        	<form action="Res_Cad_Produto.php" method="Post" name="formulario">

        		<label>Descrição:</label><input id="alinhar" placeholder="Robsom Marques" type="text" name="descricao" size="31"><br><br>

        		<label>Preço Unitario:</label>
                <select name="preco" id="combo_left">
                    <option>Selecione</option>

                    <?php
                        require("ConectBD.php");

                        $resultado = mysqli_query($link, "SELECT Codigo_Preco, Preco_por_Metro FROM Preco");

                        while($cont = mysqli_fetch_array($resultado)) {
                            $cod = $cont['Codigo_Preco'];
                            $preco = $cont['Preco_por_Metro'];
                    ?>
                    
                    <option value="<?php echo $cod; ?>"><?php echo $preco; ?></option>

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