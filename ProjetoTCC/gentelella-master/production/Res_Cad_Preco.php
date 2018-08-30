<?php
	$preco = $_POST['preco'];
	$estado = $_POST['estado'];
	$cidade = $_POST['cidade'];

	require("ConectBD.php");

	$cod = mysqli_query($link, "SELECT Codigo_Preco FROM Preco");

	$sqlInsert = "INSERT INTO Preco (Preco_por_Metro, Estado, Cidade) VALUES ('$preco', '$estado', '$cidade')";

	mysqli_query($link, $sqlInsert) or die ("Não foi possivel inserir no Banco!!! :(");

	mysqli_close();

	header("Location:Cad_Preco.php");
?>