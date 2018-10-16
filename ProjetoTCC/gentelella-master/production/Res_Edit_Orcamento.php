<?php
	$cod = $_POST['cod'];
	$status = $_POST['status'];
	$cliente = $_POST['cliente'];
	$data = $_POST['data'];
	$hora = $_POST['hora'];
	$desconto = $_POST['desconto'];

	/* Conexão */
	require("ConectBD.php");

	//Selecionar o Desconto anterior
	$sqlSelect = mysqli_query($link, "SELECT * FROM Orcamento WHERE Codigo_Orcamento = $cod");
	while ($cont = mysqli_fetch_array($sqlSelect)) {
		$subTotal = $cont['SubTotal'];
	}

	$descontoT = $subTotal * ($desconto / 100);
	$tT = $subTotal - $descontoT;


	// Registro -------------------------------------------------------------------
	// ----------------------------------------------------------------------------
	session_start();

	$funcionario = $_SESSION['cod'];
	$dataR = date('d/m/Y');
	$descricao = "Dados alterados na tabela: Orçamento";

	mysqli_query($link, "INSERT INTO Registro (Funcionario, Data, Descricao) VALUES ('$funcionario', '$dataR', '$descricao')") or die ("Erro ao cadastrar Registro!!!");
	// ----------------------------------------------------------------------------
	// ----------------------------------------------------------------------------


	mysqli_query($link, "UPDATE Orcamento SET Status = '$status', Cliente = '$cliente', Data_Emissao = '$data', Hora_Emissao = '$hora', Desconto = '$desconto', Total = '$tT' WHERE Codigo_Orcamento = $cod") or die ("Não foi possivel inserir no Banco!!! :(");

	mysqli_close();

	header("Location:List_Orcamentos.php");
?>