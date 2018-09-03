<?php
	$status = $_POST['status'];
	$cliente = $_POST['cliente'];
	$funcionario = $_POST['funcionario'];
	$data = $_POST['data'];
	$hora = $_POST['hora'];
	$desconto = $_POST['desconto'];
	$subT = $_POST['subT'];
	$total = $_POST['total'];

	require("ConectBD.php");

	$cod = mysqli_query($link, "SELECT Codigo_Orcamento FROM Orcamento");

	$sqlInsert = "INSERT INTO Orcamento (Status, Cliente, Funcionario, Data_Emissao, Hora_Emissao, Desconto, SubTotal, Total) VALUES ('$status', '$cliente', '$funcionario', '$data', '$hora', '$desconto', '$subT', '$total')";

	mysqli_query($link, $sqlInsert) or die ("Não foi possivel inserir no Banco!!! :(");


	// Registro --------------------------------------------------------------------
    // ----------------------------------------------------------------------------
    session_start();

    $funcionario = $_SESSION['cod'];
    $data = date('d/m/Y');
    $descricao = "Dados cadastrados na tabela: Orcamento";

    mysqli_query($link, "INSERT INTO Registro (Funcionario, Data, Descricao) VALUES ('$funcionario', '$data', '$descricao')") or die ("Erro ao cadastrar Registro!!!");
    // ----------------------------------------------------------------------------
    // ----------------------------------------------------------------------------


	mysqli_close();

	header("Location:Cad_Orcamento_Detalhes.php?cod=$cod");
?>