//Filas clickeables
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});

//Inicio

function cambiarClave(){
    $('.formEditTxtInicio').hide(300);
    $('.formEditPassword').show(300);
}

function editarTextoInicio(){
    $('.formEditPassword').hide(300);
    $('.formEditTxtInicio').show(300);
}

function cancelarInicio(){
    $('.formEditPassword').hide(300);
    $('.formEditTxtInicio').hide(300);
}

//Servicios

function editarTextoServicios(){
    $('.formAddServicios').hide(300);
    $('.formEditServicios').hide(300);
    $('.formDeleteServicios').hide(300);
    $('.formEditTxtServicios').show(300);
}

function agregarServicios(){
    $('.formEditTxtServicios').hide(300);
    $('.formEditServicios').hide(300);
    $('.formDeleteServicios').hide(300);
    $('.formAddServicios').show(300);
}

function editarServicios(servicios){
    //Cargar servicios
    if($('#SelEditServicios').children('option').length==0){
      for(var i = 0; i<servicios.length; ++i){
        $('#SelEditServicios').append('<option value="'+ servicios[i].id +'">'+ servicios[i].nombreEs +'</option>');
      }
      if(servicios.length>0){
      //LLenar datos del servicio
      $('#NombreEditServiciosEs').val(servicios[0].nombreEs);
      $('#NombreEditServiciosEn').val(servicios[0].nombreEn);
      $('#DescEditServiciosEs').val(servicios[0].descripcionEs);
      $('#DescEditServiciosEn').val(servicios[0].descripcionEn);
      $('#IconoEditServicios').val(servicios[0].icono);
      }
    }
    $('.formEditTxtServicios').hide(300);
    $('.formAddServicios').hide(300);
    $('.formDeleteServicios').hide(300);
    $('.formEditServicios').show(300);
}

function llenarEditServicios(servicios){
    //Vaciar campos
    $('#NombreEditServiciosEs').empty();
    $('#NombreEditServiciosEn').empty();
    $('#DescEditServiciosEs').empty();
    $('#DescEditServiciosEn').empty();

    //Buscar servicio
    var servicio;
    for(var i = 0; i<servicios.length; ++i){
      if(servicios[i].id==$('#SelEditServicios').find(":selected").val()){
        servicio=servicios[i];
      }
    }

    //Llenar campos
    $('#NombreEditServiciosEs').val(servicio.nombreEs);
    $('#NombreEditServiciosEn').val(servicio.nombreEn);
    $('#DescEditServiciosEs').val(servicio.descripcionEs);
    $('#DescEditServiciosEn').val(servicio.descripcionEn);
    $('#IconoEditServicios').val(servicio.icono);

}

function eliminarServicios(servicios){
    //Cargar servicios
    if($('#SelDeleteServicios').children('option').length==0){
      for(var i = 0; i<servicios.length; ++i){
        $('#SelDeleteServicios').append('<option value="'+ servicios[i].id +'">'+ servicios[i].nombreEs +'</option>');
      }
    }
    $('.formEditTxtServicios').hide(300);
    $('.formAddServicios').hide(300);
    $('.formEditServicios').hide(300);
    $('.formDeleteServicios').show(300);
}

function cancelarServicios(){
    $('.formEditTxtServicios').hide(300);
    $('.formAddServicios').hide(300);
    $('.formEditServicios').hide(300);
    $('.formDeleteServicios').hide(300);
}

//Equipo

function editarTextoEquipo(){
    $('.formAddEquipo').hide(300);
    $('.formEditEquipo').hide(300);
    $('.formDeleteEquipo').hide(300);
    $('.formEditTxtEquipo').show(300);
}

function agregarEquipo(){
    $('.formEditTxtEquipo').hide(300);
    $('.formEditEquipo').hide(300);
    $('.formDeleteEquipo').hide(300);
    $('.formAddEquipo').show(300);
}

