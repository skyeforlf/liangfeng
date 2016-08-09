/**
 * Created by liangfeng on 16/8/3.
 */
$(function(){
    userCenter.init();
});
var userCenter = {
    init : function(){
        this.uploadFaceBtn();
    },

    uploadFaceBtn : function(){
        $(document).on('click','.js-upload-face', function () {
            var buttons1 = [
                {
                    text: '请选择',
                    label: true
                },
                {
                    text: '本地上传',
                    //bold: true,
                    color: 'success',
                    onClick: function() {
                        $.alert("你选择了“本地上传“");
                    }
                },
                {
                    text: '手机自拍',
                    //color: 'danger',
                    onClick: function() {
                        $.alert("你选择了“手机自拍“");
                    }
                }
            ];
            var buttons2 = [
                {
                    text: '取消',
                    bg: 'danger'
                }
            ];
            var groups = [buttons1, buttons2];
            $.actions(groups);
        });
    }

};
