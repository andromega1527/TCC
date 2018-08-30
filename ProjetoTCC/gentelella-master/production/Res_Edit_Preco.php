<?php
	$cod = $_POST['cod'];
	$preco = $_POST['preco'];
	$estado = $_POST['estado'];
	$cidade = $_POST['cidade'];

	/* Conexão */
	require("ConectBD.php");

	mysqli_query($link, "UPDATE Preco SET Preco_por_Metro = '$preco', Estado = '$estado', Cidade = '$cidade' WHERE Codigo_Preco = $cod") or die ("Não foi possivel inserir no Banco!!! :(");

	mysqli_close();

	header("Location:List_Precos.php");
?>