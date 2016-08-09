$(function(){
    restaurant.addShoppingCartfood();
    restaurant.goToSettle();
});
var restaurant = {
    findShoopCartFood : function(foodid,name,price){
        var find = true;
        $('#shopping-order').find('.foodid').each(function(){
            if($(this).val() == foodid){
                var num = $(this).next().next().find('li').eq(1).text();
                $(this).next().next().find('li').eq(1).text(parseInt(num)+1);
                var totalPrice = $(this).next().next().next().find('span').text();
                $(this).next().next().next().find('span').text(parseFloat(totalPrice)+parseFloat(price));
                find = false;
            }
        });
        if(find){
            var dl = '<dl><input class="foodid" type="hidden" name="foodid" value="'+foodid+'"/><dd class="food-name-type">'+name+'</dd><dd><ul><li>-</li><li class="food-count">1</li><li>+</li> </ul></dd><dd class="food-price"><span>'+parseFloat(price)+'</span> 元</dd></dl>'
            $('#shopping-order').append(dl);
        }
    },
    addShoppingCartfood : function(){
        var that = this;
        $('.shopping-trolley').each(function(){
            $(this).on('click',function(){
                var price = $(this).prev().find('b').text();
                var name = $(this).prev().prev().prev().text();
                var foodid = $(this).next().val();
                that.findShoopCartFood(foodid,name,price);
            });
        });
    },
    setSettleForm : function(){
        var foodId = '';
        var foodCount = '';
        $('#shopping-order').find('.foodid').each(function(){
            foodId += $(this).val()+',';
        });
        $('#shopping-order').find('.food-count').each(function(){
            foodCount += $(this).text()+',';
        });
        if(foodId.length){
            // 取得要提交页面的URL
            var action = "http://www.minibaobei.cn/index.php?r=takeout/Seller/Pay";
            // 创建Form
            var form = $('<form><input type="text" name="foodId" value="'+foodId+'"/><input type="text" name="foodCount" value="'+foodCount+'"/><input type="submit"></form>');
            // 设置属性
            form.attr('action', action);
            form.attr('method', 'post');
            // form的target属性决定form在哪个页面提交
            // _self -> 当前页面 _blank -> 新页面
            form.attr('target', '_self');
            // 提交表单
            form.submit();
            // 注意return false取消链接的默认动作
            return false;
        }
    },
    goToSettle : function(){
        var that = this;
        $('.jiesuan').on('click',function(){
            that.setSettleForm();
        });
    }
};