<?php
	$status = $_POST['status'];
	$cliente = $_POST['cliente'];
	$funcionario = $_POST['funcionario'];
	$data = $_POST['data'];
	$hora = $_POST['hora'];
	$desconto = $_POST['desconto'];

	require("ConectBD.php");

	$cod = mysqli_query($link, "SELECT Codigo_Orcamento FROM Orcamento");

	$sqlInsert = "INSERT INTO Orcamento (Status, Cliente, Funcionario, Data_Emissao, Hora_Emissao, Desconto) VALUES ('$status', '$cliente', '$funcionario', '$data', '$hora', '$desconto')";

	mysqli_query($link, $sqlInsert) or die ("Não foi possivel inserir no Banco!!! :(");

	$codO = mysqli_query($link, "SELECT Codigo_Orcamento FROM Orcamento");
	while ($cont = mysqli_fetch_array($codO)) {
		print_r($cont);
		$codOF = end($cont);
	}
	
	


	// Registro --------------------------------------------------------------------
    // ----------------------------------------------------------------------------
    session_start();

    $funcionario = $_SESSION['cod'];
    $data = date('d/m/Y');
    $descricao = "Dados cadastrados na tabela: Orcamento";

    mysqli_query($link, "INSERT INTO Registro (Funcionario, Data, Descricao) VALUES ('$funcionario', '$data', '$descricao')") or die ("Erro ao cadastrar Registro!!!");
    // ----------------------------------------------------------------------------
    // ----------------------------------------------------------------------------


	mysqli_close();

	header("Location:Cad_Orcamento_Detalhes.php?cod=$codOF");
?>