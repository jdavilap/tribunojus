/**
 * Created by J&D on 02/12/2017.
 */

$('#accion_anexo').click(function () {
    $('#modal_anexo').modal('show')
        .find('#modal_content_anexo')
        .load($(this).attr('value'));
});
