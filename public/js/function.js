$(document).ready(Inicio);

function Inicio() {

    $("#trigger-home").click(function() {

        if ($("#trigger-home").hasClass("icon-hamburguesa")) {
            $(".header").css("background-color", "rgba(0,0,0,.7)");
            $("#trigger-home").css("color", "#ffffff");
            $("#trigger-home").removeClass("icon-hamburguesa");
            $("#trigger-home").addClass("icon-cross");
            $("#logo img").attr("src", "../img/Logo-TuOposify-blanco.png");
            $(".nav").css("left", "5.3vw");
            $(".desaparecer").css("display","none");
            //OPOSITOR
            $("#clases").css("width", "79.5vw");
            $("#temario").css("width", "79.5vw");
            $("#test").css("width", "79.5vw");
            $("#buscar").css("width", "79.5vw");

            if($("#add-mensajes").css("right") == "0px"){
                $("#mensajes").css("width", "49.3vw");
            }else{
                $("#mensajes").css("width", "79.5vw");
            }

            if($("#add-apunte").css("right") == "0px"){
                $("#apuntes").css("width", "49.3vw");
            }else{
                $("#apuntes").css("width", "79.5vw");
            }

            if($("#add-diario").css("right") == "0px"){
                $("#diario").css("width", "49.3vw");
            }else{
                $("#diario").css("width", "79.5vw");
            }
           
            //PREPARADOR
            if($("#add-curso").css("right") == "0px"){
                $("#cursos").css("width", "49.3vw");
            }else{
                $("#cursos").css("width", "79.5vw");
            }

            if($("#add-video").css("right") == "0px"){
                $("#video").css("width", "49.3vw");
            }else{
                $("#video").css("width", "79.5vw");
            }

            if($("#add-tema").css("right") == "0px"){
                $("#tema").css("width", "49.3vw");
            }else{
                $("#tema").css("width", "79.5vw");
            }

            if($("#add-testp").css("right") == "0px"){
                $("#testp").css("width", "49.3vw");
            }else{
                $("#testp").css("width", "79.5vw");
            }

            if($("#add-mensajesp").css("right") == "0px"){
                $("#mensajesp").css("width", "49.3vw");
            }else{
                $("#mensajesp").css("width", "79.5vw");
            }

            if($("#add-bonosp").css("right") == "0px"){
                $("#bonosp").css("width", "49.3vw");
            }else{
                $("#bonosp").css("width", "79.5vw");
            }

            //ACADEMIA

            if($("#add-cursosa").css("right") == "0px"){
                $("#cursosa").css("width", "49.3vw");
            }else{
                $("#cursosa").css("width", "79.5vw");
            }

            if($("#add-profesores").css("right") == "0px"){
                $("#profesores").css("width", "49.3vw");
            }else{
                $("#profesores").css("width", "79.5vw");
            }

            if($("#add-mensajesa").css("right") == "0px"){
                $("#mensajesa").css("width", "49.3vw");
            }else{
                $("#mensajesa").css("width", "79.5vw");
            }

            if($("#add-alumnos").css("right") == "0px"){
                $("#alumnos").css("width", "49.3vw");
            }else{
                $("#alumnos").css("width", "79.5vw");
            }

            if($("#add-bonosa").css("right") == "0px"){
                $("#bonosa").css("width", "49.3vw");
            }else{
                $("#bonosa").css("width", "79.5vw");
            }
            
        } else {
            $(".header").css("background-color", "#ffffff");
            $("#trigger-home").css("color", "#000000");
            $("#trigger-home").removeClass("icon-cross");
            $("#trigger-home").addClass("icon-hamburguesa");
            $("#logo img").attr("src", "../img/Logo-TuOposify-negro.png");
            $(".nav").css("left", "-100%");
            $("#about").css("top", "100%");
            $("#signup").css("top", "-100%");
            $("#login").css("right", "-100%");
            $("#banner").css("opacity", "1");
            $(".desaparecer").css("display","block");
            //OPOSITOR
            $("#clases").css("width", "94.7vw");
            $("#temario").css("width", "94.7vw");
            $("#apuntes").css("width", "94.7vw");
            $("#test").css("width", "94.7vw");
            $("#buscar").css("width", "94.7vw");

            if($("#add-mensajes").css("right") == "0px"){
                $("#mensajes").css("width", "64.6vw");
            }else{
                $("#mensajes").css("width", "94.7vw");
            }

            if($("#add-apunte").css("right") == "0px"){
                $("#apuntes").css("width", "64.6vw");
            }else{
                $("#apuntes").css("width", "94.7vw");
            }

            if($("#add-diario").css("right") == "0px"){
                $("#diario").css("width", "64.6vw");
            }else{
                $("#diario").css("width", "94.7vw");
            }

            if($("#add-mensajesa").css("right") == "0px"){
                $("#mensajesa").css("width", "64.6vw");
            }else{
                $("#mensajesa").css("width", "94.7vw");
            }

            //PREPARADOR
            if($("#add-curso").css("right") == "0px"){
                $("#cursos").css("width", "64.6vw");
            }else{
                $("#cursos").css("width", "94.7vw");
            }

            if($("#add-video").css("right") == "0px"){
                $("#video").css("width", "64.6vw");
            }else{
                $("#video").css("width", "94.7vw");
            }

            if($("#add-tema").css("right") == "0px"){
                $("#tema").css("width", "64.6vw");
            }else{
                $("#tema").css("width", "94.7vw");
            }

            if($("#add-testp").css("right") == "0px"){
                $("#testp").css("width", "64.6vw");
            }else{
                $("#testp").css("width", "94.7vw");
            }

            if($("#add-mensajesp").css("right") == "0px"){
                $("#mensajesp").css("width", "64.6vw");
            }else{
                $("#mensajesp").css("width", "94.7vw");
            }

            if($("#add-bonosp").css("right") == "0px"){
                $("#bonosp").css("width", "64.6vw");
            }else{
                $("#bonosp").css("width", "94.7vw");
            }

            //ACADEMIA

            if($("#add-cursosa").css("right") == "0px"){
                $("#cursosa").css("width", "64.6vw");
            }else{
                $("#cursosa").css("width", "94.7vw");
            }

            if($("#add-profesores").css("right") == "0px"){
                $("#profesores").css("width", "64.6vw");
            }else{
                $("#profesores").css("width", "94.7vw");
            }

            if($("#add-mensajesa").css("right") == "0px"){
                $("#mensajesa").css("width", "64.6vw");
            }else{
                $("#mensajesa").css("width", "94.7vw");
            }

            if($("#add-alumnos").css("right") == "0px"){
                $("#alumnos").css("width", "64.6vw");
            }else{
                $("#alumnos").css("width", "94.7vw");
            }

            if($("#add-bonosa").css("right") == "0px"){
                $("#bonosa").css("width", "64.6vw");
            }else{
                $("#bonosa").css("width", "94.7vw");
            }


        }
    });

    $("#about-trigger").click(function(e) {
        e.preventDefault();
        if(window.matchMedia("(max-width: 1023px)").matches){
            $("#about").css("left", "50%");
        }else{
            $("#signup").css("top", "-100%");
            $("#about").css("top", "0");
            $("#banner").css("opacity", "0.0");
        }      
    });

    $("#about-trigger2").click(function(e) {
        e.preventDefault();
        if(window.matchMedia("(max-width: 1023px)").matches){
            $("#about").css("left", "50%");
        }else{
            $("#signup").css("top", "-100%");
            $("#about").css("top", "0");
            $("#banner").css("opacity", "0.0");
        }      
    });

    

    $("#close-about").click(function(e) {
        if(window.matchMedia("(max-width: 1023px)").matches){
            $("#about").css("left", "-100%");
        }else{
            $("#about").css("top", "100%");
            $("#banner").css("opacity", "1");
        }       
    });

 
    $("#search-trigger").click(function(e) {
        $("#search").css("right", "0");
        $(".header").css("background-color", "#ffffff");
        $("#trigger-home").css("color", "#000000");
        $("#trigger-home").removeClass("icon-cross");
        $("#trigger-home").addClass("icon-hamburguesa");
        $(".nav").css("left", "-100%");
        $("#about").css("top", "100%");
        $("#signup").css("top", "-100%");
        $("#login").css("right", "-100%");
    });

    //OPOSITOR ABRIR VENTANA

    $("#clases-trigger").click(function(e) {
        e.preventDefault();
        $("#clases").css("width", "79.5vw");
        $("#temario").css("right", "-100%");
        $("#apuntes").css("right", "-100%");
        $("#test").css("right", "-100%");
        $("#mensajes").css("right", "-100%");
        $("#buscar").css("right", "-100%");
        $("#clases").css("right", "0");
        $("#add-mensajes").css("right", "-100%");
        $("#add-diario").css("right", "-100%");
        $(".feeds").css("display","none");
    });

    $("#temario-trigger").click(function(e) {
        e.preventDefault();
        $("#temario").css("width", "79.5vw");
        $("#clases").css("right", "-100%");
        $("#apuntes").css("right", "-100%");
        $("#test").css("right", "-100%");
        $("#mensajes").css("right", "-100%");
        $("#diario").css("right", "-100%");
        $("#buscar").css("right", "-100%");
        $("#temario").css("right", "0");
        $("#add-mensajes").css("right", "-100%");
        $("#add-diario").css("right", "-100%");
        $(".feeds").css("display","none");
    });

    $("#apuntes-trigger").click(function(e) {
        e.preventDefault();
        $("#apuntes").css("width", "79.5vw");
        $("#clases").css("right", "-100%");
        $("#temario").css("right", "-100%");
        $("#test").css("right", "-100%");
        $("#mensajes").css("right", "-100%");
        $("#diario").css("right", "-100%");
        $("#buscar").css("right", "-100%");
        $("#apuntes").css("right", "0");
        $("#add-mensajes").css("right", "-100%");
        $("#add-diario").css("right", "-100%");
        $(".feeds").css("display","none");
    });

    $("#test-trigger").click(function(e) {
        e.preventDefault();
        $("#test").css("width", "79.5vw");
        $("#clases").css("right", "-100%");
        $("#temario").css("right", "-100%");
        $("#apuntes").css("right", "-100%");
        $("#mensajes").css("right", "-100%");
        $("#diario").css("right", "-100%");
        $("#buscar").css("right", "-100%");
        $("#test").css("right", "0");
        $("#add-mensajes").css("right", "-100%");
        $("#add-diario").css("right", "-100%");
        $(".feeds").css("display","none");
    });

    $("#mensajes-trigger").click(function(e) {
        e.preventDefault();
        $("#mensajes").css("width", "79.5vw");
        $("#clases").css("right", "-100%");
        $("#temario").css("right", "-100%");
        $("#apuntes").css("right", "-100%");
        $("#test").css("right", "-100%");
        $("#diario").css("right", "-100%");
        $("#buscar").css("right", "-100%");
        $("#mensajes").css("right", "0");
        $("#add-diario").css("right", "-100%");
        $(".feeds").css("display","none");
    });

    $("#diario-trigger").click(function(e) {
        e.preventDefault();
        $("#diario").css("width", "79.5vw");
        $("#clases").css("right", "-100%");
        $("#temario").css("right", "-100%");
        $("#apuntes").css("right", "-100%");
        $("#test").css("right", "-100%");
        $("#mensajes").css("right", "-100%");
        $("#buscar").css("right", "-100%");
        $("#diario").css("right", "0");
        $("#add-mensajes").css("right", "-100%");
        $(".feeds").css("display","none");
    });

    $("#buscar-trigger").click(function(e) {
        e.preventDefault();
        $("#diario").css("width", "79.5vw");
        $("#clases").css("right", "-100%");
        $("#temario").css("right", "-100%");
        $("#apuntes").css("right", "-100%");
        $("#test").css("right", "-100%");
        $("#mensajes").css("right", "-100%");
        $("#diario").css("right", "-100%");
        $("#buscar").css("right", "0");
        $("#add-mensajes").css("right", "-100%");
        $(".feeds").css("display","none");
    });

    $("#close-search").click(function(e) {
        $("#search").css("right", "-100%");
    });

    //OPOSITOR CERRAR VENTANAS

    $("#close-clases").click(function(e) {
        $(".feeds").css("display","block");
        $("#clases").css("right", "-100%");
        if(window.matchMedia("(max-width: 1023px)").matches){
            $(".block").css("display","block");
            $(".full-block").css("display","block");
        }
    });

    $("#close-temario").click(function(e) {
        $(".feeds").css("display","block");
        $("#temario").css("right", "-100%");
        if(window.matchMedia("(max-width: 1023px)").matches){
            $(".block").css("display","block");
            $(".full-block").css("display","block");
        }
    });

    $("#close-test").click(function(e) {
        $(".feeds").css("display","block");
        $("#test").css("right", "-100%");
        if(window.matchMedia("(max-width: 1023px)").matches){
            $(".block").css("display","block");
            $(".full-block").css("display","block");
        }
    });

    $("#close-apuntes").click(function(e) {
        $(".feeds").css("display","block");
        $("#add-apunte").css("right", "-100%");
        $("#apuntes").css("right", "-100%");
        $("#apuntes").css("width", "94.7vw");
        if(window.matchMedia("(max-width: 1023px)").matches){
            $(".block").css("display","block");
            $(".full-block").css("display","block");
        }
    });

    $("#close-mensajes").click(function(e) {
        $(".feeds").css("display","block");
        $("#add-mensajes").css("right", "-100%");
        $("#mensajes").css("right", "-100%");
        $("#mensajes").css("width", "94.7vw");
        if(window.matchMedia("(max-width: 1023px)").matches){
            $(".block").css("display","block");
            $(".full-block").css("display","block");
        }

    });

    $("#close-diario").click(function(e) {
        $(".feeds").css("display","block");
        $("#add-diario").css("right", "-100%");
        $("#diario").css("right", "-100%");
        $("#diario").css("width", "94.7vw");
        if(window.matchMedia("(max-width: 767px)").matches){
            $(".block").css("display","block");
            $(".full-block").css("display","block");
        }
    });

    $("#close-buscar").click(function(e) {
        $(".feeds").css("display","block");
        $("#add-diario").css("right", "-100%");
        $("#buscar").css("right", "-100%");
        $("#buscar").css("width", "94.7vw");
        if(window.matchMedia("(max-width: 767px)").matches){
            $(".block").css("display","block");
            $(".full-block").css("display","block");
        }
    });

    //OPOSITOR ESCRIBIR MENSAJE

    $("#new-mensajes").click(function(){
        if($("#trigger-home").hasClass("icon-cross")){
            $("#mensajes").css("width", "49.3vw");
            $("#mensajes").css("right", "30.2%");
            $("#add-mensajes").css("right", "0");
        }else if(window.matchMedia("(max-width: 1023px)").matches){
            $("#add-mensajes").css("right", "50%");
        }else{
            $("#mensajes").css("width", "64.7vw");
            $("#mensajes").css("right", "30.2%");
            $("#add-mensajes").css("right", "0");
        }
    });

    $("#close-add-mensajes").click(function(){
        $("#add-mensajes").css("right", "-100%");
        $("#mensajes").css("right", "0");
        if($("#trigger-home").hasClass("icon-cross")){
            $("#mensajes").css("width", "79.5vw");
        }else if(window.matchMedia("(max-width: 1023px)").matches){
            $("#add-mensajes").css("right", "-100%");
        }
        else{
            $("#mensajes").css("width", "94.7vw");
        }

    });

    //OPOSITOR ESCRIBIR MENSAJE

    $("#new-apunte").click(function(){
        if($("#trigger-home").hasClass("icon-cross")){
            $("#apuntes").css("width", "49.3vw");
            $("#apuntes").css("right", "30.2%");
            $("#add-apunte").css("right", "0");
        }else if(window.matchMedia("(max-width: 1023px)").matches){
            $("#add-apunte").css("right", "50%");
        }else{
            $("#apuntes").css("width", "64.7vw");
            $("#apuntes").css("right", "30.2%");
            $("#add-apunte").css("right", "0");
        }
    });

    $("#close-add-apunte").click(function(){
        $("#add-apunte").css("right", "-100%");
        $("#apuntes").css("right", "0");
        if($("#trigger-home").hasClass("icon-cross")){
            $("#apuntes").css("width", "79.5vw");
        }else if(window.matchMedia("(max-width: 1023px)").matches){
            $("#add-apunte").css("right", "-100%");
        }
        else{
            $("#apuntes").css("width", "94.7vw");
        }

    });

    //OPOSITOR AÑADIR ENTRADA

    $("#new-diario").click(function(){
        if($("#trigger-home").hasClass("icon-cross")){
            $("#diario").css("width", "49.3vw");
            $("#diario").css("right", "30.2%");
            $("#add-diario").css("right", "0");
        }else if(window.matchMedia("(max-width: 1023px)").matches){
            $("#add-diario").css("right", "50%");
        }else{
            $("#diario").css("width", "64.7vw");
            $("#diario").css("right", "30.2%");
            $("#add-diario").css("right", "0");
        }
    });

    $("#close-add-diario").click(function(){
        $("#add-diario").css("right", "-100%");
        $("#diario").css("right", "0");
        if($("#trigger-home").hasClass("icon-cross")){
            $("#diario").css("width", "79.5vw");
        }else if(window.matchMedia("(max-width: 1023px)").matches){
            $("#add-diario").css("right", "-100%");
        }else{
            $("#diario").css("width", "94.7vw");
        }

    });

    //PREPARADOR ABRIR VENTANAS

    $("#cursos-trigger").click(function(e) {
        e.preventDefault();
        $("#cursos").css("width", "79.5vw");
        $("#video").css("right", "-100%");
        $("#tema").css("right", "-100%");
        $("#testp").css("right", "-100%");
        $("#mensajesp").css("right", "-100%");
        $("#bonosp").css("right", "-100%");
        $("#cursos").css("right", "0");
        $("#add-video").css("right", "-100%");
        $("#add-tema").css("right", "-100%");
        $("#add-testp").css("right", "-100%");
        $("#add-mensajesp").css("right", "-100%");
        $("#add-bonosp").css("right", "-100%");
        $(".feeds").css("display","none");
    });

    $("#video-trigger").click(function(e) {
        e.preventDefault();
        $("#video").css("width", "79.5vw");
        $("#cursos").css("right", "-100%");
        $("#tema").css("right", "-100%");
        $("#testp").css("right", "-100%");
        $("#mensajesp").css("right", "-100%");
        $("#bonosp").css("right", "-100%");
        $("#video").css("right", "0");
        $("#add-curso").css("right", "-100%");
        $("#add-tema").css("right", "-100%");
        $("#add-testp").css("right", "-100%");
        $("#add-mensajesp").css("right", "-100%");
        $("#add-bonosp").css("right", "-100%");
        $(".feeds").css("display","none");
    });

    $("#tema-trigger").click(function(e) {
        e.preventDefault();
        $("#tema").css("width", "79.5vw");
        $("#cursos").css("right", "-100%");
        $("#video").css("right", "-100%");
        $("#testp").css("right", "-100%");
        $("#mensajesp").css("right", "-100%");
        $("#bonosp").css("right", "-100%");
        $("#tema").css("right", "0");
        $("#add-curso").css("right", "-100%");
        $("#add-video").css("right", "-100%");
        $("#add-testp").css("right", "-100%");
        $("#add-mensajesp").css("right", "-100%");
        $("#add-bonosp").css("right", "-100%");
        $(".feeds").css("display","none");
    });

    $("#testp-trigger").click(function(e) {
        e.preventDefault();
        $("#testp").css("width", "79.5vw");
        $("#cursos").css("right", "-100%");
        $("#tema").css("right", "-100%");
        $("#video").css("right", "-100%");
        $("#mensajesp").css("right", "-100%");
        $("#bonosp").css("right", "-100%");
        $("#testp").css("right", "0");
        $("#add-curso").css("right", "-100%");
        $("#add-tema").css("right", "-100%");
        $("#add-video").css("right", "-100%");
        $("#add-mensajesp").css("right", "-100%");
        $("#add-bonosp").css("right", "-100%");
        $(".feeds").css("display","none");
    });

    $("#mensajesp-trigger").click(function(e) {
        e.preventDefault();
        $("#mensajesp").css("width", "79.5vw");
        $("#cursos").css("right", "-100%");
        $("#tema").css("right", "-100%");
        $("#testp").css("right", "-100%");
        $("#video").css("right", "-100%");
        $("#bonosp").css("right", "-100%");
        $("#mensajesp").css("right", "0");
        $("#add-curso").css("right", "-100%");
        $("#add-tema").css("right", "-100%");
        $("#add-testp").css("right", "-100%");
        $("#add-video").css("right", "-100%");
        $("#add-bonosp").css("right", "-100%");
        $(".feeds").css("display","none");
    });

    $("#bonosp-trigger").click(function(e) {
        e.preventDefault();
        $("#bonosp").css("width", "79.5vw");
        $("#cursos").css("right", "-100%");
        $("#tema").css("right", "-100%");
        $("#testp").css("right", "-100%");
        $("#video").css("right", "-100%");
        $("#mensajesp").css("right", "-100%");
        $("#bonosp").css("right", "0");
        $("#add-curso").css("right", "-100%");
        $("#add-tema").css("right", "-100%");
        $("#add-testp").css("right", "-100%");
        $("#add-mensajesp").css("right", "-100%");
        $("#add-video").css("right", "-100%");
        $(".feeds").css("display","none");
    });

    //PREPARADOR CERRAR VENTANAS

    $("#close-cursos").click(function(e) {
         if(window.matchMedia("(max-width: 1023px)").matches){
            $(".block").css("display","block");
            $(".full-block").css("display","block");
            $("#cursos").css("right", "-100%");
        }else{
            $(".feeds").css("display","block");
            $("#add-curso").css("right", "-100%");
            $("#cursos").css("right", "-100%");
            $("#cursos").css("width", "94.7vw");
        }

    });

    $("#close-video").click(function(e) {
        if(window.matchMedia("(max-width: 1023px)").matches){
            $(".block").css("display","block");
            $(".full-block").css("display","block");
            $("#video").css("right", "-100%");
        }else{
            $(".feeds").css("display","block");
            $("#add-video").css("right", "-100%");
            $("#video").css("right", "-100%");
            $("#video").css("width", "94.7vw");
        }
    });

    $("#close-tema").click(function(e) {
        if(window.matchMedia("(max-width: 1023px)").matches){
            $(".block").css("display","block");
            $(".full-block").css("display","block");
            $("#tema").css("right", "-100%");
        }else{
            $(".feeds").css("display","block");
            $("#add-tema").css("right", "-100%");
            $("#tema").css("right", "-100%");
            $("#tema").css("width", "94.7vw");
        }
    });

    $("#close-testp").click(function(e) {
        if(window.matchMedia("(max-width: 1023px)").matches){
            $(".block").css("display","block");
            $(".full-block").css("display","block");
            $("#testp").css("right", "-100%");
        }else{
            $(".feeds").css("display","block");
            $("#add-testp").css("right", "-100%");
            $("#testp").css("right", "-100%");
            $("#testp").css("width", "94.7vw");
        }
    });

    $("#close-mensajesp").click(function(e) {
        if(window.matchMedia("(max-width: 1023px)").matches){
            $(".block").css("display","block");
            $(".full-block").css("display","block");
            $("#mensajesp").css("right", "-100%");
        }else{
            $(".feeds").css("display","block");
            $("#add-mensajesp").css("right", "-100%");
            $("#mensajesp").css("right", "-100%");
            $("#mensajesp").css("width", "94.7vw");
        }
    });

    $("#close-bonosp").click(function(e) {
        if(window.matchMedia("(max-width: 1023px)").matches){
            $(".block").css("display","block");
            $(".full-block").css("display","block");
            $("#bonosp").css("right", "-100%");
        }else{
            $(".feeds").css("display","block");
            $("#add-bonosp").css("right", "-100%");
            $("#bonosp").css("right", "-100%");
            $("#bonosp").css("width", "94.7vw");
        }
    });

    //PREPARADOR AÑADIR CURSO

    $("#new-course").click(function(){
        if($("#trigger-home").hasClass("icon-cross")){
            $("#cursos").css("width", "49.3vw");
            $("#cursos").css("right", "30.2%");
            $("#add-curso").css("right", "0");
        }else if(window.matchMedia("(max-width: 1023px)").matches){
            $("#add-curso").css("right", "50%");
        }else{
            $("#cursos").css("width", "64.7vw");
            $("#cursos").css("right", "30.2%");
            $("#add-curso").css("right", "0");
        }
    });

    $("#close-add-course").click(function(){
        $("#add-curso").css("right", "-100%");
        $("#cursos").css("right", "0");
        if($("#trigger-home").hasClass("icon-cross")){
            $("#cursos").css("width", "79.5vw");
        }else if(window.matchMedia("(max-width: 1023px)").matches){
            $("#add-curso").css("right", "-100%");
        }else{
            $("#cursos").css("width", "94.7vw");
        }

    });

    //PREPARADOR AÑADIR VIDEO

    $("#new-video").click(function(){
        if($("#trigger-home").hasClass("icon-cross")){
            $("#video").css("width", "49.3vw");
            $("#video").css("right", "30.2%");
            $("#add-video").css("right", "0");
        }else if(window.matchMedia("(max-width: 1023px)").matches){
            $("#add-video").css("right", "50%");
        }else{
            $("#video").css("width", "64.7vw");
            $("#video").css("right", "30.2%");
            $("#add-video").css("right", "0");
        }
    });

    $("#close-add-video").click(function(){
        $("#add-video").css("right", "-100%");
        $("#video").css("right", "0");
        if($("#trigger-home").hasClass("icon-cross")){
            $("#video").css("width", "79.5vw");
        }else if(window.matchMedia("(max-width: 1023px)").matches){
            $("#add-video").css("right", "-100%");
        }else{
            $("#video").css("width", "94.7vw");
        }

    });

    //PREPARADOR AÑADIR TEMA

    $("#new-tema").click(function(){
        if($("#trigger-home").hasClass("icon-cross")){
            $("#tema").css("width", "49.3vw");
            $("#tema").css("right", "30.2%");
            $("#add-tema").css("right", "0");
        }else if(window.matchMedia("(max-width: 1023px)").matches){
            $("#add-tema").css("right", "50%");
        }else{
            $("#tema").css("width", "64.7vw");
            $("#tema").css("right", "30.2%");
            $("#add-tema").css("right", "0");
        }
    });

    $("#close-add-tema").click(function(){
        $("#add-tema").css("right", "-100%");
        $("#tema").css("right", "0");
        if($("#trigger-home").hasClass("icon-cross")){
            $("#tema").css("width", "79.5vw");
        }else if(window.matchMedia("(max-width: 1023px)").matches){
            $("#add-tema").css("right", "-100%");
        }else{
            $("#tema").css("width", "94.7vw");
        }

    });

    //PREPARADOR AÑADIR TEST

    $("#new-testp").click(function(){
        if($("#trigger-home").hasClass("icon-cross")){
            $("#testp").css("width", "49.3vw");
            $("#testp").css("right", "30.2%");
            $("#add-testp").css("right", "0");
        }else if(window.matchMedia("(max-width: 1023px)").matches){
            $("#add-testp").css("right", "50%");
        }else{
            $("#testp").css("width", "64.7vw");
            $("#testp").css("right", "30.2%");
            $("#add-testp").css("right", "0");
        }
    });

    $("#close-add-testp").click(function(){
        $("#add-testp").css("right", "-100%");
        $("#testp").css("right", "0");
        if($("#trigger-home").hasClass("icon-cross")){
            $("#testp").css("width", "79.5vw");
        }else if(window.matchMedia("(max-width: 1023px)").matches){
            $("#add-testp").css("right", "-100%");
        }else{
            $("#testp").css("width", "94.7vw");
        }

    });

    //PREPARADOR ESCRIBIR MENSAJE

    $("#new-mensajesp").click(function(){
        if($("#trigger-home").hasClass("icon-cross")){
            $("#mensajesp").css("width", "49.3vw");
            $("#mensajesp").css("right", "30.2%");
            $("#add-mensajesp").css("right", "0");
        }else if(window.matchMedia("(max-width: 1023px)").matches){
            $("#add-mensajesp").css("right", "50%");
        }else{
            $("#mensajesp").css("width", "64.7vw");
            $("#mensajesp").css("right", "30.2%");
            $("#add-mensajesp").css("right", "0");
        }
    });

    $("#close-add-mensajesp").click(function(){
        $("#add-mensajesp").css("right", "-100%");
        $("#mensajesp").css("right", "0");
        if($("#trigger-home").hasClass("icon-cross")){
            $("#mensajesp").css("width", "79.5vw");
        }else if(window.matchMedia("(max-width: 1023px)").matches){
            $("#add-mensajesp").css("right", "-100%");
        }else{
            $("#mensajesp").css("width", "94.7vw");
        }

    });

    //PREPARADOR COMPRAR BONO

    $("#new-bonosp").click(function(){
        if($("#trigger-home").hasClass("icon-cross")){
            $("#bonosp").css("width", "49.3vw");
            $("#bonosp").css("right", "30.2%");
            $("#add-bonosp").css("right", "0");
        }else if(window.matchMedia("(max-width: 1023px)").matches){
            $("#add-bonosp").css("right", "50%");
        }else{
            $("#bonosp").css("width", "64.7vw");
            $("#bonosp").css("right", "30.2%");
            $("#add-bonosp").css("right", "0");
        }
    });

    $("#close-add-bonosp").click(function(){
        $("#add-bonosp").css("right", "-100%");
        $("#bonosp").css("right", "0");
        if($("#trigger-home").hasClass("icon-cross")){
            $("#bonosp").css("width", "79.5vw");
        }else if(window.matchMedia("(max-width: 1023px)").matches){
            $("#add-bonosp").css("right", "50%");
        }else{
            $("#bonosp").css("width", "94.7vw");
        }

    });

    //ACADEMIA ABRIR VENTANAS

    $("#cursosa-trigger").click(function(e) {
        e.preventDefault();
        $("#cursosa").css("width", "79.5vw");
        $("#profesores").css("right", "-100%");
        $("#mensajesa").css("right", "-100%");
        $("#alumnos").css("right", "-100%");
        $("#bonosa").css("right", "-100%");
        $("#cursosa").css("right", "0");
        $("#add-profesores").css("right", "-100%");
        $("#add-mensajesa").css("right", "-100%");
        $("#add-alumnos").css("right", "-100%");
        $("#add-bonosa").css("right", "-100%");
        $(".feeds").css("display","none");
    });

    $("#profesores-trigger").click(function(e) {
        e.preventDefault();
        $("#profesores").css("width", "79.5vw");
        $("#cursosa").css("right", "-100%");
        $("#mensajesa").css("right", "-100%");
        $("#alumnos").css("right", "-100%");
        $("#bonosa").css("right", "-100%");
        $("#profesores").css("right", "0");
        $("#add-cursosa").css("right", "-100%");
        $("#add-mensajesa").css("right", "-100%");
        $("#add-alumnos").css("right", "-100%");
        $("#add-bonosa").css("right", "-100%");
        $(".feeds").css("display","none");
    });

    $("#mensajesa-trigger").click(function(e) {
        e.preventDefault();
        $("#mensajesa").css("width", "79.5vw");
        $("#cursosa").css("right", "-100%");
        $("#profesores").css("right", "-100%");
        $("#alumnos").css("right", "-100%");
        $("#bonosa").css("right", "-100%");
        $("#mensajesa").css("right", "0");
        $("#add-cursosa").css("right", "-100%");
        $("#add-profesores").css("right", "-100%");
        $("#add-alumnos").css("right", "-100%");
        $("#add-bonosa").css("right", "-100%");
        $(".feeds").css("display","none");
    });

    $("#alumnos-trigger").click(function(e) {
        e.preventDefault();
        $("#alumnos").css("width", "79.5vw");
        $("#cursosa").css("right", "-100%");
        $("#profesores").css("right", "-100%");
        $("#mensajesa").css("right", "-100%");
        $("#bonosa").css("right", "-100%");
        $("#alumnos").css("right", "0");
        $("#add-cursosa").css("right", "-100%");
        $("#add-profesores").css("right", "-100%");
        $("#add-mensajesa").css("right", "-100%");
        $("#add-bonosa").css("right", "-100%");
        $(".feeds").css("display","none");
    });

    $("#bonosa-trigger").click(function(e) {
        e.preventDefault();
        $("#bonosa").css("width", "79.5vw");
        $("#cursosa").css("right", "-100%");
        $("#profesores").css("right", "-100%");
        $("#mensajesa").css("right", "-100%");
        $("#alumnos").css("right", "-100%");
        $("#bonosa").css("right", "0");
        $("#add-cursosa").css("right", "-100%");
        $("#add-profesores").css("right", "-100%");
        $("#add-mensajesa").css("right", "-100%");
        $("#add-alumnos").css("right", "-100%");
        $(".feeds").css("display","none");
    });

    //ACADEMIA CERRAR VENTANAS

    $("#close-cursosa").click(function(e) {
        $(".feeds").css("display","block");
        $("#add-cursosa").css("right", "-100%");
        $("#cursosa").css("right", "-100%");
        $("#cursosa").css("width", "94.7vw");

        if(window.matchMedia("(max-width: 1023px)").matches){
            $(".block").css("display","block");
            $(".full-block").css("display","block");
        }

    });

    $("#close-profesores").click(function(e) {
        $(".feeds").css("display","block");
        $("#add-profesores").css("right", "-100%");
        $("#profesores").css("right", "-100%");
        $("#profesores").css("width", "94.7vw");

        if(window.matchMedia("(max-width: 1023px)").matches){
            $(".block").css("display","block");
            $(".full-block").css("display","block");
        }

    });

    $("#close-mensajesa").click(function(e) {
        $(".feeds").css("display","block");
        $("#add-mensajesa").css("right", "-100%");
        $("#mensajesa").css("right", "-100%");
        $("#mensajesa").css("width", "94.7vw");

        if(window.matchMedia("(max-width: 1023px)").matches){
            $(".block").css("display","block");
            $(".full-block").css("display","block");
        }

    });

    $("#close-alumnos").click(function(e) {
        $(".feeds").css("display","block");
        $("#add-alumnos").css("right", "-100%");
        $("#alumnos").css("right", "-100%");
        $("#alumnos").css("width", "94.7vw");

        if(window.matchMedia("(max-width: 1023px)").matches){
            $(".block").css("display","block");
            $(".full-block").css("display","block");
        }

    });

    $("#close-bonosa").click(function(e) {
        $(".feeds").css("display","block");
        $("#add-bonosa").css("right", "-100%");
        $("#bonosa").css("right", "-100%");
        $("#bonosa").css("width", "94.7vw");

        if(window.matchMedia("(max-width: 1023px)").matches){
            $(".block").css("display","block");
            $(".full-block").css("display","block");
        }

    });

    //ACADEMIA AÑADIR CURSO

    $("#new-cursosa").click(function(){
        if($("#trigger-home").hasClass("icon-cross")){
            $("#cursosa").css("width", "49.3vw");
            $("#cursosa").css("right", "30.2%");
            $("#add-cursosa").css("right", "0");
        }else if(window.matchMedia("(max-width: 1023px)").matches){
            $("#add-cursosa").css("right", "50%");
        }else{
            $("#cursosa").css("width", "64.7vw");
            $("#cursosa").css("right", "30.2%");
            $("#add-cursosa").css("right", "0");
        }
    });

    $("#close-add-cursosa").click(function(){
        $("#add-cursosa").css("right", "-100%");
        $("#cursosa").css("right", "0");
        if($("#trigger-home").hasClass("icon-cross")){
            $("#cursosa").css("width", "79.5vw");
        }else if(window.matchMedia("(max-width: 1023px)").matches){
            $("#add-cursosa").css("right", "-100%");
        }else{
            $("#cursosa").css("width", "94.7vw");
        }

    });

    //ACADEMIA AÑADIR PROFESOR

    $("#new-profesores").click(function(){
        if($("#trigger-home").hasClass("icon-cross")){
            $("#profesores").css("width", "49.3vw");
            $("#profesores").css("right", "30.2%");
            $("#add-profesores").css("right", "0");
        }else if(window.matchMedia("(max-width: 1023px)").matches){
            $("#add-profesores").css("right", "50%");
        }else{
            $("#profesores").css("width", "64.7vw");
            $("#profesores").css("right", "30.2%");
            $("#add-profesores").css("right", "0");
        }
    });

    $("#close-add-profesores").click(function(){
        $("#add-profesores").css("right", "-100%");
        $("#profesores").css("right", "0");
        if($("#trigger-home").hasClass("icon-cross")){
            $("#profesores").css("width", "79.5vw");
        }else if(window.matchMedia("(max-width: 1023px)").matches){
            $("#add-profesores").css("right", "-100%");
        }else{
            $("#profesores").css("width", "94.7vw");
        }

    });

    //ACADEMIA AÑADIR MENSAJE

    $("#new-mensajesa").click(function(){
        if($("#trigger-home").hasClass("icon-cross")){
            $("#mensajesa").css("width", "49.3vw");
            $("#mensajesa").css("right", "30.2%");
            $("#add-mensajesa").css("right", "0");
        }else if(window.matchMedia("(max-width: 1023px)").matches){
            $("#add-mensajesa").css("right", "50%");
        }else{
            $("#mensajesa").css("width", "64.7vw");
            $("#mensajesa").css("right", "30.2%");
            $("#add-mensajesa").css("right", "0");
        }
    });

    $("#close-add-mensajesa").click(function(){
        $("#add-mensajesa").css("right", "-100%");
        $("#mensajesa").css("right", "0");
        if($("#trigger-home").hasClass("icon-cross")){
            $("#mensajesa").css("width", "79.5vw");
        }else if(window.matchMedia("(max-width: 1023px)").matches){
            $("#add-mensajesa").css("right", "-100%");
        }else{
            $("#mensajesa").css("width", "94.7vw");
        }

    });

    //ACADEMIA AÑADIR ALUMNOS

    $("#new-alumnos").click(function(){
        if($("#trigger-home").hasClass("icon-cross")){
            $("#alumnos").css("width", "49.3vw");
            $("#alumnos").css("right", "30.2%");
            $("#add-alumnos").css("right", "0");
        }else if(window.matchMedia("(max-width: 1023px)").matches){
            $("#add-alumnos").css("right", "50%");
        }else{
            $("#alumnos").css("width", "64.7vw");
            $("#alumnos").css("right", "30.2%");
            $("#add-alumnos").css("right", "0");
        }
    });

    $("#close-add-alumnos").click(function(){
        $("#add-alumnos").css("right", "-100%");
        $("#alumnos").css("right", "0");
        if($("#trigger-home").hasClass("icon-cross")){
            $("#alumnos").css("width", "79.5vw");
        }else if(window.matchMedia("(max-width: 1023px)").matches){
            $("#add-alumnos").css("right", "-100%");
        }else{
            $("#alumnos").css("width", "94.7vw");
        }

    });

    //ACADEMIA AÑADIR BONOSA

    $("#new-bonosa").click(function(){
        if($("#trigger-home").hasClass("icon-cross")){
            $("#bonosa").css("width", "49.3vw");
            $("#bonosa").css("right", "30.2%");
            $("#add-bonosa").css("right", "0");
        }else if(window.matchMedia("(max-width: 1023px)").matches){
            $("#add-bonosa").css("right", "50%");
        }else{
            $("#bonosa").css("width", "64.7vw");
            $("#bonosa").css("right", "30.2%");
            $("#add-bonosa").css("right", "0");
        }
    });

    $("#close-add-bonosa").click(function(){
        $("#add-bonosa").css("right", "-100%");
        $("#bonosa").css("right", "0");
        if($("#trigger-home").hasClass("icon-cross")){
            $("#bonosa").css("width", "79.5vw");
        }else if(window.matchMedia("(max-width: 1023px)").matches){
            $("#add-bonosa").css("right", "-100%");
        }else{
            $("#bonosa").css("width", "94.7vw");
        }

    });

    $("#form-trigger").change(function() {
        if ($("#form-trigger").val() == "Academia") {
            $("#apellido").css("display", "none");
            $("#apellidoDos").css("display", "none");
            $("#ciudad").css("display", "block");
            $("#direccion").css("display", "block");
            $("#telefono").css("display", "block");
        } else if ($("#form-trigger").val() == "Preparador") {
            $("#apellido").css("display", "block");
            $("#apellidoDos").css("display", "block");
            $("#ciudad").css("display", "none");
            $("#direccion").css("display", "none");
            $("#telefono").css("display", "none");
        } else {   
            $("#apellido").css("display", "block");
            $("#apellidoDos").css("display", "block");
            $("#telefono").css("display", "none");
            $("#preparador").css("display", "none");
            $("#opositor").css("display", "block");
            $("#ciudad").css("display", "none");
            $("#direccion").css("display", "none");
        }
    });

    $(".mensaje-select").change(function(){
        
        if($(".mensaje-select").val() == 'Privado'){
            $(".grupo").css("display","none");
            $(".privado").css("display","block");
        }else{
            $(".grupo").css("display","block");
            $(".privado").css("display","none");
        }
    });

  


}