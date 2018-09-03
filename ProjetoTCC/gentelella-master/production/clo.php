<?php
	session_start();

	unset ($_SESSION['login']);
  	unset ($_SESSION['senha']);
  	unset ($logado);
  	
  	header('location:..\TelaLogin\index.php');
	
	
?>