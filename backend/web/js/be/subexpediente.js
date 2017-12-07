/**
 * Created by J&D on 23/11/2017.
 */


$('#subexpediente').change(function () {
    var file = $(this).val();

    $.get('?r=litigante/pj-sub-expediente/getexpediente', {id_file: file}, function (data) {

        console.log(data);
        var data = $.parseJSON(data);

        var file = data.split('-');

        file[2] = parseInt(file[2]) + 1;

        file = file.join('-');

        $('#pjsubexpediente-sub_expediente').attr('value', file);
    });
});