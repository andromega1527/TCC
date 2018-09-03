<?php
    $cod = $_GET['cod'];

    require('ConectBD.php');

    $resultado = mysqli_query($link, "SELECT * FROM Cidade WHERE Codigo_Cidade = $cod");
    $dados = mysqli_fetch_array($resultado);

    mysqli_close($link); // Fechar conexão com BD //
?>

<!DOCTYPE html>
<html>
<head>
    <html lang="pt">
    <meta charset="utf-8" />
    <title>Edição de Cadastro de Cidades</title>

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
        	<h1>Cadastro de Cidades</h1>

        	<form action="Res_Edit_Cidade.php" method="Post" name="formulario">
                <input type="hidden" name="cod" value="<?php echo $dados["Codigo_Cidade"]; ?>">

        		<label>Nome*</label><input type="text" name="nome" value="<?php echo $dados["Nome"]; ?>"><br>

        		<label>Descrição*</label><input type="text" name="descricao" value="<?php echo $dados["Descricao"]; ?>"><br>

        		<input type="submit" name="cadastrar" value="Cadastrar">

        	</form>
        </div>

    <?php
        require "script.php";
    ?>
    
</body>
</html>