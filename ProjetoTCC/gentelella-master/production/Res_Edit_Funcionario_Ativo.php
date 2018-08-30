<?php
	$cod = $_POST['cod'];
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

	/* Conexão */
	require("ConectBD.php");

	mysqli_query($link, "UPDATE Funcionario SET Nome = '$nome', Sexo = '$sexo', CPF = '$cpf', Telefone = '$telefone', Celular = ' $celular', Endereco = '$endereco', CEP = '$cep', Bairro = '$bairro', Numero = '$numero', Email = '$email', Status = '$status' WHERE Codigo_Funcionario = $cod") or die ("Não foi possivel inserir no Banco!!! :(");

	mysqli_close();

	header("Location:List_Funcionarios_Ativos.php");
?>