
$('.b_delete').click(function(){
    var id = $(this).attr('id').substr(3);

        $.ajax({
            type: 'post',
            data: {
                'id':id
            },

            beforeSend: function(){
                $("#photos"+id).addClass("loading");
            },
            complete: function(){
                $("#photos"+id).removeClass("loading");

            },
            success: function(){
                $("#del"+id).parent().parent().parent().parent().remove();

            },

            url: '/gallery/admin/deletephoto'

        });

  });

$('.savephoto').click(function(){
    var id = $(this).attr('id').substr(4);
    var title = $('#tt'+id).attr('value');
    $.ajax({
        type: 'post',
        data: {
            'id':id,
            'title':title
        },
        beforeSend: function(){
            $("#photos"+id).addClass("loading");
        },
        complete: function(){
            $("#photos"+id).removeClass("loading");

        },
        url: '/gallery/admin/savephoto'

    });

});