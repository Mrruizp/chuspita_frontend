function cargarCbCodigoHorarioEntrega(p_nombreCombo, p_fecha_entrega, p_tipo){ // se carga todos los departamentos en el combo
    $.post
    (
    "../controller/combo.fecha_entrega.listar.controller.php",
        {
            fech_entrega : p_fecha_entrega
        }
    ).done(function(resultado){
    var datosJSON = resultado;
    
        if (datosJSON.estado===200){
            var html = "";
            if (p_tipo==="seleccione"){
                html += '<option value="">-</option>';
            }else{
                html += '<option value="0">Rango de Entrega</option>';
            }
            
            if(datosJSON.datos.length == 0)
                html += '<option value="" class="text-red">SIN CAPACIDAD DE ENVÍO</option>';
            
            $.each(datosJSON.datos, function(i,item) {
               
                    html += '<option value="'+item.id_horario_entrega+'">'+item.fech_entr+'</option>';
            });
            
            $(p_nombreCombo).html(html);
           // cargarCbCodigoDoctor(p_doctor_id, p_nombreCombo, p_tipo);
    }else{
            swal("Mensaje del sistema", resultado , "warning");
        }
    }).fail(function(error){
    var datosJSON = $.parseJSON( error.responseText );
    swal("Error", datosJSON.mensaje , "error");
    });
}

function cargarCbCodigoFormaPago(p_nombreCombo, p_tipo){ // se carga todos los departamentos en el combo
    $.post
    (
    "../controller/combo.forma_pago.listar.controller.php"
    ).done(function(resultado){
    var datosJSON = resultado;
    
        if (datosJSON.estado===200){
            var html = "";
            if (p_tipo==="seleccione"){
                html += '<option value="">-</option>';
            }else{
                html += '<option value="0">Forma de Pago</option>';
            }

            
            $.each(datosJSON.datos, function(i,item) {
                html += '<option value="'+item.id_forma_pago+'">'+item.descripcion+'</option>';
            });
            
            $(p_nombreCombo).html(html);
           // cargarCbCodigoDoctor(p_doctor_id, p_nombreCombo, p_tipo);
    }else{
            swal("Mensaje del sistema", resultado , "warning");
        }
    }).fail(function(error){
    var datosJSON = $.parseJSON( error.responseText );
    swal("Error", datosJSON.mensaje , "error");
    });
}
function cargarCbCodigoDepartamento(p_nombreCombo, p_tipo){ // se carga todos los departamentos en el combo
    $.post
    (
    "../controller/combo.departamento.listar.controller.php"
    ).done(function(resultado){
    var datosJSON = resultado;
    
        if (datosJSON.estado===200){
            var html = "";
            if (p_tipo==="seleccione"){
                html += '<option value="">-</option>';
            }else{
                html += '<option value="0">Lista de Regiones</option>';
            }

            
            $.each(datosJSON.datos, function(i,item) {
                html += '<option value="'+item.cod_region+'">'+item.descripcion+'</option>';
            });
            
            $(p_nombreCombo).html(html);
           // cargarCbCodigoDoctor(p_doctor_id, p_nombreCombo, p_tipo);
    }else{
            swal("Mensaje del sistema", resultado , "warning");
        }
    }).fail(function(error){
    var datosJSON = $.parseJSON( error.responseText );
    swal("Error", datosJSON.mensaje , "error");
    });
}

function cargarCbCodigoProvincia(p_nombreCombo, p_tipo){ // se carga todos los departamentos en el combo
    $.post
    (
    "../controller/combo.provincia.listar.controller.php"
    ).done(function(resultado){
    var datosJSON = resultado;
    
        if (datosJSON.estado===200){
            var html = "";
            if (p_tipo==="seleccione"){
                html += '<option value="">-</option>';
            }else{
                html += '<option value="0">Lista de Provincias</option>';
            }

            
            $.each(datosJSON.datos, function(i,item) {
                html += '<option value="'+item.cod_provincia+'">'+item.descripcion+'</option>';
            });
            
            $(p_nombreCombo).html(html);
           // cargarCbCodigoDoctor(p_doctor_id, p_nombreCombo, p_tipo);
    }else{
            swal("Mensaje del sistema", resultado , "warning");
        }
    }).fail(function(error){
    var datosJSON = $.parseJSON( error.responseText );
    swal("Error", datosJSON.mensaje , "error");
    });
}

