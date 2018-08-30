<?php
	$cod = $_POST['cod'];
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

	/* Conexão */
	require("ConectBD.php");

	mysqli_query($link, "UPDATE Cliente SET Nome = '$nome', Sexo = '$sexo', Data_de_Nascimento = '$data', CPF = '$cpf', CNPJ = '$cnpj', Telefone = '$telefone', Celular = ' $celular', Endereco = '$endereco', CEP = '$cep', Bairro = '$bairro', Numero = '$numero', Email = '$email', Estado = '$estado', Cidade = '$cidade' WHERE Codigo_Cliente = $cod") or die ("Não foi possivel inserir no Banco!!! :(");

	mysqli_close();

	header("Location:List_Clientes.php");
?>