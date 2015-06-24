/**
 * Created by cyber on 10/03/2015.
 *
 */

    function ajaxGeModelos(master,slave,masterIds,path) {

    $.ajax({
        url: path,
        data: {modelosIds: masterIds},
        dataType: 'json',
        success: function (json) {
            var modelos = JSON.parse(json).modelos;
            var options = '';

            for (i = 0; i < modelos.length; i++) {
                options += '<option value="' + modelos[i].id + '">' + modelos[i].nombre + '</option>';
            }

            return slave.html(options);
        }
    });
    }

    function ajaxGetEspecialidades(slave,masterIds,path){
        $.ajax({
            url: path,
            data: { tiposTallerIds : masterIds },
            dataType: 'json',
            success: function(json) {
                var especialidades = JSON.parse(json).especialidades;
                if (especialidades.length==0){
                    $('#especialidOblig').removeClass('visible');
                    $('#especialidOblig').addClass('hidden');
                    $('#taller_especialidades').removeAttr('required')
                }
                if (especialidades.length>0){
                    $('#especialidOblig').removeClass('hidden');
                    $('#especialidOblig').addClass('visible');
                    $('#taller_especialidades').attr('required', 'required');
                }

                var options = '';
                for (i = 0; i < especialidades.length; i++) {
                    options += '<option value="'+especialidades[i].id+'">'+especialidades[i].nombre+'</option>';
                }

                slave.html(options);
        }
    });
    }

    function ajaxGetComunas(region,comuna,path){
        $.ajax({
            url: path,
            data: { regionId: region.val()},
            dataType: 'json',
            success: function (json) {
                var comunas = JSON.parse(json).comunas;
                var options = '';
                for (i = 0; i < comunas.length ; i++) {
                    options += '<option value="'+comunas[i].id+'">' + comunas[i].nombre + '</option>';
                }

                return comuna.html(options);
            }
        });
    }

    function dateDiff(date1,date2,interval) {
        var second=1000, minute=second*60, hour=minute*60, day=hour*24, week=day*7;
        date1 = new Date(date1);
        date2 = new Date(date2);
        var timediff = date2 - date1;
        if (isNaN(timediff)) return NaN;
        switch (interval) {
            case "years": return date2.getFullYear() - date1.getFullYear();
            case "months": return (
            ( date2.getFullYear() * 12 + date2.getMonth() )
            -
            ( date1.getFullYear() * 12 + date1.getMonth() )
            );
            case "weeks"  : return Math.floor(timediff / week);
            case "days"   : return Math.floor(timediff / day);
            case "hours"  : return Math.floor(timediff / hour);
            case "minutes": return Math.floor(timediff / minute);
            case "seconds": return Math.floor(timediff / second);
            default: return undefined;
        }
    }

    function getSelectedComma(){
        var selected = '';
        $('#mensaje_marcas option:checked').each(function(){
            selected += $(this).val() + ',';
        });
        return selected.substr( 0, selected.length - 1 ); // elimino la coma final
    }

    function dbError(){
        $('#monto-result').hide();
    }

    function ajaxGetDiasMensaje(_distancia, _dias, _path){
        $.ajax({
            url: _path,
            data: { distancia: _distancia.val() },
            dataType: 'json',
            success: function(json) {
                // Data processing code
                var dias = JSON.parse(json).diasDistanciaArray;
                var options = "<option value=''></option>";

                for (i = 0; i < dias.length; i++) {
                    options += '<option value="'+dias[i].dias+'">'+dias[i].dias+'</option>';
                }

                return _dias.html(options);
            }
        });
    }

    function ajaxGetTalleres(_empresa, _talleres, _path){
        $.ajax({
            url: _path,
            data: { empresa: _empresa.val() },
            dataType: 'json',
            success: function(json) {
                // Data processing code
                var t = JSON.parse(json).talleresArray;
                var options = '';

                for (i = 0; i < t.length ; i++) {
                    options += '<option value="'+t[i].id+'">' + t[i].nombre + '</option>';
                }

               return _talleres.html(options);
            }
        });
    }

    function showExpandirMarca(){
        $('#modelos-tab').fadeIn();
        $('#dias-row').fadeIn();
        $('#distancia-row').hide();
    //                $('#mensaje_monto').val('');     //---limpia el monto de la entidad
        $('#monto').html($('#mensaje_monto').val());
        $('#mensaje_distancia').val(''); //---limpia la distancia de la entidad
        $('#tab-inicio-termino').fadeIn();

    }

    function showExpandirDistancia(){
        $('#modelos-tab').hide();
        $('#dias-row').hide();
        $('#distancia-row').fadeIn();
    //  $('#mensaje_monto').val('');      //---limpia el monto de la entidad
        //$('#mensaje_distancia').val('');  //---limpia la distancia de la entidad (ojo, lo comentarie)
        $('#tab-inicio-termino').fadeIn();
        $('#monto').html($('#mensaje_monto').val()); // ojo
    }

    function ajaxGetMontoMensajeDistancia(_diasMensaje,  _distanciaMensaje, _fechaInicio, _fechaFin, _path){
        $.ajax({
            url: _path,
            data: { dias: _diasMensaje.val(), distancia: _distanciaMensaje.val(), inicio: _fechaInicio.val() },
            dataType: 'json',
            success: function(json) {
                // Data processing code
                var response = JSON.parse(json);

                if (response.result == '1'){
                    _fechaFin.val(response.fin);
                    $('#monto').html(response.monto);
                    $('#mensaje_monto').val(response.monto); //---guarda el monto en la entidad
                    $('#mensaje_distancia').val(_distanciaMensaje.val());//---guarda la distancia en la entidad
                    $('#monto-result').fadeIn();
                    $('#monto-error').hide();
                } else {

                    $('#dias-error').html(_diasMensaje.val());
                    $('#monto-result').hide();
                    $('#monto-error').fadeIn();
                }
            }
        });
    }

    function ajaxGetMontoMensajeModelo(_fechaInicio, _fechaFin, _dias, _path){
        $.ajax({
            url: _path,
            data: { inicio: _fechaInicio.val(), dias: _dias.val() },
            dataType: 'json',
            success: function(json) {
            // Data processing code
            var response = JSON.parse(json);

            if (response.result == '1'){
                _fechaFin.val(response.fin);
                $('#monto').html(response.monto);
                $('#mensaje_monto').val(response.monto); //---guarda el monto en la entidad
                $('#monto-result').fadeIn();
            } else  dbError();

        }
    });
    }

    function ajaxGetMontoBanner(_fechaInicio, _fechaFin, _path){
        $.ajax({
            url: _path,
            data: { inicio: _fechaInicio.val(), fin: _fechaFin.val() },
            dataType: 'json',
            success: function(json) {
                // Data processing code
                var response = JSON.parse(json);

                if (response.result == '1'){
                    $('#monto-result').fadeIn();
                    $('#monto-error').hide();
                    $('#dias').html(response.dias);
                    $('#monto').html(response.monto);
                    $('#banner_monto').val(response.monto); //---guarda el monto en la entidad
                } else {
                    $('#monto-result').hide();
                    $('#monto-error').fadeIn();
                    $('#dias-error').html(response.dias);
                }
            }
        });
    }

    function ajaxGetSucursales(_empresaeds, _sucursales, _path){
        $.ajax({
            url: _path,
            data: { empresaeds: _empresaeds.val() },
            dataType: 'json',
            success: function(json) {
                // Data processing code
                var t = JSON.parse(json).sucursalesArray;
                var options = '';

                for (i = 0; i < t.length ; i++) {
                    options += '<option value="'+t[i].id+'">' + t[i].nombre + '</option>';
                }

                return _sucursales.html(options);
            }
        });
    }