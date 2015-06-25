/**
 * Created by cyber on 10/03/2015.
 *
 */

    //function ajaxGeModelos(master,slave,masterIds,path) {
    //
    //$.ajax({
    //    url: path,
    //    data: {modelosIds: masterIds},
    //    dataType: 'json',
    //    success: function (json) {
    //        var modelos = JSON.parse(json).modelos;
    //        var options = '';
    //
    //        for (i = 0; i < modelos.length; i++) {
    //            options += '<option value="' + modelos[i].id + '">' + modelos[i].nombre + '</option>';
    //        }
    //
    //        return slave.html(options);
    //    }
    //});
    //}

    function ajaxGetSchedules(master,slave,masterIds,path) {

        $.ajax({
            url: path,
            data: {schedulesIds: masterIds},
            dataType: 'json',
            success: function (json) {
                var schedules = JSON.parse(json).schedules;
                var options = '';

                for (i = 0; i < schedules.length; i++) {
                    options += '<option value="' + schedules[i].id + '">' + schedules[i].name + '</option>';
                }

                return slave.html(options);
            }
        });
    }

    function ajaxGetSchedules2(master, slave, path) {
        $.ajax({
            url: path,
            data: {program: master.val()},
            dataType: 'json',
            success: function (json) {
                var schedules = JSON.parse(json).schedules;
                var options = '';

                for (i = 0; i < schedules.length; i++) {
                    options += '<option value="' + schedules[i].id + '">' + schedules[i].name + '</option>';
                 }

                return slave.html(options);
            }
        });
    }


    function getSelectedComma(){
        var selected = '';
        $('#student_programs option:checked').each(function(){
            selected += $(this).val() + ',';
        });
        return selected.substr( 0, selected.length - 1 ); // elimino la coma final
    }
