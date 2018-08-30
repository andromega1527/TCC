<?php
	$cod = $_GET['cod'];

	require("ConectBD.php");

	mysqli_query($link, "DELETE FROM Cidade WHERE Codigo_Cidade = '$cod'") or die('Não foi possivel conectar no banco de dados!!! :(');

	mysqli_close();

	header("Location:List_Cidades.php");
?>