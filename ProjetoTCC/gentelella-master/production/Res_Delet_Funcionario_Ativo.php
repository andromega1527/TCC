<?php
	$cod = $_GET['cod'];

	require("ConectBD.php");


	// Registro --------------------------------------------------------------------
	// ----------------------------------------------------------------------------
	session_start();

	$sqlSelect = "SELECT * FROM Funcionario WHERE Codigo_Funcionario = '$cod'";

	$resultado = mysqli_query($link, $sqlSelect);

	while ($cont = mysqli_fetch_array($resultado)) {
		$nome = $cont['Nome'];
	}

	$funcionario = $_SESSION['cod'];
	$data = date('d/m/Y');
	$campo = $nome;
	$descricao = "Dados deletados na tabela: Funcionario, Nome: $campo";

	mysqli_query($link, "INSERT INTO Registro (Funcionario, Data, Descricao) VALUES ('$funcionario', '$data', '$descricao')") or die ("Erro ao cadastrar Registro!!!");
	// ----------------------------------------------------------------------------
	// ----------------------------------------------------------------------------


	mysqli_query($link, "DELETE FROM Funcionario WHERE Codigo_Funcionario = '$cod'") or die('Não foi possivel conectar no banco de dados C');

	mysqli_close();

	header("Location:List_Funcionarios_Ativos.php");
?>