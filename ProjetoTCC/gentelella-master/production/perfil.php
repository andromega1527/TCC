<?php
  require('ConectBD.php');

  session_start();

  $cod = $_SESSION["cod"];

  $sqlSelect = "SELECT * FROM Funcionario WHERE Codigo_Funcionario = '$cod'";

  $resultado = mysqli_query($link, $sqlSelect);

  while ($cont = mysqli_fetch_array($resultado)) {
    $nome = $cont['Nome'];
    $sexo = $cont['Sexo'];
    $cpf = $cont['CPF'];
    $telefone = $cont['Telefone'];
    $celular = $cont['Celular'];
    $endereco = $cont['Endereco'];
    $cep = $cont['CEP'];
    $bairro = $cont['Bairro'];
    $numero = $cont['Numero'];
    $login = $cont['Email'];
    $senha = $cont['Senha'];
  }
?>
<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	

  <title>Calhacas</title>

  <?php
    require "link.php";
  ?>
  <link rel="stylesheet" type="text/css" href="css2\main.css">

  </head>

  <?php
    require "menu.php";

  ?>

  <div class="right_col" role="main">  
    <div id="formulario">
      <h1>Perfil</h1><br>

      <form action="Res_perfil.php" method="Post" name="formulario">
        <input type="hidden" name="cod" value="<?php echo $cod; ?>">

        <label>Nome:</label><input id="alinhar" size="31" type="text" name="nome" value="<?php echo $nome; ?>"><br><br>

        <label>Sexo:</label><input id="alinhar" size="31" type="text" name="sexo" value="<?php echo $sexo; ?>"><br><br>

        <label>CPF:</label><input id="alinhar" size="31" type="text" name="cpf" value="<?php echo $cpf; ?>"><br><br>

        <label>Telefone:</label><input id="alinhar" size="31" type="text" name="telefone" value="<?php echo $telefone; ?>"><br><br>

        <label>Celular:</label><input id="alinhar" size="31" type="text" name="celular" value="<?php echo $celular; ?>"><br><br>

        <label>Endereço:</label><input id="alinhar" size="31" type="text" name="endereco" value="<?php echo $endereco; ?>"><br><br>

        <label>CEP:</label><input id="alinhar" size="31" type="text" name="cep" value="<?php echo $cep; ?>"><br><br>

        <label>Bairro:</label><input id="alinhar" size="31" type="text" name="bairro" value="<?php echo $bairro; ?>"><br><br>

        <label>Número:</label><input id="alinhar" size="31" type="text" name="num" value="<?php echo $numero; ?>"><br><br>

        <label>Email:</label><input id="alinhar" size="31" type="text" name="email" value="<?php echo $login; ?>"><br><br>

        <label>Senha:</label><input id="alinhar" size="31" type="text" name="senha" value="<?php echo $senha; ?>"><br><br>

        <input type="submit" name="Atualizar" value="Atualizar"><br><br><br>

        </form>

    <?php
      require "script.php";
    ?>

  </body>
</html>
