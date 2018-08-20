<?php
	$cod = $_GET['cod'];

	require("ConectBD.php");

	mysqli_query($link, "DELETE FROM Funcionario WHERE Codigo_Funcionario = '$cod'") or die('Não foi possivel conectar no banco de dados C');

	mysqli_close();

	header("Location:List_Funcionarios.php");
?>