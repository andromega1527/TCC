<?php
    $cod = $_GET['cod'];

    require('ConectBD.php');

    $resultado = mysqli_query($link, "SELECT Produto.Codigo_Produto, Produto.Descricao, Preco.Codigo_Preco, Preco.Preco_por_Metro
                                      FROM Produto
                                      INNER JOIN Preco ON Produto.Preco_Unitario = Preco.Codigo_Preco
                                      WHERE Codigo_Produto = $cod");
    $dados = mysqli_fetch_array($resultado);

    mysqli_close($link); // Fechar conexão com BD //
?>

<!DOCTYPE html>
<html>
<head>
    <html lang="pt">
    <meta charset="utf-8" />
    <title>Edição de Cadastro de Produtos</title>

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
        	<h1>Cadastro de Produtos</h1>

        	<form action="Res_Edit_Produto.php" method="Post" name="formulario">
                <input type="hidden" name="cod" value="<?php echo $dados["Codigo_Produto"]; ?>">

        		<label>Descrição:</label><input id="alinhar" placeholder="Robsom Marques" type="text" name="descricao" size="31" value="<?php echo $dados['Descricao']; ?>"><br><br>

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