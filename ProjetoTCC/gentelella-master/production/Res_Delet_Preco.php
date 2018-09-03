<?php
	$cod = $_GET['cod'];

	require("ConectBD.php");


	// Registro --------------------------------------------------------------------
	// ----------------------------------------------------------------------------
	session_start();

	$sqlSelect = "SELECT * FROM Preco WHERE Codigo_Preco = '$cod'";

	$resultado = mysqli_query($link, $sqlSelect);

	while ($cont = mysqli_fetch_array($resultado)) {
		$preco = $cont['Preco'];
	}

	$funcionario = $_SESSION['cod'];
	$data = date('d/m/Y');
	$campo = $preco;
	$descricao = "Dados deletados na tabela: Preço, Preço: $campo";

	mysqli_query($link, "INSERT INTO Registro (Funcionario, Data, Descricao) VALUES ('$funcionario', '$data', '$descricao')") or die ("Erro ao cadastrar Registro!!!");
	// ----------------------------------------------------------------------------
	// ----------------------------------------------------------------------------


	mysqli_query($link, "DELETE FROM Preco WHERE Codigo_Preco = '$cod'") or die('Não foi possivel conectar no banco de dados!!! :(');

	mysqli_close();

	header("Location:List_Precos.php");
?>