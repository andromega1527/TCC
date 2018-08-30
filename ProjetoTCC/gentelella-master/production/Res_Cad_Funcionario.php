<?php
	$nome = $_POST['nome'];
	$sexo = $_POST['sexo'];
	$cpf = $_POST['cpf'];
	$telefone = $_POST['telefone'];
	$celular = $_POST['celular'];
	$endereco = $_POST['endereco'];
	$cep = $_POST['cep'];
	$bairro = $_POST['bairro'];
	$numero = $_POST['num'];
	$email = $_POST['email'];
	$status = $_POST['status'];

	require("ConectBD.php");

	$codF = mysqli_query($link, "SELECT Codigo_Funcionario FROM Funcionario");

	$sqlInsertF = "INSERT INTO Funcionario (Nome, Sexo, CPF, Telefone, Celular, Endereco, CEP, Bairro, Numero, Email, Status) VALUES ('$nome', '$sexo', '$cpf', '$telefone', '$celular', '$endereco', '$cep', '$bairro', '$numero', '$email', '$status')";

	mysqli_query($link, $sqlInsertF) or die ("Não foi possivel inserir no Banco!!! :(");

	mysqli_close();

	header("Location:Cad_Funcionario.php");
?>