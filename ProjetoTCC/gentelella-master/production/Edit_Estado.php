<?php
    $cod = $_GET['cod'];

    require('ConectBD.php');

    $resultado = mysqli_query($link, "SELECT * FROM Estado WHERE Codigo_Estado = $cod");
    $dados = mysqli_fetch_array($resultado);

    mysqli_close($link); // Fechar conexão com BD //
?>

<!DOCTYPE html>
<html>
<head>
    <html lang="pt">
    <meta charset="utf-8" />
    <title>Edição de Cadastro de Estados</title>

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
        	<h1>Edição de Cadastro de Estados</h1>

        	<form action="Res_Edit_Estado.php" method="Post" name="formulario">
                <input type="hidden" name="cod" value="<?php echo $dados["Codigo_Estado"]; ?>">

        		<label>Nome*</label><input id="alinhar" size="31" type="text" name="nome" value="<?php echo $dados["Nome"]; ?>"><br>

        		<label>Descrição*</label><input id="alinhar" size="31" type="text" name="descricao" value="<?php echo $dados["Descricao"]; ?>"><br>

        		<input type="submit" name="cadastrar" value="Cadastrar">

        	</form>
        </div>

    <?php
        require "script.php";
    ?>
    
</body>
</html>