function editarEquipo(equipo){
    //Cargar equipo
    if($('#SelEditEquipo').children('option').length==0){
      for(var i = 0; i<equipo.length; ++i){
        $('#SelEditEquipo').append('<option value="'+ equipo[i].id +'">'+ equipo[i].nombre +'</option>');
      }
      if(equipo.length>0){
      //LLenar datos del miembro
      $('#NombreEditEquipo').val(equipo[0].nombre);
      $('#CargoEditEquipoEs').val(equipo[0].cargoEs);
      $('#CargoEditEquipoEn').val(equipo[0].cargoEn);
      $('#CorreoEditEquipo').val(equipo[0].email);
      }
    }
    $('.formEditTxtEquipo').hide(300);
    $('.formAddEquipo').hide(300);
    $('.formDeleteEquipo').hide(300);
    $('.formEditEquipo').show(300);
}

function llenarEditEquipo(equipo){
    //Vaciar campos
    $('#NombreEditEquipo').empty();
    $('#CargoEditEquipoEs').empty();
    $('#CargoEditEquipoEn').empty();
    $('#CorreoEditEquipo').empty();

    //Buscar miembro
    var eq;
    for(var i = 0; i<equipo.length; ++i){
      if(equipo[i].id==$('#SelEditEquipo').find(":selected").val()){
        eq=equipo[i];
      }
    }

    //Llenar campos del miembro
    $('#NombreEditEquipo').val(eq.nombre);
    $('#CargoEditEquipoEs').val(eq.cargoEs);
    $('#CargoEditEquipoEn').val(eq.cargoEn);
    $('#CorreoEditEquipo').val(eq.email);
}

function eliminarEquipo(equipo){
    //Cargar equipo
    if($('#SelDeleteEquipo').children('option').length==0){
      for(var i = 0; i<equipo.length; ++i){
        $('#SelDeleteEquipo').append('<option value="'+ equipo[i].id +'">'+ equipo[i].nombre +'</option>');
      }
    }
    $('.formEditTxtEquipo').hide(300);
    $('.formAddEquipo').hide(300);
    $('.formEditEquipo').hide(300);
    $('.formDeleteEquipo').show(300);
}

function cancelarEquipo(){
    $('.formEditTxtEquipo').hide(300);
    $('.formAddEquipo').hide(300);
    $('.formEditEquipo').hide(300);
    $('.formDeleteEquipo').hide(300);
}

//Experiencia

$('#fileToUploadAddExp').bind('change', function() { var fileName = ''; fileName = $(this).val(); $('#file-selectedAddExp').html(fileName.split("C:\\fakepath\\")); })

$('#fileToUploadEditExp').bind('change', function() { var fileName = ''; fileName = $(this).val(); $('#file-selectedEditExp').html(fileName.split("C:\\fakepath\\")); })

function editarTextoExperiencia(){
    $('.formAddExperiencia').hide(300);
    $('.formEditExperiencia').hide(300);
    $('.formDeleteExperiencia').hide(300);
    $('.formEditTxtExperiencia').show(300);
}

function agregarExperiencia(){
    $('.formEditTxtExperiencia').hide(300);
    $('.formEditExperiencia').hide(300);
    $('.formDeleteExperiencia').hide(300);
    $('.formAddExperiencia').show(300);
}

function editarExperiencia(experiencia){
    //Cargar experiencia
    if($('#SelEditExperiencia').children('option').length==0){
      for(var i = 0; i<experiencia.length; ++i){
        $('#SelEditExperiencia').append('<option value="'+ experiencia[i].id +'">'+ experiencia[i].tituloEs +'</option>');
      }
      if(experiencia.length>0){
      //LLenar datos del elemento
      $('#NombreEditExperienciaEs').val(experiencia[0].tituloEs);
      $('#NombreEditExperienciaEn').val(experiencia[0].tituloEn);
      $('#DescEditExperienciaEs').val(experiencia[0].textoEs);
      $('#DescEditExperienciaEn').val(experiencia[0].textoEn);
      }
    }
    $('.formEditTxtExperiencia').hide(300);
    $('.formAddExperiencia').hide(300);
    $('.formDeleteExperiencia').hide(300);
    $('.formEditExperiencia').show(300);
}

function llenarEditExperiencia(experiencia){
    //Vaciar campos
    $('#NombreEditExperienciaEs').empty();
    $('#NombreEditExperienciaEn').empty();
    $('#DescEditExperienciaEs').empty();
    $('#DescEditExperienciaEn').empty();

    //Buscar elemento
    var elemento;
    for(var i = 0; i<experiencia.length; ++i){
      if(experiencia[i].id==$('#SelEditExperiencia').find(":selected").val()){
        elemento=experiencia[i];
      }
    }

    //Llenar campos
    $('#NombreEditExperienciaEs').val(elemento.tituloEs);
    $('#NombreEditExperienciaEn').val(elemento.tituloEn);
    $('#DescEditExperienciaEs').val(elemento.textoEs);
    $('#DescEditExperienciaEn').val(elemento.textoEn);
}

