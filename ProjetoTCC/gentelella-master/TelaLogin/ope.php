<?php 
// session_start inicia a sessão
session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
$login = $_POST['login'];
$senha = $_POST['senha'];
// as próximas 3 linhas são responsáveis em se conectar com o bando de dados.
require("ConectBD.php");
 
// A variavel $result pega as varias $login e $senha, faz uma 
//pesquisa na tabela de usuarios
$result = mysqli_query($link, "SELECT * FROM Funcionario WHERE Email = '$login' AND Senha = '$senha' AND Status = 'Ativo'") or die ("Imcompativel!!!");

while ($cont = mysqli_fetch_array($result)) {
	$cod = $cont['Codigo_Funcionario'];
	$nome = $cont['Nome'];
	$cpf = $cont['CPF'];
	$sexo = $cont['Sexo'];
	$telefone = $cont['Telefone'];
	$celular = $cont['Celular'];
	$endereco = $cont['Endereco'];
	$cep = $cont['CEP'];
	$bairro = $cont['Bairro'];
	$numero = $cont['Numero'];
	$email = $cont['Email'];
	$senha = $cont['Senha'];
	$status = $cont['Status'];
	$permissao = $cont['Permissao'];
}
/* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi 
bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor
será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do 
resultado ele redirecionará para a página site.php ou retornara  para a página 
do formulário inicial para que se possa tentar novamente realizar o login */

if(mysqli_num_rows ($result) > 0 )
{
	$_SESSION['login'] = $login;
	$_SESSION['senha'] = $senha;
	$_SESSION['cod'] = $cod;
	$_SESSION['nome'] = $nome;
	$_SESSION['cpf'] = $cpf;
	$_SESSION['sexo'] = $sexo;
	$_SESSION['telefone'] = $telefone;
	$_SESSION['celular'] = $celular;
	$_SESSION['endereco'] = $endereco;
	$_SESSION['cep'] = $cep;
	$_SESSION['bairro'] = $bairro;
	$_SESSION['numero'] = $numero;
	$_SESSION['status'] = $status;
	$_SESSION['permissao'] = $permissao;


	// Registro -------------------------------------------------------------------
	// ----------------------------------------------------------------------------
	session_start();

	$funcionario = $_SESSION['cod'];
	$data = date('d/m/Y');
	$descricao = "Usuario " . $_SESSION['nome'] . " logou";

	mysqli_query($link, "INSERT INTO Registro (Funcionario, Data, Descricao) VALUES ('$funcionario', '$data', '$descricao')") or die ("Erro ao cadastrar Registro!!!");
	// ----------------------------------------------------------------------------
	// ----------------------------------------------------------------------------


	header('location:..\production\index.php');
}
else{
  	unset ($_SESSION['login']);
  	unset ($_SESSION['senha']);
  	header('location:index.php');
   
  }
?>