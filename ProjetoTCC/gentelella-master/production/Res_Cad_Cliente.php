<?php
	$nome = $_POST['nome'];
	$sexo = $_POST['sexo'];
	$data = $_POST['data'];
	$cpf = $_POST['cpf'];
	$cnpj = $_POST['cnpj'];
	$telefone = $_POST['telefone'];
	$celular = $_POST['celular'];
	$endereco = $_POST['endereco'];
	$cep = $_POST['cep'];
	$bairro = $_POST['bairro'];
	$numero = $_POST['num'];
	$email = $_POST['email'];
	$estado = $_POST['estado'];
	$cidade = $_POST['cidade'];

	require("ConectBD.php");

	$cod = mysqli_query($link, "SELECT Codigo_Cliente FROM Cliente");

	$sqlInsert = "INSERT INTO cliente (Nome, Sexo, Data_de_Nascimento, CPF, CNPJ, Telefone, Celular, Endereco, CEP, Bairro, Numero, Email, Estado, Cidade) VALUES ('$nome', '$sexo', '$data', '$cpf', '$cnpj', '$telefone', '$celular', '$endereco', '$cep', '$bairro', '$numero', '$email', '$estado', '$cidade')";

	mysqli_query($link, $sqlInsert) or die ("Não foi possivel inserir no Banco!!! :(");

	mysqli_close();

	header("Location:Cad_Cliente.php");
?>