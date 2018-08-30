<?php
    $cod = $_GET['cod'];

    require('ConectBD.php');

    $resultado = mysqli_query($link, "SELECT Preco.Codigo_Preco, Preco.Preco_por_Metro, Estado.Codigo_Estado, Estado.Nome, Cidade.Codigo_Cidade, Cidade.Nome
                                      FROM Preco
                                      INNER JOIN Estado ON Preco.Estado = Estado.Codigo_Estado
                                      INNER JOIN Cidade ON Preco.Cidade = Cidade.Codigo_Cidade
                                      WHERE Codigo_Preco = $cod");
    $dados = mysqli_fetch_array($resultado);

    mysqli_close($link); // Fechar conexão com BD //
?>

<!DOCTYPE html>
<html>
<head>
    <html lang="pt">
    <meta charset="utf-8" />
    <title>Edição de Cadastro de Preços</title>

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
        	<h1>Edição de Cadastro de Preços</h1>

        	<form action="Res_Edit_Preco.php" method="Post" name="formulario">
                <input type="hidden" name="cod" value="<?php echo $dados["Codigo_Preco"]; ?>">

        		<label>Preço por Metro:</label><input id="alinhar" placeholder="Robsom Marques" type="text" name="preco" size="31" value="<?php echo $dados['Preco_por_Metro']; ?>"><br><br>

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