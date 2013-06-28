 function addtoacc() {
        var acc_id = $(this).parent().parent().children(':first-child').text();
        var product_id = parseInt($("#code").text());
        $.ajax({
                       type:'POST',
                       
                       data:{'acc_id': acc_id , 'product_id': product_id},
                       beforeSend:function(){
                                  $("#acclist").addClass("loading");
                                  },
                       complete:function(){
                                  $("#acclist").removeClass("loading");
                                  },
                                  
                       url:'/shop/admin/accessories/add',
                       
                                            
                       success:function(html){
                           jQuery("#acclist").html(html);
                       }
                       
                        }); 
                       
    }
    
    
    
 jQuery('#delacc').live('click',delfromacc);

    function delfromacc() {

        $.ajax({
                       type:'POST',
                       
                       data:{
                           'id': $(this).parent().parent().attr('id').substr(8)},
                       beforeSend:function(){
                                  $("#acclist").addClass("loading");
                                  },
                       complete:function(){
                                  $("#acclist").removeClass("loading");
                                  },
                                  
                       url:'/shop/admin/accessories/delete',

                                            
                       success:$(this).parent().parent().fadeOut(500)
                       
                        }); 




    }