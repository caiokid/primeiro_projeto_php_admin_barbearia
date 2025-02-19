<?php
ob_start();



date_default_timezone_set('America/Sao_Paulo');




?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel de controle</title>
    <!-- Bootstrap -->
    <link href="<?php echo INCLUDE_PATH ?>/views/templates/css/bootstrap.min.css" rel="stylesheet">
    <link href=" <?php echo INCLUDE_PATH ?>/views/templates/css/admin.css" rel="stylesheet">
  </head>
  <body>
   
    <nav class="navbar navbar-fixed-top navbar-default">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Admin</a>
        </div>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div style="position: relative;top:50px;" class="box">
    <header id="header">
      <div class="container">
          <div class="row">
              <div class="col-md-9">
                <h2> Painel de controle</h2>
              </div>
              <div class="col-md-3">
              </div>
          </div>
      </div>
    </header>