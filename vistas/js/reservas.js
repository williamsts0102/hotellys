/*=============================================
FECHAS RESERVA
=============================================*/
$('.datepicker.entrada').datepicker({
	startDate: '0d',
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
  if(ruta != "Tipo de habitación"){
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

$('#calendar').fullCalendar({
	header: {
    	left: 'prev',
    	center: 'title',
    	right: 'next'
  },
  events: [
    {
      start: '2019-03-12',
      end: '2019-03-15',
      rendering: 'background',
      color: '#847059'
    },
    {
      start: '2019-03-22',
      end: '2019-03-24',
      rendering: 'background',
      color: '#FFCC29'
    }  
  ]


});