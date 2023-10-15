var enlacesHabitaciones= $(".cabeceraHabitacion ul.nav li.nav-item a");
var tituloBtn = []

for(var i= 0; i < enlacesHabitaciones.length; i++){

    $(enlacesHabitaciones[i]).removeClass("active");
    $(enlacesHabitaciones[i]).children("i").remove();
    tituloBtn[i] = $(enlacesHabitaciones[i]).html();

}
$(enlacesHabitaciones[0]).addClass("active");
$(enlacesHabitaciones[0]).html('<i class="fas fa-chevron-right"></i>'+tituloBtn[0]);

$(enlacesHabitaciones[enlacesHabitaciones.length -1]).css({"border-right":0})


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
    $(enlacesHabitaciones[orden]).html('<i class="fas fa-chevron-right"></i>'+tituloBtn[orden]);


    var listaSlide = $(".slideHabitaciones .slide-inner .slide-area li");
    var alturaSlide = $(".slideHabitaciones .slide-inner .slide-area").height();

    for(var i = 0; i < listaSlide.length; i++){

        $(".slideHabitaciones .slide-inner .slide-area").css({"height":alturaSlide+"px"})
        $(listaSlide[i]).html("");
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
    success:function(respuesta)
    {

        var galeria =JASON.parse(respuesta["galeria"]);
        
        for(var i = 0; i < galeria.length; i++){

            $(listaSlide[0]).html('<img class="img-fluid" src="'+urlServidor+galeria[galeria.length-1]+'">')

            $(listaSlide[i+1]).html('<img class="img-fluid" src="'+urlServidor+galeria[i]+'">')

            $(listaSlide[galeria.length+1]).html('<img class="img-fluid" src="'+urlServidor+galeria[0]+'">')

        }

        $(".videoHabitaciones iframe").attr("src", "https://www.youtube.com/embed/"+respuesta["video"]);

        $("#myPano").attr("back", urlServidor+respuesta["recorrido_virtual"]);

        $(".descripcionHabitacion h1").html(respuesta["estilo"]+""+respuesta["tipo"]);

        $(".d-habitacion").html(respuesta["descripcion_h"])
        
    }
    
})


})