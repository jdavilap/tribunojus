/**
 * Created by J&D on 25/11/2017.
 */
$(document).ready(function(){


    var id_user = $('#drow_abogado').val();

    $.get('index.php?r=admin/pj-abogado/getuser',{id_user:id_user},function(data){
        var data = $.parseJSON(data);

        $('.list').remove();


        $('#td-nombre').append('<label class="list">'+data.first_name+'</label>');
        $('#td-apellido').append('<label class="list">'+data.last_name+'</label>');
        $('#td-email').append('<label class="list">'+data.email+'</label>');
        $('#td-dni').append('<label class="list">'+data.dni+'</label>');


    });
});
