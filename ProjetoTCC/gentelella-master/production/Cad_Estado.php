<!DOCTYPE html>
<html>
<head>
    <html lang="pt">
    <meta charset="utf-8" />
    <title>Cadastro de Estados</title>

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
        	<h1>Cadastro de Estados</h1><br><br>

        	<form action="Res_Cad_Estado.php" method="Post" name="formulario">

        		<label>Nome:</label><input id="alinhar" placeholder="Robsom Marques" type="text" name="nome" size="31"><br><br>

        		<label>Descrição:</label><input id="alinhar" placeholder="Masculino/Feminino" type="text" name="descricao" size="31"><br><br>

        		<input type="submit" name="cadastrar" value="Cadastrar"><br><br><br>

        	</form>
        </div>

    <?php
        require "script.php";
    ?>
    
</body>
</html>