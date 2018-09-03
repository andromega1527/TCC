<?php
	$descricao = $_POST['descricao'];
	$preco = $_POST['preco'];

	require("ConectBD.php");

	$cod = mysqli_query($link, "SELECT Codigo_Produto FROM Produto");

	$sqlInsert = "INSERT INTO Produto (Descricao, Preco_Unitario) VALUES ('$descricao', '$preco')";

	mysqli_query($link, $sqlInsert) or die ("Não foi possivel inserir no Banco!!! :(");


	// Registro --------------------------------------------------------------------
	// ----------------------------------------------------------------------------
	session_start();

	$funcionario = $_SESSION['cod'];
	$data = date('d/m/Y');
	$descricaoR = "Dados cadastrados na tabela: Produto";

	mysqli_query($link, "INSERT INTO Registro (Funcionario, Data, Descricao) VALUES ('$funcionario', '$data', '$descricaoR')") or die ("Erro ao cadastrar Registro!!!");
	// ----------------------------------------------------------------------------
	// ----------------------------------------------------------------------------
	

	mysqli_close();

	header("Location:Cad_Produto.php");
?>