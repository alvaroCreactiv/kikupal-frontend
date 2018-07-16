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

        <link rel="stylesheet" href="<?php echo $url ?>vistas/bower_components/datatables/dataTables.bootstrap.css">
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
                  <p id="recipient"><?php echo $respuesta["bFname"].' '.$respuesta["bLname"] ?></p>
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
                <li><a href="<?php echo $url ?>panel.php"><i class="fa fa-home"></i> DASHBOARD</a></li>           
                <li class="treeview active">
                  <a href="#">
                    <i class="fa fa-gift" aria-hidden="true"></i>
                    <span>Gifts</span>                    
                  </a>
                  <ul class="menus">
                    <li><a href="panel-contributions.php"><i class="fa fa-circle-o"></i> Contributions</a></li>
                  </ul>
                </li>
                <li>
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
                      <h3 class="box-title">CONTRIBUTIONS</h3>
                      <div class="row">
                        <div class="col-sm-12">
                          <h1 class="text-center">KIKUPoints Balance: <?php echo $total; ?> </h1>
                        </div>        
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead>
                          <tr>
                            <th>Contributor</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Amount</th>
                            <th>Thanks</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php                   
                          $gift=ControladorPanel::ctrMostrargifts($_SESSION["id_recipient"]); 
                          $destino=($gift[0]["bemail"]);                          
                          echo'<span style="display:none;" id="destino">'.$destino.'</span>'; 
                          if($gift!=null){
                            foreach ($gift as $key => $value) {                              
                              if ($value["cFname"]=="Anonimous") {

                                $thankYou ="";

                              }else{

                               $thankYou="<a id='rate' class='' data-toggle='modal' href='#ModalThanks' data-id='".$value["id"]."'>Send Thanks</a>";
                             }
                             echo '
                             <tr>
                             <td><span id="firstname'.$value['id'].'">'.$value["cFname"].' '.$value["cLname"].'</span></td>
                             <td><span id="email'.$value['id'].'">'.$value["cemail"].'</span></td>
                             <td><span id="phone'.$value['id'].'">'.$value["cphone"].'</span></td>
                             <td><span id="kikuponits'.$value['id'].'">'.$value["kikupoints"].'</span></td>
                             <td><span id="thank'.$value['id'].'">'.$thankYou.'</span></td>
                             </tr>
                             ';
                             
                           }  
                         }
                         ?>                
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


         <div class="modal fade modalThanks" id="ModalThanks"  role="dialog">
          <div class="modal-dialog modal-content">

           <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
             <h2 class="modal-title">Send a thank You Note:</h2>      
           </div>

           <div class="modal-body">

             <div class="container-fluid">

               <form method="post">
                <input type="hidden" name="idthank" id="idthank"/>
                <input type="hidden" name="origen" id="origen"/>
                <input type="hidden" name="destination" id="destination"/>
                <div class="row">
                 <h4 class="modal-subtitle">A tittle thanks goes a long way. Use this form to send a thanks you letter to the contributor.</h4>
                 <div class="col-sm-12">
                  <h2 id="efirstname"></h2>


                  <div class="">
                   <textarea name="message" id="message" rows="1" placeholder="...Enter personzalized Message...">Thank you for your gift made on my KIKUPAL Help Fund</textarea>
                 </div>
                 <span>Sincerely</span>
                 <p><strong id="sendRecip"></strong></p>
               </div>
             </div>
             <button type="submit" name="thanks" class="btn btn-primary pull-right" >Send</button>    
             <?php 
             $tha= new ControladorRecipients();
             $tha->ctrSendThanks();
             ?>                             
           </form>  
         </div>                                                     

       </div>
     </div>
   </div>



   <div class="control-sidebar-bg"></div>
 </div>

 <input type="hidden" value="<?php echo $url; ?>" id="rutaOculta">

 <!-- ./wrapper -->

 <!-- jQuery 3 -->

 <script src="<?php echo $url ?>vistas/bower_components/jquery/jquery.min.js"></script>
 <!-- REQUIRED JS SCRIPTS -->
 <script src="<?php echo $url ?>vistas/bower_components/datatables/jquery.dataTables.min.js"></script>

 <script src="<?php echo $url ?>vistas/bower_components/datatables/dataTables.bootstrap.min.js"></script>




 <!-- Bootstrap 3.3.7 -->
 <script src="<?php echo $url ?>vistas/bower_components/bootstrap/js/bootstrap.min.js"></script>


 <!-- AdminLTE App --> 
 <script src="<?php echo $url ?>vistas/dist/js/adminlte.min.js"></script>
 <script src="<?php echo $url; ?>vistas/js/recipients.js"></script>       
 <script>
  $(function(){           
   $("#example1").DataTable({
    "scrollX": true
  });     

   $('#ModalThanks').on('show.bs.modal', function(e) {   
     var id = $(e.relatedTarget).data().id;
     $(e.currentTarget).find('#idthank').val(id);

     var first=$('#firstname'+id).text();
     var recipient=$('#recipient').text();
     var email=$('#email'+id).text();
     var destino=$('#destino').text();
     $('#efirstname').html(first);
     $('#sendRecip').html(recipient);
     $('#origen').val(destino);
     $('#destination').val(email);

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


