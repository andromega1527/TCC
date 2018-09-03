<!DOCTYPE html>
<html>
<head>
    <html lang="pt">
    <meta charset="utf-8" />
    <title>Cadastro de Orçamentos</title>

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
            <h1>Cadastro de Orçamentos Detalhes</h1><br><br>

            <!-- -------------------------------------- Começo da Janela -------------------------------------- 
            ----------------------------------------------------------------------------------------------- -->

                <div id="modal">
                    <div class="modal-box">
                        <div id="borda">
                            <div class="fechar"><b><a style="color: black" class="sla">X</a></b></div>
                        </div>
                        <div id="formulario">
                            <h3>Adicionar Produtos</h3><br><br>

                            <div class="modal-box-conteudo">
                                <form method="Post" action="" name="formulario">
                                    <label>Produto</label>
                                    <select name="produto" id="combo_orc" id="combo_left">
                                        <option>Selecione</option>

                                        <?php
                                            require("ConectBD.php");

                                            $resultado = mysqli_query($link, "SELECT Codigo_Produto, Descricao FROM Produto");

                                            while($cont = mysqli_fetch_array($resultado)) {
                                                $cod = $cont['Codigo_Descricao'];
                                                $descricao = $cont['Descricao'];
                                        ?>

                                        <option value="<?php echo $cod; ?>"><?php echo $descricao; ?></option>

                                        <?php } ?>

                                        ?>
                                    </select><br><br>

                                    <label>Quantidade</label><input placeholder="20" type="text" name="nome" size="" id="alinhar_combo" type="text" name="quantidade"><br><br>

                                    <input type="submit" name="Cadastrar" value="Cadastrar">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- -------------------------------------- Final da Janela -------------------------------------- 
            ---------------------------------------------------------------------------------------------- -->

                <table>
                    <thead>
                        <tr>
                            <td>Produto</td>
                            <td>Quantidade</td>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            //Conexão com o Banco
                            require("ConectBD.php");

                            $cod = $_GET['cod'];

                            $sqlSelect = "SELECT Orcamento_Detalhes.Codigo_Orcamento, Orcamento_Detalhes.Codigo_Produto, Orcamento_Detalhes.Quantidade, Orcamento.Codigo_Orcamento, Produto.Codigo_Produto, Produto.Descricao, Produto.Preco_Unitario
                                          FROM Orcamento_Detalhes
                                          INNER JOIN Orcamento ON Orcamento_Detalhes.Codigo_Orcamento = Orcamento.Codigo_Orcamento
                                          INNER JOIN Produto ON Orcamento_Detalhes.Codigo_Produto = Produto.Codigo_Produto
                                          WHERE Orcamento.Codigo_Orcamento = $cod";

                            $resultado = mysqli_query($link, $sqlSelect);

                            while ($cont = mysqli_fetch_array($resultado)) {
                                $produto = $cont['Descricao'];
                                $quantidade = $cont['Quantidade'];
                                $preco = $cont['Preco_Unitario'];

                                echo "<tr>
                                    <td>$produto</td>
                                    <td>$quantidade</td>
                                </tr>";
                            }
                        ?>
                    </tbody>
                </table><br>

            <button><b><a style="color: black" href="#" class="btn-modal">Adicionar Produtos</a></b></button><br><br>

        </div>

<?php
    require "script.php";
?>
<script src="js2\mainModal.js"></script>


</body>
</html>