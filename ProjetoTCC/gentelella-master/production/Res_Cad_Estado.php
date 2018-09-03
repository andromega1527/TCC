<?php
	$nome = $_POST['nome'];
	$descricao = $_POST['descricao'];

	require("ConectBD.php");

	$cod = mysqli_query($link, "SELECT Codigo_Estado FROM Estado");

	$sqlInsert = "INSERT INTO Estado (Nome, Descricao) VALUES ('$nome', '$descricao')";

	mysqli_query($link, $sqlInsert) or die ("Não foi possivel inserir no Banco!!! :(");


	// Registro --------------------------------------------------------------------
	// ----------------------------------------------------------------------------
	session_start();

	$funcionario = $_SESSION['cod'];
	$data = date('d/m/Y');
	$descricaoR = "Dados cadastrados na tabela: Estado";

	mysqli_query($link, "INSERT INTO Registro (Funcionario, Data, Descricao) VALUES ('$funcionario', '$data', '$descricaoR')") or die ("Erro ao cadastrar Registro!!!");
	// ----------------------------------------------------------------------------
	// ----------------------------------------------------------------------------


	mysqli_close();

	header("Location:Cad_Estado.php");
?>