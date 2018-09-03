<?php
	$cod = $_POST['cod'];
	$nome = $_POST['nome'];
	$descricao = $_POST['descricao'];

	/* Conexão */
	require("ConectBD.php");


	// Registro --------------------------------------------------------------------
	// ----------------------------------------------------------------------------
	session_start();

	$sqlSelect = "SELECT * FROM Estado WHERE Codigo_Estado = '$cod'";

	$resultado = mysqli_query($link, $sqlSelect);

	while ($cont = mysqli_fetch_array($resultado)) {
		$nomeR = $cont['Nome'];
	}

	$funcionario = $_SESSION['cod'];
	$data = date('d/m/Y');
	$campo = $nomeR;
	$descricaoR = "Dados alterados na tabela: Estado, Nome: $campo";

	mysqli_query($link, "INSERT INTO Registro (Funcionario, Data Descricao) VALUES ('$funcionario', '$data', '$descricaoR')") or die ("Erro ao cadastrar Registro!!!");
	// ----------------------------------------------------------------------------
	// ----------------------------------------------------------------------------


	mysqli_query($link, "UPDATE Estado SET Nome = '$nome', Descricao = '$descricao' WHERE Codigo_Estado = $cod") or die ("Não foi possivel inserir no Banco!!! :(");

	mysqli_close();

	header("Location:List_Estados.php");
?>