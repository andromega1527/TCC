<?php
	$cod = $_GET['cod'];

	require("ConectBD.php");

	mysqli_query($link, "DELETE FROM Estado WHERE Codigo_Estado = '$cod'") or die('Não foi possivel conectar no banco de dados!!! :(');

	mysqli_close();

	header("Location:List_Estados.php");
?>