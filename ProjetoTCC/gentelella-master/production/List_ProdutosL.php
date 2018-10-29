<!DOCTYPE html>
<html>
<head>
    <html lang="pt">
    <meta charset="utf-8" />
    <title>Lista de Produtos do Orçamento</title>

    <?php
        require "link.php";
    ?>
    <link rel="stylesheet" type="text/css" href="css2\main.css">
    
</head>

<?php
    require "menu.php";
?>
    <div class="right_col" role="main">
        <div id="lista">
            <h1>Lista de Produtos do Orçamento</h1><br><br>

            <form method="Post" action="">
                <input type="text" name="pesquisa">
                <input type="submit" value="Pesquisar">
            </form><br><br>

            <div id="tabela" align="center">
                <div id="botao-editar">
                    <button id="editar">Editar Dados</button>
                </div>

                <table id="datatable" class="tabela table table-striped table-bordered" border="2px" align="center">
                    <thead>
                        <tr style="color: black;">
                            <td>Produto</td>
                            <td>Quantidade</td>
                        </tr>
                    </thead>

                    <tbody id="tabela_Dados">
                        <?php
                            @$pesquisa = $_POST['pesquisa'];
                            $cod = $_GET['cod'];

                            //Conexão com o Banco
                            require("ConectBD.php");

                            if(isset($pesquisa)) {
                                $sqlSelect = "SELECT Orcamento_Detalhes.Codigo_Orcamento, Orcamento_Detalhes.Codigo_Produto, Orcamento_Detalhes.Quantidade, Orcamento.Codigo_Orcamento, Produto.Codigo_Produto, Produto.Descricao, Produto.Preco_Unitario
                                          FROM Orcamento_Detalhes
                                          INNER JOIN Orcamento ON Orcamento_Detalhes.Codigo_Orcamento = Orcamento.Codigo_Orcamento
                                          INNER JOIN Produto ON Orcamento_Detalhes.Codigo_Produto = Produto.Codigo_Produto
                                          WHERE Orcamento.Codigo_Orcamento = $cod and Orcamento_Detalhes.Quantidade LIKE '%$pesquisa%'
                                          ORDER BY Orcamento_Detalhes.Quantidade ASC";
                            } else {
                                $sqlSelect = "SELECT Orcamento_Detalhes.Codigo_Orcamento, Orcamento_Detalhes.Codigo_Produto, Orcamento_Detalhes.Quantidade, Orcamento.Codigo_Orcamento, Produto.Codigo_Produto, Produto.Descricao, Produto.Preco_Unitario
                                          FROM Orcamento_Detalhes
                                          INNER JOIN Orcamento ON Orcamento_Detalhes.Codigo_Orcamento = Orcamento.Codigo_Orcamento
                                          INNER JOIN Produto ON Orcamento_Detalhes.Codigo_Produto = Produto.Codigo_Produto
                                          WHERE Orcamento.Codigo_Orcamento = $cod
                                          ORDER BY Orcamento_Detalhes.Quantidade ASC";
                            }

                            $resultado = mysqli_query($link, $sqlSelect);

                            $c = 1;

                            while ($cont = mysqli_fetch_array($resultado)) {
                                $produto = $cont['Descricao'];
                                $quantidade = $cont['Quantidade'];
                                $preco = $cont['Preco_Unitario'];
                                $codP = $cont[1];

                                echo "<tr id=\"edit". $c++ ."\">
                                    <input type=\"hidden\" name=\"cod\" value=\"$cod\">
                                    <input type=\"hidden\" name=\"codP\" value=\"$codP\">
                                    <td>$produto</td>
                                    <td>$quantidade</td>
                                    <td id=\"excluir-modal\"><a class=\"btn-modal\"></a></td>
                                </tr>";
                            }
                        ?>
                    </tbody>

                </table><br>

            </div>

        </div>


        <!-- -------------------------------------- Começo da Janela -------------------------------------- 
            ----------------------------------------------------------------------------------------------- -->

                <div id="modal">
                    <div class="modal-box">
                        <div id="borda">
                            <div class="fechar"><b><a style="color: black" class="sla">X</a></b></div>
                        </div>
                        <div id="formulario-modal">

                            <h4>Se você fizer isso, esses dados não poderão ser recuperados. Tem certeza que você quer fazer isso?</h4>

                            <div class="modal-box-conteudo">
                                <form method="Post" name="formulario">

                                    <input type="submit" name="Sim" value="Sim">

                                </form>

                                <button id="cancel" style="float: right;">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- -------------------------------------- Final da Janela -------------------------------------- 
            ---------------------------------------------------------------------------------------------- -->


<?php
    require "script.php";
?>
<script src="js2\mainProdutoL.js"></script>
<script src="js2/mainModal.js"></script>


</body>
</html>