function cargarCbCodigoDistrito(p_nombreCombo, p_tipo){ // se carga todos los departamentos en el combo
    $.post
    (
    "../controller/combo.distrito.listar.controller.php"
    ).done(function(resultado){
    var datosJSON = resultado;
    
        if (datosJSON.estado===200){
            var html = "";
            if (p_tipo==="seleccione"){
                html += '<option value="">-</option>';
            }else{
                html += '<option value="0">Lista de Distritos</option>';
            }

            
            $.each(datosJSON.datos, function(i,item) {
                html += '<option value="'+item.cod_distrito+'">'+item.descripcion+'</option>';
            });
            
            $(p_nombreCombo).html(html);
           // cargarCbCodigoDoctor(p_doctor_id, p_nombreCombo, p_tipo);
    }else{
            swal("Mensaje del sistema", resultado , "warning");
        }
    }).fail(function(error){
    var datosJSON = $.parseJSON( error.responseText );
    swal("Error", datosJSON.mensaje , "error");
    });
}

function cargarCbCodigoDistritoLima(p_nombreCombo, p_tipo){ // se carga todos los distritos de la región Lima
    $.post
    (
    "../controller/combo.lima.distrito.listar.controller.php"
    ).done(function(resultado){
    var datosJSON = resultado;
    
        if (datosJSON.estado===200){
            var html = "";
            if (p_tipo==="seleccione"){
                html += '<option value="">-</option>';
            }else{
                html += '<option value="0">Lista de Distritos</option>';
            }

            
            $.each(datosJSON.datos, function(i,item) {
                html += '<option value="'+item.cod_distrito+'">'+item.descripcion+'</option>';
            });
            
            $(p_nombreCombo).html(html);
           // cargarCbCodigoDoctor(p_doctor_id, p_nombreCombo, p_tipo);
    }else{
            swal("Mensaje del sistema", resultado , "warning");
        }
    }).fail(function(error){
    var datosJSON = $.parseJSON( error.responseText );
    swal("Error", datosJSON.mensaje , "error");
    });
}

function cargarCbCodigoProvinciaDepartamento(p_provincia_id, p_nombreCombo_departamento, p_tipo){
    $.post
    (
        "../controller/comboCodigoProvinciaDepartamento.php",
        {
            p_codigo_departamento: p_nombreCombo_departamento
        }

    ).done(function(resultado){
    var datosJSON = resultado;
    
        if (datosJSON.estado===200){
            var html = "";
            if (p_tipo==="seleccione"){
                html += '<option value="">-</option>';
            }else{
                html += '<option value="0">Todas las áreas</option>';
            }

            
            $.each(datosJSON.datos, function(i,item) {
                html += '<option value="'+item.cod_provincia+'">'+item.descripcion+'</option>';
            });
            
            $(p_provincia_id).html(html);
    }else{
            swal("Mensaje del sistema", resultado , "warning");
        }
    }).fail(function(error){
    var datosJSON = $.parseJSON( error.responseText );
    swal("Error", datosJSON.mensaje , "error");
    });
}

function cargarCbCodigoDistritoProvincia(p_distrito_id, p_nombreCombo_provincia, p_tipo){
    $.post
    (
        "../controller/comboCodigoDistritoProvincia.php",
        {
            p_codigo_provincia: p_nombreCombo_provincia
        }

    ).done(function(resultado){
    var datosJSON = resultado;
    
        if (datosJSON.estado===200){
            var html = "";
            if (p_tipo==="seleccione"){
                html += '<option value="">-</option>';
            }else{
                html += '<option value="0">Todas las áreas</option>';
            }

            
            $.each(datosJSON.datos, function(i,item) {
                html += '<option value="'+item.cod_distrito+'">'+item.descripcion+'</option>';
            });
            
            $(p_distrito_id).html(html);
    }else{
            swal("Mensaje del sistema", resultado , "warning");
        }
    }).fail(function(error){
    var datosJSON = $.parseJSON( error.responseText );
    swal("Error", datosJSON.mensaje , "error");
    });
}