function eliminarExperiencia(experiencia){
    //Cargar elemento
    if($('#SelDeleteExperiencia').children('option').length==0){
      for(var i = 0; i<experiencia.length; ++i){
        $('#SelDeleteExperiencia').append('<option value="'+ experiencia[i].id +'">'+ experiencia[i].tituloEs +'</option>');
      }
    }
    $('.formEditTxtExperiencia').hide(300);
    $('.formAddExperiencia').hide(300);
    $('.formEditExperiencia').hide(300);
    $('.formDeleteExperiencia').show(300);
}

function cancelarExperiencia(){
    $('.formEditTxtExperiencia').hide(300);
    $('.formAddExperiencia').hide(300);
    $('.formEditExperiencia').hide(300);
    $('.formDeleteExperiencia').hide(300);
}

$('#fileToUploadEditExp').bind('change', function() { $('#WarningExperiencia').hide(300); })

//Mensajes

function editarTextoMensajes(){
    $('.formEditTxtMensajes').show(300);
}

function cancelarMensajes(){
    $('.formEditTxtMensajes').hide(300);
}

function responderMensaje(){
    $('.formResponderMensaje').show(300);
}

function cancelarMensaje(){
    $('.formResponderMensaje').hide(300);
}

//Footer

function editarDatos(){
    $('.formAddVinculo').hide(300);
    $('.formEditVinculo').hide(300);
    $('.formDeleteVinculo').hide(300);
    $('.formEditDatos').show(300);
}

function agregarVinculo(){
    $('.formEditDatos').hide(300);
    $('.formEditVinculo').hide(300);
    $('.formDeleteVinculo').hide(300);
    $('.formAddVinculo').show(300);
}

function editarVinculo(vinculos){
    //Cargar vinculos
    if($('#SelEditVinculo').children('option').length==0){
      for(var i = 0; i<vinculos.length; ++i){
        $('#SelEditVinculo').append('<option value="'+ vinculos[i].id +'">'+ vinculos[i].nombre +'</option>');
      }
      if(vinculos.length>0){
      //LLenar datos del vínculo
      $('#NombreEditVinculo').val(vinculos[0].nombre);
      $('#VinculoEditVinculo').val(vinculos[0].vinculo);
      $('#IconoEditVinculo').val(vinculos[0].icono);
      }
    }
    $('.formEditDatos').hide(300);
    $('.formAddVinculo').hide(300);
    $('.formDeleteVinculo').hide(300);
    $('.formEditVinculo').show(300);
}

function llenarEditVinculo(vinculos){
    //Vaciar campos
    $('#NombreEditVinculo').empty();
    $('#VinculoEditVinculo').empty();

    //Buscar vínculo
    var vinculo;
    for(var i = 0; i<vinculos.length; ++i){
      if(vinculos[i].id==$('#SelEditVinculo').find(":selected").val()){
        vinculo=vinculos[i];
      }
    }

    //Llenar campos
    $('#NombreEditVinculo').val(vinculo.nombre);
    $('#VinculoEditVinculo').val(vinculo.vinculo);
    $('#IconoEditVinculo').val(vinculo.icono);

}

function eliminarVinculo(vinculos){
    //Cargar vinculos
    if($('#SelDeleteVinculo').children('option').length==0){
      for(var i = 0; i<vinculos.length; ++i){
        $('#SelDeleteVinculo').append('<option value="'+ vinculos[i].id +'">'+ vinculos[i].nombre +'</option>');
      }
    }
    $('.formEditDatos').hide(300);
    $('.formAddVinculo').hide(300);
    $('.formEditVinculo').hide(300);
    $('.formDeleteVinculo').show(300);
}

function cancelarFooter(){
    $('.formEditDatos').hide(300);
    $('.formAddVinculo').hide(300);
    $('.formEditVinculo').hide(300);
    $('.formDeleteVinculo').hide(300);
}
