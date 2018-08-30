<?php
	$nome = $_POST['nome'];
	$descricao = $_POST['descricao'];

	require("ConectBD.php");

	$cod = mysqli_query($link, "SELECT Codigo_Estado FROM Estado");

	$sqlInsert = "INSERT INTO Estado (Nome, Descricao) VALUES ('$nome', '$descricao')";

	mysqli_query($link, $sqlInsert) or die ("Não foi possivel inserir no Banco!!! :(");

	mysqli_close();

	header("Location:Cad_Estado.php");
?>