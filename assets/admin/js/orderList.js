/**
 * Created by liangfeng on 16/4/17.
 */
$(function(){
    orderList.detailLook();
    orderList.detailClose();
});
var orderList = {
    detailLook : function(){
        $('.detail-look').each(function(){
            $(this).on('click',function(){
                var orderId = $(this).parent().find('th:first-child').html();
                $('.order-detail').each(function(){
                    $(this).css('display','none');
                });
                $('.'+orderId).css('display','block');
            });
        });
    },
    detailClose : function(){
        $('.detail-close').each(function(){
            $(this).on('click',function(){
                $(this).parent().parent().parent().parent().css('display','none');
            });
        });
    },
};
