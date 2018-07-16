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
        <link  rel="stylesheet" href="<?php echo $url ?>vistas/css/plugins/datepicker3.css">

        <link  rel="stylesheet" href="<?php echo $url ?>vistas/css/plugins/bootstrap-timepicker.min.css">
        <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/sweetalert.css">

        <script src="<?php echo $url; ?>vistas/js/plugins/sweetalert.min.js"></script>


        <!-- Theme style-->
        <link rel="stylesheet" href="<?php echo $url ?>vistas/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo $url ?>vistas/dist/css/skins/skin-blue.min.css">
        <link rel="stylesheet" href="<?php echo $url ?>vistas/css/admin.css">
        
        <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.46.0/mapbox-gl.js'></script>
        <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.46.0/mapbox-gl.css' rel='stylesheet' />

        <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v3.1.3/mapbox-gl-directions.js'></script>
        <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v3.1.3/mapbox-gl-directions.css' type='text/css' />

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
      </head>

      <body class="hold-transition skin-blue  layout-boxed">
        <div class="wrapper">
          <header class="main-header">
            <a class="logo">
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
                <li class="active">Configurations</li>
              </ol>
            </section>

            <!-- Main content -->
            <section class="content">
              <div class="row">
                <div class="col-xs-12">                  

                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">CONFIGURATIONS</h3>
                      <div class="row">
                        <div class="col-sm-12">
                          <h1 class="text-center">Schedule New Service</h1>
                        </div>        
                      </div>
                    </div>
                    <!-- /.box-header -->                   
                    <div class="box-body">
                      <div id="exTab1" class="container-fluid"> 
                        <ul  class="nav nav-tabs">
                          <li class="active">
                            <a  href="#5a" data-toggle="tab">Yard Care</a>
                          </li>
                          <li><a href="#2a" data-toggle="tab">House Cleaning</a>
                          </li>
                          <li><a href="#3a" data-toggle="tab">Meals</a>
                          </li>
                          <li><a href="#1a" data-toggle="tab">Concierge</a>
                          </li>
                          <li><a href="#4a" data-toggle="tab">Transport</a>
                          </li>
                        </ul>
                        <div class="tab-content clearfix">
                          <div class="tab-pane active" id="5a">
                            <form method="post" name="yardCare" onsubmit="return registroServicesYard()">
                              <div class="row">
                                <div class="col-sm-6 col-xs-12">                     
                                  <div class="form-group ">
                                    <label for="sel1">What areas need service? (you can check multiple choices)</label>
                                    <select class="form-control" name="area" id="area">
                                      <option value="0">Front yard</option>
                                      <option value="0">Back Yard</option>
                                      <option value="0">Side Yard</option>
                                    </select>
                                    <input type="hidden" name="area1" id="area1">
                                  </div>
                                  <div class="form-group ">
                                    <label for="sel1">What is the size of the yard?</label> 

                                    <select class="form-control" name="size" id="size">
                                      <option selected value="0">Small/Medium (less than 4,000 sqft)</option>
                                      <option value="20">Large (5,000-10,000 sqft)</option>
                                      <option value="40">Very Large (10,000-15,000 sqft)</option>
                                      <option value="">I don’t know </option>
                                    </select>
                                    <input type="hidden" name="size1" id="size1">

                                  </div>
                                  <div class="form-group">
                                    <label for="sel1">How tall is the grass? </label>
                                    <select class="form-control" name="grass" id="grass">
                                      <option selected value="0">3-6 inches</option>
                                      <option value="20">6-12 inches</option>
                                      <option value="25">12-24 inches</option>
                                      <option value="">I don’t know</option>
                                    </select>
                                    <input type="hidden" name="grass1" id="grass1">
                                  </div>
                                  <div class="form-group">
                                    <label for="sel1">Need other yard services? </label>
                                    <select class="form-control" name="other" id="other">
                                      <option selected value="no">No</option>
                                      <option value="yes">Yes</option>
                                    </select>
                                  </div>                                  
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="resena text-justify">
                                        <h3>Description of services:</h3>
                                        <p class="text-muted">Our standard service includes mowing the front, side ,and back, edging walks and driveway, and blowing clean all driveways, patios,decks, sidewalks, and walkways. </p>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="estimated">
                                        <header>COST:</header>
                                        <input readonly type="text" class="form-control" name="estimated" id="estimated" value="">
                                        <p>Kikupoints</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="text-muted">
                                        <p id="infor"></p>
                                      </div>
                                    </div>
                                  </div>                                
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                  <p class="text-muted">Please give us at least 24 hours to schedule</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">

                                <?php  echo' <input type="hidden" name="idRecipient" id="idRecipient" value="'.$_SESSION["id_recipient"].'">'; ?>
                                <div class="container-fluid">

                                  <div class="board">

                                    <div class="row">                            

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
                                    <div class="row"> 
                                      <div class="col-sm-12"> 
                                        <div class="form-group"> 
                                          <label class="form-control-label"> Comments:
                                          </label>
                                          <textarea class="comment clearfix" name="comment"></textarea>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <?php 
                                      $serv= new ControladorServices();
                                      $serv -> ctrRegisterService();              
                                      ?>
                                      <button type="submit" class="btn btn-primary pull-left" name="send">Send Request</button>
                                    </div>

                                  </div>

                                </div>
                              </div>
                            </form>
                          </div>
                          <div class="tab-pane" id="2a">
                            <div class="row">
                              <div class="col-sm-6 col-xs-12">
                                <form method="post">
                                  <div class="form-group">
                                    <label for="sel1">What type of cleaning?</label>
                                    <select class="form-control" name="deep" id="deep">
                                      <option value="0.1">Deep Cleaning</option>
                                      <option value="0.05">Move in/out</option>              
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="sel1">How often?</label>
                                    <select class="form-control" name="often" id="often">
                                      <option value="">One time</option>
                                      <option value="">Recurrent</option>
                                      <option value="">Every week</option>
                                      <option value="">Every 2 weeks</option>
                                      <option value="">Every month</option>

                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="sel1">How many bedrooms?</label>
                                    <select class="form-control" name="bedrooms" id="bedrooms">
                                      <option value="">1 bedroom</option>
                                      <option value="">2 bedroom</option>
                                      <option value="">3 bedrooms</option>
                                      <option value="">4 bedrooms</option>
                                      <option value="">5 bedrooms</option>
                                    </select>
                                    <p>*Note: More than 5 bedrooms, please call concierge for estimate</p>
                                  </div>
                                  <div class="form-group">
                                    <label for="sel1">How many bathrooms?</label>
                                    <select class="form-control" name="bathrooms" id="bathrooms">
                                      <option value="">1 bathroom</option>
                                      <option value="">2 bathroom</option>
                                      <option value="">3 bathrooms</option>
                                      <option value="">4 bathrooms</option>
                                    </select>
                                    <p>*Note: More than 4 bathrooms, please call concierge for estimate</p>
                                  </div>
                                  <div class="form-group">
                                    <label for="sel1">Squared Footage?</label>
                                    <select class="form-control" name="Footage" id="Footage">
                                      <option value="">Under 1200</option>
                                      <option value="">1201-1500</option>
                                      <option value="">1501-1800</option>
                                      <option value="">1801-2100</option>
                                      <option value="">2101-2400</option>
                                      <option value="">2401-2700</option>
                                      <option value="">2701-3000</option>
                                      <option value="">3001-3300</option>
                                      <option value="">3301-3600</option>
                                      <option value="">3601-4000</option>
                                      <option value="">3601-4000</option>
                                    </select>
                                    <p>*Note: Over 4000, please call concierge for estimate</p>
                                  </div>
                                  <div class="form-group">
                                    <label for="sel1">Any pets?</label>
                                    <select class="form-control" name="pets" id="pets">
                                      <option value="">none</option>
                                      <option value="">One pet</option>
                                      <option value="">Multiple pets</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="sel1">green cleaning</label>
                                    <select class="form-control" name="green" id="green">
                                      <option value="">Yes</option>
                                      <option value="">No</option>     
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <a href=""><button class="btn btn-primary btn-lg">Estimated cost: $</button> 
                                    </a>
                                  </div>
                                </form>
                              </div>
                              <div class="col-sm-6 col-xs-12">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="resena text-justify">
                                      <h3>Our service are 100% guaranteed</h3>
                                      <p class="text-muted">This service includes high quality detailed cleaning of:</p>
                                      <p>Kitchen</p>
                                      <ul>
                                        <li>Clean sink</li>
                                        <li>Clean appliance exteriors</li>
                                        <li>Clean inside microwave</li>
                                        <li>Clean range top</li>
                                        <li>Clean counters</li>
                                        <li>Hand wash floor</li>
                                        <li>Load dishwasher</li>
                                      </ul>
                                      <p>Bathroom</p>
                                      <ul>
                                        <li>Clean sinks, counters</li>
                                        <li>Clean, disinfect toilets, tubs, showers</li>
                                        <li>Hand wash, disinfect floors</li>
                                      </ul>
                                      <p>All Rooms</p>
                                      <ul>
                                        <li> Pick up and straighten</li>
                                        <li>Remove cobwebs</li>
                                        <li>Dust/Vacuum furniture</li>
                                        <li>Vacuum floors, carpets</li>
                                        <li>Dust sills, ledges, wall hangings</li>
                                        <li>Vacuum stairs</li>
                                        <li>Vacuum under beds</li>
                                        <li>hange linens if provided, make beds</li>
                                        <li>Empty trash</li>

                                      </ul>
                                    </div>
                                  </div>

                                </div>
                              </div>
                            </div>
                          </div>


                          <div class="tab-pane" id="3a">
                            <div class="row">
                              <div class="col-sm-6 col-xs-12">
                                <form method="post">
                                  <div class="form-group">
                                    <label for="sel1">How many children to feed?</label>
                                    <select  class="form-control" name="children" id="children">
                                      <option value="0">One children</option>
                                      <option value="0">Two children</option>
                                      <option value="0">Three children</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="sel1">Any dietary restrictions?</label>
                                    <select class="form-control" name="dietary" id="dietary">
                                      <option value="no">No</option>
                                      <option value="yes">Yes</option>
                                    </select>
                                  </div>


                                </form>
                              </div>
                              <div class="col-sm-6 col-xs-12">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="resena text-justify">
                                      <h3>Our service are 100% guaranteed</h3>
                                      <p class="text-muted">This will allow us to estimated the cost for a meal for your family. </p>
                                    </div>
                                  </div>

                                </div>

                              </div>
                            </div>
                          </div>

                          <div class="tab-pane" id="1a">
                            <div class="row">
                              <div class="col-sm-6 col-xs-12">
                                <form method="post">
                                  <div class="form-group">
                                    <label for="sel1">Best contact person</label>
                                    <select  class="form-control" name="person" id="person">
                                      <option value="no">No</option>
                                      <option value="yes">Yes</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="sel1">Best contact phone number</label>
                                    <select class="form-control" name="phone" id="phone">
                                      <option value="no">No</option>
                                      <option value="yes">Yes</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="sel1">Best day/time for phone calls</label>
                                    <select class="form-control" name="calls" id="calls">
                                      <option value="no">in the morning</option>
                                      <option value="yes">in the evening</option>
                                    </select>
                                  </div>                                    
                                </form>
                              </div>
                              <div class="col-sm-6 col-xs-12">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="resena text-justify">
                                      <h3>Our service are 100% guaranteed</h3>
                                      <p class="text-muted">This will help us to coordinate any type of service for you. </p>
                                    </div>
                                  </div>

                                </div>

                              </div>
                            </div>
                          </div>



                          <div class="tab-pane" id="4a">
                            <div class="row ">
                              <div class="col-md-6">
                                <div class="origen"> 
                                  <div class="form-group">  
                                    <label for="geocomplete" class="control-label">Add pickup location:</label>
                                    <input type=" text" class="form-control" id="geocomplete" name="requestAddress" value="">
                                  </div>
                                  <div class="form-group">                               
                                    <input type="hidden" class="form-control" name="name" value="" readonly="readonly">
                                  </div>
                                  <div class="form-group">  
                                    <input type="hidden" class="form-control" id="origenLat" name="lat" value="" readonly="readonly">
                                  </div>
                                  <div class="form-group">  
                                    <input type="hidden" class="form-control" id="origenLng" name="lng" value="" readonly="readonly">
                                  </div>
                                </div> 
                                <div class="destino">
                                  <div class="form-group">  
                                    <label for="geocomplete1" class="control-label">Add destination:</label>
                                    <input type=" text" class="form-control" id="geocomplete1" value="">
                                  </div>
                                  <div class="form-group">  
                                    <input type="hidden" class="form-control" id="destinoName"  name="name" value="" readonly="readonly">
                                  </div>
                                  <div class="form-group">                                
                                    <input type="hidden" class="form-control" id="destinoLat" name="lat" value="" readonly="readonly">
                                  </div>
                                  <div class="form-group">  
                                    <input type="hidden" class="form-control" id="destinoLng" name="lng" value="" readonly="readonly">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="geocomplete1" class="control-label">Select a ride type:</label>
                                  <select name="ride_types" id="ride_types" class="form-control"></select>
                                </div>

                              </div>
                              <div class="col-md-6 lyft">
                                <div class="form-group">
                                  <button type="button" class="btn btn-primary btn-lg btn-block " id="getEstimateButton" name="getEstimateButton" title="Get estimate">Get estimate
                                  </button>
                                </div>
                                <div class="estimate text-center" >
                                  <h1><span id="estimate"></span> kikupoint</h1> 
                                </div>
                                <div class="form-group">
                                  <button type="button" class="btn btn-primary btn-lg btn-block " id="rideRequest" name="rideRequest" title="Get estimate">Ride Request</button>
                                </div>
                              </div>
                            </div>

                            <div class="ridelifyft"></div>

                            <div class="map_canvas" id="map"></div>

                            <div class="row">
                              <div class="col-sm-12">
                                <div class="form-group">
                                  <input type="text" name="token" id="inputToken" class="form-control" value="" required="required" pattern="" title="">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-12">
                                <button type="button" id=cancelRide class="btn btn-danger">Cancel Ride</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
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
        <input type="hidden" value="<?php echo $url; ?>" id="rutaOculta">

        <!-- ./wrapper -->

        <!-- jQuery 3 -->

        <script src="<?php echo $url ?>vistas/bower_components/jquery/jquery.min.js"></script>
        <!-- REQUIRED JS SCRIPTS -->
        <script src="<?php echo $url ?>vistas/bower_components/datatables/jquery.dataTables.min.js"></script>

        <script src="<?php echo $url ?>vistas/bower_components/datatables/dataTables.bootstrap.min.js"></script>
        <script src="<?php echo $url ?>vistas/js/plugins/bootstrap-datepicker.js"></script> 

        <script src="<?php echo $url ?>vistas/js/plugins/bootstrap-timepicker.min.js"></script> 

        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo $url ?>vistas/bower_components/bootstrap/js/bootstrap.min.js"></script>

        <!-- AdminLTE App --> 
        <script src="<?php echo $url ?>vistas/dist/js/adminlte.min.js"></script>

        <script src="<?php echo $url; ?>vistas/js/admin.js"></script>  

        <script  src="<?php echo $url; ?>vistas/js/lyft.js"></script> 


        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNgnlHNQwn-gvx_gv7CMk3LjyUZJEDxug&libraries=places"></script>
        
        <script src="<?php echo $url ?>vistas/bower_components/geodecode/jquery.geocomplete.js"></script>

        <script>
          $(function () {           

            $('#fechaHora').datepicker({            
              minDate:0,
              weekStart: 1,
              format: "yy/mm/dd",
              maxViewMode: 0,
              autoclose: true,
              todayHighlight: true
            });

            $(".timepicker").timepicker({
              showInputs: false,        
            });         

          });      

        </script>

        <script type="text/javascript">
          $(function() {

            var url = document.location.toString();
            if (url.match('#')) {
              $('.nav-tabs a[href="#'+url.split('#')[1]+'"]').tab('show') ;
            }

            $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
              window.location.hash = e.target.hash;

            });


            var center = new google.maps.LatLng(30.267153,-97.74306079999997);

            var options = {
             map: ".map_canvas",
             details: ".origen",
             detailsAttribute: "name",
             blur: true,
             geocodeAfterResult: true
           };
           var options1 = {             
             details: ".destino",
             detailsAttribute: "name",
             blur: true,
             geocodeAfterResult: true
           };

           
           $("#geocomplete").geocomplete(options)
           .bind("geodecode:click",function(event,lanLng){

            $(this).geocomplete('marker')
            .setOptions({position:latLng,map:$(this).geocomplete("map")});
            $("#lat,#lng").show();
          });

           $("#geocomplete1").geocomplete(options1);

           var map =  $("#geocomplete").geocomplete("map");

           map.setCenter(center);
           map.setZoom(13);            

         });

       </script>

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


