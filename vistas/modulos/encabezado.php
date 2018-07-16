<?php 

$servidor = Ruta::ctrRutaServidor();
$url=Ruta::ctrRuta();

$social = ControladorPlantilla::ctrEstiloPlantilla();
?>
<div class="container-fluid encabezado">
	<div class="row">
		<div class="col-xs-12 col-sm-6 sp">
			<a href="<?php echo $url; ?>"><img src="<?php echo $servidor.$social["logo"]; ?>" class="img-responsive logo" alt=""></a>
		</div>
		<div class="col-xs-12 col-sm-6 login">
			<ul>
				<li>
					<a data-toggle="modal" href="<?php echo $url ?>login.php">login</a>
				</li>		
				<li>|</li>
				<li>
					<a data-toggle="modal" href="<?php echo $url ?>recipients.php">to register</a>
				</li>			
			</ul>		
		</div>	
	</div>

	<div class="row">

	<!--<div class="col-xs-12 col-sm-6 col-lg-6 base ">
		<h1>Send the gift of help</h1>	
	</div>-->
	<div class="container-fluid base">
		<div class="container">
			<div class="preSearch">
				<span>	Search for existing funds:</span>
			</div>
			<div class="input-group nav-float">
				<input type="text" name="searchNav" class="form-control" id="_searchNav" class="search" value="" required="required" placeholder="Enter first and last names or email adress" title="">
				<div class="input-group-btn">
					<button class="btn btn-default" type="button" onclick="openSearch();" id="btn-search-nav"><i class="fa fa-search"></i></button>
				</div>
			</div>	
		</div>
	</div>		
</div>
</div>

<div id="ventana2">
	<div class="marco2">
		<div class="icoCerrarVideo"><a href="javascript:closeSearch();"><img src="<?php echo $url; ?>vistas/img/icons/ico-cerrar.png" class="icoCerrar"></a></div>
		<div id="res-search-nav"></div>
	</div>
</div>


