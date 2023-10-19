var enlacesHabitaciones= $(".cabeceraHabitacion ul.nav li.nav-item a");
var tituloBtn = []

for(var i= 0; i < enlacesHabitaciones.length; i++){

    $(enlacesHabitaciones[i]).removeClass("active");
    $(enlacesHabitaciones[i]).children("i").remove();
    tituloBtn[i] = $(enlacesHabitaciones[i]).html();

}

/**para el indice 0 la clase active, cuando inicie */
$(enlacesHabitaciones[0]).addClass("active");
$(enlacesHabitaciones[0]).html('<i class="fas fa-chevron-right"></i>' + tituloBtn[0]);


$(enlacesHabitaciones[enlacesHabitaciones.length -1]).css({"border-right":0})

/*ENLACES HABITACIONES*/
$(".cabeceraHabitacion ul.nav li.nav-item a").click(function(e){

    e.preventDefault();

     var orden = $(this).attr("orden");
     var ruta = $(this).attr("ruta");

for(var i= 0; i < enlacesHabitaciones.length; i++){

    $(enlacesHabitaciones[i]).removeClass("active");
    $(enlacesHabitaciones[i]).children("i").remove();
    tituloBtn[i] = $(enlacesHabitaciones[i]).html();

}

     $(enlacesHabitaciones[orden]).addClass("active");
     $(enlacesHabitaciones[orden]).html('<i class="fas fa-chevron-right"></i>' + tituloBtn[orden]);

    var listaSlide = $(".slideHabitaciones .slide-inner .slide-area li");

    //calcular la altura del slide
     var alturaSlide = $(".slideHabitaciones .slide-inner .slide-area").height();

     for(var i = 0; i < listaSlide.length; i++){

        //la altura del area sea la que se captura en "alturaSlide"
         $(".slideHabitaciones .slide-inner .slide-area").css({"height":alturaSlide+"px"})
         $(listaSlide[i]).html("");
     }

   /*AJAX HABITACIONES*/
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
      success:function(respuesta)
     
      {
        var galeria = JSON.parse(respuesta[orden]["galeria"]);
        
               for(var i = 0; i < galeria.length; i++){

             $(listaSlide[0]).html('<img class="img-fluid" src="'+urlServidor+galeria[galeria.length-1]+'">')

             $(listaSlide[i+1]).html('<img class="img-fluid" src="'+urlServidor+galeria[i]+'">')

              $(listaSlide[galeria.length+1]).html('<img class="img-fluid" src="'+urlServidor+galeria[0]+'">')
         }

        $(".videoHabitaciones iframe").attr("src", "https://www.youtube.com/embed/"+respuesta[orden]["video"]);
        $("#myPano").attr("back", urlServidor+respuesta[orden]["recorrido_virtual"]);
        $(".descripcionHabitacion h1").html(respuesta[orden]["estilo"]+" "+respuesta[orden]["tipo"]);
        $(".d-habitacion").html(respuesta[orden]["descripcion_h"])
     }
//         var galeria =JASON.parse(respuesta[orden]["galeria"]);
        
//         for(var i = 0; i < galeria.length; i++){

//             $(listaSlide[0]).html('<img class="img-fluid" src="'+urlServidor+galeria[galeria.length-1]+'">')

//             $(listaSlide[i+1]).html('<img class="img-fluid" src="'+urlServidor+galeria[i]+'">')

//             $(listaSlide[galeria.length+1]).html('<img class="img-fluid" src="'+urlServidor+galeria[0]+'">')
//         }

        
//         $(".videoHabitaciones iframe").attr("src", "https://www.youtube.com/embed/"+respuesta[orden]["video"]);

//         $("#myPano").attr("back", urlServidor+respuesta[orden]["recorrido_virtual"]);

//         $(".descripcionHabitacion h1").html(respuesta[orden]["estilo"]+" "+respuesta[orden]["tipo"]);

//         $(".d-habitacion").html(respuesta[orden]["descripcion_h"])
        
//     }
    
 })


})