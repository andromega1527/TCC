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
                
        		<label>Funcionário:</label>
                <select name="funcionario" id="combo_left">
        			<option>Selecione</option>

                    <?php
                        require("ConectBD.php");

                        $resultado = mysqli_query($link, "SELECT Codigo_Funcionario, Nome FROM Funcionario");

                        while($cont = mysqli_fetch_array($resultado)) {
                            $cod = $cont['Codigo_Funcionario'];
                            $nome = $cont['Nome'];
                    ?>

                    <option value="<?php echo $cod; ?>"><?php echo $nome; ?></option>

                    <?php } ?>

                    ?>
        		</select><br><br>

        		<label>Data de Emissão:</label><input id="alinhar" placeholder="Data de Emissão" type="date" name="data" size="31"><br><br>

        		<label>Hora de Emissão:</label><input id="alinhar" placeholder="Hora de Emissão" type="date" name="hora" size="31"><br><br>

        		<label>Desconto:</label><input id="alinhar" placeholder="Desconto" type="text" name="desconto" size="31"><br><br>

        		<label>SubTotal:</label><input id="alinhar" placeholder="SubTotal" type="text" name="subT" size="31"><br><br>

        		<label>Total Geral:</label><input id="alinhar" placeholder="Total Geral" type="text" name="total" size="31"><br><br>

                <h3>Detalhes do Orçamento</h3>

                <table>
                    <thead>
                        <tr>
                            <td>Produto</td>
                            <td>Quantidade</td>
                        </tr>
                    </thead>

                    <tbody>

                    </tbody>
                </table><br>

                <b><a style="color: black" href="#" class="btn-modal">Adicionar Produtos</a></b><br><br>

        		<input type="submit" name="cadastrar" value="Cadastrar"><br><br><br>

        	</form>

            <!-- -------------------------------------- Começo da Janela -------------------------------------- -->

                <div id="modal">
                    <div class="modal-box">
                        <div id="borda">
                            <div class="fechar"><b style="color: black">X</b></div>
                        </div>
                        <div id="formulario">
                            <h3>Adicionar Produtos</h3><br><br>

                            <div class="modal-box-conteudo">
                                <form method="Post" action="" name="formulario">
                                    <label>Produto</label>
                                    <select name="produto" id="combo_orc" id="combo_left">
                                        <option>Selecione</option>

                                        <?php
                                            require("ConectBD.php");

                                            $resultado = mysqli_query($link, "SELECT Codigo_Produto, Descricao FROM Produto");

                                            while($cont = mysqli_fetch_array($resultado)) {
                                                $cod = $cont['Codigo_Descricao'];
                                                $descricao = $cont['Descricao'];
                                        ?>

                                        <option value="<?php echo $cod; ?>"><?php echo $descricao; ?></option>

                                        <?php } ?>

                                        ?>
                                    </select><br><br>

                                    <label>Quantidade</label><input placeholder="20" type="text" name="nome" size="" id="alinhar_combo" type="text" name="quantidade"><br><br>

                                    <b><a style="color: black" href="#">Cadastrar</a></b>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- -------------------------------------- Final da Janela -------------------------------------- -->
        </div>

<?php
	require "script.php";
?>
<script src="js2\jquery-3.3.1.js"></script>
<script src="js2\mainModal.js"></script>


</body>
</html>