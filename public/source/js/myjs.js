$(document).ready(function($) {
    $(".addcart").on("click",function(){
        var id = $(this).attr("data-id");
        var qty = $('#qty').val();
        //alert(qty);
        $.ajax({
        url : 'addtocart/'+id + '/' + qty,
        dataType : 'html',
        success: function(result){
            if(result){
                // alert("Thêm thành công"+" "+qty+" "+"sản phẩm vào giỏ hàng");
                // $("div.alert").fadeIn().delay(2000).fadeOut();
                window.location = 'gio-hang';
                }
            }
        });
    });

    $(".updatecart").on("click",function(){
        var id = $(this).attr("data-id");
        var qty = $(".item_cart_"+id).val();
        // alert(qty);
        $.ajax({
            url : 'update-cart/'+id+'/'+qty,
            dataType : 'html',
            success: function(result){
                if(result){
                        window.location = 'gio-hang';
                    }
                }
        });
    });

    $(".updatecart_mgg").on("click",function(){
        var mgg = $(".mgg").val();
        $.ajax({
            url : 'update-cart/'+mgg,
            dataType : 'html',
            success: function(result){
                if(result){
                    window.location = 'gio-hang';
                }
            }
        });
    });
});

$("div.alert").delay(2000).slideUp();

