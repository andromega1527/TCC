<?php
	$cod = $_POST['cod'];
	$nome = $_POST['nome'];
	$descricao = $_POST['descricao'];

	/* Conexão */
	require("ConectBD.php");

	mysqli_query($link, "UPDATE Estado SET Nome = '$nome', Descricao = '$descricao' WHERE Codigo_Estado = $cod") or die ("Não foi possivel inserir no Banco!!! :(");

	mysqli_close();

	header("Location:List_Estados.php");
?>