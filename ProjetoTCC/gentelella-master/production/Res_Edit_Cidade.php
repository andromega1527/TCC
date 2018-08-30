<?php
	$cod = $_POST['cod'];
	$nome = $_POST['nome'];
	$descricao = $_POST['descricao'];

	/* Conexão */
	require("ConectBD.php");

	mysqli_query($link, "UPDATE Cidade SET Nome = '$nome', Descricao = '$descricao' WHERE Codigo_Cidade = $cod") or die ("Não foi possivel inserir no Banco!!! :(");

	mysqli_close();

	header("Location:List_Cidades.php");
?>