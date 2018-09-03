<?php
	$cod = $_GET['cod'];

	require("ConectBD.php");


	// Registro --------------------------------------------------------------------
	// ----------------------------------------------------------------------------
	session_start();

	$sqlSelect = "SELECT * FROM Cliente WHERE Codigo_Cliente = '$cod'";

	$resultado = mysqli_query($link, $sqlSelect);

	while ($cont = mysqli_fetch_array($resultado)) {
		$nome = $cont['Nome'];
	}

	$funcionario = $_SESSION['cod'];
	$data = date('d/m/Y');
	$campo = $nome;
	$descricao = "Dados deletados na tabela: Cliente, Nome: $campo";

	mysqli_query($link, "INSERT INTO Registro (Funcionario, Data, Descricao) VALUES ('$funcionario', '$data', '$descricao')") or die ("Erro ao cadastrar Registro!!!");
	// ----------------------------------------------------------------------------
	// ----------------------------------------------------------------------------


	mysqli_query($link, "DELETE FROM Cliente WHERE Codigo_Cliente = '$cod'") or die ('Não foi possivel conectar no banco de dados!!! :(');

	mysqli_close();

	header("Location:List_Clientes.php");
?>