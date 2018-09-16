<?php
    $produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    $cod = $_POST['cod'];

    require("ConectBD.php");

    $sqlInsert = "INSERT INTO Orcamento_Detalhes (Codigo_Orcamento, Codigo_Produto, Quantidade) VALUES ('$cod', '$produto', '$quantidade')";

    mysqli_query($link, $sqlInsert) or die ("Não foi possivel inserir no Banco!!! :(");


    $valorU = mysqli_query($link, "SELECT * FROM Produto WHERE Codigo_Produto = $produto");
    $valOrcamento = mysqli_query($link, "SELECT * FROM Orcamento WHERE Codigo_Orcamento = $cod");
    while ($contU = mysqli_fetch_array($valorU) and $contO = mysqli_fetch_array($valOrcamento)) {
        $subTotal = $contO['SubTotal'];
        $total = $contO['Total'];
        $unitario = $contU['Preco_Unitario'];
    }

    $resultadoSubTotal = $quantidade * $unitario + $subTotal;
    $resultadoTotal = $quantidade * $unitario + $total;
    mysqli_query($link, "UPDATE Orcamento SET SubTotal = '$resultadoSubTotal', Total = '$resultadoTotal' WHERE Codigo_Orcamento = $cod") or die ("Não foi possivel inserir no Banco!!! :(");


    // Registro --------------------------------------------------------------------
    // ----------------------------------------------------------------------------
    session_start();

    $funcionario = $_SESSION['cod'];
    $data = date('d/m/Y');
    $descricao = "Dados cadastrados na tabela: Orcamento_Detalhes";

    mysqli_query($link, "INSERT INTO Registro (Funcionario, Data, Descricao) VALUES ('$funcionario', '$data', '$descricao')") or die ("Erro ao cadastrar Registro!!!");
    // ----------------------------------------------------------------------------
    // ----------------------------------------------------------------------------

    mysqli_close();

    header("Location:Cad_Orcamento_Detalhes.php?cod=$cod");
?>