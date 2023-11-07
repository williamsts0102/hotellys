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
var fechaIngreso = $(".infoReservas").attr("fechaIngreso");
var fechaSalida = $(".infoReservas").attr("fechaSalida");

var datos = new FormData();
datos.append("idHabitacion", idHabitacion);

$.ajax({
  url:urlPrincipal+"ajax/reservas.ajax.php",
  method: "POST",
  data: datos,
  cache: false,
  contentType: false,
  processData: false,
  dataType:"json",
  success:function(respuesta){
      if(respuesta.length == 0){              
              $('#calendar').fullCalendar({
                header: {
                    left: 'prev',
                    center: 'title',
                    right: 'next'
                },
                events: [
                  {
                    start: fechaIngreso,
                    end: fechaSalida,
                    rendering: 'background',
                    color: '#FFCC29'
                  }
                ]
              });  
        }
        else {
          for (var i=0; i<respuesta.length; i++){
              $('#calendar').fullCalendar({
                header: {
                    left: 'prev',
                    center: 'title',
                    right: 'next'
                },
                events: [
                  {
                    start: fechaIngreso,
                    end: fechaSalida,
                    rendering: 'background',
                    color: '#FFCC29'
                  },
                  {
                    start: respuesta[i]["fecha_ingreso"],
                    end: respuesta[i]["fecha_salida"],
                    rendering: 'background',
                    color: '#847059'
                  }
                ]
              });  
            }
        } 
    }
})


}