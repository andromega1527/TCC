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

	$codC = mysqli_query($link, "SELECT Codigo_Cliente FROM cliente");
	$codE = mysqli_query($link, "SELECT Codigo_Estado FROM estado");
	$codCi = mysqli_query($link, "SELECT Codigo_Cidade FROM cidade");
	$aC = mysqli_fetch_array($codC);
	$aE = mysqli_fetch_array($codE);
	$aCi = mysqli_fetch_array($codCi);

	$coddC = end($aC) + 1;
	$coddE = end($aE) + 1;
	$coddCi = end($aCi) + 1;

	$sqlInsertC = "INSERT INTO cliente (Codigo_Cliente, Nome, Sexo, Data_de_Nascimento, CPF, CNPJ, Telefone, Celular, Endereco, CEP, Bairro, Numero, Email) VALUES ('$coddC', '$nome', '$sexo', '$data', '$cpf', '$cnpj', '$telefone', '$celular', '$endereco', '$cep', '$bairro', '$numero', '$email')";

	$sqlInsertE = "INSERT INTO estado (Codigo_Estado, Nome) VALUES ('$coddE', '$estado')";

	$sqlInsertCi = "INSERT INTO cidade (Codigo_Cidade, Nome) VALUES ('$coddCi', '$cidade')";

	mysqli_query($link, $sqlInsertC) or die ("Não foi possivel inserir no Banco C!!! :(");
	mysqli_query($link, $sqlInsertE) or die ("Não foi possivel inserir no Banco E!!! :(");
	mysqli_query($link, $sqlInsertCi) or die ("Não foi possivel inserir no Banco Ci!!! :(");

	echo "Dados cadastrados com sucesso!!! :)";
	echo "<br<br><a href='Cad_Cliente.php'>Voltar</a>";
?>