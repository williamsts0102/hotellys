<!--=====================================
INFO PERFIL
======================================-->

<div class="infoPerfil container-fluid bg-white p-0 pb-5 mb-5">
	
	<div class="container">
		
		<div class="row">

			<!--=====================================
			BLOQUE IZQ
			======================================-->
			
			<div class="col-12 col-lg-4 colIzqPerfil p-0 px-lg-3">
				
				<div class="cabeceraPerfil pt-4">
					
					<a href="<?php echo $ruta;  ?>reservas" class="float-left lead text-white pt-1 px-3 mb-4">
						<h5><i class="fas fa-chevron-left"></i> Salir</h5>
					</a>

					<div class="clearfix"></div>

					<h1 class="text-white p-2 pb-lg-5 text-center text-lg-left">MI PERFIL</h1>	
				</div>

				<!--=====================================
				PERFIL
				======================================-->

				<div class="descripcionPerfil">
					
					<figure class="text-center imgPerfil">
							
						<img src="img/testimonio01.png" class="img-fluid">

					</figure>

					<div id="accordion">

						<div class="card">

							<div class="card-header">
								<a class="card-link" data-toggle="collapse" href="#collapseOne">
									MIS RESERVAS
								</a>
							</div>

							<div id="collapseOne" class="collapse show" data-parent="#accordion">

								<ul class="card-body p-0">

									<li class="px-2" style="background:#FFFDF4"> 1 Por vencerse</li>
									<li class="px-2 text-white" style="background:#CEC5B6"> 5 vencidas</li>

								</ul>

								<!--=====================================
								TABLA RESERVAS MÓVIL
								======================================-->	

								<div class="d-lg-none d-flex py-2">
									
									<div class="p-2 flex-grow-1">

										<h5>Suite Contemporánea</h5>
										<h5 class="small text-gray-dark">Del 30.08.2018 al 03.09.2018</h5>

									</div>

									<div class="p-2">

										<button type="button" class="btn btn-dark btn-sm text-white"><i class="fas fa-pencil-alt"></i></button>
										<button type="button" class="btn btn-warning btn-sm text-white"><i class="fas fa-eye"></i></button>

									</div>

								</div>

								<hr class="my-0">

								<div class="d-lg-none d-flex py-2">
									
									<div class="p-2 flex-grow-1">

										<h5>Suite Contemporánea</h5>
										<h5 class="small text-gray-dark">Del 30.08.2018 al 03.09.2018</h5>

									</div>

									<div class="p-2">

										<button type="button" class="btn btn-dark btn-sm text-white"><i class="fas fa-pencil-alt"></i></button>
										<button type="button" class="btn btn-warning btn-sm text-white"><i class="fas fa-eye"></i></button>

									</div>

								</div>

							</div>

						</div>

						<div class="card">

							<div class="card-header">
								<a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
									MIS DATOS
								</a>
							</div>

							<div id="collapseTwo" class="collapse" data-parent="#accordion">
								<div class="card-body p-0">

									<ul class="list-group">
										
										<li class="list-group-item small">Juan Guillermo Osorio</li>
										<li class="list-group-item small">juangui@correo.com</li>
										<li class="list-group-item small">
											<button class="btn btn-dark btn-sm">Cambiar Contraseña</button>
										</li>
										<li class="list-group-item small">
											<button class="btn btn-primary btn-lg">Cambiar Imagen</button>
										</li>

									</ul>

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

			<!--=====================================
			BLOQUE DER
			======================================-->

			<div class="col-12 col-lg-8 colDerPerfil">

				<div class="row">

					<div class="col-6 d-none d-lg-block">
						
						<h4 class="float-left">Hola Juan</h4>

					</div>	

					<!--MercadoPago-->
					<div class="col-12">

					<?php if (isset($_COOKIE["codigoReserva"])): ?>


						<?php

							$validarPagoReserva = false;

							$hoy = date("Y-m-d");

							if($hoy >= $_COOKIE["fechaIngreso"] || $hoy >= $_COOKIE["fechaSalida"]){

								echo '<div class="alert alert-danger">Lo sentimos, las fechas de la reserva no pueden ser igual o inferiores al día de hoy, vuelve a intentarlo.</div>';

								$validarPagoReserva = false;

							}else{

								$validarPagoReserva = true;
							}


							// /*=============================================
						 	// CRUCE DE FECHAS
							// =============================================*/

							// $valor = $_COOKIE["idHabitacion"];

							// $validarReserva = ControladorReservas::ctrMostrarReservas($valor);

							// $opcion01 = array();
							// $opcion02 = array();
							// $opcion03 = array();
							
							// if($validarReserva != 0){

							// 	foreach ($validarReserva as $key => $value) {
									
							// 		/* VALIDAR CRUCE DE FECHAS OPCIÓN 1 */     

							// 		if($_COOKIE["fechaIngreso"] == $value["fecha_ingreso"]){

							// 			array_push($opcion01, false);

							// 		}else{

							// 			array_push($opcion01, true);

							// 		}

							// 		 /* VALIDAR CRUCE DE FECHAS OPCIÓN 2 */

							// 		 if($_COOKIE["fechaIngreso"] > $value["fecha_ingreso"] && $_COOKIE["fechaIngreso"] < $value["fecha_salida"]){

							// 			array_push($opcion02, false);

							// 		}else{

							// 			array_push($opcion02, true);

							// 		} 

							// 		 /* VALIDAR CRUCE DE FECHAS OPCIÓN 3 */

							// 		 if($_COOKIE["fechaIngreso"] < $value["fecha_ingreso"] && $_COOKIE["fechaSalida"] > $value["fecha_ingreso"]){

							// 			array_push($opcion03, false);

							// 		}else{

							// 			array_push($opcion03, true);

							// 		} 

							// 		if($opcion01[$key] == false || $opcion02[$key] == false || $opcion03[$key] == false){

							// 			$validarPagoReserva = false;

							// 			echo 'Lo sentimos, las fechas de la reserva que habías seleccionado han sido ocupadas  
							// 				<a href="'.$ruta.'" class="btn btn-danger btn-sm">vuelve a intentarlo </a>';

							// 			break;	

							// 		}else{

							// 			$validarPagoReserva = true;

							// 		}	        


							// 	}

							// }

						?>

						<?php if ($validarPagoReserva): ?>

							
							<div class="card">
								<div class="card-header">
								<h4>Tienes una reserva pendiente por pagar:</h4> 
								</div>
								<div class="card-body text-center">
									<figure>

							  			<img src="<?php echo $_COOKIE["imgHabitacion"]; ?>" class="img-thumbnail w-50">

							  		</figure>

									  <h5><strong><?php echo $_COOKIE["infoHabitacion"]; ?></strong></h5>
									  
									  <h6> Fechas <?php echo $_COOKIE["fechaIngreso"]; ?> - <?php echo $_COOKIE["fechaSalida"]; ?></h6>

									<h4>$<?php echo number_format($_COOKIE["pagoReserva"]); ?></h4>

								</div>
								<div class="card-footer d-flex bg-white">
										<figure>
								 			
											 <img src="img/mercadopago.png" class="img-fluid w-50">
											 
										 </figure>

										 <form action="<?php echo $ruta.'perfil'; ?>" method="POST" class="pt-3">
											<script
												src="https://www.mercadopago.com.pe/integrations/v1/web-tokenize-checkout.js"
												data-public-key="TEST-738e82f4-4102-4316-a627-0b0b618fcfbd"
												data-transaction-amount="<?php echo $_COOKIE["pagoReserva"]; ?>"
												data-button-label="Pagar"
												data-summary-product-label="<?php echo $_COOKIE["infoHabitacion"]; ?>"
												data-summary-product="<?php echo $_COOKIE["pagoReserva"]; ?>"
												>
											</script>
										</form>
								</div>
							</div>


						

						<?php 
							if(isset($_REQUEST['token'])){
								$token = $_REQUEST['token'];
								// echo '<pre>'; print_r($token); echo '</pre>';
								$payment_method_id = $_REQUEST['payment_method_id'];
								// echo '<pre>'; print_r($payment_method_id); echo '</pre>';
								$installments = $_REQUEST['installments'];
								// echo '<pre>'; print_r($installments); echo '</pre>';
								$issuer_id = $_REQUEST['issuer_id'];
								// echo '<pre>'; print_r($issuer_id); echo '</pre>';

								MercadoPago\SDK::setAccessToken("TEST-1361260950072766-061703-2e27aa6b74f1996ab07dbdf6b416bf39-1400892339");
								$payment = new MercadoPago\Payment();
							    $payment->transaction_amount = $_COOKIE["pagoReserva"];
							    $payment->token = $token;
							    $payment->description = $_COOKIE["infoHabitacion"];
							    $payment->installments = $installments;
							    $payment->payment_method_id = $payment_method_id;
							    $payment->issuer_id = $issuer_id;
							    $payment->payer = array(
									"email" => "correo@ejemplo.com" // Proporciona un correo electrónico válido
								);
							
								$payment->save();
								
								if($payment->status == "approved"){

									$datos = array( "id_habitacion" => $_COOKIE["idHabitacion"],
													"id_usuario" => 1,
													"pago_reserva" => $_COOKIE["pagoReserva"],
													"numero_transaccion" => $payment->id,
													"codigo_reserva" => $_COOKIE["codigoReserva"],
													"descripcion_reserva" => $_COOKIE["infoHabitacion"],
													"fecha_ingreso" => $_COOKIE["fechaIngreso"],
													"fecha_salida" => $_COOKIE["fechaSalida"]);	
									
									$respuesta = ControladorReservas::ctrGuardarReserva($datos);
									
									if($respuesta =="ok"){
										echo '<script>
									document.cookie = "idHabitacion=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path='.$ruta.';";
									document.cookie = "imgHabitacion=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path='.$ruta.';";
									document.cookie = "infoHabitacion=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path='.$ruta.';";
									document.cookie = "pagoReserva=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path='.$ruta.';";
									document.cookie = "codigoReserva=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path='.$ruta.';";
									document.cookie = "fechaIngreso=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path='.$ruta.';";
									document.cookie = "fechaSalida=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path='.$ruta.';";

									swal({
										type:"success",
										  title: "¡CORRECTO!",
										  text: "¡La reserva ha sido creada con éxito!",
										  showConfirmButton: true,
										confirmButtonText: "Cerrar"
									  
									}).then(function(result){

											if(result.value){   
												history.back();
											  } 
									});

									</script>';
									}

									
								}

								else{

									echo '<h1>¡Algo salió mal!</h1>
										<p>Ha ocurrido un error con el pago. Por favor vuelve a intentarlo.</p>';
	
									}
								
							}
						?>
					<?php endif ?>

					<?php endif ?>

					</div>

					<div class="col-6 d-none d-lg-block"></div>

					<div class="col-12 mt-3">
						
						<table class="table table-striped">
					    <thead>
					      <tr>
					      	<th>#</th>
					        <th>Habitación</th>
					        <th>Fecha de Ingreso</th>
					        <th>Fecha de Salida</th>
					        <th>Comentarios</th>
					      </tr>
					    </thead>
					    <tbody>
					      <tr>
					        <td>1</td>
					        <td>Suite Contemporánea</td>
					        <td>30.08.2018</td>
					        <td>03.09.2018</td>
					        <td>
					        
								  <button type="button" class="btn btn-dark text-white"><i class="fas fa-pencil-alt"></i></button>
								  <button type="button" class="btn btn-warning text-white"><i class="fas fa-eye"></i></button>
								
					        </td>
					      </tr>
					       <tr>
					        <td>2</td>
					        <td>Especial Caribeña</td>
					        <td>30.08.2018</td>
					        <td>03.09.2018</td>
					        <td>
					        	
								  <button type="button" class="btn btn-dark text-white"><i class="fas fa-pencil-alt"></i></button>
								  <button type="button" class="btn btn-warning text-white"><i class="fas fa-eye"></i></button>
								
					        </td>
					      </tr>

					       <tr>
					        <td>3</td>
					        <td>Suite Clásica</td>
					        <td>30.08.2018</td>
					        <td>03.09.2018</td>
					        <td>
					        	
								  <button type="button" class="btn btn-dark text-white"><i class="fas fa-pencil-alt"></i></button>
								  <button type="button" class="btn btn-warning text-white"><i class="fas fa-eye"></i></button>
								
					        </td>
					      </tr>
					    </tbody>
					  </table>


					</div>

				</div>
			
			</div>

		</div>

	</div>

</div>
