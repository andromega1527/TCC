<?php
    $cod = $_GET['cod'];
    $codP = $_GET['codP'];

    require('ConectBD.php');

    $resultado = mysqli_query($link, "SELECT * FROM Orcamento_Detalhes WHERE Codigo_Orcamento = $cod AND Codigo_Produto = $codP");
    $dados = mysqli_fetch_array($resultado);

    mysqli_close($link); // Fechar conexão com BD //
?>

<!DOCTYPE html>
<html>
<head>
    <html lang="pt">
    <meta charset="utf-8" />
    <title>Edição de Cadastro de Produtos no Orçamento</title>

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
        	<h1>Edição de Cadastro de Produtos no Orçamento</h1>

        	<form action="Res_Edit_ProdutoL.php" method="Post" name="formulario">
                <label>Produto*</label>
                <select name="produto" id="combo_left">
                    <option>Selecione</option>

                    <?php
                        require("ConectBD.php");

                        $resultado = mysqli_query($link, "SELECT Codigo_Produto, Descricao FROM Produto");

                        while($cont = mysqli_fetch_array($resultado)) {
                            $codPP = $cont['Codigo_Produto'];
                            $descricao = $cont['Descricao'];
                    ?>

                    <option value="<?php echo $codPP; ?>"><?php echo $descricao; ?></option>

                    <?php } ?>

                    ?>
                    </select><br><br>

                    <label>Quantidade*</label><input placeholder="20" type="text" name="quantidade" id="alinhar" size="31" value="<?php echo $dados['Quantidade']; ?>"><br><br>

                    <input type="hidden" name="cod" value="<?php echo $cod; ?>">
                    <input type="hidden" name="codP" value="<?php echo $codP; ?>">

                    <input type="submit" name="Cadastrar" value="Cadastrar">

        	</form>
        </div>

    <?php
        require "script.php";
    ?>

    
</body>
</html>