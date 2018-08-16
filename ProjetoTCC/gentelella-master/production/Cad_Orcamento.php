<!DOCTYPE html>
<html>
<head>
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
    
    <div id="formulario">
    	<h1>Cadastro de Orçamentos</h1>

    	<form action="Res_Cad_Orcamento.php" method="Post" name="formulario">

    		Status: <input type="text" name="status"><br>

    		Cliente: <input type="text" name="cliente">
            <select>
    			
    		</select><br>

    		Funcionário: <input type="text" name="funcionario">
            <select>
    			
    		</select><br>

    		Data de Emissão: <input type="text" name="data"><br>

    		Hora de Emissão: <input type="text" name="hora"><br>

    		Desconto: <input type="text" name="desconto"><br>

    		Parcelamento: <input type="text" name="parcelamento"><br>

    		SubTotal: <input type="text" name="subT"><br>

    		Total Geral: <input type="text" name="total"><br><br>

    		<input type="submit" name="cadastrar" value="Cadastrar">

    	</form>
    </div>

<?php
	require "script.php";
?>
</body>
</html>