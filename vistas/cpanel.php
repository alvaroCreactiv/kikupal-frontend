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
                <div class="info">
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
                <li class="treeview active"><a href="panel.php"><i class="fa fa-home"></i> DASHBOARD</a></li>           
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
                
                <li><a href="panel-setting.php" ><i class="fa fa-link"></i><span>Settings</span></a>
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
              </ol>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">             
              <div class="row">
                <div class="col-sm-12">
                  <div class="logo-banner">
                    <figure>
                      <img class="img-responsive" src="<?php echo $url ?>vistas/img/favicons/android-chrome-256x256.png" alt="">
                    </figure>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <h1 class="text-center">KIKUPoints Balance: 
                    <span id="balance"><?php echo $total ; ?></span> </h1>
                  </div>        
                </div>
                <?php 
                $respuesta=ControladorServices::ctrServices();             
                ?>
                <div class="container-fluid estadisticas">
                  <div class="row">
                    <?php 
                    $tab=0;
                    foreach ($respuesta as $key => $value) {
                      $tab=$tab+1;
                      if ($value["cost"]==0) {
                        $cita=" ";
                      }else{
                        $cita=$value["cost"];
                      }


                      echo '<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                      <div class="contorno">
                      <div class="header"> 
                      <p>'.$value["name"].'</p>                      
                      </div>
                      <div class="porta">
                      <figure>
                      <img class="img-responsive" src="'.$url.$value["photo"].'">
                      </figure>
                      </div>
                      <div class="leyend">
                      <p>starts at <span>'.$cita.'  Kikupoints</span></p>
                      </div>
                      <div class="footer">
                      <a href="panel-configuration.php#'.$tab.'a"><button class="btn btn-lg btnServ">
                      Get Help
                      </button></a>
                      </div>

                      </div>
                      </div>
                      '; } ?>                    
                    </div>               
                  </div>

                </section>     
              </div>
              <!-- /.content-wrapper -->


              <div class="control-sidebar-bg"></div>
            </div>
            <!-- ./wrapper -->

            <!-- REQUIRED JS SCRIPTS -->

            <!-- jQuery 3 -->
            <script src="<?php echo $url ?>vistas/bower_components/jquery/dist/jquery.min.js"></script>
            <!-- Bootstrap 3.3.7 -->
            <script src="<?php echo $url ?>vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
            <!-- AdminLTE App -->
            <script src="<?php echo $url ?>vistas/dist/js/adminlte.min.js"></script>

        <!-- Optionally, you can add Slimscroll and FastClick plugins.
        Both of these plugins are recommended to enhance the
        user experience. -->
        <input type="hidden" value="<?php echo $url; ?>" id="rutaOculta"> 
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


