<?php 

$url=Ruta::ctrRuta();

if(isset($_SESSION["validarSesion"])){
	if ($_SESSION["validarSesion"] == "ok") 
  {

    echo '<script>

    localStorage.setItem("recipient","'.$_SESSION["id_recipient"].'");

    </script>';

    if ($_SESSION["modo"] =="directo") 
    {			

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
        <!-- jQuery 3 -->      

        <link rel="stylesheet" href="<?php echo $url ?>vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo $url ?>vistas/bower_components/font-awesome/css/font-awesome.min.css">

        <link rel="stylesheet" href="<?php echo $url ?>vistas/bower_components/datatables/dataTables.bootstrap.css">

        <link  rel="stylesheet" href="<?php echo $url ?>vistas/css/plugins/datepicker3.css">

        <link  rel="stylesheet" href="<?php echo $url ?>vistas/css/plugins/bootstrap-timepicker.min.css">

        <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/sweetalert.css">

        <script src="<?php echo $url; ?>vistas/js/plugins/sweetalert.min.js"></script>

        <!-- Theme style-->
        <link rel="stylesheet" href="<?php echo $url ?>vistas/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo $url ?>vistas/dist/css/skins/skin-blue.min.css">
        <link rel="stylesheet" href="<?php echo $url ?>vistas/css/admin.css">

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
                <li >
                  <a href="#">
                    <i class="fa fa-gift" aria-hidden="true"></i>
                    <span>Gifts</span>                    
                  </a>
                  <ul class="menus">
                    <li><a href="panel-contributions.php"><i class="fa fa-circle-o"></i> Contributions</a></li>
                  </ul>
                </li>
                <li class="treeview active">
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
                <li class="active">Contributions</li>
              </ol>
            </section>

            <!-- Main content -->
            <section class="content">
              <div class="row">
                <div class="col-xs-12">                  
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">SCHEDULING</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      
                      <hr>
                      <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead>
                          <tr>
                            <th>Service</th>
                            <th>Scheduled Date</th>
                            <th>Scheduled Time</th>
                            <th>Amount</th>
                            <th>Provider</th>
                            <th>Edit</th>         
                          </tr>
                        </thead>
                        <tbody>

                          <?php                   
                          $scheduled=ControladorServices::ctrMostrarScheduled($_SESSION["id_recipient"]);                       
                          if($scheduled!=null){
                            foreach ($scheduled as $key => $value) {
                              echo ' 
                              <tr>
                              <td>'.$value["name"].'</td>
                              <td>'.$value["fecha"].'</td>
                              <td>'.$value["hora"].'</td>
                              <td>'.$value["amount"].'</td>
                              <td>'.$value["companyName"].'</td>
                              <td>Edit</td>
                              </tr>
                              ';}
                            } ?>
                          </tbody>
                          
                        </table>
                      </div>
                      <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </section>
            </div>
            <!-- /.content-wrapper -->

            <div class="control-sidebar-bg"></div>
          </div>


          <div id="modalNewSchedule" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <form method="post" onsubmit="return registroServices()">
                <?php  echo' <input type="hidden" name="idRecipient" id="idRecipient" value="'.$_SESSION["id_recipient"].'">'; ?>
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">Schedule New Service</h2>
                    <h4 class="modal-subtitle">Please use the form below to schedule a service</h4>
                  </div>
                  <div class="modal-body">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="board">
                          <div class="board-inner">
                            <ul class="nav nav-tabs" id="myTab">
                              <div class="liner"></div>
                              <li class="active">
                                <a href="#profile" data-toggle="tab" title="profile" aria-expanded="false">
                                  <span class="round-tabs two">
                                    <i class="glyphicon glyphicon-tasks"></i>
                                    Service Request
                                  </span>
                                </a>
                              </li>                        
                            </ul>
                          </div>
                          <?php   
                          $respuesta2=ControladorServices::ctrServices();                  
                          ?>
                          <div class="tab-content">
                            <div class="tab-pane fade active in" id="profile">
                              <div class="row">                            
                                <div class="col-sm-4 col-xs-12">
                                  <div class="form-group">
                                    <label for="sel1">Service Type:</label>
                                    <select class="form-control" id="sel1" name="sel1">
                                      <?php   
                                      foreach ($respuesta2 as $key => $value) {        
                                        echo'<option>'.$value["name"].'</option> ';
                                      }
                                      ?>
                                    </select>
                                  </div> 
                                </div>
                                <div class="col-sm-8 col-xs-12">
                                  <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                      <label>Service Date:</label>
                                      <div class="input-group date" id="fechaHora">
                                        <input type="text" name="fecha" id="fecha" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-6 col-xs-12">
                                    <div class="bootstrap-timepicker">
                                      <div class="form-group">
                                        <label>Service Time:</label>

                                        <div class="input-group">
                                          <input type="text" name="hora" class="form-control timepicker">

                                          <div class="input-group-addon">
                                            <i class="glyphicon glyphicon-time"></i>
                                          </div>
                                        </div>
                                        <!-- /.input group -->
                                      </div>
                                      <!-- /.form group -->
                                    </div>
                                  </div> 
                                </div>
                              </div>
                              <div class="row"> 
                                <div class="col-sm-12"> 
                                  <div class="form-group"> 
                                    <label class="form-control-label"> Comments:
                                    </label>
                                    <textarea class="comment clearfix" name="comment"></textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <?php 
                    $serv= new ControladorServices();
                    $serv -> ctrRegisterService();              
                    ?>
                    <button type="submit" class="btn btn-primary pull-left" name="send">Send Request</button>

                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>              
                  </div>
                </div>
              </form>
            </div>
          </div>


          <input type="hidden" value="<?php echo $url; ?>" id="rutaOculta">

          <!-- ./wrapper -->
          <script src="<?php echo $url ?>vistas/bower_components/jquery/jquery.min.js"></script>
          <!-- REQUIRED JS SCRIPTS -->
          <script src="<?php echo $url ?>vistas/bower_components/datatables/jquery.dataTables.min.js"></script>

          <script src="<?php echo $url ?>vistas/bower_components/datatables/dataTables.bootstrap.min.js"></script>

          <!-- Bootstrap 3.3.7 -->
          <script src="<?php echo $url ?>vistas/bower_components/bootstrap/js/bootstrap.min.js"></script>
          <script src="<?php echo $url ?>vistas/dist/js/adminlte.min.js"></script>

          <script src="<?php echo $url ?>vistas/js/plugins/bootstrap-datepicker.js"></script> 

          <script src="<?php echo $url ?>vistas/js/plugins/bootstrap-timepicker.min.js"></script> 
          


          <!-- AdminLTE App --> 

          <script>  
            $(function () {             
               $("#example1").DataTable({
              "scrollX": true
            });        
            });      
          </script>
        </body>
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
