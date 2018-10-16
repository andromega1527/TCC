<?php
	$cod = $_GET['cod'];
	$codP = $_GET['codP'];

	require("ConectBD.php");


	// Registro --------------------------------------------------------------------
	// ----------------------------------------------------------------------------
	session_start();

	$funcionario = $_SESSION['cod'];
	$data = date('d/m/Y');
	$descricao = "Dados deletados na tabela: Orçamento_Detalhes";

	mysqli_query($link, "INSERT INTO Registro (Funcionario, Data, Descricao) VALUES ('$funcionario', '$data', '$descricao')") or die ("Erro ao cadastrar Registro!!!");
	// ----------------------------------------------------------------------------
	// ----------------------------------------------------------------------------


	mysqli_query($link, "DELETE FROM Orcamento_Detalhes WHERE Codigo_Orcamento = '$cod' and Codigo_Produto = '$codP'") or die('Não foi possivel conectar no banco de dados!!! :(');

	mysqli_close();

	header("Location:List_ProdutosL.php?cod=$cod");
?>