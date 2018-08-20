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
	$codE = $_POST['codE'];
	$estado = $_POST['estado'];
	$codCi = $_POST['codCi'];
	$cidade = $_POST['cidade'];

	/* Conexão */
	require("ConectBD.php");

	mysqli_query($link, "UPDATE Cliente SET Nome = '$nome', Sexo = '$sexo', Data_de_Nascimento = '$data', CPF = '$cpf', CNPJ = '$cnpj', Telefone = '$telefone', Celular = ' $celular', Endereco = '$endereco', CEP = '$cep', Bairro = '$bairro', Numero = '$numero', Email = '$email' WHERE Codigo_Cliente = $cod") or die ("Não foi possivel inserir no Banco C!!! :(");

	mysqli_query($link, "UPDATE Cidade SET Nome = '$cidade' WHERE Codigo_Cidade = $codCi") or die ("Não foi possivel inserir no Banco Ci!!! :(");

	mysqli_query($link, "UPDATE Estado SET Nome = '$estado' WHERE Codigo_Estado = $codE") or die ("Não foi possivel inserir no Banco E!!! :(");

	mysqli_close();

	header("Location:List_Clientes.php");
?>