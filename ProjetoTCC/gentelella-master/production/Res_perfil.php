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
	$senha = $_POST['senha'];

	echo $cod;
	echo "<br>";
	echo $nome;
	echo "<br>";
	echo $sexo;
	echo "<br>";
	echo $cpf;
	echo "<br>";
	echo $telefone;
	echo "<br>";
	echo $celular;
	echo "<br>";
	echo $endereco;
	echo "<br>";
	echo $cep;
	echo "<br>";
	echo $bairro;
	echo "<br>";
	echo $numero;
	echo "<br>";
	echo $email;
	echo "<br>";
	echo $senha;
	echo "<br>";

	/* Conexão */
	require("ConectBD.php");


	// Registro --------------------------------------------------------------------
	// ----------------------------------------------------------------------------
	session_start();

	$funcionario = $_SESSION['cod'];
	$data = date('d/m/Y');
	$campo = $_SESSION['nome'];
	$descricao = "Dados alterados na tabela: Funcionario, Nome: $campo";

	mysqli_query($link, "INSERT INTO Registro (Funcionario, Data, Descricao) VALUES ('$funcionario', '$data', '$descricao')") or die ("Erro ao cadastrar Registro!!!");
	// ----------------------------------------------------------------------------
	// ----------------------------------------------------------------------------


	mysqli_query($link, "UPDATE Funcionario SET Nome = '$nome', Sexo = '$sexo', CPF = '$cpf', Telefone = '$telefone', Celular = '$celular', Endereco = '$endereco', CEP = '$cep', Bairro = '$bairro', Numero = '$numero', Email = '$email', Senha = '$senha' WHERE Codigo_Funcionario = $cod") or die ("Não foi possivel inserir no Banco!!! :(");

	mysqli_close();

	header("Location:perfil.php");
?>