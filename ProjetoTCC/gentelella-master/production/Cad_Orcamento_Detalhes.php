<?php
    $codO = $_GET['cod'];

    require("ConectBD.php");

    $resultado = mysqli_query($link, "SELECT Orcamento.Codigo_Orcamento, Orcamento.Status, Orcamento.Cliente, Orcamento.Funcionario, Orcamento.Data_Emissao, Orcamento.Hora_Emissao, Orcamento.Desconto, Orcamento.SubTotal, Orcamento.Total, Cliente.Codigo_Cliente, Cliente.Nome, Funcionario.Codigo_Funcionario, Funcionario.Nome
                                      FROM Orcamento
                                      INNER JOIN Cliente ON Orcamento.Cliente = Cliente.Codigo_Cliente
                                      INNER JOIN Funcionario ON Orcamento.Funcionario = Funcionario.Codigo_Funcionario
                                      WHERE Codigo_Orcamento = $codO");

    while ($cont = mysqli_fetch_array($resultado)) {
        $status = $cont['Status'];
        $cliente = $cont[10];
        $funcionario = $cont['Nome'];
        $data = $cont['Data_Emissao'];
        $hora = $cont['Hora_Emissao'];
        $desconto = $cont['Desconto'];
        $subTotal = $cont['SubTotal'];
        $total = $cont['Total'];
    }
?>
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

            <div id="botao-editar">
                <button id="editar">Editar Dados</button>
            </div>

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
                                <form method="Post" action="Res_Cad_Orcamento_Detalhes.php" name="formulario">
                                    <label>Produto</label>
                                    <select name="produto" id="combo_orc" id="combo_left">
                                        <option>Selecione</option>

                                        <?php
                                            require("ConectBD.php");

                                            $resultado = mysqli_query($link, "SELECT Codigo_Produto, Descricao FROM Produto");

                                            while($cont = mysqli_fetch_array($resultado)) {
                                                $cod = $cont['Codigo_Produto'];
                                                $descricao = $cont['Descricao'];
                                        ?>

                                        <option value="<?php echo $cod; ?>"><?php echo $descricao; ?></option>

                                        <?php } ?>

                                        ?>
                                    </select><br><br>

                                    <label>Quantidade</label><input placeholder="20" type="text" name="quantidade" id="alinhar_combo"><br><br>

                                    <input type="hidden" name="cod" value="<?php echo $codO; ?>">

                                    <input type="submit" name="Cadastrar" value="Cadastrar">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- -------------------------------------- Final da Janela -------------------------------------- 
            ---------------------------------------------------------------------------------------------- -->

                <label>Status*</label><label><?php echo $status; ?></label><br><br>
                <label>Cliente*</label><label><?php echo $cliente; ?></label><br><br>
                <label>Funcionario*</label><label><?php echo $funcionario; ?></label><br><br>
                <label>Data de Emissão*</label><label><?php echo $data; ?></label><br><br>
                <label>Hora de Emissão*</label><label><?php echo $hora; ?></label><br><br>
                <label>Desconto*</label><label><?php echo $desconto; ?></label><br><br>
                <label>SubTotal*</label><label><?php echo $subTotal; ?></label><br><br>
                <label>Total*</label><label><?php echo $total; ?></label><br><br>

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

                            $sqlSelect = "SELECT Orcamento_Detalhes.Codigo_Orcamento, Orcamento_Detalhes.Codigo_Produto, Orcamento_Detalhes.Quantidade, Orcamento.Codigo_Orcamento, Produto.Codigo_Produto, Produto.Descricao, Produto.Preco_Unitario
                                          FROM Orcamento_Detalhes
                                          INNER JOIN Orcamento ON Orcamento_Detalhes.Codigo_Orcamento = Orcamento.Codigo_Orcamento
                                          INNER JOIN Produto ON Orcamento_Detalhes.Codigo_Produto = Produto.Codigo_Produto
                                          WHERE Orcamento.Codigo_Orcamento = $codO";

                            $resultado = mysqli_query($link, $sqlSelect);

                            while ($cont = mysqli_fetch_array($resultado)) {
                                $produto = $cont['Descricao'];
                                $quantidade = $cont['Quantidade'];
                                $preco = $cont['Preco_Unitario'];
                                $cod = $cont['Codigo_Orcamento'];
                                $codP = $cont['Codigo_Produto'];

                                echo "<tr>
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

            <button><b><a style="color: black" href="#" class="btn-modal">Adicionar Produtos</a></b></button><br><br>
            <button><a href=<?php echo "Res_Desconto.php?cod=$codO&des=$desconto" ?>>Aplicar desconto</a></button><br><br>
            <button><a href="Cad_Orcamento.php">Finalizar Orçamento</a></button><br><br>

        </div>

<?php
    require "script.php";
?>
<script src="js2\mainProdutoL.js"></script>
<script src="js2\mainModal.js"></script>


</body>
</html>