<?php
	$nome = $_POST['nome'];
	$descricao = $_POST['descricao'];

	require("ConectBD.php");

	$cod = mysqli_query($link, "SELECT Codigo_Cidade FROM Cidade");

	$sqlInsert = "INSERT INTO Cidade (Nome, Descricao) VALUES ('$nome', '$descricao')";

	mysqli_query($link, $sqlInsert) or die ("Não foi possivel inserir no Banco!!! :(");

	mysqli_close();

	header("Location:Cad_Cidade.php");
?>