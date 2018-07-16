<?php 

$url=Ruta::ctrRuta();

if(isset($_SESSION["validarSesion"])){
	if ($_SESSION["validarSesion"] == "ok") {

    echo '<script>

    localStorage.setItem("recipient","'.$_SESSION["id_recipient"].'");

    </script>';

    if ($_SESSION["modo"] =="directo") {			

      $respuesta=ControladorRecipients::ctrMostrarRecipientOne($_SESSION["id_recipient"]);
      $total=ControladorPanel::ctrMostrarTotal($respuesta["id_recipient"]);      
      ?>	
      <!DOCTYPE html>
      <html>
      <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Panel | Kikupal</title>

        <?php $url = Ruta::ctrRuta(); ?>


        <link rel="icon" href="<?php echo $url?>vistas/img/favicons/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $url?>vistas/img/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $url?>vistas/img/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $url?>vistas/img/favicons/favicon-16x16.png">
        <link rel="manifest" href="<?php echo $url?>vistas/img/favicons/manifest.json">
        <link rel="mask-icon" href="<?php echo $url?>vistas/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo $url ?>vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo $url ?>vistas/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo $url ?>vistas/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo $url ?>vistas/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo $url ?>vistas/dist/css/skins/skin-blue.min.css">
        <link rel="stylesheet" href="<?php echo $url ?>vistas/css/admin.css">
        <link rel="stylesheet" href="<?php echo $url ?>vistas/css/profile.css">

        <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/sweetalert.css">

        <script src="<?php echo $url; ?>vistas/js/plugins/sweetalert.min.js"></script>

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
      </head>

      <body class="hold-transition skin-blue  layout-boxed">
        <div class="wrapper">
          <header class="main-header">
            <a href="#" class="logo">
              <!-- mini logo for sidebar mini 50x50 pixels -->
              <span class="logo-mini"><?php echo 'vistas/img/favicons/apple-touch-icon.png' ?></span>
              <!-- logo for regular state and mobile devices -->
              <span class="logo-lg"><b>KIKUPAL</b></span>
            </a>              
            <nav class="navbar navbar-static-top" role="navigation">                  
              <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
              </a>                 
            </nav>
          </header>
          <!-- Left side column. contains the logo and sidebar -->
          <aside class="main-sidebar">
            <section class="sidebar">                  
              <div class="user-panel">
                <div class=" image">
                  <?php echo'<img src="'.$url.$respuesta["bphoto"].'" class="img-circle" alt="User Image"> ';?>
                </div>
                <div class=" info">
                  <p><?php echo $respuesta["bFname"].' '.$respuesta["bLname"] ?></p>
                  <!-- Status -->
                  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
                <div class="setting">                  
                  <?php 
                  echo '<a href="'.$url.'close" class="btn btn-default btn-flat">Log out</a>';
                  ?>
                </div>
                <div class="kiku">                  
                  <p>My KikuPoints</p>
                  <span> <?php echo $total; ?> </span>
                </div>
              </div>          
              <ul class="sidebar-menu" data-widget="tree">
                <li><a href="panel.php"><i class="fa fa-home"></i> DASHBOARD</a></li>           
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-gift" aria-hidden="true"></i>
                    <span>Gifts</span>                    
                  </a>
                  <ul class="menus">
                    <li><a href="panel-contributions.php"><i class="fa fa-circle-o"></i> Contributions</a></li>
                  </ul>
                </li>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-link"></i> 
                    <span>Services</span>   
                  </a>
                  <ul class="menus">                    
                    <li><a href="panel-configuration.php"><i class="fa fa-circle-o"></i> <span>Schedule New Service </span></a></li>                    
                    <li><a href="panel-scheduling.php"><i class="fa fa-circle-o"></i> Scheduled</a></li>
                    <li><a href="panel-fulfillments.php"><i class="fa fa-circle-o"></i> Fulfillments</a></li> 
                  </ul>
                </li>
                
                <li class="treeview active"><a href="panel-setting.php" ><i class="fa fa-link"></i><span>Settings</span></a>
                </li> 
              </ul>             
            </section>
          </aside>

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>Recipient<small>Optional description</small></h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Setting</li>
              </ol>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">             
              <div id="perfil">

                <div class="row">

                  <form method="post" enctype="multipart/form-data">

                    <div class="col-md-3 col-sm-4 col-xs-12 text-center">

                      <br>

                      <figure id="imgPerfil">

                        <?php

                        echo '<input type="hidden" value="'.$_SESSION["id_recipient"].'" id="idRecipient" name="idRecipient">
                        <input type="hidden" value="'.$_SESSION["bphoto"].'" name="fotoRecipient" id="fotoRecipient">

                        <input type="hidden" value="'.$_SESSION["bFname"].'" name="nameRecipient" id="nameRecipient">
                        <input type="hidden" value="'.$_SESSION["bLname"].'" name="lNameRecipient" id="lNameRecipient">
                        <input type="hidden" value="'.$_SESSION["bphone"].'" name="phoneRecipient" id="phoneRecipient">
                        <input type="hidden" value="'.$_SESSION["password"].'" name="passRecipient" id="passRecipient">
                        <input type="hidden" value="'.$_SESSION["bdescription"].'" name="descriptionRecipient" id="descriptionRecipient">
                        
                        <input type="hidden" value="'.$_SESSION["direccion"].'" name="direccionRecipient" id="direccionRecipient">
                        <input type="hidden" value="'.$_SESSION["modo"].'" name="modoRecipient" id="modoRecipient">
                        <input type="hidden" value="'. $_SESSION["bemail"].'" name="mailRecipient" id="mailRecipient">';                                            
                        if($_SESSION["modo"] == "directo"){

                          if($_SESSION["bphoto"] != ""){

                            echo '<img src="'.$url.$_SESSION["bphoto"].'" class="img-thumbnail">';

                          }else{

                            echo '<img src="'.$url.'vistas/img/favicons/android-chrome-256x256.png" class="img-thumbnail">';

                          }


                        }else{

                          echo '<img src="'.$url.$_SESSION["bphoto"].'" class="img-thumbnail">';
                        }   

                        ?>

                      </figure>

                      <br>

                      <?php

                      if($_SESSION["modo"] == "directo"){

                        echo '<button type="button" class="btn btn-default form-control" id="btnCambiarFoto">

                        Change Photo

                        </button>';

                      }

                      ?>

                      <div id="subirImagen">

                        <input type="file" class="form-control" id="datosImagen" name="datosImagen">

                        <img class="previsualizar"/>

                      </div>

                    </div>  

                    <div class="col-md-9 col-sm-8 col-xs-12">

                      <br>

                      <?php

                      if($_SESSION["modo"] != "directo"){

                        echo '<label class="control-label text-muted text-uppercase">Nombre:</label>

                        <div class="input-group">

                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control"  value="'.$_SESSION["bFname"].'" readonly>

                        </div>

                        <br>

                        <label class="control-label text-muted text-uppercase">Correo electrónico:</label>

                        <div class="input-group">

                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control"  value="'.$_SESSION["bemail"].'" readonly>

                        </div>

                        <br>

                        <label class="control-label text-muted text-uppercase">Modo de registro en el sistema:</label>

                        <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-'.$_SESSION["modo"].'"></i></span>
                        <input type="text" class="form-control text-uppercase"  value="'.$_SESSION["modo"].'" readonly>

                        </div>

                        <br>';


                      }else{

                        echo '
                        <div class="row">
                        <div class="col-sm-6">
                        <label class="control-label text-muted text-uppercase" for="editarNombre">Edit name:</label>

                        <div class="input-group">

                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" id="editarNombre" name="editarNombre" value="'.$_SESSION["bFname"].'" >
                        </div>
                        </div>

                        <div class="col-sm-6">
                        <label class="control-label text-muted text-uppercase" for="editarLastname">Edit Last Name:</label>

                        <div class="input-group">

                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" id="editarLastname" name="editarLastname" value="'.$_SESSION["bLname"].'" >

                        </div>
                        </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="col-sm-6">
                        <label class="control-label text-muted text-uppercase" for="editarEmail">Email cannot be changed:</label>

                        <div class="input-group">

                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input type="text" class="form-control" id="editarEmail" name="editarEmail" value="'.$_SESSION["bemail"].'" readonly>

                        </div>
                        </div>                    
                        <div class="col-sm-6">
                        <label class="control-label text-muted text-uppercase" for="editarPhone">Edit Telephone Number:</label>

                        <div class="input-group">

                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                        <input type="text" class="form-control" id="editarPhone" name="editarPhone" value="'.$_SESSION["bphone"].'" >

                        </div>
                        </div> 
                        </div> 
                        <br>
                        <div class="row">
                        <div class="col-sm-6">
                        <label class="control-label text-muted text-uppercase" for="editarDireccion">Edit Address:</label>

                        <div class="input-group">

                        <span class="input-group-addon"><i class="glyphicon glyphicon-pushpin"></i></span>
                        <input type="text" class="form-control" id="editarDireccion" name="editarDireccion" placeholder="Enter the new address" value="'.$_SESSION["direccion"].'">

                        </div>
                        </div>                  
                        <div class="col-sm-6">
                        <label class="control-label text-muted text-uppercase" for="editarPassword">Change Password:</label>

                        <div class="input-group">

                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="text" class="form-control" id="editarPassword" name="editarPassword" placeholder="Enter the new password">

                        </div>
                        </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="col-sm-12">
                        <label class="control-label text-muted text-uppercase" for="editarDescription">Edit Description:</label>

                        <div class="input-group">

                        <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                        <textarea class="form-control" name="editarDescription" id="editarDescription" cols="20" rows="10">'.$_SESSION["bdescription"].'
                        </textarea>                        
                        </div>
                        </div>                  
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary btn-md pull-left">Update data</button>';

                      }

                      ?>

                    </div>    

                    <?php 
                    $actualizarPerfil= new ControladorRecipients();
                    $actualizarPerfil->ctrActualizarPerfil();                 
                    ?>                

                  </form>


                </div>

              </div>
            </section>     
          </div>
          <!-- /.content-wrapper -->

          <div class="control-sidebar-bg"></div>
        </div>
        <input type="hidden" value="<?php echo $url; ?>" id="rutaOculta">

        <!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->

        <!-- jQuery 3 -->
        <script src="<?php echo $url ?>vistas/bower_components/jquery/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo $url ?>vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo $url ?>vistas/dist/js/adminlte.min.js"></script>
        <script src="<?php echo $url; ?>vistas/js/recipients.js"></script>
        <!-- Optionally, you can add Slimscroll and FastClick plugins.
        Both of these plugins are recommended to enhance the
        user experience. -->

      </body>
      </html>
      <?php 
    }
  }
}else{
  echo '<script>
  window.location="'.$url.'";
  </script>';
  exit();
}
?>


