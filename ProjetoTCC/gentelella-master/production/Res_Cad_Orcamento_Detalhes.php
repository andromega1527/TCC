<?php
    $produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];

    require("ConectBD.php");

    $cod = mysqli_query($link, "SELECT Codigo_Orcamento FROM Orcamento_Detalhes");

    $sqlInsert = "INSERT INTO Orcamento_Detalhes (Nome, Descricao) VALUES ('$nome', '$descricao')";

    mysqli_query($link, $sqlInsert) or die ("Não foi possivel inserir no Banco!!! :(");


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

    header("Location:Cad_Orcamento_Detalhes.php");
?>