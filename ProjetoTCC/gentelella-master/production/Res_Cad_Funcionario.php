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
	$senha = $_POST['senha'];
	$status = $_POST['status'];
	$permissao = $_POST['permissao'];

	require("ConectBD.php");

	$codF = mysqli_query($link, "SELECT Codigo_Funcionario FROM Funcionario");

	$sqlInsertF = "INSERT INTO Funcionario (Nome, Sexo, CPF, Telefone, Celular, Endereco, CEP, Bairro, Numero, Email, Senha, Status, Permissao) VALUES ('$nome', '$sexo', '$cpf', '$telefone', '$celular', '$endereco', '$cep', '$bairro', '$numero', '$email', '$senha', '$status', '$permissao')";

	mysqli_query($link, $sqlInsertF) or die ("Não foi possivel inserir no Banco!!! :(");


	// Registro --------------------------------------------------------------------
	// ----------------------------------------------------------------------------
	session_start();

	$funcionario = $_SESSION['cod'];
	$data = date('d/m/Y');
	$descricao = "Dados cadastrados na tabela: Funcionario";

	mysqli_query($link, "INSERT INTO Registro (Funcionario, Data, Descricao) VALUES ('$funcionario', '$data', '$descricao')") or die ("Erro ao cadastrar Registro!!!");
	// ----------------------------------------------------------------------------
	// ----------------------------------------------------------------------------
	

	mysqli_close();

	header("Location:Cad_Funcionario.php");
?>