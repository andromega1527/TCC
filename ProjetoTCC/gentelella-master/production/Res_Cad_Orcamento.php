<?php
	$status = $_POST['status'];
	$cliente = $_POST['cliente'];
	$funcionario = $_POST['funcionario'];
	$data = $_POST['data'];
	$hora = $_POST['hora'];
	$desconto = $_POST['desconto'];
	$parcelamento = $_POST['parcelamento'];
	$subT = $_POST['subT'];
	$total = $_POST['total'];

	require("ConectBD.php");

	$cod = mysqli_query($link, "SELECT Codigo_Orcamento FROM orcamento");

	$sqlInsert = "INSERT INTO orcamento (Status, Cliente, Funcionario, Data_Emissao, Hora_Emissao, Desconto, Parcelamento, SubTotal, Total) VALUES ('$status', '$cliente', '$funcionario', '$data', '$hora', '$desconto', '$parcelamento', '$subT', '$total')";

	mysqli_query($link, $sqlInsert) or die ("Não foi possivel inserir no Banco !!! :(");

	mysqli_close();

	header("Location:Cad_Orcamento.php");
?>