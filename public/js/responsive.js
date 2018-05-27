$(document).ready(Inicio);

function Inicio(){
    
    //OPOSITOR

    $("#clases-mobile-trigger").click(function(){
        $("#diario").css("right","-100%");
        $("#mensajes").css("right","-100%");
        $("#test").css("right","-100%");
        $("#apuntes").css("right","-100%");
        $("#temario").css("right","-100%");
        $("#add-mensajes").css("right", "-100%");
        $("#add-diario").css("right", "-100%"); 
        $("#clases").css("right","0");
         $(".block").css("display","none");
         $(".full-block").css("display","none");
    })

    $("#temario-mobile-trigger").click(function(){
        $("#diario").css("right","-100%");
        $("#mensajes").css("right","-100%");
        $("#test").css("right","-100%");
        $("#apuntes").css("right","-100%");
        $("#clases").css("right","-100%");
        $("#add-mensajes").css("right", "-100%");
        $("#add-diario").css("right", "-100%");
        $("#temario").css("right","0");
        $(".block").css("display","none");
        $(".full-block").css("display","none");
   })

   $("#apuntes-mobile-trigger").click(function(){
    $("#diario").css("right","-100%");
    $("#mensajes").css("right","-100%");
    $("#test").css("right","-100%");
    $("#temario").css("right","-100%");
    $("#clases").css("right","-100%");
    $("#add-mensajes").css("right", "-100%");
    $("#add-diario").css("right", "-100%"); 
    $("#apuntes").css("right","0");
    $(".block").css("display","none");
    $(".full-block").css("display","none");
    })

    $("#test-mobile-trigger").click(function(){
        $("#diario").css("right","-100%");
        $("#mensajes").css("right","-100%");
        $("#temario").css("right","-100%");
        $("#clases").css("right","-100%");
        $("#apuntes").css("right","-100%");
        $("#add-mensajes").css("right", "-100%");
        $("#add-diario").css("right", "-100%"); 
        $("#test").css("right","0");
        $(".block").css("display","none");
        $(".full-block").css("display","none");
    })

    $("#mensajes-mobile-trigger").click(function(){
        $("#diario").css("right","-100%");
        $("#temario").css("right","-100%");
        $("#clases").css("right","-100%");
        $("#apuntes").css("right","-100%");
        $("#test").css("right","-100%");
        $("#add-diario").css("right", "-100%"); 
        $("#mensajes").css("right","0");
        $(".block").css("display","none");
        $(".full-block").css("display","none");
    })

    $("#diario-mobile-trigger").click(function(){
        $("#temario").css("right","-100%");
        $("#clases").css("right","-100%");
        $("#apuntes").css("right","-100%");
        $("#test").css("right","-100%"); 
        $("#mensajes").css("right","-100%");
        $("#add-mensajes").css("right", "-100%");
        $("#diario").css("right","0");
        $(".block").css("display","none");
        $(".full-block").css("display","none");
    })

    //PREPARADOR

    $("#cursos-mobile-trigger").click(function(){
        $("#video").css("right","-100%");
        $("#tema").css("right","-100%");
        $("#testp").css("right","-100%");
        $("#mensajesp").css("right","-100%");
        $("#bonos").css("right","-100%"); 
        $("#add-video").css("right", "-100%");
        $("#add-tema").css("right", "-100%");
        $("#add-testp").css("right", "-100%");
        $("#add-mensajesp").css("right", "-100%");
        $("#add-bonosp").css("right", "-100%");
        $("#cursos").css("right","0");
         $(".block").css("display","none");
         $(".full-block").css("display","none");
    })

    $("#clasesp-mobile-trigger").click(function(){
        $("#cursos").css("right","-100%");
        $("#tema").css("right","-100%");
        $("#testp").css("right","-100%");
        $("#mensajesp").css("right","-100%");
        $("#bonosp").css("right","-100%");
        $("#add-curso").css("right", "-100%");
        $("#add-tema").css("right", "-100%");
        $("#add-testp").css("right", "-100%");
        $("#add-mensajesp").css("right", "-100%");
        $("#add-bonosp").css("right", "-100%"); 
        $("#video").css("right","0");
         $(".block").css("display","none");
         $(".full-block").css("display","none");
    })

    $("#temariop-mobile-trigger").click(function(){
        $("#cursos").css("right","-100%");
        $("#video").css("right","-100%");
        $("#testp").css("right","-100%");
        $("#mensajesp").css("right","-100%");
        $("#bonosp").css("right","-100%");
        $("#add-curso").css("right", "-100%");
        $("#add-video").css("right", "-100%");
        $("#add-testp").css("right", "-100%");
        $("#add-mensajesp").css("right", "-100%");
        $("#add-bonosp").css("right", "-100%"); 
        $("#tema").css("right","0");
         $(".block").css("display","none");
         $(".full-block").css("display","none");
    })

    $("#testp-mobile-trigger").click(function(){
        $("#cursos").css("right","-100%");
        $("#video").css("right","-100%");
        $("#tema").css("right","-100%");
        $("#mensajesp").css("right","-100%");
        $("#bonosp").css("right","-100%");
        $("#add-curso").css("right", "-100%");
        $("#add-tema").css("right", "-100%");
        $("#add-video").css("right", "-100%");
        $("#add-mensajesp").css("right", "-100%");
        $("#add-bonosp").css("right", "-100%"); 
        $("#testp").css("right","0");
         $(".block").css("display","none");
         $(".full-block").css("display","none");
    })

    $("#mensajesp-mobile-trigger").click(function(){
        $("#cursos").css("right","-100%");
        $("#video").css("right","-100%");
        $("#tema").css("right","-100%");
        $("#testp").css("right","-100%");
        $("#bonosp").css("right","-100%");
        $("#add-curso").css("right", "-100%");
        $("#add-tema").css("right", "-100%");
        $("#add-testp").css("right", "-100%");
        $("#add-video").css("right", "-100%");
        $("#add-bonosp").css("right", "-100%"); 
        $("#mensajesp").css("right","0");
         $(".block").css("display","none");
         $(".full-block").css("display","none");
    })

    $("#bonos-mobile-trigger").click(function(){
        $("#cursos").css("right","-100%");
        $("#video").css("right","-100%");
        $("#tema").css("right","-100%");
        $("#testp").css("right","-100%");
        $("#mensajesp").css("right","-100%");
        $("#add-curso").css("right", "-100%");
        $("#add-tema").css("right", "-100%");
        $("#add-testp").css("right", "-100%");
        $("#add-mensajesp").css("right", "-100%");
        $("#add-video").css("right", "-100%"); 
        $("#bonosp").css("right","0");
         $(".block").css("display","none");
         $(".full-block").css("display","none");
    })

    //ACADEMIA

    $("#cursosa-mobile-trigger").click(function(){
        $("#profesores").css("right","-100%");
        $("#mensajesa").css("right","-100%");
        $("#alumnos").css("right","-100%");
        $("#bonosa").css("right","-100%");
        $("#add-profesores").css("right", "-100%");
        $("#add-alumnos").css("right", "-100%");
        $("#add-mensajesa").css("right", "-100%");
        $("#add-bonosa").css("right", "-100%");
        $("#cursosa").css("right","0");
         $(".block").css("display","none");
         $(".full-block").css("display","none");
    })

    $("#profesores-mobile-trigger").click(function(){
        $("#cursosa").css("right","-100%");
        $("#mensajesa").css("right","-100%");
        $("#alumnos").css("right","-100%");
        $("#bonosa").css("right","-100%");
        $("#add-cursosa").css("right", "-100%");
        $("#add-alumnos").css("right", "-100%");
        $("#add-mensajesa").css("right", "-100%");
        $("#add-bonosa").css("right", "-100%");
        $("#profesores").css("right","0");
         $(".block").css("display","none");
         $(".full-block").css("display","none");
    })

    $("#mensajesa-mobile-trigger").click(function(){
        $("#cursosa").css("right","-100%");
        $("#profesores").css("right","-100%");
        $("#alumnos").css("right","-100%");
        $("#bonosa").css("right","-100%");
        $("#add-profesores").css("right", "-100%");
        $("#add-alumnos").css("right", "-100%");
        $("#add-cursosa").css("right", "-100%");
        $("#add-bonosa").css("right", "-100%");
        $("#mensajesa").css("right","0");
         $(".block").css("display","none");
         $(".full-block").css("display","none");
    })

    $("#alumnos-mobile-trigger").click(function(){
        $("#cursosa").css("right","-100%");
        $("#profesores").css("right","-100%");
        $("#mensajesa").css("right","-100%");
        $("#bonosa").css("right","-100%");
        $("#add-profesores").css("right", "-100%");
        $("#add-mensajesa").css("right", "-100%");
        $("#add-cursosa").css("right", "-100%");
        $("#add-bonosa").css("right", "-100%");
        $("#alumnos").css("right","0");
         $(".block").css("display","none");
         $(".full-block").css("display","none");
    })

    $("#bonosa-mobile-trigger").click(function(){
        $("#cursosa").css("right","-100%");
        $("#profesores").css("right","-100%");
        $("#mensajesa").css("right","-100%");
        $("#alumnos").css("right","-100%");
        $("#add-profesores").css("right", "-100%");
        $("#add-mensajesa").css("right", "-100%");
        $("#add-cursosa").css("right", "-100%");
        $("#add-alumnos").css("right", "-100%");
        $("#bonosa").css("right","0");
         $(".block").css("display","none");
         $(".full-block").css("display","none");
    })
}