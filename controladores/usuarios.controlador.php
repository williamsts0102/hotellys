<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

Class ControladorUsuarios{

    public function ctrRegistroUsuario(){

        if(isset($_POST["registroNombre"])){

            if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["registroNombre"]) && 
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][[a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][
                    a-zA-Z]{2,4}$/', $_POST["registroEmail"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["registroPassword"])){

                $encriptarPassword = crypt($_POST["registroPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $encriptarEmail = md5($_POST["registroEmail"]);

                $tabla = "usuarios";

                $datos = array( "nombre" => $_POST["registroNombre"],
                                "password" => $encriptarPassword,
                                "email" => $_POST["registroEmail"],
                                "foto" => "",
                                "modo" => "directo",
                                "verificacion" => 0,
                                "email_encriptado" => $encriptarEmail);

                $respuesta = ModeloUsuarios::mdlRegistroUsuario($tabla, $datos);
                
                if($respuesta == "ok"){

                    /*=============================================
					VERIFICACIÓN CORREO ELECTRÓNICO
					=============================================*/

                    date_default_timezone_set("America/Lima");

					$ruta = ControladorRuta::ctrRuta();

					$mail = new PHPMailer;

					$mail->CharSet = 'UTF-8';

					$mail->isMail();

					$mail->setFrom('dolly@hotmail.com', 'Dolly Sotelo');

					$mail->addReplyTo('dolly@hotmail.com', 'Dolly Sotelo');

					$mail->Subject = "Por favor verifique su dirección de correo electrónico";

                    $mail->addAddress($_POST["registroEmail"]);

					$mail->msgHTML('<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">

							<center>
								
								<img style="padding:20px; width:10%" src="https://tutorialesatualcance.com/tienda/logo.png">

							</center>

							<div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
								
								<center>

									<img style="padding:20px; width:15%" src="https://tutorialesatualcance.com/tienda/icon-email.png">

									<h3 style="font-weight:100; color:#999">VERIFIQUE SU DIRECCIÓN DE CORREO ELECTRÓNICO</h3>

									<hr style="border:1px solid #ccc; width:80%">

									<h4 style="font-weight:100; color:#999; padding:0 20px">Para comenzar a usar su cuenta, debe confirmar su dirección de correo electrónico</h4>

									<a href="'.$ruta.$encriptarEmail.'"  target="_blank" style="text-decoration:none">
										
										<div style="line-height:60px; background:#0aa; width:60%; color:white">Verifique su dirección de correo electrónico</div>

									</a>

									<br>

									<hr style="border:1px solid #ccc; width:80%">

									<h5 style="font-weight:100; color:#999">Si no se inscribió en esta cuenta, puede ignorar este correo electrónico y la cuenta se eliminará.</h5>


								</center>


							</div>

						</div>');

                        $envio = $mail->Send();

                        if(!$envio){
    
                            echo'<script>
    
                                swal({
                                        type:"error",
                                          title: "¡ERROR!",
                                          text: "¡Ha ocurrido un problema enviando verificación de correo electrónico a '.$_POST["registroEmail"].$mail->ErrorInfo.', por favor inténtelo nuevamente",
                                          showConfirmButton: true,
                                        confirmButtonText: "Cerrar"
                                      
                                }).then(function(result){
    
                                        if(result.value){   
                                            history.back();
                                          } 
                                });
    
                            </script>';
    
                        }
                        else{


                            echo'<script>
    
                                swal({
                                        type:"success",
                                          title: "¡SU CUENTA HA SIDO CREADA CORRECTAMENTE!",
                                          text: "¡Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo electrónico para verificar la cuenta!",
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
                
            }else{

				echo'<script>

					swal({
							type:"error",
						  	title: "¡CORREGIR!",
						  	text: "¡No se permiten caracteres especiales!",
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
    }


    /*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function ctrMostrarUsuario($item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

		return $respuesta;

	}

    /*=============================================
	ACTUALIZAR USUARIO
	=============================================*/
	static public function ctrActualizarUsuario($id, $item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $id, $item, $valor);

		return $respuesta;

	}

    /*=============================================
	INGRESO DE USUARIO DIRECTO
	=============================================*/

	public function ctrIngresoUsuario(){

		if(isset($_POST["ingresoEmail"])){

			 if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingresoEmail"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingresoPassword"])){

    			$encriptarPassword = crypt($_POST["ingresoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "usuarios";
    			$item = "email";
    			$valor = $_POST["ingresoEmail"];

    			$respuesta = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

                if($respuesta["email"] == $_POST["ingresoEmail"] && $respuesta["password"] == $encriptarPassword){

                    if($respuesta["verificacion"] == 0){

                        echo'<script>

                            swal({
                                    type:"error",
                                      title: "¡ERROR!",
                                      text: "¡El correo electrónico aún no ha sido verificado, por favor revise la bandeja de entrada o la carpeta de SPAM de su correo electrónico para verificar la cuenta!",
                                      showConfirmButton: true,
                                    confirmButtonText: "Cerrar"
                                  
                            }).then(function(result){

                                    if(result.value){   
                                        history.back();
                                      } 
                            });

                        </script>';

                        return;

                }
                else{
                    $_SESSION["validarSesion"] = "ok";
                    $_SESSION["id"] = $respuesta["id_u"];
                    $_SESSION["nombre"] = $respuesta["nombre"];
                    $_SESSION["foto"] = $respuesta["foto"];
                    $_SESSION["email"] = $respuesta["email"];
                    $_SESSION["modo"] = $respuesta["modo"];	



                    $ruta = ControladorRuta::ctrRuta();

						echo '<script>
					
							window.location = "'.$ruta.'perfil";				

						</script>';
                }



                }

                else{

                    echo'<script>
    
                        swal({
                                type:"error",
                                  title: "¡ERROR!",
                                  text: "¡El email o contraseña no coinciden!",
                                  showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                              
                        }).then(function(result){
    
                                if(result.value){   
                                    history.back();
                                  } 
                        });
    
                    </script>';
    
                   }


    			

			}else{

				echo'<script>

					swal({
							type:"error",
						  	title: "¡CORREGIR!",
						  	text: "¡No se permiten caracteres especiales!",
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

	}

    static public function ctrRegistroRedesSociales($datos){

        $tabla = "usuarios";
        $item = "email";
        $valor = $datos["email"];
        $emailRepetido = false;

        $verificarExistenciaUsuario = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

        if($verificarExistenciaUsuario){

            $emailRepetido = true;
            
        }else{

            $registrarUsuario = ModeloUsuarios::mdlRegistroUsuario($tabla, $datos);
        
        }

        if($emailRepetido || $registrarUsuario == "ok"){

            $traerUsuario = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

            if($traerUsuario["modo"] == "facebook"){
                session_start();
				$_SESSION["validarSesion"] = "ok";
				$_SESSION["id"] = $traerUsuario["id_u"];
				$_SESSION["nombre"] = $traerUsuario["nombre"];
				$_SESSION["foto"] = $traerUsuario["foto"];
				$_SESSION["email"] = $traerUsuario["email"];
				$_SESSION["modo"] = $traerUsuario["modo"];	

                echo "ok";

			}else if($traerUsuario["modo"] == "google"){

				$_SESSION["validarSesion"] = "ok";
				$_SESSION["id"] = $traerUsuario["id_u"];
				$_SESSION["nombre"] = $traerUsuario["nombre"];
				$_SESSION["foto"] = $traerUsuario["foto"];
				$_SESSION["email"] = $traerUsuario["email"];
				$_SESSION["modo"] = $traerUsuario["modo"];	

				return "ok";

			}else{

				echo "";
			}
        }
    }

/*=============================================
	CAMBIAR FOTO PERFIL
	=============================================*/

	public function ctrCambiarFotoPerfil(){

		if(isset($_POST["idUsuario"])){
            $ruta = "backend/".$_POST["fotoActual"];

			if(isset($_FILES["cambiarImagen"]["tmp_name"]) && !empty($_FILES["cambiarImagen"]["tmp_name"])){

				list($ancho, $alto) = getimagesize($_FILES["cambiarImagen"]["tmp_name"]);

				$nuevoAncho = 500;
				$nuevoAlto = 500;

                /*=============================================
				CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
				=============================================*/

				$directorio = "backend/vistas/img/usuarios/".$_POST["idUsuario"];

                /*=============================================
				PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
				=============================================*/
                if($ruta != ""){
					
					unlink($ruta);

				}else{

					if(!file_exists($directorio)){	

						mkdir($directorio, 0755);

					}

				}
                /*=============================================
				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				=============================================*/
                if($_FILES["cambiarImagen"]["type"] == "image/jpeg"){

					$aleatorio = mt_rand(100,999);

					$ruta = $directorio."/".$aleatorio.".jpg";

					$origen = imagecreatefromjpeg($_FILES["cambiarImagen"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);	

				}
                else if($_FILES["cambiarImagen"]["type"] == "image/png"){

					$aleatorio = mt_rand(100,999);

					$ruta = $directorio."/".$aleatorio.".png";

					$origen = imagecreatefrompng($_FILES["cambiarImagen"]["tmp_name"]);						

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagealphablending($destino, FALSE);
		
					imagesavealpha($destino, TRUE);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $ruta);

				}
                else{

					echo'<script>

						swal({
								type:"error",
							  	title: "¡CORREGIR!",
							  	text: "¡No se permiten formatos diferentes a JPG y/o PNG!",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
						}).then(function(result){

								if(result.value){   
								    history.back();
								  } 
						});

					</script>';


				}

                $ruta = substr($ruta, 8);	
            }

            $tabla = "usuarios";
			$id = $_POST["idUsuario"];
			$item = "foto";
			$valor = $ruta;

			$actualizarFotoPerfil = ModeloUsuarios::mdlActualizarUsuario($tabla, $id, $item, $valor);

            if($actualizarFotoPerfil == "ok"){

				echo '<script>

					swal({
						type:"success",
					  	title: "¡CORRECTO!",
					  	text: "¡La foto de perfil ha sido actualizada!",
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
}



















    

}