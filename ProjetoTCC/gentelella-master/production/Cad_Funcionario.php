<!DOCTYPE html>
<html>
<head>
    <html lang="pt">
    <meta charset="utf-8" />
    <title>Cadastro de Funcionários</title>

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
        	<h1>Cadastro de Funcionários</h1><br><br>

        	<form action="Res_Cad_Funcionario.php" method="Post" name="formulario">

        		<label>Nome/Ultimo*</label><input id="alinhar" placeholder="Robsom Marques" type="text" name="nome" size="31"><br><br>

        		<label>Sexo*</label><input id="alinhar" placeholder="Masculino/Feminino" type="text" name="sexo" size="31"><br><br>

        		<label>CPF*</label><input id="alinhar" placeholder="432.040.080-10" type="text" name="cpf" size="31"><br><br>

                <label>Telefone*</label><input id="alinhar" placeholder="(79)99219-4620" type="text" name="telefone" size="31"><br><br>

                <label>Celular*</label><input id="alinhar" placeholder="(79)3704-4267" type="text" name="celular" size="31"><br><br>

                <label>CEP*</label><input id="alinhar" placeholder="49087-548" type="text" name="cep" size="31"><br><br>

                <label>Endereço*</label><input id="alinhar" placeholder="Rua Santos Dumont II" type="text" name="endereco" size="31"><br><br>

                <label>Bairro*</label><input id="alinhar" placeholder="São Marco" type="text" name="bairro" size="31"><br><br>

                <label>Número*</label><input id="alinhar" placeholder="100" type="text" name="num" size="31"><br><br>

                <label>e-mail/login*</label><input id="alinhar" placeholder="salinasleonardo@live.com" type="text" name="email" size="31"><br><br>

                <label>Senha*</label><input id="alinhar" placeholder="100" type="text" name="senha" size="31"><br><br>

                <label>Permissão*</label>
                <select name="permissao" id="combo_left">
                    <option>Selecione</option>
                    <option value="Usuario">Usuário</option>
                    <option value="Administrador">Administrador</option>
                </select><br><br>

                <label>Status*</label>
                <select name="status" id="combo_left">
                    <option>Selecione</option>
                    <option value="Ativo">Ativo</option>
                    <option value="Desativo">Desativo</option>
                </select><br><br>

        		<input type="submit" name="cadastrar" value="Cadastrar"><br><br><br>

        	</form>
        </div>

    <?php
        require "script.php";
    ?>
    
</body>
</html>