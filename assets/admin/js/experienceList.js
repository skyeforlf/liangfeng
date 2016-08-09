/**
 * Created by liangfeng on 16/4/23.
 */
$(function(){
    experience.lookAlterInfo();
    experience.detailPanelClose();
});
var experience = {
    lookAlterInfo : function(){
        $('.look-alter').each(function(){
            $(this).on('click',function(){
                $.ajax({
                    url: 'http://www.minibaobei.cn/index.php?r=admin/index/GetSingleExperienceAjax',
                    type: 'post',
                    dataType: 'json',
                    data:{
                        stuId:$.cookie('user_stuid'),
                        expId:$(this).parent().find('td:first-child').html(),
                    },
                    success:function(data){
                        if(data.success){
                            $('.exp-id').val(data.data.exp_id);
                            $('.exp-title').val(data.data.exp_title);
                            $('.exp-place').val(data.data.exp_place);
                            $('.exp-time').val(data.data.exp_time);
                            $('.exp-content').val(data.data.exp_content);
                            $('.exp-detail').removeClass('hidden');
                        }
                    },
                });
            });
        });
    },
    detailPanelClose : function(){
        $('.detail-close').on('click',function(){
            $('.exp-detail').addClass('hidden');
        });
    }
};