<!DOCTYPE html>
<html>
<head>
    <html lang="pt">
    <meta charset="utf-8" />
    <title>Cadastro de Cidades</title>

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
        	<h1>Cadastro de Cidades</h1><br><br>

        	<form action="Res_Cad_Cidade.php" method="Post" name="formulario">

        		<label>Nome da Cidade*</label><input id="alinhar" placeholder="Campinas" type="text" name="nome" size="31"><br><br>

        		<label>Descrição*</label><input id="alinhar" type="text" name="descricao" size="31"><br><br>

        		<input type="submit" name="cadastrar" value="Cadastrar"><br><br><br>

        	</form>
        </div>

    <?php
        require "script.php";
    ?>
    
</body>
</html>