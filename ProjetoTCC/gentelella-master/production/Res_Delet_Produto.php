<?php
	$cod = $_GET['cod'];

	require("ConectBD.php");

	mysqli_query($link, "DELETE FROM Produto WHERE Codigo_Produto = '$cod'") or die('Não foi possivel conectar no banco de dados!!! :(');

	mysqli_close();

	header("Location:List_Produtos.php");
?>