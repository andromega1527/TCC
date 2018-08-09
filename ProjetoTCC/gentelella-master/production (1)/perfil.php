<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css2\main.css">
	

  <title>Calhacas</title>

  <?php
    require "link.php";
  ?>

  </head>

  <?php
    require "menu.php";
  ?>
    
  <div id="lista">
    <h1>Perfil</h1><br>

    <div class="col-md-8 col-md-offset-4 col-sm-12"> <button type="button" data-ng-click="changeEmail()" class="btn btn-default display-xs-block" data-ng-disabled="loadingEmail == true">Alterar e-mail</button>&nbsp; <button type="button" data-ng-click="changePassword()" class="btn btn-default display-xs-block" data-ng-disabled="loadingPassword == true">Alterar senha</button> </div>
  <?php
    require "script.php";
  ?>

  </body>
</html>
