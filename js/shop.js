/**
 * Created with JetBrains PhpStorm.
 * User: Sega
 * Date: 18.09.12
 * Time: 10:17
 */
jQuery(function($) {
        $('.shop_up').click(function(){
            var id = $(this).attr('id').substr(7);
                    $.ajax({
                        type: 'post',
                          data: {
                            'id': id
                              },
                        beforeSend: function(){
                            $("#positions").addClass("loading");
                        },
                        complete: function(){
                            $("#positions").removeClass("loading");
                        },
                        success: function($response){
                            $("#positions").html($response);
                        },
                        url: '/shop/admin/categories/moveup'
                    });
        });


        $('.shop_down').click(function(){
            var id = $(this).attr('id').substr(9);
            $.ajax({
                type: 'post',
                data: {
                    'id': id
                },
                beforeSend: function(){
                    $("#positions").addClass("loading");
                },
                complete: function(){
                    $("#positions").removeClass("loading");
                },
                success: function($response){
                    $("#positions").html($response);
                },
                url: '/shop/admin/categories/movedown'
            });

        });

});