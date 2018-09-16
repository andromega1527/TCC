<?php
	$cod = $_GET['cod'];
	$desconto = $_GET['des'];

	require("ConectBD.php");

	$sqlSelect = mysqli_query($link, "SELECT * FROM Orcamento WHERE Codigo_Orcamento = $cod");
	while ($cont = mysqli_fetch_array($sqlSelect)) {
		$total = $cont['Total'];
	}
	$descontoTotal = $total * ($desconto / 100);
	$total = $total - $descontoTotal;
	mysqli_query($link, "UPDATE Orcamento SET Total = '$total' WHERE Codigo_Orcamento = $cod") or die("Não foi possivel inserir no Banco!!! :(");


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