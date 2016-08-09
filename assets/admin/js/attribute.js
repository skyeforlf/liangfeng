/**
 * Created by liangfeng on 16/3/30.
 */
$(function () {
    attribute.updateDataAjax();
});
var attribute = {
    ini : function(){
        $('.update-name').on('click',function(){
             alert('我被点击了');
        });
    },
    updateDataAjax : function(){
        $('.update').each(function(){
            $(this).on('click',function(){
                if(confirm('你确定修改吗?')){
                    var data = $(this).parent().prev().val();
                    var item = $(this).parent().prev().attr('name');
                    $.ajax({
                        url : 'http://www.minibaobei.cn/index.php?r=admin/UpdateDataAjax/UpdateAttributeDataAjax',
                        data : {
                            item : item,
                            value : data,
                            stuId : $.cookie('user_stuid'),
                        },
                        type : 'post',
                        dataType : 'json',
                        success : function(data){
                            if(data.success){
                                $('.user-'+item).val(data.data);
                            }
                        }
                    });
                }
            });
        });
    }
}
