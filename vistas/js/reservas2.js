/*=============================================
FECHAS RESERVA
=============================================*/
$('.datepicker.entrada').datepicker({
	startDate: '0d',
  datesDisabled: '0d',
	format: 'yyyy-mm-dd',
	todayHighlight:true
});

$('.datepicker.entrada').change(function(){

  $('.datepicker.salida').attr("readonly", false);
  
	var fechaEntrada = $(this).val();

	$('.datepicker.salida').datepicker({
		startDate: fechaEntrada,
		datesDisabled: fechaEntrada,
		format: 'yyyy-mm-dd'
	});

})

/*=============================================
SELECTS ANIDADOS
=============================================*/
$(".selectTipoHabitacion").change(function(){
  var ruta = $(this).val();
  if(ruta != ""){
    $(".selectTemaHabitacion").html("");
  }else{
    $(".selectTemaHabitacion").html('<option>Temática de habitación</option>')
  }

  
  var datos = new FormData();
  datos.append("ruta", ruta);

  $.ajax({
    url:urlPrincipal+"ajax/habitaciones.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType:"json",
    success:function(respuesta){
      $("input[name='ruta']").val(respuesta[0]["ruta"]);

      for(var i = 0; i <respuesta.length; i++){
        $(".selectTemaHabitacion").append('<option value="'+respuesta[i]["id_h"]+'">'+respuesta[i]["estilo"]+'</option>')
      }

    }
  })

})
   

/*=============================================
CALENDARIO
=============================================*/
/*idHabitacion= a la clase infoReservas con su atributo idHabitacion*/
/*esto viene de info-reservas.php*/
if($(".infoReservas").html() != undefined){

var idHabitacion = $(".infoReservas").attr("idHabitacion");
var arrayHabitacion = JSON.parse("["+idHabitacion +"]");
console.log("arrayHabitacion", arrayHabitacion);
var fechaIngreso = $(".infoReservas").attr("fechaIngreso");
var fechaSalida = $(".infoReservas").attr("fechaSalida");
var dias = $(".infoReservas").attr("dias");

for (var i = 0; i < arrayHabitacion.length; i++) {


var totalEventos = [];
var opcion1 = [];
var opcion2 = [];
var opcion3 = [];
var validarDisponibilidad = false;

var datos = new FormData();
datos.append("idHabitaciones", arrayHabitacion[i]);
datos.append("fechaIngreso", fechaIngreso[i]);
datos.append("fechaSalida", fechaSalida[i]);

$.ajax({
  url:urlPrincipal+"ajax/reservas.ajax.php",
  method: "POST",
  data: datos,
  cache: false,
  contentType: false,
  processData: false,
  dataType:"json",
  success:function(respuesta){

    console.log("respuesta", respuesta);
      
    }
})
}

}

/*=============================================
CODIGO ALEATORIO
=============================================*/
var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZ";

function codigoAleatorio(chars, length){
  codigo = "";
  for(var i = 0; i < length; i++){
    rand = Math.floor(Math.random() * chars.length);
    codigo += chars.substr(rand, 1);
  }
  return codigo;
}

/*=============================================
FUNCION COL.DERECHA RESERVAS
=============================================*/
function colDerReservas(){
  $(".colDerReservas").show();

  var codigoReserva = codigoAleatorio(chars, 9);

  var datos = new FormData();
  datos.append("codigoReserva", codigoReserva);

  $.ajax({
    url:urlPrincipal+"ajax/reservas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType:"json",
    success:function(respuesta){
      if(respuesta.length === 0){
        $(".codigoReserva").html(codigoReserva);
      }else{
        $(".codigoReserva").html(codigoReserva+codigoAleatorio(chars, 3));
      }
       /*=============================================
        CAMBIO DE PLAN
        =============================================*/

        $(".elegirPlan").change(function(){
          cambioPlanesPersonas();
        })

        /*=============================================
        CAMBIO DE PERSONAS
        =============================================*/

        $(".cantidadPersonas").change(function(){
         cambioPlanesPersonas();
        })

    }
  })

}

function cambioPlanesPersonas(){

  switch($(".cantidadPersonas").val()){
            
    case "2":

       $(".precioReserva span").html($(".elegirPlan").val().split(",")[0]*dias);
       $(".precioReserva span").number(true);

    break;

    case "3":

     $(".precioReserva span").html(  Number($(".elegirPlan").val().split(",")[0]*0.25) + Number($(".elegirPlan").val().split(",")[0])*dias);
     $(".precioReserva span").number(true);

    break;

    case "4":

     $(".precioReserva span").html(  Number($(".elegirPlan").val().split(",")[0]*0.50) + Number($(".elegirPlan").val().split(",")[0])*dias);
     $(".precioReserva span").number(true);

    break;

    case "5":

     $(".precioReserva span").html(  Number($(".elegirPlan").val().split(",")[0]*0.75) + Number($(".elegirPlan").val().split(",")[0])*dias);
     $(".precioReserva span").number(true);

    break;

  }

}