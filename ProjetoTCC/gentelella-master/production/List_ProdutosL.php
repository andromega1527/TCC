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
        <div id="lista">
            <h1>Lista de Produtos do Orçamento</h1><br><br>

            <form method="Post" action="">
                <input type="text" name="pesquisa">
                <input type="submit" value="Pesquisar">
            </form><br><br>

            <div id="tabela" align="center">
                <button id="editar">Editar Dados</button>

                <table class="tabela" border="2px" align="center">
                    <thead>
                        <tr style="color: black;">
                            <td>Produto</td>
                            <td>Quantidade</td>
                        </tr>
                    </thead>

                    <tbody>
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

            </div>

        </div>

<?php
    require "script.php";
?>
<script src="js2\.js"></script>


</body>
</html>