<?php
	$preco = $_POST['preco'];
	$estado = $_POST['estado'];
	$cidade = $_POST['cidade'];

	require("ConectBD.php");

	$cod = mysqli_query($link, "SELECT Codigo_Preco FROM Preco");

	$sqlInsert = "INSERT INTO Preco (Preco_por_Metro, Estado, Cidade) VALUES ('$preco', '$estado', '$cidade')";

	mysqli_query($link, $sqlInsert) or die ("Não foi possivel inserir no Banco!!! :(");


	// Registro --------------------------------------------------------------------
	// ----------------------------------------------------------------------------
	session_start();

	$funcionario = $_SESSION['cod'];
	$data = date('d/m/Y');
	$descricao = "Dados cadastrados na tabela: Preço";

	mysqli_query($link, "INSERT INTO Registro (Funcionario, Data, Descricao) VALUES ('$funcionario', '$data', '$descricao')") or die ("Erro ao cadastrar Registro!!!");
	// ----------------------------------------------------------------------------
	// ----------------------------------------------------------------------------
	

	mysqli_close();

	header("Location:Cad_Preco.php");
?>