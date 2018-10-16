<?php
    $cod = $_GET['cod'];

    require('ConectBD.php');

    $resultado = mysqli_query($link, "SELECT * FROM Orcamento WHERE Codigo_Orcamento = $cod");
    $dados = mysqli_fetch_array($resultado);

    mysqli_close($link); // Fechar conexão com BD //
?>

<!DOCTYPE html>
<html>
<head>
    <html lang="pt">
    <meta charset="utf-8" />
    <title>Edição de Cadastro de Orçamentos Ativos</title>

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
        	<h1>Edição de Orçamentos Ativos</h1>

        	<form action="Res_Edit_Orcamento_Ativo.php" method="Post" name="formulario">
                <input type="hidden" name="cod" value="<?php echo $cod; ?>">

                <label>Status:</label>
                <select name="status" id="combo_left">
                    <option>Selecione</option>
                    <option value="Ativo">Ativo</option>
                    <option value="Desativo">Desativo</option>
                </select><br><br>

                <label>Cliente:</label>
                <select name="cliente" id="combo_left">
                    <option>Selecione</option>

                    <?php
                        require("ConectBD.php");

                        $resultado = mysqli_query($link, "SELECT Codigo_Cliente, Nome FROM Cliente");

                        while($cont = mysqli_fetch_array($resultado)) {
                            $codC = $cont['Codigo_Cliente'];
                            $nome = $cont['Nome'];
                    ?>

                    <option value="<?php echo $codC; ?>"><?php echo $nome; ?></option>

                    <?php } ?>

                    ?>

                </select><br><br>

                <label>Data de Emissão:</label><input id="alinhar" placeholder="Data de Emissão" type="date" name="data" size="31" value="<?php echo $dados['Data_Emissao']; ?>"><br><br>

                <label>Hora de Emissão:</label><input id="alinhar" placeholder="Hora de Emissão" type="date" name="hora" size="31" value="<?php echo $dados['Hora_Emissao']; ?>"><br><br>

                <label>Desconto:</label><input id="alinhar" placeholder="Desconto" type="text" name="desconto" size="31" value="<?php echo $dados['Desconto']; ?>"><br><br>

                <input type="submit" name="cadastrar" value="Cadastrar"><br><br><br>

            </form>
        </div>

    <?php
        require "script.php";
    ?>
    
</body>
</html>