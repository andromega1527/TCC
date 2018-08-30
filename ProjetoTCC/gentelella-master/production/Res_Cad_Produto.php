<?php
	$descricao = $_POST['descricao'];
	$preco = $_POST['preco'];

	require("ConectBD.php");

	$cod = mysqli_query($link, "SELECT Codigo_Produto FROM Produto");

	$sqlInsert = "INSERT INTO Produto (Descricao, Preco_Unitario) VALUES ('$descricao', '$preco')";

	mysqli_query($link, $sqlInsert) or die ("Não foi possivel inserir no Banco!!! :(");

	mysqli_close();

	header("Location:Cad_Produto.php");
?>