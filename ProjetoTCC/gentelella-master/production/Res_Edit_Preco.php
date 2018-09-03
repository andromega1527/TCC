<?php
	$cod = $_POST['cod'];
	$preco = $_POST['preco'];
	$estado = $_POST['estado'];
	$cidade = $_POST['cidade'];

	/* Conexão */
	require("ConectBD.php");


	// Registro --------------------------------------------------------------------
	// ----------------------------------------------------------------------------
	session_start();

	$sqlSelect = "SELECT * FROM Preco WHERE Codigo_Preco = '$cod'";

	$resultado = mysqli_query($link, $sqlSelect);

	while ($cont = mysqli_fetch_array($resultado)) {
		$precoR = $cont['Preco'];
	}

	$funcionario = $_SESSION['cod'];
	$data = date('d/m/Y');
	$campo = $precoR;
	$descricao = "Dados alterados na tabela: Preço, Preço: $campo";

	mysqli_query($link, "INSERT INTO Registro (Funcionario, Data, Descricao) VALUES ('$funcionario', '$data', '$descricao')") or die ("Erro ao cadastrar Registro!!!");
	// ----------------------------------------------------------------------------
	// ----------------------------------------------------------------------------


	mysqli_query($link, "UPDATE Preco SET Preco_por_Metro = '$preco', Estado = '$estado', Cidade = '$cidade' WHERE Codigo_Preco = $cod") or die ("Não foi possivel inserir no Banco!!! :(");

	mysqli_close();

	header("Location:List_Precos.php");
?>