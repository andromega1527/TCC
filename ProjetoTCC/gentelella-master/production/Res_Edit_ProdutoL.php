<?php
    $produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    $cod = $_POST['cod'];
    $codP = $_POST['codP'];

    require("ConectBD.php");

    $sqlSelect = mysqli_query($link, "SELECT Orcamento_Detalhes.Codigo_Orcamento, Orcamento_Detalhes.Codigo_Produto, Orcamento_Detalhes.Quantidade, Orcamento.Codigo_Orcamento, Orcamento.Desconto, Orcamento.SubTotal, Produto.Codigo_Produto, Produto.Preco_Unitario
                                      FROM Orcamento_Detalhes
                                      INNER JOIN Orcamento ON Orcamento_Detalhes.Codigo_Orcamento = Orcamento.Codigo_Orcamento
                                      INNER JOIN Produto ON Orcamento_Detalhes.Codigo_Produto = Produto.Codigo_Produto
                                      WHERE Orcamento_Detalhes.Codigo_Orcamento = $cod AND Orcamento_Detalhes.Codigo_Produto = $codP");
    while ($cont = mysqli_fetch_array($sqlSelect)) {
        $subTotal = $cont['SubTotal'];
        $quantidadeP = $cont['Quantidade'];
        $preco = $cont['Preco_Unitario'];
        $desconto = $cont['Desconto'];
    }

    $reajuste = $subTotal - $quantidadeP * $preco;
    $acrescentar = $reajuste + $preco * $quantidade;
    $descontoF = $acrescentar * ($desconto / 100);
    $descontoAcrescentar = $acrescentar - $descontoF;

    mysqli_query($link, "UPDATE Orcamento_Detalhes SET Codigo_Produto = '$produto', Quantidade = '$quantidade' WHERE Codigo_Orcamento = $cod AND Codigo_Produto = $codP") or die ("Não foi possivel inserir no Banco!!! :(");

    mysqli_query($link, "UPDATE Orcamento SET SubTotal = '$acrescentar', Total = '$descontoAcrescentar' WHERE Codigo_Orcamento = $cod")  or die ("Não foi possivel inserir no Banco!!! :( 2");


    // Registro --------------------------------------------------------------------
    // ----------------------------------------------------------------------------
    session_start();

    $funcionario = $_SESSION['cod'];
    $data = date('d/m/Y');
    $descricao = "Dados alterados na tabela: Orcamento_Detalhes";

    mysqli_query($link, "INSERT INTO Registro (Funcionario, Data, Descricao) VALUES ('$funcionario', '$data', '$descricao')") or die ("Erro ao cadastrar Registro!!!");
    // ----------------------------------------------------------------------------
    // ----------------------------------------------------------------------------


    mysqli_close();

    header("Location:Edit_ProdutoL.php?cod=$cod&codP=$codP");
?>