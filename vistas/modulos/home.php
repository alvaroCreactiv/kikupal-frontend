<?php 
$servidor = Ruta::ctrRutaServidor();

$url=Ruta::ctrRuta(); 
$social = ControladorPlantilla::ctrEstiloPlantilla();

?>

<div class="container-fluid portada">

  <div class="button-container centered">
    <?php  
   echo ' <button class="btn btn-success btn-lg video" data-video="'.$servidor.$social["video"].'" data-toggle="modal" data-target="#videoModal">		

      <i class="fa fa-play"></i>			

      Click here to see video

    </button>';
    ?>
  </div>

  <div class="row more">

    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 sp">

      <img src="<?php echo $servidor.$social["logo"]; ?>" class="img-responsive logo" alt="">

      <img src="<?php echo $url; ?>vistas/img/portada-movil.jpg" class="img-responsive banner" alt=""/>
      <h1 class="principio wow fadeInLeft">When help is the best gift</h1>
      <br>
      <h1 class="title wow fadeInLeft">KIKUPAL helps you send basic need services</h1>
      <h1 class="title2 wow fadeInLeft">to your loved ones when they need it most</h1>

      <div class="wow fadeInUp">
        <div class="form-group form-inline option">
          <a href="<?php $url; ?>recipients.php">
            <button class="btn btn-help">Send the gift of help</button>
          </a>				
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
          <img src=<?php $url; ?>"vistas/img/Naomi-Bourgeois.jpg" class="img-responsive img-circle circle" alt="">
        </div>
        <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10">
          <p class="bio">“When I became a widow I was 32 years old with two children to care for, a career to keep, and a household to maintain, all while grieving. Many people offered and gave me help, for which I was truly grateful. However, when we are overwhelmed we often do not know what or when we may need that extra bit of support. Kikupal supports you when you need it. It allows you to choose the services you need, when you need them. Kikupal was created for those times, happy or sad.” </p><br/>
          <p class="ceo">– Naomi Bourgeois, CEO.</p>
        </div>
      </div>
      <br/><br/>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

    </div>
  </div>
</div>


<div class="items">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 services">
        <div class="meal">
          <img src="<?php echo $url; ?>vistas/img/icons/MEAL.png" class="wow bounceIn icon" alt="" data-wow-duration="1s" data-wow-delay="1s">
          <p class="txt">MEAL</p>
        </div>
        <div class="maid">
          <img src="<?php echo $url; ?>vistas/img/icons/MAID.png" class="wow bounceIn icon" alt="" data-wow-duration="1s" data-wow-delay="1.5s">
          <p class="txt">MAID</p>
        </div>
        <div class="care">
          <img src="<?php echo $url; ?>vistas/img/icons/LAWN-CARE.png" class="wow bounceIn icon" alt="" data-wow-duration="1s" data-wow-delay="2s">
          <p class="txt">LAWN CARE</p>	
        </div>
        <div class="concierge">
          <img src="<?php echo $url; ?>vistas/img/icons/CONCIERGE.png" class="wow bounceIn icon" alt="" data-wow-duration="1s" data-wow-delay="2.5s">
          <p class="txt">CONCIERGE</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="bannerInfo text-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h1>Service provided in the following cities: Austin, Pflugerville, Round Rock, Cedar Park, and Buda.</h1>
      </div>
    </div>		
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-4 col-sm-4 col-xs-12 spot">
      <h2><strong>Support</strong></h2>
      <p>We will communicate your support.</p>
    </div>
    <div class="col-lg-4 col-sm-4 col-xs-12 spot">
      <h2><strong>Coordinate</strong></h2>
      <p>we will coordinate the help they need when they need it.</p>
    </div>
    <div class="col-lg-4 col-sm-4 col-xs-12 spot">
      <h2><strong>Long Term Service</strong></h2>
      <p>We are here for them for the long run.</p>
    </div>
  </div>
</div>


<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-body">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

        <iframe width="100%" height="350px" src="" frameborder="0" allowfullscreen></iframe>

      </div>

    </div>

  </div>

</div>