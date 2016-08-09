/**
 * Created by liangfeng on 16/3/31.
 */
$(function(){

    otherInfo.init();
    otherInfo.setWidthEqualHeight();
    otherInfo.birthdayInputClick();
    otherInfo.updateDataAjax();
    otherInfo.updateIntroduce();
    otherInfo.updateSex();

});
var otherInfo = {
    oldImg : $('#old-face-img'),
    inputImg : $('#upload-face'),
    divImg : $('#face-img-div'),
    init : function(){
        var that = this;
        this.oldImg.on('click',function (){
            that.inputImg.click();
        });
        this.inputImg.on('change',function(){
            that.divImg.html('<img id="img-view" src=""/>');
            uploadPreview.setImagePreview('face-img-div','img-view','upload-face');
            var jcrop_api;

            $('#img-view').Jcrop({
                onChange : that.showCoords,
                onSelect : that.showCoords,
                onRelease : that.clearCoords,
                aspectRatio : 1/1,
                onDblClick : that.ajaxFileUpload,
            },function(){
                jcrop_api = this;
            });

            $('#coords').on('change','input',function(e){
                var x1 = $('#x1').val(),
                    x2 = $('#x2').val(),
                    y1 = $('#y1').val(),
                    y2 = $('#y2').val();
                jcrop_api.setSelect([x1,y1,x2,y2]);
            });
        });
    },
    showCoords : function(c) {
        $('#x1').val(c.x);
        $('#y1').val(c.y);
        $('#x2').val(c.x2);
        $('#y2').val(c.y2);
        $('#w').val(c.w);
        $('#h').val(c.h);
    },
    clearCoords : function(){
        $('#coords input').val('');
    },
    setWidthEqualHeight : function(){
        var width = parseInt(this.divImg.css('width'));
        this.divImg.css('height',width+'px');
    },
    birthdayInputClick : function(){
        $('.birthday-input').on('click',function(){
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
                        url: 'http://www.minibaobei.cn/index.php?r=admin/UpdateDataAjax/UpdateOtherInfoDataAjax',
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
            if(confirm('你确定修改吗?')) {
                var data = $(this).parent().prev().find('textarea').val();
                var item = $(this).parent().prev().find('textarea').attr('name');
                $.ajax({
                    url: 'http://www.minibaobei.cn/index.php?r=admin/UpdateDataAjax/UpdateOtherInfoDataAjax',
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
    },
    updateSex : function(){
        $('.update-sex').on('click',function(){
            if(confirm('你确定修改吗?')) {
                var data = $('input[name="sex"]:checked').val();
                var item = 'sex';
                $.ajax({
                    url: 'http://www.minibaobei.cn/index.php?r=admin/UpdateDataAjax/UpdateOtherInfoDataAjax',
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
    },
    ajaxFileUpload : function() {
        $.ajaxFileUpload({
                url: 'http://www.minibaobei.cn/index.php?r=AjaxData/UploadFace&refreshFileCache=1', //用于文件上传的服务器端请求地址
                data: {
                    x1 : $('#x1').val(),
                    x2 : $('#x2').val(),
                    y1 : $('#y1').val(),
                    y2 : $('#y2').val(),
                },
                type: 'post',
                secureuri: false, //是否需要安全协议，一般设置为false
                fileElementId: 'upload-face', //文件上传域的ID
                dataType: 'json', //返回值类型 一般设置为json
                success: function (data, status)  //服务器成功响应处理函数
                {
                    alert(data.imgUrl);
                    $('#old-face-img').attr('src',data.imgUrl);
                },
                error: function (data, status, e)//服务器响应失败处理函数
                {
                    alert(e);
                }
            });
        return false;
    }
};

