<?php
	$cod = $_GET['cod'];

	require("ConectBD.php");

	mysqli_query($link, "DELETE FROM Preco WHERE Codigo_Preco = '$cod'") or die('Não foi possivel conectar no banco de dados!!! :(');

	mysqli_close();

	header("Location:List_Precos.php");
?>