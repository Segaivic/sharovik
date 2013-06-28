$(document).ready(function(){
    $('.popover-markup>.trigger').popover({
        html : true,
        title: function() {
            return $(this).parent().find('.head').html();
        },
        content: function() {
            return $(this).parent().find('.content').html();
        }
    });
});

function savePrice(){
    $.ajax({
        type: 'post',
        data: {
            'price': $("#pricetag").val(),
            'id': $(".trigger").attr("id")
        },
//        beforeSend: function(){
//            $("#positions").addClass("loading");
//        },
//        complete: function(){
//            $("#positions").removeClass("loading");
//        },
        success: function(){
            $('.trigger').text($("#pricetag").val());
            $('.popover').hide();
        },
        url: '/shop/admin/product/updateprice'
    });
}