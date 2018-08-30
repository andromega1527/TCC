<?php
	$cod = $_POST['cod'];
	$descricao = $_POST['descricao'];
	$preco = $_POST['preco'];

	/* Conexão */
	require("ConectBD.php");

	mysqli_query($link, "UPDATE Produto SET Descricao = '$descricao', Preco_Unitario = '$preco' WHERE Codigo_Produto = $cod") or die ("Não foi possivel inserir no Banco!!! :(");

	mysqli_close();

	header("Location:List_Produtos.php");
?>