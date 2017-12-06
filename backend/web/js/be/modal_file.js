/**
 * Created by J&D on 02/12/2017.
 */

$('#modalButtonFile').click(function(){
    $('#modal_file').modal('show')
        .find('#modal_content')
        .load($(this).attr('value'));
});
