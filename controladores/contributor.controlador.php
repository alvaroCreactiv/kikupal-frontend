<?php 

class ControladorContributor{
	
	public function ctrRegistroContributor(){
		$url=Ruta::ctrRuta();
		if (isset($_POST["cName"])) {

			if (preg_match('/^[a-zA-Z ]+$/', $_POST["cName"]) && preg_match('/^[a-zA-Z ]+$/', $_POST["lName"]) && preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["yEmail"]) && preg_match('/^[0-9+() ]*$/', $_POST["pNumber"])) {
				$visible=1;
				if ((isset($_POST["optanonimous"])) && ($_POST["optanonimous"]=="Yes")) {
					$_POST["cName"]="Anonimous";
					$_POST["lName"]="Anonimous";
					$_POST["yEmail"]="Anonimous";
					$_POST["pNumber"]="0000000000";
					$visible=0;
				}

				$datos =array("cName"=>$_POST["cName"],
					"lName"=>$_POST["lName"],
					"yEmail"=>$_POST["yEmail"],
					"pNumber"=>$_POST["pNumber"],					
					"visible"=> $visible);

				$tabla="contributor";
				$respuesta = ModeloContributor::mdlRegistroContributor($tabla,$datos);					
				if ($respuesta=="OK") {	

					$search=array("cName"=>$_POST["cName"],
						"lName"=>$_POST["lName"],
						"yEmail"=>$_POST["yEmail"]);
					
					$consul= ModeloContributor::mdlbuscarContributor($tabla,$search);

					$tabla2="gifts";
					$datos2=array("id_contributor"=>$consul["id_contributor"],
						"id_recipient"=>$_POST["idRec"],
						"kikupoint"=>$_POST["kiku"],
						"pago"=>$_POST["payment"],
						"note"=>$_POST["note"]
					);
					
					$respuesta2=ModeloContributor::mdlRegistroGift($tabla2,$datos2);
					if ($respuesta2=="ok") {

						echo '<script> 
						localStorage.removeItem("contributor");
						window.location = "'.$url.'payment";
						</script>';
					}
				}

			}else{
				echo '<script> 
				swal({
					title:"Error",
					text:"Failed to register the contributor",
					tipo:"error",
					conformButtonText:"Cerrar",
					closOnConfirm: false
				},
				function(isConfirm){
					if(isConfirm){						
					}
				}); 
				</script>';
			}
		}
	}

}