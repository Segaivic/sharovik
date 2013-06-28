/**
 * Created with JetBrains PhpStorm.
 * User: Sega
 * Date: 18.09.12
 * Time: 10:17
 */
function confirmDialog() {
    var conf = confirm("Подтвердите удаление, при этом все связанные с этим блогом новости будут удалены");
    if(conf==false){
        return false;
            }
    else {
        return true
    }
}

$('.deleteblog').click(function(){
       var blog_id = $(this).attr('id')
       var id = $(this).attr('id').substr(10);

    var conf = confirmDialog();

    if (conf != false){

            $.ajax({
                type: 'post',
                dataType: 'json',
                data: {
                    'id':		id
                      },
                beforeSend: function(){
                    $(".rightmenu").addClass("loading");
                },
                complete: function(){
                    $(".rightmenu").removeClass("loading");

                },
                success: function(){
                    $("#"+blog_id).parent().remove();

                },

                url: '/admin/news/deleteblog'

            });
    }
});