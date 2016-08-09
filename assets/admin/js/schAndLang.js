/**
 * Created by liangfeng on 16/3/31.
 */
$(function(){

    otherInfo.dateInputClick();
    otherInfo.updateDataAjax();

});
var otherInfo = {
    dateInputClick : function(){
        $('.user-start-time').on('click',function(){
            WdatePicker();
        });
    },
    updateDataAjax : function(){
        $('.update').each(function(){
            $(this).on('click',function(){
                if(confirm('你确定修改吗?')) {
                    var data = $(this).parent().parent().find('.form-control').val();
                    var item = $(this).parent().parent().find('.form-control').attr('name');
                    $.ajax({
                        url: 'http://www.minibaobei.cn/index.php?r=admin/UpdateDataAjax/UpdateSchoolDataAjax',
                        data: {
                            item: item,
                            value: data,
                            stuId: $.cookie('user_stuid'),
                        },
                        type: 'post',
                        dataType: 'json',
                        success: function (data) {
                            if (data.success) {
                                $('.user-' + item).val(data.data);
                            }
                        }
                    });
                }
            });
        });
    },
    updateIntroduce : function(){
        $('.update-introduce').on('click',function(){
            var data = $(this).parent().prev().find('textarea').val();
            var item = $(this).parent().prev().find('textarea').attr('name');
            $.ajax({
                url : 'http://www.minibaobei.cn/index.php?r=admin/UpdateDataAjax/UpdateOtherInfoDataAjax',
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
        });
    }
};

