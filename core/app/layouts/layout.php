<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Web Confección</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-dashboard.css" rel="stylesheet"/>
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/<?php echo (isset($_SESSION['user']) && isset($_GET['view']))? $_GET['view'] : 'login' ?>-style.css">
  </head>
  <body>
    <?php if(isset($_SESSION["user"])):?>
    <div class="fullContainer">
      <?php if(isset($_COOKIE['alert'])){ //SI HAY COOKIE 'ALERT' ## INICIO ##
          $alert = $_COOKIE['alert'];
        ?>
        <div class="alert text-center <?php echo (isset($_GET['alertype'])) ? $_GET['alertype'] :'alert-success' ?>" id="alert">
          <strong><?php echo $alert ?>.</strong>
        </div>
      <?php  } ?> <!-- SI HAY COOKIE 'ALERT' MUESTRESE ## FIN ## -->
      <header>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <ul class="nav navbar-nav navbar-center">
                <?php 
                  $listView=["","home", "bonding-fullForm", "noConformes-form", "codigos-form", "hilos-set", "sesgos-form", "user-newPassForm", "sm-requests"];
                  if(array_search($_GET['view'], $listView) != false){
                ?>                  
                <li><a href="./index.php?view=home"><span>INICIO</span></a></li>
                <li><a href="./index.php?view=bonding-fullForm"><span> TEST BONDING</span></a></li>
                <!-- <li><a href="<?php echo (Core::$user->Nombre == 'consulta')? './index.php?view=noConformes-listadoNC' : './index.php?view=noConformes-form' ?>"><span> NO CONFORMES</span></a></li> -->
                <li><a href="./index.php?view=codigos-form"><span> CÓDIGOS </span> </a></li>
                <!-- <li><a href="<?php echo (Core::$user->Nombre == 'consulta')? './index.php?view=hilos-listado' : './index.php?view=hilos-set' ?>"><span> AJUSTE HILOS </span> </a></li> -->
                <!-- <li><a href="<?php echo (Core::$user->Nombre == 'consulta')? './index.php?view=sesgos-listado' : './index.php?view=sesgos-form' ?>"><span> SESGOS/ELÁSTICOS</span></a></li> -->
                  <?php //if(isset($user->plant_id)){ ?><li><a href="./index.php?view=sm-requests"> <span>SOLICITUDES MARCE</span> </a></li><?php //} ?>
                <?php } ?>
              </ul>
            </div>
            <div id="navbar-collapse" class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                      <a id="user-profile" href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo Core::$user->Nombre ?></a>
                      <ul class="dropdown-menu dropdown-block" role="menu">
                        <?php if(Core::$user->Nombre != "consulta"){ ?> <li><a href="./index.php?view=user-newPassForm"><i class="fa fa-cogs"></i> CONFIGURACIÓN</a></li><?php } ?>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out"></i> SALIR</a></li>
                      </ul>
                  </li>
              </ul>
            </div>
          </div>
        </nav>
        <?php if( $_GET['view'] == 'home'){ ?>
        <div class="text-nav">
          <h1 class="title"> WEB DE INFORMACIÓN DE CONFECCIÓN</h1>
        </div>
        <?php }?>
      </header>
      <div class="content">
          <?php
              // puedo cargar otras funciones iniciales
              // dentro de la funcion donde cargo la vista actual
              // como por ejemplo cargar el corte actual
              View::load("login");
          ?>
      </div>
    </div>
    <?php else:?>
      <?php 
      View::load("login");
    endif;?>
  </body>
  <!--   Core JS Files   -->
  <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/material.min.js" type="text/javascript"></script>
  <script src="assets/js/bootstrap-notify.js"></script>
  <script src="assets/js/material-dashboard.js"></script>
  <script type="text/javascript" src="assets/js/script.js"></script>
  <script type="text/javascript" src="assets/js/<?php echo (isset($_SESSION['user']) && isset($_GET['view']))? $_GET['view'] : '' ?>-script.js"></script>
  <script>
      $(document).ready(function() {
        $("#alert").delay(2000).slideUp(500, function() {
          $(this).alert('close');
        });
      });
  </script>
</html>
