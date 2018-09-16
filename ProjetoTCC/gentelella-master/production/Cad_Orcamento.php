<!DOCTYPE html>
<html>
<head>
    <html lang="pt">
    <meta charset="utf-8" />
    <title>Cadastro de Orçamentos</title>

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
        	<h1>Cadastro de Orçamentos</h1><br><br>

        	<form action="Res_Cad_Orcamento.php" method="Post" name="formulario">

        		<label>Status:</label>
                <select name="status" id="combo_left">
                    <option>Selecione</option>
                    <option value="Ativo">Ativo</option>
                    <option value="Desativo">Desativo</option>
                </select><br><br>

        		<label>Cliente:</label>
                <select name="cliente" id="combo_left">
                    <option>Selecione</option>

                    <?php
                        require("ConectBD.php");

                        $resultado = mysqli_query($link, "SELECT Codigo_Cliente, Nome FROM Cliente");

                        while($cont = mysqli_fetch_array($resultado)) {
                            $cod = $cont['Codigo_Cliente'];
                            $nome = $cont['Nome'];
                    ?>

                    <option value="<?php echo $cod; ?>"><?php echo $nome; ?></option>

                    <?php } ?>

                    ?>

        		</select><br><br>
                
        		<input type="hidden" name="funcionario" value="<?php echo $_SESSION['cod']; ?>">

        		<label>Data de Emissão:</label><input id="alinhar" placeholder="Data de Emissão" type="date" name="data" size="31"><br><br>

        		<label>Hora de Emissão:</label><input id="alinhar" placeholder="Hora de Emissão" type="date" name="hora" size="31"><br><br>

        		<label>Desconto:</label><input id="alinhar" placeholder="Desconto" type="text" name="desconto" size="31"><br><br>

        		<input type="submit" name="cadastrar" value="Cadastrar"><br><br><br>

        	</form>

        </div>

<?php
	require "script.php";
?>
<script src="js2\mainModal.js"></script>


</body>
</html>