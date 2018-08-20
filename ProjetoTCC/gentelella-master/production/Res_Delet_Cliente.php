<?php
	$cod = $_GET['cod'];
	$codCi = $_GET['codCi'];
	$codE = $_GET['codE'];

	require("ConectBD.php");

	mysqli_query($link, "DELETE FROM Cliente WHERE Codigo_Cliente = '$cod'") or die('Não foi possivel conectar no banco de dados C');
	mysqli_query($link, "DELETE FROM Cidade WHERE Codigo_Cidade = '$codCi'") or die('Não foi possivel conectar no banco de dados Ci');
	mysqli_query($link, "DELETE FROM Estado WHERE Codigo_Estado = '$codE'") or die('Não foi possivel conectar no banco de dados E');

	mysqli_close();

	header("Location:List_Clientes.php");
?>