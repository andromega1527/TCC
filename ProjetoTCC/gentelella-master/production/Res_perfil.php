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
	$status = $_POST['status'];
	$permissao = $_POST['permissao'];

	/* Conexão */
	require("ConectBD.php");


	// Registro --------------------------------------------------------------------
	// ----------------------------------------------------------------------------
	session_start();

	$sqlSelect = "SELECT * FROM Funcionario WHERE Codigo_Funcionario = '$cod'";

	$resultado = mysqli_query($link, $sqlSelect);

	while ($cont = mysqli_fetch_array($resultado)) {
		$nomeR = $cont['Nome'];
	}

	$funcionario = $_SESSION['cod'];
	$data = date('d/m/Y');
	$campo = $nomeR;
	$descricao = "Dados alterados na tabela: Funcionario, Nome: $campo";

	mysqli_query($link, "INSERT INTO Registro (Funcionario, Data, Descricao) VALUES ('$funcionario', '$data', '$descricao')") or die ("Erro ao cadastrar Registro!!!");
	// ----------------------------------------------------------------------------
	// ----------------------------------------------------------------------------


	mysqli_query($link, "UPDATE Funcionario SET Nome = '$nome', Sexo = '$sexo', CPF = '$cpf', Telefone = '$telefone', Celular = ' $celular', Endereco = '$endereco', CEP = '$cep', Bairro = '$bairro', Numero = '$numero', Email = '$email', Senha = '$senha', Status = '$status', Permissao = '$permissao' WHERE Codigo_Funcionario = $cod") or die ("Não foi possivel inserir no Banco!!! :(");

	mysqli_close();

	header("Location:List_Funcionarios.php");
?>