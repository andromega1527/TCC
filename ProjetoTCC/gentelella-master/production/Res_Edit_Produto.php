<?php
	$cod = $_POST['cod'];
	$descricao = $_POST['descricao'];
	$preco = $_POST['preco'];

	/* Conexão */
	require("ConectBD.php");


	// Registro --------------------------------------------------------------------
	// ----------------------------------------------------------------------------
	session_start();

	$sqlSelect = "SELECT * FROM Produto WHERE Produto = '$cod'";

	$resultado = mysqli_query($link, $sqlSelect);

	while ($cont = mysqli_fetch_array($resultado)) {
		$descricaoRD = $cont['Descricao'];
	}

	$funcionario = $_SESSION['cod'];
	$data = date('d/m/Y');
	$campo = $descricaoRD;
	$descricaoR = "Dados alterados na tabela: Produto, Descricao: $campo";

	mysqli_query($link, "INSERT INTO Registro (Funcionario, Data, Descricao) VALUES ('$funcionario', '$data', '$descricaoR')") or die ("Erro ao cadastrar Registro!!!");
	// ----------------------------------------------------------------------------
	// ----------------------------------------------------------------------------


	mysqli_query($link, "UPDATE Produto SET Descricao = '$descricao', Preco_Unitario = '$preco' WHERE Codigo_Produto = $cod") or die ("Não foi possivel inserir no Banco!!! :(");

	mysqli_close();

	header("Location:List_Produtos.php");
?>