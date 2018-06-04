$(document).ready(Inicio);

function Inicio()
{
    $('#enviarRegister').click(ValidarRegistro);
    $('#acceder').click(ValidarLogin);
    $('#subirCurso').click(EnviarCurso);
    $('.eliminarCurso').click(EliminarCurso);
    $(".leer-mensaje").click(LeerMensaje);
    $(".leer-entrada").click(LeerEntrada);
    // $("#buscarPreparadorOpositor").click(BuscarPreparador);
}

function ValidarRegistro(e)
{
    
    if($('#name').val() == ""){
        e.preventDefault();
        $('#errorNombre').css("display","block");     
    }

    if($('#email').val() == ""){
        e.preventDefault();
        $('#correoObligatorio').css("display","block");     
    }

    if($('#password').val() == ""){
        e.preventDefault();
        $('#passwordObligatorio').css("display","block");
        $('#passwordObligatorio').text("Introducir una contraseña");      
    }

    if($('#password').val().length < 6 || $('#password').val().length > 20 ){
        e.preventDefault();
        $('#passwordObligatorio').css("display","block");
        $('#passwordObligatorio').text("La contraseña tiene que tener minimo 6 caracteres y maximo 20");      
    }

    if($('#password-confirm').val() != $('#password').val()){
        e.preventDefault();
        $('#passwordConfirm').css("display","block");
        $('#passwordConfirm').text("Las dos contraseña no coinciden");      
    }

    if($('#image').val() ==""){
        e.preventDefault();
        $('#imagenObligatoria').css("display","block");
        $('#imagenObligatoria').text("Subir una imagen de perfil"); 
             
    }
    var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
    
    if ($.inArray($('#image').val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        $('#imagenObligatoria').css("display","block");
        $('#imagenObligatoria').text("EL archivo tiene que ser una imagen"); 
    }

    
}

// VALIDAR LOGIN

function ValidarLogin(e)
{
    if($('#email').val() == ""){
        e.preventDefault();
        $('#correoObligatorio').css("display","block");     
    }

    if($('#password').val() == ""){
        e.preventDefault();
        $('#passwordObligatorio').css("display","block");
        $('#passwordObligatorio').text("Introducir una contraseña");      
    }
}

//ENVIAR CURSO

function EnviarCurso(e)
{
    e.preventDefault();
    
    var token = $("#tokenCurso").val();
    var url = $("#crearCurso").attr('action');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        async: false,
        data: $('#crearCurso').serialize(),
        success: function(data){
            $("#cursoCreado").html(data['mensaje']).show();
            $("#box-cursos").html("");
            for(var i = 0; i < data.element.length; i++){
                var contentBox = $("<div class='content-box'></div>");
                var headerBox = $("<div class='box-header'></div>");
                var titulo = $("<h4>" + data.element[i].oposicione['descripcion'] + "</h4>" );
                var precio = $("<span>" + data.element[i]['precio'] + "€mes</span>" )
                console.log(data.element[i]['precio']);
                headerBox.append(titulo);
                headerBox.append(precio);
                contentBox.append(headerBox);
                var boxDescription = $("<div class='box-description'></div>");
                var descripcion = $("<p>" + data.element[i]['descripcion'] + "</p>" );
                boxDescription.append(descripcion);
                contentBox.append(boxDescription);
                var bottomBox = $("<div class='box-bottom'></div>");
                var modificar = $("<a href=''>modificar</a>" );
                var eliminar = $("<a href=''>eliminar</a>" );
                bottomBox.append(modificar);
                bottomBox.append(eliminar);
                contentBox.append(bottomBox);
                $("#box-cursos").append(contentBox);
            }


        }
    });
}

function EliminarCurso(e){
    e.preventDefault();

    var url = $(".eliminar-curso").attr('action');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        async: false,
        data: $('.eliminar-curso').serialize(),
    });
}

function BuscarPreparador(e)
{
    e.preventDefault();

    var url = $("#buscar-preparador-opositor").attr('action');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        async: false,
        data: $('#buscar-preparador-opositor').serialize(),
        success: function(data){
            var resultados = $("#resultados");
            for(var i = 0; i < data.element.length; i++){
                var busquedaLayout = $("<div class='busqueda-layout'></div>");
                var leftLayout = $("<div class='layout-left col-md-2'></div>");
                var img = $("<img src='http://localhost:8000/storage/"+ data.element[i].user['image'] + "' alt=''>");
                var span = $("<span>" +data.element[i].user['name'] + " "+ data.element[i].user['apellido']+" "+data.element[i].user['apellidoDos'] + "</span>")
                leftLayout.append(img);
                leftLayout.append(span);
                busquedaLayout.append(leftLayout);
                var centerLayout = $("<div class='layout-center col-md-7'></div>");
                var h5 = $("<h5>"+data.element[i].oposicione['descripcion']+"</h5>")
                var p = $("<p>"+data.element[i]['descripcion']+"</p>");
                centerLayout.append(h5);
                centerLayout.append(p);
                busquedaLayout.append(centerLayout);
                var rightLayout = $("<div class='layout-center col-md-7'></div>");
                var spanresultado = $("<span>"+data.element[i]['precio']+"€</span>")
                rightLayout.append(spanresultado);
                var form = $("<form action='http://localhost:8000/paypal' method='POST' id='payment-form'></form>");
                
                var input =$("<input type='hidden' name='_token' value='C9OtqUsaarpvpTzYmXuBCLeIAoB0uxkFHMvarlyy'><input type='text' name='amount' id='amount' value=''"+data.element[i]['precio']+"' hidden><input type='text' name='idPreparador' id='idPreparador' value='"+data.element[i]['user_id']+"' hidden><input type='text' name='nombreCurso' id='nombreCurso' value='"+data.element[i].oposicione['descripcion'] +"' hidden><input type='text' name='idCurso' id='idCurso' value='"+data.element[i]['id']+"' hidden><button>comprar</button>")
                form.append(input);
                rightLayout.append(form);

                busquedaLayout.append(rightLayout);
                resultados.append(busquedaLayout);
            }
            console.log(data);
        }
    });
    
}

function LeerMensaje(e)
{
    e.preventDefault();

    var url = $(this).attr('action');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        async: false,
        data: $(this).serialize(),
        success: function(data){
            $("#mensaje-space").css("right","0px");
            $(".corpo-mensaje").html("");
            $(".parte-escondida").html("");
            for(var i = 0; i < data.element.length; i++){
                var p = data.element[i]['mensaje'];
                $(".corpo-mensaje").append(p);
                var input = $("<input type='text' name='idPersonal' value='"+data.element[i]['user_id']+"' hidden>");
                $(".parte-escondida").append(input);
            }
            console.log(data);
        }
    });
}

function LeerEntrada(e)
{
    e.preventDefault();

    var url = $(this).attr('action');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        async: false,
        data: $(this).serialize(),
        success: function(data){
            $("#entrada-space").css("right","0px");
            for(var i = 0; i < data.element.length; i++){
                var img =$("<img src='../storage/"+data.element[i]['portada']+"'>") ;
                $(".espacio-entrada").append(img);
                var p = $("<p>"+data.element[i]['contenido']+"</p>");
                $(".espacio-entrada").append(p);
            }
            console.log(data);
        }
    });
}