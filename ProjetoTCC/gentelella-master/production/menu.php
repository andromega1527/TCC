<?php 
/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode
simplesmente não fazer o login e digitar na barra de endereço do seu navegador 
o caminho para a página principal do site (sistema), burlando assim a obrigação de 
fazer um login, com isso se ele não estiver feito o login não será criado a session, 
então ao verificar que a session não existe a página redireciona o mesmo
para a index.php.*/
session_start();

if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  header('location:..\TelaLogin\index.php');
}
   
$logado = $_SESSION['login'];
?>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><img src=""><span style="color: white">Calhacas</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="images/img.jpg" alt="..." class="img-circle profile_img">
            </div>

            <div class="profile_info">
              <span>Bem vindo,</span>
              <h2><?php echo $_SESSION['nome']; ?></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Menu <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="index.php">Inicio</a></li>

                    <?php 
                      if ($_SESSION['permissao'] == 'Administrador') {
                        echo '<li><a href="historico.php">Historico de Alteraçoes</a></li>';
                      }
                    ?>
                    
                  </ul>
                </li>
                <li><a><i class="fa fa-edit"></i> Orçamento <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="Relatorio_Orcamento.php">Relatório de Orcamentos</a></li>
                    <li><a href="List_Orcamentos_Ativos.php">Lista de Orçamentos Ativos</a></li>
                    <li><a href="List_Orcamentos.php">Lista de Orçamentos</a></li>
                    <li><a href="Cad_Orcamento.php">Cadastro de Orçamentos</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-child"></i> Cliente <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="Relatorio_Clientes.php">Relatório de Clientes</a></li>
                    <li><a href="List_Clientes.php">Lista de Clientes</a></li>
                    <li><a href="Cad_Cliente.php">Cadastro de Clientes</a></li>
                  </ul>
                </li>

                <?php
                  if ($_SESSION['permissao'] == 'Administrador') {
                    echo '<li><a><i class="fa fa-users"></i> Funcionario <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="List_Funcionarios_Ativos.php">Lista de Funcionarios Ativos</a></li>
                              <li><a href="List_Funcionarios.php">Lista de Funcionarios</a></li>
                              <li><a href="Cad_Funcionario.php">Cadastro de Funcionarios</a></li>
                            </ul>
                          </li>';
                  }
                  
                ?>

                <li><a><i class="fa fa-globe"></i> Estado <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="List_Estados.php">Lista Estados</a></li>
                    <li><a href="Cad_Estado.php">Cadastro de Estados</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-globe"></i> Cidade <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="List_Cidades.php">Lista de Cidades</a></li>
                    <li><a href="Cad_Cidade.php">Cadastro de Cidades</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-money"></i> Preço <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="List_Precos.php">Lista de Preços</a></li>
                    <li><a href="Cad_Preco.php">Cadastro de Preços</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-gift"></i> Produto <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="List_Produtos.php">Lista de Produtos</a></li>
                    <li><a href="Cad_Produto.php">Cadastro de Produtos</a></li>
                  </ul>
                </li>
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
                    
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-arrow-right"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="images/img.jpg" alt=""><?php echo $_SESSION['nome']; ?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="perfil.php"> Perfil</a></li>
                  <li><a href="clo.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                </ul>
              </li>

              <li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                  <span class="badge bg-green">6</span>
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                  <li>
                    <a>
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <div class="text-center">
                      <a>
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->